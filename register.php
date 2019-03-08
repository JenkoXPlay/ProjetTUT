<?php include('./connect.php'); ?>
<?php include('./script_php/security.php'); ?>

<html>
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur !</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/spectre-exp.min.css" />
        <link rel="stylesheet" href="css/spectre-icons.min.css" />
        <link rel="stylesheet" href="css/spectre.min.css" />
        <link rel="stylesheet" href="css/global.css" />
        <link rel="stylesheet" href="css/register.css" media="screen and (max-width:1920px)"/>
        <link rel="stylesheet" href="css/styleGrand.css" media="screen and (min-width:1920px)"/> 
    </head>
    <body>

        <img src="img/logo_black.svg" class="logo" />

        <div class="bigContent">
            <div class="barre">
                <div class="point"></div>
                <div class="point"></div>
                <div class="point"></div>
            </div>
            <div class="container">
                <div class="formulaire">
                    <div class="title">Créez un compte</div>
                    <div class="subtitle">Vous avez déjà un compte Alt'itude ?<br /><a href="/login">Connectez-vous</a></div>

                    <?php
                        if (isset($_POST['createUser'])) {
                            $typeCompte = security($_POST['typeCompte']);
                            $nom = security($_POST['nom']);
                            $prenom = security($_POST['prenom']);
                            $email = security($_POST['email']);
                            $departement = security($_POST['departement']);
                            if (isset($typeCompte)) {
                                if ($nom && $prenom && $email && $departement) {
                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        if (is_numeric($departement)) {
                                            include('./function/user.php');
                                            include('./script_php/password.php');
                                            $password = generatePwd(8);
                                            $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
                                            addUser($bdd, $prenom, $nom, $email, $passwordCrypt, $typeCompte, $departement);
                                            /*
                                                FAIRE LE SCRIPT POUR ENVOIYER LE MAIL AVEC LE MOT DE PASSE
                                            */
                                            echo "<br /><div class='alertSuccess'>Votre compte a été créé, le mot de passe et vous a été envoyé par mail !</div><br />";
                                        } else echo "<br /><div class='alertError'>Le département n'est pas correct !</div><br />";
                                    } else echo "<br /><div class='alertError'>Votre email n'est pas valide !</div><br />";
                                } else echo "<br /><div class='alertError'>Veuillez remplir tous les champs !</div><br />";
                            } else echo "<br /><div class='alertError'>Veuillez indiquer le type du compte !</div><br />";
                        }
                    ?>

                    <form method="post" action="" autocomplete="off">
                        <label>Type de compte</label>
                        <div class="typeCompte">
                            <input type="radio" id="student" value="étudiant" name="typeCompte" class="typeCompteRadio" checked="checked" />
                            <label for="student" class="valueCompte">
                                <img src="./img/student.png" /><br />
                                Étudiant
                            </label>
                        
                            <input type="radio" id="pro" value="pro" name="typeCompte" class="typeCompteRadio" />
                            <label for="pro" class="valueCompte">
                                <img src="./img/pro.png" /><br />
                                Professionnel
                            </label>
                        </div>

                        <label>Nom</label>
                            <input type="text" name="nom" class="inputHype" placeholder="Nom" />

                        <label>Prénom</label>
                            <input type="text" name="prenom" class="inputHype" placeholder="Prénom" />

                        <label>Adresse mail</label>
                            <input type="email" name="email" class="inputHype" placeholder="Adresse mail" />

                        <label>Département</label>
                            <input type="number" name="departement" class="inputHype" placeholder="Ex: 62" />

                        <br /><br />
                        <center><i>En vous inscrivant vous acceptez les <a href="">C.G.U</a></i></center>

                        <br /><br />
                        <center>
                            <input type="submit" name="createUser" class="btnRegister" value="Créer le compte" />
                        </center
                    </form>
                </div>
                <div class="illu">
                    <div class="title">Trouvez un emploi à votre hauteur !</div>
                    <img src="./img/illu_register.png" />
                </div>
            </div>
        </div>

    </body>
</html>