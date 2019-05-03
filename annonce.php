<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <?php
            include('./function/annoncesentreprises.php');
            $idAnnonce = $this->params['idAnnonce'];
            $getAnnonce = getAnnonceId($bdd, $idAnnonce);
            $countAnnonce = $bdd->query("SELECT COUNT(id) AS countid FROM annoncesentreprises WHERE id='$idAnnonce'");
            $countAnnonceFetch = $countAnnonce->fetch();
            if ($countAnnonceFetch['countid'] != 0) {
                while($dataAnnonce = $getAnnonce->fetch()){
                    if ($dataAnnonce['id'] == $idAnnonce) {
                        echo "ok";
                    } else echo "non";
                }
            } else {
                echo "erreur";
            }
        ?>

    </div>

<?php include('footer.php'); ?>