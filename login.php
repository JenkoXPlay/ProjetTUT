<?php include('connect.php'); ?>
<?php include('script_php/security.php');?>

<html lang="fr">
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur</title>
        <meta charset="utf-8"/>   
        <link rel="stylesheet" href="css/spectre.min.css">
        <link rel="stylesheet" href="css/spectre-icons.min.css">
        <link rel="stylesheet" href="css/spectre-exp.min.css">
        <link rel="stylesheet" href="css/styleLogRegister.css" media="screen and (max-width:1920px)">
        <link rel="stylesheet" href="css/styleGrand.css" media="screen and (min-width:1920px)"/>
        <link rel="stylesheet" href="css/global.css" />
    </head>
</html>

<body>
   
        <img class="logo" src="img/logo_black.svg"/>

        <div class="containerPage">
            <div class="barre">
                    <div class="point"></div>
                    <div class="point"></div>
                    <div class="point"></div>
            </div>
            <div class="containerFormIllu">
                <div class="formulaire">
                    <h1 class="title">Connectez-vous</h1>
                    <p class="subtitle">Vous n'avez pas encore un compte Alt'itude ? <br/><a href="/register">Créez-en un</a></p> 
                    <?php
                        //Ouverture de la session
                        session_start();
                        
                        //test si on clique sur le bouton connexion 
                        if (isset($_POST['connexion'])) {
                            /*Récupération des données*/
                            $email=security($_POST['email']);
                            $password=security($_POST['password']);
                            /*Test si les champs ne sont pas vide */
                            if ($_POST['email'] && $_POST['password']) {
                                /*Vérifie si le champs email est bien un email*/
                                if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
                                    /*Préparation de la requête*/
                                    $req = $bdd->prepare('SELECT email, password FROM users WHERE email = :email');
                                    $req->bindParam(':email',$_POST['email']);
                                    $req->execute();
                                    //récupère tout la ligne en objet dans la bdd
                                    $user = $req->fetch(PDO::FETCH_OBJ);
                            
                                    //récupère le mdp
                                    //test si le mdp est valide
                                    if(!$user){
                                        echo"<div class='alertError'>Ce mail n'existe pas</div>";
                                    } else {
                                        $mdp = $user->password;
                                        /*Vérifie le password hasher*/
                                        $validPassword = password_verify($_POST['password'], $mdp);
                                        if($validPassword)
                                        {
                                            /*Création de la session*/
                                            $_SESSION['email'] = $email;
                                            echo"<div class='alertSuccess'>Vous êtes connecté, redirection en cours...</div>";
                                            ?><head> <meta http-equiv="refresh" content="2;/home" /></head> <?php 
                                        } else { 
                                            echo "<div class='alertError'>Ce mail ou ce mot de passe n'existe pas</div>"; 
                                        }
                                    }
                                } else { 
                                    echo "<div class='alertError'>Veuillez entrer une adresse mail valide</div>"; 
                                }
                            } else {
                                 echo "<div class='alertError'>Veuillez remplir tout les champs</div>";
                            }
                        }
                    ?>
                    <form action="" method="POST" autocomplete="off">
                        <label>Adresse email</label><br/>
                        <input class="email" type="email" name="email" placeholder="Adresse email" />
                        <br/>
                        <label>Mot de passe</label><br/>
                        <input class="password" type="password" name="password" placeholder="Mot de passe"/><br/>
                        <div class="containerCheckbox">
                            <div class="containerBtnCheck">
                                <input class="check" type="checkbox" id="maintenirSession" /><label for="maintenirSession"> Maintenir la connexion </label>
                            </div>
                            <div class="containerBtnOubli">
                                <a href="">J'ai oublié mon mot de passe</a><br/>
                            </div>
                        </div>
                        <center><input class="btnConnect" type="submit" value="Connexion" name="connexion" /></center>
                    </form>
                </div>
                <div class="containerIllustration">
                    <h1 class="title">Trouvez un emploi à votre hauteur !</h1>
                    <div class="illustration">
                        <img class="" src="img/illustration.png">
                    </div>
                </div>
            </div>
        </div>
</body>