-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 23 Avril 2014 à 07:26
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `basa`
--
CREATE DATABASE IF NOT EXISTS `basa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `basa`;

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE IF NOT EXISTS `forum_reponses` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `correspondance_sujet` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`id`, `auteur`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(15, '', 'chibik??', '2014-04-23 07:19:26', 12),
(16, 'mohamed', 'hahaa', '2014-04-23 07:19:51', 12),
(17, 'zaw', 'smljqs', '2014-04-23 07:20:09', 12);

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

CREATE TABLE IF NOT EXISTS `forum_sujets` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date_derniere_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`id`, `auteur`, `titre`, `date_derniere_reponse`) VALUES
(12, 'ali', 'waaaaaaaaa', '2014-04-23 07:20:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
