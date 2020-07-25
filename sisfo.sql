-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 09:21 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `akun_customer`
--

CREATE TABLE `akun_customer` (
  `id_akun_customer` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `no_hp_customer` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_customer`
--

INSERT INTO `akun_customer` (`id_akun_customer`, `username`, `password`, `no_hp_customer`) VALUES
(1, 'dapid11', '12345', '082134134312'),
(2, 'dilan', '12345', '0881242342314');

-- --------------------------------------------------------

--
-- Table structure for table `akun_kasir`
--

CREATE TABLE `akun_kasir` (
  `id_akun_kasir` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_kasir`
--

INSERT INTO `akun_kasir` (`id_akun_kasir`, `password`) VALUES
(1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_order`, `id_menu`, `qty`, `total_harga`) VALUES
(1, 1, 1, 10000),
(1, 2, 1, 8000),
(2, 2, 1, 8000),
(2, 3, 1, 11000),
(2, 4, 1, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `log_saldo`
--

CREATE TABLE `log_saldo` (
  `id_log_saldo` int(11) NOT NULL,
  `id_saldo` int(11) NOT NULL,
  `id_transaksi_order` int(11) NOT NULL,
  `tipe_log_saldo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_tenant` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_tenant`, `nama_menu`, `harga`) VALUES
(1, 1, 'sate', 10000),
(2, 2, 'jus mangga', 8000),
(3, 1, 'baso', 11000),
(4, 2, 'jus alpukat', 9000),
(5, 1, 'nasi goreng', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `menu_saldo`
--

CREATE TABLE `menu_saldo` (
  `id_menu_saldo` int(11) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL,
  `harga_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_saldo`
--

INSERT INTO `menu_saldo` (`id_menu_saldo`, `jumlah_saldo`, `harga_saldo`) VALUES
(1, 5000, 5000),
(2, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `order_cust`
--

CREATE TABLE `order_cust` (
  `id_order` int(11) NOT NULL,
  `id_akun_customer` int(11) NOT NULL,
  `status_order` varchar(15) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_cust`
--

INSERT INTO `order_cust` (`id_order`, `id_akun_customer`, `status_order`, `catatan`) VALUES
(1, 1, 'diproses', 'tidak pake kol'),
(2, 2, 'diproses', 'mana wae ah');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_transaksi_order` int(11) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `pendapatan_total` int(11) NOT NULL,
  `persen_potongan` float NOT NULL,
  `bersih_tenant` float NOT NULL,
  `bersih_pengelola` float NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `id_tenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `id_transaksi_order`, `tgl_rekap`, `pendapatan_total`, `persen_potongan`, `bersih_tenant`, `bersih_pengelola`, `waktu_transaksi`, `id_tenant`) VALUES
(197, 2, '2019-12-05', 17000, 0.15, 14450, 2550, '2019-05-10', 2),
(198, 2, '2019-12-05', 11000, 0.15, 9350, 1650, '2019-05-10', 1),
(199, 1, '2019-12-05', 10000, 0.15, 8500, 1500, '2019-05-11', 1),
(200, 1, '2019-12-05', 8000, 0.15, 6800, 1200, '2019-05-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_akun_customer` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_akun_customer`, `saldo`) VALUES
(1, 1, 20000),
(2, 2, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id_tenant` int(11) NOT NULL,
  `nama_tenant` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kategori_tenant` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id_tenant`, `nama_tenant`, `no_hp`, `kategori_tenant`) VALUES
(1, 'Udin', '084424324234', 'makanan'),
(2, 'Deska', '082134323123', 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_order`
--

CREATE TABLE `transaksi_order` (
  `id_transaksi_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_akun_customer` int(11) NOT NULL,
  `metode_transaksi_order` varchar(10) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `status_transaksi` varchar(30) NOT NULL,
  `waktu_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_order`
--

INSERT INTO `transaksi_order` (`id_transaksi_order`, `id_order`, `id_akun_customer`, `metode_transaksi_order`, `total_transaksi`, `status_transaksi`, `waktu_transaksi`) VALUES
(1, 1, 1, 'non-tunai', 18000, 'lunas', '2019-05-11'),
(2, 2, 2, 'tunai', 28000, 'lunas', '2019-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_topup`
--

CREATE TABLE `transaksi_topup` (
  `id_topup` int(11) NOT NULL,
  `id_saldo` int(11) NOT NULL,
  `id_menu_saldo` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_topup`
--

INSERT INTO `transaksi_topup` (`id_topup`, `id_saldo`, `id_menu_saldo`, `tanggal`) VALUES
(1, 1, 1, '2019-04-03'),
(2, 1, 2, '2019-04-03'),
(7, 2, 1, '2019-04-24'),
(8, 2, 2, '2019-04-24'),
(9, 1, 2, '2019-04-24'),
(10, 2, 1, '2019-04-24'),
(11, 1, 2, '2019-04-24'),
(12, 2, 1, '2019-04-24'),
(13, 1, 2, '2019-04-24'),
(14, 2, 1, '2019-04-24'),
(15, 1, 2, '2019-04-24'),
(16, 2, 1, '2019-04-25'),
(17, 1, 1, '2019-04-25'),
(18, 2, 2, '2019-04-25'),
(19, 1, 1, '2019-04-25'),
(20, 2, 2, '2019-04-25'),
(21, 1, 2, '2019-04-25'),
(22, 2, 2, '2019-04-25'),
(23, 2, 2, '2019-04-25'),
(24, 2, 2, '2019-04-25'),
(25, 2, 2, '2019-04-25'),
(26, 1, 2, '2019-04-25'),
(27, 1, 2, '2019-04-25'),
(28, 2, 2, '2019-04-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_customer`
--
ALTER TABLE `akun_customer`
  ADD PRIMARY KEY (`id_akun_customer`);

--
-- Indexes for table `akun_kasir`
--
ALTER TABLE `akun_kasir`
  ADD PRIMARY KEY (`id_akun_kasir`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `log_saldo`
--
ALTER TABLE `log_saldo`
  ADD PRIMARY KEY (`id_log_saldo`),
  ADD KEY `id_saldo` (`id_saldo`),
  ADD KEY `id_transaksi_order` (`id_transaksi_order`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_tenant` (`id_tenant`);

--
-- Indexes for table `menu_saldo`
--
ALTER TABLE `menu_saldo`
  ADD PRIMARY KEY (`id_menu_saldo`);

--
-- Indexes for table `order_cust`
--
ALTER TABLE `order_cust`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_akun_customer` (`id_akun_customer`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_transaksi_order` (`id_transaksi_order`),
  ADD KEY `id_tenant` (`id_tenant`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_akun_customer` (`id_akun_customer`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id_tenant`);

--
-- Indexes for table `transaksi_order`
--
ALTER TABLE `transaksi_order`
  ADD PRIMARY KEY (`id_transaksi_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_akun_customer` (`id_akun_customer`);

--
-- Indexes for table `transaksi_topup`
--
ALTER TABLE `transaksi_topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_saldo` (`id_saldo`),
  ADD KEY `id_menu_saldo` (`id_menu_saldo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_customer`
--
ALTER TABLE `akun_customer`
  MODIFY `id_akun_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akun_kasir`
--
ALTER TABLE `akun_kasir`
  MODIFY `id_akun_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_saldo`
--
ALTER TABLE `log_saldo`
  MODIFY `id_log_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_saldo`
--
ALTER TABLE `menu_saldo`
  MODIFY `id_menu_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_cust`
--
ALTER TABLE `order_cust`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id_tenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_order`
--
ALTER TABLE `transaksi_order`
  MODIFY `id_transaksi_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_topup`
--
ALTER TABLE `transaksi_topup`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_cust` (`id_order`);

--
-- Constraints for table `log_saldo`
--
ALTER TABLE `log_saldo`
  ADD CONSTRAINT `log_saldo_ibfk_1` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`),
  ADD CONSTRAINT `log_saldo_ibfk_2` FOREIGN KEY (`id_transaksi_order`) REFERENCES `transaksi_order` (`id_transaksi_order`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_tenant`) REFERENCES `tenant` (`id_tenant`);

--
-- Constraints for table `order_cust`
--
ALTER TABLE `order_cust`
  ADD CONSTRAINT `order_cust_ibfk_1` FOREIGN KEY (`id_akun_customer`) REFERENCES `akun_customer` (`id_akun_customer`);

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_ibfk_1` FOREIGN KEY (`id_transaksi_order`) REFERENCES `transaksi_order` (`id_transaksi_order`),
  ADD CONSTRAINT `rekap_ibfk_2` FOREIGN KEY (`id_tenant`) REFERENCES `tenant` (`id_tenant`);

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `saldo_ibfk_1` FOREIGN KEY (`id_akun_customer`) REFERENCES `akun_customer` (`id_akun_customer`);

--
-- Constraints for table `transaksi_order`
--
ALTER TABLE `transaksi_order`
  ADD CONSTRAINT `transaksi_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_cust` (`id_order`);

--
-- Constraints for table `transaksi_topup`
--
ALTER TABLE `transaksi_topup`
  ADD CONSTRAINT `transaksi_topup_ibfk_1` FOREIGN KEY (`id_menu_saldo`) REFERENCES `menu_saldo` (`id_menu_saldo`),
  ADD CONSTRAINT `transaksi_topup_ibfk_2` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
