<?php

    function addCompetences($bdd, $competenceDe, $domaine, $competence, $level){
        $req= $bdd->prepare("INSERT INTO ProjetTut_competences (id, competenceDe, domaine, competence, level) VALUES (?,?,?,?,?)");
        $req->execute([ 
            '',
            "1",
            "dfdgffd",
            $competence,
            $level
         ]);
    }
    
?>