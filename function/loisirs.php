<?php

    function addLoisirs($bdd, $loisirDe, $nomLoisir, $description){
        $req= $bdd->prepare("INSERT INTO ProjetTut_loisirs (id, loisirDe, nomLoisir, description) VALUES (?,?,?,?)");
        $req->execute([ 
            '',
            $loisirDe,
            $nomLoisir,
            $description
         ]);
    }
    
?>