-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2020 pada 03.40
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosejati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admintoko`
--

CREATE TABLE `admintoko` (
  `id` int(5) NOT NULL,
  `usernameAdmin` varchar(30) NOT NULL,
  `passwordAdmin` varchar(30) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admintoko`
--

INSERT INTO `admintoko` (`id`, `usernameAdmin`, `passwordAdmin`, `namaAdmin`) VALUES
(1, 'abidkamaluddin', 'abidkamaluddin', 'abid kamaluddin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `harga_barang` int(15) DEFAULT NULL,
  `berat_barang` int(5) DEFAULT NULL,
  `foto_barang` varchar(100) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  `stok` int(5) DEFAULT NULL,
  `info_barang` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `berat_barang`, `foto_barang`, `jenis`, `kategori`, `stok`, `info_barang`) VALUES
(3, 'Rojo Lele 20kg', 200000, 20000, 'rojolele20kg.png', 'IR Pulen', 'Kemasan', 17, 'beras pulen dan memiliki fisik yang kasar'),
(8, 'Rojo Lele 10kg', 100000, 10000, 'lele10kg.png', 'IR Pulen', 'Kemasan', 10, 'beras pulen dan memiliki fisik yang kasar'),
(9, 'Ramos 20kg', 190000, 20000, 'ramos20kg.png', 'IR sedang', 'Kemasan', 8, 'beras sedang'),
(10, 'Ramos 10kg', 95000, 10000, 'ramos10kg.png', 'IR sedang', 'Kemasan', 10, 'beras sedang'),
(11, 'Ramos Bandung 5kg', 55000, 5000, 'ramosbdg5kg.png', 'IR sedang', 'Kemasan', 10, 'beras sedang, dan memiliki fisik yang kasar'),
(12, 'Lele Special 5kg', 60000, 5000, 'lelespesial5kg.png', 'IR Pulen', 'Kemasan', 3, 'pulen, memiliki fisik yang kasar'),
(13, 'BMW Sahabat 5kg', 70000, 5000, 'bmwsahabat5kg.png', 'Pandan Wangi', 'Kemasan', 10, 'pandan wangi, memiliki fisik yang besar dan bulat'),
(19, 'Tiga Jambu 10kg', 130000, 10000, 'tigajambu10kg.png', 'Pandan Wangi', 'Kemasan', 12, 'pandan wangi, memiliki fisik yang besar dan agak bulat'),
(20, 'Tiga jambu 5kg', 70000, 5000, 'tigajambu5kg.png', 'Pandan Wangi', 'Kemasan', 20, 'pandan wangi, memiliki fisik yang besar dan agak bulat'),
(21, 'IR 11,000/kg', 11000, 1000, 'IRbagus.png', 'IR Pulen', 'Eceran', 50, 'beras pulen, memiliki fisik yang kasar dan putih.'),
(22, 'IR 10.000/kg', 10000, 1000, 'IRsedang.png', 'IR sedang', 'Eceran', 43, 'beras sedang, memiliki fisik tidak terlalu putih, nasinya tidak terlalu pulen'),
(23, 'IR 9,600/KG', 9600, 1000, 'IRsedang2.png', 'IR sedang', 'Eceran', 50, 'memiliki  fisik yang kurang kasar, dan tidak terlalu pulen'),
(24, 'Pandan wangi 16,000/kg', 16000, 1000, 'pandanwangii.png', 'Pandan Wangi', 'Eceran', 50, 'pandan wangi, beras pulen dengan kualitas baik, memiliki fisik bulat dan besar.'),
(25, 'perak 12,000/kg', 12000, 1000, 'perakk.png', 'Perak', 'Eceran', 50, 'beras perak, cocok untuk membuat lontong dan ketupat. sangat membutuhkan banyak air.'),
(26, 'Ketan Putih 14,000/kg', 14000, 1000, 'ketan2.png', 'Ketan Putih', 'Eceran', 50, 'ketan putih, memiliki fisik yang kasar dan bersih, cocok untuk ULI'),
(27, 'Ketan Putih 12,000/kg', 12000, 1000, 'ketan2.png', 'Ketan Putih', 'Eceran', 50, 'ketan putih, memiliki fisik yang kurang putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'IR Pulen'),
(2, 'IR sedang'),
(3, 'IR perak'),
(4, 'Pandan Wangi'),
(5, 'Ketan Putih'),
(6, 'Perak'),
(7, 'Beras Merah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Kemasan'),
(2, 'Eceran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(25) NOT NULL,
  `tarif` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Wisma Asri', 5000),
(2, 'Tambun Utara', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password_plg` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `telpon_pelanggan` varchar(15) NOT NULL,
  `foto_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password_plg`, `nama_pelanggan`, `telpon_pelanggan`, `foto_pelanggan`, `alamat`) VALUES
(1, 'nedinedi', 'nedinedi11', 'sunedi', '08990012431', '', 'Kp.Gabus Pabrik. Desa Sriamur, Kec. Tambun Utara, Kab.Bekasi, Jawa Barat'),
(2, 'uswatun', 'uswatun11', 'uswatun Nissa', '087787912639', '', ''),
(4, 'abidkamal', 'abidkamal', 'abidkamaluddin', '08983044787', '', 'kp.pisangan, Desa Satria Mekar  Tambun Utara, kab.Bekasi'),
(5, 'sriutami', 'sriutami', 'Sri Utami Dewi', '085883162598', '', 'Taman Wisma Asri 1 jln Anggur 6A blok D22/40 rt.006 rw.011, kel. Teluk Pucung, Kec. Bekasi Utara'),
(6, 'meidiana', 'meidiana', 'Meidiana Riska Putri', '08977872619', '', 'Taman wisma asri. Jalan markisa 8 blok d 16 no 34'),
(7, 'khalida', 'khalida', 'Khalida Safira Silmy', '0895387198943', '', 'Jalan Irun III No. 126 Rt. 001 Rw. 006 Kel. Mustikasari Kec. Mustikajaya Kota Bekasi 17167');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti_pembayaran`) VALUES
(1, 1, 'abid kamaluddin', 'DKI', 500000, '2020-05-23', ''),
(4, 27, 'abid kamaluddin', 'MANDIRI', 260000, '2020-05-23', '20200523071151New Doc 2017-07-17_4.jpg'),
(5, 27, 'abid kamaluddin', 'MANDIRI', 260000, '2020-05-23', '20200523071319New Doc 2017-07-17_4.jpg'),
(6, 31, 'abid kamaluddin', 'DKI', 480000, '2020-05-23', '20200523095830New Doc 2017-07-17_1.jpg'),
(7, 30, 'Uswatun', 'DKI', 600000, '2020-05-23', '20200523151049New Doc 2017-07-17_3.jpg'),
(8, 40, 'Sri Utami Dewi', 'MANDIRI', 205000, '2020-06-25', '20200625151605WhatsApp Image 2020-06-19 at 10.30.26.jpeg'),
(9, 41, 'Meidiana Riska Putri', 'MANDIRI', 65000, '2020-06-25', '20200625151929WhatsApp Image 2020-06-19 at 10.30.26.jpeg'),
(10, 42, 'Khalida Silmy', 'MANDIRI', 600000, '2020-06-25', '20200625152119WhatsApp Image 2020-06-19 at 10.30.26.jpeg'),
(11, 43, 'khalida', 'Mandiri', 140000, '2020-09-14', '20200914033416WhatsApp Image 2020-06-20 at 09.36.58.jpeg'),
(12, 44, 'Khalida', 'Mandiri', 140000, '2020-09-14', '20200914033610buktibayar.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(10) NOT NULL,
  `tarif` int(10) NOT NULL,
  `total_tarif` int(20) NOT NULL,
  `nama_kota` varchar(25) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `catatan` text NOT NULL,
  `status_pembelian` varchar(25) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `tarif`, `total_tarif`, `nama_kota`, `alamat_pengiriman`, `catatan`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 1, 1, '2020-04-30', 1, 10000, 0, 'bekasi', '', '', '', ''),
(2, 2, 1, '2020-04-30', 2, 30000, 0, 'Cikrarang', '', '', '', ''),
(17, 1, 1, '2020-05-19', 620000, 20000, 0, '', 'kp pisangan RT 14 Desa Satria Mekar', '', '', ''),
(18, 1, 1, '2020-05-19', 555000, 20000, 0, 'cikarang', 'bekasi kota alun alun', '', '', ''),
(19, 1, 1, '2020-05-19', 560000, 20000, 20000, 'cikarang', '', '', '', ''),
(20, 1, 1, '2020-05-19', 240000, 20000, 40000, 'cikarang', 'kp pisangan gabus', '', '', ''),
(21, 1, 1, '2020-05-19', 560000, 20000, 20000, 'cikarang', 'Kp.pisangan', '', '', ''),
(22, 1, 1, '2020-05-19', 600000, 20000, 60000, 'cikarang', 'bekasi bekasi', '', '', ''),
(23, 1, 0, '2020-05-19', 240000, 0, 0, '', '', '', '', ''),
(24, 1, 1, '2020-05-20', 595000, 20000, 60000, 'cikarang', 'cikarang utara ', '', '', ''),
(25, 1, 1, '2020-05-20', 260000, 20000, 20000, 'cikarang', 'assasas', '', '', ''),
(26, 1, 1, '2020-05-20', 860000, 20000, 80000, 'cikarang', 'cikarang utara', '', '', ''),
(27, 1, 1, '2020-05-22', 260000, 20000, 20000, 'cikarang', 'bekasi utara', '', 'Dikirim', '111'),
(28, 2, 1, '2020-05-22', 260000, 20000, 20000, 'cikarang', 'bekasi utara', '', 'pending', ''),
(29, 2, 1, '2020-05-22', 600000, 20000, 60000, 'cikarang', 'bekasi utara', '', 'pending', ''),
(30, 4, 1, '2020-05-23', 600000, 20000, 60000, 'cikarang', 'kp.pisangan Rt14/07 Desa Satria Mekar, Tambun Utara. Kab.Bekasi', '', 'sudah kirim pembayaran', ''),
(31, 4, 0, '2020-05-23', 480000, 0, 0, '', 'ASDASASAS', '', 'Dikirim', '112'),
(32, 1, 1, '2020-05-23', 520000, 20000, 40000, 'cikarang', 'addafffffffffffffffffffffffff', '', 'pending', ''),
(33, 4, 2, '2020-05-28', 510000, 15000, 30000, 'Cibitung', 'Cibitung Utara, Kabupaten Bekasi', 'hubungi nomor 0856129233139 ', 'pending', ''),
(34, 4, 2, '2020-05-28', 255000, 15000, 15000, 'Cibitung', 'cibitung rt 15', 'contoh', 'pending', ''),
(35, 4, 1, '2020-05-29', 330000, 20000, 160000, 'cikarang', 'cibitung barat', 'kirim tepat waktu yaa', 'pending', ''),
(36, 4, 1, '2020-05-29', 150000, 20000, 100000, 'cikarang', 'asdas', 'addaas', 'pending', ''),
(37, 4, 1, '2020-05-29', 340000, 20000, 40000, 'cikarang', 'asdasas', 'sassda', 'pending', ''),
(38, 4, 1, '2020-05-29', 590000, 20000, 60000, 'cikarang', 'assaddsa', 'asddasads', 'pending', ''),
(39, 4, 1, '2020-05-29', 385000, 20000, 100000, 'cikarang', 'asdsdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'sdasas', 'pending', ''),
(40, 5, 1, '2020-06-25', 205000, 5000, 15000, 'Wisma Asri', 'Taman Wisma Asri 1 jln Anggur 6A blok D22/40 rt.006 rw.011, kel. Teluk Pucung, Kec. Bekasi Utara', 'semoga cepat sampai', 'Selesai', '222'),
(41, 6, 1, '2020-06-25', 65000, 5000, 5000, 'Wisma Asri', 'Taman wisma asri. Jalan markisa 8 blok d 16 no 34', 'bismillah nyoba', 'Dikirim', '1214'),
(42, 7, 2, '2020-06-25', 600000, 10000, 30000, 'Tambun Utara', 'Jalan Irun III No. 126 Rt. 001 Rw. 006 Kel. Mustikasari Kec. Mustikajaya Kota Bekasi 17167', 'cepat ya mas ', 'sudah kirim pembayaran', ''),
(43, 7, 2, '2020-09-14', 140000, 10000, 20000, 'Tambun Utara', 'Jalan Irun III No. 126 Rt. 001 Rw. 006 Kel. Mustikasari Kec. Mustikajaya Kota Bekasi 17167', 'Semoga Cepat sampai', 'sudah kirim pembayaran', ''),
(44, 7, 2, '2020-09-14', 140000, 10000, 20000, 'Tambun Utara', 'Jalan Irun III No. 126 Rt. 001 Rw. 006 Kel. Mustikasari Kec. Mustikajaya Kota Bekasi 17167', 'Semoga cepat sampai', 'sudah kirim pembayaran', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelianBarang` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat` int(10) NOT NULL,
  `sub_berat` int(20) NOT NULL,
  `sub_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelianBarang`, `id_pembelian`, `id_barang`, `jumlah`, `nama`, `harga`, `berat`, `sub_berat`, `sub_harga`) VALUES
(9, 1, 1, 1, '', 0, 0, 0, 0),
(10, 1, 3, 1, '', 0, 0, 0, 0),
(11, 17, 1, 2, '', 0, 0, 0, 0),
(12, 17, 3, 2, '', 0, 0, 0, 0),
(13, 18, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(14, 18, 8, 1, 'Rojo Lele 5kg', 55000, 10000, 10000, 55000),
(15, 0, 3, 2, 'Ramos Bandung 5kg', 60000, 5000, 10000, 120000),
(16, 0, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(17, 19, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(18, 19, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(19, 20, 10, 2, 'Ramos 10kg', 100000, 10, 20, 200000),
(20, 21, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(21, 21, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(22, 22, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(23, 22, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(24, 23, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(25, 24, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(26, 24, 8, 1, 'Rojo Lele 5kg', 55000, 10000, 10000, 55000),
(27, 25, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(28, 26, 1, 3, 'Ramos Bandung 20kg', 240000, 20000, 60000, 720000),
(29, 26, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(30, 27, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(31, 28, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(32, 29, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(33, 29, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(34, 30, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(35, 30, 3, 1, 'Ramos Bandung 5kg', 60000, 5000, 5000, 60000),
(36, 31, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(37, 32, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(38, 33, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(39, 34, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(40, 35, 8, 2, 'Rojo Lele 5kg', 55000, 10000, 20000, 110000),
(41, 35, 20, 6, 'IR 10,000/KG', 10000, 1000, 6000, 60000),
(42, 36, 20, 5, 'IR 10,000/KG', 10000, 1000, 5000, 50000),
(43, 37, 1, 1, 'Ramos Bandung 20kg', 240000, 20000, 20000, 240000),
(44, 37, 20, 6, 'IR 10,000/KG', 10000, 1000, 6000, 60000),
(45, 38, 1, 2, 'Ramos Bandung 20kg', 240000, 20000, 40000, 480000),
(46, 38, 20, 5, 'IR 10,000/KG', 10000, 1000, 5000, 50000),
(47, 39, 3, 3, 'Ramos Bandung 5kg', 60000, 5000, 15000, 180000),
(48, 39, 20, 5, 'IR 10,000/KG', 10000, 1000, 5000, 50000),
(49, 39, 8, 1, 'Rojo Lele 5kg', 55000, 10000, 10000, 55000),
(50, 40, 12, 2, 'Lele Special 5kg', 60000, 5000, 10000, 120000),
(51, 40, 22, 7, 'IR 10.000/kg', 10000, 1000, 7000, 70000),
(52, 41, 12, 1, 'Lele Special 5kg', 60000, 5000, 5000, 60000),
(53, 42, 9, 3, 'Ramos 20kg', 190000, 20000, 60000, 570000),
(54, 43, 12, 2, 'Lele Special 5kg', 60000, 5000, 10000, 120000),
(55, 44, 12, 2, 'Lele Special 5kg', 60000, 5000, 10000, 120000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admintoko`
--
ALTER TABLE `admintoko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelianBarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admintoko`
--
ALTER TABLE `admintoko`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelianBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
