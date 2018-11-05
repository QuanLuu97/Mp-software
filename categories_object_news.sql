-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2018 lúc 08:31 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

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
-- Cấu trúc bảng cho bảng `categories_object_news`
--

CREATE TABLE `categories_object_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `category_slug` tinytext,
  `news_id` int(11) NOT NULL,
  `news_title` varchar(191) NOT NULL,
  `news_slug` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories_object_news`
--

INSERT INTO `categories_object_news` (`id`, `category_id`, `category_name`, `category_slug`, `news_id`, `news_title`, `news_slug`) VALUES
(385, 3, 'team java', 'team-java', 84, 'Huong dan lam viec nhom hieu qua?-', 'Huong-dan-lam-viec-nhom-hieu-qua-'),
(386, 5, 'team PHP', 'team-PHP', 83, 'Vi sao gia cong phan mem CNTT la su lua chon hoan hao', 'Vi-sao-gia-cong-phan-mem-CNTT-la-su-lua-chon-hoan-hao'),
(389, 10, 'tester Java', 'tester-Java', 6, 'プログラマーにとって良い環境は何ですか？', 'プログラマーにとって良い環境は何ですか？'),
(390, 20, 'tester PHP', 'tester-PHP', 7, '日本市場に精通したIT', '日本市場に精通したIT'),
(391, 9, 'team IT', 'team-IT', 9, 'なぜITをアウトソーシングするのが最適な選択ですか', 'なぜITをアウトソーシングするのが最適な選択ですか'),
(392, 12, 'coder PHP', 'coder-PHP', 9, 'なぜITをアウトソーシングするのが最適な選択ですか', 'なぜITをアウトソーシングするのが最適な選択ですか'),
(393, 10, 'tester Java', 'tester-Java', 35, 'プログラマーにチームで働くように指示する', 'プログラマーにチームで働くように指示する'),
(394, 8, 'coder Java', 'coder-Java', 79, 'Lam the nao đe tang nang suat lap trinh vien', 'Lam-the-nao-đe-tang-nang-suat-lap-trinh-vien'),
(395, 12, 'coder PHP', 'coder-PHP', 79, 'Lam the nao đe tang nang suat lap trinh vien', 'Lam-the-nao-đe-tang-nang-suat-lap-trinh-vien'),
(396, 3, 'team java', 'team-java', 81, 'Đau la moi truong thuc su tot đe Lap trinh vien phat trien', 'Đau-la-moi-truong-thuc-su-tot-đe-Lap-trinh-vien-phat-trien'),
(397, 4, 'team HR', 'team-HR', 81, 'Đau la moi truong thuc su tot đe Lap trinh vien phat trien', 'Đau-la-moi-truong-thuc-su-tot-đe-Lap-trinh-vien-phat-trien'),
(401, 3, 'team java', 'team-java', 82, 'Con “khat” nhan su nganh IT trong thi truong Nhat', 'Con-“khat”-nhan-su-nganh-IT-trong-thi-truong-Nhat'),
(402, 5, 'team PHP', 'team-PHP', 82, 'Con “khat” nhan su nganh IT trong thi truong Nhat', 'Con-“khat”-nhan-su-nganh-IT-trong-thi-truong-Nhat'),
(403, 11, 'team C#', 'team-C', 82, 'Con “khat” nhan su nganh IT trong thi truong Nhat', 'Con-“khat”-nhan-su-nganh-IT-trong-thi-truong-Nhat'),
(404, 11, 'team C#', 'team-C', 80, 'Hoc tieng^ Nh%^&-at IT nhu the nao la hieu qua', 'Hoc-tieng-Nh-at-IT-nhu-the-nao-la-hieu-qua'),
(405, 13, 'team Front-end', 'team-Front-end', 80, 'Hoc tieng^ Nh%^&-at IT nhu the nao la hieu qua', 'Hoc-tieng-Nh-at-IT-nhu-the-nao-la-hieu-qua'),
(407, 20, 'tester PHP', 'tester-PHP', 5, '日本語を学ぶITそれはいかに効果的ですか', '日本語を学ぶITそれはいかに効果的ですか'),
(408, 4, 'team HR', 'team-HR', 5, '日本語を学ぶITそれはいかに効果的ですか', '日本語を学ぶITそれはいかに効果的ですか');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories_object_news`
--
ALTER TABLE `categories_object_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories_object_news`
--
ALTER TABLE `categories_object_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
