-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2018 lúc 12:31 PM
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
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'clothing', 0, 1, 0, NULL, NULL),
(2, 'men', 1, 1, 0, NULL, NULL),
(3, 'suits', 2, 1, 0, NULL, NULL),
(4, 'women', 1, 1, 0, NULL, NULL),
(5, 'jackets', 2, 1, 0, NULL, NULL),
(6, 'skirts', 4, 1, 0, NULL, NULL),
(7, 'dresses', 4, 1, 0, NULL, NULL),
(8, 'SunDress', 7, 1, 0, NULL, NULL),
(9, 'shoes', 4, 1, 0, NULL, NULL),
(10, 'slacks', 3, 1, 0, NULL, NULL),
(11, 'short', 2, 1, 0, NULL, NULL),
(12, 'Blouses', 4, 0, 0, NULL, NULL),
(13, 'T-shirt', 2, 1, 0, NULL, NULL),
(20, 'tất', 10, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_news`
--

CREATE TABLE `category_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `news_id` int(11) NOT NULL,
  `news_title` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category_news`
--

INSERT INTO `category_news` (`id`, `category_id`, `category_name`, `news_id`, `news_title`) VALUES
(88, 3, 'suits', 51, 'VuLe0906'),
(89, 10, 'slacks', 51, 'VuLe0906'),
(90, 20, 'tất', 51, 'VuLe0906'),
(91, 5, 'jackets', 51, 'VuLe0906'),
(143, 20, 'tất', 5, 'uchiha itachi'),
(144, 4, 'women', 5, 'uchiha itachi'),
(157, 10, 'slacks', 55, 'Quan NN'),
(227, 5, 'jackets', 7, 'hatake kakashi'),
(229, 10, 'slacks', 6, 'garaaa'),
(233, 1, 'clothing', 2, 'Naruto shipuchan'),
(234, 20, 'tất', 2, 'Naruto shipuchan'),
(235, 5, 'jackets', 2, 'Naruto shipuchan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `form`
--

CREATE TABLE `form` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_09_19_020506_news', 1),
(12, '2018_09_01_153459_from', 2),
(13, '2018_10_10_040326_news_tag', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `description`, `content`, `date`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Naruto shipuchan', '1.jpg', NULL, '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/3.jpg\" style=\"height:200px; width:200px\" /></p>\n\n<p>Hiding from The Rain and Snow *&nbsp;<br />\nTrying to forget but I won&#39;t let go&nbsp;<br />\nLooking at a crowded street&nbsp;<br />\nListening to my own heart beat&nbsp;</p>\n\n<p>Hiding from The Rain and Snow *&nbsp;<br />\nTrying to forget but I won&#39;t let go&nbsp;<br />\nLooking at a crowded street&nbsp;<br />\nListening to my own heart beat&nbsp;</p>\n\n<p>Hiding from The Rain and Snow *&nbsp;<br />\nTrying to forget but I won&#39;t let go&nbsp;<br />\nLooking at a crowded street&nbsp;<br />\nListening to my own heart beat&nbsp;</p>', '2018-09-20', 0, 0, NULL, NULL),
(5, 'uchiha itachi', '5.jpg', NULL, '<p>Take me to your heart take me to your soul&nbsp;<br />\nGive me your hand and hold me&nbsp;<br />\nShow me what love is - be my guiding star&nbsp;<br />\nIt&#39;s easy take me to your heart&nbsp;</p>', '2018-01-02', 0, 0, NULL, NULL),
(6, 'garaaa', '3.jpg', NULL, '<p>Standing on a mountain high&nbsp;<br />\nLooking at the moon through a clear blue sky&nbsp;<br />\nI should go and see some friends&nbsp;<br />\nBut they don&#39;t really comprehend&nbsp;</p>', '2018-09-20', 0, 0, NULL, NULL),
(7, 'hatake kakashi', '4.jpg', NULL, '<p>Take me to your heart, take me to your soul&nbsp;<br />\nGive me your hand before I&#39;m old&nbsp;<br />\nShow me what love is - haven&#39;t got a clue&nbsp;<br />\nShow me that wonders can be true&nbsp;</p>', '2018-09-23', 0, 0, NULL, NULL),
(9, 'uchiha Madara', '6.jpg', NULL, '<p>The title of the modal, as HTML. It can either be added to the object under the key &quot;title&quot; or passed as the first parameter of the function.</p>', '2018-09-26', 0, 0, NULL, NULL),
(35, 'uzumaki_boruto', '7.jpg', NULL, '<p>Select2 will register itself as a jQuery function if you use any of the distribution builds, so you can call&nbsp;<code>.select2()</code>&nbsp;on any jQuery selector where you would like to initialize Select2.</p>', '2018-10-09', 0, 0, NULL, NULL),
(36, 'hinata', '2.jpg', NULL, '<p>Select2 will register itself as a jQuery function if you use any of the distribution builds, so you can call&nbsp;<code>.select2()</code>&nbsp;on any jQuery selector where you would like to initialize Select2.</p>', '2018-10-04', 0, 0, NULL, NULL),
(51, 'VuLe0906', '7.jpg', NULL, '<p>dsafasfas</p>', '2018-10-09', 0, 0, NULL, NULL),
(55, 'Quan NN', '3.jpg', NULL, '<p>Of course, sometimes it may be necessary to remove a role from a user. To remove a many-to-many relationship record, use the&nbsp;<code>detach</code>&nbsp;method. The&nbsp;<code>detach</code>&nbsp;method will remove the appropriate record out of the intermediate table; however, both models will remain in the database:</p>', '2018-10-10', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_tag`
--

CREATE TABLE `news_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_tag`
--

INSERT INTO `news_tag` (`id`, `news_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(55, 5, 1, NULL, NULL),
(56, 5, 12, NULL, NULL),
(57, 5, 16, NULL, NULL),
(81, 55, 13, NULL, NULL),
(82, 55, 16, NULL, NULL),
(112, 6, 14, NULL, NULL),
(113, 6, 15, NULL, NULL),
(116, 2, 14, NULL, NULL),
(117, 2, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'quandz', NULL, NULL),
(2, 'quandaigia', NULL, NULL),
(11, 'quanhocgioi', NULL, NULL),
(12, 'thangxauzai', NULL, NULL),
(13, 'quanbest', NULL, NULL),
(14, 'quannn', NULL, NULL),
(15, 'daiga', NULL, NULL),
(16, 'lexinhgai', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT cho bảng `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
