-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Janvier 2016 à 23:43
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Science-Fiction'),
(2, 'Aventure'),
(3, 'Action');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nb_viewers` int(11) NOT NULL DEFAULT '0',
  `release_date` date NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `nb_viewers`, `release_date`, `id_genre`) VALUES
(1, 'Interstellar', 12, '2014-11-05', 1),
(2, 'Inception', 13, '2010-07-21', 1),
(3, 'Star Wars : Episode V - L''empire contre-attaque', 34, '1980-08-20', 1),
(4, 'Star Wars : Episode VI - Le Retour du Jedi', 27, '1983-10-19', 1),
(5, 'Star Wars : Episode IV - Un nouvel espoir (La Guerre des étoiles)', 36, '1977-10-19', 1),
(6, 'Retour vers le futur', 31, '1985-10-30', 1),
(7, 'Matrix', 25, '1999-06-23', 1),
(8, 'Alien, le huitième passager', 26, '1979-09-12', 1),
(9, 'Le Seigneur des anneaux : le retour du roi', 12, '2003-12-17', 2),
(10, 'Le Seigneur des anneaux : la communauté de l''anneau', 14, '2001-12-19', 2),
(11, 'Le Seigneur des anneaux : les deux tours', 15, '2002-12-18', 2),
(12, 'Indiana Jones et la Dernière Croisade', 23, '1989-09-16', 2),
(13, 'Les Aventuriers de l''Arche perdue', 11, '1981-09-16', 2),
(14, 'The Dark Knight, Le Chevalier Noir', 13, '2008-08-13', 3),
(15, 'Warrior', 6, '2011-09-14', 3),
(16, 'X-Men: Days of Future Past', 14, '2014-05-21', 3),
(17, 'Combats de maître', 8, '2000-10-20', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
