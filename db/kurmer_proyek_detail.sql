-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 03:54 PM
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
-- Table structure for table `kurmer_proyek_detail`
--

CREATE TABLE `kurmer_proyek_detail` (
  `kd` varchar(50) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `proyek_no` varchar(1) DEFAULT NULL,
  `proyek_judul` longtext DEFAULT NULL,
  `proyek_isi` longtext DEFAULT NULL,
  `no` varchar(5) DEFAULT NULL,
  `dimensi` longtext DEFAULT NULL,
  `elemen` longtext DEFAULT NULL,
  `sub_elemen` longtext DEFAULT NULL,
  `capaian_fase` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurmer_proyek_detail`
--

INSERT INTO `kurmer_proyek_detail` (`kd`, `tapel`, `kelas`, `proyek_no`, `proyek_judul`, `proyek_isi`, `no`, `dimensi`, `elemen`, `sub_elemen`, `capaian_fase`, `postdate`) VALUES
('f89098ffc9a0edb29f1d81c30ad2a06c', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '9', '', '', '', '', '2023-06-07 11:44:12'),
('63665c0f6c7981ff13dba7d1b7d4ae10', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '8', '', '', '', '', '2023-06-07 11:44:12'),
('7735aec78220ac38ef70d08762c4e95a', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '6', 'u', '', '', '', '2023-06-07 11:44:12'),
('35068019932d5bf3d543026a67f5c97d', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '7', '', '', '', '', '2023-06-07 11:44:12'),
('d6ed65296763eef54f76cd74a8a2c647', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '4', 'm', 'n', 'o', 'p', '2023-06-07 11:44:12'),
('0b11d0ad5ef9bd8d4abb1bfcfb9b962c', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '5', 'q', 'r', 's', 't', '2023-06-07 11:44:12'),
('34efb876d241f4fdb8ce43f8de9136e8', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '3', 'I', 'j', 'k', 'l', '2023-06-07 11:44:12'),
('359dca42e140d0eb722b8c753f7b0bda', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '10', '', '', '', '', '2023-06-07 11:44:19'),
('925fe459df14506144de4eefd2973426', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '9', '', '', '', '', '2023-06-07 11:44:19'),
('7c6f5a7ad298b703a7d6f456563b9985', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '8', '', '', '', '', '2023-06-07 11:44:19'),
('25d3c01c82e2b43808a418e7e2924f1e', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '7', '', '', '', '', '2023-06-07 11:44:19'),
('f452fd35ebc8283b4ff26cfd0efe5642', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '5', '5', '6', '7', '8', '2023-06-07 11:44:19'),
('663a4a93aaf9765a17a996a3b306d9b4', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '6', '7', '6', '5', '', '2023-06-07 11:44:19'),
('380032ad9bb22380dae30b72cb24906f', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '3', '9', '8', '7', '6', '2023-06-07 11:44:19'),
('3c145cba75d03afcc99cb7e13a79d10d', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '4', '5', '4', '3', '4', '2023-06-07 11:44:19'),
('c39b5a6465a6b2a7bd8d9e1d5e66cbfb', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '1', '1', '2', '3', '4', '2023-06-07 11:44:19'),
('aa8d8534542cd36346677e0e6bd6aabe', '2022xgmringx2023', 'X MIA 1', '2', '7', '6', '2', '5', '6', '7', '8', '2023-06-07 11:44:19'),
('27ef63c6abac6735d80502c7b7035d76', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '2', 'e', 'f', 'g', 'h', '2023-06-07 11:44:12'),
('de9fb6d65b5cf7bfa5ec2c095539f6fe', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '1', 'a', 'b', 'c', 'd', '2023-06-07 11:44:12'),
('febfb02be2c6a80bb23192c16047d9f7', '2022xgmringx2023', 'X MIA 1', '1', '9', '8', '10', '', '', '', '', '2023-06-07 11:44:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_proyek_detail`
--
ALTER TABLE `kurmer_proyek_detail`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
