<?php

    function addLoisirs($bdd, $loisirDe, $nomLoisir, $description){
        $req= $bdd->prepare("INSERT INTO ProjetTut_loisirs (id, loisirDe, nomLoisir, description) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $loisirDe,
            $nomLoisir,
            $description
         ]);
    }
    function deleteLoisirAll($bdd){
        $req= $bdd->prepare("DELETE FROM ProjetTut_loisirs");
        $req->execute();
    }
    function deleteLoisirId($bdd,$idLoisirs){
        $req= $bdd->prepare("DELETE FROM ProjetTut_loisirs WHERE id='$idLoisirs'");
        $req->execute();
    }
    function deleteLoisirsId($bdd,$loisirsDe){
        $req= $bdd->prepare("DELETE FROM ProjetTut_loisirs WHERE loisirDe='$loisirsDe'");
        $req->execute();
    }
?>