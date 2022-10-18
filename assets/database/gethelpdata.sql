-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 10:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gethelpdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `noktp` text NOT NULL,
  `ktp` text NOT NULL,
  `selfie_ktp` varchar(30) NOT NULL,
  `no_rekening` text NOT NULL,
  `nama_bank` text NOT NULL,
  `nama_pemilik_rekening` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `users_id`, `nama_lengkap`, `alamat`, `phone`, `noktp`, `ktp`, `selfie_ktp`, `no_rekening`, `nama_bank`, `nama_pemilik_rekening`) VALUES
(1, 3, 'Jervin descrates kontessa', 'Jl. Monginsidi baru no 7', '089603410151', '736482922942928', '1ktp.jpeg', '1selfie.jpeg', '9388484848942', 'BCA', 'jervin descrates kontessa'),
(2, 2, 'Naruto Uzumaki', 'konoha', '089603410152', '736482922942921', '2ktp.jpeg', '2selfie.jpeg', '9388484848946', 'BRI', 'jervin descrates kontessa');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(20) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_campaign` varchar(255) NOT NULL,
  `category_id` int(5) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `status` int(3) NOT NULL COMMENT '0 selesai | 1 berjalan | 2 pending |3 ditolak\r\n',
  `donasi_terkumpul` varchar(255) NOT NULL DEFAULT '0',
  `target_donasi` varchar(255) NOT NULL,
  `cerita` text NOT NULL,
  `tujuan` text NOT NULL,
  `penerima_donasi` text NOT NULL,
  `rincian` text NOT NULL,
  `jumlah_dicairkan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaign_id`, `users_id`, `nama_campaign`, `category_id`, `gambar`, `slug`, `tanggal_dibuat`, `tanggal_berakhir`, `status`, `donasi_terkumpul`, `target_donasi`, `cerita`, `tujuan`, `penerima_donasi`, `rincian`, `jumlah_dicairkan`) VALUES
(2, 2, 'Bantu warga yang terdampak covid - 19', 1, 'thumbBagikan_makanan_untuk_warga_Makassar_terdampak_Covid-19.jpg', 'bantu-warga-yang-terdampak-covid-19', '2021-12-04', '2022-02-28', 1, '0', '30000000', '<p class=\"text-justify\"><span style=\"font-weight: bolder;\">#GetHelp</span> adalah kegiatan kemanusiaan untuk membagikan makanan berupa nasi bungkus kepada saudara kita yang kelaparan akibat pandemi COVID-19 Walaupun kita sudah memasuki era <em>new normal</em>, bukan berarti pandemi telah usai, banyak saudara-saudara kita yang saat ini masih kesulitan untuk memenuhi kebutuhan sehari-hari.</p><p class=\"text-justify\">Jangan sampai kita berhenti bergerak dalam membantu saudara-saudara kita di masa pandemi ini. Tidak ada kata terlambat untuk saling membantu satu sama lain.</p><p class=\"text-justify\">Sekecil apapun bantuanmu, akan berdampak besar bagi mereka. <span style=\"font-weight: bolder;\">#GetHelp</span> dukung dan berdonasi supaya tercapai 1000 nasi bungkus untuk dibagikan kepada mereka yang membutuhkan uluran tangan kita!</p><p class=\"text-justify\">1000 nasi bungkus ini akan disalurkan ke berbagai daerah dengan angka terdampak covid-19 yang masih tinggi.</p>', 'Membantu warga yang di phk karena covid', 'Panti asuhan dan panti jompo', '<p>Dana akan digunakan untuk membeli makanan dan memberi santunan kepada panti asuhan majyarit dan panti jompo sejahtera</p>', '0'),
(3, 1, 'Bagikan makanan untuk kota makassar', 2, 'thumbBantu_warga_Makassar_terdampak_bencana.jpg', 'bagikan-makanan-untuk-kota-makassar', '2021-12-07', '2022-04-30', 1, '0', '12000000', '<p class=\"text-justify\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"font-weight: bolder;\">#GetHelp</span>&nbsp;adalah kegiatan kemanusiaan untuk membagikan makanan berupa nasi bungkus kepada saudara kita yang kelaparan akibat pandemi COVID-19 Walaupun kita sudah memasuki era&nbsp;<em>new normal</em>, bukan berarti pandemi telah usai, banyak saudara-saudara kita yang saat ini masih kesulitan untuk memenuhi kebutuhan sehari-hari.</p><p class=\"text-justify\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Jangan sampai kita berhenti bergerak dalam membantu saudara-saudara kita di masa pandemi ini. Tidak ada kata terlambat untuk saling membantu satu sama lain.</p><p class=\"text-justify\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Sekecil apapun bantuanmu, akan berdampak besar bagi mereka.&nbsp;<span style=\"font-weight: bolder;\">#GetHelp</span>&nbsp;dukung dan berdonasi supaya tercapai 1000 nasi bungkus untuk dibagikan kepada mereka yang membutuhkan uluran tangan kita!</p><p class=\"text-justify\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">1000 nasi bungkus ini akan disalurkan ke berbagai daerah dengan angka terdampak covid-19 yang masih tinggi.</p>', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kode` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama`, `kode`, `icon`) VALUES
(1, 'Bencana', 'BCN', 'fa fa-house-damage'),
(2, 'Sosial', 'SSL', 'fa fa-users'),
(3, 'Kesehatan', 'KSH', 'fa fa-first-aid'),
(4, 'Pendidikan', 'PDK', ''),
(5, 'Rumah-Ibadah', 'RIH', ''),
(6, 'Lingkungan', 'LK', ''),
(7, 'Menolong-Hewan', 'MH', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_akun`
--

CREATE TABLE `jenis_akun` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_akun`
--

INSERT INTO `jenis_akun` (`id`, `nama`, `kode`) VALUES
(1, 'Individu', 'IDU'),
(2, 'Yayasan', 'YY'),
(3, 'Komunitas', 'KMT'),
(4, 'Organisasi Mahasiswa', 'ORMAS');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_organisasi` text NOT NULL,
  `nama_pj` text NOT NULL,
  `phone_org` varchar(16) NOT NULL,
  `ktp_pj` text NOT NULL,
  `berkas_pendukung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `users_id`, `nama_organisasi`, `nama_pj`, `phone_org`, `ktp_pj`, `berkas_pendukung`) VALUES
(1, 2, 'Akatsuki', 'Pain', '089603930243', '2ktppj.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `nomorhp` varchar(16) NOT NULL,
  `kategori` text NOT NULL,
  `detail` text NOT NULL,
  `foto_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `order_id` varchar(20) NOT NULL,
  `campaign_id` int(11) NOT NULL DEFAULT 0,
  `nama` text DEFAULT NULL,
  `gross_amount` int(128) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `status_code` char(3) NOT NULL,
  `doa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`order_id`, `campaign_id`, `nama`, `gross_amount`, `payment_type`, `transaction_time`, `va_number`, `status_code`, `doa`) VALUES
('22222222', 1, 'Jervin Kontessa', 500000, 'bank', '2021-11-30 08:09:32', '193040203', '200', 'Semoga cepat terkumpul dananya'),
('22222229', 1, 'Jervin Kontessa\r\n', 200000, 'bank', '2021-11-30 09:09:40', '029039291', '200', 'Cepat sembuh');

--
-- Triggers `transaksi_midtrans`
--
DELIMITER $$
CREATE TRIGGER `autosum` AFTER UPDATE ON `transaksi_midtrans` FOR EACH ROW BEGIN
UPDATE campaign SET campaign.donasi_terkumpul = campaign.donasi_terkumpul + new.gross_amount
WHERE campaign_id = new.campaign_id;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `update_campaign`
--

CREATE TABLE `update_campaign` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_campaign`
--

INSERT INTO `update_campaign` (`id`, `campaign_id`, `gambar`, `keterangan`, `tanggal`) VALUES
(1, 1, 'bukti-transfer.jpg', '<p>Rp. 1.000.000</p>\r\n\r\n<p>Bank Account: 123-578-789</P>\r\n<p>Bank Account Name: Fernando Huinardy</p>', '2021-12-04'),
(2, 1, 'buktiBantu_kota_palu_pulih_dari_bencana2021-12-07.png', '<p><b><span style=\"font-family: Arial;\">Mengirim dana</span></b><span style=\"font-family: Arial;\"> ke rekening&nbsp;</span></p><p><span style=\"font-family: Arial;\">pengalang dana bpk susilo heryanto</span></p><p><span style=\"font-family: Arial;\">sebesar Rp. 1.000.000</span></p><p><span style=\"font-family: Arial;\">﻿</span><br></p>', '2021-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `terakhir_login` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive ',
  `verifikasi` int(3) NOT NULL COMMENT '0 belum | 1 sudah verifikasi | 2 pending',
  `id_jenisakun` int(11) NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `image`, `email`, `password`, `tanggal_dibuat`, `terakhir_login`, `status`, `verifikasi`, `id_jenisakun`, `role`) VALUES
(1, 'GetHelp', 'gethelp.jpg', 'gethelp.startup@gmail.com', '$2y$10$MP3WgF7UrukMc/kAV0545eBf4JWaB5QiigOd1Q400d6Djd9B4vbjS', '2021-12-04', '2021-12-04', 1, 1, 1, 'admin'),
(2, 'Naruto Uzumaki', 'default.png', 'jervin.uzumaki@gmail.com', '$2y$10$hluSMJQLZeIT2WePocqfHux/h7zCC0s1Ww9F0Nzny8Ny00T7Gjx42', '2021-12-04', '2021-12-11', 1, 1, 2, 'user'),
(3, 'Jervin Kontessa', 'default.png', 'jervindescrates@gmail.com', '', '2021-12-04', '2021-12-12', 1, 1, 1, 'user'),
(4, 'Jervin Descrates Kontessa', 'default.png', 'jervindescrates_19@kharisma.ac.id', '', '2021-12-08', '0000-00-00', 1, 0, 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `update_campaign`
--
ALTER TABLE `update_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `update_campaign`
--
ALTER TABLE `update_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
