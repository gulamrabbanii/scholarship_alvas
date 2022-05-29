-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 06:23 PM
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
  `other_cert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_req`
--

INSERT INTO `doc_req` (`sch_name`, `govt_id`, `domicile`, `income`, `pwd_cert`, `bonafide`, `caste`, `parent_aadhar`, `bank_passbook`, `college_fee`, `sslc_puc`, `sem`, `diploma`, `self_dec`, `other_cert`) VALUES
('THE CADENCE SCHOLARSHIP PROGRAM', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', 'Domicile/Residential Certificate', 'Income Certificate issued from the Competent Authority', '', 'Bonafide Certificate', 'Caste Certificate', '', '', 'College Fee Receipt', '', 'Previous 2 Semester Marks Card', '', 'Self Declaration Minority Certificate', ''),
('SHOOLINI ACADEMIC PROGRESSION SCHOLARSHIP (SAPS)', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', '', 'Income Certificate issued from the Competent Authority', '', 'Bonafide Certificate', 'Caste Certificate', '', 'Bank Passbook of Student(Aadhar Card should be link with Bank A/C)', 'College Fee Receipt', '10 or 12 Marks Cards', '', '', '', ''),
('CANARA BANK SCHOLARSHIP', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', 'Domicile/Residential Certificate', 'Income Certificate issued from the Competent Authority', '', '', 'Caste Certificate', '', 'Bank Passbook of Student(Aadhar Card should be link with Bank A/C)', '', '', '', '', 'Self Declaration Minority Certificate', ''),
('MAULANA AZAD NATIONAL FELLOWSHIP FOR MINORITY STUDENTS MANF', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', 'Domicile/Residential Certificate', '', '', 'Bonafide Certificate', 'Caste Certificate', '', 'Bank Passbook of Student(Aadhar Card should be link with Bank A/C)', '', '', '', '', 'Self Declaration Minority Certificate', ''),
('VIDYASAARATHI PORTAL', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', 'Domicile/Residential Certificate', 'Income Certificate issued from the Competent Authority', '', 'Bonafide Certificate', 'Caste Certificate', '', '', '', '', 'Previous 2 Semester Marks Card', '', 'Self Declaration Minority Certificate', ''),
('POST MATRIC SCHOLARSHIP PORTAL', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', '', 'Income Certificate issued from the Competent Authority', '', '', '', '', 'Bank Passbook of Student(Aadhar Card should be link with Bank A/C)', '', '', '', '', 'Self Declaration Minority Certificate', ''),
('NATIONAL SCHOLARSHIP PORTAL', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', 'Domicile/Residential Certificate', 'Income Certificate issued from the Competent Authority', '', '', 'Caste Certificate', '', 'Bank Passbook of Student(Aadhar Card should be link with Bank A/C)', 'College Fee Receipt', '10 or 12 Marks Cards', 'Previous 2 Semester Marks Card', '', 'Self Declaration Minority Certificate', ''),
('NSP', 'Government ID Proof(eg. Aadhar Card, Driving License etc.)', '', '', '', '', 'Caste Certificate', '', '', '', '', 'Previous 2 Semester Marks Card', '', '', '');

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

--
-- Dumping data for table `elig_req`
--

INSERT INTO `elig_req` (`sch_name`, `minority`, `sc_st`, `girls`, `community`, `military`, `pwd`, `athletic`, `other_sch`) VALUES
('THE CADENCE SCHOLARSHIP PROGRAM', '', '', '', '', '', '', '', 'Students who are already pursuing graduation'),
('SHOOLINI ACADEMIC PROGRESSION SCHOLARSHIP (SAPS)', '', '', '', '', '', '', '', 'Post Matric Scholarship'),
('CANARA BANK SCHOLARSHIP', 'Scholarship for Minorities(SC/ST/OBC)', '', '', '', '', '', '', ''),
('MAULANA AZAD NATIONAL FELLOWSHIP FOR MINORITY STUDENTS MANF', 'Minority Communities Students(SC/ST/OBC)', '', '', '', '', '', '', ''),
('VIDYASAARATHI PORTAL', 'Minority Communities Students(SC/ST/OBC)', '', '', '', '', '', '', ''),
('POST MATRIC SCHOLARSHIP PORTAL', 'Minority Communities Students(SC/ST/OBC)', '', '', '', '', '', '', ''),
('NATIONAL SCHOLARSHIP PORTAL', 'Minority Communities Students(SC/ST/OBC)', '', '', '', '', '', '', ''),
('NSP', 'Minority Communities Students(SC/ST/OBC)', '', '', '', '', '', '', '');

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `usn`, `subject`, `msg_body`, `status`) VALUES
(6, '4al18cs026', 'Hi All', 'This is test', 'seen'),
(7, '4al18cs026', 'Hi Minority', 'You have been detected', 'unseen'),
(8, '4AL18CS099', 'Hi All', 'test', 'seen'),
(9, '4al18cs026', 'Hi All', 'test', 'unseen');

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

--
-- Dumping data for table `scholarship_details`
--

INSERT INTO `scholarship_details` (`id`, `sch_name`, `sch_provider`, `sch_start_date`, `sch_type`, `sch_deadline`, `sch_mode`, `sch_link`, `status`, `created_at`) VALUES
(16, 'THE CADENCE SCHOLARSHIP PROGRAM', 'Cadence Design Systems Private Limited &amp; Concern India Foundation', '2022-04-06', 'Business, Company, or Corporation', '2022-05-30', 'Online', 'https://cadence.com', 'active', '2022-05-06 14:31:31'),
(17, 'SHOOLINI ACADEMIC PROGRESSION SCHOLARSHIP (SAPS)', 'Shoolini University', '2022-04-19', 'NGO / Non-Profit', '2022-06-30', 'Online', 'https://shooliniuniversity.com', 'active', '2022-05-06 14:31:31'),
(18, 'CANARA BANK SCHOLARSHIP', 'Canara Bank', '2022-05-31', 'Business, Company, or Corporation', '2022-07-14', 'Both', 'https://scholarship.canarabank.in', 'active', '2022-05-06 14:31:31'),
(21, 'MAULANA AZAD NATIONAL FELLOWSHIP FOR MINORITY STUDENTS MANF', 'Government of India', '2022-06-30', 'Government of India', '2022-07-31', 'Both', 'http://www.ugc.ac.in', 'active', '2022-05-06 14:31:31'),
(22, 'VIDYASAARATHI PORTAL', 'Protean eGov Technologies Limited', '2022-06-25', 'Government of India', '2022-08-31', 'Online', 'https://www.vidyasaarathi.co.in/Vidyasaarathi/', 'active', '2022-05-07 04:56:35'),
(23, 'POST MATRIC SCHOLARSHIP PORTAL', 'Bihar Government', '2022-06-01', 'Other State', '2022-08-25', 'Online', 'https://pmsonline.bih.nic.in/pmsedu/(S(w3daib0s22uixjbkqojlomhu))/pms/Default.aspx', 'disabled', '2022-05-26 05:40:00'),
(25, 'NATIONAL SCHOLARSHIP PORTAL', 'Central Government', '2022-05-21', 'Government of India', '2022-06-24', 'Both', 'https://scholarships.gov.in/fresh/schemeSelRegfrmInstruction', 'disabled', '2022-05-18 16:56:38'),
(29, 'NSP', 'Central Government', '2022-05-28', 'Government of India', '2022-07-22', 'Both', 'https://scholarships.gov.in/fresh/schemeSelRegfrmInstruction', 'active', '2022-05-26 09:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `sch_receipt_proof`
--

CREATE TABLE `sch_receipt_proof` (
  `id` int(11) NOT NULL,
  `usn` varchar(100) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `sch_provider` varchar(255) NOT NULL,
  `is_applied` text NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `is_received` text NOT NULL,
  `file_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `receipt_proof` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_sch_docs`
--

CREATE TABLE `upload_sch_docs` (
  `id` int(11) NOT NULL,
  `usn` varchar(100) NOT NULL,
  `sch_name` varchar(100) NOT NULL,
  `sch_applied_year` varchar(15) NOT NULL,
  `govt_id` varchar(100) NOT NULL,
  `file1` blob NOT NULL,
  `domicile` varchar(100) NOT NULL,
  `file2` blob NOT NULL,
  `income` varchar(100) NOT NULL,
  `file3` blob NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `file4` blob NOT NULL,
  `bonafide` varchar(100) NOT NULL,
  `file5` blob NOT NULL,
  `caste` varchar(100) NOT NULL,
  `file6` blob NOT NULL,
  `parent_aadhar` varchar(100) NOT NULL,
  `file7` blob NOT NULL,
  `passbook` varchar(100) NOT NULL,
  `file8` blob NOT NULL,
  `clg_fee` varchar(100) NOT NULL,
  `file9` blob NOT NULL,
  `sslc_puc` varchar(100) NOT NULL,
  `file10` blob NOT NULL,
  `sem_marks` varchar(100) NOT NULL,
  `file11` blob NOT NULL,
  `diploma` varchar(100) NOT NULL,
  `file12` blob NOT NULL,
  `self_decl` varchar(100) NOT NULL,
  `file13` blob NOT NULL,
  `ration` varchar(100) NOT NULL,
  `file14` blob NOT NULL,
  `is_received` text DEFAULT 'pending',
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `first_name`, `last_name`, `gender`, `caste`, `email`, `dept`, `year`, `semester`, `section`, `phone`, `created_at`) VALUES
(10, 'admin', '$2y$10$eKZbj4xwL.9HFS9/GZ0R9O2VegaK/mYVK9.6MaMzU/O78zckkY92a', 'Gulam', 'Rabbani', '', '', '', '', 0, 0, '', '2147483647', '2022-05-01 23:25:56'),
(21, 'admin@admin.com', '$2y$10$ayemzdQzrYy4mYlX0q1z5OyTYkgIYosppwZJYg4P5mDlS24yCVTB6', 'Prerna', 'Pall', '', '', 'admin@admin.com', '', 0, 0, '', '2147483647', '2022-05-08 16:57:49'),
(22, 'anjana@admin.com', '$2y$10$nD9/cSuGisIFFRf/Ce.lJeWWpy29FplnNChrrXFV/0HkJ2AhXL7k.', 'Anjana', 'Bahl', '', '', 'anjana@admin.com', '', 0, 0, '', '2147483647', '2022-05-08 16:59:11'),
(23, 'pirzada@admin.com', '$2y$10$Q7YnlaAnJAfi6o7TIN9G1urgVrXv0.TnXuah3jsfH7UTMl5B8zQMq', 'Pirzada', 'Kade', '', '', 'pirzada@admin.com', '', 0, 0, '', '1234567890', '2022-05-08 17:01:25'),
(24, '4al18ec027', '$2y$10$Z8X1M1wgZtdbLSza62pfju0oRDdpM8KgJOgqhCTM6QhTAOR/.Ee.m', 'Hemanth', 'Sharma', '', '', 'nagahemanth257@gmail.com', 'ELECTRONICS &amp; COMMUNICATION ENGG', 4, 0, '', '2147483647', '2022-05-09 04:54:43'),
(25, '4al18cs028', '$2y$10$kE4ZaZbXptXqEe6BUFch3OByjBPkxYlZ/HN3iaKFbdU26kQIADJRK', 'Jaison', 'Lobo', '', '', 'jaison3666@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 0, '', '2147483647', '2022-05-10 05:53:00'),
(29, '4AL18CS099', '$2y$10$urdrZ2TNMtdutwVIu80ajepzXS/19SuXdxKXI.JGKXKuqU2y6uqHu', 'Gulam', 'Rabbani', 'Male', 'General', 'smartboygr07@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'B', '7852963412', '2022-05-28 11:01:36'),
(30, '4al18cs076', '$2y$10$RNMEAfQwoK6fDiP33lg3N.1lo3WgShZrx6raj/LpFIt9dTGWC1LZa', 'Numan', 'Sheikh', 'Male', '', 'sknumaan95@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'B', '7458965896', '2022-05-26 05:46:34'),
(38, '4al18cs026', '$2y$10$T7Eke4RgI7VGBm/JFziwkOFN28xz2c2K2Ki93XaTcUjcFkyJ6L3S2', 'Ijaz', 'Ibrahim', 'Male', 'Minority', 'smartboygr07@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '7852963412', '2022-05-27 18:02:18');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `upload_sch_docs`
--
ALTER TABLE `upload_sch_docs`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scholarship_details`
--
ALTER TABLE `scholarship_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sch_receipt_proof`
--
ALTER TABLE `sch_receipt_proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `upload_sch_docs`
--
ALTER TABLE `upload_sch_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
