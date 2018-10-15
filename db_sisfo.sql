-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:22 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `status` enum('admin','super_admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `sekolah`, `status`) VALUES
(1, 'sma1', 'sma1', 'sma 1', 'admin'),
(2, 'sma2', 'sma2', 'sma 2', 'admin'),
(3, 'superadmin', 'superadmin', NULL, 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nmrpeserta`
--

CREATE TABLE `tb_nmrpeserta` (
  `id_nmr` int(11) NOT NULL,
  `nomor_peserta` int(6) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nmrpeserta`
--

INSERT INTO `tb_nmrpeserta` (`id_nmr`, `nomor_peserta`, `status`) VALUES
(2, 222222, 'aktif'),
(4, 444444, 'nonaktif'),
(5, 555555, 'nonaktif'),
(6, 666666, 'aktif'),
(7, 6969, 'nonaktif'),
(8, 6868, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_nmr` int(11) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `status_absen` enum('hadir','tidak_hadir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_nmr`, `nama_peserta`, `email`, `no_hp`, `asal_sekolah`, `kelas`, `id_ruang`, `status_absen`) VALUES
(4, 2, 'Ilham izzul hadyan', 'ilhamizzul@gmail.com', '085335831672', 'SMAN 1 Kota Probolinggo', 'MIPA 2', 2, 'hadir'),
(5, 6, 'Ardhanna Zafran', 'sureiya7@gmail.com', '085234831674', 'SMAN 2 Kota Probolinggo', 'MIPA 3', 2, 'tidak_hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `letak_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`, `letak_ruang`) VALUES
(1, 'weebo', 'mipa 1'),
(2, 'kpopers', 'mipa 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_nmrpeserta`
--
ALTER TABLE `tb_nmrpeserta`
  ADD PRIMARY KEY (`id_nmr`),
  ADD KEY `id_nmr` (`id_nmr`),
  ADD KEY `id_nmr_2` (`id_nmr`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_nmr` (`id_nmr`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nmrpeserta`
--
ALTER TABLE `tb_nmrpeserta`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`id_nmr`) REFERENCES `tb_nmrpeserta` (`id_nmr`),
  ADD CONSTRAINT `tb_peserta_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
