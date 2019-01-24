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

?>