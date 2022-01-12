-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2022 pada 16.07
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(250) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nama_akun` varchar(250) DEFAULT NULL,
  `sa` double NOT NULL DEFAULT 0,
  `saldo_normal` enum('d','k') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `kategori`, `nama_akun`, `sa`, `saldo_normal`) VALUES
('111', 'Aktiva', 'Kas', 0, 'd'),
('113', 'Aktiva', 'Persediaan Barang Dagang', 0, 'd'),
('411', 'Pendapatan', 'Penjualan', 0, 'k'),
('511', 'Beban', 'Harga Pokok Penjualan', 0, 'd'),
('512', 'Beban', 'Beban Listrik', 0, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_telp`, `alamat`, `email`) VALUES
('CST-001', 'Tes Customer', '0812235541122', 'Bandung', 'bayuap96@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
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
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `id_supplier`, `harga_satuan`, `jumlah_beli`, `id_stok`) VALUES
(53, 'PMB-001', 'PRD-001', 'SUP-001', 150000, 2, ''),
(54, 'PMB-001', 'PRD-008', 'SUP-001', 350000, 1, ''),
(55, 'PMB-002', 'PRD-006', 'SUP-001', 300000, 10, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
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
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_produk`, `id_customer`, `jumlah_jual`, `hpp`, `harga_satuan`, `id_stok`) VALUES
(103, 'PNJ-001', 'PRD-005', 'CST-001', 1, 110000, 100000, ''),
(104, 'PNJ-001', 'PRD-006', 'CST-001', 1, 330000, 300000, ''),
(105, 'PNJ-002', 'PRD-001', '24', 1, 165000, 150000, '');

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_detail_penjualan` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
	DELETE FROM kartu_stok WHERE id_stok = OLD.id_stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` varchar(16) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nominal` double NOT NULL,
  `posisi` char(1) NOT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  `reff` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `transaksi` varchar(256) NOT NULL,
  `id_transaksi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `tanggal`, `id_akun`, `nominal`, `posisi`, `debet`, `kredit`, `reff`, `transaksi`, `id_transaksi`) VALUES
('id-1', '2021-11-24', 111, 5000, 'd', 5000, 0, NULL, '', ''),
('JR-001', '2022-01-03', 113, 450000, 'd', 450000, 0, 'PMB-004', 'Pembelian', ''),
('JR-002', '2022-01-03', 111, 450000, 'k', 0, 450000, 'PMB-004', 'Pembelian', ''),
('JR-003', '2022-01-03', 111, 400000, 'd', 400000, 0, 'PNJ-008', 'Penjualan', ''),
('JR-004', '2022-01-03', 411, 400000, 'k', 0, 400000, 'PNJ-008', 'Penjualan', ''),
('JR-005', '2022-01-03', 511, 440000, 'd', 440000, 0, 'PNJ-008', 'Penjualan', ''),
('JR-006', '2022-01-03', 113, 440000, 'k', 0, 440000, 'PNJ-008', 'Penjualan', ''),
('JR-007', '2022-01-03', 113, 650000, 'd', 650000, 0, 'PMB-001', 'Pembelian', ''),
('JR-008', '2022-01-03', 111, 650000, 'k', 0, 650000, 'PMB-001', 'Pembelian', ''),
('JR-009', '2022-01-03', 111, 400000, 'd', 400000, 0, 'PNJ-001', 'Penjualan', ''),
('JR-010', '2022-01-03', 411, 400000, 'k', 0, 400000, 'PNJ-001', 'Penjualan', ''),
('JR-011', '2022-01-03', 511, 440000, 'd', 440000, 0, 'PNJ-001', 'Penjualan', ''),
('JR-012', '2022-01-03', 113, 440000, 'k', 0, 440000, 'PNJ-001', 'Penjualan', ''),
('JR-013', '2022-01-07', 113, 3000000, 'd', 3000000, 0, 'PMB-002', 'Pembelian', ''),
('JR-014', '2022-01-07', 111, 3000000, 'k', 0, 3000000, 'PMB-002', 'Pembelian', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
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
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1636530322, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `id_supplier` varchar(20) NOT NULL DEFAULT '',
  `tanggal_pembelian` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `tanggal_pembelian`, `status`, `id_transaksi`) VALUES
('PMB-001', 'SUP-001', '2022-01-03', 'LUNAS', 1),
('PMB-002', 'SUP-001', '2022-01-07', 'LUNAS', 4);

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `after_delete_pembelian` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
	DELETE FROM jurnal WHERE id_transaksi = OLD.id_transaksi;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bef_insert_pembelian` BEFORE INSERT ON `pembelian` FOR EACH ROW BEGIN
	DECLARE id_trans integer;
	
	SELECT IFNULL(MAX(id_transaksi),0)+1 INTO id_trans 
	FROM
	(
		SELECT id_transaksi 
		FROM pembelian
		UNION
		SELECT id_transaksi 
		FROM penjualan
		ORDER BY 1
	) TBL;	
	SET NEW.id_transaksi = id_trans ;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_customer`, `tanggal_penjualan`, `status`, `id_transaksi`) VALUES
('PNJ-001', 'CST-001', '2022-01-03', '-', 2),
('PNJ-002', '24', '2022-01-03', 'Cart', 3);

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
	DELETE FROM jurnal WHERE id_transaksi = OLD.id_transaksi;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bef_insert_penjualan` BEFORE INSERT ON `penjualan` FOR EACH ROW BEGIN
	DECLARE id_trans integer;
	
	SELECT IFNULL(MAX(id_transaksi),0)+1 INTO id_trans 
	FROM
	(
		SELECT id_transaksi 
		FROM pembelian
		UNION
		SELECT id_transaksi 
		FROM penjualan
		ORDER BY 1
	) TBL;	
	SET NEW.id_transaksi = id_trans ;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga`, `deskripsi`, `product_image`, `stok`) VALUES
('PRD-001', 'Mukena Chiffon Plisket 4in1', 'Mukena', 150000, 'Mukena ini sangat nyaman, enak dipakai saat malam maupun siang hari. Beraktifitas pun menjadi lancar tanpa hambatan. Bagi kalian yang penasaran dengan mukena ini silahkan diorder ya kak.', 'Mukena Chiffon Plisket 4in1.jpg', 50),
('PRD-002', 'Lanyard  Id Card Coach Signature Original', 'Lanyard', 75000, '', 'Lanyard  Id Card Coach Signature Original.jpg', 50),
('PRD-003', 'Lanyard Id Card Coach Motif Original', 'Lanyard', 75000, '', 'Lanyard Id Card Coach Motif Original.jpg', 50),
('PRD-004', 'Mukena Payet Swarovski', 'Mukena', 150000, '', 'Mukena Payet Swarovski.jpg', 50),
('PRD-005', 'Original Dompet Coach Bifold Wallet Signature', 'Dompet', 100000, '', 'Original Dompet Coach Bifold Wallet Signature.jpg', 50),
('PRD-006', 'Original Tas Kate Spade Bay Street Medium Oden', 'Tas', 300000, '', 'Original Tas Kate Spade Bay Street Medium Oden.jpg', 50),
('PRD-007', 'Tas Coach Georgie Saddle Bag with Quilting', 'Tas', 300000, '', 'Tas Coach Georgie Saddle Bag with Quilting.jpg', 50),
('PRD-008', 'Tas Coach Medium Charlie Backpack with Star Patchework', 'Tas', 350000, '', 'Tas Coach Medium Charlie Backpack with Star Patchework.jpg', 50),
('PRD-009', 'Tas Kate Spade Jae Grade Medium Satchel', 'Tas', 250000, '', 'Tas Kate Spade Jae Grade Medium Satchel.jpg', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(64) NOT NULL,
  `nama_supplier` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('SUP-001', 'Tes Supplier', 'Bandung', '081226384640');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `kelompok` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `act_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `kelompok`, `image`, `act_time`) VALUES
(2, 'admin', 'admin', 'admin', 'Admin', 'image.png', '0000-00-00 00:00:00'),
(10, 'pemilik', 'pemilik', 'pemilik', 'Pemilik', 'image.png', '2020-12-23 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`) USING BTREE,
  ADD KEY `no_faktur_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_produk_detail` (`id_produk`),
  ADD KEY `id_penjualan_detail` (`id_penjualan`),
  ADD KEY `id_stok_penjualan` (`id_stok`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
