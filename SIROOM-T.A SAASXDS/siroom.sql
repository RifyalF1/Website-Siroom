-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 04:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id_komen` int(50) NOT NULL,
  `id_topik` int(50) NOT NULL,
  `id` bigint(20) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id_komen`, `id_topik`, `id`, `komentar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 9, 'Dokumentasi Tidak Sesuai', '2024-05-31 01:43:10', '2024-05-31 01:43:10', '2024-05-31 01:43:10'),
(2, 12, 9, 'menurut saya untuk penjelasannya sangat baik dan izin bertanya kenapa harus www kenapa ga jinx biar keren', '2024-05-31 01:58:24', '2024-05-31 01:58:24', '2024-05-31 01:58:24'),
(5, 12, 1, 'tes', '2024-05-31 02:18:28', '2024-05-31 02:18:28', '2024-05-31 02:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `suka`
--

CREATE TABLE `suka` (
  `id_suka` int(50) NOT NULL,
  `id_topik` int(50) NOT NULL,
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suka`
--

INSERT INTO `suka` (`id_suka`, `id_topik`, `id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 8, '2024-05-30 21:13:38', '2024-05-30 21:13:38', '2024-05-30 21:13:38'),
(2, 5, 8, '2024-05-30 21:18:27', '2024-05-30 21:18:27', '2024-05-30 21:18:27'),
(3, 5, 8, '2024-05-30 21:27:42', '2024-05-30 21:27:42', '2024-05-30 21:27:42'),
(4, 5, 8, '2024-05-30 21:35:32', '2024-05-30 21:35:32', '2024-05-30 21:35:32'),
(5, 8, 9, '2024-05-30 21:53:09', '2024-05-30 21:53:09', '2024-05-30 21:53:09'),
(6, 7, 9, '2024-05-30 21:53:12', '2024-05-30 21:53:12', '2024-05-30 21:53:12'),
(7, 9, 9, '2024-05-30 21:57:45', '2024-05-30 21:57:45', '2024-05-30 21:57:45'),
(8, 10, 9, '2024-05-30 21:57:48', '2024-05-30 21:57:48', '2024-05-30 21:57:48'),
(9, 9, 9, '2024-05-30 21:57:50', '2024-05-30 21:57:50', '2024-05-30 21:57:50'),
(10, 9, 1, '2024-05-30 21:58:06', '2024-05-30 21:58:06', '2024-05-30 21:58:06'),
(11, 9, 1, '2024-05-30 21:58:08', '2024-05-30 21:58:08', '2024-05-30 21:58:08'),
(12, 12, 9, '2024-05-30 22:03:03', '2024-05-30 22:03:03', '2024-05-30 22:03:03'),
(13, 11, 9, '2024-05-30 22:03:06', '2024-05-30 22:03:06', '2024-05-30 22:03:06'),
(14, 11, 9, '2024-05-30 22:03:11', '2024-05-30 22:03:11', '2024-05-30 22:03:11'),
(15, 12, 9, '2024-05-30 22:03:14', '2024-05-30 22:03:14', '2024-05-30 22:03:14'),
(16, 12, 9, '2024-05-30 22:03:17', '2024-05-30 22:03:17', '2024-05-30 22:03:17'),
(17, 9, 9, '2024-05-30 22:05:01', '2024-05-30 22:05:01', '2024-05-30 22:05:01'),
(18, 9, 9, '2024-05-30 22:16:55', '2024-05-30 22:16:55', '2024-05-30 22:16:55'),
(19, 12, 9, '2024-05-31 01:41:27', '2024-05-31 01:41:27', '2024-05-31 01:41:27'),
(20, 12, 9, '2024-05-31 01:41:59', '2024-05-31 01:41:59', '2024-05-31 01:41:59'),
(21, 13, 1, '2024-05-31 02:19:55', '2024-05-31 02:19:55', '2024-05-31 02:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `judul`, `deskripsi`, `gambar`, `id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'ARTI LOGO SMKN 1 CIMAHI', 'Arti Logo :\r\n\r\nSegi Lima melambangkan Dasar Negara Indonesia yaitu Pancasila.\r\nTulisan STM Negeri Pembangunan Bandung melambangkan bahwa logo ini merupakan logo dari STM Negeri Pembangunan Bandung.\r\nLambang dari Jurusan Instrumentasi Industri.\r\nlambang dari Jurusan Listrik Industri.\r\nLambang dari Jurusan Elektronika, dengan dasar Kuning untuk Program Study Elektronika Teknik Transmisi dan dasar Merah untuk Elektronika Industri dan Komputer.\r\nLambang dari Jurusan Teknik Pendinginan\r\nLambang Gedung Sate, memunjukkan bahwa STM Negeri Pembangunan Bandung berlokasi di daerah Jawa Barat.\r\nLambang Padi dan Kapas mempunyai arti kemakmuran.', '1717114868_Logo SMKN 1 CIMAHI (2) (1).png', 9, '2024-05-30 21:56:55', '2024-05-31 00:21:39', '2024-05-30 21:56:55'),
(10, 'Abstrak Terhadap Gambar 2D', 'Abstrak adalah sebuah konsep atau gagasan yang tidak berkaitan secara langsung dengan objek fisik atau konkret di dunia nyata. Sebaliknya, abstrak mengacu pada ide, konsep, atau kualitas yang tidak dapat diukur dengan menggunakan panca indera. Dalam seni, abstraksi merujuk pada penyederhanaan atau penghilangan elemen-elemen yang konkret dalam karya seni, sehingga fokusnya lebih pada ekspresi emosional, ide, atau perasaan daripada representasi yang realistis. Konsep abstrak juga sering digunakan dalam pemikiran filosofis dan ilmiah untuk menggambarkan ide-ide yang lebih umum atau konseptual.', '1717106258_International Mother Language Day.jpeg', 9, '2024-05-30 21:57:38', '2024-05-30 21:57:38', '2024-05-30 21:57:38'),
(11, 'Apa Itu Network?', 'Network, dalam konteks yang luas, merujuk pada koneksi antara dua atau lebih entitas, yang dapat berupa perangkat, sistem, atau individu, yang saling berinteraksi dan berkomunikasi. Secara khusus, dalam konteks teknologi informasi dan komunikasi, jaringan mengacu pada infrastruktur yang memungkinkan komunikasi dan pertukaran data antara perangkat atau sistem komputer. Jaringan ini dapat mencakup berbagai teknologi, seperti kabel, serat optik, dan nirkabel, serta protokol dan perangkat lunak yang mendukung komunikasi data.\r\n\r\nJaringan dapat dibagi menjadi beberapa jenis, termasuk jaringan lokal (LAN), jaringan area luas (WAN), jaringan pribadi virtual (VPN), dan Internet, yang merupakan jaringan global terbesar yang menghubungkan jutaan perangkat di seluruh dunia. Tujuan dari jaringan adalah untuk memfasilitasi pertukaran informasi, berbagi sumber daya, dan mendukung berbagai layanan dan aplikasi, mulai dari email dan web browsing hingga aplikasi bisnis dan hiburan digital.', '1717106375_network.png', 1, '2024-05-30 21:59:35', '2024-05-30 21:59:35', '2024-05-30 21:59:35'),
(12, 'WWW?', 'World Wide Web (WWW) adalah salah satu layanan yang ada di internet yang memungkinkan pengguna untuk mengakses dan berbagi informasi dalam bentuk teks, gambar, audio, dan video melalui dokumen yang disebut halaman web. WWW diciptakan oleh Tim Berners-Lee pada tahun 1989 di CERN (Organisasi Eropa untuk Riset Nuklir), dan menjadi salah satu inovasi paling revolusioner dalam sejarah komputasi.\r\n\r\nKonsep WWW terdiri dari dua elemen utama:\r\n\r\n1. **Server**: Komputer yang menyimpan halaman web dan menyajikannya kepada pengguna saat diminta. Server menyimpan berbagai jenis data, termasuk teks, gambar, dan file multimedia, yang diakses melalui protokol HTTP (Hypertext Transfer Protocol) atau HTTPS (HTTP Secure).\r\n\r\n2. **Client**: Perangkat atau aplikasi yang digunakan oleh pengguna untuk mengakses dan menampilkan halaman web dari server. Browser web seperti Google Chrome, Mozilla Firefox, dan Safari adalah contoh klien yang paling umum digunakan.\r\n\r\nWWW menggunakan konsep hiperteks, di mana halaman web terhubung satu sama lain melalui tautan hiperteks atau hyperlink. Pengguna dapat mengklik tautan untuk berpindah dari satu halaman ke halaman lainnya, membuka berbagai sumber daya dan informasi yang tersebar di seluruh internet.\r\n\r\nDengan WWW, pengguna dapat mengakses berbagai jenis informasi, mulai dari berita dan artikel, hingga hiburan, belanja online, pendidikan, dan banyak lagi. Ini telah mengubah cara manusia berinteraksi dengan informasi dan telah menjadi salah satu pilar utama internet modern.', '1717106478_www.png', 2, '2024-05-30 22:01:18', '2024-05-30 22:01:18', '2024-05-30 22:01:18'),
(13, 'Macbook Pro M4', 'Jjgljaklj lajdj adjlj ajf lajdfj dajd lfjalkj dajf kladjkl jfasdj klasdjkl jfaskljf klasdjlf joweiajf oajlj a', '1717121970_MacBook Pro 16 (2021, M1) skins - Custom _ Bottom.jpeg', 1, '2024-05-31 02:19:30', '2024-05-31 02:19:30', '2024-05-31 02:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa',
  `profilephoto` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `profilephoto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rija Nurdiyanto', 'Rija123@example.com', NULL, '$2y$12$HgG/hw.fFqO9QtT7kP11VueBzAiLBOK7toNYBFW81a8ewE36fCiLG', 'siswa', 'Profile_Icon.png', NULL, '2024-05-30 10:47:50', '2024-05-30 10:47:50'),
(2, 'Solideo', 'Solideo123@example.com', NULL, '$2y$12$zZpk0wCZkuagTKmH.b9mo.xe7w0JCH2V7480hdsebVIve4.uMfQAK', 'siswa', 'Profile_Icon.png', NULL, '2024-05-30 10:47:50', '2024-05-30 10:47:50'),
(3, 'Admin', 'admin123@example.com', NULL, '$2y$12$gINv7IV2fQyhclcXJtTJW.htNauSNNhRn2FpqHj3cG1MAub/ilJpG', 'admin', 'Profile_Icon.png', NULL, '2024-05-30 10:47:50', '2024-05-30 10:47:50'),
(9, 'userOrigin', 'user@example.com', NULL, '$2y$12$6gtJ3X8wozd5pqvHeSHmpeF0GzCSyaIZ7R0FjIlGMafXEMESmUjVW', 'siswa', '1717105716_Ra.. di makan yaa, terimakasih telah bertemu. (1).png', NULL, '2024-05-30 21:48:36', '2024-05-30 21:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id_komen`);

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
-- Indexes for table `suka`
--
ALTER TABLE `suka`
  ADD PRIMARY KEY (`id_suka`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id_komen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suka`
--
ALTER TABLE `suka`
  MODIFY `id_suka` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
