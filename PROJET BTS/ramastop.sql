-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Juin 2016 à 10:27
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ramastop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE IF NOT EXISTS `annee_scolaire` (
  `idannee_scolaire` int(11) NOT NULL AUTO_INCREMENT,
  `janvier` varchar(45) DEFAULT NULL,
  `fevrier` varchar(45) DEFAULT NULL,
  `mars` varchar(45) DEFAULT NULL,
  `avril` varchar(45) DEFAULT NULL,
  `mai` varchar(45) DEFAULT NULL,
  `juin` varchar(45) DEFAULT NULL,
  `septembre` varchar(45) DEFAULT NULL,
  `octobre` varchar(45) DEFAULT NULL,
  `novembre` varchar(45) DEFAULT NULL,
  `decembre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idannee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `arret`
--

CREATE TABLE IF NOT EXISTS `arret` (
  `idarret` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `ligne_de_bus_idligne_de_bus` int(11) NOT NULL,
  PRIMARY KEY (`idarret`),
  KEY `fk_arret_ligne_de_bus1_idx` (`ligne_de_bus_idligne_de_bus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `arret`
--

INSERT INTO `arret` (`idarret`, `nom`, `ligne_de_bus_idligne_de_bus`) VALUES
(1, 'route de sevran', 1),
(2, 'paul bert', 1),
(3, 'avenue des fougères', 1),
(4, 'bachaga boualam', 2),
(5, 'henri barbusse', 2),
(6, 'croix de l''aumone ', 2);

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `idbus` int(11) NOT NULL AUTO_INCREMENT,
  `nbr_places` varchar(45) DEFAULT NULL,
  `ligne_de_bus_idligne_de_bus` int(11) NOT NULL,
  PRIMARY KEY (`idbus`),
  KEY `fk_bus_ligne_de_bus1_idx` (`ligne_de_bus_idligne_de_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `ideleves` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `rentre_seul` tinyint(1) DEFAULT NULL,
  `responsable_legal` varchar(45) DEFAULT NULL,
  `responsable_legal2` varchar(45) DEFAULT NULL,
  `numero_tel_rl` varchar(45) DEFAULT NULL,
  `numero_tel_rl2` varchar(11) DEFAULT NULL,
  `lien_parente` varchar(45) DEFAULT NULL,
  `lien_parente2` varchar(45) DEFAULT NULL,
  `periode_ramassage` varchar(45) DEFAULT NULL,
  `jours_ramassage` varchar(45) DEFAULT NULL,
  `ecole` varchar(45) DEFAULT NULL,
  `date_de_naissance` varchar(45) DEFAULT NULL,
  `niveau_scolaire` varchar(45) DEFAULT NULL,
  `QR_code` varchar(45) DEFAULT NULL,
  `arret_idarret` int(11) NOT NULL,
  PRIMARY KEY (`ideleves`),
  KEY `fk_eleves_arret1_idx` (`arret_idarret`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ideleves`, `nom`, `prenom`, `rentre_seul`, `responsable_legal`, `responsable_legal2`, `numero_tel_rl`, `numero_tel_rl2`, `lien_parente`, `lien_parente2`, `periode_ramassage`, `jours_ramassage`, `ecole`, `date_de_naissance`, `niveau_scolaire`, `QR_code`, `arret_idarret`) VALUES
(34, 'thiruchelvam', 'parthipan', 1, 'thiruchelvam', 'thiru', '0651460333', '0148612103', 'pere', 'pere', NULL, NULL, 'jean rostand', NULL, 'bts', '1', 3),
(35, 'thabet', 'jihad', 1, 'thabet', 'thabet', '0148612100', '0648612100', 'pere', 'mere', NULL, NULL, 'jean rostand', NULL, 'bts snir', '0', 1),
(38, 'el hormi', 'nassim', 1, 'el hormi', 'el hormi', '06347562485', '06748529652', 'pere', 'mere', NULL, NULL, 'paul langevin', NULL, 'bts', '4', 3),
(40, 'diop', 'mamadou', 1, 'diop', 'diop', '06765898', '07988954', 'pere', 'mere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir2', '3', 1),
(41, 'traing', 'serey', 1, 'traing', 'traing', '06079895', '060798965', 'pere', 'mere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '5', 5),
(42, 'couvreur', 'mathys', NULL, 'couvreur', 'couvreur', '064348578', '068989987', 'pere', 'frere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '6', 4),
(43, 'arianfar', 'siawash', 1, 'arianfar', 'arianfar', '0789632412', '0645215485', 'pere', 'mere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '7', 6),
(44, 'offroy', 'vincent', NULL, 'offroy', 'offroy', '06079856', '079852310', 'soeur', 'pere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '8', 2),
(45, 'ayad', 'yanis', 1, 'ayad', 'ayad', '07456568', '075624132', 'pere', 'mere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '9', 1),
(46, 'erdogan', 'pierre', 1, 'erdogan', 'erdogan', '06548456', '074524545', 'mere', 'pere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir 2', '10', 3),
(48, 'benito', 'anthony', 1, 'benito', 'benito', '06356656', '06654857', 'pere', 'mere', NULL, NULL, 'lycee jean rostand', NULL, 'bts snir2', '2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_de_bus`
--

CREATE TABLE IF NOT EXISTS `ligne_de_bus` (
  `idligne_de_bus` int(11) NOT NULL AUTO_INCREMENT,
  `ligne_de_buscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idligne_de_bus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ligne_de_bus`
--

INSERT INTO `ligne_de_bus` (`idligne_de_bus`, `ligne_de_buscol`) VALUES
(1, 'vert galant'),
(2, 'langevin');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `idpresence` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(45) DEFAULT NULL,
  `QR_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpresence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `presence`
--

INSERT INTO `presence` (`idpresence`, `date`, `QR_code`) VALUES
(33, '2016-06-13 10:18', '2'),
(34, '2016-06-13 10:18', '10'),
(35, '2016-06-13 10:18', '9'),
(36, '2016-06-13 10:18', '1'),
(37, '2016-06-13 10:18', '0'),
(38, '2016-06-13 10:19', '2'),
(39, '2016-06-13 10:19', '3'),
(40, '2016-06-13 10:19', '10'),
(41, '2016-06-13 10:19', '3'),
(42, '2016-06-13 10:18', '2'),
(43, '2016-06-13 10:18', '10'),
(44, '2016-06-13 10:18', '9'),
(45, '2016-06-13 10:18', '1'),
(46, '2016-06-13 10:18', '0'),
(47, '2016-06-13 10:19', '2'),
(48, '2016-06-13 10:19', '3'),
(49, '2016-06-13 10:19', '10'),
(50, '2016-06-13 10:19', '3'),
(51, '2016-06-13 10:21', '0'),
(52, '2016-06-13 10:21', '1'),
(53, '2016-06-13 10:21', '5');

-- --------------------------------------------------------

--
-- Structure de la table `responsables_mairie`
--

CREATE TABLE IF NOT EXISTS `responsables_mairie` (
  `idresponsables_mairie` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idresponsables_mairie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `arret`
--
ALTER TABLE `arret`
  ADD CONSTRAINT `fk_arret_ligne_de_bus1` FOREIGN KEY (`ligne_de_bus_idligne_de_bus`) REFERENCES `ligne_de_bus` (`idligne_de_bus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `fk_bus_ligne_de_bus1` FOREIGN KEY (`ligne_de_bus_idligne_de_bus`) REFERENCES `ligne_de_bus` (`idligne_de_bus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `fk_eleves_arret1` FOREIGN KEY (`arret_idarret`) REFERENCES `arret` (`idarret`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
