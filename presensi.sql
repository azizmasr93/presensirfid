-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mar 2017 pada 06.44
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int(4) NOT NULL AUTO_INCREMENT,
  `id_rfiddosen` varchar(30) NOT NULL,
  `nm_dosen` varchar(40) NOT NULL,
  `nip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `id_rfiddosen`, `nm_dosen`, `nip`) VALUES
(1, '80323203', 'Dr. R. Rizal Isnanto S.T, M.M, M.T', '197007272000121001'),
(2, '14916522203', 'Eko Didik Widianto, S.T, M.T', '197705262010121001'),
(3, '922723222', 'Ike Pertiwi Windasari S.T.,M.T.', '198412062010122008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(20) NOT NULL AUTO_INCREMENT,
  `hari` varchar(20) NOT NULL,
  `waktu` time NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `kd_makul` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `hari`, `waktu`, `id_kelas`, `kd_makul`) VALUES
(8, 'Rabu', '12:37:00', 1, 'TKC249'),
(10, 'Rabu', '13:30:00', 2, 'TKC205'),
(11, 'Rabu', '14:30:00', 2, 'TKC227');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` varchar(4) NOT NULL,
  `nm_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nm_kelas`) VALUES
('1', '201'),
('2', '205');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_makul`
--

CREATE TABLE IF NOT EXISTS `tb_makul` (
  `kd_makul` varchar(10) NOT NULL,
  `nm_makul` varchar(30) NOT NULL,
  `id_dosen` varchar(4) NOT NULL,
  PRIMARY KEY (`kd_makul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_makul`
--

INSERT INTO `tb_makul` (`kd_makul`, `nm_makul`, `id_dosen`) VALUES
('TKC205', 'Sistem Digital', '2'),
('TKC227', 'Rekayasa Perangkat Lunak', '3'),
('TKC249', 'Pengolahan Sinyal', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE IF NOT EXISTS `tb_mhs` (
  `id_mhs` int(4) NOT NULL AUTO_INCREMENT,
  `id_rfidmhs` varchar(30) NOT NULL,
  `nm_mhs` varchar(40) NOT NULL,
  `nim` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `id_rfidmhs`, `nm_mhs`, `nim`) VALUES
(1, '3719298118', 'Aziz Masruhan', '21120112140063'),
(3, '101250100118', 'Bagas Dhani Priambodo', '21120112130031'),
(4, '10219821872', 'Daniel Kurniawan', '21120112140068'),
(5, '102512373', 'Claudi Priambodo', '21120112120002'),
(6, '236232119221', 'M Ikhsan', '21120112140021'),
(7, '12164113221', 'Rayfart Setyobudi', '21120112140089'),
(8, '25240208221', 'Febie Viryatama', '21120112140052'),
(9, '15620433222', 'Welby Nazhari', '21120112140067');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhsmakul`
--

CREATE TABLE IF NOT EXISTS `tb_mhsmakul` (
  `id_mhsmakul` int(11) NOT NULL AUTO_INCREMENT,
  `kd_makul` varchar(20) NOT NULL,
  `id_mhs` int(20) NOT NULL,
  PRIMARY KEY (`id_mhsmakul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_mhsmakul`
--

INSERT INTO `tb_mhsmakul` (`id_mhsmakul`, `kd_makul`, `id_mhs`) VALUES
(1, 'TKC249', 1),
(2, 'TKC249', 3),
(3, 'TKC205', 4),
(5, 'TKC205', 5),
(6, 'TKC249', 7),
(7, 'TKC249', 8),
(8, '', 0),
(9, 'TKC227', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE IF NOT EXISTS `tb_presensi` (
  `id_presensi` int(4) NOT NULL AUTO_INCREMENT,
  `kd_makul` varchar(10) NOT NULL,
  `id_mhs` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_presensi`),
  UNIQUE KEY `id_presensi` (`id_presensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `kd_makul`, `id_mhs`, `tgl`, `waktu`) VALUES
(7, 'A111', '1', '2017-03-01', '11:19:58'),
(19, 'TKC227', '1', '2017-03-01', '15:00:04'),
(20, 'TKC227', '3', '2017-03-01', '12:21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
