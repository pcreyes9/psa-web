-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2025 at 01:58 AM
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
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `psa_id` varchar(100) NOT NULL,
  `prc_number` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `membership` varchar(255) NOT NULL,
  `discount_id` varchar(255) DEFAULT NULL,
  `proof_payment` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `psa_id`, `prc_number`, `last_name`, `first_name`, `middle_name`, `hospital_name`, `hospital_address`, `email`, `contact_number`, `gender`, `membership`, `discount_id`, `proof_payment`, `status`, `country`, `created_at`, `updated_at`) VALUES
(1, '3114', 11234124, 'CRISTI', 'MARIA VANESSA', 'A.', 'TEST', 'TEST', 'pcreyes09@gmail.com', '123123', 'N/A', 'RM', 'No discount', NULL, 'Approved', 'Philippines', '2025-12-17 00:03:10', '2025-12-17 00:03:10'),
(2, '3115', 11234124, 'ELLICA', 'SYD', 'A.', 'TEST', 'TEST', 'pcreyes09@gmail.com', '123123', 'N/A', 'TM', 'No discount', NULL, 'Approved', 'Philippines', '2025-12-17 00:04:04', '2025-12-17 00:04:04'),
(3, '3115', 11234124, 'ELLICA', 'SYD', 'A.', 'TEST', 'TEST', 'pcreyes09@gmail.com', '123123', 'N/A', 'TM', 'No discount', NULL, 'Pending', 'Philippines', '2025-12-17 00:04:17', '2025-12-17 00:04:17'),
(4, '3114', 23131, 'CRISTI', 'MARIA VANESSA', 'A.', 'TEST', 'TEST', 'pcreyes09@gmail.com', '123123', 'N/A', 'RM', 'No discount', NULL, 'Pending', 'Philippines', '2025-12-17 01:04:45', '2025-12-17 01:04:45'),
(5, '2314', 123, 'MARZO-MADDATU', 'EUNICE CAROLL', 'C.', 'asd', 'asd', 'qwe@awe1', '1231', 'N/A', 'RM', 'No discount', '2314 MARZO-MADDATU - Proof of Payment 121825 - 022537.heic', 'Pending', 'Philippines', '2025-12-17 18:25:37', '2025-12-17 18:25:37'),
(6, '3116', 123, 'ENRIQUEZ, JR.', 'RODOLFO', 'B.', 'asd', 'asd', 'asda@asd', '1231', 'N/A', 'RM', '3116 ENRIQUEZ, JR. - pwd_disc 121825 - 024327.heic', '3116 ENRIQUEZ, JR. - Proof of Payment 121825 - 024327.heic', 'Pending', 'Philippines', '2025-12-17 18:43:27', '2025-12-17 18:43:27'),
(7, '0002', 123, 'MANZANO-MANZON', 'AMELIA JASMIN', 'C.', 'asd', 'asd', 'pcreyes09@gmail.com', '123', 'N/A', 'RM', 'No discount', '0002 MANZANO-MANZON - Proof of Payment 121825 - 032303.heic', 'Pending', 'Philippines', '2025-12-17 19:23:03', '2025-12-17 19:23:03'),
(8, '0002', 123, 'MANZANO-MANZON', 'AMELIA JASMIN', 'C.', 'asd', 'asd', 'pcreyes09@gmail.com', '123', 'N/A', 'RM', 'No discount', '0002 MANZANO-MANZON - Proof of Payment 121825 - 032317.heic', 'Approved', 'Philippines', '2025-12-17 19:23:17', '2025-12-17 19:23:17'),
(9, '2415', 123, 'MADARANG', 'MICHAEL RONALD', 'B.', 'TEST', 'TEST', 'pcrstorage09@gmail.com', '123', 'N/A', 'RM', '2415 MADARANG - pwd_disc 121925 - 022445.heic', '2415 MADARANG - Proof of Payment 121925 - 022445.heic', 'Pending', 'Philippines', '2025-12-18 18:24:45', '2025-12-18 18:24:45'),
(10, '1658', 12313, 'REYES', 'YOLANDA', 'H.', 'TEST', 'test', 'pcrstorage09@gmail.com', '13213', 'N/A', 'RM', 'No discount', '1658 REYES - Proof of Payment 122225 - 021150.heic', 'Approved', 'Philippines', '2025-12-21 18:11:50', '2025-12-21 18:11:50'),
(11, '4123', 123123, 'CABORNAY', 'JAN BENARV', 'C.', '123123', '13123', 'pcreyes09@gmail.com', '123', 'N/A', 'RM', '4123 CABORNAY - pwd_disc 122525 - 030143.heic', '4123 CABORNAY - Proof of Payment 122525 - 030143.heic', 'Pending', 'Philippines', '2025-12-24 19:01:43', '2025-12-24 19:01:43'),
(12, '1534', 1312, 'PASTORAL', 'GLORINIA', 'A.', 'qwe', 'qwewq', 'pcrstorage09@gmail.com', '123123', 'N/A', 'RM', '1534-PASTORAL-senior_disc-122525 - 031619.heic', '1534-PASTORAL-Proof_of_Payment-122525-031619.heic', 'Pending', 'Philippines', '2025-12-24 19:16:19', '2025-12-24 19:16:19'),
(13, '5123', 123123, 'CRUZ', 'AUDREY SHANNEN', 'I.', '123123', '123123', 'pcrstorage09@gmail.com', '12313', 'N/A', 'RM', 'No discount', '5123-CRUZ-Proof_of_Payment-122525-105101.heic', 'Pending', 'Philippines', '2025-12-25 14:51:01', '2025-12-25 14:51:01'),
(14, '5123', 123123, 'CRUZ', 'AUDREY SHANNEN', 'I.', '123123', '123123', 'pcrstorage09@gmail.com', '12313', 'N/A', 'RM', 'No discount', '5123-CRUZ-Proof_of_Payment-122525-105304.heic', 'Pending', 'Philippines', '2025-12-25 14:53:04', '2025-12-25 14:53:04'),
(15, '5632', 3232, 'ANTONIO', 'WILFRED', 'I.', '123', '233', 'pcrstorage09@gmail.com', '123123', 'N/A', 'TM', 'No discount', '5632-ANTONIO-Proof_of_Payment-122525-105857.heic', 'Pending', 'Philippines', '2025-12-25 14:58:57', '2025-12-25 14:58:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
