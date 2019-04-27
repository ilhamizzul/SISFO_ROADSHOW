-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 07:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
  `status` enum('admin','super_admin') NOT NULL,
  `online_status` tinyint(1) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `sekolah`, `status`, `online_status`, `last_login`) VALUES
(1, 'sma1', 'sma1', 'sma 1', 'admin', 0, '2019-04-23 14:36:08'),
(2, 'sma2', 'sma2', 'sma 2', 'admin', 0, '2019-04-23 14:36:08'),
(3, 'superadmin', 'superadmin', NULL, 'super_admin', 1, '2019-04-27 04:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen_soal`
--

CREATE TABLE `tb_dokumen_soal` (
  `id_dokumen` int(20) NOT NULL,
  `nama_dokumen_soal` varchar(30) NOT NULL,
  `file_soal` varchar(200) NOT NULL,
  `tipe_dokumen_soal` enum('soal','jawaban') NOT NULL,
  `tipe_soal` enum('IPA','IPS','MTK','INDONESIA','INGRRIS') NOT NULL,
  `tahun_dokumen_soal` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokumen_soal`
--

INSERT INTO `tb_dokumen_soal` (`id_dokumen`, `nama_dokumen_soal`, `file_soal`, `tipe_dokumen_soal`, `tipe_soal`, `tahun_dokumen_soal`) VALUES
(426014646, 'soal IPA tahun 2010', 'Getting-Started-Recap.pdf', 'soal', 'IPA', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_soal`
--

CREATE TABLE `tb_jawaban_soal` (
  `id_jawaban_soal` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `abjad_jawaban` char(1) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `gambar_jawaban` varchar(20) NOT NULL,
  `valid_answer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_soal`
--

CREATE TABLE `tb_jenis_soal` (
  `id_jenis_soal` int(11) NOT NULL,
  `nama_soal` varchar(10) NOT NULL,
  `tahun_soal` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 885334, 'aktif'),
(13, 999999, 'aktif'),
(14, 111111, 'aktif'),
(15, 121212, 'aktif'),
(16, 222222, 'aktif'),
(17, 333333, 'nonaktif'),
(18, 444444, 'nonaktif'),
(19, 555555, 'aktif'),
(20, 666666, 'nonaktif'),
(21, 777777, 'nonaktif'),
(22, 888888, 'nonaktif'),
(24, 787878, 'nonaktif'),
(26, 343434, 'nonaktif'),
(27, 454545, 'nonaktif');

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
  `id_tahun` int(11) NOT NULL,
  `status_absen` enum('hadir','tidak_hadir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_nmr`, `nama_peserta`, `email`, `no_hp`, `asal_sekolah`, `kelas`, `id_ruang`, `id_tahun`, `status_absen`) VALUES
(1, 12, 'ilham izzul hadyan', 'ilhamizzul@gmail.com', '085335331672', 'SMAN 2 KOTA PROBOLINGGO', '3', 1, 2, 'tidak_hadir'),
(2, 13, 'ersan atmasyah', 'ersan@gmail.com', '084927191', 'SMKN 4 KOTA PROBOLINGGO', '3', 2, 2, 'hadir'),
(3, 14, 'M. affan hafizan', 'ilhamizzul@gmail.com', '88888888', 'SMAN 1 KOTA PROBOLINGGO', '3', 2, 2, 'tidak_hadir'),
(4, 15, 'dani amri', 'dani@gmail.com', '2819381981', 'SMAN 1 DRINGU', '12', 2, 2, 'hadir'),
(5, 16, 'budi setiawan', 'budi@gmail.com', '3819371372', 'MAN 2 KOTA PROBOLINGGO', '2', 1, 2, 'tidak_hadir'),
(6, 19, 'stevan del arisandi', 'ersan@gmail.com', '03428904895', 'SMAN 2 KOTA PROBOLINGGO', '12', 1, 2, 'tidak_hadir');

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
(1, '', ''),
(2, 'Ruang 1', 'XII IPS 1'),
(4, 'Ruang 2', 'XII IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `id_jenis_soal` int(11) NOT NULL,
  `no_soal` int(11) NOT NULL,
  `text_soal` text NOT NULL,
  `gambar_soal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_total_registration`
--

CREATE TABLE `tb_total_registration` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `total_terdaftar` int(30) NOT NULL,
  `total_hadir` int(30) NOT NULL,
  `total_tidak_hadir` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_total_registration`
--

INSERT INTO `tb_total_registration` (`id`, `tahun`, `total_terdaftar`, `total_hadir`, `total_tidak_hadir`, `status`) VALUES
(1, 2018, 7, 5, 2, 1),
(2, 2019, 6, 2, 4, 1);

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
-- Indexes for table `tb_dokumen_soal`
--
ALTER TABLE `tb_dokumen_soal`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tb_jawaban_soal`
--
ALTER TABLE `tb_jawaban_soal`
  ADD PRIMARY KEY (`id_jawaban_soal`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  ADD PRIMARY KEY (`id_jenis_soal`);

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
  ADD KEY `id_nmr` (`id_nmr`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_jenis_soal` (`id_jenis_soal`);

--
-- Indexes for table `tb_total_registration`
--
ALTER TABLE `tb_total_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  MODIFY `id_jenis_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nmrpeserta`
--
ALTER TABLE `tb_nmrpeserta`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_total_registration`
--
ALTER TABLE `tb_total_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jawaban_soal`
--
ALTER TABLE `tb_jawaban_soal`
  ADD CONSTRAINT `tb_jawaban_soal_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`) ON DELETE CASCADE;

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`id_nmr`) REFERENCES `tb_nmrpeserta` (`id_nmr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`),
  ADD CONSTRAINT `tb_peserta_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_total_registration` (`id`);

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_jenis_soal`) REFERENCES `tb_jenis_soal` (`id_jenis_soal`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
