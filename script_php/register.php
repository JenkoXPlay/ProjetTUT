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
                        $sujet = 'Confirmation Inscription Alt\'itude';
                        $message = "Bonjour ".$prenom." ".$nom."<br /><br />";
                        $message .= "Merci de votre inscription sur le site Alt'itude !<br /><br />";
                        $message .= "Voici vos identifiants de connexion : <br />";
                        $message .= "- <b>Email : </b>".$email."<br />";
                        $message .= "- <b>Mot de passe : </b>".$password."<br /><br />";
                        $message .= "Cordialement, l'équipe d'Alt'itude.";
                        $destinataire = $email;
                        $headers = "From: \"expediteur moi\"<contact@altitude.maximelefebvre.fr>\n";
                        $headers .= "Reply-To: contact@altitude.maximelefebvre.fr\n";
                        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
                        if(mail($destinataire, $sujet, $message, $headers)) {
                            echo "<br /><div class='alertSuccess'>L'email a été envoyé !</div><br />";
                        } else {
                            echo "<br /><div class='alertError'>Une erreur est survenue (email) !</div><br />";
                        }
                        echo "<br /><div class='alertSuccess'>Votre compte a été créé, le mot de passe et vous a été envoyé par mail (Vérifiez vos spams au cas où) !</div><br />";
                    } else echo "<br /><div class='alertError'>Le département n'est pas correct !</div><br />";
                } else echo "<br /><div class='alertError'>L'email est déjà existant !</div><br />";
            } else echo "<br /><div class='alertError'>Votre email n'est pas valide !</div><br />";
        } else echo "<br /><div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    } else echo "<br /><div class='alertError'>Veuillez indiquer le type du compte !</div><br />";
}
?>