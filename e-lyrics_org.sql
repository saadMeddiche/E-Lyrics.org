-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 jan. 2023 à 17:34
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-lyrics.org`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `ID_Album` int(11) NOT NULL,
  `Name_Album` varchar(50) NOT NULL,
  `ID_Artist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`ID_Album`, `Name_Album`, `ID_Artist`) VALUES
(1, 'happy', 1),
(2, 'Sad', 1),
(3, 'Life', 2),
(4, 'Normal', 3);

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE `artists` (
  `ID_Artist` int(11) NOT NULL,
  `Name_Artist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`ID_Artist`, `Name_Artist`) VALUES
(1, 'Happy Man'),
(2, 'Life Man'),
(3, 'Normal Man');

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE `songs` (
  `ID_Song` int(11) NOT NULL,
  `Name_Song` varchar(50) NOT NULL,
  `Words_Song` varchar(1000) NOT NULL,
  `ID_Album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`ID_Song`, `Name_Song`, `Words_Song`, `ID_Album`) VALUES
(1, 'happy World', 'Happy World Happy World Happy World Happy World\r\nHappy World Happy World Happy World Happy World ', 1),
(2, 'Sad World', 'Sad World Sad World Sad World Sad World Sad World\r\nSad World Sad World Sad World Sad World Sad World\r\nSad World Sad World Sad World Sad World Sad World\r\nSad World Sad World Sad World Sad World Sad World\r\nSad World Sad World Sad World Sad World Sad World\r\nSad World Sad World Sad World Sad World Sad World', 2),
(3, 'Bad World', 'Bad World Bad World Bad World Bad World Bad World\r\nBad World Bad World Bad World Bad World Bad World\r\nBad World Bad World Bad World Bad World Bad World\r\nBad World Bad World Bad World Bad World Bad World\r\nBad World Bad World Bad World Bad World Bad World', 2),
(5, 'normal life', 'normal life normal life normal life normal life normal life normal life normal life normal life\r\nnormal life normal life normal life', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `Name_User` varchar(100) NOT NULL,
  `Email_User` varchar(500) NOT NULL,
  `Password_User` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_User`, `Name_User`, `Email_User`, `Password_User`) VALUES
(1, 'Saad Meddiche', 'saad2004@gmail.com', 'saad2004'),
(2, 'Kamal Janin', 'Kamal2003@gmail.com', 'Kamal2003');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`ID_Album`);

--
-- Index pour la table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ID_Artist`);

--
-- Index pour la table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`ID_Song`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `ID_Album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `artists`
--
ALTER TABLE `artists`
  MODIFY `ID_Artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `songs`
--
ALTER TABLE `songs`
  MODIFY `ID_Song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
