<?php include('header.php'); ?>

	<?php
	session_start();
	if(isset($_SESSION['administrator'])){
	?>

			<div id="contenu">
				<div class="box membre">
					<?php ?><br />
					membre(s)
				</div>
				<div class="box groupe">
					<?php  ?><br />
					groupe(s)
				</div>
				<div class="box ticket">
					<?php  ?><br />
					ticket(s)
				</div>

				<br /><br />

				<h3>Bonjour <?php  ?> !</h3><br />

			</div>

	<?php
	} else header('Location:/index.php');
	?>

<?php include('footer.php'); ?>