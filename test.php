<?php

    include('connect.php');

    // include('function/messagerie.php');

    // addMessage($bdd, 1, 1, "Test de message");

    include('./script_php/security.php');
    include('./script_php/antivol.php');

    echo security("test&lt;dshksdhfks&lt;");

?>
