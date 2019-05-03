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
                while ($dataAnnonce = $getAnnonce->fetch()){
                    if ($dataAnnonce['id'] == $idAnnonce) {
                        ?>

                            <div class="contentPageAnnonce">
                                <div class="pageAnnonce">
                                    <a href="/home"class="goBack"><i class="icon icon-back"></i> Retour aux annonces</a>
                                    <br /><br />

                                    <?php
                                        include('./function/entreprise.php');
                                        $reqEntreprise = getEntrepriseId($bdd, $dataAnnonce['entreprise']);
                                        while ($dataEntreprise = $reqEntreprise->fetch()) {
                                            ?>
                                                <div class="headerAnnonce">
                                                    <img src="/avatar/<?php echo $dataEntreprise['logo'] ?>" class="logoInc" />
                                                    <br />
                                                    <span class="subtitle"><?php echo $dataEntreprise['nom']; ?></span>

                                                    <div class="separator"></div>

                                                    <span class="title"><?php echo $dataAnnonce['titre']; ?></span>

                                                    <div class='info'>
                                                        <div>
                                                            <img src='/img/maletteNoir2.png' style='width: 16px; height: 16px;margin-right: 5px;' />
                                                            <span><?php echo $dataAnnonce['typeAnnonce']; ?></span>
                                                        </div>
                                                        <div>
                                                            <img src='/img/localisationNoir2.png' style='width: 16px; height: 16px;margin-right: 5px;' />
                                                            <span><?php echo $dataEntreprise['departement']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="annonceList">
                                    ksdjfhj
                                </div>
                            </div>

                        <?php
                    } else echo "non";
                }
            } else {
                echo "erreur";
            }
        ?>

    </div>

<?php include('footer.php'); ?>