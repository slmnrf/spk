-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 09:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('19101119121', 'Naruto', 'L', 'konoha', '2020-08-04', 'mtk', 'konoha, jepang'),
('19101119122', 'sakura', 'P', 'jepang', '2020-08-13', 'ipa', 'tokyo');

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
(18, 'Absensi Guru ', 'c', 2),
(19, 'Kinerja Guru', 'b', 2),
(20, 'Fasilitas ', 'c', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `namaLengkap` varchar(30) NOT NULL,
  `userName` char(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `namaLengkap`, `userName`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(1, 'Tidak memadai', 1, 18),
(2, 'Kurang memadai', 2, 18),
(3, 'Cukup memadai', 3, 18),
(4, 'Memadai', 4, 18),
(5, 'Sangat Memadai', 5, 18),
(6, 'Tidak memadai', 1, 19),
(7, 'Kurang memadai', 2, 19),
(8, 'Cukup memadai', 3, 19),
(9, 'Memadai', 4, 19),
(10, 'Sangat Memadai', 5, 19),
(11, 'Tidak memadai', 1, 20),
(12, 'Kurang memadai', 2, 20),
(13, 'Cukup memadai', 3, 20),
(14, 'Memadai', 4, 20),
(15, 'Sangat Terlalu', 5, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
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
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
