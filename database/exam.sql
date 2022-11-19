-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2022 at 03:23 PM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `answers_user_id_exam_id_question_id_result_id_unique` (`user_id`,`exam_id`,`question_id`,`result_id`),
  KEY `answers_exam_id_foreign` (`exam_id`),
  KEY `answers_question_id_foreign` (`question_id`),
  KEY `answers_result_id_foreign` (`result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `exam_id`, `question_id`, `result_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 2, '2022-10-20 07:21:29', '2022-10-20 07:29:10'),
(2, 3, 1, 2, 6, '2022-10-20 07:24:29', '2022-10-20 07:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `period` int(11) NOT NULL DEFAULT '60',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `exams_lesson_id_unique` (`lesson_id`),
  UNIQUE KEY `exams_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `lesson_id`, `title`, `slug`, `date`, `time`, `period`, `created_at`, `updated_at`) VALUES
(1, 5, 'asdasdasdasdasdasdasdasdasdasd', 'wdww', '2022-10-20', '09:50:00', 117, '2022-10-20 06:16:28', '2022-10-20 06:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_user`
--

DROP TABLE IF EXISTS `exam_user`;
CREATE TABLE IF NOT EXISTS `exam_user` (
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  UNIQUE KEY `exam_user_exam_id_user_id_unique` (`exam_id`,`user_id`),
  KEY `exam_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_user`
--

INSERT INTO `exam_user` (`exam_id`, `user_id`) VALUES
(1, 3);

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
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lessons_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sofia Reichel', 'eum-enim', 'Nemo nemo natus aut.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(2, 'Zella Carter', 'dolores-et-cumque', 'Similique ad qui praesentium in.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(3, 'Gracie Monahan DVM', 'nisi-laudantium', 'Minima qui et quod alias.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(4, 'Alford O\'Conner I', 'quidem-molestias', 'Amet quod molestiae aspernatur.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(5, 'Kaden Hammes PhD', 'omnis-quis-dolor', 'Cum reprehenderit enim magni quia.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(6, 'Destinee Bode Sr.', 'occaecati-voluptatem-sit', 'Ipsum quia et non hic.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(7, 'Maybell Schmeler', 'tenetur-iure-odio', 'Et voluptate error qui.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(8, 'Rusty Orn', 'dicta-voluptatem', 'Sit sunt vel laboriosam voluptatem.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(9, 'Dr. Easton Gibson II', 'quidem-numquam', 'Dolores sit nihil tempora dolores.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(10, 'Allene Ullrich PhD', 'suscipit-quia', 'Veniam explicabo qui debitis.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(11, 'Janice Schiller', 'natus-ea-fugit', 'Voluptas qui porro nihil.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(12, 'Haleigh Kerluke', 'corporis-consequatur', 'Pariatur nesciunt fugit iusto est odit.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(13, 'Prof. Karson Hauck', 'dolor-recusandae', 'Et mollitia tempora natus sunt.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(14, 'Kaylin Hirthe', 'commodi-tempore-harum', 'Magnam nisi debitis quod.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(15, 'Orland Schamberger', 'doloremque-officiis', 'Dolores vel tempore est ut quae.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(16, 'Delta VonRueden DVM', 'reprehenderit-dolorum-aut', 'Autem magnam sit expedita fugiat.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(17, 'Tad McClure', 'laudantium-laboriosam', 'Error aut repellendus voluptates porro.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(18, 'Nora Kris', 'accusamus-omnis', 'Et excepturi sed et nisi placeat minus.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(19, 'Mrs. Kelsi Steuber IV', 'explicabo-aperiam', 'Esse saepe est veniam culpa.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(20, 'Elda Kirlin', 'et-libero', 'Saepe sit sed asperiores veritatis.', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_04_153005_create_exams_table', 1),
(6, '2022_10_04_153257_create_results_table', 1),
(7, '2022_10_04_154323_create_answers_table', 1),
(8, '2022_10_12_144352_create_lessons_table', 1),
(9, '2022_10_13_151937_create_questions_table', 1),
(10, '2022_10_19_182334_create_exam_user_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_exam_id_foreign` (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `title`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdawdasd', 3, '2022-10-20 06:16:28', '2022-10-20 06:16:28'),
(2, 1, 'asdasdasd', 5, '2022-10-20 06:16:28', '2022-10-20 06:16:28'),
(3, 1, 'dsdawds', 1, '2022-10-20 06:16:28', '2022-10-20 06:16:28'),
(4, 1, 'asdw3', 1, '2022-10-20 06:16:28', '2022-10-20 06:16:28'),
(5, 1, '324fg', 1, '2022-10-20 06:16:28', '2022-10-20 06:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdaawedfbj', 0, '2022-10-20 06:17:41', '2022-10-20 06:17:41'),
(2, 1, 'asd3fxcvfd5', 1, '2022-10-20 06:17:41', '2022-10-20 06:17:41'),
(3, 1, 'asc4tybty', 0, '2022-10-20 06:17:41', '2022-10-20 06:17:41'),
(4, 2, 'sad34g', 0, '2022-10-20 06:18:01', '2022-10-20 06:18:01'),
(5, 2, 'asd34n', 0, '2022-10-20 06:18:01', '2022-10-20 06:18:01'),
(6, 2, '12233', 1, '2022-10-20 06:18:01', '2022-10-20 06:18:01'),
(7, 2, '44444', 0, '2022-10-20 06:18:01', '2022-10-20 06:18:01'),
(8, 3, 'dw34d', 0, '2022-10-20 06:18:25', '2022-10-20 06:18:25'),
(9, 3, '35', 0, '2022-10-20 06:18:25', '2022-10-20 06:18:25'),
(10, 3, 'هیچکدام', 1, '2022-10-20 06:18:25', '2022-10-20 06:18:25'),
(11, 4, 'شسیشی', 0, '2022-10-20 06:18:47', '2022-10-20 06:18:47'),
(12, 4, 'شیشسیشی', 0, '2022-10-20 06:18:47', '2022-10-20 06:18:47'),
(13, 4, 'شسیشسیشس', 0, '2022-10-20 06:18:47', '2022-10-20 06:18:47'),
(14, 4, 'همه', 1, '2022-10-20 06:18:47', '2022-10-20 06:18:47'),
(15, 5, 'شسی۳شسی', 0, '2022-10-20 06:19:09', '2022-10-20 06:19:09'),
(16, 5, 'لات۵ب', 0, '2022-10-20 06:19:09', '2022-10-20 06:19:09'),
(17, 5, 'یبلبافق', 0, '2022-10-20 06:19:09', '2022-10-20 06:19:09'),
(18, 5, '۱۲۳۴', 1, '2022-10-20 06:19:09', '2022-10-20 06:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `family`, `phone`, `email`, `email_verified_at`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'amir', 'amirhashimi', 'hashimi', '09024510129', 'amyrhashimi@gmail.com', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'cueB0qcnJGSVkgX1DbI10w5mg0J58JVijZYOerHmCilKu1YmYuNgrCUEG8nQ', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(2, 'Kylee Labadie Sr.', 'tina.prosacco', 'Non.', '1-281-965-8251', 'zelda.schmidt@example.net', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'zA6W4iZHca', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(3, 'Cathrine Hilpert DVM', 'keeling.maryjane', 'Et.', '+1.252.588.4728', 'jmetz@example.com', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'YaaNznrJWOGVNpb130Y6u1VlGn33V8QVzQwQh7GxxSkObU4Ak4qhJ4TYkrti', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(4, 'Ralph Blick III', 'kuhn.noelia', 'Quia.', '+1-657-351-2111', 'hherzog@example.org', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'b7KKnKVa4c', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(5, 'Alivia Moen DDS', 'hamill.annamae', 'Quis.', '706.984.9398', 'abigayle35@example.com', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'RXGPDP2ysm', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(6, 'Carroll Mertz MD', 'leanna61', 'In.', '(303) 459-8948', 'michale.schuppe@example.net', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'L5qRd6IbhF', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(7, 'Mr. Maxime Bednar', 'cameron69', 'Sunt.', '+1-458-725-2786', 'aracely61@example.com', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'X6xfTHeMjB', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(8, 'Bethel Koss', 'zulauf.julia', 'Et.', '(341) 968-5905', 'ehomenick@example.org', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'N8ZUBOVMHJ', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(9, 'Lynn Braun', 'vschaden', 'Qui.', '+1-283-536-1101', 'plynch@example.net', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'nBtVBnRS94', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(10, 'Marina Upton', 'dglover', 'A quas.', '+1.623.337.5208', 'hirthe.douglas@example.com', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'NV41lixBCM', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL),
(11, 'Mr. Shad Senger', 'bechtelar.einar', 'Dolor.', '(513) 367-1501', 'karli99@example.net', '2022-10-19 15:52:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '4hmt2wDrGD', '2022-10-19 15:52:54', '2022-10-19 15:52:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
