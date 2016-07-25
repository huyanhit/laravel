-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 06:55 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `catnews`
--

CREATE TABLE `catnews` (
  `id` int(11) NOT NULL,
  `title` int(255) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_13_163811_add_votes_to_users_table', 1),
('2016_06_13_163830_create_users_table', 1),
('2016_06_17_161843_create_users_table', 2),
('2016_06_18_140647_create_users_table', 3),
('2016_06_18_140839_create_users_table', 4),
('2016_06_18_150202_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `catnews` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `from` varchar(25) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `date_create` date NOT NULL,
  `author` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `catnews`, `title`, `desc`, `content`, `image`, `from`, `active`, `date_create`, `author`, `comment`, `view`) VALUES
(31, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(32, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(33, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(34, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(35, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 0, '2016-07-03', 0, 0, 0),
(36, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(37, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(38, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 1, '2016-07-03', 0, 0, 0),
(39, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 0, '2016-07-03', 0, 0, 0),
(40, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 0, '2016-07-03', 0, 0, 0),
(41, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 0, '2016-07-03', 0, 0, 0),
(42, 1, 'huy', 'huy', 'huy', 'huy', 'huy', 0, '2016-07-03', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catnews`
--
ALTER TABLE `catnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
