-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Janvier 2017 à 13:21
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `intership_list`
--

CREATE TABLE `intership_list` (
  `id` int(250) NOT NULL,
  `business_name` varchar(30) NOT NULL,
  `adress_one` varchar(30) NOT NULL,
  `adress_two` varchar(30) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `city` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `manager` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intership_list`
--

INSERT INTO `intership_list` (`id`, `business_name`, `adress_one`, `adress_two`, `zipcode`, `city`, `gender`, `manager`, `phone`, `mail`, `info`) VALUES
(1, 'AFPI', '16 Rue Duplex', '', 76600, 'LE HAVRE', 'Monsieur', 'Pierre-Emmanuel LECONTE', 235546950, 'peleconte@afpi-lehavre.com', 'Android, Apache Cordova, Anglais');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `intership_list`
--
ALTER TABLE `intership_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `intership_list`
--
ALTER TABLE `intership_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
