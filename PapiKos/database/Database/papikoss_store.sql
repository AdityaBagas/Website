-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Okt 2018 pada 19.29
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
-- Struktur dari tabel `Admin`
--

CREATE TABLE `Admin` (
  `id` int(20) NOT NULL,
  `UsernameAdmin` varchar(30) NOT NULL,
  `PasswordAdmin` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Admin`
--

INSERT INTO `Admin` (`id`, `UsernameAdmin`, `PasswordAdmin`) VALUES
(1, 'Bagas', '25021998'),
(2, 'admin', 'admin');

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
-- Indeks untuk tabel `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indeks untuk tabel `tambahdatakos`
--
ALTER TABLE `tambahdatakos`
  ADD PRIMARY KEY (`idKos`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
