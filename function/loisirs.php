<?php
    // Ajout loisirs
    function addLoisirs($bdd, $loisirDe, $nomLoisir, $description){
        $req= $bdd->prepare("INSERT INTO loisirs (id, loisirDe, nomLoisir, description) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $loisirDe,
            $nomLoisir,
            $description
         ]);
    }
    function deleteLoisirAll($bdd){
        $req= $bdd->prepare("DELETE FROM loisirs");
        $req->execute();
    }
    function deleteLoisirId($bdd,$idLoisirs){
        $req= $bdd->prepare("DELETE FROM loisirs WHERE id='$idLoisirs'");
        $req->execute();
    }
    function deleteLoisirsId($bdd,$loisirsDe){
        $req= $bdd->prepare("DELETE FROM loisirs WHERE loisirDe='$loisirsDe'");
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