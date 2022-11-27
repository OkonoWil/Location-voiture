-- Listage de la structure de table location. roles
CREATE TABLE IF NOT EXISTS `roles` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `nomrole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. etats
CREATE TABLE IF NOT EXISTS `etats` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `nomEtat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `montantDegat` double(8, 2) NOT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
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
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
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
) ENGINE = InnoDB AUTO_INCREMENT = 21 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. clients
CREATE TABLE IF NOT EXISTS `clients` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `dateDeNaissance` date NOT NULL,
    `lieuDeNaissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `Adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone1` bigint NOT NULL,
    `pieceIdentite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `numeroPieceIdentite` bigint NOT NULL,
    `phone2` bigint DEFAULT NULL,
    `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `user_id` bigint unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `clients_email_unique` (`email`),
    UNIQUE KEY `clients_phone1_unique` (`phone1`),
    UNIQUE KEY `clients_numeropieceidentite_unique` (`numeroPieceIdentite`),
    KEY `clients_user_id_foreign` (`user_id`),
    CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 403 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. voitures
CREATE TABLE `voitures` (
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
) ENGINE = InnoDB AUTO_INCREMENT = 36 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. locations
CREATE TABLE IF NOT EXISTS `locations` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `dateDebut` date NOT NULL,
    `dateFin` date NOT NULL,
    `montant` double NOT NULL,
    `caution` double NOT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `client_id` bigint unsigned NOT NULL,
    `user_id` bigint unsigned NOT NULL,
    `voiture_id` bigint unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `locations_client_id_foreign` (`client_id`),
    KEY `locations_user_id_foreign` (`user_id`),
    KEY `locations_voiture_id_foreign` (`voiture_id`),
    CONSTRAINT `locations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `locations_voiture_id_foreign` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1011 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. paiements
CREATE TABLE IF NOT EXISTS `paiements` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `montant` double(8, 2) NOT NULL,
    `datePaiement` datetime NOT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `location_id` bigint unsigned NOT NULL,
    `user_id` bigint unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `paiements_location_id_foreign` (`location_id`),
    KEY `paiements_user_id_foreign` (`user_id`),
    CONSTRAINT `paiements_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `paiements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1011 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Listage de la structure de table location. retours
CREATE TABLE IF NOT EXISTS `retours` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `dateRetour` date NOT NULL,
    `visible` tinyint(1) NOT NULL DEFAULT '1',
    `client_id` bigint unsigned NOT NULL,
    `user_id` bigint unsigned NOT NULL,
    `etat_id` bigint unsigned NOT NULL,
    `location_id` bigint unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `retours_client_id_foreign` (`client_id`),
    KEY `retours_user_id_foreign` (`user_id`),
    KEY `retours_etat_id_foreign` (`etat_id`),
    KEY `retours_location_id_foreign` (`location_id`),
    CONSTRAINT `retours_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `retours_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `retours_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
    CONSTRAINT `retours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1011 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;