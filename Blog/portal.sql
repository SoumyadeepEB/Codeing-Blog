-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2020 at 06:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `post` int(100) NOT NULL AUTO_INCREMENT,
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`post`, `id`, `title`, `subtitle`, `author`, `content`, `photo`, `time`) VALUES
(8, 3, 'About C programming', 'basic', 'Subhasis Ghosh', 'C is structured language.', 'c_lang.png', '2020-09-24 20:17:12'),
(9, 3, 'Importance of computer', 'learning', 'Subhasis Ghosh', 'Computer learning is essential part of our life.', 'computer.jpg', '2020-09-24 20:18:38'),
(10, 1, 'Python Language', 'beginner level', 'Soumyadeep Ghosh', 'It uses at web development, data analytics and Artificial Intelligence.', 'python.jpg', '2020-09-26 22:16:50'),
(11, 1, 'JavaScript On Web Design', 'importance in web design', 'Soumyadeep Ghosh', 'It uses basically for client side web development. ', 'js.png', '2020-09-24 21:46:41'),
(12, 1, 'PHP Session', 'super globals variable', 'Soumyadeep Ghosh', 'It uses during login system.', 'session-in-php.png', '2020-09-28 22:37:11'),
(13, 5, 'Machine Learning and Deep Learning', 'Artificial Intelligence', 'Souvik Karmakar', 'Machine learning (ML) is the study of computer algorithms that improve automatically through experience. Machine learning is closely related to computational statistics, which focuses on making predictions using computers.', 'mldl.jpg', '2020-10-06 12:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dp` varchar(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dp`) VALUES
(1, 'Soumyadeep Ghosh', 'soumyadeep@gmail.com', 'saheb', 'SGhosh_passport.jpg'),
(2, 'Raju Kayal', 'raju@gmail.com', 'raju123', 'default.jpg'),
(3, 'Subhasis Ghosh', 'subhasis@gmail.com', 'pintu', 'default.jpg'),
(4, 'Gopa Ghosh', 'gopa@gmail.com', 'jaba', 'default.jpg'),
(5, 'Souvik Karmakar', 'skarmakar@yahoo.com', 'souvik456', 'default.jpg'),
(6, 'Premanjali Nandi', 'pnandi@gmail.com', 'nandi123', 'default.jpg'),
(7, 'Sannati Singha', 'sannati.singha@rediffmail.com', 'nielit', 'default.jpg'),
(8, 'Dilip Mondal', 'dilip@yahoo.com', 'dilip', 'default.jpg'),
(10, 'Mrinmoy Saha', 'msaha@hotmail.com', 'abc123', 'default.jpg'),
(0, 'Admin', 'admin@gmail.com', 'admin', 'default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
