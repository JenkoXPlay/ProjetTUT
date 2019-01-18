-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 18 Janvier 2019 à 14:47
-- Version du serveur :  5.5.49-log
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `creaweb_tut`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation` datetime NOT NULL,
  `last_connexion` datetime NOT NULL,
  `avatar` text NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `ban` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `blockedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annoncesentreprises`
--

CREATE TABLE IF NOT EXISTS `annoncesentreprises` (
  `id` int(11) NOT NULL,
  `entreprise` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `typeAnnonce` varchar(150) NOT NULL,
  `remuneration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(11) NOT NULL,
  `competenceDe` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `id` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `but` text NOT NULL,
  `typeEntreprise` varchar(150) NOT NULL,
  `siret` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL,
  `expDe` int(11) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `anneeDebut` int(4) NOT NULL,
  `anneeFin` int(4) NOT NULL,
  `dureeTotal` varchar(100) NOT NULL,
  `typeContrat` varchar(100) NOT NULL,
  `poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_entreprises`
--

CREATE TABLE IF NOT EXISTS `galerie_entreprises` (
  `id` int(11) NOT NULL,
  `idEntreprises` int(11) NOT NULL,
  `lienPhoto` text NOT NULL,
  `ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE IF NOT EXISTS `loisirs` (
  `id` int(11) NOT NULL,
  `loisirDe` int(11) NOT NULL,
  `nomLoisir` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `maintenanceBy` int(11) NOT NULL,
  `finMaintenance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponsesannonces`
--

CREATE TABLE IF NOT EXISTS `reponsesannonces` (
  `id` int(11) NOT NULL,
  `idAnnoncesEntreprises` int(11) NOT NULL,
  `candidat` int(11) NOT NULL,
  `entreprise` int(11) NOT NULL,
  `datePostuler` datetime NOT NULL,
  `notif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_compte` varchar(50) NOT NULL,
  `departement` int(5) NOT NULL,
  `description` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_last_connexion` datetime NOT NULL,
  `avert` varchar(20) NOT NULL,
  `raison_ban` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `privilege` (`privilege`),
  ADD KEY `ban` (`ban`);

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annoncesentreprises`
--
ALTER TABLE `annoncesentreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprise` (`entreprise`),
  ADD KEY `typeAnnonce` (`typeAnnonce`,`remuneration`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competenceDe` (`competenceDe`,`domaine`,`competence`,`level`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsable` (`responsable`,`nom`,`typeEntreprise`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expDe` (`expDe`,`nomEntreprise`,`anneeDebut`,`anneeFin`,`dureeTotal`,`typeContrat`,`poste`);

--
-- Index pour la table `galerie_entreprises`
--
ALTER TABLE `galerie_entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntreprises` (`idEntreprises`,`ajout`);

--
-- Index pour la table `loisirs`
--
ALTER TABLE `loisirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loisirDe` (`loisirDe`,`nomLoisir`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponsesannonces`
--
ALTER TABLE `reponsesannonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnnoncesEntreprises` (`idAnnoncesEntreprises`,`candidat`,`entreprise`,`datePostuler`),
  ADD KEY `notif` (`notif`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prenom` (`prenom`,`nom`,`email`,`type_compte`,`departement`,`telephone`,`date_creation`,`date_last_connexion`,`avert`,`admin`,`premium`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `annoncesentreprises`
--
ALTER TABLE `annoncesentreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `galerie_entreprises`
--
ALTER TABLE `galerie_entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `loisirs`
--
ALTER TABLE `loisirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reponsesannonces`
--
ALTER TABLE `reponsesannonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
