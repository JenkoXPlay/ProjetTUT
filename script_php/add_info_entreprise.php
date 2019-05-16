<?php
    if(isset($_POST['submitEntreprise'])){
        $nom = security($_POST['nom']);
        $siteWeb = security($_POST['site']);
        $description = security($_POST['description']);
        $numSiren = security($_POST['siren']);
        $departement = security($_POST['departement']);
        $but = security($_POST['but']);
        $typeEntreprise = security($_POST['typeEntreprise']);
        if ($nom&&$siteWeb&&$description&&$numSiren&&$departement&&$typeEntreprise&&$but) {
            if (is_numeric($numSiren)&&strlen($numSiren)== 9) {
                if (is_numeric($departement)&&($departement > 0 && $departement <= 95)) {

                    $req = addCompany($bdd, $dataUser['id'], $nom, $description, 'avatar.jpg', $but, $typeEntreprise, $numSiren, $departement, $siteWeb);
                    ?><meta http-equiv="refresh" content="2;URL=/editentreprise" /></head><?php
                    echo "<div class='alertSuccess width_50 marginAuto'>Votre entreprise à été crée !</div><br />";

                }else echo "<div class='alertError width_50 marginAuto'>Le département n'est pas valide !</div><br />";
            } else echo "<div class='alertError width_50 marginAuto'>Le numéro de SIREN n'est pas valide !</div><br />";
        } else echo "<div class='alertError width_50 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>