-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2024 lúc 07:05 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `menu` enum('Quần','Áo') NOT NULL,
  `img_sp` varchar(30) NOT NULL,
  `price_sp` int(11) NOT NULL,
  `color_sp` varchar(15) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `menu`, `img_sp`, `price_sp`, `color_sp`, `gender`) VALUES
(1, 'Knit Polo - Áo len cổ đức', 'Áo', 'ao-len-co-duc.jfif', 600000, 'Đen', 'male'),
(2, 'Áo thun polo dài tay', 'Áo', 'polo-dai-tay.jpg', 700000, 'Đen', 'male'),
(3, 'Quần Jeans Regular Smart', 'Quần', 'jeans-regular-smart.jpg', 800000, 'Xanh ghi đá', 'male'),
(4, 'Quần Jogger khaki phối túi', 'Quần', 'jogger-be-vang.jpg', 400000, 'Be vàng', 'male'),
(5, 'Áo sơ mi lụa cổ đổ Lucille', 'Áo', 'so_mi-co_do_lucille.webp', 950000, 'Trắng ngà', 'female'),
(6, 'Áo thun vân hoa', 'Áo', 'ao-thun-van-hoa.webp', 553000, 'Đen', 'female'),
(7, 'Áo thun ôm LONG SLEEVE', 'Áo', 'ao-thun-om-long-sleeve.webp', 525000, 'Nâu đen', 'female');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `tk` varchar(15) NOT NULL,
  `mk` varchar(150) NOT NULL,
  `hoten` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `gender` enum('Nam','Nữ') NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `tk`, `mk`, `hoten`, `email`, `sdt`, `date`, `gender`, `location`) VALUES
(3, 'acbh', '$2y$10$C35kkHIF', 'aaa', 'ab@gmail.com', '0000000000', '2024-11-21', 'Nam', 'VN'),
(4, '11111111', '$2y$10$Wbd.cGLJcAyRDSIAg0vBJ.Cnmu/KjtQrpAWVDxCM/7HwPltk6m3b2', 'aaaaaaaaaaa', 'bbbbbb12bb@gmail.com', '0000000000', '2024-11-19', 'Nam', 'vnb');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
