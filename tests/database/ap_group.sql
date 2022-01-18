-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ap_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_telp`, `alamat`, `email`) VALUES
('CST-001', 'Larasssss', '08561654654', 'Jln Telkom', 'laras@gmail.com'),
('CST-002', 'Dhimas', '081228551662', 'Jln Kav Geologi Ciganitri', 'arfiandimas1@gmail.com'),
('CST-003', 'asdasd', '0815454', 'asdasdasdasd', 'asd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` varchar(20) NOT NULL,
  `id_produk` varchar(20) DEFAULT NULL,
  `id_supplier` varchar(20) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `id_stok` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `id_supplier`, `harga_satuan`, `jumlah_beli`, `id_stok`) VALUES
(64, 'PMB-001', 'PRD-001', 'SUP-001', 35000, 20, ''),
(65, 'PMB-002', 'PRD-002', 'SUP-002', 40000, 50, ''),
(66, 'PMB-003', 'PRD-001', 'SUP-001', 35000, 20, ''),
(67, 'PMB-003', 'PRD-003', 'SUP-001', 50000, 50, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` varchar(30) DEFAULT NULL,
  `id_produk` varchar(20) DEFAULT NULL,
  `id_customer` varchar(20) NOT NULL,
  `jumlah_jual` int(11) DEFAULT NULL,
  `hpp` int(11) NOT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `id_stok` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_produk`, `id_customer`, `jumlah_jual`, `hpp`, `harga_satuan`, `id_stok`) VALUES
(112, 'PNJ-001', 'PRD-001', 'CST-002', 50, 38500, 35000, ''),
(113, 'PNJ-002', 'PRD-002', 'CST-001', 20, 44000, 40000, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1636530322, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `id_supplier` varchar(20) NOT NULL DEFAULT '',
  `tanggal_pembelian` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `tanggal_pembelian`, `status`, `id_transaksi`) VALUES
('PMB-001', 'SUP-001', '2022-01-18', 'Approve', 0),
('PMB-002', 'SUP-002', '2022-01-18', 'Butuh Approve', 0),
('PMB-003', 'SUP-001', '2022-01-18', 'Butuh Approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_customer`, `tanggal_penjualan`, `status`, `id_transaksi`) VALUES
('PNJ-001', 'CST-002', '2022-01-18', '-', 0),
('PNJ-002', 'CST-001', '2022-01-18', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(64) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `product_image` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga`, `deskripsi`, `product_image`, `stok`) VALUES
('PRD-001', 'Kaos 3 Second 1', 'Kaos', 35000, 'Kaos 3 Second Murah Meriah', '1.jpg', 5),
('PRD-002', 'Kaos 3 Second 2', 'Kaos', 40000, 'Kaos 3 Second Murah Meriah', '2.jpg', 30),
('PRD-003', 'Kaos 3 Second 3', 'Kaos', 50000, 'Kaos 3 Second Murah Meriah', '3_1.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(64) NOT NULL,
  `nama_supplier` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('SUP-001', 'CV. Duta Kaos', 'jln. kaos 3second', '0833251251'),
('SUP-002', 'CV. Kaos Murah', 'Jln. Murah Meriah', '081228551662');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `kelompok` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 0,
  `act_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `kelompok`, `image`, `aktif`, `act_time`) VALUES
(2, 'admin', 'admin', 'admin', 'Admin', 'admin.png', 1, '0000-00-00 00:00:00'),
(10, 'pemilik', 'pemilik', 'pemilik', 'Pemilik', 'pemilik.png', 1, '2020-12-23 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`) USING BTREE,
  ADD KEY `no_faktur_pembelian` (`id_pembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_produk_detail` (`id_produk`),
  ADD KEY `id_penjualan_detail` (`id_penjualan`),
  ADD KEY `id_stok_penjualan` (`id_stok`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
