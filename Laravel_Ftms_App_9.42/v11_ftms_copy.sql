-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2023 at 12:53 PM
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
  `student_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_task_id_foreign` (`task_id`),
  KEY `answers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `task_id`, `user_id`, `solution`, `student_mark`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'Excepteur laboriosam 1', 33, '2023-07-13 13:48:37', '2023-07-13 14:02:00'),
(4, 1, 12, 'Totam odit dolor ill', 11, '2023-07-13 14:03:22', '2023-07-13 14:03:22');

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
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_company_id_foreign` (`company_id`),
  KEY `applications_user_id_foreign` (`user_id`),
  KEY `applications_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `company_id`, `user_id`, `course_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 2, 'lorm lorm lorm lorm', 1, NULL, '2023-07-11 04:47:34'),
(2, 2, 2, 2, 'dfsdfgfdgsdfgsdgf', 0, NULL, '2023-07-11 06:25:00'),
(1, 1, 1, 1, 'hffghg', 1, '2023-06-07 14:30:57', '2023-07-09 11:12:51'),
(4, 2, 3, 3, 'lorm lorm lorm lorm', NULL, NULL, '2023-07-11 06:25:17'),
(6, 1, 12, 1, 'i,am student form ucas', NULL, '2023-07-11 02:10:57', '2023-07-11 02:10:57'),
(7, 2, 12, 9, 'hi i,a', NULL, '2023-07-11 02:13:46', '2023-07-11 02:13:46');

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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `available_times_expert_id_foreign` (`expert_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_times`
--

INSERT INTO `available_times` (`id`, `expert_id`, `link`, `date`, `hour_from`, `hour_to`, `status`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, 'https://meet.google.com/gqf-veoa-thg', '2026-09-16', '21:03:00', '05:19:00', 1, 427.00, '2023-06-14 08:11:49', '2023-07-12 13:15:22'),
(6, 4, NULL, '2026-02-22', '14:22:00', '14:33:00', 0, 12.00, '2023-06-14 08:10:07', '2023-07-11 00:56:37'),
(7, 6, 'https://meet.google.com/gqf-veoa-thg', '2023-09-14', '23:28:00', '09:35:00', 0, 100.00, '2023-06-14 08:10:54', '2023-07-12 13:04:19'),
(9, 7, NULL, '2025-10-15', '21:57:00', '06:40:00', 0, 369.00, '2023-06-18 11:41:28', '2023-07-12 13:02:03'),
(12, 3, NULL, '2025-04-24', '13:16:00', '17:57:00', 0, 330.00, '2023-06-18 11:43:01', '2023-06-21 09:26:44'),
(13, 4, NULL, '2023-08-08', '22:06:00', '13:29:00', 0, 30.00, '2023-07-11 03:49:14', '2023-07-11 03:49:14'),
(14, 6, 'https://meet.google.com/wjg-nfmj-wob', '2024-01-24', '11:58:00', '07:26:00', 0, 40.00, '2023-07-11 06:32:50', '2023-07-11 06:32:50');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `slug`, `image`, `description`, `location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'khaled', 'sydney-william', 'uploads/8LHlCkX66uAXaWc5apjnsbwHqVvZw65zTfbAsyO5.jpg', '<p>Nouva company for tech courses</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2023-05-31 09:43:39', '2023-07-11 00:51:51'),
(2, 'Abuzour', 'zgboz', 'uploads/DEcXOwKRxAXYVeo2RxCRyDX1AIVd2lmr9qSde05o.jpg', '<p>welcome to our company we&nbsp; are a company provide tech information&nbsp;</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-07-11 00:51:04'),
(5, 'Ahed Naser 1', 'ahed-naser', 'uploads/MqoXLAzs7XxzeVH0COjvn6EzweZHf4LKb4deOEWY.jpg', '<p>fioasd ;djas ;lkjgd;klasj ldkfasdkl hlfkhsd</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19242.520272778096!2d34.431360607903706!3d31.506872180906438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f5f4c70f0af%3A0x5a88536fa82d0a79!2z2KfZhNmD2YTZitipINin2YTYrNin2YXYudmK2Kkg2YTZhNi52YTZiNmFINin2YTYqti32KjZitmC2YrYqSAtINi62LLYqQ!5e0!3m2!1sar!2s!4v1683123832280!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2023-07-11 04:36:51', '2023-07-12 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `company_evaluations`
--

DROP TABLE IF EXISTS `company_evaluations`;
CREATE TABLE IF NOT EXISTS `company_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_evaluations_evaluation_id_foreign` (`evaluation_id`),
  KEY `company_evaluations_company_id_foreign` (`company_id`),
  KEY `company_evaluations_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_evaluations`
--

INSERT INTO `company_evaluations` (`id`, `evaluation_id`, `company_id`, `course_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, '2023-07-13 11:04:43', '2023-07-13 11:04:43'),
(2, 1, 5, NULL, NULL, '2023-07-13 11:04:43', '2023-07-13 11:04:43'),
(3, 2, 1, NULL, NULL, '2023-07-15 11:46:19', '2023-07-15 11:46:19'),
(4, 2, 2, NULL, NULL, '2023-07-15 11:46:19', '2023-07-15 11:46:19'),
(5, 2, 5, NULL, NULL, '2023-07-15 11:46:19', '2023-07-15 11:46:19'),
(6, 3, 5, NULL, NULL, '2023-07-17 09:18:35', '2023-07-17 09:18:35');

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
  `status` enum('pending_progressing','in_progress','finished','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending_progressing',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_company_id_foreign` (`company_id`),
  KEY `courses_supervisor_id_foreign` (`supervisor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `company_id`, `supervisor_id`, `name`, `image`, `description`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(8, 1, 8, 'freelancer', 'courses/1689047022_imagefreelancer.jpg', 'Commodi voluptatem e', 'pending_progressing', '2024-11-15', '2026-07-09', '2023-05-31 10:16:52', '2023-07-11 00:43:42'),
(9, 2, 8, 'Portuguese language', 'courses/1689047222_imagePortuguese language.png', 'Assumenda voluptatem', 'pending_progressing', '2024-01-30', '2025-09-12', '2023-06-13 12:36:55', '2023-07-11 00:47:02'),
(10, 1, 8, 'French language', 'courses/1689046590_imageFrench language.png', 'Aliquam quis dolorib', 'pending_progressing', '2025-10-07', '2028-07-29', '2023-06-13 12:39:41', '2023-07-11 00:36:30'),
(1, 1, 8, 'ASP.NET', 'courses/1689046894_imageASP.NET.jpeg', 'course discription 1', 'pending_progressing', '2024-11-15', '2026-07-09', '2023-05-31 10:16:52', '2023-07-11 00:41:34'),
(2, 2, 8, 'course2', NULL, 'course discription 2', 'pending_progressing', '2024-11-15', '2026-07-09', '2023-05-31 10:16:52', '2023-07-05 14:21:34'),
(3, 2, 8, 'LARAVEL 9', 'courses/1689046794_imageLARAVEL 9.jpg', 'course discription 3', 'pending_progressing', '2024-11-15', '2026-07-09', '2023-05-31 10:16:52', '2023-07-11 00:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

DROP TABLE IF EXISTS `course_students`;
CREATE TABLE IF NOT EXISTS `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `student_mark` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_students_course_id_foreign` (`course_id`),
  KEY `course_students_user_id_foreign` (`user_id`),
  KEY `course_students_application_id_foreign` (`application_id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `course_id`, `user_id`, `application_id`, `student_mark`, `note`, `created_at`, `updated_at`) VALUES
(214, 1, 12, 5, NULL, NULL, NULL, '2023-07-11 07:48:03'),
(1, 1, 1, 1, 88, 'you are not good at writing code', '2023-06-02 11:12:51', '2023-07-10 11:31:06'),
(5, 2, 2, 5, 100, 'this is the number one', '2023-06-06 11:12:51', '2023-07-09 10:53:03'),
(6, 1, 3, 6, 60, 'you have to develop yourself', '2023-06-03 11:12:51', '2023-07-10 11:24:25'),
(16, 2, 3, 3, NULL, NULL, '2023-06-04 11:12:51', '2023-07-09 10:53:03'),
(14, 3, 3, 2, NULL, NULL, '2023-06-05 11:12:51', '2023-07-09 10:23:16'),
(222, 2, 2, 3, NULL, NULL, '2023-07-11 04:47:34', '2023-07-11 04:47:34'),
(223, 3, 3, 4, NULL, NULL, '2023-07-11 06:25:11', '2023-07-11 06:25:11'),
(217, 2, 12, 6, NULL, NULL, NULL, NULL),
(219, 8, 12, 8, NULL, NULL, NULL, NULL),
(220, 9, 12, 9, NULL, NULL, NULL, NULL),
(221, 10, 12, 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `title`, `question`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'evaluating 1', 'what are rate about place', '2023-05-17', '2023-07-18', '2023-07-13 11:04:43', '2023-07-13 12:47:11'),
(3, 'test', 'test question', '2017-09-18', '2021-07-10', '2023-07-17 09:18:35', '2023-07-17 09:18:35'),
(2, 'evaluation 2', 'what are rate for our doctors', '2023-07-17', '2023-11-14', '2023-07-15 11:46:19', '2023-07-15 11:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answers`
--

DROP TABLE IF EXISTS `evaluation_answers`;
CREATE TABLE IF NOT EXISTS `evaluation_answers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_answers_evaluation_id_foreign` (`evaluation_id`),
  KEY `evaluation_answers_company_id_foreign` (`company_id`),
  KEY `evaluation_answers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_answers`
--

INSERT INTO `evaluation_answers` (`id`, `evaluation_id`, `company_id`, `user_id`, `rate`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 12, 90, 'your place is vary good', '2023-07-17 09:48:25', '2023-07-17 09:48:25');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `company_id`, `doctor_id`, `name`, `image`, `hour_price`, `created_at`, `updated_at`) VALUES
(4, 1, 7, 'HTML', 'experts/1689047608_imagekhaled assi.jpg', 15.00, '2023-06-14 08:01:22', '2023-07-12 12:05:02'),
(3, 2, 7, 'ASP.NET MVC', 'experts/1689047635_imageMohammed Abuzour.jpg', 32.00, '2023-06-10 16:06:36', '2023-07-12 11:49:45'),
(6, 1, 7, 'Vue.js', 'experts/1689047689_imageFadi alzard.jpg', 66.00, '2023-06-18 11:28:23', '2023-07-12 12:05:35'),
(7, 2, 14, 'LARAVEL 9', 'experts/1689058105_imageLARAVEL 9.jpg', 40.00, '2023-07-11 03:48:25', '2023-07-11 03:48:25');

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
  `payment_status` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2023_04_25_122510_create_profiles_table', 1),
(14, '2023_05_13_061916_create_payments_table', 1),
(15, '2023_05_16_111035_create_notifications_table', 1),
(16, '2023_05_29_152456_create_evaluations_table', 1),
(25, '2023_05_29_154014_create_evaluation_answers_table', 3),
(18, '2023_05_31_115919_create_answers_table', 1),
(19, '2023_05_31_120229_create_answer_marks_table', 1),
(20, '2023_06_13_124301_create_expert_payments_table', 1),
(21, '2023_07_08_105142_create_company_evaluations_table', 1),
(22, '2023_07_08_133757_create_course_students_table', 1),
(24, '2023_07_13_122115_create_reports_table', 2);

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
('97da0fd4-78e5-4568-b0b5-ec1625eb1f0c', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 7, '{\"msg\":\"New Student Abo Naser Applied on ASP.NET\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-07-11 02:10:59', '2023-07-11 02:10:59'),
('31a696c2-f100-4ea2-8347-16c45f9561bd', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 11, '{\"msg\":\"New Student Abo Naser Applied on Portuguese language\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-07-11 02:13:46', '2023-07-11 02:13:46'),
('c98c523f-8a18-4b90-8f4a-bcd9b3df48a7', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 11, '{\"msg\":\"New Student Abo Naser Applied on LARAVEL 9\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-07-11 04:46:05', '2023-07-11 04:46:05'),
('adac6e92-1819-4c89-9a8a-abfdf7251a7a', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 11, '{\"msg\":\"New Student Abo Naser Applied on LARAVEL 9\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-07-11 04:46:56', '2023-07-11 04:46:56'),
('fd097ed7-0c82-4568-be50-41bc3c5ff173', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 11, '{\"msg\":\"New Student Abo Naser Applied on LARAVEL 9\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', NULL, '2023-07-11 06:15:12', '2023-07-11 06:15:12'),
('37031fd3-7f7d-4cc7-9943-a705130fbeb9', 'App\\Notifications\\AppliedNotification', 'App\\Models\\User', 11, '{\"msg\":\"New Student Abo Naser Applied on LARAVEL 9\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/applications\"}', '2023-07-12 12:42:43', '2023-07-11 06:43:11', '2023-07-12 12:42:43');

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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('mo@gmail.com', '$2y$10$1UWTGcoEZZ6zTMs6BijCAuUPbTHK6rQ1C6x6KQcCSfOplBrSQGDXy', '2023-07-11 04:26:27');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 1, 2, 108, '8ac7a4a18893cc1d0188970d6f2822d4', '2023-06-07 15:10:21', '2023-06-07 15:10:21'),
(8, 7, 9, 369, '8ac7a49f88dad0c10188dde9d63c78a1', '2023-06-21 09:24:32', '2023-06-21 09:24:32'),
(9, 7, 12, 330, '8ac7a4a288dad2c60188ddebdcc976f8', '2023-06-21 09:26:44', '2023-06-21 09:26:44'),
(10, 12, 2, 427, '8ac7a4a28941e0b2018943229cd208f3', '2023-07-11 01:08:11', '2023-07-11 01:08:11'),
(12, 12, 6, 427, '8ac7a4a28941e0b20189432609d60c77', '2023-07-11 01:11:56', '2023-07-11 01:11:56'),
(13, 12, 7, 100, '8ac7a4a18941de2f018943270e991f28', '2023-07-11 01:13:01', '2023-07-11 01:13:01'),
(14, 12, 9, 427, '8ac7a4a28941e0b2018944412886556c', '2023-07-11 06:21:09', '2023-07-11 06:21:09'),
(15, 12, 12, 100, '8ac7a49f894702d001894ad8a8874a1a', '2023-07-12 13:04:19', '2023-07-12 13:04:19'),
(16, 12, 13, 427, '8ac7a49f894702d001894ae2c3c65c41', '2023-07-12 13:15:22', '2023-07-12 13:15:22');

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
  `bio` text COLLATE utf8mb4_unicode_ci,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `bio`, `fb`, `tw`, `li`, `in`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'welcome to my page,i,m Khaled assi', 'https://www.facebook.com/profile.php?id=100092872626355', 'https://twitter.com/assi_khaledh', 'https://www.linkedin.com/in/khaled-hassi-70408220b/', 'https://www.instagram.com/khaledhassi/', 1, NULL, '2023-07-08 12:33:21'),
(2, 'I\'m Khaled Hassuna Abo Assi & I\'m Your Uncle', 'https://www.facebook.com/', 'https://twitter.com/assi_khaledh', 'https://www.linkedin.com/in/khaled-hassi-70408220b/', 'https://www.instagram.com/', 7, '2023-07-02 15:56:00', '2023-07-02 15:56:00'),
(4, 'Welcome in my profile \ni,am working as full-stuk devloper', 'https://www.instagram.com/mo.abuzour/', 'https://www.instagram.com/mo.abuzour/', 'https://www.instagram.com/mo.abuzour/', 'https://www.instagram.com/mo.abuzour/', 11, '2023-07-08 13:06:23', '2023-07-08 13:07:32'),
(5, 'Hey there! I\'m Mohammed Abuzour, a passionate full-stack web developer. 💻🌐\n\nWith a keen interest in crafting exceptional digital experiences, I specialize in the art of full-stack development. From creating eye-catching front-end interfaces to building powerful back-end systems, I love bringing ideas to life in the online world.', 'https://www.facebook.com/mo.abuzour', 'https://twitter.com/mo_abuzour', 'https://www.linkedin.com/in/mohammed-abuzour-36b92825a/', 'https://www.instagram.com/mo.abuzour/', 12, '2023-07-10 13:28:03', '2023-07-11 06:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('companyManager','doctor','contact') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contact',
  `hour_price` int(11) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reports_email_unique` (`email`),
  KEY `reports_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_mark` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_course_id_foreign` (`course_id`),
  KEY `tasks_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `course_id`, `company_id`, `title`, `question`, `main_mark`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 'Ipsum ullam amet v', 'Et quia vitae explic', 90, '2002-01-16', '1986-09-26', '2023-07-13 13:48:13', '2023-07-13 13:48:13');

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
  `channels` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'database,broadcast',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `username`, `image`, `status`, `type`, `company_id`, `channels`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'khaled', 'mohd@app.com', '2023-06-03 14:01:03', '$2y$10$Au4lamlAaAUWfqyauTf9yOKntU8RbJkKlAxvnCP1Q8N4IMNXXR9vq', '123456789123', 'khaledhassuna.assi', NULL, 1, 'doctor', 1, 'database,broadcast', 'A8VXwnw8f8PTTMihTcjrEcCY8LC9WEhtj6sh1DOMFHLN00nkpAEqMC9eKs1P', '2023-06-13 11:10:52', '2023-07-05 14:43:56'),
(8, 'Ahmed Langley', 'qytumoboh@mailinator.com', NULL, '$2y$10$tJO/4LSo8N1VfXxJv.sfp.2TPu0gpaoNQA.KKz0PDNH827rRJJY1O', '123456789123', 'fsl;ja', NULL, 1, 'companySupervisor', 1, 'database,broadcast', NULL, '2023-05-13 11:10:52', '2023-07-05 14:04:36'),
(13, 'jadsf', 'ter@gamilc.mo', NULL, '$2y$10$jK.9BalsLtAMAayU3Zn68.KddHW/y9XUyTe1qKR4iKYo54BWStZl2', '972592477473', 'dsjf', NULL, 1, 'student', NULL, 'database,broadcast', NULL, '2023-07-05 14:42:14', '2023-07-05 14:42:14'),
(11, 'Mohammed N Abozour', 'mo@gmail.com', '2023-06-15 07:48:26', '$2y$10$Nb320azlObMS2Lyv5zXYaOPZpwtB4N/5vc6mLlna.dhcjN/XltBu6', '970595152883', 'mo_abozour', 'users/1688899493_imageMohammed N Abozour.jpg', 1, 'super-admin', 2, 'database,broadcast', 'aputlDc6UwuIJZbM6ATXwsPtcjLCxDlgfOQqokxTsf7ajXFEDw5dajrCFHzH', '2023-06-15 07:48:17', '2023-07-09 07:44:53'),
(12, 'Abo Naser', 'abonaser@gmail.com', NULL, '$2y$10$D2LA2.vSxqfWNDR913sTIekWrGeTzvw.kSLrV8BIUw3hHNEARa55S', '970595152883', 'abo_naser', 'users/1689067148_imageAbo Naser.jpg', 1, 'student', 1, 'database,broadcast', '4Sn10oi7ZyGaoTnNAfhteshWIrhSnwoYdgOceD5gMbeioNXTiQXo7fQtEeEr', '2023-06-18 11:05:10', '2023-07-11 06:19:08'),
(1, 'student1', 'student1@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_1', NULL, 1, 'student', NULL, 'database,broadcast', NULL, NULL, NULL),
(2, 'student2', 'student2@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_2', NULL, 1, 'student', NULL, 'database,broadcast', NULL, NULL, NULL),
(3, 'student3', 'student3@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_3', NULL, 1, 'student', NULL, 'database,broadcast', NULL, NULL, NULL),
(14, 'Ahed Naser', 'ahed_naser@mailinator.com', NULL, '$2y$10$u4ldK6V2kXORPyXJ3REyO.BMdge2xKK149q7fjP5q.S9ow3CXo5q.', '970591231234', 'ahed_naser', 'users/1689058006_imageAhed Naser.jpg', 0, 'doctor', 2, 'database,broadcast', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
