-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2023 at 03:47 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v11_ftms_copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `company_id`, `user_id`, `course_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 21, 2, 'dsf hdf hjfd jksdfh', 0, '2023-05-13 05:44:01', '2023-05-13 05:44:01'),
(3, 5, 21, 2, 'dsf hdf hjfd jksdfh', 0, '2023-05-13 05:43:44', '2023-05-13 05:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `applied_evalutions`
--

DROP TABLE IF EXISTS `applied_evalutions`;
CREATE TABLE IF NOT EXISTS `applied_evalutions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `evualtion_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

DROP TABLE IF EXISTS `appoinments`;
CREATE TABLE IF NOT EXISTS `appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `avialble_time_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_times`
--

DROP TABLE IF EXISTS `available_times`;
CREATE TABLE IF NOT EXISTS `available_times` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hour_from` time NOT NULL,
  `hour_to` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_times`
--

INSERT INTO `available_times` (`id`, `expert_id`, `date`, `hour_from`, `hour_to`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-12', '09:41:39', '21:41:39', 0, 40.00, NULL, '2023-05-13 04:00:09'),
(2, 2, '2023-05-28', '17:00:00', '18:00:00', 1, NULL, NULL, NULL),
(5, 1, '2023-05-05', '09:41:39', '21:41:39', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `slug`, `image`, `description`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Mohammed company', 'mohammed-company', 'uploads/7ThhNXp5qolfNwLOmo15KtJu0x0uHVIR1WoFtn5Q.png', '<p>jklhas jsdhalkj kj hasdkjha oiashefjk; ksajdfk&nbsp;</p>', 'dsh fa jhfdskalj jhsdj fa', '2023-05-08 07:51:42', '2023-05-08 07:52:23', NULL),
(5, 'khaled assi company', 'khaled-assi', 'uploads/YsjdCwWxFcYeEFZ1d2aw1ka7GHflRmiprCDeyhp6.png', '<p>fdsfsfdsf sf sd fsd dfs ds dsf</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.746937685432!2d34.42946153164712!3d31.50363902497154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f80c0e03343%3A0x988b2aca0284c209!2z2YXYs9is2K8g2KfZhNmH2K_Yp9mK2Kk!5e0!3m2!1sar!2s!4v1683806913048!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-05-09 07:44:10', '2023-05-11 09:12:29', NULL),
(7, 'ghj', 'ghi', 'uploads/BYwki0Pi5rVcuq8XdI7GQYWkZVJdliWh9xXxzW6x.png', '<p>hyj hh fgjhj hj jgh fgj</p>', 'hgjf gjf jfg jhgfj', '2023-05-09 07:45:34', '2023-05-09 07:45:34', NULL),
(8, 'AboZorTech', 'abozortech', 'uploads/mV7f0BTfo1rdKsGUjYPrI5LbK4WSOLkiHv9kr424.png', '<p>Its A huge company in palestine</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-05-13 04:51:37', '2023-05-13 04:51:37', NULL),
(9, 'AboZorTech', 'abozortech-1', 'uploads/sk7m9rXb21PKfsbhas9IzOXrcCm8F0qLonIqARkL.png', '<p>&nbsp;sfa ds fds dgfdg d</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-05-13 05:00:48', '2023-05-13 05:00:48', NULL),
(10, 'Ryder Per', 'ryder-per', 'uploads/NkQUqlVFjMkkVg8vl4mSNxQwWCFQ8YmrUdSHgzCW.png', '<p>dsffds&nbsp; d fsd fsd s f efd dfs&nbsp;</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-05-13 05:02:07', '2023-05-13 05:02:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `company_id`, `supervisor_id`, `name`, `image`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 23, 'Php', '', 'Php Course', '2023-12-05', '2024-01-11', NULL, NULL),
(2, 5, 23, 'Asp.Net', '', 'sdjf hjfs', '2024-12-11', '2022-01-12', NULL, NULL),
(3, 8, 23, 'Js', '', 'Java', '2024-12-11', '2022-01-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('student','company') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

DROP TABLE IF EXISTS `experts`;
CREATE TABLE IF NOT EXISTS `experts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `company_id`, `name`, `image`, `hour_price`, `created_at`, `updated_at`) VALUES
(1, 3, 'Amal', 'uploads/YsjdCwWxFcYeEFZ1d2aw1ka7GHflRmiprCDeyhp6.png', 30, NULL, NULL),
(2, 5, 'ahmed', 'uploads/7ThhNXp5qolfNwLOmo15KtJu0x0uHVIR1WoFtn5Q.png', 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_25_110053_create_courses_table', 1),
(7, '2023_04_25_110855_create_companies_table', 1),
(8, '2023_04_25_111154_create_applications_table', 1),
(9, '2023_04_25_111542_create_tasks_table', 1),
(10, '2023_04_25_111726_create_evaluations_table', 1),
(11, '2023_04_25_111932_create_questions_table', 1),
(12, '2023_04_25_112226_create_applied_evalutions_table', 1),
(13, '2023_04_25_112332_create_experts_table', 1),
(14, '2023_04_25_112819_create_available_times_table', 1),
(15, '2023_04_25_113152_create_appoinments_table', 1),
(16, '2023_04_25_122510_create_profiles_table', 1),
(17, '2022_12_15_153804_add_deleted_to_companies_table', 2),
(18, '2023_05_11_131443_create_notifications_table', 3),
(19, '2015_00_00_000000_create_settings_table', 4),
(20, '2023_05_11_133143_create_notifications_table', 5),
(21, '2023_05_13_061916_create_payments_table', 5),
(22, '2022_12_27_150421_add_slug_to_company_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0211ef45-341a-4e6d-b621-409672c91929', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Mohammed N Abozour Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:07:23', '2023-05-11 14:07:23'),
('3dc32019-23f5-42c1-bf35-225eddd4c3e3', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:12:24', '2023-05-11 14:12:24'),
('073b39a4-0c53-4016-be82-9b4018cea5f0', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:14:33', '2023-05-11 14:14:33'),
('e478c8f0-4ee8-4775-abe0-732d0f231da6', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:19:51', '2023-05-11 14:19:51'),
('8e04ed20-29dc-4195-9239-ee0e3906fe8c', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:20:05', '2023-05-11 14:20:05'),
('2d331cdf-615b-48c9-9352-19d683c7e3e7', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:22:50', '2023-05-11 14:22:50'),
('0d43cfb5-77b4-4a3a-8417-a7979f236890', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:24:35', '2023-05-11 14:24:35'),
('a31fb28e-7dd2-4372-ac70-7bfa7e02a004', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-11 14:24:58', '2023-05-11 14:24:58'),
('774a0b83-99e8-4ef1-81d7-10454f7022ad', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-12 03:31:17', '2023-05-12 03:31:17'),
('0e109d9d-cbaf-47a5-ae61-f93910ff4f6f', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-12 03:51:30', '2023-05-12 03:51:30'),
('e46953e4-fc5e-4d13-bfb3-95a75d095af6', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-12 04:14:46', '2023-05-12 04:14:46'),
('12bd8a6f-14ad-4691-b7c0-6c55fc9d36fb', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 24, '{\"msg\":\"New Student Abo Naser Apply on Php\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-12 04:20:27', '2023-05-12 04:20:27'),
('7b76098e-baca-4544-b01a-4b5b4d05fe44', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:14:45', '2023-05-13 02:14:45'),
('1b5666d0-92ec-4cf6-b3ed-cee193ff4a26', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:14:52', '2023-05-13 02:14:52'),
('98f379c4-3c42-4eb3-a5b2-b9b87b24dfe1', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:15:29', '2023-05-13 02:15:29'),
('51a2c0a1-c0d0-455d-a51d-8edd036efa1e', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:16:57', '2023-05-13 02:16:57'),
('6377710c-ee56-44dc-9688-9d1e7d7b6597', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:19:03', '2023-05-13 02:19:03'),
('020f46fe-830f-4aec-89ca-7b37fa00b9aa', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 02:19:17', '2023-05-13 02:19:17'),
('484d7cb6-b0ab-4448-94aa-7cc98aaa9f2d', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 04:14:09', '2023-05-13 04:14:09'),
('726f5de3-94fe-4273-96a1-ee0ba24e5dfc', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 04:14:10', '2023-05-13 04:14:10'),
('518923e9-97b4-4115-9e76-b9c235cecdfe', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 04:14:17', '2023-05-13 04:14:17'),
('b970ed0c-78cb-4415-a270-89d22cef5d46', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:16:25', '2023-05-13 05:16:25'),
('6c7ccc12-b749-42ee-9f54-f9a93f4fd3a6', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:16:50', '2023-05-13 05:16:50'),
('7bb85551-fafc-4a0b-acbc-126c1155b7a7', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:16:51', '2023-05-13 05:16:51'),
('46b42be7-ef2f-4675-ba7d-f2d28433b208', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:17:01', '2023-05-13 05:17:01'),
('86c8b598-502c-42ef-aed2-32c5340add62', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:17:03', '2023-05-13 05:17:03'),
('b26471fd-3c5c-43fe-ad5d-ecc979ce0344', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:19:26', '2023-05-13 05:19:26'),
('f830b532-0112-492d-ad38-d35704562505', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:20:54', '2023-05-13 05:20:54'),
('885101ea-5a0e-4e60-a895-76b045612080', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:24:31', '2023-05-13 05:24:31'),
('9bda1c5e-4e8b-4e02-a546-460c4757e2a0', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:30:39', '2023-05-13 05:30:39'),
('8da83db1-115e-4b50-b76b-de912536431a', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:30:49', '2023-05-13 05:30:49'),
('5cd3847c-af48-4efc-9eb2-c68a68b99fd3', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:30:51', '2023-05-13 05:30:51'),
('14239bb6-3f55-4a92-bf68-5ff91d01077d', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:36:43', '2023-05-13 05:36:43'),
('636edb39-e5d0-4d52-b87e-683dbfc60b2e', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:36:50', '2023-05-13 05:36:50'),
('d337e270-5be7-499c-9f32-4533347e91ce', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:43:45', '2023-05-13 05:43:45'),
('3da819b1-af84-4780-b683-9c6177eb1200', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 23, '{\"msg\":\"New Student gfds Apply on Asp.Net\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-05-13 05:44:01', '2023-05-13 05:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `time_id`, `total`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 23, 2, 40, '8ac7a49f881074f0018813e738285da1', '2023-05-13 03:58:23', '2023-05-13 03:58:23'),
(2, 23, 1, 40, '8ac7a4a08810780f018813e8d4f65adf', '2023-05-13 04:00:09', '2023-05-13 04:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `status`, `bio`, `fb`, `tw`, `li`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'aut iusto quasi nesciunt non', 'Omnis tempore asperiores magni nam architecto. Et earum vel possimus iusto. Dicta omnis ut quis fugit.', 'https://www.pfeffer.com/quisquam-et-incidunt-dolor-ipsam', 'http://www.lubowitz.biz/', 'http://dickens.net/quisquam-a-amet-culpa-consequuntur', 9, '2023-05-02 11:37:04', '2023-05-02 11:37:04'),
(2, 'et et distinctio laudantium cupiditate', 'Sunt voluptatem sed itaque atque est. Suscipit est ex fugit omnis minus. Ipsa labore vitae quam sed repellat expedita. Maiores qui nam quidem qui. Molestiae aut asperiores ex.', 'http://www.moore.org/dignissimos-dolores-nemo-reprehenderit-ut-ipsum-eaque-ratione-aliquid', 'http://schmeler.com/', 'http://www.balistreri.info/assumenda-pariatur-incidunt-distinctio-atque-praesentium-non', 15, '2023-05-02 11:37:04', '2023-05-02 11:37:04'),
(3, 'quisquam in maiores et sequi', 'Impedit nesciunt voluptas soluta commodi nemo qui dicta. Odio culpa ea odio reiciendis quo placeat rerum. Ad eius nihil excepturi.', 'http://bosco.com/', 'http://www.huel.com/enim-id-soluta-ratione-mollitia', 'https://www.mccullough.info/consequuntur-atque-ullam-sint-distinctio', 14, '2023-05-02 11:37:04', '2023-05-02 11:37:04'),
(4, 'corporis alias reiciendis praesentium enim', 'Et quidem qui et dolorem quia consequatur quo. Et mollitia laborum voluptatum id libero labore ex. Non quae excepturi expedita id magnam.', 'http://hills.com/voluptatem-in-inventore-est-commodi-voluptate-saepe', 'http://moen.org/ipsum-ex-ut-commodi-cupiditate-nesciunt', 'http://blick.org/tempora-dolor-consequatur-pariatur-sunt-aliquid-voluptate-dolor', 10, '2023-05-02 11:37:04', '2023-05-02 11:37:04'),
(5, 'ex est laudantium et minus', 'Beatae eos perspiciatis laborum modi. Sed nostrum eum omnis illo. Labore quia doloribus et sed repellat.', 'http://mcglynn.org/qui-ullam-nulla-eum-debitis-iusto-nisi-iste', 'http://www.douglas.com/nostrum-repellendus-nobis-eveniet-ex', 'http://www.terry.biz/ab-reprehenderit-velit-dolorum-in-hic-sunt-sit.html', 4, '2023-05-02 11:37:04', '2023-05-02 11:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `settings_user_id_key_unique` (`user_id`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` enum('student','companyManager','companySupervisor','doctor','super-admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channels` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `username`, `image`, `status`, `type`, `company_id`, `remember_token`, `channels`, `created_at`, `updated_at`) VALUES
(25, 'Abo Naser', 'abonaser@gmail.com', NULL, '$2y$10$ychSLmz4ZEaLL339bxthvOZXkSO82p3yK80tM7I8T6z49agUIVVZO', '059 515 2883', 'abo_naser', NULL, 1, 'student', NULL, NULL, NULL, '2023-05-11 14:10:28', '2023-05-11 14:10:28'),
(21, 'gfds', 'loda@gmail.com', '2023-05-02 11:37:04', '$2y$10$.xunjc4YcZUoBRmF88T65.Ov8J2X5pySJ1VQWvR04iRdkfl3xw5bq', '609-427-7814', 'fds', NULL, 1, 'student', NULL, NULL, NULL, '2023-05-02 11:40:44', '2023-05-02 11:40:44'),
(22, 'khaled', 'assi@gmail.com', '2023-05-03 03:54:53', '$2y$10$Gbsnn71P43ompD4UBjXwy.neFEOgbz9PkmGfCBRkR0mw4MWRIdhKG', '928-800-3220', 'fdjsajn', NULL, 1, 'super-admin', NULL, NULL, NULL, '2023-05-03 03:54:45', '2023-05-03 03:54:53'),
(23, 'Mohd', 'mohd@app.com', '2023-05-08 07:05:00', '$2y$10$aRNPiMKLVVTi3sS6wWkXoeHLQ1kYo7TNNJ3CSYQAfeuAgoAtkCvrK', '609-427-7814', 'mohad', NULL, 1, 'companySupervisor', 5, NULL, 'database,broadcast', '2023-05-08 07:03:26', '2023-05-08 07:05:00'),
(24, 'Mohammed N Abozour', 'mo@gmail.com', '2023-05-11 08:55:27', '$2y$10$lj1K5t.W7hbN4S0Bq/uNQexMmBBecG.uHWbs01l7fnBgjZCakyIPK', '059 515 2883', 'mo_abozour', NULL, 1, 'super-admin', NULL, NULL, 'database,broadcast', '2023-05-11 08:54:26', '2023-05-11 08:55:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
