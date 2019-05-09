-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 09 Mai 2019 à 11:56
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annoncesentreprises`
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
(10, 11, 'Infirmière', 'Vitalis Médical Nancy, agence de recrutement en intérim, vacation et CDI, spécialisée dans le Paramédical, Médical et social, recrute pour son client, un établissement sur Nancy, un Infirmier (H/F) DE pour travailler dans un service de dialyse.  Rattaché au Cadre de santé, vous serez en charge des missions suivantes : - Préparer les séances de dialyse et le matériel nécessaire, - Accueillir, installer et prendre en charge les patients, - Réaliser les séances de dialyse, - Assurer la qualité des soins, - Entretenir la relation avec les intervenants extérieurs, - Avoir un rôle éducatif avec les patients, - Gérer et suivre les dossiers, - Participer aux groupes de travail et au bon fonctionnement du service, - Gérer le matériel des salles, - Effectuer les commandes de pharmacie informatisées...Infirmier / Infirmière DE ayant l''expérience du travail en service de dialyse.  Le respect du secret professionnel, des règles de confidentialité, des droits et de la dignité du patient font partie de la pratique professionnelle quotidienne.   Vous êtes rigoureux(se), motivé(e) et consciencieux(se) alors n''hésitez pas à postuler directement sur l''annonce ou à nous envoyer votre CV à nancy@vitalis-medical.com  N''hésitez pas à partager et à nous contacter pour connaître l''ensemble des missions disponibles dans notre agence.', 'Alternance', 1300);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `competenceDe`, `domaine`, `competence`, `level`) VALUES
(1, 11, 'Informatique', 'PHP', 'Intermédiaire'),
(2, 13, 'Alcool', 'Buveur de bière', 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `competencesannonce`
--

CREATE TABLE IF NOT EXISTS `competencesannonce` (
  `id` int(11) NOT NULL,
  `annonce` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competencesannonce`
--

INSERT INTO `competencesannonce` (`id`, `annonce`, `domaine`, `competence`, `level`) VALUES
(1, 2, 'informatique', 'PHP', 'Expert'),
(2, 2, 'informatique', 'HTML', 'Avancé'),
(3, 2, 'informatique', 'CSS', 'Expert'),
(4, 2, 'informatique', 'Javascript', 'Avancé'),
(5, 2, 'informatique', 'adobe xd', 'Expert'),
(6, 3, 'informatique', 'VueJS', 'Expert'),
(7, 3, 'informatique', 'ReactJS', 'Expert'),
(8, 3, 'informatique', 'Angular', 'Expert'),
(9, 3, 'informatique', 'JS', 'Expert'),
(10, 4, 'Web Design', 'Photoshop', 'Expert'),
(11, 4, 'Web Design', 'InDesign', 'Expert'),
(12, 4, 'Web Design', 'Illustrator', 'Expert'),
(13, 4, 'Web Design', 'Adobe XD', 'Expert'),
(14, 5, 'Médecine', 'Anesthésie', 'Expert'),
(15, 5, 'Médecine', 'Urgences', 'Expert'),
(16, 5, 'Médecine', 'Tromat', 'Expert'),
(17, 6, 'Web Design', 'Photoshop', 'Expert'),
(18, 6, 'Web Design', 'Figma', 'Expert'),
(19, 6, 'Web Design', 'HTML', 'Expert'),
(20, 6, 'Web Design', 'CSS', 'Expert'),
(21, 6, 'Web Design', 'JS', 'Expert'),
(22, 8, 'Web Design', 'Figma', 'Avancé'),
(23, 8, 'Web Design', 'Adobe XD', 'Intermédiaire'),
(24, 8, 'Web Design', 'Illustrator', 'Avancé'),
(25, 9, 'Informatique', 'Wordpress', 'Avancé');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE IF NOT EXISTS `diplomes` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `nom_diplome` text NOT NULL,
  `annee_obtention` varchar(255) NOT NULL,
  `etablissement` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `user`, `nom_diplome`, `annee_obtention`, `etablissement`, `description`) VALUES
(1, 1, 'BAC STI2D', '2014', 'Malraux', ''),
(2, 1, 'BAC STI2D', '2014', 'Malraux', ''),
(3, 11, 'DUT Réseaux et Télécommunications', '2018', 'IUT de Béthune', 'Dans le domaine de l''informatique !'),
(4, 13, 'BAC STI2D', '2015', 'A.Malraux Béthune', 'Un truc de branleur !');

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
  `siret` text NOT NULL,
  `departement` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `responsable`, `nom`, `description`, `logo`, `but`, `typeEntreprise`, `siret`, `departement`) VALUES
(5, 1, 'mlklklmkm', 'lmkmlkmk', 'avatar.jpg', 'kmklmkmlk', 'pme', 'lmkmkmlk', 59),
(6, 4, 'IBM', 'Best Company', 'avatar.jpg', 'lkjlkjlkjl', 'ge', 'lsjkflsdjkfljlkdsf', 62),
(7, 10, 'JOUVE', 'Imprimerie, Métiers du numérique', 'avatar.jpg', 'Mettre le numériques en avant', 'SII', '122545121', 62),
(8, 5, 'MBS communication', 'dfdfdfd', 'avatar.jpg', 'dfdfd', 'SA', '789961', 59),
(9, 13, 'Hopital de Lens', '', 'avatar.jpg', '', 'Hopital', '1248541', 62),
(10, 15, 'Worldline', 'dfdgd', 'avatar.jpg', 'dfdfgf', 'SA', '89784534', 75),
(11, 11, 'Polyclinique', 'rfgfg', 'avatar.jpg', 'fdfgfg', 'SA', '54654654', 93),
(12, 6, 'GG Style', 'avoir le style', 'avatar.jpg', 'toujours plus de style', 'SI', '4787891561', 93);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL,
  `expDe` int(11) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `typeContrat` varchar(100) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `date_debut` varchar(20) NOT NULL,
  `date_fin` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id`, `expDe`, `poste`, `typeContrat`, `nomEntreprise`, `ville`, `date_debut`, `date_fin`, `description`) VALUES
(1, 11, 'Développeur Front End', 'Contrat Pro', 'IBM Client Innovation Center', 'Lille', '2018-09-03', '2019-08-30', 'Apprenti développeur front-end dans l''équipe Watson'),
(2, 13, 'Serveur', 'CDI', 'Leffe', 'Lille', '2019-05-11', '2019-05-31', 'Je servais des bières');

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
  `nomLoisir` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loisirs`
--

INSERT INTO `loisirs` (`id`, `loisirDe`, `nomLoisir`) VALUES
(1, 13, 'Tunning');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponsesannonces`
--

INSERT INTO `reponsesannonces` (`id`, `idAnnoncesEntreprises`, `candidat`, `entreprise`, `datePostuler`, `notif`) VALUES
(2, 8, 12, 6, '2019-05-09 09:05:57', 0),
(4, 10, 12, 11, '2019-05-09 09:39:05', 1),
(5, 7, 12, 12, '2019-05-09 09:45:52', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

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
(13, 'get', 'annoncesentreprises', 'getAnnonceIdCompagny($bdd, $idCompany)', 'Récupère en fonction de l&#039;id Entreprise'),
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
(28, 'post', 'entreprise', 'addCompany($bdd, $responsable, $nom, $description, $logo, $but, $typeEntreprise, $siret, $departement)', 'Création d&#039;une entreprise'),
(29, 'delete', 'entreprise', 'deleteAllCompany($bdd)', 'Suppression de toutes les entreprises'),
(30, 'delete', 'entreprise', 'deleteCompanyId($bdd, $idCompany)', 'Suppression d&#039;une entreprise par son ID'),
(31, 'delete', 'entreprise', 'deleteCompanyResponsable($bdd, $idResponsable)', 'Suppression d&#039;une entreprise en fonction du responsable'),
(32, 'get', 'entreprise', 'getAllEntreprise($bdd)', 'Récupère toutes les entreprises'),
(33, 'get', 'entreprise', 'getEntrepriseId($bdd, $idEntreprise)', 'Récupère une entreprise en fonction de son ID'),
(34, 'get', 'entreprise', 'getEntrepriseResponsable($bdd, $idUser)', 'Récupère les entreprises en fonction du responsable'),
(35, 'get', 'entreprise', 'getEntrepriseNom($bdd, $nom)', 'Récupère une entreprise en fonction du nom'),
(36, 'get', 'entreprise', 'getEntrepriseSiret($bdd, $siret)', 'Récupère l&#039;entreprise en fonction du SIRET'),
(37, 'get', 'entreprise', 'getEntrepriseType($bdd, $typeCompany)', 'Récupère les entreprises en fonction de leurs type'),
(38, 'post', 'experiences', 'addExperience($bdd, $expDe, $poste, $typeContrat, $nomEntreprise, $ville, $date_debut, $date_fin, $description)', 'Ajouter une expérience à un utilisateur'),
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
(74, 'get', 'reponsesannonces', 'getRepAnnonce($bdd)', 'Récupère toutes les réponses aux annonces'),
(75, 'get', 'reponsesannonces', 'getRepEntrepriseId($bdd, $idRep)', 'Récupère réponses par id'),
(76, 'get', 'reponsesannonces', 'getRepAnnonceId($bdd, $idAnnonce)', 'Récupère les réponses en fonction de l&#039;id de l&#039;annonce'),
(77, 'get', 'reponsesannonces', 'getRepEntrepriseIdCandidat($bdd, $idUser)', 'Récupère toutes les réponses par candidat'),
(78, 'get', 'reponsesannonces', 'getRepEntreprise($bdd, $idCompany)', 'Récupère les réponses par entreprise'),
(79, 'post', 'diplomes', 'addDiplome($bdd, $idUser, $nomDiplome, $anneeObtention, $etablissement, $description)', 'Ajoute un diplome'),
(80, 'delete', 'diplomes', 'deleteAllDiplomes($bdd)', 'Supprime tous les diplomes'),
(81, 'delete', 'diplomes', 'deleteDiplome($bdd, $idDiplome)', 'Supprime un diplome par son id'),
(82, 'delete', 'diplomes', 'deleteDiplomeUser($bdd, $idUSer)', 'Supprime les diplomes d&#039;un utilisateur'),
(83, 'get', 'diplomes', 'getDiplomes($bdd)', 'Récupère tous les diplomes'),
(84, 'get', 'diplomes', 'getDiplomeId($bdd, $id)', 'Récupère diplome par id'),
(85, 'get', 'diplomes', 'getDiplomeUser($bdd, $idUser)', 'Récupère les diplomes d&#039;un utilisateur'),
(86, 'post', 'competencesannonce', 'addCompetencesAnnonce($bdd, $annonce, $domaine, $competence, $level)', 'Ajouter une compétence à une annonce'),
(87, 'delete', 'competencesannonce', 'deleteCompAnnonceAll($bdd)', 'Supprimer toutes les compétences des annonces'),
(88, 'delete', 'competencesannonce', 'deleteCompAnnonceId($bdd,$idComp)', 'Supprimer une compétence d&#039;une annonce par son id'),
(89, 'delete', 'competencesannonce', 'deleteAllCompAnnonce($bdd,$annonce)', 'Supprimer toutes les compétences d&#039;une annonce'),
(90, 'get', 'competencesannonce', 'getAllCompAnnonce($bdd)', 'Afficher toutes les compétences d&#039;une annonce'),
(91, 'get', 'competencesannonce', 'getIdCompAnnonce($bdd,$idComp)', 'Afficher une compétence annonce par son id'),
(92, 'get', 'competencesannonce', 'getAllCompAnnonceId($bdd,$annonce)', 'Afficher toutes les compétences d&#039;une annonce'),
(93, 'get', 'users', 'getMailUser($bdd, $mail)', 'Récupération des infos d&#039;un utilisateur par son adresse mail');

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
  `premium` tinyint(1) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `type_compte`, `departement`, `description`, `telephone`, `date_creation`, `date_last_connexion`, `avert`, `raison_ban`, `admin`, `premium`, `avatar`) VALUES
(4, 'Maxime', 'Lefebvre', 'max@test.com', '1234', 'etudiant', 62, 'fdsfdsfs', 0, '2019-01-02 00:00:00', '2019-01-24 00:00:00', '0', 'sdsdqsd', 0, 0, 'avatar.jpg'),
(5, 'Albert', 'Pinot', 'lebgdu62@gmail.com', 'saucisse', 'etudiant', 0, '', 0, '2019-02-07 13:29:52', '2019-02-07 13:29:52', '0', '', 0, 0, 'avatar.jpg'),
(6, 'Juju', 'Col', 'lesuperbgdu62@gmail.com', 'saucisse2', 'pro', 0, '', 0, '2019-02-07 14:08:46', '2019-02-07 14:08:46', '0', '', 0, 0, 'avatar.jpg'),
(9, 'Maxime', 'Lefebvre', 'maximelefebvre1505@gmail.com', '$2y$10$NUBKgMOJx2oijEflLpYytOXC8YjOgX8A7JhbUYkgQOwlMetcsFKsW', 'etudiant', 62, '', 0, '2019-02-26 12:54:30', '2019-02-26 12:54:30', '0', '', 0, 0, 'avatar.jpg'),
(10, 'Nicolas', 'Paris', 'nicolas.paris_isc.france@ibm.com', '$2y$10$rk5LAKlNElmG621o6hFNLehP.goAybeGVQ.BTDofn8JNyV.MJlM46', 'pro', 59, '', 0, '2019-02-26 12:56:55', '2019-02-26 12:56:55', '0', '', 0, 0, 'avatar.jpg'),
(11, 'Maxime', 'Lefebvre', 'admin@admin.com', '$2y$10$q.jWqCw3PoAYI0LTXSEYpeCCbcYD9HJf.8IO5c.SOJxYOMpmwoJ36', 'pro', 62, 'Voici ma nouvelle description !', 0, '2019-03-08 09:33:23', '2019-03-08 09:33:23', '0', '', 0, 0, '11d0a67e9bde85d858daec17657babb32e.jpg'),
(12, 'Maxime', 'Lefebvre', 'etu@etu.com', '$2y$10$q.jWqCw3PoAYI0LTXSEYpeCCbcYD9HJf.8IO5c.SOJxYOMpmwoJ36', 'etudiant', 62, '', 0, '2019-05-04 12:30:42', '2019-05-04 12:30:42', '0', '', 0, 0, 'avatar.jpg'),
(13, 'Jacki', 'Tunning', 'user@user.com', '$2y$10$q.jWqCw3PoAYI0LTXSEYpeCCbcYD9HJf.8IO5c.SOJxYOMpmwoJ36', 'etudiant', 62, '', 0, '2019-05-09 11:51:05', '2019-05-09 11:51:05', '0', '', 0, 0, 'avatar.jpg');

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
  ADD KEY `competenceDe` (`competenceDe`,`domaine`,`competence`,`level`),
  ADD KEY `domaine` (`domaine`),
  ADD KEY `competence` (`competence`,`level`),
  ADD KEY `level` (`level`);

--
-- Index pour la table `competencesannonce`
--
ALTER TABLE `competencesannonce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annonce` (`annonce`),
  ADD KEY `domaine` (`domaine`),
  ADD KEY `competence` (`competence`),
  ADD KEY `level` (`level`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsable` (`responsable`,`nom`,`typeEntreprise`),
  ADD KEY `typeEntreprise` (`typeEntreprise`),
  ADD KEY `departement` (`departement`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expDe` (`expDe`,`nomEntreprise`,`date_debut`,`date_fin`,`typeContrat`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`,`destinataire`,`etat_msg`);

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
  ADD KEY `type` (`type`),
  ADD KEY `type_2` (`type`,`categorie`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `competencesannonce`
--
ALTER TABLE `competencesannonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `swagger`
--
ALTER TABLE `swagger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
