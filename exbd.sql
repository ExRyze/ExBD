-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2022 at 03:55 PM
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
  `title` varchar(52) NOT NULL,
  `episodes` int(11) DEFAULT NULL,
  `type` varchar(52) DEFAULT NULL,
  `aired` timestamp NULL DEFAULT NULL,
  `finished` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `title`, `episodes`, `type`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'test', 0, 'TV', '2022-12-02 07:25:45', '2022-12-02 07:25:45', '2022-12-02 07:25:48', '2022-12-02 07:25:48', 2),
(2, 'test 2', 0, 'TV', '2022-12-02 07:30:06', '2022-12-02 07:30:06', '2022-12-02 07:30:15', '2022-12-02 07:30:15', 2),
(3, 'test 3', 0, 'TV', '2022-12-02 07:34:01', '2022-12-02 07:34:01', '2022-12-02 07:34:06', '2022-12-02 07:34:06', 2);

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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `access`, `created_at`, `updated_at`) VALUES
(2, 'Ex', 'ExRyze', '123', 'Admin', 2, '2022-11-26 05:07:10', '2022-11-26 05:07:10'),
(3, 'User', 'UserGuest', '123', 'User', 2, '2022-11-30 03:27:31', '2022-11-30 03:27:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_updated_by` (`id_user`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
