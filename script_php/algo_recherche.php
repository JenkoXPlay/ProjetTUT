<?php
// Test si le formulaire est validé (click btn search)
if (isset($_POST['sendSearch'])) {
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
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";         
                }
            } else {
                /*Sinon Test le cas ou l'on cherche soit un stage ou soit une alternance*/
                $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type");    
                $req->bindParam(':job',$job);
                $req->bindParam(':type',$typeContrat);
                $req->execute();
                //On affiche les données dans le tableau
                while ($donnees = $req->fetch()){
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";         
                }
            }
        // Test le cas ou le chmaps job, type de contrat, localisation sont remplies et le champ domaine est égale à domaine
        } else if ($typeContrat != 'typeContrat' && $localisation != 'localisation' && $domaine == 'domaine') {
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
                            echo "<div class='annonce'>";
                                echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                                echo "<div class='sujet'>";
                                    echo "<span>".$donnees['nom']."</span><br />";
                                    echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                                    echo "<br /><br />";
                                    echo "<div class='info'>";
                                        echo "<div>";
                                            echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                            echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                            echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='favoris'>";
                                    echo "<img src='./img/star.svg' />";
                                echo "</div>";
                            echo "</div>";  
                        }
                    } else {  
                        $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND e.departement = :localisation AND a.typeAnnonce = :type");    
                        $req->bindParam(':job',$job);
                        $req->bindParam(':type',$typeContrat);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        while ($donnees = $req->fetch()){
                            echo "<div class='annonce'>";
                                echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                                echo "<div class='sujet'>";
                                    echo "<span>".$donnees['nom']."</span><br />";
                                    echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                                    echo "<br /><br />";
                                    echo "<div class='info'>";
                                        echo "<div>";
                                            echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                            echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                            echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='favoris'>";
                                    echo "<img src='./img/star.svg' />";
                                echo "</div>";
                            echo "</div>";  
                        }
                    }
                }	 
            }     
        // Test le cas ou le chmaps job, type de contrat, domaine sont remplies et le champ localisation est égale à la valeur par défaut localisation
        } else if ($typeContrat != 'typeContrat' &&  $domaine != 'domaine' && $localisation == 'localisation') {
            // Test le cas ou l'on cherche un stage et une alternance en meme temps
            if($typeContrat == 'all'){
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%')" );
                $req->bindParam(':job',$job);
                $req->bindParam(':domaine',$domaine);
                $req->execute();
                //On affiche les données dans le tableau
                while ($donnees = $req->fetch()){
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";
                }                    
            } else {
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type " );
                $req->bindParam(':job',$job);
                $req->bindParam(':type',$typeContrat);
                $req->bindParam(':domaine',$domaine);
                $req->execute();
                //On affiche les données dans le tableau
                while ($donnees = $req->fetch()){
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";
                }   
            }
        // Test le cas ou tout les champs sont remplis
        } else if ($typeContrat != 'typeContrat' && $domaine != 'domaine' && $localisation != 'localisation') {
            // Test le cas ou l'on cherche un stage et une alternance en meme temps
            if($typeContrat == 'all'){
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND e.departement= :localisation");
                $req->bindParam(':job',$job);
                $req->bindParam(':domaine',$domaine);
                $req->bindParam(':localisation',$localisation);
                $req->execute();
                //On affiche les données dans le tableau
                while ($donnees = $req->fetch()){
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";
                }
            } else {
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine = :domaine AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type AND e.departement= :localisation");
                $req->bindParam(':job',$job);
                $req->bindParam(':type',$typeContrat);
                $req->bindParam(':domaine',$domaine);
                $req->bindParam(':localisation',$localisation);
                $req->execute();
                //On affiche les données dans le tableau
                while ($donnees = $req->fetch()){
                    echo "<div class='annonce'>";
                        echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
                        echo "<div class='sujet'>";
                            echo "<span>".$donnees['nom']."</span><br />";
                            echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                            echo "<br /><br />";
                            echo "<div class='info'>";
                                echo "<div>";
                                    echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                                echo "</div>";
                                echo "<div>";
                                    echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                                    echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='favoris'>";
                            echo "<img src='./img/star.svg' />";
                        echo "</div>";
                    echo "</div>";
                }
            }
        } else if ($typeContrat == 'typeContrat') {
            // Sinon si type de contrat = valeur par defautl Msg erreur champ type contrat vide
            echo "<div class='alertError'>Veuillez remplir au moins le champ type de contrat</div>";
        } else echo "<div class='alertError'>Votre recherche n'est pas correcte !</div>";  // Sinon Msg erreur   
    } else echo "<div class='alertError'>Veuillez remplir le job souhaité</div>"; // Sinon Msg erreur champ job vide
} else {
    $req = $bdd->prepare("SELECT * FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise ORDER BY a.id DESC LIMIT 5");
    $req->execute();
    while ($donnees = $req->fetch()){ 
        echo "<div class='annonce'>";
            echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
            echo "<div class='sujet'>";
                echo "<span>".$donnees['nom']."</span><br />";
                echo "<span class='titreAnnonce'>".$donnees['titre']."</span>";
                echo "<br /><br />";
                echo "<div class='info'>";
                    echo "<div>";
                        echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                        echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                    echo "</div>";
                    echo "<div>";
                        echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                        echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='favoris'>";
                echo "<img src='./img/star.svg' />";
            echo "</div>";
        echo "</div>";
    }
}   
?>