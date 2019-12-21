<?php
    include('./script_php/generate_pwd.php');
    include('../script_php/email.php');

    if (isset($_POST['create_admin'])) {
        $pseudo = security($_POST['pseudo']);
        $email = security($_POST['email']);
        $privilege = security($_POST['privilege']);
        $roles = array('admin', 'moderateur', 'technicien');
        if ($pseudo && $email) {
            if ($privilege != "Privilège") {
                if (in_array($privilege,$roles)) {
                    $password = generatePwd(10);
                    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

                    $createAdmin = addAdmin($bdd, $pseudo, $email, $passwordHashed, $privilege);
                    
                    $destinataire = $email;
                    $titre = "Compte administrateur Alt'itude";
                    $msgHTML = "Bonjour ".$pseudo."<br /><br />";
                    $msgHTML .= "Voici les identifiants de votre compte administrateur :<br /><br />";
                    $msgHTML .= "- <b>Pseudo : </b>".$pseudo."<br />";
                    $msgHTML .= "- <b>Mot de passe : </b>".$password."<br /><br />";
                    $msgHTML .= "Lien de connexion : <a href='http://altitude.fr/admin' target='_blank'>Cliquez ici</a>";
                    $msgHTML .= "<b><font color='red'>IMPORTANT : Ne jamais vous connectez depuis un ordinateur public !</font><b>";
                    $msgHTML .= "Cordialement, l'équipe Alt'itude.";
                    $mail = sendMail($destinataire, $titre, $msgHTML);
                    if ($mail) {
                        echo "<br /><div class='alertSuccess width_80 marginAuto'>L'email de création a été envoyé !</div><br />";
                    } else {
                        echo "<br /><div class='alertError width_80 marginAuto'>Une erreur est survenue (email) !</div><br />";
                    }
                    echo "<br /><div class='alertSuccess width_80 marginAuto'>Compte administrateur créé avec succès !</div><br />";

                } else echo "<div class='alertError width_80 marginAuto'>Le privilège n'est pas correct !</div><br />";
            } else echo "<div class='alertError width_80 marginAuto'>Le privilège n'est pas correct !</div><br />";
        } else echo "<div class='alertError width_80 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>