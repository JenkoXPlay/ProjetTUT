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
                        include('./function/entreprise.php');
                        $reqEntreprise = getEntrepriseId($bdd, $dataAnnonce['entreprise']);
                        while ($dataEntreprise = $reqEntreprise->fetch()) {
                            $req_user = getMailUser($bdd, $_SESSION['email']);
                            while ($dataUser = $req_user->fetch()) {                                                      
        ?>
                                <div class="contentPageAnnonce">
                                    <div class="pageAnnonce">
                                    <?php if ($dataUser['type_compte'] == "etudiant") {?>
                
                                        <a href="/home"class="goBack"><i class="icon icon-back"></i> Retour aux annonces</a>
                                    <?php } else if ($dataUser['type_compte'] == "pro") {?>
                                    <div class="flexNav">
                                        <a href="/home" class="goBack"><i class="icon icon-back"></i> Retour aux annonces</a>
                                        <a href="/gestionannonce"class="goBack">Voir mes annonces <i class="icon icon-forward"></i> </a>
                                    </div>
                                    <?php } ?>
                                        <br /><br />                                    
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
                                                <a href="<?php echo $dataEntreprise['siteweb']; ?>" target="_blank">Visiter le site de <?php echo $dataEntreprise['nom']; ?></a>
                                                <br />

                                                <br />
                                                
                                                
                                                            <?php
                                                                include('./function/reponsesannonces.php');
                                                                include('./script_php/security.php');
                                                                if (isset($_POST['subPostuler'])) {
                                                                    $idUser = security($_POST['idUser']);
                                                                    if ($idUser) {
                                                                        if ($idUser == $dataUser['id']) {
                                                                            $req_add_annonce = addRepAnnonce($bdd, $dataAnnonce['id'], $dataUser['id'], $dataAnnonce['entreprise']);
                                                                            echo "<div class='alertSuccess marginCenter width_50'>Votre candidature a été envoyée avec succès !</div><br />";

                                                                            // envoi mail au responsable entreprise
                                                                            include('./script_php/email.php');
                                                                            // on récupère l'email du responsable
                                                                            $responsable = $bdd->query("SELECT * FROM users WHERE id='{$dataEntreprise['responsable']}'");
                                                                            while ($responsableData = $responsable->fetch()) {
                                                                                $destinataire = $responsableData['email'];
                                                                                $titre = "Nouvelle candidature !";
                                                                                $msgHTML = "Bonjour ".$responsableData['prenom']." ".$responsableData['nom']."<br /><br />";
                                                                                $msgHTML .= "Une de vos annonces possède une nouvelle candidature, allez voir c'est peut-être votre futur(e) employé(e) !<br /><br />";
                                                                                $msgHTML .= "Cordialement, l'équipe Alt'itude.";
                                                                                $mail = sendMail($destinataire, $titre, $msgHTML);
                                                                                if($mail) {
                                                                                    echo "<br /><div class='alertSuccess marginCenter width_50'>Le responsable va recevoir une notification !</div><br />";
                                                                                } else {
                                                                                    echo "<br /><div class='alertError marginCenter width_50'>Une erreur est survenue (email) !</div><br />";
                                                                                }
                                                                            }
                                                                        
                                                                        } else echo "<div class='alertError marginCenter width_50'>Une erreur est survenue !</div><br />";
                                                                    } else echo "<div class='alertError marginCenter width_50'>Une erreur est survenue !</div><br />";
                                                                }

                                                                $reqVerifCandidature = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE idAnnoncesEntreprises='{$dataAnnonce['id']}' AND candidat='{$dataUser['id']}'");
                                                                $countCandidature = $reqVerifCandidature->fetch();
                                                                if ($countCandidature['countid'] != 0) {
                                                                    echo "<div class='alertSuccess marginCenter width_50'>Votre candidature est en attente !</div><br />";
                                                                } else {
                                                                    if ($dataUser['type_compte'] == "etudiant") {
                                                                        ?>
                                                                            <form action="" method="post">
                                                                                <input type="text" name="idUser" value="<?php echo $dataUser['id']; ?>" readonly style="display:none;" />
                                                                                <input type="submit" name="subPostuler" class="btnPostuler" value="Postuler maintenant" />
                                                                            </form>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                            
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="contentAnnonce">
                                                <div class="title">Description de l'offre</div>
                                                <?php echo nl2br($dataAnnonce['description']); ?>

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
                                                    <a href="/annonce/<?php echo $dataAllAnnonce['id']; ?>">
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
                    } else echo "Une erreur est survenue !";
                }
            } else {
                header('Location:/erreur');
            }
        ?>

        <br /><br />

    </div>

<?php include('footer.php'); ?>