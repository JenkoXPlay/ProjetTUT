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