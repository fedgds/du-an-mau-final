-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2023 lúc 07:00 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau2023`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `ngaybinhluan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idproduct`, `ngaybinhluan`) VALUES
(44, 'Tuyet voi', 1, 10, '2023-10-15'),
(45, 'Phở bò ngon', 23, 9, '2023-10-16'),
(66, 'ok', 1, 11, '2023-10-20'),
(92, 'nh', 1, 21, '2023-10-23'),
(93, 'ngon lam', 1, 21, '2023-10-23'),
(98, 'e', 1, 21, '2023-10-23'),
(99, 'Rẻ thế', 39, 21, '2023-10-23'),
(100, '1', 40, 22, '2023-10-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Phở'),
(2, 'Bún'),
(3, 'Xôi'),
(4, 'Bánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `img` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `status`, `iddm`) VALUES
(1, 'Bún mắm hải sản', 30000.00, 'bunmanhaisan.jpg', 'Bún mắm hải sản tươi vị hải sản', 21, 0, 2),
(2, 'Xôi ruốc', 140000.00, 'xoiruoc.jpg', 'Xôi ruốc, món ăn giản dị mỗi sáng', 94, 0, 3),
(3, 'Bún bò Huế', 180000.00, 'bunbohue.webp', 'Bún bò Huế mang hương vị Huế đi khắp các miền.', 11, 0, 4),
(6, 'Xôi gà', 140000.00, 'xoiga.jpg', 'Xôi gà mang đến hương vị tuổi thơ', 8, 0, 3),
(7, 'Bún nước lèo', 180000.00, 'bunnuocleo.jpg', 'Bún nước lèo, ngọt vị nước', 102, 0, 2),
(8, 'Phở gà', 300000.00, 'phoga.jpg', 'Phở gà thơm ngon', 157, 0, 1),
(9, 'Phở bò', 140000.00, 'phobo.jfif', 'Phở bò rất tuyệt!', 26, 0, 1),
(10, 'Bún chả', 180000.00, 'buncha.jpg', 'Bún chả, món ăn ngon nhất thế giới', 122, 0, 2),
(11, 'Hamburger', 70000.00, 'hamburger.jpg', 'Hamburger tuyệt cú mèo', 206, 0, 4),
(21, 'Bánh mì nem nướng', 30000.00, 'banhminemnuong.jpg', 'Bánh mì nem nướng ngon tuyệt!', 48, 0, 4),
(22, 'Bánh tráng', 15000.00, 'banhtrang.webp', 'Bánh tráng chống đói!', 20, 0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `vaitro` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `img`, `vaitro`) VALUES
(1, 'admin', '123', 'admin@fpt.edu.vn', 'Nam từ liem', 'boxaolalot.jpg', 2),
(7, 'admin12', '123', 'sangokyes@gmail.com', 'cam thượng', 'Sang Food.png', 1),
(17, 'user', '111', 'sangoc@gmail.com', 'cam thượng', 'sleep.jpg', 1),
(23, 'khach', 'kkkk', 'a@gmail.c', 'cam thượngg', 'sleep.jpg', 0),
(30, 'sang', 'kkk', 'sangokyes@gmail.com', 'cam thượng', 'sad.png', 0),
(37, 'kim', '123', 'as12@s.c', 'ha noi', 'eleceed.jpg', 1),
(38, 'abc', 'ddd', 'a@gb.com', 'Việt ', 'bunnuocleo.jpg', 0),
(39, 'ass', '222', 'a@ss.com', 'ha noi', 'eleceed.jpg', 0),
(40, 'aaaa', '111', 'a@b.com', 'cam thượng', 'bunbohue.webp', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpro` (`idproduct`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idproduct`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
