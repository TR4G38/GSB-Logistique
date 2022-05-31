-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 avr. 2022 à 16:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetgsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `ville_client` varchar(50) NOT NULL,
  `cp_client` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `prenom_client`, `ville_client`, `cp_client`, `telephone`) VALUES
(1, 'Melanchon', 'Jean-Luc', 'Paris', 91000, 659877638),
(2, 'Varchar', 'Pauline', 'Lyon', 69000, 666666666);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `etat_commande` varchar(255) NOT NULL,
  `num_rue` int(11) NOT NULL,
  `nom_rue` varchar(100) NOT NULL,
  `ville_commande` varchar(50) NOT NULL,
  `cp_commande` int(11) NOT NULL,
  `date_livrVoulu` date NOT NULL,
  `date_livr` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_entrepot` int(11) NOT NULL,
  `contenu_commandes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `commandes_clients0_FK` (`id_client`),
  KEY `commandes_entrepot1_FK` (`id_entrepot`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `etat_commande`, `num_rue`, `nom_rue`, `ville_commande`, `cp_commande`, `date_livrVoulu`, `date_livr`, `id_client`, `id_entrepot`, `contenu_commandes`) VALUES
(1, 'En cours', 2, 'rue des magnolias', 'lyon', 69007, '2021-12-15', '2021-12-16', 1, 1, 'testhdnudbn'),
(2, 'Non pris en compte actuellement', 20, 'Rue de paris', 'Bordeaux', 33000, '2021-12-09', '2021-12-16', 1, 1, '878 Pansements, 69 Masques à oxygènes'),
(3, 'Done', 33, 'Rue de montparnasse', 'Lille', 59000, '2021-12-17', '2021-12-21', 2, 1, '6 000 Alimemazine, 28 000 Alverine'),
(4, 'Done', 28, 'Rue Campanil', 'Saint Galmier', 42330, '2022-04-23', '2022-04-23', 1, 1, '97 000 Alprazolam, 860 Cetirizine'),
(5, 'Done', 37, 'Paul Berge', 'Veauche', 43290, '2022-05-19', '2022-05-21', 1, 1, '279 999 Haloperidol, 63 000 Flavoxate'),
(6, 'En cours', 86, 'Rue Pasteur', 'Saint-Ferreol', 97006, '2022-06-28', '2022-07-01', 2, 1, '35 499 Paliperidone, 28 Ranitidine');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_employe` varchar(50) NOT NULL,
  `prenom_employe` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_entrepot` int(11) NOT NULL,
  PRIMARY KEY (`id_employe`),
  UNIQUE KEY `employes_users0_AK` (`id_user`),
  KEY `employes_entrepot2_FK` (`id_entrepot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

DROP TABLE IF EXISTS `entrepot`;
CREATE TABLE IF NOT EXISTS `entrepot` (
  `id_entrepot` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entrepot` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_entrepot`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entrepot`
--

INSERT INTO `entrepot` (`id_entrepot`, `nom_entrepot`) VALUES
(1, 'GSB_Logistique');

-- --------------------------------------------------------

--
-- Structure de la table `etat_commandes`
--

DROP TABLE IF EXISTS `etat_commandes`;
CREATE TABLE IF NOT EXISTS `etat_commandes` (
  `id_etat_comm` int(50) NOT NULL AUTO_INCREMENT,
  `etat_commande` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_comm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
(1, 'superviseur'),
(2, 'livreur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_role` int(11) NOT NULL,
  `desactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `users_role_AK` (`id_role`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `created_at`, `id_role`, `desactive`) VALUES
(6, 'bloque', 'test', '2022-04-09 18:50:16', 2, 1),
(9, 'test', '$2y$10$n6M.ICKBOp0Gn5RzBjaboedhRUGmtX5RoY6pXkq9dkm48XfxmzJr2', '2021-12-07 18:12:14', 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_clients0_FK` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `commandes_entrepot1_FK` FOREIGN KEY (`id_entrepot`) REFERENCES `entrepot` (`id_entrepot`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_entrepot2_FK` FOREIGN KEY (`id_entrepot`) REFERENCES `entrepot` (`id_entrepot`),
  ADD CONSTRAINT `employes_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
