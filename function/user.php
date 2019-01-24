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

?>