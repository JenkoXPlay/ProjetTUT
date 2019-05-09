<?php

    // Ajout Compétences
    function addCompetences($bdd, $competenceDe, $domaine, $competence, $level) {
        $req= $bdd->prepare("INSERT INTO competences (id, competenceDe, domaine, competence, level) VALUES (?,?,?,?,?);");
        $req->execute([ 
            '',
            $competenceDe,
            $domaine,
            $competence,
            $level
         ]);
    }

    // Delete All compétence
    function deleteCompAll($bdd) {
        $req= $bdd->prepare("DELETE FROM competences;");
        $req->execute();
    }

    // Delete compétence by ID
    function deleteCompId($bdd,$idComp) {
        $req = $bdd->prepare("DELETE FROM competences WHERE id='$idComp'");
        $req->execute();
    }

    // Delete All compétence by competenceDe
    function deleteAllCompDe($bdd,$competenceDe) {
        $req = $bdd->prepare("DELETE FROM competences WHERE competenceDe='$competenceDe'");
        $req->execute();
    }

    // Get All compétence
    function getAllComp($bdd) {
        $req = $bdd->prepare("SELECT * FROM competences");
        $req->execute();
        return $req;

    }

    // Get compétence by ID
    function getIdComp($bdd,$idComp) {
        $req = $bdd->prepare("SELECT * FROM competences WHERE id='$idComp'");
        $req->execute();
        return $req;
    } 

    // Get All compétence by competenceDe 
    function getAllCompDe($bdd,$competenceDe) {
        $req = $bdd->prepare("SELECT * FROM competences WHERE competenceDe='$competenceDe'");
        $req->execute();
        return $req;
    } 

?>