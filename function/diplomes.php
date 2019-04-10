<?php

    // Ajouter un nouveau diplome à la BDD
    function addDiplome($bdd, $idUser, $nomDiplome, $anneeObtention, $etablissement, $description){
        $req = $bdd->prepare("INSERT INTO diplomes 
                                        (id,
                                        user,
                                        nom_diplome,
                                        annee_obtention,
                                        etablissement,
                                        description)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $idUser,
            $nomDiplome,
            $anneeObtention,
            $etablissement,
            $description
        ]);
    }

    // suppression de tous les diplomes
    function deleteAllDiplomes($bdd) {
        $req = $bdd->prepare("DELETE FROM diplomes");
        $req->execute();
    }

    // suppression d'un diplome
    function deleteDiplome($bdd, $idDiplome) {
        $req = $bdd->prepare("DELETE FROM diplomes WHERE id='$idDiplome'");
        $req->execute();
    }

    // suppression de tous les diplomes d'un user
    function deleteDiplomeUser($bdd, $idUSer) {
        $req = $bdd->prepare("DELETE FROM diplomes WHERE user='$idUSer'");
        $req->execute();
    }

    // lecture all
    function getDiplomes($bdd) {
        $req = $bdd->prepare("SELECT * FROM diplomes");
        $req->execute();
        return $req;
    }

    // lecture par id
    function getDiplomeId($bdd, $id) {
        $req = $bdd->prepare("SELECT * FROM diplomes WHERE id='$id'");
        $req->execute();
        return $req;
    }

    // lecture par user
    function getDiplomeUser($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM diplomes WHERE user='$idUser'");
        $req->execute();
        return $req;
    }

?>