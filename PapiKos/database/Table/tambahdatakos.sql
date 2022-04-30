-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Okt 2018 pada 19.30
-- Versi server: 5.7.23-log
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papikoss_store`
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
  `pemilik` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `ket_tambahan` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tambahdatakos`
--

INSERT INTO `tambahdatakos` (`idKos`, `namaKos`, `alamatKos`, `luasKos`, `pemilik`, `telp`, `ket_tambahan`, `foto`) VALUES
('bbb', 'Kos Bebek1', 'Hogwarts', '1000', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Khusus Pecinta Bebek', 'Resize_P10-04-12_16-23.jpg'),
('bbc', 'Kos Ojo', 'Seturan', '555', 'Bonaventura Tamara Sagala', '081252086911', 'Kos Bebas', 'No. 1.jpg'),
('bebek', 'Kos Indah', 'Barbarsari', '100', 'dinda', '085274047605', 'Kos Dekat dengan Kampus', 'mdr_fix-650-435.jpg'),
('bona', 'kos bona', 'bantul', '100', 'bona', '081111111111', 'asd', '26092018033651Koala.jpg'),
('dfh', 'Kos Alex', 'Barbarsari', '100', 'Bonaventura Tamara Sagala', '081252086911', 'Bersih dan Rindang', 'IMG-20160206-WA0004.jpg'),
('ID', 'Nama Kos', 'ALAMAT', '44', 'Bonaventura Tamara Sagala', '081252086911', 'baggus', '25092018033537001.00 copy.jpg'),
('Indrayati', 'Kos Indrayati', 'Jogja', '500', 'Indrayati', '081269696969', 'Kos Dekat dengan Kampus', '25092018034244Rumah-Kost-Sleman-Indonesia.jpg'),
('Kos Burhan', 'Kos Burhan', 'Jogja', '100', 'Burhan', '085274047605', 'Kos Murah', '220920181341212501_1.jpg'),
('kos surya', 'Kos Braham', 'babarsari', '1000', 'braham', '085274047605', 'kos bebas dan sejuk', 'kost-di-kuta-bali.jpg'),
('Makmur', 'Kos Pak Makmur', 'Jogja', '500', 'Makmur', '085269156915', 'Kos Dekat dengan Kampus dan indomaret', '25092018034648big5240164.jpg'),
('pak xenod', 'kos pak xenod', 'bantul', '100', 'xenod', '085266666666', 'sejuk gan', '25092018142728kost_murah_di_tebet_9040128523977940019.jpg'),
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
