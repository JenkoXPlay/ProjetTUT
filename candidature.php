<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <br /><br />

        <div class="panelCandidature">

            <h3>Vos candidatures</h3>

            <?php
                include('./script_php/security.php');
                include('./function/reponsesannonces.php');
                include('./function/annoncesentreprises.php');
                $req_user = getMailUser($bdd, $_SESSION['email']);
                while ($dataUser = $req_user->fetch()) {
                    $req_count = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE candidat='{$dataUser['id']}'");
                    $req_count_fetch = $req_count->fetch();
                    if ($req_count_fetch['countid'] == 0) {
                        echo "Vous n'avez pas encore postulé ! Foncé !!";
                    } else {
                        ?>

                            <?php
                                if (isset($_POST['delReponse'])) {
                                    $idReponse = security($_POST['idReponse']);
                                    $idAnnonce = security($_POST['idAnnonce']);
                                    if ($idReponse && $idAnnonce) {
                                        $reqVerif = $bdd->query("SELECT COUNT(*) AS countid FROM reponsesannonces WHERE idAnnoncesEntreprises='$idAnnonce' AND candidat='{$dataUser['id']}'");
                                        $reqVerifFetch = $reqVerif->fetch();
                                        if ($reqVerifFetch['countid'] != 0) {
                                            $req_del_reponse = deleteRepId($bdd, $idReponse);
                                            echo "<div class='alertSuccess width_50 marginCenter'>Votre candidature a été supprimée !</div><br />";
                                        } else echo "<div class='alertError width_50 marginCenter'>Une erreur s'est produite !</div><br />";
                                    }else echo "<div class='alertError width_50 marginCenter'>Une erreur s'est produite !</div><br />";
                                }
                            ?>

                            <table width="100%">
                                <tr>
                                    <th width="50%">Titre</th>
                                    <th width="30%">État</th>
                                    <th width="20%">Action</th>
                                </tr>
                                <?php
                                    $req_annonce = getRepEntrepriseIdCandidat($bdd, $dataUser['id']);
                                    while ($dataAnnonceRep = $req_annonce->fetch()) {
                                        $reqAnnonceTitre = getAnnonceId($bdd, $dataAnnonceRep['idAnnoncesEntreprises']);
                                        while ($dataAnnonceTitre = $reqAnnonceTitre->fetch()) {
                                            ?>
                                                <tr style="text-align:center;">
                                                    <td>
                                                        <?php echo "<a href='/annonce/".$dataAnnonceTitre['id']."'>".$dataAnnonceTitre['titre']."</a>"; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($dataAnnonceRep['notif'] == 0) {
                                                                echo "En attente";
                                                            } else echo "<span class='txtGreen'>Étudiée</span>"
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="">
                                                            <input type="text" name="idReponse" value="<?php echo $dataAnnonceRep['id']; ?>" style="display:none;" readonly />
                                                            <input type="text" name="idAnnonce" value="<?php echo $dataAnnonceTitre['id']; ?>" style="display:none;" readonly />
                                                            <input type="submit" name="delReponse" class="btnRed" value="Annuler" />
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </table>
                        <?php
                    }
                }
            ?>

        </div>

    </div>

<?php include('footer.php'); ?>