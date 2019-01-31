<?php

    // Ajouter une reponse à une annonce à la BDD
    function addRepAnnonce($bdd, $idAnnoncesEntreprises, $candidat, $entreprise){
        $req = $bdd->prepare("INSERT INTO reponsesannonces 
                                        (id,
                                        idAnnoncesEntreprises,
                                        candidat,
                                        entreprise,
                                        datePostuler,
                                        notif)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $idAnnoncesEntreprises,
            $candidat,
            $entreprise,
            date("Y-m-d H:i:s"),
            false
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

?>