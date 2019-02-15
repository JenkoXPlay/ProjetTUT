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

    // suppression de tous les admins
    function deleteAllAdmin($bdd) {
        $req = $bdd->prepare("DELETE FROM admin");
        $req->execute();
    }

    // suppression d'un compte admin
    function deleteAdmin($bdd, $idAdmin) {
        $req = $bdd->prepare("DELETE FROM admin WHERE id='$idAdmin'");
        $req->execute();
    }

    // lecture all
    function getAdmin($bdd) {
        $req = $bdd->prepare("SELECT * FROM admin");
        $req->execute();
        return $req;
    }

    // lecture par id
    function getAdminId($bdd, $id) {
        $req = $bdd->prepare("SELECT * FROM admin WHERE id='$id'");
        $req->execute();
        return $req;
    }

    // lecture par pseudo
    function getAdminPseudo($bdd, $pseudo) {
        $req = $bdd->prepare("SELECT * FROM admin WHERE pseudo='$pseudo'");
        $req->execute();
        return $req;
    }

?>