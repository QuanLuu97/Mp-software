-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2018 lúc 05:16 AM
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` tinytext COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'mpsoftware', 'mpsoftware', 0, 1, 0, NULL, NULL),
(2, 'team Developer', 'team-Developer', 1, 1, 0, NULL, NULL),
(3, 'team java', 'team-java', 2, 1, 0, NULL, NULL),
(4, 'team HR', 'team-HR', 1, 1, 0, NULL, NULL),
(5, 'team PHP', 'team-PHP', 2, 1, 0, NULL, NULL),
(6, 'team marketing', 'team-marketing', 4, 1, 0, NULL, NULL),
(7, 'team truyen thong', 'team-truyen-thong', 4, 1, 0, NULL, NULL),
(8, 'coder Java', 'coder-Java', 3, 1, 0, NULL, NULL),
(9, 'team IT', 'team-IT', 4, 1, 0, NULL, NULL),
(10, 'tester Java', 'tester-Java', 3, 1, 0, NULL, NULL),
(11, 'team C#', 'team-C', 2, 1, 0, NULL, NULL),
(12, 'coder PHP', 'coder-PHP', 5, 1, 0, NULL, NULL),
(13, 'team Front-end', 'team-Front-end', 2, 1, 0, NULL, NULL),
(20, 'tester PHP', 'tester-PHP', 5, 1, 0, NULL, NULL),
(22, 'mpsoftware telecom', 'mpsoftware-telecom', 0, 1, 0, NULL, NULL);

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
  `slug` tinytext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views_count` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `image`, `description`, `content`, `views_count`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, '日本語を学ぶITそれはいかに効果的ですか', '日本語を学ぶITそれはいかに効果的ですか', '2.png', '<p>Ngo&agrave;i kỹ năng chuy&ecirc;n m&ocirc;n lập tr&igrave;nh tốt, khả năng giao tiếp l&agrave; yếu tố quan trọng đưa sự nghiệp của bạn đi xa hơn. Nhất l&agrave; giao tiếp tiếng Nhật, bạn sẽ tự tin g&acirc;y ấn tượng với những lần gặp gỡ đối t&aacute;c hay thậm ch&iacute; bạn đang l&agrave;m việc trong c&aacute;c c&ocirc;ng ty Nhật. Tốt tiếng Nhật gi&uacute;p việc tận dụng c&aacute;c cơ hội tiềm năng sẽ dễ d&agrave;ng, x&acirc;y dựng một sự nghiệp vững chắc hơn.</p>', '<p>Ngo&agrave;i sự c&ocirc;ng nh&acirc;n năng lực N3, N2 th&igrave; việc &aacute;p dụng v&agrave;o trong c&ocirc;ng việc của một lập tr&igrave;nh vi&ecirc;n l&agrave; ho&agrave;n to&agrave;n kh&oacute; khăn. Bởi từ vựng IT phổ biến m&agrave; bạn kh&ocirc;ng thể gặp trong đ&oacute; chiếm đến 40%.</p>\n\n<p>V&igrave; thế c&aacute;ch học tiếng Nhật IT hiệu quả cần sự nỗ lực hết sức v&agrave; phương ph&aacute;p hữu &iacute;ch. Ph&acirc;n t&iacute;ch mẫu c&acirc;u v&agrave; ngữ ph&aacute;p IT để sử dụng trong c&ocirc;ng việc l&agrave; một gợi &yacute;. Bạn kh&ocirc;ng cần phải n&oacute;i hay tiếng Nhật, kh&ocirc;ng cần hiểu s&acirc;u sắc về văn h&oacute;a Nhật. Bởi tiếng Nhật đối với một kỹ sư IT chỉ l&agrave; c&ocirc;ng cụ để nắm bắt những cơ hội tiềm năng.</p>\n\n<p>Lập tr&igrave;nh vi&ecirc;n n&ecirc;n tập trung v&agrave; những t&igrave;nh huống thực tế về sử dụng tiếng Nhật trong c&aacute;c dự &aacute;n cụ thể. Như việc b&aacute;o c&aacute;o tiến độ dự &aacute;n, Những giải ph&aacute;p khả thi, tr&igrave;nh b&agrave;y giải th&iacute;ch v&agrave; xin lỗi về bug với kh&aacute;ch h&agrave;ng, đề xuất giải ph&aacute;p. Theo đ&oacute; những từ vựng phổ biến trong ng&agrave;nh IT được tiếp thu hiệu quả c&ugrave;ng với n&acirc;ng cao kỹ năng li&ecirc;n quan.&nbsp;</p>', 11, 1, 0, '2018-10-25 11:19:52', '2018-10-26 09:43:03'),
(6, 'プログラマーにとって良い環境は何ですか？', 'プログラマーにとって良い環境は何ですか？', '4.png', '<p>Với những lập tr&igrave;nh vi&ecirc;n mới ra trường hay chưa qu&aacute; một năm kinh nghiệm th&igrave; một m&ocirc;i trường c&oacute; người hướng dẫn, cấp tr&ecirc;n tốt trong giai đoạn n&agrave;y v&ocirc; c&ugrave;ng cần thiết v&agrave; quan trọng đối với sự ph&aacute;t triển bản th&acirc;n. Dưới đ&acirc;y l&agrave; 4 đặc trưng của một m&ocirc;i trường l&agrave;m việc tốt v&agrave; cũng l&agrave; những điều m&agrave; trong những năm đầu ti&ecirc;n đi l&agrave;m ai cũng mong muốn</p>', '<p><strong>1. Sếp c&oacute; t&acirc;m hướng dẫn kh&ocirc;ng kh&oacute; chịu</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Một mentor c&oacute; t&acirc;m sẽ biết c&aacute;ch hướng dẫn nh&acirc;n vi&ecirc;n của m&igrave;nh theo một c&aacute;ch tiếp cận kh&aacute;c để họ kh&ocirc;ng cảm thấy kh&oacute; chịu. V&iacute; dụ như với một c&acirc;u hỏi cần search Google, người hướng dẫn kh&ocirc;ng tốt sẽ l&agrave; em đ&atilde; search Google chưa. Tuy nhi&ecirc;n, cũng với c&acirc;u hỏi đ&oacute;, nhưng với một người hướng dẫn tốt hơn bạn sẽ nhận được c&acirc;u trả lời vui th&iacute;ch hơn: Với c&acirc;u hỏi n&agrave;y, nếu search Google th&igrave; e c&oacute; thể c&oacute; c&acirc;u trả lời, c&ugrave;ng search thử xem nh&eacute;.&nbsp;</p>\n\n<p>Với những c&aacute;ch giải quyết thắc mắc thế n&agrave;y sẽ kh&ocirc;ng l&agrave;m nh&acirc;n vi&ecirc;n kh&oacute; chịu lần sau ngại hỏi, hay kh&ocirc;ng muốn hỏi. Việc c&ugrave;ng nhau giải quyết vấn đề, c&ugrave;ng nhau thực hiện t&igrave;m giải ph&aacute;p để nh&acirc;n vi&ecirc;n mới biết c&aacute;ch học hỏi, biết c&aacute;ch để giải quyết kh&oacute; khăn như thế n&agrave;o. Đ&acirc;y mới l&agrave; điều quan trọng.</p>', 1, 1, 0, '2018-10-25 11:19:58', '2018-10-25 11:19:58'),
(7, '日本市場に精通したIT', '日本市場に精通したIT', '5.png', '<p>Tỷ lệ cung cầu nh&acirc;n sự ng&agrave;nh IT tại thị trường nhật hiện nay l&agrave; 1 người t&igrave;m việc, 6 việc t&igrave;m người. Theo một nghi&ecirc;n cứu từ bộ Kinh tế Nhật Bản đến năm 2020 con số thiếu hụt sẽ l&agrave; 20 vạn người. V&agrave; nhiều khả năng sẽ tiếp tục gia tăng trong nhiều năm tiếp theo.</p>', '<p><strong>Nguy&ecirc;n nh&acirc;n của sự thiếu hụt</strong></p>\n\n<p>&nbsp;</p>\n\n<p>L&atilde;o h&oacute;a d&acirc;n số l&agrave; vấn đề đầu ti&ecirc;n dẫn đến t&igrave;nh trạng n&agrave;y. Ng&agrave;nh IT cần một nguồn nh&acirc;n lực trẻ trung dồi d&agrave;o th&igrave; ở đất nước n&agrave;y lại đang tr&ecirc;n đ&agrave; trượt dốc thay v&agrave;o đ&oacute;, tỷ lệ người cao tuổi đang tăng ch&oacute;ng mặt. Tiếp theo l&agrave; C&aacute;ch gi&aacute;o dục IT phổ th&ocirc;ng thiếu thực tiễn, c&oacute; dấu hiệu tụt hậu tạo n&ecirc;n một lỗ hổng lớn về nguồn lực IT. Cuối c&ugrave;ng l&agrave; quan niệm x&atilde; hội về ng&agrave;nh IT khiến c&aacute;c bạn trẻ Nhật Bản kh&ocirc;ng hứng th&uacute;. Bức ảnh về một c&ocirc;ng việc nh&agrave;m ch&aacute;n, thu nhập chưa thực sự hấp dẫn l&agrave;m cho việc theo đuổi ng&agrave;nh n&agrave;y giảm s&uacute;t.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Giải ph&aacute;p thu h&uacute;t nguồn nh&acirc;n lực ng&agrave;nh IT của Nhật</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Ngo&agrave;i những giải ph&aacute;p đường d&agrave;i về gi&aacute;o dục IT ở bậc tiểu học để g&acirc;y sự quan t&acirc;m, hứng th&uacute; ngay c&ograve;n nhỏ. Tuy nhi&ecirc;n để đạt kết quả cần một khoảng thời gian l&acirc;u d&agrave;i. Vậy giải ph&aacute;p b&ugrave; đắp nh&acirc;n sự l&agrave; người c&oacute; th&acirc;m ni&ecirc;n v&agrave; phụ nữ, tuy nhi&ecirc;n với tốc độ thay đổi ch&oacute;ng mặt v&agrave; nguồn kiến thức nhanh hết hạn như ng&agrave;nh IT th&igrave; những giải ph&aacute;p n&agrave;y kh&ocirc;ng mang lại sự thay đổi t&iacute;ch cực đ&aacute;ng kể.&nbsp;</p>\n\n<p>V&igrave; vậy nguồn nh&acirc;n sự nước ngo&agrave;i ch&iacute;nh l&agrave; giải ph&aacute;p hiệu quả nhất. Thứ nhất mở c&aacute;c chi nh&aacute;nh tại nước ngo&agrave;i v&agrave; thứ hai thu h&uacute;t nh&acirc;n sự c&aacute;c nước đến l&agrave;m việc. Ch&iacute;nh v&igrave; thế, cơ hội với c&aacute;c nh&acirc;n sự ng&agrave;nh IT để c&oacute; thể l&agrave;m việc với Nhật l&agrave; v&ocirc; c&ugrave;ng lớn. Tuy nhi&ecirc;n, việc tuyển chọn những kỹ sư c&ocirc;ng nghệ th&ocirc;ng tin v&agrave;o nước l&agrave;m việc thực sự rất b&agrave;i bản. Vừa giải quyết những vấn đề thiếu hụt cấp b&aacute;ch vừa c&oacute; nguồn nh&acirc;n lực chất lượng cao trong d&agrave;i hạn.</p>\n\n<p>K&egrave;m theo những cơ hội rộng mở đ&oacute; c&ograve;n l&agrave; những th&aacute;ch thức, những đ&ograve;i hỏi kỹ lưỡng từ một nước ph&aacute;t triển như Nhật Bản. Những kỹ sư IT Việt Nam h&atilde;y trau dồi bản th&acirc;n m&igrave;nh hơn về ngoại ngữ, chuy&ecirc;n m&ocirc;n v&agrave; những kỹ năng cần thiết để c&oacute; thể đưa sự nghiệp IT đi xa hơn.&nbsp;</p>', 8, 1, 0, '2018-10-25 11:20:03', '2018-10-25 11:20:03'),
(9, 'なぜITをアウトソーシングするのが最適な選択ですか', 'なぜITをアウトソーシングするのが最適な選択ですか', '6.png', '<p>Gia c&ocirc;ng phần mềm CNTT l&agrave; t&igrave;m kiếm sự hỗ trợ từ c&aacute;c đội chuy&ecirc;n dụng b&ecirc;n ngo&agrave;i c&ocirc;ng ty, đ&acirc;y cũng l&agrave; một xu hướng lớn hiện nay. C&aacute;c doanh nghiệp th&iacute;ch thu&ecirc; ngo&agrave;i c&aacute;c dự &aacute;n CNTT v&igrave; những l&yacute; do sau đ&acirc;</p>', '<p><strong>1. Duy tr&igrave; t&iacute;nh cạnh tranh</strong></p>\n\n<p>Nhu cầu ng&agrave;y c&agrave;ng tăng nhằm tối ưu h&oacute;a chi ti&ecirc;u để duy tr&igrave; t&iacute;nh cạnh tranh tr&ecirc;n thị trường cho c&aacute;c c&ocirc;ng ty mới khởi nghiệp, SME v&agrave; c&aacute;c tập đo&agrave;n lớn th&igrave; gia c&ocirc;ng phần mềm CNTT&nbsp;</p>\n\n<p><strong>2. Gia c&ocirc;ng phần mềm cung cấp nhiều gi&aacute; trị hơn l&agrave; chỉ đơn giản l&agrave; cắt giảm chi ph&iacute;&nbsp;</strong></p>\n\n<p>C&aacute;c nh&agrave; cung cấp v&agrave; gia c&ocirc;ng phần mềm c&oacute; kinh nghiệm từ nhiều trường hợp, vấn đề v&agrave; trở th&agrave;nh trung t&acirc;m của sự đổi mới. Sử dụng sự trợ gi&uacute;p của họ như vậy c&oacute; nghĩa l&agrave; nhận được quyền truy cập nhanh v&agrave;o c&aacute;c phương ph&aacute;p c&ocirc;ng nghệ, thực tiễn tốt nhất, quy tr&igrave;nh c&ocirc;ng việc chuy&ecirc;n nghiệp.</p>\n\n<p>&gt;&gt;&gt;Top c&ocirc;ng ty gia c&ocirc;ng v&agrave;&nbsp;<a href=\"http://mpsoftware.com.vn/\">thiết kế phần mềm</a>&nbsp;h&agrave;ng đầu Việt Nam</p>\n\n<p><strong>3. Gia c&ocirc;ng phần mềm gi&uacute;p đối ph&oacute; với c&aacute;c quy định của ng&agrave;nh v&agrave; an ninh mạng .</strong></p>\n\n<p>&nbsp;Nh&agrave; cung cấp dịch vụ được quản l&yacute; phải tu&acirc;n thủ nhiều quy định v&agrave; quy tr&igrave;nh l&agrave;m đảm bảo t&iacute;nh bảo mật v&agrave; t&iacute;nh to&agrave;n vẹn của dữ liệu m&agrave; họ xử l&yacute;. Đối với c&aacute;c doanh nghiệp, điều n&agrave;y c&oacute; nghĩa l&agrave; tất cả c&aacute;c vấn đề tu&acirc;n thủ quy định v&agrave; rủi ro được xử l&yacute; bởi đối t&aacute;c gia c&ocirc;ng phần mềm.</p>\n\n<p><strong>4. Gia c&ocirc;ng phần mềm trở th&agrave;nh một quan hệ đối t&aacute;c to&agrave;n diện, thay v&igrave; chỉ đơn thuần l&agrave; thu&ecirc; một nh&agrave; thầu cho một c&ocirc;ng việc .&nbsp;</strong></p>\n\n<p>Nh&agrave; cung cấp dịch vụ được quản l&yacute; c&oacute; thể kiểm tra cơ sở hạ tầng v&agrave; quy tr&igrave;nh CNTT hiện c&oacute;, tối ưu h&oacute;a hệ thống v&agrave; quy tr&igrave;nh c&ocirc;ng việc, gi&uacute;p loại bỏ sự chậm trễ v&agrave; nhiều hơn thế nữa.</p>', 0, 1, 0, '2018-10-25 11:20:12', '2018-10-25 11:20:12'),
(35, 'プログラマーにチームで働くように指示する', 'プログラマーにチームで働くように指示する', '7.png', '<p>Một trong những c&acirc;u hỏi phổ biến m&agrave; hầu hết c&aacute;c nh&agrave; tuyển dụng lập tr&igrave;nh vi&ecirc;n đ&oacute; l&agrave; khả năng l&agrave;m việc nh&oacute;m. N&oacute; quan trọng bời v&igrave; hầu hết sự nghiệp của bạn với tư c&aacute;ch l&agrave; một lập tr&igrave;nh vi&ecirc;n sẽ được l&agrave;m việc với những người kh&aacute;c trong một nh&oacute;m. Tiếp tục đọc b&agrave;i viết sau để bạn thực sự trở th&agrave;nh một đồng nghiệp c&oacute; gi&aacute; trị v&agrave; nh&oacute;m bạn c&oacute; được sức mạnh tổng hợp.</p>', '<p><strong>Th&agrave;nh c&ocirc;ng v&agrave; thất bại c&ugrave;ng nhau</strong></p>\n\n<p>Điều đ&oacute; c&oacute; nghĩa l&agrave; th&aacute;i độ v&agrave; tr&aacute;ch nhiệm khi hoạt động trong một nh&oacute;m. Lợi &iacute;ch ch&iacute;nh của nh&oacute;m l&agrave; cao nhất, mỗi th&agrave;nh vi&ecirc;n kh&ocirc;ng n&ecirc;n được xếp hạng ri&ecirc;ng lẻ. Hiệu quả c&ocirc;ng việc sẽ tốt hơn nếu c&aacute;c th&agrave;nh vi&ecirc;n trong nh&oacute;m bị r&agrave;ng buộc c&ugrave;ng nhau, giống nhau.&nbsp;</p>\n\n<p>Một số th&agrave;nh vi&ecirc;n c&oacute; thể đi chậm lại để thể hiện tin thần đồng đội c&ograve;n hơn tự gi&agrave;nh lấy huy chương v&agrave;ng cho ch&iacute;nh m&igrave;nh.</p>\n\n<p><strong>C&oacute; mục ti&ecirc;u chung</strong></p>\n\n<p>Một vấn đề thường thấy trong c&aacute;c nh&oacute;m ph&aacute;t triển phần mềm ch&iacute;nh l&agrave; sự ph&acirc;n t&aacute;n qu&aacute; nhiều nhiệm vụ giữa c&aacute;c th&agrave;nh vi&ecirc;n. Mỗi th&agrave;nh vi&ecirc;n đang l&agrave;m việc một m&igrave;nh với những nhiệm vụ của ri&ecirc;ng m&igrave;nh chứ kh&ocirc;ng thực sự l&agrave;m việc c&ugrave;ng nhau.&nbsp;</p>\n\n<p>V&igrave; thế một lập tr&igrave;nh vi&ecirc;n trong nh&oacute;m n&ecirc;n kh&ocirc;ng nhận những c&ocirc;ng việc mới khi c&oacute; thể đ&oacute;ng g&oacute;p cho c&ocirc;ng việc của một th&agrave;nh vi&ecirc;n kh&aacute;c trong nh&oacute;m đang chịu tr&aacute;ch nhiệm. Gi&uacute;p họ ho&agrave;n thiện những c&ocirc;ng việc tồn đọng trước khi triển khai sang phần tiếp theo. Đ&acirc;y cũng l&agrave; một kỹ thuật hiệu quả để c&oacute; th&uacute;c đẩy việc nh&oacute;m ho&agrave;m thiện nhanh hơn.</p>\n\n<p><strong>Chịu tr&aacute;ch nhiệm cho nh&oacute;m</strong></p>\n\n<p>L&agrave;m những g&igrave; bạn c&oacute; thể gi&uacute;p nh&oacute;m th&agrave;nh c&ocirc;ng ch&iacute;nh l&agrave; điều tốt nhất để c&oacute; thể ph&aacute;t triển sự nghiệp của bạn. Mặc d&ugrave; hiệu suất c&aacute; nh&acirc;n thực sự quan trọng, tuy nhi&ecirc;n, người quản l&yacute; của c&aacute;c c&ocirc;ng ty phần mềm quan t&acirc;m nhiều hơn đến hiệu suất l&agrave;m việc của cả nh&oacute;m với sự th&agrave;nh c&ocirc;ng của c&aacute;c dự &aacute;n, sản phẩm.</p>\n\n<p>Nếu như một th&agrave;nh vi&ecirc;n xuất sắc chắc chắn mọi người sẽ biết bạn tuyệt vời như thế n&agrave;o. Nhưng cả nh&oacute;m thất bại th&igrave; c&oacute; nghĩa l&agrave; cuối c&ugrave;ng bạn vẫn thất bại. Mỗi lập tr&igrave;nh vi&ecirc;n gi&uacute;p mọi người xung quanh tốt hơn th&igrave; chắc chắn rằng khả năng l&agrave;m việc của to&agrave;n bộ nh&oacute;m sẽ tốt hơn.</p>\n\n<p>&nbsp;</p>\n\n<p><img src=\"http://mpsoftware.com.vn/public/uploads/images/2018/09/28/1538123343=huong-dan-lap-trinh-vien-lam-viec-theo-nhom-hieu-qua-1.png\" /></p>', 1, 1, 0, '2018-10-25 11:20:18', '2018-10-25 11:20:18'),
(79, 'Lam the nao đe tang nang suat lap trinh vien', 'Lam-the-nao-đe-tang-nang-suat-lap-trinh-vien', '1.png', '<p>Lập tr&igrave;nh c&oacute; thể l&agrave; một niềm đam m&ecirc;, một niềm vui, tuy nhi&ecirc;n chắc chắn rằng n&oacute; kh&ocirc;ng phải l&agrave; một c&ocirc;ng việc dễ d&agrave;ng. Ch&igrave;a kh&oacute;a để th&agrave;nh c&ocirc;ng v&agrave; l&agrave;m việc hiệu quả ch&iacute;nh l&agrave; sự tập trung cao độ.&nbsp;</p>', '<p>C&oacute; thể n&oacute; sẽ l&agrave; một kho y&ecirc;u cầu từ kh&aacute;ch h&agrave;ng, những dự &aacute;n kh&aacute;c nhau v&agrave; những th&ocirc;ng b&aacute;o tr&ograve; chuyện đến từ nhiều nơi nhiều người. Tất cả những điều đ&oacute; nếu như bạn mở ra ngay th&igrave; dường như bạn đang c&oacute; cả tỷ thứ việc cần l&agrave;m. Tất cả đều khiến bạn cảm thấy lo lắng v&agrave; tồi tệ hơn.&nbsp;</p>\n\n<p>Một ng&agrave;y bạn sẽ mở hộp thư v&agrave;i lần nếu những vấn đề n&agrave;o m&agrave; bạn c&oacute; thể xử l&yacute; nhanh ch&oacute;ng h&atilde;y bắt đầu với n&oacute;. V&agrave; nhiệm vụ đang l&agrave;m hiện tại sẽ nhanh ch&oacute;ng hơn, kết quả hơn</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/3.png\" style=\"height:200px; width:304px\" /></p>', 1, 1, 0, '2018-10-25 11:20:24', '2018-10-25 11:20:24'),
(80, 'Hoc tieng^ Nh%^&-at IT nhu the nao la hieu qua', 'Hoc-tieng-Nh-at-IT-nhu-the-nao-la-hieu-qua', '2.png', '<p>Ngo&agrave;i kỹ năng chuy&ecirc;n m&ocirc;n lập tr&igrave;nh tốt, khả năng giao tiếp l&agrave; yếu tố quan trọng đưa sự nghiệp của bạn đi xa hơn. Nhất l&agrave; giao tiếp tiếng Nhật, bạn sẽ tự tin g&acirc;y ấn tượng với những lần gặp gỡ đối t&aacute;c hay thậm ch&iacute; bạn đang l&agrave;m việc trong c&aacute;c c&ocirc;ng ty Nhật. Tốt tiếng Nhật gi&uacute;p việc tận dụng c&aacute;c cơ hội tiềm năng sẽ dễ d&agrave;ng, x&acirc;y dựng một sự nghiệp vững chắc hơn.</p>', '<p>Ngo&agrave;i sự c&ocirc;ng nh&acirc;n năng lực N3, N2 th&igrave; việc &aacute;p dụng v&agrave;o trong c&ocirc;ng việc của một lập tr&igrave;nh vi&ecirc;n l&agrave; ho&agrave;n to&agrave;n kh&oacute; khăn. Bởi từ vựng IT phổ biến m&agrave; bạn kh&ocirc;ng thể gặp trong đ&oacute; chiếm đến 40%.</p>\n\n<p>V&igrave; thế c&aacute;ch học tiếng Nhật IT hiệu quả cần sự nỗ lực hết sức v&agrave; phương ph&aacute;p hữu &iacute;ch. Ph&acirc;n t&iacute;ch mẫu c&acirc;u v&agrave; ngữ ph&aacute;p IT để sử dụng trong c&ocirc;ng việc l&agrave; một gợi &yacute;. Bạn kh&ocirc;ng cần phải n&oacute;i hay tiếng Nhật, kh&ocirc;ng cần hiểu s&acirc;u sắc về văn h&oacute;a Nhật. Bởi tiếng Nhật đối với một kỹ sư IT chỉ l&agrave; c&ocirc;ng cụ để nắm bắt những cơ hội tiềm năng.</p>\n\n<p>Lập tr&igrave;nh vi&ecirc;n n&ecirc;n tập trung v&agrave; những t&igrave;nh huống thực tế về sử dụng tiếng Nhật trong c&aacute;c dự &aacute;n cụ thể. Như việc b&aacute;o c&aacute;o tiến độ dự &aacute;n, Những giải ph&aacute;p khả thi, tr&igrave;nh b&agrave;y giải th&iacute;ch v&agrave; xin lỗi về bug với kh&aacute;ch h&agrave;ng, đề xuất giải ph&aacute;p. Theo đ&oacute; những từ vựng phổ biến trong ng&agrave;nh IT được tiếp thu hiệu quả c&ugrave;ng với n&acirc;ng cao kỹ năng li&ecirc;n quan.&nbsp;</p>', 5, 1, 0, '2018-10-25 11:21:15', '2018-10-25 11:21:15'),
(81, 'Đau la moi truong thuc su tot đe Lap trinh vien phat trien', 'Đau-la-moi-truong-thuc-su-tot-đe-Lap-trinh-vien-phat-trien', '4.png', '<p>Với những lập tr&igrave;nh vi&ecirc;n mới ra trường hay chưa qu&aacute; một năm kinh nghiệm th&igrave; một m&ocirc;i trường c&oacute; người hướng dẫn, cấp tr&ecirc;n tốt trong giai đoạn n&agrave;y v&ocirc; c&ugrave;ng cần thiết v&agrave; quan trọng đối với sự ph&aacute;t triển bản th&acirc;n. Dưới đ&acirc;y l&agrave; 4 đặc trưng của một m&ocirc;i trường l&agrave;m việc tốt v&agrave; cũng l&agrave; những điều m&agrave; trong những năm đầu ti&ecirc;n đi l&agrave;m ai cũng mong muốn</p>', '<p><strong>1. Sếp c&oacute; t&acirc;m hướng dẫn kh&ocirc;ng kh&oacute; chịu</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Một mentor c&oacute; t&acirc;m sẽ biết c&aacute;ch hướng dẫn nh&acirc;n vi&ecirc;n của m&igrave;nh theo một c&aacute;ch tiếp cận kh&aacute;c để họ kh&ocirc;ng cảm thấy kh&oacute; chịu. V&iacute; dụ như với một c&acirc;u hỏi cần search Google, người hướng dẫn kh&ocirc;ng tốt sẽ l&agrave; em đ&atilde; search Google chưa. Tuy nhi&ecirc;n, cũng với c&acirc;u hỏi đ&oacute;, nhưng với một người hướng dẫn tốt hơn bạn sẽ nhận được c&acirc;u trả lời vui th&iacute;ch hơn: Với c&acirc;u hỏi n&agrave;y, nếu search Google th&igrave; e c&oacute; thể c&oacute; c&acirc;u trả lời, c&ugrave;ng search thử xem nh&eacute;.&nbsp;</p>\n\n<p>Với những c&aacute;ch giải quyết thắc mắc thế n&agrave;y sẽ kh&ocirc;ng l&agrave;m nh&acirc;n vi&ecirc;n kh&oacute; chịu lần sau ngại hỏi, hay kh&ocirc;ng muốn hỏi. Việc c&ugrave;ng nhau giải quyết vấn đề, c&ugrave;ng nhau thực hiện t&igrave;m giải ph&aacute;p để nh&acirc;n vi&ecirc;n mới biết c&aacute;ch học hỏi, biết c&aacute;ch để giải quyết kh&oacute; khăn như thế n&agrave;o. Đ&acirc;y mới l&agrave; điều quan trọng.</p>', 4, 1, 0, '2018-10-25 11:20:37', '2018-10-25 11:20:37'),
(82, 'Con “khat” nhan su nganh IT trong thi truong Nhat', 'Con-“khat”-nhan-su-nganh-IT-trong-thi-truong-Nhat', '5.png', '<p>Tỷ lệ cung cầu nh&acirc;n sự ng&agrave;nh IT tại thị trường nhật hiện nay l&agrave; 1 người t&igrave;m việc, 6 việc t&igrave;m người. Theo một nghi&ecirc;n cứu từ bộ Kinh tế Nhật Bản đến năm 2020 con số thiếu hụt sẽ l&agrave; 20 vạn người. V&agrave; nhiều khả năng sẽ tiếp tục gia tăng trong nhiều năm tiếp theo.</p>', '<p><strong>Nguy&ecirc;n nh&acirc;n của sự thiếu hụt</strong></p>\n\n<p>&nbsp;</p>\n\n<p>L&atilde;o h&oacute;a d&acirc;n số l&agrave; vấn đề đầu ti&ecirc;n dẫn đến t&igrave;nh trạng n&agrave;y. Ng&agrave;nh IT cần một nguồn nh&acirc;n lực trẻ trung dồi d&agrave;o th&igrave; ở đất nước n&agrave;y lại đang tr&ecirc;n đ&agrave; trượt dốc thay v&agrave;o đ&oacute;, tỷ lệ người cao tuổi đang tăng ch&oacute;ng mặt. Tiếp theo l&agrave; C&aacute;ch gi&aacute;o dục IT phổ th&ocirc;ng thiếu thực tiễn, c&oacute; dấu hiệu tụt hậu tạo n&ecirc;n một lỗ hổng lớn về nguồn lực IT. Cuối c&ugrave;ng l&agrave; quan niệm x&atilde; hội về ng&agrave;nh IT khiến c&aacute;c bạn trẻ Nhật Bản kh&ocirc;ng hứng th&uacute;. Bức ảnh về một c&ocirc;ng việc nh&agrave;m ch&aacute;n, thu nhập chưa thực sự hấp dẫn l&agrave;m cho việc theo đuổi ng&agrave;nh n&agrave;y giảm s&uacute;t.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Giải ph&aacute;p thu h&uacute;t nguồn nh&acirc;n lực ng&agrave;nh IT của Nhật</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Ngo&agrave;i những giải ph&aacute;p đường d&agrave;i về gi&aacute;o dục IT ở bậc tiểu học để g&acirc;y sự quan t&acirc;m, hứng th&uacute; ngay c&ograve;n nhỏ. Tuy nhi&ecirc;n để đạt kết quả cần một khoảng thời gian l&acirc;u d&agrave;i. Vậy giải ph&aacute;p b&ugrave; đắp nh&acirc;n sự l&agrave; người c&oacute; th&acirc;m ni&ecirc;n v&agrave; phụ nữ, tuy nhi&ecirc;n với tốc độ thay đổi ch&oacute;ng mặt v&agrave; nguồn kiến thức nhanh hết hạn như ng&agrave;nh IT th&igrave; những giải ph&aacute;p n&agrave;y kh&ocirc;ng mang lại sự thay đổi t&iacute;ch cực đ&aacute;ng kể.&nbsp;</p>\n\n<p>V&igrave; vậy nguồn nh&acirc;n sự nước ngo&agrave;i ch&iacute;nh l&agrave; giải ph&aacute;p hiệu quả nhất. Thứ nhất mở c&aacute;c chi nh&aacute;nh tại nước ngo&agrave;i v&agrave; thứ hai thu h&uacute;t nh&acirc;n sự c&aacute;c nước đến l&agrave;m việc. Ch&iacute;nh v&igrave; thế, cơ hội với c&aacute;c nh&acirc;n sự ng&agrave;nh IT để c&oacute; thể l&agrave;m việc với Nhật l&agrave; v&ocirc; c&ugrave;ng lớn. Tuy nhi&ecirc;n, việc tuyển chọn những kỹ sư c&ocirc;ng nghệ th&ocirc;ng tin v&agrave;o nước l&agrave;m việc thực sự rất b&agrave;i bản. Vừa giải quyết những vấn đề thiếu hụt cấp b&aacute;ch vừa c&oacute; nguồn nh&acirc;n lực chất lượng cao trong d&agrave;i hạn.</p>\n\n<p>K&egrave;m theo những cơ hội rộng mở đ&oacute; c&ograve;n l&agrave; những th&aacute;ch thức, những đ&ograve;i hỏi kỹ lưỡng từ một nước ph&aacute;t triển như Nhật Bản. Những kỹ sư IT Việt Nam h&atilde;y trau dồi bản th&acirc;n m&igrave;nh hơn về ngoại ngữ, chuy&ecirc;n m&ocirc;n v&agrave; những kỹ năng cần thiết để c&oacute; thể đưa sự nghiệp IT đi xa hơn.&nbsp;</p>', 26, 1, 0, '2018-10-25 11:20:59', '2018-10-25 11:20:59'),
(83, 'Vi sao gia cong phan mem CNTT la su lua chon hoan hao', 'Vi-sao-gia-cong-phan-mem-CNTT-la-su-lua-chon-hoan-hao', '6.png', '<p>Gia c&ocirc;ng phần mềm CNTT l&agrave; t&igrave;m kiếm sự hỗ trợ từ c&aacute;c đội chuy&ecirc;n dụng b&ecirc;n ngo&agrave;i c&ocirc;ng ty, đ&acirc;y cũng l&agrave; một xu hướng lớn hiện nay. C&aacute;c doanh nghiệp th&iacute;ch thu&ecirc; ngo&agrave;i c&aacute;c dự &aacute;n CNTT v&igrave; những l&yacute; do sau đ&acirc;.</p>', '<p><strong>1. Duy tr&igrave; t&iacute;nh cạnh tranh</strong></p>\n\n<p>Nhu cầu ng&agrave;y c&agrave;ng tăng nhằm tối ưu h&oacute;a chi ti&ecirc;u để duy tr&igrave; t&iacute;nh cạnh tranh tr&ecirc;n thị trường cho c&aacute;c c&ocirc;ng ty mới khởi nghiệp, SME v&agrave; c&aacute;c tập đo&agrave;n lớn th&igrave; gia c&ocirc;ng phần mềm CNTT&nbsp;</p>\n\n<p><strong>2. Gia c&ocirc;ng phần mềm cung cấp nhiều gi&aacute; trị hơn l&agrave; chỉ đơn giản l&agrave; cắt giảm chi ph&iacute;&nbsp;</strong></p>\n\n<p>C&aacute;c nh&agrave; cung cấp v&agrave; gia c&ocirc;ng phần mềm c&oacute; kinh nghiệm từ nhiều trường hợp, vấn đề v&agrave; trở th&agrave;nh trung t&acirc;m của sự đổi mới. Sử dụng sự trợ gi&uacute;p của họ như vậy c&oacute; nghĩa l&agrave; nhận được quyền truy cập nhanh v&agrave;o c&aacute;c phương ph&aacute;p c&ocirc;ng nghệ, thực tiễn tốt nhất, quy tr&igrave;nh c&ocirc;ng việc chuy&ecirc;n nghiệp.</p>\n\n<p>&gt;&gt;&gt;Top c&ocirc;ng ty gia c&ocirc;ng v&agrave;&nbsp;<a href=\"http://mpsoftware.com.vn/\">thiết kế phần mềm</a>&nbsp;h&agrave;ng đầu Việt Nam</p>\n\n<p><strong>3. Gia c&ocirc;ng phần mềm gi&uacute;p đối ph&oacute; với c&aacute;c quy định của ng&agrave;nh v&agrave; an ninh mạng .</strong></p>\n\n<p>&nbsp;Nh&agrave; cung cấp dịch vụ được quản l&yacute; phải tu&acirc;n thủ nhiều quy định v&agrave; quy tr&igrave;nh l&agrave;m đảm bảo t&iacute;nh bảo mật v&agrave; t&iacute;nh to&agrave;n vẹn của dữ liệu m&agrave; họ xử l&yacute;. Đối với c&aacute;c doanh nghiệp, điều n&agrave;y c&oacute; nghĩa l&agrave; tất cả c&aacute;c vấn đề tu&acirc;n thủ quy định v&agrave; rủi ro được xử l&yacute; bởi đối t&aacute;c gia c&ocirc;ng phần mềm.</p>\n\n<p><strong>4. Gia c&ocirc;ng phần mềm trở th&agrave;nh một quan hệ đối t&aacute;c to&agrave;n diện, thay v&igrave; chỉ đơn thuần l&agrave; thu&ecirc; một nh&agrave; thầu cho một c&ocirc;ng việc .&nbsp;</strong></p>\n\n<p>Nh&agrave; cung cấp dịch vụ được quản l&yacute; c&oacute; thể kiểm tra cơ sở hạ tầng v&agrave; quy tr&igrave;nh CNTT hiện c&oacute;, tối ưu h&oacute;a hệ thống v&agrave; quy tr&igrave;nh c&ocirc;ng việc, gi&uacute;p loại bỏ sự chậm trễ v&agrave; nhiều hơn thế nữa.</p>', 6, 1, 0, '2018-10-25 11:19:43', '2018-10-25 11:19:43'),
(84, 'Huong dan lam viec nhom hieu qua?-', 'Huong-dan-lam-viec-nhom-hieu-qua-', '7.png', '<p>Một trong những c&acirc;u hỏi phổ biến m&agrave; hầu hết c&aacute;c nh&agrave; tuyển dụng lập tr&igrave;nh vi&ecirc;n đ&oacute; l&agrave; khả năng l&agrave;m việc nh&oacute;m. N&oacute; quan trọng bời v&igrave; hầu hết sự nghiệp của bạn với tư c&aacute;ch l&agrave; một lập tr&igrave;nh vi&ecirc;n sẽ được l&agrave;m việc với những người kh&aacute;c trong một nh&oacute;m. Tiếp tục đọc b&agrave;i viết sau để bạn thực sự trở th&agrave;nh một đồng nghiệp c&oacute; gi&aacute; trị v&agrave; nh&oacute;m bạn c&oacute; được sức mạnh tổng hợp..</p>', '<p><strong>Th&agrave;nh c&ocirc;ng v&agrave; thất bại c&ugrave;ng nhau</strong></p>\n\n<p>Điều đ&oacute; c&oacute; nghĩa l&agrave; th&aacute;i độ v&agrave; tr&aacute;ch nhiệm khi hoạt động trong một nh&oacute;m. Lợi &iacute;ch ch&iacute;nh của nh&oacute;m l&agrave; cao nhất, mỗi th&agrave;nh vi&ecirc;n kh&ocirc;ng n&ecirc;n được xếp hạng ri&ecirc;ng lẻ. Hiệu quả c&ocirc;ng việc sẽ tốt hơn nếu c&aacute;c th&agrave;nh vi&ecirc;n trong nh&oacute;m bị r&agrave;ng buộc c&ugrave;ng nhau, giống nhau.&nbsp;</p>\n\n<p>Một số th&agrave;nh vi&ecirc;n c&oacute; thể đi chậm lại để thể hiện tin thần đồng đội c&ograve;n hơn tự gi&agrave;nh lấy huy chương v&agrave;ng cho ch&iacute;nh m&igrave;nh.</p>\n\n<p><strong>C&oacute; mục ti&ecirc;u chung</strong></p>\n\n<p>Một vấn đề thường thấy trong c&aacute;c nh&oacute;m ph&aacute;t triển phần mềm ch&iacute;nh l&agrave; sự ph&acirc;n t&aacute;n qu&aacute; nhiều nhiệm vụ giữa c&aacute;c th&agrave;nh vi&ecirc;n. Mỗi th&agrave;nh vi&ecirc;n đang l&agrave;m việc một m&igrave;nh với những nhiệm vụ của ri&ecirc;ng m&igrave;nh chứ kh&ocirc;ng thực sự l&agrave;m việc c&ugrave;ng nhau.&nbsp;</p>\n\n<p>V&igrave; thế một lập tr&igrave;nh vi&ecirc;n trong nh&oacute;m n&ecirc;n kh&ocirc;ng nhận những c&ocirc;ng việc mới khi c&oacute; thể đ&oacute;ng g&oacute;p cho c&ocirc;ng việc của một th&agrave;nh vi&ecirc;n kh&aacute;c trong nh&oacute;m đang chịu tr&aacute;ch nhiệm. Gi&uacute;p họ ho&agrave;n thiện những c&ocirc;ng việc tồn đọng trước khi triển khai sang phần tiếp theo. Đ&acirc;y cũng l&agrave; một kỹ thuật hiệu quả để c&oacute; th&uacute;c đẩy việc nh&oacute;m ho&agrave;m thiện nhanh hơn.</p>\n\n<p><strong>Chịu tr&aacute;ch nhiệm cho nh&oacute;m</strong></p>\n\n<p>L&agrave;m những g&igrave; bạn c&oacute; thể gi&uacute;p nh&oacute;m th&agrave;nh c&ocirc;ng ch&iacute;nh l&agrave; điều tốt nhất để c&oacute; thể ph&aacute;t triển sự nghiệp của bạn. Mặc d&ugrave; hiệu suất c&aacute; nh&acirc;n thực sự quan trọng, tuy nhi&ecirc;n, người quản l&yacute; của c&aacute;c c&ocirc;ng ty phần mềm quan t&acirc;m nhiều hơn đến hiệu suất l&agrave;m việc của cả nh&oacute;m với sự th&agrave;nh c&ocirc;ng của c&aacute;c dự &aacute;n, sản phẩm.</p>\n\n<p>Nếu như một th&agrave;nh vi&ecirc;n xuất sắc chắc chắn mọi người sẽ biết bạn tuyệt vời như thế n&agrave;o. Nhưng cả nh&oacute;m thất bại th&igrave; c&oacute; nghĩa l&agrave; cuối c&ugrave;ng bạn vẫn thất bại. Mỗi lập tr&igrave;nh vi&ecirc;n gi&uacute;p mọi người xung quanh tốt hơn th&igrave; chắc chắn rằng khả năng l&agrave;m việc của to&agrave;n bộ nh&oacute;m sẽ tốt hơn.</p>\n\n<p>&nbsp;</p>\n\n<p><img src=\"http://mpsoftware.com.vn/public/uploads/images/2018/09/28/1538123343=huong-dan-lap-trinh-vien-lam-viec-theo-nhom-hieu-qua-1.png\" /></p>', 8, 1, 0, '2018-10-25 11:19:28', '2018-10-25 11:19:28');

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
-- Cấu trúc bảng cho bảng `tags_object_news`
--

CREATE TABLE `tags_object_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_name` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags_object_news`
--

INSERT INTO `tags_object_news` (`id`, `news_id`, `tag_id`, `news_title`, `tag_name`, `created_at`, `updated_at`) VALUES
(240, 6, 16, 'プログラマーにとって良い環境は何ですか？', 'lexinhgai', NULL, NULL),
(241, 7, 1, '日本市場に精通したIT', 'quandz', NULL, NULL),
(242, 7, 12, '日本市場に精通したIT', 'thangxauzai', NULL, NULL),
(243, 7, 16, '日本市場に精通したIT', 'lexinhgai', NULL, NULL),
(244, 81, 12, 'Đau la moi truong thuc su tot đe Lap trinh vien phat trien', 'thangxauzai', NULL, NULL),
(246, 82, 13, 'Con “khat” nhan su nganh IT trong thi truong Nhat', 'quanbest', NULL, NULL),
(247, 5, 16, '日本語を学ぶITそれはいかに効果的ですか', 'lexinhgai', NULL, NULL);

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
-- Chỉ mục cho bảng `categories_object_news`
--
ALTER TABLE `categories_object_news`
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
-- Chỉ mục cho bảng `tags_object_news`
--
ALTER TABLE `tags_object_news`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `categories_object_news`
--
ALTER TABLE `categories_object_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tags_object_news`
--
ALTER TABLE `tags_object_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
