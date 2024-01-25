-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 jan. 2024 à 15:10
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonnerep`
--

CREATE TABLE `bonnerep` (
  `id` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id` int(11) NOT NULL,
  `content_url` varchar(255) DEFAULT NULL,
  `content_text` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `content_url`, `content_text`, `type`, `id_matiere`) VALUES
(1, 'http://localhost/emakotech/part of speech', 'part of speech', 'Facultatif', 1);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `content_url` varchar(255) DEFAULT NULL,
  `content_text` text DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`id`, `nom`, `content_url`, `content_text`, `id_matiere`) VALUES
(1, 'evaluation de fin de semestre anglais ', 'https://www.udemy.com/', 'adjectives and nouns: give the meaning of an adjective and it\'s equivalent noun', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `id_niveau` int(11) DEFAULT NULL,
  `coefficient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `id_niveau`, `coefficient`) VALUES
(1, 'Anglais', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `nom`, `num`) VALUES
(1, 'licence en gestion de ressources humaines', 'LGRH');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note` float DEFAULT NULL,
  `id_examen` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `reponse1` varchar(255) DEFAULT NULL,
  `reponse2` varchar(255) DEFAULT NULL,
  `reponseb` varchar(255) DEFAULT NULL,
  `id_examen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`id`, `question`, `reponse1`, `reponse2`, `reponseb`, `id_examen`) VALUES
(1, 'what of these is  a part of speech?', 'animal', 'orange', 'noun', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `questions` text DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `date_naiss` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_niveau` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `name`, `matricule`, `surname`, `date_naiss`, `sexe`, `religion`, `email`, `id_niveau`, `password`, `image`) VALUES
(2, 'kowo', 'KIA--09-18-201', 'Elie Makoda', '2003-03-27', 'Feminin', 'Chretien', 'eliemakakowo@gmail.com', '1', '$2y$10$cPGGw7UAGXrii/ENXHjdyu.4qo.PAegEtt7NAHSJFvLyx7yezHhSG', 'img cv.jpg'),
(4, 'kowo', 'KIA--58-47-477', 'Elie Makoda', '5522-02-14', 'Feminin', 'Chretien', 'eliemakodakowo@gmail.com', '1', '$2y$10$y1q7cGJGenQSoyMHHxJEk.Zt11pvAPyeTBJVQAabRxzYlJbbBG4fG', 'img cv.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `first_login` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL DEFAULT 'user-5.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `first_login`, `image`) VALUES
(1, 'eliemakodakowo@gmail.com', '$2y$10$6p7VAuzEiFdtAV7WYZIzsOoEzcBDd75rGYP7DFIkSkGSi0fohu9mi', 'Elie makoda', '2024-01-24', 'img cv.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonnerep`
--
ALTER TABLE `bonnerep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_niveau` (`id_niveau`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bonnerep`
--
ALTER TABLE `bonnerep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bonnerep`
--
ALTER TABLE `bonnerep`
  ADD CONSTRAINT `bonnerep_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `bonnerep_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `chapitre_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`),
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `note_ibfk_4` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `examen` (`id`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `reponses_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
