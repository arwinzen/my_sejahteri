-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 03:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_sejahteri`
--
CREATE DATABASE IF NOT EXISTS `my_sejahteri` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `my_sejahteri`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_pwd` int(255) NOT NULL,
  `admin_name` int(50) NOT NULL,
  `admin_contact` int(25) NOT NULL,
  `admin_email` int(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `checkin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `branch`, `created`) VALUES
(1, 'Invoke', NULL, '2021-10-26 01:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `tac`
--

CREATE TABLE `tac` (
  `tac_id` int(11) NOT NULL,
  `tac_no` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tac`
--

INSERT INTO `tac` (`tac_id`, `tac_no`, `user_id`, `created_at`) VALUES
(1, '368047', 1, '2021-10-25 16:21:26'),
(3, '772089', 3, '2021-10-25 16:32:29'),
(4, '493351', 3, '2021-10-25 16:33:42'),
(5, '143903', 3, '2021-10-25 16:47:05'),
(6, '579317', 3, '2021-10-25 16:48:35'),
(7, '690293', 3, '2021-10-25 17:02:29'),
(8, '820324', 1, '2021-10-25 17:06:50'),
(9, '062706', 1, '2021-10-25 17:11:29'),
(10, '431481', 1, '2021-10-25 17:13:33'),
(11, '619404', 1, '2021-10-25 17:15:01'),
(12, '801844', 1, '2021-10-25 17:15:21'),
(13, '892189', 1, '2021-10-25 17:16:53'),
(14, '636822', 1, '2021-10-25 17:18:14'),
(15, '778783', 1, '2021-10-25 17:18:19'),
(16, '763067', 1, '2021-10-25 17:19:37'),
(17, '787053', 1, '2021-10-25 17:19:43'),
(18, '600956', 1, '2021-10-25 17:20:24'),
(19, '002295', 1, '2021-10-25 17:20:29'),
(20, '773310', 1, '2021-10-25 17:20:34'),
(21, '446954', 1, '2021-10-25 17:34:44'),
(22, '106443', 1, '2021-10-25 17:34:51'),
(23, '111061', 1, '2021-10-25 17:35:53'),
(24, '581841', 1, '2021-10-25 17:36:25'),
(25, '781245', 1, '2021-10-25 17:37:09'),
(26, '029183', 1, '2021-10-25 17:37:13'),
(27, '255005', 1, '2021-10-25 18:15:46'),
(28, '901124', 3, '2021-10-25 18:43:08'),
(29, '184863', 1, '2021-10-26 00:46:13'),
(30, '376637', 1, '2021-10-26 00:46:21'),
(31, '239636', 1, '2021-10-26 00:47:51'),
(32, '548808', 3, '2021-10-26 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_status` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mobile_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_status`, `created`, `mobile_no`) VALUES
(1, NULL, 'Arwin Goo', NULL, '2021-10-26 00:48:32', '017-3118004'),
(3, NULL, 'Asyraf', NULL, '2021-10-26 00:58:06', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`checkin_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tac`
--
ALTER TABLE `tac`
  ADD PRIMARY KEY (`tac_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tac`
--
ALTER TABLE `tac`
  MODIFY `tac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
