<?php
$title = "Con Đường Về Nhà - Hành trình đúng đắn nhất";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <h1>Con Đường Về Nhà</h1>
            <p>Nhanh nhất • Gần nhất • An toàn nhất • Vững chắc nhất</p>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>Tìm con đường đúng,<br>để về nhà bằng trái tim bình an</h2>
                <p>Cuộc đời giống như một bản đồ. Có vô vàn ngã rẽ, nhưng chỉ một con đường dẫn bạn về đúng nơi thuộc về mình.</p>
                <a href="#paths" class="btn-primary">Khám phá con đường của bạn</a>
            </div>
        </div>
    </section>

    <!-- Các con đường -->
    <section class="paths" id="paths">
        <div class="container">
            <h2 class="section-title">Bốn tiêu chí của con đường lý tưởng</h2>

            <div class="path-grid">
                <!-- Đường nhanh nhất -->
                <div class="path-card">
                    <div class="icon"><i class="fas fa-bolt"></i></div>
                    <h3>Nhanh Nhất</h3>
                    <p>Tập trung vào mục tiêu chính, loại bỏ distractions, học cách nói "không" với những điều không quan trọng.</p>
                    <span class="quote">“Thời gian là hữu hạn. Đừng đi đường vòng quá lâu.”</span>
                </div>

                <!-- Đường gần nhất -->
                <div class="path-card">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h3>Gần Nhất</h3>
                    <p>Chọn ngành nghề phù hợp với năng lực, sở thích và giá trị sống của bản thân – đó là đường thẳng nhất đến thành công thật sự.</p>
                    <span class="quote">“Đi đúng đường thì 1 bước cũng gần hơn vạn bước lạc lối.”</span>
                </div>

                <!-- Đường an toàn nhất -->
                <div class="path-card">
                    <div class="icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>An Toàn Nhất</h3>
                    <p>Xây dựng nền tảng kiến thức vững chắc, rèn luyện kỹ năng sống, giữ gìn sức khỏe và đạo đức – đó là lớp bảo vệ tốt nhất.</p>
                    <span class="quote">“An toàn không phải là tránh rủi ro, mà là chuẩn bị đủ tốt để đối mặt với nó.”</span>
                </div>

                <!-- Đường học vấn vững chắc nhất -->
                <div class="path-card featured">
                    <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3>Học Vấn Vững Chắc Nhất</h3>
                    <p>Học không chỉ để thi cử, mà để hiểu sâu, áp dụng được, và trở thành phiên bản tốt nhất của chính mình.</p>
                    <ul class="tips>
                        <li>Học đều mọi môn, không bỏ sót nền tảng</li>
                        <li>Tự học là kỹ năng quan trọng nhất</li>
                        <li>Đọc sách nhiều hơn lướt điện thoại</li>
                        <li>Xây dựng thói quen học tập mỗi ngày</li>
                    </ul>
                    <span class="quote">“Học vấn là hành trang nhẹ nhất nhưng giá trị nhất bạn mang theo suốt đời.”</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Lời khuyên cuối -->
    <section class="message">
        <div class="container">
            <div class="final-message">
                <h2>Bạn không cần phải giỏi nhất,<br>chỉ cần đi đúng đường và không bỏ cuộc.</h2>
                <p>Hôm nay bạn chọn con đường nào, ngày mai bạn sẽ gặp phiên bản tương lai của mình ở đó.</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://conduongvenha.example.com" target="_blank" class="btn-secondary">
                    <i class="fab fa-facebook"></i> Chia sẻ hành trình của bạn
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Con Đường Về Nhà. Made with ❤️ cho thế hệ trẻ Việt Nam.</p>
            <p>Hãy nhớ: <strong>Nhà không chỉ là nơi để về, mà là nơi bạn tự hào khi trở về.</strong></p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
