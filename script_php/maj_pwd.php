<?php
    if (isset($_POST['submitPwd'])) {
        $currentPwd = security($_POST['passwordActuel']);
        $newPwd = security($_POST['passwordNew']);
        $rpPwd = security($_POST['passwordAgain']);
        $passwordHash = password_hash($newPwd, PASSWORD_DEFAULT);
        if ($currentPwd&&$newPwd&&$rpPwd) {
            if (strlen($newPwd)>=6) {
                if ($newPwd == $rpPwd) {
                    if (password_verify($currentPwd, $dataUser['password'])) {
                        $req = $bdd->exec("UPDATE users SET password='$passwordHash' WHERE id='{$dataUser['id']}'");
                        echo "<div class='alertSuccess'>Le mot de passe a été changé, vous allez être déconnecté !</div><br />";
                        ?><head><meta http-equiv="refresh" content="3;URL=/logout" /></head><?php
                    } else echo "<div class='alertError'>Le mot de passe actuel n'est pas exact !</div><br />";
                } else echo "<div class='alertError'>Les mots de passes ne correspondent pas !</div><br />";
            } else echo "<div class='alertError'>Le mot de passe est trop court !</div><br />";
        } else echo "<div class='alertError'>Veuillez remplir tous les champs !</div><br />";
    }
?>