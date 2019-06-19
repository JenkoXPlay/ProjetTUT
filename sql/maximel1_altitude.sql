-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 19 juin 2019 à 20:57
-- Version du serveur :  10.1.38-MariaDB-cll-lve
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maximel1_altitude`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
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

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `blockedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annoncesentreprises`
--

CREATE TABLE `annoncesentreprises` (
  `id` int(11) NOT NULL,
  `entreprise` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `typeAnnonce` varchar(150) NOT NULL,
  `remuneration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annoncesentreprises`
--

INSERT INTO `annoncesentreprises` (`id`, `entreprise`, `titre`, `description`, `typeAnnonce`, `remuneration`) VALUES
(1, 4, 'Développeur Front-End', 'Nous recherchons un/une développeur/développeuse qui à soif d\'apprendre de nouvelles technologies.\r\n\r\nLe but de de ce stage est de réaliser un chatbot avec une intelligence artificielle.\r\nCe chatbot sera utilisé dans tout le centre afin d\'aider les collaborateurs s\'il ont des questions relatives à l\'entreprise.\r\n\r\nVous serez amené à travailler en équipe avec des professionnels du métier, ainsi que réaliser des réunions avec les différents services du centre.', 'stage', 456),
(2, 4, 'Designer UX/UI', 'Avoir des développeurs / développeuses c\'est bien mais avec des designers c\'est mieux !\r\n\r\nC\'est pour cela que nous recherchons des Designers UX/UI afin de réaliser des maquettes sur le logiciel Adobe XD.\r\n\r\nDurant votre Alternance, vous serez amené à travailler en équipe avec le client et l\'équipe de dev pour la réalisation des maquettes.\r\n\r\nVous devrez dans un premier temps réaliser des petits idées sur le projet, puis une version plus stable puis pour finir un prototype qui sera utilisé par le client et l\'équipe de dev.', 'Alternance', 986),
(5, 5, 'Référenceur Rédacteur (H/F)', 'Le stagiaire référenceur - rédacteur assurera la mise en place et le suivi des opérations de référencement de sites internet au sein du pôle référencement, et sera en charge de la rédaction de contenus pour les projets clients et les besoins internes. Au sein d\'une équipe, vous serez formé aux dernières techniques de référencement ainsi qu\'aux derniers outils de statistiques et de suivi.', 'stage', 300),
(6, 5, 'Assistant Chef de projet (H/F)', 'Sous la direction du Chef de projet, vous aurez pour principales missions :\r\n\r\nWeb marketing\r\nRédaction de contenus\r\nCommunity management\r\nAnalyse d’audience\r\nVeille / Benchmarks\r\nContrôle qualité\r\nRéférencement naturel (SEO)\r\nRéférencement payant, mise en place et suivi de campagnes Adwords (SEA)', 'Alternance', 1100);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `competenceDe` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `competenceDe`, `domaine`, `competence`, `level`) VALUES
(4, 1, 'Infographie', 'Photoshop', 'Intermédiaire'),
(7, 1, 'Informatique', 'CSS / SCSS', 'Avancé'),
(6, 1, 'Informatique', 'HTML', 'Avancé'),
(8, 1, 'Informatique', 'Linux', 'Intermédiaire'),
(5, 1, 'Informatique', 'PHP', 'Avancé'),
(1, 3, 'Graphisme', 'Illustrator', 'Avancé'),
(3, 3, 'Graphisme', 'indesign', 'Avancé'),
(2, 3, 'Graphisme', 'Photoshop', 'Avancé');

-- --------------------------------------------------------

--
-- Structure de la table `competencesannonce`
--

CREATE TABLE `competencesannonce` (
  `id` int(11) NOT NULL,
  `annonce` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competencesannonce`
--

INSERT INTO `competencesannonce` (`id`, `annonce`, `domaine`, `competence`, `level`) VALUES
(1, 1, 'Informatique', 'HTML', 'Débutant'),
(2, 1, 'Informatique', 'CSS', 'Débutant'),
(3, 1, 'Informatique', 'Angular', 'Débutant'),
(4, 1, 'Informatique', 'NodeJS', 'Débutant'),
(5, 1, 'Informatique', 'JavaScript', 'Débutant'),
(6, 2, 'Infographie', 'Adobe XD', 'Intermédiaire'),
(7, 2, 'Infographie', 'Photoshop', 'Intermédiaire'),
(13, 5, 'Référencement', 'SEO', 'Avancé'),
(14, 5, 'Référencement', 'SEA', 'Avancé'),
(15, 6, 'Référencement', 'SEO', 'Avancé'),
(16, 6, 'Référencement', 'SEA', 'Avancé');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE `diplomes` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `nom_diplome` text NOT NULL,
  `annee_obtention` varchar(255) NOT NULL,
  `etablissement` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `user`, `nom_diplome`, `annee_obtention`, `etablissement`, `description`) VALUES
(2, 3, 'Licence', '2019', 'IUT de Lens', 'Licence professionnel et création des métier numérique.\r\n(LP CréaWeb)'),
(3, 2, 'Bac S', '2015', 'Lycée Pablo Picasso', 'Bac Scientifique SVT option Physique-Chimie'),
(4, 1, 'BAC STI2D', '2016', 'A.Malraux Béthune', 'Étude des systèmes numérique et développement web.'),
(5, 1, 'DUT Réseaux et Télécommunications', '2018', 'IUT de Béthune', 'Étude des réseaux et de la télécommunication.');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `but` text NOT NULL,
  `typeEntreprise` varchar(150) NOT NULL,
  `siren` text NOT NULL,
  `departement` int(5) NOT NULL,
  `siteweb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `responsable`, `nom`, `description`, `logo`, `but`, `typeEntreprise`, `siren`, `departement`, `siteweb`) VALUES
(3, 6, 'Kaio', 'Kaio est une agence web et multimédia basée à Roubaix, près de Lille dans le Nord-Pas-de-Calais.\r\nDepuis 2007, Kaio accompagne ses clients dans toutes leurs problématiques digitales et print. Nous concevons des solutions de communication interactive sur mesure à haut niveau technique.\r\n\r\nPlus de 150 clients nous font confiance, dont 40 enseignes de l\'immobilier.', 'avatar.jpg', 'Vous écouter, comprendre vos besoins mais aussi votre personnalité, vos envies, et vos contraintes.', 'SA', '259647892', 59, 'https://www.kaio.fr/'),
(4, 5, 'IBM', 'IBM Client Innovation Center basé à Lille est le tout premier CIC en Europe, dans ce centre y sont développés des applications web comme mobile et nous y réalisons également de la maintenance sur les réseaux à distance.', '5a810edaab4c4faf485f0107dbde87979.png', 'Être plus facilement en relation avec les clients.', 'GE', '123456789', 62, 'https://france.ciceurope.com'),
(5, 7, 'Kaio', 'Kaio est une agence web et multimédia basée à Roubaix, près de Lille dans le Nord-Pas-de-Calais.\r\nDepuis 2007, Kaio accompagne ses clients dans toutes leurs problématiques digitales et print. Nous concevons des solutions de communication interactive sur mesure à haut niveau technique.\r\n\r\nPlus de 150 clients nous font confiance, dont 40 enseignes de l\'immobilier.', 'avatar.jpg', 'Vous écouter, comprendre vos besoins mais aussi votre personnalité, vos envies, et vos contraintes.', 'SA', '456789123', 59, 'https://www.kaio.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `expDe` int(11) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `typeContrat` varchar(100) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `date_debut` varchar(20) NOT NULL,
  `date_fin` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `expDe`, `poste`, `typeContrat`, `nomEntreprise`, `ville`, `date_debut`, `date_fin`, `description`) VALUES
(2, 3, 'Graphiste', 'Alternance', 'Office de Tourisme de Douai', 'Douai', '2019-01-21', '2019-08-31', 'Graphiste en contrat de professionnalisation.\r\nEn charge de la communication interne et externe et réalisation graphique.'),
(3, 2, 'Intégrateur', 'Stage', 'Kaio', 'Roubaix', '2019-05-01', '2019-06-30', 'Intégration de site web'),
(4, 1, 'Développeur Front End', 'Stage', 'IBM Client Innovation Center', 'Lille', '2018-04-02', '2018-06-29', 'Développeur un ChatBot avec une intelligence artificielle.');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_entreprises`
--

CREATE TABLE `galerie_entreprises` (
  `id` int(11) NOT NULL,
  `idEntreprises` int(11) NOT NULL,
  `lienPhoto` text NOT NULL,
  `ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE `loisirs` (
  `id` int(11) NOT NULL,
  `loisirDe` int(11) NOT NULL,
  `nomLoisir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `loisirs`
--

INSERT INTO `loisirs` (`id`, `loisirDe`, `nomLoisir`) VALUES
(8, 1, 'KickBoxing'),
(7, 1, 'Musique'),
(1, 2, 'Sport'),
(6, 3, 'Dessins | Illustrations'),
(5, 3, 'Films | Series'),
(2, 3, 'Games'),
(4, 3, 'Manga | Animé');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `maintenanceBy` int(11) NOT NULL,
  `finMaintenance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `message` text NOT NULL,
  `etat_msg` tinyint(1) NOT NULL,
  `date_msg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponsesannonces`
--

CREATE TABLE `reponsesannonces` (
  `id` int(11) NOT NULL,
  `idAnnoncesEntreprises` int(11) NOT NULL,
  `candidat` int(11) NOT NULL,
  `entreprise` int(11) NOT NULL,
  `datePostuler` datetime NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponsesannonces`
--

INSERT INTO `reponsesannonces` (`id`, `idAnnoncesEntreprises`, `candidat`, `entreprise`, `datePostuler`, `notif`, `reponse`) VALUES
(2, 6, 2, 5, '2019-06-11 13:10:16', 0, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `swagger`
--

CREATE TABLE `swagger` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `requete` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `swagger`
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
(28, 'post', 'entreprise', 'addCompany($bdd, $responsable, $nom, $description, $logo, $but, $typeEntreprise, $siret, $departement, $siteweb)', 'Création d&#039;une entreprise'),
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
(93, 'get', 'users', 'getMailUser($bdd, $mail)', 'Récupération des infos d&#039;un utilisateur par son adresse mail'),
(94, 'post', 'favoris', 'addFav($bdd, $idAnnonce, $idUser)', 'Ajouter un favoris'),
(95, 'delete', 'favoris', 'deleteAllFav($bdd)', 'Suppression de tous les favoris'),
(96, 'delete', 'favoris', 'deleteFavId($bdd, $idFav)', 'Suppression d&#039;un favoris par son id'),
(97, 'delete', 'favoris', 'deleteFavByUser($bdd, $idUser)', 'Suppression de tous les favoris d&#039;un user par son id'),
(98, 'delete', 'favoris', 'deleteFavByAnnonce($bdd, $idAnnonce)', 'Suppression de tous les favoris par annonce avec son id'),
(99, 'get', 'favoris', 'getAllFav($bdd)', 'Récupération de tous les favoris'),
(100, 'get', 'favoris', 'getFavById($bdd, $idFav)', 'Récupération d&#039;un favoris par son id'),
(101, 'get', 'favoris', 'getFavByUser($bdd, $idUser)', 'Récupération des favoris d&#039;un utilisateur par son id'),
(102, 'get', 'favoris', 'getFavByAnnonce($bdd, $idAnnonce)', 'Récupération des favoris par id d&#039;une annonce'),
(103, 'post', 'contact', 'addContact($bdd, $nom_complet, $email, $sujet, $message)', 'Ajouter un formulaire de contact'),
(104, 'delete', 'contact', 'deleteAllContact($bdd)', 'Suppression de tous les contacts'),
(105, 'delete', 'contact', 'deleteContactId($bdd, $idContact)', 'Suppression d&#039;un contact par son id'),
(106, 'get', 'contact', 'getAllContact($bdd)', 'Récupérer tous les contacts'),
(107, 'get', 'contact', 'getContactId($bdd, $idContact)', 'Récupérer un contact par son id'),
(108, 'get', 'contact', 'getContactEmail($bdd, $email)', 'Récupérer tous les contacts d&#039;une adresse mail');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `type_compte`, `departement`, `description`, `telephone`, `date_creation`, `date_last_connexion`, `avert`, `raison_ban`, `admin`, `premium`, `avatar`) VALUES
(1, 'Maxime', 'Lefebvre', 'maximelefebvre1505@gmail.com', '$2y$10$WMkG.p44qcKoFvO9uyCR8O23R42gfm5WQijq.WxpijIEcN/q0VK5O', 'etudiant', 62, 'Salut, je suis l\'un des fondateurs d\'Alt\'itude.\r\n\r\nJ\'ai 21 ans, et je suis en Licence Pro CreaWeb.\r\nLe développement web me passionne ainsi que la musique.', 0, '2019-06-05 09:26:42', '2019-06-05 09:26:42', '0', '', 0, 0, '12ba370f92d113dcd84a25cd0808587b7.jpg'),
(2, 'albert', 'Pinot', 'albert.pinot@outlook.fr', '$2y$10$erg0RDaT7v5xhPFdmI/H3OF1BB5X0p5zJkURpM6POD6zn6S/3erFW', 'etudiant', 62, '', 658507215, '2019-06-05 09:28:55', '2019-06-05 09:28:55', '0', '', 0, 0, 'avatar.jpg'),
(3, 'Julien', 'Colmont', 'juliencolmont59@gmail.com', '$2y$10$HGDGWogR4wVm11yCKIwBkuU38msthNvfktk7rgA8ub26X5qSeqLbC', 'etudiant', 57, 'Je m\'appel Julien Colmont, Je suis graphiste et j\'aime réaliser des illustrations dans mes projets.', 0, '2019-06-05 09:32:08', '2019-06-05 09:32:08', '0', '', 0, 0, 'avatar.jpg'),
(4, 'Bastien', 'Moiroux', 'bastienmoiroux@gmail.com', '$2y$10$91ui.UMcxlJs744BpOeXpO1S99Q5B7didMBrGir2XdlpI/HEdj9pe', 'etudiant', 59, 'Je suis le plus beau des ux designers', 786264396, '2019-06-05 09:36:35', '2019-06-05 09:36:35', '0', '', 0, 0, '4ec5e085306f86cf93ab9dc2163d6de01.jpg'),
(5, 'John', 'Doe', 'maxime.radiohaide@gmail.com', '$2y$10$NWx49L8PaYt2/SAUZf3gHO48cu9nfdwtZWtFTMY2Uu4GvQMBWuiDW', 'pro', 62, '', 0, '2019-06-06 09:01:17', '2019-06-06 09:01:17', '0', '', 0, 0, 'avatar.jpg'),
(7, 'Vincent', 'Delplace', 'albert.pinot1806@gmail.com', '$2y$10$KywRuFG6BPT1CNGgZ1ZbF.zen69wkCY0IlaVDnkcy3UUGl7.2Ni1m', 'pro', 59, '', 0, '2019-06-06 13:13:30', '2019-06-06 13:13:30', '0', '', 0, 0, 'avatar.jpg'),
(8, 'Maxime', 'Marais', 'maxime@kaio.fr', '$2y$10$NdPC50Swj0EgwlIAjW1ZDeoCsIKHiAhoi3.p7F2UTntMdsY9bMc9O', 'pro', 59, '', 0, '2019-06-17 10:27:44', '2019-06-17 10:27:44', '0', '', 0, 0, 'avatar.jpg'),
(9, 'Jacques', 'Remy', 'albert_pinot@ens.univ-artois.fr', '$2y$10$cQKpKX8tn5Tf.nI3Jh8i5.ila1kL/sbSIlrSe4l9Ra/td8WrVH71K', 'etudiant', 62, '', 0, '2019-06-17 11:26:56', '2019-06-17 11:26:56', '0', '', 0, 0, 'avatar.jpg'),
(10, 'Robin', 'Biencourt', 'robin.biencourt@gmail.com', '$2y$10$MnMF1.0g73XOowCXdI1s2ONjdD9I1wb8AiAA1Poiq4kbwa/llAY9C', 'etudiant', 62, '', 0, '2019-06-17 17:14:11', '2019-06-17 17:14:11', '0', '', 0, 0, 'avatar.jpg');

--
-- Index pour les tables déchargées
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
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour les tables déchargées
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `competencesannonce`
--
ALTER TABLE `competencesannonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponsesannonces`
--
ALTER TABLE `reponsesannonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `swagger`
--
ALTER TABLE `swagger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
