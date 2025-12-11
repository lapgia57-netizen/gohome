// script.js - Tách riêng hoàn toàn
const exercises = [
  { title: "1. Hello World", desc: "Viết hàm trả về 'Hello World!'", starter: "function hello() {\n  \n}", test: f => f() === "Hello World!" },
  { title: "2. Cộng hai số", desc: "Hàm add(a, b) trả về tổng", starter: "function add(a, b) {\n  \n}", test: f => f(5,3)===8 && f(10, -2)===8 },
  { title: "3. Số chẵn", desc: "isEven(n) → true nếu chẵn", starter: "function isEven(n) {\n  \n}", test: f => f(4) && !f(5) && f(0) },
  { title: "4. Số lớn nhất trong mảng", desc: "max(arr)", starter: "function max(arr) {\n  \n}", test: f => f([1,5,3,9])===9 && f([-5,-1,-10])===-1 },
  { title: "5. Đảo ngược chuỗi", desc: "reverseString(str)", starter: "function reverseString(str) {\n  \n}", test: f => f("hello")==="olleh" && f("JavaScript")==="tpircSavaJ" },
  { title: "6. Đếm nguyên âm", desc: "countVowels(str) - không phân biệt hoa thường", starter: "function countVowels(str) {\n  \n}", test: f => f("hello")===2 && f("AEIOUaeiou")===10 },
  { title: "7. Palindrome", desc: "isPalindrome(str) - bỏ dấu cách & hoa thường", starter: "function isPalindrome(str) {\n  \n}", test: f => f("A man a plan a canal Panama") && !f("hello") },
  { title: "8. FizzBuzz", desc: "Trả về mảng 1→100 với Fizz/Buzz", starter: "function fizzBuzz() {\n  const result = [];\n  for(let i=1; i<=100; i++) {\n    \n  }\n  return result;\n}", test: f => {
    const arr = f();
    return arr[14] === "FizzBuzz" && arr[2] === "Fizz" && arr[4] === "Buzz" && arr[0] === "1";
  }},
  // Thêm thoải mái hàng trăm bài ở đây...
  { title: "20. Closure Counter", desc: "createCounter() trả về {increment, decrement, getValue}", starter: "function createCounter(init = 0) {\n  \n}", test: f => {
    const c = f(5);
    c.increment(); c.increment();
    return c.getValue() === 7 && c.decrement() === 6;
  }},
  { title: "30. Promise Delay", desc: "fetchData() resolve [1,2,3] sau 1 giây", starter: "function fetchData() {\n  return new Promise((resolve, reject) => {\n    \n  });\n}", test: async f => {
    const start = Date.now();
    const data = await f();
    return JSON.stringify(data) === "[1,2,3]" && (Date.now() - start) >= 900;
  }},
];

const progressKey = "js100Progress";
let progress = JSON.parse(localStorage.getItem(progressKey)) || {};

function saveProgress() {
  localStorage.setItem(progressKey, JSON.stringify(progress));
}

function renderList() {
  const list = document.getElementById("exerciseList");
  let completed = 0;
  list.innerHTML = exercises.map((ex, i) => {
    const done = !!progress[i];
    if (done) completed++;
    return `<li onclick="loadExercise(${i})" class="${done ? 'completed' : ''}">
              ${done ? '✓' : '○'} ${ex.title}
            </li>`;
  }).join("");
  document.getElementById("completedCount").textContent = completed;
  document.getElementById("totalCount").textContent = exercises.length;
}

function loadExercise(i) {
  const ex = exercises[i];
  document.getElementById("exerciseContent").innerHTML = `
    <div class="exercise">
      <h2>${ex.title}</h2>
      <p>${ex.desc}</p>
      <textarea id="codeEditor">${ex.starter}</textarea>
      <div>
        <button onclick="runTest(${i})">Chạy & Kiểm tra</button>
        <button class="hint" onclick="toggleHint(${i})">Gợi ý</button>
        <button class="solution" onclick="alert('Cố tự làm trước nhé!')">Xem đáp án</button>
      </div>
      <div id="result${i}" class="result"></div>
      <div id="hint${i}" class="hint-box">
        <strong>Gợi ý:</strong> Hãy nghĩ đến các phương thức như <code>split(''), reverse(), join('')</code>, hoặc <code>Math.max(...arr)</code>, hoặc closure với <code>let count = init</code>...
      </div>
    </div>
  `;
  document.getElementById("codeEditor").focus();
}

function toggleHint(i) {
  const hint = document.getElementById(`hint${i}`);
  hint.style.display = hint.style.display === "block" ? "none" : "block";
}

function runTest(i) {
  const code = document.getElementById("codeEditor").value;
  const resultDiv = document.getElementById(`result${i}`);

  try {
    const func = new Function(`return ${code}`)();
    let passed = false;

    if (typeof exercises[i].test === "function") {
      if (exercises[i].test.constructor.name === "AsyncFunction") {
        exercises[i].test(func).then(ok => {
          showResult(ok, i);
        });
        return;
      } else {
        passed = exercises[i].test(func);
      }
    }

    showResult(passed, i);
  } catch (e) {
    resultDiv.className = "result wrong";
    resultDiv.innerHTML = `Lỗi: ${e.message}`;
  }
}

function showResult(passed, i) {
  const div = document.getElementById(`result${i}`);
  if (passed) {
    div.className = "result correct";
    div.innerHTML = "TUYỆT VỜI! Đúng rồi! Keep going!";
    progress[i] = true;
    saveProgress();
    renderList();
  } else {
    div.className = "result wrong";
    div.innerHTML = "Chưa đúng, thử lại nhé! Bạn đang tiến bộ đấy!";
  }
}

// Khởi động
document.addEventListener("DOMContentLoaded", () => {
  renderList();
});
