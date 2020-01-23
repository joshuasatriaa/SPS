-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 05:33 PM
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
-- Database: `bengcool`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `id_asuransi` varchar(15) NOT NULL,
  `waktu_asuransi` datetime NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `id_bengkel` varchar(15) NOT NULL,
  `gambar_ktp` text NOT NULL,
  `gambar_sim` text NOT NULL,
  `gambar_stnk` text NOT NULL,
  `gambar_1` text NOT NULL,
  `gambar_2` text NOT NULL,
  `gambar_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_penjual` varchar(15) NOT NULL,
  `gambar_barang` text NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `user_add` varchar(15) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(15) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(15) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bengkel`
--

CREATE TABLE `bengkel` (
  `id_bengkel` varchar(15) NOT NULL,
  `nama_bengkel` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `tanggal_registrasi` date NOT NULL,
  `gambar` text NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `user_add` varchar(15) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(15) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(15) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(15) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `id_service` varchar(15) NOT NULL,
  `waktu_service` datetime NOT NULL,
  `status_booking` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_promo_servis`
--

CREATE TABLE `detail_barang_promo_servis` (
  `id_promo` varchar(15) NOT NULL,
  `id_barang_promo` varchar(15) NOT NULL,
  `id_service_promo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_promo_barang`
--

CREATE TABLE `detail_promo_barang` (
  `id_promo` varchar(15) NOT NULL,
  `id_barang_promo_1` varchar(15) NOT NULL,
  `id_barang_promo_2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_promo_service`
--

CREATE TABLE `detail_promo_service` (
  `id_promo` varchar(15) NOT NULL,
  `id_service_promo_1` varchar(15) NOT NULL,
  `id_service_promo_2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_service`
--

CREATE TABLE `detail_service` (
  `id_detail_service` varchar(15) NOT NULL,
  `id_booking` varchar(15) NOT NULL,
  `status_detail_service` varchar(15) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_promo`
--

CREATE TABLE `jenis_promo` (
  `id_jenis_promo` varchar(15) NOT NULL,
  `deskripsi_promo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` varchar(15) NOT NULL,
  `id_komentator` varchar(15) NOT NULL,
  `id_post` varchar(15) NOT NULL,
  `waktu_komentar` datetime NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penngguna`
--

CREATE TABLE `penngguna` (
  `id_pengguna` varchar(15) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `tanggal_registrasi` datetime NOT NULL,
  `gambar` text NOT NULL,
  `tipe_pengguna` int(11) NOT NULL,
  `user_add` varchar(50) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(50) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(50) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(15) NOT NULL,
  `id_pengirim` varchar(15) NOT NULL,
  `id_penerima` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `id_pembeli` varchar(15) NOT NULL,
  `id_penjual` varchar(15) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `waktu_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` varchar(15) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `judul_post` varchar(30) NOT NULL,
  `isi_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` varchar(15) NOT NULL,
  `id_jenis_promo` varchar(15) NOT NULL,
  `id_partner1` varchar(15) NOT NULL,
  `id_partner2` varchar(15) NOT NULL,
  `jenis_partnership` varchar(20) NOT NULL,
  `waktu_promo` datetime NOT NULL,
  `status_promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` varchar(15) NOT NULL,
  `id_pemberi` varchar(15) NOT NULL,
  `id_penerima` varchar(15) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `waktu_rating` datetime NOT NULL,
  `rating_bengkel` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` varchar(15) NOT NULL,
  `id_bengkel` varchar(15) NOT NULL,
  `nama_service` varchar(50) NOT NULL,
  `harga_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
