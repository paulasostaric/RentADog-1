-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 05:31 PM
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
-- Database: `rentadog`
--

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `temperament` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `durations` varchar(100) NOT NULL DEFAULT '60',
  `locations` varchar(100) NOT NULL DEFAULT 'park'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `name`, `breed`, `dob`, `temperament`, `image`, `durations`, `locations`) VALUES
(1, 'Campi', 'Križani terijer', '2018-06-05', 'Energična', 'campi.jpeg', '60', 'park'),
(2, 'Zetta', 'Križani terijer', '2023-06-08', 'Mirna', 'zetta.jpeg', '60,90', 'park,Šuma'),
(3, 'Blanco', 'Križani terijer', '2025-03-03', 'Energičan', 'blanco.jpeg', '30,60', 'park'),
(4, 'Sniper', 'Križani ovčar', '2018-07-24', 'Miran', 'sniper.jpeg', '60', 'Šuma'),
(5, 'Tijara', 'Križani terijer', '2025-02-25', 'Energična', 'tijara.jpeg', '30,60', 'park'),
(6, 'Archy', 'Križani ovčar', '2019-12-10', 'Miran', 'archy.jpeg', '60', 'park,grad'),
(7, 'Sally', 'Križani pekinezer', '2025-01-10', 'Mirna', 'sally.jpeg', '60', 'grad'),
(8, 'Daša', 'Križani gonič', '2023-08-15', 'Energična', 'dasa.jpeg', '60,90', 'Šuma'),
(9, 'Chico', 'Križani terijer', '2025-03-03', 'Energičan', 'chico.jpeg', '30,60', 'park'),
(10, 'Brut', 'Križanac', '2019-10-13', 'Miran', 'brut.jpeg', '60', 'grad'),
(11, 'Maya', 'Križani sibirski husky', '2015-01-16', 'Mirna', 'maya.jpeg', '60,90', 'Šuma'),
(12, 'Ariel', 'Križana doga', '2022-11-22', 'Energična', 'ariel.jpeg', '60', 'park'),
(13, 'Melly', 'Križani pekinezer', '2015-03-29', 'Mirna', 'melly.jpeg', '60', 'grad'),
(14, 'Šime', 'Križani rottweiler', '2023-06-20', 'Energičan', 'sime.jpeg', '60,90', 'Šuma'),
(15, 'Zora', 'Križani ovčar', '2025-03-01', 'Energična', 'zora.jpeg', '30,60', 'park'),
(16, 'Lili', 'Križani šarplaninac', '2017-03-01', 'Mirna', 'lili.jpeg', '60', 'Šuma'),
(17, 'Ella', 'Križani ptičar', '2012-03-15', 'Mirna', 'ella.jpeg', '60', 'park'),
(18, 'Prometej', 'Križani terijer', '2012-05-07', 'Miran', 'prometej.jpeg', '60', 'grad'),
(19, 'Nelly', 'Križani ovčar', '2011-10-26', 'Mirna', 'nelly.jpeg', '60', 'park'),
(20, 'Lora', 'Križani terijer', '2020-10-04', 'Mirna', 'lora.jpeg', '60', 'Šuma');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `dog_id` int(10) UNSIGNED NOT NULL,
  `reserved_for` date NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL DEFAULT 60,
  `location` varchar(50) NOT NULL,
  `reserved_by_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `dog_id`, `reserved_for`, `duration`, `location`, `reserved_by_user`, `created_at`) VALUES
(5, 2, '2025-06-10', 60, 'park', 2, '2025-06-07 13:24:13'),
(6, 20, '2025-06-17', 60, 'Šuma', 1, '2025-06-07 15:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `is_admin`, `created_at`, `role`) VALUES
(1, 'admin', '$2y$10$LqY1POgJ0QOisS7TqE.UC.NnlN3wjFJSQW.BwswnsFLtlEDVaD3Ha', 1, '2025-06-07 10:59:57', 'admin'),
(2, 'paula', '$2y$10$ptlFK.Hq89ETLXaffu3W5OBLLHDodJ6TvrGMHu1IeonXkM/3QwMKu', 0, '2025-06-07 12:35:23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dog_id` (`dog_id`),
  ADD KEY `reserved_by_user` (`reserved_by_user`);

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
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`dog_id`) REFERENCES `dogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`reserved_by_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
