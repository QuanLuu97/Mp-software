-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2018 lúc 11:55 AM
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
-- Cấu trúc bảng cho bảng `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` tinytext,
  `parent_id` int(11) NOT NULL,
  `description` tinytext,
  `content` text,
  `images` tinytext,
  `sort` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `name`, `slug`, `parent_id`, `description`, `content`, `images`, `sort`, `status`) VALUES
(1, 'ABOUT US', 'about-us', 0, NULL, NULL, '[\"sli1.jpg\", \"sli2.jpg\", \"sli3.jpg\", \"sli4.jpg\"]', 1, 1),
(14, 'OUR COMPANY', 'our-company', 1, NULL, '<p>MP Software is a full-service software company based in Hanoi, Vietnam, having two branches in Da Nang and Ho Chi Minh cities, an overseas branch in Japan.</p>\r\n\r\n<p>We provide a wide range of outsourcing services from web solutions to software QA &amp; Testing and Mobility. We deliver quality-centric, cost efficient and vigorous software development solutions with the help of inventive ideas integrated with coherent strategy, cutting edge technologies &amp; user-friendly designs that facilitate the customers to renovate their business.</p>\r\n<p>The most important matter for us is to do things in the best way, to build trust and exceed expectations. We rely mainly on the people&rsquo;s skills and the constant desire for improvement. Our team believes that devotion, collaboration and friendship are the key factors of our success. The success comes as natural result of the win-win relationships with our customers and employees.</p>', '[\"whoareyou.jpg\"]', 1, 1),
(15, 'Our people', 'our-people', 1, NULL, '<p>MPsoftware believes in the idea that motivated and competent individuals are the key to every company&#39;s success. From the very beginning, we built its foundation on highly-qualified and experienced staff. We leverage our People, Processes and Effective use of technology to catapult our clients to achieve their business potential. MPsoftware takes pride in its proactive and competent young men and women that brought the company to the accomplishment of every endeavor it takes. These individuals proved to have contributed something: dynamic spirit, innovative ideas, technical skills, independent work.</p>\r\n\r\n<p>- Young, dynamic human resource with high professional teamwork skills.<br />\r\n- Have extensive knowledge of E-commerce, Education, Health, Finance-Banking, CRM, Logistic, ERP.<br />\r\n- Constantly update new technology.<br />\r\n- Experienced annual training sessions, weekly technology seminars - Keep up to date with the latest technology<br />\r\n- Team leaders have the ability to communicate foreign language directly with customers<br />\r\n- Satisfy customers&#39; diverse and flexible requirements</p>\r\n\r\n<p>Our objective is to achieve 100% client satisfaction by offering reliable and adap table IT solutions</p>', '[\"bg-people.jpg\"]', 2, 1),
(16, 'Our Business Process', 'our-business-process', 1, NULL, '<ul class=\"list-process2\">\r\n          <li class=\"col-md-3 wow slideInRight\" data-wow-delay=\"0.1s\" style=\"visibility: visible; animation-delay: 0.1s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/our1.png\" alt=\"\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>1.</span> Kick off process\r\n                </h4>\r\n                <p>In a kick-off meeting , we’ll talk about your project goals and to help you identify the solutions that will be right for your organization. We’ll also set up some time frames for the project, so you’ll know what to expect. Gain engagement with customer and your agreement for project </p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\"wow slideInRight\" data-wow-delay=\"0.2s\" style=\"visibility: visible; animation-delay: 0.2s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/our2.png\" alt=\"step1\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>2.</span> Planning\r\n                </h4>\r\n                <p>We begin to organize the groundwork for the project. We\'ll help you define a clear strategy and develop a road map. By including you in our strategic development process, we ensure that our creative work is never rooted in ambiguous strategies. </p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\" wow slideInRight\" data-wow-delay=\"0.3s\" style=\"visibility: visible; animation-delay: 0.3s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/our3.png\" alt=\"step1\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>3.</span> Design\r\n                </h4>\r\n                <p>During the design phase, you’ll start  design elements based on the site map and wireframes. We work collaboratively throughout the creative process, both internally and with you. Typically, you’ll receive a proof of products to review and sign off </p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\" wow slideInRight\" data-wow-delay=\"0.4s\" style=\"visibility: visible; animation-delay: 0.4s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/our4.png\" alt=\"step1\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>4.</span> Implement\r\n                </h4>\r\n                <p>Our professional developer team determines the project scope and modifies the newly approved plans  into a working and then baseline the project plan, project requirement, HLD</p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\"wow slideInRight\" data-wow-delay=\"0.5s\" style=\"visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/OUR5.png\" alt=\"step1\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>5.</span> Test\r\n                </h4>\r\n                <p>We ascertain quality performance of software using a wide variety of recognized testing tools. The team of QA engineers brings the expertise and proven practices into your projects. You achieve more test coverage without having in-house testing team.</p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\"wow slideInRight\" data-wow-delay=\"0.6s\" style=\"visibility: visible; animation-delay: 0.6s; animation-name: slideInRight;\">\r\n           <div class=\"cover-our\">\r\n             <div class=\"content-img\">\r\n               <img src=\"dist/images/our6.png\" alt=\"step1\">\r\n             </div>\r\n             <div class=\"content-text\">\r\n               <h4 class=\"title\">\r\n                 <span>6.</span> Delivering\r\n               </h4>\r\n               <p>Once we receive your final approval, it is time to deliver . We’ll establish the tasks required to ensure a successful transition. We deliver and/or deploy the final product and transfer knowledge</p>\r\n             </div>\r\n           </div>\r\n          </li>\r\n          <li class=\"wow slideInRight\" data-wow-delay=\"0.7s\" style=\"visibility: visible; animation-delay: 0.7s; animation-name: slideInRight;\">\r\n            <div class=\"cover-our\">\r\n              <div class=\"content-img\">\r\n                <img src=\"dist/images/our7.png\" alt=\"step1\">\r\n              </div>\r\n              <div class=\"content-text\">\r\n                <h4 class=\"title\">\r\n                  <span>7.</span> Launch\r\n                </h4>\r\n                <p>Here we quickly test again to make sure that all have been uploaded perfectly, operatived fully. Our team will also train you to manage and update project. This marks the official launch of your project . We evaluate the project achievements and collect improvement information.</p>\r\n              </div>\r\n            </div>\r\n          </li>\r\n          <li class=\"wow slideInRight\" data-wow-delay=\"0.8s\" style=\"visibility: visible; animation-delay: 0.8s; animation-name: slideInRight;\">\r\n           <div class=\"cover-our\">\r\n             <div class=\"content-img\">\r\n               <img src=\"dist/images/our8.png\" alt=\"step1\">\r\n             </div>\r\n             <div class=\"content-text\">\r\n               <h4 class=\"title\">\r\n                 <span>8.</span> Maintenance\r\n               </h4>\r\n               <p>We help support you and pride ourselves in being able to fix issues quickly and provide speedy turnaround on changes. We offer maintenance packages at reduced rates, based on how often you anticipate making changes or additions . We provide technical supporting and product patching for the deployed product</p>\r\n             </div>\r\n           </div>\r\n          </li>\r\n        </ul>', NULL, 3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
