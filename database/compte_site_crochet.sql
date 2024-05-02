-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 mai 2024 à 11:15
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte_site_crochet`
--

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `NomRole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `NomRole`) VALUES
(1, 'Admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_User` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_User`, `username`, `email`, `password`, `createdAt`, `idRole`) VALUES
(17, 'Timothee', 'timotheecresson@hotmail.fr', '$2y$10$GnzgQKzaukxe1nNpOdXzzeNkVqeMb/t3hwUVsfphkwGObA0YzmU5W', '2024-01-20 12:07:23', 1),
(48, 'juju', 'juju@hotmail.fr', '$2y$10$E.FCzbQdbFXxCDnY5eIcfuHdWtfFtACOCqP1VuNJ9UV07guPLaMBu', '2024-02-23 12:18:00', 2),
(52, 'amael', 'amael@hotmail.fr', '$2y$10$nOv5sLbF2vPkd1MhLe6zBOE.jn.s6WsX/VreT0RFqFYQrnCdnG1YK', '2024-02-27 16:15:20', 2),
(54, 'jean', 'jean@hotmail.fr', '$2y$10$OoCoTDunBMa9brOdvTDS1.RML2unbWhgFWZeRtdMDeyAV8kImuo0.', '2024-02-27 16:20:04', 2),
(61, 'loic', 'loic@hotmail.fr', '$2y$10$xx11zMRo7Vxu9xZmxQ7lbuMdoQFJhhGqbl.qKDwOm3E7yCJ9LWKf2', '2024-02-27 16:33:09', 1),
(63, 'amael', 'amael@gmail.com', '$2y$10$khVQDKuiGrETcXRBrxvhruMfwk4DSiFH4wo6EDFxcLo0BhAYM17Ga', '2024-03-05 16:02:55', 2),
(64, 'sylvie', 'sylvieC@hotmail.fr', '$2y$10$WkwkeLEv6ESRCbDThsRUnedgkA3V/zZ0xL/f8k.ObmYJr4s.geJCS', '2024-03-05 16:03:37', 2),
(65, 'jean', 'jeant@hotmail.fr', '$2y$10$ngeAu3pxhjYB.LKdWN0n0uLXjN53Xh64lW4Aqm0gvm25.8Rq5wQxK', '2024-03-06 10:32:13', 2),
(66, 'lousi', 'lousi@hotmail.fr', '$2y$10$K87PWagDyfvWa7nkBx1HBelXSECGU5bqIcAwKUk4E3MibjO3eIPWS', '2024-03-06 10:32:59', 2),
(67, 'francis', 'francis@hotmail.fr', '$2y$10$opSxgbRb4zAOLxXc8ktEHuOFF/06oKy4CsJkYbCgDhZoi0zuttvgm', '2024-03-06 14:44:13', 2),
(68, 'sylvie', 'sylvie@hotmail.fr', '$2y$10$CNhgwk9S4wHa6pFcnAZU2eIWCJ2X.You.eqtAjKgoYkm2TVKwqeEa', '2024-03-21 11:14:15', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
