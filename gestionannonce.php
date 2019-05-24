<?php include('header.php'); ?>
    
    <div class="banniereHome"></div>

    <div class="content">
        <?php
            include('./function/annoncesentreprises.php');
            include('./function/entreprise.php');
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            
            while ($dataUser = $req_info_user->fetch()) {
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/erreur');
                } else if ($dataUser['type_compte'] == "pro") {
                    $req_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                    while($dataEntreprise = $req_entreprise->fetch()) {
        ?>
                        <div class="contentPageAnnonce">
                            <div class="pageAnnonce">
                                <div class="title">Gestion des annonces</div>
                                <hr />
                                <?php
                                    // si problème alignement regarder dans le css position sticky
                                    $reqEntrepriseId = getEntrepriseId($bdd, $dataEntreprise['id']);
                                    while ($dataEntrepriseId = $reqEntrepriseId->fetch()) {
                                        $req_all_annonce = getAnnonceIdCompagny($bdd, $dataEntrepriseId['id']);
                                        while ($dataAllAnnonce = $req_all_annonce->fetch()) {
                                            ?>
                                            <div class="gestionAnnonceList">
                                                <div class="annonce">
                                                    <a href="/editannonce/<?php echo $dataAllAnnonce['id']; ?>">
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
                                                    </a>
                                                </div>
                                                <div class="contentGestion">
                                                    <div class="gestionAnnonce">
                                                        <?php
                                                            if (isset($_POST['afficher'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/afficheannonce" /></head><?php
                                                            }
                                                            if (isset($_POST['modifier'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/editannonce/<?php echo $dataAllAnnonce['id']; ?>" /></head><?php
                                                            }
                                                            if (isset($_POST['supprimer'])) {
                                                                
                                                            }
                                                            if (isset($_POST['candidature'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/repannonce/<?php echo $dataAllAnnonce['id']; ?>"></head><?php
                                                            }
                                                        ?>
                                                        <form class="form" action=" " method="POST">
                                                            <input name="afficher" class="btnGestion" type="submit" value="Aperçu"/>
                                                            <input name="modifier"class="btnGestion" type="submit" value="Modifier"/>
                                                            <input name="supprimer" class="btnSup" type="submit" value="Supprimer"/>
                                                            <input name="candidature" class="btnGestion" type="submit" value="Candidature"/>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>   
                            </div>
                        <?php
                    }
                    ?>
        </div>
        <?php 
                }
            }
        ?>
    </div>
<?php include('footer.php'); ?>