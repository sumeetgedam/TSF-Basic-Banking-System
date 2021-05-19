-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2021 at 08:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `amount`) VALUES
(1, 'Allen Waters', 'allenwaters@abantecart.com', 985918),
(2, 'Anthony Blair', 'anthonyblair@abantecart.com', 998260),
(3, 'Bernard Horne', 'bernardhorne@gmail.com', 999715),
(4, 'Bruce Rosairini', 'brucerosairini@gmail.com', 1001577),
(5, 'Carios Compton', 'carioscmpton@gmail.com', 1003100),
(6, 'Garrison Baxter', 'garisonbaxtor@gmail.com', 1000500),
(7, 'Gloria Macias', 'gloriamacias@gmail.com', 1010462),
(8, 'James Curtis', 'jamescurtis@gmail.com', 1000495),
(9, 'Juliana Davis', 'julidavis@gmail.com', 1001050),
(10, 'Keely Mccoy', 'keelymccoy@gmail.com', 998923);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fromuser` varchar(255) NOT NULL,
  `touser` varchar(255) NOT NULL,
  `transamount` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `fromuser`, `touser`, `transamount`) VALUES
(1, 'Allen Waters', 'Carios Compton', 1000),
(2, 'Anthony Blair', 'Juliana Davis', 500),
(3, 'Anthony Blair', 'Garrison Baxter', 500),
(4, 'James Curtis', 'Keely Mccoy', 20),
(5, 'Bernard Horne', 'James Curtis', 5),
(6, 'Bruce Rosairini', 'Keely Mccoy', 3),
(7, 'Allen Waters', 'Gloria Macias', 10000),
(8, 'Bruce Rosairini', 'James Curtis', 500),
(9, 'Allen Waters', 'Bruce Rosairini', 500),
(10, 'Anthony Blair', 'Bernard Horne', 140),
(11, 'Allen Waters', 'Carios Compton', 1000),
(12, 'Keely Mccoy', 'Bruce Rosairini', 1000),
(13, 'Keely Mccoy', 'Carios Compton', 100),
(14, 'Juliana Davis', 'Bruce Rosairini', 450),
(15, 'Allen Waters', 'Bruce Rosairini', 100),
(16, 'Allen Waters', 'Gloria Macias', 462);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
