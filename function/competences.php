<?php

    function addCompetences($bdd, $competenceDe, $domaine, $competence, $level){
        $req= $bdd->prepare("INSERT INTO competences (id, competenceDe, domaine, competence, level) VALUES (?,?,?,?,?);");
        $req->execute([ 
            '',
            $competenceDe,
            $domaine,
            $competence,
            $level
         ]);
    }
    function deleteCompAll($bdd){
        $req= $bdd->prepare("DELETE FROM competences");
        $req->execute();
    }

    function deleteCompId($bdd,$idComp) {
        $req = $bdd->prepare("DELETE FROM competences WHERE id='$idComp'");
        $req->execute();
    }

    function deleteAllCompDe($bdd,$competenceDe) {
        $req = $bdd->prepare("DELETE FROM competences WHERE competenceDe='$competenceDe'");
        $req->execute();
    }
    
?>