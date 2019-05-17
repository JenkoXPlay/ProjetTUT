<?php

    // Ajouter un nouvel contact à la BDD
    function addContact($bdd, $nom_complet, $email, $sujet, $message){
        $req = $bdd->prepare("INSERT INTO contact 
                                        (id,
                                        nom_complet,
                                        email,
                                        sujet,
                                        message,
                                        date_ajout)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute([
            '',
            $nom_complet,
            $email,
            $sujet,
            $message,
            date("Y-m-d H:i:s")
        ]);
    }

    // suppression de tous les contact
    function deleteAllContact($bdd) {
        $req = $bdd->prepare("DELETE FROM contact");
        $req->execute();
    }

    // suppression d'un contact
    function deleteContactId($bdd, $idContact) {
        $req = $bdd->prepare("DELETE FROM contact WHERE id='$idContact'");
        $req->execute();
    }

    // get tous les contacts
    function getAllContact($bdd) {
        $req = $bdd->prepare("SELECT * FROM contact");
        $req->execute();
        return $req;
    }

    // get contact par id
    function getContactId($bdd, $idContact) {
        $req = $bdd->prepare("SELECT * FROM contact WHERE id='$idContact'");
        $req->execute();
        return $req;
    }

    // get tous les contacts d'une adresse mail
    function getContactEmail($bdd, $email) {
        $req = $bdd->prepare("SELECT * FROM contact WHERE email='$email'");
        $req->execute();
        return $req;
    }

?>