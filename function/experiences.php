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
    
?>