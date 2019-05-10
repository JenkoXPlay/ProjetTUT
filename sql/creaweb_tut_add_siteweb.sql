-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 10 Mai 2019 à 07:56
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
  `departement` int(5) NOT NULL,
  `siteweb` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `responsable`, `nom`, `description`, `logo`, `but`, `typeEntreprise`, `siret`, `departement`, `siteweb`) VALUES
(5, 1, 'mlklklmkm', 'lmkmlkmk', 'avatar.jpg', 'kmklmkmlk', 'pme', 'lmkmkmlk', 59, 'http://www.google.fr'),
(6, 4, 'IBM', 'Best Company', 'avatar.jpg', 'lkjlkjlkjl', 'ge', 'lsjkflsdjkfljlkdsf', 62, 'http://www.google.fr'),
(7, 10, 'JOUVE', 'Imprimerie, Métiers du numérique', 'avatar.jpg', 'Mettre le numériques en avant', 'SII', '122545121', 62, 'http://www.google.fr'),
(8, 5, 'MBS communication', 'dfdfdfd', 'avatar.jpg', 'dfdfd', 'SA', '789961', 59, 'http://www.google.fr'),
(9, 13, 'Hopital de Lens', '', 'avatar.jpg', '', 'Hopital', '1248541', 62, 'http://www.google.fr'),
(10, 15, 'Worldline', 'dfdgd', 'avatar.jpg', 'dfdfgf', 'SA', '89784534', 75, 'http://www.google.fr'),
(11, 11, 'Polyclinique', 'rfgfg', 'avatar.jpg', 'fdfgfg', 'SA', '54654654', 93, 'http://www.google.fr'),
(12, 6, 'GG Style', 'avoir le style', 'avatar.jpg', 'toujours plus de style', 'SI', '4787891561', 93, 'http://www.google.fr');

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
(93, 'get', 'users', 'getMailUser($bdd, $mail)', 'Récupération des infos d&#039;un utilisateur par son adresse mail');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsable` (`responsable`,`nom`,`typeEntreprise`),
  ADD KEY `typeEntreprise` (`typeEntreprise`),
  ADD KEY `departement` (`departement`);

--
-- Index pour la table `swagger`
--
ALTER TABLE `swagger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `type` (`type`),
  ADD KEY `type_2` (`type`,`categorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `swagger`
--
ALTER TABLE `swagger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
