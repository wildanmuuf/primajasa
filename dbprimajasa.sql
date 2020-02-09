-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 08:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbprimajasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(5) NOT NULL,
  `kode_bank` varchar(5) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `no_rekening` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `kode_bank`, `nama_bank`, `nama_penerima`, `no_rekening`) VALUES
(1, '0421', 'Bank Rakyat Indonesia (BRI)', 'PRIMAJASA', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kursi`
--

CREATE TABLE IF NOT EXISTS `detail_kursi` (
  `id` int(11) NOT NULL,
  `id_orders` varchar(25) NOT NULL,
  `id_tiket` varchar(10) NOT NULL,
  `no_kursi` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kursi`
--

INSERT INTO `detail_kursi` (`id`, `id_orders`, `id_tiket`, `no_kursi`) VALUES
(84, 'PRMJS-041102-00001', 'T0002', 6),
(83, 'PRMJS-041102-00001', 'T0002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kursi_temp`
--

CREATE TABLE IF NOT EXISTS `detail_kursi_temp` (
  `id_orders_temp` varchar(25) NOT NULL,
  `id_tiket_temp` varchar(10) NOT NULL,
  `no_kursi_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tujuan`, `jam`) VALUES
('J0001', 'Bandung', '15:00'),
('J0002', 'Bandung', '13.00'),
('J0003', 'Jakarta', '09.00'),
('J0004', 'Jakarta', '11.00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama_kelas` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `tipe_kursi` varchar(5) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jumlah_kursi`, `tipe_kursi`) VALUES
('K001', 'Ekonomi', 59, '2-3'),
('K002', 'Executive AC', 55, '2-2'),
('K003', 'Ekonomi AC', 48, '2-2');

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

CREATE TABLE IF NOT EXISTS `kustomer` (
  `id_kustomer` int(5) NOT NULL,
  `nik` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `nik`, `username`, `password`, `nama_lengkap`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `email`, `telpon`, `foto`) VALUES
(1, '3174060411960002', 'kustomer1', '81dc9bdb52d04dc20036dbd8313ed055', 'Kustomer 1', 'asd', '0000-00-00', '', 'kustomer1@mail.com', '089999999', ''),
(5, '1234567890123456', 'kustomer2', '81dc9bdb52d04dc20036dbd8313ed055', 'wildan', 'asdas', '2020-01-19', 'L', 'asd@mail.com', '2134', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` varchar(25) CHARACTER SET latin1 NOT NULL,
  `status_orders` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT 'Belum Lunas',
  `tgl_berangkat` date NOT NULL,
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `status_orders`, `tgl_berangkat`, `tgl_order`, `jam_order`, `id_kustomer`, `total`) VALUES
('PRMJS-041102-00001', 'Lunas', '2020-01-03', '2020-01-03', '02:13:00', 1, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_tiket` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_tiket`, `jumlah`) VALUES
(1, 2, 2),
(2, 8, 5),
(4, 6, 3),
(22, 5, 2),
(21, 2, 3),
(20, 2, 3),
(19, 2, 2),
(18, 2, 3),
(23, 2, 3),
(24, 8, 2),
(25, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `id_tiket` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `id_session` varchar(500) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` varchar(25) NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `id_orders` varchar(25) NOT NULL,
  `id_bank` int(5) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Belum Valid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_pembayaran`, `bukti_pembayaran`, `id_orders`, `id_bank`, `status`) VALUES
('B-PRMJS-041100-00001', 'Ditempat', 'IMG-20160803-WA0005.jpg', 'PRMJS-041102-00001', 0, 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telpon` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `email`, `tgl_lahir`, `telpon`, `alamat`, `level`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 'admin@primajasa.com', '0000-00-00', '', '', 'admin', ''),
(6, 'rizky', '81dc9bdb52d04dc20036dbd8313ed055', 'Rizky', 'L', 'asd@mail.com', '2020-01-11', 'asdas', 'asdasd', 'kondektur', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` varchar(10) NOT NULL,
  `nama_tiket` varchar(30) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_tiket`, `id_kelas`, `harga_tiket`, `id_jadwal`, `id_petugas`) VALUES
('T0001', 'Ekonomi JKT', 'K001', 250002, 'J0004', 6),
('T0002', 'Executive BDG', 'K002', 35000, 'J0001', 6),
('T0003', 'Executive JKT', 'K002', 45000, 'J0004', 6),
('T0004', 'Ekonomi BDG', 'K001', 20000, 'J0002', 0),
('T0012', 'asdsaddddd', 'K001', 0, 'J0001', 0),
('T0006', 'VIP JKT', 'K004', 55000, 'J0001', 0),
('T0007', 'VIP JKT', 'K004', 55000, 'J0001', 0),
('T0008', 'VIP JKT', 'K004', 55000, 'J0001', 0),
('T0009', 'VIP JKT', 'K004', 55000, 'J0001', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_kursi`
--
ALTER TABLE `detail_kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kustomer`
--
ALTER TABLE `kustomer`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
  ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_kursi`
--
ALTER TABLE `detail_kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
  MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
