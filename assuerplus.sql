-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 mai 2023 à 22:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `assuerplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `image_sinister`
--

CREATE TABLE `image_sinister` (
  `sinister_id` int(11) NOT NULL,
  `nom` varchar(300) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image_sinister`
--

INSERT INTO `image_sinister` (`sinister_id`, `nom`, `image`) VALUES
(25, 'image_6461155e79bfa.jpg', './imagesimage_6461155e79bfa.jpg'),
(26, 'image_646115b65ea52.jpg', './imagesimage_646115b65ea52.jpg'),
(31, 'image_646119a6e5f0a.png', './imagesimage_646119a6e5f0a.png'),
(32, 'image_646119ddc6a43.png', './imagesimage_646119ddc6a43.png'),
(45, 'icons8-fichier-64 (1).png', './images/images sinistresimage_64611e744b428.png'),
(46, 'icons8-fichier-64 (1).png', './images/images sinistresimage_64611f7d0c9c8.png'),
(47, 'icons8-utilisateur-80.png', './images/images sinistresimage_64611f999c1ee.png'),
(48, 'icons8-utilisateur-50.png', './images/images sinistresimage_64611fe6e93e3.png'),
(49, 'icons8-utilisateur-50.png', './images/images sinistresimage_64611ffcf36fb.png'),
(67, 'photo_pap-removebg-preview.png', './images/images sinistresimage_646129cbe4b60.png'),
(69, 'icons8-utilisateur-80.png', './images/images sinistresimage_64612aca2572d.png'),
(72, 'icons8-fichier-64.png', './images/images sinistresimage_64612b992367b.png'),
(73, 'icons8-fichier-64.png', './images/images sinistresimage_64612c34ebec2.png'),
(74, 'icons8-serveur-96.png', './images/images sinistresimage_6461344ca7872.png'),
(75, 'Ellipse 2.png', './images/images sinistresimage_646134ffeb3f2.png'),
(76, 'icons8-laptop-and-iphone-x-50.png', './images/images sinistres/image_646135ff21c4a.png'),
(77, 'icons8-laptop-and-phone-64.png', './images/images sinistres/image_6461368c1dd8d.png'),
(77, 'icons8-serveur-80.png', './images/images sinistres/image_6461368c1eb44.png'),
(78, 'zerezr_rzerezrze_78_646137e3b46a9.png', './images/images sinistres/image_646137e3b3e06.png'),
(79, 'zerzer_erezr_79_6461396a65f4f.png', './images/images sinistres/zerzer_erezr_79_6461396a63d7b.png'),
(79, 'zerzer_erezr_79_6461396a66a89.png', './images/images sinistres/zerzer_erezr_79_6461396a65559.png'),
(80, 'zerzer_zerzer_80_64613b0de2345.png', './images/images sinistres/zerzer_zerzer_80_64613b0de0e97.png'),
(80, 'zerzer_zerzer_80_64613b0de2eae.png', './images/images sinistres/zerzer_zerzer_80_64613b0de1b06.png'),
(81, 'RZEREZR_qRFZSQDRFEZ_81_64613b5216c10.png', './images/images sinistres/RZEREZR_qRFZSQDRFEZ_81_64613b5216240.png'),
(82, 'ararza_arazra_82_64613b8a47891.png', './images/images sinistres/ararza_arazra_82_64613b8a47059.png'),
(83, 'zerezrze_erzer_83_64613cc530b53.png', './images/images sinistres/zerezrze_erzer_83_64613cc52fa0d.png'),
(84, 'erterte_erterter_84_64613e2356a5c.png', './images/images sinistres/erterte_erterter_84_64613e2354896.png'),
(85, 'sdfdsf_dfdsf_85_64613f3f84034.png', './images/images sinistres/sdfdsf_dfdsf_85_64613f3f82130.png');

-- --------------------------------------------------------

--
-- Structure de la table `sinister`
--

CREATE TABLE `sinister` (
  `id_sinister` int(11) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `adress` text NOT NULL,
  `phone` int(10) NOT NULL,
  `driver_firstname` text NOT NULL,
  `driver_lastname` text NOT NULL,
  `car_registration` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(3000) NOT NULL,
  `thirdparty` text NOT NULL,
  `witness` text NOT NULL,
  `picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sinister`
--

INSERT INTO `sinister` (`id_sinister`, `user_firstname`, `user_lastname`, `adress`, `phone`, `driver_firstname`, `driver_lastname`, `car_registration`, `date`, `description`, `thirdparty`, `witness`, `picture`) VALUES
(1, '', '', '', 0, '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_connexion`
--

CREATE TABLE `user_connexion` (
  `id_user` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_connexion`
--

INSERT INTO `user_connexion` (`id_user`, `login`, `password`, `email`) VALUES
(1, 'test123', 'test123', 'test@test.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sinister`
--
ALTER TABLE `sinister`
  ADD PRIMARY KEY (`id_sinister`);

--
-- Index pour la table `user_connexion`
--
ALTER TABLE `user_connexion`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sinister`
--
ALTER TABLE `sinister`
  MODIFY `id_sinister` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `user_connexion`
--
ALTER TABLE `user_connexion`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
