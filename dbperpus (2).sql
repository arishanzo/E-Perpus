-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 08:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_buku`
--

CREATE TABLE `dt_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `kategori` enum('fiksi','non_fiksi','pelajaran','dll') NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Tahun_terbit` int(11) NOT NULL,
  `jumlah_salinan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_buku`
--

INSERT INTO `dt_buku` (`id_buku`, `judul_buku`, `pengarang`, `kategori`, `ISBN`, `Tahun_terbit`, `jumlah_salinan`) VALUES
(2, 'sss', 'aaa', 'fiksi', 1234, 1990, 34),
(3, 'kk', 'kk', 'fiksi', 899, 1990, 24);

-- --------------------------------------------------------

--
-- Table structure for table `dt_denda`
--

CREATE TABLE `dt_denda` (
  `id_denda` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_denda` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_denda`
--

INSERT INTO `dt_denda` (`id_denda`, `id_santri`, `id_buku`, `tgl_denda`, `denda`, `status_pembayaran`) VALUES
(1, 1, 3, '2024-10-05', 3000, 'Belum Bayar'),
(2, 1, 3, '2024-10-05', 3000, 'Belum Bayar'),
(3, 1, 3, '2024-10-05', 3000, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `dt_santri`
--

CREATE TABLE `dt_santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `NIS` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `asrama` varchar(50) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_santri`
--

INSERT INTO `dt_santri` (`id_santri`, `nama_santri`, `NIS`, `kelas`, `asrama`, `status`) VALUES
(1, 'Aris Wahyudi', 1111, 12, 'Maliki', 'aktif'),
(2, 'Hikam', 344, 12, 'akak', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_pengembalian` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_pengembalian`, `id_santri`, `id_buku`, `tgl_pengembalian`) VALUES
(10, 1, 2, '2024-10-05'),
(11, 1, 2, '2024-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id_pinjambuku` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuhtempo` date NOT NULL,
  `status_pinjam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id_pinjambuku`, `id_buku`, `id_santri`, `jumlah`, `tgl_pinjam`, `tgl_jatuhtempo`, `status_pinjam`) VALUES
(17, 2, 1, 2, '2024-10-05', '2024-10-12', 'dikembalikan'),
(18, 3, 2, 2, '2024-09-28', '2024-10-05', 'dikembalikan tapi terlambat'),
(19, 3, 1, 1, '2024-09-25', '2024-10-02', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_buku`
--
ALTER TABLE `dt_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `dt_denda`
--
ALTER TABLE `dt_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `dt_santri`
--
ALTER TABLE `dt_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD PRIMARY KEY (`id_pinjambuku`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_santri` (`id_santri`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_buku`
--
ALTER TABLE `dt_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dt_denda`
--
ALTER TABLE `dt_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dt_santri`
--
ALTER TABLE `dt_santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  MODIFY `id_pinjambuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
