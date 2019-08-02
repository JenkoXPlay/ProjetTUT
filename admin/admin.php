<?php 
	include('header.php');

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

			</div>

	<?php
			}

		} else header('Location:/index.php');
	?>

<?php include('footer.php'); ?>