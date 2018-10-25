-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 08:36 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(100) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `id_kategori`, `nama_alat`, `keterangan`) VALUES
(1, 1, 'Air Temperature & RH Sensor', 'Air Temperature & RH Sensor'),
(2, 1, 'Barometric Air Pressure Sensor', 'Air Temperature & RH Sensor'),
(3, 2, 'PC Server AWS', 'PC Server AWS'),
(4, 2, 'Komunikasi Data', 'Komunikasi Data'),
(5, 3, 'Alat PMOTSP', 'Alat PMOTSP');

-- --------------------------------------------------------

--
-- Table structure for table `cek_peralatan_harian`
--

CREATE TABLE `cek_peralatan_harian` (
  `id_cek_peralatan_harian` int(100) NOT NULL,
  `id_alat` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `operasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'aws'),
(2, 'server_aws'),
(3, 'pmotsp'),
(4, 'arws'),
(5, 'digital_soil_moisture'),
(6, 'digital_barometer_vaisala'),
(7, 'prekusor_gempa_bumi'),
(8, 'asrs'),
(9, 'jaringan_internet'),
(10, 'jaringan_vpn'),
(11, 'printer'),
(12, 'ups'),
(13, 'pc'),
(14, 'laptop'),
(15, 'genset');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `id_kategori_fk` (`id_kategori`);

--
-- Indexes for table `cek_peralatan_harian`
--
ALTER TABLE `cek_peralatan_harian`
  ADD PRIMARY KEY (`id_cek_peralatan_harian`),
  ADD KEY `id_alat_fk` (`id_alat`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cek_peralatan_harian`
--
ALTER TABLE `cek_peralatan_harian`
  MODIFY `id_cek_peralatan_harian` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `id_kategori_fk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `cek_peralatan_harian`
--
ALTER TABLE `cek_peralatan_harian`
  ADD CONSTRAINT `id_alat_fk` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
