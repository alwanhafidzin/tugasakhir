-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 02:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smansaso_vclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas_siswa`
--

CREATE TABLE `data_kelas_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `no_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` enum('P','W') NOT NULL,
  `id_agama` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `gender`, `id_agama`, `email`, `foto`) VALUES
('3509176412630001', 'guru1', 'P', 1, 'guru1@gmail.com', 'alwan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(8) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `jurusan`) VALUES
('IPA', 'MIPA'),
('IPS', 'IIS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kode_tingkat` varchar(6) NOT NULL,
  `kode_jurusan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `kode_tingkat`, `kode_jurusan`) VALUES
('10-IIS1', 'X IPS 1', '10', 'IPS'),
('10-IIS2', 'X IPS 2', '10', 'IPS'),
('10-IIS3', 'X IPS 3', '10', 'IPS'),
('10-IIS4', 'X IPS 4', '10', 'IPS'),
('10-IIS5', 'X IPS 5', '10', 'IPS'),
('10-MIA1', 'X MIPA 1', '10', 'IPA'),
('10-MIA2', 'X MIPA 2', '10', 'IPA'),
('10-MIA3', 'X MIPA 3', '10', 'IPA'),
('10-MIA4', 'X MIPA 4', '10', 'IPA'),
('10-MIA5', 'X MIPA 5', '10', 'IPA'),
('10-MIA6', 'X MIPA 6', '10', 'IPA'),
('10-MIA7', 'X MIPA 7', '10', 'IPA'),
('10-MIA8', 'X MIPA 8', '10', 'IPA'),
('10-MIA9', 'X MIPA 9', '10', 'IPA'),
('11-IIS1', 'XI IPS 1', '11', 'IPS'),
('11-IIS2', 'XI IIS 2', '11', 'IPS'),
('11-IIS3', 'XI IPS  3', '11', 'IPS'),
('11-IIS4', 'XI IPS 4', '11', 'IPS'),
('11-IIS5', 'XI IPS 5', '11', 'IPS'),
('11-MIA1', 'XI MIPA 1', '11', 'IPA'),
('11-MIA2', 'XI MIPA 2', '11', 'IPA'),
('11-MIA3', 'XI MIPA 3', '11', 'IPA'),
('11-MIA4', 'XI MIPA  4', '11', 'IPA'),
('11-MIA5', 'XI MIPA 5', '11', 'IPA'),
('11-MIA6', 'XI MIPA 6', '11', 'IPA'),
('11-MIA7', 'XI MIPA 7', '11', 'IPA'),
('11-MIA8', 'XI MIPA 8', '11', 'IPA'),
('11-MIA9', 'XI MIPA 9', '11', 'IPA'),
('12-IIS1', 'XII IPS 1', '12', 'IPS'),
('12-IIS2', 'XII IPS 2', '12', 'IPS'),
('12-IIS3', 'XII IPS 3', '12', 'IPS'),
('12-IIS4', 'XII IPS 4', '12', 'IPS'),
('12-IIS5', 'XII IPS 5', '12', 'IPS'),
('12-MIA1', 'XII MIPA 1', '12', 'IPA'),
('12-MIA2', 'XII MIA 2', '12', 'IPA'),
('12-MIA3', 'XII MIPA 3', '12', 'IPA'),
('12-MIA4', 'XII MIPA 4', '12', 'IPA'),
('12-MIA5', 'XII MIPA 5', '12', 'IPA'),
('12-MIA6', 'XII MIPA 6', '12', 'IPA'),
('12-MIA7', 'XII MIPA 7', '12', 'IPA'),
('12-MIA8', 'XII MIPA 8', '12', 'IPA'),
('12-MIA9', 'XII MIPA 9', '12', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_mapel`
--

CREATE TABLE `kelompok_mapel` (
  `id` int(11) NOT NULL,
  `kelompok_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok_mapel`
--

INSERT INTO `kelompok_mapel` (`id`, `kelompok_mapel`) VALUES
(1, 'Kelompok A (Umum)'),
(2, 'Kelompok B (Wajib)'),
(3, 'Kelompok C (Peminatan)'),
(4, 'Kelompok D (Lintas Minat)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `id_k_mapel` int(11) NOT NULL,
  `kode_jurusan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `mapel`, `id_k_mapel`, `kode_jurusan`) VALUES
('M-BDaerah', 'Bahasa Daerah', 2, 'IPA'),
('M-FISIKA', 'Fisika', 3, 'IPA'),
('M-MTK1', 'Matematika Wajib', 1, 'IPA'),
('M-MTK2', 'Matematika Peminatan', 3, 'IPA'),
('M-Sejarah', 'Sejarah Indonesia', 4, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `link` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Data Siswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Guru', 'guru', 'fa fa-users', 0);

-- --------------------------------------------------------

--
-- Table structure for table `predikat`
--

CREATE TABLE `predikat` (
  `id` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `predikat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predikat`
--

INSERT INTO `predikat` (`id`, `nilai`, `predikat`) VALUES
(1, '<75', 'D'),
(2, '75-79', 'C'),
(3, '80-94', 'B'),
(4, '95-100', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `j_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `j_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `tahun_masuk`, `foto`) VALUES
('1234', 'Alwan Hafidzin', 'L', 'Mojokerto', '2000-02-17', 1, 2018, '1234.png'),
('21281', 'Alwan3', 'L', 'Mojokerto', '2000-01-11', 1, 2018, '21281.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(12) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(1, '2019/2020', 'N', 'ganjil'),
(2, '2020/2021', 'Y', 'ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kelas`
--

CREATE TABLE `tingkat_kelas` (
  `kode_tingkat` varchar(8) NOT NULL,
  `tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat_kelas`
--

INSERT INTO `tingkat_kelas` (`kode_tingkat`, `tingkatan`) VALUES
('10', 'kelas X'),
('11', 'Kelas XI'),
('12', 'Kelas XII');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nip_guru` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `id_tahun_akademik`, `nip_guru`, `kode_kelas`) VALUES
(1, 1, 0, 10),
(2, 1, 0, 10),
(3, 1, 0, 10),
(4, 1, 0, 10),
(5, 1, 0, 10),
(6, 1, 0, 10),
(7, 1, 0, 10),
(8, 1, 0, 10),
(9, 1, 0, 10),
(10, 1, 0, 10),
(11, 1, 0, 10),
(12, 1, 0, 10),
(13, 1, 0, 10),
(14, 1, 0, 10),
(15, 1, 0, 11),
(16, 1, 0, 11),
(17, 1, 0, 11),
(18, 1, 0, 11),
(19, 1, 0, 11),
(20, 1, 0, 11),
(21, 1, 0, 11),
(22, 1, 0, 11),
(23, 1, 0, 11),
(24, 1, 0, 11),
(25, 1, 0, 11),
(26, 1, 0, 11),
(27, 1, 0, 11),
(28, 1, 0, 11),
(29, 1, 0, 12),
(30, 1, 0, 12),
(31, 1, 0, 12),
(32, 1, 0, 12),
(33, 1, 0, 12),
(34, 1, 0, 12),
(35, 1, 0, 12),
(36, 1, 0, 12),
(37, 1, 0, 12),
(38, 1, 0, 12),
(39, 1, 0, 12),
(40, 1, 0, 12),
(41, 1, 0, 12),
(42, 1, 0, 12),
(43, 2, 0, 10),
(44, 2, 0, 10),
(45, 2, 0, 10),
(46, 2, 0, 10),
(47, 2, 0, 10),
(48, 2, 0, 10),
(49, 2, 0, 10),
(50, 2, 0, 10),
(51, 2, 0, 10),
(52, 2, 0, 10),
(53, 2, 0, 10),
(54, 2, 0, 10),
(55, 2, 0, 10),
(56, 2, 0, 10),
(57, 2, 0, 11),
(58, 2, 0, 11),
(59, 2, 0, 11),
(60, 2, 0, 11),
(61, 2, 0, 11),
(62, 2, 0, 11),
(63, 2, 0, 11),
(64, 2, 0, 11),
(65, 2, 0, 11),
(66, 2, 0, 11),
(67, 2, 0, 11),
(68, 2, 0, 11),
(69, 2, 0, 11),
(70, 2, 0, 11),
(71, 2, 0, 12),
(72, 2, 0, 12),
(73, 2, 0, 12),
(74, 2, 0, 12),
(75, 2, 0, 12),
(76, 2, 0, 12),
(77, 2, 0, 12),
(78, 2, 0, 12),
(79, 2, 0, 12),
(80, 2, 0, 12),
(81, 2, 0, 12),
(82, 2, 0, 12),
(83, 2, 0, 12),
(84, 2, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `option`) VALUES
(1, 'kuning'),
(2, 'hijau'),
(3, 'biru'),
(4, 'hijau'),
(5, 'merah'),
(6, 'kuning'),
(7, 'hijau'),
(8, 'biru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_tingkatan` (`kode_tingkat`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `id_k_mapel` (`id_k_mapel`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predikat`
--
ALTER TABLE `predikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  ADD PRIMARY KEY (`kode_tingkat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `predikat`
--
ALTER TABLE `predikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_tingkat`) REFERENCES `tingkat_kelas` (`kode_tingkat`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_k_mapel`) REFERENCES `kelompok_mapel` (`id`),
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
