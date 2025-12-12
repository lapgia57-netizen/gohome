const dropArea = document.getElementById('dropArea');
const fileInput = document.getElementById('fileInput');
const resultDiv = document.getElementById('result');

// Hiệu ứng kéo thả
['dragenter', 'dragover'].forEach(e => dropArea.addEventListener(e, highlight));
['dragleave', 'drop'].forEach(e => dropArea.addEventListener(e, unhighlight));

function highlight(e) {
    e.preventDefault();
    dropArea.classList.add('dragover');
}

function unhighlight(e) {
    e.preventDefault();
    dropArea.classList.remove('dragover');
}

dropArea.addEventListener('drop', handleDrop);
fileInput.addEventListener('change', () => handleFiles(fileInput.files));

function handleDrop(e) {
    e.preventDefault();
    unhighlight(e);
    handleFiles(e.dataTransfer.files);
}

function handleFiles(files) {
    const htmlFiles = Array.from(files).filter(f => /\.html?$/i.test(f.name));
    if (htmlFiles.length === 0) {
        alert('Không tìm thấy file HTML nào!');
        return;
    }

    resultDiv.className = '';
    resultDiv.innerHTML = `<h2>Đang phân tích ${htmlFiles.length} file...</h2>`;
    
    let results = [];
    let processed = 0;

    htmlFiles.forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const content = e.target.result;
            const analysis = analyzeHTML(file.name, content, file.size);
            results.push(analysis);
            processed++;

            if (processed === htmlFiles.length) {
                displayResults(results);
            }
        };
        reader.readAsText(file, 'UTF-8');
    });
}

function analyzeHTML(filename, html, size) {
    const lower = html.toLowerCase();
    let reasons = [];

    // Kích thước nhỏ
    if (size < 1024) reasons.push(`Kích thước nhỏ (${(size/1024).toFixed(1)} KB)`);

    // Không có title
    const title = html.match(/<title[^>]*>([\s\S]*?)<\/title>/i);
    if (!title || title[1].trim().length < 3) reasons.push('Không có tiêu đề');

    // Nội dung hiển thị ít
    const body = html.match(/<body[^>]*>([\s\S]*?)<\/body>/i);
    const text = body ? body[1].replace(/<[^>]*>/g, ' ').replace(/\s+/g, ' ').trim() : '';
    if (text.length < 50) reasons.push(`Nội dung ít (${text.length} ký tự)`);

    // Redirect tự động
    if (lower.includes('window.location') || /meta\s+http-equiv=["']refresh/i.test(lower))
        reasons.push('Redirect tự động');

    // Nhiều script/iframe
    const scripts = (html.match(/<script[^>]+src=/gi) || []).length;
    const iframes = (html.match(/<iframe/gi) || []).length;
    if (scripts > 10 || iframes > 3) reasons.push(`Script/iframe lạ (${scripts}s, ${iframes}i)`);

    // Nội dung lặp (spam AI)
    const words = text.split(/\s+/).filter(w => w.length > 2);
    const unique = new Set(words.map(w => w.toLowerCase())).size;
    if (words.length > 30 && unique / words.length < 0.35) reasons.push('Nội dung lặp (spam AI)');

    // Từ khóa spam
    const spam = ['viagra', 'casino', 'porn', 'xxx', 'loan', 'cialis', 'pharmacy'];
    if (spam.some(k => lower.includes(k))) reasons.push('Từ khóa spam');

    const isTrash = reasons.length > 0;
    if (!isTrash) reasons = ['File sạch, nội dung bình thường'];

    return { filename, size: (size/1024).toFixed(1)+' KB', textLen: text.length, isTrash, reasons };
}

function displayResults(results) {
    const trash = results.filter(r => r.isTrash).length;
    const clean = results.length - trash;

    let html = `
        <h2>Kết quả phân tích</h2>
        <div class="summary">
            <div class="clean">Sạch: ${clean} file</div>
            <div class="trash">Rác: ${trash} file (nên xóa)</div>
        </div>
        <hr>
    `;

    results.sort((a, b) => b.isTrash - a.isTrash);

    results.forEach(r => {
        const cls = r.isTrash ? 'trash' : 'clean';
        const icon = r.isTrash ? 'Rác' : 'Sạch';
        html += `
            <div class="file-item ${cls}">
                <strong>${icon} ${r.filename}</strong> <small>(${r.size})</small>
                <div style="margin-top:8px; color:#555; font-size:0.95em;">
                    ${r.reasons.join(' • ')}
                </div>
            </div>
        `;
    });

    resultDiv.innerHTML = html;
}
