SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pratique-musique-12`
--

DROP TABLE IF EXISTS OFFRES,
					 INSTRUMENTS,
					 NIVEAUX,
					 RUBRIQUES,
					 STRUCTURES,
					 COMMUNES,
					 CODEPOSTAL,
					 UTILISATEURS,
					 ROLES;
					 
-- --------------------------------------------------------
--
-- Structure de la table `ROLES`
--
CREATE TABLE `ROLES` (
	`nomRole` varchar(30) NOT NULL,
	PRIMARY KEY (`nomRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Structure de la table `UTILISATEURS`
--

CREATE TABLE `UTILISATEURS` (
  `mail` varchar(50) NOT NULL,
  `motDePasse` varchar(150) NOT NULL,
  `nomRole` varchar(30) NOT NULL,
  PRIMARY KEY (`mail`),
  FOREIGN KEY (`nomRole`) references `ROLES`(`nomRole`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Structure de la table `CODEPOSTAL`
--
CREATE TABLE `CODEPOSTAL` (
	`codePostal` CHAR(5) NOT NULL,
	PRIMARY KEY (`codePostal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Structure de la table `COMMUNES`
--
CREATE TABLE `COMMUNES` (
	`codeInsee` CHAR(5) NOT NULL,
	`nomCommune` varchar(50) NOT NULL,
	`codePostal` CHAR(5) NOT NULL,
	PRIMARY KEY (`codeInsee`),
	FOREIGN KEY (`codePostal`) references `CODEPOSTAL`(`codePostal`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------
--
-- Structure de la table `STRUCTURES`
--
CREATE TABLE `STRUCTURES` (
  `nomStructure` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `tel` CHAR(10) NOT NULL,
  `siteInternet` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codeInsee` CHAR(5) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contact`),
  FOREIGN KEY (`codeInsee`) references `COMMUNES`(`codeInsee`) ON DELETE CASCADE,
  FOREIGN KEY (`mail`) references `UTILISATEURS`(`mail`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `RUBRIQUES`
--

CREATE TABLE `RUBRIQUES` (
  `nomRubrique` varchar(50) NOT NULL,
  PRIMARY KEY (`nomRubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Structure de la table `NIVEAUX`
--

CREATE TABLE `NIVEAUX` (
  `niveau` varchar(50) NOT NULL,
  PRIMARY KEY (`niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `INSTRUMENTS`
--

CREATE TABLE `INSTRUMENTS` (
  `nomInstrument` varchar(50) NOT NULL,
  PRIMARY KEY (`nomInstrument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `OFFRES`
--

CREATE TABLE `OFFRES` (
  `idOffre` varchar(50) NOT NULL,
  `nomOffre` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `photo1` varchar(50) DEFAULT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `nomRubrique` varchar(50) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `nomInstrument` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idOffre`),
  FOREIGN KEY (`nomRubrique`) references `RUBRIQUES`(`nomRubrique`) ON DELETE CASCADE,
  FOREIGN KEY (`niveau`) references `NIVEAUX`(`niveau`) ON DELETE CASCADE,
  FOREIGN KEY (`contact`) references `STRUCTURES`(`contact`) ON DELETE CASCADE,
  FOREIGN KEY (`nomInstrument`) references `INSTRUMENTS`(`nomInstrument`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;








