// Lấy tất cả các thẻ <img> trong phần tử có class "aspect-ratio-169"
const imgposition = document.querySelectorAll(".aspect-ratio-169 img");
// Lấy phần tử chứa các ảnh (phần tử có class "aspect-ratio-169")
const imgcontainer = document.querySelector('.aspect-ratio-169');
// Khởi tạo chỉ số ảnh hiện tại (bắt đầu từ ảnh đầu tiên)
let index = 0;
// Lấy số lượng ảnh trong slider
let imgNumber = imgposition.length;
// Duyệt qua tất cả các ảnh và thiết lập vị trí "left" cho từng ảnh
imgposition.forEach(function(image, index){
    // Đặt mỗi ảnh ở vị trí ngang cách nhau 100% chiều rộng ảnh
    image.style.left = index * 100 + "%";
});
// Hàm xử lý việc chuyển ảnh
function imgSlide() {
    // Tăng giá trị chỉ số ảnh hiện tại
    index++;
    // Nếu chỉ số ảnh vượt qua số lượng ảnh, quay lại ảnh đầu tiên
    if(index >= imgNumber) {
        index = 0; // Reset về ảnh đầu tiên
    }
    // Di chuyển container của các ảnh sang trái theo giá trị của index
    imgcontainer.style.left = "-" + index * 100 + "%"; // Dịch chuyển container sang trái 100% chiều rộng mỗi ảnh
}
// Thiết lập interval để tự động gọi hàm imgSlide mỗi 5 giây (5000ms)
setInterval(imgSlide, 5000);
