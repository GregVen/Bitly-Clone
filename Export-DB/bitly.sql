-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 nov. 2021 à 12:31
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bitly`
--

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `linkId` int NOT NULL AUTO_INCREMENT,
  `link` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `shortcut` varchar(50) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`linkId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`linkId`, `link`, `shortcut`, `user_id`) VALUES
(1, 'http://localhost/phpmyadmin/tbl_structure.php?server=1&db=bitly&table=links&field=linkId&change_column=1', '12s9HBQZYic9o', NULL),
(2, 'http://localhost/?Link=https%3A%2F%2Ffr.wikipedia.org%2Fwiki%2FFF', '91D1C4CuAp9kA', NULL),
(3, 'http://localhost/?Link=https%3A%2F%2Ffr.wikipedia.org%2Fwiki%2FFFee', '15QPB5/1qWc8M', NULL),
(4, 'http://localhost/phpmyadmin/sql.php?db=bitly&table=links&pos=0', '35WBRs98Aiy/U', NULL),
(5, 'http://localhost/?error=true&message=Adresse%20d%C3%A9j%C3%A0%20raccourcie', '13ikow7Pw01TM', NULL),
(6, 'https://fr.wikipedia.org/wiki/Jj_(groupe)', '18kLHcvvCc0Xc', NULL),
(7, 'http://localhost/?q=18kLHcvvCc0Xc', '44uYedW.smZD.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `nom`, `prenom`, `email`, `password`, `sel`) VALUES
(1, 'gv', 'test', 'ttt', 'gregory.venant@gmail.com', 'tt', NULL),
(6, 'gv', 'gregory', 'venant', 'gregory.venant@gmail.com', 'gv', NULL),
(5, 'gv', 'gregory', 'venant', 'gregory.venant@gmail.com', 'gv', NULL),
(7, 'justin', 'venant', 'gregory', 'gregory.venant@gmail.com', 'uu', NULL),
(8, 'ff', 'ff', 'ff', 'gregory.venant@gmail.com', 'ffff', NULL),
(9, 'ff', 'ff', 'ff', 'gregory.venant@gmail.com', 'ffff', NULL),
(10, 'justin', 'venant', 'gregory', 'gregory.venant@gmail.com', 'uu', NULL),
(11, 'ffffff', 'ffff', 'ffffff', 'capricorne07@hotmail.com', 'ffff', NULL),
(12, 'ff', 'ff', 'ff', 'gregory.venant@gmail.com', 'ffff', NULL),
(13, 'ffffff', 'ffff', 'ffffff', 'capricorne07@hotmail.com', 'ffff', NULL),
(14, 'ffffff', 'ffff', 'ffffff', 'capricorne07@hotmail.com', 'ffff', NULL),
(15, 'frfrf', 'rf', 'fr', 'gregory.venant@gmail.com', 'frfrf', NULL),
(16, 'frfrf', 'rf', 'fr', 'gregory.venant@gmail.com', 'frfrf', NULL),
(17, 'dddd', 'dd', 'dd', 'capricorne07@hotmail.com', 'ddd', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
