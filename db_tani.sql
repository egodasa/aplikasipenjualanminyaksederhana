-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `beli_tmp`;
CREATE TABLE `beli_tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jenis_produk`;
CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_produk` int(11) NOT NULL DEFAULT '1',
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `add_produksi_awal` AFTER INSERT ON `produk` FOR EACH ROW
insert into produksi (id_produk, jumlah) values(new.id_produk, new.stok);;

DELIMITER ;

DROP TABLE IF EXISTS `produksi`;
CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status_user` int(11) NOT NULL DEFAULT '1',
  `jenis_user` enum('admin','pimpinan','karyawan','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `status_user`, `jenis_user`) VALUES
(19,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin',	1,	'admin'),
(20,	'karyawan',	'9e014682c94e0f2cc834bf7348bda428',	'karyawan',	1,	'karyawan'),
(21,	'pimpinan',	'90973652b88fe07d05a4304f0a945de8',	'pimpinan',	1,	'pimpinan')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `password` = VALUES(`password`), `nama` = VALUES(`nama`), `status_user` = VALUES(`status_user`), `jenis_user` = VALUES(`jenis_user`);

-- 2018-07-03 07:57:03
