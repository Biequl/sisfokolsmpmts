-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 03:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `kurmer_asesmen_formatif`
--

CREATE TABLE `kurmer_asesmen_formatif` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `smt` varchar(1) DEFAULT NULL,
  `desk_tinggi` longtext DEFAULT NULL,
  `desk_rendah` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_asesmen_formatif`
--

INSERT INTO `kurmer_asesmen_formatif` (`kd`, `tapel`, `kelas`, `kode`, `nama`, `postdate`, `smt`, `desk_tinggi`, `desk_rendah`) VALUES
('254299a8f3294de908e787781a062c6a', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 11:08:42', '1', '1', '88899'),
('eb78035b1ae0b5061494f0a365c3d9ab', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 11:08:14', '1', '145555', '88899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_asesmen_formatif`
--
ALTER TABLE `kurmer_asesmen_formatif`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
