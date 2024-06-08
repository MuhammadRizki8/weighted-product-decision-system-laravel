-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2024 pada 16.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_kurban`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(255) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `nama_alternatif`) VALUES
(1, 'A1', 'Hewan Kurban A'),
(2, 'A2', 'Hewan Kurban B'),
(3, 'A3', 'Hewan Kurban C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(1, 'C1', 'Umur', 0.2, 'benefit'),
(2, 'C2', 'Berat', 0.15, 'benefit'),
(3, 'C3', 'Kesehatan', 0.25, 'benefit'),
(4, 'C4', 'Harga', 0.1, 'cost'),
(5, 'C5', 'Lingkungan', 0.15, 'benefit'),
(6, 'C6', 'Perawatan Hewan Kurban', 0.1, 'benefit'),
(7, 'C7', 'Metode Pembayaran', 0.05, 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_kriteria`
--

CREATE TABLE `opsi_kriteria` (
  `id` int(11) NOT NULL,
  `opsi` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `opsi_kriteria`
--

INSERT INTO `opsi_kriteria` (`id`, `opsi`, `nilai`, `id_kriteria`) VALUES
(1, 'Muda', 3, 1),
(2, 'Ideal', 5, 1),
(3, 'Tua', 3, 1),
(4, 'Kurang', 1, 2),
(5, 'Ideal', 3, 2),
(6, 'Lebih', 5, 2),
(7, 'Sehat', 5, 3),
(8, 'Sakit ringan', 3, 3),
(9, 'Sesuai anggaran', 5, 4),
(10, 'Sedikit melebihi anggaran', 3, 4),
(11, 'Jauh melebihi anggaran', 1, 4),
(12, 'Bersih', 5, 5),
(13, 'Cukup bersih', 3, 5),
(14, 'Kotor', 1, 5),
(15, 'Rutin', 5, 6),
(16, 'Cukup Rutin', 4, 6),
(17, 'Jarang', 3, 6),
(18, 'Tunai & Non-tunai', 5, 7),
(19, 'Hanya Tunai / Non-tunai', 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_opsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_alternatif`, `id_kriteria`, `id_opsi`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 2, 1, 1),
(9, 2, 2, 3),
(10, 2, 3, 1),
(11, 2, 4, 2),
(12, 2, 5, 2),
(13, 2, 6, 2),
(14, 2, 7, 2),
(15, 3, 1, 3),
(16, 3, 2, 1),
(17, 3, 3, 2),
(18, 3, 4, 3),
(19, 3, 5, 3),
(20, 3, 6, 3),
(21, 3, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opsi_kriteria`
--
ALTER TABLE `opsi_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_opsi` (`id_opsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `opsi_kriteria`
--
ALTER TABLE `opsi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `opsi_kriteria`
--
ALTER TABLE `opsi_kriteria`
  ADD CONSTRAINT `opsi_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`);

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_opsi`) REFERENCES `opsi_kriteria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
