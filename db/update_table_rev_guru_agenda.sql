-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2023 at 06:35 AM
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
-- Table structure for table `rev_guru_agenda`
--

CREATE TABLE `rev_guru_agenda` (
  `kd` varchar(50) NOT NULL,
  `pegawai_kd` varchar(50) DEFAULT NULL,
  `pegawai_kode` varchar(100) DEFAULT NULL,
  `pegawai_nama` varchar(100) DEFAULT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `smt` varchar(1) DEFAULT NULL,
  `mapel_kode` varchar(100) DEFAULT NULL,
  `mapel_nama` varchar(100) DEFAULT NULL,
  `tglnya` date DEFAULT NULL,
  `jamnya` longtext DEFAULT NULL,
  `pertemuan_ke` varchar(5) DEFAULT NULL,
  `namanya` longtext DEFAULT NULL,
  `indikatornya` longtext DEFAULT NULL,
  `catatan` longtext DEFAULT NULL,
  `tindak_lanjut` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `daftar_siswa_absen` longtext DEFAULT NULL,
  `wk_catatan` longtext DEFAULT NULL,
  `wk_postdate` datetime DEFAULT NULL,
  `wk_presensi` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_guru_agenda`
--

INSERT INTO `rev_guru_agenda` (`kd`, `pegawai_kd`, `pegawai_kode`, `pegawai_nama`, `tapel`, `kelas`, `smt`, `mapel_kode`, `mapel_nama`, `tglnya`, `jamnya`, `pertemuan_ke`, `namanya`, `indikatornya`, `catatan`, `tindak_lanjut`, `postdate`, `daftar_siswa_absen`, `wk_catatan`, `wk_postdate`, `wk_presensi`) VALUES
('3c13f3b99f43917d381adc4e8dfc218a', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', '2', '1', '1', '2', '3', '4', '2023-07-31 14:39:10', NULL, NULL, NULL, NULL),
('7a4758ac525bed3b5c8de2392086eca0', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-08-08', '2', '11', '11', '12', '13', '14', '2023-08-08 08:38:08', NULL, NULL, NULL, NULL),
('90e3f698d8670ed44b43c7153d486dec', '202cb962ac59075b964b07152d234b70', '123', 'Mr. 123', '2022xgmringx2023', 'I A', '1', 'KIM', 'Kimia', '2023-07-31', '4', '2', '9', '8', '7', '6', '2023-07-31 14:17:56', NULL, NULL, NULL, NULL),
('093ebea6e5304f61ce816c655423ae35', '202cb962ac59075b964b07152d234b70', '123', 'Mr. 123', '2022xgmringx2023', 'I A', '1', 'KIM', 'Kimia', '2023-07-31', '4', '3', '9', '8', '7', '6', '2023-07-31 14:17:38', NULL, NULL, NULL, NULL),
('19ecb567ba43bda488c4c72d2c090341', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '2', 'BINDO', 'Bahasa Indonesia', '2023-09-18', '1', '1', '111', '11', '11', '11', '2023-09-09 09:43:38', NULL, NULL, NULL, NULL),
('908750820a1cb902993908c7a6868153', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '2', 'BINDO', 'Bahasa Indonesia', '2023-09-09', '1', '1', '122', '88', '77', '66', '2023-09-09 09:50:17', NULL, 'sdasf', '2023-09-09 15:18:41', 'I'),
('be49b321d5add027225595a663ae927e', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-09-19', '1', '1', '1', '2', '3', '4', '2023-09-19 10:30:36', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rev_guru_agenda`
--
ALTER TABLE `rev_guru_agenda`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
