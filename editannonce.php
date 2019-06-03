<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">
        <?php
            include('./function/annoncesentreprises.php');
            include('./function/entreprise.php');
            $idannonce = $this->params['id_annonce'];
            
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            
            while ($dataUser = $req_info_user->fetch()) {
                /* test le cas pour un etudiant pro*/
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/erreur');
                } else if ($dataUser['type_compte'] == "pro") {
                    /* Requête dans le cas ou l'on à pas d'entreprised*/
                    $req2 = $bdd->query("SELECT COUNT(*) AS countid FROM entreprises WHERE responsable='{$dataUser['id']}'"); //(responsable = id user)
                    $reqfetch = $req2->fetch();
                    if ($reqfetch['countid'] != 0) {
                        $req_info_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                        while($dataEntreprise = $req_info_entreprise->fetch()) {
                            /* Requête dans le cas ou l'on à pas d'annonce */
                            $req3 = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE entreprise='{$dataEntreprise['id']}'");
                            $CountAnnonce = $req3->fetch();
                            if ($CountAnnonce['countid'] > 0) {
                                    // requete une annonce à récuperer
                                    $req_annonce = getAnnonceId($bdd, $idannonce);
                                    while ($dataAnnonce = $req_annonce->fetch()) {
                                        ?>
                                        <div class="contentPageAnnonce">
                                            <div class="pageAnnonce">
                                                <div class="title">Modifer vos annonces</div>
                                                <hr />
                                                <?php
                                                    include('./script_php/security.php');
                                                    include('./script_php/maj_annonce.php');
                                                ?>
                                                <form  action="" method="post"> 
                                                    <label for="title">Titre de votre annonce</label>
                                                    <input class="inputText width_100 margin_tb_20" type="text" name="title" value="<?php echo $dataAnnonce['titre'];?>"/>
                                                    <label for="description">Description de l'offre</label> 
                                                    <textarea name="description" class="inputTextarea width_100 noresize margin_tb_20" rows="10" value="" ><?php echo $dataAnnonce['description'];?></textarea>
                                                    <label for="typeAnnonce">Type d'annonce</label>
                                                    <select class="inputText width_100 margin_tb_20"  name="typeAnnonce" class="type_contrat">
                                                        <option style="display:none;"value="<?php echo $dataAnnonce['typeAnnonce']; ?>" selected><?php echo $dataAnnonce['typeAnnonce']; ?></option>
                                                        <option value="Alternance">Alternance</option>
                                                        <option value="stage">Stage</option>
                                                    </select>
                                                    <label for="remuneration">Rénumération</labeL>
                                                    <input class="inputText width_100 margin_tb_20" type="number" name="remuneration" value="<?php echo $dataAnnonce['remuneration']; ?>"/>
                                                    <div class="txtRight">
                                                        <input type="submit" name="subAnnonce" value="Modifier" class="btnPurple btnpadding" />
                                                    </div>
                                                </form>
                                                <form action="" method="POST">
                                                    <div class="title labelForm">Profil recherché</div>
                                                    <div class="panelModifAnnonce">
                                                    <?php
                                                        include('./function/competencesannonce.php');
                                                        include('./script_php/add_competencesannonce.php');
                                                    ?>
                                                        
                                                            <div class="inputFlex">
                                                                <div class="itemFlex">
                                                                    <input type="text" name="competence" class="inputText width_90" placeholder="Compétence : Photoshop" />
                                                                </div>
                                                                <div class="itemFlex">
                                                                    <input type="text" name="domaine" class="inputText width_90" placeholder="Domaine : Informatique" />
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <div class="inputFlex">
                                                                <div class="itemFlex">
                                                                    <select class="inputSelect width_90" name="niveau">
                                                                        <option selected>Niveau</option>
                                                                        <option value="Débutant">Débutant</option>
                                                                        <option value="Intermédiaire">Intermédiaire</option>
                                                                        <option value="Avancé">Avancé</option>
                                                                        <option value="Expert">Expert</option>
                                                                    </select>
                                                                </div>
                                                                <div class="itemFlex">
                                                                    <input type="submit" name="submitCompetence" class="btnPurple width_90" value="Ajouter" />
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <br />
                                                    <?php
                                                        if (isset($_POST['deleteCompAnnonce'])) {
                                                            $idCompAnnonce = security($_POST['idCompAnnonce']);
                                                            if ($idCompAnnonce) {
                                                                $verifCompAnnonce = $bdd->query("SELECT COUNT(*) AS countid FROM competencesannonce WHERE id='$idCompAnnonce' AND annonce='{$dataAnnonce['id']}'");
                                                                $verifCompAnnonceFetch = $verifCompAnnonce->fetch();
                                                                if ($verifCompAnnonceFetch['countid'] != 0) {
                                                                    $req  = deleteCompAnnonceId($bdd, $idCompAnnonce);
                                                                    echo "<div class='alertSuccess'>Compétence supprimée !</div><br />";
                                                            } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                                                        } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                                                    }
                                                    ?>
                                                    <div class="competences">
                                                        <?php
                                                            $req_info_comp = $bdd->prepare("SELECT * FROM competencesannonce WHERE annonce='{$dataAnnonce['id']}'");
                                                            $req_info_comp->execute();
                                                            while ($dataComp = $req_info_comp->fetch()) {
                                                                ?>
                                                                    
                                                                        <input type="text" name="idCompAnnonce" value="<?php echo $dataComp['id']; ?>" style="display:none;" />
                                                                        <span>
                                                                            <?php echo $dataComp['competence']." : ".$dataComp['level']; ?>
                                                                            <input type="submit" name="deleteCompAnnonce" class="btnCross" value="X" />
                                                                        </span>
                                                                    
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="annonceList">
                                                <div class="title">Les annonces de l'entreprise</div>
                                                <?php
                                                    // si problème alignement regarder dans le css position sticky
                                                    $reqEntrepriseId = getEntrepriseId($bdd, $dataEntreprise['id']);
                                                    while ($dataEntrepriseId = $reqEntrepriseId->fetch()) {
                                                        $req_all_annonce = getAnnonceIdCompagny($bdd, $dataEntrepriseId['id']);
                                                        while ($dataAllAnnonce = $req_all_annonce->fetch()) {
                                                            ?>
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
                                                            <?php
                                                        }
                                                    }
                                                ?>                                               
                                            </div>
                                        </div>
                    <?php
                                    } 
                            } else {
                    ?>
                                <div class='alertError'>Vous n'avez pas encore d'annonce ! Redirection...</div><br />
                                <head><meta http-equiv="refresh" content="2;URL=/editannonce" /></head><?php
                            }
                             
                        }
                    } else { 
        ?>
                    <div class='alertError'>Vous n'avez pas encore crée votre entreprise ! Redirection...</div><br />
                    <head><meta http-equiv="refresh" content="2;URL=/editentreprise" /></head>
        <?php
                }
            } 
        }
        ?>   
    </div>
<?php include('footer.php'); ?>