-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Jan 2023 pada 18.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Pasang Baru'),
(2, 'Sambung Sementara'),
(3, 'Ubah Daya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pln`
--

CREATE TABLE `pln` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pln`
--

INSERT INTO `pln` (`id`, `kategori`, `kecamatan`, `keterangan`, `latitude`, `longitude`, `lokasi`) VALUES
(2, 1, 'Paiton', 'Banjir ', '-7.704201', '113.479054', 'Paiton Karang Anyar'),
(12, 3, 'Peureulak', 'Perbesaran Arus Listrik', '4.8145885902788175', '97.88393445743735', 'Mesjid Baiturrahman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('admin','users') NOT NULL,
  `md4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUsers`, `namaLengkap`, `username`, `password`, `status`, `md4`) VALUES
(1, 'Adminstrator', 'admin', '$2y$10$U73DK4qGu7HDmu6iPv9kB.Ai9EC.mdsJ82XymCKXF/Cwkp4KZ5iEe', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'H. Ahmad Mustafid', 'mustafid', '$2y$10$YsdCNC.CKgbcSexxOX8ypuFgkCY4NDuTYY1aKQkEuyF8U1.pBLAa.', 'users', 'fd7795c9ab6eb42bed9450216a5989d5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pln`
--
ALTER TABLE `pln`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Kategori` (`kategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pln`
--
ALTER TABLE `pln`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pln`
--
ALTER TABLE `pln`
  ADD CONSTRAINT `Kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
