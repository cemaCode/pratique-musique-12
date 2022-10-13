-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 oct. 2022 à 21:18
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pratique-musique-12`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `mail` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`mail`, `nom`, `prenom`) VALUES
('elmolghc@3il.fr', 'El Molghy', 'Chaker'),
('lefrancl@3il.fr', 'Lefrançois', 'Lisa');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `mail` varchar(50) NOT NULL,
  `nomRubrique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`mail`, `nomRubrique`) VALUES
('admin@leclub.fr', 'Diffusion'),
('admin@mjcrodez.fr', 'Enseignement');

-- --------------------------------------------------------

--
-- Structure de la table `instruments`
--

CREATE TABLE `instruments` (
  `nomInstrument` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `instruments`
--

INSERT INTO `instruments` (`nomInstrument`) VALUES
('Accordeon'),
('Flute'),
('Guitare'),
('Harpe'),
('Piano'),
('Tambour'),
('Violon');

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

CREATE TABLE `lieux` (
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`codePostal`, `ville`) VALUES
('12000', 'Rodez');

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `niveau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`niveau`) VALUES
('Confirmé'),
('Débutant'),
('Intermédiaire'),
('Pro'),
('Semi Pro'),
('Tous');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `idOffre` varchar(50) NOT NULL,
  `titreOffre` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `photo1` varchar(50) DEFAULT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `nomRubrique` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `nomInstrument` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`idOffre`, `titreOffre`, `description`, `photo1`, `photo2`, `photo3`, `nomRubrique`, `niveau`, `nomInstrument`, `codePostal`, `ville`, `mail`) VALUES
('1', 'Cours de flute', 'Cours de flute traversière pour tous niveaux.', NULL, NULL, NULL, 'Enseignement', 'Tous', 'Flute', '12000', 'Rodez', 'admin@mjcrodez.fr');

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE `rubriques` (
  `nomRubrique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rubriques`
--

INSERT INTO `rubriques` (`nomRubrique`) VALUES
('Accompagnement '),
('Diffusion'),
('Enseignement'),
('Éveil musical'),
('Pratique d\'ensemble');

-- --------------------------------------------------------

--
-- Structure de la table `structures`
--

CREATE TABLE `structures` (
  `mail` varchar(50) NOT NULL,
  `nomStructure` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `siteInternet` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `zoneCarte` varchar(50) DEFAULT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `structures`
--

INSERT INTO `structures` (`mail`, `nomStructure`, `tel`, `siteInternet`, `adresse`, `contact`, `zoneCarte`, `codePostal`, `ville`) VALUES
('admin@leclub.fr', 'Le Club', '0565428868', 'leclubrodez.fr', '37 Av. Tarayre', 'contact@leclub.fr', '9999', '12000', 'Rodez'),
('admin@mjcrodez.fr', 'MJC de Rodez', '056567113', 'mjcrodez.fr', '1 Rue Saint-Cyrice', 'contac@mjcrodez.fr', '15', '12000', 'Rodez');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `mail` varchar(50) NOT NULL,
  `motDePasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`mail`, `motDePasse`) VALUES
('admin@leclub.fr', 'leclub'),
('admin@mjcrodez.fr', 'mjcrodez'),
('elmolghc@3il.fr', 'chaker'),
('lefrancl@3il.fr', 'lisa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`mail`,`nomRubrique`),
  ADD KEY `nomRubrique` (`nomRubrique`);

--
-- Index pour la table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`nomInstrument`);

--
-- Index pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`codePostal`,`ville`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`niveau`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `nomInstrument` (`nomInstrument`),
  ADD KEY `niveau` (`niveau`),
  ADD KEY `nomRubrique` (`nomRubrique`),
  ADD KEY `codePostal` (`codePostal`,`ville`),
  ADD KEY `mail` (`mail`);

--
-- Index pour la table `rubriques`
--
ALTER TABLE `rubriques`
  ADD PRIMARY KEY (`nomRubrique`);

--
-- Index pour la table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `codePostal` (`codePostal`,`ville`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`mail`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `utilisateurs` (`mail`);

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `structures` (`mail`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`nomRubrique`) REFERENCES `rubriques` (`nomRubrique`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`nomInstrument`) REFERENCES `instruments` (`nomInstrument`),
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`niveau`) REFERENCES `niveaux` (`niveau`),
  ADD CONSTRAINT `offres_ibfk_3` FOREIGN KEY (`nomRubrique`) REFERENCES `rubriques` (`nomRubrique`),
  ADD CONSTRAINT `offres_ibfk_4` FOREIGN KEY (`codePostal`,`ville`) REFERENCES `lieux` (`codePostal`, `ville`),
  ADD CONSTRAINT `offres_ibfk_5` FOREIGN KEY (`mail`) REFERENCES `structures` (`mail`);

--
-- Contraintes pour la table `structures`
--
ALTER TABLE `structures`
  ADD CONSTRAINT `structures_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `utilisateurs` (`mail`),
  ADD CONSTRAINT `structures_ibfk_2` FOREIGN KEY (`codePostal`,`ville`) REFERENCES `lieux` (`codePostal`, `ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
