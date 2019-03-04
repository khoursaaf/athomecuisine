-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 04 Mars 2019 à 09:54
-- Version du serveur :  5.7.25-0ubuntu0.18.10.2
-- Version de PHP :  7.2.15-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `athomecuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `idAppointment` int(11) NOT NULL,
  `date` date NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idRecipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaryRecipe`
--

CREATE TABLE `commentaryRecipe` (
  `idCommentaryRecipe` int(11) NOT NULL,
  `commentRecipe` varchar(255) NOT NULL,
  `gradeRecipe` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `idRecipe` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaryUser`
--

CREATE TABLE `commentaryUser` (
  `idCommentUser` int(11) NOT NULL,
  `commentUser` text NOT NULL,
  `grade` int(11) NOT NULL,
  `dateCommentUser` datetime NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `imageRecipe`
--

CREATE TABLE `imageRecipe` (
  `idImageRecipe` int(11) NOT NULL,
  `imageRecipe` varchar(50) NOT NULL,
  `idRecipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `idIngredients` int(11) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `idRecipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`idIngredients`, `ingredients`, `idRecipe`) VALUES
(46, 'dfgr', 13),
(47, 'ergre', 13),
(48, 'ergre', 13),
(50, 'Ã©zerf', 16),
(61, 'zertyk', 20),
(62, 'Ã©&quot;\'(-Ã¨_Ã§', 20),
(64, 'un choux', 22),
(65, 'de l\'aeu', 22);

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `idRecipe` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipe`
--

INSERT INTO `recipe` (`idRecipe`, `name`, `description`, `difficulty`, `price`, `idUser`) VALUES
(13, 'choux a la creme', 'De delicieux choux a la creme fouette de marbre blanc', 0, 0, NULL),
(16, '&quot;erty', 'Ã©&quot;e\'r(t-y', 0, 0, NULL),
(20, 'test', 'jkfeh', 0, 0, 3),
(22, 'Valentin', 'une chouette recette de mort', 3, 15, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`idRole`, `role`) VALUES
(1, 'admin'),
(2, 'modo'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

CREATE TABLE `step` (
  `idStep` int(11) NOT NULL,
  `step` text NOT NULL,
  `idRecipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `step`
--

INSERT INTO `step` (`idStep`, `step`, `idRecipe`) VALUES
(32, 'zezerv', 13),
(33, 'zvzervzer', 13),
(34, 'zefzefz', 13),
(35, 'etfghj', 16),
(36, 'dfgh', 16),
(37, 'azertyu', 16),
(38, 'azerty', 16),
(39, 'azerty', 16),
(40, 'couper les choux', 16),
(41, 'mettre de leau', 16),
(42, 'arretr', 16),
(46, '&quot;\'(-Ã¨_Ã§Ã )', 20),
(47, 'Ã©&quot;\'(-Ã¨_Ã§Ã ', 20),
(48, 'Ã©&quot;\'(-Ã¨_Ã§Ã )', 20),
(49, 'couper l\'eau', 22);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(65) NOT NULL,
  `password` char(65) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(65) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `token` varchar(65) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `password`, `mail`, `address`, `phone`, `image`, `token`, `active`, `dateCreation`, `idRole`) VALUES
(3, 'lulu', '$2y$10$FrNZcYcsZi1KZ8acblBmGOt8vUIDp9qVjwTNKPiX/0V81BfUR78a.', 'lulu@gmail.com', 'test', '244896654', NULL, NULL, NULL, '2019-02-24 15:26:29', 2),
(11, 'khoursa', '$2y$10$GzkWI0Rj5o7zg90Aa25Uy.p9EjDjHNwcDV.ZKAM0vk.Le2ojswTfu', 'khoursa@gmail.com', '23 rue ethel et julius Rosenberg', '778541015', NULL, NULL, NULL, '2019-02-26 20:26:43', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`idAppointment`),
  ADD KEY `appointment_users_FK` (`idUser`),
  ADD KEY `appointment_recipe0_FK` (`idRecipe`);

--
-- Index pour la table `commentaryRecipe`
--
ALTER TABLE `commentaryRecipe`
  ADD PRIMARY KEY (`idCommentaryRecipe`),
  ADD KEY `commentaryRecipe_recipe_FK` (`idRecipe`),
  ADD KEY `commentaryRecipe_users_FK` (`idUser`);

--
-- Index pour la table `commentaryUser`
--
ALTER TABLE `commentaryUser`
  ADD PRIMARY KEY (`idCommentUser`),
  ADD KEY `commentaryUser_users_FK` (`idUser`);

--
-- Index pour la table `imageRecipe`
--
ALTER TABLE `imageRecipe`
  ADD PRIMARY KEY (`idImageRecipe`),
  ADD KEY `imageRecipe_recipe_FK` (`idRecipe`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`idIngredients`),
  ADD KEY `ingredients_recipe_FK` (`idRecipe`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`idRecipe`),
  ADD KEY `recipe_users_FK` (`idUser`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`idStep`),
  ADD KEY `step_recipe_FK` (`idRecipe`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `users_role_FK` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `idAppointment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaryRecipe`
--
ALTER TABLE `commentaryRecipe`
  MODIFY `idCommentaryRecipe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaryUser`
--
ALTER TABLE `commentaryUser`
  MODIFY `idCommentUser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `imageRecipe`
--
ALTER TABLE `imageRecipe`
  MODIFY `idImageRecipe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `idIngredients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `idRecipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `step`
--
ALTER TABLE `step`
  MODIFY `idStep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_recipe0_FK` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`idRecipe`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaryRecipe`
--
ALTER TABLE `commentaryRecipe`
  ADD CONSTRAINT `commentaryRecipe_recipe_FK` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`idRecipe`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaryRecipe_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaryUser`
--
ALTER TABLE `commentaryUser`
  ADD CONSTRAINT `commentaryUser_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `imageRecipe`
--
ALTER TABLE `imageRecipe`
  ADD CONSTRAINT `imageRecipe_recipe_FK` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`idRecipe`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_recipe_FK` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`idRecipe`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE SET NULL;

--
-- Contraintes pour la table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `step_recipe_FK` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`idRecipe`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_FK` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
