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
-- Table structure for table `kurmer_mapel_tp`
--

CREATE TABLE `kurmer_mapel_tp` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tapel` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `smt` varchar(1) DEFAULT NULL,
  `tp_kode` varchar(5) DEFAULT NULL,
  `tp_nama` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_mapel_tp`
--

INSERT INTO `kurmer_mapel_tp` (`kd`, `tapel`, `kelas`, `kode`, `nama`, `postdate`, `smt`, `tp_kode`, `tp_nama`) VALUES
('954a284d3fa7740b4075406946566281', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '24', ''),
('3be9784e22940e8d24415c29ee1529c2', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '23', ''),
('ad0da1463843e43615108d46af6e79ba', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '22', ''),
('0b3ccffd4ec2aedf41adb662bee328ea', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '21', '88'),
('6822e390b418a90e010021f35daabad8', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '20', '8'),
('3062c60d10c7733a7c8f9a97b70cd4f8', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '19', '8'),
('7872c90df358c914282d61df20645af2', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '18', '8'),
('418ed9ba8a7a85b88f678e165007eeb2', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '17', '7'),
('c2524d2e9ba4c8155d3607716059602f', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '16', '6'),
('9c001ac1bef618f47b2affe39b73fda1', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '15', '5'),
('d72d9785b849db23a5f0cb3f6745fc95', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '14', '6'),
('ded0718066d69999114387f161a5586e', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '13', '5'),
('726ef67736db67c59ff6d09d51dfd68b', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '12', '6'),
('fd0f5d36f7b2cff6ac5fd1626a7faef1', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '11', '7'),
('e47fb544f446f676cfc5996257b8b0a1', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '10', '8'),
('e77bec523484f87d3eab9083ba383c2b', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '9', '9'),
('c325a1cd658df198ab2f2870365a7003', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '8', '8'),
('b1f388172988d4c55beea7074c62daaa', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '7', '7'),
('ad1ff5a07873e41beb13ba621f92f958', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '6', '6'),
('92c569d52b1d3d411c546672784fac09', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '5', '5'),
('884fd554fc12dfe60eade96350fe56c6', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '4', '4'),
('f4407b37fda3be5410d98366404d447f', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '3', '3'),
('1cfa08d92a3ccd50e244c39e5910a7a7', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '2', '2'),
('254299a8f3294de908e787781a062c6a', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '1', '1'),
('d08bd2e8bb7dced5c95caca803985afb', '2022xgmringx2023', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '2023-06-03 10:31:34', '1', '25', ''),
('7a680b720da48593fc7e645340d007e5', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '25', ''),
('9e7b8dad46d28dccd100a5ed225eb4f4', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '23', ''),
('b165334248dc8032159c614268ddde01', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '24', ''),
('411e577f6a86a73a4094c006daf10189', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '22', ''),
('583d1463a14164a142a74f7ddbb1e68a', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '19', '8'),
('cd3cc4aa30c6289f06b1d107f6865deb', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '20', '8'),
('02d2b08733c719a632627352a9b76ac7', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '21', '88'),
('54389eaeb296d977a5ea08ac4217f1ce', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '16', '6'),
('1661bd9105844a72785d92b156a41e82', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '18', '8'),
('8479c26819c5430b5da3555b66681d8d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '17', '7'),
('a432fa0aa2cebde7c74406cfe62790bc', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '13', '5'),
('acb63b63c6076a1805e1b393456710e3', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '14', '6'),
('d611fe0306f42cffc508310b8db73076', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '15', '5'),
('7206992f5c3aae525a218805008e181b', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '12', '6'),
('59ecc67094e17bb3bce171ea903b937d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '10', '8'),
('29a23f6748a21300b498f6bcb309bbf4', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '11', '7'),
('058d663ea363f0c8cceeb257844293a0', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '8', '8'),
('06be50805f43f31393368941746976e7', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '9', '9'),
('c4575217bb98eea495ae62d10705b5cb', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '7', '7'),
('15d981a061d6865e8f8e8e60b1fd3aa6', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '6', '6'),
('ee303bed61a928e8d6bd85405aa41c29', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '4', '4'),
('bc74252d93b11c19881bef10807bca09', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '5', '5'),
('960f8bb02f430e5f0f8f648ceeb9f599', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '3', '99993'),
('eb78035b1ae0b5061494f0a365c3d9ab', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '1', '18888'),
('43c11f3719e5a6b4f472006bda73211d', '2022xgmringx2023', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-06-03 10:46:38', '1', '2', '88882');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_mapel_tp`
--
ALTER TABLE `kurmer_mapel_tp`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
