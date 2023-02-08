-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 jan. 2023 à 18:46
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `generals`
--

DROP TABLE IF EXISTS `generals`;
CREATE TABLE IF NOT EXISTS `generals` (
  `user_sent_id` int DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `generals`
--

INSERT INTO `generals` (`user_sent_id`, `message`, `updated_at`, `created_at`) VALUES
(6, '1', '2022-12-08 20:12:39', '2022-12-08 20:12:39'),
(6, '2', '2022-12-08 20:12:42', '2022-12-08 20:12:42'),
(6, 'AZE', '2022-12-08 20:12:45', '2022-12-08 20:12:45'),
(6, 'AZE', '2022-12-08 20:12:49', '2022-12-08 20:12:49'),
(6, 'AZE', '2022-12-08 20:12:53', '2022-12-08 20:12:53'),
(1, 'AZE', '2022-12-08 20:13:28', '2022-12-08 20:13:28'),
(1, 'ZZ', '2022-12-08 20:13:33', '2022-12-08 20:13:33'),
(1, 'Z', '2022-12-08 20:13:37', '2022-12-08 20:13:37'),
(1, 'ZZ', '2022-12-08 20:13:41', '2022-12-08 20:13:41'),
(1, 'RR', '2022-12-08 20:13:44', '2022-12-08 20:13:44'),
(1, 'R', '2022-12-08 20:13:47', '2022-12-08 20:13:47'),
(9, 'hello world', '2022-12-11 13:05:00', '2022-12-11 13:05:00'),
(1, 'ézzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '2022-12-12 07:39:43', '2022-12-12 07:39:43'),
(1, 'yo !', '2022-12-12 08:39:22', '2022-12-12 08:39:22'),
(1, 'salut', '2022-12-12 08:44:38', '2022-12-12 08:44:38'),
(11, 'SALUT TOUT LE MONDE', '2022-12-12 08:48:01', '2022-12-12 08:48:01');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `user_send_id` int DEFAULT NULL,
  `user_receive_id` int DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`user_send_id`, `user_receive_id`, `message`, `updated_at`, `created_at`) VALUES
(6, 1, 'Coucou toi !', '2022-12-08 14:07:58', '2022-12-08 14:07:58'),
(7, 6, 'Salut', '2022-12-08 14:09:14', '2022-12-08 14:09:14'),
(6, 7, 'Salut ça va ?', '2022-12-08 14:09:53', '2022-12-08 14:09:53'),
(6, 7, 'Ca va ...?', '2022-12-08 18:38:31', '2022-12-08 18:38:31'),
(9, 1, 'SALUT ADMIN', '2022-12-11 13:06:18', '2022-12-11 13:06:18'),
(10, 9, 'salut AA', '2022-12-11 13:09:38', '2022-12-11 13:09:38'),
(9, 10, 'salut ff çava ?', '2022-12-11 13:10:31', '2022-12-11 13:10:31'),
(11, 9, 'Coucou', '2022-12-12 08:47:34', '2022-12-12 08:47:34');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `numero` (`numero`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `numero`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin', '0123456789', 'admin', '$2y$10$s16tInRqGSwFAL3CCSpW0OCo7LtTM2O3QlkEfq4GLBGLzE4uh28OS', 'admin'),
(10, 'F', 'Fa', 'FF@mail.com', '013423452', 'ff&', '$2y$10$E86muZlNWjkk1jyAz5WgI.aTGEQzCrdiPHOhs27rAPepfZdcusJOq', 'user'),
(9, 'AA', 'ab', 'AA@gmail.fr', '012345678', 'aa', '$2y$10$Z1GbjICm/yS4FU7j5jsXzuRf4fWwRT/vuIi3X6JgMdNewlzLQ2iLW', 'user'),
(11, 'AB', 'aa', 'AB@gmail.com', '0123456', 'ab', '$2y$10$GM/nZxUrm6eJFjXtwLxOxuo52K.79qqTdvFDbXmrXd2Lp79E/1AI6', 'user'),
(12, 'AC', 'aC', 'AC@gmail.com', '0123465789', 'Acc', '$2y$10$nAM..3DGkUK2/NBQUBrL5uJBGT72.8MK.yD/5KdoCVyX0KGIbrOQ.', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
