<?php include('header.php'); ?>

	<?php
	session_start();
	if(isset($_SESSION['username'])){
	?>

			<div id="contenu">

				<?php
				$requete = $connect->query("SELECT * FROM admin WHERE username='{$_SESSION['username']}'");
				while($data = $requete->fetch()){
					if($data['rang'] == "Fondateur"){
					?>
						
						<h3>Maintenance</h3>
						<?php
						$req_mtn = $connect->query("SELECT * FROM maintenance WHERE id='1'");
						while($data_mtn = $req_mtn->fetch()){
						?>
							<b>État actuel :</b> <?php if($data_mtn['etat'] == "On"){ echo "<font color='#ff0000'>On</font>"; }else if($data_mtn['etat'] == "Off"){ echo "<font color='#27ae60'>Off</font>"; } ?><br /><br />
						<?php
						}
						$req_mtn->closeCursor();
						?>
						<?php
						include('../script_php/security.php');
						if(isset($_POST['sub_mtn'])){
							$etat = security($_POST['etat']);
							$message = security($_POST['message']);
							$date_fin = security($_POST['date_fin']);
							if($message){
								if($etat != "État maintenance"){
									$query_mtn = $connect->exec("UPDATE maintenance SET etat='$etat', message='$message', date_fin='$date_fin' WHERE id='1'");
									echo "<div class='success_admin'>L'état de la maintenance a été mis à jour !</div><br />";
								}else echo "<div class='erreur_admin'>Veuillez choisir un état !</div><br />";
							}else echo "<div class='erreur_admin'>Veuillez mettre un message de maintenance !</div><br />";
						}
						?>
						<form method="post" action="" autocomplete="off">
							<select name="etat" class="select">
								<option selected>État maintenance</option>
								<option>On</option>
								<option>Off</option>
							</select><br /><br />
							<input type="text" name="message" class="form" placeholder="Message de maintenance" /><br /><br />
							<b>AAA/MM/JJ HH:MM:SS</b><br />
							<input type="text" name="date_fin" class="form" placeholder="Date de fin" /><br /><br >
							<input type="submit" name="sub_mtn" class="btn_mtn" value="Mettre à jour" />
						</form>

					<?php
					}else{
					?>
						<h3>Vous n'avez pas accès à cette page !</h3>
					<?php
					}
				}
				$requete->closeCursor();
				?>

			</div>

	<?php
	}else include('redirection_index.php');
	?>

<?php include('footer.php'); ?>