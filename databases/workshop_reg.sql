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
-- Table structure for table `workshop_reg`
--

CREATE TABLE `workshop_reg` (
  `id` int(10) NOT NULL,
  `psa_id` varchar(100) DEFAULT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `middle_initial` varchar(200) NOT NULL,
  `prc_id` varchar(100) DEFAULT NULL,
  `workshop` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `workshop_reg`
--

INSERT INTO `workshop_reg` (`id`, `psa_id`, `first_name`, `last_name`, `middle_initial`, `prc_id`, `workshop`, `created_at`, `updated_at`) VALUES
(9, '5129', 'JAMIE MARIE', 'BOLINAO', 'N.', '2313', 'POCUS Workshop', '2026-04-06 11:10:18', '2026-04-06 11:10:18'),
(12, '3121', 'TESTING', 'OCAMPO', 'C.', '123', 'Airway Workshop', '2026-04-06 15:17:24', '2026-04-06 15:17:24'),
(13, '3123', 'ANNA MAY', 'TESTING LAST', 'V.', '123', 'Airway Workshop', '2026-04-07 14:37:23', '2026-04-07 14:37:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workshop_reg`
--
ALTER TABLE `workshop_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workshop_reg`
--
ALTER TABLE `workshop_reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
