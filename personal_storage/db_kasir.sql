-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2024 pada 06.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `harga_jual` bigint(100) NOT NULL,
  `penerbit_id` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `diskon` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode`, `nama`, `kategori_id`, `pengarang`, `harga_jual`, `penerbit_id`, `stok`, `diskon`, `created_at`, `updated_at`) VALUES
(6, '202402030001', 'Bumi Series', '1', 'Tere Liye', 99000, '1', 49, 5.00, '2024-02-02 21:52:51', '2024-02-02 22:00:59'),
(7, '202402030002', 'Bulan (Bumser)', '1', 'Tere Liye', 109000, '1', 89, 5.00, '2024-02-02 21:53:24', '2024-02-02 22:00:59'),
(8, '202402030003', 'Matahari (Bumser)', '1', 'Tere Liye', 120000, '1', 50, 5.00, '2024-02-02 21:53:52', '2024-02-02 21:53:52'),
(9, '202402030004', 'Bintang (Bumser)', '1', 'Tere Liye', 100000, '2', 49, 5.00, '2024-02-02 21:54:28', '2024-02-02 22:00:59'),
(10, '202402030005', 'Ceroz & Batozar (Bumser)', '1', 'Tere Liye', 89000, '2', 89, 10.00, '2024-02-02 21:55:16', '2024-02-02 22:00:59'),
(11, '202402030006', 'Komet (Bumser)', '1', 'Tere Liye', 99000, '2', 79, 0.00, '2024-02-02 21:55:58', '2024-02-02 22:00:59'),
(12, '202402030007', 'Komet Minor (Bumser)', '1', 'Tere Liye', 98000, '2', 100, 5.00, '2024-02-02 21:56:35', '2024-02-02 21:56:35'),
(13, '202402030008', 'Selena (Bumser)', '1', 'Tere Liye', 78000, '1', 30, 0.00, '2024-02-02 21:57:17', '2024-02-02 21:57:17'),
(14, '202402030009', 'Nebula (Bumser)', '1', 'Tere Liye', 100000, '2', 49, 5.00, '2024-02-02 21:57:59', '2024-02-02 22:00:59'),
(15, '202402030010', 'Si Putih (Bumser)', '1', 'Tere Liye', 99000, '2', 78, 10.00, '2024-02-02 21:58:33', '2024-02-02 21:58:33'),
(16, '202402030011', 'Lumpu (Bumser)', '1', 'Tere Liye', 99000, '1', 49, 5.00, '2024-02-02 21:59:16', '2024-02-02 22:00:59'),
(18, '202402030012', 'Bibi Gill (Bumser)', '1', 'Tere Liye', 99000, '1', 80, 5.00, '2024-02-02 22:17:48', '2024-02-02 22:17:48'),
(19, '202402030013', 'Matahari Minor (Bumser)', '1', 'Tere Liye', 98000, '2', 50, 5.00, '2024-02-02 22:18:25', '2024-02-02 22:18:25'),
(20, '202402030014', 'ILY (Bumser)', '1', 'Tere Liye', 98000, '2', 170, 5.00, '2024-02-02 22:19:09', '2024-02-02 22:19:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Fiksi', '2024-02-01 06:44:16', '2024-02-01 06:44:16'),
(2, 'Non Fiksi', '2024-02-01 06:44:25', '2024-02-01 06:44:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_08_132653_create_kategoris_table', 1),
(6, '2024_01_08_132733_create_barangs_table', 1),
(7, '2024_01_08_132801_create_penjualans_table', 1),
(8, '2024_01_12_125330_create_transaksis_table', 1),
(9, '2024_01_12_125358_create_transaksi_sementaras_table', 1),
(10, '2024_01_15_004113_create_transaksi_details_table', 1),
(11, '2024_01_23_011654_create_penerbits_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Gramedia Pustaka', '2024-02-01 06:44:53', '2024-02-01 06:44:53'),
(2, 'Sabak Grip', '2024-02-01 06:45:03', '2024-02-01 06:45:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `diskon` double(8,2) DEFAULT NULL,
  `total_belanja` double(8,2) NOT NULL,
  `kembali` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `total` bigint(100) NOT NULL,
  `bayar` bigint(100) NOT NULL,
  `kembali` bigint(100) NOT NULL,
  `kode_kasir` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` double(8,2) NOT NULL,
  `total` bigint(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_sementaras`
--

CREATE TABLE `transaksi_sementaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` double(8,2) NOT NULL,
  `total` bigint(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kode`, `nama`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '20242100001', 'AdminVanss', 'admin@gmail.com', NULL, '$2y$12$nevHauo8j4Rdy/VILUt0wep3kXq2Bkl99CgG/7dCHyK8TFWYhw7tO', 'Admin', NULL, '2024-02-01 06:43:42', '2024-02-01 06:43:42'),
(2, '20242100002', 'KasirVanss', 'kasir@gmail.com', NULL, '$2y$12$qTHUQOtfRPufF1hNObR/f.KnWJAzXfc0mgIMLzF3WksHEEU6P5ajy', 'Kasir', NULL, '2024-02-02 22:19:52', '2024-02-02 22:19:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_sementaras`
--
ALTER TABLE `transaksi_sementaras`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi_sementaras`
--
ALTER TABLE `transaksi_sementaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
