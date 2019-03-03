-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping structure for table sspp.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bln` int(11) NOT NULL AUTO_INCREMENT,
  `bln_nama` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_bln`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.bulan: ~0 rows (approximately)
DELETE FROM `bulan`;
/*!40000 ALTER TABLE `bulan` DISABLE KEYS */;
INSERT INTO `bulan` (`id_bln`, `bln_nama`) VALUES
	(1, 'Januari'),
	(2, 'Februari'),
	(3, 'Maret'),
	(4, 'April'),
	(5, 'Mei'),
	(6, 'Juni'),
	(7, 'Juli'),
	(8, 'Agustus'),
	(9, 'September'),
	(10, 'Oktober'),
	(11, 'November'),
	(12, 'Desember');
/*!40000 ALTER TABLE `bulan` ENABLE KEYS */;

-- Dumping structure for table sspp.data_siswa
CREATE TABLE IF NOT EXISTS `data_siswa` (
  `NISN` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIS` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JK` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmpt_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `Alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibu_siswa` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpk_siswa` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_siswa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kelas` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenjang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tahun_Masuk` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_us` int(11) DEFAULT NULL,
  `foto` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`NISN`),
  KEY `data_siswa_biaya_us_foreign` (`biaya_us`),
  CONSTRAINT `data_siswa_biaya_us_foreign` FOREIGN KEY (`biaya_us`) REFERENCES `uang_sekolah` (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.data_siswa: ~0 rows (approximately)
DELETE FROM `data_siswa`;
/*!40000 ALTER TABLE `data_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_siswa` ENABLE KEYS */;

-- Dumping structure for table sspp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.migrations: ~8 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_10_11_195205_tahun', 1),
	(4, '2018_10_18_061316_uang_sekolah', 1),
	(5, '2018_10_18_194437_data_siswa', 1),
	(6, '2018_10_19_072208_bulan', 1),
	(7, '2018_10_19_195952_spp_alldata', 1),
	(8, '2018_10_20_101842_transactions', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sspp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table sspp.summary
CREATE TABLE IF NOT EXISTS `summary` (
  `id_alld` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NISN` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Januari` tinyint(1) NOT NULL,
  `Februari` tinyint(1) NOT NULL,
  `Maret` tinyint(1) NOT NULL,
  `April` tinyint(1) NOT NULL,
  `Mei` tinyint(1) NOT NULL,
  `Juni` tinyint(1) NOT NULL,
  `Juli` tinyint(1) NOT NULL,
  `Agustus` tinyint(1) NOT NULL,
  `September` tinyint(1) NOT NULL,
  `Oktober` tinyint(1) NOT NULL,
  `November` tinyint(1) NOT NULL,
  `Desember` tinyint(1) NOT NULL,
  `id_thn` int(11) NOT NULL,
  PRIMARY KEY (`id_alld`),
  KEY `summary_nisn_foreign` (`NISN`),
  KEY `summary_id_thn_foreign` (`id_thn`),
  CONSTRAINT `summary_id_thn_foreign` FOREIGN KEY (`id_thn`) REFERENCES `tahun` (`id_thn`),
  CONSTRAINT `summary_nisn_foreign` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.summary: ~0 rows (approximately)
DELETE FROM `summary`;
/*!40000 ALTER TABLE `summary` DISABLE KEYS */;
/*!40000 ALTER TABLE `summary` ENABLE KEYS */;

-- Dumping structure for table sspp.tahun
CREATE TABLE IF NOT EXISTS `tahun` (
  `id_thn` int(11) NOT NULL AUTO_INCREMENT,
  `thn_nama` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_thn`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.tahun: ~0 rows (approximately)
DELETE FROM `tahun`;
/*!40000 ALTER TABLE `tahun` DISABLE KEYS */;
INSERT INTO `tahun` (`id_thn`, `thn_nama`) VALUES
	(1, '2013'),
	(2, '2014'),
	(3, '2015'),
	(4, '2016'),
	(5, '2017'),
	(6, '2018'),
	(7, '2019'),
	(8, '2020'),
	(9, '2021'),
	(10, '2022'),
	(11, '2023'),
	(12, '2024');
/*!40000 ALTER TABLE `tahun` ENABLE KEYS */;

-- Dumping structure for table sspp.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id_trans` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NISN` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibayar` decimal(14,2) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_trans`),
  KEY `transactions_nisn_foreign` (`NISN`),
  KEY `transactions_tahun_foreign` (`tahun`),
  KEY `transactions_bulan_foreign` (`bulan`),
  CONSTRAINT `transactions_bulan_foreign` FOREIGN KEY (`bulan`) REFERENCES `bulan` (`id_bln`),
  CONSTRAINT `transactions_nisn_foreign` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`),
  CONSTRAINT `transactions_tahun_foreign` FOREIGN KEY (`tahun`) REFERENCES `tahun` (`id_thn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.transactions: ~0 rows (approximately)
DELETE FROM `transactions`;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table sspp.uang_sekolah
CREATE TABLE IF NOT EXISTS `uang_sekolah` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `nama_us` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_us` decimal(14,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.uang_sekolah: ~0 rows (approximately)
DELETE FROM `uang_sekolah`;
/*!40000 ALTER TABLE `uang_sekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `uang_sekolah` ENABLE KEYS */;

-- Dumping structure for table sspp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sspp.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Rizan', 'admin@admin.com', NULL, '$2y$10$EN6WVcqcozZWUgNEBjJU3u2B6BrM.YdlBJQTef8jmqiA5yzEX70VG', NULL, '2019-03-03 13:06:13', '2019-03-03 13:06:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
