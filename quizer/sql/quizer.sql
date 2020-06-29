-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 juin 2020 à 13:34
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizer`
--

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

DROP TABLE IF EXISTS `choice`;
CREATE TABLE IF NOT EXISTS `choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `choice`
--

INSERT INTO `choice` (`id`, `question_id`, `is_correct`, `text`) VALUES
(1, 1, 1, '$_GET[]'),
(2, 1, 0, '$_SERVER[]'),
(4, 1, 0, '$_FILE[]'),
(5, 2, 0, 'Create Myfunction'),
(6, 2, 0, 'Myfunction Create'),
(7, 2, 1, 'function myFunc()'),
(8, 2, 0, 'New Function()'),
(9, 3, 0, '0'),
(10, 3, 0, '2'),
(11, 3, 0, '3'),
(12, 3, 1, '1'),
(13, 4, 0, 'C++'),
(14, 4, 0, 'JAVASCRIPT'),
(15, 4, 1, 'PYTHON'),
(16, 4, 0, 'PHP'),
(17, 5, 0, 'Un point \".\"'),
(18, 5, 1, 'Un point d\'interrogation \"?\"'),
(19, 5, 0, 'Un point d\'exclamation \"!\"'),
(20, 5, 0, 'Une esperluette \"&\'');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL,
  `Text` text NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question_id`, `Text`) VALUES
(1, 'How do you get information from a form that is submitted using the \"get\" method?'),
(2, 'What is the correct way to create a function in PHP?\r\n\r\n'),
(3, 'how much parameter take the function mysqli->query()'),
(4, 'what the best backend language in the history '),
(5, 'Quel symbole sépare le nom de la page de ses paramètres dans l\'URL ?');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
