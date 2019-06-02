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

                            // envoie email
                            include('./script_php/email.php');
                            $destinataire = $email;
                            $titre = "Nouveau mot de passe Inscription Alt'itude";
                            $msgHTML = "Bonjour<br /><br />";
                            $msgHTML .= "Voici votre nouveau mot de passe : <b>".$password."</b><br /><br />";
                            $msgHTML .= "Cordialement, l'équipe Alt'itude.";
                            $mail = sendMail($destinataire, $titre, $msgHTML);
                            if($mail) {
                                echo "<br /><div class='alertSuccess'>L'email a été envoyé (regardez vos spams au cas où) !</div><br />";
                            } else {
                                echo "<br /><div class='alertError'>Une erreur est survenue (email) !</div><br />";
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