<?php

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
?>