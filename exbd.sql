-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2023 at 02:39 PM
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
(6, '3-gatsu no Lion', '3-gatsu_no_lion', 22, '25', 'TV', 'Finished airing', 'Manga', '2016-09-08', '2017-03-18', 'Having reached professional status in middle school, Rei Kiriyama is one of the few elite in the world of shogi. Due to this, he faces an enormous amount of pressure, both from the shogi community and his adoptive family. Seeking independence from his tense home life, he moves into an apartment in Tokyo. As a 17-year-old living on his own, Rei tends to take poor care of himself, and his reclusive personality ostracizes him from his peers in school and at the shogi hall.\r\n\r\nHowever, not long after his arrival in Tokyo, Rei meets Akari, Hinata, and Momo Kawamoto, a trio of sisters living with their grandfather who owns a traditional wagashi shop. Akari, the oldest of the three girls, is determined to combat Rei\'s loneliness and poorly sustained lifestyle with motherly hospitality. The Kawamoto sisters, coping with past tragedies, also share with Rei a unique familial bond that he has lacked for most of his life. As he struggles to maintain himself physically and mentally through his shogi career, Rei must learn how to interact with others and understand his own complex emotions.\r\n\r\n[Written by MAL Rewrite]', 'Cover.jpg', '2023-04-24 05:53:51', '2023-05-05 05:46:14', 1),
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
(40, 'English', 'One Piece', '2023-04-30 13:33:25', '2023-04-30 13:33:25', 11),
(41, 'Synonyms', 'Sangatsu no Lion', '2023-05-05 05:42:07', '2023-05-05 05:47:32', 6);

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
(11, 1),
(11, 6),
(11, 7),
(6, 3),
(6, 4);

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
  `anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder_animes`
--

INSERT INTO `folder_animes` (`id`, `slug`, `approved`, `created_at`, `updated_at`, `anime_id`, `user_id`) VALUES
(4, 'One Piece', 0, '2023-05-20 03:17:49', '2023-05-20 03:17:49', 11, 1);

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
-- Table structure for table `history_video_animes`
--

CREATE TABLE `history_video_animes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lenght_video` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(12,1) NOT NULL,
  `video_tracks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_tracks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode` double(12,1) NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('mkv','mp4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_video_animes`
--

INSERT INTO `history_video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `slug`) VALUES
(212, '00:24:00', '1920x1080', 267.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 212.0, 'Koenime', 'mkv', 0, 0, '2023-05-23 13:26:32', '2023-05-23 13:43:16', 'One Piece'),
(215, '00:23:38', '1280x720', 150.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 601.0, 'Koenime', 'mkv', 0, 1, '2023-06-10 13:02:36', '2023-06-10 13:46:13', 'One Piece'),
(219, '00:23:30', '1280x720', 150.0, NULL, NULL, 'Null', 603.0, 'Oploverz', 'mp4', 0, 1, '2023-06-10 14:14:36', '2023-06-10 14:17:18', 'One Piece'),
(237, '00:23:07', '1280x720', 126.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 622.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 07:41:09', '2023-06-13 07:50:21', 'One Piece'),
(242, '00:23:25', '1920x1080', 252.0, 'H264 (High @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 626.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 14:20:49', '2023-06-14 01:30:52', 'One Piece'),
(243, '00:23:25', '1920x1080', 260.0, NULL, NULL, 'Null', 626.0, 'Oploverz', 'mp4', 0, 1, '2023-06-14 01:21:18', '2023-06-14 01:31:59', 'One Piece'),
(263, '00:23:25', '1280x720', 78.1, 'H264 (High @L4.1)', 'ACC 2.0 [Jpn]', 'Null', 644.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:04:32', '2023-06-16 06:37:32', 'One Piece'),
(270, '00:23:39', '1280x720', 132.0, NULL, NULL, 'Null', 642.0, 'Oploverz', 'mp4', 0, 1, '2023-06-16 06:43:17', '2023-06-16 06:44:02', 'One Piece'),
(271, '00:23:25', '1920x1080', 195.0, NULL, NULL, 'Null', 644.0, 'Oploverz', 'mp4', 0, 1, '2023-06-16 06:51:14', '2023-06-16 07:14:56', 'One Piece');

--
-- Triggers `history_video_animes`
--
DELIMITER $$
CREATE TRIGGER `Retrive_Anime_Video` AFTER UPDATE ON `history_video_animes` FOR EACH ROW BEGIN
          INSERT INTO `video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `folder_anime_id`) VALUES (NEW.id, NEW.lenght_video, NEW.resolution, NEW.size, NEW.video_tracks, NEW.audio_tracks, NEW.chapters, NEW.episode, NEW.origin, NEW.type, NEW.cover, NEW.approved, NEW.created_at, NEW.updated_at, (SELECT `id` FROM `folder_animes` WHERE NEW.slug = `folder_animes`.`slug`));
          UPDATE `history_video_anime_mistakes` SET `retrive` = 1 WHERE `video_anime_id` = NEW.id;
          UPDATE `history_video_anime_subtitles` SET `retrive` = 1 WHERE `video_anime_id` = NEW.id;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history_video_anime_mistakes`
--

CREATE TABLE `history_video_anime_mistakes` (
  `video_anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mistake_id` bigint(20) UNSIGNED DEFAULT NULL,
  `retrive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_video_anime_mistakes`
--

INSERT INTO `history_video_anime_mistakes` (`video_anime_id`, `mistake_id`, `retrive`) VALUES
(212, 2, 0),
(212, 4, 0),
(215, 3, 0),
(215, 8, 0),
(215, 2, 0),
(215, 9, 0),
(215, 5, 0),
(219, 3, 0),
(219, 2, 0),
(219, 9, 0),
(219, 5, 0),
(237, 3, 0),
(237, 4, 0),
(237, 2, 0),
(237, 5, 0),
(237, 10, 0),
(242, 3, 0),
(242, 4, 0),
(242, 7, 0),
(242, 2, 0),
(242, 5, 0),
(243, 3, 0),
(243, 4, 0),
(243, 7, 0),
(243, 2, 0),
(243, 5, 0),
(263, 3, 0),
(263, 7, 0),
(263, 14, 0),
(263, 6, 0),
(270, 3, 0),
(270, 2, 0),
(270, 9, 0),
(270, 5, 0),
(271, 3, 0),
(271, 7, 0),
(271, 2, 0),
(271, 5, 0);

--
-- Triggers `history_video_anime_mistakes`
--
DELIMITER $$
CREATE TRIGGER `Retrive_Anime_Video_Mistake` AFTER UPDATE ON `history_video_anime_mistakes` FOR EACH ROW BEGIN
          INSERT INTO `video_anime_mistakes` (`video_anime_id`, `mistake_id`, `remove`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history_video_anime_subtitles`
--

CREATE TABLE `history_video_anime_subtitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `retrive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_video_anime_subtitles`
--

INSERT INTO `history_video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `retrive`) VALUES
(4, 'Oploverz', 'Null', 212, 0),
(12, 'Oploverz', 'Null', 215, 0),
(15, 'Oploverz', 'Null', 219, 0),
(33, 'Oploverz', 'Null', 237, 0),
(38, 'Oploverz', 'Null', 242, 0),
(39, 'Oploverz', 'Null', 243, 0),
(61, 'Twitter Subs', 'ASS [Ind]', 263, 0),
(62, 'Oploverz', 'Null', 270, 0),
(63, 'Oploverz', 'Null', 271, 0);

--
-- Triggers `history_video_anime_subtitles`
--
DELIMITER $$
CREATE TRIGGER `Retrive_Anime_Video_Subtitle` AFTER UPDATE ON `history_video_anime_subtitles` FOR EACH ROW BEGIN
          INSERT INTO `video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `remove`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
        END
$$
DELIMITER ;

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
(25, '2023_05_02_173544_create_folder_animes_table', 12),
(27, '2023_05_02_175840_create_mistakes_table', 13),
(33, '2023_05_02_175841_create_history_video_animes_table', 14),
(34, '2023_05_02_175842_create_video_animes_table', 15),
(35, '2023_05_02_180822_create_history_video_anime_mistakes_table', 15),
(36, '2023_05_02_180823_create_video_anime_mistakes_table', 15),
(37, '2023_05_19_163342_create_video_anime_subtitles_table', 16),
(38, '2023_05_19_164142_create_history_video_anime_subtitles_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `mistakes`
--

CREATE TABLE `mistakes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mistake` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mistakes`
--

INSERT INTO `mistakes` (`id`, `mistake`) VALUES
(2, 'Hardsub'),
(3, '!Chapter'),
(4, 'Cutted'),
(5, 'Watermark (Hardsub)'),
(6, 'Watermark (Softsub)'),
(7, 'Edited'),
(8, 'Broken audio'),
(9, 'No preview subtitle'),
(10, 'Broken subtitle'),
(11, 'No OP subtitle'),
(12, 'No ED subtitle'),
(13, 'No recap subtitle'),
(14, 'No OP tranlation subtitle'),
(15, 'No ED tranlation subtitle'),
(16, 'No OP origin subtitle'),
(17, 'No ED origin subtitle'),
(18, 'OP hardsub'),
(19, 'ED hardsub');

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
  `lenght_video` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(12,1) NOT NULL,
  `video_tracks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_tracks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode` double(12,1) NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('mkv','mp4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `folder_anime_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_animes`
--

INSERT INTO `video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `folder_anime_id`) VALUES
(1, '00:24:15', '1280x720', 86.0, NULL, NULL, 'Null', 1.0, 'Koenime', 'mp4', 0, 0, '2023-05-20 03:21:18', '2023-05-20 03:43:32', 4),
(2, '00:24:15', '1280x720', 85.4, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 2.0, 'Koenime', 'mkv', 0, 0, '2023-05-20 03:58:23', '2023-05-20 03:58:23', 4),
(3, '00:24:25', '1280x720', 85.6, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 3.0, 'Koenime', 'mkv', 0, 0, '2023-05-20 04:03:53', '2023-05-20 04:03:53', 4),
(4, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 4.0, 'Koenime', 'mkv', 0, 0, '2023-05-20 04:05:06', '2023-05-20 04:05:06', 4),
(5, '00:24:25', '1280x720', 85.7, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 5.0, 'Koenime', 'mkv', 0, 0, '2023-05-20 04:06:53', '2023-05-20 04:06:53', 4),
(6, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 6.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 05:39:59', '2023-05-21 05:39:59', 4),
(7, '00:24:14', '1280x720', 85.8, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 7.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 05:41:14', '2023-05-21 05:41:14', 4),
(8, '00:24:14', '1280x720', 85.7, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 8.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 05:43:06', '2023-05-21 05:43:06', 4),
(9, '00:24:14', '1280x720', 85.8, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 9.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 05:44:15', '2023-05-21 05:44:15', 4),
(10, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 10.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 05:45:08', '2023-05-21 05:45:08', 4),
(11, '00:24:12', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 11.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:42:06', '2023-05-21 06:42:06', 4),
(12, '00:24:13', '1280x720', 85.7, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 12.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:43:43', '2023-05-21 06:43:43', 4),
(13, '00:24:16', '1280x720', 85.7, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 13.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:46:16', '2023-05-21 06:46:16', 4),
(14, '00:24:13', '1280x720', 85.7, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 14.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:47:17', '2023-05-21 06:47:17', 4),
(15, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 15.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:48:14', '2023-05-21 06:48:14', 4),
(16, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 16.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:49:06', '2023-05-21 06:49:06', 4),
(17, '00:24:15', '1280x720', 85.6, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 17.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:50:02', '2023-05-21 06:50:02', 4),
(18, '00:25:00', '1280x720', 107.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'Null', 18.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 06:51:08', '2023-05-21 06:51:08', 4),
(19, '00:24:15', '1280x720', 135.0, NULL, NULL, 'Null', 19.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:52:10', '2023-05-21 06:52:10', 4),
(20, '00:24:15', '1280x720', 190.0, NULL, NULL, 'Null', 20.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:53:06', '2023-05-21 06:53:06', 4),
(21, '00:24:15', '1280x720', 174.0, NULL, NULL, 'Null', 21.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:53:56', '2023-05-21 06:53:56', 4),
(22, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 22.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:56:19', '2023-05-21 06:56:19', 4),
(23, '00:24:15', '1280x720', 85.7, NULL, NULL, 'Null', 23.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:57:12', '2023-05-21 06:57:12', 4),
(24, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 24.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:58:30', '2023-05-21 06:58:30', 4),
(25, '00:24:15', '1280x720', 87.3, NULL, NULL, 'Null', 25.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 06:59:51', '2023-05-21 06:59:51', 4),
(26, '00:24:15', '1280x720', 84.6, NULL, NULL, 'Null', 26.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:00:55', '2023-05-21 07:00:55', 4),
(27, '00:24:14', '1280x720', 87.2, NULL, NULL, 'Null', 27.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:01:53', '2023-05-21 07:01:53', 4),
(28, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 28.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:02:49', '2023-05-21 07:02:49', 4),
(29, '00:24:15', '1280x720', 87.3, NULL, NULL, 'Null', 29.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:03:35', '2023-05-21 07:03:35', 4),
(30, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 30.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:04:28', '2023-05-21 07:04:28', 4),
(31, '00:24:14', '1280x720', 118.0, NULL, NULL, 'Null', 31.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:06:01', '2023-05-21 07:06:01', 4),
(32, '00:24:12', '1280x720', 86.9, NULL, NULL, 'Null', 32.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:06:50', '2023-05-21 07:06:50', 4),
(33, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 33.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:08:04', '2023-05-21 07:08:04', 4),
(34, '00:24:54', '1280x720', 89.5, NULL, NULL, 'Null', 34.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:08:51', '2023-05-21 07:08:51', 4),
(35, '00:24:15', '1280x720', 87.1, NULL, NULL, 'Null', 35.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:10:35', '2023-05-21 07:10:35', 4),
(36, '00:25:35', '1280x720', 91.8, NULL, NULL, 'Null', 36.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:11:22', '2023-05-21 07:11:22', 4),
(37, '00:24:15', '1280x720', 87.1, NULL, NULL, 'Null', 37.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:12:16', '2023-05-21 07:12:16', 4),
(38, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 38.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:13:11', '2023-05-21 07:13:11', 4),
(39, '00:24:15', '1280x720', 87.2, NULL, NULL, 'Null', 39.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:14:03', '2023-05-21 07:14:03', 4),
(40, '00:24:54', '1280x720', 86.8, NULL, NULL, 'Null', 40.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:15:22', '2023-05-21 07:15:22', 4),
(41, '00:24:15', '1280x720', 87.1, NULL, NULL, 'Null', 41.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:16:52', '2023-05-21 07:16:52', 4),
(42, '00:24:14', '1280x720', 87.1, NULL, NULL, 'Null', 42.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:17:47', '2023-05-21 07:17:47', 4),
(43, '00:24:15', '1280x720', 87.1, NULL, NULL, 'Null', 43.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:18:34', '2023-05-21 07:18:34', 4),
(44, '00:24:15', '128x720', 87.1, NULL, NULL, 'Null', 44.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:19:49', '2023-05-21 07:19:49', 4),
(45, '00:24:14', '1280x720', 87.1, NULL, NULL, 'Null', 45.0, 'Koenime', 'mp4', 0, 0, '2023-05-21 07:20:40', '2023-05-21 07:20:40', 4),
(46, '00:25:00', '1920x1080', 228.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 46.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:23:05', '2023-05-21 07:23:05', 4),
(47, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 47.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:24:36', '2023-05-21 07:24:36', 4),
(48, '00:24:14', '1280x720', 85.3, 'H264 (High @L3.1)', 'ACC 1.0 [Und]', 'Null', 48.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:25:33', '2023-05-21 07:25:33', 4),
(49, '00:22:53', '1280x720', 85.5, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 49.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:26:23', '2023-05-21 07:26:23', 4),
(50, '00:25:00', '1280x720', 119.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 50.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:28:04', '2023-05-21 07:28:04', 4),
(51, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 51.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:29:17', '2023-05-21 07:29:17', 4),
(52, '00:24:14', '1280x720', 65.5, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 52.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:30:29', '2023-05-21 07:30:29', 4),
(53, '00:24:14', '1280x720', 85.5, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 53.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:31:19', '2023-05-21 07:31:19', 4),
(54, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 54.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:33:37', '2023-05-21 07:33:37', 4),
(55, '00:25:00', '1280x720', 121.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 55.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 07:35:12', '2023-05-21 07:35:12', 4),
(56, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 56.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 13:44:48', '2023-05-21 13:44:48', 4),
(57, '00:25:00', '1280x720', 121.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 57.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 13:45:36', '2023-05-21 13:45:36', 4),
(58, '00:25:00', '1280x720', 123.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 58.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 13:47:47', '2023-05-21 13:47:47', 4),
(59, '00:25:00', '1280x720', 122.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 59.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 13:53:21', '2023-05-21 13:53:21', 4),
(60, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 60.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 13:55:12', '2023-05-21 13:55:12', 4),
(61, '00:25:00', '1280x720', 124.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 61.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:42:56', '2023-05-21 14:42:56', 4),
(62, '00:25:01', '1280x720', 122.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 62.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:44:57', '2023-05-21 14:44:57', 4),
(63, '00:25:00', '1280x720', 121.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'True', 63.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:47:11', '2023-05-21 14:47:11', 4),
(64, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 64.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:48:43', '2023-05-21 14:48:43', 4),
(65, '00:25:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 65.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:50:10', '2023-05-21 14:50:10', 4),
(66, '00:24:00', '1280x720', 119.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 66.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:51:37', '2023-05-21 14:51:37', 4),
(67, '00:24:00', '1280x720', 122.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 67.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:52:39', '2023-05-21 14:52:39', 4),
(68, '00:24:00', '1280x720', 118.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 68.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:54:04', '2023-05-21 14:54:04', 4),
(69, '00:24:00', '1280x720', 121.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 69.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:55:07', '2023-05-21 14:55:07', 4),
(70, '00:24:00', '1280x720', 120.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 70.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:56:08', '2023-05-21 14:56:08', 4),
(71, '00:24:00', '1280x720', 123.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 71.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:58:25', '2023-05-21 14:58:25', 4),
(72, '00:24:00', '1280x720', 123.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 72.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 14:59:34', '2023-05-21 14:59:34', 4),
(73, '00:24:00', '1280x720', 119.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 73.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:00:47', '2023-05-21 15:00:47', 4),
(74, '00:24:00', '1280x720', 127.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 74.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:02:07', '2023-05-21 15:02:07', 4),
(75, '00:24:00', '1280x720', 124.0, 'H264 (High @L4.0)', 'ACC 1.0 [Und]', 'False', 75.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:06:26', '2023-05-21 15:06:26', 4),
(76, '00:24:00', '1920x1080', 230.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 76.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:16:29', '2023-05-21 15:16:29', 4),
(77, '00:24:00', '1920x1080', 220.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 77.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:17:18', '2023-05-21 15:17:18', 4),
(78, '00:24:00', '1920x1080', 219.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 78.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:27:07', '2023-05-21 15:27:07', 4),
(79, '00:24:00', '1920x1080', 226.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 79.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:28:19', '2023-05-21 15:28:19', 4),
(80, '00:24:00', '1920x1080', 214.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 80.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:29:22', '2023-05-21 15:29:22', 4),
(81, '00:24:00', '1920x1080', 216.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 81.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:30:34', '2023-05-21 15:30:34', 4),
(82, '00:24:00', '1920x1080', 215.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 82.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:33:06', '2023-05-21 15:33:06', 4),
(83, '00:24:00', '1920x1080', 223.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 83.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:34:17', '2023-05-21 15:34:17', 4),
(84, '00:24:00', '1920x1080', 209.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 84.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:35:37', '2023-05-21 15:35:37', 4),
(85, '00:24:00', '1920x1080', 215.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 85.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:36:40', '2023-05-21 15:36:40', 4),
(86, '00:24:00', '1920x1080', 217.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 86.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:37:47', '2023-05-21 15:37:47', 4),
(87, '00:24:00', '1920x1080', 213.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 87.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:38:34', '2023-05-21 15:38:34', 4),
(88, '00:24:00', '1920x1080', 221.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 88.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:40:00', '2023-05-21 15:40:00', 4),
(89, '00:24:00', '1920x1080', 217.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 89.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:41:01', '2023-05-21 15:41:01', 4),
(90, '00:24:00', '1920x1080', 212.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 90.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:42:03', '2023-05-21 15:42:03', 4),
(91, '00:24:00', '1920x1080', 216.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 91.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:43:08', '2023-05-21 15:43:08', 4),
(92, '00:24:00', '1920x1080', 214.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 92.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:45:28', '2023-05-21 15:45:28', 4),
(93, '00:24:00', '1920x1080', 228.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 93.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:46:38', '2023-05-21 15:46:38', 4),
(94, '00:24:00', '1920x1080', 211.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 94.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:49:24', '2023-05-21 15:49:24', 4),
(95, '00:24:00', '1920x1080', 232.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 95.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:51:30', '2023-05-21 15:51:30', 4),
(96, '00:24:00', '1920x1080', 214.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 96.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:52:45', '2023-05-21 15:52:45', 4),
(97, '00:24:00', '1920x1080', 227.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 97.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:53:44', '2023-05-21 15:53:44', 4),
(98, '00:24:00', '1920x1080', 228.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 98.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:54:45', '2023-05-21 15:54:45', 4),
(99, '00:24:00', '1920x1080', 220.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 99.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:56:07', '2023-05-21 15:56:07', 4),
(100, '00:24:00', '1920x1080', 222.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 100.0, 'Koenime', 'mkv', 0, 0, '2023-05-21 15:56:50', '2023-05-21 15:56:50', 4),
(101, '00:24:00', '1920x1080', 207.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 101.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:25:07', '2023-05-22 12:25:07', 4),
(102, '00:24:00', '1920x1080', 230.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 102.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:28:12', '2023-05-22 12:28:12', 4),
(103, '00:24:00', '1920x1080', 219.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 103.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:29:04', '2023-05-22 12:29:04', 4),
(104, '00:24:00', '1920x1080', 228.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 104.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:30:05', '2023-05-22 12:30:05', 4),
(105, '00:24:00', '1920x1080', 229.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 105.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:30:50', '2023-05-22 12:30:50', 4),
(106, '00:24:00', '1920x1080', 216.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 106.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:31:43', '2023-05-22 12:31:43', 4),
(107, '00:24:00', '1920x1080', 229.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 107.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:32:48', '2023-05-22 12:32:48', 4),
(108, '00:24:00', '1920x1080', 223.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 108.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:33:31', '2023-05-22 12:33:31', 4),
(109, '00:24:00', '1920x1080', 227.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 109.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:35:30', '2023-05-22 12:35:30', 4),
(110, '00:24:00', '1920x1080', 237.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 110.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:37:22', '2023-05-22 12:37:22', 4),
(111, '00:24:00', '1920x1080', 238.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 111.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:38:05', '2023-05-22 12:38:05', 4),
(112, '00:24:00', '1920x1080', 231.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 112.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:38:56', '2023-05-22 12:38:56', 4),
(113, '00:24:00', '1920x1080', 227.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 113.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:39:41', '2023-05-22 12:39:41', 4),
(114, '00:24:00', '1920x1080', 225.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 114.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:40:27', '2023-05-22 12:40:27', 4),
(115, '00:24:00', '1920x1080', 218.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 115.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:41:14', '2023-05-22 12:41:14', 4),
(116, '00:24:00', '1920x1080', 237.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 116.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:41:59', '2023-05-22 12:41:59', 4),
(117, '00:24:00', '1920x1080', 213.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 117.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:44:10', '2023-05-22 12:44:10', 4),
(118, '00:24:00', '1920x1080', 234.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 118.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:45:02', '2023-05-22 12:45:02', 4),
(119, '00:24:00', '1920x1080', 226.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 119.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:45:48', '2023-05-22 12:45:48', 4),
(120, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 120.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:46:32', '2023-05-22 12:46:32', 4),
(121, '00:24:00', '1920x1080', 245.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 121.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:47:16', '2023-05-22 12:47:16', 4),
(122, '00:24:00', '1920x1080', 267.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 122.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:48:25', '2023-05-22 12:48:25', 4),
(123, '00:24:00', '1920x1080', 234.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 123.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:49:05', '2023-05-22 12:49:05', 4),
(124, '00:24:00', '1920x1080', 240.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 124.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:49:44', '2023-05-22 12:49:44', 4),
(125, '00:24:00', '1920x1080', 229.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 125.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:50:23', '2023-05-22 12:50:23', 4),
(126, '00:24:00', '1920x1080', 268.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 126.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:51:08', '2023-05-22 12:51:08', 4),
(127, '00:24:00', '1920x1080', 273.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 127.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:51:48', '2023-05-22 12:51:48', 4),
(128, '00:24:00', '1920x1080', 226.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 128.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:53:53', '2023-05-22 12:53:53', 4),
(129, '00:24:00', '1920x1080', 230.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 129.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:54:31', '2023-05-22 12:54:31', 4),
(130, '00:24:00', '1920x1080', 230.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 130.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:55:12', '2023-05-22 12:55:12', 4),
(131, '00:24:00', '1920x1080', 225.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 131.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:55:53', '2023-05-22 12:55:53', 4),
(132, '00:24:00', '1920x1080', 232.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 132.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:56:39', '2023-05-22 12:56:39', 4),
(133, '00:24:00', '1920x1080', 222.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 133.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:57:17', '2023-05-22 12:57:17', 4),
(134, '00:24:00', '1920x1080', 229.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 134.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:57:58', '2023-05-22 12:57:58', 4),
(135, '00:24:00', '1920x1080', 222.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 135.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 12:58:35', '2023-05-22 12:58:35', 4),
(136, '00:24:00', '1920x1080', 223.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 136.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:00:40', '2023-05-22 13:00:40', 4),
(137, '00:24:00', '1920x1080', 237.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 137.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:01:39', '2023-05-22 13:01:39', 4),
(138, '00:24:00', '1920x1080', 233.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 138.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:02:17', '2023-05-22 13:02:17', 4),
(139, '00:24:00', '1920x1080', 215.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 139.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:03:19', '2023-05-22 13:03:19', 4),
(140, '00:24:00', '1920x1080', 222.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 140.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:04:01', '2023-05-22 13:04:01', 4),
(141, '00:24:00', '1920x1080', 225.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 141.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:04:45', '2023-05-22 13:04:45', 4),
(142, '00:24:00', '1920x1080', 223.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 142.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:05:44', '2023-05-22 13:05:44', 4),
(143, '00:24:00', '1920x1080', 218.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 143.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:06:21', '2023-05-22 13:06:21', 4),
(144, '00:24:00', '1920x1080', 223.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 144.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:07:40', '2023-05-22 13:07:40', 4),
(145, '00:24:00', '1920x1080', 245.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 145.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:08:23', '2023-05-22 13:08:23', 4),
(146, '00:24:00', '1920x1080', 256.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 146.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:09:00', '2023-05-22 13:09:00', 4),
(147, '00:24:00', '1920x1080', 261.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 147.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:09:35', '2023-05-22 13:09:35', 4),
(148, '00:24:00', '1920x1080', 258.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 148.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:10:22', '2023-05-22 13:10:22', 4),
(149, '00:24:00', '1920x1080', 248.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 149.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:11:14', '2023-05-22 13:11:14', 4),
(150, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 150.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:11:49', '2023-05-22 13:11:49', 4),
(151, '00:24:00', '1920x1080', 256.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 151.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:21:49', '2023-05-22 13:21:49', 4),
(152, '00:24:00', '1920x1080', 261.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'False', 152.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:24:38', '2023-05-22 13:24:38', 4),
(153, '00:24:00', '1920x1080', 255.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 153.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:30:57', '2023-05-22 13:30:57', 4),
(154, '00:24:00', '1920x1080', 250.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 154.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:31:30', '2023-05-22 13:31:30', 4),
(155, '00:24:00', '1920x1080', 271.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 155.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:32:07', '2023-05-22 13:32:07', 4),
(156, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 156.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:33:05', '2023-05-22 13:33:05', 4),
(157, '00:24:00', '1920x1080', 247.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 157.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:33:54', '2023-05-22 13:33:54', 4),
(158, '00:24:00', '1920x1080', 260.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 158.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:34:30', '2023-05-22 13:34:30', 4),
(159, '00:24:00', '1920x1080', 246.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 159.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:35:03', '2023-05-22 13:35:03', 4),
(160, '00:24:00', '1920x1080', 240.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 160.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:35:40', '2023-05-22 13:35:40', 4),
(161, '00:24:00', '1920x1080', 259.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 161.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:36:20', '2023-05-22 13:36:20', 4),
(162, '00:24:00', '1920x1080', 265.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 162.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:36:57', '2023-05-22 13:36:57', 4),
(163, '00:24:00', '1920x1080', 263.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 163.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:37:28', '2023-05-22 13:37:28', 4),
(164, '00:24:00', '1920x1080', 241.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 164.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:38:20', '2023-05-22 13:38:20', 4),
(165, '00:24:00', '1920x1080', 268.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 165.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:38:53', '2023-05-22 13:38:53', 4),
(166, '00:24:00', '1920x1080', 241.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 166.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:39:31', '2023-05-22 13:39:31', 4),
(167, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 167.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:40:12', '2023-05-22 13:40:12', 4),
(168, '00:24:00', '1920x1080', 251.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 168.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:40:52', '2023-05-22 13:40:52', 4),
(169, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 169.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:46:31', '2023-05-22 13:46:31', 4),
(170, '00:24:00', '1920x1080', 249.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 170.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:47:06', '2023-05-22 13:47:06', 4),
(171, '00:24:00', '1920x1080', 259.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 171.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:47:47', '2023-05-22 13:47:47', 4),
(172, '00:24:00', '1920x1080', 249.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 172.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:48:23', '2023-05-22 13:48:23', 4),
(173, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 173.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:56:01', '2023-05-22 13:56:01', 4),
(174, '00:24:00', '1920x1080', 267.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 174.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:56:40', '2023-05-22 13:56:40', 4),
(175, '00:24:00', '1920x1080', 249.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 175.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:57:18', '2023-05-22 13:57:18', 4),
(176, '00:24:00', '1920x1080', 277.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 176.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:57:52', '2023-05-22 13:57:52', 4),
(177, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 177.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:58:26', '2023-05-22 13:58:26', 4),
(178, '00:24:00', '1920x1080', 247.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 178.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:59:05', '2023-05-22 13:59:05', 4),
(179, '00:24:00', '1920x1080', 291.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 179.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 13:59:44', '2023-05-22 13:59:44', 4),
(180, '00:24:00', '1920x1080', 250.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 180.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:00:17', '2023-05-22 14:00:17', 4),
(181, '00:24:00', '1920x1080', 256.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 181.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:00:57', '2023-05-22 14:00:57', 4),
(182, '00:24:00', '1920x1080', 243.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 182.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:01:32', '2023-05-22 14:01:32', 4),
(183, '00:24:00', '1920x1080', 262.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 183.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:02:06', '2023-05-22 14:02:06', 4),
(184, '00:24:00', '1920x1080', 261.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 184.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:02:42', '2023-05-22 14:02:42', 4),
(185, '00:24:00', '1920x1080', 243.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 185.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:03:22', '2023-05-22 14:03:22', 4),
(186, '00:24:00', '1920x1080', 239.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 186.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:04:03', '2023-05-22 14:04:03', 4),
(187, '00:24:00', '1920x1080', 260.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 187.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:06:57', '2023-05-22 14:06:57', 4),
(188, '00:24:00', '1920x1080', 237.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 188.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:07:49', '2023-05-22 14:07:49', 4),
(189, '00:24:00', '1920x1080', 248.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 189.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:08:29', '2023-05-22 14:08:29', 4),
(190, '00:24:00', '1920x1080', 237.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 190.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:09:06', '2023-05-22 14:09:06', 4),
(191, '00:24:00', '1920x1080', 255.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 191.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:09:41', '2023-05-22 14:09:41', 4),
(192, '00:24:00', '1920x1080', 276.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 192.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:10:17', '2023-05-22 14:10:17', 4),
(193, '00:24:00', '1920x1080', 239.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 193.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:10:57', '2023-05-22 14:10:57', 4),
(194, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 194.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:11:41', '2023-05-22 14:11:41', 4),
(195, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 195.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:12:19', '2023-05-22 14:12:19', 4),
(196, '00:24:00', '1920x1080', 240.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 196.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:13:01', '2023-05-22 14:13:01', 4),
(197, '00:24:00', '1920x1080', 240.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 197.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:16:53', '2023-05-22 14:16:53', 4),
(198, '00:24:00', '1920x1080', 233.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 198.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:17:38', '2023-05-22 14:17:38', 4),
(199, '00:24:00', '1920x1080', 239.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 199.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:18:14', '2023-05-22 14:18:14', 4),
(200, '00:24:00', '1920x1080', 242.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 200.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:18:51', '2023-05-22 14:18:51', 4),
(201, '00:24:00', '1920x1080', 244.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 201.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:19:31', '2023-05-22 14:19:31', 4),
(202, '00:24:00', '1920x1080', 261.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 202.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:20:09', '2023-05-22 14:20:09', 4),
(203, '00:24:00', '1920x1080', 253.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 203.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:20:43', '2023-05-22 14:20:43', 4),
(204, '00:24:00', '1920x1080', 243.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 204.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:21:15', '2023-05-22 14:21:15', 4),
(205, '00:24:00', '1920x1080', 234.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 205.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:21:54', '2023-05-22 14:21:54', 4),
(206, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'True', 206.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:22:31', '2023-05-22 14:22:31', 4),
(207, '00:24:00', '1920x1080', 273.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 207.0, 'Koenime', 'mkv', 0, 0, '2023-05-22 14:23:06', '2023-05-23 14:12:04', 4),
(208, '00:24:00', '1920x1080', 239.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 208.0, 'Koenime', 'mkv', 0, 0, '2023-05-23 13:18:56', '2023-05-23 14:11:49', 4),
(209, '00:24:00', '1920x1080', 264.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 209.0, 'Koenime', 'mkv', 0, 0, '2023-05-23 13:20:00', '2023-05-23 14:11:32', 4),
(210, '00:24:00', '1920x1080', 288.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 210.0, 'Koenime', 'mkv', 0, 0, '2023-05-23 13:20:40', '2023-05-23 14:12:16', 4),
(211, '00:24:00', '1920x1080', 280.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 211.0, 'Koenime', 'mkv', 0, 0, '2023-05-23 13:21:20', '2023-05-23 14:12:34', 4),
(213, '00:24:00', '1920x1080', 267.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 212.0, 'Oploverz', 'mkv', 0, 0, '2023-05-23 13:36:24', '2023-05-23 14:12:59', 4),
(214, '00:24:00', '1920x1080', 252.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'False', 213.0, 'Oploverz', 'mkv', 0, 0, '2023-05-23 13:45:11', '2023-05-23 14:04:03', 4),
(216, '00:23:38', '1280x720', 150.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 601.0, 'Oploverz', 'mkv', 0, 1, '2023-06-10 13:28:40', '2023-06-10 13:45:54', 4),
(217, '00:23:49', '1280x720', 150.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 602.0, 'Koenime', 'mkv', 0, 1, '2023-06-10 13:44:32', '2023-06-10 14:06:50', 4),
(218, '00:23:30', '1280x720', 127.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 603.0, 'Koenime', 'mkv', 0, 1, '2023-06-10 14:08:25', '2023-06-10 14:10:41', 4),
(220, '00:23:33', '1280x720', 150.0, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 605.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 03:58:22', '2023-06-11 04:18:24', 4),
(221, '00:23:34', '1276x720', 150.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 606.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 05:22:04', '2023-06-11 05:22:36', 4),
(222, '00:23:50', '1280x720', 127.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 607.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 05:42:34', '2023-06-11 05:43:04', 4),
(223, '00:23:34', '1280x720', 150.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 608.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 05:44:11', '2023-06-11 06:03:40', 4),
(224, '00:23:38', '1280x720', 150.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 609.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 11:43:14', '2023-06-11 12:09:20', 4),
(225, '00:23:39', '1280x720', 152.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 610.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 12:08:51', '2023-06-11 12:28:36', 4),
(226, '00:23:48', '1280x720', 153.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 611.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 15:30:51', '2023-06-11 15:53:51', 4),
(227, '00:23:39', '1280x720', 152.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 612.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 23:59:48', '2023-06-12 00:31:22', 4),
(228, '00:23:38', '1280x720', 152.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 613.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 00:00:51', '2023-06-12 00:50:03', 4),
(229, '00:23:39', '1280x720', 152.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 614.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 00:02:02', '2023-06-12 06:57:20', 4),
(230, '00:23:39', '1280x720', 152.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 615.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 00:03:11', '2023-06-12 07:19:08', 4),
(231, '00:23:38', '1280x720', 125.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 616.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 00:04:55', '2023-06-12 14:38:21', 4),
(232, '00:23:39', '1280x720', 128.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 617.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 14:45:36', '2023-06-12 15:08:32', 4),
(233, '00:23:38', '1280x720', 128.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 618.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 15:09:27', '2023-06-12 15:30:57', 4),
(234, '00:23:38', '1280x720', 125.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 619.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 15:32:05', '2023-06-13 01:14:16', 4),
(235, '00:23:39', '1280x720', 126.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 620.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 01:15:26', '2023-06-13 01:39:02', 4),
(236, '00:23:39', '1280x720', 125.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 621.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 01:40:17', '2023-06-13 06:28:32', 4),
(238, '00:23:39', '1280x720', 125.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 623.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 07:42:02', '2023-06-13 09:06:43', 4),
(239, '00:23:39', '1280x720', 126.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 624.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 07:42:51', '2023-06-13 09:30:40', 4),
(240, '00:23:39', '1280x720', 126.0, 'H264 (High @L3.1)', 'ACC S16 2.0 [Und]', 'Null', 625.0, 'Koenime', 'mkv', 0, 1, '2023-06-13 07:43:53', '2023-06-13 14:16:10', 4),
(241, '00:23:39', '848x480', 90.5, NULL, NULL, 'Null', 622.0, 'Oploverz', 'mp4', 0, 1, '2023-06-13 08:11:47', '2023-06-13 08:35:25', 4),
(244, '00:23:39', '848x480', 77.0, NULL, NULL, 'Null', 626.0, 'Adikanime', 'mp4', 0, 1, '2023-06-14 01:36:10', '2023-06-14 02:11:33', 4),
(245, '00:23:24', '1280x720', 100.0, 'H264 (High @L4.0)', 'ACC 2.0 [Und]', 'Null', 627.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:45:19', '2023-06-14 02:19:01', 4),
(246, '00:23:23', '848x480', 69.0, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 628.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:46:35', '2023-06-14 02:28:54', 4),
(247, '00:23:39', '848x480', 71.2, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 629.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:47:37', '2023-06-14 06:39:39', 4),
(248, '00:23:38', '848x480', 81.3, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 630.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:48:41', '2023-06-14 13:52:03', 4),
(249, '00:23:39', '848x480', 82.2, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 631.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:49:27', '2023-06-14 14:11:40', 4),
(250, '00:23:39', '848x480', 79.1, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 632.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:50:28', '2023-06-15 05:40:29', 4),
(251, '00:23:39', '848x480', 77.0, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 633.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:51:26', '2023-06-15 05:41:08', 4),
(252, '00:23:39', '848x480', 81.4, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 634.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:52:13', '2023-06-15 06:14:57', 4),
(253, '00:23:39', '848x480', 79.1, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 635.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 01:53:32', '2023-06-15 06:35:37', 4),
(254, '00:23:49', '1276x720', 150.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 604.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 03:56:29', '2023-06-11 03:57:23', 4),
(255, '00:23:23', '848x480', 93.1, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 636.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 04:26:07', '2023-06-15 15:08:00', 4),
(256, '00:23:39', '848x480', 91.1, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 637.0, 'Adikanime', 'mkv', 0, 1, '2023-06-14 04:27:20', '2023-06-15 15:43:00', 4),
(257, '00:23:39', '1280x720', 115.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 638.0, 'Adikanime', 'mkv', 0, 1, '2023-06-15 23:56:46', '2023-06-16 00:36:58', 4),
(258, '00:23:25', '1280x720', 95.4, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 639.0, 'Adikanime', 'mkv', 0, 1, '2023-06-15 23:58:30', '2023-06-16 01:01:14', 4),
(259, '00:23:39', '848x480', 75.8, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 640.0, 'Adikanime', 'mkv', 0, 1, '2023-06-15 23:59:29', '2023-06-16 06:37:55', 4),
(260, '00:23:38', '1280x720', 119.0, 'H264 (High @L4.0)', 'ACC 2.0 [Und]', 'Null', 641.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:00:50', '2023-06-16 01:46:45', 4),
(261, '00:23:38', '848x480', 76.7, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 642.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:02:10', '2023-06-16 02:04:54', 4),
(262, '00:23:39', '1280x720', 135.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 643.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:03:14', '2023-06-16 06:30:03', 4),
(264, '00:23:39', '848x480', 99.6, 'H264 (High @L3.2)', 'ACC 1.0 [Und]', 'Null', 645.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:05:27', '2023-06-16 08:02:20', 4),
(265, '00:23:39', '848x480', 76.8, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 646.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:07:12', '2023-06-16 13:34:02', 4),
(266, '00:23:38', '848x480', 83.2, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 647.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:08:01', '2023-06-16 13:33:49', 4),
(267, '00:23:38', '848x480', 81.8, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 648.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:09:40', '2023-06-16 13:53:23', 4),
(268, '00:23:39', '1280x720', 151.0, 'H264 (High @L4.0)', 'ACC 2.0 [Und]', 'Null', 649.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:10:31', '2023-06-16 14:12:28', 4),
(269, '00:23:39', '848x480', 74.8, 'H264 (High @L3.1)', 'ACC 2.0 [Und]', 'Null', 650.0, 'Adikanime', 'mkv', 0, 1, '2023-06-16 00:11:29', '2023-06-16 14:13:31', 4),
(272, '00:23:39', '1280x720', 139.0, NULL, NULL, 'Null', 644.0, 'Oploverz', 'mp4', 0, 1, '2023-06-16 07:23:18', '2023-06-16 08:01:17', 4),
(273, '00:23:38', '1280x720', 149.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 651.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:02:11', '2023-06-17 02:30:11', 4),
(274, '00:23:39', '1280x720', 181.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 652.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:03:04', '2023-06-17 02:32:51', 4),
(275, '00:23:59', '1280x720', 163.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 653.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:04:38', '2023-06-17 02:34:31', 4),
(276, '00:23:24', '1280x720', 166.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 654.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:05:31', '2023-06-17 02:54:52', 4),
(277, '00:23:59', '1280x720', 157.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 655.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:06:16', '2023-06-17 03:12:40', 4),
(278, '00:23:39', '1280x720', 175.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 656.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:07:06', '2023-06-17 03:29:46', 4),
(279, '00:23:39', '1280x720', 163.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 657.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:07:54', '2023-06-17 03:45:02', 4),
(280, '00:23:39', '1280x720', 138.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 658.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:08:40', '2023-06-17 04:03:46', 4),
(281, '00:23:24', '1280x720', 136.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 659.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:11:24', '2023-06-17 07:27:52', 4),
(282, '00:23:58', '1280x720', 145.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 660.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:12:17', '2023-06-17 15:04:53', 4),
(283, '00:23:39', '1280x720', 146.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 661.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:13:09', '2023-06-17 15:26:34', 4),
(284, '00:23:39', '1280x720', 168.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 662.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:13:52', '2023-06-17 15:43:24', 4),
(285, '00:23:39', '1280x720', 143.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 663.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:14:37', '2023-06-17 16:02:45', 4),
(286, '00:23:39', '1280x720', 171.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 664.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:15:24', '2023-06-18 05:36:56', 4),
(287, '00:23:39', '1280x720', 177.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 665.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:16:16', '2023-06-18 05:55:50', 4),
(288, '00:23:25', '1280x720', 165.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 666.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:17:12', '2023-06-18 07:02:27', 4),
(289, '00:23:59', '1280x720', 154.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 667.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:17:56', '2023-06-18 06:44:11', 4),
(290, '00:23:25', '1280x720', 167.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 668.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:18:39', '2023-06-18 07:01:48', 4),
(291, '00:23:39', '1280x720', 153.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 669.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:19:36', '2023-06-18 07:19:39', 4),
(292, '00:23:25', '1280x720', 166.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 670.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:20:26', '2023-06-18 07:42:47', 4),
(293, '00:23:39', '1280x720', 161.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 671.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:21:07', '2023-06-18 13:38:14', 4),
(294, '00:23:39', '1280x720', 150.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 672.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:22:00', '2023-06-18 13:54:49', 4),
(295, '00:23:39', '1280x720', 166.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 673.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:22:42', '2023-06-19 03:24:02', 4),
(296, '00:23:55', '1280x720', 139.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 674.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:23:29', '2023-06-19 03:43:02', 4),
(297, '00:23:55', '1280x720', 135.0, 'H264 (High 10 @L4.0)', 'ACC S16 2.0 [Und]', 'Null', 675.0, 'Koenime', 'mkv', 0, 1, '2023-06-17 02:24:19', '2023-06-19 04:09:09', 4),
(298, '00:23:39', '1920x1080', 230.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 676.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:46:46', '2023-06-19 08:34:53', 4),
(299, '00:23:39', '1920x1080', 292.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 677.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:47:33', '2023-06-19 08:52:52', 4),
(300, '00:23:39', '1920x1080', 266.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 678.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:48:14', '2023-06-19 12:29:40', 4),
(301, '00:23:39', '1920x1080', 255.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 679.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:49:24', '2023-06-19 12:49:01', 4),
(302, '00:23:55', '1920x1080', 311.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 680.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:50:21', '2023-06-20 00:11:16', 4),
(303, '00:23:39', '1920x1080', 282.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 681.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:51:27', '2023-06-20 00:32:18', 4),
(304, '00:23:39', '1920x1080', 252.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 682.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:52:18', '2023-06-20 04:23:32', 4),
(305, '00:24:49', '1920x1080', 309.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 683.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:53:27', '2023-06-20 14:28:41', 4),
(306, '00:23:39', '1920x1080', 291.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 684.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:54:19', '2023-06-20 14:49:35', 4),
(307, '00:23:55', '1920x1080', 322.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 685.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:55:13', '2023-06-20 15:09:43', 4),
(308, '00:23:55', '1920x1080', 278.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 686.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:56:18', '2023-06-20 23:57:38', 4),
(309, '00:23:55', '1920x1080', 310.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 687.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:57:15', '2023-06-21 00:19:36', 4),
(310, '00:23:55', '1920x1080', 289.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 688.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:58:02', '2023-06-21 06:35:26', 4),
(311, '00:23:55', '1920x1080', 257.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 689.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:58:51', '2023-06-21 06:57:02', 4),
(312, '00:23:55', '1920x1080', 291.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 690.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 07:59:34', '2023-06-21 11:56:19', 4),
(313, '00:23:55', '1920x1080', 288.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 691.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:00:23', '2023-06-21 23:56:15', 4),
(314, '00:23:55', '1920x1080', 262.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 692.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:01:26', '2023-06-22 00:28:25', 4),
(315, '00:23:55', '1920x1080', 267.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 693.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:02:05', '2023-06-22 06:52:16', 4),
(316, '00:23:39', '1920x1080', 262.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 694.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:02:46', '2023-06-23 00:45:52', 4),
(317, '00:23:55', '1920x1080', 297.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 695.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:03:34', '2023-06-23 01:04:10', 4),
(318, '00:23:55', '1920x1080', 279.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 696.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:04:17', '2023-06-23 14:43:41', 4);
INSERT INTO `video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `folder_anime_id`) VALUES
(319, '00:23:39', '1920x1080', 274.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 697.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:05:06', '2023-06-23 15:04:46', 4),
(320, '00:23:39', '1920x1080', 283.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 698.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:05:51', '2023-06-23 15:23:37', 4),
(321, '00:23:55', '1920x1080', 287.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 699.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 08:06:36', '2023-06-24 01:59:53', 4),
(326, '00:23:39', '1920x1080', 267.0, 'H264 (High 10 @L5.0)', 'ACC S16 2.0 [Und]', 'Null', 700.0, 'Koenime', 'mkv', 0, 1, '2023-06-19 14:18:27', '2023-06-24 02:15:13', 4),
(327, '00:23:39', '1920x1080', 155.0, 'H264 (High @L5.0)', 'ACC 2.0 [Und]', 'Null', 701.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:43:53', '2023-06-24 11:11:49', 4),
(328, '00:23:39', '1920x1080', 159.0, 'H264 (High @L5.0)', 'ACC 2.0 [Und]', 'Null', 702.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:45:14', '2023-06-24 11:32:51', 4),
(329, '00:23:39', '1920x1080', 156.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 703.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:46:05', '2023-06-24 11:55:22', 4),
(330, '00:23:39', '1920x1080', 166.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 704.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:47:03', '2023-06-24 13:30:43', 4),
(331, '00:23:55', '1920x1080', 165.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 705.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:47:42', '2023-06-24 13:49:45', 4),
(332, '00:23:39', '1920x1080', 150.0, 'H264 (High @L5.0)', 'ACC 2.0 [Und]', 'Null', 706.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:48:27', '2023-06-24 14:09:03', 4),
(333, '00:24:00', '1920x1080', 171.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 707.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:49:15', '2023-06-25 01:24:00', 4),
(334, '00:24:00', '1920x1080', 169.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 708.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:50:42', '2023-06-25 06:53:36', 4),
(335, '00:24:00', '1920x1080', 172.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 709.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:51:31', '2023-06-25 07:13:00', 4),
(336, '00:23:39', '1920x1080', 167.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 710.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:52:13', '2023-06-25 07:33:15', 4),
(337, '00:23:55', '1920x1080', 183.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 711.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:53:11', '2023-06-25 13:12:20', 4),
(338, '00:23:39', '1920x1080', 165.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 712.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:57:52', '2023-06-25 13:30:27', 4),
(339, '00:23:39', '1920x1080', 177.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 713.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 08:58:44', '2023-06-25 13:53:26', 4),
(340, '00:23:39', '1920x1080', 176.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 714.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:09:42', '2023-06-25 14:16:26', 4),
(341, '00:23:39', '1920x1080', 185.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 715.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:11:02', '2023-06-26 02:03:48', 4),
(342, '00:23:39', '1920x1080', 201.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 716.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:11:44', '2023-06-26 05:59:51', 4),
(343, '00:23:39', '1920x1080', 199.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 717.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:12:36', '2023-06-26 06:19:37', 4),
(344, '00:23:39', '1920x1080', 199.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 718.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:13:29', '2023-06-26 06:41:01', 4),
(345, '00:23:55', '1920x1080', 206.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 719.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:14:48', '2023-06-26 06:58:59', 4),
(346, '00:23:50', '1920x1080', 202.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 720.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:15:31', '2023-06-26 12:35:09', 4),
(347, '00:23:39', '1920x1080', 193.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 721.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:16:49', '2023-06-27 02:04:53', 4),
(348, '00:23:39', '1920x1080', 182.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 722.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:17:25', '2023-06-27 05:58:02', 4),
(349, '00:23:39', '1920x1080', 190.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 723.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:18:10', '2023-06-27 06:28:13', 4),
(350, '00:23:39', '1920x1080', 193.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 724.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:18:57', '2023-06-27 06:48:02', 4),
(351, '00:23:39', '1920x1080', 189.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 725.0, 'Koenime', 'mkv', 0, 1, '2023-06-24 09:19:44', '2023-06-27 07:05:49', 4),
(352, '00:23:39', '1920x1080', 265.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 726.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:08:43', '2023-06-27 13:24:08', 4),
(353, '00:23:39', '1920x1080', 210.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 727.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:09:23', '2023-06-27 13:43:15', 4),
(354, '00:23:39', '1920x1080', 203.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 728.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:10:08', '2023-06-27 14:01:26', 4),
(355, '00:23:39', '1920x1080', 201.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'Null', 729.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:11:42', '2023-06-27 14:17:09', 4),
(356, '00:23:55', '1920x1080', 227.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 730.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:13:11', '2023-06-27 14:34:11', 4),
(357, '00:23:39', '1920x1080', 211.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 731.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:14:18', '2023-06-28 00:23:51', 4),
(358, '00:23:39', '1920x1080', 198.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 732.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:15:03', '2023-06-28 00:40:58', 4),
(359, '00:23:39', '1920x1080', 201.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'Null', 733.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:15:48', '2023-06-28 00:58:11', 4),
(360, '00:23:39', '1920x1080', 192.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 734.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:16:30', '2023-06-28 01:14:32', 4),
(361, '00:23:55', '1920x1080', 216.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 735.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:17:14', '2023-06-28 01:32:51', 4),
(362, '00:23:39', '1920x1080', 197.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 736.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:17:55', '2023-06-28 01:33:43', 4),
(363, '00:23:39', '1920x1080', 185.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 737.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:18:43', '2023-06-28 05:31:44', 4),
(364, '00:23:39', '1920x1080', 195.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 738.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:19:27', '2023-06-28 05:49:47', 4),
(365, '00:23:39', '1920x1080', 192.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 739.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:20:17', '2023-06-28 07:04:13', 4),
(366, '00:23:39', '1920x1080', 195.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 740.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:22:15', '2023-06-28 13:45:53', 4),
(367, '00:23:39', '1920x1080', 197.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 741.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:23:00', '2023-06-28 13:46:35', 4),
(368, '00:23:39', '1920x1080', 206.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 742.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:24:12', '2023-06-28 14:05:05', 4),
(369, '00:23:55', '1920x1080', 212.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 743.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:24:55', '2023-06-29 02:27:40', 4),
(370, '00:23:55', '1920x1080', 214.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 744.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:25:35', '2023-06-29 02:49:23', 4),
(371, '00:23:39', '1920x1080', 195.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 745.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:26:22', '2023-06-29 03:10:00', 4),
(372, '00:23:39', '1920x1080', 196.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 746.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:27:23', '2023-06-29 03:27:22', 4),
(373, '00:23:55', '1920x1080', 204.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 747.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:28:07', '2023-06-29 08:04:05', 4),
(374, '00:23:55', '1920x1080', 196.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 748.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:28:53', '2023-06-29 08:27:41', 4),
(375, '00:23:39', '1920x1080', 196.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 749.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:29:32', '2023-06-29 13:38:59', 4),
(376, '00:23:55', '1920x1080', 191.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 750.0, 'Koenime', 'mkv', 0, 1, '2023-06-27 07:30:12', '2023-06-29 13:56:19', 4),
(377, '00:23:39', '1920x1080', 197.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 751.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:54:18', '2023-06-30 01:20:09', 4),
(378, '00:23:39', '1920x1080', 209.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 752.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:55:07', '2023-06-30 01:23:56', 4),
(379, '00:23:39', '1920x1080', 213.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 753.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:55:52', '2023-06-30 01:26:56', 4),
(380, '00:23:55', '1920x1080', 219.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 754.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:56:47', '2023-06-30 01:32:52', 4),
(381, '00:23:39', '1920x1080', 211.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'False', 755.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:57:25', '2023-06-30 01:34:19', 4),
(382, '00:23:55', '1920x1080', 210.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 756.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:58:07', '2023-06-30 01:36:15', 4),
(383, '00:23:55', '1920x1080', 221.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 757.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:58:49', '2023-06-30 02:18:41', 4),
(384, '00:23:55', '1920x1080', 216.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 758.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 00:59:34', '2023-06-30 05:40:45', 4),
(385, '00:23:55', '1920x1080', 203.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 759.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 01:00:16', '2023-06-30 09:10:36', 4),
(386, '00:23:55', '1920x1080', 211.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 760.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 01:00:55', '2023-06-30 09:25:14', 4),
(387, '00:23:55', '1920x1080', 208.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 761.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 01:01:53', '2023-06-30 09:46:30', 4),
(388, '00:23:55', '1920x1080', 219.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 762.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 01:02:45', '2023-06-30 13:56:47', 4),
(389, '00:23:55', '1920x1080', 219.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'False', 763.0, 'Koenime', 'mkv', 0, 1, '2023-06-30 01:03:24', '2023-06-30 14:26:47', 4),
(390, '00:23:55', '1920x1080', 231.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'True', 764.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:04:05', '2023-06-30 01:04:05', 4),
(391, '00:23:55', '1920x1080', 221.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'True', 765.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:04:48', '2023-06-30 01:04:48', 4),
(392, '00:23:39', '1920x1080', 198.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'True', 766.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:05:39', '2023-06-30 01:05:39', 4),
(393, '00:23:55', '1920x1080', 212.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'True', 767.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:06:14', '2023-06-30 01:06:14', 4),
(394, '00:23:39', '1920x1080', 203.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'True', 768.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:07:10', '2023-06-30 01:07:10', 4),
(395, '00:23:55', '1920x1080', 225.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'True', 769.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:07:55', '2023-06-30 01:07:55', 4),
(396, '00:23:55', '1920x1080', 235.0, 'H264 (High @L5.0)', 'ACC 1.0 [Und]', 'True', 770.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:08:39', '2023-06-30 01:08:39', 4),
(397, '00:23:39', '1920x1080', 202.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'True', 771.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:09:33', '2023-06-30 01:09:33', 4),
(398, '00:23:39', '1920x1080', 209.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'True', 772.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:10:17', '2023-06-30 01:10:17', 4),
(399, '00:23:39', '1920x1080', 211.0, 'H264 (High @L5.0)', 'ACC 1.0 [New]', 'True', 773.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:11:22', '2023-06-30 01:11:22', 4),
(400, '00:23:39', '1920x1080', 206.0, 'H264 (High @L4.1)', 'ACC 1.0 [New]', 'True', 774.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:12:03', '2023-06-30 01:12:03', 4),
(401, '00:23:39', '1920x1080', 216.0, 'H264 (High @L4.1)', 'ACC 1.0 [New]', 'True', 775.0, 'Koenime', 'mkv', 0, 0, '2023-06-30 01:13:23', '2023-06-30 01:13:23', 4);

--
-- Triggers `video_animes`
--
DELIMITER $$
CREATE TRIGGER `Create_History_Anime_Video` BEFORE DELETE ON `video_animes` FOR EACH ROW BEGIN
          INSERT INTO `history_video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `slug`) VALUES (OLD.id, OLD.lenght_video, OLD.resolution, OLD.size, OLD.video_tracks, OLD.audio_tracks, OLD.chapters, OLD.episode, OLD.origin, OLD.type, OLD.cover, OLD.approved, OLD.created_at, OLD.updated_at, (SELECT `slug` FROM `folder_animes` WHERE OLD.folder_anime_id = `folder_animes`.`id`));
          UPDATE `video_anime_mistakes` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
          UPDATE `video_anime_subtitles` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `video_anime_mistakes`
--

CREATE TABLE `video_anime_mistakes` (
  `video_anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mistake_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_anime_mistakes`
--

INSERT INTO `video_anime_mistakes` (`video_anime_id`, `mistake_id`, `remove`) VALUES
(214, 2, 0),
(214, 5, 0),
(214, 7, 0),
(209, 7, 0),
(209, 2, 0),
(209, 5, 0),
(208, 7, 0),
(208, 2, 0),
(208, 5, 0),
(207, 7, 0),
(207, 2, 0),
(207, 5, 0),
(210, 7, 0),
(210, 2, 0),
(210, 5, 0),
(211, 7, 0),
(211, 2, 0),
(211, 5, 0),
(213, 7, 0),
(213, 2, 0),
(213, 5, 0),
(216, 3, 0),
(216, 8, 0),
(216, 2, 0),
(216, 9, 0),
(216, 5, 0),
(217, 3, 0),
(217, 2, 0),
(217, 9, 0),
(217, 5, 0),
(218, 3, 0),
(218, 2, 0),
(218, 9, 0),
(218, 5, 0),
(254, 3, 0),
(254, 2, 0),
(254, 9, 0),
(254, 5, 0),
(220, 3, 0),
(220, 2, 0),
(220, 9, 0),
(220, 5, 0),
(221, 3, 0),
(221, 2, 0),
(221, 9, 0),
(221, 5, 0),
(222, 3, 0),
(222, 2, 0),
(222, 9, 0),
(222, 5, 0),
(223, 3, 0),
(223, 2, 0),
(223, 9, 0),
(223, 5, 0),
(224, 3, 0),
(224, 2, 0),
(224, 9, 0),
(224, 5, 0),
(225, 3, 0),
(225, 2, 0),
(225, 9, 0),
(225, 5, 0),
(226, 3, 0),
(226, 2, 0),
(226, 9, 0),
(226, 5, 0),
(227, 3, 0),
(227, 2, 0),
(227, 9, 0),
(227, 5, 0),
(228, 3, 0),
(228, 2, 0),
(228, 9, 0),
(228, 5, 0),
(229, 3, 0),
(229, 2, 0),
(229, 9, 0),
(229, 5, 0),
(230, 3, 0),
(230, 2, 0),
(230, 9, 0),
(230, 5, 0),
(231, 3, 0),
(231, 2, 0),
(231, 9, 0),
(231, 5, 0),
(232, 3, 0),
(232, 2, 0),
(232, 9, 0),
(232, 5, 0),
(233, 3, 0),
(233, 2, 0),
(233, 9, 0),
(233, 5, 0),
(234, 3, 0),
(234, 2, 0),
(234, 9, 0),
(234, 5, 0),
(235, 3, 0),
(235, 2, 0),
(235, 9, 0),
(235, 5, 0),
(236, 3, 0),
(236, 2, 0),
(236, 9, 0),
(236, 5, 0),
(241, 3, 0),
(241, 2, 0),
(241, 9, 0),
(241, 5, 0),
(238, 3, 0),
(238, 2, 0),
(238, 9, 0),
(238, 5, 0),
(239, 3, 0),
(239, 2, 0),
(239, 9, 0),
(239, 5, 0),
(240, 3, 0),
(240, 2, 0),
(240, 9, 0),
(240, 5, 0),
(244, 3, 0),
(244, 2, 0),
(244, 9, 0),
(244, 5, 0),
(245, 3, 0),
(245, 9, 0),
(246, 3, 0),
(246, 9, 0),
(247, 3, 0),
(247, 2, 0),
(247, 9, 0),
(247, 11, 0),
(247, 5, 0),
(248, 3, 0),
(248, 2, 0),
(248, 9, 0),
(248, 5, 0),
(249, 3, 0),
(249, 2, 0),
(249, 9, 0),
(249, 5, 0),
(250, 3, 0),
(250, 2, 0),
(250, 9, 0),
(250, 5, 0),
(251, 3, 0),
(251, 2, 0),
(251, 9, 0),
(251, 5, 0),
(252, 3, 0),
(252, 10, 0),
(252, 2, 0),
(252, 9, 0),
(252, 5, 0),
(253, 3, 0),
(253, 10, 0),
(253, 2, 0),
(253, 9, 0),
(253, 5, 0),
(255, 3, 0),
(255, 10, 0),
(255, 2, 0),
(255, 9, 0),
(255, 5, 0),
(256, 3, 0),
(256, 2, 0),
(256, 9, 0),
(256, 5, 0),
(257, 3, 0),
(257, 2, 0),
(257, 9, 0),
(257, 5, 0),
(258, 3, 0),
(258, 2, 0),
(258, 11, 0),
(258, 5, 0),
(259, 3, 0),
(259, 2, 0),
(259, 9, 0),
(259, 5, 0),
(260, 3, 0),
(260, 9, 0),
(261, 3, 0),
(261, 9, 0),
(262, 3, 0),
(262, 2, 0),
(262, 9, 0),
(262, 5, 0),
(272, 3, 0),
(272, 2, 0),
(272, 9, 0),
(272, 5, 0),
(264, 3, 0),
(264, 2, 0),
(264, 9, 0),
(264, 5, 0),
(266, 3, 0),
(266, 9, 0),
(266, 18, 0),
(265, 3, 0),
(265, 9, 0),
(265, 18, 0),
(267, 3, 0),
(267, 9, 0),
(267, 18, 0),
(268, 3, 0),
(268, 9, 0),
(268, 18, 0),
(269, 3, 0),
(269, 9, 0),
(269, 18, 0),
(273, 3, 0),
(273, 2, 0),
(273, 9, 0),
(273, 5, 0),
(274, 3, 0),
(274, 2, 0),
(274, 9, 0),
(274, 5, 0),
(275, 3, 0),
(275, 2, 0),
(275, 9, 0),
(275, 5, 0),
(276, 3, 0),
(276, 2, 0),
(276, 9, 0),
(276, 5, 0),
(277, 3, 0),
(277, 2, 0),
(277, 9, 0),
(277, 5, 0),
(278, 3, 0),
(278, 2, 0),
(278, 9, 0),
(278, 5, 0),
(279, 3, 0),
(279, 2, 0),
(279, 9, 0),
(279, 5, 0),
(280, 3, 0),
(280, 2, 0),
(280, 9, 0),
(280, 5, 0),
(281, 3, 0),
(281, 2, 0),
(281, 9, 0),
(281, 5, 0),
(282, 3, 0),
(282, 2, 0),
(282, 9, 0),
(282, 5, 0),
(283, 3, 0),
(283, 2, 0),
(283, 9, 0),
(283, 5, 0),
(284, 3, 0),
(284, 2, 0),
(284, 9, 0),
(284, 5, 0),
(285, 3, 0),
(285, 2, 0),
(285, 9, 0),
(285, 5, 0),
(286, 3, 0),
(286, 2, 0),
(286, 9, 0),
(286, 5, 0),
(287, 3, 0),
(287, 2, 0),
(287, 9, 0),
(287, 5, 0),
(289, 3, 0),
(289, 2, 0),
(289, 9, 0),
(289, 5, 0),
(290, 3, 0),
(290, 4, 0),
(290, 2, 0),
(290, 5, 0),
(288, 3, 0),
(288, 4, 0),
(288, 2, 0),
(288, 5, 0),
(291, 3, 0),
(291, 2, 0),
(291, 9, 0),
(291, 5, 0),
(292, 3, 0),
(292, 4, 0),
(292, 2, 0),
(292, 5, 0),
(293, 3, 0),
(293, 2, 0),
(293, 5, 0),
(294, 3, 0),
(294, 2, 0),
(294, 9, 0),
(294, 5, 0),
(295, 3, 0),
(295, 2, 0),
(295, 9, 0),
(295, 5, 0),
(296, 3, 0),
(296, 2, 0),
(296, 5, 0),
(297, 3, 0),
(297, 2, 0),
(297, 11, 0),
(297, 5, 0),
(298, 3, 0),
(298, 2, 0),
(298, 9, 0),
(298, 5, 0),
(299, 3, 0),
(299, 2, 0),
(299, 5, 0),
(300, 3, 0),
(300, 2, 0),
(300, 5, 0),
(301, 3, 0),
(301, 2, 0),
(301, 5, 0),
(302, 3, 0),
(302, 2, 0),
(302, 5, 0),
(303, 3, 0),
(303, 2, 0),
(303, 5, 0),
(304, 3, 0),
(304, 2, 0),
(304, 5, 0),
(305, 3, 0),
(305, 2, 0),
(305, 5, 0),
(306, 3, 0),
(306, 2, 0),
(306, 5, 0),
(307, 3, 0),
(307, 2, 0),
(307, 5, 0),
(308, 3, 0),
(308, 2, 0),
(308, 5, 0),
(309, 3, 0),
(309, 2, 0),
(309, 11, 0),
(309, 5, 0),
(310, 3, 0),
(310, 2, 0),
(310, 14, 0),
(310, 5, 0),
(311, 3, 0),
(311, 2, 0),
(311, 14, 0),
(311, 5, 0),
(312, 3, 0),
(312, 2, 0),
(312, 5, 0),
(313, 3, 0),
(313, 2, 0),
(313, 5, 0),
(314, 3, 0),
(314, 2, 0),
(314, 5, 0),
(315, 3, 0),
(315, 2, 0),
(315, 5, 0),
(316, 3, 0),
(316, 2, 0),
(316, 5, 0),
(317, 3, 0),
(317, 2, 0),
(317, 5, 0),
(318, 3, 0),
(318, 2, 0),
(318, 5, 0),
(319, 3, 0),
(319, 2, 0),
(319, 5, 0),
(320, 3, 0),
(320, 2, 0),
(320, 5, 0),
(321, 3, 0),
(321, 2, 0),
(321, 5, 0),
(326, 3, 0),
(326, 2, 0),
(326, 5, 0),
(327, 3, 0),
(327, 2, 0),
(327, 5, 0),
(328, 3, 0),
(328, 2, 0),
(328, 5, 0),
(329, 3, 0),
(329, 2, 0),
(329, 9, 0),
(329, 5, 0),
(330, 3, 0),
(330, 2, 0),
(330, 9, 0),
(330, 5, 0),
(331, 3, 0),
(331, 2, 0),
(331, 5, 0),
(332, 3, 0),
(332, 2, 0),
(332, 5, 0),
(333, 3, 0),
(333, 2, 0),
(333, 5, 0),
(334, 3, 0),
(334, 2, 0),
(334, 5, 0),
(335, 3, 0),
(335, 2, 0),
(335, 5, 0),
(336, 3, 0),
(336, 2, 0),
(336, 5, 0),
(337, 3, 0),
(337, 2, 0),
(337, 5, 0),
(338, 3, 0),
(338, 2, 0),
(338, 5, 0),
(339, 3, 0),
(339, 2, 0),
(339, 5, 0),
(340, 3, 0),
(340, 2, 0),
(340, 5, 0),
(341, 3, 0),
(341, 2, 0),
(341, 5, 0),
(342, 3, 0),
(342, 2, 0),
(342, 5, 0),
(343, 3, 0),
(343, 2, 0),
(343, 5, 0),
(344, 3, 0),
(344, 2, 0),
(344, 5, 0),
(345, 3, 0),
(345, 2, 0),
(345, 5, 0),
(346, 3, 0),
(346, 2, 0),
(346, 5, 0),
(347, 3, 0),
(347, 2, 0),
(347, 5, 0),
(348, 3, 0),
(348, 2, 0),
(348, 5, 0),
(349, 3, 0),
(349, 2, 0),
(349, 5, 0),
(350, 3, 0),
(350, 2, 0),
(350, 5, 0),
(351, 3, 0),
(351, 2, 0),
(351, 5, 0),
(352, 3, 0),
(352, 2, 0),
(352, 5, 0),
(353, 3, 0),
(353, 2, 0),
(353, 5, 0),
(354, 3, 0),
(354, 2, 0),
(354, 5, 0),
(355, 3, 0),
(355, 2, 0),
(355, 5, 0),
(356, 3, 0),
(356, 2, 0),
(356, 5, 0),
(357, 2, 0),
(357, 5, 0),
(357, 3, 0),
(358, 3, 0),
(358, 2, 0),
(358, 5, 0),
(359, 3, 0),
(359, 2, 0),
(359, 5, 0),
(360, 3, 0),
(360, 2, 0),
(360, 5, 0),
(361, 3, 0),
(361, 2, 0),
(361, 5, 0),
(362, 3, 0),
(362, 2, 0),
(362, 5, 0),
(363, 3, 0),
(363, 2, 0),
(363, 5, 0),
(364, 3, 0),
(364, 2, 0),
(364, 5, 0),
(365, 3, 0),
(365, 2, 0),
(365, 5, 0),
(366, 3, 0),
(366, 2, 0),
(366, 5, 0),
(367, 3, 0),
(367, 2, 0),
(367, 5, 0),
(368, 3, 0),
(368, 2, 0),
(368, 5, 0),
(369, 3, 0),
(369, 2, 0),
(369, 5, 0),
(370, 3, 0),
(370, 2, 0),
(370, 5, 0),
(371, 3, 0),
(371, 2, 0),
(371, 5, 0),
(372, 3, 0),
(372, 2, 0),
(372, 5, 0),
(373, 3, 0),
(373, 2, 0),
(373, 11, 0),
(374, 3, 0),
(374, 2, 0),
(374, 11, 0),
(375, 3, 0),
(375, 2, 0),
(375, 11, 0),
(376, 3, 0),
(376, 2, 0),
(377, 3, 0),
(377, 2, 0),
(378, 3, 0),
(379, 3, 0),
(379, 2, 0),
(380, 3, 0),
(380, 2, 0),
(381, 3, 0),
(381, 2, 0),
(382, 3, 0),
(382, 2, 0),
(383, 3, 0),
(383, 2, 0),
(383, 5, 0),
(384, 3, 0),
(384, 10, 0),
(384, 2, 0),
(384, 5, 0),
(385, 3, 0),
(385, 2, 0),
(385, 5, 0),
(386, 3, 0),
(386, 2, 0),
(386, 5, 0),
(387, 3, 0),
(387, 2, 0),
(387, 5, 0),
(388, 3, 0),
(388, 2, 0),
(388, 5, 0),
(389, 3, 0),
(389, 2, 0),
(389, 5, 0),
(378, 2, 0);

--
-- Triggers `video_anime_mistakes`
--
DELIMITER $$
CREATE TRIGGER `Create_History_Anime_Video_Mistake` AFTER UPDATE ON `video_anime_mistakes` FOR EACH ROW BEGIN
          INSERT INTO `history_video_anime_mistakes` (`video_anime_id`, `mistake_id`, `retrive`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `video_anime_subtitles`
--

CREATE TABLE `video_anime_subtitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_anime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_anime_subtitles`
--

INSERT INTO `video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `remove`) VALUES
(3, 'Oploverz', 'Null', 213, 0),
(5, 'Oploverz', 'Null', 214, 0),
(6, 'Oploverz', 'Null', 208, 0),
(7, 'Oploverz', 'Null', 207, 0),
(8, 'Oploverz', 'Null', 209, 0),
(9, 'Oploverz', 'Null', 210, 0),
(10, 'Oploverz', 'Null', 211, 0),
(13, 'Oploverz', 'Null', 217, 0),
(14, 'Oploverz', 'Null', 218, 0),
(16, 'Oploverz', 'Null', 220, 0),
(17, 'Oploverz', 'Null', 221, 0),
(18, 'Oploverz', 'Null', 222, 0),
(19, 'Oploverz', 'Null', 223, 0),
(20, 'Oploverz', 'Null', 224, 0),
(21, 'Oploverz', 'Null', 225, 0),
(22, 'Oploverz', 'Null', 226, 0),
(23, 'Oploverz', 'Null', 227, 0),
(24, 'Oploverz', 'Null', 228, 0),
(25, 'Oploverz', 'Null', 229, 0),
(26, 'Oploverz', 'Null', 230, 0),
(27, 'Oploverz', 'Null', 231, 0),
(28, 'Oploverz', 'Null', 232, 0),
(29, 'Oploverz', 'Null', 233, 0),
(30, 'Oploverz', 'Null', 234, 0),
(31, 'Oploverz', 'Null', 235, 0),
(32, 'Oploverz', 'Null', 236, 0),
(34, 'Oploverz', 'Null', 241, 0),
(35, 'Oploverz', 'Null', 238, 0),
(36, 'Oploverz', 'Null', 239, 0),
(37, 'Oploverz', 'Null', 240, 0),
(40, 'Oploverz', 'Null', 244, 0),
(41, 'Adikanime', 'ASS [Und]', 245, 0),
(42, 'Adikanime', 'ASS [Und]', 246, 0),
(43, 'Oploverz', 'Null', 254, 0),
(46, 'Oploverz', 'Null', 247, 0),
(47, 'Oploverz', 'Null', 248, 0),
(48, 'Oploverz', 'Null', 249, 0),
(49, 'Oploverz', 'Null', 250, 0),
(50, 'Oploverz', 'Null', 251, 0),
(51, 'Oploverz', 'Null', 252, 0),
(52, 'Oploverz', 'Null', 253, 0),
(53, 'Oploverz', 'Null', 255, 0),
(54, 'Oploverz', 'Null', 256, 0),
(55, 'Oploverz', 'Null', 257, 0),
(56, 'Samehadaku', 'Null', 258, 0),
(57, 'Oploverz', 'Null', 259, 0),
(58, 'Adikanime', 'ASS [Und]', 260, 0),
(59, 'Adikanime', 'ASS [Und]', 261, 0),
(60, 'Oploverz', 'Null', 262, 0),
(64, 'Oploverz', 'Null', 272, 0),
(65, 'Oploverz', 'Null', 264, 0),
(66, 'Adikanime', 'ASS [Und]', 265, 0),
(67, 'Adikanime', 'ASS [Und]', 266, 0),
(68, 'Adikanime', 'ASS [Und]', 267, 0),
(69, 'Adikanime', 'ASS [Und]', 268, 0),
(70, 'Adikanime', 'ASS [Und]', 269, 0),
(71, 'Oploverz', 'Null', 273, 0),
(72, 'Oploverz', 'Null', 274, 0),
(73, 'Oploverz', 'Null', 275, 0),
(74, 'Oploverz', 'Null', 276, 0),
(75, 'Oploverz', 'Null', 277, 0),
(76, 'Oploverz', 'Null', 278, 0),
(77, 'Oploverz', 'Null', 279, 0),
(78, 'Oploverz', 'Null', 280, 0),
(79, 'Oploverz', 'Null', 281, 0),
(80, 'Oploverz', 'Null', 282, 0),
(81, 'Oploverz', 'Null', 283, 0),
(82, 'Oploverz', 'Null', 284, 0),
(83, 'Oploverz', 'Null', 285, 0),
(84, 'Oploverz', 'Null', 286, 0),
(85, 'Oploverz', 'Null', 287, 0),
(86, 'Oploverz', 'Null', 288, 0),
(87, 'Oploverz', 'Null', 289, 0),
(88, 'Oploverz', 'Null', 290, 0),
(89, 'Oploverz', 'Null', 291, 0),
(90, 'Oploverz', 'Null', 292, 0),
(91, 'Oploverz', 'Null', 293, 0),
(92, 'Oploverz', 'Null', 294, 0),
(93, 'Oploverz', 'Null', 295, 0),
(94, 'Oploverz', 'Null', 296, 0),
(95, 'Oploverz', 'Null', 297, 0),
(96, 'Oploverz', 'Null', 298, 0),
(97, 'Oploverz', 'Null', 299, 0),
(98, 'Oploverz', 'Null', 300, 0),
(99, 'Oploverz', 'Null', 301, 0),
(100, 'Oploverz', 'Null', 302, 0),
(101, 'Oploverz', 'Null', 303, 0),
(102, 'Oploverz', 'Null', 304, 0),
(103, 'Oploverz', 'Null', 305, 0),
(104, 'Oploverz', 'Null', 306, 0),
(105, 'Oploverz', 'Null', 307, 0),
(106, 'Oploverz', 'Null', 308, 0),
(107, 'Oploverz', 'Null', 309, 0),
(108, 'Oploverz', 'Null', 310, 0),
(109, 'Oploverz', 'Null', 311, 0),
(110, 'Oploverz', 'Null', 312, 0),
(111, 'Oploverz', 'Null', 313, 0),
(112, 'Oploverz', 'Null', 314, 0),
(113, 'Oploverz', 'Null', 315, 0),
(114, 'Oploverz', 'Null', 316, 0),
(115, 'Oploverz', 'Null', 317, 0),
(116, 'Oploverz', 'Null', 318, 0),
(117, 'Oploverz', 'Null', 319, 0),
(118, 'Oploverz', 'Null', 320, 0),
(119, 'Oploverz', 'Null', 321, 0),
(120, 'Oploverz', 'Null', 326, 0),
(121, 'Oploverz', 'Null', 327, 0),
(122, 'Oploverz', 'Null', 328, 0),
(123, 'Oploverz', 'Null', 329, 0),
(124, 'Oploverz', 'Null', 330, 0),
(125, 'Oploverz', 'Null', 331, 0),
(126, 'Oploverz', 'Null', 332, 0),
(127, 'Oploverz', 'Null', 333, 0),
(128, 'Oploverz', 'Null', 334, 0),
(129, 'Oploverz', 'Null', 335, 0),
(130, 'Oploverz', 'Null', 336, 0),
(131, 'Oploverz', 'Null', 337, 0),
(132, 'Oploverz', 'Null', 338, 0),
(133, 'Oploverz', 'Null', 339, 0),
(134, 'Oploverz', 'Null', 340, 0),
(135, 'Oploverz', 'Null', 341, 0),
(136, 'Oploverz', 'Null', 342, 0),
(137, 'Oploverz', 'Null', 343, 0),
(138, 'Oploverz', 'Null', 344, 0),
(139, 'Oploverz', 'Null', 345, 0),
(140, 'Oploverz', 'Null', 346, 0),
(141, 'Oploverz', 'Null', 347, 0),
(142, 'Oploverz', 'Null', 348, 0),
(143, 'Oploverz', 'Null', 349, 0),
(144, 'Oploverz', 'Null', 350, 0),
(145, 'Oploverz', 'Null', 351, 0),
(146, 'Oploverz', 'Null', 352, 0),
(147, 'Oploverz', 'Null', 353, 0),
(148, 'Oploverz', 'Null', 354, 0),
(149, 'Oploverz', 'Null', 355, 0),
(150, 'Oploverz', 'Null', 356, 0),
(151, 'Oploverz', 'Null', 357, 0),
(152, 'Oploverz', 'Null', 358, 0),
(153, 'Oploverz', 'Null', 359, 0),
(154, 'Oploverz', 'Null', 360, 0),
(155, 'Oploverz', 'Null', 361, 0),
(156, 'Oploverz', 'Null', 362, 0),
(157, 'Oploverz', 'Null', 363, 0),
(158, 'Oploverz', 'Null', 364, 0),
(159, 'Oploverz', 'Null', 365, 0),
(160, 'Oploverz', 'Null', 366, 0),
(161, 'Oploverz', 'Null', 367, 0),
(162, 'Oploverz', 'Null', 368, 0),
(163, 'Oploverz', 'Null', 369, 0),
(164, 'Oploverz', 'Null', 370, 0),
(165, 'Oploverz', 'Null', 371, 0),
(166, 'Oploverz', 'Null', 372, 0),
(167, 'Oploverz', 'Null', 373, 0),
(168, 'Oploverz', 'Null', 374, 0),
(169, 'Oploverz', 'Null', 375, 0),
(170, 'Oploverz', 'Null', 376, 0),
(171, 'Oploverz', 'Null', 377, 0),
(173, 'Oploverz', 'Null', 379, 0),
(174, 'Oploverz', 'Null', 380, 0),
(175, 'Oploverz', 'Null', 381, 0),
(176, 'Oploverz', 'Null', 382, 0),
(177, 'Oploverz', 'Null', 383, 0),
(178, 'Oploverz', 'Null', 384, 0),
(179, 'Oploverz', 'Null', 385, 0),
(180, 'Oploverz', 'Null', 386, 0),
(181, 'Oploverz', 'Null', 387, 0),
(182, 'Oploverz', 'Null', 388, 0),
(183, 'Oploverz', 'Null', 389, 0),
(184, 'Oploverz', 'Null', 378, 0);

--
-- Triggers `video_anime_subtitles`
--
DELIMITER $$
CREATE TRIGGER `Create_History_Anime_Video_Subtitle` AFTER UPDATE ON `video_anime_subtitles` FOR EACH ROW BEGIN
          INSERT INTO `history_video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `retrive`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
        END
$$
DELIMITER ;

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
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `folder_animes_anime_id_foreign` (`anime_id`),
  ADD KEY `folder_animes_user_id_foreign` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_video_animes`
--
ALTER TABLE `history_video_animes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_video_anime_mistakes`
--
ALTER TABLE `history_video_anime_mistakes`
  ADD KEY `history_video_anime_mistakes_video_anime_id_foreign` (`video_anime_id`),
  ADD KEY `history_video_anime_mistakes_mistake_id_foreign` (`mistake_id`);

--
-- Indexes for table `history_video_anime_subtitles`
--
ALTER TABLE `history_video_anime_subtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_video_anime_subtitles_video_anime_id_foreign` (`video_anime_id`);

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
-- Indexes for table `video_anime_subtitles`
--
ALTER TABLE `video_anime_subtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_anime_subtitles_video_anime_id_foreign` (`video_anime_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `folder_animes`
--
ALTER TABLE `folder_animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history_video_animes`
--
ALTER TABLE `history_video_animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `history_video_anime_subtitles`
--
ALTER TABLE `history_video_anime_subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `licensors`
--
ALTER TABLE `licensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mistakes`
--
ALTER TABLE `mistakes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `video_anime_subtitles`
--
ALTER TABLE `video_anime_subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

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
  ADD CONSTRAINT `folder_animes_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `folder_animes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `history_video_anime_mistakes`
--
ALTER TABLE `history_video_anime_mistakes`
  ADD CONSTRAINT `history_video_anime_mistakes_mistake_id_foreign` FOREIGN KEY (`mistake_id`) REFERENCES `mistakes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_video_anime_mistakes_video_anime_id_foreign` FOREIGN KEY (`video_anime_id`) REFERENCES `history_video_animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_video_anime_subtitles`
--
ALTER TABLE `history_video_anime_subtitles`
  ADD CONSTRAINT `history_video_anime_subtitles_video_anime_id_foreign` FOREIGN KEY (`video_anime_id`) REFERENCES `history_video_animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `video_anime_subtitles`
--
ALTER TABLE `video_anime_subtitles`
  ADD CONSTRAINT `video_anime_subtitles_video_anime_id_foreign` FOREIGN KEY (`video_anime_id`) REFERENCES `video_animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
