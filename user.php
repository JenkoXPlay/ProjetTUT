<?php

    function addUser($bdd, $pseudo, $password, $description){
        $req = $bdd->prepare("INSERT INTO user (id, pseudo, password, description) VALUES (?, ?, ?, ?)");
        $req->execute([
            '',
            $pseudo,
            $password,
            $description
        ]);
    }

?>