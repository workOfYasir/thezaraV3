-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 07:57 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartitg_thezara`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_guests`
--

CREATE TABLE `active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `att_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `fall` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(500) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`att_id`, `level`, `fall`, `title`, `path`, `size`) VALUES
(12, 2, 'F-19', 'dfd', 'Attachments/index.html', '5'),
(13, 1, 'F-19', 'Test File', 'Attachments/dash.PNG', '107');

-- --------------------------------------------------------

--
-- Table structure for table `banlist`
--

CREATE TABLE `banlist` (
  `ban_id` mediumint(8) UNSIGNED NOT NULL,
  `ban_username` varchar(255) DEFAULT '0',
  `ban_userid` mediumint(8) UNSIGNED DEFAULT 0,
  `ban_ip` varchar(40) DEFAULT '0',
  `timestamp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogs_categories`
--

CREATE TABLE `blogs_categories` (
  `id` int(11) NOT NULL,
  `blog_uniid` varchar(255) NOT NULL,
  `cate_uniid` varchar(255) NOT NULL,
  `cate_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` double NOT NULL,
  `blog_id` varchar(500) NOT NULL,
  `cate_id` varchar(255) NOT NULL,
  `image_file` text NOT NULL,
  `gallery_img_pos` int(11) NOT NULL DEFAULT 99,
  `gallery_width` int(11) NOT NULL,
  `gallery_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `cate_id`, `image_file`, `gallery_img_pos`, `gallery_width`, `gallery_height`, `thumb_width`, `thumb_height`, `created_at`) VALUES
(1, '3', '3', 'Gallery-01614349071.jpg', 99, 614, 614, 614, 614, '2021-02-26 14:17:52'),
(2, '3', '3', 'Gallery-11614349072.jpg', 99, 614, 614, 614, 614, '2021-02-26 14:17:52'),
(11, '11', '16', 'Gallery-11615548367.jpg', 2, 0, 0, 0, 0, '2021-03-12 11:26:07'),
(12, '11', '16', 'Gallery-21615548367.jpg', 9, 0, 0, 0, 0, '2021-03-12 11:26:07'),
(13, '11', '16', 'Gallery-1615556427.jpg', 99, 0, 0, 0, 0, '2021-03-12 13:40:27'),
(14, '11', '16', 'Gallery-1615556517.jpg', 99, 0, 0, 0, 0, '2021-03-12 13:41:57'),
(15, '11', '16', 'Gallery-1615556709.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:45:09'),
(16, '11', '16', 'Gallery-1615556732.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:45:32'),
(17, '11', '16', 'Gallery-1615556756.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:45:56'),
(18, '11', '16', 'Gallery-1615556770.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:46:10'),
(19, '11', '16', 'Gallery-1615557176.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:52:56'),
(20, '11', '16', 'Gallery-1615557229.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:53:49'),
(21, '11', '16', 'Gallery-1615557343.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:55:43'),
(22, '11', '16', 'Gallery-1615557369.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:56:09'),
(23, '11', '16', 'Gallery-1615557417.JPG', 99, 0, 0, 0, 0, '2021-03-12 13:56:57'),
(26, '11', '16', 'Gallery-1615557605.JPG', 99, 0, 0, 0, 0, '2021-03-12 14:00:05'),
(28, '11', '16', 'Gallery-1615559727.JPG', 99, 0, 0, 0, 0, '2021-03-12 14:35:27'),
(29, '11', '16', 'Gallery-1615559764.JPG', 99, 0, 0, 0, 0, '2021-03-12 14:36:04'),
(30, '11', '16', 'Gallery-1615559801.jpg', 99, 0, 0, 0, 0, '2021-03-12 14:36:41'),
(31, '11', '16', 'Gallery-1615563264.JPG', 99, 0, 0, 0, 0, '2021-03-12 15:34:24'),
(33, '15', '15', 'Gallery-1615803193.JPG', 9, 5472, 3648, 0, 0, '2021-03-15 10:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `blog_mcat`
--

CREATE TABLE `blog_mcat` (
  `id` int(11) NOT NULL,
  `mcat_uniid` varchar(255) NOT NULL,
  `mcat_title` varchar(255) NOT NULL,
  `mcat_url` varchar(255) NOT NULL,
  `mcat_cates` varchar(255) NOT NULL,
  `mcat_body` varchar(255) NOT NULL,
  `mcat_cover` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `cover_path` varchar(255) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `mcat_thumb` varchar(255) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `mcat_status` varchar(255) NOT NULL,
  `mcat_position` int(11) NOT NULL,
  `mcat_summary` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `head_script` varchar(255) NOT NULL,
  `after_head` varchar(255) NOT NULL,
  `footer_script` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `blog_uniid` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `blog_date` varchar(255) NOT NULL,
  `blog_create_time` varchar(255) NOT NULL,
  `blog_update_time` varchar(255) DEFAULT NULL,
  `blog_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blog_updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `blog_body` mediumtext NOT NULL,
  `blog_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `blog_summary` varchar(255) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `gallery_thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `blog_status` varchar(50) NOT NULL,
  `blog_event` varchar(50) NOT NULL DEFAULT 'No',
  `event_start` time DEFAULT NULL,
  `event_end` time DEFAULT NULL,
  `gallery_path` text NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `head_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `pdf_status` varchar(255) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_uniid`, `blog_title`, `blog_url`, `blog_category`, `blog_date`, `blog_create_time`, `blog_update_time`, `blog_created_at`, `blog_updated_at`, `blog_body`, `blog_cover`, `blog_summary`, `cover_path`, `cover_height`, `cover_width`, `thumb_path`, `gallery_thumb_path`, `thumb_height`, `thumb_width`, `blog_status`, `blog_event`, `event_start`, `event_end`, `gallery_path`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `updated_by`, `head_script`, `after_head`, `footer_script`, `pdf_status`) VALUES
(11, 'TSIT532741BL', 'blogdummy', 'blog', '16', '25 March 2021', '10:53 am', '04:08 pm', '2021-03-12 10:53:27', '2021-03-12 16:08:42', '<p>blogdummy</p>\r\n', 'Cover-2021-03-25-1615565322.JPG', 'blogdummy', 'images/Blogs/Covers/default.jpg', 0, 0, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/blog-1615546407/', 'blog', 'blog', 'blog', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(12, 'TSIT103728BL', 'dummy', 'blog', '15', '1 January 1970', '04:10 pm', '04:10 pm', '2021-03-12 16:10:37', '2021-03-12 16:10:45', '<p>bg</p>\r\n', 'Cover-1970-01-01-1615565445.JPG', 'bh', 'images/Blogs/Covers/default.jpg', 0, 0, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/blog-1615565437/', 'blog', 'blog', 'blog', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(13, 'TSIT144812BL', 'tests', 'blog', '15', '28 February 2021', '04:14 pm', '10:56 am', '2021-03-12 16:14:48', '2021-03-15 10:56:36', '<p>ss</p>\r\n', 'Cover-2021-02-28-1615805796.JPG', 'ss', 'images/Blogs/Covers/default.jpg', 3648, 5472, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/blog-1615565688/', 'blog', 'blog', 'blog', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(15, 'TSIT052398BL', 'blogdummysstests', 'blog', '15', '31 March 2021', '05:05 pm', '10:51 am', '2021-03-12 17:05:23', '2021-03-15 10:51:56', '<p>ssss</p>\r\n', 'Cover-2021-03-31-1615805204.JPG', 'ssss', 'images/Blogs/Covers/default.jpg', 3648, 5472, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/blog-1615568723/', 'blogs', 'blog', 'blogs', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(18, 'TSIT392447BL', 'test editor', 'test editor', '15', '31 March 2021', '04:39 pm', '04:48 pm', '2021-03-19 16:39:24', '2021-03-19 16:51:33', '<p>admin(SEO)</p>\r\n\r\n<p>&#39;&quot;`</p>\r\n\r\n<?php echo â€˜eâ€™; ?>', 'Cover-2021-03-31-1616171964.jpg', 'test editor', 'images/Blogs/Covers/Cover-2021-03-31-1616171964.jpg', 683, 1024, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/test_editor-1616171964/', 'test editor', 'test editor', 'test editor', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(19, 'TSIT431489BL', 'test editor2', 'test editor', '17', '17 March 2021', '04:43 pm', NULL, '2021-03-19 16:43:14', NULL, '<p>()[]{}â„—â€›&bdquo;&ldquo;&ldquo;&#39;}&ndash;â€›â€›â€›&sbquo;&rsquo;&lsquo;&#39;&laquo;&raquo;</p>\r\n', 'Cover-2021-03-17-1616172194.jpg', 'test editor', 'images/Blogs/Covers/Cover-2021-03-17-1616172194.jpg', 683, 1024, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/test_editor-1616172194/', 'test editor', 'test editor', 'test editor', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No'),
(20, 'TSIT445555BL', 'test editor4', 'test editor', '16', '8 March 2021', '04:44 pm', NULL, '2021-03-19 16:44:55', NULL, '<p>â€›&sbquo;&rsquo;&lsquo;&#39;&laquo;&raquo;</p>\r\n', 'Cover-2021-03-08-1616172295.jpg', 'test editor', 'images/Blogs/Covers/Cover-2021-03-08-1616172295.jpg', 683, 1024, '', '', 0, 0, 'Active', 'No', NULL, NULL, 'images/Blogs/Gallery/test_editor-1616172295/', 'test editor', 'test editor', 'test editor', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `blog_scat`
--

CREATE TABLE `blog_scat` (
  `id` int(11) NOT NULL,
  `scat_uniid` varchar(255) NOT NULL,
  `scat_title` varchar(255) NOT NULL,
  `scat_cates` varchar(50) NOT NULL,
  `scat_mcate` varchar(50) NOT NULL,
  `scat_body` mediumtext NOT NULL,
  `scat_status` varchar(50) NOT NULL,
  `scat_url` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `scat_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `scat_position` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `scat_top` varchar(255) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `head_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_sscat`
--

CREATE TABLE `blog_sscat` (
  `id` int(11) NOT NULL,
  `sscat_uniid` varchar(255) NOT NULL,
  `sscat_title` varchar(255) NOT NULL,
  `sscat_scate` varchar(50) NOT NULL,
  `sscat_mcate` varchar(50) NOT NULL,
  `sscat_body` mediumtext NOT NULL,
  `sscat_status` varchar(50) NOT NULL,
  `sscat_url` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `sscat_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `sscat_position` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `sscat_top` varchar(255) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `head_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `short_details` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `text_body` text NOT NULL,
  `page_id` varchar(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(255) NOT NULL DEFAULT 'index, follow',
  `url` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `short_details`, `duration`, `cost`, `timing`, `text_body`, `page_id`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `url`, `status`, `position`, `summary`) VALUES
(1, 'Demo Class', 'Demo Classes', '5 days', '1000 pkr', '4:00 pm to 10:00 pm', '<p>Demo Class Demo class Demo Class Demo class Demo Class</p>\r\n', '4', 'Demo Class', 'Demo Class', 'Demo Class', 'index, follow', 'Demo Class', 'Active', '5', 'Demo Classes');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `config_name` varchar(20) NOT NULL,
  `config_value` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`config_name`, `config_value`) VALUES
('ACCOUNT_ACTIVATION', '4'),
('ALLOW_MULTI_LOGONS', '1'),
('ALL_LOWERCASE', '1'),
('COOKIE_EXPIRE', '14'),
('COOKIE_PATH', '/'),
('DATE_FORMAT', 'M j, Y, g:i a'),
('EMAIL_FROM_ADDR', 'info@thezara.co.uk'),
('EMAIL_FROM_NAME', 'The Zara'),
('EMAIL_WELCOME', '1'),
('ENABLE_CAPTCHA', '0'),
('GUEST_TIMEOUT', '5'),
('home_page', 'index.php'),
('HOME_SETBYADMIN', '1'),
('login_page', 'http://localhost/thezaraV3/admin/login.php'),
('max_pass_chars', '120'),
('max_user_chars', '36'),
('min_pass_chars', '8'),
('min_user_chars', '5'),
('NO_ADMIN_REDIRECT', '1'),
('PERSIST_NOT_EXPIRE', '1'),
('record_online_date', '1611759397'),
('record_online_users', '3'),
('SITE_DESC', 'The Zara'),
('SITE_NAME', 'The Zara'),
('TURN_ON_INDIVIDUAL', '0'),
('USERNAME_REGEX', 'letter_num_spaces'),
('USER_HOME_PATH', '/'),
('USER_TIMEOUT', '120'),
('Version', '3.1.5'),
('WEB_ROOT', 'http://localhost/thezaraV3/admin/');

-- --------------------------------------------------------

--
-- Table structure for table `date_prayer`
--

CREATE TABLE `date_prayer` (
  `pd_id` int(11) NOT NULL,
  `prayer_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_prayer`
--

INSERT INTO `date_prayer` (`pd_id`, `prayer_date`) VALUES
(1, '2021-03-18'),
(2, '2021-03-02'),
(3, '2021-03-16'),
(4, '2021-03-27'),
(5, '2021-04-08'),
(6, '2021-04-15'),
(7, '2021-04-29'),
(8, '2021-05-14'),
(9, '2021-05-21'),
(10, '2021-07-23'),
(11, '2021-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `intr_order`
--

CREATE TABLE `intr_order` (
  `id` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intr_order`
--

INSERT INTO `intr_order` (`id`, `first`, `last`, `address`, `address2`, `city`, `postal`, `email`) VALUES
(1, 'ali', 'sheraz', 'aa', 'aa', 'lhr', 22, 'ali@gmail.com'),
(2, 'ali', 'sheraz', 'aa', 'aa', 'lhr', 22, 'ali@gmail.com'),
(3, 'taqi', 'haider', 'aa', 'aa', 'lhr', 22, 'ali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `timestamp` int(11) UNSIGNED NOT NULL,
  `ip` varchar(15) NOT NULL,
  `log_operation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_table`
--

INSERT INTO `log_table` (`id`, `userid`, `timestamp`, `ip`, `log_operation`) VALUES
(1, 1, 1613993855, '127.0.0.1', 'DELETED ALL LOGS'),
(2, 1, 1614073863, '127.0.0.1', 'LOGIN'),
(3, 1, 1614088555, '127.0.0.1', 'LOGIN'),
(4, 1, 1614175342, '::1', 'LOGIN'),
(5, 1, 1614340283, '::1', 'LOGIN'),
(6, 1, 1614345767, '::1', 'LOGIN'),
(7, 1, 1614595159, '::1', 'LOGIN'),
(8, 1, 1614668963, '::1', 'LOGIN'),
(9, 1, 1614680426, '::1', 'LOGIN'),
(10, 1, 1614694781, '::1', 'LOGOFF'),
(11, 1, 1614694802, '::1', 'LOGIN'),
(12, 1, 1614776414, '::1', 'LOGIN'),
(13, 1, 1615208291, '::1', 'LOGIN'),
(14, 1, 1615209229, '::1', 'LOGOFF'),
(15, 1, 1615507338, '::1', 'LOGIN'),
(16, 1, 1615546258, '::1', 'LOGIN'),
(17, 1, 1615547158, '::1', 'LOGIN'),
(18, 1, 1615803157, '::1', 'LOGIN'),
(19, 1, 1615899265, '::1', 'LOGIN'),
(20, 1, 1615907823, '::1', 'LOGIN'),
(21, 1, 1615910058, '::1', 'LOGIN'),
(22, 1, 1615977096, '::1', 'LOGIN'),
(23, 1, 1616160805, '::1', 'LOGIN'),
(24, 1, 1616162476, '::1', 'LOGIN'),
(25, 1, 1616162970, '::1', 'LOGIN'),
(26, 1, 1616168353, '::1', 'LOGIN'),
(27, 1, 1616700647, '::1', 'LOGIN'),
(28, 1, 1616758757, '::1', 'LOGIN'),
(29, 1, 1616769560, '::1', 'LOGIN'),
(30, 1, 1616771346, '::1', 'LOGIN'),
(31, 1, 1617274577, '::1', 'LOGIN'),
(32, 1, 1617275140, '::1', 'LOGIN'),
(33, 1, 1617277316, '::1', 'LOGIN'),
(34, 1, 1617691222, '::1', 'LOGIN'),
(35, 1, 1617691263, '::1', 'LOGIN'),
(36, 1, 1621413284, '::1', 'LOGIN'),
(37, 1, 1621414121, '::1', 'LOGIN'),
(38, 1, 1623322309, '::1', 'LOGIN'),
(39, 1, 1624627190, '::1', 'LOGIN'),
(40, 1, 1624627379, '::1', 'LOGOFF'),
(41, 1, 1627999370, '::1', 'LOGIN'),
(42, 1, 1628059010, '::1', 'LOGIN');

-- --------------------------------------------------------

--
-- Table structure for table `mcat`
--

CREATE TABLE `mcat` (
  `id` int(11) NOT NULL,
  `mcat_uniid` varchar(255) NOT NULL,
  `mcat_title` varchar(255) NOT NULL,
  `mcat_url` varchar(255) NOT NULL,
  `mcat_cates` varchar(50) NOT NULL,
  `mcat_body` mediumtext NOT NULL,
  `mcat_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `mcat_status` varchar(50) NOT NULL,
  `mcat_position` int(11) NOT NULL,
  `mcat_summary` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `head_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcat`
--

INSERT INTO `mcat` (`id`, `mcat_uniid`, `mcat_title`, `mcat_url`, `mcat_cates`, `mcat_body`, `mcat_cover`, `cover_height`, `cover_width`, `thumb_path`, `thumb_height`, `thumb_width`, `cover_path`, `mcat_status`, `mcat_position`, `mcat_summary`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `updated_by`, `head_script`, `after_head`, `footer_script`) VALUES
(1, '122155C', 'Home', 'index', 'Yes', '<p>One of The Best Asian Bridal Makeup Artist In London | The Zara</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 1, 'One of The Best Asian Bri', 'One of The Best Asian Bridal Makeup Artist In London | The Zara', 'the, thezara, zara,', 'One of The Best Asian Bridal Makeup Artist In London | The Zara', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(2, 'TSIT153976C', 'Artistry', 'About Zara', 'Yes', '<p><a class=\"sf-with-ul\">Artistry</a></p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 2, 'Artistry', 'Artistry', 'Artistry', 'Artistry', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(3, 'TSIT180774C', 'Portfolio', 'Portfolio', 'Yes', '<p>Portfolio</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 3, 'Portfolio', 'Portfolio', 'Portfolio', 'Portfolio', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(4, 'TSIT182850C', 'Academy', 'Academy', 'Yes', '<p>Academy</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 4, 'Academy', 'Academy', 'Academy', 'Academy', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(5, 'TSIT185409C', 'Services', 'Services', 'Yes', '<p>Services</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 5, 'Services', 'Services', 'Services', 'Services', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(6, 'TSIT193869C', 'Contact', 'Contact', 'Yes', '<p>Contact</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 7, 'Contact', 'Contact', 'Contact', 'Contact', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(7, 'TSIT282521C', 'Blog', 'The Zara News', 'Yes', '<p>Blog</p>\r\n', 'default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, 'images/Categories/Covers/default.jpg', 'Active', 6, 'Blog', 'Blog', 'Blog', 'Blog', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_device` varchar(255) NOT NULL,
  `consent` varchar(255) NOT NULL,
  `subcribe_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_uniid` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `is_parent` varchar(11) NOT NULL,
  `is_scat` varchar(11) NOT NULL,
  `page_category` varchar(255) NOT NULL DEFAULT 'No',
  `page_url` varchar(255) NOT NULL,
  `page_position` int(11) NOT NULL,
  `page_body` mediumtext NOT NULL,
  `page_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `page_status` varchar(50) NOT NULL,
  `gallery_path` text NOT NULL,
  `thumb_gallery_path` varchar(255) NOT NULL,
  `show_footer` varchar(50) NOT NULL,
  `show_header` varchar(50) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `head_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `page_summary` varchar(2083) NOT NULL,
  `v_embd` varchar(255) NOT NULL,
  `pdf_status` varchar(255) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_uniid`, `page_title`, `is_parent`, `is_scat`, `page_category`, `page_url`, `page_position`, `page_body`, `page_cover`, `cover_height`, `cover_width`, `thumb_path`, `thumb_width`, `thumb_height`, `cover_path`, `page_status`, `gallery_path`, `thumb_gallery_path`, `show_footer`, `show_header`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `updated_by`, `head_script`, `after_head`, `footer_script`, `page_summary`, `v_embd`, `pdf_status`) VALUES
(1, '035665', 'Home', 'Yes', 'No', 'No', 'index', 1, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year.</p>\r\n', 'Cover-1614089065.jpg', 480, 640, 'images/Pages/Covers/thumb/Cover-1614089065.jpg', 500, 375, 'images/Pages/Covers/Cover-1614089065.jpg', 'Active', 'images/Pages/Gallery/Home-1614089036/', 'images/Pages/Gallery/Home-1614089036/thumb/', 'No', 'Yes', 'One of The Best Asian Bridal Makeup Artist In London | The Zara', 'the, thezara, zara,', 'One of The Best Asian Bridal Makeup Artist In London | The Zara', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'One of The Best Asian Bridal Makeup Artist In London | The Zara', 'No', 'No'),
(2, '073117', 'Artistry', 'Yes', 'Yes', 'No', 'Artistry', 2, '<p>Artistry</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Not Active', 'images/Pages/Gallery/Artistry-1614089251/', 'images/Pages/Gallery/Artistry-1614089251/thumb/', 'No', 'Yes', 'Artistry', 'Artistry', 'Artistry', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Artistry', 'No', 'No'),
(3, '104949', 'About Thezara', 'No', 'No', '2', 'About Thezara', 1, '<p>Zara is a Mac Asian bridal makeup artist and hair stylist based in London. As seen in Asiana, trained by Kashees &amp; Jugnu. ​ Best Asian and English bridal makeup artist in London. Zara is qualified Makeup artist. Trained in Stanmore college London and Kashees in Pakistan as well as worked with Deplex, Newlook, Cosmos, Mac and Allenora. Also running Makeup courses in her own studio and in different institutions such as Kesingten and Chelsea College London. Also served as judge in makeup contest in Kesingten and Chelsea College London. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 522233</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/About_Thezara-1614089449/', 'images/Pages/Gallery/About_Thezara-1614089449/thumb/', 'No', 'Yes', 'About Thezara', 'About Thezara', 'About Thezara', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Zara is a Mac Asian bridal makeup artist and hair stylist based in London. As seen in Asiana, trained by Kashees & Jugnu.', 'No', 'No'),
(4, '410006', 'Portfolio', 'Yes', 'Yes', 'No', 'Portfolio', 3, '<p>Get Elegant &amp; Stunning Asian Bridal Makeup &amp; Hairstyles Looks Especially for Indian &amp; Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in UK, Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara will provide a personalized Asian Bridal Makeup &amp; Hairstyles Looks services which encompasses 100% bespoke consultation to understand your personality. She always focuses on your natural beauty and produce a SIMPLY STUNNING SIGNATURE LOOK. Having a vast experience in the Asian Brides, Bridal Mhindi/Henna and Bridal Hairstyles, we can create a memorable bespoke look for Asian Brides. Zara is providing full bridal service including facials, waxing, pedicure, manicure, eyebrow tinting etc. For bookings do not hesitate to contact on 07948 522233.</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Portfolio-1614091260/', 'images/Pages/Gallery/Portfolio-1614091260/thumb/', 'No', 'Yes', 'Portfolio', 'Portfolio', 'Portfolio', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Get Elegant & Stunning Asian Bridal Makeup & Hairstyles Looks Especially for Indian & Pakistani Girls To Suit your personal requirements by Professional Makeup Artist', 'No', 'No'),
(5, '493137', 'Asian Bridals', 'No', 'No', '4', 'Asian Bridals', 1, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'Cover-1614092545.jpg', 1024, 1535, 'images/Pages/Covers/thumb/Cover-1614092545.jpg', 500, 334, 'images/Pages/Covers/Cover-1614092545.jpg', 'Active', 'images/Pages/Gallery/Asian_Bridals-1614091771/', 'images/Pages/Gallery/Asian_Bridals-1614091771/thumb/', 'No', 'Yes', 'Asian Bridals', 'Asian Bridals', 'Asian Bridals', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(6, '044191', 'Model Makeup', 'No', 'No', '4', 'Model Makeup', 2, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'Cover-1614092680.jpg', 1024, 1536, 'images/Pages/Covers/thumb/Cover-1614092680.jpg', 500, 333, 'images/Pages/Covers/Cover-1614092680.jpg', 'Active', 'images/Pages/Gallery/Model_Makeup-1614092681/', 'images/Pages/Gallery/Model_Makeup-1614092681/thumb/', 'No', 'Yes', 'Model Makeup', 'Model Makeup', 'Model Makeup', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020', 'No', 'No'),
(7, '223870', 'Party Makeup', 'No', 'No', '4', 'Party Makeup', 3, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'Cover-1614093756.jpg', 1024, 1536, 'images/Pages/Covers/thumb/Cover-1614093756.jpg', 500, 333, 'images/Pages/Covers/Cover-1614093756.jpg', 'Active', 'images/Pages/Gallery/Party_Makeup-1614093758/', 'images/Pages/Gallery/Party_Makeup-1614093758/thumb/', 'No', 'Yes', 'Party Makeup', 'Party Makeup', 'Party Makeup', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(8, '304391', 'Mehandi / Henna', 'No', 'No', '4', 'Mehandi Henna', 4, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'Cover-1614094242.jpg', 1024, 1539, 'images/Pages/Covers/thumb/Cover-1614094242.jpg', 500, 333, 'images/Pages/Covers/Cover-1614094242.jpg', 'Active', 'images/Pages/Gallery/Mehandi_/_Henna-1614094243/', 'images/Pages/Gallery/Mehandi_/_Henna-1614094243/thumb/', 'No', 'Yes', 'Mehandi / Henna', 'the, thezara, zara,', 'Mehandi / Henna', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020', 'No', 'No'),
(9, '335310', 'Casual Looks', 'No', 'No', '4', 'Casual Looks', 5, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Casual_Looks-1614094433/', 'images/Pages/Gallery/Casual_Looks-1614094433/thumb/', 'No', 'Yes', 'Casual Looks', 'Casual Looks', 'Casual Looks', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(10, '363562', 'Hair Styles', 'No', 'No', '4', 'Hair Styles', 6, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'Cover-1614094594.jpg', 1024, 1033, 'images/Pages/Covers/thumb/Cover-1614094594.jpg', 500, 496, 'images/Pages/Covers/Cover-1614094594.jpg', 'Active', 'images/Pages/Gallery/Hair_Styles-1614094595/', 'images/Pages/Gallery/Hair_Styles-1614094595/thumb/', 'No', 'Yes', 'Hair Styles', 'Hair Styles', 'Hair Styles', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(11, '383723', 'Hijab Styles', 'No', 'No', '4', 'Hijab Styles', 7, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Hijab_Styles-1614094717/', 'images/Pages/Gallery/Hijab_Styles-1614094717/thumb/', 'No', 'Yes', 'Hijab Styles', 'Hijab Styles', 'Hijab Styles', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(12, '401583', 'Academy', 'Yes', 'Yes', 'No', 'Academy', 3, '<p>Get Elegant &amp; Stunning Asian Bridal Makeup &amp; Hairstyles Looks Especially for Indian &amp; Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in UK, Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara will provide a personalized Asian Bridal Makeup &amp; Hairstyles Looks services which encompasses 100% bespoke consultation to understand your personality. She always focuses on your natural beauty and produce a SIMPLY STUNNING SIGNATURE LOOK. Having a vast experience in the Asian Brides, Bridal Mhindi/Henna and Bridal Hairstyles, we can create a memorable bespoke look for Asian Brides. Zara is providing full bridal service including facials, waxing, pedicure, manicure, eyebrow tinting etc. For bookings do not hesitate to contact on 07948 522233.</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Academy-1614094815/', 'images/Pages/Gallery/Academy-1614094815/thumb/', 'No', 'Yes', 'Academy', 'Academy', 'Academy', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Get Elegant & Stunning Asian Bridal Makeup & Hairstyles Looks Especially for Indian & Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in ', 'No', 'No'),
(13, '443655', 'Services', 'Yes', 'No', 'No', 'Services', 5, '<p>Get Elegant &amp; Stunning Asian Bridal Makeup &amp; Hairstyles Looks Especially for Indian &amp; Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in UK, Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara will provide a personalized Asian Bridal Makeup &amp; Hairstyles Looks services which encompasses 100% bespoke consultation to understand your personality. She always focuses on your natural beauty and produce a SIMPLY STUNNING SIGNATURE LOOK. Having a vast experience in the Asian Brides, Bridal Mhindi/Henna and Bridal Hairstyles, we can create a memorable bespoke look for Asian Brides. Zara is providing full bridal service including facials, waxing, pedicure, manicure, eyebrow tinting etc. For bookings do not hesitate to contact on 07948 522233.</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Services-1614095076/', 'images/Pages/Gallery/Services-1614095076/thumb/', 'No', 'Yes', 'Services', 'Services', 'Services', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Get Elegant & Stunning Asian Bridal Makeup & Hairstyles Looks Especially for Indian & Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in ', 'No', 'No'),
(14, '462983', 'Blog', 'Yes', 'Yes', 'No', 'Blog', 6, '<p>The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara&#39;s uses Mac, Nars, Bobby Brown, Smash Box and Huda Beauty. For bookings and makeup training courses do not hesitate to contact on 07948 52223</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Blog-1614095189/', 'images/Pages/Gallery/Blog-1614095189/thumb/', 'No', 'Yes', 'Blog', 'Blog', 'Blog', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara, Highly Commended Creative Makeup Artist of 2020. Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain’s Asian Wedding Awards 2020 und', 'No', 'No'),
(15, '470943', 'The Zara News', 'No', 'No', '14', 'The Zara News', 1, '<p>The Zara News</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/The_Zara_News-1614095229/', 'images/Pages/Gallery/The_Zara_News-1614095229/thumb/', 'No', 'Yes', 'The Zara News', 'The Zara News', 'The Zara News', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara News', 'No', 'No'),
(16, '473204', 'The Zara Events', 'No', 'No', '14', 'The Zara Events', 2, '<p>The Zara Events</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/The_Zara_Events-1614095252/', 'images/Pages/Gallery/The_Zara_Events-1614095252/thumb/', 'No', 'Yes', 'The Zara Events', 'The Zara Events', 'The Zara Events', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara Events', 'No', 'No'),
(17, '480080', 'The Zara Remedies', 'No', 'No', '14', 'The Zara Remedies', 3, '<p>The Zara Remedies</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/The_Zara_Remedies-1614095280/', 'images/Pages/Gallery/The_Zara_Remedies-1614095280/thumb/', 'No', 'Yes', 'The Zara Remedies', 'The Zara Remedies', 'The Zara Remedies', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'The Zara Remedies', 'No', 'No'),
(18, '483582', 'Contact', 'Yes', 'Yes', 'No', 'Contact', 7, '<pre id=\"line1\">\r\n<span>Contact</span></pre>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Contact-1614095315/', 'images/Pages/Gallery/Contact-1614095315/thumb/', 'No', 'Yes', 'Contact', 'Contact', 'Contact', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Contact', 'No', 'No'),
(19, '500165', 'Privacy Policy', 'No', 'No', '18', 'Privacy Policy', 1, '<p>Avenir Light is a clean and stylish font favored by designers. It&#39;s easy on the eyes and a great go to font for titles, paragraphs &amp; more.</p>\r\n\r\n<p>In this Privacy Policy (this &ldquo;Policy&rdquo;), &ldquo;The Zara, Asian Bridal Makeup Artist&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo; means The Zara, Asian Bridal Makeup Artist. (a company incorporated and registered in ENGLAND whose office is at 2 Middleton Drive, HA5 2PG, Pinner, London; &ldquo;you&rdquo; or &ldquo;your&rdquo; means you, the person who provides us with personal data; and &ldquo;personal data&rdquo; shall have the meaning assigned to it in Article 4 of Regulation (EU) 2016/679 of the European Parliament and of the Council. By using THE ZARA&rsquo;s Services, you accept our Privacy Policy and our processing of your personal data. You also agree to THE ZARA&rsquo;s use of electronic communication channels to send you information. It is important that you read and understand our Privacy Policy before using our Services.</p>\r\n\r\n<p>Information we collect about you.<br />\r\nPersonal Information Collection We may request or collect personal information from online users in a variety of ways, including through online forms for service enquiries &ldquo;Personal information&rdquo; in this privacy policy, we mean information, which identifies you as an individual, or is capable of doing so &ndash; for example, your name, address, telephone number, email address, date of birth and billing information. Any data that you submit using our web form [info@thezara.co.uk] will be held by us as a Data Controller and will be held securely and in accordance with [the General Data Protection Regulation][the Data Protection Act 2018] for [6 months] before being securely and confidentially destroyed. Your data will not be disclosed to any third parties without your consent or as otherwise allowed by the relevant Data Protection legislation and will only be used for responding to your query (or purposes associated with that purpose).You have the right to be informed about what data we hold about you along with other rights set out in the legislation.&nbsp; Further information about your rights under the data protection legislation can be found at www.ico.org.uk Non-Personally identifying information When a user interacts with our site, we may also collect information using cookies and log files which may include your Internet Protocol (IP), browser &ldquo;user-agent&rdquo;, pages viewed and other similar activities.<br />\r\n<br />\r\nTHE ZARA collects, uses and stores your Personal Data in accordance with applicable law and EU directives regarding the Protection of Persons and Personal Data, as modified.<br />\r\nTHE ZARA uses your Personal Data for the provision of Services and billing purposes.<br />\r\nTHE ZARA may use your Personal Data to improve their Services.<br />\r\nTHE ZARA may use your Personal Data to detect misuse of its system and / or a customer account.<br />\r\nTHE ZARA may use the Personal Data to provide you with information relating to your account.<br />\r\nTHE ZARA may use the Personal Data for marketing purposes, unless you object to this. Thus, you may at any time and without charge, contact THE ZARA to stop any use of your Personal Data for advertising or solicitation purposes.<br />\r\nBy using the Services provided by THE ZARA, you agree that your Personal Data can be transmitted to partners in Members States of European Union or in countries providing adequate protection for the provision of the Services.</p>\r\n\r\n<p>Personal Data may additionally be communicated to any employee of THE ZARA or any partner involved in providing the Services. The communication to these third parties is limited to data necessary for the performance of their tasks for the same purposes as the one of THE ZARA.</p>\r\n\r\n<p>Access to your Personal Data</p>\r\n\r\n<p>You can request free access to your Personal Data processed and stored by THE ZARA in the secure contact us form section.</p>\r\n\r\n<p>You have the following rights:</p>\r\n\r\n<p>Right of access to your Personal Data: You have the right to ask us for confirmation on whether we are processing your Personal Data, and access to the Personal Data and related information on that processing (e.g., the purposes of the processing, or the categories of Personal Data involved).</p>\r\n\r\n<p>Right to correction: You have the right to have your Personal Data corrected, as permitted by law.</p>\r\n\r\n<p>Right to erasure: You have the right to ask us to delete your Personal Data, as permitted by law. This right may be exercised among other things: (i) when your Personal Data is no longer necessary for the purposes for which it was collected or otherwise processed; (ii) when you withdraw consent on which processing is based and where there is no other legal ground for processing; (iii) when you object to processing pursuant to Art. 21 (1) GDPR and there are no overriding legitimate grounds for the processing, or when you object to the processing pursuant to Art. 21 (2) GDPR; or, (iv) when your Personal Data has been unlawfully processed.</p>\r\n\r\n<p>Right to restriction of processing (Art. 18 GDPR): You have the right to request the limiting of our processing under limited circumstances, including: when the accuracy of your Personal Data is contested; when the processing is unlawful and you oppose the erasure of your Personal Data and request the restriction of the use of your Personal Data instead; or when you have objected to processing pursuant to Art. 21 (1) GDPR pending the verification whether the legitimate grounds of THE ZARA override your grounds.</p>\r\n\r\n<p>Right to data portability: You have the right to receive the Personal Data that you have provided to us, in a structured, commonly used and machine-readable format, and you have the right to transmit that information to another controller, including to have it transmitted directly, where technically feasible.</p>\r\n\r\n<p>Right to object: You have the right to object to our processing of your Personal Data, as permitted by law. This right is limited to processing based on Art. 6 (1) (e) or (f) GDPR, and includes profiling based on those provisions, and processing for direct marketing purposes. After which, we will no longer process your Personal Data unless we can demonstrate compelling legitimate grounds for the processing that override your interests, rights and freedoms or for the establishment, exercise or defense of legal claims.,</p>\r\n\r\n<p>Data Retention</p>\r\n\r\n<p>We will retain your Personal Data for as long as necessary to provide you the Services. We will also retain your Personal Data as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</p>\r\n\r\n<p>Where we no longer need to process your Personal Data for the purposes set out in this Privacy Policy, we will delete your Personal Data from our systems.</p>\r\n\r\n<p>Where permissible, we will also delete your Personal Data upon your request, after which we may not be able to continue to provide you with the Services. Information on how to make a deletion request can be found by contact us form.</p>\r\n\r\n<p>Security of your Personal Data</p>\r\n\r\n<p>THE ZARA uses standard security technologies and procedures to ensure the protection of your Personal Data against unauthorized access, use, disclosure or destruction.</p>\r\n\r\n<p>THE ZARA takes security measures, such as technical and organizational measures against unauthorized or unlawful access to your Personal Data and against accidental loss or destruction of, or damage to your Personal Data.</p>\r\n\r\n<p>Any sensitive information, such as your credit card number are &nbsp;protected by encryption. The encrypted communication is established using Secure Sockets Layer (SSL) technology.</p>\r\n\r\n<p>Indeed, SSL provides the secure exchange of data between two computers in order to ensure the confidentiality, integrity of exchanged information and authentication by recognition of the identity of the program, the person or company with which the Personal Data is exchanged.</p>\r\n\r\n<p>Cookies</p>\r\n\r\n<p>THE ZARA draws your attention to the fact that during the time of the connection to the &ldquo;<a data-auto-recognition=\"true\" href=\"https://www.thezara.co.uk/\" target=\"_blank\">www.TheZara.co.uk</a>&rdquo; site, a cookie can be automatically installed.</p>\r\n\r\n<p>Cookies are small text files that are stored on your device and similar technologies, with the help of which our services can be provided and data can be collected. With cookies we can save your preferences and settings; make it possible for you to register; offer interest-based ads; combat fraud; and analyze how our websites and online services perform.</p>\r\n\r\n<p>We may also use web beacons to help deliver cookies and collect usage and performance data. Our websites may include web beacons and cookies from other service providers.</p>\r\n\r\n<p>You have a wide range of tools to manage cookies, web beacons and similar technologies, including browser control to block and remove cookies from third-party analytics services to no longer allow data collection through web beacons and similar technologies. Your browser and other choices may affect your experiences with our products.</p>\r\n\r\n<p>CHANGES TO OUR PRIVACY NOTICE</p>\r\n\r\n<p>For information about how to get access to your personal data and for exercising your rights, please contact us at <a data-auto-recognition=\"true\" href=\"mailto:info@thezara.co.uk\">info@TheZara.co.ukYour</a> Your Responsibilities If any of your information changes, it is your sole responsibility to notify us about the change as soon as possible. It is your sole responsibility to ensure that all usernames and passwords issued to you are kept safe and secure. Changes to our privacy policy We may change our privacy policy from time to time or how your data is processed under the Data Protection Act.</p>\r\n\r\n<p>Let&rsquo;s get started to have a Signature Look.<br />\r\nAre you ready for a better, more Productive Services idea?</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Privacy_Policy-1614095401/', 'images/Pages/Gallery/Privacy_Policy-1614095401/thumb/', 'No', 'Yes', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Privacy Policy', 'No', 'No'),
(20, '504415', 'Disclaimer', 'No', 'No', '18', 'Disclaimer', 2, '<p>Get Elegant &amp; Stunning Asian Bridal Makeup &amp; Hairstyles Looks Especially for Indian &amp; Pakistani Girls To Suit your personal requirements by Professional Makeup Artist in UK, Alhamdulilah The Zara extremely excited and humbled to be selected as a Britain&rsquo;s Asian Wedding Awards 2020 under the category of creative Make-Up Artist of the Year. The Zara will provide a personalized Asian Bridal Makeup &amp; Hairstyles Looks services which encompasses 100% bespoke consultation to understand your personality. She always focuses on your natural beauty and produce a SIMPLY STUNNING SIGNATURE LOOK. Having a vast experience in the Asian Brides, Bridal Mhindi/Henna and Bridal Hairstyles, we can create a memorable bespoke look for Asian Brides. Zara is providing full bridal service including facials, waxing, pedicure, manicure, eyebrow tinting etc. For bookings do not hesitate to contact on 07948 522233.</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Disclaimer-1614095444/', 'images/Pages/Gallery/Disclaimer-1614095444/thumb/', 'No', 'Yes', 'Disclaimer', 'Disclaimer', 'Disclaimer', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Disclaimer', 'No', 'No'),
(21, '515361', 'Book An Appointment', 'No', 'No', '18', 'Book An Appointment', 3, '<p>Book An Appointment</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Book_An_Appointment-1614095513/', 'images/Pages/Gallery/Book_An_Appointment-1614095513/thumb/', 'No', 'Yes', 'Book An Appointment', 'Book An Appointment', 'Book An Appointment', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Book An Appointment', 'No', 'No'),
(22, '052040', 'Main Page', 'Yes', 'Yes', 'No', 'Portfolio', 4, '<p>Portfolio</p>\r\n', 'Cover-1614175520.jpg', 614, 614, 'images/Pages/Covers/thumb/Cover-1614175520.jpg', 500, 500, 'images/Pages/Covers/Cover-1614175520.jpg', 'Active', 'images/Pages/Gallery/Portfolio-1614175520/', 'images/Pages/Gallery/Portfolio-1614175520/thumb/', 'No', 'Yes', 'Portfolio', 'Portfolio', 'Portfolio', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Portfolio', 'No', 'No'),
(23, '071681', 'Second level Page', 'No', 'No', '22', 'Second level Page', 5, '<p>Second level of Page</p>\r\n', 'default.jpg', 0, 0, 'images/Pages/Covers/thumb/default.jpg', 0, 0, 'images/Pages/Covers/default.jpg', 'Active', 'images/Pages/Gallery/Second_level_Page-1614175636/', 'images/Pages/Gallery/Second_level_Page-1614175636/thumb/', 'No', 'Yes', 'Second level Page', 'Second level Page', 'Second level Page', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Second level of Page', 'No', 'No'),
(24, '050086', 'new pages', 'Yes', 'Yes', 'No', 'new', 2, '<p>new page</p>\r\n', 'Cover-2-1615913886.JPG', 3648, 5472, 'images/Pages/Covers/thumb/Cover-1614618327.jpg', 500, 333, 'images/Pages/Covers/Cover-2-1615913886.JPG', 'Active', 'images/Pages/Gallery/new_page4-1614618300/', 'images/Pages/Gallery/new_page4-1614618300/thumb/', 'No', 'Yes', 'new', 'new', 'new', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'new page', 'No', 'No'),
(25, '081995', 'new sub page', 'No', 'No', '24', 'new', 14, '<p>new sub page</p>\r\n', 'Cover-1614618534.jpg', 683, 1024, 'images/Pages/Covers/thumb/Cover-1614618534.jpg', 500, 333, 'images/Pages/Covers/Cover-1614618534.jpg', 'Active', 'images/Pages/Gallery/new_sub_page-1614618499/', 'images/Pages/Gallery/new_sub_page-1614618499/thumb/', 'No', 'Yes', 'new', 'new', 'new', 'index, follow', 'Admin', 'Admin', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'new sub page', 'No', 'No'),
(26, '013509', 'pagesdummy', 'Yes', 'No', 'No', 'pages', 2, '<p>pge</p>\r\n', 'Cover-2-1615550495.JPG', 0, 0, '', 0, 0, 'images/Pages/Covers/Cover-2-1615550495.JPG', 'Active', 'images/Pages/Gallery/pagesdummy-1615550495/', '', 'No', 'Yes', 'pages', 'pages', 'pages', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'pge', 'No', 'No'),
(27, '023992', 'pagestest', 'Yes', 'No', 'No', 'pages', 2, '<p>reload</p>\r\n', 'Cover-2-1615561359.JPG', 0, 0, '', 0, 0, 'images/Pages/Covers/Cover-2-1615561359.JPG', 'Active', 'images/Pages/Gallery/pagestest-1615561359/', '', 'No', 'Yes', 'pages', 'pages', 'blog', 'index, follow', 'Admin', '', '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'reload', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `page_images`
--

CREATE TABLE `page_images` (
  `id` double NOT NULL,
  `page_id` varchar(500) NOT NULL,
  `image_file` text NOT NULL,
  `gallery_height` int(11) NOT NULL,
  `gallery_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `gallery_img_pos` int(11) NOT NULL DEFAULT 99,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_images`
--

INSERT INTO `page_images` (`id`, `page_id`, `image_file`, `gallery_height`, `gallery_width`, `thumb_height`, `thumb_width`, `gallery_img_pos`, `created_at`) VALUES
(17, '5', 'Gallery-01614091795.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(18, '5', 'Gallery-11614091796.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(19, '5', 'Gallery-21614091796.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(20, '5', 'Gallery-31614091797.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(21, '5', 'Gallery-41614091797.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(22, '5', 'Gallery-51614091798.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(23, '5', 'Gallery-61614091798.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:50:02'),
(24, '5', 'Gallery-71614091798.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:50:02'),
(25, '5', 'Gallery-81614091799.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:50:02'),
(26, '5', 'Gallery-91614091799.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:02'),
(27, '5', 'Gallery-101614091800.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:02'),
(28, '5', 'Gallery-111614091800.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:02'),
(29, '5', 'Gallery-121614091800.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:02'),
(30, '5', 'Gallery-131614091801.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:02'),
(31, '5', 'Gallery-141614091801.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:50:02'),
(32, '5', 'Gallery-01614091841.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:45'),
(33, '5', 'Gallery-11614091841.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:50:45'),
(34, '5', 'Gallery-21614091842.jpg', 682, 1024, 466, 700, 99, '2021-02-23 14:50:45'),
(35, '5', 'Gallery-31614091842.jpg', 577, 751, 500, 651, 99, '2021-02-23 14:50:45'),
(36, '5', 'Gallery-41614091842.jpg', 577, 1024, 394, 700, 99, '2021-02-23 14:50:45'),
(37, '5', 'Gallery-51614091842.jpg', 577, 1024, 394, 700, 99, '2021-02-23 14:50:45'),
(38, '5', 'Gallery-61614091842.jpg', 768, 1024, 500, 667, 99, '2021-02-23 14:50:45'),
(39, '5', 'Gallery-71614091842.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 14:50:45'),
(40, '5', 'Gallery-81614091843.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:50:45'),
(41, '5', 'Gallery-91614091844.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:50:45'),
(42, '5', 'Gallery-01614091868.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(43, '5', 'Gallery-11614091869.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(44, '5', 'Gallery-21614091870.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(45, '5', 'Gallery-31614091871.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(46, '5', 'Gallery-41614091872.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 14:51:19'),
(47, '5', 'Gallery-51614091873.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 14:51:19'),
(48, '5', 'Gallery-61614091875.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 14:51:19'),
(49, '5', 'Gallery-71614091876.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(50, '5', 'Gallery-81614091877.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(51, '5', 'Gallery-91614091878.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:19'),
(52, '5', 'Gallery-01614091899.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(53, '5', 'Gallery-11614091900.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(54, '5', 'Gallery-21614091901.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(55, '5', 'Gallery-31614091902.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(56, '5', 'Gallery-41614091903.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(57, '5', 'Gallery-51614091904.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(58, '5', 'Gallery-61614091905.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(59, '5', 'Gallery-71614091906.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(60, '5', 'Gallery-81614091907.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:51:48'),
(61, '5', 'Gallery-91614091908.jpg', 639, 960, 466, 700, 99, '2021-02-23 14:51:48'),
(62, '5', 'Gallery-01614091929.jpg', 960, 638, 500, 332, 99, '2021-02-23 14:52:15'),
(63, '5', 'Gallery-11614091929.jpg', 639, 960, 466, 700, 99, '2021-02-23 14:52:15'),
(64, '5', 'Gallery-21614091929.jpg', 219, 337, 219, 337, 99, '2021-02-23 14:52:15'),
(65, '5', 'Gallery-31614091930.jpg', 195, 468, 195, 468, 99, '2021-02-23 14:52:15'),
(66, '5', 'Gallery-41614091930.jpg', 322, 273, 322, 273, 99, '2021-02-23 14:52:15'),
(67, '5', 'Gallery-51614091930.jpg', 399, 600, 399, 600, 99, '2021-02-23 14:52:15'),
(68, '5', 'Gallery-61614091930.jpg', 691, 1024, 472, 700, 99, '2021-02-23 14:52:15'),
(69, '5', 'Gallery-71614091930.jpg', 399, 600, 399, 600, 99, '2021-02-23 14:52:15'),
(70, '5', 'Gallery-81614091930.jpg', 894, 900, 500, 503, 99, '2021-02-23 14:52:15'),
(71, '5', 'Gallery-91614091930.jpg', 799, 1024, 500, 641, 99, '2021-02-23 14:52:15'),
(72, '5', 'Gallery-101614091931.jpg', 191, 240, 191, 240, 99, '2021-02-23 14:52:15'),
(73, '5', 'Gallery-111614091931.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 14:52:15'),
(74, '5', 'Gallery-121614091932.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:52:15'),
(75, '5', 'Gallery-131614091933.jpg', 681, 1024, 466, 700, 99, '2021-02-23 14:52:15'),
(76, '5', 'Gallery-141614091935.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:52:15'),
(77, '5', 'Gallery-01614091961.jpg', 682, 1024, 466, 700, 99, '2021-02-23 14:52:48'),
(78, '5', 'Gallery-11614091961.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:52:48'),
(79, '5', 'Gallery-21614091961.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:52:48'),
(80, '5', 'Gallery-31614091962.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:52:48'),
(81, '5', 'Gallery-41614091962.jpg', 1535, 1024, 500, 334, 99, '2021-02-23 14:52:48'),
(82, '5', 'Gallery-51614091962.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:52:48'),
(83, '5', 'Gallery-61614091963.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:52:48'),
(84, '5', 'Gallery-71614091963.jpg', 683, 1024, 467, 700, 99, '2021-02-23 14:52:48'),
(85, '5', 'Gallery-81614091964.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(86, '5', 'Gallery-91614091964.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(87, '5', 'Gallery-101614091964.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(88, '5', 'Gallery-111614091965.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(89, '5', 'Gallery-121614091965.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(90, '5', 'Gallery-131614091966.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(91, '5', 'Gallery-141614091966.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(92, '5', 'Gallery-151614091966.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(93, '5', 'Gallery-161614091967.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(94, '5', 'Gallery-171614091967.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(95, '5', 'Gallery-181614091968.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(96, '5', 'Gallery-191614091968.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:52:48'),
(97, '5', 'Gallery-01614091992.jpg', 560, 400, 500, 357, 99, '2021-02-23 14:53:16'),
(98, '5', 'Gallery-11614091992.jpg', 267, 400, 267, 400, 99, '2021-02-23 14:53:16'),
(99, '5', 'Gallery-21614091992.jpg', 286, 400, 286, 400, 99, '2021-02-23 14:53:16'),
(100, '5', 'Gallery-31614091992.jpg', 286, 400, 286, 400, 99, '2021-02-23 14:53:16'),
(101, '5', 'Gallery-41614091992.jpg', 286, 400, 286, 400, 99, '2021-02-23 14:53:16'),
(102, '5', 'Gallery-51614091992.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(103, '5', 'Gallery-61614091992.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(104, '5', 'Gallery-71614091993.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(105, '5', 'Gallery-81614091993.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(106, '5', 'Gallery-91614091994.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(107, '5', 'Gallery-101614091994.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(108, '5', 'Gallery-111614091994.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(109, '5', 'Gallery-121614091995.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(110, '5', 'Gallery-131614091995.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(111, '5', 'Gallery-141614091996.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:16'),
(112, '5', 'Gallery-01614092011.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(113, '5', 'Gallery-11614092012.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(114, '5', 'Gallery-21614092012.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(115, '5', 'Gallery-31614092012.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(116, '5', 'Gallery-41614092013.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(117, '5', 'Gallery-51614092013.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(118, '5', 'Gallery-61614092014.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(119, '5', 'Gallery-71614092014.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(120, '5', 'Gallery-81614092014.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(121, '5', 'Gallery-91614092015.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(122, '5', 'Gallery-101614092015.jpg', 1434, 1024, 500, 357, 99, '2021-02-23 14:53:37'),
(123, '5', 'Gallery-111614092016.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(124, '5', 'Gallery-121614092016.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(125, '5', 'Gallery-131614092016.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(126, '5', 'Gallery-141614092017.jpg', 731, 1024, 500, 700, 99, '2021-02-23 14:53:37'),
(127, '5', 'Gallery-01614092117.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:55:22'),
(128, '5', 'Gallery-11614092118.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:55:22'),
(129, '5', 'Gallery-21614092120.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:55:22'),
(130, '5', 'Gallery-31614092121.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:55:22'),
(131, '5', 'Gallery-01614092163.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(132, '5', 'Gallery-11614092165.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(133, '5', 'Gallery-21614092167.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(134, '5', 'Gallery-31614092168.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(135, '5', 'Gallery-41614092170.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(136, '5', 'Gallery-51614092172.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:14'),
(137, '5', 'Gallery-01614092186.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(138, '5', 'Gallery-11614092188.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(139, '5', 'Gallery-21614092189.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(140, '5', 'Gallery-31614092191.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(141, '5', 'Gallery-41614092193.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(142, '5', 'Gallery-51614092194.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 14:56:36'),
(143, '5', 'Gallery-61614092196.jpg', 764, 1024, 500, 671, 99, '2021-02-23 14:56:36'),
(144, '6', 'Gallery-01614092739.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:05:45'),
(145, '6', 'Gallery-11614092740.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:05:45'),
(146, '6', 'Gallery-21614092742.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:05:45'),
(147, '6', 'Gallery-31614092743.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:05:45'),
(148, '6', 'Gallery-41614092744.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:05:45'),
(149, '6', 'Gallery-01614092754.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:01'),
(150, '6', 'Gallery-11614092756.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:01'),
(151, '6', 'Gallery-21614092757.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:01'),
(152, '6', 'Gallery-31614092758.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:01'),
(153, '6', 'Gallery-41614092760.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:01'),
(154, '6', 'Gallery-01614092768.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:16'),
(155, '6', 'Gallery-11614092770.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:16'),
(156, '6', 'Gallery-21614092772.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:16'),
(157, '6', 'Gallery-31614092773.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:16'),
(158, '6', 'Gallery-41614092775.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:16'),
(159, '6', 'Gallery-01614092783.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:32'),
(160, '6', 'Gallery-11614092785.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:32'),
(161, '6', 'Gallery-21614092787.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:32'),
(162, '6', 'Gallery-31614092788.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:32'),
(163, '6', 'Gallery-41614092790.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:32'),
(164, '6', 'Gallery-01614092807.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:53'),
(165, '6', 'Gallery-11614092808.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:53'),
(166, '6', 'Gallery-21614092809.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:53'),
(167, '6', 'Gallery-31614092811.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:53'),
(168, '6', 'Gallery-41614092812.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:06:53'),
(169, '6', 'Gallery-01614092821.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:07:06'),
(170, '6', 'Gallery-11614092822.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:07:06'),
(171, '6', 'Gallery-21614092824.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:07:06'),
(172, '7', 'Gallery-01614093845.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:24:11'),
(173, '7', 'Gallery-11614093845.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:24:11'),
(174, '7', 'Gallery-21614093846.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:24:11'),
(175, '7', 'Gallery-31614093847.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:24:11'),
(176, '7', 'Gallery-41614093847.jpg', 1365, 1024, 500, 375, 99, '2021-02-23 15:24:11'),
(177, '7', 'Gallery-51614093848.jpg', 1365, 1024, 500, 375, 99, '2021-02-23 15:24:11'),
(178, '7', 'Gallery-61614093849.jpg', 1365, 1024, 500, 375, 99, '2021-02-23 15:24:11'),
(179, '7', 'Gallery-71614093850.jpg', 1365, 1024, 500, 375, 99, '2021-02-23 15:24:11'),
(180, '7', 'Gallery-81614093850.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:24:11'),
(181, '7', 'Gallery-91614093851.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:24:11'),
(182, '7', 'Gallery-01614093873.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:24:41'),
(183, '7', 'Gallery-11614093875.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:24:41'),
(184, '7', 'Gallery-21614093876.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:24:41'),
(185, '7', 'Gallery-31614093878.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:24:41'),
(186, '7', 'Gallery-41614093880.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:24:41'),
(187, '7', 'Gallery-01614093930.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:38'),
(188, '7', 'Gallery-11614093932.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:38'),
(189, '7', 'Gallery-21614093933.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:38'),
(190, '7', 'Gallery-31614093935.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:38'),
(191, '7', 'Gallery-41614093936.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:38'),
(192, '7', 'Gallery-01614093947.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:54'),
(193, '7', 'Gallery-11614093949.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:54'),
(194, '7', 'Gallery-21614093950.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:54'),
(195, '7', 'Gallery-31614093951.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:54'),
(196, '7', 'Gallery-41614093953.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:25:54'),
(197, '7', 'Gallery-01614093966.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:14'),
(198, '7', 'Gallery-11614093967.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:14'),
(199, '7', 'Gallery-21614093969.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:14'),
(200, '7', 'Gallery-31614093971.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:14'),
(201, '7', 'Gallery-41614093972.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:14'),
(202, '7', 'Gallery-01614094004.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:51'),
(203, '7', 'Gallery-11614094006.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:51'),
(204, '7', 'Gallery-21614094007.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:51'),
(205, '7', 'Gallery-31614094008.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:51'),
(206, '7', 'Gallery-41614094010.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:26:51'),
(207, '7', 'Gallery-01614094021.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:09'),
(208, '7', 'Gallery-11614094023.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:09'),
(209, '7', 'Gallery-21614094024.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:09'),
(210, '7', 'Gallery-31614094026.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:09'),
(211, '7', 'Gallery-41614094028.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:09'),
(212, '7', 'Gallery-01614094043.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:31'),
(213, '7', 'Gallery-11614094045.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:31'),
(214, '7', 'Gallery-21614094046.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:31'),
(215, '7', 'Gallery-31614094048.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:27:31'),
(216, '7', 'Gallery-41614094049.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:27:31'),
(217, '7', 'Gallery-51614094050.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:27:31'),
(218, '7', 'Gallery-61614094050.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:27:31'),
(219, '7', 'Gallery-71614094050.jpg', 731, 1024, 500, 700, 99, '2021-02-23 15:27:31'),
(220, '8', 'Gallery-01614094260.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:15'),
(221, '8', 'Gallery-11614094264.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:15'),
(222, '8', 'Gallery-21614094267.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:15'),
(223, '8', 'Gallery-31614094270.jpg', 681, 1024, 466, 700, 99, '2021-02-23 15:31:15'),
(224, '8', 'Gallery-41614094273.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:15'),
(225, '8', 'Gallery-01614094290.jpg', 681, 1024, 466, 700, 99, '2021-02-23 15:31:39'),
(226, '8', 'Gallery-11614094292.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:39'),
(227, '8', 'Gallery-21614094294.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:39'),
(228, '8', 'Gallery-31614094295.jpg', 681, 1024, 466, 700, 99, '2021-02-23 15:31:39'),
(229, '8', 'Gallery-41614094297.jpg', 681, 1024, 466, 700, 99, '2021-02-23 15:31:39'),
(230, '8', 'Gallery-01614094306.jpg', 639, 960, 466, 700, 99, '2021-02-23 15:31:50'),
(231, '8', 'Gallery-11614094307.jpg', 960, 638, 500, 332, 99, '2021-02-23 15:31:50'),
(232, '8', 'Gallery-21614094307.jpg', 639, 960, 466, 700, 99, '2021-02-23 15:31:50'),
(233, '8', 'Gallery-31614094307.jpg', 1539, 1024, 500, 333, 99, '2021-02-23 15:31:50'),
(234, '8', 'Gallery-41614094308.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:31:50'),
(235, '8', 'Gallery-01614094319.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:32:06'),
(236, '8', 'Gallery-11614094320.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:32:06'),
(237, '8', 'Gallery-21614094322.jpg', 683, 1024, 467, 700, 99, '2021-02-23 15:32:06'),
(238, '8', 'Gallery-31614094323.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:32:06'),
(239, '8', 'Gallery-41614094325.jpg', 1536, 1024, 500, 333, 99, '2021-02-23 15:32:06'),
(240, '10', 'Gallery-01614094604.jpg', 576, 758, 500, 658, 99, '2021-02-23 15:36:46'),
(241, '10', 'Gallery-11614094604.jpg', 576, 770, 500, 668, 99, '2021-02-23 15:36:46'),
(242, '10', 'Gallery-21614094604.jpg', 576, 759, 500, 659, 99, '2021-02-23 15:36:46'),
(243, '10', 'Gallery-31614094605.jpg', 576, 757, 500, 657, 99, '2021-02-23 15:36:46'),
(244, '10', 'Gallery-41614094605.jpg', 639, 849, 500, 664, 99, '2021-02-23 15:36:46'),
(245, '10', 'Gallery-51614094605.jpg', 640, 851, 500, 665, 99, '2021-02-23 15:36:46'),
(246, '10', 'Gallery-61614094605.jpg', 577, 1024, 394, 700, 99, '2021-02-23 15:36:46'),
(247, '10', 'Gallery-71614094605.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(248, '10', 'Gallery-81614094605.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(249, '10', 'Gallery-91614094605.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(250, '10', 'Gallery-101614094606.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(251, '10', 'Gallery-111614094606.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(252, '10', 'Gallery-121614094606.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(253, '10', 'Gallery-131614094606.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(254, '10', 'Gallery-141614094606.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:36:46'),
(255, '10', 'Gallery-01614094623.jpg', 577, 1024, 394, 700, 99, '2021-02-23 15:37:05'),
(256, '10', 'Gallery-11614094623.jpg', 772, 1024, 500, 663, 99, '2021-02-23 15:37:05'),
(257, '10', 'Gallery-21614094623.jpg', 766, 1024, 500, 668, 99, '2021-02-23 15:37:05'),
(258, '10', 'Gallery-31614094623.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(259, '10', 'Gallery-41614094623.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(260, '10', 'Gallery-51614094623.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(261, '10', 'Gallery-61614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(262, '10', 'Gallery-71614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(263, '10', 'Gallery-81614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(264, '10', 'Gallery-91614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(265, '10', 'Gallery-101614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(266, '10', 'Gallery-111614094624.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(267, '10', 'Gallery-121614094625.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(268, '10', 'Gallery-131614094625.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:05'),
(269, '10', 'Gallery-141614094625.jpg', 574, 841, 478, 700, 99, '2021-02-23 15:37:05'),
(270, '10', 'Gallery-01614094638.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(271, '10', 'Gallery-11614094638.jpg', 576, 1024, 394, 700, 99, '2021-02-23 15:37:22'),
(272, '10', 'Gallery-21614094638.jpg', 761, 1024, 500, 673, 99, '2021-02-23 15:37:22'),
(273, '10', 'Gallery-31614094638.jpg', 576, 1024, 394, 700, 99, '2021-02-23 15:37:22'),
(274, '10', 'Gallery-41614094639.jpg', 576, 1024, 394, 700, 99, '2021-02-23 15:37:22'),
(275, '10', 'Gallery-51614094639.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(276, '10', 'Gallery-61614094639.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(277, '10', 'Gallery-71614094639.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(278, '10', 'Gallery-81614094639.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(279, '10', 'Gallery-91614094639.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(280, '10', 'Gallery-101614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(281, '10', 'Gallery-111614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(282, '10', 'Gallery-121614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(283, '10', 'Gallery-131614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(284, '10', 'Gallery-141614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(285, '10', 'Gallery-151614094640.jpg', 768, 1024, 500, 667, 99, '2021-02-23 15:37:22'),
(286, '10', 'Gallery-161614094641.jpg', 412, 732, 394, 700, 99, '2021-02-23 15:37:22'),
(287, '10', 'Gallery-171614094641.jpg', 1042, 1024, 500, 492, 99, '2021-02-23 15:37:22'),
(288, '10', 'Gallery-181614094641.jpg', 850, 1024, 500, 603, 99, '2021-02-23 15:37:22'),
(289, '10', 'Gallery-191614094641.jpg', 826, 1024, 500, 620, 99, '2021-02-23 15:37:22'),
(290, '10', 'Gallery-01614094655.jpg', 816, 1024, 500, 627, 99, '2021-02-23 15:37:36'),
(291, '10', 'Gallery-11614094655.jpg', 1033, 1024, 500, 496, 99, '2021-02-23 15:37:36'),
(292, '10', 'Gallery-21614094655.jpg', 781, 1024, 500, 656, 99, '2021-02-23 15:37:36'),
(293, '10', 'Gallery-31614094655.jpg', 836, 1024, 500, 612, 99, '2021-02-23 15:37:36'),
(294, '10', 'Gallery-41614094656.jpg', 1041, 1024, 500, 492, 99, '2021-02-23 15:37:36'),
(295, '10', 'Gallery-51614094656.jpg', 566, 767, 500, 678, 99, '2021-02-23 15:37:36'),
(296, '27', 'Gallery-1615562049.JPG', 0, 0, 0, 0, 7, '2021-03-12 15:14:09'),
(297, '27', 'Gallery-1615562194.JPG', 0, 0, 0, 0, 9, '2021-03-12 15:16:34'),
(298, '27', 'Gallery-1615562535.JPG', 0, 0, 0, 0, 99, '2021-03-12 15:22:15'),
(299, '27', 'Gallery-1615569753.JPG', 3648, 5472, 0, 0, 99, '2021-03-12 17:22:33'),
(300, '24', 'Gallery-1615913914.JPG', 3648, 5472, 0, 0, 9, '2021-03-16 16:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_files`
--

CREATE TABLE `pdf_files` (
  `id` int(11) NOT NULL,
  `udi` varchar(255) NOT NULL,
  `pdf_for` varchar(255) NOT NULL,
  `id_for` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf_files`
--

INSERT INTO `pdf_files` (`id`, `udi`, `pdf_for`, `id_for`, `file`, `added_on`) VALUES
(7, 'f9d9830eb44a3d39d71be38a37f8caa2', 'Blog', 'TSIT194208BL', 'PDF-01611918556.pdf', '2021-01-29 11:09:16'),
(8, 'c251a393afd729f3b53a54e36217eb1e', 'Page', 'TSIT522533P', 'PDF-01611921179.pdf', '2021-01-29 11:52:59'),
(9, '8d4713aa010524c264c552e43f761e2f', 'Blog', 'TSIT192195BL', 'PDF-01611933647.pdf', '2021-01-29 15:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `prayer_time`
--

CREATE TABLE `prayer_time` (
  `pt_id` int(11) NOT NULL,
  `prayer_date_id` int(11) NOT NULL,
  `fajar` varchar(255) NOT NULL,
  `zohar` varchar(255) NOT NULL,
  `asr` varchar(255) NOT NULL,
  `magrib` varchar(255) NOT NULL,
  `isha` varchar(255) NOT NULL,
  `sehar` varchar(255) NOT NULL,
  `iftar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prayer_time`
--

INSERT INTO `prayer_time` (`pt_id`, `prayer_date_id`, `fajar`, `zohar`, `asr`, `magrib`, `isha`, `sehar`, `iftar`) VALUES
(1, 1, '5:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '8:00 PM', '3:00 AM', '6:00 PM'),
(2, 2, '5:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '8:00 PM', '4:00 AM', '6:00 PM'),
(3, 3, '5:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '8:00 PM', '3:00 AM', '6:00 PM'),
(4, 4, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(5, 5, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(6, 6, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(7, 7, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(8, 8, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(9, 9, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(10, 10, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', ''),
(11, 11, '3:00 AM', '1:00 PM', '4:00 PM', '6:00 PM', '9:00 PM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roza_time`
--

CREATE TABLE `roza_time` (
  `id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `sehar` varchar(255) NOT NULL,
  `iftar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roza_time`
--

INSERT INTO `roza_time` (`id`, `date_id`, `sehar`, `iftar`) VALUES
(1, 11, '  3:00', '  8:00'),
(2, 4, ' 4:10', ' 9:02');

-- --------------------------------------------------------

--
-- Table structure for table `scat`
--

CREATE TABLE `scat` (
  `id` int(11) NOT NULL,
  `scat_uniid` varchar(255) NOT NULL,
  `scat_title` varchar(255) NOT NULL,
  `scat_cates` varchar(50) NOT NULL DEFAULT 'Yes',
  `scat_mcate` varchar(50) NOT NULL,
  `scat_body` mediumtext NOT NULL,
  `scat_status` varchar(50) NOT NULL,
  `scat_url` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `scat_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `scat_position` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `scat_top` varchar(255) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `head_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scat`
--

INSERT INTO `scat` (`id`, `scat_uniid`, `scat_title`, `scat_cates`, `scat_mcate`, `scat_body`, `scat_status`, `scat_url`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `scat_cover`, `scat_position`, `updated_by`, `scat_top`, `cover_path`, `cover_height`, `cover_width`, `thumb_path`, `thumb_height`, `thumb_width`, `head_script`, `after_head`, `footer_script`) VALUES
(1, 'a5242d58769c9730a15de7be8b50751e', 'About Zara', 'Yes', 'TSIT153976C', '<p>About Zara</p>\r\n', 'Active', 'About Zara', 'About Zara', 'About Zara', 'About Zara', 'index, follow', 'Admin', 'default.jpg', 1, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(2, 'ab0d57c1ad70cec13eddb41e64c7a2e8', 'Asian Brides', 'Yes', 'TSIT153976C', '<p>Asian Brides</p>\r\n', 'Active', 'Asian Brides', 'Asian Brides', 'Asian Brides', 'Asian Brides', 'index, follow', 'Admin', 'default.jpg', 2, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(3, '92cd8515d54f433a21cca213105b1eae', 'Asian Bridals', 'Yes', 'TSIT180774C', '<p>Asian Bridals</p>\r\n', 'Active', 'Asian Bridals', 'Asian Bridals', 'Asian Bridals', 'Asian Bridals', 'index, follow', 'Admin', 'default.jpg', 1, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(4, '59753aed6a1aef95689fdf51143dec16', 'Model Makeup', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Model Makeup</span></pre>\r\n', 'Active', 'Model Makeup', 'Model Makeup', 'Model Makeup', 'Model Makeup', 'index, follow', 'Admin', 'default.jpg', 2, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(5, 'a0d83ff23674427f6fe1eafdca54741f', 'Party Makeup', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Party Makeup</span></pre>\r\n', 'Active', 'Party Makeup', 'Party Makeup', 'Party Makeup', 'Party Makeup', 'index, follow', 'Admin', 'default.jpg', 3, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(6, '18446c56da4cb124919eb69b7e408d8b', 'Mehandi / Henna', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Mehandi / Henna</span></pre>\r\n', 'Active', 'Mehandi Henna', 'Mehandi / Henna', 'Mehandi / Henna', 'Mehandi / Henna', 'index, follow', 'Admin', 'default.jpg', 4, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(7, 'a1dfdafad7163b1c63c5398098e93d15', 'Casual Looks', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Casual Looks</span></pre>\r\n', 'Active', 'Casual Looks', 'Casual Looks', 'Casual Looks', 'Casual Looks', 'index, follow', 'Admin', 'default.jpg', 5, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(8, 'e4dbd4c3f13d8a9c642caef7f2a84892', 'Hair Styles', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Hair Styles</span></pre>\r\n', 'Active', 'Hair Styles', 'Hair Styles', 'Hair Styles', 'Hair Styles', 'index, follow', 'Admin', 'default.jpg', 6, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(9, '6c1c141b3cbeeaa52177275fd1402695', 'Hijab Styles', 'Yes', 'TSIT180774C', '<pre id=\"line1\">\r\n<span>Hijab Styles</span></pre>\r\n', 'Active', 'Hijab Styles', 'Hijab Styles', 'Hijab Styles', 'Hijab Styles', 'index, follow', 'Admin', 'default.jpg', 7, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(10, '8648cca6d9e60470741fe5a1614e7d90', 'The Zara News', 'Yes', 'TSIT282521C', '<pre id=\"line1\">\r\n<span>The Zara News</span></pre>\r\n', 'Active', 'The Zara News', 'The Zara News', 'The Zara News', 'The Zara News', 'index, follow', 'Admin', 'default.jpg', 1, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(11, 'f04ee7e412d1a3405f6d9645afaa8fbc', 'The Zara Events', 'Yes', 'TSIT282521C', '<pre id=\"line1\">\r\n<span>The Zara Events</span></pre>\r\n', 'Active', 'The Zara Events', 'The Zara Events', 'The Zara Events', 'The Zara Events', 'index, follow', 'Admin', 'default.jpg', 2, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(12, 'fddc562aa9b95184e58f26efb6bce2c8', 'The Zara Remedies', 'Yes', 'TSIT282521C', '<pre id=\"line1\">\r\n<span>The Zara Remedies</span></pre>\r\n', 'Active', 'The Zara Remedies', 'The Zara Remedies', 'The Zara Remedies', 'The Zara Remedies', 'index, follow', 'Admin', 'default.jpg', 3, 'Admin', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(13, '943bc8e1ae0703e5d40669ad0f1df75f', 'Privacy Policy', 'Yes', 'TSIT193869C', '<pre id=\"line1\">\r\n<span>Privacy Policy</span></pre>\r\n', 'Active', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'index, follow', 'Admin', 'default.jpg', 1, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(14, 'f10cd16b21a60fc7b39578a8b8b71da8', 'Book An Appointment', 'Yes', 'TSIT193869C', '<pre id=\"line1\">\r\n<span>Book An Appointment</span></pre>\r\n', 'Active', 'Book An Appointment', 'Book An Appointment', 'Book An Appointment', 'Book An Appointment', 'index, follow', 'Admin', 'default.jpg', 2, '', 'No', 'images/Categories/Covers/default.jpg', 0, 0, 'images/Categories/Covers/thumb/default.jpg', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(15, 'f40c8ef65644c9ec155a0a49b372347d', 'Price List', 'Yes', 'TSIT185409C', '', '', '', '', '', '', '', 'Admin', 'noimage.jpg', 1, '', 'No', '', 0, 0, '', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->'),
(16, 'b109430d280f90fe4b11538e2692d02f', 'Disclaimer', 'Yes', 'TSIT193869C', '', '', '', '', '', '', '', 'Admin', 'noimage.jpg', 2, '', 'No', '', 0, 0, '', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `line` text DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `thumb_height` varchar(255) NOT NULL,
  `thumb_width` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `price`, `line`, `thumb`, `thumb_height`, `thumb_width`) VALUES
(3, 'iphone', '500000', NULL, 'Thumb-1614613490.jpg', '700', '467'),
(4, 'RealMe', '50000', NULL, 'Service-1614617396.jpg', '333', '500'),
(5, 'huwaei', '500000', NULL, 'Thumb-1614616531.jpg', '614', '614'),
(6, 'samsung', '50000', NULL, 'Service-1614617023.jpg', '500', '500'),
(7, 'nokia', '50000', NULL, 'Service-1614617519.jpg', '333', '500'),
(8, 'tango', '50000', NULL, 'Service-1614617669.jpg', '500', '500'),
(10, 'Hello world', '50000', NULL, 'Service-1615977213.jpg', '683', '1024'),
(11, 'ww', '50000', NULL, 'Service-1614695541.jpg', '333', '500');

-- --------------------------------------------------------

--
-- Table structure for table `service_line`
--

CREATE TABLE `service_line` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `line` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_line`
--

INSERT INTO `service_line` (`id`, `service_id`, `line`) VALUES
(66, 4, 'changi cheez'),
(67, 5, 'Array2'),
(68, 6, 'Ages2'),
(69, 7, 'ages'),
(70, 8, 'changi cheez'),
(79, 10, 'ages'),
(80, 10, 'ages2'),
(81, 11, '1');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_domain` varchar(255) NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `site_phone_call` varchar(255) NOT NULL DEFAULT '+447397233330',
  `site_charity_id` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `site_timing` varchar(255) NOT NULL,
  `jummah_time` varchar(255) NOT NULL DEFAULT '02:15',
  `site_email` varchar(255) NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_linkedin` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_insta` varchar(255) NOT NULL,
  `insta_user` varchar(2083) NOT NULL,
  `site_youtube` varchar(255) NOT NULL,
  `site_summary` text NOT NULL,
  `head_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_domain`, `site_phone`, `site_phone_call`, `site_charity_id`, `site_address`, `site_timing`, `jummah_time`, `site_email`, `site_facebook`, `site_linkedin`, `site_twitter`, `site_insta`, `insta_user`, `site_youtube`, `site_summary`, `head_script`, `after_head`, `footer_script`) VALUES
(1, 'The Zara', 'http://localhost/thezaraV3/', '07397 233330', '+447397233330', '1191187', '78 Diamond Rd, Slough SL1 1RX', 'Monday - Friday : 9.30 - 5.30 | Saturday - Sunday Appointments Only', '02:20', 'info@sloughislamictrust.org.uk', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'matestechnolog', 'https://www.youtube.com/', 'The main activities of the Charity are holding the 5 daily prayers at our two Mosques, the weekly Jumma Friday prayer, the tarawih prayers in Ramadan and the 2 annual Eid prayers. We provide Islamic education to children between the ages of 5 and 16 and knowledge about the teachings of Islam for whoever who seeks it. We assist in feeding the hungry and relieving the poor by distributing zakat.', '<!--No Script -->', '<!--No Script -->', '<!--No Script -->');

-- --------------------------------------------------------

--
-- Table structure for table `slidei`
--

CREATE TABLE `slidei` (
  `id` int(11) NOT NULL,
  `slide_image` varchar(2083) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image_height` int(11) NOT NULL,
  `image_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slidei`
--

INSERT INTO `slidei` (`id`, `slide_image`, `type`, `image_height`, `image_width`, `thumb_height`, `thumb_width`) VALUES
(7, 'Slide-1613997951.jpg', '', 1024, 1535, 334, 500),
(8, 'Slide-1613997971.jpg', '', 638, 960, 332, 500),
(13, 'Brand-1615563476.JPG', 'Brand', 0, 0, 0, 0),
(14, 'Home-1615563484.JPG', 'Home', 0, 0, 0, 0),
(12, 'Home-1615507490.jpg', 'Home', 0, 0, 0, 0),
(15, 'Brand-1615568863.JPG', 'Brand', 3648, 0, 0, 0),
(16, 'Brand-1615568950.JPG', 'Brand', 3648, 0, 0, 0),
(17, 'Brand-1615807602.JPG', 'Brand', 3648, 5472, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_headline` varchar(255) NOT NULL,
  `slider_tagline` varchar(2083) NOT NULL,
  `slider_cover` varchar(2083) NOT NULL,
  `image_height` int(11) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `image_width` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_headline`, `slider_tagline`, `slider_cover`, `image_height`, `cover_height`, `cover_width`, `image_width`) VALUES
(1, 'Slough Mosque Islamic Trust - Jamia Ghousia Masjid & Islamic Centre', 'Let&#39;s know Islam', 'Slider-Cover-1611580510.jpg', 0, 0, 0, 0),
(2, 'Slough Mosque Islamic Trust - Jamia Ghousia Masjid & Islamic Centre', 'Let&#39;s know Islam', 'Slider-Cover-1611595858.jpg', 0, 0, 0, 0),
(3, 'Slough Mosque Islamic Trust - Jamia Ghousia Masjid & Islamic Centre', 'Let&#39;s know Islam', 'Slider-Cover-1611595863.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `small_texts`
--

CREATE TABLE `small_texts` (
  `id` int(11) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `title2` varchar(2083) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `title4` varchar(255) NOT NULL,
  `title5` varchar(255) NOT NULL,
  `title6` varchar(255) NOT NULL,
  `title7` varchar(255) NOT NULL,
  `title8` varchar(255) NOT NULL,
  `title9` varchar(255) NOT NULL,
  `title10` varchar(255) NOT NULL,
  `home_v_title` varchar(255) NOT NULL DEFAULT 'OUR VISION & MISSION',
  `home_v_link` varchar(255) NOT NULL DEFAULT 'Yvfix0_DQ1c',
  `home_v_title2` varchar(2083) NOT NULL,
  `home_v_link2` varchar(2083) NOT NULL,
  `title11` varchar(255) NOT NULL,
  `title12` varchar(255) NOT NULL,
  `popup_status` varchar(255) NOT NULL DEFAULT 'Active',
  `popup_title` varchar(255) NOT NULL DEFAULT 'Important Community Announcement',
  `popup_text` text NOT NULL,
  `footer_text` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `small_texts`
--

INSERT INTO `small_texts` (`id`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `title8`, `title9`, `title10`, `home_v_title`, `home_v_link`, `home_v_title2`, `home_v_link2`, `title11`, `title12`, `popup_status`, `popup_title`, `popup_text`, `footer_text`) VALUES
(1, 'Our Video Presentation', 'Most Popular Services', 'Recent Work', 'Client&#39;s Testimonials', 'We Use Only Trusted Brands', 'Appointment', 'Latest Blog', 'Easy Remedies', 'Asian Bridal Makeup Artist in London', 'Highly Commended Creative Makeup Artist of 2020 in UK', 'images/video_background_1.jpg', 'f1RoYHGLBaA', 'images/video_background_2.jpg', '1ugo7tVUJOU', 'Please register your e-mail address to receive our updates. ', 'Footer Text   Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.', 'Active', 'COVID-19 Important Announcement', '<p>Some Text here for Popup Box</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `sscat`
--

CREATE TABLE `sscat` (
  `id` int(11) NOT NULL,
  `sscat_uniid` varchar(255) NOT NULL,
  `sscat_title` varchar(255) NOT NULL,
  `sscat_scate` varchar(50) NOT NULL,
  `sscat_mcate` varchar(50) NOT NULL,
  `sscat_body` mediumtext NOT NULL,
  `sscat_status` varchar(50) NOT NULL,
  `sscat_url` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `sscat_cover` varchar(2083) NOT NULL DEFAULT 'noimage.jpg',
  `sscat_position` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `sscat_top` varchar(255) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `head_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(255) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(255) NOT NULL DEFAULT '<!-- No Script -->'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sscat`
--

INSERT INTO `sscat` (`id`, `sscat_uniid`, `sscat_title`, `sscat_scate`, `sscat_mcate`, `sscat_body`, `sscat_status`, `sscat_url`, `seo_title`, `seo_keywords`, `seo_description`, `robots`, `added_by`, `sscat_cover`, `sscat_position`, `updated_by`, `sscat_top`, `cover_path`, `cover_height`, `cover_width`, `thumb_path`, `thumb_height`, `thumb_width`, `head_script`, `after_head`, `footer_script`) VALUES
(5, 'f01046853014236042343541ba484aac', 'Seerat-e-Namaz', '96d5ea98aaf22d4bf051d369aa8131a5', 'TSIT234838C', '<p>efgvfvd</p>\r\n', 'Active', 'namaz', 'Salat is the best exercise for body fitness', 'Nazra & Hifz Classes', 'Salat is the best exercise for body fitness', 'index, follow', 'Admin', 'Cover-iii1-1612958554.png', 1, 'Admin', 'Yes', 'images/Categories/Covers/Cover-iii1-1612958554.png', 0, 0, '', 0, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `team_uniid` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_designation` varchar(255) NOT NULL,
  `experties` varchar(255) NOT NULL,
  `team_status` varchar(100) NOT NULL,
  `team_position` int(11) NOT NULL,
  `team_skype` varchar(255) NOT NULL,
  `team_email` varchar(255) NOT NULL,
  `team_linkedin` varchar(255) NOT NULL,
  `team_twitter` varchar(255) NOT NULL,
  `team_facebook` varchar(255) NOT NULL,
  `team_body` varchar(2083) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `head_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `team_profile` varchar(2083) NOT NULL,
  `profile_height` int(11) NOT NULL,
  `profile_width` int(11) NOT NULL,
  `pro_thumb_height` int(11) NOT NULL,
  `pro_thumb_width` int(11) NOT NULL,
  `team_cover` varchar(2083) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `testimonial_uniid` varchar(255) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_designation` varchar(255) NOT NULL,
  `testimonial_date` varchar(255) NOT NULL,
  `testimonial_date_update` varchar(255) DEFAULT NULL,
  `cate_table` int(11) NOT NULL,
  `testimonial_status` varchar(100) NOT NULL,
  `testimonial_body` varchar(2083) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `head_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `after_head` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `footer_script` varchar(2083) NOT NULL DEFAULT '<!-- No Script -->',
  `testimonial_profile` varchar(2083) NOT NULL,
  `cover_path` varchar(2083) NOT NULL,
  `cover_height` int(11) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonial_uniid`, `testimonial_name`, `testimonial_designation`, `testimonial_date`, `testimonial_date_update`, `cate_table`, `testimonial_status`, `testimonial_body`, `added_by`, `updated_by`, `head_script`, `after_head`, `footer_script`, `testimonial_profile`, `cover_path`, `cover_height`, `cover_width`, `thumb_path`, `thumb_height`, `thumb_width`) VALUES
(1, 'e3a6e9160e612b92542fc26bdab7c829', 'Mr John Wick', '', '1 March 2021', '1 March 2021', 22, 'Active', '<p>chnga bnda</p>\r\n', 1, 1, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'T1614619775.jpg', 'images/Testimonial/Clients/T1614619775.jpg', 333, 500, 'images/Testimonial/Clients/thumb/T1614619775.jpg', 333, 499),
(2, 'e8ee94280535b74da22462f067256205', 'Mr John', '', '2 March 2021', NULL, 22, 'Active', 'w', 1, 0, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'T1614682524.jpg', 'images/Testimonial/Clients/T1614682524.jpg', 500, 500, '', 0, 0),
(3, '015d6d34b7713828d5a93483f71c8e54', 'Ali Raza', '', '12 March 2021', '17 March 2021', 22, 'Active', '<p>qq</p>\r\n', 1, 1, '<!-- No Script -->', '<!-- No Script -->', '<!-- No Script -->', 'Testimonial-1615977302.jpg', 'images/Testimonial/Clients/Testimonial-1615977302.jpg', 683, 1024, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(36) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userlevel` tinyint(1) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) UNSIGNED NOT NULL,
  `previous_visit` int(11) UNSIGNED DEFAULT 0,
  `ip` varchar(15) NOT NULL,
  `regdate` int(11) UNSIGNED NOT NULL,
  `lastip` varchar(15) DEFAULT NULL,
  `user_login_attempts` tinyint(4) DEFAULT NULL,
  `user_home_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `userlevel`, `email`, `timestamp`, `previous_visit`, `ip`, `regdate`, `lastip`, `user_login_attempts`, `user_home_path`) VALUES
(1, 'Admin', 'Super', 'Admin', '$2y$10$2dY0GWqf.QRcyhK39T2Ctu7zfF3LVZog98ajdomf00lNRpSIVWMmO', 10, 'admin@admin.com', 1628061510, 1628001001, '::1', 1582635892, '::1', 0, NULL),
(2, 'mates', 'Mates', 'Technologies', '$2y$10$AU8EBLbDd2TGDNcOz4vrgej6ge.JBLBzxHC6SpZtWQUgIeP4H.b12', 10, 'info@mates.pk', 1611761445, 1611759019, '::1', 1584547639, '127.0.0.1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(4, 2, 1),
(5, 2, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) UNSIGNED NOT NULL,
  `session_id` char(32) NOT NULL,
  `hashedValidator` char(64) NOT NULL,
  `persistent` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `userid` int(11) UNSIGNED NOT NULL,
  `ipaddress` varchar(15) NOT NULL DEFAULT '0',
  `timestamp` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `expires` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `session_id`, `hashedValidator`, `persistent`, `userid`, `ipaddress`, `timestamp`, `expires`) VALUES
(197, 'bc1c392943395f07bf5bef54d672e1a0', '494b9553c33bbf90a0ef6405e6934aae6d6f8239de9025795df79e8306673e5e', 0, 1, '119.155.25.80', 1598376332, 1600967286),
(198, '54042dd6bb2f67bbde2b3daa65fd0431', '03df226514d0358f4edb72e2d89374ae1e41687dab0d33fb06cfd982e83fe126', 0, 1, '86.169.217.75', 1598376250, 1600967287),
(199, '94b9fcd4dbd81c127f05d581afa1d1d3', '27281ff380f941c8fa3659fdd6b7379ee1820d7c6f8a3d2d85777d2728100c3f', 0, 1, '5.80.110.4', 1599247670, 1601838414),
(201, '7d566a2ba958cc7e8fa1317eab38b859', '78d70d36a3a4d581cd191c06cd1ad4cfe8bc274eea3b1f968d65e41cf93dbf76', 0, 1, '182.179.165.120', 1607626691, 1610218690),
(202, 'fe0c9b553b94296b168bc2d0cb601043', '9e4ad2ff24e321c0f748a6f7c84c4a0c0e6037429e3088ebddc58282e8d2c683', 0, 1, '119.155.37.32', 1607703607, 1610295197),
(210, 'adadfad1f4378676edc35efc257da892', '32b0ac38aa77e4bf30a90279099d443f5d468599b99b3667b1bba4aedde07ccd', 0, 1, '::1', 1610644950, 1613235350),
(211, 'bfdcedc7456038a9b37dee3def7b7f08', '478b5f3d3786302879566564f197fa601576238402c4f3a124401c019b3596d0', 0, 1, '::1', 1610709981, 1613301981),
(212, 'cabd791da78725ad707cffaec0b3cc1f', 'cbfe99829c5f6d1f63fe860da7957bbf352495464f5e1bf3575e92afb75c5368', 0, 1, '::1', 1610716891, 1613308891),
(214, 'de087f3098032b8d75dd0be73e0852b3', '1d250bc66e5b0f655f9ff2e74bbcc7a1632f578c3fd8fb9539e612289795ecc1', 0, 1, '::1', 1610727871, 1613314135),
(215, '0be5b70d0d2deed9448d116aeb26e3be', '1c621a85442eaf46c11e38e45d862681a4995ba7a38233ce393e9bc37a8c73f0', 0, 1, '::1', 1610728658, 1613319884),
(216, '84f89f9df64f27285fdd42705b3fb7d1', '81dfa64a89fc841693d0c3c52f43995c9708fdd5afa89341c1a34131cd16f99e', 0, 1, '::1', 1610730046, 1613320703),
(217, '4cafc61c04d33953572b189d125418d3', '2c3dc5699b6f06b82239fce238b6953b381d452b76218fec8d83e3f94b395041', 0, 1, '::1', 1610989235, 1613560507),
(219, '8a63bea14fbc37e17181b2cc33917d56', 'c51de6fd6d33098ea6dfc266eb04fec1da24b5bdadbdd2ce0fa4c8e6ce65a31a', 0, 1, '::1', 1611060651, 1613650773),
(221, '23f4aac5ddc1a0ddd1f39d9254682718', '72d5f3ea8d8131a02edf5dc782303786d23c3d62f870f14bc691e011f091162e', 0, 1, '::1', 1611074825, 1613665434),
(225, '2cbe962cd0cd444123598ebe6fc8788d', '3b8c01e6f9b5e2cf4894032b923bd84be180ac363eb6f0164e95508f385e8e3e', 0, 2, '::1', 1611324907, 1613916247),
(227, 'a7c349b062e3a892598f47988dcf45a0', 'f1f64409ef6a164a7712b61bfae9c749f68fce0345926e10e885c8fc016845cb', 0, 1, '::1', 1611326106, 1613918034),
(239, '2b27fabc390b4481b48aae0d0238984e', 'e9ac939f340b6763467f15f37a0f60373af36412c7f5c6a92b58d69b0e58da3b', 0, 2, '::1', 1611761445, 1622118513),
(248, 'b833776ac6aa660c1e2759f06fcae52e', 'ca47a2c847eb9263154d88201555811fd9959b13eb32ebba4c28b4de146f0eb3', 0, 1, '127.0.0.1', 1612181618, 1622549608),
(249, '8892a88fbd47890e233272437ac1be8e', 'faae1099ede5f6bb59d293270bf90538c832b25a6f22d46b8b684c7eed8f904e', 0, 1, '::1', 1612541792, 1622899287),
(250, '6f6600a9c3732f4c1f7978ca9f2c91ad', '6b14eff5d6605a9d0f88d1929107daa2152a9eceff2babd4f4ad497aaa3a0c91', 0, 1, '::1', 1612548430, 1622909848),
(251, 'b4e6574653710375d19639eaa3eeb2c1', 'f648696f284eee75b8fc086c3a885c46d03a977b8eddb781e98c911556ccfbc5', 0, 1, '::1', 1612894335, 1623259098),
(252, '9c2e092538086b950ff481f101b38630', 'ff00f23c963343ecec6d21614a1b53bb2e3d80234509f1fc4985e4b110559455', 0, 1, '::1', 1612961688, 1623321852),
(253, '709ee0ab6a8cad96450e82282ca7c2d6', '45260a740f65bfb0035b02bcf2afe29b40ca88489a484c2409e52ac980aab877', 0, 1, '::1', 1612984306, 1623344254),
(255, '42606256e148bebca662529376f28e96', '0503bf0770fb1a8d69f4761d3eace9435ef90b9ca50520509e2aa0de3dcc0b51', 0, 1, '::1', 1613063276, 1623419632),
(256, '9c1fd700f089ed3828ba4b095a8e574a', '09623c1bb040038e6467f520fef1bcf426d8d3ea9ab162db450c025bd65a18bf', 0, 1, '::1', 1613138541, 1623490885),
(257, '9c4bb7706a2d9327dfd8723577d29d22', '2dcd35973b997a622a4a6033d4fb8fdad063679bf4f180a793e60b31c8ff86b0', 0, 1, '::1', 1613134431, 1623502403),
(259, '80676f9cd01f2bd6b2e0d0ce5faed332', '8e125f419a45931e1e2ca152cfb9205c09a47e531d326622da4b8b9d7ba9f3b7', 0, 1, '127.0.0.1', 1614016635, 1624359610),
(260, '8a2cba86a95d5accc7ee418f387e05ac', '809b7bcc9051b69b5be2efcb5605df2320445cc8ba07568a3c58f386b008f70e', 0, 1, '127.0.0.1', 1614075011, 1624441863),
(261, '9d7f6503961584b5d5a957f53ba69fff', '8daec0663ca95fc81702a647391c7b2668a5f60a367be93889a0816ff4e69da2', 0, 1, '127.0.0.1', 1614102256, 1624456554),
(262, '4d5bb75f928e135f19320efa9131a463', 'e7f45640f02b38ce38d0eec4d15aa7030d15894fefd3cae7fcdb3456710126ac', 0, 1, '::1', 1614181670, 1624543342),
(263, '4a380c99cfb9d04a1f022ad44327f9c6', 'a9cc85fcc7b39b3bd79b0d6384ad259de79be7883dc2e8d0cec40de52f99800f', 0, 1, '::1', 1614344857, 1624708283),
(264, 'f42325aa5886c7d699b3198cc60ed879', '49090abefa9715977ace8865469fb55f757d4bee083493a0bf661a8aa914dc89', 0, 1, '::1', 1614361433, 1624713767),
(265, '14677e2a41982277efa605a4f6d93594', '3ef57eadb52e9470e5c03e74e989c17c66a22bb13f4752073c59b8030d518b9c', 0, 1, '::1', 1614621195, 1624963159),
(266, '28129430a507ac01ac872c941c9aa0ef', 'b6ef958f6dba0e2e56ff69b99da635cf7d8992202e7573feba86d0d7d7b40fdb', 0, 1, '::1', 1614669031, 1625036963),
(268, 'ad3e90c1510609547e86268275b0b2f0', 'a4d79ef93ce2ac02ed7037f789439a77771174285ffd93e4dff3e6dc3900f605', 0, 1, '::1', 1614695623, 1625062802),
(269, '4b4fa8d26c5c9dbadf05296844c9ec1c', '9a3b07c807fea597b72cc05f5b5608c3f30193d00aad3ca9d78016ff360a067a', 0, 1, '::1', 1614779149, 1625144414),
(271, 'd21997744b2d8a75da1cea7de684b003', 'e77498c9af4918a01939c8c59bd57ff0cb6caf0b9bcf5dca030e41d487e74382', 0, 1, '::1', 1615507504, 1625875338),
(272, 'b30139cf43797e9c4f66a480dcb2413d', 'f0603f641b01ac7b460dde55910a11b48795187845c9b02df20c7931e3253ff1', 0, 1, '::1', 1615546931, 1625914258),
(273, 'f36c9d2398e23ae26a9cf43c16b71369', 'a86458a84de94334ae3a6432f7f8342260e0c9b2ad0afa4404c9ac5cdf515da0', 0, 1, '::1', 1615570206, 1625915158),
(274, '35d33413427eac191b77223e10bee1b6', '1cac689b2ffcd4fe87ed3ae3e8810ac00711ab64d85d19f9d86b1651de959642', 0, 1, '::1', 1615817143, 1626171157),
(275, '0feae3569a3e56ace4fe5185fd9e7179', 'a9813e843b49772b09132306399f7014b07dd42ec3f2c6ddc8ba62c7ebbe238e', 0, 1, '::1', 1615903377, 1626267265),
(276, '72cafe6f83bb065fdb3c4c6e2f6832e4', '011a8b46bc6e0a7935ae99943a92af371edc0cb57e2d8ed8898a48d723808886', 0, 1, '::1', 1615907840, 1626275823),
(277, '93f9d469ac7d2d8374f301ce935f9efd', 'dd66b707e9cac4e198314b496c15d5556d39fa7b1073f4c5e0bf20d410d59e44', 0, 1, '::1', 1615913936, 1626278058),
(278, '65610c680a456609aee19b742caee30d', 'd99ad977701ce3afb6167ac9494ef3cbc28a1e54c80e59bed3bee1209c2a5705', 0, 1, '::1', 1615999177, 1626345095),
(279, '6ec770fa7ac3d86508e3ed22fcf06583', '11c245a6cf0993c6d756aec76733fdb1266d36fd3b6afa8b044ed946779e6931', 0, 1, '::1', 1616162423, 1626528805),
(280, '7e8e30833d337466f8b09a94024ace5e', '86b409d9378579d7e944773487edae78ca432d1139e46145b2b17e250dbae795', 0, 1, '::1', 1616162934, 1626530476),
(281, '2411137bb75ba9ff4a20022a9659d621', '1eafedee643759e8ab5452e8670e24e2e60ede4b75b5ed9dd4a04f40cfb7b0d0', 0, 1, '::1', 1616168164, 1626530970),
(282, '371ddf3d85d02ebf8dd07da601713aa5', '24a7974823b679e7262e7a94110d65da929a32004778f66ea1b0aa8467c0a46f', 0, 1, '::1', 1616172732, 1626536353),
(283, '15a7ed5bf402c8540eec542f7b384898', 'abec460f956cab657cd23e37998711d4c0a81cfcaf886bb7740b63643a1ca003', 0, 1, '::1', 1616700759, 1627068647),
(284, '742d5bd8facded474e830ecc023259cc', 'be2acf554f0b9294e19498d8e6f29be93c0a4193a320540813b71f674ef0ca78', 0, 1, '::1', 1616759796, 1627126757),
(285, '03306019dd01adf42d9f37d30078fe11', 'acc5fdcbeeeae80e466ffff6092321ae42ea8a34ad1a8b3414306b9dac20222d', 0, 1, '::1', 1616770479, 1627137559),
(286, 'a5793ce05aa65a51de49d29c085b35c8', '3120a206e508be4c632a45e58450ec0936903f061b2a145af4db7311e8a0e2fb', 0, 1, '::1', 1616777942, 1627139346),
(287, '58497249635917a59d3fce310eb791eb', '47e737047274c2efeea1a1e80b0240ca8be638ba2cc89a2b2d812e90e29379e9', 0, 1, '::1', 1617274577, 1627642577),
(288, '0e690ec09ff319aaa64958edab199090', '7e7c3c5a10144e446d72421b2d559482a316c9581e51eea74af5acba511dc400', 0, 1, '::1', 1617276527, 1627643140),
(289, 'ff3b28a53a5c8e4fe03964f3c98b7774', 'd688997117bbe963e7eea832e8c2cef8eb049149d55f54350710cf10a25efc42', 0, 1, '::1', 1617277483, 1627645316),
(290, '8bca8f745d2d323aeb1fa72f6cb5d955', '534f861ca8c3549d891b9ffe2a91c33420416264e4c18f92269066be560a83d0', 0, 1, '::1', 1617691222, 1628059221),
(291, '5730e0c46683cf984347445e2f3794a0', 'e01f6005a3fe2832186ca1388cf84204f8dd4d123d5885c8d10ae6664d4aaaa7', 0, 1, '::1', 1617691324, 1628059263),
(292, '9d7105ce4e692a1188b196963b35cf56', '1c537daea3a58a04983493b716c005a3e08f557a6ca5ca88dcf50918b451e1f7', 0, 1, '::1', 1621413346, 1631781284),
(293, '325a8c87f3b969d5ccaf1aa5f1705028', '47c9df99aa2f627a2d4132ccf503eb6886e2176dd6e12a1919abfb654c3f0700', 0, 1, '::1', 1621414270, 1631782120),
(294, '88ddf6f3dd5340cb58998b92106f8b54', '64afde1cdcf69fe2b04b2e5958f5594ca8dd3a26917a1a8e4ad277307f45348c', 0, 1, '::1', 1623337253, 1633690309),
(296, 'f982d113ec66f5c04cfbf3352bf5bb9b', '3a17f28aeba4d1afca59c9af21cb966ca661a72231a21b0c39532fe2b7975fee', 0, 1, '::1', 1628001001, 1638367369),
(297, 'ccf8f803a7fd6f1ad035863a8bd043ad', '142531cb7c03283b0fe19fef964ed59be1eedcfca63506c7485aeac90b22376f', 0, 1, '::1', 1628061510, 1638427010);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE `user_temp` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `timestamp` int(11) UNSIGNED NOT NULL,
  `type` varchar(20) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `testi_heading` varchar(255) NOT NULL,
  `why_slogen_o` varchar(255) NOT NULL,
  `why_slogen_t` varchar(255) NOT NULL,
  `why_slogen_th` varchar(255) NOT NULL,
  `why_body` varchar(255) NOT NULL,
  `acticve_clients` int(11) NOT NULL,
  `active_years` int(11) NOT NULL,
  `active_projects` int(11) NOT NULL,
  `active_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `testi_heading`, `why_slogen_o`, `why_slogen_t`, `why_slogen_th`, `why_body`, `acticve_clients`, `active_years`, `active_projects`, `active_team`) VALUES
(1, 'Saying ipsum dolor sit ametconsecteturing elit sed do eiusmod tempor incididunt laboret dolore magna aliqua minaquaerat.', 'Need An Appointment?', 'We Flight For The Justice', 'During 10+ years of professionalism we have maintained our success ration upto 99%', '<p>Falcon Solicitors is the trading name of Falcon Solicitors Ltd. which is an innovative law firm, regulated by the Solicitors Regulations Authority under Registration Number 645375. It is registered in England &amp; Wales with registration number 107900', 1000, 10, 99, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_guests`
--
ALTER TABLE `active_guests`
  ADD PRIMARY KEY (`ip`);

--
-- Indexes for table `banlist`
--
ALTER TABLE `banlist`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `blogs_categories`
--
ALTER TABLE `blogs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_mcat`
--
ALTER TABLE `blog_mcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_scat`
--
ALTER TABLE `blog_scat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sscat`
--
ALTER TABLE `blog_sscat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `date_prayer`
--
ALTER TABLE `date_prayer`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `intr_order`
--
ALTER TABLE `intr_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcat`
--
ALTER TABLE `mcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_images`
--
ALTER TABLE `page_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_files`
--
ALTER TABLE `pdf_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prayer_time`
--
ALTER TABLE `prayer_time`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `prayer_date` (`prayer_date_id`);

--
-- Indexes for table `roza_time`
--
ALTER TABLE `roza_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scat`
--
ALTER TABLE `scat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_line`
--
ALTER TABLE `service_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slidei`
--
ALTER TABLE `slidei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_texts`
--
ALTER TABLE `small_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sscat`
--
ALTER TABLE `sscat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_temp`
--
ALTER TABLE `user_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banlist`
--
ALTER TABLE `banlist`
  MODIFY `ban_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs_categories`
--
ALTER TABLE `blogs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blog_mcat`
--
ALTER TABLE `blog_mcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog_scat`
--
ALTER TABLE `blog_scat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_sscat`
--
ALTER TABLE `blog_sscat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `date_prayer`
--
ALTER TABLE `date_prayer`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `intr_order`
--
ALTER TABLE `intr_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_table`
--
ALTER TABLE `log_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mcat`
--
ALTER TABLE `mcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `page_images`
--
ALTER TABLE `page_images`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prayer_time`
--
ALTER TABLE `prayer_time`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roza_time`
--
ALTER TABLE `roza_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scat`
--
ALTER TABLE `scat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_line`
--
ALTER TABLE `service_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slidei`
--
ALTER TABLE `slidei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `small_texts`
--
ALTER TABLE `small_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sscat`
--
ALTER TABLE `sscat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `user_temp`
--
ALTER TABLE `user_temp`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
