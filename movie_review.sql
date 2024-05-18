-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 08:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_db`
--

CREATE TABLE `comment_db` (
  `id` int(11) NOT NULL,
  `movie_id` int(50) NOT NULL,
  `movie_name` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `sentiment_res` varchar(200) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_db`
--

INSERT INTO `comment_db` (`id`, `movie_id`, `movie_name`, `comment`, `sentiment_res`, `user_id`, `created_at`) VALUES
(1, 1, 'Hustlers', 'THis is nice movie ', 1, '2', '2022-03-14 11:07:55'),
(2, 1, 'Hustlers', 'Code red', 1, '1', '2022-03-14 10:24:26'),
(3, 1, 'Hustlers', 'Rest code', 1, '1', '2022-03-14 10:24:43'),
(4, 1, 'Hustlers', 'Awesome Movie to watch in this weekend', 1, '3', '2022-03-14 11:26:04'),
(5, 1, 'Hustlers', 'New comment on that.', 1, '4', '2022-03-15 14:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `username`, `email`, `password`) VALUES
(1, 'min', 'min@gmail.com', '$2y$10$A3ShpSzHQ9KeQPFKRIVKUusoquAqGdr4z9qVVFZAAMGLQfongJFhW'),
(2, 'abc', 'abc@gmail.com', '$2y$10$2Ls9L9Tzi8Whg3ShmLSxBOPoP2zxNaIangDjEkLKvLjvp1k.SOJhC'),
(3, 'XYZ', 'xyz@gmail.com', '$2y$10$FsHG5Q2vlXzfyp6Txn94HeseE45.8wgCxpLCD/3g7bh4x6WIKpmF.'),
(4, 'demo', 'demo@gmail.com', '$2y$10$9qaJlK7OSgwruwD4XQVz/OQFjdXM/aU8aBYH/dmHif/36eDcZJ/hC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_db`
--
ALTER TABLE `comment_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_db`
--
ALTER TABLE `comment_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
