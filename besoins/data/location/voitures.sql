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

-- Listage de la structure de table location. voitures
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroSerie` bigint NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDeFabri` date NOT NULL,
  `nombrePlace` int unsigned NOT NULL,
  `tarifParJour` double NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `marque_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `voitures_immatriculation_unique` (`immatriculation`),
  UNIQUE KEY `voitures_numeroserie_unique` (`numeroSerie`),
  KEY `voitures_marque_id_foreign` (`marque_id`),
  CONSTRAINT `voitures_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table location.voitures : ~35 rows (environ)
INSERT INTO `voitures` (`id`, `modele`, `immatriculation`, `numeroSerie`, `couleur`, `photo`, `dateDeFabri`, `nombrePlace`, `tarifParJour`, `disponible`, `visible`, `marque_id`, `created_at`, `updated_at`) VALUES
	(1, 'et', 'LT4551UU', 6317582, 'teal', 'profils/pp012.jpg', '2006-11-30', 5, 40000, 1, 1, 4, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(2, 'qui', 'LT5109NU', 4281184, 'navy', 'profils/pp003.jpg', '2009-06-10', 2, 50000, 1, 1, 5, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(3, 'porro', 'LT2439QY', 7452882, 'yellow', 'profils/pp001.jpg', '2011-03-26', 6, 30000, 1, 1, 2, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(4, 'impedit', 'LT5588VB', 977159, 'navy', 'profils/pp015.jpg', '2009-03-05', 5, 45000, 1, 1, 8, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(5, 'commodi', 'LT5740ZQ', 2304480, 'fuchsia', 'profils/pp000.jpg', '2005-04-16', 6, 40000, 1, 1, 6, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(6, 'quis', 'LT3698GA', 8217798, 'fuchsia', 'profils/pp016.jpg', '2010-12-03', 5, 70000, 1, 1, 6, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(7, 'in', 'LT9693JK', 4538482, 'green', 'profils/pp006.jpg', '2009-10-17', 4, 50000, 1, 1, 6, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(8, 'et', 'LT6158SM', 639836, 'green', 'profils/pp011.jpg', '2009-04-09', 4, 50000, 1, 1, 6, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(9, 'autem', 'LT8013MK', 4016430, 'aqua', 'profils/pp012.jpg', '2004-08-11', 6, 50000, 1, 1, 10, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(10, 'omnis', 'LT3855OR', 439198, 'aqua', 'profils/pp016.jpg', '2004-12-25', 4, 50000, 1, 1, 3, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(11, 'perferendis', 'LT6307DO', 7350649, 'white', 'profils/pp016.jpg', '2007-11-29', 3, 100000, 1, 1, 1, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(12, 'consequatur', 'LT7964OE', 1021939, 'navy', 'profils/pp010.jpg', '2006-11-11', 3, 70000, 1, 1, 9, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(13, 'ut', 'LT8869JH', 3319023, 'purple', 'profils/pp016.jpg', '2007-11-30', 2, 45000, 1, 1, 9, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(14, 'commodi', 'LT9646SX', 5065412, 'purple', 'profils/pp015.jpg', '2006-04-02', 5, 30000, 1, 1, 9, '2022-11-27 08:59:51', '2022-11-27 08:59:51'),
	(15, 'nam', 'LT4893QZ', 908625, 'green', 'profils/pp005.jpg', '2008-03-03', 4, 100000, 1, 1, 9, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(16, 'sunt', 'LT9719IM', 9671450, 'aqua', 'profils/pp011.jpg', '2008-09-17', 3, 45000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(17, 'dolores', 'LT2425JN', 1619333, 'white', 'profils/pp005.jpg', '2010-02-06', 4, 30000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(18, 'laboriosam', 'LT7173EF', 5732656, 'gray', 'profils/pp019.jpg', '2008-07-16', 4, 70000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(19, 'commodi', 'LT8850YH', 2942781, 'teal', 'profils/pp001.jpg', '2006-01-31', 3, 70000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(20, 'optio', 'LT7016DS', 3381797, 'fuchsia', 'profils/pp015.jpg', '2011-03-28', 2, 40000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(21, 'aut', 'LT9372HD', 8791934, 'blue', 'profils/pp018.jpg', '2006-06-04', 6, 100000, 1, 1, 9, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(22, 'dolorem', 'LT4410MS', 6757732, 'silver', 'profils/pp005.jpg', '2008-01-04', 4, 40000, 1, 1, 9, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(23, 'quod', 'LT3668SY', 4628523, 'blue', 'profils/pp012.jpg', '2008-05-27', 4, 70000, 1, 1, 2, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(24, 'voluptatibus', 'LT1461NC', 1341159, 'yellow', 'profils/pp010.jpg', '2004-09-20', 5, 70000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(25, 'dolore', 'LT1629CM', 9147070, 'fuchsia', 'profils/pp013.jpg', '2004-07-04', 6, 40000, 1, 1, 5, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(26, 'officia', 'LT3332HA', 5782481, 'navy', 'profils/pp003.jpg', '2004-06-27', 4, 100000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(27, 'quia', 'LT3961GR', 1811164, 'maroon', 'profils/pp008.jpg', '2005-12-08', 6, 40000, 1, 1, 8, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(28, 'tempora', 'LT7438ET', 6598938, 'yellow', 'profils/pp007.jpg', '2010-10-09', 5, 100000, 1, 1, 2, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(29, 'ut', 'LT7314TN', 5272215, 'silver', 'profils/pp010.jpg', '2007-07-09', 2, 100000, 1, 1, 4, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(30, 'sint', 'LT9483FJ', 6358224, 'teal', 'profils/pp001.jpg', '2005-10-18', 6, 50000, 1, 1, 8, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(31, 'corporis', 'LT7650JI', 8513510, 'aqua', 'profils/pp009.jpg', '2005-09-21', 4, 50000, 1, 1, 7, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(32, 'assumenda', 'LT5701CY', 1901858, 'green', 'profils/pp011.jpg', '2008-04-03', 5, 40000, 1, 1, 6, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(33, 'soluta', 'LT8058VA', 4826330, 'lime', 'profils/pp004.jpg', '2004-02-10', 5, 50000, 1, 1, 10, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(34, 'id', 'LT5840MK', 4659793, 'white', 'profils/pp001.jpg', '2007-10-21', 3, 50000, 1, 1, 4, '2022-11-27 08:59:52', '2022-11-27 08:59:52'),
	(35, 'ratione', 'LT3864QR', 3019820, 'olive', 'profils/pp010.jpg', '2003-11-01', 3, 40000, 1, 1, 7, '2022-11-27 08:59:52', '2022-11-27 08:59:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
