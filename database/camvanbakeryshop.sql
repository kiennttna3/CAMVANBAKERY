-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 28, 2023 lúc 08:29 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `camvanbakeryshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageUrl` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `click_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `imageUrl`, `price`, `click_count`) VALUES
(1, 'Bánh 1', 'assets/img/1693021008_1.jpg', 200000, 0),
(2, 'Bánh 2', 'assets/img/1693021014_2.jpg', 200000, 0),
(3, 'Bánh 3', 'assets/img/1693021021_3.jpg', 100000, 0),
(4, 'Bánh 4', 'assets/img/1693021028_4.jpg', 500000, 0),
(5, 'Bánh 5', 'assets/img/1693021036_5.jpg', 100000, 0),
(6, 'Bánh 6', 'assets/img/1693021044_6.jpg', 300000, 0),
(7, 'Bánh 7', 'assets/img/1693021052_7.jpg', 300000, 0),
(8, 'Bánh 8', 'assets/img/1693021059_8.jpg', 180000, 0),
(9, 'Bánh 9', 'assets/img/1693021068_9.jpg', 300000, 0),
(10, 'Bánh 10', 'assets/img/1693021076_10.jpg', 400000, 0),
(11, 'Bánh 11', 'assets/img/1693021093_11.jpg', 300000, 0),
(12, 'Bánh 12', 'assets/img/1693021114_12.jpg', 300000, 0),
(14, 'Bánh 13', 'assets/img/1693021267_13.jpg', 200000, 0),
(15, 'Bánh 14', 'assets/img/1693021289_14.jpg', 400000, 0),
(16, 'Bánh 15', 'assets/img/1693021300_15.jpg', 100000, 0),
(17, 'Bánh 16', 'assets/img/1693021313_16.jpg', 500000, 0),
(18, 'Bánh 17', 'assets/img/1693021333_17.jpg', 380000, 0),
(19, 'Bánh 18', 'assets/img/1693035089_18.jpg', 350000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phonenumber` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `phonenumber`, `password`) VALUES
(1, '0394498626', '123'),
(2, '0919155769', '123'),
(42, '0981320222', '123'),
(43, '0384666222', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
