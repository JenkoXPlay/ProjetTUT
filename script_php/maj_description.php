<?php
    if (isset($_POST['submitDesc'])) {
        $description = addslashes(security($_POST['description']));
        if ($description) {
            if (strlen($description) >= 20) {
                $req = $bdd->exec("UPDATE users SET description='$description' WHERE id='{$dataUser['id']}'");
                echo "<div class='alertSuccess'>Votre description a été mise à jour !</div><br />";
            } else echo "<div class='alertError'>Votre description doit dépassée 20 caractères !</div><br />";
        } else echo "<div class='alertError'>Veuillez mettre une description !</div><br />";
    }
?>