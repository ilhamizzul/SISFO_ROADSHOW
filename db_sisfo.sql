-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 08:07 PM
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
(3, 'superadmin', 'superadmin', NULL, 'super_admin', 1, '2019-04-30 14:49:17');

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
(28, 284096, 'aktif'),
(29, 445846, 'aktif'),
(30, 258481, 'aktif'),
(31, 205124, 'aktif'),
(32, 974121, 'aktif'),
(33, 277008, 'nonaktif'),
(34, 687046, 'nonaktif'),
(35, 547453, 'nonaktif'),
(36, 860469, 'nonaktif'),
(37, 226767, 'nonaktif'),
(38, 169702, 'nonaktif'),
(39, 552823, 'nonaktif'),
(40, 715545, 'nonaktif'),
(41, 902279, 'nonaktif'),
(42, 795899, 'nonaktif'),
(43, 637002, 'nonaktif'),
(44, 597147, 'nonaktif'),
(45, 362269, 'nonaktif'),
(46, 730342, 'nonaktif'),
(47, 806111, 'nonaktif'),
(48, 681253, 'nonaktif'),
(49, 403489, 'nonaktif'),
(50, 958407, 'nonaktif'),
(51, 901940, 'nonaktif'),
(52, 753002, 'nonaktif'),
(53, 212958, 'nonaktif'),
(54, 922634, 'nonaktif'),
(55, 345954, 'nonaktif'),
(56, 603884, 'nonaktif'),
(57, 433447, 'nonaktif'),
(58, 583443, 'nonaktif'),
(59, 811773, 'nonaktif'),
(60, 476886, 'nonaktif'),
(61, 440557, 'nonaktif'),
(62, 576697, 'nonaktif'),
(63, 335430, 'nonaktif'),
(64, 748594, 'nonaktif'),
(65, 268932, 'nonaktif'),
(66, 810597, 'nonaktif'),
(67, 994568, 'nonaktif'),
(68, 935581, 'nonaktif'),
(69, 940932, 'nonaktif'),
(70, 362770, 'nonaktif'),
(71, 965914, 'nonaktif'),
(72, 569960, 'nonaktif'),
(73, 474140, 'nonaktif'),
(74, 772505, 'nonaktif'),
(75, 334696, 'nonaktif'),
(76, 772753, 'nonaktif'),
(77, 775103, 'nonaktif'),
(78, 839213, 'nonaktif'),
(79, 438573, 'nonaktif'),
(80, 596361, 'nonaktif'),
(81, 827798, 'nonaktif'),
(82, 768164, 'nonaktif'),
(83, 554026, 'nonaktif'),
(84, 531795, 'nonaktif'),
(85, 905853, 'nonaktif'),
(86, 546929, 'nonaktif'),
(87, 724139, 'nonaktif'),
(88, 419696, 'nonaktif'),
(89, 951636, 'nonaktif'),
(90, 349592, 'nonaktif'),
(91, 529909, 'nonaktif'),
(92, 531772, 'nonaktif'),
(93, 229559, 'nonaktif'),
(94, 533289, 'nonaktif'),
(95, 871023, 'nonaktif'),
(96, 874701, 'nonaktif'),
(97, 808495, 'nonaktif'),
(98, 679186, 'nonaktif'),
(99, 204134, 'nonaktif'),
(100, 455335, 'nonaktif'),
(101, 661994, 'nonaktif'),
(102, 799285, 'nonaktif'),
(103, 726746, 'nonaktif'),
(104, 138970, 'nonaktif'),
(105, 284714, 'nonaktif'),
(106, 402861, 'nonaktif'),
(107, 361884, 'nonaktif'),
(108, 400149, 'nonaktif'),
(109, 829525, 'nonaktif'),
(110, 669059, 'nonaktif'),
(111, 888062, 'nonaktif'),
(112, 533918, 'nonaktif'),
(113, 117406, 'nonaktif'),
(114, 462414, 'nonaktif'),
(115, 332942, 'nonaktif'),
(116, 398905, 'nonaktif'),
(117, 728406, 'nonaktif'),
(118, 452544, 'nonaktif'),
(119, 425907, 'nonaktif'),
(120, 704868, 'nonaktif'),
(121, 346088, 'nonaktif'),
(122, 875477, 'nonaktif'),
(123, 717979, 'nonaktif'),
(124, 260145, 'nonaktif'),
(125, 947774, 'nonaktif'),
(126, 481485, 'nonaktif'),
(127, 564843, 'nonaktif'),
(128, 695681, 'nonaktif'),
(129, 388294, 'nonaktif'),
(130, 782635, 'nonaktif'),
(131, 528901, 'nonaktif'),
(132, 743962, 'nonaktif'),
(133, 701461, 'nonaktif'),
(134, 269337, 'nonaktif'),
(135, 332013, 'nonaktif'),
(136, 161044, 'nonaktif'),
(137, 470367, 'nonaktif'),
(138, 407989, 'nonaktif'),
(139, 528195, 'nonaktif'),
(140, 764079, 'nonaktif'),
(141, 329203, 'nonaktif'),
(142, 826440, 'nonaktif'),
(143, 374182, 'nonaktif'),
(144, 762123, 'nonaktif'),
(145, 591067, 'nonaktif'),
(146, 555110, 'nonaktif'),
(147, 901887, 'nonaktif'),
(148, 209858, 'nonaktif'),
(149, 859370, 'nonaktif'),
(150, 132224, 'nonaktif'),
(151, 277010, 'nonaktif'),
(152, 899151, 'nonaktif'),
(153, 651166, 'nonaktif'),
(154, 898966, 'nonaktif'),
(155, 218293, 'nonaktif'),
(156, 188249, 'nonaktif'),
(157, 991348, 'nonaktif'),
(158, 714341, 'nonaktif'),
(159, 150867, 'nonaktif'),
(160, 184662, 'nonaktif'),
(161, 776916, 'nonaktif'),
(162, 406057, 'nonaktif'),
(163, 185948, 'nonaktif'),
(164, 355644, 'nonaktif'),
(165, 599380, 'nonaktif'),
(166, 656676, 'nonaktif'),
(167, 299338, 'nonaktif'),
(168, 804542, 'nonaktif'),
(169, 213973, 'nonaktif'),
(170, 893014, 'nonaktif'),
(171, 709999, 'nonaktif'),
(172, 186102, 'nonaktif'),
(173, 730781, 'nonaktif'),
(174, 841470, 'nonaktif'),
(175, 487239, 'nonaktif'),
(176, 687055, 'nonaktif'),
(177, 515635, 'nonaktif'),
(178, 774951, 'nonaktif'),
(179, 749082, 'nonaktif'),
(180, 428044, 'nonaktif'),
(181, 685422, 'nonaktif'),
(182, 635733, 'nonaktif'),
(183, 136921, 'nonaktif'),
(184, 454863, 'nonaktif');

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
  `id_sekolah` int(50) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `pilihan_soal` enum('teknik','non_teknik') NOT NULL,
  `status_absen` enum('hadir','tidak_hadir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_nmr`, `nama_peserta`, `email`, `no_hp`, `id_sekolah`, `id_ruang`, `id_tahun`, `pilihan_soal`, `status_absen`) VALUES
(7, 28, 'Aldino Hernawan', 'alzin950@gmail.com', '081216686750', 10, 1, 2, 'non_teknik', 'tidak_hadir'),
(8, 29, 'Azizah Faridatul Jannah', 'azizahfaridatul01@gmail.com', '', 10, 1, 2, 'non_teknik', 'tidak_hadir'),
(9, 30, 'Lely aprilia', 'dilanurwulandari74@gmail.com', '082231620938', 10, 1, 2, 'non_teknik', 'tidak_hadir'),
(10, 31, 'Hardian', 'dian_prast@ymail.com', '085736225706', 10, 1, 2, 'non_teknik', 'tidak_hadir'),
(11, 32, 'Nida Sefrina Hadi', 'nidasefrina3@gmail.com', '08816076114', 10, 1, 2, 'non_teknik', 'tidak_hadir');

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
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(40) NOT NULL,
  `alamat_sekolah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`) VALUES
(2, 'SMAN 1 KOTA PROBOLINGGO', 'Jl. Soekarno - Hatta No.137, Curahgrinting, Kanigaran, Kota Probolinggo, Jawa Timur 67212'),
(3, 'SMAN 2 KOTA PROBOLINGGO', 'Jl. Ki Hadjar Dewantara, 01, Kanigaran, Kota Probolinggo, Jawa Timur 67213'),
(4, 'SMAN 3 KOTA PROBOLINGGO', 'Jrebeng Kidul, Wonoasih, Kota Probolinggo, Jawa Timur 67232'),
(5, 'SMAN 4 KOTA PROBOLINGGO', 'Jl. Slamet Riyadi, Kanigaran, Kota Probolinggo, Jawa Timur 67271'),
(6, 'SMKN 1 KOTA PROBOLINGGO', 'Jl. Mastrip 357 Kademangan Kota Probolinggo, Jrebeng Wetan, Kedopok, Probolinggo City, East Java 67239'),
(7, 'SMKN 2 KOTA PROBOLINGGO', 'Jl. Mastrip No.153, Kanigaran, Kota Probolinggo, Jawa Timur 67213\r\n'),
(8, 'SMKN 3 KOTA PROBOLINGGO', 'Jl. Pahlawan No.26A, Kebonsari Kulon, Kanigaran, Kota Probolinggo, Jawa Timur 67214'),
(9, 'SMKN 4 KOTA PROBOLINGGO', 'Jl. Semeru No.123, Kademangan, Probolinggo, Kota Probolinggo, Jawa Timur 67224'),
(10, 'MAN 1 KOTA PROBOLINGGO', 'Jl. Jeruk No.7, Jrebeng Kidul, Wonoasih, Kota Probolinggo, Jawa Timur 67233'),
(11, 'MAN 2 KOTA PROBOLINGGO', 'Jl. Raya Soekarno Hatta No.255, Curahgrinting, Kanigaran, Kota Probolinggo, Jawa Timur 67212'),
(12, 'SMA TARUNA DRA. ZULAEHA', 'Jalan Raya Leces No. A3, Leces, Kolla, Leces, Probolinggo, Jawa Timur 67273'),
(13, 'SMAN 1 DRINGU', 'JL. Kom L Yos Sudarso Pabean, Dringu, 67271, Wonopaten, Pabean, Dringu, Probolinggo, Jawa Timur 67271'),
(14, 'SMAN 1 KRAKSAAN', 'Jalan Imam Bonjol No.13, Klojen, Sidomukti, Kraksaan, Probolinggo, Jawa Timur'),
(15, 'SMA TUNAS LUHUR', 'Dusun Sefar, Sumberanyar, Paiton, Probolinggo, Jawa Timur 67291'),
(16, 'SMAN 1 TONGAS', 'Krajan, Tongaswetan, Tongas, Probolinggo, Jawa Timur 67252'),
(17, 'SMAN 1 LECES', 'Jl. Raya Leces, Gn. Malang, Malasan Kulon, Leces, Probolinggo, Jawa Timur 67273'),
(18, 'SMAK MATER DEI', 'Jl. D.I. Panjaitan No.62B, Sukabumi, Mayangan, Kota Probolinggo, Jawa Timur 67219'),
(19, 'MAN PAJARAKAN', 'Area Sawah, Karanggeger, Pajarakan, Probolinggo, Jawa Timur 67281'),
(20, 'SMAN 1 PAITON', 'Jl. Pakuniran, RT.14/RW.6, Dusun Kota Sukodadi, Sukodadi, Paiton, Probolinggo, Jawa Timur 67291'),
(21, 'SMAN 1 GENDING', 'Jl. Raya Sebaung, Kertah, Sebaung, Gending, Probolinggo, Jawa Timur 67272');

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
(1, 2018, 7, 5, 2, 0),
(2, 2019, 6, 2, 4, 0);

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
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD UNIQUE KEY `nama_sekolah` (`nama_sekolah`);

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
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `tb_peserta_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_total_registration` (`id`),
  ADD CONSTRAINT `tb_peserta_ibfk_4` FOREIGN KEY (`id_sekolah`) REFERENCES `tb_sekolah` (`id_sekolah`);

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_jenis_soal`) REFERENCES `tb_jenis_soal` (`id_jenis_soal`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
