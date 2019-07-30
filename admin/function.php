<?php

include('../connect.php');

function resultat_recherche($search)
{
	$ou ="";
	$search = preg_split('/[\s]+/',$search);
	
	$total_resultat = count($search);
	
	foreach($search as $key=>$searches)
	{
		$ou = "pseudo LIKE '%$searches%'";
		if($key !=($total_resultat-1))
		{
			$ou .=" AND ";
		}
	}
	$query = mysql_query("SELECT * FROM membre WHERE $ou");
	$rows = mysql_num_rows($query);
	if($rows)
	{
		while($row = mysql_fetch_assoc($query))
		{
			?>
				<a href="profil_membre.php?pseudo=<?php echo $row['pseudo']; ?>"><?php echo "#".$row['id']; ?></a>&nbsp; - &nbsp;
				<?php echo $row['pseudo']; ?>&nbsp; - &nbsp;
				<?php echo $row['email']; ?>&nbsp; - &nbsp;
				<?php echo $row['sexe']; ?>&nbsp; - &nbsp;
				avert : <?php echo $row['avert']; ?>&nbsp; - &nbsp;
				<?php if($row['rang'] == "membre"){ echo $row['rang']; }else{ echo "<b>".$row['rang']."</b>"; } ?>&nbsp; - &nbsp;
				<a href="profil_membre.php?pseudo=<?php echo $row['pseudo']; ?>">voir le profil</a>
				<br />
			<?php
		}
	}else echo "Désolé, mais aucun résultat n'a été trouver !";
}

?>