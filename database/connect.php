<?php
// Khai báo biến lưu trữ thông tin kết nối đến cơ sở dữ liệu
$host = "localhost";  
$username = "root";   // Tên người dùng để kết nối MySQL (thường là 'root' trong môi trường phát triển)
$password = "";       // Mật khẩu của người dùng MySQL (trong trường hợp này không có mật khẩu)
$dbname = "webs";     // Tên cơ sở dữ liệu mà bạn muốn kết nối

// Tạo đối tượng kết nối MySQL sử dụng thông tin trên
$conn = new mysqli($host, $username, $password, $dbname);
// Kiểm tra xem có lỗi trong quá trình kết nối không
if($conn->connect_error) {// Nếu có lỗi,
    die("Kết nối ko đc" . $conn->connect_error); // hiển thị thông báo lỗi
}
?>
