-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 11:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tol`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` varchar(64) NOT NULL,
  `username_admin` varchar(64) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username_admin`, `nama_admin`, `tgl_lahir`, `jenis_kelamin`, `email`, `password`, `alamat`, `no_telp`, `status`) VALUES
('101', 'adminfx01', 'FX Admin', '19-01-1993', 'Laki-laki', 'fxadmin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Purwokerto', '087361234512', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cabang`
--

CREATE TABLE IF NOT EXISTS `tbl_cabang` (
  `kode_penempatan` varchar(5) NOT NULL,
  `id_tol` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cabang`
--

INSERT INTO `tbl_cabang` (`kode_penempatan`, `id_tol`, `nama`) VALUES
('1001', '101', 'Kanci'),
('1002', '102', 'SS Dawuan'),
('1003', '101', 'Ciledug'),
('1004', '101', 'Pejagan'),
('1005', '102', 'Sadang'),
('1006', '102', 'Jatiluhur'),
('1007', '102', 'SS Padalarang'),
('1008', '102', 'Cikamuning');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE IF NOT EXISTS `tbl_card` (
  `id_card` varchar(64) NOT NULL,
  `saldo` int(11) NOT NULL,
  `asal_tol` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`id_card`, `saldo`, `asal_tol`) VALUES
('0001330098', 1560000, NULL),
('1991', 22000, '1007'),
('30281736', 400000, NULL),
('4321', 4000, NULL),
('75312', 242500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE IF NOT EXISTS `tbl_petugas` (
  `id_petugas` varchar(64) NOT NULL,
  `username_petugas` varchar(64) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `status` varchar(7) NOT NULL,
  `kode_penempatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username_petugas`, `nama_petugas`, `tgl_lahir`, `jenis_kelamin`, `email`, `password`, `alamat`, `no_telp`, `status`, `kode_penempatan`) VALUES
('1001', 'admin01', 'Abdullah Rohim Al-Kareem', '19-09-2060', 'Laki-laki', 'ujmark@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Jakarta Timur', '081802346592', 'Petugas', '1007'),
('1002', 'admin02', 'Rizal Mubarok', '1999-02-17', 'Laki-laki', 'bujang@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Bandung Barat', '0818382488312', 'Petugas', '1006'),
('1003', 'admin03', 'Muhammad Ghazy', '20-01-2040', 'Laki-laki', 'adminfx@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Jakarta', '089391923994', 'Petugas', '1002'),
('1004', 'admin04', 'Joni Zul', '22-02-1988', 'Laki-laki', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Jepara', '089231233333', 'Petugas', '1002'),
('1005', 'admin05', 'Firgi Adriansyah', '09-09-1999', 'Laki-laki', 'firgi@gmial.com', '21232f297a57a5a743894a0e4a801fc3', 'Bandung', '081882883182', 'Petugas', '1006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruas_tol`
--

CREATE TABLE IF NOT EXISTS `tbl_ruas_tol` (
  `id_ruas` varchar(64) NOT NULL,
  `nama_ruas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruas_tol`
--

INSERT INTO `tbl_ruas_tol` (`id_ruas`, `nama_ruas`) VALUES
('101', 'Kanci - Pejagan'),
('102', 'Cikampek-Purwakarta-Padalarang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tarif`
--

CREATE TABLE IF NOT EXISTS `tbl_tarif` (
  `id_tarif` varchar(64) NOT NULL,
  `id_ruas` varchar(64) NOT NULL,
  `masuk` varchar(64) NOT NULL,
  `keluar` varchar(64) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tarif`
--

INSERT INTO `tbl_tarif` (`id_tarif`, `id_ruas`, `masuk`, `keluar`, `tarif`) VALUES
('100001', '102', 'SS Padalarang', 'Jatiluhur', 27000),
('100002', '102', 'SS Padalarang', 'Cikamuning', 3500),
('100003', '102', 'SS Padalarang', 'Sadang', 32500),
('100004', '102', 'SS Padalarang', 'SS Dawuan', 39500),
('100005', '102', 'Jatiluhur', 'SS Dawuan', 13000),
('100006', '102', 'Jatiluhur', 'Sadang', 6000),
('100007', '102', 'Jatiluhur', 'SS Padalarang', 27000),
('100008', '102', 'Sadang', 'Dawuan', 7000),
('100009', '102', 'Sadang', 'Jatiluhur', 6000),
('100010', '102', 'Sadang', 'SS Padalarang', 32500),
('100011', '102', 'SS Dawuan', 'Sadang', 7000),
('100012', '102', 'SS Dawuan', 'Jatiluhur', 13500),
('100013', '102', 'SS Dawuan', 'SS Padalarang', 39500),
('100014', '101', 'Kanci', 'Ciledug', 15500),
('100015', '101', 'Kanci', 'Pejagan', 29000),
('100016', '102', 'Ciledug', 'Pejagan', 13500),
('100018', '102', 'SS Dawuan', 'SS Padalarang', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` varchar(64) NOT NULL,
  `id_card` varchar(64) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_bayar` varchar(11) NOT NULL,
  `waktu` time NOT NULL,
  `id_ruas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_card`, `total`, `tanggal_bayar`, `waktu`, `id_ruas`) VALUES
('102019110000001', '4321', 13000, '22-04-2019', '01:42:15', '102'),
('102019110000002', '0001330098', 6000, '22-04-2019', '08:52:38', '102'),
('102019110000003', '4321', 6000, '23-04-2019', '20:28:59', '102'),
('102019110000004', '0001330098', 27000, '23-04-2019', '20:57:15', '102'),
('102019110000005', '0001330098', 27000, '23-04-2019', '20:57:35', '102'),
('102019110000006', '0001330098', 27000, '23-04-2019', '20:57:51', '102'),
('102019110000007', '0001330098', 13000, '23-04-2019', '21:05:49', '102'),
('102019110000008', '4321', 27000, '25-04-2019', '21:46:12', '102'),
('102019110000009', '0001330098', 27000, '29-04-2019', '15:58:17', '102'),
('102019110000010', '0001330098', 13000, '29-04-2019', '15:59:02', '102');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
 ADD PRIMARY KEY (`kode_penempatan`), ADD KEY `id_tol` (`id_tol`);

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
 ADD PRIMARY KEY (`id_card`), ADD KEY `asal_tol` (`asal_tol`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
 ADD PRIMARY KEY (`id_petugas`), ADD KEY `kode_penempatan` (`kode_penempatan`);

--
-- Indexes for table `tbl_ruas_tol`
--
ALTER TABLE `tbl_ruas_tol`
 ADD PRIMARY KEY (`id_ruas`);

--
-- Indexes for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
 ADD PRIMARY KEY (`id_tarif`), ADD KEY `id_ruas` (`id_ruas`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_card` (`id_card`), ADD KEY `id_ruas` (`id_ruas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
ADD CONSTRAINT `tbl_cabang_ibfk_1` FOREIGN KEY (`id_tol`) REFERENCES `tbl_ruas_tol` (`id_ruas`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_card`
--
ALTER TABLE `tbl_card`
ADD CONSTRAINT `tbl_card_ibfk_1` FOREIGN KEY (`asal_tol`) REFERENCES `tbl_cabang` (`kode_penempatan`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
ADD CONSTRAINT `tbl_petugas_ibfk_1` FOREIGN KEY (`kode_penempatan`) REFERENCES `tbl_cabang` (`kode_penempatan`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
ADD CONSTRAINT `tbl_tarif_ibfk_1` FOREIGN KEY (`id_ruas`) REFERENCES `tbl_ruas_tol` (`id_ruas`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `tbl_card` (`id_card`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_ruas`) REFERENCES `tbl_ruas_tol` (`id_ruas`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
