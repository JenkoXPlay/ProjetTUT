<?php

    include('connect.php');

    include('function/messagerie.php');

    addMessage($bdd, 1, 1, "Test de message");

?>
