<?php
    $tabSujet = [
        "Demande de partenariat", // 0
        "Problème avec votre compte", // 1
        "Bug(s) trouvé(s)", // 2
        "Proposer une amélioration", // 3
        "Donner un avis sur le site", // 4
        "Demande d'informations", // 5
        "Autre..." // 6
    ];
    $longTabSujet = 6; // longueur du tableau

    if (isset($_POST['subContact'])) {
        $nom_complet = security($_POST['nom_complet']);
        $email = security($_POST['email']);
        $sujet = security($_POST['sujet']);
        $message = security($_POST['message']);
        if ($nom_complet && $email && $sujet && $message) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($sujet != "Sujet du message") {
                    if (in_array($sujet, $tabSujet)) {
                        $ajout_contact = addContact($bdd, $nom_complet, $email, $sujet, $message);
                        echo "<div class='alertSuccess width_50 marginAuto'>Votre message a été envoyé !</div><br />";
                    } else echo "<div class='alertError width_50 marginAuto'>Le sujet n'est pas correct !</div><br />";
                } else echo "<div class='alertError width_50 marginAuto'>Le sujet n'est pas correct !</div><br />";
            } else echo "<div class='alertError width_50 marginAuto'>L'adresse email n'est pas correcte !</div><br />";
        } else echo "<div class='alertError width_50 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>