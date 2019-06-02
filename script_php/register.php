<?php
if (isset($_POST['createUser'])) {
    $typeCompte = security($_POST['typeCompte']);
    $nom = security($_POST['nom']);
    $prenom = security($_POST['prenom']);
    $email = security($_POST['email']);
    $departement = security($_POST['departement']);
    if (isset($typeCompte) && ( $typeCompte == "etudiant" OR $typeCompte == "pro")) {
        if ($nom && $prenom && $email && $departement) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $verifEmail = $bdd->query("SELECT COUNT(*) AS countid FROM users WHERE email='$email'");
                $verifEmailFetch = $verifEmail->fetch();
                if ($verifEmailFetch['countid'] == 0) {
                    if (is_numeric($departement)) {
                        include('./function/user.php');
                        include('./script_php/password.php');
                        $password = generatePwd(8);
                        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
                        addUser($bdd, $prenom, $nom, $email, $passwordCrypt, $typeCompte, $departement);

                        // parti mail
                        include('./script_php/email.php');
                        $destinataire = $email;
                        $titre = "Confirmation Inscription Alt'itude";
                        $msgHTML = "Bonjour ".$prenom." ".$nom."<br /><br />";
                        $msgHTML .= "Merci de votre inscription sur Alt'itude !<br /><br />";
                        $msgHTML .= "Voici vos identifiants de connexion : <br /><br />";
                        $msgHTML .= "- <b>Email : </b>".$email."<br />";
                        $msgHTML .= "- <b>Mot de passe : </b>".$password."<br /><br />";
                        $msgHTML .= "Cordialement, l'équipe Alt'itude.";
                        $mail = sendMail($destinataire, $titre, $msgHTML);
                        if($mail) {
                            echo "<br /><div class='alertSuccess'>L'email a été envoyé !</div><br />";
                        } else {
                            echo "<br /><div class='alertError'>Une erreur est survenue (email) !</div><br />";
                        }
                        echo "<br /><div class='alertSuccess'>Votre compte a été créé, le mot de passe vous a été envoyé par mail (Vérifiez vos spams au cas où) !</div><br />";
                    } else echo "<br /><div class='alertError'>Le département n'est pas correct !</div><br />";
                } else echo "<br /><div class='alertError'>L'email est déjà existant !</div><br />";
            } else echo "<br /><div class='alertError'>Votre email n'est pas valide !</div><br />";
        } else echo "<br /><div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    } else echo "<br /><div class='alertError'>Veuillez indiquer le type du compte !</div><br />";
}
?>