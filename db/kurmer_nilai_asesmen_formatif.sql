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
-- Table structure for table `kurmer_nilai_asesmen_formatif`
--

CREATE TABLE `kurmer_nilai_asesmen_formatif` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `kktp` varchar(5) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `smt` varchar(1) DEFAULT NULL,
  `siswa_kd` varchar(50) DEFAULT NULL,
  `siswa_nis` varchar(10) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `desk_tinggi` longtext DEFAULT NULL,
  `desk_rendah` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_nilai_asesmen_formatif`
--

INSERT INTO `kurmer_nilai_asesmen_formatif` (`kd`, `tapel`, `kelas`, `kode`, `nama`, `kktp`, `postdate`, `smt`, `siswa_kd`, `siswa_nis`, `siswa_nama`, `desk_tinggi`, `desk_rendah`) VALUES
('fc72b1d07d194d389cbca06478bad770', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-04 17:14:27', '1', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '1', '88899'),
('4d27fa73a20a22d4a974920018fcd009', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-04 17:14:27', '1', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '1222333', '88899'),
('41df5aa4faffaa2276bad5699f8192fa', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-04 17:14:27', '1', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '16666', '88899232ddsgvsdg'),
('328ca90c3b49f9c2b81e5fb13aee9538', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-04 16:44:36', '1', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '145555', '88899'),
('ebd8c4e3a07650e8933091aac27b6cb6', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-04 16:44:36', '1', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '145555', '88899'),
('cc0e8cedaea1f2d4d2d5108cbaa52930', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-04 16:44:36', '1', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '145555', '88899'),
('0f24d9b18e037cef247e6e085252cc6e', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-04 16:44:36', '1', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '145555', '88899'),
('3c270cca4bd0a80c5b143273ca209c8d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-04 16:44:36', '1', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '145555', '88899'),
('897a1487558dc9ac9fb675e0216da28d', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-04 17:14:27', '1', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '123444', '88899'),
('6b1ddc5311687d255413bd04e4989654', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-04 17:14:27', '1', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '155555', '88899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_nilai_asesmen_formatif`
--
ALTER TABLE `kurmer_nilai_asesmen_formatif`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
