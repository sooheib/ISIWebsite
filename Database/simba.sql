-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 23 Avril 2014 à 07:29
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `simba`
--
CREATE DATABASE IF NOT EXISTS `simba` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simba`;

-- --------------------------------------------------------

--
-- Structure de la table `gestionupload`
--

CREATE TABLE IF NOT EXISTS `gestionupload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `clic` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `gestionupload`
--

INSERT INTO `gestionupload` (`id`, `nom`, `genre`, `image`, `url`, `description`, `clic`, `date`) VALUES
(1, 'theme seven beta', 'OS', 'upload/seven.jpg', 'upload/seven.jpg', 'on peu metre une image ...', 12, '2010-10-07'),
(2, 'smpseesaw', 'utilitaire', 'http://img138.imageshack.us/img138/853/bkgpuce70.png', 'upload/smpseesaw.zip', 'un petit logiciel pour la gestion de tache pour multi coeur. trop top!', 6, '2010-10-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
