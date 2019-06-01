<?php
    if (isset($_POST['submitCompetence'])) {
        $competence = security($_POST['competence']);
        $domaine = security($_POST['domaine']);
        $niveau = security($_POST['niveau']);
        if ($competence && $domaine && $niveau != "Niveau") {
            if ($niveau == "Débutant" || $niveau == 'Intermédiaire' || $niveau == "Avancé" || $niveau == "Expert") {
                $req = addCompetencesAnnonce($bdd,$idannonce, $domaine, $competence, $niveau);
                echo "<div class='alertSuccess'>Compétence ajoutée !</div><br />";
            } else echo "<div class='alertError'>Le niveau est incorrect !</div><br />";
        } else echo "<div class='alertError'>Veuillez remplir tous les champs</div><br />";
    }
?>