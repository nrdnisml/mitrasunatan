-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 09.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `rt` int(5) DEFAULT NULL,
  `rw` int(5) DEFAULT NULL,
  `kelurahan` varchar(120) DEFAULT NULL,
  `kecamatan` varchar(120) DEFAULT NULL,
  `kota_kab` varchar(120) DEFAULT NULL,
  `kodepos` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota_kab`, `kodepos`) VALUES
(1, 'Jl. Kalimas no 123', 2, 1, 'Muneng', 'Lowokwaru', 'Kota Malang', 123123),
(2, 'Jl. Kalimas no 543', 2, 1, 'Pohsangit kidul', 'Kademangan', 'Kota Probolinggo', 67224),
(3, 'jl. lorem ipsum', 1, 12, 'pohsangit kidul', 'kademangan', 'Kota probolinggo', 67224),
(4, 'Jl. Nanas no 123', 1, 1, 'Desa Muneng', ' Kademangan', 'Kota Probolinggo', 67224),
(5, 'Jl. Nanas no 123', 1, 1, 'Desa Muneng', ' Kademangan', 'Kota Probolinggo', 67224),
(6, 'Jl. Naruto gang Shippuden no 32', 1, 2, 'Muneng', 'Sumberasih', 'Kabupaten Probolinggo', 1234123),
(7, 'jl. lorem ipsum', 1, 2, 'mark', 'kadee', 'Kota pro', 67224),
(9, 'Jl. Kalimas no 123', 1, 1, 'Muneng', 'Sumberasih', 'Kota Probolinggo', 67224),
(10, 'Jl. Kalimas no 123', 1, 1, 'Muneng', 'Sumberasih', 'Kota Probolinggo', 67224),
(11, 'Jl. Kalimas no 123', 12, 22, 'Desa Muneng1', 'Sumberasih1', 'Kota Probolinggo', 123),
(13, 'Jl. Kalimas no 123', 12, 22, 'Desa Muneng1', 'Sumberasih1', 'Kota Probolinggo', 123),
(14, 'Jl. Kalimas no 123', 12, 12, 'Desa Muneng', 'Sumberasih1', 'Kabupaten Probolinggo', 1234123),
(15, 'Jl. Kalimas no 123', 2, 2, '123', '123', 'Kota 123', 222),
(17, 'Jl. Kalimas no 123', 2, 2, 'Pohsangit kidul', ' Kademangan', 'Kota Probolinggo', 1213),
(19, '123', 1, 1, '1', '1', 'Kota 1', 1),
(20, '123', 1, 1, '1', '1', 'Kota 1', 1),
(21, '123', 1, 1, '1', '1', 'Kota 1', 1),
(22, '123', 1, 1, '1', '1', 'Kota 1', 1),
(23, 'Jl. Kalimas no 123', 123, 123, '1', '123', 'Kota Kab. Probolinggo', 123412),
(24, 'Jl. Kalimas no 123', 3, 1, 'Desa Muneng1', 'Sumberasih1', 'Kota Probolinggo', 123123),
(26, 'Jl. pesisir 1', 2, 1, 'PESISIR', 'SUMBERASIH', 'PROBOLINGGO', 67251),
(27, 'Jl, kalianan No. 123 gg. buntu', 2, 1, 'MUNENG KIDUL', 'SUMBERASIH', 'PROBOLINGGO', 67251),
(28, 'Jl. Kalimas no 123', 1, 12, 'TRIWUNG KIDUL', 'KADEMANGAN', 'PROBOLINGGO', 67224),
(29, 'Jl. Kalimas no 1231', 12, 123, 'TRIWUNG KIDUL', 'KADEMANGAN', 'PROBOLINGGO', 67224);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama`, `img`, `no_tlp`, `email`, `kota`, `kelurahan`, `kecamatan`, `alamat`) VALUES
(7, 'Klinik Asoy', '1600929260_ea054898de2c5a171f79.png', '092333', 'mitrasunatan@gmail.com', 'Kabupaten Probolinggo', 'Desa Muneng', 'Sumberasih', 'Jl. Kalimas no 1231');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `jns_kunjungan` varchar(255) DEFAULT NULL,
  `tgl_kunjungan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `id_pasien`, `jns_kunjungan`, `tgl_kunjungan`) VALUES
(4, 2, 'Sunat', '2020-09-14'),
(7, 2, 'Kontrol', '2020-09-15'),
(8, 1, 'Kontrol', '2020-09-15'),
(9, 2, 'Kontrol', '2020-09-15'),
(11, 1, 'Sunat', '2020-09-15'),
(12, 1, 'Sunat', '2020-09-15'),
(13, 4, 'Sunat', '2020-09-16'),
(14, 11, 'Sunat', '2020-09-16'),
(15, 12, 'Sunat', '2020-09-16'),
(16, 14, 'Sunat', '2020-09-16'),
(17, 19, 'Sunat', '2020-09-16'),
(18, 20, 'Sunat', '2020-09-16'),
(19, 22, 'Sunat', '2020-09-23'),
(20, 13, 'Sunat', '2020-09-23'),
(21, 6, 'Sunat', '2020-09-22'),
(22, 14, 'Kontrol', '2020-09-24'),
(23, 6, 'Kontrol', '2020-09-24'),
(24, 11, 'Kontrol', '2020-09-24'),
(25, 13, 'Kontrol', '2020-09-24'),
(26, 1, 'Kontrol', '2020-09-24'),
(27, 20, 'Kontrol', '2020-09-24'),
(28, 2, 'Kontrol', '2020-09-24'),
(29, 11, 'Kontrol', '2020-09-24'),
(30, 2, 'Kontrol', '2020-09-24'),
(31, 6, 'Kontrol', '2020-09-24'),
(32, 11, 'Kontrol', '2020-09-24'),
(33, 11, 'Kontrol', '2020-09-24'),
(34, 20, 'Kontrol', '2020-09-24'),
(35, 22, 'Kontrol', '2020-09-24'),
(36, 11, 'Kontrol', '2020-09-24'),
(37, 5, 'Sunat', '2020-09-24'),
(38, 23, 'Sunat', '2020-09-24'),
(39, 23, 'Kontrol', '2020-09-24'),
(40, 24, 'Sunat', '2020-09-25'),
(41, 25, 'Sunat', '2020-10-06'),
(42, 10, 'Sunat', '2020-10-06'),
(43, 10, 'Sunat', '2020-10-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga_anak` varchar(20) DEFAULT NULL,
  `harga_dewasa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `deskripsi`, `harga_anak`, `harga_dewasa`) VALUES
(5, 'PAKET 1', 'SUNAT PAKE GEAR MOTOR ninja', '2000000', '5900000'),
(6, 'PAKET 2', 'SUNAT LINDES TRONTON', '280000', '1900000'),
(7, 'PAKET 3', 'sunat cubit macan', '28000000', '19000000'),
(8, 'PAKET 4', 'SUNAT METODE JIN', '2340000', '4300005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `id_domisili` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_pj` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `s_nikah` varchar(20) DEFAULT NULL,
  `gol_dar` varchar(2) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `id_domisili`, `id_status`, `id_paket`, `id_pj`, `nama`, `s_nikah`, `gol_dar`, `agama`, `tmp_lahir`, `tgl_lahir`, `pendidikan`, `no_tlp`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, 'najwa', 'Belum Menikah', 'B', 'Konghucu', 'probolinggo', '1999-06-12 00:00:00', 'SD', '628923477482', 'rahmanwahid822@gmail.com', '2020-09-01 20:22:27', '2020-09-13 20:22:27'),
(2, 2, 2, 5, 1, 'nurudin', 'Sudah Menikah', 'A', 'Konghucu', 'kademangan', '2014-06-03 00:00:00', 'SMA Sederajat', '628923477482', 'nurudinismail69@gmail.com', '2020-09-08 20:55:57', '2020-09-13 20:55:57'),
(3, 5, 3, 5, 2, 'Rafaza', 'Belum Menikah', 'A', 'Islam', 'Probolinggo', '2000-10-10 00:00:00', 'Tidak ada', '628923477482', 'asubakekok@gmail.com', '2020-09-30 08:05:49', '2020-09-16 08:05:49'),
(4, 6, 4, 5, 2, 'Wikan Numatya F', 'Belum Menikah', 'O', 'Islam', 'Malang', '2009-12-10 00:00:00', 'SD', '628923477482', 'rahmanwahid822@gmail.com', '2020-09-23 08:08:29', '2020-09-16 08:08:29'),
(6, 10, 7, 7, NULL, 'Mashabi', 'Belum Menikah', 'AB', 'Budha', 'Kediri', '2012-12-12 00:00:00', 'SD', '628923477482', 'nurudin_2@live.com', '2020-09-20 17:32:50', '2020-09-16 17:32:50'),
(7, 11, 8, 5, NULL, 'taba', 'Sudah Menikah', 'B', 'Protestan', 'ka', '2020-09-07 00:00:00', 'SMA Sederajat', '628923477482', 'asubakekok@gmail.com', '2020-09-19 17:47:31', '2020-09-16 17:47:31'),
(9, 13, 10, 5, NULL, 'taba', 'Sudah Menikah', 'B', 'Protestan', 'ka', '2020-09-07 00:00:00', 'SMA Sederajat', '628923477482', 'asubakekok@gmail.com', '2020-09-16 17:49:35', '2020-09-16 17:49:35'),
(10, 14, 11, 7, NULL, 'nb', 'Belum Menikah', 'A', 'Islam', 'er', '2020-09-01 00:00:00', 'SMP Sederajat', '628923477482', 'ismail_nurudin@yahoo.com', '2020-09-16 17:52:00', '2020-09-16 17:52:00'),
(11, 15, 12, 5, NULL, 'habeb', 'Sudah Menikah', 'B', 'Katolik', 'kediri', '2020-09-04 00:00:00', 'SD', '628923477482', 'rahmanwahid822@gmail.com', '2020-09-26 17:58:07', '2020-09-16 17:58:07'),
(13, 17, 14, 5, 8, 'udin', 'Belum Menikah', 'B', 'Hindu', 'probolinggo', '1999-06-12 00:00:00', 'SD', '6285231634078', 'ismail_nurudin@yahoo.com', '2020-09-16 18:04:17', '2020-09-16 18:04:17'),
(20, 24, 21, 5, NULL, 'nasrul', 'Sudah Menikah', 'A', 'Islam', 'pronojiwo', '2000-12-12 00:00:00', 'Tidak ada', '628923477482', 'rahmanwahid822@gmail.com', '2020-09-16 19:15:13', '2020-09-16 19:15:13'),
(22, 26, 23, 5, NULL, 'Ismail Marzuki', 'Belum Menikah', 'B', 'Katolik', 'Probolinggo', '1990-09-18 00:00:00', 'SD', '628923477482', 'masbro@gmail.com', '2020-08-18 14:34:33', '2020-09-22 14:34:33'),
(23, 27, 24, 5, 13, 'Nuruddin ismail', 'Belum Menikah', 'A', 'Islam', 'Probolinggo', '2015-05-11 00:00:00', 'SD', '62852331634078', 'ismail_nurudin@yahoo.com', '2020-09-24 13:27:54', '2020-09-24 13:27:54'),
(24, 28, 25, 8, NULL, 'Nella Kharisma', 'Sudah Menikah', 'AB', 'Protestan', 'Kanigaran', '2012-12-12 00:00:00', 'Diploma II', '628923477482', 'asubakekok@gmail.com', '2020-09-25 00:11:50', '2020-09-25 00:11:50'),
(25, 29, 26, 5, NULL, 'Muhaimin', 'Belum Menikah', 'B', 'Konghucu', 'Probolinggo', '2020-09-02 00:00:00', 'SD', '628923477482', 'ismail_nurudin@yahoo.com', '2020-09-30 08:43:26', '2020-09-30 08:43:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanggung_jawab`
--

CREATE TABLE `penanggung_jawab` (
  `id` int(11) NOT NULL,
  `id_domisili` int(11) DEFAULT NULL,
  `nama` varchar(120) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`id`, `id_domisili`, `nama`, `status`) VALUES
(1, 3, 'muhsin habib', 'Orang Tua'),
(2, 5, 'iin', 'Orang Tua'),
(8, 17, 'david', 'Orang Tua'),
(13, 27, 'Zainul Abidin', 'Orang Tua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `tgl_booking` datetime DEFAULT NULL,
  `no_rm` int(11) DEFAULT NULL,
  `layanan` varchar(50) DEFAULT NULL,
  `is_confirm` int(1) DEFAULT NULL,
  `is_done` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `tgl_booking`, `no_rm`, `layanan`, `is_confirm`, `is_done`) VALUES
(1, '2020-09-13 00:00:00', 20990001, 'klinik', 1, '0'),
(2, '2020-09-08 00:00:00', 20140002, 'klinik', 1, '0'),
(3, '2020-09-19 00:00:00', 0, 'klinik', 0, '0'),
(4, '2020-09-24 00:00:00', 20090004, 'klinik', 1, '0'),
(6, '2020-09-11 00:00:00', 0, 'rumah', 0, '0'),
(7, '2020-09-11 00:00:00', 20120006, 'rumah', 1, '0'),
(8, '2020-09-01 00:00:00', 0, 'rumah', 0, '0'),
(10, '2020-09-01 00:00:00', 0, 'rumah', 0, '0'),
(11, '2020-09-09 00:00:00', 20200010, 'rumah', 1, '0'),
(12, '2020-09-23 00:00:00', 20200011, 'rumah', 1, '0'),
(14, '2020-09-18 00:00:00', 20990013, 'klinik', 1, '0'),
(16, '2020-09-11 00:00:00', 0, 'rumah', 0, '0'),
(17, '2020-09-11 00:00:00', 0, 'rumah', 0, '0'),
(18, '2020-09-11 00:00:00', 0, 'rumah', 0, '0'),
(19, '2020-09-11 00:00:00', 0, 'rumah', 0, '0'),
(21, '2020-09-03 00:00:00', 20000020, 'klinik', 1, '0'),
(23, '2020-09-16 00:00:00', 20900022, 'rumah', 1, '0'),
(24, '2020-09-30 00:00:00', 20150023, 'klinik', 1, '0'),
(25, '2020-09-11 00:00:00', 20120024, 'rumah', 1, '0'),
(26, '2020-10-01 00:00:00', 20200025, 'rumah', 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `img`) VALUES
(1, 'masbro', '$2y$10$qTnVgzv3a3oHAPbyFQXa.O3S/pztbPvGUDdjkHk9F.ExvPfgGnm0C', '1599490461_fe14cce5b8333c2a7ce9.jpg'),
(2, 'udin', '$2y$10$XDZn2jW6vjGV3Zw3EneGTuKrE1AAbc/1FszbHoapTsjsprSDsGOAC', 'profile.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, NULL, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt'),
(2, NULL, 'Pendaftar', 'pendaftar', 'fas fa-smile'),
(3, NULL, 'Kunjungan Pasien', 'kunjungan', 'fas fa-address-book'),
(4, NULL, 'Data Pasien', 'pasien', 'fas fa-users '),
(5, NULL, 'Data Instansi', 'instansi', 'fas fa-building '),
(6, NULL, 'Paket', 'paket', 'fas fa-handshake'),
(7, NULL, 'Keuangan', 'keuangan', 'fas fa-wallet');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domisili` (`id_domisili`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `pasien_ibfk_6` (`id_pj`);

--
-- Indeks untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_id` (`menu_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
