-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 03:55 PM
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
-- Database: `ve_easykamas`
--

-- --------------------------------------------------------

--
-- Table structure for table `echangetickets`
--

CREATE TABLE `echangetickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_server1` int(11) DEFAULT NULL,
  `char1_name` varchar(255) NOT NULL,
  `quantity_1` int(11) NOT NULL,
  `id_server_2` int(11) DEFAULT NULL,
  `char2_name` varchar(255) NOT NULL,
  `quantity_2` int(11) NOT NULL,
  `status` enum('en attente de livraison','paiement en cours','payé','annulé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `echangetickets`
--

INSERT INTO `echangetickets` (`id`, `user_id`, `id_server1`, `char1_name`, `quantity_1`, `id_server_2`, `char2_name`, `quantity_2`, `status`) VALUES
(2, 2, 5, 'habazo', 123, 18, 'bzaekjh', 244, 'en attente de livraison'),
(3, 3, 9, 'one hemza', 123, 23, 'hello', 78, 'en attente de livraison');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `server_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Incomplet','Stock complet') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `server_name`, `price`, `status`) VALUES
(1, 'Orukam', 50.00, 'Stock complet'),
(2, 'Tylezia', 55.00, 'Incomplet'),
(3, 'Imagiro', 45.00, 'Stock complet'),
(4, 'Hell Mina', 60.00, 'Stock complet'),
(5, 'Tal Kasha', 70.00, 'Incomplet'),
(6, 'Draconiros', 65.00, 'Stock complet'),
(7, 'Ombre', 40.00, 'Incomplet'),
(8, 'Dakal 1', 30.00, 'Stock complet'),
(9, 'Dakal 2', 30.00, 'Incomplet'),
(10, 'Dakal 3', 30.00, 'Stock complet'),
(11, 'Dakal 4', 30.00, 'Stock complet'),
(12, 'Dakal 5', 30.00, 'Incomplet'),
(13, 'Dakal 6', 30.00, 'Stock complet'),
(14, 'Dakal 7', 30.00, 'Stock complet'),
(15, 'Dakal 8', 30.00, 'Incomplet'),
(16, 'Dakal 9', 30.00, 'Stock complet'),
(17, 'Dakal 10', 30.00, 'Stock complet'),
(18, 'Dakal 11', 30.00, 'Incomplet'),
(19, 'Dakal 12', 30.00, 'Stock complet'),
(20, 'Brial 1', 35.00, 'Stock complet'),
(21, 'Brial 2', 35.00, 'Incomplet'),
(22, 'Kourial 1', 40.00, 'Stock complet'),
(23, 'Kourial 2', 40.00, 'Incomplet'),
(24, 'Mikhal 1', 45.00, 'Stock complet'),
(25, 'Mikhal 2', 45.00, 'Incomplet'),
(26, 'Salar 1', 50.00, 'Stock complet'),
(27, 'Salar 2', 50.00, 'Incomplet'),
(28, 'Rafal 1', 55.00, 'Stock complet'),
(29, 'Rafal 2', 55.00, 'Incomplet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `phone`, `adresse`, `role`, `password`) VALUES
(2, 'sacripl111@gmail.com', 'two hemza', '0614323456', 'rue 210 imm 4 jhzaekjh hay mofarih 123123', 'customer', '$2y$10$2UM8bapJypDbzCqbiXNZOOD2ZdJeNRQITvn0jqZdWGUEYRPgt2bxi'),
(3, 'contact.hamnar@gmail.com', 'abdo hm', '0854321234', 'rue 210 imm 4 jhzaekjh hay mofarih', 'customer', '$2y$10$dTmjf7SGdUvtY0BlI63RO.YirlIaHEBz/BWpW/BJDHnH.yORnH8gi');

-- --------------------------------------------------------

--
-- Table structure for table `ventetickets`
--

CREATE TABLE `ventetickets` (
  `id` int(11) NOT NULL,
  `id_server` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `char_name` varchar(255) NOT NULL,
  `price_server` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('en attente de livraison','paiement en cours','payé','annulé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventetickets`
--

INSERT INTO `ventetickets` (`id`, `id_server`, `id_user`, `char_name`, `price_server`, `quantity`, `total`, `status`) VALUES
(3, 9, 2, 'pikini', 30.00, 12, 360.00, 'annulé'),
(4, 2, 3, 'one hemza', 55.00, 10, 550.00, 'en attente de livraison');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `echangetickets`
--
ALTER TABLE `echangetickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_server1` (`id_server1`),
  ADD KEY `id_server_2` (`id_server_2`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ventetickets`
--
ALTER TABLE `ventetickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_server` (`id_server`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `echangetickets`
--
ALTER TABLE `echangetickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ventetickets`
--
ALTER TABLE `ventetickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `echangetickets`
--
ALTER TABLE `echangetickets`
  ADD CONSTRAINT `echangetickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `echangetickets_ibfk_2` FOREIGN KEY (`id_server1`) REFERENCES `servers` (`id`),
  ADD CONSTRAINT `echangetickets_ibfk_3` FOREIGN KEY (`id_server_2`) REFERENCES `servers` (`id`);

--
-- Constraints for table `ventetickets`
--
ALTER TABLE `ventetickets`
  ADD CONSTRAINT `ventetickets_ibfk_1` FOREIGN KEY (`id_server`) REFERENCES `servers` (`id`),
  ADD CONSTRAINT `ventetickets_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
