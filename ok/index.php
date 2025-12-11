<?php
// index.php - Trang giới thiệu việc làm sản xuất tại khu công nghiệp
$title = "Tuyển Dụng Công Nhân Sản Xuất - Các Khu Công Nghiệp Lớn Việt Nam";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="description" content="Tuyển dụng công nhân sản xuất, vận hành máy, đóng gói, kiểm hàng tại các khu công nghiệp lớn: Bình Dương, Đồng Nai, Long An, Bắc Ninh, Hải Phòng... Lương cao, phúc lợi tốt, hỗ trợ nhà trọ.">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Roboto', sans-serif; line-height: 1.6; color: #333; }
        .hero { 
            background: linear-gradient(rgba(0,123,255,0.8), rgba(0,123,255,0.9)), 
                        url('https://images.unsplash.com/photo-1581092580490-4e6e81e1268a?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover no-repeat;
            color: white; 
            padding: 120px 0; 
            text-align: center;
        }
        .feature-icon { font-size: 3rem; color: #007bff; margin-bottom: 1rem; }
        .job-card { transition: transform 0.3s; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .job-card:hover { transform: translateY(-10px); }
        .badge-custom { background: #28a745; font-size: 0.9rem; }
        footer { background: #222; color: #ddd; padding: 50px 0 20px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fas fa-industry me-2"></i>KCN VIỆT NAM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="#jobs">Việc làm hot</a></li>
                <li class="nav-item"><a class="nav-link" href="#benefits">Phúc lợi</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">TUYỂN GẤP CÔNG NHÂN SẢN XUẤT</h1>
        <p class="lead mb-4">Làm việc tại các khu công nghiệp lớn: Bình Dương • Đồng Nai • Long An • Bắc Ninh • Hải Phòng • Bắc Giang</p>
        <a href="#jobs" class="btn btn-light btn-lg px-5">Xem việc làm ngay <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
</section>

<!-- Features -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon"><i class="fas fa-money-bill-wave"></i></div>
                <h4>Lương 10 - 18 triệu</h4>
                <p>Lương cơ bản + tăng ca + thưởng hiệu suất</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon"><i class="fas fa-home"></i></div>
                <h4>Hỗ trợ nhà trọ</h4>
                <p>Miễn phí ký túc xá hoặc hỗ trợ 500k - 1 triệu/tháng</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Bảo hiểm đầy đủ</h4>
                <p>BHXH, BHYT, BHTN theo luật lao động</p>
            </div>
        </div>
    </div>
</section>

<!-- Danh sách việc làm hot -->
<section id="jobs" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-primary">TUYỂN DỤNG NỔI BẬT THÁNG 12/2025</h2></h2>
        <div class="row g-4">
            <?php
            $jobs = [
                [
                    "title" => "Công Nhân Lắp Ráp Điện Tử",
                    "location" => "KCN VSIP Bình Dương",
                    "salary" => "10 - 15 triệu",
                    "quantity" => "300",
                    "benefits" => ["Lương tuần", "Xe đưa đón", "Thưởng Tết 2-3 tháng lương"]
                ],
                [
                    "title" => "Công Nhân May Mặc",
                    "location" => "KCN Tân Bình, Đồng Nai",
                    "salary" => "9 - 14 triệu",
                    "quantity" => "500",
                    "benefits" => ["Nhà trọ miễn phí", "Ăn ca", "Thưởng năng suất"]
                ],
                [
                    "title" => "Công Nhân Đóng Gói Thực Phẩm",
                    "location" => "KCN Amata, Đồng Nai",
                    "salary" => "8 - 12 triệu",
                    "quantity" => "200",
                    "benefits" => ["Môi trường sạch sẽ", "Không tăng ca nhiều", "Bảo hiểm ngay"]
                ],
                [
                    "title" => "Công Nhân Cơ Khí - Hàn - Tiện",
                    "location" => "KCN Quang Châu, Bắc Giang",
                    "salary" => "12 - 20 triệu",
                    "quantity" => "150",
                    "benefits" => ["Lương ngày", "Tăng ca thoải mái", "Hỗ trợ tay nghề"]
                ],
                [
                    "title" => "Công Nhân Sản Xuất Linh Kiện Ô Tô",
                    "location" => "KCN Thăng Long, Hà Nội",
                    "salary" => "11 - 18 triệu",
                    "quantity" => "400",
                    "benefits" => ["Ký túc xá hiện đại", "Xe đưa đón miễn phí", "Thưởng lễ lớn"]
                ],
                [
                    "title" => "Công Nhân Kho - Kiểm Hàng",
                    "location" => "KCN Sóng Thần, Bình Dương",
                    "salary" => "9 - 13 triệu",
                    "quantity" => "250",
                    "benefits" => ["Công việc nhẹ nhàng", "Giờ hành chính", "Thưởng cuối năm"]
                ]
            ];

            foreach ($jobs as $job) {
                echo '
                <div class="col-md-6 col-lg-4">
                    <div class="card job-card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">'.$job["title"].'</h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt"></i> '.$job["location"].'</p>
                            <h4 class="text-success fw-bold">'.$job["salary"].'</h4>
                            <span class="badge bg-danger mb-3">Tuyển '.$job["quantity"].' người</span>
                            <ul class="list-unstyled mt-auto">';
                foreach ($job["benefits"] as $benefit) {
                    echo '<li><i class="fas fa-check text-success me-2"></i>'.$benefit.'</li>';
                }
                echo '      </ul>
                            <a href="#contact" class="btn btn-primary mt-3">Ứng tuyển ngay</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Phúc lợi -->
<section id="benefits" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">TẠI SAO NÊN LÀM VIỆC TẠI KHU CÔNG NGHIỆP?</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Lương cao + tăng ca nhiều</strong> (nhiều bạn thu nhập trên 15 triệu/tháng)</li>
                    <li class="list-group-item"><strong>Ổn định lâu dài</strong>, ký hợp đồng chính thức</li>
                    <li class="list-group-item"><strong>Hỗ trợ ăn ở</strong>, xe đưa đón miễn phí</li>
                    <li class="list-group-item"><strong>Đóng đầy đủ bảo hiểm</strong>, nghỉ phép năm, thưởng Tết</li>
                </ul>
            </div>
            <div class="col-lg-6 mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Không yêu cầu bằng cấp</strong>, chỉ cần sức khỏe và chăm chỉ</li>
                    <li class="list-group-item"><strong>Đào tạo miễn phí</strong> khi mới vào</li>
                    <li class="list-group-item"><strong>Cơ hội thăng tiến</strong>: tổ trưởng, quản lý...</li>
                    <li class="list-group-item"><strong>Môi trường trẻ</strong>, nhiều bạn trẻ từ khắp nơi</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Liên hệ -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">LIÊN HỆ ỨNG TUYỂN NGAY HÔM NAY</h2>
            <p class="lead">Gọi ngay Hotline hoặc để lại thông tin, chúng tôi sẽ liên hệ trong 5 phút!</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <p class="fs-1 text-danger fw-bold"><i class="fas fa-phone"></i> 1900.1234</p>
                    <p><i class="fab fa-zalo me-2"></i> Zalo: 0909.888.777</p>
                </div>
                <form action="" method="post" class="bg-light p-4 rounded shadow">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Họ và tên" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Số điện thoại" required>
                        </div>
                        <div class="col-12 mb-3">
                            <select class="form-select">
                                <option value="">Chọn vị trí quan tâm</option>
                                <option>Công nhân lắp ráp</option>
                                <option>Công nhân may</option>
                                <option>Công nhân đóng gói</option>
                                <option>Công nhân cơ khí</option>
                                <option>Khác</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-lg w-100">GỬI THÔNG TIN - GỌI NGAY CHO BẠN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="text-center">
            <p>&copy; 2025 Tuyển Dụng Công Nhân Khu Công Nghiệp Việt Nam. All rights reserved.</p>
            <p>Hotline: 1900.1234 | Email: tuyendung@kcnvietnam.vn</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
