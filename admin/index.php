<?php include('../connect.php'); ?>
<?php
	session_start();
	// si l'utilisateur est déjà connecté
	if (isset($_SESSION['administrator'])) {
		header('Location:admin.php');
	}
?>
<html>
<head>
	<title>Alt'itude - Administration</title>
	<meta charset="utf-8" />
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

	<div class="contentLogin">

		<div class="box">

			<div class="title">Administration Alt'itude</div>

			<br /><br />

			<?php
				include('../script_php/security.php');
				if (isset($_POST['submit'])) {
					$pseudo = security($_POST['pseudo']);
					$password = security($_POST['password']);
					if ($pseudo&&$password) {
						$req = $bdd->prepare('SELECT pseudo, password FROM admin WHERE pseudo = :pseudo');
						$req->bindParam(':pseudo',$pseudo);
						$req->execute();
						$user = $req->fetch(PDO::FETCH_OBJ);
						if (!$user) {
							echo"<div class='alertError width_50 marginAuto'>Accès refusé, compte introuvable !</div><br />";
						} else {
							$mdp = $user->password;
							/*Vérifie le password hasher*/
							$validPassword = password_verify($password, $mdp);
							if ($validPassword) {
								/*Création de la session*/
								$_SESSION['administrator'] = $pseudo;
								echo"<div class='alertSuccess width_50 marginAuto'>Accès autorisé, redirection en cours...</div><br />";
								?><head> <meta http-equiv="refresh" content="2;admin.php" /></head> <?php 
							} else echo "<div class='alertError width_50 marginAuto'>Accès refusé, mot de passe incorrect !</div><br />";
						}
					} else echo "<div class='alertError width_50 marginAuto'>Accès refusé, veuillez remplir les champs !</div><br />";
				}
			?>

			<form method="post" action="" autocomplete="off">
				<input type="text" name="pseudo" class="inputHype width_40" placeholder="Pseudo" /><br /><br />
				<input type="password" name="password" class="inputHype width_40" placeholder="Mot de passe" /><br /><br />
				<input type="submit" name="submit" class="btnBlue width_40" value="Connexion" />
			</form>

		</div>

	</div>

</body>
</html>
