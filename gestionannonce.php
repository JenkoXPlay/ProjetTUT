<?php include('header.php'); ?>
    
    <div class="banniereHome"></div>

    <div class="content">
        <?php
            include('./function/annoncesentreprises.php');
            include('./function/competencesannonce.php');
            include('./function/reponsesannonces.php');
            include('./function/entreprise.php');
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            
            while ($dataUser = $req_info_user->fetch()) {
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/erreur');
                } else if ($dataUser['type_compte'] == "pro") {
                    /* Requête dans le cas ou l'on à pas d'entreprised*/
                    $req2 = $bdd->query("SELECT COUNT(*) AS countid FROM entreprises WHERE responsable='{$dataUser['id']}'"); //(responsable = id user)
                    $reqfetch = $req2->fetch();
                    if ($reqfetch['countid'] != 0) {
                        $req_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                        while($dataEntreprise = $req_entreprise->fetch()) {
                            /* Requête dans le cas ou l'on à pas d'annonce */
                            $req3 = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE entreprise='{$dataEntreprise['id']}'");
                            $CountAnnonce = $req3->fetch();
                            if ($CountAnnonce['countid'] > 0) {
        ?>
                                <div class="contentPageAnnonce">
                                    <div class="pageAnnonce">
                                        <div class="title">Gestion des annonces</div>
                                        <hr />
                                        <?php      
                                            if (isset($_POST['supprimer'])) {
                                                $idAnnonce = $_POST['idAnnonce'];    
                                                if ($idAnnonce) {
                                                    $verifAnnonce = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE id='$idAnnonce' AND entreprise='{$dataEntreprise['id']}'");
                                                    $verifAnnonceFetch = $verifAnnonce->fetch();
                                                    if ($verifAnnonceFetch['countid'] != 0) {
                                                        $deleteCompAnnonce = deleteAllCompAnnonce($bdd, $idAnnonce);
                                                        $deleteRepAnnonce = deleteRepAnnonce($bdd, $idAnnonce);
                                                        $deleteAnnonce = deleteAnnonceId($bdd, $idAnnonce);
                                                        echo "<div class='alertSuccess'>Annonce supprimée ainsi que les données qui lui sont associées !</div><br />";
                                                        ?><head><meta http-equiv="refresh" content="2;URL=/gestionannonce" ></head><?php
                                                    } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                                                } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                                            }                           
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
                                                        <?php  
                                                            if (isset($_POST['afficher'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/annonce/<?php echo $dataAllAnnonce['id']; ?>" /></head><?php
                                                            }
                                                            if (isset($_POST['modifier'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/editannonce/<?php echo $dataAllAnnonce['id']; ?>" /></head><?php
                                                            }
                                                            if (isset($_POST['candidature'])) {
                                                                ?><head><meta http-equiv="refresh" content="0;URL=/repannonce/<?php echo $dataAllAnnonce['id']; ?>"></head><?php
                                                            }
                                                        ?>
                                                        <div class="contentGestion">
                                                            <div class="gestionAnnonce">                                                              
                                                                <div class="form">
                                                                    <form class="margin_auto"  action=" " method="POST">
                                                                        <input name="afficher" class="btnGestion" type="submit" value="Aperçu"/>
                                                                        <input name="modifier" class="btnGestion" type="submit" value="Modifier"/>
                                                                    
                                                                        <input type="text" name="idAnnonce" value="<?php echo $dataAllAnnonce['id']; ?>" readonly style="display:none;" />
                                                                        <input name="supprimer" class="btnSup" type="submit" value="Supprimer"/>
                                                                    
                                                                        <input name="candidature" class="btnGestion" type="submit" value="Candidature"/>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        ?>   
                                    </div>
                        <?php
                            } else {
                        ?>
                                    <div class='alertError'>Vous n'avez pas encore d'annonce ! Redirection...</div><br />
                                    <head><meta http-equiv="refresh" content="2;URL=/editannonce" /></head><?php
                            }
                        }
                    }
                    ?>
                                </div>
                <?php 
                    } else { 
                ?>
                        <div class='alertError'>Vous n'avez pas encore crée votre entreprise ! Redirection...</div><br />
                        <head><meta http-equiv="refresh" content="2;URL=/editentreprise" /></head>
        <?php
                    }
            }
        ?>
    </div>
<?php include('footer.php'); ?>