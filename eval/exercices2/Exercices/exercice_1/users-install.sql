--
-- Base de données :  `ex1_userslist`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `exo1_userslist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exo1_userslist`;

--
-- Structure de la table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` enum('Mlle','Mme','M') NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `users`
--
INSERT INTO `users` (`id`, `gender`, `firstname`, `lastname`, `email`, `birthdate`, `city`) VALUES
(1, 'Mlle', 'Agnès', 'Richard', 'a.richard@hotmail.fr', '1982-04-13', 'Moulin-la-Forêt'),
(2, 'Mlle', 'Nathalie', 'Clement', 'nath.clement@free.fr', '1984-02-11', 'Nanterre'),
(3, 'M', 'Yves', 'Duval', 'yvesduval@yahoo.fr', '1978-06-21', 'RoussetBourg'),
(4, 'Mme', 'Marguerite', 'Raynaud', 'marguerite.ray@orange.fr', '1954-10-17', 'Vidal'),
(5, 'Mme', 'Gabrielle', 'Pascal', 'gabiepascal320@wanadoo.fr', '1973-02-23', 'Saint-Pierre'),
(6, 'M', 'Benjamin', 'Carre', 'carre_benj@voila.fr', '1977-03-30', 'Bordeaux'),
(7, 'Mme', 'Catherine', 'Leduc', 'leduc.cathie@gmail.com', '1977-09-16', 'Costa'),
(8, 'M', 'Noël', 'Cordier', 'cordier226@free.fr', '1958-01-30', 'Rolland-sur-Mer'),
(9, 'M', 'Raymond', 'Chovait', 'raym.chauvait756@wanadoo.fr', '1973-08-01', 'St-Nazaire'),
(10, 'M', 'Thomas', 'Dias', 'tomtom.d@live.fr', '1989-08-07', 'Besnardville'),
(11, 'Mme', 'Olivia', 'Bouvet', 'olbouv27@orange.fr', '1983-08-14', 'Le Mans'),
(12, 'M', 'Tristan', 'Andre', 'tristan267@noos.fr', '1994-06-16', 'Limoges'),
(13, 'Mme', 'Bernadette', 'Maillet', 'maillet.bernadette@orange.fr', '1936-10-27', 'Gerstheim'),
(14, 'M', 'Maurice', 'Rochet', 'marochet@hotmail.fr', '1957-10-29', 'Marchandnec'),
(15, 'M', 'Édouard', 'Pereira', 'ed.pereira@gmail.com', '1964-10-01', 'Vendome');
