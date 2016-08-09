-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 06:20 PM
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
-- Table structure for table `catjobs`
--

CREATE TABLE `catjobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catjobs`
--

INSERT INTO `catjobs` (`id`, `title`, `icon`, `active`) VALUES
(1, 'phục vụ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catnews`
--

CREATE TABLE `catnews` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(25) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catnews`
--

INSERT INTO `catnews` (`id`, `title`, `icon`, `active`) VALUES
(1, 'Tin mới', 'new', 1),
(2, 'Tin n?ng', 'sun', 1),
(3, 'Tin m?i', 'new', 1),
(4, 'Tin n?ng', 'sun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `catjobs` int(11) NOT NULL,
  `typejobs` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `view` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL,
  `from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `catjobs`, `typejobs`, `title`, `desc`, `content`, `image`, `active`, `view`, `salary`, `location`, `date_create`, `date_update`, `author`, `from`) VALUES
(1, 1, 1, 'Tuyển nhân viên quản trị website', '<p>Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website</p>\r\n', '<p>Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website&nbsp;Tuyển nh&acirc;n vi&ecirc;n quản trị website</p>\r\n', 'Koala.jpg', 1, 0, 0, 1, 1470751763, 1470751888, 1, 'huy'),
(2, 1, 1, 'Phục Vụ Nhà Hàng Queen Plaza karatime', '<p>Lectus non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem</p>\r\n', '<p>Lectus non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem&nbsp;Lectus non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem non rutrum pulvinar urna leo dignissim lorem Lectus non rutrum pulvinar urna leo dignissim lorem</p>\r\n', 'Penguins.jpg', 1, 0, 0, 1, 1470756626, 1470757059, 1, 'xulanhcompany');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `title`, `icon`, `active`) VALUES
(1, 'Pleiku', '', 1);

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
  `view` int(11) NOT NULL DEFAULT '0',
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `catnews`, `title`, `desc`, `content`, `image`, `from`, `active`, `view`, `date_create`, `date_update`, `author`) VALUES
(60, 1, 'Validate forms', '<p>Validate forms like you&#39;ve never validated before!</p>\r\n', '<p><strong>&quot;But doesn&#39;t jQuery make it easy to write your own validation plugin?&quot;</strong><br />\r\nSure, but there are still a lot of subtleties to take care of: You need a standard library of validation methods (such as emails, URLs, credit card numbers). You need to place error messages in the DOM and show and hide them when appropriate. You want to react to more than just a submit event, like keyup and blur.<br />\r\nYou may need different ways to specify validation rules according to the server-side enviroment you are using on different projects. And after all, you don&#39;t want to reinvent the wheel, do you?</p>\r\n\r\n<p><strong>&quot;But aren&#39;t there already a ton of validation plugins out there?&quot;</strong><br />\r\nRight, there are a lot of non-jQuery-based solutions (which you&#39;d avoid since you found jQuery) and some jQuery-based solutions. This particular one is one of the oldest jQuery plugins (started in July 2006) and has proved itself in projects all around the world. There is also an<a href="http://bassistance.de/2007/07/04/about-client-side-form-validation-and-frameworks/">article</a>&nbsp;discussing how this plugin fits the bill of the should-be validation solution.</p>\r\n', 'Lighthouse.jpg', 'jQuery', 1, 0, 0, 0, 1),
(77, 1, 'Smiley Happy Coder', '<h2>Fetching the last insert ID with Laravel</h2>\r\n', '<p>Its fairly common to need to find the ID of the last inserted record.</p>\r\n\r\n<p>You could be adding a product to a table and then adding the product ID to a list of categories. Or a similar process on a blog website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This kind of thing quite often happens when you&rsquo;re interacting with two or more tables. If you are updating two or more tables you should probably consider post on</p>\r\n', 'Chrysanthemum.jpg', 'kind ', 1, 0, 0, 0, 1),
(80, 1, 'Smiley Happy Coder', '<h2>Fetching the last insert ID with Laravel</h2>\r\n', '<p>Its fairly common to need to find the ID of the last inserted record.</p>\r\n\r\n<p>You could be adding a product to a table and then adding the product ID to a list of categories. Or a similar process on a blog website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This kind of thing quite often happens when you&rsquo;re interacting with two or more tables. If you are updating two or more tables you should probably consider post on</p>\r\n', '', 'kind ', 1, 0, 1470741677, 0, 1),
(81, 1, 'Validate forms', '<p>Validate forms like you&#39;ve never validated before!</p>\r\n', '<p><strong>&quot;But doesn&#39;t jQuery make it easy to write your own validation plugin?&quot;</strong><br />\r\nSure, but there are still a lot of subtleties to take care of: You need a standard library of validation methods (such as emails, URLs, credit card numbers). You need to place error messages in the DOM and show and hide them when appropriate. You want to react to more than just a submit event, like keyup and blur.<br />\r\nYou may need different ways to specify validation rules according to the server-side enviroment you are using on different projects. And after all, you don&#39;t want to reinvent the wheel, do you?</p>\r\n\r\n<p><strong>&quot;But aren&#39;t there already a ton of validation plugins out there?&quot;</strong><br />\r\nRight, there are a lot of non-jQuery-based solutions (which you&#39;d avoid since you found jQuery) and some jQuery-based solutions. This particular one is one of the oldest jQuery plugins (started in July 2006) and has proved itself in projects all around the world. There is also an<a href="http://bassistance.de/2007/07/04/about-client-side-form-validation-and-frameworks/">article</a>&nbsp;discussing how this plugin fits the bill of the should-be validation solution.</p>\r\n', '', 'jQuery', 1, 0, 1470741696, 0, 1);

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
-- Table structure for table `typejobs`
--

CREATE TABLE `typejobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typejobs`
--

INSERT INTO `typejobs` (`id`, `title`, `icon`, `active`) VALUES
(1, 'vip', '', 1);

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
-- Indexes for table `catjobs`
--
ALTER TABLE `catjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catnews`
--
ALTER TABLE `catnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- Indexes for table `typejobs`
--
ALTER TABLE `typejobs`
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
-- AUTO_INCREMENT for table `catjobs`
--
ALTER TABLE `catjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `typejobs`
--
ALTER TABLE `typejobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
