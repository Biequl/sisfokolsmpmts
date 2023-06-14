-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 03:55 PM
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
-- Table structure for table `kurmer_proyek`
--

CREATE TABLE `kurmer_proyek` (
  `kd` varchar(50) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `no` varchar(1) DEFAULT NULL,
  `judul` longtext DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurmer_proyek`
--

INSERT INTO `kurmer_proyek` (`kd`, `tapel`, `kelas`, `no`, `judul`, `isi`, `postdate`) VALUES
('ba4f0832dde940c6c33ea1a0eaec6ecb', '2022xgmringx2023', 'X MIA 1', '3', '7', '8', '2023-06-07 11:44:04'),
('7cc4593f6cb9ecf87bdca91f8ec43c1f', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '2023-06-07 11:44:04'),
('75596715752603bfaa28596984f316af', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '2023-06-07 11:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_proyek`
--
ALTER TABLE `kurmer_proyek`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
