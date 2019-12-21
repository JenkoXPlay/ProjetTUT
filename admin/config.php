<?php 
	include('header.php');
	include('../script_php/security.php');

	// inclusion des fichiers swagger
	include('../function/user.php');
	include('../function/annoncesentreprises.php');
	include('../function/entreprise.php');

	$reqAdmin = getAdminPseudo($bdd, $_SESSION['administrator']);
	while ($dataAdmin = $reqAdmin->fetch()) {

		if ($dataAdmin['privilege'] != "admin") {
			header('Location:admin.php');
		}
?>

	<div id="contenu">

		<div class="flexContentBetween marginAuto width_80">
			<div class="boxBlue width_20">
				Maintenance<br />
				on off
			</div>
			<div class="boxRed width_20">
				Connexion<br />
				on off
			</div>
			<div class="boxViolet width_20">
				Inscription<br />
				on off
			</div>
		</div>

		<br /><br />

		<h3>Configuration du domaine !</h3><br />

		<br /><br />

		<div class="flexContentBetween">

			<?php
				$reqMaintenance = $bdd->query("SELECT * FROM maintenance WHERE id='1'");
				while ($dataMaintenance = $reqMaintenance->fetch()) {

					$reqMaintenanceBy = $bdd->query("SELECT * FROM admin WHERE id='{$dataMaintenance['maintenanceBy']}'");
					while ($dataMaintenanceBy = $reqMaintenanceBy->fetch()) {
						$maintenanceBy = $dataMaintenanceBy['pseudo'];
					}
			?>
				<div class="width_40 txtCenter">
					<h3>Maintenance du site</h3>
					<b>Maintenance : <?php if ($dataMaintenance['etat']){ echo "<span class='txtRed'>on</span>"; } else { echo "<span class='txtGreen'>off</span>"; } ?></b><br />
					<b>Effectué par : </b><?php echo $maintenanceBy; ?>

					<br /><br />

					<?php
						if (isset($_POST['maj_Maintenance'])) {
							$etat = security($_POST['etatMaintenance']);
							$etat_dispo = array('0', '1');
							if ($etat) {
								if (in_array($etat, $etat_dispo)) {
									// problème à résoudre la value 0 n'est pas détectée
								} else echo "<div class='alertError width_80 marginAuto'>Une erreur est survenue !</div><br />";
							} else echo "<div class='alertError width_80 marginAuto'>Une erreur est survenue !</div><br />";
						}
					?>
					<form action="" method="post" autocomplete="off">
						<select name="etatMaintenance" class="inputBorder width_80">
							<option value="null">État de la maintenance</option>
							<option value="0">Désactivée</option>
							<option value="1">Activée</option>
						</select>
						<br /><br />
						<input type="submit" name="maj_Maintenance" class="btnBlue width_80" value="Mettre à jour" />
					</form>
				</div>
			<?php
				}
			?>

			<div class="width_40 txtCenter">
				<h3>Gestion connexion / inscription</h3>
				
			</div>

		</div>

	</div>

<?php
	}
?>

<?php include('footer.php'); ?>