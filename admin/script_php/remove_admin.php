<?php
    if (isset($_POST['delete_admin'])) {
        $compte = security($_POST['administateur']);
        if ($compte && $compte != "Choisir un compte" && is_numeric($compte)) {
            if ($dataAdmin['id'] != $compte) {
                $verifExist = getAdminExist($bdd, $compte);
                if ($verifExist == 1) {
                    $delAdmin = deleteAdmin($bdd, $compte);
                    echo "<div class='alertSuccess width_80 marginAuto'>Compte supprimé avec succès !</div><br />";
                } else echo "<div class='alertError width_80 marginAuto'>Une erreur est survenue !</div><br />";
            } else echo "<div class='alertError width_80 marginAuto'>Une erreur est survenue !</div><br />";
        } else echo "<div class='alertError width_80 marginAuto'>Une erreur est survenue !</div><br />";
    }
?>