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

-- Listage de la structure de table location. marques
CREATE TABLE IF NOT EXISTS `marques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomMarque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paysMarque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marques_nommarque_unique` (`nomMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.marques : ~10 rows (environ)
INSERT INTO `marques` (`id`, `nomMarque`, `paysMarque`, `visible`, `created_at`, `updated_at`) VALUES
	(1, 'BMW', 'Allemagne', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(2, 'Audi', 'Allemagne', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(3, 'Jeep', 'Eats-Unis', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(4, 'Lotus', 'Rayaule-Uni', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(5, 'Opel', 'Allemagne', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(6, 'Suzuki', 'Japan', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(7, 'Toyota', 'Japan', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(8, 'Renault', 'France', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(9, 'Nissan', 'Japon', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(10, 'Mercedes-Benz', 'Allemagne', 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
