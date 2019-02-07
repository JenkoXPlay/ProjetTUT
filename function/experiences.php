<?php
    // Ajout Expérience
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
    // Delete All Expérience
    function deleteExpAll($bdd){
        $req= $bdd->prepare("DELETE FROM experiences");
        $req->execute();
    }
    // Delete Expérience by ID
    function deleteExpId($bdd,$idExp){
        $req= $bdd->prepare("DELETE FROM experiences WHERE id='$idExp'");
        $req->execute();
    }
    // Delete All Expérience by competenceDe
    function deleteAllExpDe($bdd,$ExpDe){
        $req= $bdd->prepare("DELETE FROM experiences WHERE expDe='$ExpDe'");
        $req->execute();
    }
    
?>