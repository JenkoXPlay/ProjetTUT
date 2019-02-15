<?php

    // ajout exp
    function addExperience($bdd, $expDe, $nomEntreprise, $ville, $anneDebut, $anneeFin, $dureeTotal, $typeContrat, $poste){
        $req= $bdd->prepare("INSERT INTO experiences (id, expDe, nomEntreprise, ville, anneeDebut, anneeFin, dureeTotal, typeContrat, poste) VALUES (?,?,?,?,?,?,?,?,?)");
        $req->execute([ 
            '',
            $expDe,
            $nomEntreprise,
            $ville,
            $anneDebut,
            $anneeFin, 
            $dureeTotal, 
            $typeContrat, 
            $poste
         ]);
    }

    // suppression all exp
    function deleteExpAll($bdd){
        $req = $bdd->prepare("DELETE FROM experiences");
        $req->execute();
    }

    // suppression exp par id
    function deleteExpId($bdd,$idExp){
        $req = $bdd->prepare("DELETE FROM experiences WHERE id='$idExp'");
        $req->execute();
    }

    // suppresion exp par id de
    function deleteAllExpDe($bdd,$ExpDe){
        $req = $bdd->prepare("DELETE FROM experiences WHERE expDe='$ExpDe'");
        $req->execute();
    }

    // lecture all exp
    function getAllExp($bdd) {
        $req = $bdd->prepare("SELECT * FROM experiences");
        $req->execute();
        return $req;
    }

    // lecture exp par id
    function getExpId($bdd, $idExp) {
        $req = $bdd->prepare("SELECT * FROM experiences WHERE id='$idExp'");
        $req->execute();
        return $req;
    }

    // lecture exp de
    function getExpDe($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM experiences WHERE expDe='$idUser'");
        $req->execute();
        return $req;
    }
    
?>