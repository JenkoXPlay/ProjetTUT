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

    // suppression toutes les entreprises
    function deleteAllCompany($bdd) {
        $req = $bdd->prepare("DELETE FROM entreprises");
        $req->execute();
    }

    // suppression une entreprise par son id
    function deleteCompanyId($bdd, $idCompany) {
        $req = $bdd->prepare("DELETE FROM entreprises WHERE id='$idCompany'");
        $req->execute();
    }

    // suppression entreprises par responsable
    function deleteCompanyResponsable($bdd, $idResponsable) {
        $req = $bdd->prepare("DELETE FROM entreprises WHERE responsable='$idResponsable'");
        $req->execute();
    }

?>