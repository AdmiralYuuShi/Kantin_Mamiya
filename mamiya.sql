-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 08:32 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamiya`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga_jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_detail_order` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `jumlah`, `harga_jumlah`, `keterangan`, `status_detail_order`) VALUES
(63, 29, 1, 5, 30000, '', 'Memesan'),
(64, 29, 10, 9, 90000, '', 'Memesan'),
(65, 29, 5, 1, 10000, '', 'Memesan'),
(66, 29, 3, 15, 75000, '', 'Memesan'),
(69, 30, 1, 6, 36000, '', 'Memesan'),
(70, 30, 10, 9, 90000, '', 'Memesan'),
(71, 30, 10, 9, 90000, '', 'Memesan'),
(74, 31, 3, 5, 25000, '', 'Memesan'),
(77, 31, 10, 3, 30000, '', 'Memesan'),
(78, 31, 5, 15, 150000, '', 'Memesan'),
(79, 32, 1, 5, 30000, '', 'Memesan'),
(80, 32, 10, 6, 60000, '', 'Memesan'),
(81, 35, 1, 6, 36000, '', 'Memesan'),
(82, 35, 10, 5, 50000, '', 'Memesan'),
(84, 35, 3, 15, 75000, '', 'Memesan'),
(85, 36, 1, 4, 24000, 'Gk pake nasi', 'Memesan'),
(86, 36, 10, 8, 80000, 'Pake telor yang pedes', 'Memesan'),
(87, 36, 3, 12, 60000, 'Yang 2 gk pake es', 'Memesan'),
(88, 37, 1, 12, 72000, 'Gk pake nasi', 'Memesan'),
(89, 37, 10, 8, 80000, 'Pake telor yang pedes', 'Memesan'),
(90, 37, 3, 20, 100000, 'Yang 2 gk pake es', 'Memesan'),
(91, 38, 1, 20, 120000, 'Gk pake nasi', 'Memesan'),
(92, 38, 10, 4, 40000, 'Pake telor yang pedes', 'Memesan'),
(93, 38, 3, 24, 120000, 'Yang 2 gk pake es', 'Memesan'),
(94, 39, 1, 20, 120000, 'Gk pake nasi', 'Memesan'),
(95, 39, 5, 25, 250000, 'Jangan terlalu manis', 'Memesan'),
(96, 39, 10, 12, 120000, 'Pake telor yang pedes', 'Memesan'),
(97, 39, 3, 55, 275000, 'Yang 2 gk pake es', 'Memesan'),
(98, 40, 1, 55, 330000, 'Gk pake nasi', 'Memesan'),
(99, 40, 10, 125, 1250000, 'Pake telor yang pedes', 'Memesan'),
(100, 40, 5, 12, 120000, 'Gk pake nasi', 'Memesan'),
(101, 40, 3, 125, 625000, 'Yang 2 gk pake es', 'Memesan');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'pelanggan'),
(2, 'owner'),
(3, 'kasir'),
(4, 'waiter'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(50) NOT NULL,
  `harga` int(16) NOT NULL,
  `status_masakan` varchar(16) NOT NULL,
  `type` varchar(16) NOT NULL,
  `jumlah_dipesan` int(11) NOT NULL DEFAULT '0',
  `gambar` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`, `type`, `jumlah_dipesan`, `gambar`) VALUES
(1, 'Onigiri', 6000, 'Tersedia', 'Utama', 0, 'default.png'),
(2, 'Onigiri Spesial', 10000, 'Habis', 'Utama', 0, 'default.png'),
(3, 'Es Teh Panas', 5000, 'Tersedia', 'Minuman', 0, 'default.png'),
(4, 'Bauxit Bakar', 25000, 'Habis', 'Utama', 0, 'default.png'),
(5, 'Parfait', 10000, 'Tersedia', 'Penutup', 0, 'default.png'),
(10, 'Indomie', 10000, 'Tersedia', 'Utama', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_masakan`
--

CREATE TABLE `order_masakan` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_order` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_masakan`
--

INSERT INTO `order_masakan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `total_harga`, `keterangan`, `status_order`) VALUES
(20, 12, '2019-03-08', 3, 0, '', 'Belum Memesan'),
(21, 12, '2019-03-08', 3, 0, '', 'Belum Memesan'),
(22, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(23, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(24, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(25, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(26, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(27, 12, '2019-03-09', 3, 0, '', 'Belum Memesan'),
(28, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(29, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(30, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(31, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(32, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(33, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(34, 12, '2019-03-10', 3, 0, '', 'Belum Memesan'),
(35, 12, '2019-03-11', 3, 0, '', 'Belum Memesan'),
(36, 12, '2019-03-29', 3, 164000, '', 'Pesanan Selesai'),
(37, 12, '2019-03-29', 3, 252000, '', 'Pesanan Selesai'),
(38, 12, '2019-03-30', 3, 280000, '', 'Pesanan Selesai'),
(39, 0, '2019-03-30', 3, 765000, '', 'Pesanan Selesai'),
(40, 12, '2019-03-30', 3, 2325000, '', 'Pesanan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `uang_masuk` int(11) NOT NULL,
  `uang_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`, `uang_masuk`, `uang_kembali`) VALUES
(8, 3, 40, '2019-03-30', 2325000, 3000000, 675000),
(9, 3, 36, '2019-03-30', 164000, 200000, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `id_level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_level`) VALUES
(2, 'Hapid Moch Jamil', 'ADM_Hapid', '123', 5),
(3, 'Shigure', 'WTR_Shigure', '123', 4),
(4, 'Murasame', 'KSR_Murasame', '123', 3),
(37, 'Shiratsuyu', 'OWN_Shiratsuyu', '123', 2),
(39, 'Akagi', 'USR_Akagi', '123', 1),
(40, 'aaaa', 'aaaa', 'aaaa', 1),
(41, 'aaaa', 'aaaa', 'aaaa', 1),
(42, 'aaaa', 'aaaa', 'aaaaa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `order_masakan`
--
ALTER TABLE `order_masakan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_masakan`
--
ALTER TABLE `order_masakan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_masakan` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_masakan`
--
ALTER TABLE `order_masakan`
  ADD CONSTRAINT `order_masakan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
