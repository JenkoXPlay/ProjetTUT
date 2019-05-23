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
                    $req2 = $bdd->query("SELECT COUNT(*) AS countid FROM entreprises WHERE responsable='{$dataUser['id']}'"); //(responsable = id user)
                    $reqfetch = $req2->fetch();
                    if ($reqfetch['countid'] != 0) {
                        $req_info_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                        while($dataEntreprise = $req_info_entreprise->fetch()) {
                            $req_annonce = getAnnonceIdCompagny($bdd,$dataEntreprise['id']);
                            $req3 = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE entreprise='{$dataEntreprise['id']}'");
                            $CountAnnonce = $req3->fetch();
                            if ($CountAnnonce['countid'] > 0) {
                                $reqEntrepriseId = getEntrepriseId($bdd, $dataEntreprise['id']);
                                while ($dataEntrepriseId = $reqEntrepriseId->fetch()) {
                                    $req_all_annonce = getAnnonceIdCompagny($bdd, $dataEntrepriseId['id']);
                                    while ($dataAllAnnonce = $req_all_annonce->fetch()) {
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
                                                    <input class="inputText width_100 margin_tb_20" type="text" name="title" value="<?php echo $dataAllAnnonce['titre'];?>"/>
                                                    <label for="description">Description de l'offre</label> 
                                                    <textarea name="description" class="inputTextarea width_100 noresize margin_tb_20" rows="10" value="" ><?php echo $dataAllAnnonce['description'];?></textarea>
                                                    <label for="profil">Profil recherché</label>
                                                    <input placeholder="Le profil sera modifiable une fois l'annonce créée.." name="profil" class="inputText width_100 margin_tb_20"/>
                                                    <label for="typeAnnonce">Type d'annonce</label>
                                                    <select class="inputText width_100 margin_tb_20"  name="typeAnnonce" class="type_contrat">
                                                        <option value="<?php echo $dataAllAnnonce['typeAnnonce']; ?>" selected><?php echo $dataAllAnnonce['typeAnnonce']; ?></option>
                                                        <option value="Alternance">Alternance</option>
                                                        <option value="stage">Stage</option>
                                                    </select>
                                                    <label for="remuneration">Rénumération</labeL>
                                                    <input class="inputText width_100 margin_tb_20" type="number" name="remuneration" value="<?php echo $dataAllAnnonce['remuneration']; ?>"/>
                                                    <div class="txtRight">
                                                        <input type="submit" name="subAnnonce" value="Modifier" class="btnPurple btnpadding" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="annonceList">
                                                <div class="title">Les annonces de l'entreprise</div>
                                                <?php
                                                    // si problème alignement regarder dans le css position sticky
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
                                            </div>
                                        </div>
                    <?php
                                    }
                                }
                            } else {
                    ?>
                                <div class='alertError'>Vous n'avez pas encore d'annonce ! Redirection...</div><br />
                                <head><meta http-equiv="refresh" content="2;URL=/editannonce" /></head><?php
                            }
                             
                        }
                    } else{ 
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