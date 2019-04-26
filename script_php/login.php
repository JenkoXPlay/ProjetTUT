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
                if ($validPassword)
                {
                    /*Création de la session*/
                    $_SESSION['email'] = $email;
                    echo"<div class='alertSuccess'>Vous êtes connecté, redirection en cours...</div>";
                    ?><head> <meta http-equiv="refresh" content="2;/home" /></head> <?php 
                } else echo "<div class='alertError'>Ce mail ou ce mot de passe n'existe pas</div>";
            }
        } else echo "<div class='alertError'>Veuillez entrer une adresse mail valide</div>"; 
    } else echo "<div class='alertError'>Veuillez remplir tout les champs</div>";
}
?>