-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 26 Février 2019 à 13:47
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `password`, `creation`, `last_connexion`, `avatar`, `privilege`, `ban`) VALUES
(3, 'Maxime', '1234', '2019-01-17 00:00:00', '2019-01-11 00:00:00', 'zeazeaze', 'admin', 'non');

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
-- Structure de la table `diplomes`
--

CREATE TABLE IF NOT EXISTS `diplomes` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `nom_diplome` text NOT NULL,
  `annee_obtention` varchar(255) NOT NULL,
  `etablissement` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `user`, `nom_diplome`, `annee_obtention`, `etablissement`) VALUES
(1, 1, 'BAC STI2D', '2014', 'Malraux'),
(2, 1, 'BAC STI2D', '2014', 'Malraux');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `responsable`, `nom`, `description`, `logo`, `but`, `typeEntreprise`, `siret`) VALUES
(5, 1, 'mlklklmkm', 'lmkmlkmk', 'mlkmlkmlklklmk', 'kmklmkmlk', 'pme', 'lmkmkmlk'),
(6, 4, 'IBM', 'Best Company', 'ljfksdjlksjlfjl', 'lkjlkjlkjl', 'ge', 'lsjkflsdjkfljlkdsf');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id`, `expDe`, `nomEntreprise`, `ville`, `anneeDebut`, `anneeFin`, `dureeTotal`, `typeContrat`, `poste`) VALUES
(1, 4, 'IBM', 'Lomme', 2018, 2019, '6 mois', 'Contrat Pro', 'Développeur'),
(2, 5, 'IUT Lens', 'Lens', 2018, 2019, '10 mois', 'Licence', 'Étudiant');

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
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `message` text NOT NULL,
  `etat_msg` tinyint(1) NOT NULL,
  `date_msg` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `sender`, `destinataire`, `message`, `etat_msg`, `date_msg`) VALUES
(1, 1, 1, 'Test de message', 0, '2019-02-02 22:11:27');

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
-- Structure de la table `swagger`
--

CREATE TABLE IF NOT EXISTS `swagger` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `requete` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `swagger`
--

INSERT INTO `swagger` (`id`, `type`, `categorie`, `requete`, `description`) VALUES
(1, 'post', 'admin', 'addAdmin($bdd, $pseudo, $password, $privilege)', 'Créer un nouveau compte administrateur.\r\nPrivilège : admin, modo'),
(2, 'delete', 'admin', 'deleteAllAdmin($bdd)', 'Supprime tous les admins'),
(3, 'delete', 'admin', 'deleteAdmin($bdd, $idAdmin)', 'Supprimer selon l&#039;id du compte Admin'),
(4, 'get', 'admin', 'getAdmin($bdd)', 'Affiche tous les comptes admin !'),
(5, 'get', 'admin', 'getAdminId($bdd, $id)', 'Affiche par id d&#039;admin'),
(6, 'get', 'admin', 'getAdminPseudo($bdd, $pseudo)', 'Affiche par pseudo !'),
(7, 'post', 'annoncesentreprises', 'addAnnonceCompany($bdd, $entreprise, $titre, $description, $typeAnnonce, $remuneration)', 'Créer une nouvelle annonce'),
(8, 'delete', 'annoncesentreprises', 'deleteAllAnnonces($bdd)', 'Supprime toutes les annonces'),
(9, 'delete', 'annoncesentreprises', 'deleteAnnonceId($bdd, $idAnnonce)', 'Supprime une annonce selon son id'),
(10, 'delete', 'annoncesentreprises', 'deleteAnnonceCompany($bdd, $idCompany)', 'Supprime en fonction de l&#039;id Entreprise'),
(11, 'get', 'annoncesentreprises', 'getAnnonce($bdd)', 'Récupère toutes les annonces'),
(12, 'get', 'annoncesentreprises', 'getAnnonceId($bdd, $idAnnonce)', 'Récupère en fonction de l&#039;id'),
(13, 'get', 'annoncesentreprises', 'getAnnonceId($bdd, $idCompany)', 'Récupère en fonction de l&#039;id Entreprise'),
(14, 'get', 'annoncesentreprises', 'getAnnonceType($bdd, $typeAnnonce)', 'Récupère selon le type des annonces'),
(15, 'post', 'competences', 'addCompetences($bdd, $competenceDe, $domaine, $competence, $level)', 'Ajouter une nouvelle compétence'),
(16, 'delete', 'competences', 'deleteCompAll($bdd)', 'Supprime toutes les compétences !'),
(17, 'delete', 'competences', 'deleteCompId($bdd,$idComp)', 'Supprime une compétence selon l&#039;id'),
(18, 'delete', 'competences', 'deleteAllCompDe($bdd,$competenceDe)', 'Supprime toutes les compétences d&#039;un user'),
(19, 'get', 'competences', 'getAllComp($bdd)', 'Affiche toutes les compétences'),
(20, 'get', 'competences', 'getIdComp($bdd,$idComp)', 'Affiche une compétence selon l&#039;id'),
(21, 'get', 'competences', 'getAllCompDe($bdd,$competencesDe)', 'Affiche les compétences d&#039;un utilisateurs'),
(22, 'post', 'users', 'addUser($bdd, $prenom, $nom, $email, $password, $type_compte, $departement)', 'Permet l&#039;inscription d&#039;un utilisateur'),
(23, 'delete', 'users', 'deleteAllUsers($bdd)', 'Suppression de tous les utilisateurs'),
(24, 'delete', 'users', 'deleteUser($bdd, $idUser)', 'Suppression d&#039;un utilisateur'),
(25, 'get', 'users', 'getAllUsers($bdd)', 'Récupérer tous les utilisateurs'),
(26, 'get', 'users', 'getIdUser($bdd, $idUser)', 'Récupérer un utilisateur'),
(27, 'get', 'users', 'getUsersStatus($bdd, $status)', 'Récupérer les utilisateurs en fonction de leur status'),
(28, 'post', 'entreprise', 'addCompany($bdd, $responsable, $nom, $description, $logo, $but, $typeEntreprise, $siret)', 'Création d&#039;une entreprise'),
(29, 'delete', 'entreprise', 'deleteAllCompany($bdd)', 'Suppression de toutes les entreprises'),
(30, 'delete', 'entreprise', 'deleteCompanyId($bdd, $idCompany)', 'Suppression d&#039;une entreprise par son ID'),
(31, 'delete', 'entreprise', 'deleteCompanyResponsable($bdd, $idResponsable)', 'Suppression d&#039;une entreprise en fonction du responsable'),
(32, 'get', 'entreprise', 'getAllEntreprise($bdd)', 'Récupère toutes les entreprises'),
(33, 'get', 'entreprise', 'getEntrepriseId($bdd, $idEntreprise)', 'Récupère une entreprise en fonction de son ID'),
(34, 'get', 'entreprise', 'getEntrepriseResponsable($bdd, $idUser)', 'Récupère les entreprises en fonction du responsable'),
(35, 'get', 'entreprise', 'getEntrepriseNom($bdd, $nom)', 'Récupère une entreprise en fonction du nom'),
(36, 'get', 'entreprise', 'getEntrepriseSiret($bdd, $siret)', 'Récupère l&#039;entreprise en fonction du SIRET'),
(37, 'get', 'entreprise', 'getEntrepriseType($bdd, $typeCompany)', 'Récupère les entreprises en fonction de leurs type'),
(38, 'post', 'experiences', 'addExperience($bdd, $expDe, $nomEntreprise, $ville, $anneDebut, $anneeFin, $dureeTotal, $typeContrat, $poste)', 'Ajouter une expérience à un utilisateur'),
(39, 'delete', 'experiences', 'deleteExpAll($bdd)', 'Suppression de toutes les expériences'),
(40, 'delete', 'experiences', 'deleteExpId($bdd,$idExp)', 'Suppression par ID'),
(41, 'delete', 'experiences', 'deleteAllExpDe($bdd,$ExpDe)', 'Suppression de toutes les expériences d&#039;un utilisateur'),
(42, 'get', 'experiences', 'getAllExp($bdd)', 'Récupère toutes les expériences'),
(43, 'get', 'experiences', 'getExpId($bdd, $idExp)', 'Récupère expériences par id'),
(44, 'get', 'experiences', 'getExpDe($bdd, $idUser)', 'Récupère les exp d&#039;un utilisateur'),
(45, 'post', 'galerieEntreprises', 'addGalerieEntreprises($bdd,$idEntreprises,$lienPhoto )', 'Ajouter une photo à une entreprise'),
(46, 'delete', 'galerieEntreprises', 'deleteGalerieEntreprisesAll($bdd)', 'Suppression de toutes les entreprises'),
(47, 'delete', 'galerieEntreprises', 'deleteGalerieEntreprisesId($bdd, $idGaleEntreprise)', 'Suppression par id'),
(48, 'delete', 'galerieEntreprises', 'deleteAllGalerieEntreprises($bdd, $idEntreprise)', 'Suppression des toutes les photos d&#039;une entreprise'),
(49, 'get', 'galerieEntreprises', 'getGalerieEntreprises($bdd)', 'Récupère toutes les photos'),
(50, 'get', 'galerieEntreprises', 'getGalerieEntreprisesId($bdd, $idGalComp)', 'Récupère toutes les photos d&#039;une entreprise'),
(51, 'post', 'loisirs', 'addLoisirs($bdd, $loisirDe, $nomLoisir, $description)', 'Ajouter un loisir'),
(52, 'delete', 'loisirs', 'deleteLoisirAll($bdd)', 'Suppression des tous les loisirs'),
(53, 'delete', 'loisirs', 'deleteLoisirId($bdd,$idLoisirs)', 'Suppression d&#039;un loisir par son id'),
(54, 'delete', 'loisirs', 'deleteLoisirsId($bdd,$loisirsDe)', 'Suppression de tous les loisirs d&#039;un utilisateur'),
(55, 'get', 'loisirs', 'getAllLoisirs($bdd)', 'Récupère tous les loisirs'),
(56, 'get', 'loisirs', 'getLoisirsId($bdd,$idLoisirs)', 'Récupère un loisir par son id'),
(57, 'get', 'loisirs', 'getAllLoisirsDe($bdd,$loisirDe)', 'Récupère tous les loisirs d&#039;un utilisateur'),
(58, 'post', 'messagerie', 'addMessage($bdd, $sender, $destinataire, $message)', 'Ajoute un message'),
(59, 'delete', 'messagerie', 'deleteAllMsg($bdd)', 'Supprime tous les messages'),
(60, 'delete', 'messagerie', 'deleteMsgId($bdd, $idMsg)', 'Suppression d&#039;un message par son id'),
(61, 'delete', 'messagerie', 'deleteMsgSender($bdd, $idSender)', 'Supprimer tous les messages d&#039;un sender'),
(62, 'delete', 'messagerie', 'deleteMsgDestinataire($bdd, $idDest)', 'Supprimer tous les messages d&#039;un destinataire'),
(63, 'get', 'messagerie', 'getMsg($bdd)', 'Récupère tous les messages'),
(64, 'get', 'messagerie', 'getMsgId($bdd, $idMsg)', 'Récupère un message par son id'),
(65, 'get', 'messagerie', 'getMsgSender($bdd, $idSender)', 'Récupère tous les messages d&#039;un sender'),
(66, 'get', 'messagerie', 'getMsgDestinataire($bdd, $idDest)', 'Récupère tous les messages d&#039;un destinataire'),
(67, 'get', 'messagerie', 'getMsgSenderDestinataire($bdd, $idSender, $idDest)', 'Récupère une conversation complète entre 2 utilisateurs'),
(68, 'post', 'reponsesannonces', 'addRepAnnonce($bdd, $idAnnoncesEntreprises, $candidat, $entreprise)', 'Ajoute une réponse à une annonce'),
(69, 'delete', 'reponsesannonces', 'deleteAllRep($bdd)', 'Supprime toutes les réponses des annonces'),
(70, 'delete', 'reponsesannonces', 'deleteRepId($bdd, $idRep)', 'Supprime une réponse par son id'),
(71, 'delete', 'reponsesannonces', 'deleteRepAnnonce($bdd, $idAnnonce)', 'Supprime les réponses par annonce'),
(72, 'delete', 'reponsesannonces', 'deleteRepCandidat($bdd, $idCandidat)', 'Suppression réponses par candidat'),
(73, 'delete', 'reponsesannonces', 'deleteRepEntreprise($bdd, $idEntreprise)', 'Supprime les réponses par id entreprise'),
(74, 'get', 'reponsesannonces', 'getRepEntreprise($bdd)', 'Récupère toutes les réponses aux annonces'),
(75, 'get', 'reponsesannonces', 'getRepEntrepriseId($bdd, $idRep)', 'Récupère réponses par id'),
(76, 'get', 'reponsesannonces', 'getRepEntrepriseId($bdd, $idAnnonce)', 'Récupère les réponses en fonction de l&#039;id de l&#039;annonce'),
(77, 'get', 'reponsesannonces', 'getRepEntrepriseId($bdd, $idUser)', 'Récupère toutes les réponses par candidat'),
(78, 'get', 'reponsesannonces', 'getRepEntrepriseId($bdd, $idCompany)', 'Récupère les réponses par entreprise'),
(79, 'post', 'diplomes', 'addDiplome($bdd, $idUser, $nomDiplome, $anneeObtention, $etablissement)', 'Ajoute un diplome'),
(80, 'delete', 'diplomes', 'deleteAllDiplomes($bdd)', 'Supprime tous les diplomes'),
(81, 'delete', 'diplomes', 'deleteDiplome($bdd, $idDiplome)', 'Supprime un diplome par son id'),
(82, 'delete', 'diplomes', 'deleteDiplomeUser($bdd, $idUSer)', 'Supprime les diplomes d&#039;un utilisateur'),
(83, 'get', 'diplomes', 'getDiplomes($bdd)', 'Récupère tous les diplomes'),
(84, 'get', 'diplomes', 'getDiplomeId($bdd, $id)', 'Récupère diplome par id'),
(85, 'get', 'diplomes', 'getDiplomeUser($bdd, $idUser)', 'Récupère les diplomes d&#039;un utilisateur');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `type_compte`, `departement`, `description`, `telephone`, `date_creation`, `date_last_connexion`, `avert`, `raison_ban`, `admin`, `premium`) VALUES
(4, 'Maxime', 'Lefebvre', 'max@test.com', '1234', 'etudiant', 62, 'fdsfdsfs', 0, '2019-01-02 00:00:00', '2019-01-24 00:00:00', '0', 'sdsdqsd', 0, 0),
(5, 'Albert', 'Pinot', 'lebgdu62@gmail.com', 'saucisse', 'etudiant', 0, '', 0, '2019-02-07 13:29:52', '2019-02-07 13:29:52', '0', '', 0, 0),
(6, 'Juju', 'Col', 'lesuperbgdu62@gmail.com', 'saucisse2', 'pro', 0, '', 0, '2019-02-07 14:08:46', '2019-02-07 14:08:46', '0', '', 0, 0),
(9, 'Maxime', 'Lefebvre', 'maximelefebvre1505@gmail.com', '$2y$10$NUBKgMOJx2oijEflLpYytOXC8YjOgX8A7JhbUYkgQOwlMetcsFKsW', 'étudiant', 62, '', 0, '2019-02-26 12:54:30', '2019-02-26 12:54:30', '0', '', 0, 0),
(10, 'Nicolas', 'Paris', 'nicolas.paris_isc.france@ibm.com', '$2y$10$rk5LAKlNElmG621o6hFNLehP.goAybeGVQ.BTDofn8JNyV.MJlM46', 'pro', 59, '', 0, '2019-02-26 12:56:55', '2019-02-26 12:56:55', '0', '', 0, 0);

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
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponsesannonces`
--
ALTER TABLE `reponsesannonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnnoncesEntreprises` (`idAnnoncesEntreprises`,`candidat`,`entreprise`,`datePostuler`),
  ADD KEY `notif` (`notif`);

--
-- Index pour la table `swagger`
--
ALTER TABLE `swagger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `type` (`type`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `reponsesannonces`
--
ALTER TABLE `reponsesannonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `swagger`
--
ALTER TABLE `swagger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
