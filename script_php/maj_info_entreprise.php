<?php
    if (isset($_POST['submitEntreprise'])) {

        $avatar = $dataEntreprise['logo'];
        $nom = security($_POST['nom']);
        $siteWeb = security($_POST['site']);
        $description = security($_POST['description']);
        $numSiren = security($_POST['siren']);
        $departement = security($_POST['departement']);
        $but = security($_POST['but']);
        $typeEntreprise =security($_POST['typeEntreprise']);
        if ($nom&&$siteWeb&&$description&&$numSiren&&$departement&&$typeEntreprise&&$but) {
            if (is_numeric($numSiren)&&strlen($numSiren)== 9) {
                if (is_numeric($departement)&&($departement > 0 && $departement <= 95)) {

                    /*Import Script upload avatar*/

                    $req = $bdd->exec("UPDATE entreprises SET nom='$nom', description='$description', logo='$logo', departement='$departement', but='$but', typeEntreprise='$typeEntreprise', siren='$numSiren', siteweb='$siteWeb' WHERE responsable='{$dataUser['id']}'");
                    echo "<div class='alertSuccess width_50 marginAuto'>Votre entreprise a été mise à jour !<br />Redirection en cours...</div><br />";
                    ?><head><meta http-equiv="refresh" content="2;URL=/editentreprise" /></head><?php
                
                }else echo "<div class='alertError width_50 marginAuto'>Le département n'est pas valide !</div><br />";
            } else echo "<div class='alertError width_50 marginAuto'>Le numéro de SIREN n'est pas valide !</div><br />";
        } else echo "<div class='alertError width_50 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>