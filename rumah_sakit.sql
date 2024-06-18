-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 08:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` int(11) NOT NULL,
  `no_rm` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `no_rm`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `nomor_hp`, `alamat`, `status`) VALUES
(1, 00000000002, 'azkal azkiya akbar', '123123', 'Magetan', '2024-06-02', 'laki-laki', 'mahasiswa', '0891232313', 'Tajem', 'sudah'),
(2, 00000000006, 'ghazi', '12345', 'Tangerang', '2024-02-21', 'laki-laki', 'mahasiswa', '089123', 'rembang', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bentuk` varchar(255) NOT NULL,
  `konsumen` varchar(255) NOT NULL,
  `kegunaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama`, `bentuk`, `konsumen`, `kegunaan`, `keterangan`) VALUES
('A-0001', 'Amoxicillin', 'Tablet, sirop, kapsul, dan suntik', 'Dewasa dan anak-anak', 'Mengatasi infeksi bakteri, termasuk gonore, otitis media, atau infeksi ginjal (pielonefritis)', 'Dosis amoxicillin yang diberikan oleh dokter tergantung pada kondisi yang ingin ditangani, tingkat keparahannya, serta usia dan berat badan pasien'),
('M-0001', 'Metoclopramide', 'Sirop, tablet, kaplet, suntik', 'Dewasa dan anak-anak', 'Meredakan mual dan muntah', 'Dewasa: 10 mg, 3 kali sehari Anak-anak: 1–5 mg, 3 kali sehari');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(10) NOT NULL,
  `no_rm` int(10) UNSIGNED ZEROFILL NOT NULL,
  `bb` varchar(255) NOT NULL,
  `tb` varchar(255) NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `td` varchar(255) NOT NULL,
  `dn` varchar(255) NOT NULL,
  `nafas` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `object` varchar(255) NOT NULL,
  `assesment` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `no_rm`, `bb`, `tb`, `suhu`, `td`, `dn`, `nafas`, `subject`, `object`, `assesment`, `plan`) VALUES
(28, 0000000002, '60kg', '170cm', '37C', '120/80', '60', '15', 'Mengeluhkan mual dan muntah', 'Suhu tubuh normal', 'Pasien mengalami gejala masuk angin', 'Pemberian obat dan istirahat yang cukup');

-- --------------------------------------------------------

--
-- Table structure for table `pendataan`
--

CREATE TABLE `pendataan` (
  `no_rm` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendataan`
--

INSERT INTO `pendataan` (`no_rm`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `nomor_hp`, `alamat`) VALUES
(00000000002, 'azkal azkiya akbar', '123123', 'Magetan', '2024-06-02', 'laki-laki', 'mahasiswa', '0891232313', 'Tajem'),
(00000000006, 'ghazi', '12345', 'Tangerang', '2024-02-21', 'laki-laki', 'mahasiswa', '089123', 'rembang'),
(00000000010, 'azkal', '12312', 'Madiun', '2024-06-05', 'laki-laki', 'mahasiswa', '089123', 'sleman'),
(00000000012, 'Mawarid', '1234567', 'Rembang', '2024-06-16', 'perempuan', 'mahasiswa', '089671100653', 'sleman');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id` int(11) NOT NULL,
  `no_rm` int(10) UNSIGNED ZEROFILL NOT NULL,
  `perawatan` varchar(255) NOT NULL,
  `obat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id`, `no_rm`, `perawatan`, `obat`, `keterangan`) VALUES
(10, 0000000002, 'Pemberian obat', 'Metoclopramide', 'Dosis 3x1');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `no_rm` int(10) UNSIGNED ZEROFILL NOT NULL,
  `tanggal_rawat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `no_rm`, `tanggal_rawat`) VALUES
(5, 0000000002, '2024-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `job`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'Azkal Azkiya', 'resepsionis1', 'resepsionis1', 'resepsionis'),
(3, 'dr. Arief Prasidi Wicaksono', 'dokter1', 'dokter1', 'dokter1'),
(4, 'Masita', 'apoteker1', 'apoteker1', 'apoteker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`),
  ADD KEY `FK_no_rm` (`no_rm`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_rm` (`no_rm`);

--
-- Indexes for table `pendataan`
--
ALTER TABLE `pendataan`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_rm` (`no_rm`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_rm` (`no_rm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `no_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pendataan`
--
ALTER TABLE `pendataan`
  MODIFY `no_rm` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `FK_no_rm` FOREIGN KEY (`no_rm`) REFERENCES `pendataan` (`no_rm`);

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pendataan` (`no_rm`);

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pemeriksaan` (`no_rm`);

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pemeriksaan` (`no_rm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
