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

-- Listage de la structure de la table location. voitures
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroSerie` bigint(20) NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDeFabri` date NOT NULL,
  `nombrePlace` int(10) unsigned NOT NULL,
  `tarifParJour` double NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `marque_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `voitures_immatriculation_unique` (`immatriculation`),
  UNIQUE KEY `voitures_numeroserie_unique` (`numeroSerie`),
  KEY `voitures_marque_id_foreign` (`marque_id`),
  CONSTRAINT `voitures_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.voitures : ~30 rows (environ)
/*!40000 ALTER TABLE `voitures` DISABLE KEYS */;
INSERT INTO `voitures` (`id`, `modele`, `immatriculation`, `numeroSerie`, `couleur`, `dateDeFabri`, `nombrePlace`, `tarifParJour`, `disponible`, `visible`, `marque_id`, `created_at`, `updated_at`) VALUES
	(1, 'ipsum', 'LT2556SU', 3091444, 'black', '2009-12-10', 2, 70000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(2, 'non', 'LT2460US', 7517209, 'olive', '2010-10-07', 5, 30000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(3, 'cum', 'LT3307BB', 8873067, 'olive', '2006-04-14', 4, 45000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(4, 'nesciunt', 'LT4447JM', 8181987, 'olive', '2009-04-02', 3, 40000, 1, 1, 6, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(5, 'voluptas', 'LT6591FD', 5282093, 'teal', '2008-10-30', 3, 40000, 1, 1, 3, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(6, 'nisi', 'LT8939WV', 1940658, 'lime', '2007-08-19', 6, 40000, 1, 1, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(7, 'autem', 'LT1450HD', 7783087, 'silver', '2011-05-01', 6, 45000, 1, 1, 9, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(8, 'impedit', 'LT4256XA', 9218014, 'fuchsia', '2008-10-05', 6, 100000, 1, 1, 2, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(9, 'excepturi', 'LT6821IN', 7438114, 'aqua', '2008-08-23', 4, 30000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(10, 'aut', 'LT6959WR', 9351232, 'blue', '2006-10-03', 6, 100000, 1, 1, 7, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(11, 'aliquid', 'LT4793LD', 6928394, 'silver', '2010-01-31', 6, 40000, 1, 1, 9, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(12, 'ducimus', 'LT7675PD', 9900679, 'yellow', '2007-03-31', 4, 45000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(13, 'iure', 'LT5543LV', 7447898, 'yellow', '2006-08-25', 5, 45000, 1, 1, 1, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(14, 'iusto', 'LT5095KD', 5010227, 'black', '2005-05-21', 2, 70000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(15, 'qui', 'LT4853QS', 843876, 'lime', '2011-01-23', 6, 30000, 1, 1, 3, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(16, 'architecto', 'LT8716SF', 5927745, 'green', '2005-09-28', 3, 30000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(17, 'veniam', 'LT8255CD', 8345708, 'fuchsia', '2006-09-13', 4, 40000, 1, 1, 5, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(18, 'quasi', 'LT9819NW', 8795497, 'purple', '2005-01-01', 4, 30000, 1, 1, 7, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(19, 'sed', 'LT9828JN', 6706163, 'green', '2009-04-13', 6, 40000, 1, 1, 9, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(20, 'et', 'LT1296LN', 1717090, 'maroon', '2008-04-05', 6, 100000, 1, 1, 6, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(21, 'enim', 'LT3718CI', 6471002, 'purple', '2005-06-02', 6, 40000, 1, 1, 4, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(22, 'vero', 'LT0701PA', 3126745, 'navy', '2004-04-02', 5, 40000, 1, 1, 7, '2022-11-26 14:20:28', '2022-11-26 14:20:28'),
	(23, 'nesciunt', 'LT5615IB', 5292239, 'olive', '2008-11-16', 2, 100000, 1, 1, 10, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(24, 'et', 'LT1606JK', 8559883, 'aqua', '2005-02-02', 6, 30000, 1, 1, 6, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(25, 'a', 'LT6459CK', 8273458, 'purple', '2009-05-24', 2, 40000, 1, 1, 8, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(26, 'deserunt', 'LT4211LA', 7987109, 'lime', '2006-06-17', 6, 70000, 1, 1, 1, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(27, 'nobis', 'LT1805JR', 6201251, 'purple', '2005-04-25', 2, 70000, 1, 1, 9, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(28, 'fuga', 'LT4411ZG', 3536770, 'blue', '2005-10-08', 6, 100000, 1, 1, 9, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(29, 'blanditiis', 'LT4173WS', 2930417, 'maroon', '2005-12-27', 3, 70000, 1, 1, 3, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(30, 'voluptatibus', 'LT8199YM', 2270564, 'teal', '2010-08-21', 5, 70000, 1, 1, 7, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(31, 'labore', 'LT2435WS', 6064242, 'blue', '2008-03-30', 5, 70000, 1, 1, 9, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(32, 'pariatur', 'LT0015KN', 5935310, 'green', '2006-09-03', 6, 30000, 1, 1, 5, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(33, 'repellat', 'LT8828VS', 1162250, 'black', '2007-09-17', 6, 40000, 1, 1, 6, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(34, 'voluptas', 'LT0276HF', 1590157, 'lime', '2007-02-23', 6, 30000, 1, 1, 7, '2022-11-26 14:20:29', '2022-11-26 14:20:29'),
	(35, 'sunt', 'LT4303EW', 2551771, 'black', '2005-09-25', 2, 30000, 1, 1, 5, '2022-11-26 14:20:29', '2022-11-26 14:20:29');
/*!40000 ALTER TABLE `voitures` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
