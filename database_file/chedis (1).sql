-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chedis`
--

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`id`, `user_id`, `user_type`, `activity_name`, `activity_details`, `created_at`, `updated_at`) VALUES
(5, 0, 'Admin', 'Create new user account', 'User ID: 21, email: kayceramirez12@gmail.com, position: Director II, department: Technical Unit, user_type: User', '2024-03-24 23:11:43', '2024-03-24 23:11:43'),
(6, 0, 'Admin', 'Update user info', 'User ID: 21, Old Info: {\"name\":\"Kayce Robles Ramirez\",\"email\":\"kayceramirez12@gmail.com\",\"position\":\"Director II\",\"department\":\"Technical Unit\",\"role_as\":0}, New Info: {\"name\":\"Kayce Robles Ramirez\",\"email\":\"kayceramirez12@gmail.com\",\"position\":\"Director III\",\"department\":\"Technical Unit\",\"role_as\":0}', '2024-03-24 23:38:23', '2024-03-24 23:38:23'),
(7, 0, 'Admin', 'Update user password', 'User ID: 21, Updating user password', '2024-03-24 23:45:48', '2024-03-24 23:45:48'),
(8, 0, 'Admin', 'Create new user account', 'User ID: 22, email: ejustinkian@gmail.com, position: OJT, department: MIS Unit, user_type: User', '2024-03-25 00:17:26', '2024-03-25 00:17:26'),
(9, 0, 'Admin', 'Update brand info', 'Brand ID: 4, Old Info: {\"brand_name\":\"Fujitsu\",\"brand_slug\":\"fujitsu\",\"status\":1}, New Info: {\"brand_name\":\"Fujitsu\",\"brand_slug\":\"fujitsu\",\"status\":true}', '2024-03-25 00:57:47', '2024-03-25 00:57:47'),
(10, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 01:02:21', '2024-03-26 01:02:21'),
(11, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 01:03:48', '2024-03-26 01:03:48'),
(12, 1, 'User', 'Logged in', 'Logging-in user.', '2024-03-26 01:04:14', '2024-03-26 01:04:14'),
(13, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 16:29:56', '2024-03-26 16:29:56'),
(14, 0, 'Admin', 'Logged out', 'Logging-out admin user.', '2024-03-26 16:30:07', '2024-03-26 16:30:07'),
(15, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 16:30:14', '2024-03-26 16:30:14'),
(16, 1, 'User', 'Logged in', 'Logging-in user.', '2024-03-26 16:30:35', '2024-03-26 16:30:35'),
(17, 1, 'User', 'Logged out', 'Logging-out user.', '2024-03-26 16:30:40', '2024-03-26 16:30:40'),
(18, 0, 'Admin', 'Logged out', 'Logging-out admin user.', '2024-03-26 17:59:00', '2024-03-26 17:59:00'),
(19, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 17:59:08', '2024-03-26 17:59:08'),
(20, 0, 'Admin', 'Logged out', 'Logging-out admin.', '2024-03-26 18:06:26', '2024-03-26 18:06:26'),
(21, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-26 18:06:33', '2024-03-26 18:06:33'),
(22, 1, 'User', 'Logged in', 'Logging-in user.', '2024-03-26 18:06:55', '2024-03-26 18:06:55'),
(23, 1, 'User', 'Logged out', 'Logging-out user.', '2024-03-26 18:07:04', '2024-03-26 18:07:04'),
(24, 0, 'Admin', 'Create new item category', 'Category ID: 1, Category Name: ', '2024-03-26 19:10:41', '2024-03-26 19:10:41'),
(25, 0, 'Admin', 'Update supplier info', 'Supplier ID: 1, Old Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":1}, New Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":true}', '2024-03-26 19:50:47', '2024-03-26 19:50:47'),
(26, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-03-31 22:32:04', '2024-03-31 22:32:04'),
(27, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-01 23:35:33', '2024-04-01 23:35:33'),
(28, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-03 16:34:57', '2024-04-03 16:34:57'),
(29, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-04 00:38:15', '2024-04-04 00:38:15'),
(30, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-04 16:56:04', '2024-04-04 16:56:04'),
(31, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-04 19:28:56', '2024-04-04 19:28:56'),
(32, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-04 22:15:39', '2024-04-04 22:15:39'),
(33, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-10 16:37:13', '2024-04-10 16:37:13'),
(34, 0, 'Admin', 'Create new item product', 'Item Product ID: 1, Item Product Name: Canon G7070', '2024-04-10 16:47:46', '2024-04-10 16:47:46'),
(35, 0, 'Admin', 'Update supplier info', 'Supplier ID: 1, Old Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":1}, New Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":true}', '2024-04-10 17:26:17', '2024-04-10 17:26:17'),
(36, 0, 'Admin', 'Delete Item product', 'Deleting item product from database', '2024-04-10 17:42:07', '2024-04-10 17:42:07'),
(37, 0, 'Admin', 'Create new item product', 'Item Product ID: 2, Item Product Name: Canon G7070', '2024-04-10 17:47:07', '2024-04-10 17:47:07'),
(38, 0, 'Admin', 'Create new item product', 'Item Product ID: 3, Item Product Name: Canon G7070', '2024-04-10 17:54:32', '2024-04-10 17:54:32'),
(39, 0, 'Admin', 'Delete Item product', 'Deleting item product from database', '2024-04-10 17:54:49', '2024-04-10 17:54:49'),
(40, 0, 'Admin', 'Create new item product', 'Item Product ID: 4, Item Product Name: Canon G7070', '2024-04-10 17:55:30', '2024-04-10 17:55:30'),
(41, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":21,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":21,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 18:37:32', '2024-04-10 18:37:32'),
(42, 0, 'Admin', 'Update item product info', 'Item Product ID: 2, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":2,\"item_details\":\"ProductProductProductProduct\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":2,\"item_details\":\"ProductProductProductProduct\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 18:38:04', '2024-04-10 18:38:04'),
(43, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":21,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":21,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 18:38:41', '2024-04-10 18:38:41'),
(44, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":21,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":\"50\",\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}', '2024-04-10 18:39:08', '2024-04-10 18:39:08'),
(45, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":50,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":50,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 18:50:27', '2024-04-10 18:50:27'),
(46, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":50,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":\"51\",\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}', '2024-04-10 18:53:56', '2024-04-10 18:53:56'),
(47, 0, 'Admin', 'Update item product stock', 'Item Product ID: 4, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":51}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":51}', '2024-04-10 19:04:59', '2024-04-10 19:04:59'),
(48, 0, 'Admin', 'Update item product info', 'Item Product ID: 4, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":51,\"item_details\":\"Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 19:06:03', '2024-04-10 19:06:03'),
(49, 0, 'Admin', 'Create new item product', 'Item Product ID: 5, Item Product Name: Canon G7070', '2024-04-10 19:47:43', '2024-04-10 19:47:43'),
(50, 0, 'Admin', 'Update item product stock', 'Item Product ID: 2, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":2}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"0\"}', '2024-04-10 21:22:13', '2024-04-10 21:22:13'),
(51, 0, 'Admin', 'Update item product stock', 'Item Product ID: 2, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":0}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":0}', '2024-04-10 21:22:22', '2024-04-10 21:22:22'),
(52, 0, 'Admin', 'Update item product stock', 'Item Product ID: 2, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":0}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"2\"}', '2024-04-10 21:26:36', '2024-04-10 21:26:36'),
(53, 0, 'Admin', 'Update item product stock', 'Item Product ID: 2, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":2}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"0\"}', '2024-04-10 21:32:50', '2024-04-10 21:32:50'),
(54, 0, 'Admin', 'Update item product stock', 'Item Product ID: 2, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":0}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"1\"}', '2024-04-10 21:33:04', '2024-04-10 21:33:04'),
(55, 0, 'Admin', 'Update item product stock', 'Item Product ID: 5, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":21}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"20\"}', '2024-04-10 21:41:32', '2024-04-10 21:41:32'),
(56, 0, 'Admin', 'Create new item product', 'Item Product ID: 6, Item Product Name: Canon G7070', '2024-04-10 22:27:27', '2024-04-10 22:27:27'),
(57, 0, 'Admin', 'Delete Item product', 'Deleting item product from database', '2024-04-10 22:30:43', '2024-04-10 22:30:43'),
(58, 0, 'Admin', 'Create new item product', 'Item Product ID: 7, Item Product Name: Canon G7070', '2024-04-10 22:32:03', '2024-04-10 22:32:03'),
(59, 0, 'Admin', 'Create new item product', 'Item Product ID: 8, Item Product Name: Canon G7070', '2024-04-10 22:33:59', '2024-04-10 22:33:59'),
(60, 0, 'Admin', 'Create new item product', 'Item Product ID: 9, Item Product Name: Canon G7070', '2024-04-10 22:48:01', '2024-04-10 22:48:01'),
(61, 0, 'Admin', 'Update item product stock', 'Item Product ID: 9, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":3}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"49\"}', '2024-04-10 22:57:32', '2024-04-10 22:57:32'),
(62, 0, 'Admin', 'Update item product stock', 'Item Product ID: 9, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":49}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"0\"}', '2024-04-10 22:57:38', '2024-04-10 22:57:38'),
(63, 0, 'Admin', 'Update item product stock', 'Item Product ID: 8, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":21}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"3\"}', '2024-04-10 22:57:49', '2024-04-10 22:57:49'),
(64, 0, 'Admin', 'Update item product stock', 'Item Product ID: 9, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":0}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"10\"}', '2024-04-10 23:10:18', '2024-04-10 23:10:18'),
(65, 0, 'Admin', 'Update item product stock', 'Item Product ID: 9, Old Info: {\"item_name\":\"Canon G7070\",\"item_stock\":10}, New Info: {\"item_name\":\"Canon G7070\",\"item_stock\":\"0\"}', '2024-04-10 23:10:22', '2024-04-10 23:10:22'),
(66, 0, 'Admin', 'Update item product info', 'Item Product ID: 9, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_details\":\"Canon G7070Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":0,\"item_details\":\"Canon G7070Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 23:13:57', '2024-04-10 23:13:57'),
(67, 0, 'Admin', 'Update item product info', 'Item Product ID: 9, Old Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_details\":\"Canon G7070Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":1}, New Info: {\"subcategory_id\":1,\"brand_id\":3,\"supplier_id\":1,\"item_name\":\"Canon G7070\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":0,\"item_details\":\"Canon G7070Canon G7070Canon G7070\",\"meta_title\":\"Canon G7070\",\"meta_keyword\":\"Canon G7070\",\"status\":true}', '2024-04-10 23:14:35', '2024-04-10 23:14:35'),
(68, 0, 'Admin', 'Create new item brand', 'Brand ID: 5, Brand Name: Double A', '2024-04-10 23:29:43', '2024-04-10 23:29:43'),
(69, 0, 'Admin', 'Create new item product', 'Item Product ID: 10, Item Product Name: Double A Premium Bond Paper A4', '2024-04-10 23:30:17', '2024-04-10 23:30:17'),
(70, 0, 'Admin', 'Logged out', 'Logging-out admin.', '2024-04-10 23:34:26', '2024-04-10 23:34:26'),
(71, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-10 23:34:37', '2024-04-10 23:34:37'),
(72, 0, 'Admin', 'Update item product stock', 'Item Product ID: 10, Old Info: {\"item_name\":\"Double A Premium Bond Paper A4\",\"item_stock\":4}, New Info: {\"item_name\":\"Double A Premium Bond Paper A4\",\"item_stock\":\"100\"}', '2024-04-10 23:52:26', '2024-04-10 23:52:26'),
(73, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-11 00:58:53', '2024-04-11 00:58:53'),
(74, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-11 16:13:12', '2024-04-11 16:13:12'),
(75, 0, 'Admin', 'Logged out', 'Logging-out admin.', '2024-04-11 16:15:46', '2024-04-11 16:15:46'),
(76, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-11 16:16:27', '2024-04-11 16:16:27'),
(77, 0, 'Admin', 'Create new item brand', 'Sub Category ID: , Sub Category Name: ', '2024-04-11 16:18:10', '2024-04-11 16:18:10'),
(78, 0, 'Admin', 'Update item product stock', 'Item Product ID: 10, Old Info: {\"item_name\":\"Double A Premium Bond Paper A4\",\"item_stock\":100}, New Info: {\"item_name\":\"Double A Premium Bond Paper A4\",\"item_stock\":\"105\"}', '2024-04-11 16:18:42', '2024-04-11 16:18:42'),
(79, 0, 'Admin', 'Create new item brand', 'Sub Category ID: , Sub Category Name: ', '2024-04-11 16:42:47', '2024-04-11 16:42:47'),
(80, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-11 16:43:28', '2024-04-11 16:43:28'),
(81, 0, 'Admin', 'Create new item brand', 'Sub Category ID: , Sub Category Name: ', '2024-04-11 16:43:49', '2024-04-11 16:43:49'),
(82, 0, 'Admin', 'Update sub info', 'Sub Category ID: 3, Old Info: {\"category_id\":2,\"subcategory_name\":null,\"subcategory_slug\":null,\"meta_title\":\"Paper\",\"meta_keyword\":\"Paper\",\"status\":1}, New Info: {\"category_id\":2,\"subcategory_name\":\"A4 Paper\",\"subcategory_slug\":\"a4-paper\",\"meta_title\":\"A4 Paper\",\"meta_keyword\":\"A4 Paper\",\"status\":1}', '2024-04-11 16:44:01', '2024-04-11 16:44:01'),
(83, 0, 'Admin', 'Create new sub category', 'Sub Category ID: 5, Sub Category Name: Paper', '2024-04-11 16:53:35', '2024-04-11 16:53:35'),
(84, 0, 'Admin', 'Update supplier info', 'Supplier ID: 1, Old Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":1}, New Info: {\"supplier_name\":\"Jhay Regis\",\"supplier_contact\":\"09123456789\",\"supplier_email\":\"jhayregis123@gmail.com\",\"supplier_tin\":\"123-456-789-000\",\"supplier_bp\":\"2021-5413\",\"supplier_jepscert\":\"2021-5413\",\"supplier_myrp\":\"2021-5413\",\"supplier_philcert\":\"2021-5413\",\"status\":true}', '2024-04-11 16:53:49', '2024-04-11 16:53:49'),
(85, 0, 'Admin', 'Create new item product', 'Item Product ID: 11, Item Product Name: Double A Premium Bond Paper A4', '2024-04-11 16:59:56', '2024-04-11 16:59:56'),
(86, 0, 'Admin', 'Update item product info', 'Item Product ID: 11, Old Info: {\"subcategory_id\":3,\"brand_id\":5,\"supplier_id\":1,\"item_name\":\"Double A Premium Bond Paper A4\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_details\":\"Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4\",\"meta_title\":\"Double A Premium Bond Paper A4\",\"meta_keyword\":\"Double A Premium Bond Paper A4\",\"status\":1}, New Info: {\"subcategory_id\":\"5\",\"brand_id\":5,\"supplier_id\":1,\"item_name\":\"Double A Premium Bond Paper A4\",\"item_sn\":\"C12345bnjkJo0\",\"item_mn\":\"C12345bnjkJo0\",\"item_stock\":40,\"item_details\":\"Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4\",\"meta_title\":\"Double A Premium Bond Paper A4\",\"meta_keyword\":\"Double A Premium Bond Paper A4\",\"status\":1}', '2024-04-11 17:00:14', '2024-04-11 17:00:14'),
(87, 0, 'Admin', 'Logged in', 'Logging-in admin user.', '2024-04-11 22:03:03', '2024-04-11 22:03:03'),
(88, 0, 'Admin', 'Add new supplier', 'Supplier ID: 2, Supplier Name: qweqweqwe, Supplier Contact: 096578, Supplier Email: asd@ched.gov.ph, Supplier Tin: 234, Supplier Business Permit: 234, Supplier JePS Cert. No.: 234, Supplier Mayors Permit: 234, Supplier Phil Cert. No.: 234', '2024-04-11 23:11:30', '2024-04-11 23:11:30'),
(89, 0, 'Admin', 'Delete supplier', 'Deleting supplier from database', '2024-04-11 23:12:01', '2024-04-11 23:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item-category`
--

CREATE TABLE `item-category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itembrands`
--

CREATE TABLE `itembrands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itembrands`
--

INSERT INTO `itembrands` (`id`, `brand_name`, `brand_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo', 'lenovo', 1, '2024-03-24 16:48:35', '2024-03-24 16:48:35'),
(2, 'Epson', 'epson', 1, '2024-03-24 16:48:43', '2024-03-24 16:48:43'),
(3, 'Canon', 'canon', 1, '2024-03-24 16:48:51', '2024-03-24 16:48:51'),
(4, 'Fujitsu', 'fujitsu', 1, '2024-03-25 00:21:16', '2024-03-25 00:57:47'),
(5, 'Double A', 'double-a', 1, '2024-04-10 23:29:43', '2024-04-10 23:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `itemcategories`
--

CREATE TABLE `itemcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemcategories`
--

INSERT INTO `itemcategories` (`id`, `category_name`, `category_slug`, `meta_title`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ICT', 'ict', 'ICT', 'ICT', 1, '2024-03-24 16:49:28', '2024-03-24 16:49:28'),
(2, 'Non-ICT', 'non-ict', 'Non-ICT', 'Non-ICT', 1, '2024-03-24 16:49:55', '2024-03-24 16:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `itemproducts`
--

CREATE TABLE `itemproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_sn` varchar(255) NOT NULL,
  `item_mn` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `item_details` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemproducts`
--

INSERT INTO `itemproducts` (`id`, `subcategory_id`, `brand_id`, `supplier_id`, `item_name`, `item_sn`, `item_mn`, `item_image`, `item_stock`, `item_details`, `meta_title`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712817123.png', 1, 'ProductProductProductProduct', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 17:47:07', '2024-04-10 21:33:04'),
(4, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712817123.png', 51, 'Canon G7070Canon G7070', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 17:55:30', '2024-04-10 19:06:03'),
(5, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712817123.png', 20, 'LGSLGSLGSLGSLGSLGS', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 19:47:43', '2024-04-10 21:41:32'),
(7, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712817123.png', 21, 'Canon G7070Canon G7070', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 22:32:03', '2024-04-10 22:32:03'),
(8, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712817123.png', 3, 'Canon G7070Canon G7070Canon G7070', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 22:33:59', '2024-04-10 22:57:49'),
(9, 1, 3, 1, 'Canon G7070', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712818081.png', 0, 'Canon G7070Canon G7070Canon G7070', 'Canon G7070', 'Canon G7070', 1, '2024-04-10 22:48:01', '2024-04-10 23:14:35'),
(10, 3, 5, 1, 'Double A Premium Bond Paper A4', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712820617.jpg', 105, 'Double ADouble ADouble ADouble ADouble A', 'Double A Premium Bond Paper A4', 'Double A Premium Bond Paper A4', 1, '2024-04-10 23:30:17', '2024-04-11 16:18:42'),
(11, 5, 5, 1, 'Double A Premium Bond Paper A4', 'C12345bnjkJo0', 'C12345bnjkJo0', '1712883596.jpg', 40, 'Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4Double A Premium Bond Paper A4', 'Double A Premium Bond Paper A4', 'Double A Premium Bond Paper A4', 1, '2024-04-11 16:59:56', '2024-04-11 17:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_18_053106_add_details_to_users_table', 1),
(7, '2024_03_22_083547_create_item-category_table', 2),
(8, '2024_03_23_074948_create_itemcategories_table', 3),
(9, '2024_03_23_105221_create_subcategories_table', 3),
(10, '2024_03_23_142526_create_itembrands_table', 3),
(11, '2024_03_25_052447_create_audittraills_table', 4),
(12, '2024_03_25_061342_create_audittraill_table', 5),
(13, '2024_03_27_025452_create_suppliers_table', 6),
(14, '2024_04_03_054310_create_itemproducts_table', 7),
(15, '2024_04_06_191506_create_itemproducts_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `meta_title`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Printer', 'printer', 'Printer', 'Printer', 1, '2024-03-24 16:50:22', '2024-03-24 16:50:22'),
(2, 1, 'Laptop', 'laptop', 'Laptop', 'Laptop', 1, '2024-03-24 16:50:35', '2024-03-24 16:50:35'),
(3, 2, 'A4 Paper', 'a4-paper', 'A4 Paper', 'A4 Paper', 1, '2024-03-24 16:50:53', '2024-04-11 16:44:01'),
(4, 1, 'Desktop', 'desktop', 'Desktop', 'Desktop', 1, '2024-03-25 00:20:13', '2024-03-25 00:20:13'),
(5, 2, 'Paper', 'paper', 'Paper', 'Paper', 1, '2024-04-11 16:53:35', '2024-04-11 16:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_tin` varchar(255) NOT NULL,
  `supplier_bp` varchar(255) NOT NULL,
  `supplier_jepscert` varchar(255) NOT NULL,
  `supplier_myrp` varchar(255) NOT NULL,
  `supplier_philcert` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_contact`, `supplier_email`, `supplier_tin`, `supplier_bp`, `supplier_jepscert`, `supplier_myrp`, `supplier_philcert`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jhay Regis', '09123456789', 'jhayregis123@gmail.com', '123-456-789-000', '2021-5413', '2021-5413', '2021-5413', '2021-5413', 1, '2024-03-26 19:10:41', '2024-04-11 16:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(0, 'Admin', 'admin123@gmail.com', 'Supply Supervisor', 'Supply Unit', NULL, '$2y$10$slWGQ2UEP1x/1TRKlCoNA./LzMcG643KLywhcKJEP3MuZwOGD9zhS', NULL, '2024-03-17 21:46:33', '2024-03-17 21:46:33', 1),
(1, 'Joshua Mhar Alcubilla', 'joshuamhar1@gmail.com', 'OJT', 'MIS Unit', NULL, '$2y$10$Kqwb.fZQ5N1wWrt0ZSCc6uSeXTa/5i2epRtuiiZZwWV0Ng7A5AQW6', NULL, '2024-03-17 21:36:08', '2024-03-17 21:36:08', 0),
(14, 'Kelin Quinn Miguel', 'kelinquinn12@gmail.com', 'Accountant', 'Accounting Unit', NULL, '$2y$10$56LxXYrZpuWh652x26L8M.qgxdcWxgO/Kp7LJxZSXC4xwab/OLxDa', NULL, '2024-03-21 00:49:03', '2024-03-21 23:27:47', 0),
(18, 'Arrah Crisostomo Abella', 'arrahcris21@gmail.com', 'Cashier', 'Cash Unit', NULL, '$2y$10$m.grTOOYu.aQSXbqeOa5eurR8sTZ1CwRiH/f3/g8OFYFm8Y9FAhd6', NULL, '2024-03-24 22:25:11', '2024-03-24 22:25:11', 0),
(21, 'Kayce Robles Ramirez', 'kayceramirez12@gmail.com', 'Director III', 'Technical Unit', NULL, '$2y$10$y4opHdtcjgLqdjxB0Dat0eD5EfNLyEbHxJ5JanRLgrhRrZHadzjOe', NULL, '2024-03-24 23:11:43', '2024-03-24 23:45:48', 0),
(22, 'Justine Kian Esurena', 'ejustinkian@gmail.com', 'OJT', 'MIS Unit', NULL, '$2y$10$e5XlqEBrMOFG/AiiI6HFf.HZqtxBcygXq/iQUlGC6nkr3XGLozTGm', NULL, '2024-03-25 00:17:26', '2024-03-25 00:17:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audittrail_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item-category`
--
ALTER TABLE `item-category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `itembrands`
--
ALTER TABLE `itembrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemcategories`
--
ALTER TABLE `itemcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemproducts`
--
ALTER TABLE `itemproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemproducts_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `itemproducts_brand_id_foreign` (`brand_id`),
  ADD KEY `itemproducts_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_supplier_email_unique` (`supplier_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item-category`
--
ALTER TABLE `item-category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itembrands`
--
ALTER TABLE `itembrands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itemcategories`
--
ALTER TABLE `itemcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itemproducts`
--
ALTER TABLE `itemproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD CONSTRAINT `audittrail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itemproducts`
--
ALTER TABLE `itemproducts`
  ADD CONSTRAINT `itemproducts_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `itembrands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemproducts_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemproducts_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `itemcategories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
