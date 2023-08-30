# scholarship_alvas

How to run the Scholarship Management System

1. Download the zip file
2. Extract the file and copy scholarship_alvas folder
3. Paste inside root directory(for xampp xampp/htdocs, for wamp wamp/www, for lamp var/www/html)
4. Open PHPMyAdmin (http://localhost/phpmyadmin)
5. Create a database with name scholarship_alvas
6. Import scholarship_alvas.sql file(given inside the zip package in db folder)
7. Run the script http://localhost/scholarship_alvas (frontend)
8. Login to super admin page using username: admin, password: password
9. Login to student page using username: 4al18cs099, password: password or register as new user



Note: If you face any error while importing "scholarship_alvas.sql". Copy paste following sql script.

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
(22, '4al18cs099', '$2y$10$S4OBdC.AKoc3R2Y9EOk7T.SX36TDHcQul8I3.ACRjB2qcw6Q8w0RO', 'Gulam', 'Rabbani', 'Male', 'Minority', 'smartboygr07@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'B', '7667459452', '', '2022-06-07 05:47:10'),
(23, '4al18cs026', '$2y$10$qteNd9GmdM6eM6WzoBUG6.3MqSEJC3wcGnRlCvyPke4T3DmYP2cAG', 'Ijaz', 'Ibrahim', 'Male', 'Minority', 'ijazibrahim818@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '8497025434', '', '2022-06-07 06:11:31'),
(24, '4al18cs002', '$2y$10$vV6EwmLrTSqKuDPtYralBOPu8rkNnm6AvugALpALgw3Tf2YsBuZbe', 'Abhishek', 'S H', 'Male', 'Minority', 'abhisheksharsoor@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '6363735618', '', '2022-06-07 05:49:35'),
(25, '4al18cs023', '$2y$10$VMVtbkJOZqz.wGoL7noDxO35VNWnlT5EFlTlJyTw5XGglnvVYYjkC', 'Gudugunti', 'Anirudh', 'Male', 'General', 'anirudhg2308@gmail.com', 'COMPUTER SCIENCE &amp; ENGG', 4, 8, 'A', '6362488019', '', '2022-06-07 05:57:27');
