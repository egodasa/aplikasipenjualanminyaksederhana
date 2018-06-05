-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jun 2018 pada 10.54
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_tmp`
--

CREATE TABLE `beli_tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli_tmp`
--

INSERT INTO `beli_tmp` (`id_tmp`, `id_transaksi`, `id_produk`, `jumlah_beli`) VALUES
(1, '15274556018530', 10, 10),
(2, '15280573397412', 10, 2),
(4, '15281857977392', 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `jumlah_beli`) VALUES
(1, '15271449501746', 4, 1),
(2, '15271449501746', 8, 1),
(3, '15271449975519', 8, 1),
(4, '15271450504036', 8, 1),
(5, '15271451435045', 7, 1),
(6, '15271451435045', 5, 1),
(7, '15271451623650', 4, 1),
(8, '15271467490901', 7, 1),
(9, '15271468954652', 5, 1),
(10, '15271469392688', 10, 1),
(11, '15271470120273', 10, 1),
(12, '15271470709018', 7, 1),
(13, '15276656011797', 7, 1),
(14, '15276656011797', 10, 1),
(15, '15280328713372', 10, 1),
(16, '15280328713372', 8, 1),
(17, '15281857720615', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `jenis`) VALUES
(5, 'minyak anu'),
(6, 'minyak atsiri'),
(7, 'minyak atsiri'),
(8, 'Minyak Nilam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_produk` int(11) NOT NULL DEFAULT '1',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_jenis_produk`, `stok`, `status_produk`, `harga`) VALUES
(3, 'aquaaaaaaaaaaaaaaa', 5, 0, 1, 99),
(4, 'minyak lemong grassssssssssssssss', 4, 1, 1, 100000),
(5, 'minyak cengkeh', 1, 6, 1, 15000),
(6, 'Minyak Nilam 10ml', 4, 0, 1, 0),
(7, 'Minyak Nilam 30ml', 4, 4, 1, 20000),
(8, 'minyak atsiri 60ml', 6, 4, 1, 50000),
(9, 'minyak cengkeh 10ml', 5, 1, 1, 20000),
(10, 'ayiaa', 6, 36, 1, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pemesan`, `tgl_pembelian`) VALUES
('15271470709018', 'dika', '2018-05-24 07:39:36'),
('15276656011797', 'awdad', '2018-05-30 07:33:52'),
('15280328713372', 'alex', '2018-06-03 13:35:04'),
('15281857720615', 'anu', '2018-06-05 08:03:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status_user` int(11) NOT NULL DEFAULT '1',
  `jenis_user` enum('admin','pimpinan','karyawan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `status_user`, `jenis_user`) VALUES
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 'admin'),
(20, 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan', 1, 'karyawan'),
(21, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan', 1, 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli_tmp`
--
ALTER TABLE `beli_tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli_tmp`
--
ALTER TABLE `beli_tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
