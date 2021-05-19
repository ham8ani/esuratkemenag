-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2021 pada 04.48
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kemenag`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `nama_disposisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisi`
--

INSERT INTO `tbl_disposisi` (`id_disposisi`, `nama_disposisi`) VALUES
(6, 'Sekjen'),
(7, 'Bimas Islam'),
(8, 'Peny. Haji dan Umrah'),
(9, 'Madrasyah'),
(10, 'PAKIS'),
(11, 'Pembinas Kristen'),
(12, 'Pembinas Katolik'),
(18, 'Pembinas Budha'),
(19, 'Pembinas Hindu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengirim_surat`
--

CREATE TABLE `tbl_pengirim_surat` (
  `id_pengirim_surat` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengirim_surat`
--

INSERT INTO `tbl_pengirim_surat` (`id_pengirim_surat`, `nama_pengirim`, `alamat`, `no_hp`, `email`) VALUES
(7, 'PEMKO BATAM', 'Tanjungpinang', '0852657982550', 'ham8ani@gmail.com'),
(8, 'PEMKO TANJUNGPINANG', 'Tanjungpinang', '0852657982550', 'coba@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suratmasuk`
--

CREATE TABLE `tbl_suratmasuk` (
  `id_arsip` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `prihal` varchar(100) NOT NULL,
  `id_disposisi` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_suratmasuk`
--

INSERT INTO `tbl_suratmasuk` (`id_arsip`, `no_surat`, `tanggal_surat`, `tanggal_diterima`, `prihal`, `id_disposisi`, `id_pengirim`, `file`) VALUES
(2, '2020/IX/001', '2020-06-18', '2020-06-20', 'Undangan Bedah Buku', 4, 6, '-'),
(4, '12345', '2021-05-18', '2021-05-18', 'Audensi', 6, 6, '60a33d2132f3a.pdf'),
(6, '', '0000-00-00', '0000-00-00', '', 0, 0, ''),
(11, '2321423/0880', '2021-05-18', '2021-05-19', 'permintaan narasumber', 6, 7, '60a462d713759.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indeks untuk tabel `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  ADD PRIMARY KEY (`id_pengirim_surat`);

--
-- Indeks untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  MODIFY `id_pengirim_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
