-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 06, 2024 at 01:04 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

CREATE DATABASE IF NOT EXISTS `app`;

USE `app`;

CREATE TABLE `Food` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `is_in_menu` tinyint(1) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`id`, `name`, `picture`, `is_in_menu`, `price`) VALUES
(2, 'Hamburger', '/assets/burger.jpg', 1, 135000),
(3, 'Pizza', '/assets/pizza.jpg', 1, 335000),
(4, 'Pasta', '/assets/pasta.jpg', 0, 285000),
(5, 'Fried Chicken', 'assets/chicken.jpg', 1, 235000);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `is_admin`) VALUES
(6, 'admin', '$2y$10$b4h.jK8PhS.hL0Hnam9a5enQv92e.5w1aKA8FcOLXciH5ePHInlk2', 1),
(7, 'simple', '$2y$10$aLNpNFusEueO6Ih40r7/EuSED5CQZoB3DwZOJRjKNeOXlRuGcS8qG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Food`
--
ALTER TABLE `Food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
