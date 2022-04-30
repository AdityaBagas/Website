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
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `upload` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `name`, `username`, `password`, `email`, `alamat`, `hash`, `active`, `upload`) VALUES
(121, 'juanganteng', 'juanganteng', '25021998', 'oriharaizaya139@gmail.com', 'segitiga bermuda', 'b2eb7349035754953b57a32e2841bda5', 1, '1333150-3x2-940x627.png'),
(122, 'Alim', 'Alim', '2599', 'xenodadecya@gmail.co', 'barbarsari', '9fe8593a8a330607d76796b35c64c600', 0, 'FfgDMr7ycW.png'),
(124, 'siapahayo', 'siapahayo', '3275', 'oriharaizaya963@gmail.com', 'dimanahayo', 'fa7cdfad1a5aaf8370ebeda47a1ff1c3', 1, 'PVqU6LBMfz.png'),
(125, 'BonaGanteng', 'bona1707', '4210', 'bona.sagala@gmail.com', 'Babarsari', '48aedb8880cab8c45637abc7493ecddd', 1, 'home.jpg'),
(127, 'Bonaventura Tamara Sagala', 'bona170788', '1620', 'bona.sagala@gmail.com', 'yogyakarta', '6faa8040da20ef399b63a72d0e4ab575', 1, '19905224_494847134194822_7470693563547921900_n.jpg'),
(128, 'Xenod Adecya', 'xenodadecya', '3620', 'adecyaxenod@gmail.com', '', 'ccb1d45fb76f7c5a0bf619f979c6cf36', 1, 'IMG_20180916_185125_HDR.jpg'),
(129, 'BonaGanteng', 'qwerty', '4726', 'bona.sagala@gmail.com', 'jogja', '0aa1883c6411f7873cb83dacb17b0afc', 0, 'smartphone.jpg'),
(130, 'jeri', 'jeri123', '123456789', 'satrianusa748@gmail.com', 'jeri', '4e732ced3463d06de0ca9a15b6153677', 1, 'Chrysanthemum.jpg'),
(131, 'Marcellinus Hari P', 'marcell19', '1834', 'marcellinus17@gmail.com', 'Babarsari', '1a5b1e4daae265b790965a275b53ae50', 0, 'Koala.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
