-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 21 mai 2018 à 16:41
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `equestre_richeaurelien`
--

-- --------------------------------------------------------

--
-- Structure de la table `cavalier`
--

CREATE TABLE `cavalier` (
  `numCavalier` int(11) NOT NULL,
  `nomCavalier` varchar(50) NOT NULL,
  `prenomCavalier` varchar(50) NOT NULL,
  `optionReprise` varchar(10) DEFAULT NULL,
  `nbtickets` int(11) NOT NULL,
  `codeTypeMonture` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cavalier`
--

INSERT INTO `cavalier` (`numCavalier`, `nomCavalier`, `prenomCavalier`, `optionReprise`, `nbtickets`, `codeTypeMonture`) VALUES
(2, 'DURAND', 'Richard', 'Forfait', 0, 'C'),
(3, 'MARTIN', 'Elsa', 'Ticket', 8, 'C'),
(7, 'BORDES', 'Alexandre', 'Ticket', 2, 'C'),
(8, 'VOLPI', 'Arnaud', 'Forfait', 0, 'P'),
(9, 'TURLET', 'Junior', NULL, 0, 'P'),
(10, 'ORABONA', 'Morgan', 'Forfait', 0, 'C');

-- --------------------------------------------------------

--
-- Structure de la table `inscription_annuelle`
--

CREATE TABLE `inscription_annuelle` (
  `numCavalier` int(11) NOT NULL,
  `numPlanning` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription_annuelle`
--

INSERT INTO `inscription_annuelle` (`numCavalier`, `numPlanning`) VALUES
(3, 12),
(8, 8);

-- --------------------------------------------------------

--
-- Structure de la table `inscription_reprise`
--

CREATE TABLE `inscription_reprise` (
  `numReprise` int(11) NOT NULL,
  `numCavalier` int(11) NOT NULL,
  `numMoniteur` int(11) NOT NULL,
  `numMonture` int(11) NOT NULL,
  `rattrapage` tinyint(1) NOT NULL,
  `absent` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription_reprise`
--

INSERT INTO `inscription_reprise` (`numReprise`, `numCavalier`, `numMoniteur`, `numMonture`, `rattrapage`, `absent`) VALUES
(23, 3, 4, 12, 0, 0),
(22, 8, 4, 8, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE `moniteur` (
  `numMoniteur` int(11) NOT NULL,
  `nomMoniteur` varchar(50) NOT NULL,
  `prenomMoniteur` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moniteur`
--

INSERT INTO `moniteur` (`numMoniteur`, `nomMoniteur`, `prenomMoniteur`) VALUES
(1, 'BOURGEOIS', 'Agnès'),
(2, 'PASQUALINI', 'Claude'),
(3, 'TECHER', 'Charles'),
(4, 'BOGUZS', 'Thierry');

-- --------------------------------------------------------

--
-- Structure de la table `monture`
--

CREATE TABLE `monture` (
  `numMonture` int(11) NOT NULL,
  `nomMonture` varchar(50) NOT NULL,
  `sexe` char(1) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `race` varchar(30) NOT NULL,
  `robe` varchar(30) NOT NULL,
  `photoMonture` varchar(30) NOT NULL,
  `codeTypeMonture` char(1) NOT NULL,
  `numCavalier` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monture`
--

INSERT INTO `monture` (`numMonture`, `nomMonture`, `sexe`, `poids`, `taille`, `race`, `robe`, `photoMonture`, `codeTypeMonture`, `numCavalier`) VALUES
(2, 'BISCOTTE', 'F', 800, 150, 'Falabella', 'Alezan', 'biscotte.jpg', 'P', 1),
(3, 'CONFETTI', 'M', 900, 170, 'Frison', 'Noir', 'confetti.jpg', 'C', NULL),
(4, 'LINUX', 'M', 160, 1200, 'Fjord', 'Noir', 'test.jpg', 'P', 4),
(12, 'VIVE_L\'IUT', 'F', 50000000, 120000, 'Fjord', 'Marron', 'ttr.png', 'C', NULL),
(6, 'DIMITRI', 'M', 5000, 500, 'Fjord', 'MArron', 'cheval10.gif', 'C', 7),
(8, 'THIERRY', 'F', 70, 160, 'Fjord', 'Rouge', 'c.jpg', 'P', 9),
(11, 'TALIBAN', 'M', 500, 150, 'Fjord', 'Noir', 'maxresdefault.jpg', 'C', NULL),
(10, 'BENOIT LA TARLOUZE', 'M', 65, 179, 'Blanc', 'Blond', 'rr.jpg', 'C', 3),
(17, 'DAMIEN', 'M', 150, 190, 'Fjord', 'Noir', 'damso.jpg', 'C', 10);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `numPlanning` int(11) NOT NULL,
  `jour` varchar(10) NOT NULL,
  `heure` time NOT NULL,
  `codeTypeReprise` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`numPlanning`, `jour`, `heure`, `codeTypeReprise`) VALUES
(1, 'Lundi', '17:45:00', 'G12'),
(2, 'Lundi', '18:45:00', 'G23'),
(3, 'Lundi', '19:55:00', 'G34'),
(4, 'Lundi', '20:45:00', 'D1'),
(6, 'Mardi', '18:45:00', 'D2'),
(7, 'Mardi', '19:45:00', 'D1'),
(8, 'Mardi', '20:45:00', 'G34'),
(9, 'Mercredi', '17:45:00', 'G34'),
(10, 'Mercredi', '18:45:00', 'D2'),
(11, 'Mercredi', '19:45:00', 'D1'),
(12, 'Mercredi', '20:45:00', 'G34'),
(13, 'Jeudi', '17:45:00', 'G12'),
(14, 'Jeudi', '18:45:00', 'D2'),
(15, 'Jeudi', '19:45:00', 'D1'),
(16, 'Jeudi', '20:45:00', 'G34'),
(17, 'Vendredi', '17:45:00', 'G34'),
(18, 'Vendredi', '18:45:00', 'D2'),
(19, 'Vendredi', '19:45:00', 'D1'),
(20, 'Vendredi', '20:45:00', 'G34'),
(21, 'Samedi', '17:45:00', 'G34'),
(22, 'Samedi', '18:45:00', 'D2'),
(23, 'Samedi', '19:45:00', 'D1'),
(24, 'Samedi', '20:45:00', 'G34'),
(25, 'Dimanche', '17:45:00', 'G34'),
(26, 'Dimanche', '18:45:00', 'D2'),
(27, 'Dimanche', '19:45:00', 'D1'),
(28, 'Dimanche', '20:45:00', 'G34');

-- --------------------------------------------------------

--
-- Structure de la table `reprise`
--

CREATE TABLE `reprise` (
  `numReprise` int(11) NOT NULL,
  `dateReprise` date NOT NULL,
  `numPlanning` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reprise`
--

INSERT INTO `reprise` (`numReprise`, `dateReprise`, `numPlanning`) VALUES
(5, '2018-03-12', 3),
(6, '2018-03-14', 10),
(7, '2018-03-14', 12),
(8, '2018-03-16', 20),
(9, '2018-03-12', 4),
(10, '2018-03-15', 13),
(11, '2018-03-14', 10),
(12, '2018-03-30', 18),
(13, '2018-03-17', 22),
(14, '2018-03-12', 4),
(15, '2018-03-17', 23),
(16, '2018-03-22', 13),
(17, '2019-06-24', 1),
(18, '2018-03-12', 4),
(19, '2018-04-24', 8),
(20, '2018-05-07', 2),
(21, '2018-05-17', 13),
(22, '2018-05-14', 4),
(23, '2018-05-18', 17);

-- --------------------------------------------------------

--
-- Structure de la table `type_monture`
--

CREATE TABLE `type_monture` (
  `codeTypeMonture` char(1) NOT NULL,
  `libTypeMonture` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_monture`
--

INSERT INTO `type_monture` (`codeTypeMonture`, `libTypeMonture`) VALUES
('P', 'Poney'),
('C', 'Cheval');

-- --------------------------------------------------------

--
-- Structure de la table `type_reprise`
--

CREATE TABLE `type_reprise` (
  `codeTypeReprise` varchar(3) NOT NULL,
  `libTypeReprise` varchar(30) NOT NULL,
  `numMoniteur` int(11) NOT NULL,
  `codeTypeMonture` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_reprise`
--

INSERT INTO `type_reprise` (`codeTypeReprise`, `libTypeReprise`, `numMoniteur`, `codeTypeMonture`) VALUES
('G12', 'Galop 1-2', 2, 'C'),
('G23', 'Galop 2-3', 3, 'C'),
('G34', 'Galop 4-5', 4, 'C'),
('BP', 'Baby Poney', 2, 'P'),
('D1', 'DÃ©butants 1Ã¨re annÃ©e', 2, 'P'),
('D2', 'DÃ©butants 2Ã¨me annÃ©e', 3, 'P');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `id` int(11) NOT NULL,
  `num_moniteur` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `date_register` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`fname`, `lname`, `id`, `num_moniteur`, `role`, `email`, `password`, `date_register`) VALUES
('Thierry', 'BOGUSZ', 9, 4, 2, 'titi@gmail.com', '$2y$10$6jkGZE1yCGc45Z/T1/U.1eLphf3e/J6N5P4WHUsK9NjwzZa583Ibu', '2018-02-27 16:47:01'),
('AurÃ©lien', 'RICHE', 1, NULL, 1, 'aurelienriche00@gmail.com', '$2y$10$OTkZ2BX///5DEqKQcNOfPO47tY2fvWlScJQLEPgTPkozru8vHc9hC', '2018-01-14 09:30:44'),
('Claude', 'PASQUALINI', 12, 2, 2, 'clo@gmail.com', '$2y$10$xQLOxTUIIGactpqwbz3t7eytUA41exd3SA1pM9Gtz2dyJDqJFymGm', '2018-03-14 08:52:08'),
('Charles', 'TECHER', 10, 3, 2, 'cc@gmail.com', '$2y$10$0JZlb6syTwvEgtdLpAiAIezh3S4HIHABkiB9VzE7CQuQzTnUrdOEK', '2018-03-13 17:44:59'),
('AgnÃ¨s', 'BOURGEOIS', 11, 1, 2, 'aa@gmail.com', '$2y$10$4heGf0S21DfOUiep30kWLOKjPFnj6tYinxhdGFfkSpcm44LEytPd.', '2018-03-14 08:51:18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cavalier`
--
ALTER TABLE `cavalier`
  ADD PRIMARY KEY (`numCavalier`),
  ADD KEY `codeTypeMonture` (`codeTypeMonture`);

--
-- Index pour la table `inscription_annuelle`
--
ALTER TABLE `inscription_annuelle`
  ADD PRIMARY KEY (`numCavalier`,`numPlanning`),
  ADD KEY `numPlanning` (`numPlanning`);

--
-- Index pour la table `inscription_reprise`
--
ALTER TABLE `inscription_reprise`
  ADD PRIMARY KEY (`numReprise`,`numCavalier`,`numMonture`),
  ADD KEY `numCavalier` (`numCavalier`),
  ADD KEY `numMonture` (`numMonture`);

--
-- Index pour la table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`numMoniteur`);

--
-- Index pour la table `monture`
--
ALTER TABLE `monture`
  ADD PRIMARY KEY (`numMonture`),
  ADD KEY `numCavalier` (`numCavalier`),
  ADD KEY `codeTypeMonture` (`codeTypeMonture`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`numPlanning`),
  ADD KEY `codeTypeReprise` (`codeTypeReprise`);

--
-- Index pour la table `reprise`
--
ALTER TABLE `reprise`
  ADD PRIMARY KEY (`numReprise`),
  ADD KEY `numPlanning` (`numPlanning`);

--
-- Index pour la table `type_monture`
--
ALTER TABLE `type_monture`
  ADD PRIMARY KEY (`codeTypeMonture`);

--
-- Index pour la table `type_reprise`
--
ALTER TABLE `type_reprise`
  ADD PRIMARY KEY (`codeTypeReprise`),
  ADD KEY `numMoniteur` (`numMoniteur`),
  ADD KEY `codeTypeMonture` (`codeTypeMonture`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cavalier`
--
ALTER TABLE `cavalier`
  MODIFY `numCavalier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `moniteur`
--
ALTER TABLE `moniteur`
  MODIFY `numMoniteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `monture`
--
ALTER TABLE `monture`
  MODIFY `numMonture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `numPlanning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `reprise`
--
ALTER TABLE `reprise`
  MODIFY `numReprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `type_reprise`
--
ALTER TABLE `type_reprise`
  MODIFY `numMoniteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
