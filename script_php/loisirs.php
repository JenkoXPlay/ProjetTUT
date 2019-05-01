<?php
    if (isset($_POST['submitLoisir'])) {
        $loisir = security($_POST['loisir']);
        if ($loisir) {
            $req = addLoisirs($bdd, $dataUser['id'], $loisir);
            echo "<div class='alertSuccess'>Loisir ajouté avec succès !</div><br />";
        } else echo "<div class='alertError'>Veuillez mettre un loisir !</div><br />";
    }
?>