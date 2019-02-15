<?php

    // Ajouter un utilisateur à la BDD
    function addUser($bdd, $prenom, $nom, $email, $password, $type_compte){
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
                                        premium)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $prenom,
            $nom,
            $email,
            $password,
            $type_compte,
            0,
            "",
            0,
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
            "0",
            "",
            false,
            false
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

    // lecture d'un utilisateur
    function getIdUser($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM users WHERE id='$idUser'");
        $req->execute();
        return $req;
    }

    // lecture des etudiants
    function getUsersStatus($bdd, $status) {
        $req = $bdd->prepare("SELECT * FROM users WHERE type_compte='$status'");
        $req->execute();
        return $req;
    }

?>