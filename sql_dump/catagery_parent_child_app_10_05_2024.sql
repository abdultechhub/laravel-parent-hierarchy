-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 01:15 PM
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
-- Database: `catagery_parent_child_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 0, 'test category', 1, NULL, '2024-05-09 01:54:55', '2024-05-09 01:54:55'),
(17, 0, 'Bedroom', 1, NULL, '2024-05-10 07:33:54', '2024-05-10 07:33:54'),
(18, 17, 'Beds', 1, NULL, '2024-05-10 07:36:30', '2024-05-10 07:36:30'),
(19, 18, 'Panel Beds', 1, NULL, '2024-05-10 07:37:15', '2024-05-10 07:37:15'),
(20, 17, 'Night Stand', 1, NULL, '2024-05-10 07:37:32', '2024-05-10 07:37:32'),
(21, 17, 'Dresser', 1, NULL, '2024-05-10 07:37:50', '2024-05-10 07:37:50'),
(22, 0, 'Living Room', 1, NULL, '2024-05-10 07:38:02', '2024-05-10 07:38:02'),
(23, 22, 'Sofas', 1, NULL, '2024-05-10 07:38:13', '2024-05-10 07:38:13'),
(24, 22, 'Loveseats', 1, NULL, '2024-05-10 07:38:28', '2024-05-10 07:38:28'),
(25, 22, 'Tables', 1, '2024-05-10 07:40:16', '2024-05-10 07:39:25', '2024-05-10 07:40:16'),
(26, 22, 'Tables', 1, NULL, '2024-05-10 07:39:42', '2024-05-10 09:52:50'),
(27, 25, 'Coffee Table', 1, NULL, '2024-05-10 07:40:10', '2024-05-10 07:40:10'),
(28, 26, 'Side Table', 1, NULL, '2024-05-10 07:40:36', '2024-05-10 07:40:36'),
(29, 5, 'aasasas', 1, '2024-05-10 08:01:39', '2024-05-10 08:00:38', '2024-05-10 08:01:39'),
(30, 5, 'asasasas', 1, '2024-05-10 08:01:36', '2024-05-10 08:00:57', '2024-05-10 08:01:36'),
(31, 15, 'test 2', 1, NULL, '2024-05-10 10:02:23', '2024-05-10 10:06:42'),
(32, 31, 'test 3', 1, '2024-05-10 10:05:57', '2024-05-10 10:02:39', '2024-05-10 10:05:57'),
(33, 31, 'test 3', 1, '2024-05-10 10:12:18', '2024-05-10 10:04:54', '2024-05-10 10:12:18'),
(34, 31, 'test 4', 1, NULL, '2024-05-10 10:07:03', '2024-05-10 10:12:18');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_05_09_115142_create_categories_table', 1);

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
(1, 'Aleen Torphy', 'admin@admin.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'lXgoorkSdTl3kYksJmhs0Bj2Xn1kFFjDUzn2EdVnEeTSnUiYlFS90LWt1Fh1', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(2, 'Jimmie Langworth', 'oreilly.tanya@example.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'zVp8nEHIDy', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(3, 'Idell Waelchi', 'jaskolski.reggie@example.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'shI3yRlk9o', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(4, 'Dr. Simone Davis PhD', 'vhyatt@example.org', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'VqT3en7oRx', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(5, 'Lester Spencer', 'hintz.brennan@example.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'vmV0kB9uNT', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(6, 'Hilton Kozey', 'alanna09@example.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'x4NI53LtRB', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(7, 'Rudolph Hammes', 'erodriguez@example.org', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'Dv5KEVa293', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(8, 'Maybell Lowe', 'dominique.satterfield@example.com', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'EOGr1zu6Gb', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(9, 'Trace Goyette', 'vergie44@example.org', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'NsIRrwoJS8', '2024-05-09 06:32:45', '2024-05-09 06:32:45'),
(10, 'Javon Hodkiewicz', 'karina.rutherford@example.org', '2024-05-09 06:32:45', '$2y$12$UGR/f4RvV/0t/o.Zuv0kvOCoefnN3VzJxPlzYUmK6zzMBoClUSNk6', 'Zzqt3r4gsM', '2024-05-09 06:32:45', '2024-05-09 06:32:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
