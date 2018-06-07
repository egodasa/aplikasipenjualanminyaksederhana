
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
(17, '15281857720615', 10, 1),
(18, '15283560855128', 10, 2),
(19, '15283560855128', 8, 2),
(20, '15283625458115', 3, 1),
(21, '15283625637671', 3, 1),
(22, '15283625889768', 10, 10),
(23, '15283626524689', 10, 1);

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
(7, 'Minyak Nilam 30ml', 4, 1, 1, 20000),
(8, 'minyak atsiri 60ml', 6, 2, 1, 50000),
(9, 'minyak cengkeh 10ml', 5, 1, 1, 20000),
(10, 'ayiaa', 5, 90, 1, 100000);

--
-- Trigger `produk`
--
DELIMITER $$
CREATE TRIGGER `add_laporan_produksi` AFTER UPDATE ON `produk` FOR EACH ROW insert into produksi (id_produk, jumlah) values(old.id_produk, new.stok-old.stok)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_produk`, `jumlah`, `waktu`) VALUES
(1, 10, 16, '2018-06-07 07:35:52'),
(2, 3, 50, '2018-06-07 07:36:11'),
(3, 10, -10, '2018-06-07 08:48:42'),
(4, 3, -10, '2018-06-07 08:48:52'),
(5, 3, 10, '2018-06-07 08:48:57'),
(6, 3, -10, '2018-06-07 08:49:36'),
(7, 3, 10, '2018-06-07 08:49:55'),
(8, 10, -10, '2018-06-07 08:50:09'),
(9, 3, -10, '2018-06-07 08:50:13'),
(10, 3, -5, '2018-06-07 08:52:52'),
(11, 10, -5, '2018-06-07 08:53:01'),
(12, 3, -5, '2018-06-07 08:53:32'),
(13, 3, -5, '2018-06-07 08:58:18'),
(14, 3, -20, '2018-06-07 08:58:27'),
(15, 3, -2, '2018-06-07 09:01:49'),
(16, 3, -1, '2018-06-07 09:01:54'),
(17, 7, -1, '2018-06-07 09:02:05'),
(18, 7, -2, '2018-06-07 09:02:12'),
(19, 10, -2, '2018-06-07 09:05:05'),
(20, 10, -23, '2018-06-07 09:05:09'),
(21, 10, 100, '2018-06-07 09:06:16'),
(22, 10, -1, '2018-06-07 09:06:26'),
(23, 10, 1, '2018-06-07 09:08:05'),
(24, 10, 1, '2018-06-07 09:08:17'),
(25, 10, -10, '2018-06-07 09:08:30'),
(26, 10, 10, '2018-06-07 09:08:35'),
(27, 3, -2, '2018-06-07 09:08:48'),
(28, 3, 2, '2018-06-07 09:08:50'),
(29, 3, -2, '2018-06-07 09:08:58'),
(30, 4, -1, '2018-06-07 09:09:03'),
(31, 3, 2, '2018-06-07 09:09:05'),
(32, 4, 1, '2018-06-07 09:09:05'),
(33, 3, -1, '2018-06-07 09:09:16'),
(34, 3, -1, '2018-06-07 09:09:45'),
(35, 10, -10, '2018-06-07 09:10:31'),
(36, 10, -1, '2018-06-07 09:11:42');

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
('15281857720615', 'anu', '2018-06-05 08:03:11'),
('15283560855128', 'amaik', '2018-06-07 07:21:49'),
('15283625458115', 'sad', '2018-06-07 09:09:23'),
('15283625637671', 'sdsa', '2018-06-07 09:09:48'),
('15283625889768', 'dikaaaaa', '2018-06-07 09:10:52'),
('15283626524689', 'sasas', '2018-06-07 09:11:44');

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
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

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
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;
