-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 06:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dre_stays`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingNo` int(255) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `hotelId` varchar(255) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `totalCost` mediumtext NOT NULL,
  `cancelled` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pricePerNight` varchar(255) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rating` int(5) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `pricePerNight`, `thumbnail`, `type`, `rating`, `address`) VALUES
('hotel1', 'Flamingo\'s', 'R350', 'https://picsum.photos/200', 'Bed and Breakfast', 3, 'Cape Town'),
('hotel2', 'Gwen\'s Hideout', 'R750', 'https://picsum.photos/200', 'Hotel', 5, 'St Lucia'),
('hotel 3', 'The Point', 'R560', 'https://picsum.photos/200', 'Self-catering', 2, 'Durban');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `address`, `password`, `email`) VALUES
(1, 'Trip', 'Andre Christiaan Visser', '91 Admialty Way Summerstrand', '$2y$10$ffoM7.dPjmXVWMkSiNZr6eQJ1DqCq2vdLelx1.0X4PJiwbwEBxVk6', 'chrisjanv@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
