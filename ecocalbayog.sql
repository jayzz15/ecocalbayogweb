-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2026 at 02:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecocalbayog`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `amount`, `message`, `created_at`) VALUES
(1, 10, 500.00, 'sdgsdggd', '2026-04-18 11:50:04'),
(2, 10, 1600.00, 'sadasd', '2026-04-18 12:04:46'),
(3, 10, 2313.00, '', '2026-04-18 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `meeting_point` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `event_time`, `location`, `category`, `max_participants`, `creator_id`, `contact`, `meeting_point`, `created_at`) VALUES
(3, 'SADASDASDASDA', 'SADASDASDASDASD', '2026-04-01', '12:33', 'Barangay 3', 'Plastic Ban & Waste Management', 15, 8, '09611255482', 'Capoocan sadfacer', '2026-04-18 10:28:53'),
(4, 'sdnflsndf', 'sdffsdf', '2026-04-10', '00:12', 'Barangay 2', 'Renewable Energy', 12, 10, '0982y424242', 'asfsdfsdf', '2026-04-18 11:40:31'),
(5, 'srfgsgd', 'sgsdgsd', '2026-04-22', '00:23', 'Barangay 2', 'Sustainable Agriculture', -6, 10, '', '', '2026-04-18 11:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_participants`
--

INSERT INTO `event_participants` (`id`, `event_id`, `user_id`, `joined_at`) VALUES
(3, 3, 9, '2026-04-18 10:29:36'),
(4, 3, 8, '2026-04-18 10:46:21'),
(5, 3, 10, '2026-04-18 11:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `barangay`, `phone`, `password`, `created_at`) VALUES
(4, 'testtest', 'test@gmail.com', NULL, NULL, '$2y$10$z1NFeinwtHJv7/j4h51EQ.MSpBqyXU1qU8p6OIV96MGOMwWBT8lUW', '2026-04-04 12:34:04'),
(6, 'testtest', 'test1@gmail.com', NULL, NULL, '$2y$10$mKBvanzx06nuA0wUDNGp0eUHSAZNoK61ZXY8.dh2ase5eo55I8nYK', '2026-04-18 06:31:26'),
(7, 'testtest', 'test2@gmail.com', NULL, NULL, '$2y$10$knA8rVnnPUQChrSx6MCZb.XlNU4eBwCaLEE/ZvB6RSyIFWMTnVurW', '2026-04-18 07:40:29'),
(8, 'Dareen Casaljay Alvarez', 'alvarezdareen776@gmail.com', NULL, NULL, '$2y$10$gJoAgZmKKEGbvG52vnK27eOBMcNeZFXzQ3Hw96ManbZk7DryoM10y', '2026-04-18 10:28:13'),
(9, 'Alvarez', 'alvarezdareen7761@gmail.com', NULL, NULL, '$2y$10$Z5E4yKTizl497J7Qj3EYGuLYriuxE0UU3TDRiZJoiaMTOkeGEqW9a', '2026-04-18 10:29:26'),
(10, 'jay comendador', 'jcomendador120@gmail.com', NULL, NULL, '$2y$10$LG6LazfFej.4v5i8xQ7tk..V/91i4aEnFtRKSqYjrtn6QYrfFrlXC', '2026-04-18 11:38:58'),
(11, 'System Administrator', 'admin@gmail.com', NULL, NULL, '$2y$10$vxvILPQI7Ip1Mso2wFU5I.QmTO66C7Nflca0qEzvPEVwxw3cMyOR.', '2026-04-18 12:15:47'),
(12, 'kian noronoa', 'kian@gmail.com', NULL, NULL, '$2y$10$fSrSe/3o/n7fYWMOQmv0h.l.uowHhWp17igeindq6J8Vqc00J9hce', '2026-04-18 12:17:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_join` (`event_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_participants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
