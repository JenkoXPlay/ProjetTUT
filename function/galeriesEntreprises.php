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
    
?>