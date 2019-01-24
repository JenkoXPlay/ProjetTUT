<?php

    // Ajouter une entreprise à la BDD
    function addCompany($bdd, $responsable, $nom, $description, $logo, $but, $typeEntreprise, $siret){
        $req = $bdd->prepare("INSERT INTO entreprises 
                                        (id,
                                        responsable,
                                        nom,
                                        description,
                                        logo,
                                        but,
                                        typeEntreprise,
                                        siret)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $responsable,
            $nom,
            $description,
            $logo,
            $but,
            $typeEntreprise,
            $siret
        ]);
    }

?>