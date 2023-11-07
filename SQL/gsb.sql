-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 nov. 2023 à 11:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2023-10-13 06:11:29', '2023-10-13 06:11:29', 0),
(20161031101316, 'AddSecretToUsers', '2023-10-13 06:11:29', '2023-10-13 06:11:29', 0),
(20190208174112, 'AddAdditionalDataToUsers', '2023-10-13 06:11:29', '2023-10-13 06:11:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `libelle`) VALUES
(1, 'Créée'),
(2, 'Clôturée'),
(3, 'Validée'),
(4, 'Mise en paiement'),
(5, 'Remboursée');

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `id` int(11) NOT NULL,
  `user_id` char(36) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `moisannee` varchar(20) NOT NULL,
  `nbjustificatifs` int(11) NOT NULL,
  `montantvalide` tinyint(1) NOT NULL,
  `datemodif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `user_id`, `etat_id`, `moisannee`, `nbjustificatifs`, `montantvalide`, `datemodif`) VALUES
(1, '58b3c92c-7290-4793-92b7-bb0471552f06', 3, '022022', 0, 1, '2023-10-17'),
(2, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 4, '022001', 3, 0, '2023-10-06'),
(3, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 3, '042015', 5, 1, '2023-10-19');

-- --------------------------------------------------------

--
-- Structure de la table `fichesfraislignes`
--

CREATE TABLE `fichesfraislignes` (
  `fiche_id` int(11) NOT NULL,
  `ligneforfait_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fichesfraisligneshorsforfaits`
--

CREATE TABLE `fichesfraisligneshorsforfaits` (
  `lignefraishf_id` int(11) NOT NULL,
  `fichefrais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forfaits`
--

CREATE TABLE `forfaits` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forfaits`
--

INSERT INTO `forfaits` (`id`, `type`, `prix`) VALUES
(2, 'Hôtel', 70),
(3, 'Taxi', 15),
(4, 'Restaurant', 30),
(5, 'Train', 30),
(6, 'Avion', 120);

-- --------------------------------------------------------

--
-- Structure de la table `lignesforfaits`
--

CREATE TABLE `lignesforfaits` (
  `id` int(11) NOT NULL,
  `forfait_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignesforfaits`
--

INSERT INTO `lignesforfaits` (`id`, `forfait_id`, `quantite`) VALUES
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `lignesfraishorsforfaits`
--

CREATE TABLE `lignesfraishorsforfaits` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignesfraishorsforfaits`
--

INSERT INTO `lignesfraishorsforfaits` (`id`, `date`, `montant`, `libelle`) VALUES
(3, '2023-10-04', 60, 'BAR');

-- --------------------------------------------------------

--
-- Structure de la table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`) VALUES
('58b3c92c-7290-4793-92b7-bb0471552f06', 'invite', 'invite@gmail.com', '$2y$10$yg7OO97Jv/QCVJIGO/IaoesnWmS55G5C9iio83ABKB2CsbvTRPVkC', 'invité', 'juste invité en fait', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2023-10-19 13:25:58', '2023-10-19 13:25:58', NULL),
('d56a9b83-b3aa-4bae-8884-07665b414a45', 'simon', 'simon.brsi@gmail.com', '$2y$10$14SoJlI3alzJQh1hwWuCrO2t1/IqohtlMN87pOiwHmjndxGBEBzaS', 'simon', 'BRISSE', 'dd2601449eda295c8301b92f76603d4d', '2023-10-17 09:35:36', '', '2023-10-19 12:55:20', NULL, NULL, '2023-10-17 08:35:36', 1, 1, 'superuser', '2023-10-17 08:35:36', '2023-10-19 13:25:21', NULL),
('dd6ede18-8dea-4935-b5fb-9970166e5e30', 'user', 'user@us.er', '$2y$10$4JAYiC/9NZe.sJWc8XZGUOEgG2BJ8cU0K1AaIPktmyfk0CxTd5tNy', 'user', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2023-10-20 09:32:39', '2023-10-20 09:32:39', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_id_fk` (`etat_id`),
  ADD KEY `users_id_fk` (`user_id`);

--
-- Index pour la table `fichesfraislignes`
--
ALTER TABLE `fichesfraislignes`
  ADD KEY `fiche_id_fk` (`fiche_id`),
  ADD KEY `ligneforfait_id_fk` (`ligneforfait_id`);

--
-- Index pour la table `fichesfraisligneshorsforfaits`
--
ALTER TABLE `fichesfraisligneshorsforfaits`
  ADD KEY `lignefraisht_id_fk` (`lignefraishf_id`),
  ADD KEY `fichefrais_id_fk` (`fichefrais_id`);

--
-- Index pour la table `forfaits`
--
ALTER TABLE `forfaits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignesforfaits`
--
ALTER TABLE `lignesforfaits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forfait_id_fk` (`forfait_id`);

--
-- Index pour la table `lignesfraishorsforfaits`
--
ALTER TABLE `lignesfraishorsforfaits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `forfaits`
--
ALTER TABLE `forfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `lignesforfaits`
--
ALTER TABLE `lignesforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `lignesfraishorsforfaits`
--
ALTER TABLE `lignesfraishorsforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD CONSTRAINT `etat_id_fk` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `fichesfraislignes`
--
ALTER TABLE `fichesfraislignes`
  ADD CONSTRAINT `fiche_id_fk` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `ligneforfait_id_fk` FOREIGN KEY (`ligneforfait_id`) REFERENCES `lignesforfaits` (`id`);

--
-- Contraintes pour la table `fichesfraisligneshorsforfaits`
--
ALTER TABLE `fichesfraisligneshorsforfaits`
  ADD CONSTRAINT `fichefrais_id_fk` FOREIGN KEY (`fichefrais_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `lignefraisht_id_fk` FOREIGN KEY (`lignefraishf_id`) REFERENCES `lignesfraishorsforfaits` (`id`);

--
-- Contraintes pour la table `lignesforfaits`
--
ALTER TABLE `lignesforfaits`
  ADD CONSTRAINT `forfait_id_fk` FOREIGN KEY (`forfait_id`) REFERENCES `forfaits` (`id`);

--
-- Contraintes pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
