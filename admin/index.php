<?php include('../connect.php'); ?>
<?php
	// si l'utilisateur est déjà connecté
	if (isset($_SESSION['administrator'])) {
		header('Location:/admin/home');
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

	<div align="center">

		<div id="contenu_connexion">
			<img src="../img/logo_noir.png" width="400px" /><br /><br />
			<?php
			include('../script_php/security.php');
			if(isset($_POST['submit'])){
				$pseudo = security($_POST['pseudo']);
				$password = security($_POST['password']);
				if($pseudo&&$password){
					$req = $bdd->prepare('SELECT pseudo, password FROM admin WHERE pseudo = :pseudo');
					$req->bindParam(':pseudo',$pseudo);
					$req->execute();
					$user = $req->fetch(PDO::FETCH_OBJ);
					if(!$user){
						echo"<div class='erreur_admin'>Accès refusé, compte introuvable !</div><br />";
					} else {
						$mdp = $user->password;
						/*Vérifie le password hasher*/
						$validPassword = password_verify($password, $mdp);
						if ($validPassword) {
							/*Création de la session*/
							$_SESSION['administrator'] = $pseudo;
							echo"<div class='success_admin'>Accès autorisé, redirection en cours...</div><br />";
							?><head> <meta http-equiv="refresh" content="2;/admin/home" /></head> <?php 
						} else echo "<div class='erreur_admin'>Accès refusé, mot de passe incorrect !</div><br />";
					}
				}else echo "<div class='erreur_admin'>Accès refusé, veuillez remplir les champs !</div><br />";
			}
			?>
			<form method="post" action="" autocomplete="off">
				<input type="text" name="pseudo" class="form_connexion" placeholder="Pseudo" /><br /><br />
				<input type="password" name="password" class="form_connexion" placeholder="Mot de passe" /><br /><br />
				<input type="submit" name="submit" class="btn_connexion" value="Connexion" />
			</form>
		</div>

		<div id="footer_connexion">
			&copy; Copyright Administration Alt'itude 2019 | Design By Maxime Lefebvre<br />
			<i>Tous droits réservé.</i>
		</div>

	</div>

</body>
</html>
