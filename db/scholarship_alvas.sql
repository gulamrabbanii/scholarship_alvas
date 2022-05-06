-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 09:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship_alvas`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_req`
--

CREATE TABLE `doc_req` (
  `sch_name` varchar(255) DEFAULT NULL,
  `govt_id` varchar(255) DEFAULT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `bonafide` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `parent_aadhar` varchar(255) DEFAULT NULL,
  `bank_passbook` varchar(255) DEFAULT NULL,
  `college_fee` varchar(255) DEFAULT NULL,
  `sslc_puc` varchar(255) DEFAULT NULL,
  `sem` varchar(255) DEFAULT NULL,
  `diploma` varchar(255) DEFAULT NULL,
  `self_dec` varchar(255) DEFAULT NULL,
  `other_cert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elig_req`
--

CREATE TABLE `elig_req` (
  `sch_name` varchar(255) DEFAULT NULL,
  `minority` varchar(255) DEFAULT NULL,
  `sc_st` varchar(255) DEFAULT NULL,
  `girls` varchar(255) DEFAULT NULL,
  `community` varchar(255) DEFAULT NULL,
  `military` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `athletic` varchar(255) DEFAULT NULL,
  `other_sch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_details`
--

CREATE TABLE `scholarship_details` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(255) DEFAULT NULL,
  `sch_provider` varchar(255) DEFAULT NULL,
  `sch_start_date` date DEFAULT NULL,
  `sch_type` varchar(255) DEFAULT NULL,
  `sch_deadline` date DEFAULT NULL,
  `sch_mode` varchar(50) DEFAULT NULL,
  `sch_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dept` text NOT NULL,
  `year` tinyint(4) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `first_name`, `last_name`, `dept`, `year`, `phone`, `created_at`) VALUES
(9, '4al18cs099', '$2y$10$MNkATxHXwrGV7FUkmEXgUuwQqAWRFPwcGBs2.5YSVF9asniY35y42', 'ijaz', 'ibrahim', 'INFORMATION TECHNOLOGY ENGG', 4, 1594562580, '2022-05-02 01:34:36'),
(10, 'admin', '$2y$10$eKZbj4xwL.9HFS9/GZ0R9O2VegaK/mYVK9.6MaMzU/O78zckkY92a', 'Gulam', 'Rabbani', '', 0, 2147483647, '2022-05-01 23:25:56'),
(11, 'admin@admin.com', '$2y$10$AK.IMWMsH0JGX8tXmkmW8ebHkyJLv1zpB0VoWrY9zEE0fSOBoB9qW', 'Scholarship', 'Section', '', 0, 2147483647, '2022-05-02 01:35:53'),
(13, '4al18cs026', '$2y$10$PsHAdIlm0nurm.0aEoneeOniFqq3hqPxQHDk.7Zcab7Gq5KgeBiIC', 'Ijaz', 'Ibrahim', 'COMPUTER SCIENCE &amp;amp; ENGG', 3, 2147483647, '2022-05-03 06:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_req`
--
ALTER TABLE `doc_req`
  ADD KEY `sch_name` (`sch_name`);

--
-- Indexes for table `elig_req`
--
ALTER TABLE `elig_req`
  ADD KEY `sch_name` (`sch_name`);

--
-- Indexes for table `scholarship_details`
--
ALTER TABLE `scholarship_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sch_name` (`sch_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scholarship_details`
--
ALTER TABLE `scholarship_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc_req`
--
ALTER TABLE `doc_req`
  ADD CONSTRAINT `doc_req_ibfk_1` FOREIGN KEY (`sch_name`) REFERENCES `scholarship_details` (`sch_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elig_req`
--
ALTER TABLE `elig_req`
  ADD CONSTRAINT `elig_req_ibfk_1` FOREIGN KEY (`sch_name`) REFERENCES `scholarship_details` (`sch_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
