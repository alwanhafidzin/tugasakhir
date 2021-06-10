-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2021 pada 12.38
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

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
-- Struktur dari tabel `absensi_permapel`
--

CREATE TABLE `absensi_permapel` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_permapel`
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
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
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
-- Struktur dari tabel `bank_soal`
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
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `id_k_ujian`, `id_k_soal`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, 2, 4, '<p>Soal Ini Contoh<p>', '<p>100m/s<p>', '<p>100m/s<p>', '<p>100m/s<p>', '<p>100m/s<p>', '<p>100m/s<p>', 'A', '2021-06-05 08:15:11', '2021-06-05 08:15:11'),
(2, 3, 4, '<p>Fluida Statis Adalah</p>', '<p>100 m/s</p>', '<p>200 m/s</p>', '<p>300 m/s</p>', '<p>400 m/s</p>', '<p>500 m/s</p>', 'A', '2021-06-05 11:12:58', '2021-06-05 11:12:58'),
(3, 3, 4, '<p>Pada gambar di bawah ini sebutkan 500 hal yang merupakafjkjfjfjfjkfjk</p><figure class=\"image image_resized image-style-align-center\" style=\"width:44.86%;\"><img src=\"http://localhost/tugasakhir/assets/admin_lte/plugins/ckfinder2/core/connector/php/connector.php?command=Proxy&amp;lang=en&amp;type=Files&amp;currentFolder=%2F&amp;hash=c61f44b73f1588f9&amp;fileName=AnimeX_138660.jpeg\"></figure><p>Jadi jawabannya adalah…..</p>', '<p>100 m/s</p>', '<p>200 m/s</p>', '<p>300 m/s</p>', '<p>400 m/s</p>', '<p>500 m/s</p>', 'A', '2021-06-05 11:15:17', '2021-06-05 11:15:17'),
(4, 3, 4, '<p>Diketahui sebuah diagram&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>Tkt</td><td>Opp</td><td>YYY</td><td>jkdjkdkj</td><td>kjdjkdj</td><td>ddd</td><td>ddd</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', '<p>A</p>', '<p>B</p>', '<p>B</p>', '<p>D</p>', '<p>E</p>', 'A', '2021-06-05 11:29:27', '2021-06-05 11:29:27'),
(5, 3, 4, '<p style=\"margin-left:0px;\">Here is my unforgettable experience. One day I joined a story telling contest. Two of my friends and I had been chosen to take a part in the final round at the district level. I was very happy and eager to win the competition.</p><p style=\"margin-left:0px;\">For preparation, I had to memorize and understand the story well. My teacher guided and taught me pronunciation, facial expression and gestures. One day, before performing, my friends and I were busy to prepare the props and costumes for the competition. Thing that made me sad was my teacher rented the props and costumes for my friends but not for me.</p><p style=\"margin-left:0px;\">My two friends had beautiful costumes and luxurious props. Although I just wore the simple ones, I performed my best to win the competition. The competition started. I got number 29 and my friends got number 5 and 10. I was nervous but I showed my best performance on stage. Lots of people took photos and videos of me.</p><p style=\"margin-left:0px;\">Finally, anxiety was gone after I had finished performing. And then, the announcement came which made three of us very uneasy. Luckily I was chosen as the first winner. I went to the stage and all the judges congratulated me and gave a plaque, trophy, and money. I was very happy.</p>', '<p>AJAJ</p>', '<p>aaa</p>', '<p>aaa</p>', '<p>aa</p>', '<p>aa</p>', 'A', '2021-06-05 11:46:42', '2021-06-05 11:46:42'),
(6, 3, 4, '<p style=\"margin-left:0px;\">Here is my unforgettable experience. One day I joined a story telling contest. Two of my friends and I had been chosen to take a part in the final round at the district level. I was very happy and eager to win the competition.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp; Last week, Valerie and her friends from SMP Perdamaian Surabaya, learned how to make donut in Ring Master Donuts and Coffee at Tunjungan Plaza, Surabaya.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First, they listened to the story of Mister Ringo, the baker, and soon they had a trip to the kitchen. The baker showed them how to shape the donuts, to restore, to fry and add the donuts with various kinds of topping and filling.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Finally, the students had their chance to make their own donuts. The baker only gave each them a piece of yellow dough and some flour. Amazingly, the students could make their own donuts.</p><p style=\"margin-left:0px;text-align:justify;\">Where did the students go last week?</p>', '<p>AJAJ</p>', '<p>aaa</p>', '<p>aaa</p>', '<p>aa</p>', '<p>aa</p>', 'A', '2021-06-05 11:47:57', '2021-06-05 11:47:57'),
(7, 3, 4, '<figure class=\"image image_resized\" style=\"width:14.81%;\"><img src=\"https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/04/02/2732207174.jpg\"></figure><p>Cokelat adalah…?</p>', '<p>Warna</p>', '<p>Makanan</p>', '<p>Minuman</p>', '<p>Tidak Tau</p>', '<p>Tidak bisa dipilih</p>', 'A', '2021-06-06 19:28:50', '2021-06-06 19:28:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas_siswa`
--

CREATE TABLE `data_kelas_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `no_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelas_siswa`
--

INSERT INTO `data_kelas_siswa` (`id`, `nis`, `kode_kelas`, `id_tahun_akademik`, `no_absen`) VALUES
(1, '1234', '10-MIA1', 1, 1),
(2, '21281', '10-MIA1', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_a_permapel`
--

CREATE TABLE `detail_a_permapel` (
  `id` bigint(20) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `id_a_permapel` int(11) NOT NULL,
  `absensi` enum('0','H','I','A','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_a_permapel`
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
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'guru', 'Guru SMAN 1 Sooko'),
(3, 'siswa', 'Siswa SMAN 1 Sooko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
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
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `gender`, `id_agama`, `email`, `foto`) VALUES
('3509176412630001', 'Guru Smansasoo.spd', 'P', 1, 'guru1@gmail.com', 'alwan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `nip`, `kode_mapel`) VALUES
(1, '3509176412630001', 'M-FISIKA'),
(2, '3509176412630001', 'M-MTK1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari_masuk`
--

CREATE TABLE `hari_masuk` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `status` enum('Masuk','Libur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari_masuk`
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
-- Struktur dari tabel `jadwal`
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
-- Dumping data untuk tabel `jadwal`
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
-- Struktur dari tabel `jam_istirahat`
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
-- Dumping data untuk tabel `jam_istirahat`
--

INSERT INTO `jam_istirahat` (`id`, `id_hari`, `jam_mulai`, `jam_selesai`, `id_t_akademik`, `semester`) VALUES
(1, 2, '09:30:00', '10:20:00', 1, 'ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(8) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `jurusan`) VALUES
('IPA', 'MIPA'),
('IPS', 'IIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_soal`
--

CREATE TABLE `kategori_soal` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_soal`
--

INSERT INTO `kategori_soal` (`id`, `kategori`, `nip`) VALUES
(3, 'Fluida Dinamis 5', '3509176412630001'),
(4, 'Fluida Statis', '3509176412630001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_ujian`
--

CREATE TABLE `kategori_ujian` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `kode_mapel` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_t_ujian` int(11) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_ujian`
--

INSERT INTO `kategori_ujian` (`id`, `nama_ujian`, `kode_mapel`, `id_t_ujian`, `nip`) VALUES
(2, 'UH 2 Fluida Statis', 'M-MTK1', 2, '3509176412630001'),
(3, 'UH Fluida Statis', 'M-FISIKA', 2, '3509176412630001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kode_tingkat` varchar(6) NOT NULL,
  `kode_jurusan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
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
-- Struktur dari tabel `kelompok_mapel`
--

CREATE TABLE `kelompok_mapel` (
  `id` int(11) NOT NULL,
  `kelompok_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok_mapel`
--

INSERT INTO `kelompok_mapel` (`id`, `kelompok_mapel`) VALUES
(1, 'Kelompok A (Umum)'),
(2, 'Kelompok B (Wajib)'),
(3, 'Kelompok C (Peminatan)'),
(4, 'Kelompok D (Lintas Minat)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `id_k_mapel` int(11) NOT NULL,
  `kode_jurusan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `mapel`, `id_k_mapel`, `kode_jurusan`) VALUES
('M-BDaerah', 'Bahasa Daerah', 2, 'IPA'),
('M-FISIKA', 'Fisika', 3, 'IPA'),
('M-MTK1', 'Matematika Wajib', 1, 'IPA'),
('M-MTK2', 'Matematika Peminatan', 3, 'IPA'),
('M-Sejarah', 'Sejarah Indonesia', 4, 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_perminggu`
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
-- Dumping data untuk tabel `mapel_perminggu`
--

INSERT INTO `mapel_perminggu` (`id`, `kode_mapel`, `jumlah`, `id_t_akademik`, `semester`, `kode_tingkat`) VALUES
(5, 'M-FISIKA', 1, 1, 'ganjil', '10'),
(6, 'M-MTK1', 1, 1, 'ganjil', '11'),
(7, 'M-Sejarah', 1, 1, 'ganjil', '10'),
(8, 'M-MTK1', 2, 1, 'ganjil', '12'),
(9, 'M-BDaerah', 1, 1, 'ganjil', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `id_m_tipe` int(11) NOT NULL,
  `nip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `content`, `id_m_tipe`, `nip`, `path`) VALUES
(1, 'tesing', '', 1, '3509176412630001', ''),
(2, 'Tes Text Center', '<h1>Tes Gambar Center</h1><figure class=\"image image_resized\" style=\"width:46.58%;\"><img src=\"http://localhost/tugasakhir/assets/admin_lte/plugins/ckfinder2/core/connector/php/connector.php?command=Proxy&amp;lang=en&amp;type=Files&amp;currentFolder=%2F&amp;hash=c61f44b73f1588f9&amp;fileName=AnimeX_138660.jpeg\"></figure>', 1, '3509176412630001', ''),
(3, 'Fluida Dinamis', '<h1 style=\"text-align:center;\">Fluida Dinamis</h1><p style=\"margin-left:0px;\"><strong>Fluida dinamis</strong> merupakan fluida yang dianggap:</p><ul><li>Tidak kompresibel, jika diberi <a href=\"https://www.studiobelajar.com/tekanan-hidrostatis/\">tekanan</a> maka volumenya tidak berubah</li><li>Tidak mengalami gesekan, Pada saat mengalir, <a href=\"https://www.studiobelajar.com/gaya-gesek/\">gesekan</a> fluida degan dinding dapat diabaikan.</li><li>alirannya stasioner, tiap paket fluida memiliki arah aliran tertentu dan tidak terjadi turbulensi (pusaran-pusaran).</li><li>alirannya tunak (steady), aliran fluida memiliki kecepatan yang konstan terhadap waktu.</li></ul><p style=\"margin-left:0px;\">Lihat juga materi StudioBelajar.com lainnya:<br><a href=\"https://www.studiobelajar.com/medan-magnet/\">Medan Magnet</a><br><a href=\"https://www.studiobelajar.com/dioda/\">Kapasitor</a></p><h3 style=\"margin-left:0px;\">Jenis Aliran Fluida</h3><p style=\"margin-left:0px;\">Jenis aliran fluida dibagi menjadi dua jenis, yaitu:</p><ul><li>Aliran laminer, yakni aliran dimana paket fluida meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida tidak berseberangan dengan jalur lainnya. Aliran laminer adalah aliran ideal dan terjadi pada aliran fluida dengan kecepatan rendah.</li><li>Aliran turbulen, yaitu aliran dimana paket fluida tidak meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida dapat bersebrangan dengan jalur lainnya. Aliran turbulen ditandai dengan adanya pusaran-pusaran air (vortex atau turbulen) dan terjadi jika kecepatan alirannya tinggi.</li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=400%2C77&amp;ssl=1\" alt=\"jenis aliran fluida dinamis\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=300%2C58&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><p style=\"margin-left:0px;text-align:center;\">&nbsp;</p><h3 style=\"margin-left:0px;\">Komponen-komponen dalam Fluida Dinamis</h3><h3 style=\"margin-left:0px;\">Debit (Q)</h3><p style=\"margin-left:0px;\">Debit adalah jumlah volume fluida yang mengalir persatuan waktu (biasanya per detik). Besar debit aliran fluida dapat dicari dengan menggunakan satu dari dua formula ini:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+%5Cfrac%7BV%7D%7BT%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = \\frac{V}{T}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+Av&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = Av\"></figure><p style=\"margin-left:0px;\">dimana:<br>Q adalah debit aliran fluida (m<sup>3</sup>/s)<br>V adalah volume fluida (m<sup>3</sup>)<br>t adalah selang waktu (s)<br>A adalah luasan penampang aliran (m<sup>2</sup>)<br>v adalah kecepatan aliran fluida (m/s)</p><h2 style=\"margin-left:0px;\">Persamaan Kontinuitas</h2><p style=\"margin-left:0px;\">Karena fluida tidak mampu dimampatkan (inkompresibel), maka aliran fluida di sembarang titik sama. Jika ditinjau dari dua tempat, maka debit aliran 1 sama dengan debit aliran 2.</p><p style=\"margin-left:0px;\"><strong>Hukum Bernoulli</strong></p><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=400%2C188&amp;ssl=1\" alt=\"persamaan kontinuitas\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=300%2C141&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><p style=\"margin-left:0px;\"><a href=\"https://www.studiobelajar.com/hukum-bernoulli/\">Hukum Bernoulli</a> merupakan hukum yang berlandaskan <a href=\"https://www.studiobelajar.com/hukum-kekekalan-energi/\">kekekalan energi</a> per unit volume pada aliran fluida. Hukum ini menyatakan bahwa fluida pada keadaan tunak, ideal, dan inkompresibel; jumlah tekanan, <a href=\"https://www.studiobelajar.com/usaha-energi-rumus-kinetik-potensial/\">energi kinetik, dan energi potensialnya</a> memiliki nilai yang sama di sepanjang aliran. Jika ditinjau dari dua tempat, maka hukum Bernoulli dapat dinyatakan dengan:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Em_1+%3D+Em_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Em_1 = Em_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+Ek_1+%2B+Ep_1+%3D+P_2+%2B+Ek_2+%2B+Ep_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + Ek_1 + Ep_1 = P_2 + Ek_2 + Ep_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_1%5E2+%2B+%5Crho+g+h_1+%3D+P_2+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_2%5E2+%2B+%5Crho+g+h_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + \\frac{1}{2} \\rho v_1^2 + \\rho g h_1 = P_2 + \\frac{1}{2} \\rho v_2^2 + \\rho g h_2\"></figure><p style=\"margin-left:0px;\">dimana:</p><p style=\"margin-left:0px;\">P adalah tekanan (Pa)<br>&nbsp;</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Crho&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\rho\"></figure><p style=\"margin-left:0px;\">adalah massa jenis fluida (kg/m<sup>3</sup>)<br>g adalah percepatan gravitasi (9,8 m/s<sup>2</sup>)<br>h adalah ketinggian air (m)<br>v adalah kecepatan aliran fluida (m/s)</p><p style=\"margin-left:0px;\">Karena fluida disini merupakan fluida inkompresibel, maka massa jenisnya tidak berubah, sehingga persamaannya dapat disederhanakan menjadi:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_1%5E2+%2B+gh_1+%3D+%5Cfrac%7BP_2%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_2%5E2+%2B+gh_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1}{\\rho} + \\frac{1}{2} v_1^2 + gh_1 = \\frac{P_2}{\\rho} + \\frac{1}{2} v_2^2 + gh_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1+-+P_2%7D%7B%5Crho%7D+%3D+%5Cfrac%7B1%7D%7B2%7D+%28v_2%5E2+-+v_1%5E2%29+%2B+g%28h_2+-+h_1%29&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1 - P_2}{\\rho} = \\frac{1}{2} (v_2^2 - v_1^2) + g(h_2 - h_1)\"></figure><h2 style=\"margin-left:0px;\">Penerapan Hukum Bernoulli</h2><p style=\"margin-left:0px;\">Berikut ini merupakan fenomena yang terjadi maupun alat-alat yang menggunakan prinsip/hukum Bernoulli.</p><ul><li>Teorema Toricelli</li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/penerapan-hukum-bernoulli.png?resize=267%2C255&amp;ssl=1\" alt=\"penerapan hukum bernoulli\"></figure><p style=\"margin-left:0px;\">Fenomena air yang menyembur keluar dari lubang penyimpanan/tangki air dinamakan dengan teorema Toricelli. Besar energi kinetik air yang menyembur keluar dari lubang tangki air sama dengan besar energi potensialnya. Dengan begitu, kecepatan air pada lubang penyemburan sama dengan air yang jatuh bebas dari batas ketinggian air. Sehingga semakin besar perbedaan ketinggian lubang dengan batas ketinggian air, maka akan semakin cepat semburan airnya. Berdasarkan gambar diatas, dapat diformulasikan kecepatan air pada lubang tangki air sebesar:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D+%5Crho+v%5E2+%3D+%5Crho+g+h&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{1}{2} \\rho v^2 = \\rho g h\"></figure><p style=\"margin-left:0px;\">&nbsp;</p>', 1, '3509176412630001', ''),
(4, 'Tes Text Center', '<h1>Tes Gambar Center</h1><figure class=\"image image_resized image-style-align-right\" style=\"width:46.58%;\"><img src=\"http://localhost/tugasakhir/assets/admin_lte/plugins/ckfinder2/core/connector/php/connector.php?command=Proxy&amp;lang=en&amp;type=Files&amp;currentFolder=%2F&amp;hash=c61f44b73f1588f9&amp;fileName=AnimeX_138660.jpeg\"></figure>', 1, '3509176412630001', ''),
(6, 'Fluida Dinamis', '<h1>Fluida Dinamis</h1><p style=\"margin-left:0px;\"><strong>Fluida dinamis</strong> merupakan fluida yang dianggap:</p><ul><li>Tidak kompresibel, jika diberi <a href=\"https://www.studiobelajar.com/tekanan-hidrostatis/\">tekanan</a> maka volumenya tidak berubah</li><li>Tidak mengalami gesekan, Pada saat mengalir, <a href=\"https://www.studiobelajar.com/gaya-gesek/\">gesekan</a> fluida degan dinding dapat diabaikan.</li><li>alirannya stasioner, tiap paket fluida memiliki arah aliran tertentu dan tidak terjadi turbulensi (pusaran-pusaran).</li><li>alirannya tunak (steady), aliran fluida memiliki kecepatan yang konstan terhadap waktu.</li></ul><p style=\"margin-left:0px;\">Lihat juga materi StudioBelajar.com lainnya:<br><a href=\"https://www.studiobelajar.com/medan-magnet/\">Medan Magnet</a><br><a href=\"https://www.studiobelajar.com/dioda/\">Kapasitor</a></p><h3 style=\"margin-left:0px;\">Jenis Aliran Fluida</h3><p style=\"margin-left:0px;\">Jenis aliran fluida dibagi menjadi dua jenis, yaitu:</p><ul><li>Aliran laminer, yakni aliran dimana paket fluida meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida tidak berseberangan dengan jalur lainnya. Aliran laminer adalah aliran ideal dan terjadi pada aliran fluida dengan kecepatan rendah.</li><li>Aliran turbulen, yaitu aliran dimana paket fluida tidak meluncur bersamaan dengan paket fluida di sebelahnya, setiap jalur paket fluida dapat bersebrangan dengan jalur lainnya. Aliran turbulen ditandai dengan adanya pusaran-pusaran air (vortex atau turbulen) dan terjadi jika kecepatan alirannya tinggi.</li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=400%2C77&amp;ssl=1\" alt=\"jenis aliran fluida dinamis\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/jenis-aliran-fluida-dinamis.jpeg?resize=300%2C58&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><p style=\"margin-left:0px;text-align:center;\">&nbsp;</p><h3 style=\"margin-left:0px;\">Komponen-komponen dalam Fluida Dinamis</h3><h3 style=\"margin-left:0px;\">Debit (Q)</h3><p style=\"margin-left:0px;\">Debit adalah jumlah volume fluida yang mengalir persatuan waktu (biasanya per detik). Besar debit aliran fluida dapat dicari dengan menggunakan satu dari dua formula ini:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+%5Cfrac%7BV%7D%7BT%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = \\frac{V}{T}\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Q+%3D+Av&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Q = Av\"></figure><p style=\"margin-left:0px;\">dimana:<br>Q adalah debit aliran fluida (m<sup>3</sup>/s)<br>V adalah volume fluida (m<sup>3</sup>)<br>t adalah selang waktu (s)<br>A adalah luasan penampang aliran (m<sup>2</sup>)<br>v adalah kecepatan aliran fluida (m/s)</p><h2 style=\"margin-left:0px;\">Persamaan Kontinuitas</h2><p style=\"margin-left:0px;\">Karena fluida tidak mampu dimampatkan (inkompresibel), maka aliran fluida di sembarang titik sama. Jika ditinjau dari dua tempat, maka debit aliran 1 sama dengan debit aliran 2.</p><p style=\"margin-left:0px;\"><span style=\"background-color:hsl(0, 75%, 60%);color:hsl(150, 75%, 60%);\"><strong>Hukum Bernoulli</strong></span></p><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=400%2C188&amp;ssl=1\" alt=\"persamaan kontinuitas\" srcset=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?w=400&amp;ssl=1 400w, https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/persamaan-kontinuitas.jpeg?resize=300%2C141&amp;ssl=1 300w\" sizes=\"100vw\" width=\"400\"></figure><p style=\"margin-left:0px;\"><a href=\"https://www.studiobelajar.com/hukum-bernoulli/\">Hukum Bernoulli</a> merupakan hukum yang berlandaskan <a href=\"https://www.studiobelajar.com/hukum-kekekalan-energi/\">kekekalan energi</a> per unit volume pada aliran fluida. Hukum ini menyatakan bahwa fluida pada keadaan tunak, ideal, dan inkompresibel; jumlah tekanan, <a href=\"https://www.studiobelajar.com/usaha-energi-rumus-kinetik-potensial/\">energi kinetik, dan energi potensialnya</a> memiliki nilai yang sama di sepanjang aliran. Jika ditinjau dari dua tempat, maka hukum Bernoulli dapat dinyatakan dengan:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=Em_1+%3D+Em_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"Em_1 = Em_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+Ek_1+%2B+Ep_1+%3D+P_2+%2B+Ek_2+%2B+Ep_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + Ek_1 + Ep_1 = P_2 + Ek_2 + Ep_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=P_1+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_1%5E2+%2B+%5Crho+g+h_1+%3D+P_2+%2B+%5Cfrac%7B1%7D%7B2%7D+%5Crho+v_2%5E2+%2B+%5Crho+g+h_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"P_1 + \\frac{1}{2} \\rho v_1^2 + \\rho g h_1 = P_2 + \\frac{1}{2} \\rho v_2^2 + \\rho g h_2\"></figure><p style=\"margin-left:0px;\">dimana:</p><p style=\"margin-left:0px;\">P adalah tekanan (Pa)<br>&nbsp;</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Crho&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\rho\"></figure><p style=\"margin-left:0px;\">adalah massa jenis fluida (kg/m<sup>3</sup>)<br>g adalah percepatan gravitasi (9,8 m/s<sup>2</sup>)<br>h adalah ketinggian air (m)<br>v adalah kecepatan aliran fluida (m/s)</p><p style=\"margin-left:0px;\">Karena fluida disini merupakan fluida inkompresibel, maka massa jenisnya tidak berubah, sehingga persamaannya dapat disederhanakan menjadi:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_1%5E2+%2B+gh_1+%3D+%5Cfrac%7BP_2%7D%7B%5Crho%7D+%2B+%5Cfrac%7B1%7D%7B2%7D+v_2%5E2+%2B+gh_2&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1}{\\rho} + \\frac{1}{2} v_1^2 + gh_1 = \\frac{P_2}{\\rho} + \\frac{1}{2} v_2^2 + gh_2\"></figure><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7BP_1+-+P_2%7D%7B%5Crho%7D+%3D+%5Cfrac%7B1%7D%7B2%7D+%28v_2%5E2+-+v_1%5E2%29+%2B+g%28h_2+-+h_1%29&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{P_1 - P_2}{\\rho} = \\frac{1}{2} (v_2^2 - v_1^2) + g(h_2 - h_1)\"></figure><h2 style=\"margin-left:0px;\">Penerapan Hukum Bernoulli</h2><p style=\"margin-left:0px;\">Berikut ini merupakan fenomena yang terjadi maupun alat-alat yang menggunakan prinsip/hukum Bernoulli.</p><ul><li><span style=\"background-color:hsl(240, 75%, 60%);\">Teorema Toricelli</span></li></ul><figure class=\"image\"><img src=\"https://i0.wp.com/www.studiobelajar.com/wp-content/uploads/2018/04/penerapan-hukum-bernoulli.png?resize=267%2C255&amp;ssl=1\" alt=\"penerapan hukum bernoulli\"></figure><p style=\"margin-left:0px;\">Fenomena air yang menyembur keluar dari lubang penyimpanan/tangki air dinamakan dengan teorema Toricelli. Besar energi kinetik air yang menyembur keluar dari lubang tangki air sama dengan besar energi potensialnya. Dengan begitu, kecepatan air pada lubang penyemburan sama dengan air yang jatuh bebas dari batas ketinggian air. Sehingga semakin besar perbedaan ketinggian lubang dengan batas ketinggian air, maka akan semakin cepat semburan airnya. Berdasarkan gambar diatas, dapat diformulasikan kecepatan air pada lubang tangki air sebesar:</p><figure class=\"image\"><img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D+%5Crho+v%5E2+%3D+%5Crho+g+h&amp;bg=f9f9f9&amp;fg=000000&amp;s=0&amp;c=20201002\" alt=\"\\frac{1}{2} \\rho v^2 = \\rho g h\"></figure><p style=\"margin-left:0px;\">&nbsp;</p>', 1, '3509176412630001', ''),
(10, 'Tes Update 4', 'https://www.dropbox.com/s/5ozaag55vhy6xdd/profile.jpg?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/profile.jpg'),
(11, 'aaa', 'https://www.dropbox.com/s/hlb01zlnzjd0n8e/profile.jpg_01-06-2021%2013%3A30?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/profile.jpg_01-06-2021 13:30'),
(12, 'ccc', 'https://www.dropbox.com/s/5ozaag55vhy6xdd/profile.jpg?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/profile.jpg'),
(13, 'aa', 'https://www.dropbox.com/s/rimtv4bv1zvx61s/user3-128x128.jpg?dl=0', 2, '3509176412630001', '/Materi/3509176412630001/user3-128x128.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_tipe`
--

CREATE TABLE `materi_tipe` (
  `id` int(11) NOT NULL,
  `jenis` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_tipe`
--

INSERT INTO `materi_tipe` (`id`, `jenis`) VALUES
(1, 'Editor'),
(2, 'Upload');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `link` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Data Siswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Guru', 'guru', 'fa fa-users', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `predikat`
--

CREATE TABLE `predikat` (
  `id` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `predikat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `predikat`
--

INSERT INTO `predikat` (`id`, `nilai`, `predikat`) VALUES
(1, '<75', 'D'),
(2, '75-79', 'C'),
(3, '80-94', 'B'),
(4, '95-100', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(10) NOT NULL,
  `ruangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `ruangan`) VALUES
('R-10M1', 'Ruangan Kelas X MIPA 1'),
('R-10M2', 'Ruangan Kelas X MIPA 2'),
('R-11M4', 'Ruangan kelas XI MIPA 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan_siswa`
--

CREATE TABLE `ruangan_siswa` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan_siswa`
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
(126, '12-MIA9', '0', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `j_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `tahun_masuk`, `foto`) VALUES
('1234', 'Alwan Hafidzin', 'L', 'Mojokerto', '2000-02-17', 1, 2018, '1234.png'),
('21281', 'Alwan3', 'L', 'Mojokerto', '2000-01-11', 1, 2018, '21281.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(12) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(1, '2020/2021', 'Y', 'ganjil'),
(2, '2030/2049', 'N', 'ganjil'),
(3, '2030/20476', 'N', 'ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_kelas`
--

CREATE TABLE `tingkat_kelas` (
  `kode_tingkat` varchar(8) NOT NULL,
  `tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkat_kelas`
--

INSERT INTO `tingkat_kelas` (`kode_tingkat`, `tingkatan`) VALUES
('10', 'kelas X'),
('11', 'Kelas XI'),
('12', 'Kelas XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_ujian`
--

CREATE TABLE `tipe_ujian` (
  `id` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_ujian`
--

INSERT INTO `tipe_ujian` (`id`, `tipe`) VALUES
(1, 'Latihan Soal'),
(2, 'Ulangan Harian'),
(3, 'UTS'),
(4, 'UAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
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
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `content`, `tgl_dibuat`, `nip`, `kode_mapel`) VALUES
(3, 'Teorema Phythograsskjks', '<p>Teorema ini dibuat oleh phythogras</p>', '2021-06-03 06:05:31', '3509176412630001', 'M-FISIKA'),
(28, 'Moasdp[addd', '<p>adsdsdad</p>', '2021-06-03 14:54:35', '3509176412630001', 'M-MTK1'),
(29, 'MosesaaaaaaddadasdK', '<p>dadsd</p>', '2021-06-03 14:55:28', '3509176412630001', 'M-FISIKA'),
(32, 'Testingo', '<p>akakkaka</p>', '2021-06-03 15:57:34', '3509176412630001', 'M-FISIKA'),
(35, 'JSjksdssadssaaddsss', '<p>sdddjkfdajkafdkjaaa</p>', '2021-06-03 16:20:32', '3509176412630001', 'M-FISIKA'),
(37, 'TertreDSADD', '<p>adlkdkldkldlkDLKDKLDKLDKL</p>', '2021-06-03 17:28:17', '3509176412630001', 'M-FISIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_share`
--

CREATE TABLE `tugas_share` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_share_siswa`
--

CREATE TABLE `tugas_share_siswa` (
  `id` bigint(20) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_t_share` int(11) NOT NULL,
  `tanggal_pengumpulan` datetime NOT NULL,
  `file` text NOT NULL,
  `path` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `id_k_ujian` int(11) NOT NULL,
  `kode_kelas` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_t_akademik` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `id_k_ujian`, `kode_kelas`, `id_t_akademik`, `semester`, `jumlah_soal`, `waktu`, `jenis`, `tgl_mulai`, `terlambat`, `token`) VALUES
(1, 2, '10-MIA1', 1, 'ganjil', 4, 120, 'acak', '2021-06-05 15:40:06', '2021-06-06 20:40:07', 'AXZCV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_detail`
--

CREATE TABLE `ujian_detail` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nis` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `selesai` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian_detail`
--

INSERT INTO `ujian_detail` (`id`, `id_ujian`, `nis`, `nilai`, `waktu_mulai`, `waktu_selesai`, `selesai`) VALUES
(12, 1, '1234', 0, '2021-06-06 01:31:34', '2021-06-06 03:20:34', 'N'),
(13, 1, '1234', 0, '2021-06-06 03:43:09', '2021-06-10 02:43:09', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_detail_soal`
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
-- Dumping data untuk tabel `ujian_detail_soal`
--

INSERT INTO `ujian_detail_soal` (`id`, `id_u_detail`, `id_soal`, `jawaban`, `status_jawaban`, `ragu`) VALUES
(9, 12, 2, '', '0', 'N'),
(10, 12, 5, '', '0', 'N'),
(11, 12, 4, '', '0', 'N'),
(12, 12, 1, '', '0', 'N'),
(13, 13, 4, 'A', '0', 'N'),
(14, 13, 3, 'D', '0', 'Y'),
(15, 13, 1, 'B', '0', 'N'),
(16, 13, 6, 'D', '0', 'Y'),
(17, 13, 7, 'E', '0', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `nama`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$4iCItprhwu5rzEfUa1yTFek8ipt7bKIEkS4cemNFIcc./ivVYhS/a', 'alwanhafidzin@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1623317816, 1, 'Alwan'),
(2, '::1', NULL, '$2y$10$TSKoIDsOFEgCmlsLgr5G.e.5v97vi1Gp.y6zLwKb.311xsUGW5zgK', 'alwanhafidzin2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1623306754, NULL, 1, 'Alwan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(11, 1, 1),
(14, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali_kelas`
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
(126, 3, '0', '12-MIA9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warna`
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
-- Indeks untuk tabel `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_k_soal` (`id_k_soal`),
  ADD KEY `id_k_ujian` (`id_k_ujian`);

--
-- Indeks untuk tabel `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_a_permapel` (`id_a_permapel`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `hari_masuk`
--
ALTER TABLE `hari_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_m_perminggu` (`id_m_perminggu`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indeks untuk tabel `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_t_akademik` (`id_t_akademik`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_ujian` (`id_t_ujian`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_tingkatan` (`kode_tingkat`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `id_k_mapel` (`id_k_mapel`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_akademik` (`id_t_akademik`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_m_tipe` (`id_m_tipe`);

--
-- Indeks untuk tabel `materi_tipe`
--
ALTER TABLE `materi_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `predikat`
--
ALTER TABLE `predikat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indeks untuk tabel `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  ADD PRIMARY KEY (`kode_tingkat`);

--
-- Indeks untuk tabel `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `tugas_share`
--
ALTER TABLE `tugas_share`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indeks untuk tabel `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t_share` (`id_t_share`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_k_ujian` (`id_k_ujian`),
  ADD KEY `id_t_akademik` (`id_t_akademik`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_u_detail` (`id_u_detail`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hari_masuk`
--
ALTER TABLE `hari_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_soal`
--
ALTER TABLE `kategori_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `materi_tipe`
--
ALTER TABLE `materi_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `predikat`
--
ALTER TABLE `predikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tugas_share`
--
ALTER TABLE `tugas_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_permapel`
--
ALTER TABLE `absensi_permapel`
  ADD CONSTRAINT `absensi_permapel_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `absensi_permapel_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Ketidakleluasaan untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `bank_soal_ibfk_2` FOREIGN KEY (`id_k_soal`) REFERENCES `kategori_soal` (`id`),
  ADD CONSTRAINT `bank_soal_ibfk_3` FOREIGN KEY (`id_k_ujian`) REFERENCES `kategori_ujian` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_kelas_siswa`
--
ALTER TABLE `data_kelas_siswa`
  ADD CONSTRAINT `data_kelas_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `data_kelas_siswa_ibfk_2` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `data_kelas_siswa_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Ketidakleluasaan untuk tabel `detail_a_permapel`
--
ALTER TABLE `detail_a_permapel`
  ADD CONSTRAINT `detail_a_permapel_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `detail_a_permapel_ibfk_2` FOREIGN KEY (`id_a_permapel`) REFERENCES `absensi_permapel` (`id`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Ketidakleluasaan untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `guru_mapel_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_m_perminggu`) REFERENCES `mapel_perminggu` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari_masuk` (`id`);

--
-- Ketidakleluasaan untuk tabel `jam_istirahat`
--
ALTER TABLE `jam_istirahat`
  ADD CONSTRAINT `jam_istirahat_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari_masuk` (`id`),
  ADD CONSTRAINT `jam_istirahat_ibfk_2` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Ketidakleluasaan untuk tabel `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD CONSTRAINT `kategori_soal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Ketidakleluasaan untuk tabel `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  ADD CONSTRAINT `kategori_ujian_ibfk_1` FOREIGN KEY (`id_t_ujian`) REFERENCES `tipe_ujian` (`id`),
  ADD CONSTRAINT `kategori_ujian_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_tingkat`) REFERENCES `tingkat_kelas` (`kode_tingkat`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`);

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_k_mapel`) REFERENCES `kelompok_mapel` (`id`),
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`);

--
-- Ketidakleluasaan untuk tabel `mapel_perminggu`
--
ALTER TABLE `mapel_perminggu`
  ADD CONSTRAINT `mapel_perminggu_ibfk_1` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_m_tipe`) REFERENCES `materi_tipe` (`id`);

--
-- Ketidakleluasaan untuk tabel `ruangan_siswa`
--
ALTER TABLE `ruangan_siswa`
  ADD CONSTRAINT `ruangan_siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `ruangan_siswa_ibfk_3` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `tugas_share`
--
ALTER TABLE `tugas_share`
  ADD CONSTRAINT `tugas_share_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `tugas_share_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id`);

--
-- Ketidakleluasaan untuk tabel `tugas_share_siswa`
--
ALTER TABLE `tugas_share_siswa`
  ADD CONSTRAINT `tugas_share_siswa_ibfk_1` FOREIGN KEY (`id_t_share`) REFERENCES `tugas_share` (`id`);

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_k_ujian`) REFERENCES `kategori_ujian` (`id`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`id_t_akademik`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `ujian_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Ketidakleluasaan untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD CONSTRAINT `ujian_detail_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `ujian_detail_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`);

--
-- Ketidakleluasaan untuk tabel `ujian_detail_soal`
--
ALTER TABLE `ujian_detail_soal`
  ADD CONSTRAINT `ujian_detail_soal_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `bank_soal` (`id`),
  ADD CONSTRAINT `ujian_detail_soal_ibfk_2` FOREIGN KEY (`id_u_detail`) REFERENCES `ujian_detail` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
