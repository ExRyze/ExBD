-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2023 at 10:24 AM
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
  `synopsis` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `title`, `slug`, `episodes`, `duration`, `type`, `status`, `source`, `date_aired`, `date_finished`, `synopsis`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Made in Abyss', 'made_in_abyss', 13, '25', 'TV', 'Finished airing', 'Web manga', '2017-07-07', '2017-09-29', 'The Abyss—a gaping chasm stretching down into the depths of the earth, filled with mysterious creatures and relics from a time long past. How did it come to be? What lies at the bottom? Countless brave individuals, known as Divers, have sought to solve these mysteries of the Abyss, fearlessly descending into its darkest realms. The best and bravest of the Divers, the White Whistles, are hailed as legends by those who remain on the surface.\r\n\r\nRiko, daughter of the missing White Whistle Lyza the Annihilator, aspires to become like her mother and explore the furthest reaches of the Abyss. However, just a novice Red Whistle herself, she is only permitted to roam its most upper layer. Even so, Riko has a chance encounter with a mysterious robot with the appearance of an ordinary young boy. She comes to name him Reg, and he has no recollection of the events preceding his discovery. Certain that the technology to create Reg must come from deep within the Abyss, the two decide to venture forth into the chasm to recover his memories and see the bottom of the great pit with their own eyes. However, they know not of the harsh reality that is the true existence of the Abyss.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-21 23:01:45', '2023-04-30 08:12:14', 1),
(2, 'Made in Abyss Movie 3: Fukaki Tamashii no Reimei', 'made_in_abyss_movie_3_fukaki_tamashii_no_reimei', 1, '105', 'Movie', 'Finished airing', 'Web manga', '2020-11-07', NULL, 'After bonding over a tragic loss, the long-suffering Nanachi joins Riko and Reg on their journey into the depths of the Abyss. Awaiting the children is the Sea of Corpses—the Abyss\'s fifth layer, and the deepest level from which a traveler can return without losing their human form.\r\n\r\nThe masked sadist Bondrewd stands between the children and the rest of their adventure. Bondrewd\'s horrific laboratory serves as a final checkpoint for those wishing to traverse deeper into the Abyss, and the sociopathic scientist has no desire to allow Riko\'s party to pass through at no cost. Deeply scarred by Bondrewd\'s impact on their childhood, Nanachi is engulfed in turmoil over his resurgence in their life.\r\n\r\nBondrewd\'s only apparent weakness is Prushka, a brash child who claims to be his daughter. Riko, Reg, and Nanachi befriend Prushka and work with the girl to overcome her father\'s machinations and breach the Abyss\'s sixth layer.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-23 23:02:13', '2023-04-30 08:10:38', 1),
(3, 'Made in Abyss: Retsujitsu no Ougonkyou', 'made_in_abyss_retsujitsu_no_ougonkyou', 12, '25', 'TV', 'Finished airing', 'Web manga', '2022-07-06', '2022-08-28', 'After surviving the brutal challenges of Idofront, Riko now possesses a White Whistle, allowing her to descend into the Abyss\'s sixth layer—The Capital of the Unreturned. Alongside Reg and Nanachi, Riko begins to explore the uncharted domain, where the ruins of the promised Golden City are located.\r\n\r\nAs the trio starts to adapt to the harsh environment, they soon encounter dangerous creatures and treacherous landscapes. Their expedition leads them to a village inhabited by strange beings known as \"hollows.\" Despite the creeping sense of unease that welcomes them, the three venture onward to uncover the mysteries of the settlement and long-lost legacies of the forgotten adventurers who once descended into the horrors of the unexplored Abyss.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-23 23:10:56', '2023-04-30 07:56:15', 1),
(4, '3D Kanojo: Real Girl 2nd Season', '3d_kanojo_real_girl_2nd_season', 12, '22', 'TV', 'Finished airing', 'Manga', '2019-01-09', '2019-03-27', 'Teenage otaku Tsutsui is finally starting to feel comfortable in his relationship with his beautiful classmate Iroha, but the real world continues to make things tough for both of them. With the school cultural festival coming up, Tsutsui gets stuck working on the festival committee while Iroha\'s classmates pressure her to enter the beauty contest. Meanwhile, Tsutsui\'s best friend Itou finally works up the courage to confess his feelings to Ayado, but she turns him down. As Itou works to get over this rejection and Tsutsui struggles just to survive the festival, they both decide to do whatever they can to become better people. Will their good intentions pave the way to a happy outcome, or will more hearts be broken along the way?\r\n\r\n(Source: ANN)', 'Cover.jpg', '2023-04-24 05:49:58', '2023-04-30 12:47:54', 1),
(5, '3D Kanojo: Real Girl', '3d_kanojo_real_girl', 12, '22', 'TV', 'Finished airing', 'Manga', '2018-04-04', '2018-06-20', 'For Hikari Tsutsui, life within the two-dimensional realm is much simpler. Socially inept and awkward, he immerses himself in video games and anime, only to be relentlessly ridiculed and ostracized by his classmates. Sharing his misery is Yuuto Itou, his only friend, who wears cat ears and is equally obsessed with the world of games.\r\n\r\nAfter being forced to clean the pool as punishment for arriving late, Tsutsui meets Iroha Igarashi, but he attempts to steer clear of her, as her notoriety precedes her. Brazenly blunt, loathed by female classmates, and infamous for messing around with boys, Tsutsui believes that getting involved with her would cause nothing but problems.\r\n\r\n3D Kanojo: Real Girl is a story revolving around these two outcasts—a boy full of emotions he has never experienced before, struggling to lay them bare, and a girl who strives to break him out of his shell.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 05:52:43', '2023-04-30 12:48:24', 1),
(6, '3-gatsu no Lion', '3-gatsu_no_lion', 22, '25', 'TV', 'Finished airing', 'Manga', '2016-09-08', '2017-03-18', 'Having reached professional status in middle school, Rei Kiriyama is one of the few elite in the world of shogi. Due to this, he faces an enormous amount of pressure, both from the shogi community and his adoptive family. Seeking independence from his tense home life, he moves into an apartment in Tokyo. As a 17-year-old living on his own, Rei tends to take poor care of himself, and his reclusive personality ostracizes him from his peers in school and at the shogi hall.\r\n\r\nHowever, not long after his arrival in Tokyo, Rei meets Akari, Hinata, and Momo Kawamoto, a trio of sisters living with their grandfather who owns a traditional wagashi shop. Akari, the oldest of the three girls, is determined to combat Rei\'s loneliness and poorly sustained lifestyle with motherly hospitality. The Kawamoto sisters, coping with past tragedies, also share with Rei a unique familial bond that he has lacked for most of his life. As he struggles to maintain himself physically and mentally through his shogi career, Rei must learn how to interact with others and understand his own complex emotions.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 05:53:51', '2023-05-01 10:12:11', 1),
(7, '3-gatsu no Lion 2nd Season', '3-gatsu_no_lion_2nd_season', 22, '25', 'TV', 'Finished airing', 'Manga', '2017-09-14', '2018-03-31', 'Now in his second year of high school, Rei Kiriyama continues pushing through his struggles in the professional shogi world as well as his personal life. Surrounded by vibrant personalities at the shogi hall, the school club, and in the local community, his solitary shell slowly begins to crack. Among them are the three Kawamoto sisters—Akari, Hinata, and Momo—who forge an affectionate and familial bond with Rei. Through these ties, he realizes that everyone is burdened by their own emotional hardships and begins learning how to rely on others while supporting them in return.\r\n\r\nNonetheless, the life of a professional is not easy. Between tournaments, championships, and title matches, the pressure mounts as Rei advances through the ranks and encounters incredibly skilled opponents. As he manages his relationships with those who have grown close to him, the shogi player continues to search for the reason he plays the game that defines his career.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 05:55:18', '2023-04-30 12:53:40', 1),
(8, '5-toubun no Hanayome', '5-toubun_no_hanayome', 12, '24', 'TV', 'Finished airing', 'Manga', '2019-01-11', '2019-03-29', 'Fuutarou Uesugi is an ace high school student, but leads an otherwise tough life. His standoffish personality and reclusive nature have left him friendless, and his father is debt-ridden, forcing his family to scrape by.\r\n\r\nOne day during his lunch break, Uesugi argues with a female transfer student who has claimed \"his seat,\" leading both of them to dislike each other. That same day, he is presented with a golden opportunity to clear his family\'s debt: a private tutoring gig for a wealthy family\'s daughter, with a wage of five times the market price. He accepts the proposal, but is horrified to discover that the client, Itsuki Nakano, is the girl he confronted earlier!\r\n\r\nAfter unsuccessfully trying to get back on Itsuki\'s good side, Uesugi finds out that his problems don\'t end there: Itsuki is actually a quintuplet, so in addition to her, he must also tutor her sisters—Miku, Yotsuba, Nino, and Ichika—who, despite the very real threat of flunking, want nothing to do with a tutor. However, his family\'s livelihood is on the line so Uesugi pushes on, adamant in his resolve to rid the sisters of their detest for studying and successfully lead them to graduation.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 05:56:31', '2023-04-30 12:40:15', 1),
(9, '5-toubun no Hanayome Movie', '5-toubun_no_hanayome_movie', 1, '136', 'Movie', 'Finished airing', 'Manga', '2022-05-20', NULL, 'Futaro has led five quintuplets to the point where they can graduate and pursue their own dreams. Now, finally, they had reached their final school festival. Having decided to make this occasion one to remember, Futaro searches for his feelings for the five quintuplets.\r\n\r\n(source: ANN)', 'Cover.jpg', '2023-04-24 05:58:15', '2023-04-30 12:20:38', 1),
(10, '5-toubun no Hanayome ∬', '5-toubun_no_hanayome_∬', 12, '24', 'TV', 'Finished airing', 'Manga', '2021-01-08', '2021-03-26', 'Through their tutor Fuutarou Uesugi\'s diligent guidance, the Nakano quintuplets\' academic performance shows signs of improvement, even if their path to graduation is still rocky. However, as they continue to cause various situations that delay any actual tutoring, Fuutarou becomes increasingly involved with their personal lives, further complicating their relationship with each other.\r\n\r\nOn another note, Fuutarou slowly begins to realize the existence of a possible connection between him and the past he believes to have shared with one of the five girls. With everyone\'s feelings beginning to develop and overlap, will they be able to keep their bond strictly to that of a teacher and his students—or will it mature into something else entirely?\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 06:08:26', '2023-04-30 12:22:24', 1),
(11, 'One Piece', 'one_piece', NULL, '24', 'TV', 'Currently airing', 'Manga', '1999-10-20', NULL, 'Gol D. Roger was known as the \"Pirate King,\" the strongest and most infamous being to have sailed the Grand Line. The capture and execution of Roger by the World Government brought a change throughout the world. His last words before his death revealed the existence of the greatest treasure in the world, One Piece. It was this revelation that brought about the Grand Age of Pirates, men who dreamed of finding One Piece—which promises an unlimited amount of riches and fame—and quite possibly the pinnacle of glory and the title of the Pirate King.\r\n\r\nEnter Monkey D. Luffy, a 17-year-old boy who defies your standard definition of a pirate. Rather than the popular persona of a wicked, hardened, toothless pirate ransacking villages for fun, Luffy\'s reason for being a pirate is one of pure wonder: the thought of an exciting adventure that leads him to intriguing people and ultimately, the promised treasure. Following in the footsteps of his childhood hero, Luffy and his crew travel across the Grand Line, experiencing crazy adventures, unveiling dark mysteries and battling strong enemies, all in order to reach the most coveted of all fortunes—One Piece.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-30 13:08:24', '2023-04-30 13:32:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anime_aliases`
--

CREATE TABLE `anime_aliases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_aliases`
--

INSERT INTO `anime_aliases` (`id`, `origin`, `alias`, `created_at`, `updated_at`, `anime_id`) VALUES
(3, 'Synonyms', 'Sangatsu no Lion', '2023-04-25 23:49:00', '2023-04-25 23:49:00', 6),
(4, 'Japanese', '3月のライオン', '2023-04-25 23:49:17', '2023-04-25 23:49:17', 6),
(5, 'English', 'March Comes In Like a Lion', '2023-04-25 23:50:51', '2023-04-25 23:50:51', 6),
(6, 'Synonyms', 'Sangatsu no Lion Second Season', '2023-04-26 19:53:06', '2023-04-26 19:53:06', 7),
(7, 'Japanese', '3月のライオン 第2シリーズ', '2023-04-26 19:53:20', '2023-04-26 19:53:20', 7),
(8, 'English', 'March Comes In Like A Lion 2nd Season', '2023-04-26 19:53:34', '2023-04-26 19:53:34', 7),
(9, 'Synonyms', '3D Girlfriend', '2023-04-26 19:54:58', '2023-04-26 19:54:58', 5),
(10, 'Japanese', '３Ｄ彼女　リアルガール', '2023-04-26 19:55:15', '2023-04-26 19:55:15', 5),
(11, 'English', 'Real Girl', '2023-04-26 19:55:34', '2023-04-26 19:55:34', 5),
(12, 'Synonyms', '3D Girlfriend 2nd Season', '2023-04-26 19:57:30', '2023-04-26 19:57:30', 4),
(13, 'Japanese', '3D彼女 リアルガール第2シーズン', '2023-04-26 19:57:46', '2023-04-26 19:57:46', 4),
(14, 'English', 'Real Girl Season 2', '2023-04-26 19:58:02', '2023-04-26 19:58:02', 4),
(15, 'Synonyms', 'Gotoubun no Hanayome', '2023-04-26 19:59:07', '2023-04-26 19:59:07', 8),
(16, 'Synonyms', 'The Five Wedded Brides', '2023-04-26 19:59:19', '2023-04-26 19:59:19', 8),
(17, 'Japanese', '五等分の花嫁', '2023-04-26 19:59:33', '2023-04-26 19:59:33', 8),
(18, 'English', 'The Quintessential Quintuplets', '2023-04-26 19:59:46', '2023-04-26 19:59:46', 8),
(19, 'Synonyms', 'Gotoubun no Hanayome 2nd Season', '2023-04-26 20:02:04', '2023-04-26 20:02:04', 10),
(20, 'Synonyms', 'The Five Wedded Brides 2nd Season', '2023-04-26 20:02:15', '2023-04-26 20:02:15', 10),
(21, 'Synonyms', '5-toubun no Hanayome 2nd Season', '2023-04-26 20:02:28', '2023-04-26 20:02:28', 10),
(22, 'Synonyms', 'The Quintessential Quintuplets 2nd Season', '2023-04-26 20:02:41', '2023-04-26 20:02:41', 10),
(23, 'Japanese', '五等分の花嫁∬', '2023-04-26 20:02:55', '2023-04-26 20:02:55', 10),
(24, 'English', 'The Quintessential Quintuplets 2', '2023-04-26 20:03:09', '2023-04-26 20:03:09', 10),
(25, 'Synonyms', 'Gotoubun no Hanayome', '2023-04-26 20:04:01', '2023-04-26 20:04:01', 9),
(26, 'Synonyms', 'The Five Wedded Brides', '2023-04-26 20:04:21', '2023-04-26 20:04:21', 9),
(27, 'Synonyms', 'The Quintessential Quintuplets', '2023-04-26 20:04:32', '2023-04-26 20:04:32', 9),
(28, 'Japanese', '映画 五等分の花嫁', '2023-04-26 20:04:44', '2023-04-26 20:04:44', 9),
(29, 'English', 'The Quintessential Quintuplets Movie', '2023-04-26 20:04:55', '2023-04-26 20:04:55', 9),
(30, 'Japanese', 'メイドインアビス', '2023-04-26 20:05:45', '2023-04-26 20:05:45', 1),
(31, 'English', 'Made in Abyss', '2023-04-26 20:05:57', '2023-04-26 20:05:57', 1),
(32, 'Synonyms', 'Gekijouban Made in Abyss: Fukaki Tamashii no Reimei', '2023-04-26 20:08:13', '2023-04-26 20:08:13', 2),
(33, 'Synonyms', 'Made in Abyss: Dawn of the Deep Soul', '2023-04-26 20:08:21', '2023-04-26 20:08:21', 2),
(34, 'Japanese', '劇場版メイドインアビス 深き魂の黎明', '2023-04-26 20:08:32', '2023-04-26 20:08:32', 2),
(35, 'English', 'Made in Abyss: Dawn of the Deep Soul', '2023-04-26 20:08:48', '2023-04-26 20:08:48', 2),
(36, 'Japanese', 'メイドインアビス 烈日の黄金郷', '2023-04-26 20:09:32', '2023-04-26 20:09:32', 3),
(37, 'English', 'Made in Abyss: The Golden City of the Scorching Sun', '2023-04-26 20:09:43', '2023-04-26 20:09:43', 3),
(38, 'Synonyms', 'OP', '2023-04-30 13:32:51', '2023-04-30 13:32:51', 11),
(39, 'Japanese', 'ONE PIECE', '2023-04-30 13:33:08', '2023-04-30 13:33:08', 11),
(40, 'English', 'One Piece', '2023-04-30 13:33:25', '2023-04-30 13:33:25', 11);

-- --------------------------------------------------------

--
-- Table structure for table `anime_genres`
--

CREATE TABLE `anime_genres` (
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_genres`
--

INSERT INTO `anime_genres` (`anime_id`, `genre_id`) VALUES
(7, 3),
(5, 5),
(4, 5),
(8, 2),
(8, 5),
(10, 2),
(10, 5),
(9, 2),
(9, 5),
(1, 3),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 3),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 6),
(3, 3),
(3, 7),
(3, 9),
(3, 8),
(6, 3),
(6, 4),
(11, 1),
(11, 6),
(11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `anime_licensors`
--

CREATE TABLE `anime_licensors` (
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `licensor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_licensors`
--

INSERT INTO `anime_licensors` (`anime_id`, `licensor_id`) VALUES
(3, 1),
(2, 1),
(1, 1),
(9, 2),
(8, 3),
(4, 1),
(5, 1),
(6, 4),
(7, 4),
(11, 5),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `anime_producers`
--

CREATE TABLE `anime_producers` (
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_producers`
--

INSERT INTO `anime_producers` (`anime_id`, `producer_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 1),
(7, 5),
(7, 2),
(7, 4),
(7, 3),
(7, 6),
(5, 7),
(5, 8),
(5, 9),
(4, 9),
(4, 7),
(4, 10),
(4, 11),
(8, 12),
(8, 13),
(8, 14),
(8, 15),
(10, 15),
(10, 13),
(10, 12),
(10, 16),
(10, 17),
(10, 18),
(10, 19),
(10, 20),
(9, 13),
(9, 18),
(9, 12),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(2, 22),
(2, 26),
(2, 29),
(2, 30),
(2, 28),
(2, 25),
(2, 27),
(2, 23),
(2, 31),
(3, 22),
(3, 26),
(3, 29),
(3, 30),
(3, 28),
(3, 25),
(3, 31),
(3, 23),
(11, 32),
(11, 33),
(11, 34);

-- --------------------------------------------------------

--
-- Table structure for table `anime_studios`
--

CREATE TABLE `anime_studios` (
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `studio_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_studios`
--

INSERT INTO `anime_studios` (`anime_id`, `studio_id`) VALUES
(7, 1),
(6, 1),
(5, 2),
(4, 2),
(8, 3),
(10, 4),
(9, 4),
(1, 5),
(2, 5),
(3, 5),
(11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `anime_themes`
--

CREATE TABLE `anime_themes` (
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `theme_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_themes`
--

INSERT INTO `anime_themes` (`anime_id`, `theme_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(5, 4),
(4, 4),
(8, 5),
(8, 4),
(10, 5),
(10, 4),
(9, 5),
(9, 4),
(1, 6),
(1, 7),
(2, 6),
(2, 7),
(3, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `folder_animes`
--

CREATE TABLE `folder_animes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Slice of Life'),
(5, 'Romance'),
(6, 'Adventure'),
(7, 'Fantasy'),
(8, 'Sci-Fi'),
(9, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `licensors`
--

CREATE TABLE `licensors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licensor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licensors`
--

INSERT INTO `licensors` (`id`, `licensor`) VALUES
(1, 'Sentai Filmworks'),
(2, 'Crunchyroll'),
(3, 'Funimation'),
(4, 'Aniplex of America'),
(5, '4Kids Entertainment');

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
(4, '2023_04_08_050559_create_animes_table', 1),
(5, '2023_04_25_074233_create_anime_aliases_table', 3),
(6, '2023_04_26_104527_create_genres_table', 4),
(7, '2023_04_26_110051_create_anime_genres_table', 4),
(8, '2023_04_27_164848_create_themes_table', 5),
(9, '2023_04_27_165237_create_anime_themes_table', 6),
(10, '2023_04_28_112647_create_producers_table', 7),
(11, '2023_04_28_113308_create_anime_producers_table', 7),
(12, '2023_04_28_205314_create_licensors_table', 8),
(13, '2023_04_28_205658_create_anime_licensors_table', 8),
(14, '2023_04_28_211604_create_studios_table', 9),
(15, '2023_04_28_212245_create_anime_studios_table', 9),
(16, '2023_04_29_135221_add_image_to_animes', 10),
(17, '2023_05_01_174046_add_image_and_bio_to_users_table', 11),
(18, '2023_05_02_173544_create_folder_animes_table', 12),
(19, '2023_05_02_175842_create_video_animes_table', 12),
(22, '2023_05_02_180822_create_mistakes_table', 13),
(24, '2023_05_02_180823_create_video_anime_mistakes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mistakes`
--

CREATE TABLE `mistakes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mistake` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `producer`) VALUES
(1, 'Aniplex'),
(2, 'Dentsu'),
(3, 'NHK'),
(4, 'Hakusensha'),
(5, 'Asmik Ace'),
(6, 'Toy\'s Factory'),
(7, 'VAP'),
(8, 'Nippon Television Network'),
(9, 'DeNA'),
(10, 'Docomo Anime Store'),
(11, 'D.N. Dream Partners'),
(12, 'Pony Canyon'),
(13, 'Kodansha'),
(14, 'ZERO-A'),
(15, 'GYAO!'),
(16, 'DAX Production'),
(17, 'BS11'),
(18, 'Nichion'),
(19, 'Good Smile Film'),
(20, 'MAGNET'),
(21, 'Media Factory'),
(22, 'AT-X'),
(23, 'Takeshobo'),
(24, 'Sony Music Communications'),
(25, 'Kadokawa Media House'),
(26, 'Cygames'),
(27, 'Kanetsu Investment'),
(28, 'Kadokawa'),
(29, 'Global Solutions'),
(30, 'IRMA LA DOUCE'),
(31, 'Sony Music Solutions'),
(32, 'Fuji TV'),
(33, 'TAP'),
(34, 'Shueisha');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `studio`) VALUES
(1, 'Shaft'),
(2, 'Hoods Entertainment'),
(3, 'Tezuka Productions'),
(4, 'Bibury Animation Studios'),
(5, 'Kinema Citrus'),
(6, 'Toei Animation');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme`) VALUES
(1, 'Childcare'),
(2, 'Iyashikei'),
(3, 'Strategy Game'),
(4, 'School'),
(5, 'Harem'),
(6, 'Gore'),
(7, 'Survival');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Staff','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `image`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ExRyze', 'ichianime4@gmail.com', NULL, '$2y$10$pAKKVf7ko.fvOvnkbbaL6OAGcST/CTmLI1fkJXkXAEc.06ur8JLLe', 'Admin', 'ExRyze.jpg', 'Normal People', NULL, NULL, '2023-05-01 10:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `video_animes`
--

CREATE TABLE `video_animes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lenght_video` time NOT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_tracks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapters` tinyint(1) NOT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `folder_anime_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_anime_mistakes`
--

CREATE TABLE `video_anime_mistakes` (
  `video_anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mistake_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `anime_aliases`
--
ALTER TABLE `anime_aliases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_aliases_anime_id_foreign` (`anime_id`);

--
-- Indexes for table `anime_genres`
--
ALTER TABLE `anime_genres`
  ADD KEY `anime_genres_anime_id_foreign` (`anime_id`),
  ADD KEY `anime_genres_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `anime_licensors`
--
ALTER TABLE `anime_licensors`
  ADD KEY `anime_licensors_anime_id_foreign` (`anime_id`),
  ADD KEY `anime_licensors_licensor_id_foreign` (`licensor_id`);

--
-- Indexes for table `anime_producers`
--
ALTER TABLE `anime_producers`
  ADD KEY `anime_producers_anime_id_foreign` (`anime_id`),
  ADD KEY `anime_producers_producer_id_foreign` (`producer_id`);

--
-- Indexes for table `anime_studios`
--
ALTER TABLE `anime_studios`
  ADD KEY `anime_studios_anime_id_foreign` (`anime_id`),
  ADD KEY `anime_studios_studio_id_foreign` (`studio_id`);

--
-- Indexes for table `anime_themes`
--
ALTER TABLE `anime_themes`
  ADD KEY `anime_themes_anime_id_foreign` (`anime_id`),
  ADD KEY `anime_themes_theme_id_foreign` (`theme_id`);

--
-- Indexes for table `folder_animes`
--
ALTER TABLE `folder_animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_animes_anime_id_foreign` (`anime_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mistakes`
--
ALTER TABLE `mistakes`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_animes`
--
ALTER TABLE `video_animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_animes_folder_anime_id_foreign` (`folder_anime_id`);

--
-- Indexes for table `video_anime_mistakes`
--
ALTER TABLE `video_anime_mistakes`
  ADD KEY `video_anime_mistakes_video_anime_id_foreign` (`video_anime_id`),
  ADD KEY `video_anime_mistakes_mistake_id_foreign` (`mistake_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animes`
--
ALTER TABLE `animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `anime_aliases`
--
ALTER TABLE `anime_aliases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `folder_animes`
--
ALTER TABLE `folder_animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `licensors`
--
ALTER TABLE `licensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mistakes`
--
ALTER TABLE `mistakes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_animes`
--
ALTER TABLE `video_animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `animes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `anime_aliases`
--
ALTER TABLE `anime_aliases`
  ADD CONSTRAINT `anime_aliases_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_genres`
--
ALTER TABLE `anime_genres`
  ADD CONSTRAINT `anime_genres_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_licensors`
--
ALTER TABLE `anime_licensors`
  ADD CONSTRAINT `anime_licensors_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_licensors_licensor_id_foreign` FOREIGN KEY (`licensor_id`) REFERENCES `licensors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_producers`
--
ALTER TABLE `anime_producers`
  ADD CONSTRAINT `anime_producers_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_producers_producer_id_foreign` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_studios`
--
ALTER TABLE `anime_studios`
  ADD CONSTRAINT `anime_studios_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_studios_studio_id_foreign` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_themes`
--
ALTER TABLE `anime_themes`
  ADD CONSTRAINT `anime_themes_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_themes_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `folder_animes`
--
ALTER TABLE `folder_animes`
  ADD CONSTRAINT `folder_animes_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_animes`
--
ALTER TABLE `video_animes`
  ADD CONSTRAINT `video_animes_folder_anime_id_foreign` FOREIGN KEY (`folder_anime_id`) REFERENCES `folder_animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_anime_mistakes`
--
ALTER TABLE `video_anime_mistakes`
  ADD CONSTRAINT `video_anime_mistakes_mistake_id_foreign` FOREIGN KEY (`mistake_id`) REFERENCES `mistakes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_anime_mistakes_video_anime_id_foreign` FOREIGN KEY (`video_anime_id`) REFERENCES `video_animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
