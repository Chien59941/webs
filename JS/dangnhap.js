// Hàm đăng nhập
function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    // Kiểm tra nếu username và password không phải là null hoặc chuỗi rỗng
    if (username && password) {
        // Lưu trạng thái đăng nhập vào sessionStorage thay vì localStorage
        sessionStorage.setItem('isLoggedIn', 'true');
        sessionStorage.setItem('username', username);
        // Kiểm tra tài khoản admin
        if (username === "admin" && password === "123456") {
            // Hiển thị các phần tử quản trị viên
            toggleAdminElements(true);
        } else {
            // Ẩn các phần tử quản trị viên
            toggleAdminElements(false);
        }
        // Hiển thị phần tử giỏ hàng
        document.getElementById('gh').style.display = "block";
        // Ẩn nút "Đăng nhập", "Đăng ký" và hiển thị nút "Đăng xuất"
        toggleAuthElements(true);
    } else {
        alert("Tên đăng nhập và mật khẩu không thể để trống!");
    }
}
// Hàm kiểm tra trạng thái đăng nhập khi tải trang
function checkLoginStatus() {
    const isLoggedIn = sessionStorage.getItem('isLoggedIn');
    const username = sessionStorage.getItem('username');
    if (isLoggedIn === 'true') {
        // Nếu đã đăng nhập, hiển thị các phần tử và nút "Đăng xuất"
        toggleAuthElements(true);
        document.getElementById('gh').style.display = "block"; // Hiển thị phần tử giỏ hàng
        // Kiểm tra nếu là admin
        if (username === "admin") {
            toggleAdminElements(true);
        } else {
            toggleAdminElements(false);
        }
    } else {
        // Nếu chưa đăng nhập, hiển thị các nút "Đăng nhập" và "Đăng ký"
        toggleAuthElements(false);
        toggleAdminElements(false);
        document.getElementById('gh').style.display = "none"; // Ẩn phần tử giỏ hàng
    }
}
// Hàm đăng xuất
function logout() {
    // Xóa trạng thái đăng nhập và username khỏi sessionStorage
    sessionStorage.removeItem('isLoggedIn');
    sessionStorage.removeItem('username');
    // Ẩn các phần tử quản trị viên và hiển thị lại nút "Đăng nhập"
    toggleAdminElements(false);
    toggleAuthElements(false);
    document.getElementById('gh').style.display = "none"; // Ẩn phần tử giỏ hàng
}
// Hàm hiển thị/ẩn các phần tử quản trị viên
function toggleAdminElements(isAdmin) {
    const display = isAdmin ? "block" : "none";
    document.getElementById('admin').style.display = display;
}
// Hàm hiển thị/ẩn các nút "Đăng nhập", "Đăng ký", "Đăng xuất"
function toggleAuthElements(isLoggedIn) {
    const displayLogin = isLoggedIn ? "none" : "block";
    const displayLogout = isLoggedIn ? "block" : "none";
    document.getElementById('login').style.display = displayLogin;
    document.getElementById('register').style.display = displayLogin;
    document.getElementById('logout').style.display = displayLogout;
}
// Đảm bảo kiểm tra trạng thái khi tải trang
window.onload = checkLoginStatus;