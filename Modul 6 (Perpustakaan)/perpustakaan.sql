-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 11:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `kategori` varchar(32) NOT NULL,
  `rak` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `tahun`, `penulis`, `ISBN`, `pic`, `kategori`, `rak`, `stok`) VALUES
(1, 'Data Science for Business', 2013, 'Foster Provost, Tom Fawcett', '9781449361327', 'buku1.jpg', 'Bisnis', 1, 1),
(2, 'A Project Guide to UX Design', 2009, 'Carolyn Chandler, Russ Unger', '9780321607379', 'buku2.jpg', 'Desain', 2, 1),
(3, 'Digital Signal Processing: Simplified', 2013, 'Dilip S Mali', '9788187972839', 'buku3.jpg', 'Komputer', 3, 1),
(5, 'Buku Bulet-bulet :3', 2020, 'Yuriko Christian', '1708561022', 'GAGAGA.jpg', 'Lucu', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('mohon','dipinjam','dikembalikan','batal') NOT NULL DEFAULT 'mohon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjam`, `id_buku`, `id_user`, `tgl_ambil`, `tgl_kembali`, `status`) VALUES
(2, 1, 5, '2020-05-27', '2020-05-29', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('suadmin','user','admin','nonaktif') NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `email`, `password`, `role`, `picture`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$/RCMh2SgBpmsO/64CFGjc.M.gPZIE3YmbhoKH5Cd9WRC0fXNuyvNq', 'suadmin', ''),
(2, 'Ilkom-Unud', 'ilkom@unud.ac.id', '$2y$10$qplMk2mQDWoOtG5mEaYo9u/ihtNUdXx1PLG4czjuTv0u.NTg3BN7O', 'admin', ''),
(5, 'Yuriko Christian', 'yuriko@gmail.com', '$2y$10$UIJh.5QMH1zjwy8JkHoxAucFLO9kZfiIluK6X5npXREe5H1BHOEEG', 'user', 'yuriko.jpg'),
(6, 'Admin Yuriko', 'yuriko-admin@email.com', '$2y$10$wvLKYqPvl0X6GLoWlrbsbOkQzSmHzBDnr0Xv.JFnixxsVWP.tXlj6', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
