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
-- Table structure for table `kurmer_mapel_lm`
--

CREATE TABLE `kurmer_mapel_lm` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `smt` varchar(5) DEFAULT NULL,
  `lm_kode` varchar(5) DEFAULT NULL,
  `lm_nama` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_mapel_lm`
--

INSERT INTO `kurmer_mapel_lm` (`kd`, `tapel`, `kelas`, `kode`, `nama`, `postdate`, `smt`, `lm_kode`, `lm_nama`) VALUES
('058d663ea363f0c8cceeb257844293a0', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '8', '3'),
('c4575217bb98eea495ae62d10705b5cb', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '7', '4'),
('15d981a061d6865e8f8e8e60b1fd3aa6', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '6', '5'),
('bc74252d93b11c19881bef10807bca09', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '5', '6'),
('ee303bed61a928e8d6bd85405aa41c29', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '4', '5'),
('960f8bb02f430e5f0f8f648ceeb9f599', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '3', '4'),
('43c11f3719e5a6b4f472006bda73211d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '2', '3'),
('eb78035b1ae0b5061494f0a365c3d9ab', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '1', '2'),
('c325a1cd658df198ab2f2870365a7003', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '8', '6'),
('b1f388172988d4c55beea7074c62daaa', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '7', '5'),
('ad1ff5a07873e41beb13ba621f92f958', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '6', '4'),
('92c569d52b1d3d411c546672784fac09', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '5', '5'),
('884fd554fc12dfe60eade96350fe56c6', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '4', '6'),
('f4407b37fda3be5410d98366404d447f', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '3', '7'),
('1cfa08d92a3ccd50e244c39e5910a7a7', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '2', '8'),
('254299a8f3294de908e787781a062c6a', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '1', '9'),
('e77bec523484f87d3eab9083ba383c2b', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '9', '7'),
('e47fb544f446f676cfc5996257b8b0a1', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-05 10:46:53', '1', '10', '8'),
('06be50805f43f31393368941746976e7', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '9', '4'),
('59ecc67094e17bb3bce171ea903b937d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-05 10:47:02', '1', '10', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_mapel_lm`
--
ALTER TABLE `kurmer_mapel_lm`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
