-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2015 pada 16.34
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_tiket`
--

CREATE TABLE IF NOT EXISTS `harga_tiket` (
  `id_harga` int(11) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `harga` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_tiket`
--

INSERT INTO `harga_tiket` (`id_harga`, `asal`, `tujuan`, `harga`) VALUES
(1, 1, 2, '250000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE IF NOT EXISTS `stasiun` (
  `id_stasiun` int(11) NOT NULL,
  `nama_stasiun` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id_stasiun`, `nama_stasiun`) VALUES
(1, 'BANDUNG'),
(2, 'JAKARTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `stasiun_asal` int(11) NOT NULL,
  `stasiun_tujuan` int(11) NOT NULL,
  `tanggal_keberangkatan` date NOT NULL,
  `waktu_keberangkatan` int(11) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `verif` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_user`, `stasiun_asal`, `stasiun_tujuan`, `tanggal_keberangkatan`, `waktu_keberangkatan`, `harga_tiket`, `verif`) VALUES
(16, 5, 1, 2, '1995-03-12', 2, 1, 0),
(17, 5, 1, 2, '2015-12-10', 1, 1, 0),
(18, 5, 1, 2, '2015-12-31', 1, 1, 0),
(19, 9, 1, 2, '2015-08-29', 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `no_id` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `waktu_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `no_id`, `nama`, `mac_address`, `waktu_login`, `email`, `no_hp`, `alamat`, `password`) VALUES
(8, '-', 'Administrator', '-', '2015-08-20 09:01:38', 'admin@smartid.com', '-', '-', '21232f297a57a5a743894a0e4a801fc3'),
(9, '6305124119', 'Muhammad Salman', '20:54:76:F9:20:18', '2015-08-20 13:54:05', 'squhart@gmail.com', '085721489639', 'Garut', '1a2e9da658917c5abff3d683b2d02619');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_keberangkatan`
--

CREATE TABLE IF NOT EXISTS `waktu_keberangkatan` (
  `id_waktu` int(11) NOT NULL,
  `stasiun_asal` int(11) NOT NULL,
  `stasiun_tujuan` int(11) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_keberangkatan`
--

INSERT INTO `waktu_keberangkatan` (`id_waktu`, `stasiun_asal`, `stasiun_tujuan`, `waktu`) VALUES
(1, 1, 2, '05:00:00'),
(2, 1, 2, '08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_tiket`
--
ALTER TABLE `harga_tiket`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mac_address` (`mac_address`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `waktu_keberangkatan`
--
ALTER TABLE `waktu_keberangkatan`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_tiket`
--
ALTER TABLE `harga_tiket`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id_stasiun` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `waktu_keberangkatan`
--
ALTER TABLE `waktu_keberangkatan`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
