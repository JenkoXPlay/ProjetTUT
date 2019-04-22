<?php
    if (isset($_POST['submitExpPro'])) {
        $poste = security($_POST['poste']);
        $typeContrat = security($_POST['typeContrat']);
        $entreprise = security($_POST['entreprise']);
        $ville = security($_POST['ville']);
        $date_debut = security($_POST['date_debut']);
        $date_fin = security($_POST['date_fin']);
        $description = security($_POST['description']);
        if ($poste&&$typeContrat&&$entreprise&&$ville&&$date_debut&&$date_fin&&$description) {
            if (strlen($description) >= 10) {
                $req = addExperience($bdd, $dataUser['id'], $poste, $typeContrat, $entreprise, $ville, $date_debut, $date_fin, $description);
                echo "<div class='alertSuccess'>Votre expérience a été rajoutée !</div><br />";
                ?><head><meta http-equiv="refresh" content="2;URL=/editprofile" /></head><?php
            } else echo "<div class='alertError'>Veuillez mettre une description plus longue !</div><br />";
        } else echo "<div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    }
?>