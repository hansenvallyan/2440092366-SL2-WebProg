-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2022 pada 10.50
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financialmanagementdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `namaDepan` varchar(100) NOT NULL,
  `namaTengah` varchar(100) NOT NULL,
  `namaBelakang` varchar(100) NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `NIK` char(16) NOT NULL,
  `wargaNegara` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kodePos` varchar(6) NOT NULL,
  `fotoProfil` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`namaDepan`, `namaTengah`, `namaBelakang`, `tempatLahir`, `tanggalLahir`, `NIK`, `wargaNegara`, `email`, `noHp`, `alamat`, `kodePos`, `fotoProfil`, `username`, `password`) VALUES
('Elona', 'Sulaiman', 'Christianty', 'SMD', '2013-08-05', '6472046704040001', 'Indonesia', 'elonacs@gmail.com', '+6281347026431', 'Jl. Tantina', '75115', 'Beruntungnya-Indonesia-Punya-Pancasila-Berkaca-dari-Kasus-Rasis-di-AS.jpg', 'eonaalemonade', 'Login1234'),
('Hansen', 'Vallyan', 'Christian', 'Samarinda', '2002-05-17', '6123456789010000', 'Indonesia', 'hansen.vallyan@binus.ac.id', '+6281234567890', 'Perumahan Sambutan Ariesco Blok AC No.1, Kecamatan : Sambutan, Samarinda, Kalimantan Timur', '75115', 'Hansen FYP.png', 'hansenvallyan', 'Abcd1234'),
('Panpan', 'Grizzly', 'Icebear', 'China', '2022-04-01', '6472046702020005', 'China', 'panpan@gmail.com', '+6281347096745', 'Jl. We Bare Bears', '75112', '3232331b9d74e58b639eace82768fded.png', 'panpan', 'Grizzly123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
