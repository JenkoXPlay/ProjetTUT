<?php

    include('connect.php');

    include('function/entreprise.php');

    include('./script_php/security.php');
    include('./script_php/antivol.php');

    // addUser($bdd, "Juju", "Col", "lesuperbgdu62@gmail.com", "saucisse2", "pro");

    $info = getEntrepriseType($bdd, "ge");
    while($data = $info->fetch()) {
        echo $data['id']." : ".$data['responsable']." ".$data['nom']."<br />";
    }

?>
