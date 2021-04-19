-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 16, 2021 at 01:00 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_keluarga`
--

CREATE TABLE `dt_keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama_pasangan` text NOT NULL,
  `tgl_lahir_pasangan` date NOT NULL,
  `jml_anak` int(11) NOT NULL,
  `telp_pasangan` text NOT NULL,
  `alamat_pasangan` text NOT NULL,
  `pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_keluarga`
--

INSERT INTO `dt_keluarga` (`id_keluarga`, `nip`, `nama_pasangan`, `tgl_lahir_pasangan`, `jml_anak`, `telp_pasangan`, `alamat_pasangan`, `pekerjaan`) VALUES
(9, 'PEG-1910-0001', 'Angel Karamoy', '2006-12-12', 0, '0812256789', 'Singocandi RT/RW : 03/01', 'wiraswasta'),
(10, 'PEG-1910-0002', 'Siti Rohmah', '1972-05-12', 3, '081234567', 'Singocandi RT/RW : 03/01', 'Karyawan Swasta'),
(11, 'PEG-1910-000333', 'test', '2021-03-05', 2, '081917304888', 'mataram', 'Guru'),
(12, 'PEG-1910-2223', 'Annisa', '2001-01-12', 2, '0812256789', 'Singocandi RT/RW : 03/01', 'Pilot');

-- --------------------------------------------------------

--
-- Table structure for table `mst_divisi`
--

CREATE TABLE `mst_divisi` (
  `id_divisi` int(11) NOT NULL,
  `kode_divisi` text NOT NULL,
  `divisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_divisi`
--

INSERT INTO `mst_divisi` (`id_divisi`, `kode_divisi`, `divisi`) VALUES
(1, 'DEP-1910-0001', 'Keuangan'),
(2, 'DEP-1910-0002', 'Gudang'),
(3, 'DEP-2102-0003', 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `kode_jabatan` text NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id_jabatan`, `kode_jabatan`, `jabatan`) VALUES
(1, 'JAB-1910-0001', 'Staf Gudang'),
(2, 'JAB-1910-00202', 'Kepala Gudang I'),
(3, 'Penata (III/c)', 'Kaur Kepegawaian'),
(4, 'Penata TK.I (III/d)', 'Kasubag Tata Usaha'),
(5, 'Pembina TK.I (IV/a)', 'Kepala Kantor'),
(6, 'Penata TK.I (III/d)', 'Kaur Umum');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kategori`
--

CREATE TABLE `mst_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` text NOT NULL,
  `nama_kategori` text NOT NULL,
  `ket_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kategori`
--

INSERT INTO `mst_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`, `ket_kategori`) VALUES
(6, '3.05.02.01.003', 'Kursi Besi/Metal', '-'),
(7, '3.10.01.02.001', 'PC Unit', '-'),
(8, '3.05.02.06.017', 'Unit Power Supply', '-'),
(9, '3.05.02.02.001', 'Jam Mekanis', '-'),
(10, '3.05.02.01.009', 'Meja Komputer', '-'),
(11, '3.05.02.06.002', 'Televisi', ''),
(12, '3.05.02.99.999', 'Alat Rumah Tangga Lainnya', ''),
(13, '3.05.02.01.022', 'Partisi', ''),
(14, '3.05.01.05.017', 'Mesin Absensi', ''),
(15, '3.10.01.02.002', 'Laptop', ''),
(16, '3.05.02.01.002', 'Meja Kerja Kayu', ''),
(17, '3.10.02.03.003', 'Printer', ''),
(18, '3.10.02.03.004', 'Scanner', ''),
(19, '3.10.02.01.012', 'Hard Disk', ''),
(20, '3.05.02.01.005', 'Sice', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_pegawai`
--

CREATE TABLE `mst_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `kode_pegawai` text NOT NULL,
  `nama_lengkap` text NOT NULL,
  `sex` text NOT NULL,
  `kota_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_skrg` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `agama` text NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `status` text NOT NULL,
  `pend_akhir` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `pegawai_created` date NOT NULL,
  `pegawai_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pegawai`
--

INSERT INTO `mst_pegawai` (`id_pegawai`, `kode_pegawai`, `nama_lengkap`, `sex`, `kota_lahir`, `tgl_lahir`, `alamat_skrg`, `email`, `agama`, `no_ktp`, `status`, `pend_akhir`, `image`, `pegawai_created`, `pegawai_active`) VALUES
(2, 'PEG-1910-0001', 'I Putu Angga Purnama Widiarta', 'Pria', 'Mataram', '2000-04-18', 'Jalan Krakatau Perumahan Gegutu Indah No.23 Mataram', 'anggawidiarta55@gmail.com', 'Hindu', 1111111, 'Belum Menikah', 'S1', '7a656534-fee4-4e77-8404-c2499e148a59.jpeg', '2019-10-04', 1),
(7, 'PEG-2102-0002', 'I Made Satya Narendra Widiarta', 'Pria', 'Mataram', '2007-07-19', 'Sayang - Sayang', 'wayanartawan053@gmail.com', 'Hindu', 111231233, 'Belum Menikah', 'SMP', 'default.jpg', '2021-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nip` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `nama`, `nip`, `email`, `username`, `password`, `level`, `date_created`, `is_active`) VALUES
(21, 'Satya Narendra', '11322778', 'satyanarendrawidiarta@gmail.com', 'satya', '$2y$10$/Ww6dkhan/6cDQoT/Cjte.jJE/xoCY3Z/5WXIPKm7t3MZLFOKgDNm', 'Manager', '2021-02-24', 1),
(22, 'Wayan Artawan', '1123495332', 'wayanartawan053@gmail.com', 'wayan', '$2y$10$fN1IV/bLz5XwHHsU1V3ffOKoNnEw5sXeq5ZEKlZ1vKXutH14GMsfS', 'Gudang', '2021-02-24', 1),
(23, 'I Putu Angga Purnama Widiarta', '1804002000', 'anggajunior053@gmail.com', 'anggawidiarta', '$2y$10$egM4rVDGZqjoC5JGJoF12O4hKJgEURVXSg02r2RKCLQpoUdAvNGXa', 'Admin', '2021-02-24', 1),
(24, 'adminsuper2', '12345', 'admin@admssin.com55', 'admin', '$2y$10$adZZd6keq5gLynh4ZylLOeZWpvQo.QW1p4EXoIwH.8f5SsCaJnnNi', 'Admin', '2021-02-24', 1),
(28, 'I Made Satya Narendra Widiarta', 'PEG-2102-0002', 'wayanartawan053@gmail.com', 'usersatya', '$2y$10$9iPWs47In3mkXmrMPXqHTuS1VsWqJtNdlhgrk6j9ZLQkxgZEf7.qm', 'Staf', '2021-02-25', 1),
(29, 'manager', '1111', 'manager@gmail.com', 'manager', '$2y$10$z9T5BpnNS2EX8xAB1ZAYZu7Y3Izgeqay739tfDCGEuyeOSjAHE7TK', 'Manager', '2021-02-25', 1),
(30, 'staf', '555666', 'staf@gmail.com', 'staf', '$2y$10$iVxGzMzF9q2pm3tdnEKq0.s9MfJLNjMaoXI4EYKxQrDqBecvLGUe2', 'Staf', '2021-02-26', 1),
(31, 'gudang', '9999', 'gudang@gmail.com', 'gudang', '$2y$10$HNDX.LnKA6ERmjJUbo1pyuHYAdfnydQ4wnZsduuNtjZ/KIxX8BHSO', 'Gudang', '2021-02-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` text NOT NULL,
  `kategori_kode` text NOT NULL,
  `nama_barang` text NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `ket_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `kategori_kode`, `nama_barang`, `jumlah_barang`, `ket_barang`) VALUES
(5, 'PROD-202102-0005', 'CRG-202102-0006', 'HVS', 6, ''),
(6, 'PROD-202102-0006', 'CRG-201910-0001', 'KIKI', 150, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_in`
--

CREATE TABLE `tb_stock_in` (
  `id_stock_in` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `barang_kd` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `divisi_kd` text NOT NULL,
  `pengirim` text NOT NULL,
  `ket_barang` text NOT NULL,
  `jml_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stock_in`
--

INSERT INTO `tb_stock_in` (`id_stock_in`, `sess_id`, `barang_kd`, `tgl_masuk`, `divisi_kd`, `pengirim`, `ket_barang`, `jml_masuk`) VALUES
(6, 28, 'PROD-202102-0006', '2021-02-25', 'DEP-2102-0003', 'Anggun', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_out`
--

CREATE TABLE `tb_stock_out` (
  `id_stock_out` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `barang_kd` text NOT NULL,
  `tgl_keluar` date NOT NULL,
  `divisi_kd` text NOT NULL,
  `penerima` text NOT NULL,
  `ket_barang` text NOT NULL,
  `jml_minta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stock_out`
--

INSERT INTO `tb_stock_out` (`id_stock_out`, `sess_id`, `barang_kd`, `tgl_keluar`, `divisi_kd`, `penerima`, `ket_barang`, `jml_minta`) VALUES
(4, 28, 'PROD-202102-0006', '2021-02-18', 'DEP-2102-0003', 'Anggi', '', 900),
(5, 28, 'PROD-202102-0005', '2021-02-28', 'DEP-2102-0003', 'Hamba Tuhan', 'Barang Bagus', 90),
(6, 30, 'PROD-202102-0005', '2021-02-28', 'DEP-2102-0003', 'test', '', 5),
(7, 30, 'PROD-202102-0006', '2021-03-04', 'DEP-1910-0001', 'orang', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_struktural`
--

CREATE TABLE `tb_struktural` (
  `id_struktural` int(11) NOT NULL,
  `kode_struktural` text NOT NULL,
  `pegawai_kode` text NOT NULL,
  `divisi_kode` text NOT NULL,
  `jabatan_kode` text NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_struktural`
--

INSERT INTO `tb_struktural` (`id_struktural`, `kode_struktural`, `pegawai_kode`, `divisi_kode`, `jabatan_kode`, `tgl_input`) VALUES
(1, '201910150820200001', 'PEG-1910-0001', 'DEP-1910-0001', 'JAB-1910-0002', '2019-10-15'),
(3, '201910150947100003', 'PEG-1910-0002', 'DEP-1910-0002', 'JAB-1910-0001', '2019-10-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_keluarga`
--
ALTER TABLE `dt_keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `mst_divisi`
--
ALTER TABLE `mst_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `mst_kategori`
--
ALTER TABLE `mst_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_stock_in`
--
ALTER TABLE `tb_stock_in`
  ADD PRIMARY KEY (`id_stock_in`);

--
-- Indexes for table `tb_stock_out`
--
ALTER TABLE `tb_stock_out`
  ADD PRIMARY KEY (`id_stock_out`);

--
-- Indexes for table `tb_struktural`
--
ALTER TABLE `tb_struktural`
  ADD PRIMARY KEY (`id_struktural`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_keluarga`
--
ALTER TABLE `dt_keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mst_divisi`
--
ALTER TABLE `mst_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_kategori`
--
ALTER TABLE `mst_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_stock_in`
--
ALTER TABLE `tb_stock_in`
  MODIFY `id_stock_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_stock_out`
--
ALTER TABLE `tb_stock_out`
  MODIFY `id_stock_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_struktural`
--
ALTER TABLE `tb_struktural`
  MODIFY `id_struktural` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
