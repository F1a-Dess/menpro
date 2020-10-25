-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2020 pada 10.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transfer_mhs_intern`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs`
--

CREATE TABLE `data_mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim_asal` varchar(15) NOT NULL,
  `prodi_asal` varchar(25) NOT NULL,
  `fakultas_asal` varchar(25) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `smt_pindah` varchar(7) NOT NULL,
  `thn_akademik_pindah` varchar(10) NOT NULL,
  `prodi_tujuan` varchar(25) NOT NULL,
  `fakultas_tujuan` varchar(25) NOT NULL,
  `transkrip` varchar(250) NOT NULL,
  `rekomendasi_dosen` varchar(250) NOT NULL,
  `pernyataan_ortu` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_form` int(1) NOT NULL,
  `upload_berkas` int(1) NOT NULL,
  `cek_form` int(1) NOT NULL,
  `kep_kaprodi` int(1) NOT NULL,
  `konversi` varchar(255) NOT NULL DEFAULT '0',
  `kep_baa` int(1) NOT NULL,
  `keputusan` varchar(255) NOT NULL DEFAULT '0',
  `biaya_studi` int(1) NOT NULL,
  `rincian_biaya_studi` varchar(255) NOT NULL DEFAULT '0',
  `update_rincian_biaya_studi` varchar(50) NOT NULL,
  `bayar` int(1) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL DEFAULT '0',
  `nim_baru` varchar(25) NOT NULL DEFAULT '0',
  `selesai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mhs`
--

INSERT INTO `data_mhs` (`id`, `nama`, `nim_asal`, `prodi_asal`, `fakultas_asal`, `alamat`, `kota`, `nohp`, `smt_pindah`, `thn_akademik_pindah`, `prodi_tujuan`, `fakultas_tujuan`, `transkrip`, `rekomendasi_dosen`, `pernyataan_ortu`, `user_id`, `isi_form`, `upload_berkas`, `cek_form`, `kep_kaprodi`, `konversi`, `kep_baa`, `keputusan`, `biaya_studi`, `rincian_biaya_studi`, `update_rincian_biaya_studi`, `bayar`, `bukti_bayar`, `nim_baru`, `selesai`) VALUES
(1, 'Bambang Nich', '21.N1.0001', 'Sistem Informasi', 'Ilmu Komputer', 'Jalan Kenangan', 'Semarang', '082381526378', 'ganjil', '2020/2021', 'Teknik Informatika', 'Ilmu Komputer', 'transkrip.pdf', 'rekomendasi.pdf', 'surat_pernyataan_ortu.pdf', 1, 1, 1, 2, 0, '', 0, '', 1, '', '', 0, '', '0', 0),
(2, 'Renatta Moeloek', '21.N1.0002', 'Sistem Informasi', 'Ilmu Komputer', 'Jalan Jalan', 'Semarang', '082381526378', 'ganjil', '2020/2021', 'Teknik Informatika', 'Ilmu Komputer', 'transkrip.pdf', 'rekomendasi.pdf', 'surat_pernyataan_ortu.pdf', 5, 1, 1, 2, 0, '', 0, '', 1, '', '', 0, '', '0', 0),
(3, 'Agus Fajar', '21.N1.0003', 'Sistem Informasi', 'Ilmu Komputer', 'Jalan Kenangan', 'Semarang', '082381526378', 'ganjil', '2020/2021', 'Teknik Informatika', 'Ilmu Komputer', '22102020100200transkrip.pdf', '22102020100200rekomendasi.pdf', '22102020100200surat_pernyataan_ortu.pdf', 8, 1, 1, 2, 0, '', 0, '', 0, '', '', 0, '', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `fakultas`) VALUES
(1, 'Ekonomi dan Bisnis'),
(2, 'Teknologi Pertanian'),
(3, 'Hukum dan Komunikasi'),
(4, 'Psikologi'),
(5, 'Arsitektur dan Desain'),
(6, 'Teknik'),
(7, 'Ilmu Komputer'),
(8, 'Sastra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`) VALUES
(1, 'Perpajakan'),
(2, 'Manajemen'),
(3, 'Akuntansi'),
(4, 'Manajemen Unggulan'),
(5, 'Teknologi Pangan'),
(6, 'Nutrisi dan Teknologi Kuliner'),
(7, 'Ilmu Hukum'),
(8, 'Ilmu Komunikasi'),
(9, 'Psikologi'),
(10, 'Arsitektur'),
(11, 'Desain Komunikasi Visual'),
(12, 'Teknik Sipil'),
(13, 'Teknik Elektro'),
(14, 'Teknik Informatika'),
(15, 'Sistem Informasi'),
(16, 'Game Technology'),
(17, 'Sastra Inggris'),
(18, 'Englishpreneurship'),
(19, 'Digital Performing Arts');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `user_id` int(11) NOT NULL,
  `isi_form` int(1) NOT NULL DEFAULT '0',
  `cek_form` int(1) NOT NULL DEFAULT '0',
  `keputusan_kaprodi_baru` int(1) NOT NULL DEFAULT '0',
  `keputusan_baa` int(1) NOT NULL DEFAULT '0',
  `biaya_studi` int(1) NOT NULL DEFAULT '0',
  `pembayaran` int(1) NOT NULL DEFAULT '0',
  `kirim_nim_baru` int(1) NOT NULL DEFAULT '0',
  `selesai` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`user_id`, `isi_form`, `cek_form`, `keputusan_kaprodi_baru`, `keputusan_baa`, `biaya_studi`, `pembayaran`, `kirim_nim_baru`, `selesai`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim_asal` varchar(11) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level`, `nama`, `nim_asal`, `prodi`) VALUES
(1, 'bambang@gmail.com', '0192023a7bbd73250516f069df18b500', 'mahasiswa', 'Bambang Nich', '21.N1.0001', ''),
(2, 'baa_unika', '0192023a7bbd73250516f069df18b500', 'baa', 'BAA UNIKA', '', ''),
(3, 'bak_unika', '0192023a7bbd73250516f069df18b500', 'bak', 'BAK UNIKA', '', ''),
(5, 'renata@gmail.com', '0192023a7bbd73250516f069df18b500', 'mahasiswa', 'Renata Moeloek', '21.A1.0001', ''),
(6, 'kaprodi_ti', '0192023a7bbd73250516f069df18b500', 'kaprodi', 'KAPRODI TI', '', 'Teknik Informatika'),
(7, 'kaprodi_arsi', '0192023a7bbd73250516f069df18b500', 'kaprodi', 'Kaprodi Arsitektur', '', 'Arsitektur'),
(8, 'agus@gmail.com', '0192023a7bbd73250516f069df18b500', 'mahasiswa', 'Agus Fajar', '21.N1.0003', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mhs`
--
ALTER TABLE `data_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_mhs`
--
ALTER TABLE `data_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
