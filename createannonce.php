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
                            $req3 = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE entreprise='{$dataEntreprise['id']}'");
                            $CountAnnonce = $req3->fetch();
                            if ($CountAnnonce['countid'] <= 2) { ?>
                                <div class="contentPageAnnonce">
                                    <div class="pageAnnonce">
                                        <div class="title">Ajouter une annonce</div>
                                        <hr />
                                        <?php
                                             include('./script_php/security.php');
                                             include('./script_php/add_annonce.php');
                                         ?>
                                        <form  action="" method="post"> 
                                            <label for="title">Titre de votre annonce</labeL>
                                            <input class="inputText width_100 margin_tb_20" type="text" name="title" placeholder="Titre de votre annonce"/>
                                            <label for="description">Description de l'offre</label> 
                                            <textarea name="description" class="inputTextarea width_100 noresize margin_tb_20" rows="10" placeholder="Description de l'offre"></textarea>
                                            <br />
                                            <label for="typeAnnonce">Type d'annonce</label>
                                            <select class="inputText width_100 margin_tb_20"  name="typeAnnonce" class="type_contrat">
                                                <option value="typeAnnonce" selected>Type d'annonce</option>
                                                <option value="Alternance">Alternance</option>
                                                <option value="stage">Stage</option>
                                            </select>
                                            <label for="remuneration">Rénumération</labeL>
                                            <input class="inputText width_100 margin_tb_20" type="number" name="remuneration" placeholder="Rénumération"/>
                                            <div class="txtRight">
                                                <input type="submit" name="subAnnonce" value="Créer" class="btnPurple btnpadding" />
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
                            } else {
                               ?> <div class='alertError'>Vous avez déja 3 annonces ! Redirection vers la boutique...</div><br />
                               <head><!--<meta http-equiv="refresh" content="2;URL=/boutique" /></head>--><?php
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