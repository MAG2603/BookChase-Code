-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `id_buku` int(11) DEFAULT 0,
  `poin_add` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `pengarang` varchar(200) DEFAULT NULL,
  `penerbit` varchar(200) DEFAULT NULL,
  `edisi` varchar(100) DEFAULT NULL,
  `no_ddc` varchar(10) DEFAULT NULL,
  `no_panggil` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `kota_terbit` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `sampul` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `edisi`, `no_ddc`, `no_panggil`, `tahun`, `isbn`, `kota_terbit`, `genre`, `sinopsis`, `poin`, `bahasa`, `file`, `sampul`) VALUES
(1, 'Laskar Pelangi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kisah inspiratif tentang perjuangan anak-anak Belitung yang ingin mendapatkan pendidikan yang layak.', 20, NULL, 'buku1.pdf', 'coverbuku1.jpg'),
(2, 'Ayat-Ayat Cinta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Novel romantis karya Habiburrahman El Shirazy yang mengangkat tema cinta dan agama.', 25, NULL, 'buku2.pdf', 'coverbuku2.png'),
(3, 'Sang Pemimpi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kisah dua sahabat yang bercita-cita untuk mengejar mimpi mereka di dunia pendidikan.', 15, NULL, 'buku3.pdf', 'coverbuku3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_progress` int(11) NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `poin` int(11) DEFAULT 0,
  `level` int(11) DEFAULT 0,
  `persentase` int(11) DEFAULT 0,
  `bookread` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` tinyint(4) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
