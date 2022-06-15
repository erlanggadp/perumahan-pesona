-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 06:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesona`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `NIK` varchar(25) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `Nama` varchar(20) NOT NULL,
  `NIK` int(25) NOT NULL,
  `Alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`Nama`, `NIK`, `Alamat`) VALUES
('Putra Permata', 32010, 'Depok'),
('Ami Putri', 32011, 'Bogor'),
('Alfi Purwo', 32012, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komersil1`
--

CREATE TABLE `tb_komersil1` (
  `type` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `biaya_surat` varchar(25) NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komersil1`
--

INSERT INTO `tb_komersil1` (`type`, `harga`, `biaya_surat`, `total_bayar`) VALUES
('50/95', '460.000.000', '3.000.000', '463.000.000'),
('60/72', '500.000.000', '3.000.000', '503.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komersil2`
--

CREATE TABLE `tb_komersil2` (
  `type` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `biaya_surat` varchar(25) NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komersil2`
--

INSERT INTO `tb_komersil2` (`type`, `harga`, `biaya_surat`, `total_bayar`) VALUES
('42/80', '375.000.000', '3.000.000', '378.000.000'),
('42/90', '415.000.000', '3.000.000', '418.000.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD KEY `NIK` (`NIK`),
  ADD KEY `type` (`type`),
  ADD KEY `total_bayar` (`total_bayar`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tb_komersil1`
--
ALTER TABLE `tb_komersil1`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `tb_komersil2`
--
ALTER TABLE `tb_komersil2`
  ADD PRIMARY KEY (`type`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tb_komersil1` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
