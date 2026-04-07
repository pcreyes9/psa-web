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
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `id` int(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `pharma_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exhibitors`
--

INSERT INTO `exhibitors` (`id`, `code`, `pharma_name`) VALUES
(1, 'PB01ENME', 'Endure Medical'),
(2, 'PB02TRKA', 'Troikaa'),
(3, 'PB03ZPTH', 'ZP Therapeutics'),
(4, 'PB04GEME', 'Getmeds'),
(5, 'PB05CADR', 'Cathay Drug'),
(6, 'PB06EMIN', 'EMS Instruments'),
(7, 'PB07ZMSD', 'MSD'),
(8, 'RB08GLDM', 'Glorious Dexa Mandaya'),
(9, 'RB09HIRO', 'Otium Healthcare (HIRO)'),
(10, 'RB10IOMA', 'IOS Marketing'),
(11, 'RB11WELLE', 'Wellesta'),
(12, 'RB12ZYPC', 'Zyre Pharmaceuticals Corporation'),
(13, 'RB13KAST', 'Karlstorz'),
(14, 'RB14IMSI', 'IDS Medical Systems Inc.'),
(15, 'RB15JUHE', 'Justright Healthcare'),
(16, 'R16BDPH', 'BD Philippines'),
(17, 'R17SANO', 'Sannovex'),
(18, 'RB18DEPH', 'Delex Pharma'),
(19, 'RB19JUBI', 'Juniper Biologics'),
(20, 'RB20PRME', 'Prime Medix'),
(21, 'RB21BILI', 'Biocare Lifesciences Inc'),
(22, 'RB22TEFL', 'Teleflex'),
(23, 'RB23MGPR', 'MG Prime'),
(24, 'RB24MAPH', 'Macropharma'),
(25, 'RB25DREG', 'Draeger'),
(26, 'RTB07ALLME', 'ALLMED Instruments'),
(27, 'RTB08BRMS', 'B. Braun Medical Supplies'),
(28, 'RTB09RBGM', 'RBGM Medical'),
(29, 'RTB10FRKA', 'Fresenius-Kabi'),
(30, 'RTB11AAAP', 'AAA Pharma'),
(31, 'RTB12HOME', 'Homecare'),
(32, 'RTB13MORRI', 'Morriston'),
(33, 'RTB14DAJE', 'Davao Jewelry Express');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
