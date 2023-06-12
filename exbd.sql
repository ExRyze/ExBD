-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 02:41 PM
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
(219, '00:23:30', '1280x720', 150.0, NULL, NULL, 'Null', 603.0, 'Oploverz', 'mp4', 0, 1, '2023-06-10 14:14:36', '2023-06-10 14:17:18', 'One Piece');

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
(219, 5, 0);

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
(15, 'Oploverz', 'Null', 219, 0);

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
(7, 'Ending different'),
(8, 'Broken audio'),
(9, 'No closing subtitle');

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
(219, '00:23:49', '1276x720', 150.0, 'H264 (High @L4.1)', 'ACC 2.0 [Und]', 'Null', 604.0, 'Koenime', 'mkv', 0, 1, '2023-06-11 03:56:29', '2023-06-11 03:57:23', 4),
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
(231, '00:23:38', '1280x720', 125.0, 'H264 (High @L4.1)', 'ACC 1.0 [Und]', 'Null', 616.0, 'Koenime', 'mkv', 0, 1, '2023-06-12 00:04:55', '2023-06-12 14:38:21', 4);

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
(219, 3, 0),
(219, 2, 0),
(219, 9, 0),
(219, 5, 0),
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
(231, 5, 0);

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
(15, 'Oploverz', 'Null', 219, 0),
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
(27, 'Oploverz', 'Null', 231, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `history_video_anime_subtitles`
--
ALTER TABLE `history_video_anime_subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `video_anime_subtitles`
--
ALTER TABLE `video_anime_subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
