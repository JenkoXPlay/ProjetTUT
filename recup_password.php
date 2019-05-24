<?php include('connect.php'); ?>
<html>
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur !</title>
        <meta charset="utf-8" />
        <link rel="icon" href="/img/favicon.svg" />
        <link rel="stylesheet" href="/css/spectre-exp.min.css" />
        <link rel="stylesheet" href="/css/spectre-icons.min.css" />
        <link rel="stylesheet" href="/css/spectre.min.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/css/global.css" />
        <script src="/js/jquery.min.js"></script>
    </head>
    <body class="bodyPwd">

        <div class="panelPwd">
            <h2>Récupération mot de passe</h2>

            <br />

            Comment ça vous avez perdu votre mot de passe ?<br /><br />

            Indique ton adresse mail, nous allons te renvoyer ton nouveau mot de passe.<br /><br />

            <?php
                include('./script_php/security.php');
                if (isset($_POST['resetPwd'])) {
                    $email = security($_POST['email']);
                    if ($email) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            include('./script_php/password.php');
                            $password = generatePwd(8);
                            $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
                            $requete = $bdd->exec("UPDATE users SET password='$passwordCrypt' WHERE email='$email'");
                            $sujet = 'Nouveau mot de passe Inscription Alt\'itude';
                            $message = "Bonjour<br /><br />";
                            $message .= "Voici votre nouveau mot de passe : <b>".$password."</b><br /><br />";
                            $message .= "Cordialement, l'équipe d'Alt'itude.";
                            $destinataire = $email;
                            $headers = "From: \"expediteur moi\"<contact@altitude.maximelefebvre.fr>\n";
                            $headers .= "Reply-To: contact@altitude.maximelefebvre.fr\n";
                            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
                            if(mail($destinataire, $sujet, $message, $headers)) {
                                echo "<br /><div class='alertSuccess marginAuto width_50'>L'email a été envoyé, regardez vos smaps au cas où !</div><br />";
                            } else {
                                echo "<br /><div class='alertError marginAuto width_50'>Une erreur est survenue (email) !</div><br />";
                            }
                        } else echo "<div class='alertError marginAuto width_50'>L'email n'est pas correct !</div><br />";
                    } else echo "<div class='alertError marginAuto width_50'>Veuillez saisir votre adresse mail !</div><br />";
                } else {
                    ?>
                        <form action="" method="post" autocomplete="off">
                            <input type="email" class="inputText width_50" name="email" placeholder="Adresse mail du compte" /><br /><br />
                            <input type="submit" name="resetPwd" class="btnPwd width_50" value="Réinitialiser le mot de passe" />
                        </form>
                    <?php
                }
            ?>

            <br /><br />
            <a href="/home">Aller à la page d'accueil</a>
            
        </div>

    </body>
</html>