<?php include('header.php'); ?>

	<?php
	session_start();
	if(isset($_SESSION['administrator'])){
	?>

			<div id="contenu">
					<?php
					$requete_user = $connect->query ("SELECT COUNT(id) as countid FROM membre");//nbr de membre
					$nb_user = $requete_user->fetch();
					$requete_groupe = $connect->query ("SELECT COUNT(id) as countid FROM groupe");//nbr de membre
					$nb_groupe = $requete_groupe->fetch();
					$requete_contact = $connect->query ("SELECT COUNT(id) as countid FROM contact where etat='en attente'");//nbr de membre
					$nb_contact = $requete_contact->fetch();
					?>
				<div class="box membre">
					<?php echo $nb_user['countid']; ?><br />
					membre(s)
				</div>
				<div class="box groupe">
					<?php echo $nb_groupe['countid']; ?><br />
					groupe(s)
				</div>
				<div class="box ticket">
					<?php echo $nb_contact['countid']; ?><br />
					ticket(s)
				</div>

				<br /><br />

				<h3>Bonjour <?php echo $_SESSION['username']; ?> !</h3><br />

				<?php
				$requete = $connect->query("SELECT * FROM admin WHERE username='{$_SESSION['username']}'");
				while($data = $requete->fetch()){
					if($data['rang'] == "Fondateur"){
					?>
						<div id="add_adm">
							<h3>Ajout d'un administrateur</h3><br />
							<?php
							include('../script_php/security.php');
							if(isset($_POST['sub_adm'])){
								$username = security($_POST['username']);
								$password = security($_POST['password']);
								$password2 = md5($password);
								$rp_password = security($_POST['rp_password']);
								$rang = security($_POST['rang']);
								if($username&&$password&&$rp_password){
									if(strlen($username)>=5){
										if(strlen($password)>=6){
											if($password == $rp_password){
												if($rang != "Rang du compte"){
													$query_pseudo = mysql_query("SELECT id FROM admin WHERE username = '$username'");
													if(mysql_num_rows($query_pseudo) == 1){
														echo "<div class='erreur_admin'>Ce pseudo est déjà utilisé !</div><br />";
													}else{
														$query_compte = $connect->exec("INSERT INTO admin VALUES ('','$username','$password2','$rang',NOW())");
														echo "<div class='success_admin'>Le compte <b>".$username."</b> a été créé avec succès !</div><br />";
													}
												}else echo "<div class='erreur_adm'>Veuillez choisir un rang !</div><br />";
											}else echo "<div class='erreur_admin'>Les mots de passes ne sont pas identiques !</div><br />";
										}else echo "<div class='erreur_admin'>Mot de passe trop court !</div><br />";
									}else echo "<div class='erreur_admin'>Pseudo trop court !</div><br />";
								}else echo "<div class='erreur_admin'>Veuillez remplir tout les champs !</div><br />";
							}
							?>
							<form method="post" action="" autocomplete="off">
								<input type="text" name="username" class="form" placeholder="Pseudo" /><br /><br />
								<input type="password" name="password" class="form" placeholder="Mot de passe" /><br /><br />
								<input type="password" name="rp_password" class="form" placeholder="Encore le mot de passe" /><br /><br />
								<select name="rang" class="select">
									<option select>Rang du compte</option>
									<option>Administrateur</option>
									<option>Promgrammeur</option>
									<option>Service support</option>
									<option>Service technique</option>
									<option>Community Manager</option>
								</select><br /><br />
								<input type="submit" name="sub_adm" class="btn_new_compte" value="Créer le compte" />
							</form>
						</div>
						<div id="all_adm">
							<h3>Liste des administrateurs</h3><br />
							<?php
							if(isset($_POST['sub_del_adm'])){
								$id_adm = security($_POST['id_adm']);
								if($id_adm){
									$query_del_adm = $connect->exec("DELETE FROM admin WHERE id='$id_adm'");
									echo "<div class='success_admin'>Le compte <b>#".$id_adm."</b> a été supprimé avec succès !</div><br />";
								}else echo "<div class='erreur_admin'>Une erreur est survenue !</div><br />";
							}
							?>
							<?php
							$requete_adm = $connect->query("SELECT * FROM admin");
							while($data_adm = $requete_adm->fetch()){
							?>
								<b><?php echo $data_adm['username']; ?></b><br />
								<b>Rang :</b> <?php echo $data_adm['rang']; ?><br />
								<b>Dernière connexion :</b> <?php echo $data_adm['date_connexion']; ?><br /><br />
								<form method="post" action="">
									<input type="text" name="id_adm" <?php echo "value='".$data_adm['id']."'"; ?> style="display:none;" />
									<input type="submit" name="sub_del_adm" class="btn_adm_del" value="Supprimer le compte" />
								</form>
								<hr>
							<?php
							}
							$requete_adm->closeCursor();
							?>
						</div>
					<?php
					}else{
					?>
						Voici votre rang : <b><?php echo $data['rang']; ?></b><br />
						<br />
						Veuillez ne pas faire le travail des autres administrateurs, sauf si un supérieur vous le demande ou vous autorise !<br />
						Merci d'avance, la direction.
					<?php
					}
				}
				$requete->closeCursor();
				?>

			</div>

	<?php
	} else header('Location:/admin');
	?>

<?php include('footer.php'); ?>