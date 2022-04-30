-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2018 pada 13.54
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
(66, 'bebek', 'bebek', '', 'oriharaizaya931@gmail.com', 'jogja', 'acf4b89d3d503d8252c9c4ba75ddbf6d', 1, 'lim.jpg'),
(68, 'surya', 'surya', '25021998', 'oriharaizaya931@gmail.com', 'surya', '4b0250793549726d5c1ea3906726ebfe', 1, 'BvIfSGGIIAA8uLV.jpg'),
(69, 'Burhanaja', 'Burhanaja', '25021998', 'oriharaizaya931@gmail.com', 'jogja', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e', 1, '409903.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `reserve` varchar(50) NOT NULL,
  `bookdate` date NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `bed_type` varchar(50) NOT NULL,
  `breakfast` varchar(50) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `gender`, `email`, `telp`, `reserve`, `bookdate`, `room_type`, `bed_type`, `breakfast`, `CheckIn`, `CheckOut`, `payment`) VALUES
(2, 'Aditya', 'Aditya Bagaskoro', 'oriharaizaya931@gmail.com', '085274047605', 'asd', '2311-12-31', 'Deluxe', 'Single Bed', 'with', '2122-12-31', '3321-12-31', 'Cash'),
(4, 'Aditya123333', 'Aditya Bagaskoro', '160708678@students.ac.id', '085274047605', '1112233', '2332-12-31', 'Deluxe', 'Single Bed', 'without', '0000-00-00', '0000-00-00', 'Cash'),
(5, 'Aditya123333', 'Aditya Bagaskoro', '160708678@students.ac.id', '085274047605', '1112233', '2332-12-31', 'Deluxe', 'Single Bed', 'without', '0000-00-00', '0000-00-00', 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `jurusan`) VALUES
(3, 'asd', 'Aditya Bagaskoro', 'X', 'Multimedia'),
(7, 'asd', 'Aditya Bagaskoro', 'XII', 'Akuntansi'),
(8, '123', 'cevin', 'XI', 'Akuntansi');

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
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tambahdatakos`
--
ALTER TABLE `tambahdatakos`
  ADD PRIMARY KEY (`idKos`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
