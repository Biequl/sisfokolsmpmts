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
-- Table structure for table `kurmer_nilai_proyek`
--

CREATE TABLE `kurmer_nilai_proyek` (
  `kd` varchar(50) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `proyek_kode` varchar(5) DEFAULT NULL,
  `dimensi_kode` varchar(5) DEFAULT NULL,
  `siswa_kode` varchar(50) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `nilai` varchar(5) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurmer_nilai_proyek`
--

INSERT INTO `kurmer_nilai_proyek` (`kd`, `tapel`, `kelas`, `proyek_kode`, `dimensi_kode`, `siswa_kode`, `siswa_nama`, `nilai`, `postdate`) VALUES
('11380472986bb778ae194e248a2964fd', '2022xgmringx2023', 'X MIA 1', '2', '1', '810014', 'siswa3', 'mb', '2023-06-08 20:47:22'),
('946cf0ee134e3739e8516d1d4e1ffd76', '2022xgmringx2023', 'X MIA 1', '2', '1', '810013', 'siswa2', 'bb', '2023-06-08 20:47:22'),
('d08ef20fa6883529f2306b07c251287f', '2022xgmringx2023', 'X MIA 1', '2', '1', '810012', 'siswa1', 'mb', '2023-06-08 20:47:22'),
('37b2fe8b6adbf589e950546f6d2ebc6b', '2022xgmringx2023', 'X MIA 1', '2', '1', '810003', 'rijahum suga', 'bb', '2023-06-08 20:47:22'),
('e6f6224623c64f6b24615d3147efdcaf', '2022xgmringx2023', 'X MIA 1', '2', '1', '810006', 'biasawae', 'mb', '2023-06-08 20:47:22'),
('ea39201120ed153df2d490d5e606f742', '2022xgmringx2023', 'X MIA 1', '2', '1', '810001', 'agus muhajir', 'bb', '2023-06-08 20:47:22'),
('8d7bf6f0e5996e671789a543fc9c9196', '2022xgmringx2023', 'X MIA 1', '1', '1', '810014', 'siswa3', 'mb', '2023-06-08 20:47:05'),
('bbb5e0c3cac53ed6fea7cd4b85eea8ca', '2022xgmringx2023', 'X MIA 1', '1', '1', '810013', 'siswa2', 'bb', '2023-06-08 20:47:05'),
('baa948e0225f174f5cf683d174b3e3e9', '2022xgmringx2023', 'X MIA 1', '1', '1', '810012', 'siswa1', 'mb', '2023-06-08 20:47:05'),
('f8225b60c1de91c25f0cf5f9209e956e', '2022xgmringx2023', 'X MIA 1', '1', '1', '810003', 'rijahum suga', 'bb', '2023-06-08 20:47:05'),
('0e5a0f33f6859399a14ab9b84642a44f', '2022xgmringx2023', 'X MIA 1', '1', '1', '810006', 'biasawae', 'mb', '2023-06-08 20:47:05'),
('7b0f7c943963c8318af5e5d96feb9fe8', '2022xgmringx2023', 'X MIA 1', '1', '1', '810001', 'agus muhajir', 'bb', '2023-06-08 20:47:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_nilai_proyek`
--
ALTER TABLE `kurmer_nilai_proyek`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
