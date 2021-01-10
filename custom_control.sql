-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `custom_control`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count_file` int(11) NOT NULL DEFAULT 0,
  `size` float NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`id`, `name`, `user_id`, `count_file`, `size`, `created_at`, `updated_at`) VALUES
(1, 'None', 0, 4, 111.5, '2021-01-08 10:05:11', '2021-01-09 07:16:45'),
(28, 'Anh Lee', 1, 1, 24.4, '2021-01-09 04:01:21', '2021-01-09 06:34:43'),
(31, 'Slide Show', 3, 0, 0, '2021-01-09 06:56:40', '2021-01-09 06:57:24'),
(32, 'Introl', 3, 0, 0, '2021-01-09 06:56:57', '2021-01-09 06:56:57'),
(33, 'Iron Man', 3, 2, 56, '2021-01-09 07:00:52', '2021-01-09 07:05:34'),
(34, 'Music', 3, 4, 101, '2021-01-09 07:05:45', '2021-01-09 07:24:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_02_064952_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rCZHiMZVkz8kjPGk5lqdoeEkfQVM1kgCEe1HtdNn', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS05SSFBzSWZXYWk5ZE9IaHV1OTVJYVhLR1VrZ21jZHpxZ2pMNzYyZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vbG9jYWxob3N0OjgwODAvbXl2aWRlby9wdWJsaWMvaG9tZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCREM3NWbi5YTGRWMkVGUGx6MjVEakouZDNscVZoNlBaTmllZEd1S2ZwNlU1ankyYU9MZ3dBVyI7fQ==', 1610208012);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'Hoàng Sabo', 'sabo@gmail.com', NULL, '$2y$10$D3sVn.XLdV2EFPlz25DjJ.d3lqVh6PZNiedGuKfp6U5jy2aOLgwAW', NULL, NULL, NULL, NULL, NULL, '2021-01-06 20:28:18', '2021-01-09 06:54:50'),
(4, 'Anh Le', 'lichsuviet@gmail.com', NULL, '$2y$10$qanOy.m8ozBQxG9plJdtNuVIKWob73m6IjJA6nf0vgDBlGg5.IHHq', NULL, NULL, NULL, NULL, NULL, '2021-01-06 20:30:25', '2021-01-06 20:30:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `summary` text DEFAULT NULL,
  `video` text NOT NULL,
  `size` float NOT NULL,
  `hindden` int(11) NOT NULL DEFAULT 0,
  `album_id` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `title`, `summary`, `video`, `size`, `hindden`, `album_id`, `user_id`, `created_at`, `updated_at`) VALUES
(30, 'Latest Flight Testing!', 'Latest Flight Testing!', 'Latest Flight Testing!.mp4', 24.4, 0, 28, 1, '2021-01-09 06:34:43', '2021-01-09 06:34:43'),
(31, 'Slide Show', 'slide show đẹp', 'Real Gold Slideshow.mp4', 24.5, 0, 1, 3, '2021-01-09 06:55:58', '2021-01-09 06:55:58'),
(32, 'Hulk vs HulkBuster - Fight Scene - Avengers Age of Ultron (2015) Movie CLIP HD', 'Avengers Age of Ultron (2015) - Hulk vs HulkBuster - Iron Man (Mark 44) - HulkBuster Protocol - Hulk Smash Scene - Movie CLIP HD [1080p 60 FPS HD ] \r\nOne of the best fight scene in the movie.', 'y2mate.com - Hulk vs HulkBuster  Fight Scene  Avengers Age of Ultron 2015 Movie CLIP HD_480p.mp4', 23.2, 0, 33, 3, '2021-01-09 07:01:17', '2021-01-09 07:01:17'),
(33, 'Latest Flight Testing!', NULL, 'Latest Flight Testing!.mp4', 24.4, 0, 1, 3, '2021-01-09 07:05:03', '2021-01-09 07:05:03'),
(34, 'Iron Man vs F-22 Raptor - Dogfight Scene - Iron Man (2008) Movie CLIP HD', NULL, 'Iron man.mp4', 32.8, 0, 33, 3, '2021-01-09 07:05:34', '2021-01-09 07:05:34'),
(35, 'LÍNH MÀ - PASSED', NULL, 'Linh ma.mp4', 39.7, 0, 34, 3, '2021-01-09 07:06:15', '2021-01-09 07:06:15'),
(36, 'Avengers vs Ultron', NULL, 'Avengers vs Ultron.mp4', 23.5, 0, 33, 3, '2021-01-09 07:16:45', '2021-01-09 07:17:14'),
(37, 'DSK - NGÀY TÀN ( LIVE AT KONG 13/11/2017 )', '\" Nuối tiếc gì, ném cái sự lạnh lẽo kia vào đống cháy, homie \"', 'DSK  NGÀY TÀN  LIVE AT KONG.mp4', 39.4, 0, 34, 3, '2021-01-09 07:21:20', '2021-01-09 07:21:20'),
(38, 'Nếu - DSK [#VietLyric​]', 'Nhớ lại ngày ấy\r\nLúc đó, mười một ngày sau khi tao sinh đã vừa tròn\r\nNếu mama không vất vả, một tay nuôi dạy ba đứa con\r\nTất cả đều đã khác nếu mama không cờ bạc\r\nDaddy ở nơi xa không có vợ khác', 'Nếu  DSK VietLyric_1080p.mp4', 10.9, 0, 34, 3, '2021-01-09 07:23:03', '2021-01-09 07:23:03'),
(39, 'Chưa bao giờ - DSK', 'Vẫn như chưa bao giờ\r\nChưa bao giờ bắt đầu, chưa bao giờ kết thúc\r\nYeah!...\r\nDSK', 'bao giờ  DSK  VietLyric_1080p.mp4', 11, 0, 34, 3, '2021-01-09 07:24:10', '2021-01-09 07:24:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
