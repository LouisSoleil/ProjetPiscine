-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 jan. 2020 à 16:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `IdClasse` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleClasse` varchar(5) NOT NULL,
  `Annee` int(11) NOT NULL,
  PRIMARY KEY (`IdClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`IdClasse`, `LibelleClasse`, `Annee`) VALUES
(1, 'IG', 3),
(2, 'IG', 4),
(3, 'IG', 5),
(4, 'GBA', 3),
(5, 'GBA', 4),
(6, 'GBA', 5),
(7, 'MEA', 3),
(8, 'MEA', 4),
(9, 'MEA', 5),
(10, 'MI', 3),
(11, 'MI', 4),
(12, 'MI', 5),
(13, 'MAT', 3),
(14, 'MAT', 4),
(15, 'MAT', 5),
(16, 'STE', 3),
(17, 'STE', 4),
(18, 'STE', 5),
(19, 'MSI', 3),
(20, 'MSI', 4),
(21, 'MSI', 5),
(22, 'SE', 3),
(23, 'SE', 4),
(24, 'SE', 5),
(25, 'EGC', 3),
(26, 'EGC', 4),
(27, 'EGC', 5);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `codeINE` varchar(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `NumGroupe` int(11) DEFAULT NULL,
  `IdClasse` int(11) DEFAULT NULL,
  PRIMARY KEY (`codeINE`),
  KEY `Personne_Classe0_FK` (`IdClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `IdQuestion` int(11) NOT NULL,
  `ReponseJuste` char(1) NOT NULL,
  `IdTOEIC` int(11) NOT NULL,
  `IdPartie` int(11) NOT NULL,
  PRIMARY KEY (`IdQuestion`,`IdTOEIC`),
  KEY `Question_souspartie_FK` (`IdTOEIC`,`IdPartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

DROP TABLE IF EXISTS `repondre`;
CREATE TABLE IF NOT EXISTS `repondre` (
  `codeINE` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  `IdTOEIC` int(11) NOT NULL,
  `IdPartie` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`codeINE`,`date`,`IdTOEIC`,`IdPartie`),
  KEY `repondre_souspartie1_FK` (`IdTOEIC`,`IdPartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `idPartie` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`idPartie`,`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`idPartie`, `idQuestion`, `valeur`) VALUES
(1, 0, 0),
(1, 1, 5),
(1, 2, 5),
(1, 3, 5),
(1, 4, 5),
(1, 5, 5),
(1, 6, 5),
(1, 7, 5),
(1, 8, 5),
(1, 9, 5),
(1, 10, 5),
(1, 11, 5),
(1, 12, 5),
(1, 13, 5),
(1, 14, 5),
(1, 15, 5),
(1, 16, 5),
(1, 17, 10),
(1, 18, 15),
(1, 19, 20),
(1, 20, 25),
(1, 21, 30),
(1, 22, 35),
(1, 23, 40),
(1, 24, 45),
(1, 25, 50),
(1, 26, 55),
(1, 27, 60),
(1, 28, 70),
(1, 29, 80),
(1, 30, 85),
(1, 31, 90),
(1, 32, 95),
(1, 33, 100),
(1, 34, 105),
(1, 35, 115),
(1, 36, 125),
(1, 37, 135),
(1, 38, 140),
(1, 39, 150),
(1, 40, 160),
(1, 41, 170),
(1, 42, 175),
(1, 43, 180),
(1, 44, 190),
(1, 45, 200),
(1, 46, 205),
(1, 47, 215),
(1, 48, 220),
(1, 49, 225),
(1, 50, 230),
(1, 51, 235),
(1, 52, 245),
(1, 53, 255),
(1, 54, 260),
(1, 55, 265),
(1, 56, 275),
(1, 57, 285),
(1, 58, 290),
(1, 59, 295),
(1, 60, 300),
(1, 61, 310),
(1, 62, 320),
(1, 63, 325),
(1, 64, 330),
(1, 65, 335),
(1, 66, 340),
(1, 67, 345),
(1, 68, 350),
(1, 69, 355),
(1, 70, 360),
(1, 71, 365),
(1, 72, 370),
(1, 73, 375),
(1, 74, 385),
(1, 75, 395),
(1, 76, 400),
(1, 77, 405),
(1, 78, 415),
(1, 79, 420),
(1, 80, 425),
(1, 81, 430),
(1, 82, 435),
(1, 83, 440),
(1, 84, 445),
(1, 85, 450),
(1, 86, 455),
(1, 87, 460),
(1, 88, 465),
(1, 89, 475),
(1, 90, 480),
(1, 91, 485),
(1, 92, 490),
(1, 93, 495),
(1, 94, 495),
(1, 95, 495),
(1, 96, 495),
(1, 97, 495),
(1, 98, 495),
(1, 99, 495),
(1, 100, 495),
(2, 0, 0),
(2, 1, 5),
(2, 2, 5),
(2, 3, 5),
(2, 4, 5),
(2, 5, 5),
(2, 6, 5),
(2, 7, 5),
(2, 8, 5),
(2, 9, 5),
(2, 10, 5),
(2, 11, 5),
(2, 12, 5),
(2, 13, 5),
(2, 14, 5),
(2, 15, 5),
(2, 16, 5),
(2, 17, 5),
(2, 18, 5),
(2, 19, 5),
(2, 20, 5),
(2, 21, 10),
(2, 22, 15),
(2, 23, 20),
(2, 24, 25),
(2, 25, 30),
(2, 26, 35),
(2, 27, 40),
(2, 28, 45),
(2, 29, 55),
(2, 30, 60),
(2, 31, 65),
(2, 32, 70),
(2, 33, 75),
(2, 34, 80),
(2, 35, 85),
(2, 36, 90),
(2, 37, 95),
(2, 38, 105),
(2, 39, 115),
(2, 40, 120),
(2, 41, 125),
(2, 42, 130),
(2, 43, 135),
(2, 44, 140),
(2, 45, 145),
(2, 46, 155),
(2, 47, 160),
(2, 48, 170),
(2, 49, 175),
(2, 50, 185),
(2, 51, 195),
(2, 52, 205),
(2, 53, 210),
(2, 54, 215),
(2, 55, 220),
(2, 56, 230),
(2, 57, 240),
(2, 58, 245),
(2, 59, 250),
(2, 60, 255),
(2, 61, 260),
(2, 62, 265),
(2, 63, 270),
(2, 64, 275),
(2, 65, 280),
(2, 66, 285),
(2, 67, 290),
(2, 68, 295),
(2, 69, 300),
(2, 70, 310),
(2, 71, 315),
(2, 72, 320),
(2, 73, 325),
(2, 74, 330),
(2, 75, 335),
(2, 76, 340),
(2, 77, 345),
(2, 78, 355),
(2, 79, 360),
(2, 80, 370),
(2, 81, 375),
(2, 82, 385),
(2, 83, 390),
(2, 84, 395),
(2, 85, 400),
(2, 86, 405),
(2, 87, 415),
(2, 88, 420),
(2, 89, 425),
(2, 90, 435),
(2, 91, 440),
(2, 92, 450),
(2, 93, 455),
(2, 94, 460),
(2, 95, 470),
(2, 96, 475),
(2, 97, 485),
(2, 98, 485),
(2, 99, 490),
(2, 100, 495);

-- --------------------------------------------------------

--
-- Structure de la table `souspartie`
--

DROP TABLE IF EXISTS `souspartie`;
CREATE TABLE IF NOT EXISTS `souspartie` (
  `IdTOEIC` int(11) NOT NULL,
  `IdPartie` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`IdTOEIC`,`IdPartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `toeic`
--

DROP TABLE IF EXISTS `toeic`;
CREATE TABLE IF NOT EXISTS `toeic` (
  `IdTOEIC` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleTOEIC` varchar(255) NOT NULL,
  `estVisible` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdTOEIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `Personne_Classe0_FK` FOREIGN KEY (`IdClasse`) REFERENCES `classe` (`IdClasse`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Question_souspartie_FK` FOREIGN KEY (`IdTOEIC`,`IdPartie`) REFERENCES `souspartie` (`IdTOEIC`, `IdPartie`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `repondre_Personne_FK` FOREIGN KEY (`codeINE`) REFERENCES `personne` (`codeINE`),
  ADD CONSTRAINT `repondre_souspartie1_FK` FOREIGN KEY (`IdTOEIC`,`IdPartie`) REFERENCES `souspartie` (`IdTOEIC`, `IdPartie`);

--
-- Contraintes pour la table `souspartie`
--
ALTER TABLE `souspartie`
  ADD CONSTRAINT `souspartie_TOEIC_FK` FOREIGN KEY (`IdTOEIC`) REFERENCES `toeic` (`IdTOEIC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
