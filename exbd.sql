-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2023 at 02:44 PM
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
  `slug` varchar(144) NOT NULL,
  `title` varchar(144) NOT NULL,
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
(1, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!', 'Kono Subarashii Sekai ni Shukufuku wo!', 'BD', 10, 'Finished airing', '2016-01-14', '2016-03-17', '2022-12-13 00:00:23', '2022-12-15 01:20:42', 2),
(2, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!_2', 'Kono Subarashii Sekai ni Shukufuku wo! 2', 'BD', 10, 'Finished airing', '2017-01-12', '2017-03-16', '2022-12-14 07:26:45', '2022-12-15 01:28:18', 2),
(3, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!_Kono_Subarashii_Choker_ni_Shukufuku_wo!', 'Kono Subarashii Sekai ni Shukufuku wo! Kono Subarashii Choker ni Shukufuku wo!', 'OVA', 1, 'Finished airing', '2016-06-24', NULL, '2022-12-15 01:43:51', '2022-12-15 01:46:03', 2),
(4, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!_2-_Kono_Subarashii_Geijutsu_ni_Shukufuku_wo!', 'Kono Subarashii Sekai ni Shukufuku wo! 2: Kono Subarashii Geijutsu ni Shukufuku wo!', 'OVA', 1, 'Finished airing', '2017-07-24', NULL, '2022-12-17 22:16:50', '2023-01-13 15:40:09', 2),
(5, 'Kono_Subarashii_Sekai_ni_Shukufuku_wo!_Movie-_Kurenai_Densetsu', 'Kono Subarashii Sekai ni Shukufuku wo! Movie: Kurenai Densetsu', 'Movie', 1, 'Finished airing', '2019-07-30', NULL, '2022-12-17 22:28:23', '2023-01-13 15:40:16', 2),
(6, 'Gate-_Jieitai_Kanochi_nite,_Kaku_Tatakaeri', 'Gate: Jieitai Kanochi nite, Kaku Tatakaeri', 'BD', 12, 'Finished airing', '2015-07-04', '2015-09-19', '2022-12-26 00:48:21', '2023-01-13 15:39:40', 2),
(7, 'Gate-_Jieitai_Kanochi_nite,_Kaku_Tatakaeri_Part_2', 'Gate: Jieitai Kanochi nite, Kaku Tatakaeri Part 2', 'BD', 12, 'Finished airing', '2016-01-09', '2016-03-26', '2022-12-26 01:40:54', '2023-01-13 15:40:01', 2),
(8, 'Arifureta_Shokugyou_de_Sekai_Saikyou', 'Arifureta Shokugyou de Sekai Saikyou', 'BD', 13, 'Finished airing', '2019-07-08', '2019-10-07', '2022-12-26 07:23:06', '2022-12-26 07:23:06', 2),
(9, 'Arifureta_Shokugyou_de_Sekai_Saikyou_2nd_Season', 'Arifureta Shokugyou de Sekai Saikyou 2nd Season', 'BD', 12, 'Finished airing', '2022-01-13', '2022-03-31', '2023-01-05 07:20:27', '2023-01-05 07:20:27', 2),
(10, 'Ore_dake_Haireru_Kakushi_Dungeon', 'Ore dake Haireru Kakushi Dungeon', 'TV', 12, 'Finished airing', '2021-01-09', '2021-03-27', '2023-01-05 07:49:42', '2023-01-05 07:49:42', 2),
(11, 'Yuusha,_Yamemasu', 'Yuusha, Yamemasu', 'TV', 12, 'Finished airing', '2022-04-05', '2022-06-21', '2023-01-05 08:02:34', '2023-01-05 08:02:34', 2),
(12, 'Tsuujou_Kougeki_ga_Zentai_Kougeki_de_Ni-kai_Kougeki_no_Okaasan_wa_Suki_desu_ka?', 'Tsuujou Kougeki ga Zentai Kougeki de Ni-kai Kougeki no Okaasan wa Suki desu ka?', 'BD', 12, 'Finished airing', '2019-07-13', '2019-09-28', '2023-01-10 04:09:09', '2023-01-13 15:29:08', 2),
(13, 'Tsuujou_Kougeki_ga_Zentai_Kougeki_de_Ni-kai_Kougeki_no_Okaasan_wa_Suki_desu_ka?_Namiuchigiwa_no_Okaasan_wa_Suki_desu_ka?', 'Tsuujou Kougeki ga Zentai Kougeki de Ni-kai Kougeki no Okaasan wa Suki desu ka? Namiuchigiwa no Okaasan wa Suki desu ka?', 'OVA', 1, 'Finished airing', '2020-03-25', NULL, '2023-01-12 07:16:34', '2023-01-13 15:29:23', 2),
(14, 'Kawaikereba_Hentai_demo_Suki_ni_Natte_Kuremasu_ka@', 'Kawaikereba Hentai demo Suki ni Natte Kuremasu ka?', 'BD', 12, 'Finished airing', '2019-07-08', '2019-09-23', '2023-01-12 07:38:40', '2023-01-13 15:31:35', 2),
(15, 'Made_in_Abyss', 'Made in Abyss', 'BD', 13, 'Finished airing', '2017-07-07', '2017-09-29', '2023-01-17 05:26:13', '2023-01-17 05:26:13', 2),
(16, 'Made_in_Abyss_Movie_3-_Fukaki_Tamashii_no_Reimei', 'Made in Abyss Movie 3: Fukaki Tamashii no Reimei', 'Movie', 1, 'Finished airing', '2020-01-17', NULL, '2023-01-17 05:50:29', '2023-01-17 05:50:29', 2),
(17, 'Made_in_Abyss-_Retsujitsu_no_Ougonkyou', 'Made in Abyss: Retsujitsu no Ougonkyou', 'TV', 12, 'Finished airing', '2022-07-06', '2022-09-28', '2023-01-17 06:03:29', '2023-01-17 06:03:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `animes_aliases`
--

CREATE TABLE `animes_aliases` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `origin_alias` varchar(52) NOT NULL,
  `anime_alias` text NOT NULL
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
(6, 2, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World! 2'),
(7, 3, 'Synonyms', 'KonoSuba OVA, A Blessing to this Wonderful Choker!'),
(8, 3, 'Japanese', 'ã“ã®ç´ æ™´ã‚‰ã—ã„ä¸–ç•Œã«ç¥ç¦ã‚’ï¼ ç¬¬11è©± ã“ã®ç´ æ™´ã‚‰ã—ã„ãƒãƒ¨ãƒ¼ã‚«ãƒ¼ã«ç¥ç¦ã‚’ï¼'),
(9, 3, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World! - God\'s Blessing on This Wonderful Choker!'),
(10, 4, 'Synonyms', 'KonoSuba: God\'s Blessing on This Wonderful World! Second Season OVA, Kono Subarashii Sekai ni Shukufuku wo! 2 OVA'),
(11, 4, 'Japanese', 'ã“ã®ç´ æ™´ã‚‰ã—ã„ä¸–ç•Œã«ç¥ç¦ã‚’ï¼2 ã“ã®ç´ æ™´ã‚‰ã—ã„èŠ¸è¡“ã«ç¥ç¦ã‚’ï¼'),
(12, 4, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World! 2 - God\'s Blessing on This Wonderful Art!'),
(13, 5, 'Synonyms', 'KonoSuba Movie, Eiga Kono Subarashii Sekai ni Shukufuku wo!, Kono Subarashii Sekai ni Shukufuku wo! Movie'),
(14, 5, 'Japanese', 'æ˜ ç”» ã“ã®ç´ æ™´ã‚‰ã—ã„ä¸–ç•Œã«ç¥ç¦ã‚’ï¼ç´…ä¼èª¬'),
(15, 5, 'English', 'KonoSuba: God\'s Blessing on This Wonderful World! - Legend of Crimson'),
(16, 6, 'Synonyms', 'Gate: Thus the JSDF Fought There!'),
(17, 6, 'Japanese', 'GATEï¼ˆã‚²ãƒ¼ãƒˆï¼‰è‡ªè¡›éšŠã€€å½¼ã®åœ°ã«ã¦ã€æ–¯ãæˆ¦ãˆã‚Š'),
(18, 6, 'English', 'GATE'),
(19, 7, 'Synonyms', 'Gate: Jieitai Kanochi nite, Kaku Tatakaeri 2nd Season, Gate: Thus the JSDF Fought There! Fire Dragon Arc, Gate: Jieitai Kanochi nite, Kaku Tatakaeri - Enryuu-hen'),
(21, 7, 'English', 'GATE Part 2'),
(22, 7, 'Japanese', 'GATEï¼ˆã‚²ãƒ¼ãƒˆï¼‰è‡ªè¡›éšŠã€€å½¼ã®åœ°ã«ã¦ã€æ–¯ãæˆ¦ãˆã‚Šã€€ç¬¬2ã‚¯ãƒ¼ãƒ«'),
(23, 8, 'Synonyms', 'From Common Job Class to the Strongest in the World'),
(24, 8, 'Japanese', 'ã‚ã‚Šãµã‚ŒãŸè·æ¥­ã§ä¸–ç•Œæœ€å¼·'),
(25, 8, 'English', 'Arifureta: From Commonplace to World\'s Strongest'),
(26, 9, 'Synonyms', 'From Common Job Class to the Strongest in the World 2nd Season'),
(27, 9, 'Japanese', 'ã‚ã‚Šãµã‚ŒãŸè·æ¥­ã§ä¸–ç•Œæœ€å¼· 2nd Season'),
(28, 9, 'English', 'Arifureta: From Commonplace to World\'s Strongest Season 2'),
(29, 10, 'Synonyms', 'Special training in the Secret Dungeon'),
(30, 10, 'Japanese', 'ä¿ºã ã‘å…¥ã‚Œã‚‹éš ã—ãƒ€ãƒ³ã‚¸ãƒ§ãƒ³'),
(31, 10, 'English', 'The Hidden Dungeon Only I Can Enter'),
(32, 11, 'Synonyms', 'Yuuyame'),
(33, 11, 'Japanese', 'å‹‡è€…ã€è¾žã‚ã¾ã™'),
(34, 11, 'English', 'I\'m Quitting Heroing'),
(36, 12, 'Synonyms', 'Do You Like Your Mom? Her Normal Attack is Two Attacks at Full Power, Okaa-san Online'),
(37, 12, 'Japanese', 'é€šå¸¸æ”»æ’ƒãŒå…¨ä½“æ”»æ’ƒã§äºŒå›žæ”»æ’ƒã®ãŠæ¯ã•ã‚“ã¯å¥½ãã§ã™ã‹ï¼Ÿ'),
(38, 12, 'English', 'Do You Love Your Mom and Her Two-Hit Multi-Target Attacks?'),
(39, 13, 'Synonyms', 'Do You Like Your Mom? Her Normal Attack is Two Attacks at Full Power OVA, Okaasan online OVA, Tsuujou Kougeki ga Zentai Kougeki de Ni-kai Kougeki no Okaasan wa Suki Desu ka? episode 13'),
(40, 13, 'Japanese', 'é€šå¸¸æ”»æ’ƒãŒå…¨ä½“æ”»æ’ƒã§äºŒå›žæ”»æ’ƒã®ãŠæ¯ã•ã‚“ã¯å¥½ãã§ã™ã‹ï¼Ÿæ³¢æ‰“ã¡éš›ã®ãŠæ¯ã•ã‚“ã¯å¥½ãã§ã™ã‹?'),
(41, 13, 'English', 'Do You Love Your Mom and Her Two-Hit Multi-Target Attacks? Do You Love Your Mom on the Shore?'),
(42, 14, 'Synonyms', 'Would you love a pervert as long as she\'s cute?'),
(43, 14, 'Japanese', 'å¯æ„›ã‘ã‚Œã°å¤‰æ…‹ã§ã‚‚å¥½ãã«ãªã£ã¦ãã‚Œã¾ã™ã‹ï¼Ÿ'),
(44, 14, 'English', 'Hensuki: Are you willing to Fall in Love with a Pervert, as long as she\'s a Cutie?'),
(45, 15, 'Japanese', 'ãƒ¡ã‚¤ãƒ‰ã‚¤ãƒ³ã‚¢ãƒ“ã‚¹'),
(46, 15, 'English', 'Made in Abyss'),
(47, 16, 'Synonyms', 'Gekijouban Made in Abyss: Fukaki Tamashii no Reimei, Made in Abyss: Dawn of the Deep Soul'),
(48, 16, 'Japanese', 'åŠ‡å ´ç‰ˆãƒ¡ã‚¤ãƒ‰ã‚¤ãƒ³ã‚¢ãƒ“ã‚¹ æ·±ãé­‚ã®é»Žæ˜Ž'),
(49, 16, 'English', 'Made in Abyss: Dawn of the Deep Soul'),
(50, 17, 'Japanese', 'ãƒ¡ã‚¤ãƒ‰ã‚¤ãƒ³ã‚¢ãƒ“ã‚¹ çƒˆæ—¥ã®é»„é‡‘éƒ·'),
(51, 17, 'English', 'Made in Abyss: The Golden City of the Scorching Sun');

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
(6, 2, 3),
(7, 3, 2),
(8, 3, 3),
(9, 4, 1),
(10, 4, 2),
(11, 4, 3),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3),
(15, 6, 4),
(16, 6, 1),
(17, 6, 3),
(18, 7, 4),
(19, 7, 1),
(20, 7, 3),
(21, 8, 4),
(22, 8, 1),
(23, 8, 3),
(24, 9, 4),
(25, 9, 1),
(26, 9, 3),
(28, 10, 4),
(29, 10, 1),
(30, 10, 3),
(31, 10, 5),
(32, 11, 4),
(33, 11, 1),
(34, 11, 3),
(35, 11, 2),
(37, 12, 1),
(38, 12, 2),
(39, 12, 5),
(40, 12, 3),
(41, 13, 2),
(42, 13, 3),
(43, 13, 5),
(44, 14, 2),
(45, 14, 5),
(46, 14, 6),
(47, 15, 1),
(48, 15, 7),
(49, 15, 3),
(50, 15, 8),
(51, 15, 9),
(52, 16, 1),
(53, 16, 7),
(54, 16, 3),
(55, 16, 8),
(56, 16, 9),
(57, 17, 1),
(58, 17, 7),
(59, 17, 3),
(60, 17, 8),
(61, 17, 9);

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
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 6, 3),
(7, 7, 3),
(8, 8, 4),
(9, 10, 5),
(10, 11, 3),
(12, 12, 6),
(13, 14, 4),
(14, 15, 3),
(15, 16, 3),
(16, 17, 3);

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
(15, 2, 7),
(16, 3, 1),
(17, 5, 6),
(18, 5, 8),
(19, 5, 7),
(20, 5, 10),
(21, 5, 2),
(22, 5, 11),
(23, 5, 4),
(24, 5, 5),
(25, 6, 12),
(26, 6, 13),
(27, 6, 14),
(28, 6, 15),
(29, 6, 3),
(30, 6, 16),
(31, 6, 17),
(32, 7, 17),
(33, 7, 12),
(34, 7, 14),
(35, 7, 15),
(36, 7, 3),
(37, 7, 16),
(38, 8, 18),
(39, 8, 4),
(40, 8, 19),
(41, 8, 5),
(42, 8, 20),
(43, 8, 21),
(44, 8, 22),
(45, 8, 23),
(46, 11, 18),
(47, 11, 24),
(48, 11, 25),
(49, 11, 8),
(50, 11, 26),
(51, 12, 27),
(52, 12, 5),
(53, 12, 28),
(54, 12, 29),
(55, 12, 30),
(56, 12, 31),
(57, 12, 8),
(58, 12, 32),
(59, 13, 32),
(60, 13, 30),
(61, 13, 27),
(62, 13, 31),
(63, 13, 8),
(64, 13, 29),
(65, 13, 28),
(66, 13, 5),
(67, 14, 18),
(68, 14, 33),
(69, 14, 34),
(70, 14, 35),
(71, 14, 23),
(72, 14, 8),
(73, 15, 36),
(74, 15, 18),
(75, 15, 37),
(76, 15, 4),
(77, 15, 7),
(78, 15, 38),
(79, 15, 39),
(80, 15, 8),
(81, 15, 40),
(82, 15, 41),
(83, 16, 41),
(84, 17, 18),
(85, 17, 37),
(86, 17, 7),
(87, 17, 38),
(88, 17, 8),
(89, 17, 40),
(90, 17, 4),
(91, 17, 41);

-- --------------------------------------------------------

--
-- Table structure for table `animes_relations`
--

CREATE TABLE `animes_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `relation` varchar(52) NOT NULL,
  `relation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_relations`
--

INSERT INTO `animes_relations` (`id`, `anime_id`, `relation`, `relation_id`) VALUES
(2, 1, 'Sequel', 2),
(3, 2, 'Prequel', 1),
(4, 6, 'Sequel', 7),
(5, 8, 'Sequel', 9),
(6, 9, 'Prequel', 8),
(7, 7, 'Prequel', 6),
(8, 1, 'OVA', 3),
(9, 2, 'OVA', 4),
(10, 4, 'Parent', 2),
(11, 3, 'Parent', 1),
(12, 2, 'Movie', 5),
(13, 5, 'Parent', 2),
(14, 12, 'OVA', 13),
(15, 13, 'Parent', 12),
(16, 16, 'Prequel', 15),
(17, 15, 'Sequel', 16),
(18, 17, 'Prequel', 16),
(19, 16, 'Sequel', 17);

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
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 3),
(7, 7, 3),
(8, 8, 4),
(9, 8, 5),
(10, 9, 4),
(11, 9, 6),
(12, 11, 7),
(13, 12, 2),
(14, 13, 2),
(15, 14, 8),
(16, 15, 9),
(17, 16, 9),
(18, 17, 9);

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
(9, 2, 4),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 2),
(14, 4, 3),
(15, 4, 4),
(16, 5, 2),
(17, 5, 3),
(18, 5, 4),
(19, 6, 2),
(20, 6, 5),
(21, 7, 2),
(22, 7, 5),
(23, 8, 2),
(24, 8, 6),
(25, 9, 6),
(26, 9, 2),
(27, 10, 6),
(28, 14, 6),
(29, 14, 8),
(30, 15, 9),
(31, 15, 10),
(32, 16, 9),
(33, 16, 10),
(34, 17, 9),
(35, 17, 10);

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
  `additional_values` text NOT NULL,
  `status_videos` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes_videos`
--

INSERT INTO `animes_videos` (`id`, `anime_id`, `source_videos`, `type_videos`, `resolution_videos`, `tracks_videos`, `chapters_videos`, `tracks_audios`, `subtitles_videos`, `additional_errors`, `additional_values`, `status_videos`) VALUES
(1, 1, 'Koenime', 'mkv', '1080p', 'HEVC (H265 Main 10 @L4.0)', 'TRUE', 'Opus 2.0 [Jpn]', 'ASS [Ind] (Ep. 1, 2, 4, 7, 8); ASS [Und] (Ep. 3, 5, 6, 9, 10)', '', '', ''),
(2, 2, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L4.0) (Ep. 1, 3, 5-10); H264 (High 10 @L5.0) (Ep. 2, 4)', 'NULL', 'ACC 2.0 [Jpn]', 'ASS [Und]', 'Frame drop (Subtitle too heavy) in opening; Adanya gambar tambahan dalam subtitle.', '', ''),
(3, 3, 'Koenime', 'mkv', '1080p', 'HEVC (H265 Main 10 @L4.0)', 'TRUE', 'Opus 2.0 [Jpn]', 'ASS [Und]', '', '', ''),
(4, 4, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L4.0)', 'NULL', 'ACC 2.0 [Jpn]', 'ASS [Und]', 'Frame drop (Subtitle too heavy) in opening.\r\n', '', ''),
(5, 5, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'NULL', 'ACC 2.0 [Jpn]', 'NULL', 'In folder \'Drafts\'; Not renamed; Hardsub.', '', ''),
(6, 6, 'Koenime', 'mkv', '1080p', 'HEVC (H265 Main 10 @L4.0)', 'TRUE', 'Opus 2.0 [Jpn]', 'ASS [Ind]', '', '', ''),
(7, 7, 'Koenime', 'mkv', '1080p', 'HEVC (H265 Main 10 @L4.0)', 'TRUE', 'Opus 2.0 [Jpn]', 'ASS [Ind]', 'Frame drop (Subtitle too heavy) in opening.', '', ''),
(8, 8, 'UBW', 'mkv', '1080p', 'H264 (High 10 @L5.1)', 'TRUE', 'ACC 2.0 [Jpn]', 'ASS [Ind]', 'Frame drop (Subtitle too heavy) in opening; Spin-off still included.', '', ''),
(9, 9, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'FALSE', 'FLAC S16 2.0 [Und]', 'ASS [Ind]', 'No Sub in ED (Ep. 1); Error encoding Chap.(Ep. 11); Bonus NCOP & NCED; Spin-off ?.', '', ''),
(10, 10, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S16 2.0 [Und]', 'ASS [Ind]', 'Theres still any steam in video animation, so i think it still TV ver.', 'Bonus NCOP & NCED.', ''),
(11, 11, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S24 2.0 [Und]', 'ASS [Ind]', 'BD?.', '', ''),
(12, 12, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S16 2.0 [Jpn] (Ep. 1 - 11); FLAC S16 2.0 [Ind] (Ep. 12)', 'ASS [Ind] (Ep. 1 - 11); ASS [Jpn] (Ep. 12)', 'OP & ED no-sub; Real BD?', '', ''),
(13, 12, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S16 2.0 [Jpn] (Ep. 1 - 11); FLAC S16 2.0 [Ind] (Ep. 12)', 'ASS [Ind] (Ep. 1 - 11); ASS [Jpn] (Ep. 12)', 'OP & ED no-sub; Real BD?', '', 'DELETED'),
(14, 13, 'Kusonime', 'mkv', '720p', 'H264 (High 10 @L5.0)', 'NULL', 'ACC 2.0 [Her]', 'ASS [Ind]', 'OP & ED no-sub; Audio tracks?', '', 'DELETED'),
(15, 13, 'Kusonime', 'mkv', '720p', 'H264 (High 10 @L5.0)', 'NULL', 'ACC 2.0 [Her]', 'ASS [Ind]', 'OP & ED no-sub; Audio tracks?', '', ''),
(16, 14, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S16 2.0 [Jpn]', 'ASS [Ind]', '', '', ''),
(17, 14, 'Kusonime', 'mkv', '1080p', 'H264 (High 10 @L5.0)', 'TRUE', 'FLAC S24 2.0 [Jpn]', 'ASS [Ind]', '', '', 'DELETED'),
(18, 15, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L4.0) (Ep. 1, 3, 6-8); HEVC (H265 Main 10 @4.0) (Ep. 2, 4-5, 9-13)', 'FALSE', 'ACC S16 2.0 (Ep. 1, 3, 6-8); Opus 2.0 (Ep. 2, 4-5, 9-13).', 'ASS [Und] (Ep. 2, 4-5, 9-13).', 'Hardsub (Ep. 1, 3, 6-8); No chapters (Ep. 1, 3, 6-8); BD? (Ep. 1, 3, 6-8); OVA?', 'True BD (Ep. 2, 4-5, 9-13).', ''),
(19, 16, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L4.0)', 'TRUE', 'ACC 2.0 [Jpn]', 'ASS [Ind]', '', '', ''),
(20, 17, 'Koenime', 'mkv', '1080p', 'H264 (High 10 @L4.1) (Ep. 1-2); H264 (High 10 @L5.0) (Ep. 3-12).', 'NULL', 'ACC 2.0 [Und]', 'NULL', 'Hardsub.', '', '');

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
(3, 'Fantasy'),
(4, 'Action'),
(5, 'Ecchi'),
(6, 'Romance'),
(7, 'Drama'),
(8, 'Mystery'),
(9, 'Sci-Fi');

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
(2, 'Crunchyroll'),
(3, 'Sentai Filmworks'),
(4, 'Funimation'),
(5, 'Okoruto Noboru'),
(6, 'Aniplex of America');

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
(9, 'Kadokawa Shoten'),
(10, 'MAGES.'),
(11, 'Sammy'),
(12, 'Genco'),
(13, 'Magic Capsule'),
(14, 'Warner Bros'),
(15, 'Japan'),
(16, 'Showgate'),
(17, 'Bandai Namco Games'),
(18, 'AT-X'),
(19, 'Bushiroad'),
(20, 'Hakuhodo DY Music & Pictures'),
(21, 'Overlap'),
(22, 'FuRyu'),
(23, 'Bandai Namco Arts'),
(24, 'flying DOG'),
(25, 'Glovision'),
(26, 'Tencent Games'),
(27, 'Aniplex'),
(28, 'Tokyo MX'),
(29, 'Q-Tec'),
(30, 'BS11'),
(31, 'Contents Seed'),
(32, 'KLab'),
(33, 'Bandai Namco Live Creative'),
(34, 'GYAO!'),
(35, 'INCS toenter'),
(36, 'Media Factory'),
(37, 'Takeshobo'),
(38, 'Cygames'),
(39, 'Kanetsu Investment'),
(40, 'Global Solutions'),
(41, 'IRMA LA DOUCE');

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
(1, 'Studio Deen'),
(2, 'J.C.Staff'),
(3, 'A-1 Pictures'),
(4, 'asread.'),
(5, 'White Fox'),
(6, 'studio MOTHER'),
(7, 'EMT Squared'),
(8, 'Geek Toys'),
(9, 'Kinema Citrus');

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
(4, 'Reincarnation'),
(5, 'Military'),
(6, 'Harem'),
(7, 'Time Travel'),
(8, 'School'),
(9, 'Gore'),
(10, 'Survival');

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
(4, 'User', 'User', '123', 'Admin', 2, 'Active', '2023-01-07 07:49:33', '2023-01-07 07:49:33');

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
-- Indexes for table `animes_relations`
--
ALTER TABLE `animes_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANIME_RELATIONS` (`anime_id`),
  ADD KEY `RELATIONS` (`relation_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animes_aliases`
--
ALTER TABLE `animes_aliases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `animes_genres`
--
ALTER TABLE `animes_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `animes_licensors`
--
ALTER TABLE `animes_licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `animes_producers`
--
ALTER TABLE `animes_producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `animes_relations`
--
ALTER TABLE `animes_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `animes_source`
--
ALTER TABLE `animes_source`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animes_studios`
--
ALTER TABLE `animes_studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `animes_themes`
--
ALTER TABLE `animes_themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `animes_videos`
--
ALTER TABLE `animes_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `licensors`
--
ALTER TABLE `licensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `animes_relations`
--
ALTER TABLE `animes_relations`
  ADD CONSTRAINT `ANIME_RELATIONS` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RELATIONS` FOREIGN KEY (`relation_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
