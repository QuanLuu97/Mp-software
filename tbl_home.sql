-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2018 lúc 06:22 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_home`
--

CREATE TABLE `tbl_home` (
  `title` varchar(191) NOT NULL,
  `description` tinytext,
  `content` text,
  `images` tinytext,
  `status` tinyint(4) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_home`
--

INSERT INTO `tbl_home` (`title`, `description`, `content`, `images`, `status`, `id`) VALUES
('Hello, world.', '<h1>ARE YOU READY<br />\r\nTO MAKE IT AWESOME<br />\r\nWITH US?</h1>', NULL, '[\"banner-jp.jpg\"]', 1, 1),
('Who are you?', NULL, '<p>MP Software is a full-service software company based in Hanoi, Vietnam, having two branches in Da Nang and Ho Chi Minh cities, an overseas branch in Japan.</p><p>We provide a wide range of outsourcing services from web solutions to software QA &amp; Testing and Mobility. We deliver quality-centric, cost efficient and vigorous software development solutions with the help of inventive ideas integrated with coherent strategy, cutting edge technologies &amp; user-friendly designs that facilitate the customers to renovate their business.</p>\r\n<p>The most important matter for us is to do things in the best way, to build trust and exceed expectations. We rely mainly on the people&rsquo;s skills and the constant desire for improvement. Our team believes that devotion, collaboration and friendship are the key factors of our success. The success comes as natural result of the win-win relationships with our customers and employees.</p>', '[\"whoareyou.jpg\"]', 1, 2),
('Core values', '<h1>&ldquo;People - Process - Technology&rdquo;</h1>', '<p>MP Software is a full-service software company based in Hanoi, Vietnam, having two branches in Da Nang and Ho Chi Minh cities, an overseas branch in Japan. We provide a wide range of outsourcing services from web solutions to software QA & Testing and Mobility.  </p>', NULL, 1, 3),
('Case studies', '<h1>Case studies</h1>', '<h2>PROCUREMENT</h2>\r\n<p>Procurement application is a mobile app which used to help businesses to make requests, approvals, and purchases from various internet-connected device, provide procurement information, selection plan for bidders and bid results</p>\r\n\r\n<p>This application assist in supplier selection, the analysis of supplier performance, and the establishment of the terms of bid to balance cost, quality and risk</p>\r\n\r\n<p>&bull; Helps users on all requisitions,bid orders, and expenses. The bid order processing system is designed to offer a user experience similar to online shopping...</p>\r\n', '[\"i-iphone.png\"]', 1, 4),
('News', NULL, NULL, NULL, 1, 5),
('Services', NULL, NULL, '[\"image-service.jpg\"]', 1, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
