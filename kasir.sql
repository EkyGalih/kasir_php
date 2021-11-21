-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 05:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `hardisk` varchar(45) NOT NULL,
  `memory` varchar(45) NOT NULL,
  `processor` varchar(45) NOT NULL,
  `warna` varchar(45) NOT NULL,
  `kelengkapan` varchar(100) NOT NULL,
  `stok` varchar(45) DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `hardisk`, `memory`, `processor`, `warna`, `kelengkapan`, `stok`, `harga_jual`, `suplier_id`) VALUES
(2, 'Asus A455L', '800 Mega', '4 GB', 'Amd Radeon A10', 'hitam', 'charger, tas, kipas pendingin', '17', 1500000, 1),
(3, 'Acer Mini', '1 TB', '4 GB', 'Intel Core i5', 'Silver', 'Charger, headset, tas, kipas pendingin', '14', 4000000, 2),
(4, 'Lenovo corp', '500 GB', '2 GB', 'Intel pentium 4', 'Blue', 'Tas ransel, kipas pendingin', '16', 1000000, 3),
(5, 'Hp-mini 4100', '2 TB', '8 GB', 'Intel core i7', 'putih', 'tas ransel, kipas pendingin', '19', 70000000, 4),
(6, 'Asus A893L', '1,5 TB', '4 GB', 'Intel core i3', 'silver', 'charger, tas', '10', 3500000, 1),
(7, 'Acer Ox-2t4', '1,5 TB', '4 GB', 'amd radeon a8', 'biru', 'charger, tas, kipas pendingin', '10', 4500000, 2),
(8, 'Lenovo AS776', '1 TB', '4 GB', 'intel core i5', 'hitam', 'tas ransel, kipas pendingin, charger', '10', 3000000, 3),
(9, 'Hp 1772', '2 TB', '4 GB', 'intel core i3, Gforce9', 'putih', 'tas ransel, kipas pendingin, charger', '10', 5000000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bayar_cicilan`
--

CREATE TABLE `bayar_cicilan` (
  `ID` int(11) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `kode_kredit` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `sisa_bayar` int(11) DEFAULT NULL,
  `cicilan_ke` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `kredit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bayar_cicilan`
--

INSERT INTO `bayar_cicilan` (`ID`, `tanggal_bayar`, `kode_kredit`, `jumlah`, `sisa_bayar`, `cicilan_ke`, `keterangan`, `kredit_id`) VALUES
(4, '2017-05-26', 'KR01', 1000000, 10000000, 1, 'Cicilan Belum Lunas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pemb` int(11) NOT NULL,
  `jenis_barang` varchar(45) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `stok` varchar(45) DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pemb`, `jenis_barang`, `harga_beli`, `stok`, `harga_jual`, `total`, `nama_barang`, `tgl_pembelian`, `barang_id`) VALUES
(1, 'Laptop', 1500000, '4', 1600000, '6000000', '2', '0000-00-00', 2);

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `tr1` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
 update barang set stok=(stok+New.stok) WHERE id=(New.barang_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_cash`
--

CREATE TABLE `penjualan_cash` (
  `id_cash` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `nama_pembeli` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_hp` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jumlah_pembelian` varchar(45) DEFAULT NULL,
  `harga_satuan` varchar(45) DEFAULT NULL,
  `diskon` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `jml_uang_pemb` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_cash`
--

INSERT INTO `penjualan_cash` (`id_cash`, `nama_barang`, `nama_pembeli`, `alamat`, `no_hp`, `email`, `jumlah_pembelian`, `harga_satuan`, `diskon`, `pajak`, `jml_uang_pemb`, `kembalian`, `total`, `barang_id`) VALUES
(1, '2', 'Diaz Guntur', 'Dasan Agung', 2147483647, 'svru.kratos', '1', '4000000', 0, 10, 0, 0, '4000000', 2),
(2, '4', 'iwan sumantri, M.kom, ccna', 'jl. ismail marzuki no.12, mataram', 877654313, 'teresiafindi@yahoo.com', '2', '70000000', 0, 10, 140000000, 0, '140000000', 4);

--
-- Triggers `penjualan_cash`
--
DELIMITER $$
CREATE TRIGGER `tr2` AFTER INSERT ON `penjualan_cash` FOR EACH ROW BEGIN
 update barang set stok=(stok-New.jumlah_pembelian) WHERE id=(New.barang_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_kredit`
--

CREATE TABLE `penjualan_kredit` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `nama_pembeli` varchar(45) DEFAULT NULL,
  `alamat` text,
  `no_hp` int(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jumlah_pembelian` varchar(45) DEFAULT NULL,
  `harga_satuan` varchar(45) DEFAULT NULL,
  `uang_muka` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_kredit`
--

INSERT INTO `penjualan_kredit` (`id`, `nama_barang`, `nama_pembeli`, `alamat`, `no_hp`, `email`, `jumlah_pembelian`, `harga_satuan`, `uang_muka`, `total`, `barang_id`) VALUES
(2, '2', 'Eky Galih Gunanda', 'Gebang Baru, Mataram', 2147483647, 'ekkygalih8@gmail.com', '3', '4000000', 1000000, '11000000', 2),
(3, '2', 'Eky Galih Gunanda', 'Gebang Baru, Mataram', 2147483647, 'ekkygalih8@gmail.com', '3', '4000000', 1000000, '11000000', 2);

--
-- Triggers `penjualan_kredit`
--
DELIMITER $$
CREATE TRIGGER `tr3` AFTER INSERT ON `penjualan_kredit` FOR EACH ROW BEGIN
 update barang set stok=(stok-New.jumlah_pembelian) WHERE id=(New.barang_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `ID` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`ID`, `nama`, `alamat`) VALUES
(1, 'Asus', 'goseng, Mataram'),
(2, 'Acer', 'new york, usa'),
(3, 'Lenovo', 'berlin, Germany'),
(4, 'Hp', 'Jakarta, Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_suplier1_idx` (`suplier_id`);

--
-- Indexes for table `bayar_cicilan`
--
ALTER TABLE `bayar_cicilan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_bayar_cicilan_penjualan_kredit_idx` (`kredit_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pemb`),
  ADD KEY `fk_pembelian_barang1_idx` (`barang_id`);

--
-- Indexes for table `penjualan_cash`
--
ALTER TABLE `penjualan_cash`
  ADD PRIMARY KEY (`id_cash`),
  ADD KEY `fk_penjualan_barang1_idx` (`barang_id`);

--
-- Indexes for table `penjualan_kredit`
--
ALTER TABLE `penjualan_kredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualan_barang1_idx` (`barang_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bayar_cicilan`
--
ALTER TABLE `bayar_cicilan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pemb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan_cash`
--
ALTER TABLE `penjualan_cash`
  MODIFY `id_cash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penjualan_kredit`
--
ALTER TABLE `penjualan_kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_suplier1` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bayar_cicilan`
--
ALTER TABLE `bayar_cicilan`
  ADD CONSTRAINT `fk_bayar_cicilan_penjualan_kredit` FOREIGN KEY (`kredit_id`) REFERENCES `penjualan_kredit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan_cash`
--
ALTER TABLE `penjualan_cash`
  ADD CONSTRAINT `fk_penjualan_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_kredit`
--
ALTER TABLE `penjualan_kredit`
  ADD CONSTRAINT `fk_penjualan_barang10` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
