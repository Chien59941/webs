<?php
require 'database/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  $id = $_POST['id'];
  $id_int = (int)$id;
  $sql = "SELECT id_sp FROM sanpham WHERE id_sp = $id_int";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $sql = "DELETE FROM sanpham WHERE id_sp = $id_int";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Xóa thành công');</script>";
    } else {
      echo "<script>alert('Xóa thất bại');</script>";
    }
  } else {
    echo "<script>alert('Không tìm thấy ID này');</script>";
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="CSS/admin.css">
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
  </header>
  <section class="sc">
    <button style="margin: 0px 0px 0px 200px;width: 200px;height: 40px; font-size: 20px;">
      <a class="a1" href="them.php">Thêm sản phẩm</a>
    </button>
    <table class="tbl1">
      <thead>
        <tr>
          <th class="th1" rowspan="2" style="width: 10px;">ID</th>
          <th class="th1" rowspan="2">Ảnh </th>
          <th class="th1" rowspan="2">Tên </th>
          <th class="th1" rowspan="2" style="width: 20px;">Loại </th>
          <th class="th1" rowspan="2">Màu </th>
          <th class="th1" rowspan="2">Giá </th>
          <th class="th1" rowspan="2" style="width: 10px;">Dành cho</th>
          <th class="th1" style="width: 10px;" rowspan="2">Sửa</th>
          <th class="th1" style="width: 10px;" rowspan="2">Xoá</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql1 = "SELECT * FROM sanpham";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result1)) {
        ?>
          <tr>
            <td class="td1" style="width: 10px;">
              <input class="input_sp" readonly style="width: 20px;" type="text" value="<?php echo $row['id_sp']; ?>" name="id">
            </td>
            <td class="td1">
              <img class="imgsp1" src="Images/<?php echo htmlspecialchars($row['img_sp']); ?>" alt="Áo gì đó">
            </td>
            <td class="td1">
              <div class="option">
                <input class="input_sp" style="width:250px" disabled type="text" value="<?php echo htmlspecialchars($row['ten_sp']); ?>">
              </div>
            </td>
            <td class="td1" style="width: 20px;">
              <div class="option">
                <input class="input_sp" style="width: 40px;" disabled type="text" value="<?php echo $row['menu']; ?>">
              </div>
            </td>
            <td class="td1">
              <div class="option">
                <input class="input_sp" disabled type="text" value="<?php echo $row['color_sp']; ?>">
              </div>
            </td>
            <td class="td1">
              <div class="option">
                <input class="input_sp" style="width: 70px;" disabled type="text" value="<?php echo $row['price_sp']; ?>">
              </div>
            </td>
            <td class="td1" style="width: 10px;">
              <div class="option">
                <input class="input_sp" style="width: 50px;" disabled type="text" value="<?php echo $row['gender']; ?>">
              </div>
            </td>
            <td class="td1" style="width: 10px;">
              <a class="a1" href="sua.php?id=<?php echo $row['id_sp']; ?>">Sửa</a>
            </td>
            <td class="td1" style="width: 10px;">
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id_sp']; ?>">
                <input class="a1" type="submit" style="background-color: white;" name="delete" value="Xoá">
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
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