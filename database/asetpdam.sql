-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2023 pada 16.42
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asetpdam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`, `bagian`) VALUES
(1, 'Admin Pengadaan', 'admin1', 'admin001', 'admin1', 'Pengadaan'),
(2, 'Admin Pemeliharaan', 'admin2', 'admin002', 'admin2', 'Pemeliharaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(10) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `spesifikasi` varchar(200) NOT NULL,
  `nilai_awal` int(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `id_rekanan` int(10) NOT NULL,
  `id_pengadaan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id_aset`, `nama_aset`, `merk`, `spesifikasi`, `nilai_awal`, `lokasi`, `kondisi`, `id_rekanan`, `id_pengadaan`) VALUES
(1, 'Panel Pompa', 'BP Gombang', '155 KW', 14500000, 'Ponjong , Unit Karangmojo, Cabang Seropan', 'Baik (Berfungsi)', 1, 1),
(2, 'Motor Pompa 22 KW x 3 PH', '-', '22 KW x 3 PH', 10450000, 'Ngembel , Unit Wonosari, Cabang Wonosari', 'Baik (Berfungsi)', 2, 2),
(3, 'Elektromotor Pompa', 'Hega', '75 KW', 33800000, 'Bejiharjo , Unit Karangmojo, Cabang Seropan', 'Baik (Berfungsi)', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(10) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
(1, 'Wonosari'),
(2, 'Seropan'),
(3, 'Brirbin'),
(4, 'Baron');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(200) NOT NULL,
  `id_unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `id_unit`) VALUES
(1, 'jalan abcdefg ', 2),
(2, 'jalan efnsdhdsfj', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(10) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `no_dokumen`, `tgl_beli`) VALUES
(1, '96/INV/PDAMGK/13', '2013-04-25'),
(2, '97/INV/PDAMGK/13', '2013-06-26'),
(6, '107/INV/PDAMGK/14', '2014-04-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekanan`
--

CREATE TABLE `rekanan` (
  `id_rekanan` int(10) NOT NULL,
  `nama_rekanan` varchar(50) NOT NULL,
  `alamat_rekanan` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekanan`
--

INSERT INTO `rekanan` (`id_rekanan`, `nama_rekanan`, `alamat_rekanan`, `nama_pimpinan`, `no_hp`) VALUES
(1, 'rekanan A', 'alamat rekanan a', 'pimpinan a', '081234567890'),
(2, 'rekanan B', 'alamat rekanan b', 'pimpinan B', '0876543210'),
(3, 'Rekanan C', 'alamat rekanan C', 'pimpinan C', '09897873647325');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(10) NOT NULL,
  `id_aset` int(10) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `lok_lama` varchar(100) NOT NULL,
  `lok_baru` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_aset`, `kondisi`, `lok_lama`, `lok_baru`, `keterangan`) VALUES
(1, 1, 'Baik (Berfungsi)', ' ---', 'Ponjong , Unit Karangmojo, Cabang Seropan', 'baik'),
(2, 2, 'Baik (Berfungsi)', ' ---', 'Ngembel , Unit Wonosari, Cabang Wonosari', 'pemasangan baru'),
(3, 3, 'Baik (Berfungsi)', 'Bejiharjo , Unit Karangmojo, Cabang Seropan', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(10) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `id_cabang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`, `id_cabang`) VALUES
(1, 'Wonosari', 1),
(2, 'Gedangsari', 1),
(3, 'Nglipar', 1),
(4, 'Semanu', 2),
(5, 'Karangmojo', 2),
(6, 'Tepus', 3),
(7, 'Rongkop', 3),
(8, 'Paliyan', 4),
(9, 'Baron', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_rekanan` (`id_rekanan`),
  ADD KEY `id_pengandaan` (`id_pengadaan`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `rekanan`
--
ALTER TABLE `rekanan`
  ADD PRIMARY KEY (`id_rekanan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rekanan`
--
ALTER TABLE `rekanan`
  MODIFY `id_rekanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_rekanan`) REFERENCES `rekanan` (`id_rekanan`),
  ADD CONSTRAINT `aset_ibfk_4` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`);

--
-- Ketidakleluasaan untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_4` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`);

--
-- Ketidakleluasaan untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
