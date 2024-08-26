-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2024 pada 05.11
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_mini`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateNasabah` ()  BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE nama_lengkap VARCHAR(100);
    DECLARE nomor_rekening VARCHAR(10);
    DECLARE kelas INT;
    DECLARE jurusan VARCHAR(100);
    DECLARE jenis_kelamin CHAR(1);
    DECLARE tanggal_pembuatan DATE;
    DECLARE saldo DECIMAL(15, 2);
    DECLARE status VARCHAR(10);
    DECLARE status_options CHAR(1);
    
    WHILE i <= 100 DO
        SET nama_lengkap = CONCAT('Nasabah_', i);
        SET nomor_rekening = LPAD(FLOOR(RAND() * 10000000000), 10, '0');
        SET kelas = FLOOR(RAND() * 6) + 7;
        SET jurusan = CASE 
                        WHEN kelas <= 9 THEN 'SMP'
                        ELSE CASE 
                            WHEN FLOOR(RAND() * 2) = 0 THEN 'IPA'
                            ELSE 'IPS'
                        END
                      END;
        SET jenis_kelamin = IF(FLOOR(RAND() * 2) = 0, 'Laki-Laki', 'Perempuan');
        SET tanggal_pembuatan = DATE_ADD('2024-01-01', INTERVAL FLOOR(RAND() * 210) DAY);
        SET saldo = ROUND(RAND() * 1000000, 2);
        SET status = IF(FLOOR(RAND() * 2) = 0, 'aktif', 'tidak aktif');
        
        INSERT INTO Nasabah (nama, nomor_rekening, kelas, jurusan, jenis_kelamin, tanggal_pembuatan, saldo, status) 
        VALUES (nama_lengkap, nomor_rekening, kelas, jurusan, jenis_kelamin, tanggal_pembuatan, saldo, status);
        
        SET i = i + 1;
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(2, 'Rekayasa Perangkat Lunak'),
(4, 'Akuntansi dan Keuangan Lembaga'),
(5, 'Perhotelan'),
(6, 'Teknik Logistik'),
(7, 'Design Komunikasi Visual'),
(8, 'Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(2, '7'),
(3, '8'),
(4, '9'),
(5, '10'),
(6, '11'),
(7, '12'),
(8, '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id` bigint(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rekening` bigint(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `saldo` int(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `no_rekening`, `kelas`, `jurusan`, `jenis_kelamin`, `tanggal_pembuatan`, `saldo`, `status`) VALUES
(23, 'Bisma Putra Adiyana', 1148710811, '11', 'Akuntansi dan Keuangan Lembaga', 'Laki-laki', '2024-08-07', 30230000, 'Aktif'),
(26, 'Afni Anggi Agustina', 1102636165, '13', 'Perhotelan', 'Laki-laki', '2024-08-08', 739000, 'Aktif'),
(27, 'Andi Pratama', 7817471904, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-01-01', 1500000, 'aktif'),
(28, 'Budi Santoso', 3914694513, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-01-02', 2000000, 'aktif'),
(29, 'Citra Dewi', 4121057128, '9', 'Perhotelan', 'perempuan', '2024-01-03', 1850000, 'tidak aktif'),
(30, 'Dewi Lestari', 7861202380, '10', 'Teknik Logistik', 'perempuan', '2024-01-04', 2500000, 'aktif'),
(31, 'Eko Susanto', 7942840793, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-01-05', 1800000, 'tidak aktif'),
(32, 'Fitri Aulia', 6130597100, '12', 'Pertanian', 'perempuan', '2024-01-06', 2100000, 'aktif'),
(33, 'Gilang Ramadhan', 5824463400, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-01-07', 1900000, 'aktif'),
(34, 'Hani Kusuma', 9730525978, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-01-08', 3200000, 'tidak aktif'),
(35, 'Indra Saputra', 3179239967, '9', 'Perhotelan', 'laki-laki', '2024-01-09', 1750000, 'aktif'),
(36, 'Joko Suyono', 3704622176, '10', 'Teknik Logistik', 'laki-laki', '2024-01-10', 2400000, 'aktif'),
(37, 'Kiki Amalia', 7985391256, '11', 'Design Komunikasi Visual', 'perempuan', '2024-01-11', 2850000, 'tidak aktif'),
(38, 'Lia Wulandari', 9813090029, '12', 'Pertanian', 'perempuan', '2024-01-12', 2300000, 'aktif'),
(39, 'Mila Sari', 6109276657, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-01-13', 1950000, 'aktif'),
(40, 'Nina Rahma', 9107113472, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-01-14', 2150000, 'tidak aktif'),
(41, 'Omar Zulkarnain', 8207737666, '9', 'Perhotelan', 'laki-laki', '2024-01-15', 1850000, 'aktif'),
(42, 'Putu Ari', 3717348193, '10', 'Teknik Logistik', 'laki-laki', '2024-01-16', 2450000, 'aktif'),
(43, 'Qori Maulana', 1963528243, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-01-17', 1800000, 'tidak aktif'),
(44, 'Rani Maharani', 6665596915, '12', 'Pertanian', 'perempuan', '2024-01-18', 2000000, 'aktif'),
(45, 'Siti Nurhaliza', 8437400120, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-01-19', 1900000, 'aktif'),
(46, 'Taufik Hidayat', 3190210134, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-01-20', 2200000, 'tidak aktif'),
(47, 'Usman Yahya', 7638850588, '9', 'Perhotelan', 'laki-laki', '2024-01-21', 1700000, 'aktif'),
(48, 'Vina Saraswati', 9623622816, '10', 'Teknik Logistik', 'perempuan', '2024-01-22', 2500000, 'aktif'),
(49, 'Wulan Septiani', 6201562592, '11', 'Design Komunikasi Visual', 'perempuan', '2024-01-23', 2100000, 'tidak aktif'),
(50, 'Xavier Mahendra', 1136944791, '12', 'Pertanian', 'laki-laki', '2024-01-24', 100000, 'aktif'),
(51, 'Yusuf Maulana', 4080036454, '10', 'Teknik Logistik', 'laki-laki', '2024-04-10', 2200000, 'aktif'),
(52, 'Zahra Putri', 6989348176, '11', 'Design Komunikasi Visual', 'perempuan', '2024-04-11', 2300000, 'tidak aktif'),
(53, 'Aisyah Hasanah', 3706631796, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-02-01', 1600000, 'aktif'),
(54, 'Bagus Pratomo', 5565114726, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-02-02', 2400000, 'aktif'),
(55, 'Cici Andini', 6705678522, '9', 'Perhotelan', 'perempuan', '2024-02-03', 1700000, 'tidak aktif'),
(56, 'Dian Rahayu', 6833048707, '10', 'Teknik Logistik', 'perempuan', '2024-02-04', 1900000, 'aktif'),
(57, 'Eka Wibowo', 4048208247, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-02-05', 2200000, 'tidak aktif'),
(58, 'Febi Kartika', 7741895393, '12', 'Pertanian', 'perempuan', '2024-02-06', 1800000, 'aktif'),
(59, 'Gina Nandita', 7564852498, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-02-07', 2100000, 'aktif'),
(60, 'Hendra Wijaya', 4598576591, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-02-08', 1600000, 'tidak aktif'),
(61, 'Irma Riana', 8298325739, '9', 'Perhotelan', 'perempuan', '2024-02-09', 2500000, 'aktif'),
(62, 'Juli Setiawan', 8695899196, '10', 'Teknik Logistik', 'laki-laki', '2024-02-10', 2400000, 'aktif'),
(63, 'Kurniawan Sugiarto', 8584519042, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-02-11', 1850000, 'tidak aktif'),
(64, 'Lutfi Firdaus', 6834897897, '12', 'Pertanian', 'laki-laki', '2024-02-12', 2100000, 'aktif'),
(65, 'Mira Indriani', 7420932639, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-02-13', 2000000, 'aktif'),
(66, 'Novianti Anggraeni', 6599969781, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-02-14', 2100000, 'tidak aktif'),
(67, 'Oki Purwanto', 9737051265, '9', 'Perhotelan', 'laki-laki', '2024-02-15', 1750000, 'aktif'),
(68, 'Puspita Sari', 9885347257, '10', 'Teknik Logistik', 'perempuan', '2024-02-16', 2200000, 'aktif'),
(69, 'Qisthi Ramadhani', 1215582767, '11', 'Design Komunikasi Visual', 'perempuan', '2024-02-17', 2400000, 'tidak aktif'),
(70, 'Rendi Maulana', 2421872343, '12', 'Pertanian', 'laki-laki', '2024-02-18', 2100000, 'aktif'),
(71, 'Siti Rahmawati', 7462613690, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-02-19', 1600000, 'aktif'),
(72, 'Tono Arifin', 2047451697, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-02-20', 2400000, 'tidak aktif'),
(73, 'Umi Kalsum', 4849417692, '9', 'Perhotelan', 'perempuan', '2024-02-21', 1700000, 'aktif'),
(74, 'Vivi Anggraini', 8104733648, '10', 'Teknik Logistik', 'perempuan', '2024-02-22', 1900000, 'aktif'),
(75, 'Wira Santoso', 6975415442, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-02-23', 2200000, 'tidak aktif'),
(76, 'Xenia Maharani', 9562876540, '12', 'Pertanian', 'perempuan', '2024-02-24', 1800000, 'aktif'),
(77, 'Yusuf Rahman', 7888136654, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-03-01', 2100000, 'aktif'),
(78, 'Zainal Abidin', 9752053924, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-03-02', 1600000, 'tidak aktif'),
(79, 'Aulia Sari', 6095859937, '9', 'Perhotelan', 'perempuan', '2024-03-03', 2500000, 'aktif'),
(80, 'Bagas Prasetyo', 9223138190, '10', 'Teknik Logistik', 'laki-laki', '2024-03-04', 2400000, 'aktif'),
(81, 'Cahya Dewi', 8828111414, '11', 'Design Komunikasi Visual', 'perempuan', '2024-03-05', 1850000, 'tidak aktif'),
(82, 'Dini Permata', 6471142779, '12', 'Pertanian', 'perempuan', '2024-03-06', 2100000, 'aktif'),
(83, 'Erik Setiawan', 4871379930, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-03-07', 2000000, 'aktif'),
(84, 'Fauzan Hakim', 3943471590, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-03-08', 2100000, 'tidak aktif'),
(85, 'Gita Maharani', 4103218435, '9', 'Perhotelan', 'perempuan', '2024-03-09', 1750000, 'aktif'),
(86, 'Hendri Saputra', 7685677683, '10', 'Teknik Logistik', 'laki-laki', '2024-03-10', 2200000, 'aktif'),
(87, 'Intan Permata', 7118733388, '11', 'Design Komunikasi Visual', 'perempuan', '2024-03-11', 2400000, 'tidak aktif'),
(88, 'Joni Setiawan', 2536634168, '12', 'Pertanian', 'laki-laki', '2024-03-12', 2100000, 'aktif'),
(89, 'Krisna Arifin', 8326970951, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-03-13', 1600000, 'aktif'),
(90, 'Lia Mariana', 6024952531, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-03-14', 2400000, 'tidak aktif'),
(91, 'Mega Sari', 4143850079, '9', 'Perhotelan', 'perempuan', '2024-03-15', 1700000, 'aktif'),
(92, 'Nadia Aulia', 1644393080, '10', 'Teknik Logistik', 'perempuan', '2024-03-16', 1900000, 'aktif'),
(93, 'Oky Permana', 3790415439, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-03-17', 2200000, 'tidak aktif'),
(94, 'Putri Andini', 4018898232, '12', 'Pertanian', 'perempuan', '2024-03-18', 1800000, 'aktif'),
(95, 'Rudi Hartono', 7723245122, '7', 'Rekayasa Perangkat Lunak', 'laki-laki', '2024-03-19', 2100000, 'aktif'),
(96, 'Sari Wulandari', 7559531189, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-03-20', 1600000, 'tidak aktif'),
(97, 'Tina Anggraeni', 4627920855, '9', 'Perhotelan', 'perempuan', '2024-03-21', 2500000, 'aktif'),
(98, 'Udin Supriadi', 8461010986, '10', 'Teknik Logistik', 'laki-laki', '2024-03-22', 2400000, 'aktif'),
(99, 'Vina Melinda', 9421292642, '11', 'Design Komunikasi Visual', 'perempuan', '2024-03-23', 1850000, 'tidak aktif'),
(100, 'Wira Santika', 2723430529, '12', 'Pertanian', 'laki-laki', '2024-03-24', 2100000, 'aktif'),
(101, 'Xenia Haryono', 2353274998, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-04-01', 1600000, 'aktif'),
(102, 'Yuni Santika', 2596083679, '8', 'Akuntansi dan Keuangan Lembaga', 'perempuan', '2024-04-02', 2400000, 'aktif'),
(103, 'Zaki Pratama', 4920593679, '9', 'Perhotelan', 'laki-laki', '2024-04-03', 1700000, 'tidak aktif'),
(104, 'Andi Pratama', 6814717636, '10', 'Teknik Logistik', 'laki-laki', '2024-04-04', 1900000, 'aktif'),
(105, 'Budi Santoso', 9311807418, '11', 'Design Komunikasi Visual', 'laki-laki', '2024-04-05', 2200000, 'tidak aktif'),
(106, 'Citra Dewi', 7114884460, '12', 'Pertanian', 'perempuan', '2024-04-06', 1800000, 'aktif'),
(107, 'Dewi Lestari', 6639000323, '7', 'Rekayasa Perangkat Lunak', 'perempuan', '2024-04-07', 2100000, 'aktif'),
(108, 'Eko Susanto', 1850348511, '8', 'Akuntansi dan Keuangan Lembaga', 'laki-laki', '2024-04-08', 1600000, 'tidak aktif'),
(109, 'Fitri Aulia', 6334741864, '9', 'Perhotelan', 'perempuan', '2024-04-09', 2500000, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis_transaksi` enum('Setor','Tarik') NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `saldo_awal` decimal(10,2) NOT NULL,
  `saldo_akhir` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `nama`, `no_rekening`, `tanggal_waktu`, `jenis_transaksi`, `nominal`, `saldo_awal`, `saldo_akhir`) VALUES
(1, 'Bisma Putra Adiyana', 1148710811, '2024-08-07 06:08:03', 'Setor', '100000.00', '290000.00', '390000.00'),
(2, 'Bisma Putra Adiyana', 1148710811, '2024-08-07 06:24:18', 'Tarik', '100000.00', '390000.00', '290000.00'),
(4, 'Bisma Putra Adiyana', 1148710811, '2024-08-08 12:19:41', 'Tarik', '100.00', '290000.00', '289900.00'),
(5, 'Bisma Putra Adiyana', 1148710811, '2024-08-09 07:54:34', 'Tarik', '89900.00', '289900.00', '200000.00'),
(6, 'Bisma Putra Adiyana', 1148710811, '2024-08-12 00:32:32', 'Setor', '200000.00', '200000.00', '400000.00'),
(7, 'Bisma Putra Adiyana', 1148710811, '2024-08-12 01:29:10', 'Setor', '50000.00', '400000.00', '450000.00'),
(8, 'Xavier Mahendra', 1136944791, '2024-08-12 02:30:05', 'Setor', '100000.00', '0.00', '100000.00'),
(9, 'Kiki Amalia', 2147483647, '2024-08-12 02:31:16', 'Setor', '1000000.00', '1850000.00', '2850000.00'),
(10, 'Citra Dewi', 2147483647, '2024-08-12 02:34:42', 'Setor', '200000.00', '1750000.00', '1950000.00'),
(11, 'Citra Dewi', 2147483647, '2024-08-12 02:46:04', 'Tarik', '100000.00', '1950000.00', '1850000.00'),
(14, 'Hani Kusuma', 2147483647, '2024-08-12 03:20:32', 'Setor', '1000000.00', '2200000.00', '3200000.00'),
(15, 'Bisma Putra Adiyana', 1148710811, '2024-08-12 03:25:25', 'Setor', '20000.00', '450000.00', '470000.00'),
(16, 'Bisma Putra Adiyana', 1148710811, '2024-08-12 03:40:37', 'Setor', '200000.00', '470000.00', '670000.00'),
(17, 'Bisma Putra Adiyana', 1148710811, '2024-08-12 05:28:00', 'Setor', '29550000.00', '670000.00', '30220000.00'),
(18, 'Afni Anggi Agustina', 1102636165, '2024-08-12 06:26:16', 'Tarik', '20000.00', '759000.00', '739000.00'),
(19, 'Bisma Putra Adiyana', 1148710811, '2024-08-13 03:09:38', 'Setor', '10000.00', '30220000.00', '30230000.00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
