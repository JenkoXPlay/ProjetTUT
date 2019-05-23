<?php
// Test si le formulaire est validé (click btn search)
if (isset($_POST['sendSearch'])) {
    /*Récupération des données*/
    $job=security($_POST['job']);
    $typeContrat=security($_POST['type_contrat']);
    $localisation=security($_POST['localisation']);
    $domaine=security($_POST['domaine']);
    // Test si le champs job et domaine n'est pas vide
    if(!empty($job) && !empty($domaine)){
        
        // Test le cas ou le chmaps job, type de contrat, domaine sont remplies et le champ localisation est égale à la valeur par défaut localisation
         if ($typeContrat != 'typeContrat' && $localisation == 'localisation') {
            // Test le cas ou l'on cherche un stage et une alternance en meme temps
            if($typeContrat == 'all'){
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%')" );
                $req->bindParam(':job',$job);
                $req->bindParam(':domaine',$domaine);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');                  
            } else {
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type " );
                $req->bindParam(':job',$job);
                $req->bindParam(':type',$typeContrat);
                $req->bindParam(':domaine',$domaine);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');     
            }
        // Test le cas ou tout les champs sont remplis
        } else if ($typeContrat != 'typeContrat' && $localisation != 'localisation') {
            if(is_numeric($localisation)){
                if($localisation >= 1 && 95 >= $localisation){
                    // Test le cas ou l'on cherche un stage et une alternance en meme temps
                    if($typeContrat == 'all'){
                        $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND e.departement= :localisation");
                        $req->bindParam(':job',$job);
                        $req->bindParam(':domaine',$domaine);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    } else {
                        $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND  a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type AND e.departement= :localisation");
                        $req->bindParam(':job',$job);
                        $req->bindParam(':type',$typeContrat);
                        $req->bindParam(':domaine',$domaine);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    }
                }   
            }
        }else if ($typeContrat == 'typeContrat') {
            // Sinon si type de contrat = valeur par defautl Msg erreur champ type contrat vide
            echo "<div class='alertError'>Veuillez remplir au moins le champ type de contrat</div>";
        } else echo "<div class='alertError'>Votre recherche n'est pas correcte !</div>";  // Sinon Msg erreur 
    }
    else if(!empty($domaine) && empty($job)){
        if($typeContrat != 'typeContrat' && $localisation != 'localisation'){
            if(is_numeric($localisation)){
                if($localisation >= 1 && 95 >= $localisation){
                    // Test le cas ou l'on cherche un stage et une alternance en meme temps
                    if($typeContrat == 'all'){
                        //requête
                        $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND e.departement= :localisation");
                        $req->bindParam(':domaine',$domaine);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    } else {
                        /*Sinon Test le cas ou l'on cherche soit un stage ou soit une alternance*/
                        $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND a.typeAnnonce = :type AND e.departement= :localisation");    
                        $req->bindParam(':domaine',$domaine);
                        $req->bindParam(':type',$typeContrat);
                        $req->bindParam(':localisation',$localisation);                        
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    }
                }
            }
        } else if($typeContrat != 'typeContrat' && $localisation == 'localisation'){
            // Test le cas ou l'on cherche un stage et une alternance en meme temps
            if($typeContrat == 'all'){
                //requête
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise");
                $req->bindParam(':domaine',$domaine);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');  
            } else {
                /*Sinon Test le cas ou l'on cherche soit un stage ou soit une alternance*/
                $req = $bdd->prepare("SELECT DISTINCT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement, c.annonce, c.domaine FROM annoncesentreprises AS a, entreprises AS e, competencesannonce AS c WHERE a.id = c.annonce AND c.domaine LIKE CONCAT('%',:domaine,'%') AND e.id = a.entreprise AND a.typeAnnonce = :type");    
                $req->bindParam(':domaine',$domaine);
                $req->bindParam(':type',$typeContrat);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');  
            }
        } else if ($typeContrat == 'typeContrat') {
            // Sinon si type de contrat = valeur par defautl Msg erreur champ type contrat vide
            echo "<div class='alertError'>Veuillez remplir au moins le champ type de contrat</div>";
        } else echo "<div class='alertError'>Votre recherche n'est pas correcte !</div>";  // Sinon Msg erreur  
    } else if(empty($domaine) && !empty($job)){

        // Test le cas ou lelse if(empty($domaine) &&e chmaps job et type de contrat sont remplies et les deux autres sont égaux à leurs valeurs par défauts
        if($typeContrat != 'typeContrat' && $localisation == 'localisation'){
            // Test le cas ou l'on cherche un stage et une alternance en meme temps
            if($typeContrat == 'all'){
                //requête
                $req = $bdd->prepare("SELECT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%')");
                $req->bindParam(':job',$job);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');  
            } else {
                /*Sinon Test le cas ou l'on cherche soit un stage ou soit une alternance*/
                $req = $bdd->prepare("SELECT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND a.typeAnnonce = :type");    
                $req->bindParam(':job',$job);
                $req->bindParam(':type',$typeContrat);
                $req->execute();
                //On affiche les données dans le tableau
                include('affichagealgorecherche.php');  
            } 
        // Test le cas ou le champs job, type de contrat, localisation sont remplies et le champ domaine est égale à domaine
        } else if ($typeContrat != 'typeContrat' && $localisation != 'localisation') {
            if(is_numeric($localisation)){
                if($localisation >= 1 && 95 >= $localisation){
                    // Test le cas ou l'on cherche un stage et une alternance en meme temps
                    if($typeContrat == 'all'){
                        $req = $bdd->prepare("SELECT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND e.departement = :localisation");    
                        $req->bindParam(':job',$job);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    } else {  
                        $req = $bdd->prepare("SELECT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise AND a.titre LIKE CONCAT('%',:job,'%') AND e.departement = :localisation AND a.typeAnnonce = :type");    
                        $req->bindParam(':job',$job);
                        $req->bindParam(':type',$typeContrat);
                        $req->bindParam(':localisation',$localisation);
                        $req->execute();
                        //On affiche les données dans le tableau
                        include('affichagealgorecherche.php');  
                    }
                }	 
            }     

    } else if ($typeContrat == 'typeContrat') {
        // Sinon si type de contrat = valeur par defautl Msg erreur champ type contrat vide
        echo "<div class='alertError'>Veuillez remplir au moins le champ type de contrat</div>";
    } else echo "<div class='alertError'>Votre recherche n'est pas correcte !</div>";  // Sinon Msg erreur   
} else echo "<div class='alertError'>Veuillez remplir le job/domaine souhaité</div>"; // Sinon Msg erreur champ job vide
} else {
    $req = $bdd->prepare("SELECT a.id, a.entreprise, a.titre, a.description, a.typeAnnonce, a.remuneration, e.id AS idE,e.nom, e.departement  FROM annoncesentreprises AS a, entreprises AS e WHERE e.id = a.entreprise ORDER BY a.id DESC LIMIT 5");
    $req->execute();
    include('affichagealgorecherche.php');
}  
?>