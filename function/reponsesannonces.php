<?php

    // Ajouter une reponse à une annonce à la BDD
    function addRepAnnonce($bdd, $idAnnoncesEntreprises, $candidat, $entreprise){
        $req = $bdd->prepare("INSERT INTO reponsesannonces 
                                        (id,
                                        idAnnoncesEntreprises,
                                        candidat,
                                        entreprise,
                                        datePostuler,
                                        notif,
                                        reponse)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $idAnnoncesEntreprises,
            $candidat,
            $entreprise,
            date("Y-m-d H:i:s"),
            false,
            'attente'
        ]);
    }

    // suppression tous les rep annonces
    function deleteAllRep($bdd) {
        $req = $bdd->prepare("DELETE FROM reponsesannonces");
        $req->execute();
    }

    // suppresion par id
    function deleteRepId($bdd, $idRep) {
        $req = $bdd->prepare("DELETE FROM reponsesannonces WHERE id='$idRep'");
        $req->execute();
    }

    // suppresion par annonces
    function deleteRepAnnonce($bdd, $idAnnonce) {
        $req = $bdd->prepare("DELETE FROM reponsesannonces WHERE idAnnoncesEntreprises='$idAnnonce'");
        $req->execute();
    }

    // suppresion par candidat
    function deleteRepCandidat($bdd, $idCandidat) {
        $req = $bdd->prepare("DELETE FROM reponsesannonces WHERE candidat='$idCandidat'");
        $req->execute();
    }

    // suppresion par entreprise
    function deleteRepEntreprise($bdd, $idEntreprise) {
        $req = $bdd->prepare("DELETE FROM reponsesannonces WHERE entreprise='$idEntreprise'");
        $req->execute();
    }

    // lecture all
    function getRepAnnonce($bdd) {
        $req = $bdd->prepare("SELECT * FROM reponsesannonces");
        $req->execute();
        return $req;
    }

    // lecture id
    function getRepEntrepriseId($bdd, $idRep) {
        $req = $bdd->prepare("SELECT * FROM reponsesannonces WHERE id='$idRep'");
        $req->execute();
        return $req;
    }

    // lecture id de l'annonce
    function getRepAnnonceId($bdd, $idAnnonce) {
        $req = $bdd->prepare("SELECT * FROM reponsesannonces WHERE idAnnoncesEntreprises='$idAnnonce'");
        $req->execute();
        return $req;
    }

    // lecture par candidat
    function getRepEntrepriseIdCandidat($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM reponsesannonces WHERE candidat='$idUser'");
        $req->execute();
        return $req;
    }

    // lecture par entreprise
    function getRepEntreprise($bdd, $idCompany) {
        $req = $bdd->prepare("SELECT * FROM reponsesannonces WHERE entreprise='$idCompany'");
        $req->execute();
        return $req;
    }

?>