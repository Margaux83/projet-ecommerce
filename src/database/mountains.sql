-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 sep. 2019 à 21:16
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mountains`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_user` int(11) DEFAULT NULL,
  `Id_items` int(11) DEFAULT NULL,
  `Num_carte` bigint(20) DEFAULT NULL,
  `Code_secu` int(11) DEFAULT NULL,
  `ExpiMois` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ExpiAnnee` int(11) DEFAULT NULL,
  `Lieu` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Taille` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  `DateAchat` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `Id_items` (`Id_items`),
  KEY `Id_user` (`Id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=63127 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Sujet` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Message` mediumtext COLLATE utf8_bin NOT NULL,
  `Dateday` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`ID`, `Nom`, `Email`, `Sujet`, `Message`, `Dateday`) VALUES
(40, 'Hebert', 'mh@gmail.com', 'jyfxdgjdgf', 'drrjkghdjthgdkuj', '2019-07-24 13:21:01'),
(38, 'kuxufhgkcfjbhcug', 'jfdfhgxkdrjgh@xdhjg', 'fhbg', 'hxydfygxjdhgfxjdfyg', '2019-07-23 22:42:14'),
(39, 'xjhgfdxgd', 'kcbfxckx@hjjgwydgshf', 'dlrthdtf', 'drthdtdujfyufty', '2019-07-23 22:42:34'),
(41, 'xkjdfgkh', 'jchgjchf@xfhggfhd', 'jhgvjghj', 'hnbxvxhcbvh', '2019-07-27 15:00:32'),
(42, 'hyjyugjy', 'ghfjhgy@xfhcfh', 'hjgfjhf', 'ccngncgcnvcbcxvxcx', '2019-07-27 15:02:20'),
(43, 'xhcfth', 'xdfggcffg@cfhcg', 'jkyg', 'jhghfghngy', '2019-07-27 21:55:56'),
(44, 'hfg', 'hfjnhg@hngf', 'hfhfg', 'gjyhg', '2019-07-27 22:16:30'),
(45, 'hgg,', 'hjhgj@hgfjg', 'jghg', 'fgcbgvcng', '2019-07-27 22:31:21'),
(46, 'xjhdgfxhrdg', 'xjdfg@xdjhg', 'jdxf', 'xjhfcv', '2019-07-27 22:43:34'),
(47, 'xkjdgh;', 'xjhjgf@dxfjhg', 'cg', 'xdfdh', '2019-07-30 22:59:01'),
(48, 'xgcfh', 'hkh', 'jyg', 'gvhb', '2019-07-30 23:00:02'),
(49, 'dhbfkhd', 'jhdg@sdjbjf', 'xhdbgf', 'wndvf', '2019-07-31 14:14:59');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `Mdp` varchar(50) COLLATE utf8_bin NOT NULL,
  `Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Adresse` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `Ville` text COLLATE utf8_bin,
  `Pays` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `NumTel` bigint(11) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`ID`, `Nom`, `Prenom`, `Mdp`, `Email`, `Adresse`, `Ville`, `Pays`, `NumTel`, `CP`) VALUES
(1, 'toto2', 'dodo2', '0e698a8ffc1a0af622c7b4db3cb750cc', 'td@gmail.com', '77 rue de l\'Espagne', 'Paris', 'France', 645859547, 75000),
(3, 'xdgdxf', 'wxgvfxh', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL),
(4, 'ggg', 'ggg', 'c1ebb4933e06ce5617483f665e26627c', 'gggg@gggg', '45 rue de la France', 'Paris', 'France', 646759547, 75000),
(23, 'fhchghf', 'hgvnhgvjhv', 'e61e7de603852182385da5e907b4b232', 'hghvjgh@jhgffh', NULL, NULL, NULL, NULL, NULL),
(58, 'sdxg5454', 'dghf452', 'd1ffa92c2b3579521ecce4df5a5d206d', 'wsdfw@wsdf', NULL, NULL, NULL, NULL, NULL),
(59, 'dfhf', 'sdgsd', '4c35abffe1cec5e9b16189fc0ebff34e', 'dgx@dfhg', NULL, NULL, NULL, NULL, NULL),
(60, 'xfgx', 'wfdgdx', '61c372084dec77fcb8ffb4d7d7e15f7c', 'sdgsgs@qsf', NULL, NULL, NULL, NULL, NULL),
(61, 'xfgx', 'wfdgdx', '61c372084dec77fcb8ffb4d7d7e15f7c', 'sdgsgs@qsf', NULL, NULL, NULL, NULL, NULL),
(62, 'kjxfgj', 'xcfbsddf', 'b996ab4da80a3a97c815f3f44a633288', 'dkfjgn@xfgh', NULL, NULL, NULL, NULL, NULL),
(63, 'xgfx', 'xfgxgx', '9b69423da36153e9fb44e15ec862e23b', 'xfg@sg', NULL, NULL, NULL, NULL, NULL),
(64, 'cbcfg6543', 'dxgxfg54', '549cf28d38296737a181bfa8b6c87346', 'xgd@xgh', NULL, NULL, NULL, NULL, NULL),
(65, '24', '25454', 'b996ab4da80a3a97c815f3f44a633288', 'sdfg@ssdgf', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(30) COLLATE utf8_bin NOT NULL,
  `Couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  `Sexe` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Prix` float NOT NULL,
  `Image1` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `Image2` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `Image3` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `Image4` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `Solde` tinyint(1) NOT NULL,
  `Prix_solde` int(11) DEFAULT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Titre` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID`, `Categorie`, `Couleur`, `Sexe`, `Prix`, `Image1`, `Image2`, `Image3`, `Image4`, `Solde`, `Prix_solde`, `Description`, `Titre`) VALUES
(1, 'T-shirt', 'Noir', 'Homme', 8, 'images/white-t-shirt-front.jpg', 'images/White-t-shirt-back.jpg', 'images/white-t-shirt-front2.jpg', 'images/white-t-shirt-back2.jpg\r\n', 1, 16, 'T-shirt blanc en coton.\r\nLe mannequin porte un article de taille M.\r\nLe tissu est en coton.', 'T-shirt blanc'),
(2, 'T-shirt', 'Rouge', 'Homme', 15, 'images/red-t-shirt-front.jpg', 'images/red-t-shirt-back.jpg', 'images/red-t-shirt-front2.jpg', 'images/red-t-shit-back2.jpg', 0, NULL, 'T-shirt rouge homme.\r\nLe mannequin porte un article de taille L.\r\nLe tissu est en coton.', 'T-shirt rouge'),
(3, 'T-shirt', 'Gris', 'Homme', 15, 'images/grey-t-shirt-front.jpg', 'images/grey-t-shirt-back.jpg', 'images/grey-t-shirt-front2.jpg', 'images/grey-t-shirt-zoom.jpg', 0, NULL, 'T-shirt gris homme.\r\nLe mannequin porte un article de taille L.\r\nLe tissu est en coton', 'T-shirt gris'),
(4, 'T-shirt', 'Bleu', 'Homme', 17, 'images/blue-t-shirt-front.jpg', 'images/blue-t-shirt-back.jpg', 'images/blue-t-shirt-front2.jpg', 'images/blue-t-shirt-back2.jpg', 0, NULL, 'T-shirt bleu homme.\r\nLe mannequin porte un article de taille L.\r\nLe tissu est en coton', 'T-shirt bleu'),
(5, 'Pantalon', 'Noir', 'Homme', 25, 'images/Black-pantalon-front.jpg', 'images/Black-pantalon-side.jpg', 'images/Black-pantalon-front2.jpg', NULL, 0, NULL, 'Pantalon noir homme en coton.', 'Pantalon noir'),
(6, 'Pantalon', 'Beige', 'Homme', 20, 'images/Beige-pantalon-front.jpg', 'images/Beige-pantalon-front2.jpg', NULL, NULL, 1, 30, 'Pantalon beige homme en coton.', 'Pantalon beige'),
(7, 'Chaussures', 'Noir', 'Homme', 26, 'images/Black-chaussures-side.jpg', 'images/Black-chaussures-side2.jpg', NULL, NULL, 1, 40, 'Chaussures noires hommes en cuir.', 'Chaussures noires'),
(8, 'Chaussures', 'Blanches', 'Homme', 30, 'images/Chaussures-adidas-side.jpg', 'images/Chaussure-adidas-back.jpg', 'images/Chaussures-adidas-side2.jpg', NULL, 1, 45, 'Chaussures Adidas homme blanches avec les bandes noires.', 'Chaussures Adidas'),
(9, 'Accessoire', 'Noir', NULL, 50, 'images/Black-montre.jpg', '', NULL, NULL, 0, NULL, 'Montre noire unisexe.', 'Montre noire'),
(10, 'Accessoire', 'Doré', NULL, 55, 'images/Montre-front.jpg', NULL, NULL, NULL, 0, NULL, 'Montre dorée unisexe.', 'Montre dorée'),
(11, 'Accessoire', 'Noir', NULL, 10, 'images/bracelet-unisex2.jpg', NULL, NULL, NULL, 0, NULL, 'Bracelet noir unisexe.', 'Bracelet noir'),
(12, 'Accessoire', 'Doré', NULL, 17, 'images/Bracelet-unisex.jpg', NULL, NULL, NULL, 0, NULL, 'Bracelet noir et doré unisexe.', 'Bracelet bicolor'),
(13, 'T-shirt', 'Noir', 'Femme', 8, 'images/black-t-shirt-femme-front.jpg', 'images/black-t-shirt-femme-front2.jpg', NULL, NULL, 1, 15, 'T-shirt noir femme en coton.', 'T-shirt noir'),
(14, 'T-shirt', 'Blanc', 'Femme', 15, 'images/white-t-shirt-femme-front.jpg', 'images/white-t-shirt-femme-front2.jpg', NULL, NULL, 0, NULL, 'T-shirt blanc femme en coton.', 'T-shirt blanc'),
(15, 'Pantalon', 'Bleu', 'Femme', 24, 'images/Blue-jean-front.jpg', '', NULL, NULL, 0, NULL, 'Pantalon jean bleu femme.', 'Pantalon bleu'),
(16, 'Pantalon', 'Noir', 'Femme', 30, 'images/black-pantalon-femme.jpg', NULL, NULL, NULL, 0, NULL, 'Pantalon noir femme en coton.', 'Pantalon noir'),
(17, 'Chaussures', 'Bleu', 'Femme', 32, 'images/blue-chaussures-femme-side.jpg', NULL, NULL, NULL, 1, 45, 'Chaussures bleues talons hauts femme.', 'Chaussures Bleues'),
(18, 'Chaussures', 'Rouge', 'Femme', 45, 'images/red-chaussures-femme-side.jpg', 'images/red-chaussures-femme-side2.jpg', NULL, NULL, 0, NULL, 'Chaussures rouges talons hauts femme.', 'Chaussures rouges');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_items` int(11) NOT NULL,
  `Taille` varchar(20) COLLATE utf8_bin NOT NULL,
  `Quantite` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Id_items` (`Id_items`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID`, `Id_items`, `Taille`, `Quantite`) VALUES
(47, 1, 'S', 1);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_items` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Id_items` (`Id_items`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `Id_items`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
