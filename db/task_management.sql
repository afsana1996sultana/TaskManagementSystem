-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_22_104131_create_tasks_table', 2);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 1, 'myApp', '2b3ce0ffce09bb7b42a0f1c860c80d021bc98f363fdb1cc6eb2eca4ad484e33e', '[\"*\"]', '2025-01-23 06:22:30', '2025-01-23 15:32:05', '2025-01-23 05:32:05', '2025-01-23 06:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `status` tinyint(1) DEFAULT 0 COMMENT '0=>pending, 1=>completed',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Task', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Low', 1, '2', '2025-01-22 11:51:54', '2025-01-23 03:47:28'),
(2, 'Test Task-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'High', 1, '2', '2025-01-22 11:52:17', '2025-01-22 11:52:17'),
(3, 'Demo Task', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'High', 0, '1', '2025-01-22 11:52:39', '2025-01-22 11:52:39'),
(7, 'Api Task Check', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Medium', 0, '1', '2025-01-22 13:40:21', '2025-01-22 13:40:21'),
(8, 'Assign Task', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'High', 0, '4', '2025-01-22 13:40:47', '2025-01-22 13:40:47'),
(9, 'Auth Task Check', 'Auth Task Check', 'Medium', 0, '1', '2025-01-23 03:31:22', '2025-01-23 03:31:22'),
(10, 'Auth Task Check Lita', 'Auth Task Check Lita', 'High', 0, '3', '2025-01-23 03:32:42', '2025-01-23 03:32:42'),
(11, 'Complete Task', 'Complete Task', 'Low', 1, '3', '2025-01-23 03:33:34', '2025-01-23 03:34:53'),
(12, 'fgdgfdf', 'dfgdfgs', 'High', 0, '3', '2025-01-23 03:36:24', '2025-01-23 03:36:24'),
(13, 'Task Request', 'Task Request', 'Low', 1, '3', '2025-01-23 03:41:55', '2025-01-23 03:41:55'),
(14, 'tgg', 'dfgsd', 'Medium', 0, '3', '2025-01-23 03:42:06', '2025-01-23 03:42:06'),
(16, 'UpdateTask', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s Update', 'Low', 1, '1', '2025-01-23 05:26:03', '2025-01-23 05:43:26'),
(17, 'Api Check Task AuthCheck', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Medium', 1, '1', '2025-01-23 05:26:47', '2025-01-23 05:26:47'),
(18, 'Api Check Task AuthCheck', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Medium', 1, '1', '2025-01-23 05:30:13', '2025-01-23 05:30:13'),
(19, 'Api Check Task AuthCheck', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Medium', 1, '1', '2025-01-23 05:32:45', '2025-01-23 05:32:45'),
(20, 'Task AuthCheck', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Medium', 0, '1', '2025-01-23 05:34:01', '2025-01-23 05:34:01'),
(21, 'Task AuthCheck Requird', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Medium', 0, '1', '2025-01-23 05:44:09', '2025-01-23 05:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Afsana Sultana', 'afsana1996sultana@gmail.com', NULL, '$2y$10$msemFWikUI0Z7sUrTSPTvOs1w5c1A2Mpj3HBlMMoPcWuBucyDkxQ6', NULL, '2025-01-22 11:49:07', '2025-01-22 11:49:07'),
(2, 'Azmira Sultana', 'azmira@gmail.com', NULL, '$2y$10$KDrdymeHY6K4z37kiV1c5e3x2tiQBdhblYTzmj5is5sgaWhO44vlS', NULL, '2025-01-22 13:51:09', '2025-01-22 13:51:09'),
(3, 'Tanjila Sultana', 'tanjila@gmail.com', NULL, '$2y$10$1ienM19YDZlgV5FqBWg.KONd/BCjqCS/6sZ4Capz085QUWErRHzTi', NULL, '2025-01-22 13:52:09', '2025-01-22 13:52:09'),
(4, 'Medha', 'medha@gmail.com', NULL, '$2y$10$mHFeJ.Hv4xHIfEOJZJxyQeA.irw2PX56dflauzsftpyl4CaA8PIr6', NULL, '2025-01-23 00:48:16', '2025-01-23 00:48:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
