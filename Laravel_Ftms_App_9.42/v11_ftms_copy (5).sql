-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2023 at 10:18 AM
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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `solution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_task_id_foreign` (`task_id`),
  KEY `answers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `task_id`, `user_id`, `solution`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'dsf', '2023-05-31 12:03:48', '2023-05-31 12:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `answer_marks`
--

DROP TABLE IF EXISTS `answer_marks`;
CREATE TABLE IF NOT EXISTS `answer_marks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `student_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_marks_answer_id_foreign` (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_marks`
--

INSERT INTO `answer_marks` (`id`, `answer_id`, `student_mark`, `created_at`, `updated_at`) VALUES
(2, 2, 85, '2023-05-31 12:29:52', '2023-05-31 12:29:52');

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
  PRIMARY KEY (`id`),
  KEY `applications_company_id_foreign` (`company_id`),
  KEY `applications_user_id_foreign` (`user_id`),
  KEY `applications_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `company_id`, `user_id`, `course_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'hffghg', 0, '2023-06-07 14:30:57', '2023-06-07 14:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

DROP TABLE IF EXISTS `appoinments`;
CREATE TABLE IF NOT EXISTS `appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `availabletime_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appoinments_user_id_foreign` (`user_id`),
  KEY `appoinments_expert_id_foreign` (`expert_id`),
  KEY `appoinments_availabletime_id_foreign` (`availabletime_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_times`
--

DROP TABLE IF EXISTS `available_times`;
CREATE TABLE IF NOT EXISTS `available_times` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `hour_from` time NOT NULL,
  `hour_to` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `available_times_expert_id_foreign` (`expert_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_times`
--

INSERT INTO `available_times` (`id`, `expert_id`, `link`, `date`, `hour_from`, `hour_to`, `status`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, '2026-07-16', '21:03:00', '05:19:00', 1, 427.00, '2023-06-14 08:11:49', '2023-06-14 08:11:49'),
(6, 4, NULL, '2026-02-22', '14:22:00', '14:33:00', 1, 12.00, '2023-06-14 08:10:07', '2023-06-14 08:10:07'),
(7, 4, NULL, '2025-03-25', '07:09:00', '18:18:00', 1, 123.00, '2023-06-14 08:10:54', '2023-06-14 08:12:24');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `slug`, `image`, `description`, `location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'khaled', 'sydney-william', 'uploads/1FMZfXN6Zyj1mlWH8gnmXfDRd6EqBEVQ4rUkBhCs.jpg', '<p>khaled hassuna Abo Assi</p>\r\n<p>&nbsp;</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2023-05-31 09:43:39', '2023-06-15 06:50:15'),
(2, 'abozor', 'zgboz', 'uploads/W8Tjp2Vt2EjKzWZ4XTCTbbhHW9xbjOmUx9UBDzEQ.png', 'welcome to ur company', NULL, NULL, NULL, NULL);

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
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_company_id_foreign` (`company_id`),
  KEY `courses_supervisor_id_foreign` (`supervisor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `company_id`, `supervisor_id`, `name`, `image`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Delilah Kirby', 'courses/1685539012_imageDelilah Kirby.png', 'Commodi voluptatem e', '2024-11-15', '2026-07-09', 0, '2023-05-31 10:16:52', '2023-05-31 10:16:52'),
(9, 1, 8, 'Dana Avery', 'courses/1686670615_imageDana Avery.png', 'Assumenda voluptatem', '2024-01-30', '2025-09-12', 0, '2023-06-13 12:36:55', '2023-06-14 07:34:13'),
(10, 1, 8, 'Mannix Moreno', 'courses/1686738829_imageMannix Moreno.png', 'Aliquam quis dolorib', '2025-10-07', '2028-07-29', 1, '2023-06-13 12:39:41', '2023-06-14 07:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `company_id`, `title`, `question`, `created_at`, `updated_at`) VALUES
(1, 2, 'Quo rem atque vel re', 'Recusandae Et lauda', '2023-06-05 17:27:18', '2023-06-05 17:27:18'),
(2, 1, 'khaled', 'welcome', '2023-06-14 07:34:26', '2023-06-14 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answers`
--

DROP TABLE IF EXISTS `evaluation_answers`;
CREATE TABLE IF NOT EXISTS `evaluation_answers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `answer_type` int(11) NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_answers_evaluation_id_foreign` (`evaluation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_answers`
--

INSERT INTO `evaluation_answers` (`id`, `evaluation_id`, `answer_type`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 46, 'Autem iste iste dict', '2023-06-05 17:27:34', '2023-06-05 17:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

DROP TABLE IF EXISTS `experts`;
CREATE TABLE IF NOT EXISTS `experts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour_price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experts_company_id_foreign` (`company_id`),
  KEY `experts_doctor_id_foreign` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `company_id`, `doctor_id`, `name`, `image`, `hour_price`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'khaled', 'experts/1686740482_imagekhaled.jpg', 12.00, '2023-06-14 08:01:22', '2023-06-14 08:01:22'),
(3, 2, 2, 'khaled assi.', 'experts/1686740967_imagekhaled assi..png', 32.00, '2023-06-10 16:06:36', '2023-06-14 08:09:27'),
(5, 1, 2, 'Hashim Morris', NULL, 18.00, '2023-06-15 06:52:32', '2023-06-15 06:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `expert_payments`
--

DROP TABLE IF EXISTS `expert_payments`;
CREATE TABLE IF NOT EXISTS `expert_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `available_time_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expert_payments_expert_id_foreign` (`expert_id`),
  KEY `expert_payments_payment_id_foreign` (`payment_id`),
  KEY `expert_payments_available_time_id_foreign` (`available_time_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_00_00_000000_create_settings_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_04_25_110053_create_courses_table', 1),
(8, '2023_04_25_110855_create_companies_table', 1),
(9, '2023_04_25_111154_create_applications_table', 1),
(10, '2023_04_25_111542_create_tasks_table', 1),
(11, '2023_04_25_112332_create_experts_table', 1),
(12, '2023_04_25_112819_create_available_times_table', 1),
(13, '2023_04_25_113152_create_appoinments_table', 1),
(14, '2023_04_25_122510_create_profiles_table', 1),
(15, '2023_05_13_061916_create_payments_table', 1),
(16, '2023_05_16_111035_create_notifications_table', 1),
(17, '2023_05_29_152456_create_evaluations_table', 1),
(18, '2023_05_29_154014_create_evaluation_answers_table', 1),
(19, '2023_05_31_115919_create_answers_table', 1),
(20, '2023_05_31_120229_create_answer_marks_table', 1),
(23, '2023_05_31_132901_add_title_to_tasks_table', 2),
(38, '2023_06_03_115235_add_channels_to_users_table', 3),
(39, '2023_06_03_131909_add_doctor_id_to_experts_table', 3),
(40, '2023_06_13_124301_create_expert_payments_table', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `time_id`, `total`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, '8ac7a4a08893d40f018896f2987d2a78', '2023-06-07 14:41:03', '2023-06-07 14:41:03'),
(2, 1, 2, 108, '8ac7a4a28893d410018896f8fa7d3401', '2023-06-07 14:48:01', '2023-06-07 14:48:01'),
(3, 1, 1, 100, '8ac7a4a08893d40f0188970775376e64', '2023-06-07 15:03:50', '2023-06-07 15:03:50'),
(4, 1, 1, 100, '8ac7a4a18893cc1d018897080b10173e', '2023-06-07 15:04:29', '2023-06-07 15:04:29'),
(5, 1, 1, 100, '8ac7a4a08893d40f0188970885b67019', '2023-06-07 15:04:59', '2023-06-07 15:04:59'),
(6, 1, 1, 100, '8ac7a49f8893cc1d01889709437d261d', '2023-06-07 15:05:48', '2023-06-07 15:05:48'),
(7, 1, 2, 108, '8ac7a4a18893cc1d0188970d6f2822d4', '2023-06-07 15:10:21', '2023-06-07 15:10:21');

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
  `in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `status`, `bio`, `fb`, `tw`, `in`, `li`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0', 'welcome in my page', 'https://www.facebook.com/profile.php?id=100092872626355', 'https://twitter.com/assi_khaledh', 'https://www.instagram.com/khaledhassi/', 'https://www.linkedin.com/in/khaled-hassi-70408220b/', 1, NULL, NULL);

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
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_company_id_foreign` (`company_id`),
  KEY `tasks_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `company_id`, `course_id`, `title`, `question`, `main_mark`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Quis non saepe sint', 'Aliquam elit est et', 10, '2023-05-31 11:38:05', '2023-05-31 11:38:05'),
(4, 1, 1, 'Earum cupiditate est', 'Dolor adipisicing et', 10, '2023-05-31 12:02:29', '2023-05-31 12:02:29');

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
  `channels` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'database,broadcast',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `username`, `image`, `status`, `type`, `company_id`, `remember_token`, `channels`, `created_at`, `updated_at`) VALUES
(7, 'khaled', 'mohd@app.com', '2023-06-03 14:01:03', '$2y$10$fW4wJ/2LpQT3SCmUf.bpfuc.qFopkPQgtrTYNFDcDj1hViqwubqgO', '123456789123', 'khaledhassuna.assi', 'users/1686671819_imagekhaled.png', 1, 'super-admin', 1, 'RtUenBPCdCpD4J2wbhSdAmAaHZ3RCaTW1NL9zyqIFloEbvP6xVdt01SSufl5', 'database,broadcast', '2023-06-13 11:10:52', '2023-06-14 06:56:23'),
(8, 'Ahmed Langley', 'qytumoboh@mailinator.com', NULL, '$2y$10$aJDkW/dtNkvP4rqIw70ZX.JiOxjBmbGwzXGTqsfooqIUNNFCc0gom', '123456789123', 'fsl;ja', NULL, 1, 'companySupervisor', NULL, NULL, 'database,broadcast', NULL, '2023-06-13 11:59:22'),
(2, 'ters', 'tes@app.com', '2023-06-03 14:01:03', '$2y$10$qfOhnkooBLsOzyC3eoNGH.TA8m8SxxQSwDGdgbptbETOZ3HR/6Mve', '0597243636', 'test', NULL, 1, 'doctor', NULL, NULL, 'database,broadcast', '2023-06-03 13:59:02', '2023-06-03 14:01:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
