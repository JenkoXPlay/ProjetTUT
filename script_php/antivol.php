<?php
$navigateur = $_SERVER["HTTP_USER_AGENT"];
$bannav = Array('HTTrack','httrack','wget'); // Si le navigateur contient un de ces mots, on le bannit
foreach ($bannav as $banni){
    $comparaison = strstr($navigateur, $banni);
    if($comparaison!==false){
        echo "Tu as besoins d'aide pour voler Alt'itude ? Mais merci pour ton adresse IP, une plainte sera déposée prochainnement  Bonne journée à vous !";
        exit;
    }
}
?>