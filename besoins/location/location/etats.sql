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

-- Listage de la structure de la table location. etats
CREATE TABLE IF NOT EXISTS `etats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomEtat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantDegat` double(8,2) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.etats : ~4 rows (environ)
/*!40000 ALTER TABLE `etats` DISABLE KEYS */;
INSERT INTO `etats` (`id`, `nomEtat`, `montantDegat`, `visible`, `created_at`, `updated_at`) VALUES
	(1, 'Bon', 0.00, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(2, 'Mauvais', 0.35, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(3, 'Très mauvais', 0.80, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(4, 'Voiture détruit', 1.00, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28');
/*!40000 ALTER TABLE `etats` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
