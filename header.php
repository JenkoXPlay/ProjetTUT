<?php include('connect.php'); ?>
<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header('Location:/login');
    }
?>

<html>
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur !</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/spectre-exp.min.css" />
        <link rel="stylesheet" href="css/spectre-icons.min.css" />
        <link rel="stylesheet" href="css/spectre.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>