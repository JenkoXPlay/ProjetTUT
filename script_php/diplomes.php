<?php
    if (isset($_POST['submitFormation'])) {
        $nom_diplome = security($_POST['nom_diplome']);
        $annee_obtention = security($_POST['annee_obtention']);
        $etablissement = security($_POST['etablissement']);
        $description = security($_POST['description']);
        if ($nom_diplome&&$annee_obtention&&$etablissement&&$description) {
            if (is_numeric($annee_obtention) && strlen($annee_obtention) == 4) {
                if (strlen($description) >= 10) {
                    $req = addDiplome($bdd, $dataUser['id'], $nom_diplome, $annee_obtention, $etablissement, $description);
                    echo "<div class='alertSuccess'>Votre diplôme a été ajouté !</div><br />";
                    ?><head><meta http-equiv="refresh" content="2;URL=/editprofile" /></head><?php
                } else echo "<div class='alertError'>La description est trop courte !</div><br />";
            } else echo "<div class='alertError'>L'année d'obtention n'est pas correcte !</div><br />";
        } else echo "<div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    }
?>