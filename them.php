<?php
require 'database/connect.php';
$a = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['btn'])) {
    $name = $_POST['ten_sp'];
    $img = $_POST['img_sp'];
    $price = $_POST['price_sp'];
    $color = $_POST['color_sp'];
    $menu = $_POST['menu_sp'];
    $gender = $_POST['gender_sp'];
    if (empty($name)) {
      $a1 = "Bạn chưa nhập tên";
    }
    if (!empty($name) && !empty($img) && !empty($price) && !empty($color) && !empty($gender) && !empty($menu)) {
      $sql1 = "INSERT INTO `sanpham`(`ten_sp`,`menu`,`img_sp`,`price_sp`,`color_sp`,`gender`) 
        VALUES('$name','$menu','$img','$price','$color','$gender')";
      if ($conn->query($sql1) === TRUE) {
        $a = "Thêm dữ liệu thành công";
      } else {
        $a = "Lỗi {$sql1}" . $conn->error;
      }
    }
  } else {
    $a = "Chưa nhập đủ thông tin";
  }
}
$conn->close();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
  <link rel="stylesheet" href="CSS/them.css">
  <link rel="icon" href="https://pubcdn.ivymoda.com/ivy2/images/logo-icon.ico" type="image/png" sizes="16x16">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <script src="JS/dangnhap.js"></script>
  <script src="JS/thongbao.js"></script>
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
      <li><a class="fa-solid fa-basket-shopping" href="giohang.php" id="gh" style="display: none;font-size: 25px;" title="Giỏ hàng"></a></li>
      <li>
        <a class="fa-solid fa-user" id="register" title="Đăng ký" href="dangky.php" style="font-size: 25px;"></a>
      </li>
      <li>
        <i>
          <a href="dangnhap.php" class="fa-regular fa-user" title="Đăng nhập" style="font-size: 25px; " id="login"></a>
        </i>
      </li>
      <li id="logout" style="position: relative; right: 60px;display: none;">
        <a class="fas fa-sign-out-alt" onclick="logout()" style="font-size:25px" title="Đăng xuất" href="trangchu.php"></a>
      </li>
    </div>
    <script src="JS/home_page.js" defer></script>
  </header>
  <section class="sc" - style="height: 550;">
    <form class="div2" method="POST" id="div2-form">
      <div class="form-group">
        <label for="ten_sp">Tên sản phẩm</label>
        <input type="text" id="ten_sp" name="ten_sp" required>
      </div>
      <div class="form-group">
        <label for="price_sp">Giá sản phẩm</label>
        <input type="text" id="price_sp" name="price_sp" required>
      </div>
      <div class="form-group">
        <label for="color_sp">Màu sản phẩm</label>
        <input type="text" id="color_sp" name="color_sp" style="margin-left:65px;" required>
      </div>
      <div class="form-group">
        <label>Danh mục</label>
        <select name="menu_sp" id="" style="margin-left:95px;">
          <option value="Quần" name="">Quần </option>
          <option value="Áo" name="">Áo</option>
        </select>
      </div>
      <div class="form-group">
        <label>Sản phẩm dành cho</label>
        <select name="gender_sp" id="" style="margin-left:30px;">
          <option value="male" name="">Nam </option>
          <option value="female" name="">Nữ</option>
        </select>
      </div>
      <div class="form-group">
        <label for="img_sp">Ảnh sản phẩm</label>
        <input type="file" id="img_sp" name="img_sp" required>
      </div>
      <button name="btn">THÊM</button>
      <div class="form-group" style="margin-left:200px,">
        <?php echo $a; ?>
      </div>
      <a href="admin.php" style="text-decoration: none;color:blue ;font-size:20px;margin:30px 0px 0px 50px" title="Quay lại trang admin">Quay lại trang admin</a>
    </form>
  </section>
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