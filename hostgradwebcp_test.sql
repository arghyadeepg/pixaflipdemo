-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 09:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostgradwebcp_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipents`
--

CREATE TABLE `recipents` (
  `sl` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `reqbloodgroup` varchar(20) NOT NULL,
  `hascomborities` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipents`
--

INSERT INTO `recipents` (`sl`, `name`, `email`, `type`, `district`, `state`, `reqbloodgroup`, `hascomborities`, `status`) VALUES
(3, 'jjgvgj gjjj', 'jhgj@uyg.com', 'recipent', 'kolkata', 'West Bengal', 'B-', 'yes', 'approved'),
(4, 'jjgvgj gjjj', 'jhgj@uyg.com', 'recipent', 'kolkata', 'West Bengal', 'B-', 'yes', 'approved'),
(5, 'jjgvgj gjjj', 'jhgj@uyg.com', 'recipent', 'kolkata', 'West Bengal', 'B-', 'yes', 'approved'),
(6, 'jjgvgj gjjj', 'jhgj@uyg.com', 'recipent', 'rtest', 'West Bengal', 'O-', 'no', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `comborities` varchar(20) NOT NULL,
  `identity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl`, `name`, `email`, `district`, `state`, `type`, `bloodgroup`, `comborities`, `identity`) VALUES
(1, 'Arghyadeep Ghosh', 'contact@arghyadeepghosh.me', 'kolkata', 'West Bengal', 'donor', 'B-', 'no', ''),
(10, 'jjgvgj gjjj', 'jhgj@uyg.com', 'kolkatar', 'West Bengal', 'donor', 'AB+', 'no', '4c63229b0935fde1be6aca154cd749b2.jpg'),
(12, 'Arghyadeep Ghosh', 'jhgj@uyg.com', 'kolkatar', 'West Bengal', 'donor', 'O-', 'no', '4c63229b0935fde1be6aca154cd749b2.jpg'),
(13, 'jjgvgj gjjj', 'jhgj@uyg.com', 'kolkata', 'West Bengal', 'donor', 'AB+', 'yes', '4c63229b0935fde1be6aca154cd749b2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipents`
--
ALTER TABLE `recipents`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipents`
--
ALTER TABLE `recipents`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
