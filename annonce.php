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
                                                    <span class="subtitle" style="margin-left: 10px;">
                                                            (<?php echo $dataAnnonce['remuneration']; ?>
                                                            <img src='/img/euro.png' style='width: 10px; height: 10px;margin-right: 5px;' />)
                                                    </span>

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

                                                    <br />

                                                    <!-- Vérifier si id input == iduser connecté -->
                                                    
                                                    <?php
                                                        $req_user = getMailUser($bdd, $_SESSION['email']);
                                                        while ($dataUser = $req_user->fetch()) {
                                                            ?>
                                                                <?php
                                                                    include('./function/reponsesannonces.php');
                                                                    include('./script_php/security.php');
                                                                    if (isset($_POST['subPostuler'])) {
                                                                        $idUser = security($_POST['idUser']);
                                                                        if ($idUser) {
                                                                            if ($idUser == $dataUser['id']) {
                                                                                $req_add_annonce = addRepAnnonce($bdd, $dataAnnonce['id'], $dataUser['id'], $dataAnnonce['entreprise']);
                                                                                echo "<div class='alertSuccess marginCenter width_50'>Votre candidature a été envoyée avec succès !</div><br />";
                                                                            } else echo "<div class='alertError marginCenter width_50'>Une erreur est survenue !</div><br />";
                                                                        } else echo "<div class='alertError marginCenter width_50'>Une erreur est survenue !</div><br />";
                                                                    }

                                                                    $reqVerifCandidature = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE idAnnoncesEntreprises='{$dataAnnonce['id']}' AND candidat='{$dataUser['id']}'");
                                                                    $countCandidature = $reqVerifCandidature->fetch();
                                                                    if ($countCandidature['countid'] != 0) {
                                                                        echo "<div class='alertSuccess marginCenter width_50'>Votre candidature est en attente !</div><br />";
                                                                    } else {
                                                                        ?>
                                                                            <form action="" method="post">
                                                                                <input type="text" name="idUser" value="<?php echo $dataUser['id']; ?>" readonly style="display:none;" />
                                                                                <input type="submit" name="subPostuler" class="btnPostuler" value="Postuler maintenant" />
                                                                            </form>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                
                                                            <?php
                                                        }
                                                    ?>
                                                </div>

                                                <div class="contentAnnonce">
                                                    <div class="title">Description de l'offre</div>
                                                    <?php echo $dataAnnonce['description']; ?>

                                                    <br /><br />
                                                    <div class="title">Profil recherché</div>
                                                    <?php
                                                        include('./function/competencesannonce.php');
                                                        $reqCompAnnonce = getAllCompAnnonceId($bdd,$dataAnnonce['id']);
                                                        while ($dataComp = $reqCompAnnonce->fetch()) {
                                                            ?>
                                                                <b><?php echo $dataComp['competence']; ?></b> : <?php echo $dataComp['level']; ?><br />
                                                            <?php
                                                        }
                                                    ?>

                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="annonceList">
                                    <div class="title">Les annonces de l'entreprise</div>
                                    <?php
                                        // si problème alignement regarder dans le css position sticky
                                        $reqEntrepriseId = getEntrepriseId($bdd, $dataAnnonce['entreprise']);
                                        while ($dataEntrepriseId = $reqEntrepriseId->fetch()) {
                                            $req_all_annonce = getAnnonceIdCompagny($bdd, $dataEntrepriseId['id']);
                                            while ($dataAllAnnonce = $req_all_annonce->fetch()) {
                                                ?>
                                                    <div class="annonceEntreprise">
                                                        <span class="titre"><?php echo $dataAllAnnonce['titre']; ?></span>
                                                        <div class="info">
                                                            <div>
                                                                <img src='/img/maletteNoir2.png' style='width: 14px; height: 14px;margin-right: 5px;' />
                                                                <?php echo $dataAllAnnonce['typeAnnonce']; ?>
                                                            </div>

                                                            <div>
                                                                <?php echo $dataAllAnnonce['remuneration']; ?>
                                                                <img src='/img/euro.png' style='width: 14px; height: 14px;margin-right: 5px;' />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>

                        <?php
                    } else echo "non";
                }
            } else {
                echo "erreur";
            }
        ?>

        <br /><br />

    </div>

<?php include('footer.php'); ?>