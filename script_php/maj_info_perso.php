<?php
    if (isset($_POST['submitPerso'])) {
        $prenom = security($_POST['prenom']);
        $nom = security($_POST['nom']);
        $email = security($_POST['email']);
        $telephone = security($_POST['telephone']);
        $departement = security($_POST['departement']);
        $avatar = $dataUser['avatar'];
        if ($prenom&&$nom&&$email&&$departement) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (is_numeric($telephone)) {
                    if (is_numeric($departement)&&($departement > 0 && $departement <= 99)) {
                        $newAvatar = $_FILES['avatar']['name'];
                        if ($newAvatar) {
                            $extensions_valides = array('jpg', 'jpeg', 'png');
                            $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                            if (in_array($extension_upload,$extensions_valides)) {
                                $newNameAvatar = $dataUser['id'].md5(uniqid(rand(), true)).'.'.$extension_upload;
                                $uploadDuFichier = move_uploaded_file($_FILES['avatar']['tmp_name'],'./avatar/'.$newNameAvatar);
                                if ($uploadDuFichier) {
                                    if ($dataUser['avatar'] != "avatar.jpg") {
                                        unlink('./avatar/'.$dataUser['avatar']);
                                    }
                                    $avatar = $newNameAvatar;
                                } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                            } else echo "<div class='alertError'>L'extension n'est pas valide !</div><br />";
                        }
                        $req = $bdd->exec("UPDATE users SET prenom='$prenom', nom='$nom', email='$email', telephone='$telephone', departement='$departement', avatar='$avatar' WHERE id='{$dataUser['id']}'");
                        $_SESSION['email'] = $email;
                        echo "<div class='alertSuccess'>Votre profil a été mis à jour !<br />Redirection en cours...</div><br />";
                        ?><head><meta http-equiv="refresh" content="2;URL=/editprofile" /></head><?php
                    } else echo "<div class='alertError'>Le département n'est pas valide !</div><br />";
                } else echo "<div class='alertError'>Le numéro de téléphone n'est pas valide !</div><br />";
            } else echo "<div class='alertError'>Veuillez mettre une adresse mail valide !</div><br />";
        } else echo "<div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    }
?>
