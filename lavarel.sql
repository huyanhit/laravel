-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 02:46 AM
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
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `catads` int(11) NOT NULL,
  `typeads` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `catads`, `typeads`, `title`, `desc`, `content`, `active`, `date_create`, `date_update`, `author`, `image`, `location`, `view`, `from`) VALUES
(44, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829541, 1471852599, 1, 'Chrysanthemum1.jpg', 1, 0, ''),
(45, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829925, 0, 1, 'Penguins1.jpg', 1, 0, ''),
(46, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829935, 0, 1, 'Jellyfish1.jpg', 1, 0, ''),
(47, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829970, 0, 1, 'Tulips1.jpg', 1, 0, ''),
(48, 1, 7, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829980, 0, 1, 'Penguins2.jpg', 1, 0, ''),
(49, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829990, 0, 1, 'Chrysanthemum2.jpg', 1, 0, ''),
(50, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830030, 0, 1, 'Penguins3.jpg', 1, 0, ''),
(51, 1, 8, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830042, 0, 1, 'Penguins4.jpg', 1, 0, ''),
(52, 1, 11, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830054, 0, 1, 'Jellyfish2.jpg', 1, 0, ''),
(53, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830071, 0, 1, 'Koala1.jpg', 1, 0, ''),
(54, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830276, 0, 1, 'Hydrangeas1.jpg', 1, 0, ''),
(55, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830294, 0, 1, 'Tulips2.jpg', 1, 0, ''),
(56, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830319, 1471835642, 1, 'Lighthouse1.jpg', 1, 0, ''),
(57, 1, 2, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', '<p>an ph&uacute; pleiku gia lai</p>\r\n', '<p>?? thi Violympic To&aacute;n ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016</p>\r\n', 1, 1471835902, 1471836340, 1, 'Tulips4.jpg', 1, 0, 'Xu lanh'),
(58, 1, 1, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', 'an phú pleiku gia lai', '<p>?? thi Violympic To&aacute;n ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016</p>\r\n', 1, 1471836161, 1471836486, 1, 'Tulips5.jpg', 1, 0, 'Xu lanh'),
(59, 2, 2, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', '123', '', 1, 1471836744, 1471836906, 1, 'Lighthouse2.jpg', 1, 0, 'Xu lanh');

-- --------------------------------------------------------

--
-- Table structure for table `catads`
--

CREATE TABLE `catads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catads`
--

INSERT INTO `catads` (`id`, `title`, `icon`, `active`) VALUES
(1, 'dien may', '', 1),
(2, 'may mac', '', 1);

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
-- Table structure for table `catmuti`
--

CREATE TABLE `catmuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catmuti`
--

INSERT INTO `catmuti` (`id`, `title`, `icon`, `active`) VALUES
(1, 'truyen ', '', 1),
(2, 'nhac', '', 1),
(3, 'phim', '', 1),
(4, 'radio', '', 1);

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
(1, 'Rss', 'fa-rss', 1),
(2, 'Xứ lạnh', 'fa-gg', 1),
(3, 'Gia Lai', 'fa-map-marker', 1),
(4, 'Top', 'fa-genderless', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `idjobs` int(11) NOT NULL,
  `idads` int(11) NOT NULL,
  `position` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idnews`, `name`, `comment`, `idjobs`, `idads`, `position`, `date_create`, `like`, `dislike`, `idcomment`, `active`) VALUES
(61, 355, 'dsad', 'dasd', 0, 0, 0, 1472382791, 0, 0, 0, 0),
(62, 358, 'dsa', 'dsad', 0, 0, 0, 1472382973, 0, 0, 0, 0),
(63, 384, 'dsad', 'das', 0, 0, 0, 1472398332, 0, 0, 0, 0),
(64, 383, 'Huy', 'Nguoi mau dep ghe', 0, 0, 0, 1472400406, 0, 0, 0, 0);

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
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `catjobs`, `typejobs`, `title`, `desc`, `content`, `image`, `active`, `view`, `salary`, `location`, `date_create`, `date_update`, `author`, `from`) VALUES
(12, 1, 1, 'Nhân viên bán vé Máy Bay', '<p>huyanhit@gmail.com</p>\r\n', '<p>b&aacute;n v&eacute; m&aacute;y bay</p>\r\n', 'Chrysanthemum4.jpg', 1, 0, 6, 1, 1471519199, 1472400665, 1, 'vnairline');

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
-- Table structure for table `muti`
--

CREATE TABLE `muti` (
  `id` int(11) NOT NULL,
  `catmuti` int(11) NOT NULL,
  `typemuti` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `view` int(11) NOT NULL,
  `playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muti`
--

INSERT INTO `muti` (`id`, `catmuti`, `typemuti`, `author`, `date_create`, `date_update`, `title`, `desc`, `content`, `image`, `file`, `active`, `view`, `playlist`) VALUES
(1, 2, 1, 1, 1472486454, 1472490306, 'nhac sen 1', '<p>nhac sen 1</p>\r\n', '', 'Chrysanthemum5.jpg', 'f348ce6bad5cce9d38fb653a0be4bc0c.mp3', 1, 0, 0),
(6, 1, 1, 1, 1472490564, 1472576706, 'noa tau', '', '', 'ffeda6f0ed97b4b751bcf4c17fadf6a3.mp3', 'ffeda6f0ed97b4b751bcf4c17fadf6a3.mp3', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `catnews` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `from` varchar(25) CHARACTER SET utf8 NOT NULL,
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
(334, 1, 'Giảm mỡ bụng chỉ với một động tác ở tư thế nằm', 'Dùng một chiếc gối nhỏ kẹp giữa 2 chân, lần lượt nâng 2 chân và đầu lên để tay với được chiếc gối.  ', 'http://suckhoe.vnexpress.net/tin-tuc/khoe-dep/tham-my/giam-mo-bung-chi-voi-mot-dong-tac-o-tu-the-nam-3455174.html', 'tap-1471585116.jpg', 'VnExpress', 1, 0, 1471776552, 0, 1),
(335, 1, 'Nữ sinh chuyển trường vì bị cô giáo đánh nhiều lần', 'Nhiều lần bị nữ giáo viên dạy Văn đánh, cho học sinh khác chế giễu trước lớp, nữ sinh lớp 8 ở Khánh Hòa đòi nghỉ học, buộc gia đình phải chuyển trường.', 'http://vnexpress.net/tin-tuc/giao-duc/nu-sinh-chuyen-truong-vi-bi-co-giao-danh-nhieu-lan-3456054.html', 'nusinh-1471774443.jpg', 'VnExpress', 1, 0, 1471776553, 0, 1),
(336, 1, 'Ford Mútang Limited - xe thể thao mới cho dân chơi Việt', 'Mẫu coupe cơ bắp Mỹ xuất hiện tại Sài Gòn thuộc phiên bản kỷ niệm 50 năm ra đời của chú ngựa "pony" đầu tiên và sản xuất giới hạn 1.964 chiếc.', 'http://vnexpress.net/tin-tuc/oto-xe-may/ford-mutang-limited-xe-the-thao-moi-cho-dan-choi-viet-3455981.html', 'Mustang-50nam-SG-3-5710-1471754290.jpg', 'VnExpress', 1, 0, 1471776554, 0, 1),
(337, 1, 'Trước ngày tựu trường, nam sinh đi cướp giật', 'Chạy xe đến trung tâm TP Đà Lạt, Long giật chiếc iPhone 6s của người phụ nữ rồi rồ ga tẩu thoát nhưng được một km thì bị khống chế.', 'http://vnexpress.net/tin-tuc/phap-luat/truoc-ngay-tuu-truong-nam-sinh-di-cuop-giat-3456064.html', 'cuopgiat-1471773161.jpg', 'VnExpress', 1, 0, 1471776554, 0, 1),
(338, 1, 'Iran công bố ảnh hệ thống tên lửa tự sản xuất', 'Iran hôm nay công bố hình ảnh hệ thống tên lửa tầm xa đầu tiên do nước này tự sản xuất.', 'http://vnexpress.net/tin-tuc/the-gioi/quan-su/iran-cong-bo-anh-he-thong-ten-lua-tu-san-xuat-3456059.html', 'defense-468C7309219A4C3B94C74F-3565-9647-1471773051.jpg', 'VnExpress', 1, 0, 1471776554, 0, 1),
(339, 1, 'Ôtô con giá rẻ từ Ấn Độ ồ ạt vào Việt Nam', 'Ấn Độ đang dẫn đầu và là nước xuất khẩu ôtô dưới 9 chỗ ngồi lớn nhất vào Việt Nam.', 'http://kinhdoanh.vnexpress.net/tin-tuc/vi-mo/oto-con-gia-re-tu-an-do-o-at-vao-viet-nam-3456033.html', 'huyndai-1471764228-3127-1471764347.jpg', 'VnExpress', 1, 0, 1471776555, 0, 1),
(340, 1, 'Người dân ôm lợn đi tránh bão', 'Cơn bão số 3 (Dianmu) đổ bộ vào các tỉnh phía Bắc chiều 19/8 khiến nhiều nơi ngập sâu trong nước. Người dân phải chuyển đồ trong đêm để tránh lũ và những con lợn cũng được họ đưa đến nơi an toàn. Nguồn video: Facebook Tây Bắc', 'http://video.vnexpress.net/tin-tuc/camera-ban-doc/nguoi-dan-om-lon-di-tranh-bao-3455646.html', 'omlontranhbao-1471666906.jpg', 'VnExpress', 1, 0, 1471776555, 0, 1),
(341, 1, 'Ba xe sang dàn ngang đua trong đêm ở Hà Nội', 'Ba xe, trong đó có một BMW và một Mercedes cùng chạy đua trên quãng đường dài, liên tục rú ga. Video được độc giả Vũ Hoàng Tuấn quay lại đêm 13/8 trên đường Hùng Vương (Hà Nội).', 'http://video.vnexpress.net/tin-tuc/camera-ban-doc/ba-xe-sang-dan-ngang-dua-trong-dem-o-ha-noi-3455583.html', 'settop-1471663223.jpg', 'VnExpress', 1, 0, 1471776555, 0, 1),
(342, 1, 'Trộm xe máy vung dao chống trả khi bị người dân phát hiện', 'Bị truy đuổi, tên trộm bất ngờ quay lại rút dao ra khiến nam thanh niên bỏ chạy.', 'http://vnexpress.net/tin-tuc/cong-dong/video/trom-xe-may-vung-dao-chong-tra-khi-bi-nguoi-dan-phat-hien-3456001.html', 'trom-xe-may-9201-1471755151.jpg', 'VnExpress', 1, 0, 1471776556, 0, 1),
(343, 1, 'Chinese dams a threat to Lower Mekong River', 'China refuses to share information about operations at its dams during the dry season.', 'http://e.vnexpress.net/news/news/chinese-dams-a-threat-to-lower-mekong-river-3456038.html', 'chinadam-1471765732-6163-1471765933.jpg', 'VnExpress', 1, 0, 1471776559, 0, 1),
(344, 1, 'Việt Nam xuất siêu 2,3 tỷ USD 7 tháng đầu năm', 'Khối doanh nghiệp có vốn đầu tư nước ngoài đạt xuất siêu lớn nhất từ trước đến nay trong khi doanh nghiệp nội lại ở vị thế nhập siêu lớn trên 9,8 tỷ USD.', 'http://kinhdoanh.vnexpress.net/tin-tuc/vi-mo/viet-nam-xuat-sieu-2-3-ty-usd-7-thang-dau-nam-3456039.html', 'samsung-1471765875-9382-1471766061.jpg', 'VnExpress', 1, 0, 1471776560, 0, 1),
(345, 1, 'Dầu cù là Mac Phsu vang bóng một thời tái xuất', '“Bòn bon si cu la, bánh bao sữa hột gà, dầu cù là Mac Phsu...”, câu hát quen thuộc của trẻ con miền Nam, Việt Nam, một thời đủ thấy sự thông dụng và nổi tiếng của thương hiệu dầu cao một thời vang bóng.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/dau-cu-la-mac-phsu-vang-bong-mot-thoi-tai-xuat-3456017.html', 'a-tb-40-thang-tram-1-7911-1471759446.jpg', 'VnExpress', 1, 0, 1471776560, 0, 1),
(346, 1, 'Nuôi thỏ lãi 30 triệu đồng mỗi tháng', 'Sau 12 tháng khởi nghiệp với nghề nuôi thỏ, anh Hòa đã có thu nhập ổn định từ việc bán thỏ giống và thỏ thịt, mức lãi bình quân mỗi tháng 30 triệu đồng, vị chi thu nhập hơn 300 triệu đồng mỗi năm.', 'http://kinhdoanh.vnexpress.net/tin-tuc/khoi-nghiep/nuoi-tho-lai-30-trieu-dong-moi-thang-3456036.html', 'a-tb-nuoi-tho-lai-30-trieu-9581-1471765622.jpg', 'VnExpress', 1, 0, 1471776560, 0, 1),
(347, 1, 'Điểm hẹn cà phê của người mê ảnh ở Huế', 'Bày rất nhiều máy ảnh cũ, ảnh chụp kỷ niệm trên đường du lịch của chính chủ quán, cà phê Zoom do một người Huế xa quê mở ra để thỏa nỗi nhớ nhà.', 'http://dulich.vnexpress.net/photo/anh-video/diem-hen-ca-phe-cua-nguoi-me-anh-o-hue-3454807.html', 'Zoom-Cafe-01-1471515119.jpg', 'VnExpress', 1, 0, 1471776561, 0, 1),
(348, 1, 'Mỹ cảnh báo sẽ tự vệ nếu cần thiết ở Syria', 'Washington tuyên bố sẽ bảo vệ lực lượng đặc nhiệm Mỹ ở miền bắc Syria bằng biện pháp cần thiết nếu chiến đấu cơ của Damascus không kích vào nơi họ đóng quân.', 'http://vnexpress.net/tin-tuc/the-gioi/my-canh-bao-se-tu-ve-neu-can-thiet-o-syria-3456044.html', '635663555992439816-140218towns-4800-8406-1471768986.jpg', 'VnExpress', 1, 0, 1471776561, 0, 1),
(349, 1, 'Noo Phước Thịnh nhí nhảnh bên 15 học trò nhí', 'Nam ca sĩ thực hiện bộ ảnh cùng các học trò trong cuộc thi "The Voice Kids 2016".', 'http://giaitri.vnexpress.net/photo/trong-nuoc/noo-phuoc-thinh-nhi-nhanh-ben-15-hoc-tro-nhi-3455920.html', 'noo-phuoc-thinh-nhi-nhanh-ben-15-hoc-tro-nhi-1471746038.jpg', 'VnExpress', 1, 0, 1471776562, 0, 1),
(350, 1, 'Những tình huống khiến bạn nhận ra đã đến lúc cần ly dị', '"Tôi bị ngã gãy chân nhưng chồng nhất quyết không đưa vào viện vì ''đang mệt", một phụ nữ kể.', 'http://giadinh.vnexpress.net/tin-tuc/to-am/nhung-tinh-huong-khien-ban-nhan-ra-da-den-luc-can-ly-di-3455745.html', 'break-up-7404-1471680983.jpg', 'VnExpress', 1, 0, 1471776562, 0, 1),
(351, 1, 'Du học sinh về nước tìm việc', '40% trong số khoảng 1.200 ứng viên tham gia ngày hội nghề nghiệp Connect the Dots chiều qua tại Hà Nội là các du học sinh.', 'http://vnexpress.net/tin-tuc/giao-duc/du-hoc-sinh-ve-nuoc-tim-viec-3456045.html', 'duhoc-9783-1471767986.jpg', 'VnExpress', 1, 0, 1471776563, 0, 1),
(352, 1, 'Ronaldo tập với băng dán ở chân', 'Nhiều dấu hiệu cho thấy Cristiano Ronaldo sẽ không thể kịp trở lại trong trận mở màn La Liga của Real tối 21/8.', 'http://thethao.vnexpress.net/photo/hau-truong/ronaldo-tap-voi-bang-dan-o-chan-3456032.html', '3-1471763189.jpg', 'VnExpress', 1, 0, 1471776563, 0, 1),
(353, 1, 'Duterte threatens to pull Philippines out of UN', 'The Philippines President said he would invite everybody including China and the African (nations) to set up another international organization.', 'http://e.vnexpress.net/news/world/duterte-threatens-to-pull-philippines-out-of-un-3456041.html', 'duterte-1471766385-8638-1471766387.jpg', 'VnExpress', 1, 0, 1471776566, 0, 1),
(354, 1, 'Bolt ném lao, mừng kết thúc Olympic 2016', 'Ngôi sao người Jamaica kỷ niệm ba tấm HC vàng tại Rio de Janeiro bằng cách trổ tài phóng lao.', 'http://thethao.vnexpress.net/tin-tuc/cac-mon-khac/bolt-nem-lao-mung-ket-thuc-olympic-2016-3456000.html', 'bolt-1471752979-3162-1471753036.jpg', 'VnExpress', 1, 0, 1471776566, 0, 1),
(355, 1, 'Đồ ăn ngon nhất của các hãng hàng không', 'Pegasus Airlines của Thổ Nhĩ Kỳ là hãng có món thịt nướng ngon nhất, còn đồ ăn dành cho trẻ em thì Lufthansa của Đức và Eva Air của Đài Loan luôn chiếm được cảm tình của hành khách.', 'http://dulich.vnexpress.net/photo/anh-video/do-an-ngon-nhat-cua-cac-hang-hang-khong-3455043.html', '4-1471663060.jpg', 'VnExpress', 1, 0, 1471776567, 0, 1),
(356, 1, 'Những quyết định lịch sử của bà Mai Kiều Liên', 'Từ chối lời mời liên doanh béo bở của doanh nghiệp ngoại, vấp phải nhiều phản đối khi mua lại công ty thua lỗ nặng nề ở Mỹ, đi vào vùng chiến sự tại Iraq để tìm thị trường... là những thời khắc cân não của nữ CEO quyền lực nhất châu Á.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/nhung-quyet-dinh-lich-su-cua-ba-mai-kieu-lien-3455881.html', '14087400-1340691272607590-1885-3470-7844-1471765117.jpg', 'VnExpress', 1, 0, 1471776567, 0, 1),
(357, 1, 'Tuyến đường sắt Hà Nội - Lào Cai hoạt động trở lại', 'Do nước lũ sông Hồng đã rút, tuyến đường sắt qua địa bàn Yên Bái không còn ngập, ngành đường sắt đã cho các chuyến tàu vận hành trở lại.', 'http://vnexpress.net/tin-tuc/thoi-su/giao-thong/tuyen-duong-sat-ha-noi-lao-cai-hoat-dong-tro-lai-3456004.html', '139936-ngap-8223-1471756068.jpg', 'VnExpress', 1, 0, 1471776567, 0, 1),
(358, 1, 'Hơn 330 ha đất bị tái chiếm ở dự án công viên lớn nhất Sài Gòn', 'Thu hồi 12 năm nhưng chưa khiển khai, để hoang hóa, phần lớn đất trong Công viên Sài Gòn Safari ở huyện Củ Chi bị người dân tái chiếm để canh tác hoặc trồng cao su.', 'http://vnexpress.net/tin-tuc/thoi-su/hon-330-ha-dat-bi-tai-chiem-o-du-an-cong-vien-lon-nhat-sai-gon-3456024.html', 'cv1-5371-1434243764-9672-1471761657.jpg', 'VnExpress', 1, 0, 1471776567, 0, 1),
(359, 2, 'Nhân viên bán vé Máy Bay', '<p>Nh&acirc;n vi&ecirc;n b&aacute;n v&eacute; M&aacute;y Bay</p>\r\n', '<p>Nh&acirc;n vi&ecirc;n b&aacute;n v&eacute; M&aacute;y Bay</p>\r\n', '', 'Nhân viên bán vé Máy Bay', 0, 0, 1472320791, 0, 1),
(360, 1, '30 người đẹp HHVN trong phần giới thiệu ở đêm chung kết', '30 người đẹp trong phần giới thiệu ở đêm chung kết.', 'http://video.vnexpress.net/tin-tuc/sao/30-nguoi-dep-hhvn-trong-phan-gioi-thieu-o-dem-chung-ket-3459707.html', '30-nguoi-dep-hhvn-trong-phan-g-9003-3802-1472392993.jpg', 'VnExpress', 1, 0, 1472394930, 0, 1),
(361, 1, 'Thu Minh hát ''Ngọc ngà Việt Nam''', 'Đây là ca khúc nhạc sĩ Dương Khắc Linh viết riêng cho đêm chung kết HHVN 2016.', 'http://video.vnexpress.net/tin-tuc/sao/thu-minh-hat-ngoc-nga-viet-nam-3459709.html', 'thu-minh-hat-ngoc-nga-viet-nam-5981-4721-1472393320.jpg', 'VnExpress', 1, 0, 1472394930, 0, 1),
(362, 1, 'Man City - West Ham', 'Bóng lăn lúc 22h. Đội chủ nhà đứng trước mục tiêu phải giành chiến thắng nếu muốn bắt kịp hai kình địch là Chelsea và Man Utd trên bảng điểm.', 'http://thethao.vnexpress.net/tin-tuc/tuong-thuat/man-city-west-ham-3459676.html', 'm1-2327-1472390069.jpg', 'VnExpress', 1, 0, 1472394930, 0, 1),
(363, 1, 'Đâm vách núi đèo Bảo Lộc, cabin xe tải bị hất văng', 'Sau cú tông trực diện vào vách núi, cabin ôtô bị gỗ phía sau thùng dồn lên đẩy văng khỏi thân xe, biến dạng, kẹp cứng tài xế.', 'http://vnexpress.net/tin-tuc/thoi-su/giao-thong/dam-vach-nui-deo-bao-loc-cabin-xe-tai-bi-hat-vang-3459705.html', 'Ha-ng-nga-n-khu-c-go-tho-ng-tr-3698-3965-1472393964.jpg', 'VnExpress', 1, 0, 1472394931, 0, 1),
(364, 1, 'Tổng thống Philippines: Đàm phán với Trung Quốc phải dựa trên phán quyết của tòa', 'Tổng thống Philippines Rodrigo Duterte tuyên bố phán quyết từ tòa trọng tài quốc tế về vụ kiện Biển Đông phải là cơ sở cho bất kỳ cuộc đàm phán song phương nào với Trung Quốc.', 'http://vnexpress.net/tin-tuc/the-gioi/tong-thong-philippines-dam-phan-voi-trung-quoc-phai-dua-tren-phan-quyet-cua-toa-3459699.html', '20160307GCM11-1472392844.jpg', 'VnExpress', 1, 0, 1472394931, 0, 1),
(365, 1, '10 mẹo nhỏ để có tách cà phê thơm ngon', 'Cho vài hạt muối giúp cà phê đậm đà hơn. Bổ sung hương liệu như quế, thảo quả khiến cà phê có một hương vị đặc biệt.', 'http://giadinh.vnexpress.net/tin-tuc/noi-tro/10-meo-nho-de-co-tach-ca-phe-thom-ngon-3459387.html', '1-1472287222.jpg', 'VnExpress', 1, 0, 1472394931, 0, 1),
(366, 1, 'Dàn hoa hậu, á hậu các thời kỳ hội ngộ', 'Hà Kiều Anh, Thu Thảo và Ngọc Hân... đội vương miện lộng lẫy dự chung kết Hoa hậu Việt Nam 2016 tại TP HCM, tối 28/8.', 'http://giaitri.vnexpress.net/photo/trong-nuoc/dan-hoa-hau-a-hau-cac-thoi-ky-hoi-ngo-3459696.html', 'dan-hoa-hau-a-hau-cac-thoi-ky-hoi-ngo-1472392933.jpg', 'VnExpress', 1, 0, 1472394931, 0, 1),
(367, 1, 'Máy bay của Mỹ bung cầu phao trong lần đầu đến Tân Sơn Nhất', 'Bay khai trương đến sân bay Tân Sơn Nhất, cầu phao trượt của máy bay thuộc hãng hàng không Kalitta Air (Mỹ) bất ngờ bung khiến hành trình tiếp theo bị hoãn.', 'http://vnexpress.net/tin-tuc/thoi-su/may-bay-cua-my-bung-cau-phao-trong-lan-dau-den-tan-son-nhat-3459682.html', 'cau-phao-2594-1472386664.jpg', 'VnExpress', 1, 0, 1472394932, 0, 1),
(368, 1, 'Noo Phước Thịnh hát ''Sài Gòn đẹp lắm''', 'Giám khảo The Voice Kids mở màn chung kết Hoa hậu Việt Nam 2016 với ca khúc về Sài Gòn.', 'http://video.vnexpress.net/tin-tuc/sao/noo-phuoc-thinh-hat-sai-gon-dep-lam-3459704.html', 'noo-phuong-thinh-hat-sai-gon-d-4674-8855-1472392186.jpg', 'VnExpress', 1, 0, 1472394932, 0, 1),
(369, 1, 'Thua đậm, HAGL vẫn chắc suất trụ hạng ở V-League 2016', 'Đội bóng phố núi thất bại 1-3 trước Quảng Ninh nhưng vẫn trụ hạng thành công, do Long An tay trắng khi đến làm khách của Bình Dương.', 'http://thethao.vnexpress.net/tin-tuc/bong-da-trong-nuoc/thua-dam-hagl-van-chac-suat-tru-hang-o-v-league-2016-3459700.html', 'a0-7886-1472391086.jpg', 'VnExpress', 1, 0, 1472394932, 0, 1),
(370, 1, 'Máy chủ Opera bị hack, lộ mật khẩu người dùng', 'Công ty phát triển trình duyệt Opera cho biết dịch vụ của họ đã bị tin tặc tấn công, có thể làm lộ thông tin thành viên bao gồm tên đăng nhập và mật khẩu.', 'http://sohoa.vnexpress.net/tin-tuc/doi-song-so/bao-mat/may-chu-opera-bi-hack-lo-mat-khau-nguoi-dung-3459551.html', 'opera-1472350366.jpg', 'VnExpress', 1, 0, 1472394933, 0, 1),
(371, 1, 'Người phụ nữ tìm được tình yêu đích thực khi bị chồng bỏ vì ung thư', '"Nếu ai đó kể rằng nhờ mắc ung thư mà họ tìm hạnh phúc, tôi chẳng tin, cho tới khi chính tôi trải nghiệm điều đó", người phụ nữ Mỹ chia sẻ.', 'http://giadinh.vnexpress.net/tin-tuc/to-am/nguoi-phu-nu-tim-duoc-tinh-yeu-dich-thuc-khi-bi-chong-bo-vi-ung-thu-3459516.html', 'hanh-phuc-4097-1472340810.jpg', 'VnExpress', 1, 0, 1472394933, 0, 1),
(372, 1, 'Dàn sao chưng diện trên thảm đỏ Hoa hậu Việt Nam', 'Từ 19h30, thảm đỏ nhà thi đấu Phú Thọ chào đón nhiều gương mặt nổi tiếng của làng giải trí Việt.', 'http://video.vnexpress.net/tin-tuc/sao/dan-sao-chung-dien-tren-tham-do-hoa-hau-viet-nam-3459693.html', 'dan-sao-chung-dien-tren-tham-d-2416-4770-1472389917.jpg', 'VnExpress', 1, 0, 1472394933, 0, 1),
(373, 1, 'Thủ đoạn tận diệt hải sản khắp thế giới của ngư dân Trung Quốc', 'Ào ạt tràn ra các vùng biển khắp thế giới và đánh bắt theo kiểu tận diệt, ngư dân Trung Quốc đang đe dọa môi trường đại dương toàn cầu.', 'http://vnexpress.net/tin-tuc/the-gioi/tu-lieu/thu-doan-tan-diet-hai-san-khap-the-gioi-cua-ngu-dan-trung-quoc-3458900.html', 'chinesefishingboats-1472205577.jpg', 'VnExpress', 1, 0, 1472394933, 0, 1),
(374, 1, 'Bên trong vườn thú nổi tiếng ở Triều Tiên', 'Vườn thú trung tâm Bình Nhưỡng có hơn 5.000 con vật, nơi du khách có thể chụp hình cùng các loại chó lạ, lừa, lạc đà và tham quan khu trưng bày mô hình khủng long.', 'http://dulich.vnexpress.net/photo/anh-video/ben-trong-vuon-thu-noi-tieng-o-trieu-tien-3459164.html', '6-1472262627.jpg', 'VnExpress', 1, 0, 1472394934, 0, 1),
(375, 1, 'Thí sinh Hoa hậu Việt Nam 2016 bước vào phần thi áo tắm (Trực tiếp)', 'Đêm chung kết diễn ra tối 28/8 tại nhà thi đấu Phú Thọ, TP HCM.', 'http://giaitri.vnexpress.net/tin-tuc/gioi-sao/trong-nuoc/thi-sinh-hoa-hau-viet-nam-2016-buoc-vao-phan-thi-ao-tam-truc-tiep-3459687.html', 'ao-tam-3583-1472394579.jpg', 'VnExpress', 1, 0, 1472394934, 0, 1),
(376, 1, 'Phiến quân mang cờ IS cướp ngục ở Philippines', 'Nhóm phiến quân thề trung thành với Nhà nước Hồi giáo có tên Maute hôm qua cướp ngục và giải thoát 28 phạm nhân bị giam tại một nhà tù ở miền nam Philippines.', 'http://vnexpress.net/tin-tuc/the-gioi/phien-quan-mang-co-is-cuop-nguc-o-philippines-3459683.html', '3424-1472387911.jpg', 'VnExpress', 1, 0, 1472394934, 0, 1),
(377, 1, 'Đài truyền thanh ở Hội An bị chèn sóng Trung Quốc', 'Sự cố chèn sóng tiếng Trung Quốc xảy ra trong 20-25 phút tại 3 cụm loa ở Hội An ngay trước khi đài truyền thanh phường phát chương trình thường ngày.', 'http://vnexpress.net/tin-tuc/thoi-su/dai-truyen-thanh-o-hoi-an-bi-chen-song-trung-quoc-3459688.html', 'loa1-3677-1468837038-1220-1472387724.jpg', 'VnExpress', 1, 0, 1472394934, 0, 1),
(378, 1, 'Những thiếu gia Việt tài sản nghìn tỷ đình đám cộng đồng', 'Minh "Nhựa" vừa gây tranh cãi vì "uống thuốc ngủ tự tử do vợ bỏ ra đi". Cường "Đôla" thường xuyên nổi bật trên mạng xã hội vì mối tình với Hạ Vi...', 'http://vnexpress.net/tin-tuc/cong-dong/nhung-thieu-gia-viet-tai-san-nghin-ty-dinh-dam-cong-dong-3459653.html', 'thieugianghinty-1472388436.jpg', 'VnExpress', 1, 0, 1472394934, 0, 1),
(379, 1, 'Hải Phòng lỡ cơ hội trở lại ngôi đầu V-League', 'Mở tỷ số từ phút thứ ba, hơn người trong 30 phút cuối trận, nhưng Hải Phòng vẫn thua ngược 2-3 trên sân Cần Thơ.', 'http://thethao.vnexpress.net/tin-tuc/bong-da-trong-nuoc/hai-phong-lo-co-hoi-tro-lai-ngoi-dau-v-league-3459686.html', 'a2-9922-1472386549.jpg', 'VnExpress', 1, 0, 1472394936, 0, 1),
(380, 1, 'Người dân la hét khi hàng chục côn đồ truy sát khách ở quán nhậu', 'Mang hung khí, hàng chục nam thanh niên lao vào truy sát nhóm khách 20 người đang ngồi trong quán nhậu ở khu vực cầu Tó (Thanh Trì, Hà Nội). Cuộc hỗn chiến gây náo loạn cả tuyến đường, nhiều người dân hoảng sợ la hét. Vụ việc xảy ra đêm 27/8 được một ngườ', 'http://video.vnexpress.net/tin-tuc/camera-ban-doc/nguoi-dan-la-het-khi-hang-chuc-con-do-truy-sat-khach-o-quan-nhau-3459662.html', 'danhnhau-1472376810.jpg', 'VnExpress', 1, 0, 1472394936, 0, 1),
(381, 1, 'Cần Thơ 3-2 Hải Phòng', 'Thất bại trước đội chủ nhà Cần Thơ ở vòng 23 V-League khiến đội bóng đất cảng đánh mất cơ hội vươn lên dẫn đầu bảng điểm.', 'http://video.vnexpress.net/tin-tuc/bong-da/can-tho-3-2-hai-phong-3459685.html', 'can-tho-3-2-hai-phong-14723863-6634-5426-1472386364.jpg', 'VnExpress', 1, 0, 1472394936, 0, 1),
(382, 1, 'Thổ Nhĩ Kỳ tiếp tục oanh kích Syria, ít nhất 20 dân thường chết', 'Các vụ pháo kích và oanh tạc của Thổ Nhĩ Kỳ làm ít nhất 20 người chết ở Syria, khi Ankara đang mở rộng vai trò quân sự trong cuộc xung đột. ', 'http://vnexpress.net/tin-tuc/the-gioi/tho-nhi-ky-tiep-tuc-oanh-kich-syria-it-nhat-20-dan-thuong-chet-3459657.html', '019507714303001-1472386124.jpg', 'VnExpress', 1, 0, 1472394936, 0, 1),
(383, 1, 'Thí sinh Hoa hậu Việt Nam rạng rỡ trước giờ chung kết', 'Các cô gái được chuyên viên trang điểm chăm chút ở hậu trường chung kết cuộc thi nhan sắc, tối 28/8, tại TP HCM.', 'http://giaitri.vnexpress.net/photo/trong-nuoc/thi-sinh-hoa-hau-viet-nam-rang-ro-truoc-gio-chung-ket-3459681.html', 'thi-sinh-hoa-hau-rang-ro-trong-hau-truong-truoc-gio-g-1472385703.jpg', 'VnExpress', 1, 0, 1472394937, 0, 1),
(384, 1, '7 bài tập thư giãn ngay trên máy bay', 'Chỉ bằng các động tác đơn giản như xoay bàn chân, gập người và đi bộ, bạn sẽ loại bỏ được phần nào sự nhức mỏi do ngồi lâu trên máy bay.', 'http://vnexpress.net/infographics/tu-van/7-bai-tap-thu-gian-ngay-tren-may-bay-3459334.html', '07-1472274629.jpg', 'VnExpress', 1, 0, 1472394937, 0, 1);

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
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `view` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `desc`, `content`, `view`, `like`, `image`, `active`, `date_create`, `date_update`, `author`) VALUES
(1, 'Tinh khuc bolero', '<p>Tinh khuc bolero</p>\r\n', '', 0, 0, 'Desert6.jpg', 1, 1472573394, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `typeads`
--

CREATE TABLE `typeads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `display` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeads`
--

INSERT INTO `typeads` (`id`, `title`, `icon`, `display`, `active`) VALUES
(1, 'short text', '', 1, 1),
(2, 'short text & short image', '', 2, 1),
(3, 'short text & image', '', 3, 1),
(4, 'short text & long image', '', 4, 1),
(5, 'text', '', 2, 1),
(6, 'text & short image', '', 3, 1),
(7, 'text & image', '', 4, 1),
(8, 'long text & short image', '', 4, 1),
(9, 'short image', '', 1, 1),
(10, 'image', '', 2, 1),
(11, 'long image', '', 3, 1);

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
(1, 'vip', 'fa-share-alt-square', 1);

-- --------------------------------------------------------

--
-- Table structure for table `typemuti`
--

CREATE TABLE `typemuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typemuti`
--

INSERT INTO `typemuti` (`id`, `title`, `icon`, `active`) VALUES
(1, 'tinh cam', '', 1),
(2, 'hai huoc', '', 1),
(3, 'giao duc', '', 1),
(4, 'khoa hoc', '', 1);

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
-- Indexes for table `catads`
--
ALTER TABLE `catads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catjobs`
--
ALTER TABLE `catjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catmuti`
--
ALTER TABLE `catmuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catnews`
--
ALTER TABLE `catnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- Indexes for table `muti`
--
ALTER TABLE `muti`
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
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeads`
--
ALTER TABLE `typeads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typejobs`
--
ALTER TABLE `typejobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typemuti`
--
ALTER TABLE `typemuti`
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
-- AUTO_INCREMENT for table `catads`
--
ALTER TABLE `catads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catjobs`
--
ALTER TABLE `catjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catmuti`
--
ALTER TABLE `catmuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `muti`
--
ALTER TABLE `muti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `typeads`
--
ALTER TABLE `typeads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `typejobs`
--
ALTER TABLE `typejobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `typemuti`
--
ALTER TABLE `typemuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `new`
--
CREATE DATABASE IF NOT EXISTS `new` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `new`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `catads` int(11) NOT NULL,
  `typeads` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `catads`, `typeads`, `title`, `desc`, `content`, `active`, `date_create`, `date_update`, `author`, `image`, `location`, `view`, `from`) VALUES
(44, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829541, 1471852599, 1, 'Chrysanthemum1.jpg', 1, 0, ''),
(45, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829925, 0, 1, 'Penguins1.jpg', 1, 0, ''),
(46, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829935, 0, 1, 'Jellyfish1.jpg', 1, 0, ''),
(47, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829970, 0, 1, 'Tulips1.jpg', 1, 0, ''),
(48, 1, 7, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829980, 0, 1, 'Penguins2.jpg', 1, 0, ''),
(49, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471829990, 0, 1, 'Chrysanthemum2.jpg', 1, 0, ''),
(50, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830030, 0, 1, 'Penguins3.jpg', 1, 0, ''),
(51, 1, 8, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830042, 0, 1, 'Penguins4.jpg', 1, 0, ''),
(52, 1, 11, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830054, 0, 1, 'Jellyfish2.jpg', 1, 0, ''),
(53, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830071, 0, 1, 'Koala1.jpg', 1, 0, ''),
(54, 1, 4, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830276, 0, 1, 'Hydrangeas1.jpg', 1, 0, ''),
(55, 1, 9, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830294, 0, 1, 'Tulips2.jpg', 1, 0, ''),
(56, 1, 2, 'Lorem ipsum dolor sit amet, dicat zril ea vis', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Iu', '<p>Lorem ipsum dolor sit amet, dicat zril ea vis, mentitum recusabo incorrupte id nec, an vel mundi regione aliquam. Cum mucius incorrupte ei, te vel euismod eruditi pertinax. Vero eirmod iisque ad est, solet feugiat ei nam, ut mei atqui mucius omnium. Ius libris graecis detraxit et, eos insolens gubergren te. Ex mel vero affert putant, nisl consetetur te mea.</p>\r\n\r\n<p>Unum wisi zril eu quo. No suavitate scriptorem voluptatibus sea. Alia aperiri efficiantur quo in, ei errem omnesque concludaturque vix. Ne dolore diceret vim, id suas enim vim. Cu mel eruditi accusam, ut eius rebum recteque duo.</p>\r\n\r\n<p>Est ad augue deserunt, sed in aeterno tritani voluptua. Usu iudico essent ne, aliquando forensibus eam in. Purto vitae soleat nam ex, eam ut erant saperet, ceteros menandri tincidunt mea no. In posse vivendum periculis est, ea est iudico quidam.</p>\r\n\r\n<p>Mel ipsum diceret incorrupte ad, at oportere forensibus sententiae vim. Sit ea meis quidam utroque, munere quaeque at pri. Choro fierent adolescens te quo, mazim oporteat abhorreant cu his. Fugit causae ut eum.</p>\r\n\r\n<p>Graeci percipitur cu duo. Te pri ipsum forensibus, quo sonet facete an, at usu wisi bonorum recusabo. An vis minim phaedrum iudicabit, probo regione pertinax sit eu. Ad habeo nostrum sed, everti equidem definitiones duo ea. Duo verear mandamus petentium in. Nec ad commune expetendis, cibo praesent rationibus ad per.</p>\r\n', 1, 1471830319, 1471835642, 1, 'Lighthouse1.jpg', 1, 0, ''),
(57, 1, 2, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', '<p>an ph&uacute; pleiku gia lai</p>\r\n', '<p>?? thi Violympic To&aacute;n ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016</p>\r\n', 1, 1471835902, 1471836340, 1, 'Tulips4.jpg', 1, 0, 'Xu lanh'),
(58, 1, 1, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', 'an phú pleiku gia lai', '<p>?? thi Violympic To&aacute;n ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016</p>\r\n', 1, 1471836161, 1471836486, 1, 'Tulips5.jpg', 1, 0, 'Xu lanh'),
(59, 2, 2, '?? thi Violympic Toán ti?ng Anh l?p 4 Qu?c gia n?m h?c 2015-2016', '123', '', 1, 1471836744, 1471836906, 1, 'Lighthouse2.jpg', 1, 0, 'Xu lanh');

-- --------------------------------------------------------

--
-- Table structure for table `catads`
--

CREATE TABLE `catads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catads`
--

INSERT INTO `catads` (`id`, `title`, `icon`, `active`) VALUES
(1, 'dien may', '', 1),
(2, 'may mac', '', 1);

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
-- Table structure for table `catmuti`
--

CREATE TABLE `catmuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Rss', 'fa-rss', 1),
(2, 'Xứ lạnh', 'fa-gg', 1),
(3, 'Gia Lai', 'fa-map-marker', 1),
(4, 'Top', 'fa-genderless', 1);

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
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `catjobs`, `typejobs`, `title`, `desc`, `content`, `image`, `active`, `view`, `salary`, `location`, `date_create`, `date_update`, `author`, `from`) VALUES
(12, 1, 1, 'Nhân viên bán vé Máy Bay', 'huyanhit@gmail.com', '<p>b&aacute;n v&eacute; m&aacute;y bay</p>\r\n', '', 1, 0, 6, 1, 1471519199, 0, 1, 'vnairline'),
(13, 1, 1, 'Nhân viên phục vụ', '123', '<p>Nh&acirc;n vi&ecirc;n phục vụ kraoke</p>\r\n', 'Tulips3.jpg', 0, 0, 3, 1, 1471835608, 0, 1, 'thach pham');

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
-- Table structure for table `muti`
--

CREATE TABLE `muti` (
  `id` int(11) NOT NULL,
  `catmuti` int(11) NOT NULL,
  `typemuti` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `catnews` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `from` varchar(25) CHARACTER SET utf8 NOT NULL,
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
(359, 1, 'Thử tài đoán xe tại Việt Nam - tuần 4 tháng 8', 'Thông qua những chi tiết nhỏ như đèn pha, lưới tản nhiệt, táp-lô, liệu bạn có thể nhận biết đó là mẫu xe nào?', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/thu-tai-doan-xe-tai-viet-nam-tuan-4-thang-8-3456043.html', '2016-Hyundai-Tucson-FWD-14-7861-1471828397.jpg', 'VnExpress', 1, 0, 1471828967, 0, 1),
(360, 1, 'Họp báo công bố chất lượng nước biển 4 tỉnh miền Trung', '8h sáng 22/8, Bộ Tài nguyên và Môi trường chủ trì hội nghị công bố hiện trạng môi trường biển từ Hà Tĩnh đến Thừa Thiên - Huế, sau sự cố xả thải của Formosa làm hải sản chết hàng loạt.', 'http://vnexpress.net/tin-tuc/thoi-su/hop-bao-cong-bo-chat-luong-nuoc-bien-4-tinh-mien-trung-3456202.html', 'bienmientrung92951471792583-1471828436.jpg', 'VnExpress', 1, 0, 1471828967, 0, 1),
(361, 1, 'Apple sẽ chỉ ra hai phiên bản iPhone mới', 'Mẫu iPhone 7 Pro có thể được Apple "khai tử", hãng chỉ phát hành iPhone 7 màn hình 4,7 inch và phablet 7 Plus màn hình 5,5 inch.', 'http://sohoa.vnexpress.net/tin-tuc/san-pham/dien-thoai/apple-se-chi-ra-hai-phien-ban-iphone-moi-3456082.html', 'threep-3403-1471784570.png', 'VnExpress', 1, 0, 1471828967, 0, 1),
(362, 1, 'Biến cố gia đình đã buộc tôi phải tích lũy mua nhà', 'Nhiều năm đi làm, chị Nguyên chỉ tiết kiệm được 20 triệu vì đổi điện thoại, laptop liên tục. Biến cố gia đình đã chấm dứt điều đó.', 'http://giadinh.vnexpress.net/tin-tuc/tieu-dung/bien-co-gia-dinh-da-buoc-toi-phai-tich-luy-mua-nha-3455334.html', '1-1471654212.jpg', 'VnExpress', 1, 0, 1471828967, 0, 1),
(363, 1, '400 triệu nên mua lại Mitsubishi Zinger?', 'Tôi muốn mua xe 7 chỗ cũ thấy Zinger có giá trong khả năng, đời xe không quá sâu, xin hỏi có nên mua lại dòng xe này (Lê Tài).', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/400-trieu-nen-mua-lai-mitsubishi-zinger-3456189.html', 'MitsubishiZinger20092JPG-14718-8827-1989-1471826852.jpg', 'VnExpress', 1, 0, 1471828967, 0, 1),
(364, 1, 'Lớp màng mỏng hơn sợi tóc giúp người mù lấy lại thị lực', 'Các nhà khoa học Australia phát triển công nghệ nuôi cấy tế bào giác mạc trên lớp màng hydrogel trong suốt, có thể dùng để cấy ghép mắt và phục hồi thị lực cho người mù.', 'http://vnexpress.net/tin-tuc/khoa-hoc/ky-thuat-moi/lop-mang-mong-hon-soi-toc-giup-nguoi-mu-lay-lai-thi-luc-3456168.html', 'VNEEye-1471822400.jpg', 'VnExpress', 1, 0, 1471828968, 0, 1),
(365, 1, 'Bức ảnh gây sốc vì nghi ngờ có ma trong nhà thờ', 'Sau khi xem lại bức ảnh chụp con trai trong một nhà thờ ở Anh, người mẹ đã sốc khi nhìn thấy con ma xuất hiện.', 'http://dulich.vnexpress.net/tin-tuc/quoc-te/buc-anh-gay-soc-vi-nghi-ngo-co-ma-trong-nha-tho-3456022.html', 'ma3-1471761056.jpg', 'VnExpress', 1, 0, 1471828968, 0, 1),
(366, 1, 'Chống lão hóa, làm đẹp da với chiết xuất từ vi tảo lục Nhật Bản', 'Vi tảo lục chứa Astaxanthin trở thành bí quyết đẩy lùi nám sạm tàn nhang và giữ gìn tuổi xuân, nhan sắc của nhiều mỹ nhân hoàng gia Nhật Bản từ thuở xa xưa cho đến nay.', 'http://suckhoe.vnexpress.net/tin-tuc/khoe-dep/chong-lao-hoa-lam-dep-da-voi-chiet-xuat-tu-vi-tao-luc-nhat-ban-3455332.html', '19-8-20165-1114159819-jpeg-3519-1471656663.png', 'VnExpress', 1, 0, 1471828969, 0, 1),
(367, 1, 'Sàn giao dịch trực tuyến đầu tiên cho vận tải đường thủy', 'Với ứng dụng trên điện thoại thông minh, chủ sà lan kết nối trực tiếp với người cần vận chuyển hàng mà không phải qua trung gian như trước.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/san-giao-dich-truc-tuyen-dau-tien-cho-van-tai-duong-thuy-3455351.html', '19-8-201647-465055134-1672-1471607338.jpeg', 'VnExpress', 1, 0, 1471828969, 0, 1),
(368, 1, 'Có nên chờ mua Fortuner 2017 vào cuối năm tại Việt Nam?', 'Tôi muốn mua xe 7 chỗ giá khoảng 1,4 tỷ, phân vân không biết nên mua luôn bây giờ hay chờ đến cuối năm Fortuner mới ra mắt (Bình Dương).', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/co-nen-cho-mua-fortuner-2017-vao-cuoi-nam-tai-viet-nam-3456190.html', 'maxresdefault-1471827121-7833-1471827196.jpg', 'VnExpress', 1, 0, 1471828970, 0, 1),
(369, 1, 'Người đàn ông Ấn Độ nuốt 40 con dao vào bụng', 'Các bác sĩ ở bắc Ấn Độ lấy ra 40 con dao trong bụng một cảnh sát.', 'http://vnexpress.net/tin-tuc/the-gioi/cuoc-song-do-day/nguoi-dan-ong-an-do-nuot-40-con-dao-vao-bung-3456175.html', 'kkkk-2564-1471827254.jpg', 'VnExpress', 1, 0, 1471828970, 0, 1),
(370, 1, 'Two endangered primates rescued in Vietnam', 'Both of them are listed in the red books of Vietnam and the world.', 'http://e.vnexpress.net/news/news/two-endangered-primates-rescued-in-vietnam-3456150.html', '2-1471798672-9994-1471798791.jpg', 'VnExpress', 1, 0, 1471828970, 0, 1),
(371, 1, 'Cách phân biệt cà chua thường và cà chua biến đổi gen', 'Bổ đôi quả cà chua ra, bạn sẽ thấy cà chua bình thường không mọng đỏ đều như cà chua đã biến đổi gen.', 'http://giadinh.vnexpress.net/tin-tuc/noi-tro/cach-phan-biet-ca-chua-thuong-va-ca-chua-bien-doi-gen-3456142.html', 'chua14-5723-1471797140.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(372, 1, '''Vương quốc hành tím'' những ngày cuối vụ thu hoạch', 'Những cánh đồng hành tím bạt ngàn đang được nông dân huyện đảo Lý Sơn đưa về đất liền để kịp làm đất cho mùa vụ mới.', 'http://dulich.vnexpress.net/photo/anh-video/vuong-quoc-hanh-tim-nhung-ngay-cuoi-vu-thu-hoach-3455649.html', '14037430-1046122665495434-2114345211-o-1471393391.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(373, 1, 'Xe đăng ký ghi xanh đen độ sang xanh dương có được?', 'Xe của em là Honda Future 2 bản xanh lá và đen, trong đăng ký xe ghi xanh đen (Trần Vĩ Cường).', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/xe-dang-ky-ghi-xanh-den-do-sang-xanh-duong-co-duoc-3455849.html', 'hoda-1471707240-8373-1471707330.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(374, 1, 'Những xe cũ 500 triệu phổ biến tại Việt Nam', 'Số tiền này có thể mua được xe mới, nhưng chủ yếu là xe hạng nhỏ nên nhiều người chọn phương án mua lại xe cũ rộng rãi và tiện nghi hơn.', 'http://vnexpress.net/tin-tuc/oto-xe-may/nhung-xe-cu-500-trieu-pho-bien-tai-viet-nam-3453905.html', 'kia-6800-1471670158.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(375, 1, 'Thủ tướng Singapore ngất khi phát biểu trên truyền hình trực tiếp', 'Thủ tướng Singapore Lý Hiển Long tối qua đứng không vững trên sân khấu rồi bất ngờ ngã quỵ trong lúc đang đọc một bài diễn văn quan trọng được phát trực tiếp qua sóng truyền hình.', 'http://vnexpress.net/tin-tuc/the-gioi/thu-tuong-singapore-ngat-khi-phat-bieu-tren-truyen-hinh-truc-tiep-3456162.html', 'pmlee1-1471824503.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(376, 1, 'Thiếu niên 12 tuổi bị lột bỏ đai đánh bom tự sát ở Iraq', 'Một cậu bé định đánh bom tự sát ở miền bắc Iraq bị khống chế trước khi thực hiện vụ tấn công.', 'http://vnexpress.net/tin-tuc/the-gioi/thieu-nien-12-tuoi-bi-lot-bo-dai-danh-bom-tu-sat-o-iraq-3456170.html', '3778DF49000005783751972imagea7-6960-6175-1471824635.jpg', 'VnExpress', 1, 0, 1471828971, 0, 1),
(377, 1, 'Những ngôi sao bị Pep Guardiola bỏ rơi', 'Thủ môn Joe Hart và tiền vệ Yaya Toure của Man City là hai người mới nhất có tên trong danh sách các cầu thủ đẳng cấp bị HLV người Tây Ban Nha gạt khỏi đội hình chính tại các CLB.', 'http://thethao.vnexpress.net/photo/giai-ngoai-hang-anh/nhung-ngoi-sao-bi-pep-guardiola-bo-roi-3456171.html', 'guardiola-and-ibrahimovic-1471824473.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(378, 1, 'Những đứa trẻ luôn phải được nâng niu nhẹ nhàng', 'Bị gia đình bỏ rơi khi chào đời với hình dáng khác thường do căn bệnh xương thủy tinh, Dung được đưa về Làng cá sấu Hoa Cà nuôi dưỡng 4 năm nay.', 'http://suckhoe.vnexpress.net/tin-tuc/cac-benh/nhung-dua-tre-luon-phai-duoc-nang-niu-nhe-nhang-3455257.html', 'IMG-5436-JPG-8665-1471705756.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(379, 1, 'Thả rơi Samsung Galaxy Note 7 từ độ cao 300 mét', 'Sau nhiều màn tra tấn, phablet mới của Samsung tiếp tục được thử thách khi đưa máy lên độ cao hơn 300 mét bằng drone, rồi thả rơi tự do xuống nền cứng.', 'http://sohoa.vnexpress.net/tin-tuc/san-pham/dien-thoai/tha-roi-samsung-galaxy-note-7-tu-do-cao-300-met-3455800.html', 'galaxynote745-1471693061.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(380, 1, '5 lựa chọn smartphone màn hình lớn, giá rẻ hơn Galaxy Note 7', 'Motorola Z Force Droid, ZTE Axon 7, OnePlus 3, Mate 8 đều là những model có màn hình kích thước lớn từ 5,5 đến 6 inch nhưng giá bán rẻ hơn Galaxy Note 7. ', 'http://sohoa.vnexpress.net/tin-tuc/san-pham/dien-thoai/5-lua-chon-smartphone-man-hinh-lon-gia-re-hon-galaxy-note-7-3455655.html', 'mate8-2437-1471669755.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(381, 1, 'Vợ chồng Vardy bị chê quá hà tiện', 'Nhiều CĐV phát hiện tiền đạo Jamie Vardy và bà xã Rebekah đi mua sắm tại siêu thị Costco, nơi chủ yếu phục vụ khách hàng bình dân và có nhiều mặt hàng giá rẻ.', 'http://thethao.vnexpress.net/tin-tuc/hau-truong/vo-chong-vardy-bi-che-qua-ha-tien-3456034.html', 'vardy-9314-1471768311.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(382, 1, 'Nhà vệ sinh bệnh viện', 'Chỉ trong vòng ba tháng, tại ba hội nghị khác nhau, Bộ trưởng Y tế ba lần nhắc tới “nhà vệ sinh bệnh viện” như một hình ảnh tiêu biểu cho chất lượng dịch vụ của hệ thống bệnh viện nước ta.', 'http://vnexpress.net/tin-tuc/goc-nhin/nha-ve-sinh-benh-vien-3456169.html', 'DucHoangjpg1446781066-1471822002.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1),
(383, 1, 'Andy Murray 0-2 Marin Cilic', 'Chiến thắng sau hai set với tỷ số 6-4, 7-5 giúp Marin Cilic đăng quang tại giải Cincinnati hôm 22/8.', 'http://video.vnexpress.net/tin-tuc/tennis/andy-murray-0-2-marin-cilic-3456167.html', '1471816896ten8-1471822488.jpg', 'VnExpress', 1, 0, 1471828972, 0, 1);

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
-- Table structure for table `typeads`
--

CREATE TABLE `typeads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `display` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeads`
--

INSERT INTO `typeads` (`id`, `title`, `icon`, `display`, `active`) VALUES
(1, 'short text', '', 1, 1),
(2, 'short text & short image', '', 2, 1),
(3, 'short text & image', '', 3, 1),
(4, 'short text & long image', '', 4, 1),
(5, 'text', '', 2, 1),
(6, 'text & short image', '', 3, 1),
(7, 'text & image', '', 4, 1),
(8, 'long text & short image', '', 4, 1),
(9, 'short image', '', 1, 1),
(10, 'image', '', 2, 1),
(11, 'long image', '', 3, 1);

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
(1, 'vip', 'fa-share-alt-square', 1);

-- --------------------------------------------------------

--
-- Table structure for table `typemuti`
--

CREATE TABLE `typemuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catads`
--
ALTER TABLE `catads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catjobs`
--
ALTER TABLE `catjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catmuti`
--
ALTER TABLE `catmuti`
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
-- Indexes for table `muti`
--
ALTER TABLE `muti`
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
-- Indexes for table `typeads`
--
ALTER TABLE `typeads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typejobs`
--
ALTER TABLE `typejobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typemuti`
--
ALTER TABLE `typemuti`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `catads`
--
ALTER TABLE `catads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catjobs`
--
ALTER TABLE `catjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catmuti`
--
ALTER TABLE `catmuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `muti`
--
ALTER TABLE `muti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;
--
-- AUTO_INCREMENT for table `typeads`
--
ALTER TABLE `typeads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `typejobs`
--
ALTER TABLE `typejobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `typemuti`
--
ALTER TABLE `typemuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"laravel","table":"playlist"},{"db":"laravel","table":"muti"},{"db":"laravel","table":"typemuti"},{"db":"laravel","table":"catmuti"},{"db":"laravel","table":"comment"},{"db":"laravel","table":"typeads"},{"db":"laravel","table":"catads"},{"db":"laravel","table":"news"},{"db":"laravel","table":"ads"},{"db":"laravel","table":"jobs"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'laravel', 'jobs', '{"sorted_col":"`jobs`.`id`  DESC"}', '2016-08-16 16:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-06-13 15:17:06', '{"collation_connection":"utf8mb4_general_ci"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
