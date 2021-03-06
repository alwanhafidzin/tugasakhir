-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 05:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `absensi_permapel`
--

CREATE TABLE `absensi_permapel` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_permapel`
--

INSERT INTO `absensi_permapel` (`id`, `tanggal`, `id_jadwal`, `nip`) VALUES
(1, '2021-05-17', 109, '3509176412630001'),
(2, '2021-05-24', 109, '3509176412630001'),
(3, '2021-05-10', 109, '3509176412630001'),
(4, '2021-04-26', 109, '3509176412630001'),
(5, '2021-05-03', 109, '3509176412630001'),
(6, '2021-03-22', 109, '3509176412630001'),
(7, '2021-02-15', 109, '3509176412630001'),
(8, '2021-01-04', 109, '3509176412630001'),
(9, '2021-02-01', 109, '3509176412630001'),
(10, '2021-03-08', 109, '3509176412630001'),
(11, '2020-11-23', 109, '3509176412630001'),
(12, '2020-11-02', 109, '3509176412630001'),
(13, '2021-05-31', 109, '3509176412630001'),
(14, '2021-06-14', 109, '3509176412630001');

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
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id` int(11) NOT NULL,
  `id_k_ujian` int(11) NOT NULL,
  `id_k_soal` int(11) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `dibuat_pada` datetime NOT NULL,
  `diupdate_pada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `id_k_ujian`, `id_k_soal`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`, `dibuat_pada`, `diupdate_pada`) VALUES
(2, 3, 4, '<p>Fluida Statis Adalah</p>', '<p>100 m/s</p>', '<p>200 m/s</p>', '<p>300 m/s</p>', '<p>400 m/s</p>', '<p>500 m/s</p>', 'A', '2021-06-05 11:12:58', '2021-06-05 11:12:58'),
(3, 3, 4, '<p>Pada gambar di bawah ini sebutkan 500 hal yang merupakafjkjfjfjfjkfjk</p><figure class=\"image image_resized image-style-align-center\" style=\"width:44.86%;\"><img src=\"http://localhost/tugasakhir/assets/admin_lte/plugins/ckfinder2/core/connector/php/connector.php?command=Proxy&amp;lang=en&amp;type=Files&amp;currentFolder=%2F&amp;hash=c61f44b73f1588f9&amp;fileName=AnimeX_138660.jpeg\"></figure><p>Jadi jawabannya adalah???..</p>', '<p>100 m/s</p>', '<p>200 m/s</p>', '<p>300 m/s</p>', '<p>400 m/s</p>', '<p>500 m/s</p>', 'A', '2021-06-05 11:15:17', '2021-06-05 11:15:17'),
(4, 3, 4, '<p>Diketahui sebuah diagram&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>Tkt</td><td>Opp</td><td>YYY</td><td>jkdjkdkj</td><td>kjdjkdj</td><td>ddd</td><td>ddd</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', '<p>A</p>', '<p>B</p>', '<p>B</p>', '<p>D</p>', '<p>E</p>', 'A', '2021-06-05 11:29:27', '2021-06-05 11:29:27'),
(5, 3, 4, '<p style=\"margin-left:0px;\">Here is my unforgettable experience. One day I joined a story telling contest. Two of my friends and I had been chosen to take a part in the final round at the district level. I was very happy and eager to win the competition.</p><p style=\"margin-left:0px;\">For preparation, I had to memorize and understand the story well. My teacher guided and taught me pronunciation, facial expression and gestures. One day, before performing, my friends and I were busy to prepare the props and costumes for the competition. Thing that made me sad was my teacher rented the props and costumes for my friends but not for me.</p><p style=\"margin-left:0px;\">My two friends had beautiful costumes and luxurious props. Although I just wore the simple ones, I performed my best to win the competition. The competition started. I got number 29 and my friends got number 5 and 10. I was nervous but I showed my best performance on stage. Lots of people took photos and videos of me.</p><p style=\"margin-left:0px;\">Finally, anxiety was gone after I had finished performing. And then, the announcement came which made three of us very uneasy. Luckily I was chosen as the first winner. I went to the stage and all the judges congratulated me and gave a plaque, trophy, and money. I was very happy.</p>', '<p>AJAJ</p>', '<p>aaa</p>', '<p>aaa</p>', '<p>aa</p>', '<p>aa</p>', 'A', '2021-06-05 11:46:42', '2021-06-05 11:46:42'),
(6, 3, 4, '<p style=\"margin-left:0px;\">Here is my unforgettable experience. One day I joined a story telling contest. Two of my friends and I had been chosen to take a part in the final round at the district level. I was very happy and eager to win the competition.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp; Last week, Valerie and her friends from SMP Perdamaian Surabaya, learned how to make donut in Ring Master Donuts and Coffee at Tunjungan Plaza, Surabaya.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First, they listened to the story of Mister Ringo, the baker, and soon they had a trip to the kitchen. The baker showed them how to shape the donuts, to restore, to fry and add the donuts with various kinds of topping and filling.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Finally, the students had their chance to make their own donuts. The baker only gave each them a piece of yellow dough and some flour. Amazingly, the students could make their own donuts.</p><p style=\"margin-left:0px;text-align:justify;\">Where did the students go last week?</p>', '<p>AJAJ</p>', '<p>aaa</p>', '<p>aaa</p>', '<p>aa</p>', '<p>aa</p>', 'A', '2021-06-05 11:47:57', '2021-06-05 11:47:57'),
(7, 3, 3, '<figure class=\"image image_resized\" style=\"width:14.81%;\"><img src=\"https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/04/02/2732207174.jpg\"></figure><p>Cokelat adalah????</p>', '<p>Warna</p>', '<p>Makanan</p>', '<p>Minuman</p>', '<p>Tidak Tau</p>', '<p>Tidak bisa dipilih</p>', 'A', '2021-06-06 19:28:50', '2021-06-06 19:28:50');

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

--
-- Dumping data for table `data_kelas_siswa`
--

INSERT INTO `data_kelas_siswa` (`id`, `nis`, `kode_kelas`, `id_tahun_akademik`, `no_absen`) VALUES
(1, '1234', '10-MIA1', 1, 1),
(2, '21281', '10-MIA1', 1, 2),
(3, '12554', '10-MIA1', 1, 2),
(4, '1234', '11-MIA1', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_a_permapel`
--

CREATE TABLE `detail_a_permapel` (
  `id` bigint(20) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `id_a_permapel` int(11) NOT NULL,
  `absensi` enum('0','H','I','A','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_a_permapel`
--

INSERT INTO `detail_a_permapel` (`id`, `nis`, `id_a_permapel`, `absensi`) VALUES
(1, '1234', 1, 'H'),
(2, '21281', 1, 'H'),
(3, '1234', 2, 'H'),
(4, '21281', 2, 'I'),
(5, '1234', 3, 'H'),
(6, '21281', 3, 'H'),
(7, '1234', 4, 'H'),
(8, '21281', 4, 'H'),
(9, '1234', 5, 'H'),
(10, '21281', 5, 'H'),
(11, '1234', 6, 'H'),
(12, '21281', 6, 'H'),
(13, '1234', 7, 'H'),
(14, '21281', 7, 'H'),
(15, '1234', 8, '0'),
(16, '21281', 8, '0'),
(17, '1234', 9, 'H'),
(18, '21281', 9, 'H'),
(19, '1234', 10, 'H'),
(20, '21281', 10, 'H'),
(21, '1234', 11, '0'),
(22, '21281', 11, '0'),
(23, '1234', 12, 'H'),
(24, '21281', 12, 'H'),
(25, '1234', 13, 'H'),
(26, '21281', 13, 'H'),
(27, '1234', 14, '0'),
(28, '21281', 14, '0');

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
(1, 'Admin', 'Administrator'),
(2, 'Guru', 'Guru SMAN 1 Sooko'),
(3, 'Siswa', 'Siswa SMAN 1 Sooko');

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
  `foto` text NOT NULL,
  `status` enum('active','tidak_active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `gender`, `id_agama`, `email`, `foto`, `status`) VALUES
('3509176412630001', 'Guru Smansasoo.spd', 'P', 1, 'alwanhafidzin@student.ub.ac.id', 'alwan.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `nip`, `kode_mapel`) VALUES
(1, '3509176412630001', 'M-FISIKA'),
(2, '3509176412630001', 'M-MTK1');

-- --------------------------------------------------------

--
-- Table structure for table `hari_masuk`
--

CREATE TABLE `hari_masuk` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `status` enum('Masuk','Libur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_masuk`
--

INSERT INTO `hari_masuk` (`id`, `hari`, `status`) VALUES
(1, 'Minggu', 'Libur'),
(2, 'Senin', 'Masuk'),
(3, 'Selasa', 'Masuk'),
(4, 'Rabu', 'Masuk'),
(5, 'Kamis', 'Masuk'),
(6, 'Jumat', 'Masuk'),
(7, 'Sabtu', 'Libur'),
(8, 'Belum Memilih Hari', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `id_m_perminggu` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode_kelas`, `nip`, `id_m_perminggu`, `id_hari`, `jam_mulai`, `jam_selesai`) VALUES
(109, '10-MIA1', '3509176412630001', 5, 2, '08:00:00', '09:20:00'),
(110, '10-MIA2', '', 5, 8, '00:00:00', '00:00:00'),
(111, '10-MIA3', '3509176412630001', 5, 3, '00:00:00', '00:00:00'),
(112, '10-MIA4', '', 5, 8, '00:00:00', '00:00:00'),
(113, '10-MIA5', '', 5, 8, '00:00:00', '00:00:00'),
(114, '10-MIA6', '', 5, 8, '00:00:00', '00:00:00'),
(115, '10-MIA7', '', 5, 8, '00:00:00', '00:00:00'),
(116, '10-MIA8', '', 5, 8, '00:00:00', '00:00:00'),
(117, '10-MIA9', '', 5, 8, '00:00:00', '00:00:00'),
(118, '11-MIA1', '', 6, 8, '00:00:00', '00:00:00'),
(119, '11-MIA2', '', 6, 8, '00:00:00', '00:00:00'),
(120, '11-MIA3', '', 6, 8, '00:00:00', '00:00:00'),
(121, '11-MIA4', '', 6, 8, '00:00:00', '00:00:00'),
(122, '11-MIA5', '', 6, 8, '00:00:00', '00:00:00'),
(123, '11-MIA6', '', 6, 8, '00:00:00', '00:00:00'),
(124, '11-MIA7', '3509176412630001', 6, 8, '00:00:00', '00:00:00'),
(125, '11-MIA8', '', 6, 8, '00:00:00', '00:00:00'),
(126, '11-MIA9', '', 6, 8, '00:00:00', '00:00:00'),
(127, '10-MIA1', '', 7, 2, '09:20:00', '10:05:00'),
(128, '10-MIA2', '', 7, 8, '00:00:00', '00:00:00'),
(129, '10-MIA3', '', 7, 8, '00:00:00', '00:00:00'),
(130, '10-MIA4', '', 7, 8, '00:00:00', '00:00:00'),
(131, '10-MIA5', '', 7, 8, '00:00:00', '00:00:00'),
(132, '10-MIA6', '', 7, 8, '00:00:00', '00:00:00'),
(133, '10-MIA7', '', 7, 8, '00:00:00', '00:00:00'),
(134, '10-MIA8', '', 7, 8, '00:00:00', '00:00:00'),
(135, '10-MIA9', '', 7, 8, '00:00:00', '00:00:00'),
(136, '12-MIA1', '3509176412630001', 8, 4, '11:20:00', '12:40:00'),
(137, '12-MIA1', '3509176412630001', 8, 2, '09:30:00', '10:30:00'),
(138, '12-MIA2', '', 8, 8, '00:00:00', '00:00:00'),
(139, '12-MIA2', '', 8, 8, '00:00:00', '00:00:00'),
(140, '12-MIA3', '', 8, 8, '00:00:00', '00:00:00'),
(141, '12-MIA3', '', 8, 8, '00:00:00', '00:00:00'),
(142, '12-MIA4', '', 8, 8, '00:00:00', '00:00:00'),
(143, '12-MIA4', '', 8, 8, '00:00:00', '00:00:00'),
(144, '12-MIA5', '', 8, 8, '00:00:00', '00:00:00'),
(145, '12-MIA5', '', 8, 8, '00:00:00', '00:00:00'),
(146, '12-MIA6', '', 8, 8, '00:00:00', '00:00:00'),
(147, '12-MIA6', '', 8, 8, '00:00:00', '00:00:00'),
(148, '12-MIA7', '', 8, 8, '00:00:00', '00:00:00'),
(149, '12-MIA7', '', 8, 8, '00:00:00', '00:00:00'),
(150, '12-MIA8', '', 8, 8, '00:00:00', '00:00:00'),
(151, '12-MIA8', '', 8, 8, '00:00:00', '00:00:00'),
(152, '12-MIA9', '3509176412630001', 8, 4, '13:20:00', '14:20:00'),
(153, '12-MIA9', '3509176412630001', 8, 2, '10:20:00', '12:40:00'),
(154, '10-MIA1', '', 9, 3, '07:00:00', '08:00:00'),
(155, '10-MIA2', '', 9, 8, '00:00:00', '00:00:00'),
(156, '10-MIA3', '', 9, 8, '00:00:00', '00:00:00'),
(157, '10-MIA4', '', 9, 8, '00:00:00', '00:00:00'),
(158, '10-MIA5', '', 9, 8, '00:00:00', '00:00:00'),
(159, '10-MIA6', '', 9, 8, '00:00:00', '00:00:00'),
(160, '10-MIA7', '', 9, 8, '00:00:00', '00:00:00'),
(161, '10-MIA8', '', 9, 8, '00:00:00', '00:00:00'),
(162, '10-MIA9', '', 9, 8, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jam_istirahat`
--

CREATE TABLE `jam_istirahat` (
  `id` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_istirahat`
--

INSERT INTO `jam_istirahat` (`id`, `id_hari`, `jam_mulai`, `jam_selesai`, `id_t_akademik`, `semester`) VALUES
(1, 2, '09:30:00', '10:20:00', 1, 'ganjil');

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
-- Table structure for table `kategori_soal`
--

CREATE TABLE `kategori_soal` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_soal`
--

INSERT INTO `kategori_soal` (`id`, `kategori`, `nip`) VALUES
(3, 'Fluida Dinamis 5', '3509176412630001'),
(4, 'Fluida Statis', '3509176412630001');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_ujian`
--

CREATE TABLE `kategori_ujian` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `kode_mapel` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_t_ujian` int(11) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `tgl_dibuat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_ujian`
--

INSERT INTO `kategori_ujian` (`id`, `nama_ujian`, `kode_mapel`, `id_t_ujian`, `nip`, `tgl_dibuat`) VALUES
(2, 'UH 2 Trigonometri', 'M-MTK1', 2, '3509176412630001', '2021-06-21 14:20:00'),
(3, 'UH Fluida Statis', 'M-FISIKA', 2, '3509176412630001', '2021-06-21 14:20:00'),
(5, 'Latihan Fluida', 'M-FISIKA', 1, '3509176412630001', '2021-06-21 14:20:00');

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
-- Table structure for table `komentar_tugas`
--

CREATE TABLE `komentar_tugas` (
  `id` bigint(20) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `id_t_share` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `mapel_perminggu`
--

CREATE TABLE `mapel_perminggu` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `kode_tingkat` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_perminggu`
--

INSERT INTO `mapel_perminggu` (`id`, `kode_mapel`, `jumlah`, `id_t_akademik`, `semester`, `kode_tingkat`) VALUES
(5, 'M-FISIKA', 1, 1, 'ganjil', '10'),
(6, 'M-MTK1', 1, 1, 'ganjil', '11'),
(7, 'M-Sejarah', 1, 1, 'ganjil', '10'),
(8, 'M-MTK1', 2, 1, 'ganjil', '12'),
(9, 'M-BDaerah', 1, 1, 'ganjil', '10');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `id_m_tipe` int(11) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `path` text NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul`, `content`, `id_m_tipe`, `nip`, `path`, `tgl_dibuat`) VALUES
(16, 'Fluida Statis', 'https://www.dropbox.com/s/z0d3k4ixdb9i1yd/dsahjsdj.pdf?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/dsahjsdj.pdf', '2021-06-16 11:11:56'),
(17, 'Upload Test', 'https://www.dropbox.com/s/z0d3k4ixdb9i1yd/dsahjsdj.pdf?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/dsahjsdj.pdf', '2021-06-16 11:12:13'),
(20, 'Fluida Dinamis', '<h1>Fluida Dinamis</h1><p style=\"margin-left:0px;\"><strong>Fluida dinamis</strong> merupakan fluida yang dianggap:</p><ul><li>Tidak kompresibel, jika diberi <a href=\"https://www.studiobelajar.com/tekanan-hidrostatis/\">tekanan</a> maka volumenya tidak berubah</li><li>Tidak mengalami gesekan, Pada saat mengalir, <a href=\"https://www.studiobelajar.com/gaya-gesek/\">gesekan</a> fluida degan dinding dapat diabaikan.</li><li>alirannya stasioner, tiap paket fluida memiliki arah aliran tertentu dan tidak terjadi turbulensi (pusaran-pusaran).</li><li>alirannya tunak (steady), aliran fluida memiliki kecepatan yang konstan terhadap waktu.</li></ul><p style=\"margin-left:0px;\">Lihat juga materi StudioBelajar.com lainnya:<br><a href=\"https://www.studiobelajar.com/medan-magnet/\">Medan Magnet</a><br><a href=\"https://www.studiobelajar.com/dioda/\">Kapasitor</a></p><h3 style=\"margin-left:0px;\">Jenis Aliran Fluida</h3><p style=\"margin-left:0px;\">Jenis aliran fluida dibagi menjadi dua jenis, yaitu:</p><p style=\"margin-left:0px;text-align:center;\">&nbsp;</p><ul><li>Aliran laminer, yakni aliran dimana paket fluida meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida tidak berseberangan dengan jalur lainnya. Aliran laminer adalah aliran ideal dan terjadi pada aliran fluida dengan kecepatan rendah.</li><li>Aliran turbulen, yaitu aliran dimana paket fluida tidak meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida dapat bersebrangan dengan jalur lainnya. Aliran turbulen ditandai dengan adanya pusaran-pusaran air (vortex atau turbulen) dan terjadi jika kecepatan alirannya tinggi.</li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=400%2C77&amp;ssl=1\" alt=\"jenis aliran fluida dinamis\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=300%2C58&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><h3 style=\"margin-left:0px;\">Komponen-komponen dalam Fluida Dinamis</h3><h3 style=\"margin-left:0px;\">Debit (Q)</h3><p style=\"margin-left:0px;\">Debit adalah jumlah volume fluida yang mengalir persatuan waktu (biasanya per detik). Besar debit aliran fluida dapat dicari dengan menggunakan satu dari dua formula ini:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+%5Cfrac%7BV%7D%7BT%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = \\frac{V}{T}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+Av&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = Av\"></figure><p style=\"margin-left:0px;\">dimana:<br>Q adalah debit aliran fluida (m<sup>3</sup>/s)<br>V adalah volume fluida (m<sup>3</sup>)<br>t adalah selang waktu (s)<br>A adalah luasan penampang aliran (m<sup>2</sup>)<br>v adalah kecepatan aliran fluida (m/s)</p><h2 style=\"margin-left:0px;\">Persamaan Kontinuitas</h2><p style=\"margin-left:0px;\">Karena fluida tidak mampu dimampatkan (inkompresibel), maka aliran fluida di sembarang titik sama. Jika ditinjau dari dua tempat, maka debit aliran 1 sama dengan debit aliran 2.</p><p style=\"margin-left:0px;\"><strong>Hukum Bernoulli</strong></p><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=400%2C188&amp;ssl=1\" alt=\"persamaan kontinuitas\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=300%2C141&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><p style=\"margin-left:0px;\"><a href=\"https://www.studiobelajar.com/hukum-bernoulli/\">Hukum Bernoulli</a> merupakan hukum yang berlandaskan <a href=\"https://www.studiobelajar.com/hukum-kekekalan-energi/\">kekekalan energi</a> per unit volume pada aliran fluida. Hukum ini menyatakan bahwa fluida pada keadaan tunak, ideal, dan inkompresibel; jumlah tekanan, <a href=\"https://www.studiobelajar.com/usaha-energi-rumus-kinetik-potensial/\">energi kinetik, dan energi potensialnya</a> memiliki nilai yang sama di sepanjang aliran. Jika ditinjau dari dua tempat, maka hukum Bernoulli dapat dinyatakan dengan:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Em_1+%3D+Em_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Em_1 = Em_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+Ek_1+%2B+Ep_1+%3D+P_2+%2B+Ek_2+%2B+Ep_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + Ek_1 + Ep_1 = P_2 + Ek_2 + Ep_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_1%5E2+%2B+%5Crho+g+h_1+%3D+P_2+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_2%5E2+%2B+%5Crho+g+h_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + \\frac{1}{2} \\rho v_1^2 + \\rho g h_1 = P_2 + \\frac{1}{2} \\rho v_2^2 + \\rho g h_2\"></figure><p style=\"margin-left:0px;\">dimana:</p><p style=\"margin-left:0px;\">P adalah tekanan (Pa)<br>&nbsp;</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Crho&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\rho\"></figure><p style=\"margin-left:0px;\">adalah massa jenis fluida (kg/m<sup>3</sup>)<br>g adalah percepatan gravitasi (9,8 m/s<sup>2</sup>)<br>h adalah ketinggian air (m)<br>v adalah kecepatan aliran fluida (m/s)</p><p style=\"margin-left:0px;\">Karena fluida disini merupakan fluida inkompresibel, maka massa jenisnya tidak berubah, sehingga persamaannya dapat disederhanakan menjadi:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_1%5E2+%2B+gh_1+%3D+%5Cfrac%7BP_2%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_2%5E2+%2B+gh_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1}{\\rho} + \\frac{1}{2} v_1^2 + gh_1 = \\frac{P_2}{\\rho} + \\frac{1}{2} v_2^2 + gh_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1+-+P_2%7D%7B%5Crho%7D+%3D+%5Cfrac%7B1%7D%7B2%7D+%28v_2%5E2+-+v_1%5E2%29+%2B+g%28h_2+-+h_1%29&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1 - P_2}{\\rho} = \\frac{1}{2} (v_2^2 - v_1^2) + g(h_2 - h_1)\"></figure><h2 style=\"margin-left:0px;\">Penerapan Hukum Bernoulli</h2><p style=\"margin-left:0px;\">Berikut ini merupakan fenomena yang terjadi maupun alat-alat yang menggunakan prinsip/hukum Bernoulli.</p><ul><li>Teorema Toricelli</li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/penerapan-hukum-bernoulli.png?resize=267%2C255&amp;ssl=1\" alt=\"penerapan hukum bernoulli\"></figure><p style=\"margin-left:0px;\">Fenomena air yang menyembur keluar dari lubang penyimpanan/tangki air dinamakan dengan teorema Toricelli. Besar energi kinetik air yang menyembur keluar dari lubang tangki air sama dengan besar energi potensialnya. Dengan begitu, kecepatan air pada lubang penyemburan sama dengan air yang jatuh bebas dari batas ketinggian air. Sehingga semakin besar perbedaan ketinggian lubang dengan batas ketinggian air, maka akan semakin cepat semburan airnya. Berdasarkan gambar diatas, dapat diformulasikan kecepatan air pada lubang tangki air sebesar:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D+%5Crho+v%5E2+%3D+%5Crho+g+h&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{1}{2} \\rho v^2 = \\rho g h\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=v%5E2+%3D+2+g+h&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"v^2 = 2 g h\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=v+%3D+%5Csqrt%7B2gh%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"v = \\sqrt{2gh}\"></figure><ul><li>Venturimeter</li></ul><p style=\"margin-left:0px;\">Sebuah alat yang berfungsi untuk mengukur debit aliran fluida dinamis yang mengalir di pipa dengan mengandalkan hukum bernoulli. Venturimeter berbentuk seperti pipa dimana bagian tengahnya menyempit lalu kemudian melebar kembali.</p><ul><li>Tabung pitot</li></ul><p style=\"margin-left:0px;\">Sebuah alat yang berfungsi untuk mengukur kelajuan aliran fluida dinamis dengan cara mengukur perbedaan tekanan aliran dengan dengan tekanan statisnya.</p><ul><li>Penyemprot</li></ul><p style=\"margin-left:0px;\">Seperti pada penyemprot obat nyamuk ataupun parfum, saat lubang kecil diberikan tekanan, maka akan mengalir udara dengan kecepatan tinggi di atas lubang tersebut sehingga tekanannya akan lebih rendah dari tekanan di dalam botol. Dengan demikian, fluida di dalam botol akan terhisap keluar dan ikut berhembus dengan aliran udara berkecepatan tinggi tersebut.</p><ul><li>Sayap pesawat terbang (Gaya Angkat Pesawat)</li></ul><p style=\"margin-left:0px;\">Pesawat dapat mengudara karena gaya angkat yang dihasilkan sayap saat pesawat tersebut melaju. Saat pesawat melaju, aliran fluida (udara) akan melewati sayap pesawat; aliran udara yang melewati sayap bagian atas melintas lebih jauh dibanding aliran udara yang melewati sayap bagian bawah; perbedaan kecepatan ini menimbulkan perbedaan tekanan dimana tekanan di sayap bagian atas akan lebih rendah dibanding tekanan pada sayap bagian bawah. Oleh karena sayap menerima tekanan dari bawah, maka sayap terdorong keatas (gaya angkat) yang juga ikut mendorong pesawat ke atas sehingga pesawat dapat mengudara.</p><figure class=\"image\"><img src=\"https://i1.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/gaya-angkat-pesawat.jpeg?resize=375%2C170&amp;ssl=1\" alt=\"gaya angkat pesawat\" srcset=\"https://i1.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/gaya-angkat-pesawat.jpeg?w=375&amp;ssl=1 375w, https://i1.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/gaya-angkat-pesawat.jpeg?resize=300%2C136&amp;ssl=1 300w\" sizes=\"100vw\" width=\"375\"></figure><p style=\"margin-left:0px;\">Dengan menggunakan hukum Bernoulli untuk sayap pesawat dibagian atas dan sayap pesawat di bagian bawah dimana tidak terdapat perbedaan ketinggian sehingga energi potensialnya sama-sama nol, didapat:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_1%5E2+%3D+P_2+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_2%5E2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + \\frac{1}{2} \\rho v_1^2 = P_2 + \\frac{1}{2} \\rho v_2^2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+-+P_2+%3D+%5Cfrac%7B1%7D%7B2%7D+%5Crho+%28v_2%5E2+-+v_1%5E2%29&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 - P_2 = \\frac{1}{2} \\rho (v_2^2 - v_1^2)\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+F_1+-+F_2+%3D+%5Cfrac%7B1%7D%7B2%7D+%5Crho+%28v_2%5E2+-+v_1%5E2%29A&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = F_1 - F_2 = \\frac{1}{2} \\rho (v_2^2 - v_1^2)A\"></figure><p style=\"margin-left:0px;\">dimana:</p><p style=\"margin-left:auto;text-align:center;\">&nbsp;</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+F_1+-+F_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = F_1 - F_2\"></figure><p style=\"margin-left:0px;\">adalah gaya angkat pesawat (N)<br>&nbsp;</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Crho&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\rho\"></figure><p style=\"margin-left:0px;\">adalah massa jenis udara (kg/m<sup>3</sup>)<br>A adalah luasan sayap pesawat (m<sup>2</sup>)<br>v<sub>1</sub> adalah kecepatan aliran udara pada bagian atas sayap (m/s)<br>v<sub>2</sub> adalah kecepatan aliran udara pada bagian bawah sayap (m/s)</p><h2 style=\"margin-left:0px;\">Contoh Soal Fluida Dinamis</h2><h3 style=\"margin-left:0px;\">Contoh Soal 1</h3><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/contoh-soal-fluida-dinamis-dan-pembahasan.png?resize=265%2C55&amp;ssl=1\" alt=\"contoh soal fluida dinamis dan pembahasan\"></figure><p style=\"margin-left:0px;\">Pada gambar diatas diketahui kecepatan fluida pada penampang besar 5 m/s. Berapa kecepatan aliran fluida pada penampang kecil jika diameter penampang besar dua kali dari diameter penampang kecil?</p><p style=\"margin-left:0px;\">Pembahasan:</p><p style=\"margin-left:0px;\">Dengan menggunakan persamaan kontinuitas didapat:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q_1+%3D+Q_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q_1 = Q_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=v_1+A_1+%3D+v_2+A_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"v_1 A_1 = v_2 A_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=v_2+%3D+%5Cfrac%7Bv_1+A_1%7D%7BA_2%7D+%3D+%5Cfrac%7B%285+m%2Fs%29A_1%7D%7B0%2C5+A_1%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"v_2 = \\frac{v_1 A_1}{A_2} = \\frac{(5 m/s)A_1}{0,5 A_1}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=v_2+%3D+10+m%2Fs&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"v_2 = 10 m/s\"></figure><h3 style=\"margin-left:0px;\">Contoh Soal 2</h3><p style=\"margin-left:0px;\">Sebuah pesawat dengan total luasan sayap sebesar 80 &nbsp;melaju dengan kecepatan 250 m/s. Jika kecepatan aliran udara pada bagian bawah pesawat sebesar 210 m/s, tentukan berapa besar maksimal berat total pesawat yang diperbolehkan agar pesawat dapat mengudara. (</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Crho_%7Budara%7D+%3D+1%2C2+kg%2Fm%5E3&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\rho_{udara} = 1,2 kg/m^3\"></figure><p style=\"margin-left:0px;\">).</p><p style=\"margin-left:0px;\">Pembahasan:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+F_%7Bsayap+atas%7D+-+F_%7Bsayap+bawah%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = F_{sayap atas} - F_{sayap bawah}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+%5Cfrac%7B1%7D%7B2%7D+%5Crho+%28v_%7Batas%7D%5E2+-+v_%7Bbawah%7D%5E2%29A&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = \\frac{1}{2} \\rho (v_{atas}^2 - v_{bawah}^2)A\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+%5Cfrac%7B1%7D%7B2%7D+%281%2C2+kg%2Fm%5E3%29%28250%5E2+-+210%5E2%29%2880+m%5E3%29&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = \\frac{1}{2} (1,2 kg/m^3)(250^2 - 210^2)(80 m^3)\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+883200+N&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = 883200 N\"></figure><p style=\"margin-left:0px;\">Agar pesawat dapat mengudara, maka gaya angkatnya harus dapat mengampu gaya beratnya, sehingga:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+W&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = W\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=F_%7Bangkat%7D+%3D+m_%7Btotal%7D+g&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"F_{angkat} = m_{total} g\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=m_%7Btotal%7D+%3D+%5Cfrac%7BF_%7Bangkat%7D%7D%7Bg%7D+%3D+%5Cfrac%7B883200+N%7D%7B10+m%2Fs%5E3%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"m_{total} = \\frac{F_{angkat}}{g} = \\frac{883200 N}{10 m/s^3}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=m_%7Btotal%7D+%3D+88320+kg+%3D+88%2C3+ton&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"m_{total} = 88320 kg = 88,3 ton\"></figure><p style=\"margin-left:0px;\">Artikel: Fluida Dinamis<br>Kontributor: Ibadurrahman<br>Mahasiswa S2 Dept. Teknik Mesin UI</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=wHO_YqVUGu8\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/wHO_YqVUGu8\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure>', 1, '3509176412630001', '', '2021-06-16 11:39:00'),
(21, 'Tes Buat Materi', '<h1>Tes</h1><p>dasjkdasjkdajkdajdjdajdjkdkjjdksajdka</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=wHO_YqVUGu8\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/wHO_YqVUGu8\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure>', 1, '3509176412630001', '', '2021-06-16 11:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `materi_share`
--

CREATE TABLE `materi_share` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kode_kelas` varchar(11) CHARACTER SET latin1 NOT NULL,
  `kode_mapel` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tgl_dibagikan` datetime NOT NULL,
  `tgl_jadwal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi_tipe`
--

CREATE TABLE `materi_tipe` (
  `id` int(11) NOT NULL,
  `jenis` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_tipe`
--

INSERT INTO `materi_tipe` (`id`, `jenis`) VALUES
(1, 'Editor'),
(2, 'Upload');

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
-- Table structure for table `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id` bigint(20) NOT NULL,
  `id_p_nilai` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `n_akhir` int(11) NOT NULL,
  `n_guru` int(11) NOT NULL,
  `n_keterampilan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_lain`
--

CREATE TABLE `nilai_lain` (
  `id` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_lain`
--

INSERT INTO `nilai_lain` (`id`, `tipe`) VALUES
(1, 'Latihan Soal'),
(2, 'Ulangan Harian'),
(3, 'Tugas'),
(4, 'UTS'),
(5, 'UAS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `id_nilai_lain` int(11) NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `kode_mapel` varchar(11) CHARACTER SET latin1 NOT NULL,
  `kode_kelas` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa_detail`
--

CREATE TABLE `nilai_siswa_detail` (
  `id` bigint(20) NOT NULL,
  `nis` varchar(8) CHARACTER SET latin1 NOT NULL,
  `id_nilai_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persentase_nilai`
--

CREATE TABLE `persentase_nilai` (
  `id` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `kode_mapel` varchar(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `latihan_soal` int(11) NOT NULL,
  `uh` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(10) NOT NULL,
  `ruangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `ruangan`) VALUES
('R-10M1', 'Ruangan Kelas X MIPA 1'),
('R-10M2', 'Ruangan Kelas X MIPA 2'),
('R-11M4', 'Ruangan kelas XI MIPA 4');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_siswa`
--

CREATE TABLE `ruangan_siswa` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan_siswa`
--

INSERT INTO `ruangan_siswa` (`id`, `kode_kelas`, `kode_ruangan`, `id_tahun_akademik`) VALUES
(1, '10-IIS1', 'R-10M2', 1),
(2, '10-IIS2', 'R-10M1', 1),
(3, '10-IIS3', 'R-11M4', 1),
(4, '10-IIS4', '1', 1),
(5, '10-IIS5', '1', 1),
(6, '10-MIA1', '0', 1),
(7, '10-MIA2', '0', 1),
(8, '10-MIA3', '0', 1),
(9, '10-MIA4', '0', 1),
(10, '10-MIA5', '0', 1),
(11, '10-MIA6', '0', 1),
(12, '10-MIA7', '0', 1),
(13, '10-MIA8', '0', 1),
(14, '10-MIA9', '0', 1),
(15, '11-IIS1', '0', 1),
(16, '11-IIS2', '0', 1),
(17, '11-IIS3', '0', 1),
(18, '11-IIS4', '0', 1),
(19, '11-IIS5', '0', 1),
(20, '11-MIA1', 'XIM4', 1),
(21, '11-MIA2', '0', 1),
(22, '11-MIA3', '0', 1),
(23, '11-MIA4', '0', 1),
(24, '11-MIA5', '0', 1),
(25, '11-MIA6', '0', 1),
(26, '11-MIA7', '0', 1),
(27, '11-MIA8', '0', 1),
(28, '11-MIA9', '0', 1),
(29, '12-IIS1', '0', 1),
(30, '12-IIS2', '0', 1),
(31, '12-IIS3', '0', 1),
(32, '12-IIS4', '0', 1),
(33, '12-IIS5', '0', 1),
(34, '12-MIA1', '0', 1),
(35, '12-MIA2', '0', 1),
(36, '12-MIA3', '0', 1),
(37, '12-MIA4', '0', 1),
(38, '12-MIA5', '0', 1),
(39, '12-MIA6', '0', 1),
(40, '12-MIA7', '0', 1),
(41, '12-MIA8', '1', 1),
(42, '12-MIA9', '0', 1),
(43, '10-IIS1', '0', 2),
(44, '10-IIS2', '0', 2),
(45, '10-IIS3', '0', 2),
(46, '10-IIS4', '0', 2),
(47, '10-IIS5', '0', 2),
(48, '10-MIA1', '0', 2),
(49, '10-MIA2', '0', 2),
(50, '10-MIA3', '0', 2),
(51, '10-MIA4', '0', 2),
(52, '10-MIA5', '0', 2),
(53, '10-MIA6', '0', 2),
(54, '10-MIA7', '0', 2),
(55, '10-MIA8', '0', 2),
(56, '10-MIA9', '0', 2),
(57, '11-IIS1', '0', 2),
(58, '11-IIS2', '0', 2),
(59, '11-IIS3', '0', 2),
(60, '11-IIS4', '0', 2),
(61, '11-IIS5', '0', 2),
(62, '11-MIA1', '0', 2),
(63, '11-MIA2', '0', 2),
(64, '11-MIA3', '0', 2),
(65, '11-MIA4', '0', 2),
(66, '11-MIA5', '0', 2),
(67, '11-MIA6', '0', 2),
(68, '11-MIA7', '0', 2),
(69, '11-MIA8', '0', 2),
(70, '11-MIA9', '0', 2),
(71, '12-IIS1', '0', 2),
(72, '12-IIS2', '0', 2),
(73, '12-IIS3', '0', 2),
(74, '12-IIS4', '0', 2),
(75, '12-IIS5', '0', 2),
(76, '12-MIA1', '0', 2),
(77, '12-MIA2', '0', 2),
(78, '12-MIA3', '0', 2),
(79, '12-MIA4', '0', 2),
(80, '12-MIA5', '0', 2),
(81, '12-MIA6', '0', 2),
(82, '12-MIA7', '0', 2),
(83, '12-MIA8', '0', 2),
(84, '12-MIA9', '0', 2),
(85, '10-IIS1', '0', 3),
(86, '10-IIS2', '0', 3),
(87, '10-IIS3', '0', 3),
(88, '10-IIS4', '0', 3),
(89, '10-IIS5', '0', 3),
(90, '10-MIA1', '0', 3),
(91, '10-MIA2', '0', 3),
(92, '10-MIA3', '0', 3),
(93, '10-MIA4', '0', 3),
(94, '10-MIA5', '0', 3),
(95, '10-MIA6', '0', 3),
(96, '10-MIA7', '0', 3),
(97, '10-MIA8', '0', 3),
(98, '10-MIA9', '0', 3),
(99, '11-IIS1', '0', 3),
(100, '11-IIS2', '0', 3),
(101, '11-IIS3', '0', 3),
(102, '11-IIS4', '0', 3),
(103, '11-IIS5', '0', 3),
(104, '11-MIA1', '0', 3),
(105, '11-MIA2', '0', 3),
(106, '11-MIA3', '0', 3),
(107, '11-MIA4', '0', 3),
(108, '11-MIA5', '0', 3),
(109, '11-MIA6', '0', 3),
(110, '11-MIA7', '0', 3),
(111, '11-MIA8', '0', 3),
(112, '11-MIA9', '0', 3),
(113, '12-IIS1', '0', 3),
(114, '12-IIS2', '0', 3),
(115, '12-IIS3', '0', 3),
(116, '12-IIS4', '0', 3),
(117, '12-IIS5', '0', 3),
(118, '12-MIA1', '0', 3),
(119, '12-MIA2', '0', 3),
(120, '12-MIA3', '0', 3),
(121, '12-MIA4', '0', 3),
(122, '12-MIA5', '0', 3),
(123, '12-MIA6', '0', 3),
(124, '12-MIA7', '0', 3),
(125, '12-MIA8', '0', 3),
(126, '12-MIA9', '0', 3),
(127, '10-IIS1', '0', 4),
(128, '10-IIS2', '0', 4),
(129, '10-IIS3', '0', 4),
(130, '10-IIS4', '0', 4),
(131, '10-IIS5', '0', 4),
(132, '10-MIA1', '0', 4),
(133, '10-MIA2', '0', 4),
(134, '10-MIA3', '0', 4),
(135, '10-MIA4', '0', 4),
(136, '10-MIA5', '0', 4),
(137, '10-MIA6', '0', 4),
(138, '10-MIA7', '0', 4),
(139, '10-MIA8', '0', 4),
(140, '10-MIA9', '0', 4),
(141, '11-IIS1', '0', 4),
(142, '11-IIS2', '0', 4),
(143, '11-IIS3', '0', 4),
(144, '11-IIS4', '0', 4),
(145, '11-IIS5', '0', 4),
(146, '11-MIA1', '0', 4),
(147, '11-MIA2', '0', 4),
(148, '11-MIA3', '0', 4),
(149, '11-MIA4', '0', 4),
(150, '11-MIA5', '0', 4),
(151, '11-MIA6', '0', 4),
(152, '11-MIA7', '0', 4),
(153, '11-MIA8', '0', 4),
(154, '11-MIA9', '0', 4),
(155, '12-IIS1', '0', 4),
(156, '12-IIS2', '0', 4),
(157, '12-IIS3', '0', 4),
(158, '12-IIS4', '0', 4),
(159, '12-IIS5', '0', 4),
(160, '12-MIA1', '0', 4),
(161, '12-MIA2', '0', 4),
(162, '12-MIA3', '0', 4),
(163, '12-MIA4', '0', 4),
(164, '12-MIA5', '0', 4),
(165, '12-MIA6', '0', 4),
(166, '12-MIA7', '0', 4),
(167, '12-MIA8', '0', 4),
(168, '12-MIA9', '0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `j_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('active','lulus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `email`, `j_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `tahun_masuk`, `foto`, `status`) VALUES
('1234', 'Alwan Hafidzin', 'alwanhafidzin@gmail.com', 'L', 'Mojokerto', '2000-02-17', 1, 2018, '1234.png', 'active'),
('12554', 'Siswa', 'mediakucerdas@gmail.com', 'L', 'Mojokerto', '2000-01-28', 1, 2016, 'alwan.jpg', 'active'),
('21281', 'Alwan3', 'alwanhfirdaus@gmail.com', 'L', 'Mojokerto', '2000-01-11', 1, 2018, '21281.PNG', 'active');

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
(1, '2020/2021', 'Y', 'ganjil'),
(2, '2030/2049', 'N', ''),
(3, '2030/20476', 'N', 'ganjil'),
(4, '2091309', 'N', '');

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
-- Table structure for table `tipe_ujian`
--

CREATE TABLE `tipe_ujian` (
  `id` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_ujian`
--

INSERT INTO `tipe_ujian` (`id`, `tipe`) VALUES
(1, 'Latihan Soal'),
(2, 'Ulangan Harian'),
(3, 'UTS'),
(4, 'UAS');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `content` longtext NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `kode_mapel` varchar(11) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `content`, `tgl_dibuat`, `nip`, `kode_mapel`) VALUES
(3, 'Teorema Phythogras', '<figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure><p>Teorema ini dibuat oleh phythogras</p>', '2021-06-03 06:05:31', '3509176412630001', 'M-MTK1'),
(38, 'Perkalian', '<p>Saya tidak dapat hadir dalam pertemuan selanjutnya silahkan kerjakan halaman 200 ya.kumpulkan dalam format pdf ya</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', '2021-06-18 03:14:30', '3509176412630001', 'M-FISIKA'),
(39, 'Tugas Matematika', '<p>Kerjakan halaman 110</p>', '2021-06-20 00:09:28', '3509176412630001', 'M-MTK1');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_share`
--

CREATE TABLE `tugas_share` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kode_kelas` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `tgl_share` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_share`
--

INSERT INTO `tugas_share` (`id`, `id_tugas`, `id_jadwal`, `kode_kelas`, `id_t_akademik`, `semester`, `tgl_jadwal`, `tgl_share`, `tgl_selesai`) VALUES
(1, 39, 137, '12-MIA1', 1, 'ganjil', '2021-06-21', '2021-06-20 04:38:20', '2021-06-23 19:43:00'),
(2, 38, 109, '10-MIA1', 1, 'ganjil', '2021-06-21', '2021-06-20 11:30:14', '2021-06-24 15:40:00'),
(3, 3, 137, '12-MIA1', 1, 'ganjil', '2021-06-21', '2021-06-20 11:35:23', '2021-06-24 14:06:00'),
(5, 3, 109, '11-MIA1', 2, 'ganjil', '2021-06-09', '2021-06-24 07:05:47', '2021-06-24 07:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_share_siswa`
--

CREATE TABLE `tugas_share_siswa` (
  `id` bigint(20) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `id_t_share` int(11) NOT NULL,
  `tanggal_pengumpulan` datetime NOT NULL,
  `nilai` int(11) NOT NULL,
  `file` text NOT NULL,
  `path` text NOT NULL,
  `url` text NOT NULL,
  `status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_share_siswa`
--

INSERT INTO `tugas_share_siswa` (`id`, `nis`, `id_t_share`, `tanggal_pengumpulan`, `nilai`, `file`, `path`, `url`, `status`) VALUES
(1, '1234', 1, '0000-00-00 00:00:00', 0, '', '', '', 'N'),
(2, '21281', 1, '0000-00-00 00:00:00', 0, '', '', '', 'N'),
(3, '1234', 2, '0000-00-00 00:00:00', 0, '', '', '', 'N'),
(4, '21281', 2, '0000-00-00 00:00:00', 0, '', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `id_k_ujian` int(11) NOT NULL,
  `kode_kelas` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL,
  `tgl_share` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `id_k_ujian`, `kode_kelas`, `id_jadwal`, `tgl_jadwal`, `id_t_akademik`, `semester`, `jumlah_soal`, `waktu`, `jenis`, `tgl_mulai`, `terlambat`, `token`, `tgl_share`) VALUES
(2, 3, '10-MIA1', 109, '2021-06-21', 1, 'ganjil', 6, 120, 'urut', '2021-06-22 20:00:00', '2021-06-24 19:20:00', 'XJHZQ', '2021-06-21 18:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_detail`
--

CREATE TABLE `ujian_detail` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nis` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nilai` int(11) NOT NULL,
  `nilai_remidi` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `selesai` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian_detail`
--

INSERT INTO `ujian_detail` (`id`, `id_ujian`, `nis`, `nilai`, `nilai_remidi`, `waktu_mulai`, `waktu_selesai`, `selesai`) VALUES
(1, 2, '1234', 33, 0, '2021-06-23 02:36:14', '2021-06-23 04:36:14', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_detail_soal`
--

CREATE TABLE `ujian_detail_soal` (
  `id` bigint(20) NOT NULL,
  `id_u_detail` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `status_jawaban` enum('0','B','S') NOT NULL,
  `ragu` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian_detail_soal`
--

INSERT INTO `ujian_detail_soal` (`id`, `id_u_detail`, `id_soal`, `jawaban`, `status_jawaban`, `ragu`) VALUES
(1, 1, 2, 'B', 'S', 'N'),
(2, 1, 3, 'A', 'B', 'N'),
(3, 1, 4, 'A', 'B', 'N'),
(4, 1, 5, 'B', 'S', 'N'),
(5, 1, 6, 'B', 'S', 'Y'),
(6, 1, 7, 'B', 'S', 'N');

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
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `nama`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$4iCItprhwu5rzEfUa1yTFek8ipt7bKIEkS4cemNFIcc./ivVYhS/a', 'alwanhafidzin@gmail.com', NULL, '', NULL, NULL, NULL, 'c6f1b023aa32be3690326bb3216da70629c2b139', '$2y$10$zZ0xzSuv0WeFp4avinLi2O3IURJYjU0Kqm00cFS26uYapkzi86bdy', 1268889823, 1624132216, 1, 'Alwan'),
(2, '::1', '3509176412630001', '$2y$10$4iCItprhwu5rzEfUa1yTFek8ipt7bKIEkS4cemNFIcc./ivVYhS/a', 'alwanhafidzin2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1623306754, 1623499440, 1, 'Alwan'),
(8, '::1', '3509176412630001', '$2y$10$4iCItprhwu5rzEfUa1yTFek8ipt7bKIEkS4cemNFIcc./ivVYhS/a', 'alwanhafidzin@student.ub.ac.id', NULL, NULL, NULL, NULL, NULL, 'd444a85185cdac03d6611582f55237dc6104c63d', '$2y$10$omBy9TNqGOsTbsSSrXFW4u2.e1quwu.NizCHeCBAKhcy/p4BCFzju', 1623486840, 1624536769, 1, 'Guru Smansasoo.spd'),
(11, '::1', '1234', '$2y$10$4iCItprhwu5rzEfUa1yTFek8ipt7bKIEkS4cemNFIcc./ivVYhS/a', 'alwanhfirdaus@gmail.com', NULL, NULL, NULL, NULL, NULL, 'abc6b1fae2f095d6349b50d4779c9b58034bc0ac', '$2y$10$D8nVJMPRn8f7sUMmD75w6eB7hnRoIE0snLHpwM3poKui4ueMWbNU.', 1623487397, 1624494472, 1, 'Alwan3');

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
(11, 1, 1),
(14, 2, 2),
(20, 8, 2),
(21, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `id_tahun_akademik`, `nip`, `kode_kelas`) VALUES
(1, 1, '1', '10-IIS1'),
(2, 1, '3509176412630001', '10-IIS2'),
(3, 1, '0', '10-IIS3'),
(4, 1, '1', '10-IIS4'),
(5, 1, '0', '10-IIS5'),
(6, 1, '0', '10-MIA1'),
(7, 1, '0', '10-MIA2'),
(8, 1, '0', '10-MIA3'),
(9, 1, '0', '10-MIA4'),
(10, 1, '0', '10-MIA5'),
(11, 1, '0', '10-MIA6'),
(12, 1, '0', '10-MIA7'),
(13, 1, '0', '10-MIA8'),
(14, 1, '0', '10-MIA9'),
(15, 1, '0', '11-IIS1'),
(16, 1, '0', '11-IIS2'),
(17, 1, '0', '11-IIS3'),
(18, 1, '0', '11-IIS4'),
(19, 1, '0', '11-IIS5'),
(20, 1, '0', '11-MIA1'),
(21, 1, '0', '11-MIA2'),
(22, 1, '0', '11-MIA3'),
(23, 1, '0', '11-MIA4'),
(24, 1, '0', '11-MIA5'),
(25, 1, '0', '11-MIA6'),
(26, 1, '0', '11-MIA7'),
(27, 1, '0', '11-MIA8'),
(28, 1, '0', '11-MIA9'),
(29, 1, '0', '12-IIS1'),
(30, 1, '0', '12-IIS2'),
(31, 1, '0', '12-IIS3'),
(32, 1, '0', '12-IIS4'),
(33, 1, '0', '12-IIS5'),
(34, 1, '0', '12-MIA1'),
(35, 1, '0', '12-MIA2'),
(36, 1, '0', '12-MIA3'),
(37, 1, '0', '12-MIA4'),
(38, 1, '0', '12-MIA5'),
(39, 1, '0', '12-MIA6'),
(40, 1, '0', '12-MIA7'),
(41, 1, '0', '12-MIA8'),
(42, 1, '0', '12-MIA9'),
(43, 2, '0', '10-IIS1'),
(44, 2, '0', '10-IIS2'),
(45, 2, '0', '10-IIS3'),
(46, 2, '0', '10-IIS4'),
(47, 2, '0', '10-IIS5'),
(48, 2, '0', '10-MIA1'),
(49, 2, '0', '10-MIA2'),
(50, 2, '0', '10-MIA3'),
(51, 2, '0', '10-MIA4'),
(52, 2, '0', '10-MIA5'),
(53, 2, '0', '10-MIA6'),
(54, 2, '0', '10-MIA7'),
(55, 2, '0', '10-MIA8'),
(56, 2, '0', '10-MIA9'),
(57, 2, '0', '11-IIS1'),
(58, 2, '0', '11-IIS2'),
(59, 2, '0', '11-IIS3'),
(60, 2, '0', '11-IIS4'),
(61, 2, '0', '11-IIS5'),
(62, 2, '0', '11-MIA1'),
(63, 2, '0', '11-MIA2'),
(64, 2, '0', '11-MIA3'),
(65, 2, '0', '11-MIA4'),
(66, 2, '0', '11-MIA5'),
(67, 2, '0', '11-MIA6'),
(68, 2, '0', '11-MIA7'),
(69, 2, '0', '11-MIA8'),
(70, 2, '0', '11-MIA9'),
(71, 2, '0', '12-IIS1'),
(72, 2, '0', '12-IIS2'),
(73, 2, '0', '12-IIS3'),
(74, 2, '0', '12-IIS4'),
(75, 2, '0', '12-IIS5'),
(76, 2, '0', '12-MIA1'),
(77, 2, '0', '12-MIA2'),
(78, 2, '0', '12-MIA3'),
(79, 2, '0', '12-MIA4'),
(80, 2, '0', '12-MIA5'),
(81, 2, '0', '12-MIA6'),
(82, 2, '0', '12-MIA7'),
(83, 2, '0', '12-MIA8'),
(84, 2, '0', '12-MIA9'),
(85, 3, '0', '10-IIS1'),
(86, 3, '0', '10-IIS2'),
(87, 3, '0', '10-IIS3'),
(88, 3, '0', '10-IIS4'),
(89, 3, '0', '10-IIS5'),
(90, 3, '0', '10-MIA1'),
(91, 3, '0', '10-MIA2'),
(92, 3, '0', '10-MIA3'),
(93, 3, '0', '10-MIA4'),
(94, 3, '0', '10-MIA5'),
(95, 3, '0', '10-MIA6'),
(96, 3, '0', '10-MIA7'),
(97, 3, '0', '10-MIA8'),
(98, 3, '0', '10-MIA9'),
(99, 3, '0', '11-IIS1'),
(100, 3, '0', '11-IIS2'),
(101, 3, '0', '11-IIS3'),
(102, 3, '0', '11-IIS4'),
(103, 3, '0', '11-IIS5'),
(104, 3, '0', '11-MIA1'),
(105, 3, '0', '11-MIA2'),
(106, 3, '0', '11-MIA3'),
(107, 3, '0', '11-MIA4'),
(108, 3, '0', '11-MIA5'),
(109, 3, '0', '11-MIA6'),
(110, 3, '0', '11-MIA7'),
(111, 3, '0', '11-MIA8'),
(112, 3, '0', '11-MIA9'),
(113, 3, '0', '12-IIS1'),
(114, 3, '0', '12-IIS2'),
(115, 3, '0', '12-IIS3'),
(116, 3, '0', '12-IIS4'),
(117, 3, '0', '12-IIS5'),
(118, 3, '0', '12-MIA1'),
(119, 3, '0', '12-MIA2'),
(120, 3, '0', '12-MIA3'),
(121, 3, '0', '12-MIA4'),
(122, 3, '0', '12-MIA5'),
(123, 3, '0', '12-MIA6'),
(124, 3, '0', '12-MIA7'),
(125, 3, '0', '12-MIA8'),
(126, 3, '0', '12-MIA9'),
(127, 4, '0', '10-IIS1'),
(128, 4, '0', '10-IIS2'),
(129, 4, '0', '10-IIS3'),
(130, 4, '0', '10-IIS4'),
(131, 4, '0', '10-IIS5'),
(132, 4, '0', '10-MIA1'),
(133, 4, '0', '10-MIA2'),
(134, 4, '0', '10-MIA3'),
(135, 4, '0', '10-MIA4'),
(136, 4, '0', '10-MIA5'),
(137, 4, '0', '10-MIA6'),
(138, 4, '0', '10-MIA7'),
(139, 4, '0', '10-MIA8'),
(140, 4, '0', '10-MIA9'),
(141, 4, '0', '11-IIS1'),
(142, 4, '0', '11-IIS2'),
(143, 4, '0', '11-IIS3'),
(144, 4, '0', '11-IIS4'),
(145, 4, '0', '11-IIS5'),
(146, 4, '0', '11-MIA1'),
(147, 4, '0', '11-MIA2'),
(148, 4, '0', '11-MIA3'),
(149, 4, '0', '11-MIA4'),
(150, 4, '0', '11-MIA5'),
(151, 4, '0', '11-MIA6'),
(152, 4, '0', '11-MIA7'),
(153, 4, '0', '11-MIA8'),
(154, 4, '0', '11-MIA9'),
(155, 4, '0', '12-IIS1'),
(156, 4, '0', '12-IIS2'),
(157, 4, '0', '12-IIS3'),
(158, 4, '0', '12-IIS4'),
(159, 4, '0', '12-IIS5'),
(160, 4, '0', '12-MIA1'),
(161, 4, '0', '12-MIA2'),
(162, 4, '0', '12-MIA3'),
(163, 4, '0', '12-MIA4'),
(164, 4, '0', '12-MIA5'),
(165, 4, '0', '12-MIA6'),
(166, 4, '0', '12-MIA7'),
(167, 4, '0', '12-MIA8'),
(168, 4, '0', '12-MIA9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_k_soal` (`id_k_soal`),
  ADD KEY `id_k_ujian` (`id_k_ujian`);

--
-- Indexes for table `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_a_permapel` (`id_a_permapel`);

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
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `hari_masuk`
--
ALTER TABLE `hari_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_m_perminggu` (`id_m_perminggu`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_t_akademik` (`id_t_akademik`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_ujian` (`id_t_ujian`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nip` (`nip`);

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
-- Indexes for table `komentar_tugas`
--
ALTER TABLE `komentar_tugas`
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
-- Indexes for table `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_akademik` (`id_t_akademik`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_m_tipe` (`id_m_tipe`);

--
-- Indexes for table `materi_share`
--
ALTER TABLE `materi_share`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_akademik` (`id_t_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `materi_tipe`
--
ALTER TABLE `materi_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_p_nilai` (`id_p_nilai`);

--
-- Indexes for table `nilai_lain`
--
ALTER TABLE `nilai_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_nilai_lain` (`id_nilai_lain`),
  ADD KEY `id_t_akademik` (`id_t_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `nilai_siswa_detail`
--
ALTER TABLE `nilai_siswa_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_nilai_siswa` (`id_nilai_siswa`);

--
-- Indexes for table `persentase_nilai`
--
ALTER TABLE `persentase_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predikat`
--
ALTER TABLE `predikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

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
-- Indexes for table `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `tugas_share`
--
ALTER TABLE `tugas_share`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_share` (`id_t_share`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_k_ujian` (`id_k_ujian`),
  ADD KEY `id_t_akademik` (`id_t_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_u_detail` (`id_u_detail`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hari_masuk`
--
ALTER TABLE `hari_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar_tugas`
--
ALTER TABLE `komentar_tugas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `materi_share`
--
ALTER TABLE `materi_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materi_tipe`
--
ALTER TABLE `materi_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_lain`
--
ALTER TABLE `nilai_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_siswa_detail`
--
ALTER TABLE `nilai_siswa_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persentase_nilai`
--
ALTER TABLE `persentase_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predikat`
--
ALTER TABLE `predikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tugas_share`
--
ALTER TABLE `tugas_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  ADD CONSTRAINT `absensi_permapel_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `absensi_permapel_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `bank_soal_ibfk_2` FOREIGN KEY (`id_k_soal`) REFERENCES `kategori_soal` (`id`),
  ADD CONSTRAINT `bank_soal_ibfk_3` FOREIGN KEY (`id_k_ujian`) REFERENCES `kategori_ujian` (`id`);

--
-- Constraints for table `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  ADD CONSTRAINT `data_kelas_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `data_kelas_siswa_ibfk_2` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `data_kelas_siswa_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  ADD CONSTRAINT `detail_a_permapel_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `detail_a_permapel_ibfk_2` FOREIGN KEY (`id_a_permapel`) REFERENCES `absensi_permapel` (`id`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Constraints for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `guru_mapel_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_m_perminggu`) REFERENCES `mapel_perminggu` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari_masuk` (`id`);

--
-- Constraints for table `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  ADD CONSTRAINT `jam_istirahat_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari_masuk` (`id`),
  ADD CONSTRAINT `jam_istirahat_ibfk_2` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Constraints for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD CONSTRAINT `kategori_soal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  ADD CONSTRAINT `kategori_ujian_ibfk_1` FOREIGN KEY (`id_t_ujian`) REFERENCES `tipe_ujian` (`id`),
  ADD CONSTRAINT `kategori_ujian_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`),
  ADD CONSTRAINT `kategori_ujian_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

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
-- Constraints for table `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  ADD CONSTRAINT `mapel_perminggu_ibfk_1` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_m_tipe`) REFERENCES `materi_tipe` (`id`);

--
-- Constraints for table `materi_share`
--
ALTER TABLE `materi_share`
  ADD CONSTRAINT `materi_share_ibfk_1` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `materi_share_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `materi_share_ibfk_3` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD CONSTRAINT `nilai_akhir_ibfk_1` FOREIGN KEY (`id_p_nilai`) REFERENCES `persentase_nilai` (`id`);

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `nilai_siswa_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `nilai_siswa_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `nilai_siswa_ibfk_3` FOREIGN KEY (`id_nilai_lain`) REFERENCES `nilai_lain` (`id`),
  ADD CONSTRAINT `nilai_siswa_ibfk_4` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `nilai_siswa_ibfk_5` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `nilai_siswa_ibfk_6` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `nilai_siswa_detail`
--
ALTER TABLE `nilai_siswa_detail`
  ADD CONSTRAINT `nilai_siswa_detail_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai_siswa_detail_ibfk_2` FOREIGN KEY (`id_nilai_siswa`) REFERENCES `nilai_siswa` (`id`);

--
-- Constraints for table `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  ADD CONSTRAINT `ruangan_siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `ruangan_siswa_ibfk_3` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `tugas_share`
--
ALTER TABLE `tugas_share`
  ADD CONSTRAINT `tugas_share_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `tugas_share_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id`),
  ADD CONSTRAINT `tugas_share_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  ADD CONSTRAINT `tugas_share_siswa_ibfk_1` FOREIGN KEY (`id_t_share`) REFERENCES `tugas_share` (`id`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_k_ujian`) REFERENCES `kategori_ujian` (`id`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `ujian_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `ujian_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD CONSTRAINT `ujian_detail_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `ujian_detail_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`);

--
-- Constraints for table `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  ADD CONSTRAINT `ujian_detail_soal_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `bank_soal` (`id`),
  ADD CONSTRAINT `ujian_detail_soal_ibfk_2` FOREIGN KEY (`id_u_detail`) REFERENCES `ujian_detail` (`id`);

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
