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

    // suppression toutes annonces
    function deleteAllAnnonces($bdd) {
        $req = $bdd->prepare("DELETE FROM annoncesentreprises");
        $req->execute();
    }

    // suppression annonce par id
    function deleteAnnonceId($bdd, $idAnnonce) {
        $req = $bdd->prepare("DELETE FROM annoncesentreprises WHERE id='$idAnnonce'");
        $req->execute();
    }

    // suppression annonce par entreprise
    function deleteAnnonceCompany($bdd, $idCompany) {
        $req = $bdd->prepare("DELETE FROM annoncesentreprises WHERE entreprise='$idCompany'");
        $req->execute();
    }

?>