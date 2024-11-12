-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 28 avr. 2024 à 13:26
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `base_biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdps` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `mdps`) VALUES
(1, 'jihen', 'jihen@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`) VALUES
(1, 'kjh', 'molikujh'),
(2, 'mlkj', 'mlkjhg');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
CREATE TABLE IF NOT EXISTS `emprunts` (
  `ID_emprunt` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Titre_livre` varchar(30) NOT NULL,
  `date_retour` date NOT NULL,
  PRIMARY KEY (`ID_emprunt`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`ID_emprunt`, `Nom`, `email`, `Titre_livre`, `date_retour`) VALUES
(4, 'nour romdhani', 'nourroumdhani@gmail.com', 'the art ', '2024-04-12'),
(5, 'nour romdhani', 'nourroumdhani@gmail.com', 'the art ', '2024-04-27'),
(6, 'nour romdhani', 'nourromdhani32@gmail.com', 'the art 2', '2024-05-08'),
(7, 'nour romdhani', 'nourroumdhani@gmail.com', 'the art ', '2024-04-19');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `nom`, `auteur`, `category`, `langue`, `ISBN`, `image`) VALUES
(11, 'livre2', 'auteur2', 'categorylivre2', 'FR', 'TTTT', '70.jpg'),
(12, 'livre2', 'Jihen', 'enafant', 'fr', 'aaa', '8_U2_A9448_dbfdd43300.webp');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `ID_reservation` int NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int DEFAULT NULL,
  `ID_livre` int DEFAULT NULL,
  `statut` varchar(50) NOT NULL,
  `date_reservation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_reservation`),
  KEY `ID_utilisateur` (`ID_utilisateur`),
  KEY `ID_livre` (`ID_livre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`ID_reservation`, `ID_utilisateur`, `ID_livre`, `statut`, `date_reservation`) VALUES
(1, 1, 11, 'en attente', '2024-04-27 10:18:25'),
(2, 1, 11, 'en attente', '2024-04-27 10:18:29');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID_utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `num_telephone` int NOT NULL,
  `ad_email` char(100) NOT NULL,
  `password` char(20) NOT NULL,
  PRIMARY KEY (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_utilisateur`, `Nom`, `Prenom`, `num_telephone`, `ad_email`, `password`) VALUES
(1, 'romdhani', 'nour', 96292730, 'nourromdhani@gmail.com', '123456'),
(2, 'nermine', 'abidi', 23730220, 'nourromdhani32@gmail.com', '123456789'),
(3, 'mohamed', 'ali', 96292730, 'nourroumdhani@gmail.com', '123456789'),
(4, 'mohamed', 'ali', 22322101, 'minyarmahbouli01@gmail.com', '123456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
