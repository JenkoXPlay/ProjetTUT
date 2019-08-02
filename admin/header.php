<?php
	include('../connect.php');

	// déclare les sessions
	session_start();

	if (!isset($_SESSION['administrator'])) {
		header('Location:index.php');
	}
?>

<html>
<head>
	<title>FileSchool - Administration</title>
	<meta charset="utf-8" />
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

	<div id="menu">
		<img src="../img/logo_white.svg" width="70%" />
		<br /><br />
		<a href="admin.php" <?php if($_SERVER['REQUEST_URI'] == "/admin/admin.php"){ echo "class='activate'"; } ?>>Acceuil</a>
		<a href="logout.php">Deconnexion</a>
		<a href="config.php">Configuration</a>
		<a href="membre.php">Les membres</a>
		<a href="groupe.php">Les groupes</a>
		<a href="support.php">Support</a>
		<a href="mail_groupe.php">Mail groupé</a>
	</div>