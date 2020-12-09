-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 12:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak_al_bahjah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asatidz`
--

CREATE TABLE `asatidz` (
  `id_asatidz` int(11) NOT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `nama_tanpa_gelar` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nik` text DEFAULT NULL,
  `nip` text DEFAULT NULL,
  `bidang_ilmu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asatidz`
--

INSERT INTO `asatidz` (`id_asatidz`, `nama_lengkap`, `nama_tanpa_gelar`, `tempat_lahir`, `tanggal_lahir`, `email`, `telepon`, `alamat`, `nik`, `nip`, `bidang_ilmu`) VALUES
(1, 'Dra. Linda Elita', 'Linda Elita', 'Sijunjuang', '1960-03-02', 'lindaelita@gmail.com', '081365271262', 'Baringin', '09861828', '6527235', 'Kimia'),
(3, 'Drs.H. Edi Martendrek', 'Edi Martendrek', 'Padang', '1962-07-27', 'edimartendrek@gmail.com', '082286151587', 'Sungayang', '9471734284', '6527235', 'Fisika'),
(4, 'Elfi S.Pdi', 'Elfi', 'Batusangkar', '1975-12-20', 'elfi@gmail.com', '085685620001', 'Ampalu Gadang', '987864532', '3256798', 'Tahfidzul Quran'),
(5, 'Dra. Nazrahelma', 'Nazrahelma', 'Sibolga', '1965-07-25', 'nazrahelma@gmail.com', '08562451787', 'Kumango', '7461897429871', '32856723658', 'Ekonomi'),
(6, 'Afrizon, S.Ag', 'Afrizon', 'Sungayang', '1966-07-13', 'afrizon@gmail.com', '08122366282', 'Sungayang', '31987981737', '28357298752', 'Pendidikan Agama Islam');

-- --------------------------------------------------------

--
-- Table structure for table `asatidz_kelas`
--

CREATE TABLE `asatidz_kelas` (
  `id_asatidz_kelas` int(11) NOT NULL,
  `id_kelas_mata_pelajaran` int(11) DEFAULT NULL,
  `id_asatidz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asatidz_kelas`
--

INSERT INTO `asatidz_kelas` (`id_asatidz_kelas`, `id_kelas_mata_pelajaran`, `id_asatidz`) VALUES
(1, 9, 1),
(2, 10, 3),
(3, 5, 4),
(7, 6, 4),
(8, 16, 6),
(9, 14, 5),
(10, 15, 6),
(12, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `id_bendahara` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(2) NOT NULL,
  `nama` text DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mata_pelajaran`
--

CREATE TABLE `kelas_mata_pelajaran` (
  `id_kelas_mata_pelajaran` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) DEFAULT NULL,
  `id_tahun_pelajaran` int(11) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `hari` int(1) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mata_pelajaran`
--

INSERT INTO `kelas_mata_pelajaran` (`id_kelas_mata_pelajaran`, `id_mata_pelajaran`, `id_tahun_pelajaran`, `id_ruang`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(5, 18, 1, 9, 5, '08:00:00', '09:40:00'),
(6, 19, 1, 8, 4, '08:50:00', '10:30:00'),
(7, 17, 1, 5, 1, '13:00:00', '14:40:00'),
(8, 8, 1, 10, 3, '10:30:00', '12:10:00'),
(9, 5, 1, 4, 1, '08:00:00', '09:40:00'),
(10, 6, 1, 2, 2, '08:50:00', '10:30:00'),
(11, 5, 1, 4, 6, '09:40:00', '10:30:00'),
(12, 21, 1, 4, 3, '13:00:00', '14:40:00'),
(13, 22, 1, 11, 3, '10:00:00', '11:40:00'),
(14, 14, 1, 6, 6, '10:30:00', '12:10:00'),
(15, 19, 1, 12, 1, '09:40:00', '10:30:00'),
(16, 11, 1, 10, 3, '09:40:00', '11:10:00'),
(17, 21, 1, 12, 1, '08:00:00', '08:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `tahun` int(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `tahun`, `deskripsi`) VALUES
(1, 2006, 'Kurikulum 2006 atau KTSP'),
(2, 2013, 'Kurikulum 2013 atau K-13');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_kurikulum` int(11) DEFAULT NULL,
  `jenis_mata_pelajaran` enum('UMUM','SYARIAH') DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `kode` text DEFAULT NULL,
  `singkatan` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `buku_referensi` text DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `id_kurikulum`, `jenis_mata_pelajaran`, `nama`, `kode`, `singkatan`, `deskripsi`, `buku_referensi`, `kelas`) VALUES
(5, 2, 'UMUM', 'Kimia', 'KIM-X-K13', 'Kim', 'Kimia K-13 Kelas X', 'Kimia Dasar 1', 'X'),
(6, 2, 'UMUM', 'Fisika', 'FIS-X-K13', 'Fis', 'Fisika K-13 Kelas X', 'Fisika Dasar 1', 'X'),
(7, 2, 'UMUM', 'Biologi', 'BIO-X-K13', 'Bio', 'Biologi K-13 Kelas X', 'Biologi Dasar 1', 'X'),
(8, 2, 'UMUM', 'Matematika Wajib', 'MTK-X-K13', 'Mtk', 'Matematika Wajib K-13 Kelas X', 'Matematika Dasar 1', 'X'),
(9, 2, 'UMUM', 'Matematika Peminatan', 'MTKP-X-K13', 'Mtkp', 'Matematika Peminatan K-13 Kelas X', 'Matematika Dasar 1 Peminatan', 'X'),
(10, 2, 'UMUM', 'Sejarah Indonesia', 'SJ-X-K13', 'Sj', 'Sejarah K-13 Kelas X', 'Pengantar Sejarah Indonesia', 'X'),
(11, 2, 'UMUM', 'Pendidikan Agama Islam', 'PAI-X-K13', 'Pai', 'Pendidikan Agama Islam K-13 Kelas X', 'PAI 1', 'X'),
(12, 2, 'UMUM', 'Pendidikan Kewarganegaraan', 'PKN-X-K13', 'Pkn', 'Pendidikan Kewarganegaraan K-13 Kelas X', 'Pengantar PKN', 'X'),
(13, 1, 'UMUM', 'Seni Budaya', 'SB-X-K13', 'Senbud', 'Seni Budaya K-13 Kelas X', 'Seni Budaya', 'X'),
(14, 2, 'UMUM', 'Ekonomi', 'EKO-X-K13', 'Eko', 'Ekonomi K-13 Kelas X', 'Dasar Ekonomi 1', 'X'),
(15, 2, 'UMUM', 'Geografi', 'GEO-X-K13', 'Geo', 'Geografi K-13 Kelas X', 'Pengantar Geografi', 'X'),
(16, 1, 'UMUM', 'Sosiologi', 'SOS-X-K13', 'Sos', 'Sosiologi K-13 Kelas X', 'Pengantar Sosiologi', 'X'),
(17, 2, 'SYARIAH', 'Bahasa Arab', 'BA-X-K13', 'Ba', 'Bahasa Arab K13 Kelas X', 'Dasar Bahasa Arab 1', 'X'),
(18, 2, 'SYARIAH', 'Tahfidzul Quran', 'THF-X-K13', 'Thf', 'Tahfidzul Quran K-13 Kelas X', 'Pengatar Tahfidzul Quran', 'X'),
(19, 2, 'SYARIAH', 'Pendidikan Akhlaq', 'AKH-X-K13', 'Akh', 'Pendidikan Akhlaq K-13 Kelas X', 'Pengantar Pendidikan Akhlaq', 'X'),
(20, 2, 'UMUM', 'Bahasa Indonesia', 'BI-X-K13', 'Bi', 'Bahasa Indonesia K-13 Kelas X', 'Bahasa Indonesia X', 'X'),
(21, 2, 'UMUM', 'Kimia', 'KIM-XI-K13', 'Kim', 'Kimia K-13 Kelas XI', 'Kimia Dasar 2', 'XI'),
(22, 1, 'UMUM', 'Teknologi Informasi dan Komunikasi', 'TIK-XI-2006', 'TIK', 'Teknologi Informasi dan Komunikasi KTSP Kelas XI', 'Pengantar TIK 1', 'XI');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran`
--

CREATE TABLE `nilai_mata_pelajaran` (
  `id_nilai_mata_pelajaran` int(11) NOT NULL,
  `id_peserta_kelas` int(11) DEFAULT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nilai_huruf` varchar(1) DEFAULT NULL,
  `nilai_angka` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mata_pelajaran`
--

INSERT INTO `nilai_mata_pelajaran` (`id_nilai_mata_pelajaran`, `id_peserta_kelas`, `tanggal_entry`, `nilai_huruf`, `nilai_angka`, `keterangan`) VALUES
(8, 25, '2020-12-02 06:47:39', 'A', 100, 'Sangat Baik'),
(9, 26, '2020-12-02 06:47:52', 'B', 88, 'Baik'),
(10, 27, '2020-12-02 06:36:33', 'F', 0, '-'),
(11, 28, '2020-12-02 06:48:05', 'A', 97, 'Sangat Baik'),
(12, 29, '2020-12-02 06:37:02', 'F', 0, '-'),
(13, 30, '2020-12-02 06:48:50', 'B', 86, 'Baik'),
(14, 31, '2020-12-02 06:42:43', 'F', 0, '-'),
(15, 32, '2020-12-02 06:42:50', 'F', 0, '-'),
(16, 33, '2020-12-02 06:42:55', 'F', 0, '-'),
(17, 34, '2020-12-02 06:48:28', 'A', 93, 'Sangat Baik'),
(18, 35, '2020-12-02 06:43:14', 'F', 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_bendahara` int(11) DEFAULT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jenis_pembayaran` enum('REGISTRASI ULANG','SPP') DEFAULT NULL,
  `bukti_berkas` text DEFAULT NULL,
  `status_verifikasi` enum('TERVERIFIKASI','BELUM') DEFAULT 'BELUM',
  `tanggal_verifikasi` date DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_entry`, `id_bendahara`, `id_santri`, `tanggal_pembayaran`, `jenis_pembayaran`, `bukti_berkas`, `status_verifikasi`, `tanggal_verifikasi`, `bulan`, `keterangan`, `nominal`) VALUES
(15, '2020-12-02 04:40:41', 1, 20, '2020-12-02', 'REGISTRASI ULANG', 'Bukti Berkas.jpg', 'BELUM', '2020-12-02', 12, 'Registrasi Ulang', 500000),
(16, '2020-12-02 04:41:51', 1, 20, '2020-12-02', 'SPP', 'Berkas Bayar Desember', 'BELUM', '2020-12-02', 12, 'SPP bulan desember', 1200000),
(17, '2020-12-08 07:44:14', 1, 21, '2020-12-02', 'REGISTRASI ULANG', 'Berkas Bayar Registrasi Ulang 2020', 'BELUM', '2020-12-08', 12, 'Registrasi Ulang', 1300000),
(18, '2020-12-02 06:39:27', 1, 22, '2020-12-02', 'REGISTRASI ULANG', 'bayar breh', 'BELUM', '2020-12-02', 12, 'Lunas', 2300000),
(19, '2020-12-02 06:39:48', 1, 22, '2020-12-02', 'SPP', 'Ini bukti', 'BELUM', '2020-12-02', 12, 'Dah bayar', 750000),
(20, '2020-12-02 06:41:11', 1, 23, '2020-12-02', 'REGISTRASI ULANG', 'Bayar bang', 'BELUM', '2020-12-02', 12, 'Lunas', 100000000),
(21, '2020-12-02 06:41:29', 1, 23, '2020-12-02', 'SPP', 'Spp bayar', 'BELUM', '2020-12-02', 12, 'Dah bayar bang', 830000);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kelas`
--

CREATE TABLE `peserta_kelas` (
  `id_peserta_kelas` int(11) NOT NULL,
  `id_kelas_mata_pelajaran` int(11) DEFAULT NULL,
  `id_santri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_kelas`
--

INSERT INTO `peserta_kelas` (`id_peserta_kelas`, `id_kelas_mata_pelajaran`, `id_santri`) VALUES
(25, 6, 20),
(26, 12, 20),
(27, 13, 20),
(28, 7, 21),
(29, 16, 21),
(30, 5, 22),
(31, 6, 22),
(32, 14, 22),
(33, 10, 23),
(34, 8, 23),
(35, 16, 23);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penempatan_cabang`
--

CREATE TABLE `riwayat_penempatan_cabang` (
  `id_riwayat_penempatan_cabang` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `id_cabang` int(2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_status_santri`
--

CREATE TABLE `riwayat_status_santri` (
  `id_riwayat_status_santri` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('TEREGISTRASI','AKTIF','CUTI','DO','LULUS','LAINNYA') DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Executive'),
(2, 'Operator'),
(3, 'Bendahara'),
(4, 'Wali Santri/Bakal Calon Santri');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `kode` text DEFAULT NULL,
  `singkatan` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `kapasitas` text DEFAULT NULL,
  `jenis_ruang` enum('KELAS','LABORATORIUM','LAPANGAN') DEFAULT NULL,
  `status_tersedia` enum('TERSEDIA','TIDAK TERSEDIA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama`, `kode`, `singkatan`, `lokasi`, `kapasitas`, `jenis_ruang`, `status_tersedia`) VALUES
(1, 'Gedung D Lantai 3 Kelas 2', 'D-32-K', 'D3.2', 'Gedung D Lantai 3', '30', 'KELAS', 'TERSEDIA'),
(2, 'Gedung B Lantai 2 Kelas 1', 'B-21-K', 'B2.1', 'Gedung B Lantai 2', '35', 'KELAS', 'TERSEDIA'),
(3, 'Laboratorium Rangkaian Digital', 'A-21-LAB', 'A2.1', 'Gedung A Lantai 2', '20', 'LABORATORIUM', 'TIDAK TERSEDIA'),
(4, 'Gedung D Lantai 2 Kelas 3', 'D-23-K', 'D2.3', 'Gedung D Lantai 2', '30', 'KELAS', 'TERSEDIA'),
(5, 'Gedung D Lantai 1 kelas 1', 'D-11-K', 'D1.1', 'Gedung D Lantai 1', '30', 'KELAS', 'TERSEDIA'),
(6, 'Gedung D Lantai 2 kelas 1', 'D-21-K', 'D2.1', 'Gedung D Lantai 2', '30', 'KELAS', 'TERSEDIA'),
(7, 'Gedung D Lantai 1 kelas 3', 'D-13-K', 'D1.3', 'Gedung D Lantai 1', '30', 'KELAS', 'TERSEDIA'),
(8, 'Gedung B Lantai 3 Kelas 3', 'B-33-K', 'B3.3', 'Gedung B Lantai 3', '30', 'KELAS', 'TERSEDIA'),
(9, 'Gedung B Lantai 1 Kelas 2', 'B-12-K', 'B1.2', 'Gedung B Lantai 1', '30', 'KELAS', 'TERSEDIA'),
(10, 'Gedung C Lantai 1 Kelas 1', 'C-11-K', 'C1.1', 'Gedung C Lantai 1', '30', 'KELAS', 'TERSEDIA'),
(11, 'Laboratorium Komputer', 'A-22-LAB', 'A2.2', 'Gedung A Lantai 2', '25', 'LABORATORIUM', 'TERSEDIA'),
(12, 'Gedung D Lantai 4 Kelas 3', 'D-43-K', 'D4.3', 'Gedung D lantai 4', '30', 'KELAS', 'TERSEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `nis` text DEFAULT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `status_verifikasi_registrasi_ulang` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `id_user` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `id_calon_santri`, `nis`, `tanggal_registrasi`, `status_verifikasi_registrasi_ulang`, `id_user`) VALUES
(20, 4, NULL, '2020-12-02', 'TERVERIFIKASI', '1304080708010003'),
(21, 21, NULL, '2020-12-02', 'TERVERIFIKASI', '982931742765'),
(22, 20, NULL, '2020-12-02', 'TERVERIFIKASI', '987654321'),
(37, 27, NULL, '2020-12-09', 'TERVERIFIKASI', '7574');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id_tahun_pelajaran` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun_pelajaran`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`) VALUES
(1, '2020-08-10', '2021-05-15', 'Tahun Ajaran 2020/2021'),
(2, '2021-08-13', '2022-05-09', 'Tahun Ajaran 2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(128) NOT NULL,
  `id_role` int(2) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `kode_aktifasi` text DEFAULT NULL,
  `Aktif` enum('BELUM_AKTIF','AKTIF') DEFAULT 'BELUM_AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `password`, `email`, `kode_aktifasi`, `Aktif`) VALUES
('1', 1, '$2y$10$bewfFK4QNBE.zxGon0fq5OSyNYPonTNjEXFz5PjN.gfVDDtv4L2iy', 'asd@asd.asd', '', 'BELUM_AKTIF'),
('1304080708010003', 4, '$2y$10$J/sDqdDm6D1v8hiklaZB5eDrYvyGI8iAhw5MiAsGt91RXu1apJ6MO', 'ilya3anggela@gmail.com', '353535', 'BELUM_AKTIF'),
('7574', 4, '$2y$10$Q9UmBJEqU5.Wtoq0DSoS/uLipJpgSDHi5ZAS17HGmBKYSCcjgKbH.', 'mail1@mail.com', '80096863', 'BELUM_AKTIF'),
('982931742765', 4, '$2y$10$mBaSTp/Kx6onb5ugLEyaa.QEPEEl7aHJWkLMlOHj/TtSQOzjF9ujG', 'qoryamanahputra07@gmail.com', '', 'BELUM_AKTIF'),
('987654321', 4, '$2y$10$VmU9P2zPyj.wqr.cwvENgOmHgjk22WiMoNfM7PIIr7E3LBRVOUSKK', 'qoryamanahputra0708@gmail.com', '', 'BELUM_AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asatidz`
--
ALTER TABLE `asatidz`
  ADD PRIMARY KEY (`id_asatidz`);

--
-- Indexes for table `asatidz_kelas`
--
ALTER TABLE `asatidz_kelas`
  ADD PRIMARY KEY (`id_asatidz_kelas`);

--
-- Indexes for table `bendahara`
--
ALTER TABLE `bendahara`
  ADD PRIMARY KEY (`id_bendahara`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD PRIMARY KEY (`id_kelas_mata_pelajaran`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  ADD PRIMARY KEY (`id_nilai_mata_pelajaran`);

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
-- Indexes for table `peserta_kelas`
--
ALTER TABLE `peserta_kelas`
  ADD PRIMARY KEY (`id_peserta_kelas`);

--
-- Indexes for table `riwayat_penempatan_cabang`
--
ALTER TABLE `riwayat_penempatan_cabang`
  ADD PRIMARY KEY (`id_riwayat_penempatan_cabang`);

--
-- Indexes for table `riwayat_status_santri`
--
ALTER TABLE `riwayat_status_santri`
  ADD PRIMARY KEY (`id_riwayat_status_santri`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id_tahun_pelajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asatidz`
--
ALTER TABLE `asatidz`
  MODIFY `id_asatidz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asatidz_kelas`
--
ALTER TABLE `asatidz_kelas`
  MODIFY `id_asatidz_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bendahara`
--
ALTER TABLE `bendahara`
  MODIFY `id_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id_kelas_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  MODIFY `id_nilai_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `peserta_kelas`
--
ALTER TABLE `peserta_kelas`
  MODIFY `id_peserta_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `riwayat_penempatan_cabang`
--
ALTER TABLE `riwayat_penempatan_cabang`
  MODIFY `id_riwayat_penempatan_cabang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_status_santri`
--
ALTER TABLE `riwayat_status_santri`
  MODIFY `id_riwayat_status_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id_tahun_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
