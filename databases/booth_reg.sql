-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2026 at 09:11 AM
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
-- Database: `psa_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `booth_reg`
--

CREATE TABLE `booth_reg` (
  `id` int(10) NOT NULL,
  `psa_id` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `exhibitor_name` varchar(500) DEFAULT NULL,
  `created_at` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booth_reg`
--

INSERT INTO `booth_reg` (`id`, `psa_id`, `name`, `exhibitor_name`, `created_at`) VALUES
(1, '3121', 'MA. VIOLETA OCAMPO', 'Teleflex', '2026-04-07 10:06:00'),
(2, '3121', 'MA. VIOLETA OCAMPO', 'MG Prime', '2026-04-07 10:10:56'),
(4, '3123', 'ANNA MAY ROSETE', 'MG Prime', '2026-04-07 10:12:15'),
(5, '3123', 'ANNA MAY ROSETE', 'Teleflex', '2026-04-07 10:14:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booth_reg`
--
ALTER TABLE `booth_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booth_reg`
--
ALTER TABLE `booth_reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
