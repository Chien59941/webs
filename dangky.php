<?php
include 'database/connect.php';

if (isset($_POST['but'])) {
  $tk = $_POST['username'];
  $mk = $_POST['password'];
  $hoten = $_POST['name'];
  $email = $_POST['email'];
  $sdt = $_POST['sdt'];
  $ngaysinh = $_POST['ngaysinh'];
  $gender = $_POST['gender'];
  $diachi = $_POST['address'];
  $repass = $_POST['repass'];

  // Kiểm tra độ dài mật khẩu
  if (strlen($mk) < 6) {
    echo "<script>alert('Mật khẩu không đủ 6 ký tự. Vui lòng thử lại!');</script>";
  } else {
    // Kiểm tra mật khẩu và repassword có khớp không
    if ($mk !== $repass) {
      echo "<script>alert('Mật khẩu không trùng nhau. Vui lòng thử lại!');</script>";
    } else {
      // Kiểm tra kết nối trước khi thực hiện truy vấn
      if ($conn) {
        // Kiểm tra xem username hoặc email đã tồn tại chưa
        $check_user = $conn->prepare("SELECT * FROM taikhoan WHERE tk = ? OR email = ?");
        $check_user->bind_param("ss", $tk, $email);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
          // Tài khoản hoặc email đã tồn tại
          echo "<script>alert('Tài khoản hoặc email đã tồn tại. Vui lòng thử lại!');</script>";
        } else {
          // Mã hóa mật khẩu trước khi lưu
          $hashed_password = password_hash($mk, PASSWORD_DEFAULT);

          // Thực hiện đăng ký nếu chưa tồn tại
          $stmt = $conn->prepare("INSERT INTO taikhoan(tk, mk, hoten, email, sdt, date, gender, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssss", $tk, $hashed_password, $hoten, $email, $sdt, $ngaysinh, $gender, $diachi);

          if ($stmt->execute()) {
            // Hiển thị thông báo đăng ký thành công
            echo "<script>alert('Bạn đã đăng ký thành công!'); window.location.href = 'dangnhap.php';</script>";
          } else {
            // Hiển thị thông báo lỗi khi đăng ký
            echo "<script>alert('Đăng ký thất bại: " . $stmt->error . "');</script>";
          }

          // Đóng statement
          $stmt->close();
        }

        // Đóng statement kiểm tra
        $check_user->close();
      } else {
        // Hiển thị thông báo lỗi kết nối
        echo "<script>alert('Không thể kết nối đến cơ sở dữ liệu.');</script>";
      }
    }
  }

  // Đóng kết nối
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản | IVY moda</title>
  <link rel="stylesheet" href="CSS/dangky.css">
  <link rel="icon" href="https://pubcdn.ivymoda.com/ivy2/images/logo-icon.ico" type="image/png" sizes="16x16">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
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
  <section class="sc">
    <div>
      <p style="text-align: center; font-size: 25px;"> <b>ĐĂNG KÝ</b> </p>
    </div>
    <form action="" method="POST">
      <div class="ttkh">
        <p class="tt">Thông tin cá nhân</p>
        <div class="form-group">
          <label for="name">Họ tên:</label>
          <input type="text" id="name" name="name" placeholder="Họ và tên..." required>
          <div class="help-text"></div>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Email..." required>
          <div class="help-text"></div>
        </div>

        <div class="form-group">
          <label for="sdt">Số điện thoại:</label>
          <input type="tel" id="sdt" name="sdt" placeholder="Số điện thoại..." required>
          <div class="help-text"></div>
        </div>

        <div class="form-group">
          <label for="ngaysinh">Ngày sinh:</label>
          <input type="date" id="ngaysinh" name="ngaysinh">
          <div class="help-text"></div>
        </div>

        <div class="form-group">
          <label for="gender">Giới tính:</label>
          <select name="gender" id="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
          </select>
          <div class="help-text"></div>
        </div>
        <div class="form-group">
          <label for="address">Địa chỉ:</label>
          <textarea id="address" name="address" placeholder="Nhập địa chỉ của bạn..."></textarea>
        </div>
      </div>

      <div class="ttmk">
        <!-- Thông tin tài khoản -->
        <p class="tt">Thông tin đăng ký</p>

        <div class="form-group">
          <label for="username">Tên đăng nhập:</label>
          <input type="text" id="username" name="username" placeholder="Tên đăng nhập..." required>
          <div class="help-text"></div>
        </div>

        <div class="form-group">
          <label for="password">Mật khẩu:</label>
          <input type="password" id="password" name="password" placeholder="Mật khẩu..." required>
          <div class="help-text"></div>
        </div>

        <div class="form-group">
          <label for="repass">Nhập lại mật khẩu:</label>
          <input type="password" id="repass" name="repass" placeholder="Nhập lại mật khẩu..." required>
          <div class="help-text"></div>
        </div>

        <button type="submit" id="btn" name="but">Đăng ký</button>
        <p style="text-align: center;">Bạn đã có tài khoản?
          <a class="dangnhap" href="dangnhap.php">Đăng nhập</a>

        </p>
      </div>
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