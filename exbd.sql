-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2022 at 07:17 AM
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
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(52) NOT NULL,
  `title` varchar(52) NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'TV',
  `episodes` int(11) NOT NULL,
  `status` varchar(52) NOT NULL DEFAULT 'Not yet aired',
  `aired` timestamp NULL DEFAULT NULL,
  `finished` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `slug`, `title`, `type`, `episodes`, `status`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES
(2, 'Blend_S', 'Blend S', 'TV', 0, 'Not yet aired', '2022-12-07 00:34:00', '2022-12-07 00:34:00', '2022-12-07 00:34:07', '2022-12-07 00:34:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `animes_aliases`
--

CREATE TABLE `animes_aliases` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `origin_alias` varchar(52) NOT NULL,
  `anime_alias` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_aliases`
--

INSERT INTO `animes_aliases` (`id`, `anime_id`, `origin_alias`, `anime_alias`) VALUES
(1, 2, 'Japanese', 'Blend S'),
(2, 2, 'English', 'Blend S'),
(6, 2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `animes_genres`
--

CREATE TABLE `animes_genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_genres`
--

INSERT INTO `animes_genres` (`id`, `anime_id`, `genre_id`) VALUES
(1, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `animes_licensors`
--

CREATE TABLE `animes_licensors` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `licensor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_licensors`
--

INSERT INTO `animes_licensors` (`id`, `anime_id`, `licensor_id`) VALUES
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `animes_producers`
--

CREATE TABLE `animes_producers` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `producer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_producers`
--

INSERT INTO `animes_producers` (`id`, `anime_id`, `producer_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `animes_source`
--

CREATE TABLE `animes_source` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `source_type` varchar(52) NOT NULL,
  `anime_source` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `animes_studios`
--

CREATE TABLE `animes_studios` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `studio_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_studios`
--

INSERT INTO `animes_studios` (`id`, `anime_id`, `studio_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `animes_videos`
--

CREATE TABLE `animes_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `source_videos` varchar(52) DEFAULT NULL,
  `type_videos` varchar(52) DEFAULT NULL,
  `resolution_videos` varchar(52) DEFAULT NULL,
  `tracks_videos` varchar(52) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Adventure'),
(2, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `licensors`
--

CREATE TABLE `licensors` (
  `id` int(10) UNSIGNED NOT NULL,
  `licensor` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licensors`
--

INSERT INTO `licensors` (`id`, `licensor`) VALUES
(2, 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` int(10) UNSIGNED NOT NULL,
  `producer` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `producer`) VALUES
(1, 'producer');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int(10) UNSIGNED NOT NULL,
  `studio` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `studio`) VALUES
(1, 'studio');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(52) NOT NULL,
  `name` varchar(52) NOT NULL,
  `password` varchar(52) NOT NULL,
  `role` varchar(52) NOT NULL DEFAULT 'User',
  `access` int(11) NOT NULL DEFAULT '2',
  `status` varchar(52) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `access`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ex', 'ExRyze', '123', 'Admin', 2, 'Active', '2022-11-26 05:07:10', '2022-11-26 05:07:10'),
(3, 'User', 'UserGuest', '123', 'User', 2, 'Active', '2022-11-30 03:27:31', '2022-11-30 03:27:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `UPDATED_BY` (`id_user`);

--
-- Indexes for table `animes_aliases`
--
ALTER TABLE `animes_aliases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_ALIASES` (`anime_id`);

--
-- Indexes for table `animes_genres`
--
ALTER TABLE `animes_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_id` (`anime_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `animes_licensors`
--
ALTER TABLE `animes_licensors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_LICENSORS` (`anime_id`),
  ADD KEY `LICENSORS` (`licensor_id`);

--
-- Indexes for table `animes_producers`
--
ALTER TABLE `animes_producers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_PRODUCERS` (`anime_id`),
  ADD KEY `PRODUCERS` (`producer_id`);

--
-- Indexes for table `animes_source`
--
ALTER TABLE `animes_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_SOURCE` (`anime_id`);

--
-- Indexes for table `animes_studios`
--
ALTER TABLE `animes_studios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_STUDIOS` (`anime_id`),
  ADD KEY `STUDIOS` (`studio_id`);

--
-- Indexes for table `animes_videos`
--
ALTER TABLE `animes_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licensors`
--
ALTER TABLE `licensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animes_aliases`
--
ALTER TABLE `animes_aliases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `animes_genres`
--
ALTER TABLE `animes_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animes_licensors`
--
ALTER TABLE `animes_licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animes_producers`
--
ALTER TABLE `animes_producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animes_source`
--
ALTER TABLE `animes_source`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animes_studios`
--
ALTER TABLE `animes_studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animes_videos`
--
ALTER TABLE `animes_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `licensors`
--
ALTER TABLE `licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `UPDATED_BY` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `animes_aliases`
--
ALTER TABLE `animes_aliases`
  ADD CONSTRAINT `ANIME_ALIASES` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_genres`
--
ALTER TABLE `animes_genres`
  ADD CONSTRAINT `ANIME_GENRES` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GENRES` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_licensors`
--
ALTER TABLE `animes_licensors`
  ADD CONSTRAINT `ANIME_LICENSORS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LICENSORS` FOREIGN KEY (`licensor_id`) REFERENCES `licensors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_producers`
--
ALTER TABLE `animes_producers`
  ADD CONSTRAINT `ANIME_PRODUCERS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCERS` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_source`
--
ALTER TABLE `animes_source`
  ADD CONSTRAINT `ANIME_SOURCE` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_studios`
--
ALTER TABLE `animes_studios`
  ADD CONSTRAINT `ANIME_STUDIOS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDIOS` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_videos`
--
ALTER TABLE `animes_videos`
  ADD CONSTRAINT `ANIME_VIDEOS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
