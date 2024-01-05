-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2024 pada 03.45
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_testcaseads`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `kelas_user` enum('1','2','3') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `no_induk` varchar(30) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `lama` int(10) NOT NULL,
  `ket` text NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`no_induk`, `tgl_cuti`, `lama`, `ket`, `id`) VALUES
('IP06001', '2020-08-02', 2, 'acara keluarga', 1),
('IP06001', '2020-08-18', 2, 'acara keluarga', 1),
('IP06006', '2020-08-19', 1, 'nenek sakit', 16),
('IP06007', '2020-08-23', 1, 'sakit', 17),
('IP06004', '2020-08-29', 5, 'menikah', 14),
('IP06003', '2020-08-30', 2, 'acara keluarga', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('radityaariefp@polije.ac.id', '$2y$10$4V7lbUU9a3hDAV3DXV5H.uY6CfqIYrHUB/VLsI8/Wg8HXTj4EIBEu', '2023-07-20 13:41:33'),
('radityaariefp@polije.ac.id', '$2y$10$4V7lbUU9a3hDAV3DXV5H.uY6CfqIYrHUB/VLsI8/Wg8HXTj4EIBEu', '2023-07-20 13:41:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `tahun` char(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `semester`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '1', '2022/2023', '2023-11-06 00:37:18', '2023-11-06 00:43:08');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_bergabung` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kelas_user` enum('1','2','3') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `no_induk`, `nama_lengkap`, `alamat`, `tgl_lahir`, `tgl_bergabung`, `email`, `email_verified_at`, `password`, `foto`, `kelas_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'IP06001', 'Agus', 'Jln Gajah Mada no 12, Surabaya', '1980-01-11', '2005-08-07', 'agus@gmail.com', NULL, '$2y$10$PHJw7J0Bc.Ly3wuYO32ZRO6GbKHHQ98zR.n.aKy/XtOWllRaWQ2F2', 'images/BoeaT0jCWccM0FW9FxE1HS1ej5J61n99JbEBzWlS.jpg', '3', 'iNQy8Jd4SibhrcqVwvZXhxVtw1d3kIPABg65nEgmQ5eadG7cU18KvPCQjKcc', '2023-07-20 13:13:22', '2024-01-03 23:11:48'),
(2, '', 'Admin', 'E4213214', NULL, '2024-01-04', 'admin@gmail.com', NULL, '$2y$10$bQ5ApEyhZ.bVSVy3oH1cv.DB/aijWrkinTGN4AEj7LBoWdb8e2/L.', NULL, '1', 'RfLPJ1we9rmZ7g8HVQqqb8ZLYZc6INzQhAVOwax8Gpu5mleIbJ1UDXflm6jH', NULL, NULL),
(11, 'IP06002', 'Amin', 'Jln Imam Bonjol no 11, Mojokerto', '1977-09-03', '2005-08-07', 'amin@gmail.com', NULL, '$2y$10$vtRJrrt4iOLUq5dS85o1w.b/rJC8s3TiYQ2RKCGPnL/xfIejzrHPy', 'images/BoeaT0jCWccM0FW9FxE1HS1ej5J61n99JbEBzWlS.jpg', '3', NULL, '2024-01-03 21:59:04', '2024-01-03 21:59:04'),
(13, 'IP06003', 'Yusuf', 'Jln A Yani Raya 15 No 14 Malang', '1973-07-09', '2006-08-07', 'yusuf@gmail.com', NULL, '', NULL, '3', NULL, NULL, NULL),
(14, 'IP06004', 'Alyssa', 'Jln Bungur Sari V no 166, Bandung', '1983-03-18', '2006-09-06', 'alyssa@gmail.com', NULL, '', NULL, '3', NULL, NULL, NULL),
(15, 'IP06005', 'Maulana', 'Jln Candi Agung, No 78 Gg 5, Jakarta', '1978-11-10', '2006-09-10', 'b@gmail.com', NULL, '', NULL, '3', NULL, NULL, NULL),
(16, 'IP06006', 'Agfika', 'Jln Nangka, Jakarta Timur', '1979-02-07', '2007-01-02', 'c@gmail.com', NULL, '', NULL, '3', NULL, NULL, NULL),
(17, 'IP06007', 'James', 'Merpati, 8 Surabaya', '1989-05-18', '2007-04-04', 'd@gmail.com', NULL, '', NULL, '3', NULL, NULL, NULL),
(18, 'IP06008', 'Octavanus', 'Jln A Yani 17, B 08 Sidoarjo', '1989-05-18', '2007-04-04', 'e@gmail.com', NULL, '', NULL, '3', NULL, NULL, '2024-01-04 08:15:17'),
(19, 'IP06009', 'Nugroho', 'Jln Duren tiga 167, Jakarta Selatan', '1984-01-18', '2008-01-16', 'o@gmail.com', NULL, '', NULL, '3', NULL, NULL, '2024-01-04 09:17:42'),
(20, 'IP06010', 'Raisa', 'Jln Kelapa Sawit, Jakarta Selatan', '1990-12-17', '2008-08-16', 'r@gmail.com', NULL, '', NULL, '3', NULL, NULL, '2024-01-04 08:26:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_nama_lengkap_unique` (`nama_lengkap`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nama_lengkap_unique` (`nama_lengkap`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
