-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 avr. 2019 à 15:02
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
-- Base de données :  `creaweb_tut`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation` datetime NOT NULL,
  `last_connexion` datetime NOT NULL,
  `avatar` text NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `ban` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `pseudo` (`pseudo`),
  KEY `privilege` (`privilege`),
  KEY `ban` (`ban`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `password`, `creation`, `last_connexion`, `avatar`, `privilege`, `ban`) VALUES
(3, 'Maxime', '1234', '2019-01-17 00:00:00', '2019-01-11 00:00:00', 'zeazeaze', 'admin', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` tinyint(1) NOT NULL,
  `blockedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annoncesentreprises`
--

DROP TABLE IF EXISTS `annoncesentreprises`;
CREATE TABLE IF NOT EXISTS `annoncesentreprises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `typeAnnonce` varchar(150) NOT NULL,
  `remuneration` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entreprise` (`entreprise`),
  KEY `typeAnnonce` (`typeAnnonce`,`remuneration`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annoncesentreprises`
--

INSERT INTO `annoncesentreprises` (`id`, `entreprise`, `titre`, `description`, `typeAnnonce`, `remuneration`) VALUES
(1, 5, 'Developpeur WEB', 'Vous êtes coeur d une equipe de dev et evoluer en tant que tel', 'Alternance', 1100),
(2, 6, 'Developpeur WEB', 'Vous êtes au coeur d une equipe de dev et evoluer en tant que tel', 'Alternance', 1100),
(3, 7, 'Developpeur WEB Front end', 'Vous êtes motivé et passioné par le web en général et en particulier le front, des connaissance en Back sont un plus', 'stage', 350),
(4, 8, 'Designer', 'Vous êtes force de proposition et créatif.', 'stage', 0),
(5, 9, 'Infirmière', 'dfldfdghffgff', 'Alternance', 1600),
(6, 10, 'WEB designer', 'Vous maitrisez design et developpement', 'Alternance', 1300),
(7, 12, 'Developpement web full stack', 'Recherche de style', 'stage', 0),
(8, 6, 'Designer', 'dfdfgfhfhgf', 'stage', 0),
(9, 7, 'Developpeur WEB', 'Vous êtes coeur d une equipe de dev et evoluer en tant que tel', 'Alternance', 1200),
(10, 11, 'Infirmière', 'dfgdfgfdfdg', 'Alternance', 1300);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competenceDe` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `competenceDe` (`competenceDe`,`domaine`,`competence`,`level`),
  KEY `domaine` (`domaine`),
  KEY `competence` (`competence`,`level`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `competenceDe`, `domaine`, `competence`, `level`) VALUES
(2, 4, 'Design', 'Photoshop', '3'),
(3, 4, 'developpement web', 'Prestashop', '2'),
(10, 5, 'Design', 'Figma', '3'),
(6, 5, 'Design', 'illustrator', '4'),
(8, 5, 'Design', 'InDesign', '3'),
(7, 5, 'Design', 'Photoshop', '3'),
(13, 6, 'developpement web', 'Angular', '5'),
(11, 6, 'developpement web', 'Javascript', '3'),
(12, 6, 'developpment', 'JAVA', '3'),
(15, 9, 'developpement web', 'Laravel', '4'),
(16, 9, 'developpement web', 'ReactJS', '4'),
(14, 9, 'developpement web', 'Symfony', '4'),
(18, 10, 'developpement web', 'Javascript', '4'),
(17, 10, 'developpement web', 'VueJS', '4'),
(19, 11, 'Medecine', 'anesthésie', '3'),
(20, 12, 'Medecine', 'Chirurgie dentiste', '4'),
(21, 13, 'Medecine', 'Urgence', '3'),
(9, 14, 'Design', 'Adobe XD', '5'),
(4, 14, 'developpement web', 'CSS', '3'),
(5, 14, 'developpement web', 'HTML', '4'),
(1, 14, 'developpement web', 'PHP', '3');

-- --------------------------------------------------------

--
-- Structure de la table `competencesannonce`
--

DROP TABLE IF EXISTS `competencesannonce`;
CREATE TABLE IF NOT EXISTS `competencesannonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annonce` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `annonce` (`annonce`),
  KEY `domaine` (`domaine`),
  KEY `competence` (`competence`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competencesannonce`
--

INSERT INTO `competencesannonce` (`id`, `annonce`, `domaine`, `competence`, `level`) VALUES
(1, 2, 'informatique', 'PHP', '4'),
(2, 2, 'informatique', 'HTML', '3'),
(3, 2, 'informatique', 'CSS', '4'),
(4, 2, 'informatique', 'Javascript', '3'),
(5, 2, 'informatique', 'adobe xd', '4'),
(6, 3, 'informatique', 'VueJS', '4'),
(7, 3, 'informatique', 'ReactJS', '4'),
(8, 3, 'informatique', 'Angular', '4'),
(9, 3, 'informatique', 'JS', '4'),
(10, 4, 'Web Design', 'Photoshop', '4'),
(11, 4, 'Web Design', 'InDesign', '4'),
(12, 4, 'Web Design', 'Illustrator', '4'),
(13, 4, 'Web Design', 'Adobe XD', '4'),
(14, 5, 'Médecine', 'Anesthésie', '4'),
(15, 5, 'Médecine', 'Urgences', '4'),
(16, 5, 'Médecine', 'Tromat', '4'),
(17, 6, 'Web Design', 'Photoshop', '4'),
(18, 6, 'Web Design', 'Figma', '4'),
(19, 6, 'Web Design', 'HTML', '4'),
(20, 6, 'Web Design', 'CSS', '4'),
(21, 6, 'Web Design', 'JS', '4'),
(22, 8, 'Web Design', 'Figma', '3'),
(23, 8, 'Web Design', 'Adobe XD', '2'),
(24, 8, 'Web Design', 'Illustrator', '3'),
(25, 9, 'Informatique', 'Wordpress', '3'),
(26, 9, 'Informatique', 'Prestashop', '4'),
(27, 9, 'Informatique', 'Syphony', '5'),
(28, 1, 'Informatique', 'ES6 JS', '3');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

DROP TABLE IF EXISTS `diplomes`;
CREATE TABLE IF NOT EXISTS `diplomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `nom_diplome` text NOT NULL,
  `annee_obtention` varchar(255) NOT NULL,
  `etablissement` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `user`, `nom_diplome`, `annee_obtention`, `etablissement`) VALUES
(1, 1, 'BAC STI2D', '2014', 'Malraux'),
(2, 1, 'BAC STI2D', '2014', 'Malraux'),
(3, 4, 'BAC S', '2015', 'Lycée Pablo Picasso'),
(4, 6, 'License Professionnel Réseaux et télécome', '2018', 'IUT de Béthune'),
(5, 4, 'Licences pro créaweb', '2019', 'IUT de Lens'),
(6, 5, 'BAC pro SEN', '2016', 'Lycée Robespierre'),
(7, 5, 'BTS SN', '2017', 'Lycée Malraux'),
(8, 13, 'Prépa infirmière', '2017', 'CHU Arras'),
(9, 9, 'Licences pro DIOC', '2017', 'IUT de béthune'),
(10, 10, 'Licences MathInfo', '2015', 'Université de Lens'),
(11, 4, 'Diplômes d ingénieur', '2016', 'IG2I'),
(12, 11, 'Diplôme université de médecine', '2012', 'Université de Lille'),
(13, 14, 'BAC S SI', '2013', 'Lycée Andrée Malraux'),
(14, 12, 'Diplôme université de médecine', '2012', 'Université de Lille');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `responsable` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `but` text NOT NULL,
  `typeEntreprise` varchar(150) NOT NULL,
  `siret` text NOT NULL,
  `departement` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `responsable` (`responsable`,`nom`,`typeEntreprise`),
  KEY `typeEntreprise` (`typeEntreprise`),
  KEY `departement` (`departement`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `responsable`, `nom`, `description`, `logo`, `but`, `typeEntreprise`, `siret`, `departement`) VALUES
(5, 1, 'mlklklmkm', 'lmkmlkmk', 'mlkmlkmlklklmk', 'kmklmkmlk', 'pme', 'lmkmkmlk', 59),
(6, 4, 'IBM', 'Best Company', 'ljfksdjlksjlfjl', 'lkjlkjlkjl', 'ge', 'lsjkflsdjkfljlkdsf', 62),
(7, 10, 'JOUVE', 'Imprimerie, Métiers du numérique', 'logo.png', 'Mettre le numériques en avant', 'SII', '122545121', 62),
(8, 5, 'MBS communication', 'dfdfdfd', 'logo.png', 'dfdfd', 'SA', '789961', 59),
(9, 13, 'Hopital de Lens', '', 'logo.png', '', 'Hopital', '1248541', 62),
(10, 15, 'Worldline', 'dfdgd', 'logo.png', 'dfdfgf', 'SA', '89784534', 75),
(11, 11, 'Polyclinique', 'rfgfg', 'logo.png', 'fdfgfg', 'SA', '54654654', 93),
(12, 6, 'GG Style', 'avoir le style', 'logo.png', 'toujours plus de style', 'SI', '4787891561', 93);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expDe` int(11) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `anneeDebut` int(4) NOT NULL,
  `anneeFin` int(4) NOT NULL,
  `dureeTotal` varchar(100) NOT NULL,
  `typeContrat` varchar(100) NOT NULL,
  `poste` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expDe` (`expDe`,`nomEntreprise`,`anneeDebut`,`anneeFin`,`dureeTotal`,`typeContrat`,`poste`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `expDe`, `nomEntreprise`, `ville`, `anneeDebut`, `anneeFin`, `dureeTotal`, `typeContrat`, `poste`) VALUES
(1, 4, 'IBM', 'Lomme', 2018, 2019, '6 mois', 'Contrat Pro', 'Développeur'),
(3, 5, 'JOUVE', 'LENS', 2017, 2017, '6semaines', 'Stage', 'Développeur'),
(4, 9, 'Office du tourisme', 'Douai', 2019, 2019, '16semaines', 'Contrat de professionnalisation', 'Infographiste'),
(5, 6, 'Facem Web', 'Arras', 2015, 2016, '1an', 'Alternance', 'Développeur PHP'),
(6, 6, 'MBS Communication', 'Vimy', 2016, 2017, '6mois', 'Stage', 'Developpeur front end'),
(7, 10, 'office de tourisme', 'Arras', 2017, 2017, '2mois', 'Job été', 'Infographiste'),
(8, 14, 'Kaio', 'Roubaix', 2019, 2019, '3mois', 'Stage', 'Développeur back end'),
(9, 10, 'Viously', 'Tourcoing', 2018, 2019, '1an', 'Contrat de professionalisation', 'Développeur front end'),
(10, 12, 'cabinet orthodonthie', 'Lens', 2018, 2018, '1an', 'CDD', 'Assitante'),
(11, 11, 'hopital de Lens', 'Lens', 2016, 2017, '1an', 'stage', 'infirmière'),
(12, 13, 'Polyclinique de boisbernard', 'boisbernard', 2015, 2015, '6mois', 'stage', 'urgence');

-- --------------------------------------------------------

--
-- Structure de la table `galerie_entreprises`
--

DROP TABLE IF EXISTS `galerie_entreprises`;
CREATE TABLE IF NOT EXISTS `galerie_entreprises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprises` int(11) NOT NULL,
  `lienPhoto` text NOT NULL,
  `ajout` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprises` (`idEntreprises`,`ajout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

DROP TABLE IF EXISTS `loisirs`;
CREATE TABLE IF NOT EXISTS `loisirs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loisirDe` int(11) NOT NULL,
  `nomLoisir` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loisirDe` (`loisirDe`,`nomLoisir`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `loisirs`
--

INSERT INTO `loisirs` (`id`, `loisirDe`, `nomLoisir`, `description`) VALUES
(1, 4, 'Sport', 'Nombreux sport collectifs (football, handball)'),
(2, 4, 'Informatique', 'Réalisation de différents projet perso ex: créaion de mon site web'),
(3, 5, 'Mécanique', 'Réparation de plusieurs véhicule personnel et familial'),
(4, 5, 'Informatique', 'Maintenance informatique(réparation de pc)'),
(5, 14, 'Dessin', 'Réalisation de plusieurs illustrations numériques'),
(6, 11, 'Musique', 'Joue d instrument(guitarre,pianno)'),
(7, 6, 'Jeux vidéo', 'Tournois d E-sport'),
(8, 9, 'Sport', 'Tennis');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` tinyint(1) NOT NULL,
  `maintenanceBy` int(11) NOT NULL,
  `finMaintenance` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `message` text NOT NULL,
  `etat_msg` tinyint(1) NOT NULL,
  `date_msg` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`,`destinataire`,`etat_msg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `sender`, `destinataire`, `message`, `etat_msg`, `date_msg`) VALUES
(1, 1, 1, 'Test de message', 0, '2019-02-02 22:11:27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `premium` tinyint(1) NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prenom` (`prenom`,`nom`,`email`,`type_compte`,`departement`,`telephone`,`date_creation`,`date_last_connexion`,`avert`,`admin`,`premium`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `type_compte`, `departement`, `description`, `telephone`, `date_creation`, `date_last_connexion`, `avert`, `raison_ban`, `admin`, `premium`, `avatar`) VALUES
(4, 'Maxime', 'Lefebvre', 'max@test.com', '$2y$10$BMEL4V9i3cDjYRvoju41t.621x6.PN0O6if7TDkljPl66tRfABPfW', 'etudiant', 62, 'fdsfdsfs', 0, '2019-01-02 00:00:00', '2019-01-24 00:00:00', '0', 'sdsdqsd', 0, 0, 'avatar.jpg'),
(5, 'Albert', 'Pinot', 'lebgdu62@gmail.com', '$2y$10$wm2OEs6TIh3BpQeNS.LNGupvgQeL3RmfIfMyLJOlpWgZW6GeygB.e', 'pro', 0, '', 0, '2019-02-07 13:29:52', '2019-02-07 13:29:52', '0', '', 0, 0, 'avatar.jpg'),
(6, 'Juju', 'Col', 'lesuperbgdu62@gmail.com', '$2y$10$gcIcYJFcjgkpSvEVnweJlef7/v3t1HYripF.35ASjjujDRjTO8Eqa', 'pro', 0, '', 0, '2019-02-07 14:08:46', '2019-02-07 14:08:46', '0', '', 0, 0, 'avatar.jpg'),
(9, 'Maxime', 'Lefebvre', 'maximelefebvre1505@gmail.com', '$2y$10$NUBKgMOJx2oijEflLpYytOXC8YjOgX8A7JhbUYkgQOwlMetcsFKsW', 'etudiant', 62, '', 0, '2019-02-26 12:54:30', '2019-02-26 12:54:30', '0', '', 0, 0, 'avatar.jpg'),
(10, 'Nicolas', 'Paris', 'nicolas.paris_isc.france@ibm.com', '$2y$10$rk5LAKlNElmG621o6hFNLehP.goAybeGVQ.BTDofn8JNyV.MJlM46', 'pro', 59, '', 0, '2019-02-26 12:56:55', '2019-02-26 12:56:55', '0', '', 0, 0, 'avatar.jpg'),
(11, 'Maxime', 'Lefebvre', 'admin@admin.com', '$2y$10$bLav65Dkrxl5Qsscyj9j4uOrRP9gr7bjfUmSGcLwJkNibRl4AXE0S', 'pro', 62, '', 0, '2019-03-08 09:33:23', '2019-03-08 09:33:23', '0', '', 0, 0, 'avatar.jpg'),
(12, 'Gaspard', 'David', 'GD12@hotmail.fr', '$2y$10$kKmP85YLn/9rIxb13BbOl.tyP7MNbPS/rBnZ1Uq7yByptvgjNdUQ2', 'etudiant', 93, 'Je suis quelqu un de curieux et serieux', 321, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0, ''),
(13, 'Jacques', 'Jonquilles', 'jacques.jonquilles@hotmail.fr', '$2y$10$NhpUCRPl10sOhU1/TpWKjuPPbxQkoyOxzC3/NjtIdrnm8Gr6FTMwm', 'pro', 62, 'J aime le developpement dans toute sa forme', 651577311, '2019-03-15 10:54:13', '2019-03-15 10:54:13', '0', '', 0, 0, 'avatar.jpg'),
(14, 'Julien', 'Colmont', 'Julien.Colmont@gmail.com', '$2y$10$InzzWaFFeoA2FGBB/XTogubrqWuv7eJUkwAXDfNCNEMstcp0AifPO', 'etudiant', 13, 'J aime le design', 612354568, '2019-03-15 10:58:01', '2019-03-15 10:58:01', '0', '', 0, 0, 'avatar.jpg'),
(15, 'Gerard', 'Louvin', 'gerard.louvin@hotmail.fr', '$2y$10$ow6xZqRyxT5Z9lRLwB8TNe91Uo9pd8JEkAJgTwTcWCN/eAkHtjuE.', 'pro', 3, '', 321253612, '2019-03-15 10:59:36', '2019-03-15 10:59:36', '0', '', 0, 0, 'avatar.jpg'),
(16, 'Claude', 'Jombier', 'Claude.Jombier@hotmail.fr', '$2y$10$YzQ1/zgniDozi3MuVN0jfe97PLj5.Z2RhC6jPYgItMQ6AFHUpoT.e', 'etudiant', 75, 'passioné de pêche et sport', 651577311, '2019-03-15 11:05:12', '2019-03-15 11:05:12', '0', '', 0, 0, 'avatar.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
