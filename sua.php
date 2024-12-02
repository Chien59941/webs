<?php
require 'database/connect.php';
$id = $_GET['id'];
if (isset($_POST['ten_sp'], $_POST['img_sp'], $_POST['price_sp'], $_POST['color_sp'], $_POST['gender'], $_POST['menu_sp'])) {
  $name = $_POST['ten_sp'];
  $img = $_POST['img_sp'];
  $price = $_POST['price_sp'];
  $color = $_POST['color_sp'];
  $menu = $_POST['menu_sp'];
  $gender = $_POST['gender'];
  $sql = "UPDATE sanpham SET ten_sp = ?, img_sp = ?, price_sp = ?, color_sp = ?, gender = ?, menu = ? WHERE id_sp = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssssi", $name, $img, $price, $color, $gender, $menu, $id);
    if ($stmt->execute()) {
      $a = "Sửa thành công";
    } else {
      $a = "Thất bại: " . $stmt->error;
    }
    $stmt->close();
  } else {
    $a = "Không thể chuẩn bị truy vấn: " . $conn->error;
  }
} else {
  $a = "Thiếu dữ liệu đầu vào!";
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa sản phẩm</title>
  <link rel="stylesheet" href="CSS/sua.css">
  <link rel="icon" href="https://pubcdn.ivymoda.com/ivy2/images/logo-icon.ico" type="image/png" sizes="16x16">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <script src="JS/dangnhap.js"></script>
</head>

<body>
  <header>
    <div class="logo">
      <a href="trangchu.php"><img src="Images/logo.png" alt="" title="Trang chủ"></a>
    </div>
    <div class="menu">
      <li><a href="danhmuc.php">Danh mục</a></li>
      <li>
        <a href=""> Nữ</a>
        <ul class="female-menu">
          <li>
            <a href="">Áo </a>
            <ul>
              <li>Áo thun</li>
              <li>Áo khoác</li>
              <li>Áo sơ mi</li>
            </ul>
          </li>
          <li>
            <a href="">Quần</a>
            <ul>
              <li>Quần lửng</li>
              <li>Quần dài</li>
            </ul>
          </li>
        </ul>
      </li>
      <li>
        <a> Nam</a>
        <ul class="female-menu">
          <li>
            <a href="">Áo </a>
            <ul>
              <li>Áo thun</li>
              <li>Áo polo</li>
              <li>Áo sơ mi</li>
            </ul>
          </li>
          <li>
            <a href="">Quần</a>
            <ul>
              <li>Quần jeans</li>
              <li>Quần khaki</li>
            </ul>
          </li>
        </ul>
      </li>
      <li style="display: none;" id="admin">
        <a href="admin.php">Admin</a>
      </li>
    </div>
    <div class="others">
      <li>
        <input style="width: 150px;height: 30px;" type="text" placeholder="Tìm kiếm sản phẩm " />
      </li>
      <li><a class="fa-solid fa-basket-shopping" href="giohang.php" id="gh" style="display: none;" title="Giỏ hàng"></a></li>
      <li>
        <a class="fa-solid fa-user" id="register" title="Đăng ký" href="dangky.php" style="font-size: 25px;"></a>
      </li>
      <li>
        <i>
          <a href="dangnhap.php" class="fa-regular fa-user" title="Đăng nhập" style="font-size: 25px;" id="login"></a>
        </i>
      </li>
      <li id="logout" style="position: relative; right: 60px;display: none;">
        <a class="fas fa-sign-out-alt" onclick="logout()" title="Đăng xuất" href="trangchu.php"></a>
      </li>
    </div>
    <script src="JS/home_page.js" defer></script>
  </header>
  <section class="sc">
    <p>ID sản phẩm: <?php echo $id ?></p>
    <form class="div2" style="padding: 0px 0px 0px 50px;" method="post">
      <div class="search" required>
        <p class="p1">Tên sản phẩm</p>
        <input class="ip1" type="text" name="ten_sp" placeholder="Nhập tên muốn đổi">
      </div>
      <div class="search" required>
        <p class="p1">Giá sản phẩm</p>
        <input class="ip1" type="text" name="price_sp" placeholder="Nhập giá muốn đổi">
      </div>
      <div class="search" required>
        <p class="p1">Màu sản phẩm</p>
        <input class="ip1" type="text" name="color_sp" placeholder="Nhập màu muốn đổi">
      </div>
      <div class="search" required>
        <p class="p1">Ảnh sản phẩm</p>
        <input class="ip1" type="file" name="img_sp">
      </div>
      <div class="search">
        <label>Danh mục</label>
        <select name="menu_sp" id="" style="margin-right: 220px;">
          <option value="" name=""></option>
          <option value="Quần" name="">Quần </option>
          <option value="Áo" name="">Áo</option>
        </select>
      </div>
      <div class="search">
        <label>Giới tính</label>
        <select name="gender" id="" style="margin-right: 220px;">
          <option value="" name=""></option>
          <option value="male" name="">Nam </option>
          <option value="female" name="">Nữ</option>
        </select>
      </div>
      <button class="btn">Sửa</button>
      <p style="width: 300px;">
        <?php echo $a; ?>
      </p>
    </form>
    <a href="admin.php" style="text-decoration: none;color:blue ; font-size:20px" title="Quay lại trang admin">Quay lại trang admin</a>
  </section>
  <!-- ----------app--------- -->
  <section class="app-container">
    <p> <b>Tải ứng dụng Ivy moda</b></p>
    <div class="app">
      <a href="https://apps.apple.com/vn/app/ivy-moda/id1430094474?l=vi" target="_blank"><img src="Images/appstore - Copy (2).png"></a>
      <a href="https://play.google.com/store/apps/details?id=com.ivymoda.app" target="_blank"><img src="Images/googleplay.png"></a>

    </div>
    <p>Nhận bản tin IVY moda </p>
    <input type="text" placeholder="Nhập email của bạn ....">
  </section>
  <!-- ----------footer---------- -->
  <footer class="footer-top">
    <li><a href=""><img src="Images/img-congthuong.png" alt=""></a></li>
    <li>Liên hệ </li>
    <li>Tuyển dụng </li>
    <li>Giới thiệu </li>
    <li>
      <a href="https://www.facebook.com/thoitrangivymoda/" target="_blank"> <i class="fa-brands fa-facebook"></i></a>
      <a href="https://www.youtube.com/user/thoitrangivymoda" target="_blank"><i class="fa-brands fa-youtube"></i></a>
      <a href="https://www.instagram.com/ivy_moda/" target="_blank"><i class="fa-brands fa-instagram"></i></a>

    </li>
  </footer>
  <p class="end">
    công ty cổ phần Dự Kim với số đăng kí kinh doanh : <b>0105777650 </b><br>
    Địa chỉ đăng kí : <b>Tổ dân tháp ,p.Đại Mỗ ,Q.Nam Từ Liêm , TP Hà Nội , Việt Nam -0243 205 2222 </b> <br>
    Đặt hàng online : <b>0246 662 343</b>
  </p>
</body>

</html>