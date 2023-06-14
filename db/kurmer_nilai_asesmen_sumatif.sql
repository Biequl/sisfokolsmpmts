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
-- Table structure for table `kurmer_nilai_asesmen_sumatif`
--

CREATE TABLE `kurmer_nilai_asesmen_sumatif` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tapel` varchar(100) DEFAULT NULL,
  `smt` varchar(1) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `kktp` varchar(5) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `siswa_kd` varchar(50) DEFAULT NULL,
  `siswa_nis` varchar(10) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `lm_na` varchar(5) DEFAULT NULL,
  `as_non_tes` varchar(5) DEFAULT NULL,
  `as_tes` varchar(5) DEFAULT NULL,
  `as_na` varchar(5) DEFAULT NULL,
  `nil_raport` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_nilai_asesmen_sumatif`
--

INSERT INTO `kurmer_nilai_asesmen_sumatif` (`kd`, `tapel`, `smt`, `kelas`, `kode`, `nama`, `kktp`, `postdate`, `siswa_kd`, `siswa_nis`, `siswa_nama`, `lm_na`, `as_non_tes`, `as_tes`, `as_na`, `nil_raport`) VALUES
('fc72b1d07d194d389cbca06478bad770', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '66', '', '', '0', '0'),
('4d27fa73a20a22d4a974920018fcd009', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '0', '', '', '0', '0'),
('41df5aa4faffaa2276bad5699f8192fa', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '0', '', '', '0', '0'),
('6b1ddc5311687d255413bd04e4989654', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '69', '79', '81', '80', '75'),
('897a1487558dc9ac9fb675e0216da28d', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '79', '85', '77', '81', '80'),
('328ca90c3b49f9c2b81e5fb13aee9538', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '66', '90', '89', '90', '78'),
('ebd8c4e3a07650e8933091aac27b6cb6', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '0', '', '', '0', '0'),
('cc0e8cedaea1f2d4d2d5108cbaa52930', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '0', '', '', '0', '0'),
('0f24d9b18e037cef247e6e085252cc6e', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '69', '', '', '0', '0'),
('3c270cca4bd0a80c5b143273ca209c8d', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '85', '79', '85', '82', '84');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_nilai_asesmen_sumatif`
--
ALTER TABLE `kurmer_nilai_asesmen_sumatif`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
