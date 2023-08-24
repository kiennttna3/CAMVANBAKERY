-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2023 lúc 01:14 PM
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
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `imageUrl`, `price`) VALUES
(1, 'Bánh trung thu', 'assets/img/1692796328_banhmousse1.jpg', 200000),
(2, 'Bánh trung thu', 'assets/img/1692796338_banhmousse2.jpg', 200000),
(3, 'Bánh Ngọt', 'assets/img/1692795423_banhmousse8.jpg', 100000),
(4, 'Bánh gato', 'assets/img/1692795460_banhmousse7.jpg', 500000),
(5, 'Bánh tình yêu', 'assets/img/1692795541_banhmousse5.jpg', 100000),
(6, 'Bánh trung thu', 'assets/img/1692795559_banhmousse2.jpg', 300000),
(7, 'Bánh ngọt cv', 'assets/img/1692795590_banhmousse8.jpg', 300000),
(8, 'Bánh nộm', 'assets/img/1692795605_banhmousse6.jpg', 180000),
(9, 'Bánh đâu xanh', 'assets/img/1692795617_banhmousse3.jpg', 300000),
(10, 'Bánh em đẹp lắm', 'assets/img/1692795990_banhmousse1.jpg', 4000000),
(11, 'Bánh mỳ', 'assets/img/1692796012_banhmykhongem.jpg', 300000),
(12, 'Bánh sú', 'assets/img/1692796366_banhmousse4.jpg', 300000000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
