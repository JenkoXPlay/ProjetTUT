<?php
    if(isset($_POST['subAnnonce'])){
        $titreAnnonce = security($_POST['title']);
        $description = security($_POST['description']);
        $typeAnnonce = security($_POST['typeAnnonce']);
        $remuneration = security($_POST['remuneration']);
            if ($titreAnnonce&&$description&&$typeAnnonce) {
                if ($typeAnnonce == 'Alternance' || $typeAnnonce == 'stage') {
                    if (is_numeric($remuneration)) {
                        $req = $bdd->exec("UPDATE annoncesentreprises SET titre='$titreAnnonce', description='$description', typeAnnonce='$typeAnnonce', remuneration='$remuneration' WHERE entreprise='{$dataEntreprise['id']}' AND id='$idannonce' ");
                        ?><meta http-equiv="refresh" content="2;URL=/editannonce/<?php echo $dataAnnonce['id']; ?>" /></head><?php
                        echo "<div class='alertSuccess'>Votre annonce à été mise à jour !</div><br />";
                    } else echo "<div class='alertError'>Veuillez saisir un nombre pour la rémunération</div><br />";
                } else echo "<div class='alertError'>Le champs type d'annonce n'est pas correct !</div><br />";
            } else {
                echo "<div class='alertError'>Veuillez remplir les champs !</div><br />";
            }
    }
?>