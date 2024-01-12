-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 jan. 2024 à 09:15
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
(5, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 2, '112023', '2023-12-08'),
(6, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 4, '102023', '2023-12-08'),
(8, '2c0f4879-618f-4ed7-9605-491b45fc6b91', 3, '102023', '2023-12-08'),
(50, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 1, '012000', '2023-12-08'),
(51, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 1, '022000', '2023-12-08'),
(52, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 1, '032000', '2023-12-08'),
(53, 'd56a9b83-b3aa-4bae-8884-07665b414a45', 1, '042000', '2023-12-08'),
(56, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 1, '112011', '2023-12-15'),
(57, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 1, '022005', '2023-12-15'),
(58, '0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 3, '052004', '2023-12-15');

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
(5, 9),
(5, 10),
(5, 11),
(6, 12),
(6, 13),
(6, 14),
(50, 172),
(50, 173),
(50, 174),
(50, 175),
(50, 176),
(50, 177),
(58, 214),
(58, 215),
(58, 216),
(58, 217),
(58, 218),
(58, 219);

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
(5, 5),
(6, 6),
(7, 6),
(8, 8),
(9, 8),
(109, 58);

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
(9, 2, 1),
(10, 3, 3),
(11, 4, 2),
(12, 2, 1),
(13, 5, 3),
(14, 7, 2),
(15, 4, 5),
(16, 6, 6),
(17, 7, 30),
(18, 2, 0),
(19, 3, 0),
(20, 4, 0),
(21, 5, 0),
(22, 6, 0),
(23, 7, 0),
(24, 2, 0),
(25, 3, 0),
(26, 4, 0),
(27, 5, 0),
(28, 6, 0),
(29, 7, 0),
(30, 2, 0),
(31, 3, 0),
(32, 4, 0),
(33, 5, 0),
(34, 6, 0),
(35, 7, 0),
(36, 2, 0),
(37, 3, 0),
(38, 4, 0),
(39, 5, 0),
(40, 2, 0),
(41, 3, 0),
(42, 4, 0),
(43, 5, 0),
(44, 6, 0),
(45, 7, 0),
(46, 2, 0),
(47, 3, 0),
(48, 4, 0),
(49, 5, 0),
(50, 6, 0),
(51, 7, 0),
(52, 2, 0),
(53, 3, 0),
(54, 4, 0),
(55, 5, 0),
(56, 6, 0),
(57, 7, 0),
(58, 2, 0),
(59, 3, 0),
(60, 4, 0),
(61, 5, 0),
(62, 6, 0),
(63, 7, 0),
(64, 2, 0),
(65, 3, 0),
(66, 4, 0),
(67, 5, 0),
(68, 6, 0),
(69, 7, 0),
(70, 2, 0),
(71, 3, 0),
(72, 4, 0),
(73, 5, 0),
(74, 6, 0),
(75, 7, 0),
(76, 2, 0),
(77, 3, 0),
(78, 4, 0),
(79, 5, 0),
(80, 6, 0),
(81, 7, 0),
(82, 2, 0),
(83, 3, 0),
(84, 4, 0),
(85, 5, 0),
(86, 6, 0),
(87, 7, 0),
(88, 2, 0),
(89, 3, 0),
(90, 4, 0),
(91, 5, 0),
(92, 6, 0),
(93, 7, 0),
(94, 2, 0),
(95, 3, 0),
(96, 4, 0),
(97, 5, 0),
(98, 6, 0),
(99, 7, 0),
(100, 2, 0),
(101, 3, 0),
(102, 4, 0),
(103, 5, 0),
(104, 6, 0),
(105, 7, 0),
(106, 2, 0),
(107, 3, 0),
(108, 4, 0),
(109, 5, 0),
(110, 6, 0),
(111, 7, 0),
(112, 2, 0),
(113, 3, 0),
(114, 4, 0),
(115, 5, 0),
(116, 6, 0),
(117, 7, 0),
(118, 2, 0),
(119, 3, 0),
(120, 4, 0),
(121, 5, 0),
(122, 6, 0),
(123, 7, 0),
(124, 2, 7),
(125, 3, 1),
(126, 4, 5),
(127, 5, 15),
(128, 6, 76),
(129, 7, 1),
(130, 2, 0),
(131, 3, 0),
(132, 4, 0),
(133, 5, 0),
(134, 6, 0),
(135, 7, 0),
(136, 2, 14),
(137, 3, 10),
(138, 4, 0),
(139, 5, 2),
(140, 6, 0),
(141, 7, 300),
(142, 2, 0),
(143, 3, 0),
(144, 4, 0),
(145, 5, 0),
(146, 6, 0),
(147, 7, 0),
(148, 2, 0),
(149, 3, 0),
(150, 4, 0),
(151, 5, 0),
(152, 6, 0),
(153, 7, 0),
(154, 2, 0),
(155, 3, 0),
(156, 4, 0),
(157, 5, 0),
(158, 6, 0),
(159, 7, 0),
(160, 2, 0),
(161, 3, 0),
(162, 4, 0),
(163, 5, 0),
(164, 6, 0),
(165, 7, 0),
(166, 2, 6),
(167, 3, 5),
(168, 4, 4),
(169, 5, 3),
(170, 6, 2),
(171, 7, 1),
(172, 2, 0),
(173, 3, 0),
(174, 4, 0),
(175, 5, 0),
(176, 6, 0),
(177, 7, 0),
(178, 2, 0),
(179, 3, 0),
(180, 4, 0),
(181, 5, 0),
(182, 6, 0),
(183, 7, 0),
(184, 2, 0),
(185, 3, 0),
(186, 4, 0),
(187, 5, 0),
(188, 6, 0),
(189, 7, 0),
(190, 2, 0),
(191, 3, 0),
(192, 4, 0),
(193, 5, 0),
(194, 6, 0),
(195, 7, 0),
(196, 2, 0),
(197, 3, 0),
(198, 4, 0),
(199, 5, 0),
(200, 6, 0),
(201, 7, 0),
(202, 2, 0),
(203, 3, 0),
(204, 4, 0),
(205, 5, 0),
(206, 6, 0),
(207, 7, 0),
(208, 2, 0),
(209, 3, 0),
(210, 4, 0),
(211, 5, 0),
(212, 6, 0),
(213, 7, 0),
(214, 2, 4),
(215, 3, 0),
(216, 4, 9),
(217, 5, 0),
(218, 6, 70),
(219, 7, 0);

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
(5, '2023-11-17', 10, 'Bar'),
(6, '2023-11-17', 50, 'Retrait'),
(7, '2023-11-17', 50, 'Banquet'),
(8, '2023-11-17', 200, 'Jaccuzi'),
(9, '2023-11-17', 4000, 'Setup Gaming'),
(106, '2020-02-20', 2121, 'N1'),
(108, '2020-02-20', 2323, 'N3'),
(109, '2023-12-15', 50, 'dépenses lambda');

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
('0b6a9cad-b1ec-4e7a-96cf-88e3d5dca018', 'user2', 'user2@gmail.com', '$2y$10$YZeiUTW5.R.GtmVAdee2jOblncI3zACuCcj1gAWoNpWwCott4Drvq', 'User', '2', 'a3dd53dac574f9a79a2d9baad69a0960', '2023-11-17 09:03:14', NULL, NULL, NULL, NULL, '2023-11-17 08:03:14', 1, 0, 'user', '2023-11-17 08:03:14', '2023-11-17 08:03:14', NULL),
('2c0f4879-618f-4ed7-9605-491b45fc6b91', 'user1', 'user1@gmail.com', '$2y$10$bU/hZsI1f.hXVoCGzbxy8uYWL8lGTGkWo77tW7SiTG1F0q.5fKj0S', 'User', '1', 'beb6bf192a1344d7daf61769251a281d', '2023-11-17 09:01:08', NULL, NULL, NULL, NULL, '2023-11-17 08:01:08', 1, 0, 'user', '2023-11-17 08:01:08', '2023-11-17 08:01:08', NULL),
('a6d456fc-0f33-4d51-b12b-81d3590f81ab', 'comptable', 'comptable@gmail.com', '$2y$10$RwlxeVO0grhSfd6Qe3gU5.kyaWmkrNoW.XweTKAjmt5qjDtMFz8Ta', 'con', 'table', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'comptable', '2023-12-08 12:38:00', '2023-12-08 12:38:00', NULL),
('d56a9b83-b3aa-4bae-8884-07665b414a45', 'admin', 'simon.brsi@gmail.com', '$2y$10$6nPmsUHfgN5Ceoet7uqfTe/I96.21kpAodH40xssXo9.3SAnbaF2y', 'Admin', 'Istrateur', NULL, NULL, '', '2023-10-19 12:55:20', NULL, NULL, '2023-10-17 08:35:36', 1, 1, 'superuser', '2023-10-17 08:35:36', '2023-11-10 08:08:46', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `forfaits`
--
ALTER TABLE `forfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lignesforfaits`
--
ALTER TABLE `lignesforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `lignesfraishorsforfaits`
--
ALTER TABLE `lignesfraishorsforfaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
