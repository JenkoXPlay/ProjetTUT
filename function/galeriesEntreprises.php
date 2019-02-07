<?php
    // Ajout GalerieEntreprises
    function addGalerieEntreprises($bdd,$idEntreprises,$lienPhoto ){
        $req= $bdd->prepare("INSERT INTO galerieEntreprises (id,idEntreprises,lienPhoto,ajoutDate) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $idEntreprises,
            $lienPhoto,
            date("Y-m-d H:i:s")
            
         ]);
    }
    // Delete All GalerieEntreprises
    function deleteGalerieEntreprisesAll($bdd){
        $req= $bdd->prepare("DELETE FROM galerieEntreprises");
        $req->execute();
    }
    // Delete Expérience by GalerieEntreprises
    function deleteGalerieEntreprisesId($bdd,$idGaleEntreprise){
        $req= $bdd->prepare("DELETE FROM galerieEntreprises WHERE id='$idGaleEntreprise'");
        $req->execute();
    }
    // Delete All Expérience by GalerieEntreprises
    function deleteAllGalerieEntreprises($bdd,$idEntreprise){
        $req= $bdd->prepare("DELETE FROM galerieEntreprises WHERE idEntreprises='$idEntreprise'");
        $req->execute();
    }
?>