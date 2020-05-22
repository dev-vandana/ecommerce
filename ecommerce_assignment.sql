-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2020 at 10:52 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.1.33-15+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `working_type` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `store_id` varchar(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Employee Data';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `name`, `working_type`, `start_time`, `end_time`, `store_id`, `store_name`, `date`) VALUES
(1, 1237780, 'kimmy', 'working time', '08:00:00', '19:00:00', 'RAJD6000883', 'Junbo Store', '2019-10-15'),
(2, 1237780, 'kimmy', 'training', '16:00:00', '17:00:00', 'RAJD6000883', 'Multiplex samsung', '2019-10-15'),
(3, 1237780, 'kimmy', 'route', '18:00:00', '19:00:00', 'RAJD6000883', 'ABC Mart', '2019-10-15'),
(4, 1237780, 'kimmy', 'day off', '00:00:00', '00:00:00', '', '', '2019-10-16'),
(5, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-17'),
(6, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-18'),
(7, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-19'),
(8, 1237780, 'kimmy', 'working time', '08:00:00', '19:00:00', 'RAJD6000883', 'Junbo Store', '2019-10-15'),
(9, 1237780, 'kimmy', 'training', '16:00:00', '17:00:00', 'RAJD6000883', 'Multiplex samsung', '2019-10-15'),
(10, 1237780, 'kimmy', 'route', '18:00:00', '19:00:00', 'RAJD6000883', 'ABC Mart', '2019-10-15'),
(11, 1237780, 'kimmy', 'day off', '00:00:00', '00:00:00', '', '', '2019-10-16'),
(12, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-17'),
(13, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-18'),
(14, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-19'),
(15, 1237780, 'kimmy', 'working time', '08:00:00', '19:00:00', 'RAJD6000883', 'Junbo Store', '2019-10-15'),
(16, 1237780, 'kimmy', 'training', '16:00:00', '17:00:00', 'RAJD6000883', 'Multiplex samsung', '2019-10-15'),
(17, 1237780, 'kimmy', 'route', '18:00:00', '19:00:00', 'RAJD6000883', 'ABC Mart', '2019-10-15'),
(18, 1237780, 'kimmy', 'day off', '00:00:00', '00:00:00', '', '', '2019-10-16'),
(19, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-17'),
(20, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-18'),
(21, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-19'),
(22, 1237780, 'kimmy', 'working time', '08:00:00', '19:00:00', 'RAJD6000883', 'Junbo Store', '2019-10-15'),
(23, 1237780, 'kimmy', 'training', '16:00:00', '17:00:00', 'RAJD6000883', 'Multiplex samsung', '2019-10-15'),
(24, 1237780, 'kimmy', 'route', '18:00:00', '19:00:00', 'RAJD6000883', 'ABC Mart', '2019-10-15'),
(25, 1237780, 'kimmy', 'day off', '00:00:00', '00:00:00', '', '', '2019-10-16'),
(26, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-17'),
(27, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-18'),
(28, 1237780, 'kimmy', 'leave', '00:00:00', '00:00:00', '', '', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `reimbursement`
--

CREATE TABLE `reimbursement` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `select_month` int(11) NOT NULL,
  `select_year` int(11) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `other_pupose` varchar(255) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `other_mode` varchar(255) NOT NULL,
  `km` decimal(10,2) NOT NULL,
  `inv_no` varchar(255) NOT NULL,
  `amt` decimal(10,4) NOT NULL,
  `attachhment_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reimbursement`
--

INSERT INTO `reimbursement` (`id`, `type`, `select_month`, `select_year`, `from`, `to`, `purpose`, `other_pupose`, `mode`, `other_mode`, `km`, `inv_no`, `amt`, `attachhment_path`) VALUES
(1, 'conveyance', 2, 2020, '2020-02-01 11:00:00', '2020-02-01 18:00:00', 'other', 'sdasdasda', 'other', 'dasdasda', '10.80', 'sasdas12', '1200.0000', 'e43ee205ad0591bf951b58d06db7bb6e.pdf'),
(2, 'conveyance', 2, 2020, '2020-02-01 11:00:00', '2020-02-01 18:00:00', 'other', 'sdasdasda', 'other', 'dasdasda', '10.80', 'sasdas12', '1200.0000', 'ef510bd26ffdff22c3d9de28db185336.pdf'),
(3, 'conveyance', 2, 2020, '2020-02-01 11:00:00', '2020-02-01 18:00:00', 'other', 'sdasdasda', 'other', 'dasdasda', '10.80', 'sasdas12', '1200.0000', '587421fd7f10976cb80bc4d3fba97b6f.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reimbursement`
--
ALTER TABLE `reimbursement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `reimbursement`
--
ALTER TABLE `reimbursement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
