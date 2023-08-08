-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 01:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simaksosmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`id`, `nama`, `umur`, `pekerjaan`, `tahun`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 'daffa', '10', 'siswa', '2023', '08', '2023-07-11 19:13:26', '2023-07-11 19:13:26'),
(2, 'hans', '14', 'siswa', '2023', '05', '2023-07-11 19:14:05', '2023-07-11 19:14:05'),
(3, 'adam', '12', 'siswa', '2024', '12', '2023-07-11 19:14:34', '2023-07-11 19:14:34'),
(4, 'nadiv', '7', 'siswa', '2024', '12', '2023-07-11 20:37:17', '2023-07-11 20:37:17'),
(5, 'rendi', '12', 'nganggur', '2023', '07', '2023-07-12 00:24:34', '2023-07-12 00:24:34'),
(6, 'melvan', '24', 'nganggur', '2023', '07', '2023-07-12 00:24:34', '2023-07-12 00:24:34'),
(7, 'farel', '11', 'nganggur', '2023', '07', '2023-07-12 00:24:34', '2023-07-12 00:24:34'),
(8, 'rafi', '19', 'nganggur', '2023', '07', '2023-07-12 00:24:34', '2023-07-12 00:24:34'),
(18, 'vollerei', '33', 'pns', '2023', '03', '2023-07-12 21:38:43', '2023-07-12 21:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_07_02_041016_create_moduls_table', 1),
(11, '2023_07_03_022952_create_kajians_table', 2),
(13, '2023_07_05_020727_create_f_a_q_s_table', 3),
(14, '2023_07_12_015240_create_dummies_table', 4),
(15, '2023_07_12_073914_create_arsips_table', 5),
(16, '2023_07_18_070258_create_laporans_table', 6),
(17, '2023_07_25_071833_create_wartas_table', 7),
(18, '2023_07_26_140147_create_admins_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Daffa', '$2y$10$QpnM5JT2UYupEWptJV7BrObxDMT4RCy4Yh01ablrHeNvSuGpCxr52', '2023-07-26 07:30:20', '2023-07-26 07:30:20'),
(3, 'Denny', '$2y$10$ITxP9omC7dSPLkfuCeZTH.tuy/PBVb58F8nu4uPeFxKaXxysKNslm', '2023-07-26 11:19:12', '2023-07-26 11:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id`, `tahun`, `bulan`, `dokumen`, `created_at`, `updated_at`) VALUES
(3, '2023', '03', 'dummy_3.xlsx', '2023-07-12 21:35:10', '2023-07-12 21:35:10'),
(4, '2023', '03', 'dummy_3.xlsx', '2023-07-12 21:38:42', '2023-07-12 21:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `pertanyaan`, `jawaban`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana Tata Cara Pengusulan Data Terpadu Kesejahteraan Sosial dan Program Bantuan Sosial?', 'Pengusulan Data Terpadu Kesejahteraan Sosial Dilakukan melalui operator SIKS-NG di tingkat Desa/Kelurahan dengan menunjukkan kartu keluarga dan foto rumah tampak depan. Pengusulan dilaksanakan pada tanggal 15-24 setiap bulan.', 'DATA, PERLINDUNGAN DAN JAMINAN SOSIAL', '2023-07-05 15:54:35', '2023-07-05 15:54:35'),
(2, 'Apa saja bantuan yang diperleh anak yang terdata sebagai penerima bantuan YAPI?', 'Anak yang terdata sebagai penerima program YAPI Kementerian Sosial menerima bantuan uang sejumlah Rp 200.000, perbulan.', 'DATA DAN REHABILITASI SOSIAL', '2023-07-05 15:56:25', '2023-07-05 15:56:25'),
(3, 'Bagaimana pembahasan pertemuan kelompok usah bersama yang terdata sebagai penerima bantuan HIBAH Queensland?', 'Mekanisme pertemuan kelompok dilaksanakan dengan pembahasan mengenai pembukuan dan pelaporan keuangan yang dihadiri oleh 10 orang anggota/kelompok.', 'DATA DAN PEMBERDAYAAN SOSIAL', '2023-07-05 15:57:39', '2023-07-05 15:57:39'),
(4, 'Berapakah jumlah data dan program kesejahteraan sosial yang telah dilaksanakan Dinas Sosial Kabupaten Brebes pada tahun 2022 di bidang Perlindungan Sosial Kesehatan?', 'Terdapat 2 program kesejahteraan sosial di Bidang perlindungan sosial kesehatan baik yang berasal dari APBN maupun APBD, sehingga total masyarakat yang mendapatkan program ini adalah 1.096.168 orang.', 'DATA DAN PROGRAM KESEJAHTERAAN SOSIAL', '2023-07-05 15:59:11', '2023-07-05 15:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kajian`
--

CREATE TABLE `tbl_kajian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kajian`
--

INSERT INTO `tbl_kajian` (`id`, `judul`, `deskripsi`, `kategori`, `dokumen`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'KAJIAN PENGELOLAAN DATA TERPADU KESEJAHTERAAN SOSIAL DALAM RANGKA PENANGGULANGAN KEMISKINAN DENGAN PENDEKATAN NILAI', '', 'penanggulangan-kemiskinan', 'KAJIAN PENGELOLAAN DATA TERPADU KESEJAHTERAAN SOSIAL DALAM RANGKA PENANGGULANGAN KEMISKINAN DENGAN PENDEKATAN NILAI.pdf', 'pdf', '2023-07-05 04:52:21', '2023-07-05 04:52:21'),
(2, 'MODUL DATA DAN PEMBERDAYAAN SOSIAL', '', 'pemberdayaan-sosial', 'MODUL DATA DAN PEMBERDAYAAN SOSIAL.pdf', 'pdf', '2023-07-05 04:53:13', '2023-07-05 04:53:13'),
(4, 'edit kajian', '', 'jaminan-sosial', '07 KK4D Delete Data Pada Laravel (Part 3).pdf', 'pdf', '2023-07-06 00:05:05', '2023-07-06 00:11:20'),
(5, 'blablabla', '', 'jaminan-sosial', '05 KK4D Authentication.pdf', 'pdf', '2023-07-06 00:12:02', '2023-07-06 00:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id`, `judul`, `deskripsi`, `tipe`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 'Laporan Intervensi', '', 'pdf', 'PTSGenap23_Portofolio_PPKN_XI_ALL.pdf', '2023-07-18 00:25:42', '2023-07-23 02:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul`
--

CREATE TABLE `tbl_modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_modul`
--

INSERT INTO `tbl_modul` (`id`, `judul`, `deskripsi`, `dokumen`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'VERIFIKASI DAN VALIDASI DTKS', '', 'VERIFIKASI DAN VALIDASI DTKS.pdf', 'pdf', '2023-07-03 17:53:48', '2023-07-03 17:53:48'),
(2, 'TATA CARA USULAN DATA TERPADU KESEJAHTERAAN SOSIAL', '', 'TATA CARA USULAN DATA TERPADU KESEJAHTERAAN SOSIAL.pdf', 'pdf', '2023-07-05 04:50:31', '2023-07-26 08:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warta`
--

CREATE TABLE `tbl_warta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_warta`
--

INSERT INTO `tbl_warta` (`id`, `judul`, `isi`, `sumber`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 'Berita tentang ini itu dan lain sebagainya', 'JAKARTA, KOMPAS.com - Partai Demokrasi Indonesia Perjuangan (PDI-P) memutuskan mencopot Cinta Mega sebagai anggota Dewan Perwakilan Rakyat Daerah (DPRD) DKI Jakarta.\r\n\r\nPosisi Cinta di DPRD DKI Jakarta akan digantikan dengan kader lain melalui mekanisme pergantian antar waktu (PAW). \"Tadi kami rapat pleno karena segala sesuatu keputusan kami biasa melalui rapat pleno ini.\r\n\r\nSelesai rapat pleno, kami putuskan memberikan sanksi berupa PAW,\" ujar Ketua Dewan Pimpinan Daerah (DPD) PDI-P DKI Jakarta Ady Wijaya di kantornya, Selasa (25/7/2023) malam.', 'kompas.com', 'heheheha.png', '2023-07-25 18:34:04', '2023-07-25 18:34:04'),
(2, 'Berita lagi ges', 'Malang - Ratusan calon mahasiswa baru (camaba) Universitas Brawijaya (UB) dikabarkan mundur setelah lolos seleksi nasional berbasis tes (SNBT). Kabar mundurnya mahasiswa UB itu viral di medsos.\r\n\r\nInformasi bahwa ratusan calon mahasiswa UB yang mundur bersamaan itu diunggah salah satu akun Twitter. Tidak disebutkan alasan kenapa ratusan camaba itu memilih mundur.\r\n\r\n\"Ini kenapa mengundurkan diri,\" unggah akun tersebut saat dilihat detikJatim, Senin (24/7/2023) sore.\r\n\r\nUB merespons unggahan yang viral di media sosial. Perguruan tinggi negeri ternama di Kota Malang ini membantah bila ratusan camaba itu mundur.\r\n\r\nKepala Sub Bagian Humas dan Kearsipan UB Kotok Guritno menegaskan bahwa ratusan camaba itu bukan mundur, melainkan tidak mendaftar ulang setelah lolos SNBT.\r\n\r\n\"Kebijakan kami, jika tidak melakukan daftar ulang dianggap mundur,\" tegas Kotok kepada detikJatim.\r\n\r\nMenurut Kotok, nyaris setiap tahun ada saja calon mahasiswa yang tidak mendaftar ulang. Jumlahnya pun tak sedikit. Sehingga kuota yang tersisa itu dialihkan ke pendaftaran tahap berikutnya.', 'detik.com', 'jenis-jenis-tuas 2.jpg', '2023-07-26 02:27:10', '2023-07-26 02:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kajian`
--
ALTER TABLE `tbl_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_warta`
--
ALTER TABLE `tbl_warta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kajian`
--
ALTER TABLE `tbl_kajian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_warta`
--
ALTER TABLE `tbl_warta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
