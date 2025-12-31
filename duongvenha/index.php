<?php
function tinhThue($thuNhapChiuThue){
    $bac = [
        [5000000, 0.05],
        [5000000, 0.10],
        [8000000, 0.15],
        [14000000, 0.20],
        [20000000, 0.25],
        [28000000, 0.30],
        [PHP_INT_MAX, 0.35]
    ];

    $thue = 0;
    foreach($bac as $b){
        if($thuNhapChiuThue <= 0) break;
        $tinh = min($thuNhapChiuThue, $b[0]);
        $thue += $tinh * $b[1];
        $thuNhapChiuThue -= $tinh;
    }
    return $thue;
}

$ketQua = null;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $luong = (int)$_POST["luong"];
    $nguoiPhuThuoc = (int)$_POST["phuthuoc"];

    $giamTru = 11000000 + $nguoiPhuThuoc * 4400000;
    $thuNhapChiuThue = max(0, $luong - $giamTru);
    $thue = tinhThue($thuNhapChiuThue);

    $ketQua = [
        "luong" => $luong,
        "giamtru" => $giamTru,
        "chiuThue" => $thuNhapChiuThue,
        "thue" => $thue
    ];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Tính Thuế Thu Nhập Cá Nhân</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:40px}
.box{max-width:500px;margin:auto;background:#fff;padding:25px;border-radius:10px}
h2{text-align:center;color:#0d6efd}
input,button{width:100%;padding:10px;margin-top:10px}
button{background:#0d6efd;color:#fff;border:none;border-radius:5px}
.result{background:#e9f5ff;padding:15px;margin-top:20px;border-radius:5px}
</style>
</head>

<body>
<div class="box">
<h2>💰 TÍNH THUẾ TNCN</h2>

<form method="post">
    <label>Lương tháng (VNĐ)</label>
    <input type="number" name="luong" required>

    <label>Số người phụ thuộc</label>
    <input type="number" name="phuthuoc" value="0">

    <button type="submit">Tính thuế</button>
</form>

<?php if($ketQua): ?>
<div class="result">
<p>💼 Thu nhập: <b><?=number_format($ketQua["luong"])?></b> đ</p>
<p>📉 Giảm trừ: <b><?=number_format($ketQua["giamtru"])?></b> đ</p>
<p>📊 Thu nhập chịu thuế: <b><?=number_format($ketQua["chiuThue"])?></b> đ</p>
<hr>
<p>🧾 Thuế TNCN phải nộp: 
<b style="color:red"><?=number_format($ketQua["thue"])?></b> đ</p>
</div>
<?php endif; ?>

</div>
</body>
</html>
