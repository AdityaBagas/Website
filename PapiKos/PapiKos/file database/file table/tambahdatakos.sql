-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2018 pada 13.55
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambahdatakos`
--

CREATE TABLE `tambahdatakos` (
  `idKos` varchar(11) NOT NULL,
  `namaKos` varchar(50) NOT NULL,
  `alamatKos` varchar(100) NOT NULL,
  `luasKos` varchar(15) NOT NULL,
  `pemilik` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `ket_tambahan` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tambahdatakos`
--

INSERT INTO `tambahdatakos` (`idKos`, `namaKos`, `alamatKos`, `luasKos`, `pemilik`, `telp`, `ket_tambahan`, `foto`) VALUES
('11', 'Kos Surya', 'Bantul', '100', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Bersih', 'Dijual-Rumah-Kost-Murah-50m-dari-UMY-Yogyakarta.jpg'),
('bbb', 'Kos Bebek', 'Hogwarts', '1000', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Khusus Pecinta Bebek', 'Resize_P10-04-12_16-23.jpg'),
('bbc', 'Kos Ojo', 'Seturan', '555', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Bebas', 'No. 1.jpg'),
('bebek', 'Kos Indah', 'Barbarsari', '100', 'dinda', '085274047605', 'Kos Dekat dengan Kampus', 'mdr_fix-650-435.jpg'),
('dfh', 'Kos Alex', 'Barbarsari', '100', 'Bonaventura Tamara Sagala', '081252086911', 'Bersih dan Rindang', 'IMG-20160206-WA0004.jpg'),
('Kos Burhan', 'Kos Burhan', 'Jogja', '100', 'Burhan', '085274047605', 'Kos Murah', '220920181341212501_1.jpg'),
('kos surya', 'Kos Braham', 'babarsari', '1000', 'braham', '085274047605', 'kos bebas dan sejuk', 'kost-di-kuta-bali.jpg'),
('qwer', 'Kos Wibu', 'Akihabara', '1000', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Khusus untuk wibu', 'kost murah denpasar 3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tambahdatakos`
--
ALTER TABLE `tambahdatakos`
  ADD PRIMARY KEY (`idKos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
