-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 08:13 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(5, 3, 'Alat PMOTSP', 'Alat PMOTSP'),
(7, 1, 'Anemometer 10 m', 'Anemometer 10 m'),
(8, 1, 'Tipping Bucket Rain Gauge', 'Tipping Bucket Rain Gauge'),
(9, 1, 'Automatic Evaporimeter ( Digital Thermometer & Evaporation Level Sensor )', 'Automatic Evaporimeter ( Digital Thermometer & Evaporation Level Sensor )'),
(10, 1, 'Floating Electric Thermometer', 'Floating Electric Thermometer'),
(11, 1, 'Cup Counter Anemometer 0.5 m', 'Cup Counter Anemometer 0.5 m'),
(12, 1, 'Pyranometer Sensor ( Intensitas Radiasi)', 'Pyranometer Sensor ( Intensitas Radiasi)'),
(13, 1, 'Turf Soil Temperature Sensor ( Sensor Suhu Tanah Berumput) ', 'Turf Soil Temperature Sensor ( Sensor Suhu Tanah Berumput) '),
(14, 1, 'Bare Soil Temperature Sensor ( Sensor Suhu Tanah Gundul )', 'Bare Soil Temperature Sensor ( Sensor Suhu Tanah Gundul )'),
(15, 2, 'View Dashboard', 'View Dashboard'),
(16, 2, 'View Data', 'View Data'),
(17, 2, 'UPS + Baterai + Converter', 'UPS + Baterai + Converter'),
(18, 3, 'PC Server PMOTSP', 'PC Server PMOTSP'),
(19, 3, 'Komunikasi', 'Komunikasi'),
(20, 3, 'Logger, Switch,UPS', 'Logger, Switch,UPS'),
(21, 4, 'Perangkat ARWS', 'Perangkat ARWS'),
(22, 5, 'Alat + Sensor ', 'Alat + Sensor '),
(23, 5, 'Komunikasi', 'Komunikasi'),
(24, 6, 'Alat + Sensor ', 'Alat + Sensor '),
(25, 6, 'Komunikasi', 'Komunikasi'),
(26, 7, 'Alat + Sensor ', 'Alat + Sensor '),
(27, 7, 'PC Server ', 'PC Server '),
(28, 7, 'Logger + Komunikasi', 'Logger + Komunikasi'),
(29, 8, 'Pyranometer Diffuse/DHI', 'Pyranometer Diffuse/DHI'),
(30, 8, 'Pyranometer Global/GHI', 'Pyranometer Global/GHI'),
(31, 8, 'Pyranometer Pantulan/RI', 'Pyranometer Pantulan/RI'),
(32, 8, 'Pyrheliometer', 'Pyrheliometer'),
(33, 8, 'Sun Tracker + GPS', 'Sun Tracker + GPS'),
(34, 8, 'Sistem Catu daya ( Solar, Panel, Baterai, Arrester )', 'Sistem Catu daya ( Solar, Panel, Baterai, Arrester )'),
(35, 8, 'PC ASRS + UPS', 'PC ASRS + UPS'),
(36, 8, 'Komunikasi + Logger', 'Komunikasi + Logger'),
(37, 9, 'Modem ZTE 1 ( R.Operasional )', 'Modem ZTE 1 ( R.Operasional )'),
(38, 9, 'Modem ZTE 2 ( R.Pelayanan Data )', 'Modem ZTE 2 ( R.Pelayanan Data )'),
(39, 9, 'Modem ZTE 3 ( R.Tata Usaha )', 'Modem ZTE 3 ( R.Tata Usaha )'),
(40, 9, 'Modem ZTE 4 ( Gedung Radar )', 'Modem ZTE 4 ( Gedung Radar )'),
(41, 9, 'Hub Ruang Analisa Data', 'Hub Ruang Analisa Data'),
(42, 9, 'Hub Ruang Teknisi', 'Hub Ruang Teknisi'),
(43, 10, 'VPN BMKG', 'VPN BMKG'),
(44, 11, 'Printer Pelayanan Data ( Epson L360)', 'Printer Pelayanan Data ( Epson L360)'),
(45, 11, 'Printer Forecaster ( Epson L210)', 'Printer Forecaster ( Epson L210)'),
(46, 11, 'Printer Analisis Data 1 ( Epson L565)', 'Printer Analisis Data 1 ( Epson L565)'),
(47, 11, 'Printer Analisis Data 2 ( Epson L120)', 'Printer Analisis Data 2 ( Epson L120)'),
(48, 11, 'Printer Analisis Data 3 ( Epson L120)', 'Printer Analisis Data 3 ( Epson L120)'),
(49, 11, 'Printer Analisis Data 4/ARG ( Epson L120)', 'Printer Analisis Data 4/ARG ( Epson L120)'),
(50, 11, 'Printer Observasi ( Canon IP2770)', 'Printer Observasi ( Canon IP2770)'),
(51, 11, 'Printer TU( Brother DPC-300)', 'Printer TU( Brother DPC-300)'),
(52, 12, 'UPS PC Display Radar ICA', 'UPS PC Display Radar ICA'),
(53, 12, 'UPS PC Analisis Data 1 ( Laplace )', 'UPS PC Analisis Data 1 ( Laplace )'),
(54, 12, 'UPS PC Analisis Data 2 ( Laplace )', 'UPS PC Analisis Data 2 ( Laplace )'),
(55, 12, 'UPS PC Analisis Data 3 ( Laplace )', 'UPS PC Analisis Data 3 ( Laplace )'),
(56, 12, 'UPS PC Analisis Data 4 ( APC RT 3000 )', 'UPS PC Analisis Data 4 ( APC RT 3000 )'),
(57, 12, 'UPS Fingerprint APC 2200', 'UPS Fingerprint APC 2200'),
(58, 13, 'PC Display Radar ROW', 'PC Display Radar ROW'),
(59, 13, 'PC Display Radar RVW 1', 'PC Display Radar RVW 1'),
(60, 13, 'PC Display Radar RVW 2', 'PC Display Radar RVW 2'),
(61, 13, 'PC Display Radar 3D', 'PC Display Radar 3D'),
(62, 13, 'PC Display Radar Backup', 'PC Display Radar Backup'),
(63, 13, 'PC Analisis Data 1 ( HP Pavilion 23 )', 'PC Analisis Data 1 ( HP Pavilion 23 )'),
(64, 13, 'PC Analisis Data 2 ( HP Pavilion 23 )', 'PC Analisis Data 2 ( HP Pavilion 23 )'),
(65, 13, 'PC Analisis Data 3 ( HP Pavilion 23 )', 'PC Analisis Data 3 ( HP Pavilion 23 )'),
(66, 13, 'PC Analisis Data 4 ( Dell Optiplex 5040 )', 'PC Analisis Data 4 ( Dell Optiplex 5040 )'),
(67, 13, 'PC Analisis Data 5 ( Dell Optiplex 5040 )', 'PC Analisis Data 5 ( Dell Optiplex 5040 )'),
(68, 13, 'PC Analisis Data 6 ( SIH3/HP Envy 23 )', 'PC Analisis Data 6 ( SIH3/HP Envy 23 )'),
(69, 13, 'PC Prakiraan Cuaca ( Lenovo ThinkCentre )', 'PC Prakiraan Cuaca ( Lenovo ThinkCentre )'),
(70, 13, 'PC Pelayanan Data ( Benq NScreen )', 'PC Pelayanan Data ( Benq NScreen )'),
(71, 13, 'PC Buku Tamu ( Lenovo ThinkCentre Edge )', 'PC Buku Tamu ( Lenovo ThinkCentre Edge )'),
(72, 13, 'PC TU 1 ( Dell Inspiron i7 )', 'PC TU 1 ( Dell Inspiron i7 )'),
(73, 13, 'PC TU 2 ( Dell Inspiron i7 )', 'PC TU 2 ( Dell Inspiron i7 )'),
(74, 13, 'PC TU 3 ( Dell Inspiron i7 )', 'PC TU 3 ( Dell Inspiron i7 )'),
(75, 14, 'Laptop Bendahara ( Dell )', 'Laptop Bendahara ( Dell )'),
(76, 14, 'Laptop Forecast Iklim ( Dell )', 'Laptop Forecast Iklim ( Dell )'),
(77, 14, 'Laptop Alat Soil Moisture', 'Laptop Alat Soil Moisture'),
(78, 14, 'Laptop BMN', 'Laptop BMN'),
(79, 15, 'Genset 20 Kva', 'Genset 20 Kva'),
(80, 15, 'Ketersediaan Solar', 'Ketersediaan Solar'),
(81, 25, 'Psychrometer ( BB, BK, Max, Min )', 'Psychrometer ( BB, BK, Max, Min )'),
(82, 25, 'Termometer Rumput Tanah Berumput', 'Termometer Rumput Tanah Berumput'),
(83, 25, 'Campbell Stokes', 'Campbell Stokes'),
(84, 25, 'Panci Penguapan ( +Still Well+Hook Gauge )', 'Panci Penguapan ( +Still Well+Hook Gauge )'),
(85, 25, 'Termometer Apung', 'Termometer Apung'),
(86, 25, 'Penakar Hujan Observasi', 'Penakar Hujan Observasi'),
(87, 25, 'Penakar Hujan Hellmann', 'Penakar Hujan Hellmann'),
(88, 25, 'Anemometer 2 m', 'Anemometer 2 m');

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
(1, 'Automatic Weather Station (AWS)'),
(2, 'Server AWS'),
(3, 'Peralataan Monitoring Total  Suspended Particle (PMOTSP)'),
(4, 'Automatic Rain Water Sampler (ARWS)'),
(5, 'Digital Soil Moisture'),
(6, 'Digital Barometer Vaisala'),
(7, 'Prekursor Gempa Bumi'),
(8, 'Automatic Solar Radiation System (ASRS)'),
(9, 'Jaringan Internet'),
(10, 'Jaringan VPN'),
(11, 'Printer'),
(12, 'Uninterruptable Power Supply (UPS) '),
(13, 'PC Operasional '),
(14, 'Laptop'),
(15, 'Genset'),
(25, 'Manual dan Semi Automatic ');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriradar`
--

CREATE TABLE `kategoriradar` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriradar`
--

INSERT INTO `kategoriradar` (`id_kategori`, `nama_kategori`) VALUES
(8, 'DEHYDRATOR'),
(9, 'ETHERNET POWER SWITCH'),
(10, 'ENIGMA IV Gamic'),
(11, 'INTERLOCK CONTROL PANEL'),
(12, 'ENIGMA IV IFD'),
(13, 'TRANSMITTER'),
(14, 'GENSET'),
(15, 'UPS'),
(16, 'AC'),
(18, 'System Status'),
(19, 'Radar Control'),
(20, 'FROGRT'),
(21, 'RADIO LINK'),
(22, 'INTEGRASI');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(100) NOT NULL,
  `id_alat` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `id_alat`, `tanggal`, `kondisi`, `keterangan`) VALUES
(1, 1, '2018-10-22', 'kotor', 'keterangan kotor'),
(2, 2, '2018-10-22', 'kotor', 'kotor banget'),
(3, 3, '2018-10-22', 'bersih', '-'),
(4, 4, '2018-10-22', 'bersih', '-'),
(5, 5, '2018-10-22', 'bersih', '-'),
(6, 7, '2018-10-22', 'kotor', '-'),
(7, 8, '2018-10-22', 'bersih', '-'),
(8, 9, '2018-10-22', 'bersih', '-'),
(9, 10, '2018-10-22', 'bersih', '-'),
(10, 11, '2018-10-22', 'bersih', '-'),
(11, 12, '2018-10-22', 'bersih', '-'),
(12, 13, '2018-10-22', 'bersih', '-'),
(13, 14, '2018-10-22', 'bersih', '-'),
(14, 15, '2018-10-22', 'bersih', '-'),
(15, 16, '2018-10-22', 'bersih', '-'),
(16, 17, '2018-10-22', 'bersih', '-'),
(17, 18, '2018-10-22', 'bersih', '-'),
(18, 19, '2018-10-22', 'bersih', '-'),
(19, 20, '2018-10-22', 'bersih', '-'),
(20, 21, '2018-10-22', 'bersih', '-'),
(21, 22, '2018-10-22', 'bersih', '-'),
(22, 23, '2018-10-22', 'bersih', '-'),
(23, 24, '2018-10-22', 'bersih', '-'),
(24, 25, '2018-10-22', 'bersih', '-'),
(25, 26, '2018-10-22', 'bersih', '-'),
(26, 27, '2018-10-22', 'bersih', '-'),
(27, 28, '2018-10-22', 'bersih', '-'),
(28, 29, '2018-10-22', 'bersih', '-'),
(29, 30, '2018-10-22', 'bersih', '-'),
(30, 31, '2018-10-22', 'bersih', '-'),
(31, 32, '2018-10-22', 'bersih', '-'),
(32, 33, '2018-10-22', 'bersih', '-'),
(33, 34, '2018-10-22', 'bersih', '-'),
(34, 35, '2018-10-22', 'bersih', '-'),
(35, 36, '2018-10-22', 'bersih', '-'),
(36, 37, '2018-10-22', 'bersih', '-'),
(37, 38, '2018-10-22', 'bersih', '-'),
(38, 39, '2018-10-22', 'bersih', '-'),
(39, 40, '2018-10-22', 'bersih', '-'),
(40, 41, '2018-10-22', 'bersih', '-'),
(41, 42, '2018-10-22', 'bersih', '-'),
(42, 43, '2018-10-22', 'bersih', '-'),
(43, 44, '2018-10-22', 'bersih', '-'),
(44, 45, '2018-10-22', 'bersih', '-'),
(45, 46, '2018-10-22', 'bersih', '-'),
(46, 47, '2018-10-22', 'bersih', '-'),
(47, 48, '2018-10-22', 'bersih', '-'),
(48, 49, '2018-10-22', 'bersih', '-'),
(49, 50, '2018-10-22', 'bersih', '-'),
(50, 51, '2018-10-22', 'bersih', '-'),
(51, 52, '2018-10-22', 'bersih', '-'),
(52, 53, '2018-10-22', 'bersih', '-'),
(53, 54, '2018-10-22', 'bersih', '-'),
(54, 55, '2018-10-22', 'bersih', '-'),
(55, 56, '2018-10-22', 'bersih', '-'),
(56, 57, '2018-10-22', 'bersih', '-'),
(57, 58, '2018-10-22', 'bersih', '-'),
(58, 59, '2018-10-22', 'bersih', '-'),
(59, 60, '2018-10-22', 'bersih', '-'),
(60, 61, '2018-10-22', 'bersih', '-'),
(61, 62, '2018-10-22', 'bersih', '-'),
(62, 63, '2018-10-22', 'bersih', '-'),
(63, 64, '2018-10-22', 'bersih', '-'),
(64, 65, '2018-10-22', 'bersih', '-'),
(65, 66, '2018-10-22', 'bersih', '-'),
(66, 67, '2018-10-22', 'bersih', '-'),
(67, 68, '2018-10-22', 'bersih', '-'),
(68, 69, '2018-10-22', 'bersih', '-'),
(69, 70, '2018-10-22', 'bersih', '-'),
(70, 71, '2018-10-22', 'bersih', '-'),
(71, 72, '2018-10-22', 'bersih', '-'),
(72, 73, '2018-10-22', 'bersih', '-'),
(73, 74, '2018-10-22', 'bersih', '-'),
(74, 75, '2018-10-22', 'bersih', '-'),
(75, 76, '2018-10-22', 'bersih', '-'),
(76, 77, '2018-10-22', 'bersih', '-'),
(77, 78, '2018-10-22', 'bersih', '-'),
(78, 79, '2018-10-22', 'bersih', '-'),
(79, 80, '2018-10-22', 'bersih', '-'),
(80, 81, '2018-10-22', 'bersih', '-'),
(81, 82, '2018-10-22', 'bersih', '-'),
(82, 83, '2018-10-22', 'bersih', '-'),
(83, 84, '2018-10-22', 'bersih', '-'),
(84, 85, '2018-10-22', 'bersih', '-'),
(85, 86, '2018-10-22', 'bersih', '-'),
(86, 87, '2018-10-22', 'bersih', '-'),
(87, 88, '2018-10-22', 'bersih', '-'),
(88, 1, '2018-10-22', 'bersih', '-'),
(89, 2, '2018-10-22', 'bersih', '-'),
(90, 3, '2018-10-22', 'kotor', 'debu'),
(91, 4, '2018-10-22', 'kotor', 'angin'),
(92, 5, '2018-10-22', 'bersih', '-'),
(93, 7, '2018-10-22', 'bersih', '-'),
(94, 8, '2018-10-22', 'bersih', '-'),
(95, 9, '2018-10-22', 'bersih', '-'),
(96, 10, '2018-10-22', 'bersih', '-'),
(97, 11, '2018-10-22', 'bersih', '-'),
(98, 12, '2018-10-22', 'bersih', '-'),
(99, 13, '2018-10-22', 'bersih', '-'),
(100, 14, '2018-10-22', 'bersih', '-'),
(101, 15, '2018-10-22', 'kotor', 'daun'),
(102, 16, '2018-10-22', 'kotor', 'kecoa'),
(103, 17, '2018-10-22', 'kotor', 'sangit'),
(104, 18, '2018-10-22', 'bersih', '-'),
(105, 19, '2018-10-22', 'bersih', '-'),
(106, 20, '2018-10-22', 'bersih', '-'),
(107, 21, '2018-10-22', 'bersih', '-'),
(108, 22, '2018-10-22', 'bersih', '-'),
(109, 23, '2018-10-22', 'bersih', '-'),
(110, 24, '2018-10-22', 'bersih', '-'),
(111, 25, '2018-10-22', 'bersih', '-'),
(112, 26, '2018-10-22', 'bersih', '-'),
(113, 27, '2018-10-22', 'bersih', '-'),
(114, 28, '2018-10-22', 'bersih', '-'),
(115, 29, '2018-10-22', 'bersih', '-'),
(116, 30, '2018-10-22', 'bersih', '-'),
(117, 31, '2018-10-22', 'bersih', '-'),
(118, 32, '2018-10-22', 'bersih', '-'),
(119, 33, '2018-10-22', 'bersih', '-'),
(120, 34, '2018-10-22', 'bersih', '-'),
(121, 35, '2018-10-22', 'bersih', '-'),
(122, 36, '2018-10-22', 'bersih', '-'),
(123, 37, '2018-10-22', 'bersih', '-'),
(124, 38, '2018-10-22', 'bersih', '-'),
(125, 39, '2018-10-22', 'bersih', '-'),
(126, 40, '2018-10-22', 'bersih', '-'),
(127, 41, '2018-10-22', 'bersih', '-'),
(128, 42, '2018-10-22', 'bersih', '-'),
(129, 43, '2018-10-22', 'bersih', '-'),
(130, 44, '2018-10-22', 'bersih', '-'),
(131, 45, '2018-10-22', 'bersih', '-'),
(132, 46, '2018-10-22', 'bersih', '-'),
(133, 47, '2018-10-22', 'bersih', '-'),
(134, 48, '2018-10-22', 'bersih', '-'),
(135, 49, '2018-10-22', 'bersih', '-'),
(136, 50, '2018-10-22', 'bersih', '-'),
(137, 51, '2018-10-22', 'bersih', '-'),
(138, 52, '2018-10-22', 'bersih', '-'),
(139, 53, '2018-10-22', 'bersih', '-'),
(140, 54, '2018-10-22', 'bersih', '-'),
(141, 55, '2018-10-22', 'bersih', '-'),
(142, 56, '2018-10-22', 'bersih', '-'),
(143, 57, '2018-10-22', 'bersih', '-'),
(144, 58, '2018-10-22', 'bersih', '-'),
(145, 59, '2018-10-22', 'bersih', '-'),
(146, 60, '2018-10-22', 'bersih', '-'),
(147, 61, '2018-10-22', 'bersih', '-'),
(148, 62, '2018-10-22', 'bersih', '-'),
(149, 63, '2018-10-22', 'bersih', '-'),
(150, 64, '2018-10-22', 'bersih', '-'),
(151, 65, '2018-10-22', 'bersih', '-'),
(152, 66, '2018-10-22', 'bersih', '-'),
(153, 67, '2018-10-22', 'bersih', '-'),
(154, 68, '2018-10-22', 'bersih', '-'),
(155, 69, '2018-10-22', 'bersih', '-'),
(156, 70, '2018-10-22', 'bersih', '-'),
(157, 71, '2018-10-22', 'bersih', '-'),
(158, 72, '2018-10-22', 'bersih', '-'),
(159, 73, '2018-10-22', 'bersih', '-'),
(160, 74, '2018-10-22', 'bersih', '-'),
(161, 75, '2018-10-22', 'bersih', '-'),
(162, 76, '2018-10-22', 'bersih', '-'),
(163, 77, '2018-10-22', 'bersih', '-'),
(164, 78, '2018-10-22', 'bersih', '-'),
(165, 79, '2018-10-22', 'bersih', '-'),
(166, 80, '2018-10-22', 'bersih', '-'),
(167, 81, '2018-10-22', 'bersih', '-'),
(168, 82, '2018-10-22', 'bersih', '-'),
(169, 83, '2018-10-22', 'bersih', '-'),
(170, 84, '2018-10-22', 'bersih', '-'),
(171, 85, '2018-10-22', 'bersih', '-'),
(172, 86, '2018-10-22', 'bersih', '-'),
(173, 87, '2018-10-22', 'bersih', '-'),
(174, 88, '2018-10-22', 'bersih', '-'),
(175, 1, '2018-10-23', 'kotor', '-'),
(176, 2, '2018-10-23', 'bersih', '-'),
(177, 3, '2018-10-23', 'bersih', '-'),
(178, 4, '2018-10-23', 'bersih', '-'),
(179, 5, '2018-10-23', 'bersih', '-'),
(180, 7, '2018-10-23', 'bersih', '-'),
(181, 8, '2018-10-23', 'bersih', '-'),
(182, 9, '2018-10-23', 'bersih', '-'),
(183, 10, '2018-10-23', 'bersih', '-'),
(184, 11, '2018-10-23', 'bersih', '-'),
(185, 12, '2018-10-23', 'bersih', '-'),
(186, 13, '2018-10-23', 'bersih', '-'),
(187, 14, '2018-10-23', 'bersih', '-'),
(188, 15, '2018-10-23', 'bersih', '-'),
(189, 16, '2018-10-23', 'bersih', '-'),
(190, 17, '2018-10-23', 'bersih', '-'),
(191, 18, '2018-10-23', 'bersih', '-'),
(192, 19, '2018-10-23', 'bersih', '-'),
(193, 20, '2018-10-23', 'bersih', '-'),
(194, 21, '2018-10-23', 'bersih', '-'),
(195, 22, '2018-10-23', 'bersih', '-'),
(196, 23, '2018-10-23', 'bersih', '-'),
(197, 24, '2018-10-23', 'bersih', '-'),
(198, 25, '2018-10-23', 'bersih', '-'),
(199, 26, '2018-10-23', 'bersih', '-'),
(200, 27, '2018-10-23', 'bersih', '-'),
(201, 28, '2018-10-23', 'bersih', '-'),
(202, 29, '2018-10-23', 'bersih', '-'),
(203, 30, '2018-10-23', 'bersih', '-'),
(204, 31, '2018-10-23', 'bersih', '-'),
(205, 32, '2018-10-23', 'bersih', '-'),
(206, 33, '2018-10-23', 'bersih', '-'),
(207, 34, '2018-10-23', 'bersih', '-'),
(208, 35, '2018-10-23', 'bersih', '-'),
(209, 36, '2018-10-23', 'bersih', '-'),
(210, 37, '2018-10-23', 'bersih', '-'),
(211, 38, '2018-10-23', 'bersih', '-'),
(212, 39, '2018-10-23', 'bersih', '-'),
(213, 40, '2018-10-23', 'bersih', '-'),
(214, 41, '2018-10-23', 'bersih', '-'),
(215, 42, '2018-10-23', 'bersih', '-'),
(216, 43, '2018-10-23', 'bersih', '-'),
(217, 44, '2018-10-23', 'bersih', '-'),
(218, 45, '2018-10-23', 'bersih', '-'),
(219, 46, '2018-10-23', 'bersih', '-'),
(220, 47, '2018-10-23', 'bersih', '-'),
(221, 48, '2018-10-23', 'bersih', '-'),
(222, 49, '2018-10-23', 'bersih', '-'),
(223, 50, '2018-10-23', 'bersih', '-'),
(224, 51, '2018-10-23', 'bersih', '-'),
(225, 52, '2018-10-23', 'bersih', '-'),
(226, 53, '2018-10-23', 'bersih', '-'),
(227, 54, '2018-10-23', 'bersih', '-'),
(228, 55, '2018-10-23', 'bersih', '-'),
(229, 56, '2018-10-23', 'bersih', '-'),
(230, 57, '2018-10-23', 'bersih', '-'),
(231, 58, '2018-10-23', 'bersih', '-'),
(232, 59, '2018-10-23', 'bersih', '-'),
(233, 60, '2018-10-23', 'bersih', '-'),
(234, 61, '2018-10-23', 'bersih', '-'),
(235, 62, '2018-10-23', 'bersih', '-'),
(236, 63, '2018-10-23', 'bersih', '-'),
(237, 64, '2018-10-23', 'bersih', '-'),
(238, 65, '2018-10-23', 'bersih', '-'),
(239, 66, '2018-10-23', 'bersih', '-'),
(240, 67, '2018-10-23', 'bersih', '-'),
(241, 68, '2018-10-23', 'bersih', '-'),
(242, 69, '2018-10-23', 'bersih', '-'),
(243, 70, '2018-10-23', 'bersih', '-'),
(244, 71, '2018-10-23', 'bersih', '-'),
(245, 72, '2018-10-23', 'bersih', '-'),
(246, 73, '2018-10-23', 'bersih', '-'),
(247, 74, '2018-10-23', 'bersih', '-'),
(248, 75, '2018-10-23', 'bersih', '-'),
(249, 76, '2018-10-23', 'bersih', '-'),
(250, 77, '2018-10-23', 'bersih', '-'),
(251, 78, '2018-10-23', 'bersih', '-'),
(252, 79, '2018-10-23', 'bersih', '-'),
(253, 80, '2018-10-23', 'bersih', '-'),
(254, 81, '2018-10-23', 'bersih', '-'),
(255, 82, '2018-10-23', 'bersih', '-'),
(256, 83, '2018-10-23', 'bersih', '-'),
(257, 84, '2018-10-23', 'bersih', '-'),
(258, 85, '2018-10-23', 'bersih', '-'),
(259, 86, '2018-10-23', 'bersih', '-'),
(260, 87, '2018-10-23', 'bersih', '-'),
(261, 88, '2018-10-23', 'kotor', '-');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_laporan` varchar(255) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `permasalahan` text NOT NULL,
  `tindakan` text NOT NULL,
  `hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `tanggal`, `jenis_laporan`, `nama_alat`, `lokasi`, `permasalahan`, `tindakan`, `hasil`) VALUES
(3, '2018-10-18', 'kerusakan', 'srs', 'lokasi', 'permasalahan', 'tindakan', ' hasil'),
(6, '2018-10-19', 'instalasi', 'nama', 'lokasi', 'permasalahan', 'tindakan', 'hasil');

-- --------------------------------------------------------

--
-- Table structure for table `operasi`
--

CREATE TABLE `operasi` (
  `id_operasi` int(100) NOT NULL,
  `id_alat` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `operasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operasi`
--

INSERT INTO `operasi` (`id_operasi`, `id_alat`, `tanggal`, `operasi`, `keterangan`) VALUES
(17, 1, '2018-10-16', 'gangguan', 'a ok'),
(18, 2, '2018-10-16', 'normal', '-'),
(19, 3, '2018-10-16', 'normal', '-'),
(20, 4, '2018-10-16', 'normal', '-'),
(21, 5, '2018-10-16', 'normal', '-'),
(22, 6, '2018-10-16', 'gangguan', '10 m error'),
(23, 13, '2018-10-16', 'normal', '-'),
(24, 14, '2018-10-16', 'gangguan', 'wew gangguan'),
(25, 1, '2018-10-17', 'normal', 'sudah normal'),
(26, 2, '2018-10-17', 'gangguan', 'Tidak Akurat'),
(27, 3, '2018-10-17', 'normal', '-'),
(28, 4, '2018-10-17', 'normal', '-'),
(29, 5, '2018-10-17', 'normal', '-'),
(30, 6, '2018-10-17', 'normal', '-'),
(31, 13, '2018-10-17', 'normal', '-'),
(32, 14, '2018-10-17', 'gangguan', 'listrik mati'),
(33, 15, '2018-10-17', 'gangguan', 'Tidak Bisa Connect'),
(34, 1, '2018-10-19', 'normal', 'telah di ok'),
(35, 2, '2018-10-19', 'normal', '-'),
(36, 3, '2018-10-19', 'normal', '-'),
(37, 4, '2018-10-19', 'normal', '-'),
(38, 5, '2018-10-19', 'normal', '-'),
(39, 7, '2018-10-19', 'normal', '-'),
(40, 8, '2018-10-19', 'normal', '-'),
(41, 9, '2018-10-19', 'normal', '-'),
(42, 10, '2018-10-19', 'normal', '-'),
(43, 11, '2018-10-19', 'normal', '-'),
(44, 12, '2018-10-19', 'normal', '-'),
(45, 13, '2018-10-19', 'normal', '-'),
(46, 14, '2018-10-19', 'normal', '-'),
(47, 15, '2018-10-19', 'normal', '-'),
(48, 16, '2018-10-19', 'normal', '-'),
(49, 17, '2018-10-19', 'normal', '-'),
(50, 18, '2018-10-19', 'normal', '-'),
(51, 19, '2018-10-19', 'normal', '-'),
(52, 20, '2018-10-19', 'normal', '-'),
(53, 21, '2018-10-19', 'normal', '-'),
(54, 22, '2018-10-19', 'normal', '-'),
(55, 23, '2018-10-19', 'normal', '-'),
(56, 24, '2018-10-19', 'normal', '-'),
(57, 25, '2018-10-19', 'normal', '-'),
(58, 26, '2018-10-19', 'normal', '-'),
(59, 27, '2018-10-19', 'normal', '-'),
(60, 28, '2018-10-19', 'normal', '-'),
(61, 29, '2018-10-19', 'normal', '-'),
(62, 30, '2018-10-19', 'normal', '-'),
(63, 31, '2018-10-19', 'normal', '-'),
(64, 32, '2018-10-19', 'normal', '-'),
(65, 33, '2018-10-19', 'normal', '-'),
(66, 34, '2018-10-19', 'normal', '-'),
(67, 35, '2018-10-19', 'normal', '-'),
(68, 36, '2018-10-19', 'normal', '-'),
(69, 37, '2018-10-19', 'normal', '-'),
(70, 38, '2018-10-19', 'normal', '-'),
(71, 39, '2018-10-19', 'normal', '-'),
(72, 40, '2018-10-19', 'normal', '-'),
(73, 41, '2018-10-19', 'normal', '-'),
(74, 42, '2018-10-19', 'normal', '-'),
(75, 43, '2018-10-19', 'normal', '-'),
(76, 44, '2018-10-19', 'normal', '-'),
(77, 45, '2018-10-19', 'normal', '-'),
(78, 46, '2018-10-19', 'normal', '-'),
(79, 47, '2018-10-19', 'normal', '-'),
(80, 48, '2018-10-19', 'normal', '-'),
(81, 49, '2018-10-19', 'normal', '-'),
(82, 50, '2018-10-19', 'normal', '-'),
(83, 51, '2018-10-19', 'normal', '-'),
(84, 52, '2018-10-19', 'normal', '-'),
(85, 53, '2018-10-19', 'normal', '-'),
(86, 54, '2018-10-19', 'normal', '-'),
(87, 55, '2018-10-19', 'normal', '-'),
(88, 56, '2018-10-19', 'normal', '-'),
(89, 57, '2018-10-19', 'normal', '-'),
(90, 58, '2018-10-19', 'normal', '-'),
(91, 59, '2018-10-19', 'normal', '-'),
(92, 60, '2018-10-19', 'normal', '-'),
(93, 61, '2018-10-19', 'normal', '-'),
(94, 62, '2018-10-19', 'normal', '-'),
(95, 63, '2018-10-19', 'normal', '-'),
(96, 64, '2018-10-19', 'normal', '-'),
(97, 65, '2018-10-19', 'normal', '-'),
(98, 66, '2018-10-19', 'normal', '-'),
(99, 67, '2018-10-19', 'normal', '-'),
(100, 68, '2018-10-19', 'normal', '-'),
(101, 69, '2018-10-19', 'normal', '-'),
(102, 70, '2018-10-19', 'normal', '-'),
(103, 71, '2018-10-19', 'normal', '-'),
(104, 72, '2018-10-19', 'normal', '-'),
(105, 73, '2018-10-19', 'normal', '-'),
(106, 74, '2018-10-19', 'normal', '-'),
(107, 75, '2018-10-19', 'normal', '-'),
(108, 76, '2018-10-19', 'normal', '-'),
(109, 77, '2018-10-19', 'normal', '-'),
(110, 78, '2018-10-19', 'normal', '-'),
(111, 79, '2018-10-19', 'normal', '-'),
(112, 80, '2018-10-19', 'normal', '-'),
(113, 81, '2018-10-19', 'normal', '-'),
(114, 82, '2018-10-19', 'normal', '-'),
(115, 83, '2018-10-19', 'normal', '-'),
(116, 84, '2018-10-19', 'normal', '-'),
(117, 85, '2018-10-19', 'normal', '-'),
(118, 86, '2018-10-19', 'normal', '-'),
(119, 87, '2018-10-19', 'normal', '-'),
(120, 88, '2018-10-19', 'normal', '-'),
(121, 1, '2018-10-22', 'gangguan', 'kebakar'),
(122, 2, '2018-10-22', 'gangguan', 'rusak'),
(123, 3, '2018-10-22', 'normal', '-'),
(124, 4, '2018-10-22', 'normal', '-'),
(125, 5, '2018-10-22', 'normal', '-'),
(126, 7, '2018-10-22', 'normal', '-'),
(127, 8, '2018-10-22', 'normal', '-'),
(128, 9, '2018-10-22', 'normal', '-'),
(129, 10, '2018-10-22', 'normal', '-'),
(130, 11, '2018-10-22', 'normal', '-'),
(131, 12, '2018-10-22', 'normal', '-'),
(132, 13, '2018-10-22', 'normal', '-'),
(133, 14, '2018-10-22', 'normal', '-'),
(134, 15, '2018-10-22', 'normal', '-'),
(135, 16, '2018-10-22', 'normal', '-'),
(136, 17, '2018-10-22', 'normal', '-'),
(137, 18, '2018-10-22', 'normal', '-'),
(138, 19, '2018-10-22', 'normal', '-'),
(139, 20, '2018-10-22', 'normal', '-'),
(140, 21, '2018-10-22', 'normal', '-'),
(141, 22, '2018-10-22', 'normal', '-'),
(142, 23, '2018-10-22', 'normal', '-'),
(143, 24, '2018-10-22', 'normal', '-'),
(144, 25, '2018-10-22', 'normal', '-'),
(145, 26, '2018-10-22', 'normal', '-'),
(146, 27, '2018-10-22', 'normal', '-'),
(147, 28, '2018-10-22', 'normal', '-'),
(148, 29, '2018-10-22', 'normal', '-'),
(149, 30, '2018-10-22', 'normal', '-'),
(150, 31, '2018-10-22', 'normal', '-'),
(151, 32, '2018-10-22', 'normal', '-'),
(152, 33, '2018-10-22', 'normal', '-'),
(153, 34, '2018-10-22', 'normal', '-'),
(154, 35, '2018-10-22', 'normal', '-'),
(155, 36, '2018-10-22', 'normal', '-'),
(156, 37, '2018-10-22', 'normal', '-'),
(157, 38, '2018-10-22', 'normal', '-'),
(158, 39, '2018-10-22', 'normal', '-'),
(159, 40, '2018-10-22', 'normal', '-'),
(160, 41, '2018-10-22', 'normal', '-'),
(161, 42, '2018-10-22', 'normal', '-'),
(162, 43, '2018-10-22', 'normal', '-'),
(163, 44, '2018-10-22', 'normal', '-'),
(164, 45, '2018-10-22', 'normal', '-'),
(165, 46, '2018-10-22', 'normal', '-'),
(166, 47, '2018-10-22', 'normal', '-'),
(167, 48, '2018-10-22', 'normal', '-'),
(168, 49, '2018-10-22', 'normal', '-'),
(169, 50, '2018-10-22', 'normal', '-'),
(170, 51, '2018-10-22', 'normal', '-'),
(171, 52, '2018-10-22', 'normal', '-'),
(172, 53, '2018-10-22', 'normal', '-'),
(173, 54, '2018-10-22', 'normal', '-'),
(174, 55, '2018-10-22', 'normal', '-'),
(175, 56, '2018-10-22', 'normal', '-'),
(176, 57, '2018-10-22', 'normal', '-'),
(177, 58, '2018-10-22', 'normal', '-'),
(178, 59, '2018-10-22', 'normal', '-'),
(179, 60, '2018-10-22', 'normal', '-'),
(180, 61, '2018-10-22', 'normal', '-'),
(181, 62, '2018-10-22', 'normal', '-'),
(182, 63, '2018-10-22', 'normal', '-'),
(183, 64, '2018-10-22', 'normal', '-'),
(184, 65, '2018-10-22', 'normal', '-'),
(185, 66, '2018-10-22', 'normal', '-'),
(186, 67, '2018-10-22', 'normal', '-'),
(187, 68, '2018-10-22', 'normal', '-'),
(188, 69, '2018-10-22', 'normal', '-'),
(189, 70, '2018-10-22', 'normal', '-'),
(190, 71, '2018-10-22', 'normal', '-'),
(191, 72, '2018-10-22', 'normal', '-'),
(192, 73, '2018-10-22', 'normal', '-'),
(193, 74, '2018-10-22', 'normal', '-'),
(194, 75, '2018-10-22', 'normal', '-'),
(195, 76, '2018-10-22', 'normal', '-'),
(196, 77, '2018-10-22', 'normal', '-'),
(197, 78, '2018-10-22', 'normal', '-'),
(198, 79, '2018-10-22', 'normal', '-'),
(199, 80, '2018-10-22', 'normal', '-'),
(200, 81, '2018-10-22', 'normal', '-'),
(201, 82, '2018-10-22', 'normal', '-'),
(202, 83, '2018-10-22', 'normal', '-'),
(203, 84, '2018-10-22', 'normal', '-'),
(204, 85, '2018-10-22', 'normal', '-'),
(205, 86, '2018-10-22', 'normal', '-'),
(206, 87, '2018-10-22', 'normal', '-'),
(207, 88, '2018-10-22', 'normal', '-'),
(208, 1, '2018-10-23', 'gangguan', '-'),
(209, 2, '2018-10-23', 'normal', '-'),
(210, 3, '2018-10-23', 'normal', '-'),
(211, 4, '2018-10-23', 'normal', '-'),
(212, 5, '2018-10-23', 'normal', '-'),
(213, 7, '2018-10-23', 'normal', '-'),
(214, 8, '2018-10-23', 'normal', '-'),
(215, 9, '2018-10-23', 'normal', '-'),
(216, 10, '2018-10-23', 'normal', '-'),
(217, 11, '2018-10-23', 'normal', '-'),
(218, 12, '2018-10-23', 'normal', '-'),
(219, 13, '2018-10-23', 'normal', '-'),
(220, 14, '2018-10-23', 'normal', '-'),
(221, 15, '2018-10-23', 'normal', '-'),
(222, 16, '2018-10-23', 'normal', '-'),
(223, 17, '2018-10-23', 'normal', '-'),
(224, 18, '2018-10-23', 'normal', '-'),
(225, 19, '2018-10-23', 'normal', '-'),
(226, 20, '2018-10-23', 'normal', '-'),
(227, 21, '2018-10-23', 'normal', '-'),
(228, 22, '2018-10-23', 'normal', '-'),
(229, 23, '2018-10-23', 'normal', '-'),
(230, 24, '2018-10-23', 'normal', '-'),
(231, 25, '2018-10-23', 'normal', '-'),
(232, 26, '2018-10-23', 'normal', '-'),
(233, 27, '2018-10-23', 'normal', '-'),
(234, 28, '2018-10-23', 'normal', '-'),
(235, 29, '2018-10-23', 'normal', '-'),
(236, 30, '2018-10-23', 'normal', '-'),
(237, 31, '2018-10-23', 'normal', '-'),
(238, 32, '2018-10-23', 'normal', '-'),
(239, 33, '2018-10-23', 'normal', '-'),
(240, 34, '2018-10-23', 'normal', '-'),
(241, 35, '2018-10-23', 'normal', '-'),
(242, 36, '2018-10-23', 'normal', '-'),
(243, 37, '2018-10-23', 'normal', '-'),
(244, 38, '2018-10-23', 'normal', '-'),
(245, 39, '2018-10-23', 'normal', '-'),
(246, 40, '2018-10-23', 'normal', '-'),
(247, 41, '2018-10-23', 'normal', '-'),
(248, 42, '2018-10-23', 'normal', '-'),
(249, 43, '2018-10-23', 'normal', '-'),
(250, 44, '2018-10-23', 'normal', '-'),
(251, 45, '2018-10-23', 'normal', '-'),
(252, 46, '2018-10-23', 'normal', '-'),
(253, 47, '2018-10-23', 'normal', '-'),
(254, 48, '2018-10-23', 'normal', '-'),
(255, 49, '2018-10-23', 'normal', '-'),
(256, 50, '2018-10-23', 'normal', '-'),
(257, 51, '2018-10-23', 'normal', '-'),
(258, 52, '2018-10-23', 'normal', '-'),
(259, 53, '2018-10-23', 'normal', '-'),
(260, 54, '2018-10-23', 'normal', '-'),
(261, 55, '2018-10-23', 'normal', '-'),
(262, 56, '2018-10-23', 'normal', '-'),
(263, 57, '2018-10-23', 'normal', '-'),
(264, 58, '2018-10-23', 'normal', '-'),
(265, 59, '2018-10-23', 'normal', '-'),
(266, 60, '2018-10-23', 'normal', '-'),
(267, 61, '2018-10-23', 'normal', '-'),
(268, 62, '2018-10-23', 'normal', '-'),
(269, 63, '2018-10-23', 'normal', '-'),
(270, 64, '2018-10-23', 'normal', '-'),
(271, 65, '2018-10-23', 'normal', '-'),
(272, 66, '2018-10-23', 'normal', '-'),
(273, 67, '2018-10-23', 'normal', '-'),
(274, 68, '2018-10-23', 'normal', '-'),
(275, 69, '2018-10-23', 'normal', '-'),
(276, 70, '2018-10-23', 'normal', '-'),
(277, 71, '2018-10-23', 'normal', '-'),
(278, 72, '2018-10-23', 'normal', '-'),
(279, 73, '2018-10-23', 'normal', '-'),
(280, 74, '2018-10-23', 'normal', '-'),
(281, 75, '2018-10-23', 'normal', '-'),
(282, 76, '2018-10-23', 'normal', '-'),
(283, 77, '2018-10-23', 'normal', '-'),
(284, 78, '2018-10-23', 'normal', '-'),
(285, 79, '2018-10-23', 'normal', '-'),
(286, 80, '2018-10-23', 'normal', '-'),
(287, 81, '2018-10-23', 'normal', '-'),
(288, 82, '2018-10-23', 'normal', '-'),
(289, 83, '2018-10-23', 'normal', '-'),
(290, 84, '2018-10-23', 'normal', '-'),
(291, 85, '2018-10-23', 'normal', '-'),
(292, 86, '2018-10-23', 'normal', '-'),
(293, 87, '2018-10-23', 'normal', '-'),
(294, 88, '2018-10-23', 'gangguan', 'error dikit'),
(295, 1, '2018-10-25', 'normal', '-'),
(296, 2, '2018-10-25', 'normal', '-'),
(297, 3, '2018-10-25', 'normal', '-'),
(298, 4, '2018-10-25', 'normal', '-'),
(299, 5, '2018-10-25', 'normal', '-'),
(300, 7, '2018-10-25', 'normal', '-'),
(301, 8, '2018-10-25', 'normal', '-'),
(302, 9, '2018-10-25', 'normal', '-'),
(303, 10, '2018-10-25', 'normal', '-'),
(304, 11, '2018-10-25', 'normal', '-'),
(305, 12, '2018-10-25', 'normal', '-'),
(306, 13, '2018-10-25', 'normal', '-'),
(307, 14, '2018-10-25', 'normal', '-'),
(308, 15, '2018-10-25', 'normal', '-'),
(309, 16, '2018-10-25', 'normal', '-'),
(310, 17, '2018-10-25', 'normal', '-'),
(311, 18, '2018-10-25', 'normal', '-'),
(312, 19, '2018-10-25', 'normal', '-'),
(313, 20, '2018-10-25', 'normal', '-'),
(314, 21, '2018-10-25', 'normal', '-'),
(315, 22, '2018-10-25', 'normal', '-'),
(316, 23, '2018-10-25', 'normal', '-'),
(317, 24, '2018-10-25', 'normal', '-'),
(318, 25, '2018-10-25', 'normal', '-'),
(319, 26, '2018-10-25', 'normal', '-'),
(320, 27, '2018-10-25', 'normal', '-'),
(321, 28, '2018-10-25', 'normal', '-'),
(322, 29, '2018-10-25', 'normal', '-'),
(323, 30, '2018-10-25', 'normal', '-'),
(324, 31, '2018-10-25', 'normal', '-'),
(325, 32, '2018-10-25', 'normal', '-'),
(326, 33, '2018-10-25', 'normal', '-'),
(327, 34, '2018-10-25', 'normal', '-'),
(328, 35, '2018-10-25', 'normal', '-'),
(329, 36, '2018-10-25', 'normal', '-'),
(330, 37, '2018-10-25', 'normal', '-'),
(331, 38, '2018-10-25', 'normal', '-'),
(332, 39, '2018-10-25', 'normal', '-'),
(333, 40, '2018-10-25', 'normal', '-'),
(334, 41, '2018-10-25', 'normal', '-'),
(335, 42, '2018-10-25', 'normal', '-'),
(336, 43, '2018-10-25', 'normal', '-'),
(337, 44, '2018-10-25', 'normal', '-'),
(338, 45, '2018-10-25', 'normal', '-'),
(339, 46, '2018-10-25', 'normal', '-'),
(340, 47, '2018-10-25', 'normal', '-'),
(341, 48, '2018-10-25', 'normal', '-'),
(342, 49, '2018-10-25', 'normal', '-'),
(343, 50, '2018-10-25', 'normal', '-'),
(344, 51, '2018-10-25', 'normal', '-'),
(345, 52, '2018-10-25', 'normal', '-'),
(346, 53, '2018-10-25', 'normal', '-'),
(347, 54, '2018-10-25', 'normal', '-'),
(348, 55, '2018-10-25', 'normal', '-'),
(349, 56, '2018-10-25', 'normal', '-'),
(350, 57, '2018-10-25', 'normal', '-'),
(351, 58, '2018-10-25', 'normal', '-'),
(352, 59, '2018-10-25', 'normal', '-'),
(353, 60, '2018-10-25', 'normal', '-'),
(354, 61, '2018-10-25', 'normal', '-'),
(355, 62, '2018-10-25', 'normal', '-'),
(356, 63, '2018-10-25', 'normal', '-'),
(357, 64, '2018-10-25', 'normal', '-'),
(358, 65, '2018-10-25', 'normal', '-'),
(359, 66, '2018-10-25', 'normal', '-'),
(360, 67, '2018-10-25', 'normal', '-'),
(361, 68, '2018-10-25', 'normal', '-'),
(362, 69, '2018-10-25', 'normal', '-'),
(363, 70, '2018-10-25', 'normal', '-'),
(364, 71, '2018-10-25', 'normal', '-'),
(365, 72, '2018-10-25', 'normal', '-'),
(366, 73, '2018-10-25', 'normal', '-'),
(367, 74, '2018-10-25', 'normal', '-'),
(368, 75, '2018-10-25', 'normal', '-'),
(369, 76, '2018-10-25', 'normal', '-'),
(370, 77, '2018-10-25', 'normal', '-'),
(371, 78, '2018-10-25', 'normal', '-'),
(372, 79, '2018-10-25', 'normal', '-'),
(373, 80, '2018-10-25', 'normal', '-'),
(374, 81, '2018-10-25', 'normal', '-'),
(375, 82, '2018-10-25', 'normal', '-'),
(376, 83, '2018-10-25', 'normal', '-'),
(377, 84, '2018-10-25', 'normal', '-'),
(378, 85, '2018-10-25', 'normal', '-'),
(379, 86, '2018-10-25', 'normal', '-'),
(380, 87, '2018-10-25', 'normal', '-'),
(381, 88, '2018-10-25', 'normal', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pembacaan`
--

CREATE TABLE `pembacaan` (
  `id_pembacaan` int(100) NOT NULL,
  `id_radar` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `pembacaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `radar`
--

CREATE TABLE `radar` (
  `id_radar` int(100) NOT NULL,
  `id_kategoriradar` int(100) NOT NULL,
  `nama_radar` varchar(255) NOT NULL,
  `standar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radar`
--

INSERT INTO `radar` (`id_radar`, `id_kategoriradar`, `nama_radar`, `standar`) VALUES
(5, 9, 'Ethernet Power Controller', 'MENYALA'),
(6, 9, 'Kondisi LED Network Switch', 'MENYALA'),
(7, 9, 'Kondisi LED Port 2,6,8,10,12,16', 'MENYALA'),
(8, 10, 'LED Power', 'MENYALA'),
(9, 11, 'Posisi(Disable / Enable)', 'ENABLE'),
(10, 11, 'LED Enable', 'MENYALA'),
(13, 8, 'Tekanan Dehydrator', '3-6 Psi'),
(14, 11, 'LED Randome Hatch', 'MENYALA HIJAU'),
(15, 11, 'LED Cabinet Door', 'MENYALA HIJAU'),
(16, 12, 'LED Power', 'MENYALA'),
(17, 12, 'LED HL', 'MENYALA'),
(18, 12, 'LED HH', 'MENYALA'),
(19, 12, 'LED VL', 'MENYALA'),
(20, 12, 'LED VH', 'MENYALA'),
(21, 12, 'LED B', 'MENYALA'),
(22, 12, 'LED CLK', 'MENYALA'),
(23, 12, 'LED FO', 'MENYALA'),
(24, 12, 'LED UL', 'MENYALA'),
(25, 12, 'LED BD', 'MENYALA'),
(26, 12, 'LED STAT', 'BERKEDIP'),
(27, 13, 'SMB100A Signal Generator', 'MENYALA'),
(28, 13, 'Power supply volts', '0.72 DC KV'),
(29, 13, 'System Voltage', '220-230 ACV'),
(30, 13, 'Warm Up Lamp', 'MATI'),
(31, 13, 'Ready Lamp', 'MENYALA'),
(32, 13, 'Radiate Lamp', 'MENYALA'),
(33, 13, 'Mag. Air Flow', 'MENYALA'),
(34, 13, '24 VDC Lamp', 'MENYALA'),
(35, 13, 'PS Over Current  Lamp', 'MATI'),
(36, 13, 'Mag Peak Over Current Lamp', 'MATI'),
(37, 14, 'Jumlah Operasi PLN', 'Jumlah Operasi PLN'),
(38, 14, 'Jumlah Operasi', 'Jumlah Operasi'),
(39, 18, 'Message Info', '-'),
(40, 18, 'Message Warning', '0 Message'),
(41, 18, 'Message Error', '0 Message'),
(42, 18, 'Message Fatal Error', '0 Message'),
(43, 18, 'Message Panic', '0 Message'),
(44, 18, 'Message Meteo', '0 Message'),
(45, 19, 'Main Power', 'Hijau'),
(46, 19, 'Servo Power', 'Hijau'),
(47, 19, 'Radiation', 'Hijau'),
(48, 19, 'Magnetron', 'Hijau'),
(49, 19, 'Remote', 'Hijau'),
(50, 19, 'Status', 'Hijau'),
(51, 19, 'Full Bite Report', 'Hijau'),
(52, 20, 'MPW', 'Hijau Menyala'),
(53, 20, 'SRV', 'Hijau Menyala'),
(54, 20, 'RAD', 'Hijau Menyala'),
(55, 20, 'MAG', 'Hijau Menyala'),
(56, 20, 'REM/LOC', 'Hijau Menyala'),
(57, 20, 'Control', 'Posisi Control'),
(58, 20, 'SDP CMD', 'Hijau Menyala'),
(59, 20, 'SDP RCV', 'Hijau Menyala'),
(60, 20, 'RCC BITE', 'Hijau Menyala'),
(61, 20, 'TSG BITE', 'Hijau Menyala'),
(62, 21, 'Hubungan ke IP 172.16.1.101', 'Connect'),
(63, 21, 'Hubungan ke IP 172.16.1.102', 'Connect'),
(64, 21, 'Hubungan ke IP 172.16.1.103', 'Connect'),
(65, 21, 'Hubungan ke IP 172.16.1.104', 'Connect'),
(66, 21, 'Hubungan ke IP 172.16.1.105', 'Connect'),
(67, 21, 'Hubungan ke IP 192.168.100.1', 'Connect'),
(68, 21, 'Hubungan ke IP 192.168.100.3', 'Connect'),
(69, 21, 'Hubungan ke IP 192.168.100.10', 'Connect'),
(70, 22, 'Hub ke IP 172.19.4.20,21,22', 'Connect'),
(71, 22, 'Hbungan ke IP 192.168.100.1', 'Connect'),
(72, 22, 'Hubungan ke IP 172.19.5.130', 'Connect');

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
-- Indexes for table `kategoriradar`
--
ALTER TABLE `kategoriradar`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operasi`
--
ALTER TABLE `operasi`
  ADD PRIMARY KEY (`id_operasi`),
  ADD KEY `operasi_fk` (`id_alat`);

--
-- Indexes for table `pembacaan`
--
ALTER TABLE `pembacaan`
  ADD PRIMARY KEY (`id_pembacaan`),
  ADD KEY `id_radar` (`id_radar`);

--
-- Indexes for table `radar`
--
ALTER TABLE `radar`
  ADD PRIMARY KEY (`id_radar`),
  ADD KEY `id_kategoriradar` (`id_kategoriradar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `cek_peralatan_harian`
--
ALTER TABLE `cek_peralatan_harian`
  MODIFY `id_cek_peralatan_harian` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kategoriradar`
--
ALTER TABLE `kategoriradar`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `operasi`
--
ALTER TABLE `operasi`
  MODIFY `id_operasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;
--
-- AUTO_INCREMENT for table `pembacaan`
--
ALTER TABLE `pembacaan`
  MODIFY `id_pembacaan` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `radar`
--
ALTER TABLE `radar`
  MODIFY `id_radar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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

--
-- Constraints for table `pembacaan`
--
ALTER TABLE `pembacaan`
  ADD CONSTRAINT `pembacaan_ibfk_1` FOREIGN KEY (`id_radar`) REFERENCES `radar` (`id_radar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
