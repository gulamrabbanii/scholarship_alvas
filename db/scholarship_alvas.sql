-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 08:50 AM
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
-- Table structure for table `display_pic`
--

CREATE TABLE `display_pic` (
  `username` varchar(255) NOT NULL,
  `dp` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `display_pic`
--

INSERT INTO `display_pic` (`username`, `dp`) VALUES
('4al18cs099', '../profile_pic/4al18cs099.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doc_req`
--

CREATE TABLE `doc_req` (
  `sch_name` varchar(255) DEFAULT NULL,
  `govt_id` varchar(255) DEFAULT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `pwd_cert` varchar(255) DEFAULT NULL,
  `bonafide` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `parent_aadhar` varchar(255) DEFAULT NULL,
  `bank_passbook` varchar(255) DEFAULT NULL,
  `college_fee` varchar(255) DEFAULT NULL,
  `sslc_puc` varchar(255) DEFAULT NULL,
  `sem` varchar(255) DEFAULT NULL,
  `diploma` varchar(255) DEFAULT NULL,
  `self_dec` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg_body` varchar(512) NOT NULL,
  `status` text NOT NULL DEFAULT 'unseen'
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
  `sch_type` varchar(100) DEFAULT NULL,
  `sch_deadline` date DEFAULT NULL,
  `sch_mode` varchar(50) DEFAULT NULL,
  `sch_link` varchar(512) CHARACTER SET ascii NOT NULL,
  `status` varchar(20) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sch_receipt_proof`
--

CREATE TABLE `sch_receipt_proof` (
  `uid` int(11) NOT NULL,
  `usn` varchar(100) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `sch_provider` varchar(255) NOT NULL,
  `is_applied` text NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `is_received` text NOT NULL,
  `file_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `receipt_proof` mediumblob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_sch_docs`
--

CREATE TABLE `upload_sch_docs` (
  `uid` int(11) NOT NULL,
  `usn` varchar(100) NOT NULL,
  `sch_name` varchar(100) DEFAULT NULL,
  `sch_applied_year` varchar(15) DEFAULT NULL,
  `govt_id` varchar(100) DEFAULT NULL,
  `file1_type` varchar(50) DEFAULT NULL,
  `file1_size` int(11) DEFAULT NULL,
  `file1` mediumblob DEFAULT NULL,
  `domicile` varchar(100) DEFAULT NULL,
  `file2_type` varchar(50) DEFAULT NULL,
  `file2_size` int(11) DEFAULT NULL,
  `file2` mediumblob DEFAULT NULL,
  `income` varchar(100) DEFAULT NULL,
  `file3_type` varchar(50) DEFAULT NULL,
  `file3_size` int(11) DEFAULT NULL,
  `file3` mediumblob DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `file4_type` varchar(50) DEFAULT NULL,
  `file4_size` int(11) DEFAULT NULL,
  `file4` mediumblob DEFAULT NULL,
  `bonafide` varchar(100) DEFAULT NULL,
  `file5_type` varchar(50) DEFAULT NULL,
  `file5_size` int(11) DEFAULT NULL,
  `file5` mediumblob DEFAULT NULL,
  `caste` varchar(100) DEFAULT NULL,
  `file6_type` varchar(50) DEFAULT NULL,
  `file6_size` int(11) DEFAULT NULL,
  `file6` mediumblob DEFAULT NULL,
  `parent_aadhar` varchar(100) DEFAULT NULL,
  `file7_type` varchar(50) DEFAULT NULL,
  `file7_size` int(11) DEFAULT NULL,
  `file7` mediumblob DEFAULT NULL,
  `passbook` varchar(100) DEFAULT NULL,
  `file8_type` varchar(50) DEFAULT NULL,
  `file8_size` int(11) DEFAULT NULL,
  `file8` mediumblob DEFAULT NULL,
  `clg_fee` varchar(100) DEFAULT NULL,
  `file9_type` varchar(50) DEFAULT NULL,
  `file9_size` int(11) DEFAULT NULL,
  `file9` mediumblob DEFAULT NULL,
  `sslc_puc` varchar(100) DEFAULT NULL,
  `file10_type` varchar(50) DEFAULT NULL,
  `file10_size` int(11) DEFAULT NULL,
  `file10` mediumblob DEFAULT NULL,
  `sem_marks` varchar(100) DEFAULT NULL,
  `file11_type` varchar(50) DEFAULT NULL,
  `file11_size` int(11) DEFAULT NULL,
  `file11` mediumblob DEFAULT NULL,
  `diploma` varchar(100) DEFAULT NULL,
  `file12_type` varchar(50) DEFAULT NULL,
  `file12_size` int(11) DEFAULT NULL,
  `file12` mediumblob DEFAULT NULL,
  `self_decl` varchar(100) DEFAULT NULL,
  `file13_type` varchar(50) DEFAULT NULL,
  `file13_size` int(11) DEFAULT NULL,
  `file13` mediumblob DEFAULT NULL,
  `ration` varchar(100) DEFAULT NULL,
  `file14_type` varchar(50) DEFAULT NULL,
  `file14_size` int(11) DEFAULT NULL,
  `file14` mediumblob DEFAULT NULL,
  `is_received` text DEFAULT 'pending',
  `is_verified` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `caste` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dept` text NOT NULL,
  `year` tinyint(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `section` char(1) NOT NULL,
  `phone` char(10) NOT NULL,
  `dp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `first_name`, `last_name`, `gender`, `caste`, `email`, `dept`, `year`, `semester`, `section`, `phone`, `dp`, `created_at`) VALUES
(10, 'admin', '$2y$10$eKZbj4xwL.9HFS9/GZ0R9O2VegaK/mYVK9.6MaMzU/O78zckkY92a', 'Gulam', 'Rabbani', '', '', '', '', 0, 0, '', '2147483647', '', '2022-05-01 23:25:56'),
(21, 'admin@admin.com', '$2y$10$ayemzdQzrYy4mYlX0q1z5OyTYkgIYosppwZJYg4P5mDlS24yCVTB6', 'Prerna', 'Pall', '', '', 'admin@admin.com', '', 0, 0, '', '2147483647', '', '2022-05-08 16:57:49'),
(22, '4al18cs099', '$2y$10$D9/nqzE06VeYWibhTDHcBujyT2EDzExzom38Wp4neLp93N8w4ske.', 'Gulam', 'Rabbani', 'Male', 'Minority', 'smartboygr07@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'B', '7458965896', '', '2022-06-04 06:40:43'),
(23, '4al18cs026', '$2y$10$qteNd9GmdM6eM6WzoBUG6.3MqSEJC3wcGnRlCvyPke4T3DmYP2cAG', 'Ijaz', 'Ibrahi', 'Male', 'General', 'ijazibrahim@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'B', '7591534560', '', '2022-06-04 06:46:31'),
(24, '4al18cs002', '$2y$10$vV6EwmLrTSqKuDPtYralBOPu8rkNnm6AvugALpALgw3Tf2YsBuZbe', 'Abhishek', 'S H', 'Male', 'Minority', 'abhisheksh@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '7458965896', '', '2022-06-04 06:46:00'),
(25, '4al18cs023', '$2y$10$VMVtbkJOZqz.wGoL7noDxO35VNWnlT5EFlTlJyTw5XGglnvVYYjkC', 'Anirudh', 'Gudugunti', 'Male', 'SC/ST', 'anirudh@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '7539514862', '', '2022-06-04 06:47:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `display_pic`
--
ALTER TABLE `display_pic`
  ADD KEY `username` (`username`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_ibfk_1` (`usn`);

--
-- Indexes for table `scholarship_details`
--
ALTER TABLE `scholarship_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sch_name` (`sch_name`);

--
-- Indexes for table `sch_receipt_proof`
--
ALTER TABLE `sch_receipt_proof`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `upload_sch_docs`
--
ALTER TABLE `upload_sch_docs`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `usn` (`usn`);

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
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarship_details`
--
ALTER TABLE `scholarship_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sch_receipt_proof`
--
ALTER TABLE `sch_receipt_proof`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_sch_docs`
--
ALTER TABLE `upload_sch_docs`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `display_pic`
--
ALTER TABLE `display_pic`
  ADD CONSTRAINT `display_pic_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sch_receipt_proof`
--
ALTER TABLE `sch_receipt_proof`
  ADD CONSTRAINT `sch_receipt_proof_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload_sch_docs`
--
ALTER TABLE `upload_sch_docs`
  ADD CONSTRAINT `upload_sch_docs_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
