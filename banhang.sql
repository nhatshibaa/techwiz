-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 06:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SupperAdmin', 'admin@gmail.com', '$2y$10$q3UFgqoa.mt5Yx1dVEBT.ee6CZkLk7p7U4Y.kbYQh6PLJ/mxgenJm', '100', 'ikvwH6gcVJ5eItOJflqUBEYmfIXqRuz4HoD8p1zggM6G55qWbzjQeUEQYPGH', '2020-12-05 00:38:38', '2020-12-05 02:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `status` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(3, 7, '2020-04-18', 150, 'COD', 1, 'OK', '2020-04-18 07:08:04', '2020-04-18 00:08:37'),
(5, 7, '2020-04-18', 160, 'COD', 1, 'OK', '2020-04-18 10:35:58', '2020-04-18 03:36:29'),
(6, 7, '2020-04-18', 490, 'ATM', 1, 'OK', '2020-04-18 13:42:59', '2020-04-18 06:43:53'),
(8, 2, '2020-04-18', 160, 'COD', 1, 'OKa', '2020-04-18 19:36:01', '2020-04-18 20:07:49'),
(12, 7, '2020-04-19', 150, 'COD', 1, 'OK', '2020-04-19 04:10:57', '2020-04-18 21:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(11, 11, 57, 2, 150, '2020-03-21 07:16:09', '2020-03-21 07:16:09'),
(12, 11, 61, 1, 120, '2020-03-21 07:16:09', '2020-03-21 07:16:09'),
(13, 12, 61, 1, 120, '2020-03-21 07:20:07', '2020-03-21 07:20:07'),
(14, 12, 60, 2, 200, '2020-03-21 07:20:07', '2020-03-21 07:20:07'),
(15, 13, 59, 1, 200, '2020-03-21 07:29:31', '2020-03-21 07:29:31'),
(16, 13, 60, 1, 20, '2020-03-21 07:29:31', '2020-03-21 07:29:31'),
(17, 14, 2, 1, 160, '2020-03-23 04:46:05', '2020-03-23 04:46:05'),
(18, 15, 62, 5, 220, '2020-03-24 07:14:32', '2020-03-24 07:14:32'),
(19, 22, 7, 1, 160, '2020-04-16 14:30:53', '2020-04-16 14:30:53'),
(20, 23, 61, 1, 150, '2020-04-17 02:08:04', '2020-04-17 02:08:04'),
(21, 23, 2, 1, 180, '2020-04-17 02:08:04', '2020-04-17 02:08:04'),
(22, 24, 2, 1, 180, '2020-04-17 02:10:50', '2020-04-17 02:10:50'),
(23, 25, 2, 1, 180, '2020-04-17 06:19:07', '2020-04-17 06:19:07'),
(24, 26, 2, 1, 180, '2020-04-17 06:37:32', '2020-04-17 06:37:32'),
(25, 27, 2, 1, 18, '2020-04-17 17:47:59', '2020-04-17 17:47:59'),
(26, 28, 7, 1, 1600, '2020-04-17 19:30:37', '2020-04-17 19:30:37'),
(27, 28, 13, 1, 300, '2020-04-17 19:30:37', '2020-04-17 19:30:37'),
(28, 1, 13, 1, 300, '2020-04-18 04:27:42', '2020-04-18 04:27:42'),
(29, 1, 1, 1, 150, '2020-04-18 04:27:42', '2020-04-18 04:27:42'),
(30, 2, 7, 1, 160, '2020-04-18 05:33:36', '2020-04-18 05:33:36'),
(31, 2, 2, 1, 180, '2020-04-18 05:33:36', '2020-04-18 05:33:36'),
(32, 3, 1, 1, 150, '2020-04-18 07:08:05', '2020-04-18 07:08:05'),
(33, 4, 1, 1, 150, '2020-04-18 07:44:54', '2020-04-18 07:44:54'),
(34, 5, 7, 1, 160, '2020-04-18 10:35:58', '2020-04-18 10:35:58'),
(35, 6, 57, 1, 150, '2020-04-18 13:42:59', '2020-04-18 13:42:59'),
(36, 6, 7, 1, 160, '2020-04-18 13:43:00', '2020-04-18 13:43:00'),
(37, 6, 2, 1, 180, '2020-04-18 13:43:00', '2020-04-18 13:43:00'),
(38, 7, 7, 1, 160, '2020-04-18 19:31:44', '2020-04-18 19:31:44'),
(39, 8, 7, 1, 1600, '2020-04-18 19:36:01', '2020-04-18 19:36:01'),
(40, 9, 7, 1, 1600, '2020-04-19 03:04:40', '2020-04-19 03:04:40'),
(41, 10, 7, 1, 1600, '2020-04-19 03:04:51', '2020-04-19 03:04:51'),
(42, 11, 7, 1, 1600, '2020-04-19 03:06:31', '2020-04-19 03:06:31'),
(43, 12, 1, 1, 1500, '2020-04-19 04:10:58', '2020-04-19 04:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_User` int(10) DEFAULT NULL,
  `id_Product` int(10) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_comment` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_User`, `id_Product`, `content`, `date_comment`, `created_at`, `updated_at`) VALUES
(105, 7, 1, 'OK', '0000-00-00', '2020-04-18 06:54:36', '2020-04-18 06:54:36'),
(106, 7, 1, 'OK', '0000-00-00', '2020-04-18 06:55:00', '2020-04-18 06:55:00'),
(107, 7, 1, 'OK', '2020-04-18', '2020-04-18 07:26:47', '2020-04-18 07:26:47'),
(108, 2, 20, 'OK', '2020-04-18', '2020-04-18 12:46:40', '2020-04-18 12:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bàn Hữu Quỳnh', 1698586505, 'huuquynh8@gmail.com', 'xin chào shop', '2020-04-16 13:03:51', '2020-04-16 13:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2020-03-21 07:16:09', '2020-03-21 07:16:09'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2020-03-21 07:20:07', '2020-03-21 07:20:07'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2020-03-21 07:29:31', '2020-03-21 07:29:31'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2020-03-23 04:46:05', '2020-03-23 04:46:05'),
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2020-03-24 07:14:32', '2020-03-24 07:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2021_04_10_063302_create_transactions_table', 2),
(4, '2021_04_16_145024_create_admins_table', 3),
(5, '2021_04_17_031458_alter_column_code_and_time_code_in_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Article.', 'Article ', 'sample1.jpg', '2020-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Article2', 'Article2 ', 'sample2.jpg', '2020-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Article3', 'Article3', 'sample3.jpg', '2020-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `pro_number` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` int(11) NOT NULL,
  `new` tinyint(4) DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `pro_number`, `image`, `unit`, `hot`, `new`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asus ROG THETA 7.1', 5, 'Asus ROG THETA 7.1', 1500, 1200, 2, '51503_hnc_tai_nghe_asus_rog_theta_7_1.jpg', '', 0, 1, 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(2, 'RAM DDR4 Kingston ECC 64GB bus 2400MHz', 6, '', 1800, 1600, 3, '48824_ram_ddr4_kingston_ecc_64gb_bus_2400_mhz_ksm24lq4_64hai_registered_1.jpg', '', 0, 1, 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(3, 'SteelSeries Arctis Pro+GameDAC 61453', 5, '', 1500, 1200, 1, '41815_tai_nghe_steelseries_arctis_progamedac_61453_0004_1.jpg', '', 0, 0, 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(4, 'Asus ROG THETA 7.1', 5, '', 1600, 0, 4, '51503_hnc_tai_nghe_asus_rog_theta_7_1.jpg', '', 0, 0, 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(5, 'SteelSeries Arctis Pro+GameDAC 61453', 5, '', 1600, 0, 4, '41815_tai_nghe_steelseries_arctis_progamedac_61453_0004_1.jpg', '', 0, 0, 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(6, 'Asus ROG THETA 7.1', 5, '', 2000, 1800, NULL, '51503_hnc_tai_nghe_asus_rog_theta_7_1.jpg', '', 0, 0, 0, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(7, 'Steelseries Arctis Pro+GAMEDAC White 61454', 5, '', 1600, 0, NULL, '50385_tai_nghe_steelseries_arctis_progamedac_white_61454_0003_3.jpg', '', 0, 1, 0, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(8, 'Razer Nari Ultimate PewDiePie Edition', 5, '', 1600, 1500, NULL, '52126_tai_nghe_razer_nari_ultimate_pewdiepie_edition_rz04_02670300_r3m1_0000_1.jpg', '', 0, 0, 0, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(9, 'Steelseries Arctis Pro+GAMEDAC White 61454', 5, '', 1600, 1500, NULL, '50385_tai_nghe_steelseries_arctis_progamedac_white_61454_0003_3.jpg', '', 0, 0, 0, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(12, 'Logitech B100 Black', 3, '', 2000, 1800, NULL, '23744_4872_522ce00c5acc3b5b8ec5c3dd81498fa4.jpg', '', 0, 0, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(13, 'Logitech B100 Black', 3, '', 3000, 2800, NULL, '3744_4872_522ce00c5acc3b5b8ec5c3dd81498fa4.jpg', '', 0, 1, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(14, 'Asus ROG Gladius II Pink', 3, '', 3000, 2800, NULL, '54460_chuot_asus_rog_gladius_ii_pink_usb_mau_hong_0000_1.jpg', '', 0, 0, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(15, 'Logitech B100 Black', 3, '', 3500, 3200, NULL, '3744_4872_522ce00c5acc3b5b8ec5c3dd81498fa4.jpg', '', 0, 1, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(16, 'Asus ROG Gladius II Pink', 3, '', 1500, 1200, NULL, '54460_chuot_asus_rog_gladius_ii_pink_usb_mau_hong_0000_1.jpg', '', 0, 0, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(17, 'Asus ROG Gladius II Pink', 3, '', 2500, 2400, NULL, '54460_chuot_asus_rog_gladius_ii_pink_usb_mau_hong_0000_1.jpg', '', 0, 0, 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(18, 'CPU Intel Xeon Silver 4110', 2, '', 1800, 0, NULL, '40825_hnc_intel_xeon_silver_right_facing_850x850.jpg', 'CPU', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(19, 'CPU Intel Core i9-10920X ', 2, '', 1500, 0, NULL, '49436_hnc_intel_i9_10900x_right_facing_850x850.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(20, 'CPU Intel Core i9-9900X ', 2, '', 1500, 0, NULL, '45079_hnc_intel_core_i9_xtreme_right_facing_850x850.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(21, 'CPU Intel Core i9-9900KF', 2, '', 1600, 1500, NULL, '45160_hnc_intel_i9_9900kf_right_facing_850x850.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(22, 'Laptop MSI Modern 14 B11SB', 1, '', 1600, 1500, NULL, '55874_modern14__6_.png', 'Laptop', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(23, 'Laptop MSI Gaming GL65 Leopard 10SCXK', 1, '', 1800, 0, NULL, '55873_laptop_msi_gaming_gl65_leopard_10scxk_089vn_den_2020_10.png', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(24, 'Laptop Asus Gaming ROG Strix G512-IAL011T', 1, '', 1800, 0, NULL, '55873_laptop_msi_gaming_gl65_leopard_10scxk_089vn_den_2020_10.png', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(25, 'Laptop Acer Aspire 5 A515-56G-51YL ', 1, '', 800, 700, NULL, '56294_a515_56__5_.png', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(26, 'Laptop Asus Gaming ROG Zephyrus GA401II-HE154T', 1, '', 500, 0, NULL, '55084_laptop_asus_gaming_rog_zephyrus_ga401ii_he154t_xam_8.png', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(27, 'Laptop HP Gaming Pavilion 15-ec1054AX', 1, '', 1000, 800, NULL, '54959_laptop_hp_gaming_pavilion_15_ec1054ax_1n1h6pa_den_4.png', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(28, 'Laptop Acer Gaming Nitro 5 AN515-55-72P6', 1, '', 1200, 0, NULL, '57768_laptop_acer_gaming_nitro_5_an515_55_72p6_nh_qbnsv_004_den_2021_8.jpg', 'Laptop', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(29, 'Laptop Acer Aspire 7 A715-42G-R4ST', 1, '', 1000, 0, NULL, '57769_aspire_7_13_.jpg', 'Laptop', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(30, 'Realforce R2 RGB - Mechanical Topre', 4, '', 3800, 3500, NULL, '47356_keyboard_realforce_r2_rgb_mechanical_topre_45gram_switch_tkl_black_r2tla_us4g_bk_0001_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(31, 'Razer BlackWidow V3 Pro', 4, '', 3800, 3500, NULL, '56225_ba_n_phi_m_khong_day_razer_blackwidow_v3_pro_rz03_03530100_r3m1_0001_2.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(32, 'Realforce R2 RGB - Mechanical Topre', 4, '', 3800, 3500, NULL, '47356_keyboard_realforce_r2_rgb_mechanical_topre_45gram_switch_tkl_black_r2tla_us4g_bk_0001_2.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(33, 'Razer BlackWidow V3 Pro', 4, '', 2800, 2500, NULL, '56225_ba_n_phi_m_khong_day_razer_blackwidow_v3_pro_rz03_03530100_r3m1_0001_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(34, 'Realforce R2 RGB - Mechanical Topre', 4, '', 2800, 0, NULL, '47356_keyboard_realforce_r2_rgb_mechanical_topre_45gram_switch_tkl_black_r2tla_us4g_bk_0001_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(35, 'Razer BlackWidow V3 Pro', 4, '', 3200, 3000, NULL, '56225_ba_n_phi_m_khong_day_razer_blackwidow_v3_pro_rz03_03530100_r3m1_0001_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(36, 'Filco Majestouch Convertible 2 Shibuki Red', 4, '', 3200, 3000, NULL, '41097_keyboard_filco_majestouch_convertible_2_shibuki_red_red_switch_104_0001_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(37, 'Ducky Year of the Dog RGB Limited Edition Cherry Brown switch', 4, '', 3200, 3000, NULL, '43495_keyboard_ducky_year_of_the_dog_rgb_limited_edition_cherry_brown_switch_0002_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(38, 'Filco Majestouch Convertible 2 Shibuki Red', 4, '', 3500, 3300, NULL, '41097_keyboard_filco_majestouch_convertible_2_shibuki_red_red_switch_104_0001_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(39, 'Ducky Year of the Dog RGB Limited Edition Cherry Brown switch', 4, '', 3500, 3300, NULL, '43495_keyboard_ducky_year_of_the_dog_rgb_limited_edition_cherry_brown_switch_0002_2.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(40, 'Ducky Year of the Dog RGB Limited Edition Cherry Brown switch', 4, '', 3500, 3300, NULL, '43495_keyboard_ducky_year_of_the_dog_rgb_limited_edition_cherry_brown_switch_0002_2.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(41, 'Filco Majestouch Convertible 2 Shibuki Red', 4, 'Filco Majestouch Convertible 2 Shibuki Red', 3500, 3300, NULL, '41097_keyboard_filco_majestouch_convertible_2_shibuki_red_red_switch_104_0001_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(42, 'RAM DDR4 HP 32GB DDR4-2666 (1x32GB)', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 1500, 1300, NULL, '50013_hp_32gb_ddr4_2666__1x32gb__ecc_reg_ram__1xd86aa_.png', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(43, 'RAM Desktop Gskill Trident Z RGB (F4-3200C16D-64GTZR) 64GB (2x32GB)', 6, 'RAM Desktop Gskill Trident Z RGB (F4-3200C16D-64GTZR) 64GB (2x32GB)', 1200, 0, NULL, '54204_ram_desktop_gskill_trident_z_rgb__f4_3200c16d_64gtzr__64gb__2x32gb__ddr4_3200mhz_4.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(44, 'RAM DDR4 HP 32GB DDR4-2666 (1x32GB)', 6, 'Filco Majestouch Convertible 2 Shibuki Red.', 1200, 0, NULL, 'c50013_hp_32gb_ddr4_2666__1x32gb__ecc_reg_ram__1xd86aa_.png', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(45, 'RAM Desktop Gskill Trident Z RGB (F4-3200C16D-64GTZR) 64GB (2x32GB)', 6, 'RAM Desktop Gskill Trident Z RGB (F4-3200C16D-64GTZR) 64GB (2x32GB)', 1200, 0, NULL, '54204_ram_desktop_gskill_trident_z_rgb__f4_3200c16d_64gtzr__64gb__2x32gb__ddr4_3200mhz_4.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(46, 'Ram Desktop Gskill Trident Z Neo RGB (F4-3600C18D-64GTZN) 64GB (2x32GB)', 6, 'Ram Desktop Gskill Trident Z Neo RGB (F4-3600C18D-64GTZN) 64GB (2x32GB)', 1200, 0, NULL, '54204_ram_desktop_gskill_trident_z_rgb__f4_3200c16d_64gtzr__64gb__2x32gb__ddr4_3200mhz_4 (1).jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(47, 'Ram Desktop Corsair Vengeance RGB (CMW64GX4M2E3200C16) 64GB (2x32GB) ', 6, 'Ram Desktop Corsair Vengeance RGB (CMW64GX4M2E3200C16) 64GB (2x32GB) .', 1400, 0, NULL, '55011_ram_desktop_corsair_vengeance_rgb__cmw64gx4m2e3200c16__64gb__2x32gb__ddr4_3200mhz__3_.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(48, 'RAM Desktop Gskill Trident Z RGB (F4-3600C18D-64GTZR) 64GB (2x32GB) ', 6, 'RAM Desktop Gskill Trident Z RGB (F4-3600C18D-64GTZR) 64GB (2x32GB) ', 1400, 0, NULL, '54eaf93713081_-_07-germany-tuna.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(49, 'Obutto oZone Racing Cockpit', 7, '', 1200, 1000, NULL, '28942_buong_choi_game_gia_lap_obutto_ozone_racing_cockpit_0000_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(50, 'Obutto R3Volution Racing New ', 7, '', 1200, 1000, NULL, '28944_buong_choi_game_gia_lap_obutto_r3volution_racing_new_0000_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(51, 'Obutto oZone Racing Cockpit', 7, '', 1500, 0, NULL, '28942_buong_choi_game_gia_lap_obutto_ozone_racing_cockpit_0000_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(52, 'Obutto R3Volution Racing New ', 7, '', 1500, 0, NULL, '28944_buong_choi_game_gia_lap_obutto_r3volution_racing_new_0000_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(53, 'Obutto oZone Racing Cockpit', 7, '', 1500, 0, NULL, '28942_buong_choi_game_gia_lap_obutto_ozone_racing_cockpit_0000_1.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(54, 'Obutto oZone Racing Cockpit 2', 7, '', 1500, 0, NULL, '28943_buong_choi_game_gia_lap_obutto_ozone_racing_cockpit_0001_2.jpg', '', 0, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(55, 'HTC VIVE Pro Full Kit', 7, '', 1500, 0, NULL, '55791_kinh_thuc_te_ao_htc_vive_pro_full_kit_0005_5.jpg', '', 0, 0, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(56, 'Obutto R3Volution Racing New ', 7, '', 1500, 0, NULL, '28944_buong_choi_game_gia_lap_obutto_r3volution_racing_new_0000_1.jpg', '', 0, 0, 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(57, 'Obutto oZone Racing Cockpit 2', 7, '', 1500, 0, NULL, '28943_buong_choi_game_gia_lap_obutto_ozone_racing_cockpit_0001_2.jpg', '', 1, 1, 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(58, 'CPU Intel Core i9-10940X', 2, 'CPU Intel Core i9-10940X.', 2000, 1800, NULL, '49437_hnc_intel_i9_10900x_right_facing_850x850.jpg', '', 0, 0, 1, '2020-10-26 17:00:00', '2020-10-11 17:00:00'),
(59, 'CPU AMD Ryzen 5 3500', 2, 'CPU AMD Ryzen 5 3500', 2000, 0, NULL, '49430_hnc_amd_ryzen_5_left_facing_850x850.jpg', '', 1, 0, 0, '2020-10-26 17:00:00', '2020-10-11 17:00:00'),
(60, 'CPU Intel Core i9-11900', 2, 'CPU Intel Core i9-11900.', 2000, 0, NULL, '58411_cpu_intel_core_i9_11900_2_5ghz_turbo_up_to_5_2ghz_8_nhan_16_luong_16mb_cache_65w_socket_intel_lga_1200_1.jpg', '', 0, 0, 1, '2020-10-26 17:00:00', '2020-10-11 17:00:00'),
(61, 'Ram Desktop Corsair Vengeance RGB (CMW64GX4M2E3200C16) 64GB (2x32GB) ', 6, 'Ram Desktop Corsair Vengeance RGB (CMW64GX4M2E3200C16) 64GB (2x32GB) .', 1500, 1000, NULL, '55011_ram_desktop_corsair_vengeance_rgb__cmw64gx4m2e3200c16__64gb__2x32gb__ddr4_3200mhz__3_.jpg', '', 1, 1, 0, NULL, NULL),
(62, 'RAM Desktop Gskill Trident Z RGB (F4-3600C18D-64GTZR) 64GB (2x32GB) ', 6, 'RAM Desktop Gskill Trident Z RGB (F4-3600C18D-64GTZR) 64GB (2x32GB)', 250000, 220000, NULL, '55011_ram_desktop_corsair_vengeance_rgb__cmw64gx4m2e3200c16__64gb__2x32gb__ddr4_3200mhz__3_.jpg', '', 1, 0, 1, NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `link`, `image`) VALUES
(1, 'Laptop Gaming', '', 'banner1.jpg'),
(2, 'Laptop Gaming', '', 'banner2.jpg'),
(3, 'Laptop Gaming', '', 'banner3.jpg'),
(4, 'Laptop Gaming', '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Laptop', 'img', NULL, '2020-04-26 20:55:11'),
(2, 'CPU', 'CPU', 'img', '2020-04-26 02:16:15', '2020-04-26 01:38:35'),
(3, 'Mouse', 'Mouse', 'imgg', '2020-04-26 00:33:33', '2020-04-26 07:25:27'),
(4, 'KeyBoard', 'KeyBoard', 'imgg', '2020-04-26 03:29:19', '2020-04-26 02:22:22'),
(5, 'HeadPhone', 'HeadPhone', 'imgg', '2020-04-26 04:00:00', '2020-04-26 04:00:23'),
(6, 'Game Machine', 'Gmae Machine', 'pizza', '2020-04-26 17:19:00', NULL),
(7, 'Other', 'A.', 'sukemdau.jpg', '2020-04-26 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` date DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `status`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `code`, `time_code`, `provider`, `provider_id`) VALUES
(2, 'nguyễn văn A', 'huuquynh8@gmail.com', '$2y$10$vLKJZv2lsffOOePGe4M9ieSWYI00w3q3/atxjOrpHHiesjof49.4O', '1698586505', 'Thuan An Binh Duong', 1, NULL, NULL, '2020-04-17 08:06:32', '2020-04-18 12:25:41', '$2y$10$QqqDDxUV5rT75tIyo8lL6u//17KVg/rQohtmCyayDMaY9Qli2UIw2', '2020-04-18', NULL, NULL),
(4, 'Nguyễn Quỳnh Loan', 'quynhloan20207@gmail.com', '$2y$10$eIuOAcYbhNvDt/8KYZUYMuBHHvtO1nuByeg6RHaSSfb05zZKMZhvy', '1234567895663', 'thuận an- bình dương', 1, NULL, '2020-04-17 10:21:29', '2020-04-17 10:15:03', '2020-04-17 10:21:29', NULL, NULL, NULL, NULL),
(7, 'Hồ Nguyễn Long Sanh', 'longsanhpro2014@gmail.com', '$2y$10$Ai5YLc/U4aKCNIde/wOCMeTTa9za1O5CK37LUq8gbqH79Keru2tbq', '1698586505', 'thuận an- bình dương', 1, 'XxKgDLXiQfSckLSzQx7DlUh3trEMW3xPsDW4HNqfZGJBOFgXyYuRGirCB9LB', '2020-04-17 23:25:47', '2020-04-17 23:25:21', '2020-04-18 18:26:17', '$2y$10$sEsJk03WqYW9.TYwpXCmOeyMfSpoGWVjrCYEIjEZkQzxT1fIpE/5G', '2020-04-19', NULL, NULL),
(8, 'Trần Minh Quyền', 'tranminhquyen13051998@gmail.com', '$2y$10$kUgpinKvmY4yyRu0DGeOSewZFp21ZBxzjRGPC20cmAo7.5sFaiY6i', '123456789', 'Tây Ninh', 1, NULL, NULL, '2020-04-18 03:32:08', '2020-04-18 03:32:08', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bills_users` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_code_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `FK_bill_detail_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
