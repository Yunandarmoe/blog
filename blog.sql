-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 04:05 AM
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
(14, 'Autem ab aliquam inc', 'Changes Autem ab aliquam inc              ', 24, '2022-03-28 19:12:51'),
(15, 'Qui est labore quo n', 'Facere sit duis unde', 24, '2022-03-28 19:27:19'),
(16, 'Dolor do nisi laboru', '                Dolor do nisi laboru     lorem change\r\n         ', 26, '2022-03-30 11:31:20'),
(17, 'Sit ad aut enim vol', 'Et incididunt nisi t', 26, '2022-03-30 11:33:44'),
(18, 'Nulla sequi corporis', 'Qui qui eveniet nul', 28, '2022-03-30 11:43:47'),
(19, 'Libero sit minim iu', 'Maxime suscipit occa', 28, '2022-03-30 15:29:15'),
(20, 'Quia officia ex cum ', 'Nisi explicabo Nece', 28, '2022-03-30 15:29:27');

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
(24, 'Emily Chris', 'emily@gmail.com', 'emily123', '2022-03-22 12:39:09'),
(25, 'John Johnny', 'john@gmail.com', 'johnpassword', '2022-03-22 12:47:15'),
(26, 'Katherine19', 'katherine@gmail.com', '123', '2022-03-23 14:38:21'),
(28, 'Mg Mg', 'mgmg@gmail.com', 'mgmg123', '2022-03-30 11:42:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
