-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Nov 2020 pada 00.47
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-youngbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(105, 'Makanan dan minuman'),
(106, 'Perawatan kecantikan'),
(107, 'Handphone dan Acc'),
(108, 'Ibu dan bayi'),
(109, 'Fashion muslim'),
(110, 'Perlengkapan rumah'),
(111, 'Pakaian pria'),
(112, 'Pakaian wanita'),
(113, 'Kesehatan'),
(114, 'Komputer dan Acc'),
(115, 'Fashion anak'),
(116, 'Sepatu pria'),
(117, 'Sepatu wanita'),
(118, 'Tas pria'),
(119, 'Tas wanita'),
(120, 'Jam tangan'),
(121, 'Elektronik'),
(122, 'Aksesoris fashion'),
(123, 'Hobi dan koleksi'),
(124, 'Fotografi'),
(125, 'Olahraga dan outdoor'),
(126, 'Otomotif'),
(127, 'Buku dan alat tulis'),
(128, 'Voucher'),
(129, 'Serba serbi'),
(130, 'Souvenir dan pesta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
