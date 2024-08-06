-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 09:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindb`
--

CREATE TABLE `admindb` (
  `srno` int(11) NOT NULL,
  `adname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindb`
--

INSERT INTO `admindb` (`srno`, `adname`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123'),
(4, 'rk', 'rk@mail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `plandb`
--

CREATE TABLE `plandb` (
  `srno` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `purchase_dt` varchar(255) NOT NULL,
  `expiry_dt` varchar(255) NOT NULL,
  `fees_status` varchar(255) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plandb`
--

INSERT INTO `plandb` (`srno`, `uname`, `plan_id`, `price`, `duration`, `purchase_dt`, `expiry_dt`, `fees_status`) VALUES
(1, 'Rohit', 'Ultimate', 4500, '6 Month', '21-03-2023', '21-09-2023', 'Paid'),
(2, 'rk2', 'Ultimate', 4500, '6 Month', '21-03-2023', '21-09-2023', 'Paid'),
(5, 'tushar', 'Pro', 2400, '3 Month', '21-03-2023', '21-06-2023', 'Unpaid'),
(6, 'trp', 'Pro', 2400, '3 Month', '21-03-2023', '21-06-2023', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `srno` int(11) NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `price` int(8) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`srno`, `plan_id`, `price`, `duration`) VALUES
(1, 'Basic', 700, '1 Month'),
(2, 'Pro', 2400, '3 Month'),
(3, 'Ultimate', 4500, '6 Months');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `srno` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`srno`, `name`, `uname`, `email`, `mobile_no`, `password`, `dt`) VALUES
(1, 'Rohit Himmat Koli', 'Rohit1252', 'rohitkoli11@mail.com', '9370810386', '123', '2023-03-19 07:55:26'),
(2, 'Rohit', 'rk2', 'rohit@mail.com', '3420916576', '123', '2023-03-19 15:27:57'),
(6, 'Tushar', 'trp', 'tp@mail.com', '9084354358', '123', '2023-03-21 17:40:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindb`
--
ALTER TABLE `admindb`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `plandb`
--
ALTER TABLE `plandb`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindb`
--
ALTER TABLE `admindb`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plandb`
--
ALTER TABLE `plandb`
  MODIFY `srno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
  MODIFY `srno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
