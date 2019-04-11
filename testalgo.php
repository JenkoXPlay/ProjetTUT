 <?php include('./script_php/security.php'); ?>
 <?php
    /*Connexion PDO a la BDD*/
    try { 
       /* $bdd = new PDO('mysql:host=ipabdd.iut-lens.univ-artois.fr;dbname=albertpinot;charset=utf8', 'albert.pinot', 'E2ln3DwS'); */
        $bdd = new PDO('mysql:host=localhost;dbname=creaweb_tut;charset=utf8', 'root', ''); 
    } catch (Exception $e) { 
        die('Erreur : ' . $e->getMessage()); 
    }
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>     
<html lang="fr">
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur</title>
        <meta charset="utf-8"/>   
    </head>

<body>
        <div class="searchbar">
            <?php
    // Test si le formulaire est validé (click btn search)
    if (isset($_POST['sendSearch'])){
	/*Récupération des données*/
	$job=security($_POST['job']);
	$typeContrat=security($_POST['type_contrat']);
	$localisation=security($_POST['localisation']);
	$domaine=security($_POST['domaine']);
        // Test si le champs job n'est pas vide
        if(!empty($job)){
            // Test le cas ou le chmaps job et type de contrat sont remplies et les deux autres sont égaux à leurs valeurs par défauts
            if($typeContrat != 'typeContrat' && $localisation == 'localisation' && $domaine == 'domaine'){
                // Test le cas ou l'on cherche un stage et une alternance en meme temps
                if($typeContrat == 'all'){
                    //requête
                    $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%')");
                    $req->bindParam(':job',$job);
                    $req->execute();
                    //On affiche les données dans le tableau
                    while ($donnees = $req->fetch()){
                            echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                            echo "<td> $donnees[titre] </td>";
                            echo "<td> $donnees[description] </td>";
                            echo "<td> $donnees[typeAnnonce] </td>";
                            echo "<td> $donnees[remuneration] euros </td>";
                            echo "<td> $donnees[nom]</td>";
                            echo "<td> $donnees[departement]</td>";
                            echo "</tr>";          
                        }
                } /*Sinon Test le cas ou l'on cherche soit un stage ou soit une alternance*/else{

                    $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type");    
                    $req->bindParam(':job',$job);
                    $req->bindParam(':type',$typeContrat);
                    $req->execute();
                    //On affiche les données dans le tableau
                    while ($donnees = $req->fetch()){
                            echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                            echo "<td> $donnees[titre] </td>";
                            echo "<td> $donnees[description] </td>";
                            echo "<td> $donnees[typeAnnonce] </td>";
                            echo "<td> $donnees[remuneration] euros </td>";
                            echo "<td> $donnees[nom]</td>";
                            echo "<td> $donnees[departement]</td>";
                            echo "</tr>";          
                        }
                }
                // Test le cas ou le chmaps job, type de contrat, localisation sont remplies et le champ domaine est égale à domaine
            }   else if($typeContrat != 'typeContrat' && $localisation != 'localisation' && $domaine == 'domaine'){
                    
	            	if(is_numeric($localisation)){
	            		if($localisation >= 1 && 95 >= $localisation){
	            			// Test le cas ou l'on cherche un stage et une alternance en meme temps
	            			if($typeContrat == 'all'){
		                        $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND e.departement = :localisation");    
		                        $req->bindParam(':job',$job);
		                        $req->bindParam(':localisation',$localisation);
		                        $req->execute();
		                            //On affiche les données dans le tableau
		                            while ($donnees = $req->fetch()){
		                                    echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
		                                    echo "<td> $donnees[titre] </td>";
		                                    echo "<td> $donnees[description] </td>";
		                                    echo "<td> $donnees[typeAnnonce] </td>";
		                                    echo "<td> $donnees[remuneration] euros </td>";
		                                    echo "<td> $donnees[nom]</td>";
		                                    echo "<td> $donnees[departement]</td>";
		                                    echo "</tr>";   
		                                }
		                    } else{  
		                        $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND e.departement = :localisation AND a.typeAnnonce = :type");    
		                        $req->bindParam(':job',$job);
		                        $req->bindParam(':type',$typeContrat);
		                        $req->bindParam(':localisation',$localisation);
		                        $req->execute();
		                            //On affiche les données dans le tableau
		                            while ($donnees = $req->fetch()){
		                                    echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
		                                    echo "<td> $donnees[titre] </td>";
		                                    echo "<td> $donnees[description] </td>";
		                                    echo "<td> $donnees[typeAnnonce] </td>";
		                                    echo "<td> $donnees[remuneration] euros </td>";
		                                    echo "<td> $donnees[nom]</td>";
		                                    echo "<td> $donnees[departement]</td>";
		                                    echo "</tr>";   
		                                }}
	            		}	 
	            	}     
                    // Test le cas ou le chmaps job, type de contrat, domaine sont remplies et le champ localisation est égale à la valeur par défaut localisation
                }   else if($typeContrat != 'typeContrat' &&  $domaine != 'domaine' && $localisation == 'localisation'){
                        // Test le cas ou l'on cherche un stage et une alternance en meme temps
                        if($typeContrat == 'all'){
                            $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%')" );
                            $req->bindParam(':job',$job);
                            $req->bindParam(':domaine',$domaine);
                            $req->execute();
                                //On affiche les données dans le tableau
                                while ($donnees = $req->fetch()){
                                        echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                                        echo "<td> $donnees[titre] </td>";
                                        echo "<td> $donnees[description] </td>";
                                        echo "<td> $donnees[typeAnnonce] </td>";
                                        echo "<td> $donnees[remuneration] euros </td>";
                                        echo "<td> $donnees[nom]</td>";
                                        echo "<td> $donnees[departement]</td>";
                                        echo "</tr>";
                                    }                    
                        }else{
                            $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type " );
                            $req->bindParam(':job',$job);
                            $req->bindParam(':type',$typeContrat);
                            $req->bindParam(':domaine',$domaine);
                            $req->execute();
                                //On affiche les données dans le tableau
                                while ($donnees = $req->fetch()){
                                        echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                                        echo "<td> $donnees[titre] </td>";
                                        echo "<td> $donnees[description] </td>";
                                        echo "<td> $donnees[typeAnnonce] </td>";
                                        echo "<td> $donnees[remuneration] euros </td>";
                                        echo "<td> $donnees[nom]</td>";
                                        echo "<td> $donnees[departement]</td>";
                                        echo "</tr>";
                                    }   
                        }
                        // Test le cas ou tout les champs sont remplis
                    }   else if($typeContrat != 'typeContrat' && $domaine != 'domaine' && $localisation != 'localisation'){
                            // Test le cas ou l'on cherche un stage et une alternance en meme temps
                            if($typeContrat == 'all'){
                                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND e.departement= :localisation");
                                $req->bindParam(':job',$job);
                                $req->bindParam(':domaine',$domaine);
                                $req->bindParam(':localisation',$localisation);
                                $req->execute();
                                //On affiche les données dans le tableau
                                while ($donnees = $req->fetch()){
                                        echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                                        echo "<td> $donnees[titre] </td>";
                                        echo "<td> $donnees[description] </td>";
                                        echo "<td> $donnees[typeAnnonce] </td>";
                                        echo "<td> $donnees[remuneration] euros </td>";
                                        echo "<td> $donnees[nom]</td>";
                                        echo "<td> $donnees[departement]</td>";
                                        echo "</tr>";
                                    }
                            }else{
                                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type AND e.departement= :localisation");
                                $req->bindParam(':job',$job);
                                $req->bindParam(':type',$typeContrat);
                                $req->bindParam(':domaine',$domaine);
                                $req->bindParam(':localisation',$localisation);
                                $req->execute();
                                //On affiche les données dans le tableau
                                while ($donnees = $req->fetch()){
                                        echo "<table><tr><th>Poste</th><th>description</th><th>type de contrat</th><th>remunération</th><th>Nom entreprise</th><th>Localisation</th></tr><tr>";
                                        echo "<td> $donnees[titre] </td>";
                                        echo "<td> $donnees[description] </td>";
                                        echo "<td> $donnees[typeAnnonce] </td>";
                                        echo "<td> $donnees[remuneration] euros </td>";
                                        echo "<td> $donnees[nom]</td>";
                                        echo "<td> $donnees[departement]</td>";
                                        echo "</tr>";
                                    }
                            }
                        }else if($typeContrat == 'typeContrat') echo "<div class='alertError'>Veuillez remplir au moins le champ type de contrat</div>"; // Sinon si type de contrat = valeur par defautl Msg erreur champ type contrat vide
                        else echo "<div class='alertError'>Votre recherche n'est pas correcte !</div>";  // Sinon Msg erreur   
        }else echo "<div class='alertError'>Veuillez remplir le job souhaité</div>"; // Sinon Msg erreur champ job vide
    }   
?>
            <!--Formulaire search-->
            <form action="" method="post">
                <input type="text" name="job" class="job" placeholder="Job que vous cherchez" />
                <select name="domaine" class="domaine">
                    <option value="domaine" selected>Domaine</option>
                    <option class="option" value="medecine">Médecine</option>
                    <option class="option" value="informatique">Informatique</option>
                </select>
                <select name="type_contrat" class="type_contrat">
                    <option value="typeContrat" selected>Type de contrat</option>
                    <option value="all">Alternance ou Stage</option>
                    <option value="alternance">Alternance</option>
                    <option value="stage">Stage</option>
                </select>
                <select name="localisation" class="localisation">
                    <option value="localisation" selected>Localisation</option>
                    <?php
                        for ($i = 1; $i <= 99; $i++) {
                            ?>
                                <option class="option" <?php echo 'value="'.$i.'"'; ?>><?php echo $i; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <input type="submit" name="sendSearch" class="sendSearch" value="Rechercher" />
            </form>
        </div>
</body>
</html>