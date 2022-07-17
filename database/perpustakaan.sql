-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 05:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `grafik`
--

CREATE TABLE `grafik` (
  `id` int(11) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `peminjam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `password2` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jeniskelamin` varchar(15) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `nama`, `username`, `password`, `password2`, `kelas`, `jeniskelamin`, `level`) VALUES
(1, 'Mukhlis Bara Pamungkas', 'admin', 'admin123', 'admin123', 'X IPA 1', 'Laki-laki', 'admin'),
(5, 'Bara', 'bara', 'bara123', 'bara123', 'XI IPA 2', 'Laki-laki', 'user'),
(6, 'Mukhlis Bara Pamungkas', 'user', 'user123', 'user123', 'X IPS 1', 'Laki-laki', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_t_anggota` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `ttl` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`id_t_anggota`, `nama`, `ttl`, `jenis_kelamin`, `kelas`, `agama`, `no_telp`, `alamat`) VALUES
(11, 'Mukhlis Bara Pamungkas', 'Blitar,12-02-2002', 'Laki-laki', 'XI IPA 2', 'Islam', '081351419055', 'Blitar'),
(12, 'Bayu', 'Surabaya, 12-01-2003', 'Laki-laki', 'X IPA 1', 'Islam', '081425262738', 'Surabaya, Jawa Timur'),
(13, 'Denas', 'Surabaya, 19-03-2001', 'Laki-laki', 'XII IPA 3', 'Islam', '087165171823', 'Surabaya, Jawa Timur'),
(14, 'tes', 'Jakarta,12-03-2003', 'Laki-laki', 'XI IPA 1', 'Islam', '0430243132', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `id_t_buku` int(11) NOT NULL,
  `nama_buku` varchar(128) NOT NULL,
  `penulis` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `gambar` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`id_t_buku`, `nama_buku`, `penulis`, `penerbit`, `tahun_terbit`, `gambar`) VALUES
(2, '100 Quotes Simple Thinking about Blood Type', 'Park Dong Sun', 'Penerbit Haru', 2016, '100 Quotes Simple Thinking about Blood Type.jpg'),
(3, 'Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', 2016, 'hujan.jpg'),
(5, 'The Hidden Prince', 'Jjea Mayang', 'Sinar Kejora', 2015, 'The Hidden Prince.jpg'),
(17, 'Cinta Yang Diacuhkan', 'Bara', 'Restu Jaya', 2020, 'cinta yang diacuhkan.jpg'),
(18, 'Cinta Dalam Ikhlas', 'Abay Adhitya', 'Gramedia', 2016, 'cinta dalam ikhlas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam`
--

CREATE TABLE `t_pinjam` (
  `id_t_pinjam` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `jml_pinjam` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pinjam`
--

INSERT INTO `t_pinjam` (`id_t_pinjam`, `nama`, `judul_buku`, `kelas`, `tgl_pinjam`, `tgl_kembali`, `keterangan`, `jml_pinjam`) VALUES
(9, 'Mukhlis Bara Pamungkas', 'Cinta yang tidak diacuhkan', 'XI IPA 1', '2021-06-12', '2021-06-19', 'Belum kembali', '10'),
(10, 'Dodi widodo', 'Hujan', 'XII IPS 3', '2021-06-12', '2021-06-19', 'Belum kembali', '12'),
(11, 'Dendi widodo', 'Hujan', 'X IPS 2', '2021-06-12', '2021-06-19', 'Belum kembali', '5'),
(15, 'Dodi', 'Hujan', 'XII IPA 1', '2021-06-11', '2021-06-18', 'Belum kembali', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_t_anggota`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_t_buku`);

--
-- Indexes for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD PRIMARY KEY (`id_t_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grafik`
--
ALTER TABLE `grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_t_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_t_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_t_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
