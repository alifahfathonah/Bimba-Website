-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 01:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `telp_admin` varchar(16) NOT NULL,
  `alamat_admin` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `foto_admin` varchar(50) NOT NULL,
  `thumb_admin` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `telp_admin`, `alamat_admin`, `username`, `password`, `foto_admin`, `thumb_admin`, `status`, `dibuat`, `diubah`, `login`) VALUES
(6, 'ERIK WIBOWO', 'erikwibo@gmail.com', '081510815414', 'Kajen', 'erikwibo', '$2y$10$SUbB6miRmzhf7ZWzv/bi4udknrVaymUB531naCbY74FRJQxCTUAm.', 'admin_1588480251.jpg', 'admin_1588480251_thumb.jpg', 1, '2020-04-22 06:31:52', '2020-09-24 06:44:23', '2020-09-24 06:37:00'),
(8, 'Bimba', 'bimba@gmail.com', '081510815414', 'Kajen', 'bimba', '$2y$10$ZdHRvkdWLGfaIx5FiWbJNuUq36VKWBNxoU0Ii15TBqeoqNP4dx5M2', 'admin_1591965272.png', 'admin_1591965272_thumb.png', 1, '2020-06-12 12:34:32', '2020-06-12 19:34:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_berita` varchar(500) NOT NULL,
  `slug_berita` varchar(500) NOT NULL,
  `meta_berita` text NOT NULL,
  `foto_berita` varchar(50) NOT NULL,
  `thumb_berita` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `judul_berita`, `slug_berita`, `meta_berita`, `foto_berita`, `thumb_berita`, `isi_berita`, `publish`, `dibuat`, `diubah`) VALUES
(2, 6, 'Ini adalah judul', 'ini-adalah-judul.html', 'blog', 'blog_1588160886.jpg', 'blog_1588160886_thumb.jpg', 'Hahahahaha', 1, '2020-04-29 09:04:18', '2020-06-13 09:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(200) NOT NULL,
  `alamat_guru` varchar(500) DEFAULT NULL,
  `email_guru` varchar(100) NOT NULL,
  `password_guru` varchar(64) NOT NULL,
  `telepon_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) DEFAULT NULL,
  `thumb_guru` varchar(50) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat_guru`, `email_guru`, `password_guru`, `telepon_guru`, `foto_guru`, `thumb_guru`, `aktif`, `dibuat`, `diubah`, `login`) VALUES
(1, 'Diah', 'Kedungwuni', 'diah@gmail.com', '$2y$10$6gA9IxU/BkNwc3Ph2ZH33ueA20IGijq2ZcszgkyAnvDKqHubqBUwW', '081510815414', 'guru_1588147912.jpg', 'guru_1588147912_thumb.jpg', 1, '2020-04-29 08:11:52', '2020-04-29 15:13:44', NULL),
(3, 'Erik Wibowo', 'Kajen', 'erikwibo@gmail.com', '$2y$10$J.tGiMsIigXAqdKpY5qQ.Oi64Y3Kvkn3pCflgeB7i7rErmEruxhVy', '081510815414', 'guru_1588148170.jpg', 'guru_1588148170_thumb.jpg', 1, '2020-04-29 08:16:11', '2020-04-29 15:18:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nama_website` varchar(200) NOT NULL,
  `nama_singkat_website` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT 0,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `nama_website`, `nama_singkat_website`, `deskripsi`, `alamat`, `email`, `no_telepon`, `facebook`, `instagram`, `twitter`, `logo`, `favicon`, `aktif`, `dibuat`, `diubah`) VALUES
(1, 'BIMBA', 'BIMBA', 'Bimbingan Belajar Anak', 'Jalan Pahlawan No. 7 Kecamatan Kajen 51161 Kabupaten Pekalongan Jawa Tengah', 'erikwibo@gmail.com', '081510815414', 'erikwibo', 'erikwibo', 'erikwibo', 'luwakode.png', 'luwakode.png', 1, '2020-04-21 11:39:43', '2020-06-12 06:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `kode_kelas` varchar(7) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_guru`, `kode_kelas`, `nama_kelas`, `dibuat`, `diubah`) VALUES
(1, 3, '34Fgr7y', 'Pemrograman Mobile', '2020-05-07 15:52:16', '2020-05-07 23:53:56'),
(2, 1, '6r7PEnh', 'Bahasa Inggris', '2020-05-07 16:40:38', '2020-05-07 23:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(100) NOT NULL,
  `tipe_modul` enum('BACA','HURUF') NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `tipe_modul`, `dibuat`, `diubah`) VALUES
(1, 'HS-AIUE0', 'BACA', '2020-06-11 22:35:05', '2020-06-12 18:10:49'),
(2, 'B-1A', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:30'),
(3, 'B-1B', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:33'),
(4, 'B-1C', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:37'),
(5, 'B-1D', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:41'),
(6, 'B-1E', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:05'),
(7, 'B-2', 'BACA', '2020-06-11 22:35:05', '2020-06-12 05:35:05'),
(8, 'MTK-1a', 'HURUF', '2020-06-11 22:36:11', '2020-06-12 05:36:11'),
(9, 'MTK-1b', 'HURUF', '2020-06-11 22:36:11', '2020-06-12 05:36:11'),
(10, 'MTK-2A', 'HURUF', '2020-06-11 22:36:29', '2020-06-12 05:36:29'),
(11, 'MTK-2B', 'HURUF', '2020-06-11 22:36:29', '2020-06-12 05:36:29'),
(12, 'MTK-3A', 'HURUF', '2020-06-11 22:36:48', '2020-06-12 05:36:48'),
(13, 'MTK-3B', 'HURUF', '2020-06-11 22:36:48', '2020-06-12 05:36:48'),
(14, 'MTK-4A', 'HURUF', '2020-06-11 22:37:02', '2020-06-12 05:37:02'),
(15, 'MTK-4B', 'HURUF', '2020-06-11 22:37:02', '2020-06-12 05:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `nilai` enum('BB','MB','BSH','BSB') NOT NULL,
  `minggu` tinyint(1) NOT NULL,
  `bulan` tinyint(2) NOT NULL,
  `komentar` varchar(1000) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_siswa`, `id_modul`, `nilai`, `minggu`, `bulan`, `komentar`, `dibuat`, `diubah`) VALUES
(1, 1, 1, 'BB', 1, 1, 'Masih kaku', '2020-06-12 12:18:53', '2020-06-13 09:44:09'),
(3, 1, 2, 'MB', 2, 1, 'Sudah bisa baca huruf', '2020-06-13 02:43:33', '2020-06-13 09:44:23'),
(4, 1, 8, 'BB', 1, 1, 'Wkwkwkwk', '2020-06-18 16:37:40', '2020-06-18 23:37:40'),
(5, 2, 1, 'BB', 2, 1, 'egsegs', '2020-09-23 23:52:34', '2020-09-24 06:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_siswa`, `sertifikat`, `keterangan`, `dibuat`, `diubah`) VALUES
(14, 1, 'sertifikat_1592016993.jpg', 'Hasil 1', '2020-06-13 02:56:33', '2020-06-13 09:56:33'),
(18, 1, 'sertifikat_1592498158.jpg', 'Hasil 2', '2020-06-18 16:35:58', '2020-06-18 23:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jk_siswa` enum('L','P') NOT NULL,
  `tgl_lahir_siswa` date NOT NULL,
  `alamat_siswa` varchar(500) DEFAULT NULL,
  `agama` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `email_siswa` varchar(100) NOT NULL,
  `password_siswa` varchar(64) NOT NULL,
  `telepon_siswa` varchar(20) NOT NULL,
  `foto_siswa` varchar(50) DEFAULT NULL,
  `thumb_siswa` varchar(50) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_guru`, `nama_siswa`, `jk_siswa`, `tgl_lahir_siswa`, `alamat_siswa`, `agama`, `nama_ayah`, `nama_ibu`, `email_siswa`, `password_siswa`, `telepon_siswa`, `foto_siswa`, `thumb_siswa`, `aktif`, `dibuat`, `diubah`, `login`) VALUES
(1, 1, 'Diah', 'L', '2020-06-12', 'Kajen', 'KRISTEN', 'Steve', 'Michelle', 'diah@gmail.com', '$2y$10$8ohDPUN8vQ1IRVnYuYRZW.cpFjwC6/aG9H0oRmejF4vHJJeHdSUom', '081510815414', 'siswa_1592017156.jpg', 'siswa_1592017156_thumb.jpg', 1, '2020-04-29 08:26:32', '2020-09-24 06:51:31', NULL),
(2, 1, 'Erik Wibowo', 'L', '1995-06-30', 'Kajen', 'ISLAM', 'John', 'Cena', 'erikwibo@gmail.com', '$2y$10$8I8iP4ZKx9O6Fdnj1zZrYO0RGB.XLRey4zhwAjYJnCpnN.eJFfl8i', '081510815414', 'siswa_1591962167.jpg', 'siswa_1591962167_thumb.jpg', 1, '2020-06-12 10:40:02', '2020-09-24 06:46:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`,`email_admin`,`username`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`,`id_guru`,`kode_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`,`id_siswa`,`id_modul`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`,`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`,`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
