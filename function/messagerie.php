<?php

    // Ajouter un nouveau message à la BDD
    function addMessage($bdd, $sender, $destinataire, $message){
        $req = $bdd->prepare("INSERT INTO messagerie 
                                        (id,
                                        sender,
                                        destinataire,
                                        message,
                                        etat_msg,
                                        date_msg)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $sender,
            $destinataire,
            $message,
            false,
            date("Y-m-d H:i:s")
        ]);
    }

?>