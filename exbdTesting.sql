-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2022 at 08:02 AM
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
  `aired` date DEFAULT NULL,
  `finished` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `slug`, `title`, `type`, `episodes`, `status`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!', 'Kono Subarashii Sekai ni Shukufuku wo!', 'BD', 10, 'Not yet aired', '2016-01-14', '2016-03-17', '2022-12-13 00:00:23', '2022-12-13 01:11:26', 2),
(2, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!_2', 'Kono Subarashii Sekai ni Shukufuku wo! 2', 'BD', 10, 'Not yet aired', '2017-01-12', '2017-03-16', '2022-12-14 07:26:45', '2022-12-14 07:26:45', 2);

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
(1, 1, 'Japanese', 'ã“ã®ç´ æ™´ã‚‰ã—ã„ä¸–ç•Œã«ç¥ç¦ã‚’ï¼'),
(2, 1, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World!'),
(3, 1, 'Synonyms', 'Give Blessings to This Wonderful World!'),
(4, 2, 'Synonyms', 'Give Blessings to This Wonderful World! 2'),
(5, 2, 'Japanese', 'ã“ã®ç´ æ™´ã‚‰ã—ã„ä¸–ç•Œã«ç¥ç¦ã‚’ï¼ 2'),
(6, 2, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World! 2');

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3);

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
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 6),
(10, 2, 9),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 2, 5),
(15, 2, 7);

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
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `animes_themes`
--

CREATE TABLE `animes_themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `theme_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_themes`
--

INSERT INTO `animes_themes` (`id`, `anime_id`, `theme_id`) VALUES
(4, 1, 2),
(5, 1, 3),
(6, 1, 4),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4);

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
  `tracks_videos` text,
  `chapters_videos` text NOT NULL,
  `tracks_audios` text NOT NULL,
  `subtitles_videos` text NOT NULL,
  `additional_errors` text NOT NULL,
  `additional_values` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_videos`
--

INSERT INTO `animes_videos` (`id`, `anime_id`, `source_videos`, `type_videos`, `resolution_videos`, `tracks_videos`, `chapters_videos`, `tracks_audios`, `subtitles_videos`, `additional_errors`) VALUES
(1, 1, 'Koenime', 'mkv', '1920 Ã— 1080', 'HEVC (H265 Main 10 @L4.0)', 'TRUE', 'Opus 2.0 [Jpn]', 'ASS [Ind] (Ep. 1, 2, 4, 7, 8), ASS [Und] (Ep. 3, 5, 6, 9, 10)', ''),
(2, 2, 'Koenime', 'mkv', '1920 Ã— 1080', 'H264 (High 10 @L4.0) (Ep. 1, 3, 5-10) H264 (High 10 @L5.0) (Ep. 2, 4)', 'Null', 'ACC 2.0 [Jpn]', 'ASS [Und]', 'Frame drop (Subtitle too heavy);\r\nAdanya gambar tambahan dalam subtitle;');

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
(2, 'Comedy'),
(3, 'Fantasy');

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
(1, 'Discotek Media'),
(2, 'Crunchyroll');

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
(1, 'Half H.P Studio'),
(2, 'Nippon Columbia'),
(3, 'KlockWorx'),
(4, 'Sony Music Communications'),
(5, 'Toranoana'),
(6, '81 Produce'),
(7, 'Kadokawa Media House'),
(8, 'Kadokawa'),
(9, 'Kadokawa Shoten');

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
(1, 'Studio Deen');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme`) VALUES
(2, 'Isekai'),
(3, 'Parody'),
(4, 'Reincarnation');

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
-- Indexes for table `animes_themes`
--
ALTER TABLE `animes_themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_THEMES` (`anime_id`),
  ADD KEY `THEMES` (`theme_id`);

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
-- Indexes for table `themes`
--
ALTER TABLE `themes`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `animes_licensors`
--
ALTER TABLE `animes_licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animes_producers`
--
ALTER TABLE `animes_producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `animes_themes`
--
ALTER TABLE `animes_themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `animes_videos`
--
ALTER TABLE `animes_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `licensors`
--
ALTER TABLE `licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `animes_themes`
--
ALTER TABLE `animes_themes`
  ADD CONSTRAINT `ANIME_THEMES` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `THEMES` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animes_videos`
--
ALTER TABLE `animes_videos`
  ADD CONSTRAINT `ANIME_VIDEOS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
