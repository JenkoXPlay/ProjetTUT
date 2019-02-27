<?php

    // Ajout Compétences
    function addCompetencesAnnonce($bdd, $annonce, $domaine, $competence, $level) {
        $req= $bdd->prepare("INSERT INTO competencesannonce (id, annonce, domaine, competence, level) VALUES (?,?,?,?,?);");
        $req->execute([ 
            '',
            $annonce,
            $domaine,
            $competence,
            $level
         ]);
    }

    // Delete All compétence
    function deleteCompAnnonceAll($bdd) {
        $req= $bdd->prepare("DELETE FROM competencesannonce;");
        $req->execute();
    }

    // Delete compétence by ID
    function deleteCompAnnonceId($bdd,$idComp) {
        $req = $bdd->prepare("DELETE FROM competencesannonce WHERE id='$idComp'");
        $req->execute();
    }

    // Delete All compétence by annonce
    function deleteAllCompAnnonce($bdd,$annonce) {
        $req = $bdd->prepare("DELETE FROM competencesannonce WHERE annonce='$annonce'");
        $req->execute();
    }

    // Get All compétence
    function getAllCompAnnonce($bdd) {
        $req = $bdd->prepare("SELECT * FROM competencesannonce");
        $req->execute();
        return $req;

    }

    // Get compétence by ID
    function getIdCompAnnonce($bdd,$idComp) {
        $req = $bdd->prepare("SELECT * FROM competencesannonce WHERE id='$idComp'");
        $req->execute();
        return $req;
    } 

    // Get All compétence by annonce 
    function getAllCompAnnonce($bdd,$annonce) {
        $req = $bdd->prepare("SELECT * FROM competencesannonce WHERE annonce='$annonce'");
        $req->execute();
        return $req;
    } 

?>