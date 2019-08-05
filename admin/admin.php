<?php 
	include('header.php');
	include('../script_php/security.php');

	// inclusion des fichiers swagger
	include('../function/user.php');
	include('../function/annoncesentreprises.php');
	include('../function/entreprise.php');
	include('../function/admin.php');
?>

	<?php
		session_start();
		if (isset($_SESSION['administrator'])) {

			$reqAdmin = getAdminPseudo($bdd, $_SESSION['administrator']);
			while ($dataAdmin = $reqAdmin->fetch()) {
	?>

			<div id="contenu">

				<div class="flexContentBetween marginAuto width_80">
					<div class="boxBlue width_20">
						<?php echo countUsers($bdd, "all"); ?><br />
						membre(s)
					</div>
					<div class="boxRed width_20">
						<?php echo countAnnonces($bdd); ?><br />
						annonce(s)
					</div>
					<div class="boxViolet width_20">
						<?php echo countEntreprises($bdd); ?><br />
						entreprise(s)
					</div>
				</div>

				<br /><br />

				<h3>Bonjour <?php echo $dataAdmin['pseudo']; ?> !</h3><br />

				<b>Privilège : </b><?php echo $dataAdmin['privilege']; ?><br />
				<b>Création du compte : </b><?php echo date('d/m/Y', $dataAdmin['creation']); ?><br />
				<b>Dernière connexion : </b><?php echo date('d/m/Y', $dataAdmin['last_connexion']); ?>

				<br /><br />

				<div class="flexContentBetween">

					<div class="width_40 txtCenter">
						<h3>Mot de passe</h3>
						<?php
							if (isset($_POST['maj_mdp'])) {
								$current_mdp = security($_POST['current_mdp']);
								$new_mdp = security($_POST['new_mdp']);
								$again_mdp = security($_POST['again_mdp']);
								$passwordHash = password_hash($new_mdp, PASSWORD_DEFAULT);
								if ($current_mdp && $new_mdp && $again_mdp) {
									if (password_verify($current_mdp, $dataAdmin['password'])) {
										if (strlen($new_mdp) >= 6) {
											if ($new_mdp == $again_mdp) {
												$reqMajPwd = $bdd->exec("UPDATE admin SET password='$passwordHash' WHERE pseudo='{$_SESSION['administrator']}'");
												echo "<div class='alertSuccess width_80 marginAuto'>Mot de passe mis à jour !</div><br />";
											} else echo "<div class='alertError width_80 marginAuto'>Les mots de passes ne sont pas identiques !</div><br />";
										} else echo "<div class='alertError width_80 marginAuto'>Le mot de passe est trop court !</div><br />";
									} else echo "<div class='alertError width_80 marginAuto'>Le mot de passe actuel n'est pas exact !</div><br />";
								} else echo "<div class='alertError width_80 marginAuto'>Veuillez remplir tous les champs !</div><br />";
							}
						?>
						<form action="" method="post" autocomplete="off">
							<input type="password" name="current_mdp" class="inputBorder width_80" placeholder="Mot de passe actuel" /><br /><br />
							<input type="password" name="new_mdp" class="inputBorder width_80" placeholder="Nouveau mot de passe" /><br /><br />
							<input type="password" name="again_mdp" class="inputBorder width_80" placeholder="Répétez le mot de passe" /><br /><br />
							<input type="submit" name="maj_mdp" class="btnBlue width_80" value="Mettre à jour" />
						</form>
					</div>

					<?php
						if ($dataAdmin['privilege'] == 'admin') {
							?>
								<div class="width_40 txtCenter">
									<h3>Comptes Administrateurs</h3>
								</div>
							<?php
						}
					?>

				</div>

			</div>

	<?php
			}

		} else header('Location:/index.php');
	?>

<?php include('footer.php'); ?>