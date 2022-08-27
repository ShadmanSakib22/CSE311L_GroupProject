-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2022 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments1`
--

CREATE TABLE `comments1` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments1`
--

INSERT INTO `comments1` (`cid`, `name`, `msg`, `dtime`) VALUES
(3, 'toastyok', 'another comment for testing', '2022-08-27 02:22:00'),
(4, 'toast', 'checking if everything still works', '2022-08-27 17:29:08'),
(5, 'toast', 'added more stuff to comment', '2022-08-27 20:37:07'),
(6, 'toast', 'works alright i guess', '2022-08-27 20:37:27'),
(7, 'toast', 'adding more comments for further test', '2022-08-27 20:38:00'),
(8, 'toast', 'comment blah blah', '2022-08-27 20:38:10'),
(9, 'toast', 'should be enough', '2022-08-27 20:38:17'),
(10, 'toast', 'last comment', '2022-08-27 20:39:22'),
(11, 'toast', '9', '2022-08-27 20:39:36'),
(12, 'toast', '10', '2022-08-27 20:39:40'),
(13, 'toast', 'not the best, bt works :D', '2022-08-27 20:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments10_5`
--

CREATE TABLE `comments10_5` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments10_5`
--

INSERT INTO `comments10_5` (`cid`, `name`, `msg`, `dtime`) VALUES
(7, 'toastyok', 'testin one more time hehe', '2022-08-26 21:48:11'),
(10, 'toast', 'tryin something new', '2022-08-26 22:38:07'),
(11, 'toast', 'i finally fixed it?', '2022-08-26 22:38:21'),
(15, 'toast', 'nothing a miss with the new changes', '2022-08-27 02:33:43'),
(16, 'toast', 'checking this too', '2022-08-27 20:40:44'),
(18, 'jimmy', 'commenting from admin to check delete ', '2022-08-27 20:42:33'),
(19, 'jimmy', 'delete worked perfectly', '2022-08-27 20:43:19'),
(20, 'jimmy', 'prayge for marks', '2022-08-27 20:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`name`, `email`, `password`, `user_type`) VALUES
('boruto', 'boruto@gmail', 'd09b9d3cb4f7cbef107bef0425ca8eaf', 'user'),
('brook', 'brook@gmail.com', '0cfe0ef3a357503c4a4538414b870ca1', 'user'),
('carrot', 'carrot@gmail.com', 'e6d96502596d7e7887b76646c5f615d9', 'user'),
('chopper', 'chopper@gmail.com', 'c5c2df792f008f6fa3fa335c921ba65e', 'user'),
('franky', 'franky@gmail.com', 'ffe7470430a737c4ce6dc74bea0155d5', 'user'),
('jimmy', 'jimmy@gmail.com', '5e027396789a18c37aeda616e3d7991b', 'admin'),
('jinbe', 'jinbe@gmail.com', '84fff20659999e2b83b45c6851ec57dd', 'user'),
('luffy', 'luffy@gmail.com', '317b7c918babbe60311a4fb5b4fd61a0', 'user'),
('minato', 'minato@gmail.com', '91b827e257eeae8e5989d961fe3011df', 'user'),
('nami', 'nami@gmail.com', '22c78aadb8d25a53ca407fae265a7154', 'user'),
('naruto', 'naruto@gmail.com', 'c70a3b8938e8bf366f76d07ed18558a5', 'user'),
('oden', 'oden@gmail.com', '9fa32fa61a3811919b6b7568da03fc1b', 'user'),
('rex', 'rex@gmail.com', '6b4023d367b91c97f19597c4069337d3', 'user'),
('robin', 'robin@gmail.com', '760061f6bfde75c29af12f252d4d3345', 'user'),
('toastygenie', 'sadmansakib10000@gmail.com', '937dbb9a0118d36e0a642441a8ba71f7', 'user'),
('sanji', 'sanji@gmail.com', '9f5a44a734ac9e43b5968d0f3b71d69b', 'user'),
('toast', 'toastthegenie@gmail.com', '937dbb9a0118d36e0a642441a8ba71f7', 'user'),
('toastyok', 'toastyok@gmail.com', '937dbb9a0118d36e0a642441a8ba71f7', 'admin'),
('ussop', 'ussop@gmail.com', 'b4adcb50f1ee7b54194f82d866331b31', 'user'),
('zoro', 'zoro@gmail.com', 'cbef2a7ece933c79251e532523cc4fe9', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments1`
--
ALTER TABLE `comments1`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `noSpam` (`name`,`msg`) USING HASH;

--
-- Indexes for table `comments10_5`
--
ALTER TABLE `comments10_5`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `noSpam` (`name`,`msg`) USING HASH;

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `name_2` (`name`),
  ADD KEY `name_3` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments1`
--
ALTER TABLE `comments1`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments10_5`
--
ALTER TABLE `comments10_5`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
