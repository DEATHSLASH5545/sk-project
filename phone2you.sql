-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 08:39 PM
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
-- Database: `phone2you`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kod_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `kod_jenama` varchar(10) DEFAULT NULL,
  `harga` double(7,2) DEFAULT NULL,
  `ciri` text DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `nokp_staff` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kod_barang`, `nama_barang`, `kod_jenama`, `harga`, `ciri`, `gambar`, `nokp_staff`) VALUES
(20, 'RENO 8 Pro', 'OP1', 3099.00, '12GB RAM ', '2023-07-04-164149.jpg', '061104141115'),
(23, '14 PRO MAX', 'IP', 5499.00, '6GB RAM + 256GB ROM', '2023-07-05-031047.jpg', '061104141115'),
(24, 'NOKIA', 'NOK1', 1500.00, '6GB RAM', '2023-07-05-051941.jpg', '061104141115'),
(25, 'S23 Ultra', 'SM1', 1599.00, '8GB RAM + 256GB ROM', '2023-07-05-052148.jpg', '061104141115'),
(26, '14s', 'len', 1500.00, '6GB RAM + 256GB ROM', '2023-07-06-060452.jpg', '061104141115');

-- --------------------------------------------------------

--
-- Table structure for table `jenama`
--

CREATE TABLE `jenama` (
  `kod_jenama` varchar(10) NOT NULL,
  `jenama_barang` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenama`
--

INSERT INTO `jenama` (`kod_jenama`, `jenama_barang`) VALUES
('AGSP', 'RAPIDKL'),
('IP', 'IPHONE'),
('len', 'lenovo'),
('NOK1', 'NOKIA'),
('OP1', 'OPPO'),
('SM1', 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `nokp_pembeli` varchar(12) NOT NULL,
  `nama_pembeli` varchar(60) DEFAULT NULL,
  `katalaluan_pembeli` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`nokp_pembeli`, `nama_pembeli`, `katalaluan_pembeli`) VALUES
('061223140705', 'jeeven', '23162316'),
('111111111111', 'usopp', '123'),
('567856785678', 'Preston', '1234'),
('999999999999', 'SEBESTIAN', '1234');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kod_barang`),
  ADD KEY `nokp_staff` (`nokp_staff`),
  ADD KEY `kod_jenama` (`kod_jenama`);

--
-- Indexes for table `jenama`
--
ALTER TABLE `jenama`
  ADD PRIMARY KEY (`kod_jenama`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`nokp_pembeli`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nokp_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kod_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`nokp_staff`) REFERENCES `staff` (`nokp_staff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kod_jenama`) REFERENCES `jenama` (`kod_jenama`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
