<?php
    if (isset($_POST['maj_mdp'])) {
        $current_mdp = security($_POST['current_mdp']);
        $new_mdp = security($_POST['new_mdp']);
        $again_mdp = security($_POST['again_mdp']);
        $passwordHash = password_hash($new_mdp, PASSWORD_DEFAULT);
        if ($current_mdp && $new_mdp && $again_mdp) {
            if (password_verify($current_mdp, $dataAdmin['password'])) {
                if (strlen($new_mdp) >= 6) {
                    if ($new_mdp == $again_mdp) {
                        $reqMajPwd = $bdd->exec("UPDATE admin SET password='$passwordHash' WHERE pseudo='{$_SESSION['administrator']}'");
                        echo "<div class='alertSuccess width_80 marginAuto'>Mot de passe mis à jour !</div><br />";
                    } else echo "<div class='alertError width_80 marginAuto'>Les mots de passes ne sont pas identiques !</div><br />";
                } else echo "<div class='alertError width_80 marginAuto'>Le mot de passe est trop court !</div><br />";
            } else echo "<div class='alertError width_80 marginAuto'>Le mot de passe actuel n'est pas exact !</div><br />";
        } else echo "<div class='alertError width_80 marginAuto'>Veuillez remplir tous les champs !</div><br />";
    }
?>