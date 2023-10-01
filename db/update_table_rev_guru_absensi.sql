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
-- Table structure for table `rev_guru_absensi`
--

CREATE TABLE `rev_guru_absensi` (
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
  `siswa_kd` varchar(50) DEFAULT NULL,
  `siswa_nis` varchar(100) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `siswa_kelamin` varchar(1) DEFAULT NULL,
  `absensi` varchar(1) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `respon_siswa` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_guru_absensi`
--

INSERT INTO `rev_guru_absensi` (`kd`, `pegawai_kd`, `pegawai_kode`, `pegawai_nama`, `tapel`, `kelas`, `smt`, `mapel_kode`, `mapel_nama`, `tglnya`, `siswa_kd`, `siswa_nis`, `siswa_nama`, `siswa_kelamin`, `absensi`, `postdate`, `respon_siswa`) VALUES
('781ebfc4c27f6cdb82529564da90d5a9', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810014', 'siswa3', NULL, 'H', '2023-07-31 14:40:28', NULL),
('8db3e24068f6f37c4c8c31567e85679d', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810013', 'siswa2', NULL, 'I', '2023-07-31 14:40:28', NULL),
('084ea5fb582df4f747db6bb32c4d8f38', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810012', 'siswa1', NULL, 'I', '2023-07-31 14:40:28', NULL),
('f7bdf61c4bead3368cc6d7b27fa10d24', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810003', 'rijahum suga', NULL, 'I', '2023-07-31 14:40:28', NULL),
('e907aa36ab5fafe4f9a5b0d75ed8fcc7', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810006', 'biasawae', NULL, 'I', '2023-07-31 14:40:28', NULL),
('7e648a37f528f91da9911ef2eae12a96', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-07-31', NULL, '810001', 'agus muhajir', NULL, 'H', '2023-07-31 14:40:28', NULL),
('d43bae7ce68b39f2e74b3eb25e403e9a', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810001', 'agus muhajir', NULL, 'H', '2023-07-05 02:49:53', NULL),
('194d219ce89871a4f5496df55114daea', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810006', 'biasawae', NULL, 'I', '2023-07-05 02:49:53', NULL),
('4ac996186a66ee0b8a7f72d25e1f7a54', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810003', 'rijahum suga', NULL, 'H', '2023-07-05 02:49:53', NULL),
('59d75d535b9b5b9823980092f60ae83e', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810012', 'siswa1', NULL, 'H', '2023-07-05 02:49:53', NULL),
('8f96a75fe5a18268e84cbe3de4f936c1', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810013', 'siswa2', NULL, 'H', '2023-07-05 02:49:53', NULL),
('b180a0dfe43fcd03fb9e6e484d85974d', '2794f6a20ee0685f4006210f40799acd', '7711', 'Evi Aviyah', '2022xgmringx2023', 'I A', '1', 'BIO', 'Biologi', '2023-07-05', NULL, '810014', 'siswa3', NULL, 'I', '2023-07-05 02:49:53', NULL),
('25afe859c218010200438472e9e7b8c2', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810014', 'siswa3', NULL, 'H', '2023-07-10 14:40:24', NULL),
('2e081adee5679d0260e20c568c5e19bb', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810013', 'siswa2', NULL, 'I', '2023-07-10 14:40:24', NULL),
('bace781005ee2f9003e7eec7288d3fac', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810012', 'siswa1', NULL, 'I', '2023-07-10 14:40:24', NULL),
('be3fa40b162485ed0f76fa469dc95bb7', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810003', 'rijahum suga', NULL, 'H', '2023-07-10 14:40:24', NULL),
('a084ca24252d3e46fbe0df92b21f7b69', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810006', 'biasawae', NULL, 'H', '2023-07-10 14:40:24', NULL),
('1b08ae3f9bea48c4ed7ac02f1d175990', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2022xgmringx2023', 'I A', '1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-07-04', NULL, '810001', 'agus muhajir', NULL, 'H', '2023-07-10 14:40:24', NULL),
('31b4ab9a3edc2bd55668dbfb7c3f0cfd', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '2', 'BINDO', 'Bahasa Indonesia', '2023-09-09', NULL, '810003', 'rijahum suga', NULL, 'I', '2023-09-09 14:27:29', NULL),
('f3b1b2727476175fe08353267ce70796', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '2', 'BINDO', 'Bahasa Indonesia', '2023-09-09', NULL, '810006', 'biasawae', NULL, 'I', '2023-09-09 14:27:29', NULL),
('4e0aa803589afee044493c0dc352095e', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '2', 'BINDO', 'Bahasa Indonesia', '2023-09-09', NULL, '810001', 'agus muhajir', NULL, 'H', '2023-09-09 14:27:29', 'sip... bagus bu...'),
('2f8efa170697f157d630d1cf1101a8d0', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-09-19', NULL, '810001', 'agus muhajir', NULL, 'H', '2023-09-19 10:30:54', 'ok...'),
('8597b9102aedf4b8674c93a2ed01bec2', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-09-19', NULL, '810006', 'biasawae', NULL, 'H', '2023-09-19 10:30:54', NULL),
('639b3ca5e15028d000ddd8a49c891a3e', '289dff07669d7a23de0ef88d2f7129e7', '234', 'Ibu 234', '2023xgmringx2024', 'I A', '1', 'BINDO', 'Bahasa Indonesia', '2023-09-19', NULL, '810003', 'rijahum suga', NULL, 'H', '2023-09-19 10:30:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rev_guru_absensi`
--
ALTER TABLE `rev_guru_absensi`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
