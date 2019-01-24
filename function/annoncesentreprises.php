<?php

    // Ajouter une annonce à la BDD
    function addAnnonceCompany($bdd, $entreprise, $titre, $description, $typeAnnonce, $remuneration){
        $req = $bdd->prepare("INSERT INTO annoncesentreprises 
                                        (id,
                                        entreprise,
                                        titre,
                                        description,
                                        typeAnnonce,
                                        remuneration)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $entreprise,
            $titre,
            $description,
            $typeAnnonce,
            $remuneration
        ]);
    }

?>