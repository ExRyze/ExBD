-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2023 at 02:38 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `animes`
--

CREATE TABLE `animes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `episodes` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('TV','ONA','OVA','Special','Movie') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Not yet aired','Currently airing','Finished airing') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` enum('Manga','Web manga','Light novel','Original') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_aired` date DEFAULT NULL,
  `date_finished` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `title`, `slug`, `episodes`, `duration`, `type`, `status`, `source`, `date_aired`, `date_finished`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Made in Abyss', 'made_in_abyss', 13, '25', 'TV', 'Finished airing', 'Web manga', '2017-07-07', '2017-09-29', NULL, '2023-04-21 23:01:45', '2023-04-21 23:01:45', 1),
(2, 'Made in Abyss Movie 3: Fukaki Tamashii no Reimei', 'made_in_abyss_movie_3_fukaki_tamashii_no_reimei', 1, '105', 'Movie', 'Finished airing', 'Web manga', '2020-11-07', NULL, NULL, '2023-04-23 23:02:13', '2023-04-23 23:02:13', 1),
(3, 'Made in Abyss: Retsujitsu no Ougonkyou', 'made_in_abyss_retsujitsu_no_ougonkyou', 12, '25', 'TV', 'Finished airing', 'Web manga', '2022-07-06', '2022-08-28', NULL, '2023-04-23 23:10:56', '2023-04-23 23:10:56', 1),
(4, '3D Kanojo: Real Girl 2nd Season', '3d_kanojo_real_girl_2nd_season', 12, '22', 'TV', 'Finished airing', 'Manga', '2019-01-09', '2019-03-27', NULL, '2023-04-24 05:49:58', '2023-04-24 05:49:58', 1),
(5, '3D Kanojo: Real Girl', '3d_kanojo_real_girl', 12, '22', 'TV', 'Finished airing', 'Manga', '2018-04-04', '2018-06-20', NULL, '2023-04-24 05:52:43', '2023-04-24 05:52:43', 1),
(6, '3-gatsu no Lion', '3_gatsu_no_lion', 22, '25', 'TV', 'Finished airing', 'Manga', '2016-09-08', '2017-03-18', NULL, '2023-04-24 05:53:51', '2023-04-24 05:53:51', 1),
(7, '3-gatsu no Lion 2nd Season', '3_gatsu_no_lion_2nd_season', 22, '25', 'TV', 'Finished airing', 'Manga', '2017-09-14', '2018-03-31', NULL, '2023-04-24 05:55:18', '2023-04-24 05:55:18', 1),
(8, '5-toubun no Hanayome', '5_toubun_no_hanayome', 12, '24', 'TV', 'Finished airing', 'Manga', '2019-01-11', '2019-03-29', NULL, '2023-04-24 05:56:31', '2023-04-24 05:56:31', 1),
(9, '5-toubun no Hanayome Movie', '5_toubun_no_hanayome_movie', 1, '136', 'Movie', 'Finished airing', 'Manga', '2022-05-20', NULL, NULL, '2023-04-24 05:58:15', '2023-04-24 05:58:15', 1),
(10, '5-toubun no Hanayome ∬', '5-toubun_no_hanayome_∬', 12, '24', 'TV', 'Finished airing', 'Manga', '2021-01-08', '2021-03-26', NULL, '2023-04-24 06:08:26', '2023-04-24 06:35:49', 1);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_08_050559_create_animes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Staff','User','Guest') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ExRyze', 'ichianime4@gmail.com', NULL, '$2y$10$pAKKVf7ko.fvOvnkbbaL6OAGcST/CTmLI1fkJXkXAEc.06ur8JLLe', 'Admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animes_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animes`
--
ALTER TABLE `animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `animes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
