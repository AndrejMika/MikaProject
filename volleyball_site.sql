-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 01:50 AM
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
-- Database: `volleyball_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `purchased_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `ticket_id`, `purchased_at`) VALUES
(2, 17, 3, '2024-06-03 06:47:04'),
(10, 17, 6, '2024-06-03 06:59:45'),
(11, 17, 3, '2024-06-03 06:59:47'),
(12, 17, 2, '2024-06-03 06:59:49'),
(13, 17, 1, '2024-06-03 06:59:51'),
(14, 17, 11, '2024-06-03 06:59:54'),
(15, 17, 15, '2024-06-03 06:59:59'),
(16, 19, 1, '2024-06-10 10:00:55'),
(17, 19, 4, '2024-06-10 10:00:56'),
(18, 19, 10, '2024-06-10 10:00:57'),
(19, 19, 17, '2024-06-10 10:00:58'),
(44, 23, 1, '2024-06-10 23:11:08'),
(45, 23, 2, '2024-06-10 23:11:09'),
(46, 23, 3, '2024-06-10 23:11:09'),
(47, 23, 4, '2024-06-10 23:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_name`, `event_date`, `price`, `created_at`) VALUES
(1, 'Volleyball Game', '2024-06-04', 23.00, '2024-06-03 03:56:09'),
(2, 'Volleyball Game', '2024-06-29', 123.00, '2024-06-03 03:56:09'),
(3, 'Volleyball Game', '2024-06-06', 90.00, '2024-06-03 03:56:09'),
(4, 'Volleyball Game', '2024-06-06', 94.00, '2024-06-03 03:56:09'),
(5, 'Volleyball Game', '2024-06-11', 66.00, '2024-06-03 03:56:09'),
(6, 'Volleyball Game', '2024-06-10', 49.00, '2024-06-03 03:56:09'),
(7, 'Volleyball Game', '2024-06-14', 0.00, '2024-06-03 03:56:09'),
(8, 'Volleyball Game', '2024-06-27', 38.00, '2024-06-03 03:56:09'),
(9, 'Volleyball Game', '2024-06-06', 72.00, '2024-06-03 03:56:09'),
(10, 'Volleyball Game', '2024-06-04', 26.00, '2024-06-03 03:56:09'),
(11, 'Volleyball Game', '2024-06-25', 33.00, '2024-06-03 03:56:09'),
(12, 'Volleyball Game', '2024-06-03', 31.00, '2024-06-03 03:56:09'),
(13, 'Volleyball Game', '2024-06-08', 25.00, '2024-06-03 03:56:09'),
(14, 'Volleyball Game', '2024-06-13', 29.00, '2024-06-03 03:56:09'),
(15, 'Volleyball Game', '2024-06-03', 50.00, '2024-06-03 03:56:09'),
(16, 'Volleyball Game', '2024-06-08', 61.00, '2024-06-03 03:56:09'),
(17, 'Volleyball Game', '2024-06-11', 75.00, '2024-06-03 03:56:09'),
(18, 'Volleyball Game', '2024-06-25', 58.00, '2024-06-03 03:56:09'),
(19, 'Volleyball Game', '2024-06-16', 65.00, '2024-06-03 03:56:09'),
(20, 'Volleyball Game', '2024-06-25', 87.00, '2024-06-03 03:56:09'),
(21, 'Volleyball Game', '2024-06-04', 68.00, '2024-06-03 03:56:09'),
(22, 'Volleyball Game', '2024-06-05', 52.00, '2024-06-03 03:56:09'),
(23, 'Volleyball Game', '2024-06-06', 29.00, '2024-06-03 03:56:09'),
(24, 'Volleyball Game', '2024-06-23', 80.00, '2024-06-03 03:56:09'),
(25, 'Volleyball Game', '2024-06-28', 91.00, '2024-06-03 03:56:09'),
(26, 'Volleyball Game', '2024-06-30', 92.00, '2024-06-03 03:56:09'),
(27, 'Volleyball Game', '2024-06-26', 27.00, '2024-06-03 03:56:09'),
(28, 'Volleyball Game', '2024-06-21', 53.00, '2024-06-03 03:56:09'),
(29, 'Volleyball Game', '2024-06-19', 45.00, '2024-06-03 03:56:09'),
(30, 'Volleyball Game', '2024-06-11', 25.00, '2024-06-03 03:56:09'),
(31, 'Volleyball Game', '2024-06-04', 76.00, '2024-06-03 03:56:09'),
(32, 'Volleyball Game', '2024-06-18', 43.00, '2024-06-03 03:56:09'),
(33, 'Volleyball Game', '2024-06-12', 49.00, '2024-06-03 03:56:09'),
(34, 'Volleyball Game', '2024-06-09', 85.00, '2024-06-03 03:56:09'),
(35, 'Volleyball Game', '2024-06-17', 92.00, '2024-06-03 03:56:09'),
(36, 'Volleyball Game', '2024-06-05', 76.00, '2024-06-03 03:56:09'),
(37, 'Volleyball Game', '2024-06-15', 83.00, '2024-06-03 03:56:09'),
(38, 'Volleyball Game', '2024-06-28', 78.00, '2024-06-03 03:56:09'),
(39, 'Volleyball Game', '2024-06-11', 18.00, '2024-06-03 03:56:09'),
(40, 'Volleyball Game', '2024-06-22', 94.00, '2024-06-03 03:56:09'),
(41, 'Volleyball Game', '2024-06-24', 79.00, '2024-06-03 03:56:09'),
(42, 'Volleyball Game', '2024-06-24', 29.00, '2024-06-03 03:56:09'),
(43, 'Volleyball Game', '2024-07-01', 24.00, '2024-06-03 03:56:09'),
(44, 'Volleyball Game', '2024-06-30', 23.00, '2024-06-03 03:56:09'),
(45, 'Volleyball Game', '2024-07-02', 51.00, '2024-06-03 03:56:09'),
(46, 'Volleyball Game', '2024-06-13', 40.00, '2024-06-03 03:56:09'),
(47, 'Volleyball Game', '2024-06-22', 27.00, '2024-06-03 03:56:09'),
(48, 'Volleyball Game', '2024-06-04', 74.00, '2024-06-03 03:56:09'),
(49, 'Volleyball Game', '2024-06-13', 69.00, '2024-06-03 03:56:09'),
(50, 'Volleyball Game', '2024-06-09', 14.00, '2024-06-03 03:56:09'),
(51, 'Volleyball Game', '2024-06-22', 13.00, '2024-06-03 03:56:09'),
(52, 'Volleyball Game', '2024-06-12', 44.00, '2024-06-03 03:56:09'),
(53, 'Volleyball Game', '2024-07-02', 77.00, '2024-06-03 03:56:09'),
(54, 'Volleyball Game', '2024-06-26', 74.00, '2024-06-03 03:56:09'),
(55, 'Volleyball Game', '2024-06-09', 90.00, '2024-06-03 03:56:09'),
(56, 'Volleyball Game', '2024-06-27', 53.00, '2024-06-03 03:56:09'),
(57, 'Volleyball Game', '2024-06-29', 100.00, '2024-06-03 03:56:09'),
(58, 'Volleyball Game', '2024-06-12', 62.00, '2024-06-03 03:56:09'),
(59, 'Volleyball Game', '2024-07-02', 22.00, '2024-06-03 03:56:09'),
(60, 'Volleyball Game', '2024-06-25', 38.00, '2024-06-03 03:56:09'),
(61, 'Volleyball Game', '2024-06-13', 82.00, '2024-06-03 03:56:09'),
(62, 'Volleyball Game', '2024-07-01', 42.00, '2024-06-03 03:56:09'),
(63, 'Volleyball Game', '2024-07-01', 70.00, '2024-06-03 03:56:09'),
(64, 'Volleyball Game', '2024-06-17', 47.00, '2024-06-03 03:56:09'),
(65, 'Volleyball Game', '2024-06-20', 78.00, '2024-06-03 03:56:09'),
(66, 'Volleyball Game', '2024-07-02', 68.00, '2024-06-03 03:56:09'),
(67, 'Volleyball Game', '2024-06-10', 43.00, '2024-06-03 03:56:09'),
(68, 'Volleyball Game', '2024-06-05', 40.00, '2024-06-03 03:56:09'),
(69, 'Volleyball Game', '2024-06-15', 12.00, '2024-06-03 03:56:09'),
(70, 'Volleyball Game', '2024-06-30', 55.00, '2024-06-03 03:56:09'),
(71, 'Volleyball Game', '2024-06-25', 33.00, '2024-06-03 03:56:09'),
(72, 'Volleyball Game', '2024-06-04', 51.00, '2024-06-03 03:56:09'),
(73, 'Volleyball Game', '2024-06-06', 33.00, '2024-06-03 03:56:09'),
(74, 'Volleyball Game', '2024-06-30', 88.00, '2024-06-03 03:56:09'),
(75, 'Volleyball Game', '2024-06-18', 10.00, '2024-06-03 03:56:09'),
(76, 'Volleyball Game', '2024-06-16', 36.00, '2024-06-03 03:56:09'),
(77, 'Volleyball Game', '2024-06-05', 64.00, '2024-06-03 03:56:09'),
(78, 'Volleyball Game', '2024-06-24', 76.00, '2024-06-03 03:56:09'),
(79, 'Volleyball Game', '2024-06-18', 48.00, '2024-06-03 03:56:09'),
(80, 'Volleyball Game', '2024-06-19', 55.00, '2024-06-03 03:56:09'),
(81, 'Volleyball Game', '2024-06-28', 74.00, '2024-06-03 03:56:09'),
(82, 'Volleyball Game', '2024-06-03', 95.00, '2024-06-03 03:56:09'),
(83, 'Volleyball Game', '2024-06-23', 59.00, '2024-06-03 03:56:09'),
(84, 'Volleyball Game', '2024-06-23', 82.00, '2024-06-03 03:56:09'),
(85, 'Volleyball Game', '2024-07-01', 41.00, '2024-06-03 03:56:09'),
(86, 'Volleyball Game', '2024-06-29', 48.00, '2024-06-03 03:56:09'),
(87, 'Volleyball Game', '2024-06-16', 100.00, '2024-06-03 03:56:09'),
(88, 'Volleyball Game', '2024-06-21', 18.00, '2024-06-03 03:56:09'),
(89, 'Volleyball Game', '2024-06-21', 80.00, '2024-06-03 03:56:09'),
(90, 'Volleyball Game', '2024-06-04', 99.00, '2024-06-03 03:56:09'),
(91, 'Volleyball Game', '2024-06-25', 75.00, '2024-06-03 03:56:09'),
(92, 'Volleyball Game', '2024-06-14', 82.00, '2024-06-03 03:56:09'),
(93, 'Volleyball Game', '2024-06-27', 76.00, '2024-06-03 03:56:09'),
(94, 'Volleyball Game', '2024-06-08', 72.00, '2024-06-03 03:56:09'),
(95, 'Volleyball Game', '2024-06-30', 60.00, '2024-06-03 03:56:09'),
(96, 'Volleyball Game', '2024-07-02', 34.00, '2024-06-03 03:56:09'),
(97, 'Volleyball Game', '2024-06-14', 22.00, '2024-06-03 03:56:09'),
(98, 'Volleyball Game', '2024-06-18', 31.00, '2024-06-03 03:56:09'),
(99, 'Volleyball Game', '2024-06-20', 26.00, '2024-06-03 03:56:09'),
(100, 'Volleyball Game', '2024-06-08', 38.00, '2024-06-03 03:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `surname`, `lastname`, `email`) VALUES
(17, 'asdasfsdafgadfg', '$2y$10$3wNtEvjDi56GDh70Vr/JJOwx6hTBTuBqYKSU.yBnZOv5o3YXepugq', 'sad', 'ad', 'zxcv@gdafgd'),
(18, 'andrej', '$2y$10$XuDCg8oP6bWq1bhv8nUEMuvlHlv8BybApFWqkVGQxQQ1r6e9f3vRu', 'Andrej', 'Mika', 'andrejmika@example.com'),
(19, 'ado', '$2y$10$hhH26nfYrj88KWidVblJ/.pO6wW2TD4OdnRWgDAzuYiUcM8t6AZtS', 'Andrej', 'Mika', 'asd@kolac'),
(20, 'a', '$2y$10$oYdYYk48u01CLY3tkvIUy.7Tc8GJPqdqxphC3krqoC29DTQ2tCLsq', 'a', 'a', 'asd@kolac'),
(21, 'b', '$2y$10$jdSK8OJbtjpKvY3xmAO6KOZdkBy09prdT5kdDlXZ23wWhBPaueCWm', 'b', 'b', 'asd@kolac'),
(22, 'c', '$2y$10$THF410XDIIV8vQpw2DP6JubrfXMN32OvVQPdhCL1Q8J88PZIkZ/46', 'c', 'c', 'c@c'),
(23, 'd', '$2y$10$6C6.LyEAuvobMwKUFYpZB..hBkouAA1YRwxIER0fcgqKSvEJegUfq', 'd', 'd', 'd@d'),
(24, 'e', '$2y$10$BSnGQYA7xXj0KMX2WA9QNurimM3v9EjnZIA.HVGTBXa.RW5lVrS.G', 'e', 'e', 'e@e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
