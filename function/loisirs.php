<?php
    // Ajout loisirs
    function addLoisirs($bdd, $loisirDe, $nomLoisir, $description){
        $req= $bdd->prepare("INSERT INTO ProjetTut_loisirs (id, loisirDe, nomLoisir, description) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $loisirDe,
            $nomLoisir,
            $description
         ]);
    }
    // Delete All loisirs
    function deleteLoisirsAll($bdd){
        $req= $bdd->prepare("DELETE FROM loisirs");
        $req->execute();
    }
    // Delete loisirs by ID
    function deleteLoisirsId($bdd,$idLoisirs){
        $req= $bdd->prepare("DELETE FROM loisirs WHERE id='$idLoisirs'");
        $req->execute();
    }
    // Delete All loisirs by loisirDe
    function deleteAllLoisirsDe($bdd,$loisirDe){
        $req= $bdd->prepare("DELETE FROM loisirs WHERE loisirDe='$loisirDe'");
        $req->execute();
    }
    // Get All loisirs
    function getAllLoisirs($bdd){
        $req=$bdd->prepare("SELECT * FROM loisirs");
        $req->execute();
        return $req;
    }
    // Get loisirs by ID
    function getLoisirsId($bdd,$idLoisirs){
        $req=$bdd->prepare("SELECT * FROM loisirs WHERE id='$idLoisirs'");
        $req->execute();
        return $req;
    }
    // Get All loisirs by loisirDe 
    function getAllLoisirsDe($bdd,$loisirDe){
        $req=$bdd->prepare("SELECT * FROM loisirs WHERE loisirDe='$loisirsDe'");
        $req->execute();
        return $req;
    }
?>