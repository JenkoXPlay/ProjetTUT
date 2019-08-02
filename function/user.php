<?php

    // Ajouter un utilisateur à la BDD
    function addUser($bdd, $prenom, $nom, $email, $password, $type_compte, $departement){
        $req = $bdd->prepare("INSERT INTO users 
                                        (id,
                                        prenom,
                                        nom,
                                        email,
                                        password,
                                        type_compte,
                                        departement,
                                        description,
                                        telephone,
                                        date_creation,
                                        date_last_connexion,
                                        avert,
                                        raison_ban,
                                        admin,
                                        premium,
                                        avatar)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $prenom,
            $nom,
            $email,
            $password,
            $type_compte,
            $departement,
            "",
            0,
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
            "0",
            "",
            false,
            false,
            "avatar.jpg"
        ]);
    }

    // suppression de tous les users
    function deleteAllUsers($bdd) {
        $req = $bdd->prepare("DELETE FROM users");
        $req->execute();
    }

    // suppression d'un utilisateur
    function deleteUser($bdd, $idUser) {
        $req = $bdd->prepare("DELETE FROM users WHERE id='$idUser'");
        $req->execute();
    }

    // lecture de tous les users
    function getAllUsers($bdd) {
        $req = $bdd->prepare("SELECT * FROM users");
        $req->execute();
        return $req;
    }

    // lecture d'un utilisateur par id
    function getIdUser($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM users WHERE id='$idUser'");
        $req->execute();
        return $req;
    }

    // lecture d'un utilisateur par mail
    function getMailUser($bdd, $mail) {
        $req = $bdd->prepare("SELECT * FROM users WHERE email='$mail'");
        $req->execute();
        return $req;
    }

    // lecture des etudiants
    function getUsersStatus($bdd, $status) {
        $req = $bdd->prepare("SELECT * FROM users WHERE type_compte='$status'");
        $req->execute();
        return $req;
    }

    // compteurs totals utilisateurs
    function countUsers($bdd, $type) {
        if ($type == "all") { // si tous les utilisateurs
            $req = $bdd->prepare("SELECT COUNT(*) AS countid FROM users");
        } else if ($type == "etudiant") { // si etudiant
            $req = $bdd->prepare("SELECT COUNT(*) AS countid FROM users WHERE type_compte='etudiant'");
        } else if ($type == "pro") { // si pro
            $req = $bdd->prepare("SELECT COUNT(*) AS countid FROM users WHERE type_compte='pro'");
        }
        $req->execute();
        $reqFetch = $req->fetch();
        return $reqFetch['countid'];
    }


    /*
        $req_count = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE candidat='{$dataUser['id']}'");
        $req_count_fetch = $req_count->fetch();
        if ($req_count_fetch['countid'] == 0) {
    */
?>