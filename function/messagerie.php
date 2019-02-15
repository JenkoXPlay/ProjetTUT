<?php

    // Ajouter un nouveau message à la BDD
    function addMessage($bdd, $sender, $destinataire, $message){
        $req = $bdd->prepare("INSERT INTO messagerie 
                                        (sender,
                                        destinataire,
                                        message,
                                        etat_msg,
                                        date_msg)
                                VALUES (?, ?, ?, ?, NOW())");
        $req->execute([
            $sender,
            $destinataire,
            $message,
            false
        ]);
    }

    // suppression tous les messages
    function deleteAllMsg($bdd) {
        $req = $bdd->prepare("DELETE FROM messagerie");
        $req->execute();
    }

    // suppression par id
    function deleteMsgId($bdd, $idMsg) {
        $req = $bdd->prepare("DELETE FROM messagerie WHERE id='$idMsg'");
        $req->execute();
    }

    // suppression par sender
    function deleteMsgSender($bdd, $idSender) {
        $req = $bdd->prepare("DELETE FROM messagerie WHERE sender='$idSender'");
        $req->execute();
    }

    // suppression par destinataire
    function deleteMsgDestinataire($bdd, $idDest) {
        $req = $bdd->prepare("DELETE FROM messagerie WHERE destinataire='$idDest'");
        $req->execute();
    }

    // lecture all
    function getMsg($bdd) {
        $req = $bdd->prepare("SELECT * FROM messagerie");
        $req->execute();
        return $req;
    }

    // lecture par id
    function getMsgId($bdd, $idMsg) {
        $req = $bdd->prepare("SELECT * FROM messagerie WHERE id='$idMsg'");
        $req->execute();
        return $req;
    }

    // lecture par sender
    function getMsgSender($bdd, $idSender) {
        $req = $bdd->prepare("SELECT * FROM messagerie WHERE sender='$idMsg'");
        $req->execute();
        return $req;
    }

    // lecture par destinataire
    function getMsgDestinataire($bdd, $idDest) {
        $req = $bdd->prepare("SELECT * FROM messagerie WHERE destinataire='$idDest'");
        $req->execute();
        return $req;
    }

    // lecture all
    function getMsgSenderDestinataire($bdd, $idSender, $idDest) {
        $req = $bdd->prepare("SELECT * FROM messagerie WHERE sender='$idSender' AND destinataire='$idDest'");
        $req->execute();
        return $req;
    }

?>