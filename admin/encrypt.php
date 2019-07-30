<?php
    $password = "172839794613";
    $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
    echo $passwordCrypt;
?>