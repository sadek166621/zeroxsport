-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2026 at 02:54 PM
-- Server version: 11.4.8-MariaDB-cll-lve
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeroxspo_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_heads`
--

CREATE TABLE `account_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_heads`
--

INSERT INTO `account_heads` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Product Purchase', 'product-purchase', 1, '2022-06-21 21:49:01', '2022-06-21 21:49:01'),
(2, 'Product Sell', 'product-sell', 1, '2020-07-28 07:09:05', '2020-07-28 07:09:05'),
(3, 'Product Return', 'product-return', 1, '2021-09-13 23:59:26', '2021-09-13 23:59:26'),
(4, 'Cash Fund', 'cash-fund', 1, '2021-08-26 11:18:26', '2021-08-26 11:18:26'),
(6, 'Transport Cost', 'transport-cost', 1, '2020-09-04 05:51:38', '2020-09-04 05:51:38'),
(7, 'House rent', 'house-rent', 1, '2021-07-02 15:26:46', '2021-07-02 15:26:46'),
(8, 'Electricity Bill', 'electricity-bill', 1, '2021-07-04 17:54:29', '2021-07-04 17:54:29'),
(9, 'Courier Charge', 'courier-charge', 1, '2021-07-04 17:55:15', '2021-07-04 17:55:15'),
(10, 'Refreshment', 'refreshment', 1, '2021-07-04 17:55:34', '2021-07-04 17:55:34'),
(11, 'Market Bill', 'market-bill', 1, '2021-07-04 17:55:44', '2021-07-04 17:55:44'),
(12, 'Purchase Materials', 'purchase-materials', 1, '2021-07-04 17:56:08', '2021-07-04 17:56:08'),
(13, 'Packaging Cost', 'packaging-cost', 1, '2021-07-11 00:08:00', '2021-07-11 00:08:00'),
(14, 'Repair Materials', 'repair-materials', 1, '2021-07-11 00:08:55', '2021-07-11 00:08:55'),
(15, 'Damage/Loss', 'damage/loss', 1, '2021-07-19 02:34:00', '2022-10-15 19:45:54'),
(16, 'Web maintenance', 'web-maintenance', 1, '2021-07-19 02:34:34', '2021-07-19 02:34:34'),
(17, 'Others', 'others', 1, '2021-08-26 11:18:26', '2021-08-26 11:18:26'),
(22, 'Order Cancel', 'order-cancel', 1, '2024-03-09 06:17:55', '2024-03-09 06:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `account_ledgers`
--

CREATE TABLE `account_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_head_id` bigint(20) UNSIGNED NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `balance` double NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Debit, 2=>Credit',
  `order_id` bigint(20) NOT NULL DEFAULT 0,
  `product_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_ledgers`
--

INSERT INTO `account_ledgers` (`id`, `account_head_id`, `particulars`, `debit`, `credit`, `balance`, `type`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(64, 2, 'Order ID: 32', 0, 290, 290, 2, 32, 0, '2024-03-16 05:15:22', '2024-03-16 05:15:22'),
(65, 1, 'Product ID: 88', 185, 0, -185, 1, 0, 88, '2024-06-30 10:10:40', '2024-06-30 10:10:40'),
(66, 1, 'Product ID: 89', 400, 0, -400, 1, 0, 89, '2024-06-30 10:17:48', '2024-06-30 10:17:48'),
(67, 1, 'Product ID: 90', 50, 0, -50, 1, 0, 90, '2024-06-30 11:51:06', '2024-06-30 11:51:06'),
(68, 1, 'Product ID: 91', 400, 0, -400, 1, 0, 91, '2024-07-07 04:17:42', '2024-07-07 04:17:42'),
(69, 1, 'Product ID: 92', 350, 0, -350, 1, 0, 92, '2024-07-07 04:44:24', '2024-07-07 04:44:24'),
(70, 1, 'Product ID: 93', 249, 0, -249, 1, 0, 93, '2024-07-07 05:01:23', '2024-07-07 05:01:23'),
(71, 1, 'Product ID: 94', 300, 0, -300, 1, 0, 94, '2024-07-07 05:13:10', '2024-07-07 05:13:10'),
(72, 1, 'Product ID: 95', 460, 0, -460, 1, 0, 95, '2024-07-07 05:29:49', '2024-07-07 05:29:49'),
(73, 1, 'Product ID: 96', 150, 0, -150, 1, 0, 96, '2024-07-07 05:47:45', '2024-07-07 05:47:45'),
(74, 1, 'Product ID: 97', 299, 0, -299, 1, 0, 97, '2024-07-07 06:03:38', '2024-07-07 06:03:38'),
(75, 1, 'Product ID: 98', 150, 0, -150, 1, 0, 98, '2024-07-07 07:45:25', '2024-07-07 07:45:25'),
(76, 1, 'Product ID: 99', 300, 0, -300, 1, 0, 99, '2024-07-07 07:50:22', '2024-07-07 07:50:22'),
(77, 1, 'Product ID: 100', 500, 0, -500, 1, 0, 100, '2024-07-07 07:55:13', '2024-07-07 07:55:13'),
(78, 1, 'Product ID: 101', 320, 0, -320, 1, 0, 101, '2024-07-07 08:29:30', '2024-07-07 08:29:30'),
(79, 1, 'Product ID: 102', 120, 0, -120, 1, 0, 102, '2024-07-07 08:36:43', '2024-07-07 08:36:43'),
(80, 1, 'Product ID: 103', 700, 0, -700, 1, 0, 103, '2024-07-07 08:40:33', '2024-07-07 08:40:33'),
(81, 1, 'Product ID: 104', 99, 0, -99, 1, 0, 104, '2024-07-07 08:47:16', '2024-07-07 08:47:16'),
(82, 1, 'Product ID: 105', 30, 0, -30, 1, 0, 105, '2024-07-07 08:50:58', '2024-07-07 08:50:58'),
(83, 1, 'Product ID: 106', 350, 0, -350, 1, 0, 106, '2024-07-07 08:55:17', '2024-07-07 08:55:17'),
(84, 1, 'Product ID: 107', 90, 0, -90, 1, 0, 107, '2024-07-07 09:06:45', '2024-07-07 09:06:45'),
(85, 1, 'Product ID: 108', 37, 0, -37, 1, 0, 108, '2024-07-07 09:10:07', '2024-07-07 09:10:07'),
(86, 1, 'Product ID: 109', 33, 0, -33, 1, 0, 109, '2024-07-07 09:13:03', '2024-07-07 09:13:03'),
(87, 1, 'Product ID: 110', 13000, 0, -13000, 1, 0, 110, '2024-07-07 09:18:31', '2024-07-07 09:18:31'),
(88, 1, 'Product ID: 111', 30000, 0, -30000, 1, 0, 111, '2024-07-07 09:22:01', '2024-07-07 09:22:01'),
(89, 1, 'Product ID: 112', 170000, 0, -170000, 1, 0, 112, '2024-07-07 09:25:09', '2024-07-07 09:25:09'),
(90, 1, 'Product ID: 113', 85000, 0, -85000, 1, 0, 113, '2024-07-07 09:29:16', '2024-07-07 09:29:16'),
(91, 1, 'Product ID: 114', 190000, 0, -190000, 1, 0, 114, '2024-07-07 09:33:19', '2024-07-07 09:33:19'),
(92, 1, 'Product ID: 115', 50000, 0, -50000, 1, 0, 115, '2024-07-07 09:36:00', '2024-07-07 09:36:00'),
(93, 1, 'Product ID: 116', 2900, 0, -2900, 1, 0, 116, '2024-07-07 09:40:27', '2024-07-07 09:40:27'),
(94, 1, 'Product ID: 117', 90000, 0, -90000, 1, 0, 117, '2024-07-07 09:43:49', '2024-07-07 09:43:49'),
(95, 1, 'Product ID: 118', 112000, 0, -112000, 1, 0, 118, '2024-07-07 09:48:07', '2024-07-07 09:48:07'),
(96, 1, 'Product ID: 119', 500, 0, -500, 1, 0, 119, '2024-07-07 09:52:03', '2024-07-07 09:52:03'),
(97, 1, 'Product ID: 120', 3000, 0, -3000, 1, 0, 120, '2024-07-07 09:58:28', '2024-07-07 09:58:28'),
(98, 1, 'Product ID: 121', 5600, 0, -5600, 1, 0, 121, '2024-07-07 10:02:15', '2024-07-07 10:02:15'),
(99, 1, 'Product ID: 122', 5000, 0, -5000, 1, 0, 122, '2024-07-08 11:28:37', '2024-07-08 11:28:37'),
(100, 1, 'Product ID: 123', 6000, 0, -6000, 1, 0, 123, '2024-07-08 11:34:23', '2024-07-08 11:34:23'),
(101, 1, 'Product ID: 124', 4000, 0, -4000, 1, 0, 124, '2024-07-08 11:39:23', '2024-07-08 11:39:23'),
(102, 1, 'Product ID: 125', 5000, 0, -5000, 1, 0, 125, '2024-07-08 11:41:14', '2024-07-08 11:41:14'),
(103, 1, 'Product ID: 126', 200, 0, -200, 1, 0, 126, '2024-07-08 12:09:42', '2024-07-08 12:09:42'),
(104, 1, 'Product ID: 127', 500, 0, -500, 1, 0, 127, '2024-07-08 12:14:31', '2024-07-08 12:14:31'),
(105, 1, 'Product ID: 128', 1200, 0, -1200, 1, 0, 128, '2024-07-08 12:19:35', '2024-07-08 12:19:35'),
(106, 1, 'Product ID: 129', 1300, 0, -1300, 1, 0, 129, '2024-07-08 12:23:24', '2024-07-08 12:23:24'),
(107, 1, 'Product ID: 130', 2000, 0, -2000, 1, 0, 130, '2024-07-11 04:43:47', '2024-07-11 04:43:47'),
(108, 1, 'Product ID: 131', 1200, 0, -1200, 1, 0, 131, '2024-07-11 04:49:20', '2024-07-11 04:49:20'),
(109, 1, 'Product ID: 132', 500, 0, -500, 1, 0, 132, '2024-07-11 04:52:41', '2024-07-11 04:52:41'),
(110, 1, 'Product ID: 133', 500, 0, -500, 1, 0, 133, '2024-07-11 04:53:15', '2024-07-11 04:53:15'),
(111, 1, 'Product ID: 134', 450, 0, -450, 1, 0, 134, '2024-07-11 05:00:11', '2024-07-11 05:00:11'),
(112, 1, 'Product ID: 135', 750, 0, -750, 1, 0, 135, '2024-07-11 05:04:21', '2024-07-11 05:04:21'),
(113, 1, 'Product ID: 136', 360, 0, -360, 1, 0, 136, '2024-07-11 05:07:02', '2024-07-11 05:07:02'),
(114, 1, 'Product ID: 137', 200, 0, -200, 1, 0, 137, '2024-07-11 05:10:30', '2024-07-11 05:10:30'),
(115, 1, 'Product ID: 138', 300, 0, -300, 1, 0, 138, '2024-07-11 05:12:01', '2024-07-11 05:12:01'),
(116, 1, 'Product ID: 139', 200, 0, -200, 1, 0, 139, '2024-07-11 05:13:19', '2024-07-11 05:13:19'),
(117, 1, 'Product ID: 140', 200, 0, -200, 1, 0, 140, '2024-07-11 05:15:47', '2024-07-11 05:15:47'),
(118, 1, 'Product ID: 141', 900, 0, -900, 1, 0, 141, '2024-07-11 05:16:20', '2024-07-11 05:16:20'),
(119, 1, 'Product ID: 142', 600, 0, -600, 1, 0, 142, '2024-07-11 05:16:44', '2024-07-11 05:16:44'),
(120, 1, 'Product ID: 143', 170, 0, -170, 1, 0, 143, '2024-07-11 05:18:42', '2024-07-11 05:18:42'),
(121, 1, 'Product ID: 144', 1500, 0, -1500, 1, 0, 144, '2024-07-11 05:18:58', '2024-07-11 05:18:58'),
(122, 1, 'Product ID: 145', 10000, 0, -10000, 1, 0, 145, '2024-07-11 05:19:48', '2024-07-11 05:19:48'),
(123, 1, 'Product ID: 146', 190, 0, -190, 1, 0, 146, '2024-07-11 05:20:41', '2024-07-11 05:20:41'),
(124, 1, 'Product ID: 147', 24000, 0, -24000, 1, 0, 147, '2024-07-11 05:22:49', '2024-07-11 05:22:49'),
(125, 1, 'Product ID: 148', 45, 0, -45, 1, 0, 148, '2024-07-11 05:23:45', '2024-07-11 05:23:45'),
(126, 1, 'Product ID: 149', 1100, 0, -1100, 1, 0, 149, '2024-07-11 05:26:24', '2024-07-11 05:26:24'),
(127, 1, 'Product ID: 150', 300, 0, -300, 1, 0, 150, '2024-07-11 05:28:15', '2024-07-11 05:28:15'),
(128, 1, 'Product ID: 151', 1799, 0, -1799, 1, 0, 151, '2024-07-11 05:31:55', '2024-07-11 05:31:55'),
(129, 1, 'Product ID: 152', 60, 0, -60, 1, 0, 152, '2024-07-11 05:33:38', '2024-07-11 05:33:38'),
(130, 1, 'Product ID: 153', 220, 0, -220, 1, 0, 153, '2024-07-11 05:36:48', '2024-07-11 05:36:48'),
(131, 1, 'Product ID: 154', 90, 0, -90, 1, 0, 154, '2024-07-11 05:39:35', '2024-07-11 05:39:35'),
(132, 1, 'Product ID: 155', 85, 0, -85, 1, 0, 155, '2024-07-11 05:42:25', '2024-07-11 05:42:25'),
(133, 1, 'Product ID: 156', 350, 0, -350, 1, 0, 156, '2024-07-11 05:44:59', '2024-07-11 05:44:59'),
(134, 1, 'Product ID: 157', 2500, 0, -2500, 1, 0, 157, '2024-07-11 05:45:14', '2024-07-11 05:45:14'),
(135, 1, 'Product ID: 158', 130, 0, -130, 1, 0, 158, '2024-07-11 05:51:12', '2024-07-11 05:51:12'),
(136, 1, 'Product ID: 159', 1200, 0, -1200, 1, 0, 159, '2024-07-11 05:51:31', '2024-07-11 05:51:31'),
(137, 1, 'Product ID: 160', 130, 0, -130, 1, 0, 160, '2024-07-11 05:52:48', '2024-07-11 05:52:48'),
(138, 1, 'Product ID: 161', 140, 0, -140, 1, 0, 161, '2024-07-11 05:55:41', '2024-07-11 05:55:41'),
(139, 1, 'Product ID: 162', 1500, 0, -1500, 1, 0, 162, '2024-07-11 05:55:54', '2024-07-11 05:55:54'),
(140, 1, 'Product ID: 163', 90, 0, -90, 1, 0, 163, '2024-07-11 05:59:07', '2024-07-11 05:59:07'),
(141, 1, 'Product ID: 164', 220, 0, -220, 1, 0, 164, '2024-07-11 06:00:40', '2024-07-11 06:00:40'),
(142, 1, 'Product ID: 165', 290, 0, -290, 1, 0, 165, '2024-07-11 06:02:48', '2024-07-11 06:02:48'),
(143, 1, 'Product ID: 166', 340, 0, -340, 1, 0, 166, '2024-07-11 06:04:47', '2024-07-11 06:04:47'),
(144, 1, 'Product ID: 167', 530, 0, -530, 1, 0, 167, '2024-07-11 06:06:24', '2024-07-11 06:06:24'),
(145, 1, 'Product ID: 168', 120, 0, -120, 1, 0, 168, '2024-07-11 06:08:09', '2024-07-11 06:08:09'),
(146, 1, 'Product ID: 169', 100, 0, -100, 1, 0, 169, '2024-07-11 06:10:03', '2024-07-11 06:10:03'),
(147, 1, 'Product ID: 170', 2200, 0, -2200, 1, 0, 170, '2024-07-11 06:11:32', '2024-07-11 06:11:32'),
(148, 1, 'Product ID: 171', 822, 0, -822, 1, 0, 171, '2024-07-11 06:15:52', '2024-07-11 06:15:52'),
(149, 1, 'Product ID: 172', 2200, 0, -2200, 1, 0, 172, '2024-07-11 06:20:12', '2024-07-11 06:20:12'),
(150, 1, 'Product ID: 173', 2500, 0, -2500, 1, 0, 173, '2024-07-11 06:24:54', '2024-07-11 06:24:54'),
(151, 1, 'Product ID: 174', 350, 0, -350, 1, 0, 174, '2024-07-11 06:29:01', '2024-07-11 06:29:01'),
(152, 1, 'Product ID: 175', 300, 0, -300, 1, 0, 175, '2024-07-11 06:41:12', '2024-07-11 06:41:12'),
(153, 1, 'Product ID: 176', 1600, 0, -1600, 1, 0, 176, '2024-07-11 06:46:18', '2024-07-11 06:46:18'),
(154, 1, 'Product ID: 177', 3500, 0, -3500, 1, 0, 177, '2024-07-11 06:49:06', '2024-07-11 06:49:06'),
(155, 1, 'Product ID: 178', 3500, 0, -3500, 1, 0, 178, '2024-07-11 07:51:32', '2024-07-11 07:51:32'),
(156, 1, 'Product ID: 179', 3500, 0, -3500, 1, 0, 179, '2024-07-11 07:54:28', '2024-07-11 07:54:28'),
(157, 1, 'Product ID: 180', 2000, 0, -2000, 1, 0, 180, '2024-07-11 07:59:27', '2024-07-11 07:59:27'),
(158, 1, 'Product ID: 181', 3500, 0, -3500, 1, 0, 181, '2024-07-11 08:03:30', '2024-07-11 08:03:30'),
(159, 1, 'Product ID: 182', 3500, 0, -3500, 1, 0, 182, '2024-07-11 08:05:25', '2024-07-11 08:05:25'),
(160, 1, 'Product ID: 183', 2000, 0, -2000, 1, 0, 183, '2024-07-11 08:32:52', '2024-07-11 08:32:52'),
(161, 1, 'Product ID: 184', 300, 0, -300, 1, 0, 184, '2024-07-11 08:32:55', '2024-07-11 08:32:55'),
(162, 1, 'Product ID: 185', 230, 0, -230, 1, 0, 185, '2024-07-11 08:34:48', '2024-07-11 08:34:48'),
(163, 1, 'Product ID: 186', 255, 0, -255, 1, 0, 186, '2024-07-11 08:34:59', '2024-07-11 08:34:59'),
(164, 1, 'Product ID: 187', 200, 0, -200, 1, 0, 187, '2024-07-11 08:35:57', '2024-07-11 08:35:57'),
(165, 1, 'Product ID: 188', 3890, 0, -3890, 1, 0, 188, '2024-07-11 08:37:11', '2024-07-11 08:37:11'),
(166, 1, 'Product ID: 189', 60, 0, -60, 1, 0, 189, '2024-07-11 08:40:05', '2024-07-11 08:40:05'),
(167, 1, 'Product ID: 190', 500, 0, -500, 1, 0, 190, '2024-07-11 08:41:23', '2024-07-11 08:41:23'),
(168, 1, 'Product ID: 191', 350, 0, -350, 1, 0, 191, '2024-07-11 08:41:56', '2024-07-11 08:41:56'),
(169, 1, 'Product ID: 192', 200, 0, -200, 1, 0, 192, '2024-07-11 08:43:27', '2024-07-11 08:43:27'),
(170, 1, 'Product ID: 193', 450, 0, -450, 1, 0, 193, '2024-07-11 08:43:49', '2024-07-11 08:43:49'),
(171, 1, 'Product ID: 194', 1200, 0, -1200, 1, 0, 194, '2024-07-11 08:43:56', '2024-07-11 08:43:56'),
(172, 1, 'Product ID: 195', 320, 0, -320, 1, 0, 195, '2024-07-11 08:45:38', '2024-07-11 08:45:38'),
(173, 1, 'Product ID: 196', 100, 0, -100, 1, 0, 196, '2024-07-11 08:47:45', '2024-07-11 08:47:45'),
(174, 1, 'Product ID: 197', 99, 0, -99, 1, 0, 197, '2024-07-11 08:48:08', '2024-07-11 08:48:08'),
(175, 1, 'Product ID: 198', 200, 0, -200, 1, 0, 198, '2024-07-11 08:48:52', '2024-07-11 08:48:52'),
(176, 1, 'Product ID: 199', 2000, 0, -2000, 1, 0, 199, '2024-07-11 08:49:52', '2024-07-11 08:49:52'),
(177, 1, 'Product ID: 200', 80, 0, -80, 1, 0, 200, '2024-07-11 08:50:05', '2024-07-11 08:50:05'),
(178, 1, 'Product ID: 201', 500, 0, -500, 1, 0, 201, '2024-07-11 08:50:57', '2024-07-11 08:50:57'),
(179, 2, 'Order ID: 33', 0, 120, 120, 2, 33, 0, '2024-08-10 04:52:07', '2024-08-10 04:52:07'),
(180, 1, 'Product ID: 202', 50, 0, -50, 1, 0, 202, '2024-08-10 06:07:51', '2024-08-10 06:07:51'),
(181, 2, 'Order ID: 34', 0, 990, 990, 2, 34, 0, '2024-08-10 06:08:14', '2024-08-10 06:08:14'),
(182, 2, 'Order ID: 35', 0, 1980, 2970, 2, 35, 0, '2024-08-10 08:25:49', '2024-08-10 08:25:49'),
(183, 2, 'Order ID: 36', 0, 575, 3545, 2, 36, 0, '2024-08-10 08:26:57', '2024-08-10 08:26:57'),
(184, 2, 'Order ID: 37', 0, 560, 4105, 2, 37, 0, '2025-05-18 10:43:25', '2025-05-18 10:43:25'),
(185, 1, 'Product ID: 203', 126, 0, -126, 1, 0, 203, '2025-05-25 11:14:30', '2025-05-25 11:14:30'),
(186, 1, 'Product ID: 204', 759, 0, -759, 1, 0, 204, '2025-05-25 11:35:45', '2025-05-25 11:35:45'),
(187, 2, 'Order ID: 38', 0, 1120, 361, 2, 38, 0, '2025-05-28 10:36:46', '2025-05-28 10:36:46'),
(188, 2, 'Order ID: 39', 0, 270, 631, 2, 39, 0, '2025-05-28 10:38:46', '2025-05-28 10:38:46'),
(189, 2, 'Order ID: 40', 0, 270, 901, 2, 40, 0, '2025-05-28 10:45:54', '2025-05-28 10:45:54'),
(190, 2, 'Order ID: 41', 0, 630, 1531, 2, 41, 0, '2025-05-28 10:46:49', '2025-05-28 10:46:49'),
(191, 2, 'Order ID: 42', 0, 334, 1865, 2, 42, 0, '2025-05-28 10:48:06', '2025-05-28 10:48:06'),
(192, 2, 'Order ID: 43', 0, 1950, 3815, 2, 43, 0, '2025-05-28 10:48:50', '2025-05-28 10:48:50'),
(193, 2, 'Order ID: 44', 0, 860, 4675, 2, 44, 0, '2025-05-29 05:23:08', '2025-05-29 05:23:08'),
(194, 1, 'Product ID: 205', 326, 0, -326, 1, 0, 205, '2025-05-29 05:47:01', '2025-05-29 05:47:01'),
(195, 2, 'Order ID: 45', 0, 860, 534, 2, 45, 0, '2025-05-29 05:51:57', '2025-05-29 05:51:57'),
(196, 2, 'Order ID: 46', 0, 1050, 1584, 2, 46, 0, '2025-05-29 09:02:00', '2025-05-29 09:02:00'),
(197, 2, 'Order ID: 47', 0, 560, 2144, 2, 47, 0, '2025-05-29 09:06:59', '2025-05-29 09:06:59'),
(198, 2, 'Order ID: 48', 0, 150, 2294, 2, 48, 0, '2025-07-10 05:35:38', '2025-07-10 05:35:38'),
(199, 2, 'Order ID: 49', 0, 980, 3274, 2, 49, 0, '2025-07-10 06:22:11', '2025-07-10 06:22:11'),
(200, 2, 'Order ID: 50', 0, 264, 3538, 2, 50, 0, '2025-07-10 08:30:51', '2025-07-10 08:30:51'),
(201, 2, 'Order ID: 51', 0, 1880, 5418, 2, 51, 0, '2025-07-14 14:03:08', '2025-07-14 14:03:08'),
(202, 2, 'Order ID: 52', 0, 370, 5788, 2, 52, 0, '2025-07-24 15:34:34', '2025-07-24 15:34:34'),
(203, 2, 'Order ID: 53', 0, 2000, 7788, 2, 53, 0, '2025-07-28 09:59:24', '2025-07-28 09:59:24'),
(204, 2, 'Order ID: 54', 0, 1880, 9668, 2, 54, 0, '2025-08-10 12:38:38', '2025-08-10 12:38:38'),
(205, 2, 'Order ID: 55', 0, 784, 10452, 2, 55, 0, '2025-10-15 17:52:31', '2025-10-15 17:52:31'),
(206, 1, 'Product ID: 206', 257, 0, -257, 1, 0, 206, '2025-12-11 12:14:26', '2025-12-11 12:14:26'),
(207, 2, 'Order ID: 68', 0, 440, 183, 2, 68, 0, '2025-12-18 09:58:35', '2025-12-18 09:58:35'),
(208, 1, 'Product ID: 224', 200, 0, -200, 1, 0, 224, '2026-01-25 03:20:18', '2026-01-25 03:20:18'),
(209, 1, 'Product ID: 225', 3000, 0, -3000, 1, 0, 225, '2026-01-25 03:22:35', '2026-01-25 03:22:35'),
(210, 1, 'Product ID: 226', 999, 0, -999, 1, 0, 226, '2026-01-27 05:13:33', '2026-01-27 05:13:33'),
(211, 1, 'Product ID: 227', 20, 0, -20, 1, 0, 227, '2026-02-18 08:11:58', '2026-02-18 08:11:58'),
(212, 1, 'Product ID: 228', 220, 0, -220, 1, 0, 228, '2026-02-18 20:37:06', '2026-02-18 20:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `account_settings`
--

CREATE TABLE `account_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_inside_dhaka` decimal(8,2) NOT NULL DEFAULT 70.00,
  `shipping_outside_dhaka` decimal(8,2) NOT NULL DEFAULT 130.00,
  `shipping_all_area` decimal(8,2) NOT NULL DEFAULT 180.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_settings`
--

INSERT INTO `account_settings` (`id`, `shipping_inside_dhaka`, `shipping_outside_dhaka`, `shipping_all_area`, `created_at`, `updated_at`) VALUES
(1, 80.00, 150.00, 190.00, '2026-01-25 04:14:51', '2026-01-25 04:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `division_name` varchar(50) DEFAULT NULL,
  `district_name` varchar(50) DEFAULT NULL,
  `upazilla_name` varchar(50) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazilla_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Default, 0=>Not Default',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `division_name`, `district_name`, `upazilla_name`, `division_id`, `district_id`, `upazilla_id`, `address`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(112, 1, NULL, NULL, NULL, NULL, 2, 6, 52, 'aa', 0, 1, '2022-09-06 18:18:50', '2022-11-28 02:04:06'),
(116, 1, NULL, NULL, NULL, NULL, 2, 11, 101, 'Lama', 1, 1, '2022-09-10 02:00:53', '2022-11-28 02:04:06'),
(159, 3, NULL, NULL, NULL, NULL, 1, 52, 369, 'dsd', 0, 1, '2022-12-16 20:28:11', '2022-12-16 20:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `affiliate_member_id` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `referral_code` varchar(191) DEFAULT NULL,
  `total_earning` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `password` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `name`, `affiliate_member_id`, `email`, `phone`, `address`, `bio`, `profile_image`, `referral_code`, `total_earning`, `balance`, `password`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Md Abu Taher', 'UPR-98FMY', 'mdabutaher4854@gmail.com', '01645787749', 'Dhobaura,Mymensingh', NULL, 'upload/affiliate/1837234936036218.png', 'OHBDCXXJW', 250.00, 0.00, '$2y$10$76y.6leBgFOLXpo3T4T9NusHuQ1kWmwLSUoAzaGyCNz7QIlzfw.gC', 1, '2025-07-10 05:02:51', '2025-07-12 04:24:33'),
(6, 'Mahmudul Hasan', 'AFF-18MSO', 'ttahsinn74@gmail.com', '01953540808', NULL, NULL, 'upload/affiliate/1837608291278586.png', 'OHBDN17RTD', 36.00, 0.00, '$2y$10$HvpJlRnGECksJtbGdDvfaOL9fg3JnEutW02vqW7PElfpoempDKJ.O', 1, '2025-07-14 13:57:12', '2025-07-14 14:06:19'),
(7, 'ZELANI MOHAMMAD ETTESAF', 'UPR-944PO', 'zilaneramim@gmail.com', '01837582222', NULL, NULL, 'upload/affiliate/1838874336407298.jpg', 'OHBDGDKD8J', 0.00, 0.00, '$2y$10$W.j4W8bvGyxIDr/W2HLT6.e8vcEMxHEYPkV79ftQWj/JCC.wjHCbe', 1, '2025-07-28 13:20:26', '2025-07-28 13:20:26'),
(8, 'Md Azizul Haque', 'UPR-17SFM', 'azizulbd270@gmail.com', '01568423817', 'Ghatail, Tangail', NULL, 'uploads/avatars/1753701405_68875c1df0574.jpg', 'OHBD7F1ZY', 0.00, 0.00, '$2y$10$dY1IM4bfS37GmN6FyRy/yOzjR4qvSazh1Q4v9K2I2GgkA1ZwHc.Bi', 1, '2025-07-28 16:37:40', '2025-07-28 17:16:45'),
(9, 'Tanzila Akter', 'AFF-622BK', 'tanzila123tabassum@gmail.com', '01628974042', NULL, NULL, 'upload/affiliate/1838890007737987.jpg', 'OHBDGLPC66', 0.00, 0.00, '$2y$10$9XrSSchuw15uVYwljP9oA.QlhQZThrfuBzjunP3x7M2kkGGjND/0K', 1, '2025-07-28 17:29:31', '2025-07-28 17:29:31'),
(10, 'Md Mehedi Masud', 'UPR-70KBE', 'mdmehedixy@gmail.com', '01675010121', NULL, NULL, 'upload/affiliate/1838891488515311.jpg', 'OHBD0XGQK', 0.00, 0.00, '$2y$10$.bNd/4D9lylaE5Fa/2jSbO5icX0Nc0UVHIEA.mekzQ1CIcUInbiyW', 1, '2025-07-28 17:53:04', '2025-07-28 17:53:04'),
(11, 'Shahadat Hossain', 'UPR-129OJ', 'sihad20022@gmail.com', '01735812963', NULL, NULL, 'upload/affiliate/1838895718310813.jpg', 'OHBDSUGDPF', 0.00, 0.00, '$2y$10$yx8spHzGFl0QWr5LC9576uGAhQ28dzSxxg2Lmzmk9VjPv7hGWHOs2', 1, '2025-07-28 19:00:18', '2025-07-28 19:00:18'),
(12, 'Md Rokibul Islam', 'UPR-989DL', 'mdrokibul284@gmail.com', '01309903716', NULL, NULL, 'upload/affiliate/1838906994988214.jpg', 'OHBDPBSIK', 0.00, 0.00, '$2y$10$.vccczG9OfyF6FL6nsOxyOciSoFbGXxJHwy.F2gh8SWp89trvsNXu', 1, '2025-07-28 21:59:32', '2025-07-28 21:59:32'),
(13, 'Sadia Rahman', 'AFF-63DY4', 'sadiarahmansova1995@gmail.com', '01811146860', NULL, NULL, 'upload/affiliate/1838953930360441.jpg', 'OHBDNGPTIH', 0.00, 0.00, '$2y$10$d.hIcyADS7jQHHwnXlv79uwhsl0yUa2CyHPEkai.O6YQ4OtwL1qFK', 1, '2025-07-29 10:25:33', '2025-07-29 10:25:33'),
(14, 'আখি আক্তার', 'Ak1234', 'akhimst511@gmail.com', '01789799761', NULL, NULL, '', 'OHBDEYJ0B', 0.00, 0.00, '$2y$10$1Rog0eGAX4MVvgWb.kvHl.k5shXGnBazQfrr103QSRqorVofd7Avy', 1, '2025-07-30 00:53:36', '2025-07-30 00:53:36'),
(15, 'Tahmidul Islam Tanim', 'UPR-415S0', 'tanimtahmidul@gmail.com', '01992111266', NULL, NULL, 'upload/affiliate/1839067498616405.jfif', 'OHBDYDLBIH', 0.00, 0.00, '$2y$10$wM.pjbqEw8pSjNo/uG4o5ediXVq0.t1o4mAtBc9eWqGG48467aBOu', 1, '2025-07-30 16:30:40', '2025-07-30 16:30:40'),
(16, 'Kaniz', 'AFF-33VKA', 'shehezadi@gmail.com', '01708900098', NULL, NULL, 'upload/affiliate/1839073656326555.jpg', 'OHBDCZJWOR', 0.00, 0.00, '$2y$10$4lqq1CvnmEqSvYUdMLOpfe5r3lXg8LjLkj.tAd3fffB.RESK/3xwu', 1, '2025-07-30 18:08:32', '2025-07-30 18:08:32'),
(17, 'Kaniz Fatema', 'AFF-33VKA', 'hijabiqueenkaniz@gmail.com', '01708900098', NULL, NULL, '', 'OHBDVOJQKW', 0.00, 0.00, '$2y$10$tS7.LOnmzJsN3lf.LjVVIeqj3DmIpGaj6cO8G/6/w9tQxCyeZeZM6', 1, '2025-07-30 18:14:22', '2025-07-30 18:14:22'),
(18, 'Kaniz Fatema', 'AFF-33VKA', 'sylhetykaniz@gmail.com', '01708900098', NULL, NULL, 'upload/affiliate/1839074440487425.jpg', 'OHBDQOKD1', 0.00, 0.00, '$2y$10$wkMnt.T9F8jScEoG55XmWewPatfe./tzxZYs06UJ/mgmXwBXtnqAK', 1, '2025-07-30 18:21:00', '2025-07-30 18:21:00'),
(19, 'Shaila alam', 'AFF-92MA6', 'shaylaalom9@gmail.com', '01670064563', NULL, NULL, 'upload/affiliate/1839253363445242.jpg', 'OHBD3IHVUX', 0.00, 0.00, '$2y$10$r8tVWXbx/awgplX09d/YSuUMgO9AC7HxCRY5eEJiUEOagOLPDucFe', 1, '2025-08-01 17:44:55', '2025-08-01 17:44:55'),
(20, 'Nafis Iqbal', 'UPR-23YE6', 'nafisstudent329@gmail.com', '01304423976', NULL, NULL, 'upload/affiliate/1839402335114664.jpg', 'OHBDD9GLF', 0.00, 0.00, '$2y$10$l2vwdXuOncPVZrgw.egoDO6MWW.RuAQVAZmxtI.uDr33skukzQhbm', 1, '2025-08-03 09:12:45', '2025-08-03 09:12:45'),
(21, 'Tasnim', 'AFF-97S0W', 'anjumtasnim725@gmail.com', '01829877208', NULL, NULL, 'upload/affiliate/1839536169492667.jpg', 'OHBDTFH0XY', 0.00, 0.00, '$2y$10$VKHEKJ9S38KtNvEP1q4Tze5U74hRJIQvK73O5rcnBUET5DRFDNViW', 1, '2025-08-04 20:40:00', '2025-08-04 20:40:00'),
(22, 'Md. Shirajul Islam', 'UPR-54Y1M', 'siisamoti@gmail.com', '01725714552', NULL, NULL, 'upload/affiliate/1840067798865747.jpg', 'OHBDNEIMA', 0.00, 0.00, '$2y$10$1OFM.HVmDvuGSIYoGipI7.qXIhL4nBrATe0jSVaIc44u4Fc1jpZZy', 1, '2025-08-10 17:30:01', '2025-08-10 17:30:01'),
(23, 'Nafis Iqbal', 'UPR-23YE6', 'nafisstudent2004@gmail.com', '01304423976', NULL, NULL, '', 'OHBDFOW2AG', 0.00, 0.00, '$2y$10$.ynP4HLA5m/cWG8Q9h6TM.4ACdyYpM22w7QPMFqpoofi4/fCej36O', 1, '2025-08-11 10:44:06', '2025-08-11 10:44:06'),
(24, 'Abu Bashar Md. Ahashanuddoula', 'UPR-10ISG', 'ahashan2009@gmail.com', '01730920593', NULL, NULL, 'upload/affiliate/1840137235715536.jpg', 'OHBDW5BMV', 0.00, 0.00, '$2y$10$IshacQbIFQi495GpIb9I4.9x7Ny5nWsmQHJtnMq0xrXSixGOpmaCq', 1, '2025-08-11 11:53:41', '2025-08-11 11:53:41'),
(25, 'Fatema Tunarjina', 'AFF-648LN', 'ridwanturna3@gmail.com', '01314924121', NULL, NULL, '', 'OHBDXVVTC', 0.00, 0.00, '$2y$10$oOsJZkFGyiNyflflRLBNteWryTKihRHi.BIIV5qcZt3/cxvDve7.O', 1, '2025-08-11 13:16:29', '2025-08-11 13:16:29'),
(26, 'Md.Sejaynul (Sajeb)', 'UPR-24WZS', 'sejayanultech@gmail.com', '01710815200', NULL, NULL, '', 'OHBDAUOUA', 0.00, 0.00, '$2y$10$T0XPIKSUHIxneIJEZ/77eOPx4JDkfoAaL17lg/.HnX4g9WR.SLE12', 1, '2025-08-17 20:20:29', '2025-08-17 20:20:29'),
(27, 'Lipia Khatun', 'AFF-9859H', 'mrslipiakhatun@gmail.com', '01745988424', NULL, NULL, '', 'OHBDFC4XR', 0.00, 0.00, '$2y$10$kh7YKrQBvmQxyeFIY5n1se0ewmb4ZwPU3CMZA2JoNUfKHYdZc9/K6', 1, '2025-08-17 21:04:44', '2025-08-17 21:04:44'),
(28, 'Md. Samser Alam', 'UPR-10QNG', 'alamsamser2025@gmail.com', '01316600192', NULL, NULL, 'upload/affiliate/1840720598911536.jpg', 'OHBDBRXCG', 0.00, 0.00, '$2y$10$1ZTjDo7Ua4VVuVb4sRHQkOWgyXYcZMlmcgDp8fUqZ1cZAI2yEnmL6', 1, '2025-08-17 22:26:00', '2025-08-17 22:26:00'),
(29, 'Jubaidul Hasan', 'UPR-10DYZ', 'mdmiskat3017@gmail.com', '01603066450', NULL, NULL, '', 'OHBDP9JYIX', 0.00, 0.00, '$2y$10$QFNfWOwiaIoBdMj4LYP7ouA4wkGBxv6cZJBcFIJPGGAOdKoIWjhjW', 1, '2025-08-17 23:02:59', '2025-08-17 23:02:59'),
(30, 'Marzia Hossain', 'AFF-42UPJ', 'masnunsheikh123@gmail.com', '01781836403', NULL, NULL, '', 'OHBDMM6IC', 0.00, 0.00, '$2y$10$b2XXc0LNFeZuVT6WCaNa7Oqv/oNiWO2JbzF16CumHn9a/k3x6FsM6', 1, '2025-08-18 16:20:01', '2025-08-18 16:20:01'),
(31, 'Most Ashrafun Nessa', '67251469', 'Ashrafunnessa750@gmail.com', '01302553824', NULL, NULL, 'upload/affiliate/1840789067342920.jpg', 'OHBDXYVAEM', 0.00, 0.00, '$2y$10$7SteXnqJPpuPZk85my8f6eQrFFz7fzDEZ0VCx8VZqqTTDMTbAb.ti', 1, '2025-08-18 16:34:16', '2025-08-18 16:34:16'),
(32, 'Lamiya Afrin Anika', 'AFF-78MBK', 'anikaafrin81@gmail.com', '01626531557', NULL, NULL, '', 'OHBDO2L1D', 0.00, 0.00, '$2y$10$dndLvKgxJ4HAG5kZGrZAcOaCFGLn/gv.HrrTszEQEJyodILMFJ8ce', 1, '2025-08-18 17:52:34', '2025-08-18 17:52:34'),
(33, 'Nazma alo', 'AFF-60NQF', 'alonazma134@gmail.com', '01725600134', NULL, NULL, '', 'OHBDQQ2V5Q', 0.00, 0.00, '$2y$10$g4UApNJJvDpFnGjT5JH0XesYO4HXz/bo4UasFTifZrY5oSsuEYZma', 1, '2025-08-18 19:32:56', '2025-08-18 19:32:56'),
(34, 'Md.Mizanur Rhaman', 'UPR-53WTP', 'mrmizanurrhaman3@gmail.com', '01840309735', NULL, NULL, 'upload/affiliate/1840869691237460.jpg', 'OHBD0DZ9IA', 0.00, 0.00, '$2y$10$C9C19Vvb4lpS.D5hL2I8HOuU.2FKIIaLlktxOS0pHQF2pWwyn/zT.', 1, '2025-08-19 13:55:45', '2025-08-19 13:55:45'),
(35, 'Mahdia begum', 'AFF-24L8A', 'mahdiamahi3052@gmail.com', '01794564686', NULL, NULL, '', 'OHBDPWRI0', 0.00, 0.00, '$2y$10$HiNvo5WQP0Gj3ru3lJE0EuxiRvK0g/yaz8I2xnJxqM8TqC88p.phq', 1, '2025-08-19 18:17:12', '2025-08-19 18:17:12'),
(36, 'Rabeya', 'AFF-61VPB', 'rabeya.hridi04@gmail.com', '01731819558', NULL, NULL, 'upload/affiliate/1840888993905365.jpg', 'OHBDHYL8LV', 0.00, 0.00, '$2y$10$1nqXXFbZra4r9qIo/RZXaeMwJeWUAiGTi3C/m.M3ItCkEhsoPUAAK', 1, '2025-08-19 19:02:34', '2025-08-19 19:02:34'),
(37, 'Md Sejayanul Haque Sajeb', 'UPR-24WZS', 'sejayanul85@gmail.com', '01710815200', NULL, NULL, '', 'OHBDUTR6I', 0.00, 0.00, '$2y$10$bWn3nS9dM/BylnwQocTmYO5MbeN67r6hVi2Axi/6MoHdjYDXPYgru', 1, '2025-08-19 22:40:38', '2025-08-19 22:40:38'),
(38, 'riyan chowdhury', 'UPR-248ZZ', 'chowdhuryriyan203@gmail.com', '01871127848', NULL, NULL, 'upload/affiliate/1840958273674038.png', 'OHBDP9P5YH', 0.00, 0.00, '$2y$10$55y84XRlgeImP4zN2HqOQOrAWeGCpXSRDQuWXvI/7fFjQgcAjCLWy', 1, '2025-08-20 13:23:44', '2025-08-20 13:23:44'),
(39, 'riyan chowdhury', 'UPR-248ZZ', 'hmraihan441@gmail.com', '01871127848', NULL, NULL, '', 'OHBDBT5EF', 0.00, 0.00, '$2y$10$d8JJUA2CIKbbRp5Dtedpt.LaUTbWcp5wFB0uvytthxjplq7napIhi', 1, '2025-08-20 13:24:46', '2025-08-20 13:24:46'),
(40, 'Bijoy Kumar Roy', 'UPR-56ADU', 'bkr895028@gmail.com', '01734895028', NULL, NULL, 'upload/affiliate/1841068614620672.jpg', 'OHBDFMEUD', 0.00, 0.00, '$2y$10$D.0p/9DWnPcirFKn64bVZOxlntaszLiUS7xoHjtvDO56cz3UzurJG', 1, '2025-08-21 18:37:33', '2025-08-21 18:37:33'),
(41, 'Md.yousuf ali', 'UPR-85XLN', 'Jibonyousuf77@gmail.com', '01922917689', NULL, NULL, 'upload/affiliate/1841236870906480.jpg', 'OHBD1RDIW', 0.00, 0.00, '$2y$10$nkozAcg7fDStAOKNqc8Ie.gmxU200bl35fOTTsea2SntNlQhD5Ywe', 1, '2025-08-23 15:11:55', '2025-08-23 15:11:55'),
(42, 'MD.Rakib Hossen', 'UPR-57MWR', 'rakib162008@gmail.com', '01603969183', NULL, NULL, 'upload/affiliate/1841317099646455.jpg', 'OHBDYOJV0Q', 0.00, 0.00, '$2y$10$CkJc8sUIL1dX8tZQnStBpO9tOz04xjErMdxH0BZI5DjGOS5v7IeC2', 1, '2025-08-24 12:27:07', '2025-08-24 12:27:07'),
(43, 'Md. Anwarul Islam Khan', 'UPR-20YOW', 'anwar646744@gmail.com', '01712646744', NULL, NULL, 'upload/affiliate/1841625546906524.jpeg', 'OHBDSZFUKE', 0.00, 0.00, '$2y$10$t2BiElIlj3jZVImvn/M6WOLgoA9ufUm2gX5pp3gJZp8Dtvg0P0z/S', 1, '2025-08-27 22:09:45', '2025-08-27 22:09:45'),
(44, 'MD Sakib Al hasan', 'UPR-56BUW', 'saleha33sakib33@gmail.com', '01965734512', NULL, NULL, 'upload/affiliate/1841968650542182.jpeg', 'OHBDJS1QGS', 0.00, 0.00, '$2y$10$zwJd9PJx3lI81z.L1HF8e.AniGBrBPxlhSdsUaShXF.W9TH5QJ0a2', 1, '2025-08-31 17:03:14', '2025-08-31 17:03:14'),
(45, 'Mst.Bilkis Parvin', 'AFF-59ID5', 'bilkisparvin48@gmail.com', '01517804321', NULL, NULL, 'upload/affiliate/1842064321256030.jpg', 'OHBDTB6VV', 0.00, 0.00, '$2y$10$.ZhCrbwoxjBHc6Rng6GEie4.2QRfoMXiV2yDIDREaFfSsLsg8EGz.', 1, '2025-09-01 18:23:53', '2025-09-01 18:23:53'),
(46, 'Tahmina Zaman', 'AFF-71FLD', 'hasibatahmina2022@gmail.com', '01633085903', NULL, NULL, 'upload/affiliate/1842160956951245.jpg', 'OHBDGMYYB', 0.00, 0.00, '$2y$10$BCTmdTgj5Gk18KT5GyCuBe/TS9EUKX15N7jrS2xbP77kYbZu.LDcy', 1, '2025-09-02 19:59:52', '2025-09-02 19:59:52'),
(47, 'Mst.Hafiza Khatun', 'AFF-3977I', 'hiyaakterhafiza357@gmail.com', '01782575519', NULL, NULL, 'upload/affiliate/1843309402171456.jpg', 'OHBDY0DQNQ', 0.00, 0.00, '$2y$10$Iu6plgwZAVIkKgz5E9dNHuaY1EazoRf7NlglkyJ3kL9IaA3Rqo8cS', 1, '2025-09-15 12:13:55', '2025-09-15 12:13:55'),
(48, 'Durjoy Chowdhury', 'UPR-43DAV', 'kc0462496@gmail.com', '01880394663', NULL, NULL, 'upload/affiliate/1843312345773745.png', 'OHBDFFRDY', 0.00, 0.00, '$2y$10$Zrtmwg4ug.OqwGo2fIYwuu0reaIaA0CWYJgLRl6zefQuU0yCvvWEq', 1, '2025-09-15 13:00:42', '2025-09-15 13:00:42'),
(49, 'Humaira Nesar Nihamoni', 'AFF-49G6N', 'humairaneeha5@gmail.com', '01625747817', NULL, NULL, 'upload/affiliate/1843326889434828.png', 'OHBDKQ4DG', 0.00, 0.00, '$2y$10$A09D/Iv0QqysdcnrXnI/le.C.P6yDyA3.Oz/dpyTwxJBvxqDxMOn.', 1, '2025-09-15 16:51:52', '2025-09-15 16:51:52'),
(50, 'Suraiya Rahman Urmi', 'AFF-821QH', 'urmi113737@gmail.com', '01758113737', NULL, NULL, 'upload/affiliate/1843396134151746.jpg', 'OHBDGAFFQB', 0.00, 0.00, '$2y$10$axQcQiIMRDsvnqqL4E/kGOPvujF.gF5wRzGL3sN18JAQyUpuKrEui', 1, '2025-09-16 11:12:29', '2025-09-16 11:12:29'),
(51, 'Manjurin Afroz Hasu', 'AFF-78OOI', 'hasuafroj@gmail.com', '01345668495', NULL, NULL, 'upload/affiliate/1843410908389931.jpg', 'OHBDJMA0K', 0.00, 0.00, '$2y$10$HVkVlBdnzUxGLw4.duBWSOJRD1E29T1G.YnaH18GP33sqXGfFLdeq', 1, '2025-09-16 15:07:19', '2025-09-16 15:07:19'),
(52, 'Aney Khatun', 'AFF-45I4A', 'aneykhatun25@gmail.com', '01602480046', NULL, NULL, 'upload/affiliate/1843442958598502.jpg', 'OHBDXBGXSV', 0.00, 0.00, '$2y$10$FMo1e7ZcnhZ3WeupX9y2TuJrGhvqNxj3eIAEUlWD0VusgYK6Cnwgu', 1, '2025-09-16 23:36:44', '2025-09-16 23:36:44'),
(53, 'Mst fatama tush johora', 'AFF-90ZCO', 'fatamatushjohora@gmail.com', '01325818664', NULL, NULL, 'upload/affiliate/1843514671537178.jpg', 'OHBDPMDP3', 0.00, 0.00, '$2y$10$4mC.qYwB7IFbkz5UsZOTlem.23WCt8UBxAs2cmBp.wNRklYy.dp4C', 1, '2025-09-17 18:36:35', '2025-09-17 18:36:35'),
(54, 'Sayma lslam', 'AFF-78FLS', 'isayma583@gmail.com', '01300328615', NULL, NULL, 'upload/affiliate/1843591900623538.jpg', 'OHBDWDHEI', 0.00, 0.00, '$2y$10$HASy7AjRgklYiFEHr6GFrOqRLKmY2xjM3ttRT7BdX7/8HFovIOXGu', 1, '2025-09-18 15:04:06', '2025-09-18 15:04:06'),
(55, 'Md. Rafiqul Alam', 'UPR-43NRD', 'alam.r57@gmail.com', '01715256762', NULL, NULL, '', 'OHBDFYPHV', 0.00, 0.00, '$2y$10$afcVL2XWjW9Mie3ql1mw7OLYhxIxXE80pNFN9vjPyKDIeDr75VS8y', 1, '2025-09-18 21:58:17', '2025-09-18 21:58:17'),
(56, 'nusrat jahan', '017972592', 'atikaafra051@gmail.com', '01797259262', NULL, NULL, '', 'OHBDY89YS', 0.00, 0.00, '$2y$10$01/wJJoyrMDIIWugoFM5aO887cbmBPuPWDTxdpiV10s7wD5N55dOa', 1, '2025-10-05 15:21:38', '2025-10-05 15:21:38'),
(57, 'nusrat jahan', 'AFF-772XV', 'mdsaffuandhali@gmail.com', '01797259262', NULL, NULL, '', 'OHBD3VYUCO', 0.00, 0.00, '$2y$10$Gmju5EM5dN.0sSSmFh234eLE69XuLK2U/t/iBicvONaQzY5nMVQ0m', 1, '2025-10-05 15:27:42', '2025-10-05 15:27:42'),
(58, 'Md habib khan', 'UPR-21B8V', 'mdhabibkhansatro@gmail.com', '01790429945', NULL, NULL, '', 'OHBDXJEQC', 0.00, 0.00, '$2y$10$Jw61Nnho6qcRrFRtBkpqa.rC.fNvjNrplAn7dm5v4qUdzrd7aDLnS', 1, '2025-10-20 14:36:38', '2025-10-20 14:36:38'),
(59, 'Masuma Akther', 'AFF-95WRJ', 'aktermasuma905@gmail.com', '01840173474', NULL, NULL, '', 'OHBDZGUCP', 0.00, 0.00, '$2y$10$JitZvYmSI0M5WpaTpsk6a.2oGHGlYlfWheUuKWxPqcKqie..EulDG', 1, '2025-10-20 16:03:48', '2025-10-20 16:03:48'),
(60, 'Julakha Akter', 'AFF-22DI6', 'julakha326@gmail.com', '01889132638', NULL, NULL, 'upload/affiliate/1846506745353793.jpg', 'OHBD24UL32', 0.00, 0.00, '$2y$10$TShGCsH8TaKRs001INgISepUJaADbZPeq4gswRz1MGC174/5bMduS', 1, '2025-10-20 19:14:19', '2025-10-20 19:14:19'),
(61, 'Sumaiya Sumu', 'AFF-953IU', 'sumuhasan51@gmail.com', '01842779643', NULL, NULL, 'upload/affiliate/1846507856972286.jpg', 'OHBD5AQSYW', 0.00, 0.00, '$2y$10$FLXf7alH4IjY2IQAmd40z.Lqd5/QWwvjOtLI18QUFmIpKwCt1yU9O', 1, '2025-10-20 19:31:59', '2025-10-20 19:31:59'),
(62, 'HIMA AKTER', 'AFF-24DJF', 'himakhan9000@gmail.com', '01768697314', NULL, NULL, 'upload/affiliate/1846517911760747.jpg', 'OHBDA8EZUA', 0.00, 0.00, '$2y$10$Ah1Ei6q4p.8MmSs8G.JuLub4DYTq3HlsS10.9hYWOv/5lsFQmKnki', 1, '2025-10-20 22:11:48', '2025-10-20 22:11:48'),
(63, 'Md Suja Uddin', 'UPR-35003', 'sujat6160@gmail.com', '01612986160', NULL, NULL, '', 'OHBDI3LJES', 0.00, 0.00, '$2y$10$p/93JfXx96VIA0EnMvp5TORsH.8slkRmjwtGmCHflzw3KKgoLPxRG', 1, '2025-10-21 10:45:06', '2025-10-21 10:45:06'),
(64, 'Habiba Sultana', 'AFF-16MP9', 'habibasharafshuaeib201622@gmail.com', '01964579502', NULL, NULL, 'upload/affiliate/1846579957982709.jpg', 'OHBDE5H2X', 0.00, 0.00, '$2y$10$PZU/LysNy58kIiMIWccIQuKB3guxocODLtG33m16cPiSEW7BGL..i', 1, '2025-10-21 14:38:00', '2025-10-21 14:38:00'),
(65, 'Kamrun Naher', 'AFF-34Z2N', 'thahidula@gmail.com', '01878906421', NULL, NULL, 'upload/affiliate/1846584229685203.jpg', 'OHBDJOLC3', 0.00, 0.00, '$2y$10$qnck8i.bOiwJvLthjTrGLOoN2JDQ7YQgb3Z4Y4ouN9YyBF0Ec853K', 1, '2025-10-21 15:45:53', '2025-10-21 15:45:53'),
(66, 'Nasrin Khatun', 'AFF-69DFJ', 'nurnessanur@gmail.com', '01301310511', NULL, NULL, '', 'OHBDEONNA', 0.00, 0.00, '$2y$10$33rdABs4Y.0v0BQc./sv9.ibmGOlWouE/7odaRG566f9xEHQZzWqa', 1, '2025-10-21 16:18:42', '2025-10-21 16:18:42'),
(67, 'Alifa Akter', '38235031', 'alifaakter97462m@gmail.com', '01737873901', NULL, NULL, 'upload/affiliate/1846590936542536.jpg', 'OHBD6ZGFB', 0.00, 0.00, '$2y$10$a.8lzOG.GCN56o/MiCETEepdf.mHYTez2WblxS8A8uRvg9io9Pgiy', 1, '2025-10-21 17:32:30', '2025-10-21 17:32:30'),
(68, 'Riyeal Chandra Sarkar', 'UPR-71HJI', 'riyealchandrasarkar2255@gmail.com', '01333178781', NULL, NULL, 'upload/affiliate/1846601923461829.png', 'OHBDQD5HL', 0.00, 0.00, '$2y$10$FicJaFTggD/COVou0fRY2ucrhltcx0oA3jHqUv/b9X/SAw49K5SPu', 1, '2025-10-21 20:27:08', '2025-10-21 20:27:08'),
(69, 'MD SAIFUZZAMAN', 'UPR-22KLI', 'sabbirislamm846@gmail.com', '01624080211', NULL, NULL, '', 'OHBD1UJHXG', 0.00, 0.00, '$2y$10$w4.O3pae0SpMGrXYYtEOzeaEOhDtTNSdJFKySVY.gqK/CVZ0VVsFe', 1, '2025-10-21 21:45:46', '2025-10-21 21:45:46'),
(70, 'Mansura', 'AFF-14CEJ', 'mansuramansura2000@gmail.com', '01776203031', NULL, NULL, 'upload/affiliate/1846659614042684.png', 'OHBDWXZY0D', 0.00, 0.00, '$2y$10$vZcWiwI/9yDLwHw0YqlQ/OQKD5VaZxpECdMdJPDp/F5eFxynpQQz6', 1, '2025-10-22 11:44:05', '2025-10-22 11:44:05'),
(71, 'TAMIMA KHATUN', 'AFF-22HX9', 'bdbasundia@gmail.com', '01951157730', NULL, NULL, 'upload/affiliate/1846674431331601.png', 'OHBDXY48V', 0.00, 0.00, '$2y$10$skiqfN3FiZk8B27bpqpDremOc4SH.xrzmok7lbv60yJho9ttHUTpG', 1, '2025-10-22 15:39:36', '2025-10-22 15:39:36'),
(72, 'Rabaya akter', 'AFF-64TWY', 'rabeyaliza1994arshi@gmail.com', '01813206975', NULL, NULL, '', 'OHBDS5VFP', 0.00, 0.00, '$2y$10$sQsJOME6x4qf32IYfiwgI.UfmaXDXRznDDPJTNI.A7vFfugFqUlWm', 1, '2025-10-22 20:13:11', '2025-10-22 20:13:11'),
(73, 'Kamrunnahar', 'AFF-690GP', 'kn143537@gmail.com', '01755443205', NULL, NULL, 'upload/affiliate/1846911054992599.png', 'OHBDPJ4HNZ', 0.00, 0.00, '$2y$10$hCkRMbWeTMAq10xLTVivf.bThLH.EelT3LojEFFfdgptRuDNuDYTq', 1, '2025-10-25 06:20:39', '2025-10-25 06:20:39'),
(74, 'Naznin Akter', '43-NKZ', 'akhtermstnajnin8@gmail.com', '01849377777', NULL, NULL, 'upload/affiliate/1846914875233095.jpg', 'OHBDJMZTZA', 0.00, 0.00, '$2y$10$PT4aIsq6BbH61Ak2RmyYquaADeqDUBpxF.f72E2lFh9apBfNaqwfa', 1, '2025-10-25 07:21:22', '2025-10-25 07:21:22'),
(75, 'Nahid Ferdoush', 'UPR-45RCW', 'ferdoushnahid@gmail.com', '01767290075', NULL, NULL, 'upload/affiliate/1846972793592093.png', 'OHBDFIYOSF', 0.00, 0.00, '$2y$10$N04oZxYeyYvK6rpv4ZCYvueYEcGtyxebmTBU4bqP7fWsFwfFd3PXC', 1, '2025-10-25 22:41:57', '2025-10-25 22:41:57'),
(76, 'Tamjid Hakim chy', 'UPR-76F94', 'tamjidhakimchy@gmail.com', '01603914676', NULL, NULL, 'upload/affiliate/1847125615932822.jpg', 'OHBD5KWKJ', 0.00, 0.00, '$2y$10$LrGW6qgzgTgLL786go1.2OTBMbVGTve.ViHLo.5Q0Fjl43EaB0Mnu', 1, '2025-10-27 15:11:00', '2025-10-27 15:11:00'),
(77, 'RITIK CHANDRA SHIL', 'UPR-83IMS', 'ritikrk0085@gmail.com', '01622496269', NULL, NULL, 'upload/affiliate/1847337031946614.jpg', 'OHBD8IAKPK', 0.00, 0.00, '$2y$10$FGLV/DahRNdJyUT0toCXi.zHOyIMwwuDbVaBFRaxrtsArIyYi0WFa', 1, '2025-10-29 23:11:22', '2025-10-29 23:11:22'),
(78, 'MD RAYHANUJJAMAN REDOY', 'UPR-17SLL', 'rayhanujjaman001@gmail.com', '01326105458', NULL, NULL, 'upload/affiliate/1847387552325756.jpg', 'OHBDGSKCF', 0.00, 0.00, '$2y$10$f09k9azUY679gl0AkpZww.wMapkWDw.qB14cuUnu0lT1XM8rdvsCy', 1, '2025-10-30 12:34:23', '2025-10-30 12:34:23'),
(79, 'Md. Rana miah', 'AFF-77D2R', 'ranaitbd605@gmail.com', '01595585854', NULL, NULL, '', 'OHBDHORFDC', 0.00, 0.00, '$2y$10$3lJkjuijjt69rPj89eFUkuFbQ9UuJhO.AY.kD20oyt6f9mR/Sg4Gi', 1, '2025-10-30 12:59:40', '2025-10-30 12:59:40'),
(80, 'Md. Faruquzzaman', 'UPR-29TJY', 'Digitalresolvebd@gmail.com', '01550020530', NULL, NULL, 'upload/affiliate/1847389812215076.jpg', 'OHBDDGGXB', 0.00, 0.00, '$2y$10$PaOp8mXFCqJd..dT2su9/.iTX2WrYUMiHQsreSVb.ksotyfg9RwN.', 1, '2025-10-30 13:10:17', '2025-10-30 13:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(11, 'Size', 1, 4, '2023-08-30 13:52:30', '2023-08-30 13:52:30'),
(12, 'Color', 1, 4, '2023-08-30 13:53:47', '2023-08-30 13:53:47'),
(13, 'test', 1, 4, '2024-03-12 02:51:09', '2024-03-12 02:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(100) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(47, 11, 'S', 1, 4, '2023-08-30 13:52:58', '2023-08-30 13:52:58'),
(48, 11, 'M', 1, 4, '2023-08-30 13:53:07', '2023-08-30 13:53:07'),
(49, 11, 'L', 1, 4, '2023-08-30 13:53:26', '2023-08-30 13:53:26'),
(50, 11, 'XL', 1, 4, '2023-08-30 13:53:28', '2023-08-30 13:53:28'),
(51, 12, 'Black', 1, 4, '2023-08-30 13:53:55', '2023-08-30 13:53:55'),
(52, 12, 'White', 1, 4, '2023-08-30 13:53:59', '2023-08-30 13:53:59'),
(53, 12, 'Silver', 1, 4, '2023-08-30 13:54:03', '2023-08-30 13:54:03'),
(55, 13, 'test1', 1, 4, '2024-03-12 02:51:29', '2024-03-12 02:51:29'),
(56, 13, 'test2', 1, 4, '2024-03-12 02:51:36', '2024-03-12 02:51:36'),
(57, 13, 'test3', 1, 4, '2024-03-12 02:51:41', '2024-03-12 02:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_product_price`
--

CREATE TABLE `attribute_value_product_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_price_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(50) NOT NULL,
  `title_bn` varchar(50) DEFAULT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `position` varchar(255) NOT NULL DEFAULT '1' COMMENT '1=>Home Banner, 0=>Footer Banner',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title_en`, `title_bn`, `banner_img`, `banner_url`, `description_en`, `description_bn`, `position`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Anim aut dolores exc', 'Anim aut dolores exc', 'upload/banner/1771098684IMG-20250722-WA0014.jpg', '#', 'Fugit eiusmod sed e', 'Et sit est in labori', '1', 1, '2022-09-11 21:29:59', '2026-02-14 19:51:24'),
(17, 'Test Image', 'Test Image', 'upload/banner/1771098678IMG-20250722-WA0003.jpg', 'fgdfg', 'fgdfg', 'dfgdf', '1', 1, '2025-05-18 08:32:35', '2026-02-14 19:51:18'),
(18, 'Voluptas beatae dolo', 'Qui voluptatem sint', 'upload/banner/1857131588085942.jpg', 'Rerum rerum a explic', 'Culpa dolore qui nul', 'Nisi eos sed possim', '1', 1, '2026-02-14 19:51:37', '2026-02-14 19:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `title_bn` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `blog_img` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_bn` varchar(50) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_bn`, `slug`, `description_en`, `description_bn`, `brand_image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(23, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437347157806.png', 1, 4, '2023-11-01 19:44:04', '2023-11-01 19:44:04'),
(24, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437367377888.png', 1, 4, '2023-11-01 19:44:23', '2023-11-01 19:44:23'),
(25, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437390297197.png', 1, 4, '2023-11-01 19:44:45', '2023-11-01 19:44:45'),
(26, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437408829412.png', 1, 4, '2023-11-01 19:45:03', '2023-11-01 19:45:03'),
(27, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437429211360.png', 1, 4, '2023-11-01 19:45:22', '2023-11-01 19:45:22'),
(28, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437448799245.png', 1, 4, '2023-11-01 19:45:41', '2023-11-01 19:45:41'),
(29, 'test', 'test', 'test', 'test', 'test', 'upload/brand/1781437469293155.png', 1, 4, '2023-11-01 19:46:00', '2023-11-01 19:46:00'),
(30, 'Gucci', 'Gucci', 'gucci', 'Founded in 1921, Florence, Gucci remains a giant in luxury fashion. Known for Italian craftsmanship and high-quality materials, Gucci isn\'t afraid to be bold.  Mixing classic styles with vibrant colors and modern touches, Gucci redefines luxury with every design.', '1921 সালে প্রতিষ্ঠিত, ফ্লোরেন্স, গুচি বিলাসবহুল ফ্যাশনে একটি দৈত্য রয়ে গেছে। ইতালীয় কারুশিল্প এবং উচ্চ মানের উপকরণের জন্য পরিচিত, গুচি সাহসী হতে ভয় পায় না। স্পন্দনশীল রং এবং আধুনিক স্পর্শের সাথে ক্লাসিক শৈলী মিশ্রিত করে, গুচি প্রতিটি ডিজাইনের সাথে বিলাসিতাকে নতুন করে সংজ্ঞায়িত করে।', 'upload/brand/1719756352images (6).jpeg', 1, 4, '2023-11-01 19:46:25', '2024-06-30 12:05:52'),
(31, 'Hugo Boss', 'Hugo Boss', 'hugo-boss', 'Hugo Boss is a renowned German luxury fashion house known for its sharp tailoring, sophisticated designs, and high-quality craftsmanship. Founded in 1924, the brand caters to a sophisticated clientele seeking timeless elegance and contemporary style.\r\n\r\nKey c', 'হুগো বস একটি বিখ্যাত জার্মান πολগুণী ফ্যাশন হাউজ, যা এর ধারালো সেলাই, পরিশীলিত ডিজাইন এবং উচ্চ-মানের কারুকাজের জন্য পরিচিত। ১৯২৪ সালে প্রতিষ্ঠিত, এই ব্র্যান্ডটি এমন একটি পরিশীলিত ক্লায়েন্টেলে কাজ করে যারা চিরস্থীল লালিত্য এবং সমসাময়িক স্টাইল খুঁজছে।', 'upload/brand/1719756117images.png', 1, 4, '2023-11-01 19:46:42', '2024-06-30 12:01:57'),
(32, 'Non Brand', 'নন ব্র্যান্ড', 'non-brand', NULL, NULL, 'upload/brand/1719748313color-background-presentations-decorative-design-layout-template-insert-text-with-copy-space_7954-5787.avif', 1, 4, '2024-02-18 20:11:38', '2024-06-30 09:51:53'),
(33, 'Polo Ralph Lauren', 'Polo Ralph Lauren', 'polo-ralph-lauren', 'Polo Ralph Lauren is a renowned American brand known for its classic and preppy style with a touch of sophistication.', 'পোলো রাল্ফ লরেন একটি বিখ্যাত আমেরিকান ব্র্যান্ড যা তার ক্লাসিক এবং প্রিপি স্টাইলের জন্য পরিচিত যার পরিশীলিততার স্পর্শ রয়েছে।', 'upload/brand/1803295102174223.jpeg', 1, 4, '2024-06-30 12:03:43', '2024-06-30 12:03:43'),
(34, 'SS', 'SS', 'SS-Bor8D', NULL, NULL, '', 1, 4, '2026-02-18 20:36:27', '2026-02-18 20:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `campaings`
--

CREATE TABLE `campaings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `campaing_image` varchar(255) DEFAULT NULL,
  `flash_start` varchar(100) DEFAULT NULL,
  `flash_end` varchar(100) DEFAULT NULL,
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Featured, 0=>Not Featured	',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaings`
--

INSERT INTO `campaings` (`id`, `name_en`, `name_bn`, `slug`, `campaing_image`, `flash_start`, `flash_end`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(61, 'test2', 'টেস্ট২', 'test2', 'upload/campaing/1791584882506476.jpg', '21-02-2024 13:00:00', '22-02-2024 19:27:00', 1, 1, '2024-02-21 19:54:48', '2024-02-21 19:54:48'),
(62, 'test2', 'টেস্ট২', 'test2', 'upload/campaing/1791766920773138.jpg', '01-02-2024 14:00:00', '29-03-2024 22:00:00', 1, 1, '2024-02-24 02:08:13', '2024-02-24 02:08:13'),
(63, 'Summer Feast', 'মনসুর', 'summer-feast', 'upload/campaing/1793659272666921.jpg', '16-03-2024 11:00:00', '22-04-2024 19:00:00', 1, 1, '2024-03-16 04:26:20', '2024-03-16 04:26:43'),
(64, 'Summer Feast', 'সামার ফিস্ট', 'summer-feast', 'upload/campaing/1804269789163007.jpg', '01-07-2024 14:00:00', '21-03-2025 22:00:00', 1, 1, '2024-07-11 06:15:57', '2024-07-11 06:16:43'),
(65, 'Test Campaign', 'Test Campaign', 'test-campaign', 'upload/campaing/1832435125876945.webp', '09-10-2025 11:00:00', '27-11-2025 19:00:00', 1, 1, '2025-05-18 05:31:56', '2025-10-18 09:48:19'),
(66, 'Test Campaign', 'Test Campaign', 'test-campaign', 'upload/campaing/1832435126378167.webp', '18-05-2025 11:00:00', '19-05-2025 19:00:00', 1, 1, '2025-05-18 05:31:56', '2025-05-18 05:31:56'),
(67, 'Rechargeable mobile phone cooler, turbo cooling fan for mobile USB / Rechargeable', 'Rechargeable mobile phone cooler, turbo cooling fan for mobile USB / Rechargeable', 'rechargeable-mobile-phone-cooler-turbo-cooling-fan-for-mobile-usb--rechargeable', 'upload/campaing/1832451534236755.webp', '15-10-2025 15:00:00', '05-12-2025 23:00:00', 1, 1, '2025-05-18 09:52:44', '2025-10-18 15:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `campaing_products`
--

CREATE TABLE `campaing_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaing_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `discount_price` double NOT NULL DEFAULT 0,
  `discount_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Flat, 2=>Percentage',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaing_products`
--

INSERT INTO `campaing_products` (`id`, `campaing_id`, `product_id`, `product_name`, `discount_price`, `discount_type`, `created_at`, `updated_at`) VALUES
(145, 61, 73, NULL, 800, 1, '2024-02-21 19:54:48', '2024-02-21 19:54:48'),
(146, 61, 71, NULL, 500, 1, '2024-02-21 19:54:48', '2024-02-21 19:54:48'),
(147, 61, 68, NULL, 500, 1, '2024-02-21 19:54:48', '2024-02-21 19:54:48'),
(149, 62, 73, NULL, 800, 1, '2024-02-24 02:08:13', '2024-02-24 02:08:13'),
(153, 63, 86, NULL, 5, 2, '2024-03-16 04:26:43', '2024-03-16 04:26:43'),
(154, 63, 84, NULL, 0, 1, '2024-03-16 04:26:43', '2024-03-16 04:26:43'),
(155, 63, 82, NULL, 5, 2, '2024-03-16 04:26:43', '2024-03-16 04:26:43'),
(160, 64, 166, NULL, 10, 2, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(161, 64, 162, NULL, 5, 2, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(162, 64, 157, NULL, 12, 2, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(163, 64, 135, NULL, 10, 1, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(164, 64, 90, NULL, 0, 1, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(165, 64, 59, NULL, 13, 2, '2024-07-11 06:16:43', '2024-07-11 06:16:43'),
(167, 66, 198, NULL, 10, 1, '2025-05-18 05:31:56', '2025-05-18 05:31:56'),
(177, 65, 198, NULL, 10, 1, '2025-10-18 09:48:19', '2025-10-18 09:48:19'),
(178, 67, 200, NULL, 0, 1, '2025-10-18 15:11:01', '2025-10-18 15:11:01'),
(179, 67, 199, NULL, 70, 2, '2025-10-18 15:11:01', '2025-10-18 15:11:01'),
(180, 67, 198, NULL, 10, 1, '2025-10-18 15:11:01', '2025-10-18 15:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cat_banner` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Category, 2=>SubCategory, 3=> SubSubCategory',
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Featured, 0=>Not Featured',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_bn`, `slug`, `description_en`, `description_bn`, `image`, `icon`, `cat_banner`, `parent_id`, `type`, `is_featured`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(77, 'Bat', 'Bat', 'Bat-ZLASS', 'Bat', 'Bat', 'upload/category/1857446605174550.png', 'upload/category/1857446605258455.webp', NULL, 0, 1, 1, 1, 4, '2026-02-18 07:18:41', '2026-02-18 07:18:41'),
(78, 'Cricket Kit', 'Cricket Kit', 'Cricket-Kit-AIzZZ', 'Cricket Kit', 'Cricket Kit', 'upload/category/1857446663219880.png', 'upload/category/1857446663304898.png', NULL, 0, 1, 1, 1, 4, '2026-02-18 07:19:37', '2026-02-18 07:19:37'),
(79, 'Kit Bags', 'Kit Bags', 'Kit-Bags-9bdtE', 'Kit Bags', 'Kit Bags', 'upload/category/1857446703933311.png', 'upload/category/1857446704018392.png', NULL, 0, 1, 1, 1, 4, '2026-02-18 07:20:15', '2026-02-18 07:20:15'),
(80, 'Shoes', 'Shoes', 'Shoes-O7fiv', 'Shoes', 'Shoes', 'upload/category/1857446749169409.png', 'upload/category/1857446749246641.png', NULL, 0, 1, 1, 1, 4, '2026-02-18 07:20:58', '2026-02-18 07:20:58'),
(81, 'Helmets', 'Helmets', 'Helmets-dcasU', 'Helmets', 'Helmets', 'upload/category/1857446815871388.png', 'upload/category/1857446815956682.png', NULL, 0, 1, 1, 1, 4, '2026-02-18 07:22:02', '2026-02-18 07:22:02'),
(82, 'English Willow Bat', 'English Willow Bat', 'English-Willow-Bat-4GD21', 'English Willow Bat', 'English Willow Bat', '', '', NULL, 77, 2, 0, 1, 4, '2026-02-18 09:04:02', '2026-02-18 21:26:18'),
(83, 'carrying bag', 'carrying bag', 'carrying-bag-IkY2z', 'carrying bag', 'carrying bag', 'upload/category/1857492761346871.jpg', 'upload/category/1857492761357938.jpg', NULL, 79, 2, 0, 1, 4, '2026-02-18 19:32:19', '2026-02-18 19:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `commission_structures`
--

CREATE TABLE `commission_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 0.00,
  `mode` enum('fixed','percentage') NOT NULL DEFAULT 'percentage',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_structures`
--

INSERT INTO `commission_structures` (`id`, `category_id`, `commission_rate`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 56, 10.00, 'percentage', 1, '2025-12-11 07:13:13', '2025-12-11 07:13:13'),
(3, 27, 10.00, 'percentage', 1, '2025-12-11 07:36:12', '2025-12-11 08:24:23'),
(4, 43, 12.00, 'percentage', 1, '2025-12-11 07:36:21', '2025-12-11 07:36:21'),
(5, 44, 15.00, 'percentage', 1, '2025-12-11 07:36:34', '2025-12-11 07:36:34'),
(6, 45, 8.00, 'percentage', 1, '2025-12-11 07:36:44', '2025-12-11 07:36:44'),
(7, 46, 18.00, 'percentage', 1, '2025-12-11 07:36:53', '2025-12-11 07:36:53'),
(8, 50, 9.00, 'percentage', 1, '2025-12-11 07:37:03', '2025-12-11 07:37:03'),
(9, 53, 8.00, 'percentage', 1, '2025-12-11 07:37:13', '2025-12-11 07:37:13'),
(10, 59, 16.00, 'fixed', 1, '2025-12-11 07:37:33', '2025-12-11 08:05:05'),
(11, 68, 7.00, 'percentage', 1, '2025-12-11 07:37:41', '2025-12-11 08:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `Message` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `Message`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'sadekchowdhury47@gmail.com', '01799382934', 'hello', '2023-10-18 05:08:54', '2023-10-18 05:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `discount_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Fixed Amount, 0=>Percent',
  `discount` double(20,2) NOT NULL DEFAULT 0.00,
  `limit_per_user` double(20,2) NOT NULL DEFAULT 0.00,
  `total_use_limit` double(20,2) NOT NULL DEFAULT 0.00,
  `expire_date` date DEFAULT NULL,
  `type` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>All Customers, 0=>Specific Customer',
  `user_id` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `discount_type`, `discount`, `limit_per_user`, `total_use_limit`, `expire_date`, `type`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, '2223', 1, 25.00, 25.00, 5.00, '2024-02-10', 0, '24', 'abc', 1, '2024-02-19 02:32:07', '2024-02-19 02:33:53'),
(4, '2024', 0, 10.00, 0.00, 0.00, '2024-03-29', 1, '24', 'hello', 1, '2024-02-19 19:30:35', '2024-03-09 05:16:36'),
(5, 'coupon_test', 0, 20.00, 0.00, 47.00, '2026-12-31', NULL, NULL, 'ok', 1, '2024-02-19 23:28:41', '2026-01-25 04:47:39'),
(6, '123456', 1, 50.00, 0.00, 0.00, '2024-03-17', NULL, NULL, NULL, 1, '2024-03-16 04:28:20', '2024-03-16 04:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `division_name_bn` varchar(150) NOT NULL,
  `district_name_bn` varchar(130) NOT NULL,
  `district_name_en` text NOT NULL,
  `division_name_en` text NOT NULL,
  `division_id` varchar(210) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_name_bn`, `district_name_bn`, `district_name_en`, `division_name_en`, `division_id`, `status`) VALUES
(1, 'চট্টগ্রাম', 'কুমিল্লা', 'cumilla', 'chattogram', '2', 1),
(2, 'চট্টগ্রাম', 'ফেনী', 'feni', 'chattogram', '2', 1),
(3, 'চট্টগ্রাম', 'ব্রাহ্মণবাড়িয়া', 'brahmanbaria', 'chattogram', '2', 1),
(4, 'চট্টগ্রাম', 'রাঙ্গামাটি', 'rangamati', 'chattogram', '2', 1),
(5, 'চট্টগ্রাম', 'নোয়াখালী', 'noakhali', 'chattogram', '2', 1),
(6, 'চট্টগ্রাম', 'চাঁদপুর', 'chandpur', 'chattogram', '2', 1),
(7, 'চট্টগ্রাম', 'লক্ষ্মীপুর', 'lakshmipur', 'chattogram', '2', 1),
(8, 'চট্টগ্রাম', 'চট্টগ্রাম', 'chattogram', 'chattogram', '2', 1),
(9, 'চট্টগ্রাম', 'কক্সবাজার', 'coxsbazar', 'chattogram', '2', 1),
(10, 'চট্টগ্রাম', 'খাগড়াছড়ি', 'khagrachari', 'chattogram', '2', 1),
(11, 'চট্টগ্রাম', 'বান্দরবান', 'bandarban', 'chattogram', '2', 1),
(12, 'রাজশাহী', 'সিরাজগঞ্জ', 'sirajganj', 'rajshahi', '3', 1),
(13, 'রাজশাহী', 'পাবনা', 'pabna', 'rajshahi', '3', 1),
(14, 'রাজশাহী', 'বগুড়া', 'bogura', 'rajshahi', '3', 1),
(15, 'রাজশাহী', 'রাজশাহী', 'rajshahi', 'rajshahi', '3', 1),
(16, 'রাজশাহী', 'নাটোর', 'natore', 'rajshahi', '3', 1),
(17, 'রাজশাহী', 'জয়পুরহাট', 'jaipurhat', 'rajshahi', '3', 1),
(18, 'রাজশাহী', 'চাঁপাইনবাবগঞ্জ', 'nawabganj', 'rajshahi', '3', 1),
(19, 'রাজশাহী', 'নওগাঁ', 'naogaon', 'rajshahi', '3', 1),
(20, 'খুলনা', 'যশোর', 'jashore', 'khulna', '4', 1),
(21, 'খুলনা', 'সাতক্ষীরা', 'satkhira', 'khulna', '4', 1),
(22, 'খুলনা', 'মেহেরপুর', 'meherpur', 'khulna', '4', 1),
(23, 'খুলনা', 'নড়াইল', 'narail', 'khulna', '4', 1),
(24, 'খুলনা', 'চুয়াডাঙ্গা', 'chuadanga', 'khulna', '4', 1),
(25, 'খুলনা', 'কুষ্টিয়া', 'kushtia', 'khulna', '4', 1),
(26, 'খুলনা', 'মাগুরা', 'magura', 'khulna', '4', 1),
(27, 'খুলনা', 'খুলনা', 'khulna', 'khulna', '4', 1),
(28, 'খুলনা', 'বাগেরহাট', 'bagerhat', 'khulna', '4', 1),
(29, 'খুলনা', 'ঝিনাইদহ', 'jhenaidah', 'khulna', '4', 1),
(30, 'বরিশাল', 'বরিশাল', 'barishal', 'barishal', '5', 1),
(31, 'বরিশাল', 'ঝালকাঠি', 'jhalokati', 'barishal', '5', 1),
(32, 'বরিশাল', 'পটুয়াখালী', 'patuakhali', 'barishal', '5', 1),
(33, 'বরিশাল', 'পিরোজপুর', 'pirojpur', 'barishal', '5', 1),
(34, 'বরিশাল', 'ভোলা', 'bhola', 'barishal', '5', 1),
(35, 'বরিশাল', 'বরগুনা', 'barguna', 'barishal', '5', 1),
(36, 'সিলেট', 'সিলেট', 'sylhet', 'sylhet', '6', 1),
(37, 'সিলেট', 'মৌলভীবাজার', 'moulvibazar', 'sylhet', '6', 1),
(38, 'সিলেট', 'হবিগঞ্জ', 'habiganj', 'sylhet', '6', 1),
(39, 'সিলেট', 'সুনামগঞ্জ', 'sunamganj', 'sylhet', '6', 1),
(40, 'রংপুর', 'রংপুর', 'rangpur', 'rangpur', '7', 1),
(41, 'রংপুর', 'পঞ্চগড়', 'panchagarh', 'rangpur', '7', 1),
(42, 'রংপুর', 'দিনাজপুর', 'dinajpur', 'rangpur', '7', 1),
(43, 'রংপুর', 'লালমনিরহাট', 'lalmonirhat', 'rangpur', '7', 1),
(44, 'রংপুর', 'নীলফামারী', 'nilphamari', 'rangpur', '7', 1),
(45, 'রংপুর', 'ঠাকুরগাঁও', 'thakurgaon', 'rangpur', '7', 1),
(46, 'রংপুর', 'গাইবান্ধা', 'gaibandha', 'rangpur', '7', 1),
(47, 'রংপুর', 'কুড়িগ্রাম', 'kurigram', 'rangpur', '7', 1),
(48, 'ময়মনসিংহ', 'ময়মনসিংহ', 'mymensingh', 'mymensingh', '8', 1),
(49, 'ময়মনসিংহ', 'জামালপুর', 'jamalpur', 'mymensingh', '8', 1),
(51, 'ময়মনসিংহ', 'নেত্রকোণা', 'netrokona', 'mymensingh', '8', 1),
(52, 'ঢাকা', 'ঢাকা', 'dhaka', 'dhaka', '1', 1),
(53, 'ঢাকা', 'নরসিংদী', 'narsingdi', 'dhaka', '1', 1),
(54, 'ঢাকা', 'গাজীপুর', 'gazipur', 'dhaka', '1', 1),
(55, 'ঢাকা', 'শরীয়তপুর', 'shariatpur', 'dhaka', '1', 1),
(56, 'ঢাকা', 'নারায়ণগঞ্জ', 'narayanganj', 'dhaka', '1', 1),
(57, 'ঢাকা', 'টাঙ্গাইল', 'tangail', 'dhaka', '1', 1),
(58, 'ঢাকা', 'কিশোরগঞ্জ', 'kishoreganj', 'dhaka', '1', 1),
(59, 'ঢাকা', 'মানিকগঞ্জ', 'manikganj', 'dhaka', '1', 1),
(60, 'ঢাকা', 'মুন্সিগঞ্জ', 'munshiganj', 'dhaka', '1', 1),
(61, 'ঢাকা', 'রাজবাড়ী', 'rajbari', 'dhaka', '1', 1),
(62, 'ঢাকা', 'মাদারীপুর', 'madaripur', 'dhaka', '1', 1),
(63, 'ঢাকা', 'ফরিদপুর', 'faridpur', 'dhaka', '1', 1),
(64, 'ঢাকা', 'গোপালগঞ্জ', 'gopalganj', 'dhaka', '1', 1),
(5155, 'ময়মনসিংহ', 'শেরপুর', 'sherpur', 'mymensingh', '8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `division_id` varchar(30) NOT NULL,
  `division_name_bn` varchar(30) NOT NULL,
  `division_name_en` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_id`, `division_name_bn`, `division_name_en`, `country_id`, `status`) VALUES
(1, '1', 'ঢাকা', 'dhaka', 22, 1),
(2, '2', 'চট্টগ্রাম', 'chattogram', 22, 1),
(3, '3', 'রাজশাহী', 'rajshahi', 22, 1),
(4, '4', 'খুলনা', 'khulna', 22, 1),
(5, '5', 'বরিশাল', 'barishal', 22, 1),
(6, '6', 'সিলেট', 'sylhet', 22, 1),
(7, '7', 'রংপুর', 'rangpur', 22, 1),
(8, '8', 'ময়মনসিংহ', 'mymensingh', 22, 1);

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
-- Table structure for table `group_products`
--

CREATE TABLE `group_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_product_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_products`
--

INSERT INTO `group_products` (`id`, `group_product_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(22, 80, 81, 1, '2024-03-05 03:01:22', '2024-03-05 03:01:22'),
(23, 76, 81, 1, '2024-03-05 03:01:22', '2024-03-05 03:01:22');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2022_07_24_074842_create_multi_imgs_table', 1),
(27, '2022_02_04_061801_create_product_prices_table', 6),
(28, '2022_02_04_065518_create_attribute_product_table', 6),
(29, '2022_05_20_152549_create_attribute_value_product_price_table', 6),
(47, '2022_07_23_114405_create_sliders_table', 7),
(51, '2022_07_28_064437_create_campaings_table', 7),
(53, '2022_07_31_095124_create_blogs_table', 7),
(54, '2022_08_01_045408_create_pages_table', 7),
(56, '2022_08_10_105324_create_addresses_table', 7),
(57, '2022_08_14_045916_create_settings_table', 7),
(60, '2022_08_19_201539_create_product_stocks_table', 8),
(61, '2022_09_03_062044_create_shippings_table', 9),
(62, '2022_08_14_105209_create_order_details_table', 10),
(63, '2022_09_03_055707_create_coupons_table', 11),
(65, '2022_07_30_093841_create_banners_table', 12),
(67, '2022_09_17_111303_create_campaing_products_table', 13),
(68, '2022_09_27_050816_create_subscribers_table', 14),
(69, '2022_09_28_103615_create_roles_table', 15),
(71, '2022_09_28_110124_create_staff_table', 16),
(73, '2022_07_19_132400_create_brands_table', 18),
(74, '2022_07_20_105632_create_categories_table', 18),
(75, '2022_07_21_140629_create_suppliers_table', 18),
(76, '2022_07_24_063334_create_products_table', 18),
(77, '2022_08_04_073752_create_attributes_table', 18),
(78, '2022_08_06_053505_create_attribute_values_table', 18),
(79, '2022_08_14_105132_create_orders_table', 18),
(80, '2022_10_16_060400_create_account_heads_table', 19),
(82, '2022_10_16_082419_create_account_ledgers_table', 20),
(84, '2022_12_31_055130_create_units_table', 21),
(85, '2023_10_18_164354_create_contacts_table', 22),
(93, '2023_10_19_110851_create_abouts_table', 23),
(94, '2024_02_05_071705_create_group_products_table', 23),
(95, '2024_02_05_071803_create_withdraw_requests_table', 23),
(96, '2024_02_05_072102_create_vendor_comissions_table', 23),
(99, '2024_02_05_110425_create_vendor_payments_table', 24),
(100, '2024_02_06_115201_create_vendor_transactions_table', 25),
(101, '2024_02_15_105554_create_user_messages_table', 26),
(102, '2024_03_11_130851_create_return_requests_table', 27),
(103, '2024_03_11_141840_create_returning_products_table', 28),
(105, '2025_05_18_175317_create_reviews_table', 29),
(107, '2025_05_25_145816_add_is_affiliate_column_in_products_table', 30),
(108, '2025_05_26_163901_create_affiliates_table', 31),
(109, '2025_05_28_161844_add_afffiliate_id_column_to_orders_table', 32),
(110, '2022_07_24_111956_create_vendors_table', 33),
(111, '2025_12_11_122427_add_profile_fields_to_users_table', 34),
(113, '2025_12_11_124230_add_bank_fields_to_vendors_table', 35),
(114, '2025_12_18_170509_create_vendor_orders_table', 36),
(115, '2025_12_22_122044_create_return_requests_table', 37),
(116, '2026_01_25_095504_create_account_settings_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photo_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(26, 6, 'upload/products/multi-image/1739846067169394.jpg', '2022-07-30 17:48:28', NULL),
(27, 7, 'upload/products/multi-image/1739846315129171.jpg', '2022-07-30 17:52:25', NULL),
(28, 7, 'upload/products/multi-image/1739846315236232.jpg', '2022-07-30 17:52:25', NULL),
(29, 7, 'upload/products/multi-image/1739846315325319.jpg', '2022-07-30 17:52:25', NULL),
(30, 7, 'upload/products/multi-image/1739846315411765.jpg', '2022-07-30 17:52:25', NULL),
(31, 7, 'upload/products/multi-image/1739846315496734.jpg', '2022-07-30 17:52:25', NULL),
(32, 8, 'upload/products/multi-image/1739846945373381.jpg', '2022-07-30 18:02:26', NULL),
(33, 8, 'upload/products/multi-image/1739846945461252.jpg', '2022-07-30 18:02:26', NULL),
(34, 8, 'upload/products/multi-image/1739846945549516.jpg', '2022-07-30 18:02:26', NULL),
(35, 8, 'upload/products/multi-image/1739846945636549.jpg', '2022-07-30 18:02:26', NULL),
(40, 10, 'upload/products/multi-image/1740220384024841.jpg', '2022-08-03 20:58:05', NULL),
(41, 10, 'upload/products/multi-image/1740220384277271.jpg', '2022-08-03 20:58:05', NULL),
(42, 13, 'upload/products/multi-image/1742295966910363.jpg', '2022-08-26 18:48:35', NULL),
(43, 13, 'upload/products/multi-image/1742295967017138.jpg', '2022-08-26 18:48:35', NULL),
(44, 13, 'upload/products/multi-image/1742295967129486.png', '2022-08-26 18:48:35', NULL),
(45, 14, 'upload/products/multi-image/1742317545185514.jpg', '2022-08-27 00:31:34', NULL),
(46, 14, 'upload/products/multi-image/1742317545453192.jpg', '2022-08-27 00:31:34', NULL),
(47, 14, 'upload/products/multi-image/1742317545664382.jpg', '2022-08-27 00:31:34', NULL),
(49, 15, 'upload/products/multi-image/1742317808453359.jpg', '2022-08-27 00:35:45', NULL),
(50, 15, 'upload/products/multi-image/1742317808714459.jpg', '2022-08-27 00:35:45', NULL),
(51, 15, 'upload/products/multi-image/1742317808922731.jpg', '2022-08-27 00:35:45', NULL),
(52, 15, 'upload/products/multi-image/1742317809136325.jpg', '2022-08-27 00:35:45', NULL),
(53, 15, 'upload/products/multi-image/1742317809373085.jpg', '2022-08-27 00:35:45', NULL),
(54, 16, 'upload/products/multi-image/1742318129595563.jpg', '2022-08-27 00:40:51', NULL),
(55, 16, 'upload/products/multi-image/1742318129886651.jpg', '2022-08-27 00:40:51', NULL),
(56, 16, 'upload/products/multi-image/1742318129987320.jpg', '2022-08-27 00:40:51', NULL),
(57, 16, 'upload/products/multi-image/1742318130132424.png', '2022-08-27 00:40:51', NULL),
(58, 17, 'upload/products/multi-image/1742320496045439.jpg', '2022-08-27 01:18:28', NULL),
(59, 17, 'upload/products/multi-image/1742320496146899.jpg', '2022-08-27 01:18:28', NULL),
(60, 17, 'upload/products/multi-image/1742320496250664.jpg', '2022-08-27 01:18:28', NULL),
(61, 17, 'upload/products/multi-image/1742320496355090.jpg', '2022-08-27 01:18:28', NULL),
(62, 18, 'upload/products/multi-image/1742320667990183.jpg', '2022-08-27 01:21:12', NULL),
(63, 18, 'upload/products/multi-image/1742320668091389.jpg', '2022-08-27 01:21:12', NULL),
(64, 18, 'upload/products/multi-image/1742320668190326.jpg', '2022-08-27 01:21:12', NULL),
(65, 18, 'upload/products/multi-image/1742320668290266.jpg', '2022-08-27 01:21:12', NULL),
(66, 19, 'upload/products/multi-image/1742320990568427.jpg', '2022-08-27 01:26:19', NULL),
(67, 19, 'upload/products/multi-image/1742320990667661.jpg', '2022-08-27 01:26:19', NULL),
(68, 20, 'upload/products/multi-image/1742321394763321.jpg', '2022-08-27 01:32:45', NULL),
(69, 20, 'upload/products/multi-image/1742321394855141.jpg', '2022-08-27 01:32:45', NULL),
(70, 20, 'upload/products/multi-image/1742321394949763.jpg', '2022-08-27 01:32:45', NULL),
(71, 20, 'upload/products/multi-image/1742321395041602.jpg', '2022-08-27 01:32:45', NULL),
(72, 21, 'upload/products/multi-image/1742322410924504.jpg', '2022-08-27 01:48:54', NULL),
(73, 21, 'upload/products/multi-image/1742322411139578.jpg', '2022-08-27 01:48:54', NULL),
(74, 21, 'upload/products/multi-image/1742322411353836.jpg', '2022-08-27 01:48:55', NULL),
(75, 22, 'upload/products/multi-image/1742322638653428.jpg', '2022-08-27 01:52:31', NULL),
(76, 23, 'upload/products/multi-image/1742322957147844.jpg', '2022-08-27 01:57:35', NULL),
(77, 23, 'upload/products/multi-image/1742322957249716.jpg', '2022-08-27 01:57:35', NULL),
(78, 23, 'upload/products/multi-image/1742322957342972.jpg', '2022-08-27 01:57:35', NULL),
(79, 23, 'upload/products/multi-image/1742322957435041.jpg', '2022-08-27 01:57:35', NULL),
(81, 24, 'upload/products/multi-image/1742323415126547.jpg', '2022-08-27 02:04:52', NULL),
(82, 24, 'upload/products/multi-image/1742323415265148.jpg', '2022-08-27 02:04:52', NULL),
(83, 24, 'upload/products/multi-image/1742323415357422.jpg', '2022-08-27 02:04:52', NULL),
(84, 24, 'upload/products/multi-image/1742323415439626.jpg', '2022-08-27 02:04:52', NULL),
(85, 25, 'upload/products/multi-image/1742323752659292.jpg', '2022-08-27 02:10:14', NULL),
(86, 25, 'upload/products/multi-image/1742323753056581.png', '2022-08-27 02:10:14', NULL),
(88, 26, 'upload/products/multi-image/1742411315968479.jpg', '2022-08-28 01:22:00', NULL),
(89, 27, 'upload/products/multi-image/1742411449262562.jpg', '2022-08-28 01:24:08', NULL),
(91, NULL, 'upload/products/multi-image/1742480355984144.jpg', '2022-08-28 19:39:22', '2022-08-28 19:39:22'),
(92, NULL, 'upload/products/multi-image/1742480356115810.jpg', '2022-08-28 19:39:22', '2022-08-28 19:39:22'),
(93, NULL, 'upload/products/multi-image/1742480356240109.jpg', '2022-08-28 19:39:22', '2022-08-28 19:39:22'),
(94, NULL, 'upload/products/multi-image/1742480393934418.jpg', '2022-08-28 19:39:58', '2022-08-28 19:39:58'),
(95, 29, 'upload/products/multi-image/1742481808103930.jpg', '2022-08-28 20:02:27', NULL),
(96, 29, 'upload/products/multi-image/1742481808252632.jpg', '2022-08-28 20:02:27', NULL),
(97, 29, 'upload/products/multi-image/1742481808351222.jpg', '2022-08-28 20:02:27', NULL),
(98, 29, 'upload/products/multi-image/1742482178486432.jpg', '2022-08-28 20:08:20', NULL),
(102, 29, 'upload/products/multi-image/1742482350127002.jpg', '2022-08-28 20:11:04', NULL),
(103, 29, 'upload/products/multi-image/1742482350293094.jpg', '2022-08-28 20:11:04', NULL),
(104, 29, 'upload/products/multi-image/1742482350465148.jpg', '2022-08-28 20:11:04', NULL),
(106, 26, 'upload/products/multi-image/1742485985214466.jpg', '2022-08-28 21:08:50', NULL),
(107, 26, 'upload/products/multi-image/1742485985320404.jpg', '2022-08-28 21:08:51', NULL),
(169, 56, 'upload/products/multi-image/1780093829012933.jpeg', '2023-10-17 23:49:25', NULL),
(170, 56, 'upload/products/multi-image/1780093829361221.webp', '2023-10-17 23:49:26', NULL),
(171, 56, 'upload/products/multi-image/1780093830183977.webp', '2023-10-17 23:49:27', NULL),
(210, 80, 'upload/products/multi-image/1792670666657168.webp', '2024-03-05 01:32:52', NULL),
(211, 80, 'upload/products/multi-image/1792670666893554.webp', '2024-03-05 01:32:53', NULL),
(214, 59, 'upload/products/multi-image/1803287117228486.webp', '2024-06-30 09:56:48', NULL),
(215, 59, 'upload/products/multi-image/1803287117309536.webp', '2024-06-30 09:56:49', NULL),
(216, 59, 'upload/products/multi-image/1803287117457407.webp', '2024-06-30 09:56:49', NULL),
(217, 59, 'upload/products/multi-image/1803287117541961.jpg', '2024-06-30 09:56:49', NULL),
(218, 88, 'upload/products/multi-image/1803287989375825.jpg', '2024-06-30 10:10:40', NULL),
(219, 88, 'upload/products/multi-image/1803287989456464.webp', '2024-06-30 10:10:40', NULL),
(220, 88, 'upload/products/multi-image/1803287989528632.webp', '2024-06-30 10:10:40', NULL),
(221, 89, 'upload/products/multi-image/1803288438241420.png', '2024-06-30 10:17:48', NULL),
(222, 89, 'upload/products/multi-image/1803288438293334.jpg', '2024-06-30 10:17:48', NULL),
(223, 69, 'upload/products/multi-image/1803288832105875.webp', '2024-06-30 10:24:04', NULL),
(224, 69, 'upload/products/multi-image/1803288832188015.webp', '2024-06-30 10:24:04', NULL),
(225, 69, 'upload/products/multi-image/1803288832276088.webp', '2024-06-30 10:24:04', NULL),
(226, 63, 'upload/products/multi-image/1803289266737521.webp', '2024-06-30 10:30:58', NULL),
(227, 61, 'upload/products/multi-image/1803289727004550.png', '2024-06-30 10:38:17', NULL),
(228, 90, 'upload/products/multi-image/1803294307968519.jpg', '2024-06-30 11:51:06', NULL),
(229, 90, 'upload/products/multi-image/1803294308021567.jpeg', '2024-06-30 11:51:06', NULL),
(230, 92, 'upload/products/multi-image/1803901641250621.jpg', '2024-07-07 04:44:24', NULL),
(231, 92, 'upload/products/multi-image/1803901641287059.jpg', '2024-07-07 04:44:24', NULL),
(232, 94, 'upload/products/multi-image/1803903450651336.jpg', '2024-07-07 05:13:10', NULL),
(233, 95, 'upload/products/multi-image/1803904498230519.jfif', '2024-07-07 05:29:49', NULL),
(234, 95, 'upload/products/multi-image/1803904498264689.jfif', '2024-07-07 05:29:49', NULL),
(235, 97, 'upload/products/multi-image/1803906625861209.jpeg', '2024-07-07 06:03:38', NULL),
(236, 97, 'upload/products/multi-image/1803906625897307.jpg', '2024-07-07 06:03:38', NULL),
(237, 97, 'upload/products/multi-image/1803906625930756.jpg', '2024-07-07 06:03:38', NULL),
(238, 98, 'upload/products/multi-image/1803913029102737.webp', '2024-07-07 07:45:25', NULL),
(239, 98, 'upload/products/multi-image/1803913029279418.webp', '2024-07-07 07:45:25', NULL),
(240, 99, 'upload/products/multi-image/1803913341434307.jpg', '2024-07-07 07:50:22', NULL),
(241, 99, 'upload/products/multi-image/1803913341472966.jpg', '2024-07-07 07:50:22', NULL),
(242, 100, 'upload/products/multi-image/1803913645874917.jpg', '2024-07-07 07:55:13', NULL),
(243, 100, 'upload/products/multi-image/1803913645914923.jpg', '2024-07-07 07:55:13', NULL),
(244, 101, 'upload/products/multi-image/1803915803514395.jpg', '2024-07-07 08:29:30', NULL),
(245, 101, 'upload/products/multi-image/1803915803551012.jpg', '2024-07-07 08:29:30', NULL),
(246, 102, 'upload/products/multi-image/1803916257400553.jpg', '2024-07-07 08:36:43', NULL),
(247, 103, 'upload/products/multi-image/1803916498609667.jpg', '2024-07-07 08:40:33', NULL),
(248, 104, 'upload/products/multi-image/1803916920854517.png', '2024-07-07 08:47:16', NULL),
(249, 104, 'upload/products/multi-image/1803916920954215.jpg', '2024-07-07 08:47:16', NULL),
(250, 105, 'upload/products/multi-image/1803917153900727.jpg', '2024-07-07 08:50:58', NULL),
(251, 105, 'upload/products/multi-image/1803917153936457.jpg', '2024-07-07 08:50:58', NULL),
(252, 107, 'upload/products/multi-image/1803918147174762.jpeg', '2024-07-07 09:06:45', NULL),
(253, 108, 'upload/products/multi-image/1803918358901936.jpg', '2024-07-07 09:10:07', NULL),
(254, 108, 'upload/products/multi-image/1803918358937922.jpg', '2024-07-07 09:10:07', NULL),
(255, 109, 'upload/products/multi-image/1803918543227488.jpg', '2024-07-07 09:13:03', NULL),
(256, 109, 'upload/products/multi-image/1803918543267536.jpg', '2024-07-07 09:13:03', NULL),
(257, 110, 'upload/products/multi-image/1803918886888916.jpg', '2024-07-07 09:18:31', NULL),
(258, 110, 'upload/products/multi-image/1803918886925274.jpg', '2024-07-07 09:18:31', NULL),
(259, 111, 'upload/products/multi-image/1803919107337438.jpg', '2024-07-07 09:22:01', NULL),
(260, 111, 'upload/products/multi-image/1803919107374207.jpg', '2024-07-07 09:22:01', NULL),
(261, 112, 'upload/products/multi-image/1803919303973917.jpg', '2024-07-07 09:25:09', NULL),
(262, 112, 'upload/products/multi-image/1803919304013575.jpg', '2024-07-07 09:25:09', NULL),
(263, 113, 'upload/products/multi-image/1803919563297410.jpg', '2024-07-07 09:29:16', NULL),
(264, 113, 'upload/products/multi-image/1803919563328885.jpeg', '2024-07-07 09:29:16', NULL),
(265, 114, 'upload/products/multi-image/1803919818357067.png', '2024-07-07 09:33:19', NULL),
(266, 114, 'upload/products/multi-image/1803919818451837.jpg', '2024-07-07 09:33:19', NULL),
(267, 115, 'upload/products/multi-image/1803919986889420.jpg', '2024-07-07 09:36:00', NULL),
(268, 115, 'upload/products/multi-image/1803919986924979.jpg', '2024-07-07 09:36:00', NULL),
(269, 116, 'upload/products/multi-image/1803920267172405.jpg', '2024-07-07 09:40:27', NULL),
(270, 117, 'upload/products/multi-image/1803920478431591.jpg', '2024-07-07 09:43:49', NULL),
(271, 117, 'upload/products/multi-image/1803920478472655.jpg', '2024-07-07 09:43:49', NULL),
(272, 118, 'upload/products/multi-image/1803920749286466.jpg', '2024-07-07 09:48:07', NULL),
(273, 118, 'upload/products/multi-image/1803920749336255.jpg', '2024-07-07 09:48:07', NULL),
(274, 119, 'upload/products/multi-image/1803920996329764.jpg', '2024-07-07 09:52:03', NULL),
(275, 119, 'upload/products/multi-image/1803920996366082.jpg', '2024-07-07 09:52:03', NULL),
(276, 120, 'upload/products/multi-image/1803921400202165.jpg', '2024-07-07 09:58:28', NULL),
(277, 121, 'upload/products/multi-image/1803921638457171.jpg', '2024-07-07 10:02:15', NULL),
(278, 121, 'upload/products/multi-image/1803921638493837.jpg', '2024-07-07 10:02:15', NULL),
(281, 123, 'upload/products/multi-image/1804018031734996.jpg', '2024-07-08 11:34:23', NULL),
(282, 123, 'upload/products/multi-image/1804018031776793.webp', '2024-07-08 11:34:23', NULL),
(283, 122, 'upload/products/multi-image/1804018084286741.jpg', '2024-07-08 11:35:13', NULL),
(284, 122, 'upload/products/multi-image/1804018084329215.jpeg', '2024-07-08 11:35:13', NULL),
(285, 124, 'upload/products/multi-image/1804018346206762.jpg', '2024-07-08 11:39:23', NULL),
(286, 124, 'upload/products/multi-image/1804018346280248.webp', '2024-07-08 11:39:23', NULL),
(287, 125, 'upload/products/multi-image/1804018463246925.jpeg', '2024-07-08 11:41:14', NULL),
(288, 125, 'upload/products/multi-image/1804018463277518.webp', '2024-07-08 11:41:14', NULL),
(289, 126, 'upload/products/multi-image/1804020253979521.webp', '2024-07-08 12:09:42', NULL),
(290, 127, 'upload/products/multi-image/1804020557355749.webp', '2024-07-08 12:14:31', NULL),
(291, 127, 'upload/products/multi-image/1804020557421751.webp', '2024-07-08 12:14:31', NULL),
(292, 128, 'upload/products/multi-image/1804020875160027.webp', '2024-07-08 12:19:35', NULL),
(293, 128, 'upload/products/multi-image/1804020875282308.webp', '2024-07-08 12:19:35', NULL),
(294, 129, 'upload/products/multi-image/1804021115934264.webp', '2024-07-08 12:23:24', NULL),
(295, 129, 'upload/products/multi-image/1804021116008559.webp', '2024-07-08 12:23:24', NULL),
(296, 131, 'upload/products/multi-image/1804264339203259.jpg', '2024-07-11 04:49:20', NULL),
(297, 131, 'upload/products/multi-image/1804264339238233.webp', '2024-07-11 04:49:20', NULL),
(298, 132, 'upload/products/multi-image/1804264549399446.jpg', '2024-07-11 04:52:40', NULL),
(299, 132, 'upload/products/multi-image/1804264549445692.png', '2024-07-11 04:52:41', NULL),
(300, 134, 'upload/products/multi-image/1804265021391204.jpg', '2024-07-11 05:00:10', NULL),
(301, 134, 'upload/products/multi-image/1804265021452346.jpg', '2024-07-11 05:00:11', NULL),
(302, 136, 'upload/products/multi-image/1804265453050276.jpg', '2024-07-11 05:07:02', NULL),
(303, 137, 'upload/products/multi-image/1804265670145403.jpg', '2024-07-11 05:10:30', NULL),
(304, 137, 'upload/products/multi-image/1804265670712193.jpg', '2024-07-11 05:10:30', NULL),
(305, 138, 'upload/products/multi-image/1804265766311567.jpg', '2024-07-11 05:12:01', NULL),
(306, 138, 'upload/products/multi-image/1804265766396029.jpg', '2024-07-11 05:12:01', NULL),
(307, 138, 'upload/products/multi-image/1804265766481482.jpg', '2024-07-11 05:12:01', NULL),
(308, 139, 'upload/products/multi-image/1804265847589440.png', '2024-07-11 05:13:18', NULL),
(309, 139, 'upload/products/multi-image/1804265847732454.png', '2024-07-11 05:13:19', NULL),
(310, 140, 'upload/products/multi-image/1804266003306562.jpg', '2024-07-11 05:15:47', NULL),
(311, 140, 'upload/products/multi-image/1804266003376843.jpg', '2024-07-11 05:15:47', NULL),
(312, 141, 'upload/products/multi-image/1804266038306417.webp', '2024-07-11 05:16:20', NULL),
(313, 141, 'upload/products/multi-image/1804266038381663.webp', '2024-07-11 05:16:20', NULL),
(314, 142, 'upload/products/multi-image/1804266063211645.png', '2024-07-11 05:16:44', NULL),
(315, 143, 'upload/products/multi-image/1804266187252146.webp', '2024-07-11 05:18:42', NULL),
(316, 144, 'upload/products/multi-image/1804266203078007.jpg', '2024-07-11 05:18:57', NULL),
(317, 144, 'upload/products/multi-image/1804266203146444.jpg', '2024-07-11 05:18:58', NULL),
(318, 144, 'upload/products/multi-image/1804266203260941.jpg', '2024-07-11 05:18:58', NULL),
(319, 145, 'upload/products/multi-image/1804266256526351.png', '2024-07-11 05:19:48', NULL),
(320, 146, 'upload/products/multi-image/1804266312024708.webp', '2024-07-11 05:20:41', NULL),
(321, 146, 'upload/products/multi-image/1804266312086135.webp', '2024-07-11 05:20:41', NULL),
(322, 147, 'upload/products/multi-image/1804266445892545.png', '2024-07-11 05:22:49', NULL),
(323, 148, 'upload/products/multi-image/1804266504479602.webp', '2024-07-11 05:23:45', NULL),
(324, 148, 'upload/products/multi-image/1804266504609538.webp', '2024-07-11 05:23:45', NULL),
(325, 149, 'upload/products/multi-image/1804266671024790.webp', '2024-07-11 05:26:24', NULL),
(326, 149, 'upload/products/multi-image/1804266671090255.webp', '2024-07-11 05:26:24', NULL),
(327, 150, 'upload/products/multi-image/1804266788133343.webp', '2024-07-11 05:28:15', NULL),
(328, 151, 'upload/products/multi-image/1804267018103091.webp', '2024-07-11 05:31:55', NULL),
(329, 151, 'upload/products/multi-image/1804267018170589.webp', '2024-07-11 05:31:55', NULL),
(330, 152, 'upload/products/multi-image/1804267126350069.webp', '2024-07-11 05:33:38', NULL),
(331, 152, 'upload/products/multi-image/1804267126417348.webp', '2024-07-11 05:33:38', NULL),
(332, 153, 'upload/products/multi-image/1804267325944902.webp', '2024-07-11 05:36:48', NULL),
(333, 153, 'upload/products/multi-image/1804267326021343.webp', '2024-07-11 05:36:48', NULL),
(340, 158, 'upload/products/multi-image/1804268231880352.webp', '2024-07-11 05:51:12', NULL),
(341, 158, 'upload/products/multi-image/1804268231946777.webp', '2024-07-11 05:51:12', NULL),
(342, 158, 'upload/products/multi-image/1804268232002684.webp', '2024-07-11 05:51:12', NULL),
(344, 161, 'upload/products/multi-image/1804268513490411.webp', '2024-07-11 05:55:41', NULL),
(345, 163, 'upload/products/multi-image/1804268730086269.webp', '2024-07-11 05:59:07', NULL),
(346, 163, 'upload/products/multi-image/1804268730143748.webp', '2024-07-11 05:59:07', NULL),
(347, 166, 'upload/products/multi-image/1804269086137814.webp', '2024-07-11 06:04:47', NULL),
(348, 167, 'upload/products/multi-image/1804269188388346.jpg', '2024-07-11 06:06:24', NULL),
(349, 168, 'upload/products/multi-image/1804269298142555.jpg', '2024-07-11 06:08:09', NULL),
(350, 168, 'upload/products/multi-image/1804269298173764.jpg', '2024-07-11 06:08:09', NULL),
(351, 168, 'upload/products/multi-image/1804269298204615.jpg', '2024-07-11 06:08:09', NULL),
(352, 164, 'upload/products/multi-image/1804269426872512.webp', '2024-07-11 06:10:12', NULL),
(353, 164, 'upload/products/multi-image/1804269426942198.jpeg', '2024-07-11 06:10:12', NULL),
(355, 170, 'upload/products/multi-image/1804269510801310.jpg', '2024-07-11 06:11:32', NULL),
(356, 160, 'upload/products/multi-image/1804269557948395.jpg', '2024-07-11 06:12:17', NULL),
(357, 156, 'upload/products/multi-image/1804269778662125.jpg', '2024-07-11 06:15:47', NULL),
(358, 156, 'upload/products/multi-image/1804269778713479.webp', '2024-07-11 06:15:48', NULL),
(359, 171, 'upload/products/multi-image/1804269783113206.jpg', '2024-07-11 06:15:52', NULL),
(360, 171, 'upload/products/multi-image/1804269783153108.jpg', '2024-07-11 06:15:52', NULL),
(361, 171, 'upload/products/multi-image/1804269783193541.jpg', '2024-07-11 06:15:52', NULL),
(362, 155, 'upload/products/multi-image/1804269906886876.webp', '2024-07-11 06:17:50', NULL),
(363, 155, 'upload/products/multi-image/1804269906972309.jpg', '2024-07-11 06:17:50', NULL),
(364, 154, 'upload/products/multi-image/1804270030591660.jpg', '2024-07-11 06:19:48', NULL),
(365, 172, 'upload/products/multi-image/1804270056045964.jpg', '2024-07-11 06:20:12', NULL),
(367, 172, 'upload/products/multi-image/1804270056163107.jpg', '2024-07-11 06:20:12', NULL),
(370, 173, 'upload/products/multi-image/1804270352130983.jpg', '2024-07-11 06:24:54', NULL),
(371, 173, 'upload/products/multi-image/1804270352173128.jpg', '2024-07-11 06:24:54', NULL),
(372, 173, 'upload/products/multi-image/1804270352215649.jpg', '2024-07-11 06:24:54', NULL),
(373, 174, 'upload/products/multi-image/1804270610838474.jpg', '2024-07-11 06:29:01', NULL),
(374, 175, 'upload/products/multi-image/1804271377027048.jpg', '2024-07-11 06:41:12', NULL),
(375, 175, 'upload/products/multi-image/1804271377059617.jpg', '2024-07-11 06:41:12', NULL),
(376, 175, 'upload/products/multi-image/1804271377089161.jpg', '2024-07-11 06:41:12', NULL),
(377, 175, 'upload/products/multi-image/1804271377119704.jpg', '2024-07-11 06:41:12', NULL),
(378, 175, 'upload/products/multi-image/1804271377149886.jpg', '2024-07-11 06:41:12', NULL),
(379, 176, 'upload/products/multi-image/1804271697869294.jpg', '2024-07-11 06:46:18', NULL),
(380, 176, 'upload/products/multi-image/1804271697908464.jpg', '2024-07-11 06:46:18', NULL),
(381, 176, 'upload/products/multi-image/1804271697949509.jpg', '2024-07-11 06:46:18', NULL),
(382, 176, 'upload/products/multi-image/1804271697991308.jpg', '2024-07-11 06:46:18', NULL),
(383, 177, 'upload/products/multi-image/1804271874151862.jpg', '2024-07-11 06:49:06', NULL),
(384, 177, 'upload/products/multi-image/1804271874207195.jpg', '2024-07-11 06:49:06', NULL),
(385, 177, 'upload/products/multi-image/1804271874255220.jpg', '2024-07-11 06:49:06', NULL),
(386, 177, 'upload/products/multi-image/1804271874297279.jpg', '2024-07-11 06:49:06', NULL),
(387, 178, 'upload/products/multi-image/1804275802599783.jpg', '2024-07-11 07:51:32', NULL),
(388, 178, 'upload/products/multi-image/1804275802635204.jpg', '2024-07-11 07:51:32', NULL),
(389, 178, 'upload/products/multi-image/1804275802672820.jpg', '2024-07-11 07:51:32', NULL),
(390, 178, 'upload/products/multi-image/1804275802712464.jpg', '2024-07-11 07:51:32', NULL),
(391, 179, 'upload/products/multi-image/1804275986380976.jpg', '2024-07-11 07:54:28', NULL),
(392, 179, 'upload/products/multi-image/1804275986482932.jpg', '2024-07-11 07:54:28', NULL),
(393, 179, 'upload/products/multi-image/1804275986532206.jpg', '2024-07-11 07:54:28', NULL),
(394, 180, 'upload/products/multi-image/1804276300448124.jpg', '2024-07-11 07:59:27', NULL),
(395, 180, 'upload/products/multi-image/1804276300502479.jpg', '2024-07-11 07:59:27', NULL),
(396, 180, 'upload/products/multi-image/1804276300554288.jpg', '2024-07-11 07:59:27', NULL),
(397, 181, 'upload/products/multi-image/1804276555199643.jpg', '2024-07-11 08:03:30', NULL),
(398, 182, 'upload/products/multi-image/1804276675791213.jpg', '2024-07-11 08:05:25', NULL),
(399, 182, 'upload/products/multi-image/1804276675831352.jpg', '2024-07-11 08:05:25', NULL),
(400, 184, 'upload/products/multi-image/1804278405304244.jpg', '2024-07-11 08:32:54', NULL),
(401, 184, 'upload/products/multi-image/1804278405372383.jpg', '2024-07-11 08:32:54', NULL),
(402, 184, 'upload/products/multi-image/1804278405431898.jpg', '2024-07-11 08:32:55', NULL),
(403, 186, 'upload/products/multi-image/1804278535277064.jpg', '2024-07-11 08:34:58', NULL),
(404, 186, 'upload/products/multi-image/1804278535373551.jpg', '2024-07-11 08:34:58', NULL),
(405, 186, 'upload/products/multi-image/1804278535433356.jpg', '2024-07-11 08:34:59', NULL),
(406, 187, 'upload/products/multi-image/1804278597090794.jpeg', '2024-07-11 08:35:57', NULL),
(407, 187, 'upload/products/multi-image/1804278597141062.jpeg', '2024-07-11 08:35:57', NULL),
(408, 188, 'upload/products/multi-image/1804278674731523.jpg', '2024-07-11 08:37:11', NULL),
(409, 188, 'upload/products/multi-image/1804278674831089.jpg', '2024-07-11 08:37:11', NULL),
(410, 189, 'upload/products/multi-image/1804278856754332.png', '2024-07-11 08:40:05', NULL),
(411, 190, 'upload/products/multi-image/1804278938554237.jpg', '2024-07-11 08:41:23', NULL),
(412, 191, 'upload/products/multi-image/1804278973245614.jpg', '2024-07-11 08:41:56', NULL),
(413, 191, 'upload/products/multi-image/1804278973338386.jpg', '2024-07-11 08:41:56', NULL),
(414, 191, 'upload/products/multi-image/1804278973429889.jpg', '2024-07-11 08:41:56', NULL),
(415, 193, 'upload/products/multi-image/1804279091725897.jpg', '2024-07-11 08:43:49', NULL),
(416, 193, 'upload/products/multi-image/1804279091806670.jpg', '2024-07-11 08:43:49', NULL),
(417, 194, 'upload/products/multi-image/1804279099386581.jpeg', '2024-07-11 08:43:56', NULL),
(418, 194, 'upload/products/multi-image/1804279099419032.jpeg', '2024-07-11 08:43:56', NULL),
(419, 195, 'upload/products/multi-image/1804279205788417.jpg', '2024-07-11 08:45:38', NULL),
(420, 195, 'upload/products/multi-image/1804279205843006.jpg', '2024-07-11 08:45:38', NULL),
(421, 197, 'upload/products/multi-image/1804279363568996.jpg', '2024-07-11 08:48:08', NULL),
(422, 197, 'upload/products/multi-image/1804279363598461.jpg', '2024-07-11 08:48:08', NULL),
(423, 198, 'upload/products/multi-image/1804279409234533.webp', '2024-07-11 08:48:52', NULL),
(424, 200, 'upload/products/multi-image/1804279486276964.jpg', '2024-07-11 08:50:05', NULL),
(425, 200, 'upload/products/multi-image/1804279486368538.jpg', '2024-07-11 08:50:05', NULL),
(426, 201, 'upload/products/multi-image/1804279540884692.jpeg', '2024-07-11 08:50:57', NULL),
(428, 206, 'upload/products/multi-image/1851214021194474.jpg', '2025-12-11 12:14:26', NULL),
(429, 206, 'upload/products/multi-image/1851214021315792.jpg', '2025-12-11 12:14:26', NULL),
(430, 206, 'upload/products/multi-image/1851214021428586.png', '2025-12-11 12:14:26', NULL),
(431, 224, 'upload/products/multi-image/1855257279258723.png', '2026-01-25 03:20:17', NULL),
(432, 224, 'upload/products/multi-image/1855257279494927.png', '2026-01-25 03:20:18', NULL),
(433, 224, 'upload/products/multi-image/1855257279775607.jpg', '2026-01-25 03:20:18', NULL),
(434, 225, 'upload/products/multi-image/1855257423138402.jpg', '2026-01-25 03:22:35', NULL),
(435, 225, 'upload/products/multi-image/1855257423425743.jpg', '2026-01-25 03:22:35', NULL),
(436, 227, 'upload/products/multi-image/1857449956794419.jpg', '2026-02-18 08:11:57', NULL),
(437, 227, 'upload/products/multi-image/1857449956902426.jpg', '2026-02-18 08:11:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Online, 2=>Offline',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `affiliate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazilla_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(25) NOT NULL DEFAULT 'cash',
  `payment_number` varchar(191) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(191) DEFAULT NULL,
  `payment_screenshot` varchar(191) DEFAULT NULL,
  `payment_status` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>paid, 0=>Unpaid',
  `payment_details` text DEFAULT NULL,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_type` varchar(100) DEFAULT NULL,
  `shipping_name` varchar(150) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `affiliate_commission` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice_no` varchar(255) NOT NULL,
  `viewed` varchar(255) NOT NULL DEFAULT '0',
  `delivery_viewed` varchar(255) NOT NULL DEFAULT '1',
  `payment_status_viewed` varchar(255) NOT NULL DEFAULT '1',
  `commission_calculated` varchar(255) NOT NULL DEFAULT '0',
  `comment` text DEFAULT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Pending, 1=>Confirmed, 2=>Processing, 3=>Shipped, 4=>Delivered, 5=>Canceled, 6=>Returned, 7=>Refunded, 8=>Failed',
  `tracking_code` varchar(100) DEFAULT NULL,
  `confirmed_date` varchar(30) DEFAULT NULL,
  `processing_date` varchar(30) DEFAULT NULL,
  `picked_date` varchar(30) DEFAULT NULL,
  `shipped_date` varchar(30) DEFAULT NULL,
  `delivered_date` varchar(30) DEFAULT NULL,
  `cancel_date` varchar(30) DEFAULT NULL,
  `return_date` varchar(30) DEFAULT NULL,
  `return_reason` text DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Not guest order, 2=>Guest Order',
  `is_vendor_order` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `coupon` varchar(50) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` bigint(20) DEFAULT 0,
  `vendor_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `is_varient` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Varient Product, 0=>Normal Product',
  `variation` longtext DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `tax` double(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(50,0) DEFAULT 0,
  `coupon` decimal(50,0) DEFAULT 0,
  `grand_total` decimal(50,0) NOT NULL DEFAULT 0,
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `shipping_type` varchar(255) DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `product_referral_code` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `invoice_no`, `product_id`, `vendor_id`, `vendor_order_id`, `product_name`, `is_varient`, `variation`, `qty`, `price`, `tax`, `shipping_cost`, `sub_total`, `coupon`, `grand_total`, `payment_status`, `shipping_type`, `pickup_point_id`, `product_referral_code`, `delivery_status`, `created_at`, `updated_at`) VALUES
(5, 11, '0000001', 63, 3, 5, 'Ruchi Puffed Rice (Muri) - 400gm', 0, NULL, '1', 57.00, 0.00, 0.00, 57, 0, 57, '0', NULL, NULL, NULL, '0', '2025-12-21 08:29:22', '2025-12-21 08:29:22'),
(6, 11, '0000001', 61, 6, 6, 'Kopiko Cappuccinoo Candy 1packet', 0, NULL, '1', 238.00, 0.00, 0.00, 238, 0, 238, '0', NULL, NULL, NULL, '0', '2025-12-21 08:29:22', '2025-12-21 08:29:22'),
(7, 11, '0000001', 195, NULL, 7, 'picurean Kitchen Series Cutting Board, 17.5-Inch × 13-Inch, Nutmeg', 0, NULL, '1', 480.00, 0.00, 0.00, 480, 0, 480, '0', NULL, NULL, NULL, '0', '2025-12-21 08:29:22', '2025-12-21 08:29:22'),
(8, 12, '0000012', 195, 50, 8, 'picurean Kitchen Series Cutting Board, 17.5-Inch × 13-Inch, Nutmeg', 0, NULL, '1', 480.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2025-12-22 03:48:47', '2025-12-22 03:48:47'),
(9, 12, '0000012', 204, 1, 9, 'Macey Hayes', 1, NULL, '1', 780.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2025-12-22 03:48:48', '2025-12-22 03:48:48'),
(10, 13, '0000013', 63, 3, 10, 'Ruchi Puffed Rice (Muri) - 400gm', 0, NULL, '1', 57.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2025-12-22 05:17:49', '2025-12-22 05:17:49'),
(11, 14, '0000014', 195, 50, 11, 'picurean Kitchen Series Cutting Board, 17.5-Inch × 13-Inch, Nutmeg', 0, NULL, '1', 480.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-08 09:55:01', '2026-01-08 09:55:01'),
(12, 64, '0000064', 195, 3, 27, 'picurean Kitchen Series Cutting Board, 17.5-Inch × 13-Inch, Nutmeg', 0, NULL, '1', 480.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-11 05:54:58', '2026-01-11 05:54:58'),
(13, 65, '0000065', 223, 5, 28, 'pastey delicious Cake', 0, NULL, '3', 380.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 10:46:50', '2026-01-25 10:46:50'),
(14, 65, '0000065', 225, 5, 28, 'Man Slim court', 0, NULL, '1', 5500.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 10:46:50', '2026-01-25 10:46:50'),
(15, 66, '0000066', 199, 0, NULL, 'Stainless Steel Measuring Cup Spoon Wooden Handle Food Coffee Flour Kitchen Baking Tool', 0, NULL, '1', 1800.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 11:06:14', '2026-01-25 11:06:14'),
(16, 67, '0000066', 199, 0, NULL, 'Stainless Steel Measuring Cup Spoon Wooden Handle Food Coffee Flour Kitchen Baking Tool', 0, NULL, '1', 1800.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 11:08:25', '2026-01-25 11:08:25'),
(17, 68, '0000068', 225, 5, 29, 'Man Slim court', 0, NULL, '1', 5500.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 11:15:43', '2026-01-25 11:15:43'),
(18, 69, '0000069', 223, 5, 30, 'pastey delicious Cake', 0, NULL, '2', 380.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 12:20:11', '2026-01-25 12:20:11'),
(19, 70, '0000070', 224, 2, 31, 'pastey delicious Cake', 0, NULL, '1', 380.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 12:23:10', '2026-01-25 12:23:10'),
(20, 71, '0000071', 225, 5, 32, 'Man Slim court', 0, NULL, '1', 5500.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-25 12:23:48', '2026-01-25 12:23:48'),
(21, 72, '0000072', 218, 8, 33, 'Demo Product Four', 0, NULL, '1', 100.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-26 09:26:43', '2026-01-26 09:26:43'),
(22, 73, '0000073', 226, 5, 34, 'Ila Whitaker', 1, NULL, '2', 47.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-01-27 05:28:01', '2026-01-27 05:28:01'),
(23, 74, '0000074', 226, 5, 35, 'Ila Whitaker', 1, NULL, '1', 47.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-02-01 10:20:21', '2026-02-01 10:20:21'),
(24, 75, '0000075', 225, 5, 36, 'Man Slim court', 0, NULL, '1', 5500.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-02-05 06:39:34', '2026-02-05 06:39:34'),
(25, 76, '0000076', 224, 2, 37, 'pastey delicious Cake', 0, NULL, '1', 380.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-02-11 18:51:46', '2026-02-11 18:51:46'),
(26, 77, '0000077', 224, 2, 38, 'pastey delicious Cake', 0, NULL, '1', 380.00, 0.00, 0.00, 0, 0, 0, '0', NULL, NULL, NULL, '0', '2026-02-14 11:12:33', '2026-02-14 11:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `name_bn` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `position` varchar(255) DEFAULT 'nav',
  `faq` text DEFAULT NULL,
  `faq_bn` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `about_bn` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `privacy_bn` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `terms_bn` text DEFAULT NULL,
  `help` text DEFAULT NULL,
  `help_bn` text DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name_en`, `name_bn`, `title`, `slug`, `description_en`, `description_bn`, `position`, `faq`, `faq_bn`, `about`, `about_bn`, `privacy`, `privacy_bn`, `terms`, `terms_bn`, `help`, `help_bn`, `status`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, NULL, NULL, NULL, NULL, 'nav', '<p>Hello&nbsp;</p>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" data-ved=\"2ahUKEwjntIe13tWEAxXoR2wGHTKSC1IQ3ewLegQIBRAU\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 32px; background-color: rgb(248, 249, 250); border-width: initial; border-style: none; padding-top: 2px; padding-right: 0.14em; padding-bottom: 2px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; overflow: hidden; width: 270px; text-wrap: wrap; overflow-wrap: break-word; color: rgb(32, 33, 36); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\"><span class=\"Y2IQFc\" lang=\"bn\">হ্যালো</span></pre>', '<p>Hello</p>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" data-ved=\"2ahUKEwjntIe13tWEAxXoR2wGHTKSC1IQ3ewLegQIBRAU\" dir=\"ltr\" style=\"font-size: 28px; unicode-bidi: isolate; margin-top: -2px; margin-bottom: -2px; overflow: hidden; padding-top: 2px; padding-right: 0.14em; padding-bottom: 2px; border-width: initial; border-style: none; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; line-height: 32px; background-color: rgb(248, 249, 250); position: relative; resize: none; width: 270px; text-wrap: wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"bn\">হ্যালো</span></pre>', '<p><span style=\"font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">Hello&nbsp;</span><br></p>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" data-ved=\"2ahUKEwjntIe13tWEAxXoR2wGHTKSC1IQ3ewLegQIBRAU\" dir=\"ltr\" style=\"font-size: 28px; unicode-bidi: isolate; margin-top: -2px; margin-bottom: -2px; overflow: hidden; padding-top: 2px; padding-right: 0.14em; padding-bottom: 2px; border-width: initial; border-style: none; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; line-height: 32px; background-color: rgb(248, 249, 250); position: relative; resize: none; width: 270px; text-wrap: wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"bn\">হ্যালো</span></pre>', '<p style=\"text-align: justify;\"><b>Eligible Items for Return:</b></p><ol><li style=\"text-align: justify;\">You may return most new, unopened items sold by [Company Name] within [Number] days of delivery for a full refund.</li><li style=\"text-align: justify;\">Items must be in their original, unopened packaging, including any manuals, warranty cards, or accessories.</li><li style=\"text-align: justify;\">Items showing signs of wear or use will not be accepted for return.</li></ol><p style=\"text-align: justify;\"><b><br></b></p><p style=\"text-align: justify;\"><b>Items Not Eligible for Return:</b></p><p style=\"text-align: justify;\">Items that are damaged or defective upon arrival must be reported within [Number] days of delivery. Please contact our customer service team for a replacement or refund.</p><p style=\"text-align: justify;\">[List any specific exclusions, e.g., downloadable products, personalized items, clearance items]</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\"><b>Return Process:</b></p><ol><li style=\"text-align: justify;\">To initiate a return, please visit our Returns Center on our website ([link to returns center]) or contact customer service at [phone number] or [email address].</li><li style=\"text-align: justify;\">You will be issued a Return Merchandise Authorization (RMA) number and instructions on how to return the item.</li><li style=\"text-align: justify;\">You are responsible for the cost of return shipping unless the item is defective or damaged upon arrival.</li><li style=\"text-align: justify;\">We recommend using a trackable shipping service for your return.</li><li style=\"text-align: justify;\">Refunds:</li><li style=\"text-align: justify;\">Once your return is received and inspected, we will send you a confirmation email.</li><li style=\"text-align: justify;\">Your refund will be processed within [Number] business days and will be issued in the original form of payment.</li><li style=\"text-align: justify;\"><br></li><li style=\"text-align: justify;\">Please note that return shipping costs will not be refunded.</li></ol><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><b>Additional Information:</b></div><div style=\"text-align: justify;\">We reserve the right to limit or refuse returns at our sole discretion. These terms and conditions are subject to change at any time without prior notice.</div><div style=\"text-align: justify;\"><br></div>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" data-ved=\"2ahUKEwjntIe13tWEAxXoR2wGHTKSC1IQ3ewLegQIBRAU\" dir=\"ltr\" style=\"font-size: 28px; unicode-bidi: isolate; margin-top: -2px; margin-bottom: -2px; overflow: hidden; padding-top: 2px; padding-right: 0.14em; padding-bottom: 2px; border-width: initial; border-style: none; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; line-height: 32px; background-color: rgb(248, 249, 250); position: relative; resize: none; width: 270px; text-wrap: wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"bn\">হ্যালো</span></pre>', '<p><span style=\"font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">Hello</span><br></p>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" data-ved=\"2ahUKEwjntIe13tWEAxXoR2wGHTKSC1IQ3ewLegQIBRAU\" dir=\"ltr\" style=\"font-size: 28px; unicode-bidi: isolate; margin-top: -2px; margin-bottom: -2px; overflow: hidden; padding-top: 2px; padding-right: 0.14em; padding-bottom: 2px; border-width: initial; border-style: none; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; line-height: 32px; background-color: rgb(248, 249, 250); position: relative; resize: none; width: 270px; text-wrap: wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"bn\">হ্যালো</span></pre>', 1, '2024-03-02 08:00:33', '2024-03-10 23:10:19');

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2024-02-06 00:14:41', '2024-02-06 00:14:59'),
(2, 'Check', '2024-02-06 00:15:08', '2024-02-06 00:15:08'),
(3, 'Bkash', '2024-02-06 00:15:56', '2024-02-06 00:15:56'),
(4, 'Rocket', '2024-02-06 00:16:13', '2024-02-06 00:16:13'),
(8, 'Paypal', '2024-02-06 00:17:35', '2024-02-06 00:17:35');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Single Product, 2=>Group Product',
  `brand_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `sub_sub_category_id` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `campaing_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(150) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `unit_weight` varchar(255) DEFAULT NULL,
  `purchase_price` double NOT NULL DEFAULT 0,
  `is_wholesell` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Wholesell, 0=>Not Wholesell',
  `wholesell_price` double NOT NULL DEFAULT 0,
  `wholesell_minimum_qty` int(11) NOT NULL DEFAULT 0,
  `regular_price` double NOT NULL DEFAULT 0,
  `discount_price` double NOT NULL DEFAULT 0,
  `discount_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Flat, 2=>Percentage',
  `minimum_buy_qty` int(11) NOT NULL DEFAULT 1,
  `stock_qty` int(11) NOT NULL DEFAULT 0,
  `product_thumbnail` varchar(255) DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `short_description_bn` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `attributes` varchar(255) DEFAULT NULL,
  `is_varient` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Varient, 0=>Not Varient',
  `attribute_values` varchar(255) DEFAULT NULL,
  `variations` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Featured, 0=>Not Featured',
  `is_replaceable` tinyint(4) NOT NULL DEFAULT 0,
  `is_deals` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Deals, 0=>Not Deals',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `is_approved` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Approved, 0=>Not Approved',
  `is_digital` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Digital, 0=>Not Digital',
  `is_affiliate` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Nor Affiliate, 1=>Affiliate',
  `points` bigint(20) DEFAULT NULL,
  `views` varchar(255) NOT NULL DEFAULT '0',
  `authenticity_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_type`, `brand_id`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `tags`, `vendor_id`, `supplier_id`, `unit_id`, `campaing_id`, `name_en`, `name_bn`, `slug`, `product_code`, `unit_weight`, `purchase_price`, `is_wholesell`, `wholesell_price`, `wholesell_minimum_qty`, `regular_price`, `discount_price`, `discount_type`, `minimum_buy_qty`, `stock_qty`, `product_thumbnail`, `short_description_en`, `short_description_bn`, `description_en`, `description_bn`, `attributes`, `is_varient`, `attribute_values`, `variations`, `is_featured`, `is_replaceable`, `is_deals`, `status`, `is_approved`, `is_digital`, `is_affiliate`, `points`, `views`, `authenticity_status`, `created_by`, `created_at`, `updated_at`) VALUES
(227, 1, 0, 77, NULL, NULL, NULL, 0, 0, 0, NULL, 'SS Sky Stunner Kashmir Willow Cricket Bat (Painted) -SH', 'SS Sky Stunner Kashmir Willow Cricket Bat (Painted) -SH', 'SS-Sky-Stunner-Kashmir-Willow-Cricket-Bat-Painted--SH-JyxiR', '64677', NULL, 20, 0, 0, 0, 25, 3, 1, 1, 10, 'upload/products/thumbnails/1857449956708855.jpg', '<p>Product size</p>\r\n\r\n<ul>\r\n	<li>Height: 84.45 CM</li>\r\n	<li>Width: 11.43 CM</li>\r\n	<li>Length: 3.8 CM</li>\r\n	<li>Weight range: 1140 to 1200 grams</li>\r\n</ul>', NULL, '<p>Product size</p>\r\n\r\n<ul>\r\n	<li>Height: 84.45 CM</li>\r\n	<li>Width: 11.43 CM</li>\r\n	<li>Length: 3.8 CM</li>\r\n	<li>Weight range: 1140 to 1200 grams</li>\r\n</ul>', '<p>Product size</p>\r\n\r\n<ul>\r\n	<li>Height: 84.45 CM</li>\r\n	<li>Width: 11.43 CM</li>\r\n	<li>Length: 3.8 CM</li>\r\n	<li>Weight range: 1140 to 1200 grams</li>\r\n</ul>', '[]', 0, '[]', NULL, 1, 0, 0, 1, 1, 0, 0, 0, '34', 1, 4, '2026-02-18 08:11:57', '2026-02-19 04:57:26'),
(228, 1, 34, 77, NULL, NULL, NULL, 5, 0, 3, NULL, 'SS Dhoni Thala 2.0 English Willow Cricket Bat – SH', 'SS Dhoni Thala 2.0 English Willow Cricket Bat – SH', 'SS-Dhoni-Thala-20-English-Willow-Cricket-Bat--SH-52GkR', '27264', NULL, 220, 0, 0, 0, 320, 20, 1, 1, 2, 'upload/products/thumbnails/1857496837375851.jpg', '<p>Product size</p>\r\n\r\n<ul>\r\n	<li>Height: 84.45 CM</li>\r\n	<li>Width: 11.43 CM</li>\r\n	<li>Length: 3.8 CM</li>\r\n	<li>Weight range: 1140 to 1200 grams</li>\r\n</ul>', NULL, '<p><strong>SS Dhoni Thala 2.0 English Willow Cricket Bat SH</strong></p>\r\n\r\n<ul>\r\n	<li>Selected English Willow Grade 2</li>\r\n	<li>Air Dried Willow</li>\r\n	<li>Designed as per specifications of world Top Players</li>\r\n	<li>Latest Shape with massive concave TON edges enable high impact with optimum performance</li>\r\n	<li>Embossed Chrome Sticker with High quality grip</li>\r\n	<li>Wide Play area with Clean bat face</li>\r\n	<li>Premium/ Portable SS bat Cover</li>\r\n	<li>Proud to be Made in India</li>\r\n	<li>Manufactured and Marketed by: Sareen Sports Industries (Salarpur, near Translam Academy, Mawana Road, Meerut &ndash; 250001 Uttar Pradesh India)</li>\r\n</ul>', '<p><strong>SS Dhoni Thala 2.0 English Willow Cricket Bat SH</strong></p>\r\n\r\n<ul>\r\n	<li>Selected English Willow Grade 2</li>\r\n	<li>Air Dried Willow</li>\r\n	<li>Designed as per specifications of world Top Players</li>\r\n	<li>Latest Shape with massive concave TON edges enable high impact with optimum performance</li>\r\n	<li>Embossed Chrome Sticker with High quality grip</li>\r\n	<li>Wide Play area with Clean bat face</li>\r\n	<li>Premium/ Portable SS bat Cover</li>\r\n	<li>Proud to be Made in India</li>\r\n	<li>Manufactured and Marketed by: Sareen Sports Industries (Salarpur, near Translam Academy, Mawana Road, Meerut &ndash; 250001 Uttar Pradesh India)</li>\r\n</ul>', '[]', 0, '[]', NULL, 1, 0, 0, 1, 1, 0, 0, 0, '5', 1, 4, '2026-02-18 20:37:06', '2026-02-19 04:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `varient` varchar(50) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `qty` mediumint(9) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returning_products`
--

CREATE TABLE `returning_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ordered_product_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `issue` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>not replace, 1=>replaced',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_requests`
--

CREATE TABLE `return_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved,2=Rejected,3=Returned, 4=> Modified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_requests`
--

INSERT INTO `return_requests` (`id`, `user_id`, `order_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(9, 94, 64, 'dsdfsdf', 0, '2026-01-11 08:03:12', '2026-01-11 08:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `product_id` tinyint(3) UNSIGNED NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `verified_purchase` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Approved, 0=>Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `body`, `image`, `verified_purchase`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 195, 5.00, 'Excellent product! Highly recommended.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(5, 2, 195, 4.00, 'Very good, but could be better.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(3, 34, 195, 5.00, 'Solid product. Easy to use and does exactly what I needed. Just wish the battery lasted a bit longer.', '[\"FrontEnd\\/img\\/review\\/1748083363_online_hut.png\",\"FrontEnd\\/img\\/review\\/1748083363_499146670_705265695699969_9142024917878484871_n.jpg\"]', 1, 1, '2025-05-24 10:42:43', '2025-05-24 10:42:43'),
(6, 3, 195, 5.00, 'Loved it! Works perfectly.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(7, 4, 195, 3.00, 'It was okay, nothing special.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(8, 5, 195, 2.00, 'Not satisfied. Quality can be improved.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(9, 6, 195, 4.00, 'Good value for the money.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(10, 7, 195, 5.00, 'Fantastic! Will buy again.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(11, 8, 195, 3.00, 'Average experience overall.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(12, 9, 195, 4.00, 'Good build, fast delivery.', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(13, 10, 195, 5.00, 'Exceeded expectations!', NULL, 1, 1, '2025-05-24 11:48:58', '2025-05-24 11:48:58'),
(14, 34, 204, 4.00, 'Good product', '[]', 1, 1, '2025-05-29 05:27:06', '2025-05-29 05:27:06'),
(15, 36, 199, 5.00, 'Awesome Product', '[]', 1, 1, '2025-07-14 14:59:56', '2025-07-14 14:59:56'),
(16, 42, 199, 5.00, 'good product', '[]', 1, 1, '2025-08-12 10:56:46', '2025-08-12 10:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `permissions` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '[\"1\",\"2\",\"4\",\"5\",\"6\",\"8\",\"9\",\"10\",\"17\",\"18\",\"19\"]', '2022-09-27 23:05:01', '2022-10-08 01:59:44'),
(2, 'Accountant', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"13\",\"14\",\"15\",\"16\",\"17\",\"41\",\"42\",\"43\",\"44\"]', '2022-09-27 23:06:43', '2022-09-27 23:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `seller_penalties`
--

CREATE TABLE `seller_penalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `type` varchar(191) NOT NULL,
  `reason` text DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Zerox Sports', '2022-08-21 20:57:04', '2026-02-14 20:07:08'),
(2, 'site_logo', 'upload/setting/logo/1771449427IMG_6061.PNG', '2022-08-03 06:46:20', '2026-02-18 21:17:07'),
(3, 'site_favicon', 'upload/setting/favicon/1771447198LOGO FINAL.png', '2022-08-04 06:46:20', '2026-02-18 20:39:58'),
(4, 'site_footer_logo', 'upload/setting/logo/1771448148LOGO FINAL.-1.png', '2022-08-03 06:46:20', '2026-02-18 20:55:48'),
(5, 'phone', '+39 350 802 0301', '2022-08-04 06:47:27', '2026-02-17 11:58:21'),
(6, 'email', 'info.zeroxsports@gmail.com', '2022-08-12 06:47:52', '2026-02-18 19:38:10'),
(7, 'business_name', 'Zerox Sports', '2022-08-08 06:48:27', '2026-02-14 20:07:08'),
(8, 'business_address', 'Via di Tor Pignattara 60, 00176 Rome, Italy', '2022-08-04 06:48:53', '2026-02-18 20:29:17'),
(9, 'business_hours', 'Always Open', '2022-08-01 06:49:29', '2023-02-20 00:36:26'),
(10, 'copy_right', 'Copy Right zeroxsports.com 2025', '2022-08-05 06:49:58', '2026-02-14 20:07:08'),
(11, 'developed_by', 'Classic IT & Sky Mart Ltd.', '2022-08-14 06:50:24', NULL),
(12, 'developer_link', 'https://www.classicit.com.bd/', '2022-08-13 06:50:56', NULL),
(13, 'facebook_url', '#', '2022-08-18 06:51:19', '2023-08-30 07:09:20'),
(14, 'twitter_url', '#', '2022-08-17 06:51:45', '2023-08-30 07:09:20'),
(15, 'linkedin_url', '#', '2022-08-12 06:52:12', '2023-08-30 07:09:20'),
(16, 'youtube_url', '#', '2022-08-04 06:52:42', '2023-08-30 07:09:20'),
(17, 'instagram_url', '#', '2022-08-11 06:53:11', '2023-08-30 07:09:20'),
(18, 'pinterest_url', '#', '2022-08-05 06:53:45', '2023-08-30 07:09:20'),
(19, 'guest_checkout', '1', '2022-09-20 23:45:31', '2022-09-20 23:45:31'),
(20, 'otp_system', '0', '2022-09-20 23:45:31', '2022-10-23 21:27:39'),
(21, 'multi_vendor', '1', '2022-10-07 22:08:02', '2023-09-03 21:17:37'),
(22, 'short_description', 'Fuel your game with top-quality cricket gear. Built for champions, trusted by players, delivered to your doorstep.', NULL, '2026-02-18 16:46:02'),
(23, 'order_return_duration', '7', '2024-03-14 00:48:04', '2025-05-29 04:05:31'),
(24, 'commission_rate', '2', '2025-05-29 04:05:08', '2025-05-29 04:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Inside Dhaka, 2=>Outside Dhaka',
  `shipping_charge` double(20,2) NOT NULL DEFAULT 0.00,
  `time` varchar(50) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `type`, `shipping_charge`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Redex', 1, 80.00, '45 minutes', 1, '2022-09-02 21:40:16', '2022-09-02 21:40:16'),
(2, 'Sundarban Courier', 2, 150.00, '1 day', 1, '2022-09-02 21:39:25', '2022-09-02 21:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `title_en` varchar(50) NOT NULL,
  `title_bn` varchar(50) DEFAULT NULL,
  `slider_url` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title_en`, `title_bn`, `slider_url`, `description_bn`, `description_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(8, 'upload/slider/1771330673psl-banner11.webp', 'Banner', 'Banner', NULL, 'Banner', 'Banner', 'banner', 1, '2026-02-17 12:17:53', '2026-02-17 12:17:53'),
(11, 'upload/slider/1857492422674672.webp', 'test', 'test', 'test', 'test', 'test', 'test', 1, '2026-02-18 19:26:56', '2026-02-18 19:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `sms_providers`
--

CREATE TABLE `sms_providers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `url` varchar(100) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_providers`
--

INSERT INTO `sms_providers` (`id`, `name`, `status`, `url`, `api_key`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 'Classic IT', 1, 'http://sms.classicit.com.bd/smsapi', 'R6001640623a9516bf1f71.13295352', 'Classic IT', '2022-04-25 15:27:37', '2022-05-24 05:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `body` varchar(250) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_templates`
--

INSERT INTO `sms_templates` (`id`, `name`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'registration_verification', '[[site_name]] রেজিস্ট্রেশন ভেরিফিকেশন কোডঃ [[code]]', 1, '2022-04-25 16:02:02', '2022-04-25 16:07:22'),
(2, 'login_verification', '[[site_name]] লগিন ভেরিফিকেশন কোডঃ [[code]]', 1, '2022-04-25 16:02:46', '2022-04-25 16:07:36'),
(3, 'order_message', 'আপনার অর্ডার সম্পন্ন হয়েছে। অর্ডার  আইডিঃ [[order_code]], মূল্যঃ [[order_amount]] টাকা। - [[site_name]]', 1, '2022-04-25 16:03:12', '2022-05-24 05:38:23'),
(5, 'password_reset', 'আপনার নতুন পাসওয়ার্ডঃ [[code]]', 1, '2022-06-22 00:42:46', '2022-06-22 00:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'aghuedgdeg@hhfsdfhg', '2022-11-06 23:52:32', '2022-11-06 23:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_bn` varchar(50) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Featured, 0=>Not Featured',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_bn` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `subsubcategory_image` varchar(255) DEFAULT NULL,
  `is_feature` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `address`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 'Test Supplier', '01700103040', 'testsupplier@gmail.com', 'Test supplier', 1, 4, NULL, '2024-02-04 00:56:20'),
(7, 'amir hossain', '01730170899', 'testvendor3@gmail.com', 'dghdhd', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `tag_slug_en` varchar(255) DEFAULT NULL,
  `tag_slug_bn` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_bn` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'gm', 1, 4, '2023-08-30 13:54:21', '2023-08-30 13:54:21'),
(4, 'kg', 1, 4, '2023-08-30 13:54:26', '2023-08-30 13:54:26'),
(5, 'Ltr', 1, 4, '2023-08-30 13:54:42', '2023-08-30 13:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name_en` varchar(25) NOT NULL,
  `name_bn` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `district_id`, `name_en`, `name_bn`, `url`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    '),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd'),
(311, 53, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd'),
(312, 53, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd'),
(313, 53, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd'),
(314, 53, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd'),
(315, 53, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd'),
(316, 53, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd'),
(317, 54, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd'),
(318, 54, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd'),
(319, 54, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd'),
(320, 54, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd'),
(321, 54, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd'),
(322, 55, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd'),
(323, 55, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd'),
(324, 55, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd'),
(325, 55, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd'),
(326, 55, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd'),
(327, 55, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd'),
(328, 56, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd'),
(329, 56, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd'),
(330, 56, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd'),
(331, 56, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd'),
(332, 56, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd'),
(333, 57, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd'),
(334, 57, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd'),
(335, 57, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd'),
(336, 57, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd'),
(337, 57, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd'),
(338, 57, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd'),
(339, 57, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd'),
(340, 57, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd'),
(341, 57, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd'),
(342, 57, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd'),
(343, 57, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd'),
(344, 57, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd'),
(345, 58, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd'),
(346, 58, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd'),
(347, 58, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd'),
(348, 58, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd'),
(349, 58, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd'),
(350, 58, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd'),
(351, 58, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd'),
(352, 58, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd'),
(353, 58, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd'),
(354, 58, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd'),
(355, 58, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd'),
(356, 58, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd'),
(357, 58, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd'),
(358, 59, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd'),
(359, 59, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd'),
(360, 59, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd'),
(361, 59, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd'),
(362, 59, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd'),
(363, 59, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd'),
(364, 59, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd'),
(365, 52, 'Savar', 'সাভার', 'savar.dhaka.gov.bd'),
(366, 52, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd'),
(367, 52, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd'),
(368, 52, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd'),
(369, 52, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd'),
(370, 60, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd'),
(371, 60, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd'),
(372, 60, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd'),
(373, 60, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd'),
(374, 60, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd'),
(375, 60, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd'),
(376, 61, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd'),
(377, 61, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd'),
(378, 61, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd'),
(379, 61, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd'),
(380, 61, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd'),
(381, 62, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd'),
(382, 62, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd'),
(383, 62, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd'),
(384, 62, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd'),
(385, 64, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd'),
(386, 64, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd'),
(387, 64, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd'),
(388, 64, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd'),
(389, 64, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd'),
(390, 63, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd'),
(391, 63, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd'),
(392, 63, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd'),
(393, 63, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd'),
(394, 63, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd'),
(395, 63, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd'),
(396, 63, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd'),
(397, 63, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd'),
(398, 63, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd'),
(399, 40, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd'),
(400, 40, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd'),
(401, 40, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd'),
(402, 40, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd'),
(403, 40, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd'),
(404, 41, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd'),
(405, 41, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd'),
(406, 41, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd'),
(407, 41, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd'),
(408, 41, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd'),
(409, 41, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd'),
(410, 41, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd'),
(411, 41, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd'),
(412, 41, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd'),
(413, 41, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd'),
(414, 41, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd'),
(415, 41, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd'),
(416, 41, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd'),
(417, 42, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd'),
(418, 42, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd'),
(419, 42, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd'),
(420, 42, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd'),
(421, 42, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd'),
(422, 43, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd'),
(423, 43, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd'),
(424, 43, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd'),
(425, 43, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd'),
(426, 43, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd'),
(427, 43, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd'),
(428, 44, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd'),
(429, 44, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd'),
(430, 44, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd'),
(431, 44, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd'),
(432, 44, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd'),
(433, 44, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd'),
(434, 44, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd'),
(435, 45, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd'),
(436, 45, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd'),
(437, 45, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd'),
(438, 45, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd'),
(439, 45, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd'),
(440, 46, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd'),
(441, 46, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd'),
(442, 46, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd'),
(443, 46, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd'),
(444, 46, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd'),
(445, 46, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd'),
(446, 46, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd'),
(447, 46, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd'),
(448, 47, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd'),
(449, 47, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd'),
(450, 47, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd'),
(451, 47, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd'),
(452, 47, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd'),
(453, 47, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd'),
(454, 47, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd'),
(455, 47, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd'),
(456, 47, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd'),
(457, 49, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd'),
(458, 49, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd'),
(459, 49, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd'),
(460, 49, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd'),
(461, 49, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd'),
(462, 50, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd'),
(463, 50, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd'),
(464, 50, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd'),
(465, 50, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd'),
(466, 50, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd'),
(467, 50, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd'),
(468, 50, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd'),
(469, 50, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd'),
(470, 50, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd'),
(471, 50, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd'),
(472, 50, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd'),
(473, 50, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd'),
(474, 50, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd'),
(475, 47, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd'),
(476, 47, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd'),
(477, 47, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd'),
(478, 47, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd'),
(479, 47, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd'),
(480, 47, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd'),
(481, 47, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd'),
(482, 0, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd'),
(483, 0, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd'),
(484, 51, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd'),
(485, 51, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd'),
(486, 51, 'Madan', 'মদন', 'madan.netrokona.gov.bd'),
(487, 51, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd'),
(488, 51, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd'),
(489, 51, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd'),
(490, 51, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd'),
(491, 51, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 3 COMMENT '1=>Admin, 2=>Vendor,3=>User,4=>Guest User',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pickup_address` varchar(191) DEFAULT NULL,
  `warehouse_address` varchar(191) DEFAULT NULL,
  `office_address` varchar(191) DEFAULT NULL,
  `division` bigint(20) UNSIGNED DEFAULT NULL,
  `district` bigint(20) UNSIGNED DEFAULT NULL,
  `upazilla` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_zone` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1= Dhaka,2=Outside Dhaka',
  `map_location` varchar(191) DEFAULT NULL,
  `profile_image` varchar(256) DEFAULT NULL,
  `points` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `phone`, `email`, `address`, `pickup_address`, `warehouse_address`, `office_address`, `division`, `district`, `upazilla`, `shipping_zone`, `map_location`, `profile_image`, `points`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'Guest User', 'guest-user', '01601020304', 'guestuser@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1663045118avatar5.png', NULL, NULL, '$2y$10$iy93F5hZNH/zmluBuHBm5.1.hUsNJVR5PauM4Nu4Dg0rt5dBhoODK', 1, NULL, '2022-07-29 21:25:27', '2024-02-06 18:52:10'),
(4, 1, 'Admin', 'admin', '017010407080', 'admin@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '202208201411avatar5.png', NULL, NULL, '$2y$10$0p30SP76VnnPYlwKgMIj9uKKplvzshIdXlv8Ekx5XDW.zRdeoeR9m', 1, NULL, '2022-08-12 17:46:40', '2022-08-20 02:11:59'),
(23, 2, 'Test Vendor', 'Test-Vendor-YhB9T', '01900201040', 'testvendor@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$idvPLWfdLMIiUEfOH96QFeSTgcDBGhza3j2pK8L1oACN3/xf9NeMS', 1, NULL, '2023-01-30 20:06:35', '2024-03-09 06:05:04'),
(24, 3, 'sunny', 'sadekchowdhury', '01799382934', 'sadek@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, '$2y$10$B752HQnLWRvP9zPOk6gETOpUQfjLsCQGrhkipPyg25dhRQ0j2vLZe', 1, NULL, '2023-10-16 19:45:30', '2024-02-06 22:46:05'),
(25, 3, 'Sadek', NULL, '01620132642', 'i.ahmed0730@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'uploads/users/1827921300.jpg', NULL, NULL, '$2y$10$0p30SP76VnnPYlwKgMIj9uKKplvzshIdXlv8Ekx5XDW.zRdeoeR9m', 1, NULL, '2024-02-04 20:51:52', '2024-02-04 20:51:52'),
(26, 3, 'Abdul khalid Mubasshar Chawdhury', NULL, '01330170890', 'abdul@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'uploads/users/849378541.jpg', 420, NULL, '$2y$10$q8sGmsA1NkTjxrydBIy5GeHyub61SGb/8MH4ZtbxHJ6LYf.pDHHye', 1, NULL, '2024-02-04 20:55:24', '2024-03-09 03:52:25'),
(27, 3, 'Imran', 'a1', '01620132644', 'admin@yahool.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$1EVqOm84bFBc2Eb.PBMXWOKhhrw/kfIy3KamKMqsOV5.8VD0SyOaO', 1, NULL, '2024-02-14 01:58:58', '2024-02-14 01:58:58'),
(28, 3, 'apon', 'apon', '01730170899', 'A@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$bijSkCXpo8mZOTUM5VrYvuXkoRiOjn/nRX37YgHXfSYRxBPwlDRa.', 1, NULL, '2024-02-14 02:00:29', '2024-02-14 02:00:29'),
(29, 2, 'lio', 'loi-JcKT2', '01620132641', 's1638@gmail.com', 'dfh', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$XZ7uq8e0DySMULn4inrkfOqS6AJvt43nomA.Mpi8ecNFRqsrQR5xi', 0, NULL, '2024-03-14 09:54:24', '2024-03-14 09:54:24'),
(30, 2, 'fgyjjf', 'dfjdfzjhxdth-DF4hJ', '01330174899', 'admin56@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$eC5SPukPKZ0D0r78SDhPXu78yDnhYEkKCfkI3AvZVZ6joHrbBtyQ6', 0, NULL, '2024-03-14 09:55:34', '2024-03-14 09:55:34'),
(31, 2, 'Arif', 'Arif-Furniture67-wZm0w', '01730170896', 'qwer@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$4qq3UkUxjO7cDx1cZkEVt.uvsg4z1e.0PH7cX7hX02cn0FiMJ8Vy.', 1, NULL, '2024-03-14 10:10:14', '2024-03-14 10:10:55'),
(32, 2, 'Rahman', 'Rahmans-Parlour-xhJTK', '01730170894', 'rahman@gmail.com', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$YNCtaU3Ewh5SOsKQT0bug.WYoYd8y7yKVe2FV.8uCW8etAv5Onssy', 1, NULL, '2024-03-16 03:24:05', '2025-05-25 11:36:42'),
(33, 2, 'tahsin rahman', 'tah-4eZlI', '01478965412', 'tt@gmail.com', 'ddd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$/seTEmNLi3N5dOk2A4Ow7Ow.dcmp8DEAnaQbdg5aJw2kvLZMeA34u', 0, NULL, '2025-05-06 05:46:52', '2025-05-06 05:46:52'),
(36, 3, 'Md Abu Taher', 'Taher', '01645787748', 'mdabutaher4854@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1752125599taher.png', 0, NULL, '$2y$10$Fo36UP3YXJIhDe8EYKQGDurdzxD6oj7HTBIMqufDu7LCJCHZDFM2K', 1, NULL, '2025-07-10 05:33:01', '2026-02-14 11:14:25'),
(37, 3, 'RAJIN Alom', 'RAJIN', '01772249452', 'rajinalom61@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$7iyY7NXatflJz7ATBidlsuLOSq9WcjvtZx/vHN7WkLoeZAZWNuc0q', 1, NULL, '2025-07-18 00:11:19', '2025-07-18 00:11:19'),
(38, 3, 'Momtaz Sultana', 'Momtaz', '01912696307', 'momtazsultana507@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$2C.zERcRpIkd3cejPm5D/OX9hPD7e67a57U2lCVkBfgAA9v5bEEGO', 1, NULL, '2025-07-21 23:14:39', '2025-07-21 23:14:39'),
(39, 3, 'Mst', 'Rezina', '01768802034', 'rojinakhatun6880@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$hVU4/ORZCIkzvsQ.oeSdseRQhHcsJZdihSLPtzovND/6Xs3RNNdPq', 1, NULL, '2025-07-22 19:41:45', '2025-07-22 19:41:45'),
(40, 3, 'Md Ariful Islam', 'Fira', '01924863192', 'i.nabiul15@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$x2gzs/otmVFG9UwozelyieFTia1CbRzN.fnDQmxaoCKMYsGOIaDV6', 1, NULL, '2025-07-22 19:45:29', '2025-07-22 19:45:29'),
(41, 3, 'Md. Selim Reza', 'Md  Selim Reza', '01725337116', 'msrezaiu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$bdEhd98Hl9KvifExICgtheM/K1HPduhNW1iR7YEpkpLJlpPbU7eDG', 1, NULL, '2025-07-22 20:11:37', '2025-07-22 20:11:37'),
(42, 3, 'Sakib Sheikh', 'sakib123', '01624316680', 'shakibsheikh9678@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1769936325sakib-img.png', 0, NULL, '$2y$10$/B6FF7cjMEZCgQPW3eIb2.G4VQl1zrXWOYw4L5oICFJ.FjYdFaedC', 1, NULL, '2025-07-24 15:33:40', '2026-02-01 08:58:45'),
(43, 3, 'Kaniz Fatema', 'Fatema', '01708900098', 'hijabiqueenkaniz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/17537262301753448148585.jpg', NULL, NULL, '$2y$10$NamNJl0TLqn2MxVcnyoKcea8BIvB49kOTxtQBid4g1TUrES5eIJRa', 1, NULL, '2025-07-29 00:09:41', '2025-07-29 00:10:30'),
(44, 3, 'Farjana Akter', 'Farjana Akter', '01892172314', 'farjanaakter1686@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$/pIk6s9.XmBsXjQUUM9ImuyDDE3FYQ87pd5Lwnd6Lxqa4CRCh5W5W', 1, NULL, '2025-07-30 23:05:55', '2025-07-30 23:05:55'),
(45, 3, 'মোঃ ময়নুল ইসলাম', 'মোঃ ময়নুল ইসলাম', '01778806044', 'moynulislam017788@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$bh5A8X0H4aXWA3fRNqi8B.qAmgK2HaAi0t5CLW.KfxVVBKv.sR.z6', 1, NULL, '2025-07-31 22:47:52', '2025-07-31 22:47:52'),
(46, 3, 'Salman Sahriar', 'Salman07', '01738769006', 'sahriarsalman18@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1754241868Salman.jpg', NULL, NULL, '$2y$10$avykquRxDBSDxcgb3D3nROSlUxQEaZHh5Qmfb7SiwwuoggcrLIDdG', 1, NULL, '2025-08-03 23:23:18', '2025-08-03 23:24:28'),
(47, 3, 'Sidratul Siam', 'Siam', '01622874719', 'sidr9294@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$07DAlzuIDGpdDpmt3lGjsON7fnmHYCY0wron5nB4zMJg0b4xIw5sm', 1, NULL, '2025-08-05 12:23:14', '2025-08-05 12:23:14'),
(48, 3, 'Sabbir Hossain', 'sabbir_420', '01634321507', 'sabbirhossainbdt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$qlqyGBLlBdcI.RybO5Oe..Gpn.zav23/79Uu9u5cyDqU1DMWXp1aW', 1, NULL, '2025-08-06 11:31:38', '2025-08-06 11:31:38'),
(49, 3, 'Nafis Iqbal', 'nafis540', '01304423976', 'nafisstudent329@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1754887245IMG_20250716_033740_512.jpg', NULL, NULL, '$2y$10$1DskgdpcG32TYvh4HRdl/.vTzksamcRScNKi3Bd1eTqN2XKgidqJu', 1, NULL, '2025-08-11 10:39:51', '2025-08-11 10:40:45'),
(50, 3, 'riyan chowdhury', 'riyanchowdhu518', '01871127848', 'chowdhuryriyan203@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$laRm16581yw6ApKJRCd9Z.5.zSv.RieFX89l/J3XrJJX7QAjzAM9u', 1, NULL, '2025-08-14 11:44:55', '2025-08-14 11:44:55'),
(51, 3, 'Aysha Aktar', 'Aysha96', '01749140934', 'moontahaislam97@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1755192827IMG_20250615_183941.jpg', NULL, NULL, '$2y$10$/9JoTUaxiust6p2gs7ow8OCntMfN88H5HH96.FzOC92H4cRf5jnCa', 1, NULL, '2025-08-14 23:32:10', '2025-08-14 23:33:47'),
(52, 3, 'Md.Sejaynul (Sajeb)', 'sejayanul30', '01710815200', 'sejayanul2006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1755440347pic-4.png', NULL, NULL, '$2y$10$/NvcMqQ5wxKKTf4NdGYboOoKGYa7aDvIhGyemSnuR3rbgdsHnZf0G', 1, NULL, '2025-08-17 20:18:46', '2025-08-17 20:19:07'),
(53, 3, 'Amena', 'amena0987', '01315617713', 'amenaafruj839@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1755514272Snapchat-984156471.jpg', NULL, NULL, '$2y$10$Ff.JK8M9rLu5matz962Viu4xNghDg9iRN8EjYfMqM0MN04pafPXGC', 1, NULL, '2025-08-17 22:13:05', '2025-08-18 16:51:12'),
(54, 3, 'Most Ashrafun Nessa', 'ashrafunnessa75', '01302553824', 'Ashrafunnessa750@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1755513575IMG20241028080742.jpg', NULL, NULL, '$2y$10$X76xV0vd9gUOuDepl08Is.klKU4NR5AS/xUCClVGmSjqBtGKqqdAe', 1, NULL, '2025-08-18 16:38:54', '2025-08-18 16:39:35'),
(55, 3, 'MD.Rakib Hossen', 'MD.Rakib Hossen', '01603969183', 'rakib162008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/175557042220250727_220158~2.jpg', NULL, NULL, '$2y$10$dwG8DlvTGJ07aFNhbBBvY.uRBS0JofW83zhK0KVoKm56CkCsI3K7.', 1, NULL, '2025-08-19 08:25:37', '2025-08-19 08:27:02'),
(56, 3, 'sufia akter', 'Sufiaakter', '01737455978', 'aktersufia506@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$ecfFz0MNUNXuxXI4p3iFVOs7cg6ZEPFmQ1xAJvaNFy/8vtQdWwj0u', 1, NULL, '2025-08-23 21:52:29', '2025-08-23 21:52:29'),
(57, 3, 'Md Shihab Uddin', 'Md Shihab Uddin', '01778095805', 'hmdshihab487@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$HIBtS0YD5dgexZcoH0.o2.aVi2TSkHRClWlThnI7LQCDX5GxbHeIG', 1, NULL, '2025-08-24 05:49:57', '2025-08-24 05:49:57'),
(58, 3, 'MD Sakib Al hasan', 'Santo', '01965734512', 'saleha33sakib33@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1756646884Generated Image August 31, 2025 - 8_24AM.jpeg', NULL, NULL, '$2y$10$qfZgwqAwl9L6lDnFyUwNGuB59lFfAf4jPK5ns.rFF2e0i9GzUgAEW', 1, NULL, '2025-08-31 19:27:45', '2025-08-31 19:28:04'),
(59, 3, 'Mst Shathi Akter', 'Shathi Akter', '01406313675', 'Shathiaktermax121@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$26tCksE.6eqD4gwEEJa4iuzmpqYUaSjevicS6RgUdjmXZ6Rk.h8Aa', 1, NULL, '2025-09-07 13:18:43', '2025-09-07 13:18:43'),
(60, 3, 'Siam Mujtahid', 'siammujtahid', '01313723985', 'siammujahid@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$BZLdOq2xWnmFm5ZgbOWqxO9.kkvpbtxZQtWgwgg/u.6RHoDupmH9K', 1, NULL, '2025-09-09 11:53:06', '2025-09-09 11:53:06'),
(61, 3, 'MD SHORIF HASAN', 'Shorif807', '01977924807', 'mdshorifhasan811@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$3w7nGcBrsotp7kABWxqv3OEGClwY00b9c61SLRfKV5MIs4dVLg6JO', 1, NULL, '2025-09-09 12:03:43', '2025-09-09 12:03:43'),
(62, 3, 'Mst Mouluda Begum', 'Mst Mouluda Begum', '01792741818', 'minizm4314@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$a4vGzTIw/k8AOxHn8GWC1e7G.IiZZ42Ks6zFVjjB/lz2AIYU03rc.', 1, NULL, '2025-09-15 18:50:45', '2025-09-15 18:50:45'),
(63, 3, 'Creative Canvas', 'GS', '01831116680', 'gopalsarker6680@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1758273755cc.jpg', NULL, NULL, '$2y$10$lSBXD0dAGU5uC0BpTmfTAOhXQP2/e0vNfM.809DBeM4zIyCjd0XOm', 1, NULL, '2025-09-19 15:21:52', '2025-09-19 15:23:21'),
(64, 3, 'Md Ziaur Rahaman', 'Ziaur Rahaman', '01408047818', 'ziaur.4030@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1759318975FB_IMG_1699151544499.jpg', NULL, NULL, '$2y$10$t1eqm5CmmSpv7COGENZyseIRxuyob81q3ucat0uOCvjo/eI147hBS', 1, NULL, '2025-10-01 17:37:04', '2025-10-01 17:42:55'),
(65, 3, 'Lopoloifhidwjdwfefee fjedwjdwj ijwhfwdj wfiefwjdwd hwidjwidhwfhwidjiwj hjfhefjhwifhewfiwejj hfiwhfqwjhfqwiefgwiej onlinehutbd.com', 'Lopoloifhidwjdwfefee fjedwjdwj ijwhfwdj wfiefwjdwd hwidjwidhwfhwidjiwj hjfhefjhwifhewfiwejj hfiwhfqwjhfqwiefgwiej onlinehutbd.com', '86553294482', 'nomin.momin+455t7@mail.ru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$qb23KP7ZVJdkqzYAPsA7IOQaSp3NphG86dd6OHc87qRm2/TJcl1x6', 1, NULL, '2025-10-04 20:13:20', '2025-10-04 20:13:20'),
(66, 3, 'showpnobangla', 'dini.slam6073', '01711446112', 'showpnobd1980@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$/c..7QPRZoCTNBDFcPKTfecoy0rIT6VxjPdL4ApBXnl8aG2k4OknK', 1, NULL, '2025-10-15 17:49:22', '2025-10-15 17:49:22'),
(67, 3, 'Nargis Alam', 'Nargis Alam', '01922434468', 'alamnargis47@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1760978679WhatsApp Image 2025-10-20 at 10.41.33 PM.jpeg', NULL, NULL, '$2y$10$OFDXHD69ha.IPK74xKuDG.QOvz6jDEEALSdyzM.65Io.VMHW9Qjx2', 1, NULL, '2025-10-20 22:34:59', '2025-10-20 22:44:39'),
(68, 3, 'Mohammed Enamul Hoque Chowdhury', 'Enamulhoque', '01704805716', 'ec13512@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1760983486IMG20220912234835-removebg-preview (1).png', NULL, NULL, '$2y$10$3YcF1.ZrvKBvhK9dc4tLru0DUcvdWIqy57XXQ5eLP/IuebXeN19je', 1, NULL, '2025-10-20 23:13:13', '2025-10-21 00:04:46'),
(69, 3, 'Miskat Ali', 'Miskat2007', '01602129662', 'alimiskat054@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/17610247085151597b2215c8162c3862f16daea2df.png', NULL, NULL, '$2y$10$qrodVj0wwhK.heADxo7WSe/cjha6jpanOmPLoBu.oTRQulnh1gpTG', 1, NULL, '2025-10-21 11:31:14', '2025-10-21 11:31:48'),
(70, 3, 'Eva akter', 'Eva akter', '01888777189', 'evaakter821989@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$sc9Ki7vKAGwSnKvRB75.OOuqePHdf..qerxuYanKwHb93F6LYNtxK', 1, NULL, '2025-10-21 11:44:09', '2025-10-21 11:44:09'),
(71, 3, 'Mohammad Solaiman', 'Solaiman', '01889921612', 'md01889449295@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1761034825image_1750181874034.jpg', NULL, NULL, '$2y$10$BrbJfhaApun3vrqqUFLlG.f9HA79i5VGUbRoB2.IRn57IQDAyzmEu', 1, NULL, '2025-10-21 14:17:52', '2025-10-21 14:20:25'),
(72, 3, 'TAMIMA KHATUN', 'Umme Ayesha', '01951157730', 'bdbasundia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$/7Wv0M3fJ5RxCO7gWCIO/uon46xbJrh/hpieztxvU9fmUTcT9gR.e', 1, NULL, '2025-10-22 15:34:09', '2025-10-22 15:34:09'),
(73, 3, 'MD.NASIR HOSSAIN', 'MD.NASIR HOSSAIN', '01405866016', 'mdnasir.hossain.10.1.2002@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1761559593Decide . Commit . Succeed_20251024_150713_0000.png', NULL, NULL, '$2y$10$/HsihSAUwRIh1zjd8SiUZeNMsV72S5pCxU9p47uSLDw1xAE/FnfMm', 1, NULL, '2025-10-27 16:04:35', '2025-10-27 16:06:33'),
(74, 3, 'Md. Asir Uddin', 'htashik', '01714365379', 'htashik@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1762236075seoashik.png', NULL, NULL, '$2y$10$KnooOrFAMDSpocgAHCv6W.ed5hvSHZww3g4AEUqpro2T5u1wlYRwO', 1, NULL, '2025-11-04 11:56:06', '2025-11-04 12:01:15'),
(75, 3, 'Md Rokibul Islam', 'rokibul2222', '01711072954', 'rokibul2222@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'upload/user/1762319436pprrrr.png', NULL, NULL, '$2y$10$j6ZoyKrGjfgUQh8/EEd/yuUXUK5QBH538Ne8VBzc5KUho97rxpLVe', 1, NULL, '2025-11-05 11:08:45', '2025-11-05 11:10:36'),
(76, 2, 'Brittany Chandler', 'carl-buckley-lhFbZH', '01645787748', 'liwo@mailinator.com', NULL, 'Facere libero et bea', 'Neque veniam exerci', 'Voluptate reiciendis', 3, 31, 372, 1, 'Saepe itaque veniam', '20251211165254PKG19O5iNBI72SfdQrNhuyvDn0ewaDirVDoDvb.jpg', NULL, NULL, '$2y$10$y/3SSiZeMwdteF.7HH5N/ucvcgOnt5R4.HC91KZHEsTJjxxb6pZq2', 1, NULL, '2025-12-10 11:50:52', '2025-12-11 10:52:13'),
(77, 2, 'Carl Buckley', 'carl-buckley-As2LAd', '01930286449', 'nemaz@m4234r.com', NULL, NULL, NULL, NULL, 8, 48, 467, 1, NULL, '20251211165854PKG19O5iNBI72SfdQrNhuyvDn0ewaDirVDoDvb.jpg', NULL, NULL, '$2y$10$doOpBm/pFQYvoKgeIKvideG26wFmrZgUYDzmo83wxCjj0qUB7zaX.', 1, NULL, '2025-12-10 11:53:35', '2025-12-13 08:28:03'),
(78, 2, 'Carl Buckley', 'carl-buckley-L0bAZN', '01930286449', 'nemaz@m423444r.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$UHk5kGhYi7yuiN4gwXDLaeRmqtmGApjq3wOMd98TJOjTTMa8saPv2', 1, NULL, '2025-12-10 11:54:47', '2025-12-10 11:54:47'),
(79, 2, 'Carl Buckley', 'carl-buckley-Geq5Is', '01930286449', 'nemaz@m4234r44r.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$vq9rrcESTnBnZkwYB1CMd.P7/qQZhJ30ycWvLrVY/jJK.70AiMd8e', 1, NULL, '2025-12-10 11:57:36', '2025-12-10 11:57:36'),
(89, 2, 'Abu Taher', 'brian-lawrence-piMsrd', '01930286449', 'mdabutaher9192@gmail.com', NULL, 'Dhobaura,Mymensingh', '2416', 'Voluptate reiciendis', 2, 3, 4, 1, 'Saepe itaque veniam', '2025122110061765617968online logo.png', NULL, NULL, '$2y$10$zWU.DOSKDYSa0Y24IdVtpen7Xw1ATmbhy0mNHbxoOVqCUyBgTSL7i', 1, NULL, '2025-12-11 03:30:19', '2026-01-22 05:02:28'),
(91, 5, 'parvaz', 'parvaz', '01738920277', 'parvazreza00@gmail.com', 'Badda, Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$nwLTptKXfXKw05mmhyp7v.p3HSbdZv/dVwCkyiPhRt2piGEmi9fXK', 1, NULL, '2025-12-22 05:04:49', '2025-12-22 05:04:49'),
(92, 3, 'Akhter hosen', 'Akhter hosen', '01738920259', 'hosen@gmail.com', 'sdfsdfd fsdfsfsdf sfsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, '$2y$10$WG4GN2iHUAmpf6WHq4yQ/.244uAjqHYAxeC7CuVwm6Zq5IZ40lD0y', 1, NULL, '2025-12-22 05:17:49', '2025-12-22 06:47:18'),
(93, 3, 'Hanif mia', 'Hanif mia', '01738920269', 'hanifmia@gmail.com', 'sdfdsf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$3fCbL0TQPdp30eQNgMYT0OFEOh2aWYvD/wHtDGFRZYJZmwyikssXC', 1, NULL, '2026-01-08 09:55:01', '2026-01-15 10:41:11'),
(94, 2, 'hasan naser', 'hasan naser', '01733892000', 'naser@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$XzoBcqeF8Fk/xdysslk3NuTrYGlDfBSsx/D8Qby1nVSlyhcYR3HGO', 1, NULL, '2026-01-11 05:47:56', '2026-01-11 05:47:56'),
(96, 3, 'tamin khan', 'tamin khan', '01737123698', NULL, 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$79RQMReWWK1lzPPQtaj16OqbgBRixZtFsioDNQCoqGfTEDpbJjhuK', 1, NULL, '2026-01-25 10:46:50', '2026-01-25 10:46:50'),
(97, 3, 'fsdfd', 'fsdfd', '01755789456', NULL, 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$bMTFOI.NAyzOW7FKMS8OFuicbF/C1.rA4tjz.9d.tyCPD3zPAnHM.', 1, NULL, '2026-01-25 12:20:11', '2026-01-25 12:20:11'),
(98, 3, 'dfsdfsd', 'dfsdfsd', '01337123456', NULL, 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$gYbIxhfx8ugW2QXUgyCSmuUaTjK4pTB/mMxDvbvc2lTDIQq80EAj.', 1, NULL, '2026-01-25 12:23:10', '2026-01-25 12:23:10'),
(99, 3, 'htryrty', 'htryrty', '01337123654', NULL, 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$O7MYdEcVn0gQnQsin7xwDuCFCgSZ7j8MHpA/p//TvXOSPkGzYzXUO', 1, NULL, '2026-01-25 12:23:48', '2026-01-25 12:23:48'),
(100, 3, 'Akram Hossen', 'Akram Hossen', '01739392276', NULL, 'EDU পরিবার, SHA-41/1, Behind Hossain Market, Uttar Badda, Badda, Dhaka-1212', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$PNbs/ReNMd/.n/oJRPCqfe9TGoJyRz1c3J99vQICGGAGow0eI3IZy', 1, NULL, '2026-02-11 18:51:46', '2026-02-11 18:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Mike Anders Fournier', 'info@strictlydigital.net', 'Semrush links for onlinehutbd.com', 'Hi there, \r\n \r\nReceiving some collection of links pointing to onlinehutbd.com may result in zero worth or negative impact for your site. \r\n \r\nIt really isn’t important the number of external links you have, what matters is the amount of search terms those platforms appear in search for. \r\n \r\nThat is the key factor. \r\nNot the overrated third-party metrics or SEO score. \r\nThese can be faked easily. \r\nBUT the volume of Google-ranked terms the sites that link to you contain. \r\nThat’s the bottom line. \r\n \r\nMake sure these backlinks redirect to your site and your site will see real growth! \r\n \r\nWe are providing this powerful service here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nHave questions, or want clarification, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nSincerely, \r\nMike Anders Fournier\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738', '2025-07-19 13:42:44', '2025-07-19 13:42:44'),
(6, 'Mike Jan Wagner', 'mike@monkeydigital.co', 'Collaboration Request', 'Hello, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am reaching out to discuss a exciting collaboration. \r\n \r\nHow would you like to show our banners on your website and link back via your custom affiliate link towards hot-selling services from our website? \r\n \r\nThis way, you earn a 35% commission, continuously from any sales that generate from your site. \r\n \r\nThink about it, all businesses require SEO, so this is a big opportunity. \r\n \r\nWe already have 12k+ affiliates and our commissions are sent on time. \r\nLast month, we reached $27280 in payouts to our promoters. \r\n \r\nIf this sounds good, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr register today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Jan Wagner\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-07-22 22:56:50', '2025-07-22 22:56:50'),
(7, 'Mike Matthew Bonnet', 'mike@monkeydigital.co', 'Boost Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Hi there, \r\n \r\nI wanted to check in with something that could seriously boost your website’s visitor count. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s real visitors, tailored to your preferred location and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ high-quality visitors for just $10 \r\nLocalized traffic for any country \r\nScalability available based on your needs \r\nUsed by marketers—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr connect instantly on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to working with you! \r\n \r\nBest, \r\nMike Matthew Bonnet\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-07-23 05:12:56', '2025-07-23 05:12:56'),
(8, 'Mike Eric Olsen', 'info@speed-seo.net', 'Find onlinehutbd.com SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Eric Olsen\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622', '2025-07-25 22:56:12', '2025-07-25 22:56:12'),
(9, 'Mike Leon Rouxson', 'info@professionalseocleanup.com', 'Urgent: Toxic Links Found on onlinehutbd.com', 'Hi, \r\nWhile reviewing onlinehutbd.com, we spotted toxic backlinks that could put your site at risk of a Google penalty. \r\n \r\nWe can clean up your link profile and protect your rankings — all for just $5. \r\n \r\nFix it now before Google does: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Leon Rouxson\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com', '2025-08-03 08:08:38', '2025-08-03 08:08:38'),
(10, 'Alex Amin', 'alexamin4x4@gmail.com', 'Exclusive Investment Opportunity', 'Greetings, \r\n \r\nI hope you’re doing well. We are reaching out to explore potential partnerships with business executives interested in exclusive, high-value investment opportunities. \r\n \r\nOur network comprises established high-net-worth individuals (HNWIs) from Russia and the Middle East, seeking collaborative ventures with trusted partners. The specifics of the opportunity, including investment size and terms, can be shared upon further discussion under strict confidentiality. \r\n \r\nWe would welcome the chance to discuss further at your convenience. \r\n \r\nBest regards, \r\nAlex Amin \r\nEmail: infinitycapitalmru@gmail.com', '2025-08-07 03:28:56', '2025-08-07 03:28:56'),
(11, 'Mike Sven Karlsson', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI recognize that most website owners struggle recognizing that Answer Engine Optimization (AEO) is a gradual process and a well-planned monthly initiative. \r\n \r\nUnfortunately, very few website owners have the dedication to observe the incremental yet impactful results that can completely boost their digital visibility. \r\n \r\nWith regular search engine updates, a stable, long-term strategy including Answer Engine Optimization (AEO) is vital for securing a strong return on investment. \r\n \r\nIf you see this as the right strategy, collaborate with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nChat With Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide exceptional performance for your budget, and you will enjoy choosing us as your digital marketing ally. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148', '2025-08-10 16:28:38', '2025-08-10 16:28:38'),
(12, 'Mike Vincent Olsson', 'info@strictlydigital.net', 'Semrush links for onlinehutbd.com', 'Greetings, \r\n \r\nReceiving some bunch of links redirecting to onlinehutbd.com could have 0 value or harmful results for your website. \r\n \r\nIt really isn’t important the total external links you have, what matters is the amount of ranking terms those platforms are optimized for. \r\n \r\nThat is the critical factor. \r\nNot the meaningless Domain Authority or SEO score. \r\nThat anyone can do these days. \r\nBUT the number of ranking keywords the sites that send backlinks to you have. \r\nThat’s the bottom line. \r\n \r\nMake sure these backlinks link to your domain and you will ROCK! \r\n \r\nWe are introducing this special SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nHave questions, or want clarification, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Vincent Olsson\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738', '2025-08-17 09:07:40', '2025-08-17 09:07:40'),
(13, 'Winston', 'winstonredford51@gmail.com', 'Quick question...', 'Winston here from Iowa. I’m always watching for new sites and looking at older ones and thought I’d reach out to see if you could use a hand driving targeted traffic, automating repetitive tasks, or some good old-fashioned bulk targeted outreach campaigns to massive lists I already own.\r\n\r\nI’ve been doing this for over 20+ years — building sites, editing videos, and crafting bulk email/SMS campaigns (I even provide the targeted lists as I mentioned and the servers to send them out over). Creating custom solutions using Manus (there\'s a waiting list of 3 million people waiting to get their hands on this tech, and 1% get accepted after an application/screening process). Creating custom software, getting people not only ranked on search engines but also voice searches where I get devices like Alexa and GPT to start recommending your site.\r\n\r\nI also create, fix, and optimize WordPress sites. In fact, I\'ll even pay for any plugins you might want/need. The bottom line is that if a solution exists, I’ve probably already built it or bought it — and if I haven’t yet, I will for your project. I’m happy to shoulder 90% of the cost with tools, lists, licenses, and tech I already own.\r\n\r\nQuick background: born and raised in the Midwest, married, three girls. If I can support them by helping you, using everything I’ve built over the years, that’s the kind of win-win that changes things. It still amazes me how few people actually help the way I do — and I’d love the chance to show you why it\'s kept me in business for over 20+ years.\r\n\r\nAll I ask is a flat $99/month for my time, month to month — no catch. I just wanted to offer real help if you’re open to it. If you don\'t want me to help, then I ask that you please find someone who can do these items on your behalf. You and I both know you deserve it. It takes a little elbow grease to implement everything, but it\'s worth it in the end.\r\n\r\nIf you need anything at all, just ask — we might be a good fit, we might not, but let\'s start somewhere. If I missed something or you think of anything obscure that would be an awesome solution to a problem you might need help with, let me know — I’ve only scratched the surface here with a few of my past projects. I also have thousands of references — more than I know what to do with — so if you want some, let me know.\r\n\r\n\r\n\r\nAll the best,\r\n\r\nWinston Redford\r\nCell: 1-319-435-1790‬\r\nLive Chat: https://goo.gl/5sbTx5\r\nSite: https://kutt.it/deserve', '2025-08-21 23:46:42', '2025-08-21 23:46:42'),
(14, 'Mike Knut Smit', 'info@speed-seo.net', 'Find onlinehutbd.com SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Knut Smit\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622', '2025-08-22 03:54:59', '2025-08-22 03:54:59'),
(15, 'Mike Sven-Erik Persson', 'mike@monkeydigital.co', 'Collaboration Request', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am getting in touch about a mutual opportunity. \r\n \r\nHow would you like to show our ads on your site and redirect via your unique referral link towards hot-selling services from our business? \r\n \r\nThis way, you earn a solid 35% commission, every month from any purchases that come in from your website. \r\n \r\nThink about it, everyone require SEO, so this is a massive opportunity. \r\n \r\nWe already have over 12,000 affiliates and our payouts are paid out monthly. \r\nRecently, we reached $27280 in payouts to our affiliates. \r\n \r\nIf interested, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Sven-Erik Persson\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-08-22 09:43:40', '2025-08-22 09:43:40'),
(16, 'Mike Brian Thomas', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Hi there, \r\n \r\nI wanted to connect with something that could seriously help your website’s visitor count. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s engaged traffic, tailored to your preferred location and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ real visitors for just $10 \r\nLocalized traffic for multiple regions \r\nLarger traffic packages available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Brian Thomas\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-08-22 15:35:47', '2025-08-22 15:35:47'),
(17, 'Jose', 'info@capitalusalending.com', 'Did I miss your call?', 'Thanks for checking out Capital USA Lending. We make securing a loan fast, transparent, and tailored to your needs. At Capital USA Lending, you’ll benefit from:\r\n\r\n- Fuel your business growth in 48 hours or less\r\n\r\n- Fast, flexible funding for your next big move\r\n\r\n- Get up to $300K online — Apply in 30 seconds\r\n\r\nReady to get started? Click here to continue your application now:\r\nhttps://kutt.it/k4qDs5\r\n\r\nNeed help along the way? Just hit “reply” with any questions – I’m on standby to assist.\r\n\r\nLooking forward to helping you move forward,\r\nCapital USA Lending Inc.\r\n1309 Coffeen Avenue STE 13075\r\nSheridan, WY 82801', '2025-08-22 18:38:11', '2025-08-22 18:38:11'),
(18, 'RaymondAbnot', 'raymondFaucky@gmail.com', 'An innovative method of email distribution.', 'Greetings! onlinehutbd.com \r\n \r\nAre you aware that it is possible to in compliance with regulations and efficiently send commercial offers straight through official inquiry forms? \r\nWhen these messages are submitted, we do not use personal information, and messages are sent to securely configured contact forms. \r\nContact Form messages are treated as significant, so they rarely end up in spam. \r\nEnjoy a free trial and see the benefits for yourself. \r\nYou can count on us to deliver up to 50,000 messages reliably. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis offer is automatically generated. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.', '2025-08-23 21:33:23', '2025-08-23 21:33:23'),
(19, 'Mike Marcus Persson', 'info@professionalseocleanup.com', 'Urgent: Toxic Links Found on onlinehutbd.com', 'Hi, \r\nWhile reviewing onlinehutbd.com, we spotted toxic backlinks that could put your site at risk of a Google penalty. \r\n \r\nWe can clean up your link profile and protect your rankings — all for just $5. \r\n \r\nFix it now before Google does: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Marcus Persson\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com', '2025-08-28 10:55:05', '2025-08-28 10:55:05'),
(20, 'MichaelMiz', 'nomin.momin+196t5@mail.ru', 'Odkwsdjferheejdfehueyidjaswdhuheufhe fjhwegfweuihdwhfi ifhewidjawsjdgewuifhqw', 'Mfwdjwdhefiejfh fhiwuewuoioruiwes jkcsjhcksdlalsdjfhgh ejdowkkDIEWHRUEOFIW JIEWFOKDWDJEWIHFIEWFJEWFJIkhfjejfie efjfwjdfe onlinehutbd.com', '2025-08-30 12:59:25', '2025-08-30 12:59:25'),
(21, 'Mike Joshua David', 'info@strictlydigital.net', 'Semrush links for onlinehutbd.com', 'Hello, \r\n \r\nGetting some set of links pointing to onlinehutbd.com may result in zero worth or worse for your business. \r\n \r\nIt really doesn’t matter the total inbound links you have, what is key is the amount of ranking terms those domains rank for. \r\n \r\nThat is the critical factor. \r\nNot the overrated Domain Authority or Domain Rating. \r\nThese can be faked easily. \r\nBUT the volume of ranking keywords the websites that send backlinks to you rank for. \r\nThat’s the bottom line. \r\n \r\nGet these quality links point to your website and your site will see real growth! \r\n \r\nWe are providing this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nIn doubt, or want to know more, message us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nKind regards, \r\nMike Joshua David\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738', '2025-09-09 10:52:46', '2025-09-09 10:52:46'),
(22, 'Oman Rook', 'tomlawman@edny.net', 'From Startups to Expansion, We Fund Every Stage.', 'Hello, \r\n \r\nAt Cateus Investment Company (CIC), we understand that the right funding structure can significantly accelerate your business growth. Whether you’re an early-stage startup or a scaling enterprise, our investment solutions are tailored to align with your vision and long-term success. \r\n \r\nWe currently offer two primary financing options: \r\n•	Debt Financing: Access capital at a competitive 3% annual interest rate, with no prepayment penalties—ideal for businesses seeking straightforward, low-cost funding while maintaining full ownership. \r\n•	Convertible Debt Financing: A hybrid solution offering 3% annual interest with a conversion feature. After two years, the debt can convert into a 10–15% equity stake, providing both immediate funding and future alignment of interests. \r\n \r\nIf you’re seeking strategic funding with flexibility, we invite you to share your pitch deck or executive summary. Our team is ready to work with you to identify the most effective investment structure to support your business trajectory. \r\n \r\nWe look forward to exploring how CIC can partner with you to unlock your company’s full potential. \r\n \r\nWarm regards, \r\nOman Rook \r\nExecutive Investment Consultant | Director \r\nCateus Investment Company (CIC) \r\noman-rook@cateusgroup.org | cateusgroup@gmail.com \r\nhttp://www.cateusinvestmentsgroup.com/', '2025-09-11 02:17:08', '2025-09-11 02:17:08'),
(23, 'StevenUnoxy', 'kpdp44@gmail.com', 'The latest iPhone 16 is just a box away from you', 'Worldwide Shipping: Your Prize, Delivered to You. https://telegra.ph/Win-iPhones-Samsung-09-18-1083?5c9l6k1t4m6fpk9', '2025-09-19 17:26:52', '2025-09-19 17:26:52'),
(24, 'StevenUnoxy', 'kpdp44@gmail.com', 'The latest iPhone 16 is just a box away from you', 'Worldwide Shipping: Your Prize, Delivered to You. https://telegra.ph/Win-iPhones-Samsung-09-18-1083?5c9l6k1t4m6fpk9', '2025-09-19 17:26:55', '2025-09-19 17:26:55'),
(25, 'StevenUnoxy', 'kpdp44@gmail.com', 'The latest iPhone 16 is just a box away from you', 'Worldwide Shipping: Your Prize, Delivered to You. https://telegra.ph/Win-iPhones-Samsung-09-18-1083?5c9l6k1t4m6fpk9', '2025-09-19 17:26:58', '2025-09-19 17:26:58'),
(26, 'StevenUnoxy', 'kpdp44@gmail.com', 'The latest iPhone 16 is just a box away from you', 'Worldwide Shipping: Your Prize, Delivered to You. https://telegra.ph/Win-iPhones-Samsung-09-18-1083?5c9l6k1t4m6fpk9', '2025-09-19 17:27:00', '2025-09-19 17:27:00'),
(27, 'StevenUnoxy', 'kpdp44@gmail.com', 'The latest iPhone 16 is just a box away from you', 'Worldwide Shipping: Your Prize, Delivered to You. https://telegra.ph/Win-iPhones-Samsung-09-18-1083?5c9l6k1t4m6fpk9', '2025-09-19 17:27:03', '2025-09-19 17:27:03'),
(28, 'Mike Joerg Van de Berg', 'mike@monkeydigital.co', 'Collaboration Request', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am getting in touch to discuss a mutual business deal. \r\n \r\nHow would you like to place our banners on your platform and link back via your personalized referral link towards popular services from our business? \r\n \r\nThis way, you receive a 35% commission, continuously from any transactions that generate from your audience. \r\n \r\nThink about it, all businesses require SEO, so this is a massive opportunity. \r\n \r\nWe already have thousands of affiliates and our payouts are sent every month. \r\nRecently, we reached over $27,000 in affiliate earnings to our partners. \r\n \r\nIf you want in, kindly message us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr join us today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Joerg Van de Berg\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-09-20 19:51:28', '2025-09-20 19:51:28'),
(29, 'Mike Nathan Morel', 'info@speed-seo.net', 'Find onlinehutbd.com SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Nathan Morel\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622', '2025-09-21 01:19:30', '2025-09-21 01:19:30'),
(30, 'Mike Louis Janssens', 'mike@monkeydigital.co', 'Boost Your Website Traffic with Geo-Targeted Social Ads – Only $10 for 10K Visits!', 'Hello, \r\n \r\nI wanted to connect with something that could seriously help your website’s traffic. We work with a trusted ad network that allows us to deliver real, location-based social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s real visitors, tailored to your chosen market and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nCountry-specific traffic for multiple regions \r\nScalability available based on your needs \r\nUsed by marketers—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr ask any questions on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Louis Janssens\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-09-21 02:27:56', '2025-09-21 02:27:56'),
(31, 'DavidTef', 'shtanajalbert184@gmail.com', 'Which flagship will you unbox? iPhone 16 Pro or S24 Ultra?', 'Track your winning iPhone 16 Pro with ParcelsApp. https://telegra.ph/Win-iPhones-Samsung-09-18-1215?0d3h6a4t7m6t3pq \r\nCould the Samsung Galaxy S24 Ultra be your next win? https://telegra.ph/Win-iPhones-Samsung-09-18-514?5s1i9k2y4e5gtqo \r\nREAL WINNER: “GOT A SAMSUNG!” COULD IT BE YOU NEXT? https://telegra.ph/Win-iPhones-Samsung-09-18-1028?8d7p7k2p4w7zgko \r\nThe Galaxy S24 Ultra is a work of art you can own. https://telegra.ph/Win-iPhones-Samsung-09-18-1719?6w4y9k1q6c8z6gr \r\nWhy pay full price for an S24 Ultra when you can win it? https://telegra.ph/Win-iPhones-Samsung-09-18-2916?4c8o6h3u6e8slvu', '2025-09-23 10:52:00', '2025-09-23 10:52:00'),
(32, 'DavidTef', 'shtanajalbert184@gmail.com', 'Which flagship will you unbox? iPhone 16 Pro or S24 Ultra?', 'Track your winning iPhone 16 Pro with ParcelsApp. https://telegra.ph/Win-iPhones-Samsung-09-18-1215?0d3h6a4t7m6t3pq \r\nCould the Samsung Galaxy S24 Ultra be your next win? https://telegra.ph/Win-iPhones-Samsung-09-18-514?5s1i9k2y4e5gtqo \r\nREAL WINNER: “GOT A SAMSUNG!” COULD IT BE YOU NEXT? https://telegra.ph/Win-iPhones-Samsung-09-18-1028?8d7p7k2p4w7zgko \r\nThe Galaxy S24 Ultra is a work of art you can own. https://telegra.ph/Win-iPhones-Samsung-09-18-1719?6w4y9k1q6c8z6gr \r\nWhy pay full price for an S24 Ultra when you can win it? https://telegra.ph/Win-iPhones-Samsung-09-18-2916?4c8o6h3u6e8slvu', '2025-09-23 10:52:02', '2025-09-23 10:52:02'),
(33, 'DavidTef', 'shtanajalbert184@gmail.com', 'Which flagship will you unbox? iPhone 16 Pro or S24 Ultra?', 'Track your winning iPhone 16 Pro with ParcelsApp. https://telegra.ph/Win-iPhones-Samsung-09-18-1215?0d3h6a4t7m6t3pq \r\nCould the Samsung Galaxy S24 Ultra be your next win? https://telegra.ph/Win-iPhones-Samsung-09-18-514?5s1i9k2y4e5gtqo \r\nREAL WINNER: “GOT A SAMSUNG!” COULD IT BE YOU NEXT? https://telegra.ph/Win-iPhones-Samsung-09-18-1028?8d7p7k2p4w7zgko \r\nThe Galaxy S24 Ultra is a work of art you can own. https://telegra.ph/Win-iPhones-Samsung-09-18-1719?6w4y9k1q6c8z6gr \r\nWhy pay full price for an S24 Ultra when you can win it? https://telegra.ph/Win-iPhones-Samsung-09-18-2916?4c8o6h3u6e8slvu', '2025-09-23 10:52:04', '2025-09-23 10:52:04'),
(34, 'DavidTef', 'shtanajalbert184@gmail.com', 'Which flagship will you unbox? iPhone 16 Pro or S24 Ultra?', 'Track your winning iPhone 16 Pro with ParcelsApp. https://telegra.ph/Win-iPhones-Samsung-09-18-1215?0d3h6a4t7m6t3pq \r\nCould the Samsung Galaxy S24 Ultra be your next win? https://telegra.ph/Win-iPhones-Samsung-09-18-514?5s1i9k2y4e5gtqo \r\nREAL WINNER: “GOT A SAMSUNG!” COULD IT BE YOU NEXT? https://telegra.ph/Win-iPhones-Samsung-09-18-1028?8d7p7k2p4w7zgko \r\nThe Galaxy S24 Ultra is a work of art you can own. https://telegra.ph/Win-iPhones-Samsung-09-18-1719?6w4y9k1q6c8z6gr \r\nWhy pay full price for an S24 Ultra when you can win it? https://telegra.ph/Win-iPhones-Samsung-09-18-2916?4c8o6h3u6e8slvu', '2025-09-23 10:52:07', '2025-09-23 10:52:07'),
(35, 'DavidTef', 'shtanajalbert184@gmail.com', 'Which flagship will you unbox? iPhone 16 Pro or S24 Ultra?', 'Track your winning iPhone 16 Pro with ParcelsApp. https://telegra.ph/Win-iPhones-Samsung-09-18-1215?0d3h6a4t7m6t3pq \r\nCould the Samsung Galaxy S24 Ultra be your next win? https://telegra.ph/Win-iPhones-Samsung-09-18-514?5s1i9k2y4e5gtqo \r\nREAL WINNER: “GOT A SAMSUNG!” COULD IT BE YOU NEXT? https://telegra.ph/Win-iPhones-Samsung-09-18-1028?8d7p7k2p4w7zgko \r\nThe Galaxy S24 Ultra is a work of art you can own. https://telegra.ph/Win-iPhones-Samsung-09-18-1719?6w4y9k1q6c8z6gr \r\nWhy pay full price for an S24 Ultra when you can win it? https://telegra.ph/Win-iPhones-Samsung-09-18-2916?4c8o6h3u6e8slvu', '2025-09-23 10:52:09', '2025-09-23 10:52:09'),
(36, 'DavidTef', 'kristinkagelmann@gmx.de', 'Die schonsten Frauen sind nur wenige Tage alt', 'SEHR SCHONE FRAUEN, DIE NUR AUF DIESER SEITE NACH SCHNELLEM SEX SUCHEN https://psx-core.ru/go?https://telegra.ph/Online-Dating-f%C3%BCr-Sex-09-23?2556', '2025-09-24 13:56:34', '2025-09-24 13:56:34'),
(37, 'DavidTef', 'kristinkagelmann@gmx.de', 'Die schonsten Frauen sind nur wenige Tage alt', 'SEHR SCHONE FRAUEN, DIE NUR AUF DIESER SEITE NACH SCHNELLEM SEX SUCHEN https://psx-core.ru/go?https://telegra.ph/Online-Dating-f%C3%BCr-Sex-09-23?2556', '2025-09-24 13:56:39', '2025-09-24 13:56:39'),
(38, 'DavidTef', 'kristinkagelmann@gmx.de', 'Die schonsten Frauen sind nur wenige Tage alt', 'SEHR SCHONE FRAUEN, DIE NUR AUF DIESER SEITE NACH SCHNELLEM SEX SUCHEN https://psx-core.ru/go?https://telegra.ph/Online-Dating-f%C3%BCr-Sex-09-23?2556', '2025-09-24 13:56:41', '2025-09-24 13:56:41'),
(39, 'DavidTef', 'kristinkagelmann@gmx.de', 'Die schonsten Frauen sind nur wenige Tage alt', 'SEHR SCHONE FRAUEN, DIE NUR AUF DIESER SEITE NACH SCHNELLEM SEX SUCHEN https://psx-core.ru/go?https://telegra.ph/Online-Dating-f%C3%BCr-Sex-09-23?2556', '2025-09-24 13:56:43', '2025-09-24 13:56:43'),
(40, 'DavidTef', 'kristinkagelmann@gmx.de', 'Die schonsten Frauen sind nur wenige Tage alt', 'SEHR SCHONE FRAUEN, DIE NUR AUF DIESER SEITE NACH SCHNELLEM SEX SUCHEN https://psx-core.ru/go?https://telegra.ph/Online-Dating-f%C3%BCr-Sex-09-23?2556', '2025-09-24 13:56:46', '2025-09-24 13:56:46'),
(41, 'DavidTef', 'pamelavarela41@gmail.com', 'Beautiful girls meet for sex only on this dating site', 'SEXY WOMEN MEET FOR SEX ONLY HERE https://anony.link/https://telegra.ph/Online-dating-for-sex-09-24?5783', '2025-09-25 20:24:11', '2025-09-25 20:24:11'),
(42, 'DavidTef', 'pamelavarela41@gmail.com', 'Beautiful girls meet for sex only on this dating site', 'SEXY WOMEN MEET FOR SEX ONLY HERE https://anony.link/https://telegra.ph/Online-dating-for-sex-09-24?5783', '2025-09-25 20:24:13', '2025-09-25 20:24:13'),
(43, 'DavidTef', 'pamelavarela41@gmail.com', 'Beautiful girls meet for sex only on this dating site', 'SEXY WOMEN MEET FOR SEX ONLY HERE https://anony.link/https://telegra.ph/Online-dating-for-sex-09-24?5783', '2025-09-25 20:24:16', '2025-09-25 20:24:16'),
(44, 'DavidTef', 'pamelavarela41@gmail.com', 'Beautiful girls meet for sex only on this dating site', 'SEXY WOMEN MEET FOR SEX ONLY HERE https://anony.link/https://telegra.ph/Online-dating-for-sex-09-24?5783', '2025-09-25 20:24:19', '2025-09-25 20:24:19'),
(45, 'DavidTef', 'pamelavarela41@gmail.com', 'Beautiful girls meet for sex only on this dating site', 'SEXY WOMEN MEET FOR SEX ONLY HERE https://anony.link/https://telegra.ph/Online-dating-for-sex-09-24?5783', '2025-09-25 20:24:21', '2025-09-25 20:24:21'),
(46, 'DavidTef', 'kinarla@yahoo.com', 'Very attractive girls meet for sex only on this site', 'VERY ATTRACTIVE WOMEN ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE https://svetkulaiks.lv/bntr?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1694&id=2', '2025-09-27 07:50:55', '2025-09-27 07:50:55'),
(47, 'DavidTef', 'kinarla@yahoo.com', 'Very attractive girls meet for sex only on this site', 'VERY ATTRACTIVE WOMEN ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE https://svetkulaiks.lv/bntr?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1694&id=2', '2025-09-27 07:50:57', '2025-09-27 07:50:57'),
(48, 'DavidTef', 'kinarla@yahoo.com', 'Very attractive girls meet for sex only on this site', 'VERY ATTRACTIVE WOMEN ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE https://svetkulaiks.lv/bntr?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1694&id=2', '2025-09-27 07:50:59', '2025-09-27 07:50:59'),
(49, 'DavidTef', 'kinarla@yahoo.com', 'Very attractive girls meet for sex only on this site', 'VERY ATTRACTIVE WOMEN ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE https://svetkulaiks.lv/bntr?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1694&id=2', '2025-09-27 07:51:01', '2025-09-27 07:51:01'),
(50, 'DavidTef', 'kinarla@yahoo.com', 'Very attractive girls meet for sex only on this site', 'VERY ATTRACTIVE WOMEN ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE https://svetkulaiks.lv/bntr?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1694&id=2', '2025-09-27 07:51:05', '2025-09-27 07:51:05'),
(51, 'Mike Milan Taylor', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing onlinehutbd.com, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Milan Taylor\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com', '2025-09-27 21:39:13', '2025-09-27 21:39:13'),
(52, 'Garth Daniels', 'agentofficial@shrooqconsultant.com', 'Fast approval, flexible terms. Secure your Project loan with us.', 'Greetings, \r\n \r\nUnlock a new phase of growth with Shrooq Loan dept funding opportunities, as we ensure you have a reliable business partner to secure your funding. Do you have project that is in need of financial growth, such as Working Capital or Start ups. \r\n \r\nHere is your opportunity to secure your Seed Capital, Early-Stage, Renewable Energy Project, Commercial Real Estate, Telecommunication, Infrastructure, Agriculture, Animal Breeding, Healthcare, and Oil/Gas/Refinery. Competitive interest rates, Easy and fast reliable application process. \r\n \r\nYour quick response, will enable further communication to commence. \r\n \r\nRegards \r\n \r\nGarth Daniels \r\n \r\nInvestment Representative \r\nShrooq AlQamar Project Management Services Co LLC \r\nWhatsApp - +97333872035 \r\nEmail: agent@shrooqconsultant.com \r\nOur Offices: UAE Facilitating Office: Ahmad Al Jaber St \r\nOman Branch Offices: CHXM+J3G, Sohar, Oman \r\nUAE Dubai: Financial Consortium', '2025-10-03 08:01:25', '2025-10-03 08:01:25'),
(53, 'Brandonkar', 'urbmocyvyooz7m4@tempmail.us.com', 'AccsMarket.net: Trusted Source for Verified Accounts', 'https://AccsMarket.net provides high-quality verified accounts in bulk for all your social media needs. Our PVA accounts are created using different server IPs, ensuring they work flawlessly on any platform. Enjoy fast, reliable service and instant access to your accounts with every purchase. \r\n \r\nOpen Link: \r\n \r\nhttps://AccsMarket.net \r\n \r\nGreatly Appreciated!', '2025-10-03 10:03:16', '2025-10-03 10:03:16'),
(54, 'Mike Giinter De Vries', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI understand that most website owners find it challenging recognizing that SEO is a continuous effort and a carefully organized regular commitment. \r\n \r\nThe reality is, very few website owners have the willingness to recognize the incremental yet significant results that can completely change their search performance. \r\n \r\nWith regular search engine updates, a consistent, ongoing approach including Answer Engine Optimization (AEO) is vital for securing a strong return on investment. \r\n \r\nIf you see this as the ideal approach, work with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nChat With Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe deliver remarkable results for your investment, and you will appreciate choosing us as your growth partner. \r\n \r\nWarm regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148', '2025-10-04 14:50:43', '2025-10-04 14:50:43'),
(55, 'Mike Walter Lefebvre', 'info@strictlydigital.net', 'Semrush links for onlinehutbd.com', 'Greetings, \r\n \r\nHaving some bunch of links redirecting to onlinehutbd.com could have 0 value or worse for your website. \r\n \r\nIt really isn’t important the total backlinks you have, what is crucial is the amount of keywords those platforms rank for. \r\n \r\nThat is the key element. \r\nNot the meaningless third-party metrics or Domain Rating. \r\nAnyone can manipulate those. \r\nBUT the volume of ranking keywords the domains that link to you have. \r\nThat’s the bottom line. \r\n \r\nHave such links point to your website and your rankings will skyrocket! \r\n \r\nWe are introducing this powerful service here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nHave questions, or want to know more, message us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nSincerely, \r\nMike Walter Lefebvre\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738', '2025-10-13 10:56:37', '2025-10-13 10:56:37'),
(56, 'slm_hpMl', 'reststerthorring1986@larpan-mobi4omes.ru', 'slm принтер купить', 'Найдите идеальный вариант для своего бизнеса и <a href=https://klpl3r.ru/>slm 3d принтер купить|3д принтер slm купить|slm принтер по металлу купить|slm принтер купить</a> уже сегодня! \r\nИнтернет-магазины часто предоставляют скидки.', '2025-10-14 09:54:19', '2025-10-14 09:54:19'),
(57, 'Mike Brian Dupont', 'mike@monkeydigital.co', 'Collaboration Request', 'Hey, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am reaching out to discuss a exciting opportunity. \r\n \r\nHow would you like to place our ads on your website and link back via your personalized tracking link towards hot-selling SEO solutions from our business? \r\n \r\nThis way, you receive a solid 35% commission, month after month from any purchases that come in from your site. \r\n \r\nThink about it, everyone need SEO, so this is a big opportunity. \r\n \r\nWe already have thousands of affiliates and our payments are paid out on time. \r\nRecently, we reached over $27,000 in commissions to our promoters. \r\n \r\nIf this sounds good, kindly message us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nLooking forward, \r\nMike Brian Dupont\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-10-19 08:10:23', '2025-10-19 08:10:23'),
(58, 'Mike Erik Janssens', 'mike@monkeydigital.co', 'Boost Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Hello, \r\n \r\nI wanted to reach out with something that could seriously help your website’s traffic. We work with a trusted ad network that allows us to deliver genuine, geo-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s actual users, tailored to your target country and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nLocalized traffic for any country \r\nScalability available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Erik Janssens\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', '2025-10-20 06:41:59', '2025-10-20 06:41:59'),
(59, 'Mike William Johansson', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing onlinehutbd.com, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike William Johansson\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com', '2025-10-24 06:46:13', '2025-10-24 06:46:13'),
(60, 'Mike Alexander Bernard', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI understand that many businesses have difficulties grasping that SEO is a continuous effort and a well-planned regular commitment. \r\n \r\nSadly, very few marketers have the dedication to wait for the progressive yet significant improvements that can completely transform their online presence. \r\n \r\nWith regular search engine updates, a reliable, long-term strategy including Answer Engine Optimization (AEO) is critical for securing a strong return on investment. \r\n \r\nIf you recognize this as the best strategy, work with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nReach Out on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe deliver exceptional outcomes for your investment, and you will enjoy choosing us as your SEO partner. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148', '2025-10-30 16:56:48', '2025-10-30 16:56:48'),
(61, 'Moses Tillman', 'tupuzorile@mailinator.com', 'Consectetur eiusmod', 'Et aspernatur optio', '2026-02-14 12:43:20', '2026-02-14 12:43:20'),
(62, 'Diana Cruz', 'dianacruz.mkt@gmail.com', 'Re: Improve your website traffic and SEO', '\"Hello there,\r\n\r\nI came across your Website, when searching on Google and noticed that you do not show in the organic listings.\r\n\r\nOur main focus will be to help generate more sales & online traffic.\r\n\r\nWe can place your website on Google\'s 1st page. We will improve your website’s position on Google and get more traffic.\r\n\r\nIf interested, kindly provide me your name, phone number, and email.\r\n\r\nYour sincerely,\r\nDiana Cruz\r\n\r\n\r\nNote: Web platform expertise across Squarespace, Shopify, Wix, WordPress, GoDaddy etc. \"', '2026-02-16 06:06:54', '2026-02-16 06:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_type` tinyint(4) NOT NULL COMMENT '1=>Individual, 2=>Business',
  `shop_name` varchar(150) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` text DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `nid_number` varchar(17) DEFAULT NULL,
  `owner_name` varchar(150) DEFAULT NULL,
  `business_type` tinyint(4) DEFAULT NULL COMMENT '1=>Sole, 2=>Partnership, 3=>Limited',
  `trade_license_no` varchar(100) DEFAULT NULL,
  `bin_tin` varchar(100) DEFAULT NULL,
  `profile_photo` varchar(191) DEFAULT NULL,
  `shop_cover` varchar(191) DEFAULT NULL,
  `nid_front` varchar(191) DEFAULT NULL,
  `nid_back` varchar(191) DEFAULT NULL,
  `trade_license_doc` varchar(191) DEFAULT NULL,
  `commission` decimal(8,2) NOT NULL DEFAULT 0.00,
  `commission_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Percentage, 2=>Fixed',
  `description` text DEFAULT NULL,
  `fb_url` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `bank_account` varchar(191) DEFAULT NULL,
  `bank_document` varchar(191) DEFAULT NULL,
  `alternative_payment` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `holder_name` varchar(191) DEFAULT NULL,
  `branch_name` varchar(191) DEFAULT NULL,
  `routing_number` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Inactive, 1=>Active, 2=>Suspended, 3=>Rejected',
  `is_request` tinyint(1) NOT NULL DEFAULT 1,
  `shipping_zone` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Inside Dhaka, 2=Outside Dhaka, 3=Outside Dhaka City',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `seller_type`, `shop_name`, `slug`, `phone`, `email`, `address`, `full_name`, `dob`, `gender`, `nid_number`, `owner_name`, `business_type`, `trade_license_no`, `bin_tin`, `profile_photo`, `shop_cover`, `nid_front`, `nid_back`, `trade_license_doc`, `commission`, `commission_type`, `description`, `fb_url`, `bank_name`, `bank_account`, `bank_document`, `alternative_payment`, `account_number`, `holder_name`, `branch_name`, `routing_number`, `status`, `is_request`, `shipping_zone`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 77, 1, NULL, 'carl-buckley-Geq5Is', '01930286449', 'nemaz@m4234r.com', NULL, 'Carl Buckley', '2006-04-21', 'male', '6345634534534', NULL, 2, NULL, NULL, 'upload/vendor/profile/1851122365782801.jpg', NULL, 'upload/vendor/nid/1851122366115401.jpg', 'upload/vendor/nid/1851122366132597.jpg', NULL, 0.00, 1, NULL, NULL, 'Hadassah Leach', 'Culpa magna enim et', '20251211125354PKG19O5iNBI72SfdQrNhuyvDn0ewaDirVDoDvb.jpg', 'Quis et in quis laud', NULL, 'Oliver Bailey', 'Abbot Larson', '678', 1, 1, 1, NULL, '2025-12-10 11:57:37', '2025-12-11 06:53:00'),
(2, 80, 2, 'Brian Lawrence', 'brian-lawrence-piMsrd', '3423423423', 'hajog@mailinator.com', NULL, NULL, NULL, NULL, NULL, 'Walker Hester', 3, 'Reprehenderit et ni', 'Dolore doloribus mol', 'upload/vendor/logo/1851181047170539.jpg', NULL, 'upload/vendor/nid/1851181047995096.jpg', 'upload/vendor/nid/1851181048009296.jpg', 'upload/vendor/license/1851181047979916.jpg', 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2025-12-11 03:30:20', '2025-12-11 03:30:20'),
(3, 89, 1, NULL, 'md-abu-taher-cqGUBu', '01930286449', 'mdabutaher9192@gmail.com', NULL, 'Md Abu Taher', '2025-12-11', 'male', '56666666', NULL, NULL, NULL, NULL, 'upload/vendor/profile/1851756394733717.png', NULL, 'upload/vendor/nid/1851756394764011.png', 'upload/vendor/nid/1851756394773211.png', NULL, 0.00, 1, NULL, NULL, 'Hadassah Leach', 'Culpa magna enim et', NULL, NULL, NULL, 'Oliver Bailey', 'Abbot Larson', '678', 1, 0, 2, 4, '2025-12-17 17:55:13', '2025-12-22 03:33:05'),
(4, 91, 1, NULL, 'mizanur-rahman-UUCPiL', '01825337148', 'mizan1@gmail.com', NULL, 'Mizanur Rahman', '2010-02-17', 'male', '24545645456', NULL, NULL, NULL, NULL, 'upload/vendor/profile/1851758171184018.jpg', NULL, 'upload/vendor/nid/1851758171293670.jpg', 'upload/vendor/nid/1851758171397956.jpg', NULL, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, '2025-12-17 18:23:28', '2025-12-17 18:23:28'),
(5, 92, 2, 'skhnuvfewn', 'skhnuvfewn-Tj9G7f', '154614', 'sdf@gmail.com', NULL, NULL, NULL, NULL, NULL, 'asfddwag', 2, '634194asdfa', 'sdf478sd', 'upload/vendor/logo/1851758243326119.jpg', NULL, 'upload/vendor/nid/1851758243596065.jpg', 'upload/vendor/nid/1851758243734320.jpg', 'upload/vendor/license/1851758243486888.jpg', 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, '2025-12-17 18:24:37', '2025-12-17 18:24:37'),
(6, 93, 1, NULL, 'test1-XLhvNG', '01930286449', 'mdabutaher12@gmail.com', NULL, 'test1', '2025-12-11', 'male', '56666666', NULL, NULL, NULL, NULL, 'upload/vendor/profile/1851759729187941.png', NULL, 'upload/vendor/nid/1851759729218104.png', 'upload/vendor/nid/1851759729229256.png', NULL, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 4, '2025-12-17 18:48:13', '2025-12-17 18:48:13'),
(7, 94, 1, NULL, 'md-ibrahim-hossain-6Lw0MI', '01307279400', 'ibrahimhossain86@gmail.com', NULL, 'Md Ibrahim Hossain', '1984-10-20', 'male', '1013888126', NULL, NULL, NULL, NULL, 'upload/vendor/profile/1851760516743034.jpg', NULL, 'upload/vendor/nid/1851760516844436.jpg', 'upload/vendor/nid/1851760516955662.jpg', NULL, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 4, '2025-12-17 19:00:45', '2025-12-17 19:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_comissions`
--

CREATE TABLE `vendor_comissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `vendor_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `admin_commission` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_comissions`
--

INSERT INTO `vendor_comissions` (`id`, `order_id`, `vendor_id`, `vendor_amount`, `admin_commission`, `created_at`, `updated_at`, `month`, `year`) VALUES
(40, 44, 10, 702.00, 78.00, '2025-05-29 05:36:49', '2025-05-29 05:36:49', 5, 2025),
(41, 45, 10, 702.00, 78.00, '2025-05-29 05:52:23', '2025-05-29 05:52:23', 5, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_orders`
--

CREATE TABLE `vendor_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `affiliate_id` varchar(250) DEFAULT NULL,
  `subtotal` decimal(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(20,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `coupon_discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(20,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(20,2) NOT NULL DEFAULT 0.00,
  `commission` decimal(20,2) NOT NULL DEFAULT 0.00,
  `vendor_earning` decimal(20,2) NOT NULL DEFAULT 0.00,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>paid, 0=>Unpaid',
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Pending, 1=>Confirmed, 2=>Processing, 3=>Shipped, 4=>Delivered, 5=>Canceled, 6=>Returned, 7=>Refunded, 8=>Failed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_orders`
--

INSERT INTO `vendor_orders` (`id`, `order_id`, `invoice_no`, `vendor_id`, `affiliate_id`, `subtotal`, `shipping_cost`, `discount`, `coupon_discount`, `tax`, `grand_total`, `commission`, `vendor_earning`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(22, 47, NULL, '3', '4', 495.00, 80.00, 0.00, 0.00, 0.00, 575.00, 0.00, 0.00, 0, 0, '2025-12-23 10:44:59', '2025-12-24 09:17:20'),
(23, 48, '0000048', '8', NULL, -9350.00, 80.00, 0.00, 0.00, 0.00, -9270.00, 0.00, 0.00, 0, 4, '2025-12-28 06:42:13', '2025-12-29 10:33:38'),
(24, 48, '0000048', '3', NULL, 900.00, 80.00, 0.00, 0.00, 0.00, 980.00, 0.00, 0.00, 1, 5, '2025-12-28 06:42:13', '2025-12-29 10:33:57'),
(25, 52, '0000052', '3', NULL, 440.00, 80.00, 0.00, 0.00, 0.00, 520.00, 0.00, 0.00, 0, 0, '2025-12-29 10:55:28', '2025-12-29 10:55:28'),
(26, 60, '0000060', '1', NULL, 100.00, 80.00, 0.00, 0.00, 0.00, 180.00, 0.00, 0.00, 0, 0, '2026-01-03 10:46:48', '2026-01-03 10:46:48'),
(27, 64, '0000064', '3', NULL, 480.00, 80.00, 0.00, 0.00, 0.00, 560.00, 0.00, 0.00, 0, 0, '2026-01-11 05:54:58', '2026-01-11 05:54:58'),
(28, 65, '0000065', '5', NULL, 6640.00, 190.00, 0.00, 0.00, 0.00, 6830.00, 0.00, 0.00, 0, 0, '2026-01-25 10:46:50', '2026-01-25 10:46:50'),
(29, 68, '0000068', '5', NULL, 5500.00, 80.00, 0.00, 0.00, 0.00, 5580.00, 0.00, 0.00, 0, 0, '2026-01-25 11:15:43', '2026-01-25 11:15:43'),
(30, 69, '0000069', '5', NULL, 760.00, 80.00, 0.00, 0.00, 0.00, 840.00, 0.00, 0.00, 0, 0, '2026-01-25 12:20:11', '2026-01-25 12:20:11'),
(31, 70, '0000070', '2', NULL, 380.00, 80.00, 0.00, 0.00, 0.00, 460.00, 0.00, 0.00, 0, 0, '2026-01-25 12:23:10', '2026-01-25 12:23:10'),
(32, 71, '0000071', '5', NULL, 5500.00, 80.00, 0.00, 0.00, 0.00, 5580.00, 0.00, 0.00, 0, 0, '2026-01-25 12:23:48', '2026-01-25 12:23:48'),
(33, 72, '0000072', '8', NULL, 100.00, 80.00, 0.00, 0.00, 0.00, 180.00, 0.00, 0.00, 0, 0, '2026-01-26 09:26:43', '2026-01-26 09:26:43'),
(34, 73, '0000073', '5', NULL, 94.00, 80.00, 0.00, 0.00, 0.00, 174.00, 0.00, 0.00, 0, 0, '2026-01-27 05:28:01', '2026-01-27 05:28:01'),
(35, 74, '0000074', '5', NULL, 47.00, 80.00, 0.00, 0.00, 0.00, 127.00, 0.00, 0.00, 0, 0, '2026-02-01 10:20:21', '2026-02-01 10:20:21'),
(36, 75, '0000075', '5', NULL, 5500.00, 80.00, 0.00, 0.00, 0.00, 5580.00, 0.00, 0.00, 0, 0, '2026-02-05 06:39:34', '2026-02-05 06:39:34'),
(37, 76, '0000076', '2', NULL, 380.00, 190.00, 0.00, 0.00, 0.00, 570.00, 0.00, 0.00, 0, 0, '2026-02-11 18:51:46', '2026-02-11 18:51:46'),
(38, 77, '0000077', '2', NULL, 380.00, 80.00, 0.00, 0.00, 0.00, 460.00, 0.00, 0.00, 0, 0, '2026-02-14 11:12:33', '2026-02-14 11:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payments`
--

CREATE TABLE `vendor_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `withdrawal_request_id` int(11) DEFAULT NULL,
  `payment_date` varchar(191) NOT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `month` int(11) NOT NULL,
  `year` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_transactions`
--

CREATE TABLE `vendor_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `add_amount` decimal(10,2) DEFAULT NULL,
  `deduct_amount` decimal(10,2) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `withdraw_amount` decimal(10,2) DEFAULT NULL,
  `withdraw_request_id` int(11) DEFAULT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=>add_amount, 2=>withdraw_amount, 3 => deduct_amount',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_transactions`
--

INSERT INTO `vendor_transactions` (`id`, `vendor_id`, `add_amount`, `deduct_amount`, `invoice_no`, `withdraw_amount`, `withdraw_request_id`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(47, 10, 702.00, NULL, '0000044', NULL, NULL, 5, 2025, 1, '2025-05-29 05:36:49', '2025-05-29 05:36:49'),
(48, 10, 702.00, NULL, '0000045', NULL, NULL, 5, 2025, 1, '2025-05-29 05:52:23', '2025-05-29 05:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `date` varchar(191) NOT NULL,
  `month` int(11) NOT NULL,
  `year` bigint(20) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Pending, 1=>Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_heads`
--
ALTER TABLE `account_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_ledgers`
--
ALTER TABLE `account_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_ledgers_account_head_id_foreign` (`account_head_id`);

--
-- Indexes for table `account_settings`
--
ALTER TABLE `account_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_product_product_id_foreign` (`product_id`),
  ADD KEY `attribute_product_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_value_product_price`
--
ALTER TABLE `attribute_value_product_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_product_price_product_price_id_foreign` (`product_price_id`),
  ADD KEY `attribute_value_product_price_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaings`
--
ALTER TABLE `campaings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaing_products`
--
ALTER TABLE `campaing_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaing_products_campaing_id_foreign` (`campaing_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_structures`
--
ALTER TABLE `commission_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commission_structures_category_id_foreign` (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_products`
--
ALTER TABLE `group_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `returning_products`
--
ALTER TABLE `returning_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_requests`
--
ALTER TABLE `return_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_requests_user_id_foreign` (`user_id`),
  ADD KEY `return_requests_order_id_foreign` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_penalties`
--
ALTER TABLE `seller_penalties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_penalties_vendor_id_foreign` (`vendor_id`),
  ADD KEY `seller_penalties_product_id_foreign` (`product_id`),
  ADD KEY `seller_penalties_order_id_foreign` (`order_id`),
  ADD KEY `seller_penalties_created_by_foreign` (`created_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `value` (`value`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_user_id_foreign` (`user_id`),
  ADD KEY `staff_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`),
  ADD UNIQUE KEY `vendors_slug_unique` (`slug`);

--
-- Indexes for table `vendor_comissions`
--
ALTER TABLE `vendor_comissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_transactions`
--
ALTER TABLE `vendor_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_heads`
--
ALTER TABLE `account_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `account_ledgers`
--
ALTER TABLE `account_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `account_settings`
--
ALTER TABLE `account_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `attribute_value_product_price`
--
ALTER TABLE `attribute_value_product_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `campaings`
--
ALTER TABLE `campaings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `campaing_products`
--
ALTER TABLE `campaing_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `commission_structures`
--
ALTER TABLE `commission_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5156;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_products`
--
ALTER TABLE `group_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `returning_products`
--
ALTER TABLE `returning_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `return_requests`
--
ALTER TABLE `return_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller_penalties`
--
ALTER TABLE `seller_penalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_comissions`
--
ALTER TABLE `vendor_comissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor_transactions`
--
ALTER TABLE `vendor_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_ledgers`
--
ALTER TABLE `account_ledgers`
  ADD CONSTRAINT `account_ledgers_account_head_id_foreign` FOREIGN KEY (`account_head_id`) REFERENCES `account_heads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD CONSTRAINT `attribute_product_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_value_product_price`
--
ALTER TABLE `attribute_value_product_price`
  ADD CONSTRAINT `attribute_value_product_price_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_value_product_price_product_price_id_foreign` FOREIGN KEY (`product_price_id`) REFERENCES `product_prices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campaing_products`
--
ALTER TABLE `campaing_products`
  ADD CONSTRAINT `campaing_products_campaing_id_foreign` FOREIGN KEY (`campaing_id`) REFERENCES `campaings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD CONSTRAINT `product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD CONSTRAINT `product_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
