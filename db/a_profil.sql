-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2023 at 01:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfokol_v6_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_profil`
--

CREATE TABLE `a_profil` (
  `kd` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL,
  `lat_x` longtext NOT NULL,
  `lat_y` longtext NOT NULL,
  `alamat_googlemap` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `a_profil`
--

INSERT INTO `a_profil` (`kd`, `postdate`, `lat_x`, `lat_y`, `alamat_googlemap`) VALUES
('e807f1fcf82d132f9bb018ca6738a19f', '2020-09-05 15:57:43', '-6.921731002730483', '110.20404785871506', 'Kendal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_profil`
--
ALTER TABLE `a_profil`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
