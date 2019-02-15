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

    // lecture all entreprise
    function getAllEntreprise($bdd) {
        $req = $bdd->prepare("SELECT * FROM entreprises");
        $req->execute();
        return $req;
    }

    // lecture entreprise par id
    function getEntrepriseId($bdd, $idEntreprise) {
        $req = $bdd->prepare("SELECT * FROM entreprises WHERE id='$idEntreprise'");
        $req->execute();
        return $req;
    }

    // lecture entreprise par responsable
    function getEntrepriseResponsable($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM entreprises WHERE responsable='$idUser'");
        $req->execute();
        return $req;
    }

    // lecture entreprise par nom
    function getEntrepriseNom($bdd, $nom) {
        $req = $bdd->prepare("SELECT * FROM entreprises WHERE nom='$nom'");
        $req->execute();
        return $req;
    }

    // lecture entreprise par siret
    function getEntrepriseSiret($bdd, $siret) {
        $req = $bdd->prepare("SELECT * FROM entreprises WHERE siret='$siret'");
        $req->execute();
        return $req;
    }

    // lecture entreprise par type
    function getEntrepriseType($bdd, $typeCompany) {
        $req = $bdd->prepare("SELECT * FROM entreprises WHERE typeEntreprise='$typeCompany'");
        $req->execute();
        return $req;
    }

?>