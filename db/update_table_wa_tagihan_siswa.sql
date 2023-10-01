-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2023 at 05:49 AM
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
-- Database: `sisfokol_v6_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `wa_tagihan_siswa`
--

CREATE TABLE `wa_tagihan_siswa` (
  `kd` varchar(50) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `siswa_nis` varchar(100) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `siswa_nowa` varchar(100) DEFAULT NULL,
  `terkirim` enum('true','false') DEFAULT 'false',
  `nominal` varchar(15) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wa_tagihan_siswa`
--

INSERT INTO `wa_tagihan_siswa` (`kd`, `kelas`, `siswa_nis`, `siswa_nama`, `siswa_nowa`, `terkirim`, `nominal`, `postdate`) VALUES
('2ca5a34b04f0b9379621133b84d6880b', 'I B', '810004', 'hajirodeon', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('8a14a357bcfd34a17d2efa8160f4850a', 'I B', '810005', 'hajirobe', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('8f26d6299409bc6a3f601fbe8a3d3daa', 'I A', '810013', 'siswa2', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('590b2b3a9102ba06d67d0ee1cb75d965', 'I A', '810014', 'siswa3', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('b74726ad5ca5d44ef75984aa9daf546d', 'I A', '810001', 'agus muhajir', '818298854', 'true', '1900000', '2023-10-01 10:48:45'),
('dda02913bbeb640a00d212557542d0cb', 'I A', '810006', 'biasawae', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('260c7863685f2b8db4079f61ee8ef19a', 'I A', '810003', 'rijahum suga', '818298854', 'true', '2200000', '2023-10-01 10:48:45'),
('8af76119a3b9818953efc819237bb3bd', 'I A', '810012', 'siswa1', '818298854', 'true', '2200000', '2023-10-01 10:48:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wa_tagihan_siswa`
--
ALTER TABLE `wa_tagihan_siswa`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
