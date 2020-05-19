-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 17 mai 2020 à 20:39
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `instagram`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `image_id`, `user_id`, `comment`) VALUES
(5, 9, 83, 'blabla\r\n'),
(6, 9, 83, 'blabla'),
(7, 11, 83, 'hghb'),
(8, 10, 83, 'rgdfg'),
(9, 9, 83, 'gdfgf'),
(10, 11, 83, 'hello'),
(11, 11, 83, '12'),
(12, 13, 83, 'jdskbs'),
(13, 13, 83, 'efjgdn');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `user_id`, `description`, `created_at`, `img_path`) VALUES
(9, 83, '', '2020-05-14 12:15:03', '/upload-profil/QuickDBD-Free Diagram.png'),
(10, 83, '', '2020-05-15 16:27:32', '/upload-profil/gif.gif'),
(11, 83, '', '2020-05-15 16:43:35', '/upload-profil/ee897a52dfd86f2748569227a48cc16b.jpg'),
(12, 84, '', '2020-05-15 16:44:50', '/upload-profil/Capturepoleemploi.jpg'),
(13, 83, 'logo iracing', '2020-05-17 12:37:15', '/upload-profil/Partner-iracing-new.png');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `img_id`, `user_id`) VALUES
(1, 9, 84),
(3, 9, 84),
(4, 9, 84),
(5, 9, 84),
(6, 9, 84),
(7, 9, 84),
(8, 9, 84),
(9, 9, 84),
(10, 9, 84),
(11, 9, 84),
(12, 10, 84),
(13, 9, 83),
(14, 9, 83),
(15, 9, 83),
(16, 10, 83),
(17, 9, 83),
(18, 9, 83),
(19, 9, 83),
(20, 9, 83);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `lastname`, `firstname`, `phone`) VALUES
(83, 'anto06', '$2y$10$FjFIl8a3nAAV72aY/RNvqOQBwFGGob2HCwkFxsKHy3nIefxQ/Ywtq', 'avon.antonin@gmail.com', 'avon.antonin@gmail.com', 'ANTONIN', '0698220698'),
(84, 'anto09', '$2y$10$4GOVp4VDPvMuZ9FC6EkzPuBT/oY8jQouwDqWIbGaPUQrkmywV5I5C', 'avon.antonin@gmail.com', 'avon.antonin@gmail.com', 'ANTONIN', '0698220698');

-- --------------------------------------------------------

--
-- Structure de la table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `url_user` varchar(255) DEFAULT NULL,
  `img_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `description`, `localisation`, `url_user`, `img_profil`) VALUES
(25, 83, 'dqd', 'qzd', 'http://plop.com', '/upload/code.jpg'),
(26, 84, 'zqdqz', 'qzdqzd', 'http://dzqd.com', '/upload/ee897a52dfd86f2748569227a48cc16b.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
