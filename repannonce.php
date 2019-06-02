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
                                                if (isset($_POST['subAccepted'])) {
                                                    $idCandidat = security($_POST['idCandidat']);
                                                    if ($idCandidat) {
                                                        $reqVerifExist = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE candidat='$idCandidat' AND idAnnoncesEntreprises='$idAnnonce'");
                                                        $reqVerifExistFetch = $reqVerifExist->fetch();
                                                        if ($reqVerifExistFetch['countid'] != 0) {
                                                            
                                                            $getCandidatMail = getIdUser($bdd, $idCandidat);
                                                            include('./script_php/email.php');
                                                            while ($dataCandidatMail = $getCandidatMail->fetch()) {
                                                                // envoie du mail
                                                                $destinataire = $dataCandidatMail['email'];
                                                                $titre = 'Candidature Alt\'itude';
                                                                $msgHTML = "Bonjour ".$dataCandidatMail['prenom']." ".$dataCandidatMail['nom']."<br /><br />";
                                                                $msgHTML .= "Nous avons le plaisir de vous annoncez que la candidature ci-dessous à été acceptée !<br /><br />";
                                                                $msgHTML .= "<b>".$dataAnnonce['titre']."</b> chez <b>".$dataEntreprise['nom']."</b><br /><br />";
                                                                $msgHTML .= "Vous serrez prochainement contacter par le responsable de l'annonce, si vous n'avez toujours de nouvelles n'hésitez à contacter le responsable directement.<br /><br />";
                                                                $msgHTML .= "<i>Si vous n'avez toujours pas de nouvelles contacter nous !</i><br /><br />";
                                                                $msgHTML .= "Bonne continuation,<br /><br />";
                                                                $msgHTML .= "Cordialement, l'équipe Alt'itude";
                                                                $mail = sendMail($destinataire, $titre, $msgHTML);
                                                                if($mail) {
                                                                    echo "<br /><div class='alertSuccess width_50 marginAuto'>Le candidat va recevoir une notification !</div><br />";
                                                                } else {
                                                                    echo "<br /><div class='alertError width_50 marginAuto'>Une erreur est survenue (email) !</div><br />";
                                                                }

                                                                // update de l'état de la candidature
                                                                $updateCandidature = $bdd->exec("UPDATE reponsesannonces SET reponse='accepte' WHERE candidat='$idCandidat' AND idAnnoncesEntreprises='$idAnnonce'");
                                                                echo "<div class='alertSuccess width_50 marginAuto'>La candidature a été acceptée !</div><br />";
                                                            }

                                                        } else echo "<div class='alertError width_50 marginAuto'>Une erreur est survenue !</div><br />";
                                                    } else echo "<div class='alertError width_50 marginAuto'>Une erreur est survenue !</div><br />";
                                                }

                                                if (isset($_POST['subRefused'])) {
                                                    $idCandidat = security($_POST['idCandidat']);
                                                    if ($idCandidat) {
                                                        $reqVerifExist = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE candidat='$idCandidat' AND idAnnoncesEntreprises='$idAnnonce'");
                                                        $reqVerifExistFetch = $reqVerifExist->fetch();
                                                        if ($reqVerifExistFetch['countid'] != 0) {
                                                            
                                                            $getCandidatMail = getIdUser($bdd, $idCandidat);
                                                            include('./script_php/email.php');
                                                            while ($dataCandidatMail = $getCandidatMail->fetch()) {
                                                                // envoie du mail
                                                                $destinataire = $dataCandidatMail['email'];
                                                                $titre = 'Candidature Alt\'itude';
                                                                $msgHTML = "Bonjour ".$dataCandidatMail['prenom']." ".$dataCandidatMail['nom']."<br /><br />";
                                                                $msgHTML .= "Nous sommes désolé de vous annoncez que la candidature ci-dessous à été refusée !<br /><br />";
                                                                $msgHTML .= "<b>".$dataAnnonce['titre']."</b> chez <b>".$dataEntreprise['nom']."</b><br /><br />";
                                                                $msgHTML .= "Nous espérons que vous aurez prochainement une réponse positive, <b>ne lâchez rien</b> !";
                                                                $msgHTML .= "Bonne continuation,<br /><br />";
                                                                $msgHTML .= "Cordialement, l'équipe Alt'itude";
                                                                $mail = sendMail($destinataire, $titre, $msgHTML);
                                                                if($mail) {
                                                                    echo "<br /><div class='alertSuccess width_50 marginAuto'>Le candidat va recevoir une notification !</div><br />";
                                                                } else {
                                                                    echo "<br /><div class='alertError width_50 marginAuto'>Une erreur est survenue (email) !</div><br />";
                                                                }

                                                                // update de l'état de la candidature
                                                                $updateCandidature = $bdd->exec("UPDATE reponsesannonces SET reponse='refuse' WHERE candidat='$idCandidat' AND idAnnoncesEntreprises='$idAnnonce'");
                                                                echo "<div class='alertSuccess width_50 marginAuto'>La candidature a été refusée !</div><br />";
                                                            }

                                                        } else echo "<div class='alertError width_50 marginAuto'>Une erreur est survenue !</div><br />";
                                                    } else echo "<div class='alertError width_50 marginAuto'>Une erreur est survenue !</div><br />";
                                                }
                                            ?>

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
                                                                <?php
                                                                    if ($dataReponse['reponse'] != "attente") {
                                                                        echo "<b>Vous avez déjà accepté ou refusé la candidature !</b>";
                                                                    } else {
                                                                        ?>
                                                                            <form action="" method="post">
                                                                                <input type="text" name="idCandidat" value="<?php echo $dataCandidat['id']; ?>" readonly style="display:none;" />
                                                                                <input type="submit" name="subAccepted" class="btnAccepted width_30" value="Accepter" style="margin-right: 20px;" />
                                                                                <input type="submit" name="subRefused" class="btnRefused width_30" value="Refuser" />
                                                                            </form>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                </div>
                                                            </div>

                                                        <?php
                                                    }
                                                }
                                            ?>

                                        <?php
                                    } else {
                                        echo "<div class='alertError width_50 marginAuto'>Une erreur est survenue !</div><br />";
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