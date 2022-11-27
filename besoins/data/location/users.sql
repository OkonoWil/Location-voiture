-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table location. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` bigint NOT NULL,
  `phone1` bigint NOT NULL,
  `phone2` bigint DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `role_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone1_unique` (`phone1`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.users : ~20 rows (environ)
INSERT INTO `users` (`id`, `name`, `lastName`, `username`, `sexe`, `email`, `salaire`, `phone1`, `phone2`, `photo`, `email_verified_at`, `password`, `visible`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Okono', 'Wilfried', 'mrwil', 'Homme', 'mrwil@laracar.cm', 500000, 653490998, NULL, 'profils/pp001.jpg', '2022-11-27 08:59:42', '$2y$10$pMeG2vemADciwdeIG6pC4eiHSAjNUsXuLzdnfMcI9cEIx1GX9n37y', 1, 1, NULL, '2017-04-09 11:09:14', NULL),
	(2, 'Fonkou', 'Saintclair', '5DKlair', 'Homme', '5DKlair@laracar.cm', 300000, 681640352, NULL, 'profils/pp002.jpg', '2022-11-27 08:59:42', '$2y$10$mrfQMHlv39YAhB19FJ6.POMRq0ZYlqEYALxel0S4jTJz/5axdVBuS', 1, 3, NULL, '2017-08-11 11:09:14', NULL),
	(3, 'Douanla', 'Elsa', 'diana', 'Femme', 'diana@laracar.cm', 200000, 651523806, NULL, 'profils/pp002.jpg', '2022-11-27 08:59:42', '$2y$10$iZPnveQ5a1sua0Kco74TmOh.Xrm5Bi7kEESF2HcBoLnU5UchcxfgC', 1, 2, NULL, '2017-08-11 11:09:14', NULL),
	(4, 'Dr. Shanny Ledner', 'Hartmann', 'Electa Spencer', 'Femme', 'gpredovic@example.com', 130000, 657709453, 679738868, 'profils/pp009.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(5, 'Junior Ratke', 'Spencer', 'Ms. Hallie Fisher II', 'Homme', 'glenna.dach@example.com', 100000, 629288203, 664589232, 'profils/pp003.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(6, 'Verlie Lynch', 'Ondricka', 'Delfina Kassulke', 'Femme', 'ortiz.velda@example.com', 100000, 623535369, 661464327, 'profils/pp012.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(7, 'Keon Feil', 'Gusikowski', 'Dr. Cassandra Mills Sr.', 'Homme', 'hellen86@example.org', 100000, 671937882, 620000050, 'profils/pp007.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(8, 'Jaiden Brekke', 'Fay', 'Dr. Prudence Cremin', 'Homme', 'vicente48@example.com', 130000, 659868248, 675235357, 'profils/pp014.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(9, 'Callie Yost I', 'Kuhn', 'Francesca Lakin', 'Homme', 'reynold.cummerata@example.com', 100000, 687137115, 677627291, 'profils/pp012.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(10, 'Mrs. Sienna Hilpert PhD', 'Hand', 'Fernando Heaney', 'Femme', 'mollie38@example.net', 120000, 688627514, 692526137, 'profils/pp009.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(11, 'Ruben Dooley PhD', 'Price', 'Dr. Isaiah Wintheiser IV', 'Homme', 'goyette.neal@example.net', 100000, 650825776, 699757630, 'profils/pp019.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(12, 'Florida Tromp', 'Wilderman', 'Maribel Wehner', 'Femme', 'letha.kihn@example.net', 130000, 671083036, 662251674, 'profils/pp015.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(13, 'Leslie Reichert', 'Prohaska', 'Kaycee Hermann I', 'Femme', 'gracie.kessler@example.net', 130000, 651941631, 697456742, 'profils/pp013.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(14, 'Isobel Ferry', 'Wunsch', 'Amaya Boyle', 'Femme', 'reta.predovic@example.org', 120000, 687258398, 663851414, 'profils/pp015.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(15, 'Prof. Murphy Russel', 'Swaniawski', 'Ashton Kuhlman I', 'Femme', 'jack.kuhn@example.org', 150000, 626205018, 628190934, 'profils/pp005.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(16, 'Edmond Simonis', 'Monahan', 'Dr. Jarod Abshire', 'Femme', 'mitchell.ahmed@example.net', 130000, 669289878, 688752205, 'profils/pp003.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(17, 'Emory Mertz', 'Larkin', 'Alverta Beatty', 'Femme', 'janelle.champlin@example.com', 150000, 685652491, 655542223, 'profils/pp019.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(18, 'Dr. Lavon Cole', 'Gutkowski', 'Caterina Doyle', 'Femme', 'feil.estrella@example.net', 100000, 672173163, 672947320, 'profils/pp008.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 2, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(19, 'Jeanie Beier', 'McGlynn', 'Jayme Bednar', 'Femme', 'kendall50@example.net', 100000, 683017880, 687436296, 'profils/pp017.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43'),
	(20, 'Ms. Kira Smitham I', 'Rohan', 'Rachel Mraz', 'Homme', 'cmurray@example.org', 120000, 626412205, 661930742, 'profils/pp003.jpg', '2022-11-27 08:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, '2022-11-27 08:59:43', '2022-11-27 08:59:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
