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
-- Table structure for table `kurmer_nilai_asesmen_sumatif_detail`
--

CREATE TABLE `kurmer_nilai_asesmen_sumatif_detail` (
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
  `lm_kode` varchar(5) DEFAULT NULL,
  `lm_nama` longtext DEFAULT NULL,
  `lm_nilai` varchar(5) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurmer_nilai_asesmen_sumatif_detail`
--

INSERT INTO `kurmer_nilai_asesmen_sumatif_detail` (`kd`, `tapel`, `smt`, `kelas`, `kode`, `nama`, `kktp`, `postdate`, `siswa_kd`, `siswa_nis`, `siswa_nama`, `lm_kode`, `lm_nama`, `lm_nilai`) VALUES
('c54c32b7fbc4512b089234803f54471a', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '10', '8', ''),
('fb6c089169bee6353f7b678f71f64f7d', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '9', '7', ''),
('714db34c67c7ff1802e9ed9b0d977817', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '8', '6', ''),
('56ef4cd3c738b994aeca9481bd87e2e1', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '7', '5', ''),
('cfff49c2d5b32ab6e05d13820f323ba8', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '6', '4', ''),
('460e62fdc7fbea19d7de83b926cfcd68', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '5', '5', ''),
('15751af922fbb1232fefcf68a906842d', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '4', '6', '76'),
('c115d8c3e97d67f1f258d098488c356a', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '3', '7', '45'),
('6a1a06edfab56f60ddd9520e2b6653b9', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '2', '8', '65'),
('16327a6269a037a4bd2766d715f303f1', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '1', '9', '77'),
('06d09043dc9f6a00e2e0779a71aa3f6e', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '10', '8', ''),
('da6d88571d8806a363a5e8662360ca67', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '9', '7', ''),
('9a0123d797b121f0a9345d13f2f71200', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '8', '6', ''),
('ff6da2cd645d7ff4a6a6be703214d055', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '7', '5', ''),
('774f2b5de5ba9d2ea500a363ac262c4e', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '6', '4', ''),
('dcadbdcc07548b558182342df674233d', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '5', '5', ''),
('9ea8e7165dc0b69a15d9951ffa539d03', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '4', '6', ''),
('2c9b52a680497a7a041a305e0002dad0', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '3', '7', ''),
('54dd313ffe07c6857d0304df96f70340', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '2', '8', ''),
('68f1816e723f4b09d472a40d8d69202f', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '1', '9', ''),
('39f4a3580cfe8224ba86bb0e0e82a05b', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '10', '8', ''),
('f9dde23c52e6181f1972acca2d5743ef', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '9', '7', ''),
('7d770ceec1a614d8116915ec15dcadd6', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '8', '6', ''),
('ce8bc05039e279faa8c20914dc372a28', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '7', '5', ''),
('a90edc3f9b5a92d08871d7b5f0af2ae8', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '6', '4', ''),
('c0e69b47a22abd0e0128ff28f87692bd', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '5', '5', ''),
('8669b9641c71e72ef20cd351863f11c6', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '4', '6', ''),
('8fd15a521df1891623bfdebcb142569e', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '3', '7', ''),
('d7848caeb20a8b8e920fa13fd1b9f622', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '2', '8', ''),
('0a0bfbf65e13612a31ec742648ae059e', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '1', '9', ''),
('a7afa2cf2990f80de01d5a9b81312035', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '10', '8', ''),
('df0014e6ee60aec9d584d167a87b48db', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '9', '7', ''),
('1fe452b2c19732fcbacf1a19eaf69a13', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '8', '6', ''),
('27e0c3d24a5403012b16ab2a424601c4', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '7', '5', ''),
('3af512e41fb53ce53dd16ee0ec39a1b5', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '6', '4', ''),
('62fb43e3d595d66ffae1bc4a3e9d1ff8', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '5', '5', '76'),
('3fbd3ecaad0effe5129aaf842afc5f7f', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '4', '6', '98'),
('c82d863059e0d7ad6ee41b7bd5c421ee', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '3', '7', '78'),
('2284fdd3a122ce4c55c27d814ef6edf3', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '2', '8', '55'),
('cf085e613d8e18a8445735846dc9951d', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '1', '9', '37'),
('28234ecad8cb83a027d6b4f33bc92b77', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '10', '8', ''),
('df68c15c6e4878a92fa95cb93aa0f90f', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '9', '7', ''),
('405c1872782cebeb7aa6e1fe2f4ad8a4', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '8', '6', ''),
('54443b8e5e87d79e431efa12aab6e226', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '7', '5', ''),
('810e789be5c9bd43e942e6cbd155bd33', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '6', '4', '56'),
('ee18f0076a7f58ec55d11932334ecdd4', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '5', '5', '98'),
('0202fd73008925d85de61b2c3eb833fc', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '4', '6', '90'),
('8e642f2c43eb537b96ae925082226518', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '3', '7', '78'),
('0f9a938ac1bce0cdc9fd866c10547a76', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '1', '9', '87'),
('de1cd2c3353b00caf5817809066ccc21', '2022xgmringx2023', '1', 'X MIA 1', 'BINDO', 'Bahasa Indonesia', '75', '2023-06-05 10:47:10', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '2', '8', '66'),
('ef3a39292c6538a7a9a13d156c0c0399', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '10', '5', ''),
('8de21a85365479695750fb02ce425484', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '9', '4', ''),
('9194e805ea1aa56a0a336bc150285ae6', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '8', '3', ''),
('db49e65704609c97d33314b018017e91', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '7', '4', ''),
('ea8acdd657470c20e454f56ba3cb3b3e', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '6', '5', ''),
('4f76c4ec9838645aaae675f692f7f8fd', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '5', '6', ''),
('6ea3ddb406b03ba4822b95b339b2d8d8', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '4', '5', '76'),
('0249603750d2c937fec2b2c9231ca624', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '3', '4', '45'),
('2134db3786eb0f13797b9475a0122e0c', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '8', '3', ''),
('cc181224132af00a2eee856b579f7fd6', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '9', '4', ''),
('c9e7e5859316148094abb2eeee3e56e3', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '10', '5', ''),
('881f76434776e0d0a0d0f646a5ee5ee6', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '2', '3', '65'),
('0a8292c56e4519c0b9300b424b3f62d5', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'a2b8ca1ba90a799a2be6073952a39294', '810013', 'siswa2', '1', '2', '77'),
('f76c77ec93afc70e2c0bcf0a677676a0', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '7', '4', ''),
('8efd5bdc7bb299473b9672875795fc24', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '6', '5', ''),
('14b37447b545ec1cdc02a181441d16af', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '5', '6', ''),
('a22664ab58dbdc461982d3d78bd5fc53', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '8', '3', ''),
('ea81b3b032702d1ef3a046819561024c', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '9', '4', ''),
('167092569d9af297b49949d5032e2a49', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '10', '5', ''),
('93bb8f1053258eb99c05e4095aad22b6', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '1', '2', ''),
('c438a56aef08414af43b20ce3e1cfebb', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '2', '3', ''),
('65b4fd8152bfeb166f1ed06c643ece91', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '3', '4', ''),
('368675344ba155ac0c9402e6a2f7dd6a', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '4', '5', ''),
('a21643e25fa64434e12da804fd3790fe', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '5', '6', ''),
('4faf17b634d8e5e25e2260ccbe659ea9', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '6', '5', ''),
('14656c25789b5615049baf9cdfc89065', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '7', '4', ''),
('81774f0de53ad0bfdb0ecff9250f002c', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '8', '3', ''),
('50316ad5a8d9cb3b8b35dddc9cfde543', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '9', '4', ''),
('91be11ea3d3983df7f182588a0ac009c', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'cd1a6a567cdaaf73676fa897c4bdbc1c', '810003', 'rijahum suga', '10', '5', ''),
('03ce414871011ff8c8ef05749cb687e7', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '1', '2', ''),
('f82fa1aaf059ce0542a51c15d8540892', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '2', '3', ''),
('ff88c6c5f570ebbe092658902781e382', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '4', '5', ''),
('08ec8424239c6ec57a2e5d990fbd08cf', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'd4ce7cb28eeaacc9397dea35a350bc1e', '810012', 'siswa1', '3', '4', ''),
('cf1cb59cd4f1ce7516bf2b807c053709', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '7', '4', ''),
('b2f12930e6a3c6a2cc984ab645a4d8eb', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '6', '5', ''),
('fe73b8c44c87d318aae0e3d6d4f782a7', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '5', '6', '76'),
('254f8e24c36175efcb7923380632b6ae', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '4', '5', '98'),
('3b1f95cd613060e168a2c9f3500b7653', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '3', '4', '78'),
('93c93fa6c871cc3cdba435b22cdf8592', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '2', '3', '55'),
('784160e0faaf0b382d79406d227f0f78', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f77344f957a6a33ba6169de662563445', '810006', 'biasawae', '1', '2', '37'),
('dccd8116e41c1b8b0cb27b34619462e9', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '10', '5', ''),
('9da9eb6b75b44038722a32ea48903d42', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '9', '4', ''),
('b189f580d233795bc470194d44f7d698', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '8', '3', ''),
('46ede944e200a5efee8f4617ac5d6daa', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '7', '4', '89'),
('7dcca2b27d938fad19a23d513d02c181', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '6', '5', '87'),
('e14dddb77d4cf428eef04fe7ae71b4f7', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '5', '6', '99'),
('60987025b41ff5ac65732f86afe5b9a8', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '2', '3', '87'),
('6bd1517cfd86b4ac84b2ff26a7f02371', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '4', '5', '78'),
('42abc59140968d244023a5ac4f7d1225', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '3', '4', '66'),
('ffbd9ac62a2ba4d17071e3e423d5c35d', '2022xgmringx2023', '1', 'X MIA 1', 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '75', '2023-06-05 10:49:12', 'f09cd63b1a5f9cfe368fb9d8d6e1134f', '810001', 'agus muhajir', '1', '2', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurmer_nilai_asesmen_sumatif_detail`
--
ALTER TABLE `kurmer_nilai_asesmen_sumatif_detail`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
