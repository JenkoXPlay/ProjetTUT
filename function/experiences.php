<?php

    function addExperience($bdd, $expDe, $nomEntreprise, $ville, $anneDebut, $anneeFin, $dureeTotal, $typeContrat, $poste){
        $req= $bdd->prepare("INSERT INTO ProjetTut_experiences (id, expDe, nomEntreprise, ville, anneeDebut, anneeFin, dureeTotal, typeContrat, poste) VALUES (?,?,?,?,?,?,?,?,?)");
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
    function deleteExpAll($bdd){
        $req= $bdd->prepare("DELETE FROM ProjetTut_experiences");
        $req->execute();
    }
    function deleteExpId($bdd,$idExp){
        $req= $bdd->prepare("DELETE FROM ProjetTut_experiences WHERE id='$idExp'");
        $req->execute();
    }
    function deleteAllExpDe($bdd,$ExpDe){
        $req= $bdd->prepare("DELETE FROM ProjetTut_experiences WHERE expDe='$ExpDe'");
        $req->execute();
    }
    
?>