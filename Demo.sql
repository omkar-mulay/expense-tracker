-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 08:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `din` int(11) NOT NULL,
  `cust_name` varchar(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `travelling` int(11) DEFAULT NULL,
  `travelling_remarks` varchar(100) NOT NULL,
  `img_path1` varchar(100) NOT NULL,
  `conveyance` int(11) DEFAULT NULL,
  `conveyance_remarks` varchar(100) NOT NULL,
  `img_path2` varchar(100) NOT NULL,
  `food_allowance` int(11) DEFAULT NULL,
  `food_allowance_remarks` varchar(100) NOT NULL,
  `img_path3` varchar(100) NOT NULL,
  `printing_stationary` int(11) DEFAULT NULL,
  `printing_stationary_remarks` varchar(100) NOT NULL,
  `img_path4` varchar(100) NOT NULL,
  `mobile_telephone` int(11) DEFAULT NULL,
  `mobile_telephone_remarks` varchar(100) NOT NULL,
  `img_path5` varchar(100) NOT NULL,
  `medical` int(11) DEFAULT NULL,
  `medical_remarks` varchar(100) NOT NULL,
  `img_path6` varchar(100) NOT NULL,
  `laundry` int(11) DEFAULT NULL,
  `laundry_remarks` varchar(100) NOT NULL,
  `img_path7` varchar(100) NOT NULL,
  `lodging` int(11) DEFAULT NULL,
  `lodging_remarks` varchar(100) NOT NULL,
  `img_path8` varchar(100) NOT NULL,
  `advance` int(11) DEFAULT NULL,
  `advance_remarks` varchar(100) NOT NULL,
  `img_path9` varchar(100) NOT NULL,
  `purchase_of_tools` int(11) DEFAULT NULL,
  `purchase_of_tools_remarks` varchar(100) NOT NULL,
  `img_path10` varchar(100) NOT NULL,
  `toll` int(11) DEFAULT NULL,
  `toll_remarks` varchar(100) NOT NULL,
  `img_path11` varchar(100) NOT NULL,
  `miscellaneous` int(11) DEFAULT NULL,
  `miscellaneous_remarks` varchar(100) NOT NULL,
  `img_path12` varchar(100) NOT NULL,
  `inward_freight` int(11) DEFAULT NULL,
  `inward_freight_remarks` varchar(100) NOT NULL,
  `img_path13` varchar(100) NOT NULL,
  `outward_freight` int(11) DEFAULT NULL,
  `outward_freight_remarks` varchar(100) NOT NULL,
  `img_path14` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
