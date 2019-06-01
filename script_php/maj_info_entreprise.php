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
                    $newAvatar = $_FILES['avatar']['name'];
                    if ($newAvatar) {
                        $extensions_valides = array('jpg', 'jpeg', 'png');
                        $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                        if (in_array($extension_upload,$extensions_valides)) {
                            $newNameAvatar = $dataUser['id'].md5(uniqid(rand(), true)).'.'.$extension_upload;
                            $uploadDuFichier = move_uploaded_file($_FILES['avatar']['tmp_name'],'./avatar/'.$newNameAvatar);
                            if ($uploadDuFichier) {
                                if ($dataEntreprise['logo'] != "avatar.jpg") {
                                    unlink('./avatar/'.$dataEntreprise['logo']);
                                }
                                $avatar = $newNameAvatar;
                            } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                        } else echo "<div class='alertError'>L'extension n'est pas valide !</div><br />";
                    }
                    $req = $bdd->exec("UPDATE entreprises SET nom='$nom', description='$description', logo='$avatar', departement='$departement', but='$but', typeEntreprise='$typeEntreprise', siren='$numSiren', siteweb='$siteWeb' WHERE responsable='{$dataUser['id']}'");
                    echo "<div class='alertSuccess width_50 marginAuto'>Votre entreprise a été mise à jour !<br />Redirection en cours...</div><br />";
                    ?><head><meta http-equiv="refresh" content="2;URL=/editentreprise" /></head><?php
                
                }else echo "<div class='alertError width_50 marginAuto'>Le département n'est pas valide !</div><br />";
            } else echo "<div class='alertError width_50 marginAuto'>Le numéro de SIREN n'est pas valide !</div><br />";
        } else echo "<div class='alertError width_50 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>