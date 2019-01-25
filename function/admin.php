<?php

    // Ajouter un nouvel admin à la BDD
    function addAdmin($bdd, $pseudo, $password, $privilege){
        $req = $bdd->prepare("INSERT INTO admin 
                                        (id,
                                        pseudo,
                                        password,
                                        creation,
                                        last_connexion,
                                        avatar,
                                        privilege,
                                        ban)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $pseudo,
            $password,
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
            "lien_avatar_defaut",
            $privilege,
            "0"
        ]);
    }

?>