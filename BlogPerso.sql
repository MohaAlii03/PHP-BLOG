-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 25 fév. 2024 à 18:04
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BlogPerso`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `ID_admin` int(11) NOT NULL,
  `ID_utilisateur` int(11) DEFAULT NULL,
  `Peut_supprimer_articles` tinyint(1) DEFAULT NULL,
  `Peut_supprimer_utilisateurs` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `ID_article` int(11) NOT NULL,
  `ID_utilisateur` int(11) DEFAULT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `Contenu` text,
  `Date_creation` datetime DEFAULT NULL,
  `Derniere_modification` datetime DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Articles`
--

INSERT INTO `Articles` (`ID_article`, `ID_utilisateur`, `Titre`, `Contenu`, `Date_creation`, `Derniere_modification`, `Image`, `user_id`) VALUES
(16, NULL, 'k;bjkbj', 'khklbln', '2024-02-25 15:33:20', '2024-02-25 15:33:20', '', NULL),
(17, NULL, 'kgkbkllkbn', 'igbjbkkj', '2024-02-25 18:41:05', '2024-02-25 18:41:05', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Articles_Categories`
--

CREATE TABLE `Articles_Categories` (
  `ID_article` int(11) DEFAULT NULL,
  `ID_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `ID_categorie` int(11) NOT NULL,
  `Nom_categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `ID_commentaire` int(11) NOT NULL,
  `ID_utilisateur` int(11) DEFAULT NULL,
  `ID_article` int(11) DEFAULT NULL,
  `Contenu` text,
  `Date_commentaire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `ID_utilisateur` int(11) NOT NULL,
  `Nom_utilisateur` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Est_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`ID_utilisateur`, `Nom_utilisateur`, `Mot_de_passe`, `Email`, `Est_admin`, `role`) VALUES
(7, 'admin', 'admin', 'admin@example.com', 0, 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`ID_admin`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`);

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ID_article`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`);

--
-- Index pour la table `Articles_Categories`
--
ALTER TABLE `Articles_Categories`
  ADD KEY `ID_article` (`ID_article`),
  ADD KEY `ID_categorie` (`ID_categorie`);

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Index pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`ID_commentaire`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`),
  ADD KEY `ID_article` (`ID_article`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `ID_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `Utilisateurs` (`ID_utilisateur`);

--
-- Contraintes pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `Utilisateurs` (`ID_utilisateur`);

--
-- Contraintes pour la table `Articles_Categories`
--
ALTER TABLE `Articles_Categories`
  ADD CONSTRAINT `articles_categories_ibfk_1` FOREIGN KEY (`ID_article`) REFERENCES `Articles` (`ID_article`),
  ADD CONSTRAINT `articles_categories_ibfk_2` FOREIGN KEY (`ID_categorie`) REFERENCES `Categories` (`ID_categorie`);

--
-- Contraintes pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `Utilisateurs` (`ID_utilisateur`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`ID_article`) REFERENCES `Articles` (`ID_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
