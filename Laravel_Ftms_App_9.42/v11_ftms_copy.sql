-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2023 at 12:20 PM
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
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `task_id`, `user_id`, `solution`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'dsf', '2023-05-31 12:03:48', '2023-05-31 12:03:48');

-- --------------------------------------------------------

--
-- Dumping data for table `answer_marks`
--

INSERT INTO `answer_marks` (`id`, `answer_id`, `student_mark`, `created_at`, `updated_at`) VALUES
(2, 2, 85, '2023-05-31 12:29:52', '2023-05-31 12:29:52');

-- --------------------------------------------------------

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `company_id`, `user_id`, `course_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'hffghg', 0, '2023-06-07 14:30:57', '2023-06-07 14:30:57');



-- --------------------------------------------------------

--
-- Dumping data for table `available_times`
--

INSERT INTO `available_times` (`id`, `expert_id`, `link`, `date`, `hour_from`, `hour_to`, `status`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, '2026-07-16', '21:03:00', '05:19:00', 1, 427.00, '2023-06-14 08:11:49', '2023-06-14 08:11:49'),
(6, 4, NULL, '2026-02-22', '14:22:00', '14:33:00', 1, 12.00, '2023-06-14 08:10:07', '2023-06-14 08:10:07'),
(7, 6, 'https://meet.google.com/gqf-veoa-thg', '2030-02-14', '23:28:00', '09:35:00', 0, 100.00, '2023-06-14 08:10:54', '2023-06-18 11:49:39'),
(9, 6, NULL, '2025-10-15', '21:57:00', '06:40:00', 0, 369.00, '2023-06-18 11:41:28', '2023-06-21 09:24:32'),
(12, 6, NULL, '2025-04-24', '13:16:00', '17:57:00', 0, 330.00, '2023-06-18 11:43:01', '2023-06-21 09:26:44');

-- --------------------------------------------------------

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `slug`, `image`, `description`, `location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nouva', 'sydney-william', 'uploads/leAc2IpgQZPibnkhKsXplZoLW4va7NXAfhDRkZU9.png', '<p>Nouva company for tech courses</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2023-05-31 09:43:39', '2023-07-05 14:49:10'),
(2, 'abozor', 'zgboz', 'uploads/IOYXmJ7NYBTpksNwPRF2UHN2jI2TIjLRZSfsViJm.jpg', '<p>welcome to our company we&nbsp; are a company provide tech information&nbsp;</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.7808842855807!2d34.4513026350782!3d31.488417561695094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8126a199a955%3A0x9f616766e5c57cf6!2z2LTYsdmD2Kkg2KjZhNio2YQg2YTZhNi12YbYp9i52Kkg2YjYp9mE2KrYrNin2LHYqQ!5e1!3m2!1sar!2s!4v1683964278659!5m2!1sar!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-07-05 14:30:55');

-- --------------------------------------------------------

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `company_id`, `supervisor_id`, `name`, `image`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 7, 'Delilah Kirby', 'courses/1688577694_imageDelilah Kirby.jpeg', 'Commodi voluptatem e', '2024-11-15', '2026-07-09', 'pending_progressing', '2023-05-31 10:16:52', '2023-07-05 14:21:34'),
(9, 1, 8, 'Dana Avery', 'courses/1688577610_imageDana Avery.jpeg', 'Assumenda voluptatem', '2024-01-30', '2025-09-12', 'pending_progressing', '2023-06-13 12:36:55', '2023-07-05 14:20:10'),
(10, 1, 8, 'Mannix Moreno', 'courses/1688577659_imageMannix Moreno.jpeg', 'Aliquam quis dolorib', '2025-10-07', '2028-07-29', 'pending_progressing', '2023-06-13 12:39:41', '2023-07-05 14:20:59'),
(1, 1, 7, 'course1', 'courses/1688577694_imageDelilah Kirby.jpeg', 'course discription 1', '2024-11-15', '2026-07-09', 'pending_progressing', '2023-05-31 10:16:52', '2023-07-05 14:21:34'),
(2, 2, 8, 'course2', 'courses/1688577694_imageDelilah Kirby.jpeg', 'course discription 2', '2024-11-15', '2026-07-09', 'pending_progressing', '2023-05-31 10:16:52', '2023-07-05 14:21:34'),
(3, 2, 7, 'course3', 'courses/1688577694_imageDelilah Kirby.jpeg', 'course discription 3', '2024-11-15', '2026-07-09', 'pending_progressing', '2023-05-31 10:16:52', '2023-07-05 14:21:34');

-- --------------------------------------------------------

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `user_id`, `course_id`, `application_id`, `student_mark`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 100, 'this is the number one', NULL, NULL),
(2, 2, 1, 2, 100, 'this is the number one', NULL, NULL),
(3, 2, 2, 3, 100, 'this is the number one', NULL, NULL),
(4, 3, 1, 4, 100, 'this is the number one', NULL, NULL),
(5, 3, 2, 5, 100, 'this is the number one', NULL, NULL),
(6, 3, 3, 6, 100, 'this is the number one', NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `evaluation_answers`
--

INSERT INTO `evaluation_answers` (`id`, `evaluation_id`, `answer_type`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 46, 'Autem iste iste dict', '2023-06-05 17:27:34', '2023-06-05 17:27:34');

-- --------------------------------------------------------

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `company_id`, `doctor_id`, `name`, `image`, `hour_price`, `created_at`, `updated_at`) VALUES
(4, 1, 7, 'khaled', 'experts/1686740482_imagekhaled.jpg', 15.00, '2023-06-14 08:01:22', '2023-06-18 11:15:33'),
(3, 2, 2, 'khaled assi.', 'experts/1686740967_imagekhaled assi..png', 32.00, '2023-06-10 16:06:36', '2023-06-14 08:09:27'),
(6, NULL, 7, 'hhh', 'experts/1687098503_imagehhh.jpg', 66.00, '2023-06-18 11:28:23', '2023-06-18 11:28:23');


-- --------------------------------------------------------

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
(9, 7, 12, 330, '8ac7a4a288dad2c60188ddebdcc976f8', '2023-06-21 09:26:44', '2023-06-21 09:26:44');


-- --------------------------------------------------------

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `status`, `bio`, `fb`, `tw`, `in`, `li`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0', 'welcome in my page', 'https://www.facebook.com/profile.php?id=100092872626355', 'https://twitter.com/assi_khaledh', 'https://www.instagram.com/khaledhassi/', 'https://www.linkedin.com/in/khaled-hassi-70408220b/', 1, NULL, NULL),
(2, '1', 'I\'m Khaled Hassuna Abo Assi & I\'m Your Uncle', 'https://www.facebook.com/', 'https://twitter.com/assi_khaledh', 'https://www.instagram.com/', 'https://www.linkedin.com/in/khaled-hassi-70408220b/', 7, '2023-07-02 15:56:00', '2023-07-02 15:56:00');


-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `username`, `image`, `status`, `type`, `company_id`, `remember_token`, `channels`, `created_at`, `updated_at`) VALUES
(7, 'khaled', 'mohd@app.com', '2023-06-03 14:01:03', '$2y$10$Au4lamlAaAUWfqyauTf9yOKntU8RbJkKlAxvnCP1Q8N4IMNXXR9vq', '123456789123', 'khaledhassuna.assi', 'users/1688577182_imagekhaled.jpg', 1, 'doctor', 1, 'A8VXwnw8f8PTTMihTcjrEcCY8LC9WEhtj6sh1DOMFHLN00nkpAEqMC9eKs1P', 'database,broadcast', '2023-06-13 11:10:52', '2023-07-05 14:43:56'),
(8, 'Ahmed Langley', 'qytumoboh@mailinator.com', NULL, '$2y$10$tJO/4LSo8N1VfXxJv.sfp.2TPu0gpaoNQA.KKz0PDNH827rRJJY1O', '123456789123', 'fsl;ja', 'users/1688576676_imageAhmed Langley.jpg', 1, 'companySupervisor', 1, NULL, 'database,broadcast', NULL, '2023-07-05 14:04:36'),
(13, 'jadsf', 'ter@gamilc.mo', NULL, '$2y$10$jK.9BalsLtAMAayU3Zn68.KddHW/y9XUyTe1qKR4iKYo54BWStZl2', '972592477473', 'dsjf', NULL, 1, 'student', NULL, NULL, 'database,broadcast', '2023-07-05 14:42:14', '2023-07-05 14:42:14'),
(11, 'Mohammed N Abozour', 'mo@gmail.com', '2023-06-15 07:48:26', '$2y$10$Bl7RTHT/k8ccazHOIbdTeuczOZc2Eu1M4Wi3Q7y5TceQ8JDwHnx6i', '970595152883', 'mo_abozour', 'users/1688576763_imageMohammed N Abozour.jpeg', 1, 'super-admin', 2, NULL, 'database,broadcast', '2023-06-15 07:48:17', '2023-07-05 14:06:03'),
(12, 'Abo Naser', 'abonaser@gmail.com', NULL, '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970595152883', 'abo_naser', 'users/1688577067_imageAbo Naser.jpeg', 1, 'companySupervisor', 1, NULL, 'database,broadcast', '2023-06-18 11:05:10', '2023-07-05 14:11:07'),
(1, 'student1', 'student1@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_1', 'users/1688577067_imageAbo Naser.jpeg', 1, 'student', NULL, NULL, 'database,broadcast', NULL, NULL),
(2, 'student2', 'student2@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_2', 'users/1688577067_imageAbo Naser.jpeg', 1, 'student', NULL, NULL, 'database,broadcast', NULL, NULL),
(3, 'student3', 'student3@gmail.com', '2023-07-06 17:09:43', '$2y$10$vMff6coQABXG6NbbUCaFVu3OLAG3JeO5yjW/qh.ikxted6Qk0DlBW', '970591231234', 'student_3', 'users/1688577067_imageAbo Naser.jpeg', 1, 'student', NULL, NULL, 'database,broadcast', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
