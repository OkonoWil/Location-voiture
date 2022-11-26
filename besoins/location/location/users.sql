-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table location. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` bigint(20) NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `phone2` bigint(20) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `role_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone1_unique` (`phone1`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.users : ~13 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `lastName`, `username`, `sexe`, `email`, `salaire`, `phone1`, `phone2`, `photo`, `email_verified_at`, `password`, `visible`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Okono', 'Wilfried', 'mrwil', 'Homme', 'mrwil@laracar.cm', 500000, 653490998, NULL, 'profils/pp001.jpg', '2022-11-26 14:20:25', '$2y$10$Mz7bmRKjMfFnaf9fMZ1k4.pH59V0EPvE5we/KbKH5KoryEvXzbmcq', 1, 1, NULL, '2017-04-09 12:09:14', NULL),
	(2, 'Fonkou', 'Saintclair', '5DKlair', 'Homme', '5DKlair@laracar.cm', 300000, 681640352, NULL, 'profils/pp001.jpg', '2022-11-26 14:20:25', '$2y$10$AiKpiJCtrp0f0FzKix.XouUmhiZWRoxH/0niWDFMJeMNGDBMdyhEy', 1, 3, NULL, '2017-08-11 12:09:14', NULL),
	(3, 'Douanla', 'Elsa', 'diana', 'Femme', 'diana@laracar.cm', 200000, 651523806, NULL, 'profils/pp001.jpg', '2022-11-26 14:20:25', '$2y$10$6v7ybmThEHhegbzoZPdZEOR6CZ94qlC3G5HR1DCSYHV7WWUctMIB6', 1, 2, NULL, '2017-08-11 12:09:14', NULL),
	(4, 'Arlene Johns', 'Considine', 'Ida Brekke', 'Homme', 'ziemann.deven@example.org', 130000, 680776337, 679958014, 'profils/pp011.jpg', '2022-11-26 14:20:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(5, 'Addison Ryan', 'Price', 'Ms. Shyann Morissette', 'Homme', 'ltromp@example.net', 100000, 681886081, 670311273, 'profils/pp006.jpg', '2022-11-26 14:20:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(6, 'Rosalinda Jaskolski III', 'Kovacek', 'Miss Alexandria Koss DVM', 'Homme', 'briana02@example.org', 120000, 662406170, 661719646, 'profils/pp001.jpg', '2022-11-26 14:20:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(7, 'Miss Sydni Wuckert DDS', 'Towne', 'Leon Anderson', 'Femme', 'ahettinger@example.org', 120000, 686465706, 666380193, 'profils/pp004.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(8, 'Mrs. Karli Upton', 'Casper', 'Jarret Streich', 'Femme', 'terry.frank@example.net', 120000, 694414828, 664988312, 'profils/pp018.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(9, 'Viviane Rolfson', 'Franecki', 'Ms. Veda Kemmer PhD', 'Homme', 'morar.lesley@example.net', 130000, 681542763, 668370084, 'profils/pp006.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(10, 'Dr. Rollin Gerlach PhD', 'Kertzmann', 'Misael Lehner', 'Homme', 'lesly.oconner@example.org', 150000, 622185903, 621317856, 'profils/pp007.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(11, 'Maegan Schaefer', 'Nicolas', 'Marjolaine Hoeger', 'Homme', 'chadd.hudson@example.com', 100000, 659277653, 695158984, 'profils/pp001.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(12, 'Pearlie Gerlach', 'Shanahan', 'Mrs. Glenna Herman', 'Homme', 'lura31@example.net', 130000, 697113274, 672428236, 'profils/pp015.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(13, 'Jaida Rohan', 'Nitzsche', 'Prof. Jack Boehm', 'Femme', 'letha24@example.com', 130000, 677318482, 623034103, 'profils/pp004.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(14, 'Ora Harber', 'VonRueden', 'Shanna Marquardt MD', 'Homme', 'padberg.melvin@example.net', 130000, 627156757, 620238722, 'profils/pp013.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(15, 'Mrs. Creola Mante', 'Bednar', 'Al Marks DDS', 'Homme', 'iadams@example.org', 150000, 690339780, 678345516, 'profils/pp016.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(16, 'Otis Funk', 'Feeney', 'Dr. Finn Thompson', 'Femme', 'retta.dicki@example.org', 130000, 679657149, 699396975, 'profils/pp004.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(17, 'Whitney Mertz', 'Dare', 'Alena Hauck', 'Homme', 'tkemmer@example.net', 150000, 695317559, 684735315, 'profils/pp013.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(18, 'Dimitri Frami', 'Rempel', 'Audrey Swaniawski', 'Femme', 'pjohnson@example.com', 120000, 667406997, 626440455, 'profils/pp018.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(19, 'Dr. Dandre Denesik Jr.', 'Smitham', 'Prof. Yoshiko Blanda Sr.', 'Femme', 'rkozey@example.org', 100000, 655695090, 657715280, 'profils/pp004.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:20:26', '2022-11-26 14:20:26'),
	(20, 'Fredrick Schamberger', 'Kirlin', 'Louisa McCullough', 'Homme', 'ofelia.hyatt@example.com', 130000, 626195051, 665441642, 'profils/pp009.jpg', '2022-11-26 14:20:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-26 14:30:26', '2022-11-26 14:20:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
