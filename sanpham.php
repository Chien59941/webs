<?php
require 'database/connect.php';
$sql = "SELECT * FROM sanpham WHERE id_sp = '" . $_GET['id'] . "' LIMIT 1";
$query = mysqli_query($conn, $sql);
while ($row1 = mysqli_fetch_array($query)) {
?>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="CSS/sanpham.css">
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
            <a href="dangnhap.php" class="fa-regular fa-user" title="Đăng nhập" style="margin-top: 1px; " id="login"></a>
          </i>
        </li>
        <li id="logout" style="position: relative; right: 60px;display: none;">
          <a class="fas fa-sign-out-alt" onclick="logout()" title="Đăng xuất" href="trangchu.php"></a>
        </li>
      </div>
      <script src="JS/home_page.js" defer></script>
    </header>
    <section class="products">
      <form class="container" method="post" action="thanhtoan.php?id=<?php echo $row1['id_sp'] ?>">
        <div class="product-left">
          <div>
            <img class="img1" name="img" src="Images/<?php echo htmlspecialchars($row1['img_sp']); ?>" alt="">
          </div>
        </div>
        <div class="product-right">
          <div class="">
            <input style="font-size: 34px;border:none;" disabled name="ten" value="<?php echo htmlspecialchars($row1['ten_sp']); ?>">
          </div>
          <div>
            <input type="text" disabled name="price" value="<?php echo number_format($row1['price_sp'], 0, ',', '.') . "&#8363;"; ?>" style="font-size: 20px;font-weight: bold;border: none;background-color: white;" disabled>
          </div>
          <div style="margin:20px 0px 20px 0px">
            <input style="font-size: 20px; border:none;" disabled name="color" value="<?php echo $row1['color_sp'] ?>">
          </div>
          <div style="flex-direction: column;">
            <input style=" height:30px; font-size:20px;border: 1px solid black;" type="text" name="size" placeholder="Nhập size">
            <p style="font-size:15px">Các loại kích cỡ như S,M,L,XL,XXL</p>
          </div>
          <div style="flex-direction: row;display: flex;">
            <p style="margin-right: 10px;">Số lượng </p>
            <input type="text" style="border: 1px solid black;width:150px;" placeholder="Nhập số lượng" name="num" id="num1" class="ip1">
          </div>
          <br>
          <div style="flex-direction: row; width: auto; height: auto;">
            <button style="font-size: 20px;" class="btn1" name="btn1">
              Thanh toán
            </button>
          </div>
        </div>
      <?php } ?>
      </form>
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