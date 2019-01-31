<?php

    function addCompetences($bdd, $competenceDe, $domaine, $competence, $level){
        $req= $bdd->prepare("INSERT INTO ProjetTut_competences (id, competenceDe, domaine, competence, level) VALUES (?,?,?,?,?);");
        $req->execute([ 
            '',
            $competenceDe,
            $domaine,
            $competence,
            $level
         ]);
    }
    function deleteCompAll($bdd){
        $req= $bdd->prepare("DELETE FROM ProjetTut_competences;");
        $req->execute();
    }

    function deleteCompId($bdd,$idComp) {
        $req = $bdd->prepare("DELETE FROM ProjetTut_competences WHERE id='$idComp'");
        $req->execute();
    }

    function deleteAllCompDe($bdd,$competenceDe) {
        $req = $bdd->prepare("DELETE FROM ProjetTut_competences WHERE competenceDe='$competenceDe'");
        $req->execute();
    }
    
?>