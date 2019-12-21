<?php 
	include('header.php');
	include('../script_php/security.php');

	// inclusion des fichiers swagger
	include('../function/user.php');
	include('../function/annoncesentreprises.php');
	include('../function/entreprise.php');

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
		<b>Création du compte : </b><?php echo $dataAdmin['creation']; ?><br />
		<b>Dernière connexion : </b><?php echo $dataAdmin['last_connexion']; ?>

		<br /><br />

		<div class="flexContentBetween">

			<div class="width_40 txtCenter">
				<h3>Mot de passe</h3>
				<?php include('./script_php/update_pwd.php'); ?>
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
							<?php include('./script_php/new_admin.php'); ?>
							<form action="" method="post" autocomplete="off">
								<input type="text" name="pseudo" class="inputBorder width_80" placeholder="Pseudo" /><br /><br />
								<input type="email" name="email" class="inputBorder width_80" placeholder="Email : exemple@exemple.com" /><br /><br />
								<select name="privilege" class="inputBorder width_80">
									<option selected>Privilège</option>
									<option>admin</option>
									<option>moderateur</option>
									<option>technicien</option>
								</select><br /><br />
								<i>Le mot de passe sera envoyé par mail</i><br /><br />
								<input type="submit" name="create_admin" class="btnBlue width_80" value="Créer le compte" />
							</form>

							<br /><br />

							<h3>Gestion des comptes</h3>
							<?php include('./script_php/remove_admin.php'); ?>
							<form action="" method="post" autocomplete="off">
								<select name="administateur" class="inputBorder width_80">
									<option selected>Choisir un compte</option>
									<?php
										$listAdmin = getAdmin($bdd);
										while ($dataList = $listAdmin->fetch()) {
											?>
												<option value="<?php echo $dataList['id']; ?>"><?php echo $dataList['pseudo']." (".$dataList['privilege'].")"; ?></option>
											<?php
										}
									?>
								</select><br /><br />
								<input type="submit" name="delete_admin" class="btnRed width_80" value="Supprimer le compte" />
							</form>
						</div>
					<?php
				}
			?>

		</div>

	</div>

<?php
	}
?>

<?php include('footer.php'); ?>