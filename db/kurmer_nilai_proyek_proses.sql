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
-- Table structure for table `kurmer_nilai_proyek_proses`
--

CREATE TABLE `kurmer_nilai_proyek_proses` (
  `kd` varchar(50) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `proyek_kode` varchar(5) DEFAULT NULL,
  `siswa_kode` varchar(50) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `catatan` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurmer_nilai_proyek_proses`
--

INSERT INTO `kurmer_nilai_proyek_proses` (`kd`, `tapel`, `kelas`, `proyek_kode`, `siswa_kode`, `siswa_nama`, `catatan`, `postdate`) VALUES
('0b11d0ad5ef9bd8d4abb1bfcfb9b962c', '2022xgmringx2023', 'X MIA 1', '1', '810013', 'siswa2', '5', '2023-06-14 10:37:38'),
('d6ed65296763eef54f76cd74a8a2c647', '2022xgmringx2023', 'X MIA 1', '1', '810012', 'siswa1', '6', '2023-06-14 10:37:38'),
('34efb876d241f4fdb8ce43f8de9136e8', '2022xgmringx2023', 'X MIA 1', '1', '810003', 'rijahum suga', '7', '2023-06-14 10:37:38'),
('27ef63c6abac6735d80502c7b7035d76', '2022xgmringx2023', 'X MIA 1', '1', '810006', 'biasawae', '8', '2023-06-14 10:37:38'),
('de9fb6d65b5cf7bfa5ec2c095539f6fe', '2022xgmringx2023', 'X MIA 1', '1', '810001', 'agus muhajir', '9', '2023-06-14 10:37:38'),
('7735aec78220ac38ef70d08762c4e95a', '2022xgmringx2023', 'X MIA 1', '1', '810014', 'siswa3', '6', '2023-06-14 10:37:38'),
('359dca42e140d0eb722b8c753f7b0bda', '2022xgmringx2023', 'X MIA 1', '2', '810014', 'siswa3', '6', '2023-06-14 10:45:54'),
('925fe459df14506144de4eefd2973426', '2022xgmringx2023', 'X MIA 1', '2', '810013', 'siswa2', '5', '2023-06-14 10:45:54'),
('7c6f5a7ad298b703a7d6f456563b9985', '2022xgmringx2023', 'X MIA 1', '2', '810012', 'siswa1', '6', '2023-06-14 10:45:54'),
('25d3c01c82e2b43808a418e7e2924f1e', '2022xgmringx2023', 'X MIA 1', '2', '810003', 'rijahum suga', '7', '2023-06-14 10:45:54'),
('f452fd35ebc8283b4ff26cfd0efe5642', '2022xgmringx2023', 'X MIA 1', '2', '810001', 'agus muhajir', '9', '2023-06-14 10:45:54'),
('663a4a93aaf9765a17a996a3b306d9b4', '2022xgmringx2023', 'X MIA 1', '2', '810006', 'biasawae', '8', '2023-06-14 10:45:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_nilai_proyek_proses`
--
ALTER TABLE `kurmer_nilai_proyek_proses`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
