-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 02:47 AM
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
  `from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `catads`, `typeads`, `title`, `desc`, `content`, `active`, `date_create`, `date_update`, `author`, `image`, `location`, `view`, `from`) VALUES
(22, 1, 8, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471700149, 1471881500, 1, 'Penguins.jpg', 1, 0, 'huy'),
(23, 1, 3, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471787646, 1471787922, 1, 'dat-dat-quan-12--an-phu-dong--duong-nhua-5-met-3474517966.jpg', 1, 0, ''),
(24, 1, 8, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471787850, 1471797990, 1, 'Chrysanthemum1.jpg', 1, 0, ''),
(25, 1, 1, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788116, 1471797996, 1, 'Desert.jpg', 1, 0, ''),
(26, 1, 7, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788134, 1471798003, 1, 'Hydrangeas.jpg', 1, 0, ''),
(27, 1, 9, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788142, 1471798009, 1, 'Jellyfish.jpg', 1, 0, ''),
(28, 1, 10, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788150, 1471798019, 1, 'Koala1.jpg', 1, 0, ''),
(29, 1, 6, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788158, 1471798025, 1, 'Lighthouse.jpg', 1, 0, ''),
(30, 1, 4, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788168, 0, 1, 'Penguins1.jpg', 1, 0, ''),
(31, 1, 4, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788178, 1471788209, 1, 'Tulips1.jpg', 1, 0, ''),
(32, 1, 1, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788228, 0, 1, 'Chrysanthemum2.jpg', 1, 0, ''),
(33, 1, 2, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788240, 0, 1, 'Desert1.jpg', 1, 0, ''),
(34, 1, 9, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788258, 1471788268, 1, 'Tulips2.jpg', 1, 0, ''),
(35, 1, 9, 'Lorem ipsum dolor sit amet, cum ad democritum ', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel ea. Cu feugait urbanitas pri, ius id saepe soleat suscipiantur. Eam duis dolore suscipiantur ea, rebum tibique concludaturque vis eu. Duo ea atqui facilisis.</p>\r\n\r\n<p>Est labore mediocrem intellegat id, omnesque periculis adolescens eu quo, nec aperiri malorum ut. Cu mea diam adhuc comprehensam. Ei assum nullam lobortis pri, malorum liberavisse reprehendunt ut mel. Usu dolor corrumpit ut, esse tamquam laboramus mea no. Ut mea alterum consulatu, usu ex doctus urbanitas constituto.</p>\r\n\r\n<p>Unum elit perpetua mea at, ei sea exerci aliquando, id nam graeco epicuri. Mei in mucius impedit sapientem, inani malorum ius in. Quas laboramus no vis, alterum vivendo sit ne, reformidans disputationi id his. Albucius recteque vituperatoribus nam ad.</p>\r\n', 1, 1471788280, 0, 1, 'Jellyfish1.jpg', 1, 0, ''),
(36, 1, 3, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788342, 0, 1, 'Chrysanthemum3.jpg', 1, 0, ''),
(37, 1, 5, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788352, 0, 1, 'Hydrangeas1.jpg', 1, 0, ''),
(38, 1, 11, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788364, 0, 1, 'Lighthouse1.jpg', 1, 0, ''),
(39, 1, 9, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788373, 0, 1, 'Tulips3.jpg', 1, 0, ''),
(40, 1, 6, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788384, 0, 1, 'Jellyfish2.jpg', 1, 0, ''),
(41, 1, 2, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788399, 0, 1, 'Hydrangeas2.jpg', 1, 0, ''),
(42, 1, 7, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788410, 0, 1, 'Lighthouse2.jpg', 1, 0, ''),
(43, 1, 7, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e', '<p>Lorem ipsum dolor sit amet, cum ad democritum accommodare signiferumque. Et vel quod summo elaboraret, vim ad atqui virtute, pri adhuc sonet theophrastus te. Mei in nisl omnium labitur, choro offendit dissentias ei vix, veritus senserit conceptam vel e</p>\r\n', 1, 1471788420, 0, 1, 'Koala2.jpg', 1, 0, ''),
(44, 1, 1, 'ban acc lol kc5', 'asd', '<p>asdasd</p>\r\n', 0, 1471881214, 1471881484, 1, 'Penguins2.jpg', 1, 0, 'asda');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
