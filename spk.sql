-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 06:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `jenisKelamin` enum('L','P','','') NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `namaLengkap`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `mapel`, `alamat`) VALUES
('19101119121', 'Naruto', 'L', 'konoha', '2020-08-04', 'binggris', 'konoha, jepang'),
('19101119122', 'sakura', 'P', 'jepang', '2020-08-13', 'ipa', 'tokyo'),
('19101119123', 'Sasuke', 'L', 'jepang', '2020-09-22', 'binggris', 'KONOHA'),
('19101119124', 'Doraemon', 'L', 'pkl', '2020-07-18', 'binggris', 'tes'),
('19101119125', 'Nobita', 'P', 'pkl', '2020-09-22', 'ipa', 'pkl'),
('19101119126', 'Kirito', 'L', 'pkl', '2020-07-18', 'mtk', 'pkl');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `datePrint` varchar(120) NOT NULL,
  `Guru` varchar(120) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`datePrint`, `Guru`, `kdKriteria`, `nilai`) VALUES
('2021-07-02-21:53:05', 'Naruto', 27, 4),
('2021-07-02-21:53:05', 'Naruto', 28, 5),
('2021-07-02-21:53:05', 'Naruto', 29, 4),
('2021-07-02-21:53:05', 'Naruto', 30, 3),
('2021-07-02-21:53:05', 'Naruto', 31, 5),
('2021-07-02-21:53:05', 'sakura', 27, 4),
('2021-07-02-21:53:05', 'sakura', 28, 4),
('2021-07-02-21:53:05', 'sakura', 29, 4),
('2021-07-02-21:53:05', 'sakura', 30, 5),
('2021-07-02-21:53:05', 'sakura', 31, 4),
('2021-07-02-21:53:05', 'Sasuke', 27, 3),
('2021-07-02-21:53:05', 'Sasuke', 28, 4),
('2021-07-02-21:53:05', 'Sasuke', 29, 4),
('2021-07-02-21:53:05', 'Sasuke', 30, 3),
('2021-07-02-21:53:05', 'Sasuke', 31, 2),
('2021-07-02-21:53:05', 'Doraemon', 27, 5),
('2021-07-02-21:53:05', 'Doraemon', 28, 5),
('2021-07-02-21:53:05', 'Doraemon', 29, 5),
('2021-07-02-21:53:05', 'Doraemon', 30, 5),
('2021-07-02-21:53:05', 'Doraemon', 31, 5),
('2021-07-02-21:53:05', 'Nobita', 27, 4),
('2021-07-02-21:53:05', 'Nobita', 28, 3),
('2021-07-02-21:53:05', 'Nobita', 29, 5),
('2021-07-02-21:53:05', 'Nobita', 30, 5),
('2021-07-02-21:53:05', 'Nobita', 31, 4),
('2021-07-02-21:53:05', 'Kirito', 27, 3),
('2021-07-02-21:53:05', 'Kirito', 28, 4),
('2021-07-02-21:53:05', 'Kirito', 29, 5),
('2021-07-02-21:53:05', 'Kirito', 30, 3),
('2021-07-02-21:53:05', 'Kirito', 31, 4),
('2021-07-02-21:53:05', 'Asuna', 27, 4),
('2021-07-02-21:53:05', 'Asuna', 28, 3),
('2021-07-02-21:53:05', 'Asuna', 29, 3),
('2021-07-02-21:53:05', 'Asuna', 30, 4),
('2021-07-02-21:53:05', 'Asuna', 31, 3),
('2021-07-02-21:53:05', 'Aku', 27, 4),
('2021-07-02-21:53:05', 'Aku', 28, 4),
('2021-07-02-21:53:05', 'Aku', 29, 4),
('2021-07-02-21:53:05', 'Aku', 30, 3),
('2021-07-02-21:53:05', 'Aku', 31, 3),
('2021-07-02-23:07:59', 'Naruto', 27, 4),
('2021-07-02-23:07:59', 'Naruto', 28, 5),
('2021-07-02-23:07:59', 'Naruto', 29, 4),
('2021-07-02-23:07:59', 'Naruto', 30, 3),
('2021-07-02-23:07:59', 'Naruto', 31, 5),
('2021-07-02-23:07:59', 'sakura', 27, 4),
('2021-07-02-23:07:59', 'sakura', 28, 4),
('2021-07-02-23:07:59', 'sakura', 29, 4),
('2021-07-02-23:07:59', 'sakura', 30, 5),
('2021-07-02-23:07:59', 'sakura', 31, 4),
('2021-07-02-23:07:59', 'Sasuke', 27, 3),
('2021-07-02-23:07:59', 'Sasuke', 28, 4),
('2021-07-02-23:07:59', 'Sasuke', 29, 4),
('2021-07-02-23:07:59', 'Sasuke', 30, 3),
('2021-07-02-23:07:59', 'Sasuke', 31, 2),
('2021-07-02-23:07:59', 'Doraemon', 27, 2),
('2021-07-02-23:07:59', 'Doraemon', 28, 2),
('2021-07-02-23:07:59', 'Doraemon', 29, 2),
('2021-07-02-23:07:59', 'Doraemon', 30, 2),
('2021-07-02-23:07:59', 'Doraemon', 31, 1),
('2021-07-02-23:07:59', 'Nobita', 27, 4),
('2021-07-02-23:07:59', 'Nobita', 28, 3),
('2021-07-02-23:07:59', 'Nobita', 29, 5),
('2021-07-02-23:07:59', 'Nobita', 30, 5),
('2021-07-02-23:07:59', 'Nobita', 31, 4),
('2021-07-02-23:07:59', 'Kirito', 27, 3),
('2021-07-02-23:07:59', 'Kirito', 28, 4),
('2021-07-02-23:07:59', 'Kirito', 29, 5),
('2021-07-02-23:07:59', 'Kirito', 30, 3),
('2021-07-02-23:07:59', 'Kirito', 31, 4),
('2021-07-02-23:07:59', 'Asuna', 27, 5),
('2021-07-02-23:07:59', 'Asuna', 28, 5),
('2021-07-02-23:07:59', 'Asuna', 29, 5),
('2021-07-02-23:07:59', 'Asuna', 30, 5),
('2021-07-02-23:07:59', 'Asuna', 31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `historyguru`
--

CREATE TABLE `historyguru` (
  `nip` varchar(20) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `jenisKelamin` enum('L','P') NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historyguru`
--

INSERT INTO `historyguru` (`nip`, `namaLengkap`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `mapel`, `alamat`) VALUES
('19101119121', 'Naruto', 'L', 'konoha', '2020-08-04', 'binggris', 'konoha, jepang'),
('19101119122', 'sakura', 'P', 'jepang', '2020-08-13', 'ipa', 'tokyo'),
('19101119123', 'Sasuke', 'L', 'jepang', '2020-09-22', 'binggris', 'KONOHA'),
('19101119124', 'Doraemon', 'L', 'pkl', '2020-07-18', 'binggris', 'tes'),
('19101119125', 'Nobita', 'P', 'pkl', '2020-09-22', 'ipa', 'pkl'),
('19101119126', 'Kirito', 'L', 'pkl', '2020-07-18', 'mtk', 'pkl'),
('19101119127', 'Asuna', 'P', 'pkl', '2020-07-14', 'bindo', 'pkl');

-- --------------------------------------------------------

--
-- Table structure for table `historykriteria`
--

CREATE TABLE `historykriteria` (
  `datePrint` varchar(120) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `namaKriteria` varchar(120) NOT NULL,
  `sifat` char(2) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historykriteria`
--

INSERT INTO `historykriteria` (`datePrint`, `kdKriteria`, `namaKriteria`, `sifat`, `bobot`) VALUES
('2021-07-02-21:53:05', 27, 'Kinerja_Guru', 'b', 25),
('2021-07-02-21:53:05', 28, 'Absensi_Guru', 'b', 25),
('2021-07-02-21:53:05', 29, 'Wawasan_Guru', 'b', 20),
('2021-07-02-21:53:05', 30, 'Tanggung_Jawab', 'b', 15),
('2021-07-02-21:53:05', 31, 'Cara_Mengajar', 'b', 15),
('2021-07-02-23:07:59', 27, 'Kinerja_Guru', 'b', 25),
('2021-07-02-23:07:59', 28, 'Absensi_Guru', 'b', 25),
('2021-07-02-23:07:59', 29, 'Wawasan_Guru', 'b', 20),
('2021-07-02-23:07:59', 30, 'Tanggung_Jawab', 'b', 15),
('2021-07-02-23:07:59', 31, 'Cara_Mengajar', 'b', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kdKriteria` int(11) NOT NULL,
  `namaKriteria` varchar(100) NOT NULL,
  `sifat` enum('b','c','','') NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kdKriteria`, `namaKriteria`, `sifat`, `bobot`) VALUES
(27, 'Kinerja_Guru', 'b', 25),
(28, 'Absensi_Guru', 'b', 25),
(29, 'Wawasan_Guru', 'b', 20),
(30, 'Tanggung_Jawab', 'b', 15),
(31, 'Cara_Mengajar', 'b', 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `namaLengkap` varchar(30) NOT NULL,
  `userName` char(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('KS','G','AA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `namaLengkap`, `userName`, `password`, `role`) VALUES
(2, 'Kepala Sekolah', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'KS'),
(4, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'AA'),
(5, 'Guru', 'guru', '77e69c137812518e359196bb2f5e9bb9', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nip` varchar(20) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nip`, `kdKriteria`, `nilai`) VALUES
('19101119122', 27, 4),
('19101119122', 28, 4),
('19101119122', 29, 4),
('19101119122', 30, 5),
('19101119122', 31, 4),
('19101119123', 27, 3),
('19101119123', 28, 4),
('19101119123', 29, 4),
('19101119123', 30, 3),
('19101119123', 31, 2),
('19101119125', 27, 4),
('19101119125', 28, 3),
('19101119125', 29, 5),
('19101119125', 30, 5),
('19101119125', 31, 4),
('19101119126', 27, 3),
('19101119126', 28, 4),
('19101119126', 29, 5),
('19101119126', 30, 3),
('19101119126', 31, 4),
('19101119128', 27, 4),
('19101119128', 28, 4),
('19101119128', 29, 4),
('19101119128', 30, 3),
('19101119128', 31, 3),
('19101119121', 27, 4),
('19101119121', 28, 5),
('19101119121', 29, 4),
('19101119121', 30, 3),
('19101119121', 31, 5),
('19101119124', 27, 2),
('19101119124', 28, 2),
('19101119124', 29, 2),
('19101119124', 30, 2),
('19101119124', 31, 1),
('19101119127', 27, 5),
('19101119127', 28, 5),
('19101119127', 29, 5),
('19101119127', 30, 5),
('19101119127', 31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  `kdKriteria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kdSubKriteria`, `subKriteria`, `nilai`, `kdKriteria`) VALUES
(46, 'Kurang Sekali', 1, 27),
(47, 'Kurang ', 2, 27),
(48, 'Cukup Baik Banget', 3, 27),
(49, 'Baik', 4, 27),
(50, 'Baik Sekali', 5, 27),
(51, 'Kurang Sekali', 1, 28),
(52, 'Kurang', 2, 28),
(53, 'Cukup', 3, 28),
(54, 'Baik', 4, 28),
(55, 'Sangat Baik', 5, 28),
(56, 'Kurang Sekali', 1, 29),
(57, 'Kurang', 2, 29),
(58, 'Cukup', 3, 29),
(59, 'Baik', 4, 29),
(60, 'Sangat Baik', 5, 29),
(61, 'Kurang Sekali', 1, 30),
(62, 'Kurang', 2, 30),
(63, 'Cukup', 3, 30),
(64, 'Baik', 4, 30),
(65, 'Sangat Baik', 5, 30),
(66, 'Kurang Sekali', 1, 31),
(67, 'Kurang', 2, 31),
(68, 'Cukup', 3, 31),
(69, 'Baik', 4, 31),
(70, 'Sangat Baik', 5, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `historyguru`
--
ALTER TABLE `historyguru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kdKriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `nip` (`nip`),
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
