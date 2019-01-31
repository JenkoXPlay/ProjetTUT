<?php

    function addGaleriesEntreprises($bdd,$idEntreprises,$lienPhoto ){
        $req= $bdd->prepare("INSERT INTO ProjetTut_galeriesEntreprises (id,idEntreprises,lienPhoto,ajoutDate) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $idEntreprises,
            $lienPhoto,
            date("Y-m-d H:i:s")
            
         ]);
    }
    function deleteGaleriesEntreprisesAll($bdd){
        $req= $bdd->prepare("DELETE FROM ProjetTut_galeriesEntreprises");
        $req->execute();
    }
    function deleteGaleriesEntreprisesId($bdd,$idGaleEntreprise){
        $req= $bdd->prepare("DELETE FROM ProjetTut_galeriesEntreprises WHERE id='$idGaleEntreprise'");
        $req->execute();
    }
    function deleteAllGaleriesEntreprises($bdd,$idEntreprise){
        $req= $bdd->prepare("DELETE FROM ProjetTut_galeriesEntreprises WHERE idEntreprises='$idEntreprise'");
        $req->execute();
    }
?>