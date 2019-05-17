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
                            if ($CountAnnonce['countid'] <= 3) { ?>
                                <div class="contentPageAnnonce">
                                    <div class="pageAnnonce">
                                        <div class="title">Ajouter une annonce</div>
                                        <hr />
                                        <?php
                                             include('./script_php/security.php');
                                             include('./script_php/add_annonce.php');
                                         ?>
                                        <form>
                                            <label for="title">Titre de votre annonce</labeL>
                                            <input class="inputText width_100" type="text" name="title" placeholder="Titre de votre annonce"/>
                                            <label for="description">Description de l'offre</label> 
                                            <textarea name="description" class="inputTextarea width_100 noresize" rows="10" placeholder="Description de l'offre"></textarea>
                                            <label for="profil">Profil recherché</label>
                                            <input placeholder="Le profil sera modifiable une fois l'annonce créée.." name="profil" class="inputText width_100"/>
                                            <label for="title">Type d'annonce</labeL>
                                            <input class="inputText width_100" type="text" name="typeAnnonce" placeholder="Ex : Alternance"/>
                                            <label for="title">Rénumération</labeL>
                                            <input class="inputText width_100" type="text" name="renumeration" placeholder="Rénumération"/>
                                            <div class="right">
                                                <input type="submit" name="subAnnonce" value="Enregistrer" class="btnPurple btpadding" />
                                            </div>
                                        </form>
                                    </div>
                            
                                    <div class="annonceList">
                                        <div class="title">Les annonces de l'entreprise</div>
                                    </div>
                                </div>
        <?php
                            } else {

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
    <!--
    <?php/* include('header.php');*/ ?>

    
    <div class="banniereHome"></div>

    <div class="content">
        <?php/*
            include('./function/annoncesentreprises.php');
            $req_info_user = getMailUser($bdd, $_SESSION['email']);

            while ($dataUser = $req_info_user->fetch()) {
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/erreur');
                } else if ($dataUser['type_compte'] == "pro") {
                    $req_info_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                    $req2 = $bdd->query("SELECT COUNT(*) AS countid FROM entreprises WHERE responsable='{$dataUser['id']}'"); //(responsable = id user)
                    $reqfetch = $req2->fetch();
                    if ($reqfetch['countid'] != 0){
                        while($dataEntreprise = $req_info_entreprise->fetch()){
        */
        ?>   
        <div class="contentPageAnnonce">
            <div class="pageAnnonce">
                <div class="title">Ajouter une annonce</div>
                <hr />
                <form>
                    <label for="title">Titre de votre annonce</labeL>
                    <input class="inputText width_100" type="text" name="title" placeholder="Titre de votre annonce"/>
                    <label for="description">Description de l'offre</label> 
                    <textarea name="description" class="inputTextarea width_100 noresize" rows="30" placeholder="Description de l'offre"></textarea>

                    <label for="profil">Profil recherché</label>
                    <input name="profil" class="inputText width_100"/>
                    <div class="right">
                        <input type="submit" name="subAnnonce" value="Enregistrer" class="btnPurple btpadding" />
                    </div>
                </form>
            </div>
    
            <div class="annonceList">
                <div class="title">Les annonces de l'entreprise</div>
            </div>
        <?php
                  /*      }
                    }

                }
            }*/
        
        ?>    
        </div>
    </div>-->