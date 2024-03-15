-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 mars 2024 à 09:35
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
  `moisannee` varchar(6) NOT NULL,
  `datemodif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `user_id`, `etat_id`, `moisannee`, `datemodif`) VALUES
(67, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 3, '012024', '2024-03-13'),
(68, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 1, '012001', '2024-03-14'),
(69, '2c0f4879-618f-4ed7-9605-491b45fc6b91', 1, '122023', '2024-03-14');

-- --------------------------------------------------------

--
-- Structure de la table `fiches_lignesforfaits`
--

CREATE TABLE `fiches_lignesforfaits` (
  `fiche_id` int(11) NOT NULL,
  `ligneforfait_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches_lignesforfaits`
--

INSERT INTO `fiches_lignesforfaits` (`fiche_id`, `ligneforfait_id`) VALUES
(67, 268),
(67, 269),
(67, 270),
(67, 271),
(67, 272),
(67, 273),
(68, 274),
(68, 275),
(68, 276),
(68, 277),
(68, 278),
(68, 279),
(69, 280),
(69, 281),
(69, 282),
(69, 283),
(69, 284),
(69, 285);

-- --------------------------------------------------------

--
-- Structure de la table `fiches_lignesfraishorsforfaits`
--

CREATE TABLE `fiches_lignesfraishorsforfaits` (
  `lignesfraishorsforfait_id` int(11) NOT NULL,
  `fichefrais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches_lignesfraishorsforfaits`
--

INSERT INTO `fiches_lignesfraishorsforfaits` (`lignesfraishorsforfait_id`, `fichefrais_id`) VALUES
(119, 67);

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
(6, 'Avion', 120),
(7, 'Nuitée', 80);

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
(268, 2, 1),
(269, 3, 2),
(270, 4, 3),
(271, 5, 4),
(272, 6, 5),
(273, 7, 6),
(274, 2, 0),
(275, 3, 0),
(276, 4, 0),
(277, 5, 0),
(278, 6, 0),
(279, 7, 0),
(280, 2, 0),
(281, 3, 0),
(282, 4, 0),
(283, 5, 0),
(284, 6, 0),
(285, 7, 0);

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
(119, '2222-02-22', 200, 'test');

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
  `additional_data` text DEFAULT NULL,
  `mdp_api` varchar(50) NOT NULL,
  `cle_api` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`, `mdp_api`, `cle_api`) VALUES
('0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 'user2', 'user2@gmail.com', '$2y$10$YZeiUTW5.R.GtmVAdee2jOblncI3zACuCcj1gAWoNpWwCott4Drvq', 'User', '2', 'a3dd53dac574f9a79a2d9baad69a0960', '2023-11-17 09:03:14', NULL, NULL, NULL, NULL, '2023-11-17 08:03:14', 1, 0, 'user', '2023-11-17 08:03:14', '2023-11-17 08:03:14', NULL, 'JKL', 'a9276aeda4a269c2c2ca'),
('2c0f4879-618f-4ed7-9605-491b45fc6b91', 'user1', 'user1@gmail.com', '$2y$10$bU/hZsI1f.hXVoCGzbxy8uYWL8lGTGkWo77tW7SiTG1F0q.5fKj0S', 'User', '1', 'beb6bf192a1344d7daf61769251a281d', '2023-11-17 09:01:08', NULL, NULL, NULL, NULL, '2023-11-17 08:01:08', 1, 0, 'user', '2023-11-17 08:01:08', '2023-11-17 08:01:08', NULL, 'GHI', '482f05114a16c9ebfec9'),
('5d0bd01a-4ad6-4fbb-afe2-871cd7e71eaf', 'user3', 'user3@gmail.com', '$2y$10$Ud2TQlSMIirLkpEzpr4NQueBNe2Ik8HfOfr/UWbo6cVV2EdJPOSh6', 'User', '3', '2259e1bd967243c7a6700601c4782d52', '2024-01-16 14:20:34', '', NULL, NULL, NULL, '2024-01-16 13:20:34', 1, 0, 'user', '2024-01-16 13:20:34', '2024-03-12 10:05:32', NULL, 'MNO', 'a6547a0752eef8e0821d'),
('a6d456fc-0f33-4d51-b12b-81d3590f81ab', 'comptable', 'comptable@gmail.com', '$2y$10$RwlxeVO0grhSfd6Qe3gU5.kyaWmkrNoW.XweTKAjmt5qjDtMFz8Ta', 'con', 'table', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'comptable', '2023-12-08 12:38:00', '2023-12-08 12:38:00', NULL, 'DEF', '47b4329ee92fe04e1600'),
('d56a9b83-b3aa-4bae-8884-07665b414a45', 'admin', 'simon.brsi@gmail.com', '$2y$10$6nPmsUHfgN5Ceoet7uqfTe/I96.21kpAodH40xssXo9.3SAnbaF2y', 'Admin', 'Istrateur', NULL, NULL, '', '2023-10-19 12:55:20', NULL, NULL, '2023-10-17 08:35:36', 1, 1, 'superuser', '2023-10-17 08:35:36', '2023-11-10 08:08:46', NULL, 'ABC', '7f7fcbfcd85736c32424');

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
-- Index pour la table `fiches_lignesforfaits`
--
ALTER TABLE `fiches_lignesforfaits`
  ADD PRIMARY KEY (`fiche_id`,`ligneforfait_id`),
  ADD KEY `ligneforfait_id_fk` (`ligneforfait_id`);

--
-- Index pour la table `fiches_lignesfraishorsforfaits`
--
ALTER TABLE `fiches_lignesfraishorsforfaits`
  ADD PRIMARY KEY (`lignesfraishorsforfait_id`,`fichefrais_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `forfaits`
--
ALTER TABLE `forfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lignesforfaits`
--
ALTER TABLE `lignesforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT pour la table `lignesfraishorsforfaits`
--
ALTER TABLE `lignesfraishorsforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
-- Contraintes pour la table `fiches_lignesforfaits`
--
ALTER TABLE `fiches_lignesforfaits`
  ADD CONSTRAINT `fiche_id_fk` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `ligneforfait_id_fk` FOREIGN KEY (`ligneforfait_id`) REFERENCES `lignesforfaits` (`id`);

--
-- Contraintes pour la table `fiches_lignesfraishorsforfaits`
--
ALTER TABLE `fiches_lignesfraishorsforfaits`
  ADD CONSTRAINT `fichefrais_id_fk` FOREIGN KEY (`fichefrais_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `lignefraisht_id_fk` FOREIGN KEY (`lignesfraishorsforfait_id`) REFERENCES `lignesfraishorsforfaits` (`id`);

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
