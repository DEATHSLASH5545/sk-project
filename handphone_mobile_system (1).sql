-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 08:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handphone_mobile_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenamatelefonpintar`
--

CREATE TABLE `jenamatelefonpintar` (
  `kod_jenama_telefonpintar` varchar(10) NOT NULL,
  `jenama_telefonpintar` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenamatelefonpintar`
--

INSERT INTO `jenamatelefonpintar` (`kod_jenama_telefonpintar`, `jenama_telefonpintar`) VALUES
('IP', 'IPHONE'),
('NOK1', 'NOKIA'),
('OP1', 'OPPO'),
('SM1', 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembelitelefonpintar`
--

CREATE TABLE `pembelitelefonpintar` (
  `nokp_pembeli_telefonpintar` varchar(12) NOT NULL,
  `nama_pembeli_telefonpintar` varchar(60) DEFAULT NULL,
  `katalaluan_pembeli_telefonpintar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nokp_staff` varchar(12) NOT NULL,
  `nama_staff` varchar(60) DEFAULT NULL,
  `katalaluan_staff` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nokp_staff`, `nama_staff`, `katalaluan_staff`) VALUES
('061104141115', 'abhishek', 'thor5111');

-- --------------------------------------------------------

--
-- Table structure for table `telefonpintar`
--

CREATE TABLE `telefonpintar` (
  `kod_telefonpintar` int(11) NOT NULL,
  `nama_telefonpintar` varchar(30) DEFAULT NULL,
  `kod_jenama_telefonpintar` varchar(10) DEFAULT NULL,
  `harga` double(7,2) DEFAULT NULL,
  `ciri` text DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `nokp_staff` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenamatelefonpintar`
--
ALTER TABLE `jenamatelefonpintar`
  ADD PRIMARY KEY (`kod_jenama_telefonpintar`);

--
-- Indexes for table `pembelitelefonpintar`
--
ALTER TABLE `pembelitelefonpintar`
  ADD PRIMARY KEY (`nokp_pembeli_telefonpintar`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nokp_staff`);

--
-- Indexes for table `telefonpintar`
--
ALTER TABLE `telefonpintar`
  ADD PRIMARY KEY (`kod_telefonpintar`),
  ADD KEY `nokp_staff` (`nokp_staff`),
  ADD KEY `kod_jenama_telefonpintar` (`kod_jenama_telefonpintar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `telefonpintar`
--
ALTER TABLE `telefonpintar`
  MODIFY `kod_telefonpintar` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `telefonpintar`
--
ALTER TABLE `telefonpintar`
  ADD CONSTRAINT `telefonpintar_ibfk_1` FOREIGN KEY (`nokp_staff`) REFERENCES `staff` (`nokp_staff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefonpintar_ibfk_2` FOREIGN KEY (`kod_jenama_telefonpintar`) REFERENCES `jenamatelefonpintar` (`kod_jenama_telefonpintar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
