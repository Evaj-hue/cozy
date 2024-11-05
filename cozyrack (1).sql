-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 08:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozyrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'cj', 'cj@example.com', '3b4de7a4059e6e7460206830affcfd73'),
(2, 'jave', 'jave@example.com', '3b4de7a4059e6e7460206830affcfd73'),
(3, 'jabe', 'jabe@example.com', '3b4de7a4059e6e7460206830affcfd73'),
(4, 'layla', 'layla@example.com', '3b4de7a4059e6e7460206830affcfd73'),
(5, 'haha', 'haha@example.com', 'jave'),
(6, 'melody', 'melody@example.com', 'jave'),
(7, 'mima', 'mima@example.com', '$2y$10$Z9LIhfc9sVFA3ML5wAaCi.Fj5vp3J5zo33VzgLHmmGM7GJEopzuv2'),
(8, 'kill', 'kill@example.com', '$2y$10$O1mqjm96glA.MpyYWbzMt.ESyvf7Ese1B/atFUr7O9HeHwwbBuRsm'),
(9, 'anne', 'anne@example.com', '$2y$10$hZjHBx/jt35Nxd7lCaLE8uKArKlK/oOLoKZMdaZy0dJ1le0AF4S7W'),
(10, 'jaa', 'jaa@example.com', '$2y$10$B6Pv3xLtI9e0XUkskPGfJujeKIsNN0VgFIFTK9mwkFgdTjbT.zcYO');

-- --------------------------------------------------------

--
-- Table structure for table `rack_product`
--

CREATE TABLE `rack_product` (
  `productID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `shelf` varchar(50) NOT NULL,
  `UnitsInStock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rack_product`
--

INSERT INTO `rack_product` (`productID`, `ProductName`, `Category`, `shelf`, `UnitsInStock`) VALUES
(4, 'vanilla cart ', 'raw ingredient ', '1', 3),
(6, 'caramel cart', 'raw ingredient ', '2', 3),
(7, 'black coffee beans ', 'raw ingredient ', '1', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rack_product`
--
ALTER TABLE `rack_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rack_product`
--
ALTER TABLE `rack_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
