-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 08:29 AM
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
-- Database: `al_bahjah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `id_bendahara` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `divisi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berkas_upload`
--

CREATE TABLE `berkas_upload` (
  `id_berkas_upload` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_berkas` enum('FOTO','KTP','KK','AKTE KELAHIRAN','RAPOT','IJAZAH','BUKTI PEMBAYARAN') DEFAULT NULL,
  `lokasi_upload` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calon_santri`
--

CREATE TABLE `calon_santri` (
  `id_calon_santri` int(11) NOT NULL,
  `id_program` int(2) DEFAULT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nik` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `negara` text DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `golongan_darah` enum('A','B','O','AB') DEFAULT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `status_verifikasi_registrasi` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_santri`
--

INSERT INTO `calon_santri` (`id_calon_santri`, `id_program`, `id_pembayaran`, `tanggal_registrasi`, `nama`, `nik`, `alamat`, `kota`, `negara`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `gender`, `golongan_darah`, `riwayat_penyakit`, `status_verifikasi_registrasi`, `id_operator`, `id_periode`) VALUES
(4, 2, 2, '2020-11-22', 'Qory Amanah Putra', '1304080708010003', 'Jorong Utara, Nagari Kumango, Kecamatan Sungai Tarab, Kabupaten Tanah Datar, Sumatera Barat', 'Batusangkar', 'Indonesia', 'SMAN 1 Batusangkar', 'Batusangkar', '2001-08-07', 'LAKI-LAKI', 'A', 'Hepatitis, Tifus, Gejala TB', 'TERVERIFIKASI', 1, 1),
(20, 1, 23, '2020-11-26', 'Hakim Permana', '987654321', 'Kumango Utara', 'Batusangkar', 'Indonesia', 'SMPN 5 Batusangkar', 'Batusangkar', '2006-03-25', 'LAKI-LAKI', 'A', 'Demam', 'TERVERIFIKASI', 0, 1),
(21, 1, 22, '2020-12-02', 'Haikal Kevin Permana', '982931742765', 'Kumango', 'Tanah Datar', 'Indonesia', 'SMPN 2 Batusangkar', 'BATUSANGKAR', '2007-07-21', 'LAKI-LAKI', 'A', 'Magh', 'TERVERIFIKASI', 1, 1),
(27, 2, 24, '2020-12-02', 'Ageng Prayoga', '7574', 'Palembang', 'Palembang', 'Indonesia', 'SMA Tunas Bangsa', 'Palembang', '2001-01-15', 'LAKI-LAKI', 'A', 'Masuk Angin', 'TERVERIFIKASI', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kelulusan`
--

CREATE TABLE `hasil_kelulusan` (
  `id_hasil_kelulusan` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `tanggal_kelulusan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_lulus` enum('DITERIMA','BELUM DITERIMA') DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_kelulusan`
--

INSERT INTO `hasil_kelulusan` (`id_hasil_kelulusan`, `id_calon_santri`, `tanggal_kelulusan`, `status_lulus`, `keterangan`) VALUES
(2, 4, '2020-12-02 01:39:58', 'DITERIMA', '-'),
(3, 20, '2020-11-29 12:10:16', 'DITERIMA', '-'),
(4, 21, '2020-12-02 06:18:23', 'DITERIMA', '-'),
(10, 27, '2020-12-02 06:40:26', 'DITERIMA', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal_ujian` int(11) NOT NULL,
  `tanggal` text DEFAULT NULL,
  `waktu` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal_ujian`, `tanggal`, `waktu`, `lokasi`, `keterangan`) VALUES
(1, '2020-11-11', '08:00', 'Bukit Besar', 'Ujian Group B'),
(2, '2020-11-12', '10:00', 'Bukit Besar', 'Ujian Group C'),
(4, '2020-11-13', '13:30', 'Indralaya', 'Ujian Group A'),
(5, '2020-11-15', '16:00', 'Musi Dua', 'Ujian Group Z'),
(6, '2020-11-15', '08:00', 'Indralaya', 'Ujian Group D'),
(7, '2020-11-16', '10:00', 'Bukit Besar', 'Ujian Group G'),
(8, '2021-11-17', '13:30', 'Bukit Besar', 'Ujian Group XD'),
(11, '2020-12-20', '10:00', 'Indralaya', 'Ujian Group NNN');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian_calon_santri`
--

CREATE TABLE `jadwal_ujian_calon_santri` (
  `id_jadwal_ujian_calon_santri` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `id_jadwal_ujian` int(11) DEFAULT NULL,
  `status_persetujuan` enum('SETUJU','BELUM SETUJU') DEFAULT NULL,
  `tanggal_setuju` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `divisi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL DEFAULT current_timestamp(),
  `bukti_pembayaran` text DEFAULT NULL,
  `nama_calon_santri` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_verifikasi` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `otp_pembayaran` text NOT NULL,
  `tanggal_verifikasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`, `nama_calon_santri`, `tanggal_lahir`, `status_verifikasi`, `id_bendahara`, `otp_pembayaran`, `tanggal_verifikasi`, `id_program`) VALUES
(2, '2020-11-21', 'dfdsg', 'Qory Amanah Putra', '2001-08-07', 'TERVERIFIKASI', 0, '58645987', '2020-11-17 02:31:02', 1),
(22, '2020-11-26', 'Ada.png', 'Haikal Kevin Permana', '2007-07-21', 'TERVERIFIKASI', 0, '23182498', '2020-11-26 02:43:09', 1),
(23, '2020-11-26', 'Berkas.jpg', 'Hakim Permana', '2006-03-25', 'TERVERIFIKASI', 1, '82547979', '2020-11-26 02:51:07', 1),
(24, '2020-12-02', 'Ada kok bang', 'Ageng Prayoga', '2001-01-15', 'TERVERIFIKASI', 1, '62506387', '2020-12-02 05:57:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `id_program` int(2) DEFAULT NULL,
  `tanggal_buka` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_tutup` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahun_ajaran_masehi` text DEFAULT NULL,
  `tahun_ajaran_hijriyah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `id_program`, `tanggal_buka`, `tanggal_tutup`, `tahun_ajaran_masehi`, `tahun_ajaran_hijriyah`) VALUES
(1, 1, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(2, 2, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(4, 3, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(5, 4, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(6, 5, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(7, 6, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(2) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama`) VALUES
(1, 'Pra Tahfidz'),
(2, 'Tahfidz'),
(3, 'Tafaqquh'),
(4, 'SD IQu'),
(5, 'SMP IQu'),
(6, 'SMA IQu');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(2) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `password`, `nama`, `email`) VALUES
(1, 1, '$2y$10$bewfFK4QNBE.zxGon0fq5OSyNYPonTNjEXFz5PjN.gfVDDtv4L2iy', 'Qory', 'asd@asd.asd');

-- --------------------------------------------------------

--
-- Table structure for table `wali_calon_santri`
--

CREATE TABLE `wali_calon_santri` (
  `id_wali_calon_santri` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `negara` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `no_ktp` text DEFAULT NULL,
  `gender` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `hubungan` enum('ORANG TUA KANDUNG','SAUDARA ORANG TUA','KAKEK/NENEK','LAINNYA') DEFAULT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_calon_santri`
--

INSERT INTO `wali_calon_santri` (`id_wali_calon_santri`, `id_calon_santri`, `nama`, `alamat`, `kota`, `negara`, `telepon`, `pekerjaan`, `no_ktp`, `gender`, `hubungan`, `email`) VALUES
(4, 4, 'Nazrahelma', 'Jorong Utara, Nagari Kumango, Kecamatan Sungai Tarab, Kabupaten Tanah Datar, Sumatera Barat', 'Batusangkar', 'Indonesia', '085363021295', 'Guru', '021027364378', 'PEREMPUAN', 'ORANG TUA KANDUNG', 'nazrahelma@gmail.com'),
(18, 20, 'Masrial', 'Sumanik', 'Batusangkar', 'Indonesia', '081365393983', 'Sopir', '987654321', 'LAKI-LAKI', 'ORANG TUA KANDUNG', 'masrial@gmail.com'),
(19, 21, 'Masrial', 'Kumango', 'Pekanbaru', 'Indonesia', '081365393983', 'Sopir', '2325246', 'LAKI-LAKI', 'ORANG TUA KANDUNG', 'masrial00@gmail.com'),
(21, 27, 'Sopia', 'Palembang', 'Palembang', 'Indonesia', '0813732646', 'IRT', '832648', 'PEREMPUAN', 'ORANG TUA KANDUNG', 'sopia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bendahara`
--
ALTER TABLE `bendahara`
  ADD PRIMARY KEY (`id_bendahara`);

--
-- Indexes for table `berkas_upload`
--
ALTER TABLE `berkas_upload`
  ADD PRIMARY KEY (`id_berkas_upload`);

--
-- Indexes for table `calon_santri`
--
ALTER TABLE `calon_santri`
  ADD PRIMARY KEY (`id_calon_santri`);

--
-- Indexes for table `hasil_kelulusan`
--
ALTER TABLE `hasil_kelulusan`
  ADD PRIMARY KEY (`id_hasil_kelulusan`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `jadwal_ujian_calon_santri`
--
ALTER TABLE `jadwal_ujian_calon_santri`
  ADD PRIMARY KEY (`id_jadwal_ujian_calon_santri`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_calon_santri`
--
ALTER TABLE `wali_calon_santri`
  ADD PRIMARY KEY (`id_wali_calon_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bendahara`
--
ALTER TABLE `bendahara`
  MODIFY `id_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas_upload`
--
ALTER TABLE `berkas_upload`
  MODIFY `id_berkas_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calon_santri`
--
ALTER TABLE `calon_santri`
  MODIFY `id_calon_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hasil_kelulusan`
--
ALTER TABLE `hasil_kelulusan`
  MODIFY `id_hasil_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_ujian_calon_santri`
--
ALTER TABLE `jadwal_ujian_calon_santri`
  MODIFY `id_jadwal_ujian_calon_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wali_calon_santri`
--
ALTER TABLE `wali_calon_santri`
  MODIFY `id_wali_calon_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
