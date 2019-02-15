<?php

    function addGalerieEntreprises($bdd,$idEntreprises,$lienPhoto ){
        $req= $bdd->prepare("INSERT INTO galerie_entreprises (id,idEntreprises,lienPhoto,ajoutDate) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $idEntreprises,
            $lienPhoto,
            date("Y-m-d H:i:s")
         ]);
    }

    // suppression all
    function deleteGalerieEntreprisesAll($bdd){
        $req= $bdd->prepare("DELETE FROM galerie_entreprises");
        $req->execute();
    }

    // suppression par id
    function deleteGalerieEntreprisesId($bdd, $idGaleEntreprise){
        $req= $bdd->prepare("DELETE FROM galerie_entreprises WHERE id='$idGaleEntreprise'");
        $req->execute();
    }

    // suppression par id entreprise
    function deleteAllGalerieEntreprises($bdd, $idEntreprise){
        $req= $bdd->prepare("DELETE FROM galerie_entreprises WHERE idEntreprises='$idEntreprise'");
        $req->execute();
    }

    // lecture all
    function getGalerieEntreprises($bdd) {
        $req = $bdd->prepare("SELECT * FROM galerie_entreprises");
        $req->execute();
        return $req;
    }

    // lecture par id
    function getGalerieEntreprisesId($bdd, $idGalComp) {
        $req = $bdd->prepare("SELECT * FROM galerie_entreprises WHERE id='$idGalComp'");
        $req->execute();
        return $req;
    }
?>