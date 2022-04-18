-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `date`) VALUES
(84, 'Mollitia eos et qui ', 'Praesentium minima a', 88, '2022-04-07 11:27:27'),
(85, 'Tenetur voluptate id', 'Dicta quis illum co', 88, '2022-04-07 11:28:11'),
(88, 'Inventore quo sed as', 'Sed et nemo incidunt', 89, '2022-04-07 11:30:40'),
(90, 'Officia placeat adi', 'In dolorem eaque ut ', 88, '2022-04-07 12:55:53'),
(92, 'Temporibus accusanti', 'Odio corporis tempor', 88, '2022-04-07 16:32:48'),
(105, 'Laborum est omnis o', 'Minima cillum optio', 88, '2022-04-18 09:02:00'),
(108, 'Consectetur aperiam', 'Consequatur Ducimus', 88, '2022-04-18 09:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`) VALUES
(88, 'Emily Chris', 'emily@gmail.com', 'emily123', '2022-04-07 10:37:45'),
(89, 'Mya Mya', 'myamya@gmail.com', 'myamya123', '2022-04-07 11:30:21'),
(150, 'Aye Aye', 'ayeaye@gmail.com', 'ayeaye123', '2022-04-08 11:35:33'),
(151, 'John', 'john@gmail.com', 'john123', '2022-04-08 11:39:41'),
(152, 'Bentely', 'ben@gmail.com', 'ben123', '2022-04-08 15:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
