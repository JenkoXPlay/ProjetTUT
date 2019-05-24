<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <br /><br />

        <div class="panelCandidature">

            <?php
                $req_user = getMailUser($bdd, $_SESSION['email']);
                while ($dataUser = $req_user->fetch()) {
                    if ($dataUser['type_compte'] == 'pro') {
                        
                        include('./script_php/security.php');
                        include('./function/annoncesentreprises.php');
                        include('./function/reponsesannonces.php');
                        include('./function/entreprise.php');
                        $idAnnonce = $this->params['id_annonce'];

                        // vérifier si l'id annonce existe
                        $countAnnonce = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE id='$idAnnonce'");
                        $countAnnonceFetch = $countAnnonce->fetch();
                        if ($countAnnonceFetch['countid'] != 0) {

                            // récupération des infos de l'annonce
                            $getAnnonce = getAnnonceId($bdd, $idAnnonce);
                            while ($dataAnnonce = $getAnnonce->fetch()) {

                                // vérifier si l'annonce appartient bien à l'entreprise du mec
                                $getEntreprise = getEntrepriseResponsable($bdd, $dataUser['id']);
                                while ($dataEntreprise = $getEntreprise->fetch()) {
                                    $verifAppartenanceEntreprise = $bdd->query("SELECT COUNT(*) AS countid FROM annoncesentreprises WHERE entreprise='{$dataEntreprise['id']}' AND id='$idAnnonce'");
                                    $verifAppartenanceEntrepriseFetch = $verifAppartenanceEntreprise->fetch();
                                    if ($verifAppartenanceEntrepriseFetch['countid'] != 0) {
                                        ?>

                                            <h3>Candidatures de <?php echo $dataAnnonce['titre']; ?></h3><br />

                                            <?php
                                                $getReponse = getRepAnnonceId($bdd, $idAnnonce);
                                                while ($dataReponse = $getReponse->fetch()){
                                                    $getCandidat = getIdUser($bdd, $dataReponse['candidat']);
                                                    while ($dataCandidat = $getCandidat->fetch()) {
                                                        ?>

                                                            <div class="candidature">
                                                                <div class="user">
                                                                    <img src="/avatar/<?php echo $dataCandidat['avatar']; ?>" class="headCandidat" />
                                                                    <div>
                                                                        <span style="font-size: 1.2em;"><?php echo "<b>".$dataCandidat['prenom']." ".$dataCandidat['nom']."</b>"; ?></span><br /><br />
                                                                        <i style="font-size: 0.8em;"><?php echo $dataReponse['datePostuler']; ?></i>
                                                                    </div>
                                                                </div>
                                                                <div class="visite">
                                                                    <a href="/user/<?php echo $dataCandidat['id']; ?>" target="_blank">Voir le profil</a>
                                                                </div>
                                                                <div class="action">
                                                                    <form action="" method="post">
                                                                        <input type="text" class="" name="idCandidat" value="<?php echo $dataCandidat['id']; ?>" readonly style="display:none;" />
                                                                        <input type="submit" name="subAccepted" class="btnAccepted width_30" value="Accepter" style="margin-right: 20px;" />
                                                                        <input type="submit" name="subRefused" class="btnRefused width_30" value="Refuser" />
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        <?php
                                                    }
                                                }
                                            ?>

                                        <?php
                                    } else {
                                        echo "erreur";
                                    }
                                }

                            }
                            
                        } else echo "<div class='alertError width_50 marginAuto'>Désolé aucune annonce ne correspond avec cet ID !</div>";

                    } else header('Location:/home');
                }
            ?>

        </div>

    </div>

<?php include('footer.php'); ?>