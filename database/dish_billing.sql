-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 09:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dingedah_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `created_at`, `updated_at`) VALUES
(1, 'Dingedah', '2021-11-18 08:11:26', '2021-11-18 08:11:26'),
(2, 'Sankarchandro', '2021-11-18 08:11:31', '2021-11-18 08:11:31'),
(3, 'Hanurbaradi', '2021-11-18 08:11:59', '2021-11-18 08:11:59'),
(4, 'Khejura', '2021-11-18 08:12:07', '2021-11-18 08:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `collected_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `client_id`, `client_name`, `bill_month`, `bill_year`, `bill_amount`, `billing_date`, `billing_status`, `is_settled`, `collected_by`, `created_at`, `updated_at`) VALUES
(2, '1234567891', 'Md.Rasel Ahmed', '11', '2021', '110', '2021-11-19', 1, 0, 'Md.Ebna Amir Foysal , Rihad', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(3, '1234567892', 'Md.Faizul Islam', '11', '2021', '100', '2021-11-19', 0, 0, '2', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(5, '1234567891', 'Md.Rasel Ahmed', '10', '2021', '110', '2021-11-19', 1, 0, 'Md.Ebna Amir Foysal , Rihad', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(6, '1234567892', 'Md.Faizul Islam', '10', '2021', '100', '2021-11-19', 0, 0, '2', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(8, '1234567891', 'Md.Rasel Ahmed', '9', '2021', '110', '2021-11-19', 1, 0, 'Md.Ebna Amir Foysal , Rihad', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(9, '1234567892', 'Md.Faizul Islam', '9', '2021', '100', '2021-11-19', 0, 0, '2', '2021-11-18 08:44:45', '2021-11-18 08:44:45'),
(10, '1234567890', 'Md.Ebna Amir Foysal', '11', '2021', '120', '2021-11-19', 0, 0, '1', '2021-11-18 21:26:33', '2021-11-18 21:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `collectors`
--

CREATE TABLE `collectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collectors`
--

INSERT INTO `collectors` (`id`, `user_id`, `amount`, `is_settled`, `day`, `created_at`, `updated_at`) VALUES
(3, '1', 450, 0, 'Saturday 11-20-2021', '2021-11-19 17:01:26', '2021-11-19 17:01:26'),
(4, '2', 300, 0, 'Saturday 11-20-2021', '2021-11-19 17:01:32', '2021-11-19 17:01:32'),
(5, '1', 450, 1, 'Friday 10-20-2021', '2021-11-18 17:01:26', '2021-11-18 17:01:26'),
(6, '2', 300, 1, 'Friday 10-20-2021', '2021-11-18 17:01:32', '2021-11-18 17:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memos`
--

CREATE TABLE `memos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memo_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `products_total` int(11) NOT NULL,
  `grand_amount` int(11) NOT NULL,
  `creation_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memos`
--

INSERT INTO `memos` (`id`, `memo_no`, `buyer_id`, `products_total`, `grand_amount`, `creation_date`, `is_settled`, `created_at`, `updated_at`) VALUES
(3, '123456', 3, 30, 30000, 'Sunday 11-21-2021', 0, '2021-11-19 19:38:50', '2021-11-19 19:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `memo_details`
--

CREATE TABLE `memo_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `single_unit_price` double NOT NULL,
  `total_amount` double NOT NULL,
  `memo_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memo_details`
--

INSERT INTO `memo_details` (`id`, `title`, `quantity`, `single_unit_price`, `total_amount`, `memo_no`, `created_at`, `updated_at`) VALUES
(1, 'Keyboard', 1, 250, 250, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(2, 'A4Teck Mouse', 1, 450, 450, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(3, 'Asus z229 Monitor', 1, 10990, 10990, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(4, 'MIX 330-G Gamming  Caching', 1, 3000, 3000, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(5, 'Segate HDD 1 TB', 2, 3000, 6000, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(6, 'Coursair Vengence Ram 4GB', 1, 3000, 3000, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(7, 'Gigabyte Z390Gamming X Motherboard', 1, 8500, 8500, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(8, 'Intel Core i5 9th Gen Processore', 1, 18500, 18500, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(9, 'Power Supply 500W', 1, 1400, 1400, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(10, 'Digital X UPS 650VA', 1, 2000, 2000, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(11, 'NVDIA Geforce GT-1030 2GB', 1, 8500, 8500, '1234567890', '2021-11-18 18:11:47', '2021-11-18 18:11:47'),
(12, 'Foil DIsk Cable', 4, 2500, 10000, '123456789', '2021-11-19 19:37:36', '2021-11-19 19:37:36'),
(13, 'Foil DIsk Cable', 10, 1000, 10000, '123456', '2021-11-19 19:38:50', '2021-11-19 19:38:50'),
(14, 'Foil DIsk Cable', 10, 1000, 10000, '123456', '2021-11-19 19:38:50', '2021-11-19 19:38:50'),
(15, 'Foil DIsk Cable', 10, 1000, 10000, '123456', '2021-11-19 19:38:50', '2021-11-19 19:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_31_235132_laratrust_setup_tables', 1),
(5, '2021_09_20_180315_create_areas_table', 1),
(6, '2021_09_20_180342_create_vicinities_table', 1),
(7, '2021_09_21_173412_create_settings_table', 1),
(8, '2021_09_22_201125_create_subscribers_table', 1),
(9, '2021_09_22_201920_create_billings_table', 1),
(10, '2021_09_29_011450_create_memos_table', 1),
(11, '2021_10_02_014133_create_memo_details_table', 1),
(12, '2021_10_24_003403_create_salleries_table', 1),
(13, '2021_10_30_060741_create_settlements_table', 1),
(15, '2021_11_19_205632_create_collectors_table', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(5, 'profile-read', 'Read Profile', 'Read Profile', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(6, 'profile-update', 'Update Profile', 'Update Profile', '2021-11-18 08:09:25', '2021-11-18 08:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Owner', 'Owner', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(2, 'manager', 'Manager', 'Manager', '2021-11-18 08:09:25', '2021-11-18 08:09:25'),
(3, 'employee', 'Employee', 'Employee', '2021-11-18 08:09:25', '2021-11-18 08:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `salleries`
--

CREATE TABLE `salleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sallery_amount` double NOT NULL DEFAULT 0,
  `sallery_month` int(11) NOT NULL,
  `sallery_year` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salleries`
--

INSERT INTO `salleries` (`id`, `user_id`, `sallery_amount`, `sallery_month`, `sallery_year`, `payment_status`, `is_settled`, `created_at`, `updated_at`) VALUES
(1, 2, 5000, 11, 2021, 1, 1, '2021-11-18 17:12:06', '2021-11-18 17:13:58'),
(2, 3, 3000, 11, 2021, 1, 0, '2021-11-19 17:11:00', '2021-11-19 20:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settled_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settled_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sallery_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked_fund` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collected_bills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_in_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`id`, `settled_month`, `settled_year`, `sallery_paid`, `locked_fund`, `collected_bills`, `cost_in_service`, `balance_paid`, `created_at`, `updated_at`) VALUES
(1, '11', '2021', '5000', '6600', '360', '62590', '-60630', '2021-11-18 18:45:01', '2021-11-18 18:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` int(11) NOT NULL,
  `vicinity` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initialization_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disconnection_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `locked_fund` int(11) NOT NULL,
  `connection_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `client_id`, `client_name`, `client_father`, `area`, `vicinity`, `address`, `initialization_date`, `disconnection_date`, `mobile_no`, `bill_amount`, `locked_fund`, `connection_status`, `is_settled`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'Md.Ebna Amir Foysal', 'Md.Akbar Ali', 1, 1, 'Dingedah Bazar , Manikdihi , Dingedah', '2021-11-18', NULL, '01952820194', 120, 2500, 1, 1, '2021-11-18 08:42:19', '2021-11-18 08:42:19'),
(2, '1234567891', 'Md.Rasel Ahmed', 'Md.Billal Jorder', 1, 2, 'Srikol Bazar,Bualia , Tower Para , Dingedah', '2021-11-17', NULL, '01986851149', 110, 2100, 1, 1, '2021-11-18 08:43:27', '2021-11-18 08:43:27'),
(3, '1234567892', 'Md.Faizul Islam', 'Md.Irfayin Ahmed', 1, 3, 'Sweets Factory 3rd Floor , Eidgha Para , Dingedah', '2021-11-16', NULL, '01303733598', 100, 2000, 1, 1, '2021-11-18 08:44:16', '2021-11-18 08:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civilstatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `phone`, `gender`, `civilstatus`, `division`, `district`, `thana`, `street`, `postal_code`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ebnaamirfoysal@gmail.com', 'Md.Ebna Amir Foysal', 'Rihad', '01986851149', 'MALE', 'SINGLE', 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Dingedah Bazar', '1207', NULL, '$2y$10$JwljAtTBTk8Vg5OgbwGVMOsG8qvMr26y5Ykyg3zwMidzXvhDPPnGC', 'Q9VEKJ1fTXrwR4iwRYUywwnyopvc0oyl6XHIpOw1qukCAP6iVUNYKw48qh1K', '2021-11-18 08:09:26', '2021-11-18 17:21:49'),
(2, 'saju123@gmail.com', 'Md.Sarjadul Islam', 'Saju', '01952820194', 'MALE', 'SINGLE', 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Sixmile ,Sarajgonj', '7200', NULL, '$2y$10$jywWn5.iT1.pnsGeUMjdvelLRZFl4QPzt5mFLPwaIGOgjHljXZrDW', NULL, '2021-11-18 16:35:47', '2021-11-18 16:35:47'),
(3, 'raton123@gmail.com', 'Md.Raton Ahmed', 'Tomal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$RzOQ0GxHkh0upauZJVALMegTfIFSIEYLpwqy5sTpWVIww8JGO0qKS', NULL, '2021-11-18 21:36:21', '2021-11-18 21:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `vicinities`
--

CREATE TABLE `vicinities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) NOT NULL,
  `vicinity_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vicinities`
--

INSERT INTO `vicinities` (`id`, `area_id`, `vicinity_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Manikdihi', '2021-11-18 08:12:17', '2021-11-18 08:12:17'),
(2, 1, 'Tower Para', '2021-11-18 08:12:24', '2021-11-18 08:12:24'),
(3, 1, 'Eidgha Para', '2021-11-18 08:12:31', '2021-11-18 08:12:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collectors`
--
ALTER TABLE `collectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `memos`
--
ALTER TABLE `memos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `memos_memo_no_unique` (`memo_no`);

--
-- Indexes for table `memo_details`
--
ALTER TABLE `memo_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `salleries`
--
ALTER TABLE `salleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_website_name_unique` (`website_name`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vicinities`
--
ALTER TABLE `vicinities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collectors`
--
ALTER TABLE `collectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memos`
--
ALTER TABLE `memos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memo_details`
--
ALTER TABLE `memo_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salleries`
--
ALTER TABLE `salleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settlements`
--
ALTER TABLE `settlements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vicinities`
--
ALTER TABLE `vicinities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
