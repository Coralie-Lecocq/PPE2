-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 mars 2019 à 13:03
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `bornes`
--

DROP TABLE IF EXISTS `bornes`;
CREATE TABLE IF NOT EXISTS `bornes` (
  `idBornes` int(11) NOT NULL AUTO_INCREMENT,
  `prix` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `adressemac` int(11) NOT NULL,
  `adresseip` int(11) NOT NULL,
  PRIMARY KEY (`idBornes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `borne_commander`
--

DROP TABLE IF EXISTS `borne_commander`;
CREATE TABLE IF NOT EXISTS `borne_commander` (
  `idborne` int(11) NOT NULL,
  `idcommande` int(11) NOT NULL,
  KEY `idborne` (`idborne`),
  KEY `idcommande` (`idcommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `borne_photo`
--

DROP TABLE IF EXISTS `borne_photo`;
CREATE TABLE IF NOT EXISTS `borne_photo` (
  `idBornes` int(11) NOT NULL,
  `idphotos` int(11) NOT NULL,
  KEY `idphotos` (`idphotos`),
  KEY `idBornes` (`idBornes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClients` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ciret` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idClients`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `payment` int(255) NOT NULL,
  `code_event` int(255) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  KEY `idEvent` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consomable_commander`
--

DROP TABLE IF EXISTS `consomable_commander`;
CREATE TABLE IF NOT EXISTS `consomable_commander` (
  `idconsomable` int(11) NOT NULL,
  `idcommande` int(11) NOT NULL,
  KEY `idconsomable` (`idconsomable`),
  KEY `idcommande` (`idcommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consommables`
--

DROP TABLE IF EXISTS `consommables`;
CREATE TABLE IF NOT EXISTS `consommables` (
  `idconsommable` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(5,0) NOT NULL,
  PRIMARY KEY (`idconsommable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consommables`
--

INSERT INTO `consommables` (`idconsommable`, `libelle`, `stock`, `description`, `prix`) VALUES
(1, 'test', 10, 'giifififif', '15');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `idphotos` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `selection` tinyint(1) NOT NULL,
  PRIMARY KEY (`idphotos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `borne_commander`
--
ALTER TABLE `borne_commander`
  ADD CONSTRAINT `borne_commander_ibfk_1` FOREIGN KEY (`idborne`) REFERENCES `bornes` (`idBornes`),
  ADD CONSTRAINT `borne_commander_ibfk_2` FOREIGN KEY (`idcommande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `borne_photo`
--
ALTER TABLE `borne_photo`
  ADD CONSTRAINT `borne_photo_ibfk_1` FOREIGN KEY (`idBornes`) REFERENCES `bornes` (`idBornes`),
  ADD CONSTRAINT `borne_photo_ibfk_2` FOREIGN KEY (`idphotos`) REFERENCES `photos` (`idphotos`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClients`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `evenements` (`id_event`);

--
-- Contraintes pour la table `consomable_commander`
--
ALTER TABLE `consomable_commander`
  ADD CONSTRAINT `consomable_commander_ibfk_1` FOREIGN KEY (`idconsomable`) REFERENCES `consommables` (`idconsommable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `consomable_commander_ibfk_2` FOREIGN KEY (`idcommande`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
