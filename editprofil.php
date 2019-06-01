<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <?php
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            while ($dataUser = $req_info_user->fetch()) {
        ?>

            <div class="informationProfil stickyTop">
                <div class="title">Informations Personnelles</div>
                <hr />
                <div class="subtitle labelForm">Photo de profil</div>
                <div class="contentAvatar">
                    <img src="./avatar/<?php echo $dataUser['avatar']; ?>" class="infoAvatar" />
                </div>
                <?php
                    include('./script_php/security.php');
                    include('./script_php/maj_info_perso.php');
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="centeredElement">
                        <br />
                        <label for="file" class="importAvatar">Importer une photo</label>
                        <input id="file" name="avatar" class="inputNone inputAvatar" type="file" />
                    </div> 
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.importAvatar').click(function(event){
                                event.preventDefault();
                                $('.inputAvatar').click();
                            });
                        });
                    </script>
                    <div id="showInfoPerso">
                        <i class="icon icon-arrow-down"></i>
                        <span>Afficher mes informations</span>
                        <i class="icon icon-arrow-down"></i>
                    </div>
                    <div id="hideInfoPerso">
                        <i class="icon icon-arrow-up"></i>
                        <span>Cacher mes informations</span>
                        <i class="icon icon-arrow-up"></i>
                    </div>
                    <div id="infoPersoDisplay">
                        <div class="subtitle labelForm">Prénom</div>
                        <input type="text" name="prenom" class="inputText width_100" placeholder="Prénom" value="<?php echo $dataUser['prenom']; ?>" />
                        <br />
                        <div class="subtitle labelForm">Nom</div>
                        <input type="text" name="nom" class="inputText width_100" placeholder="Nom" value="<?php echo $dataUser['nom']; ?>" />
                        <br />
                        <div class="subtitle labelForm">Email</div>
                        <input type="email" name="email" class="inputText width_100" placeholder="Email" value="<?php echo $dataUser['email']; ?>" />
                        <br />
                        <div class="subtitle labelForm">Téléphone</div>
                        <input type="text" name="telephone" class="inputText width_100" placeholder="Téléphone" value="<?php echo $dataUser['telephone']; ?>" />
                        <br />
                        <div class="subtitle labelForm">Département</div>
                        <input type="number" name="departement" class="inputText width_100" placeholder="Ex: 62" value="<?php echo $dataUser['departement']; ?>" />
                        <br /><br />
                        <input type="submit" name="submitPerso" class="btnPurple width_100" value="Mettre à jour" />
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#showInfoPerso').click(function(){
                                $('#infoPersoDisplay').show();
                                $('#showInfoPerso').hide();
                                $('#hideInfoPerso').show();
                            });
                            $('#hideInfoPerso').click(function(){
                                $('#infoPersoDisplay').hide();
                                $('#showInfoPerso').show();
                                $('#hideInfoPerso').hide();
                            });
                        });
                    </script>
                </form>
                <br />
                <div class="title">Mot de passe</div>
                <hr />
                <?php
                    include('./script_php/maj_pwd.php');
                ?>
                <form action="" method="post">
                    <div class="subtitle labelForm">Mot de passe actuel</div>
                    <input type="password" name="passwordActuel" class="inputText width_100" placeholder="Mot de passe actuel" />
                    <br />
                    <div class="subtitle labelForm">Nouveau mot de passe</div>
                    <input type="password" name="passwordNew" class="inputText width_100" placeholder="Nouveau mot de passe" />
                    <br />
                    <div class="subtitle labelForm">Encore une fois</div>
                    <input type="password" name="passwordAgain" class="inputText width_100" placeholder="Encore une fois" />
                    <br /><br />
                    <input type="submit" name="submitPwd" class="btnPurple width_100" value="Mettre à jour" />
                </form>
            </div>

            <div class="informationProfil">
                <div class="title">Informations Professionnelles</div>
                <hr />
                <?php
                    include('./script_php/maj_description.php');
                ?>
                <form action="" method="post">
                    <div class="subtitle labelForm">Description de vous</div>
                    <textarea name="description" class="inputTextarea width_100 noresize" rows="3" placeholder="Description de vous"><?php echo $dataUser['description']; ?></textarea>
                    <br /><br />
                    <input type="submit" name="submitDesc" class="btnPurple width_100" value="Mettre à jour" />
                    <br />
                </form>

                <div class="title labelForm">Expériences professionnelles</div>
                <div class="panelExpPro">
                    <?php
                        include('./function/experiences.php');
                        include('./script_php/experiences.php');
                    ?>
                    <form action="" method="post">
                        <div class="inputFlex">
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Poste</div>
                                <input type="text" name="poste" class="inputText width_90" placeholder="Intitulé du poste" />
                            </div>
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Type de contrat</div>
                                <input type="text" name="typeContrat" class="inputText width_90" placeholder="Ex : CDD, CDI, etc..." />
                            </div>
                        </div>
                        <div class="inputFlex">
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Entreprise</div>
                                <input type="text" name="entreprise" class="inputText width_90" placeholder="Entreprise" />
                            </div>
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Ville</div>
                                <input type="text" name="ville" class="inputText width_90" placeholder="Ville" />
                            </div>
                        </div>
                        <div class="inputFlex">
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Date début</div>
                                <input type="date" name="date_debut" class="inputText width_90" placeholder="JJ/MM/AAAA" />
                            </div>
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Date fin</div>
                                <input type="date" name="date_fin" class="inputText width_90" placeholder="JJ/MM/AAAA" />
                            </div>
                        </div>
                        <div class="textareaFlex">
                            <div class="subtitle labelForm">Description de vos missions</div>
                            <textarea name="description" class="inputTextarea noresize width_100" rows="3" placeholder="Exemple : Testeur de code"></textarea>
                        </div>
                        <br />
                        <div class="btnFlex">
                            <input type="reset" class="btnWhite width_45" value="Annuler" />
                            <input type="submit" name="submitExpPro" class="btnPurple width_45" value="Ajouter" />
                        </div>
                    </form>
                </div>
                <br />
                <?php
                    if (isset($_POST['delExpPro'])) {
                        $idExpPro = security($_POST['idExpPro']); // je récupère le champ input text
                        if ($idExpPro) { // je vérifie s'il est bien rempli et n'est pas vide
                            // ici je fais une requête pour compter le nbr de ligne dans la table avec l'id de la donnée et l'id du mec connecté
                            // puis je fetch le résultat
                            $verifexppro = $bdd->query("SELECT COUNT(*) AS countid FROM experiences WHERE id='$idExpPro' AND expDe='{$dataUser['id']}'");
                            $reqcount = $verifexppro->fetch();
                            if ($reqcount['countid'] != 0) { // si une donnée existe pas alors = 0 et donc on affiche l'erreur
                                $req_del = deleteExpId($bdd, $idExpPro);
                                echo "<div class='alertSuccess'>Expérience supprimée avec succès !</div><br />";
                            } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                        } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                    }

                    $req_info_exp = getExpDe($bdd, $dataUser['id']);
                    while($dataExp = $req_info_exp->fetch()) {
                        ?>
                            <div class="expPro">
                                <div class="flexSection">
                                    <div>
                                        <b><?php echo $dataExp['poste']; ?></b> chez <span class="txtPurple"><?php echo $dataExp['nomEntreprise']; ?></span>
                                    </div>
                                    <div>
                                        <form action="" method="post">
                                            <input type="text" name="idExpPro" value="<?php echo $dataExp['id']; ?>" readonly style="display:none;" />
                                            <input type="submit" class="btnRemove" name="delExpPro" value="supprimer" />
                                        </form>
                                    </div>
                                </div>
                                <div class="dateLieu">
                                    <span class="dateExp"> <i class="icon icon-time"></i> <?php echo $dataExp['date_debut']; ?> à <?php echo $dataExp['date_fin']; ?></span>
                                    <i class="icon icon-location txtGrey"></i>
                                    <b><?php echo $dataExp['ville']; ?></b>
                                </div>
                                <div class="description">
                                    <?php echo $dataExp['description']; ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>

                <br />

                <div class="title labelForm">Formations</div>
                <div class="panelFormation">
                    <?php
                        include('./function/diplomes.php');
                        include('./script_php/diplomes.php');
                    ?>
                    <form action="" method="post">
                        <div class="inputFlex">
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Nom du diplôme</div>
                                <input type="text" name="nom_diplome" class="inputText width_90" placeholder="Ex : Bac STI2D, Bac S" />
                            </div>
                            <div class="itemFlex">
                                <div class="subtitle labelForm">Année d'obtention</div>
                                <input type="number" name="annee_obtention" class="inputText width_90" placeholder="Ex : 2016" />
                            </div>
                        </div>
                        <div class="inputSoloFlex">
                            <div class="subtitle labelForm">Établissement</div>
                            <input type="text" name="etablissement" class="inputText width_100" placeholder="Ex : A.Malraux à Béthune" />
                        </div>
                        <div class="textareaFlex">
                            <div class="subtitle labelForm">Description de la formation</div>
                            <textarea name="description" class="inputTextarea noresize width_100" rows="3"></textarea>
                        </div>
                        <br />
                        <div class="btnFlex">
                            <input type="reset" class="btnWhite width_45" value="Annuler" />
                            <input type="submit" name="submitFormation" class="btnPurple width_45" value="Ajouter" />
                        </div>
                    </form>
                </div>
                <br />
                <?php
                    if (isset($_POST['delForma'])) {
                        $idForma = security($_POST['idForma']);
                        if ($idForma) {
                            $verifforma = $bdd->query("SELECT COUNT(*) AS countid FROM diplomes WHERE id='$idForma' AND user='{$dataUser['id']}'");
                            $reqcount = $verifforma->fetch();
                            if ($reqcount['countid'] != 0) {
                                $req_del = deleteDiplome($bdd, $idForma);
                                echo "<div class='alertSuccess'>Formation supprimée avec succès !</div><br />";
                            } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                        } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                    }

                    $req_info_forma = getDiplomeUser($bdd, $dataUser['id']);
                    while ($dataForma = $req_info_forma->fetch()) {
                        ?>
                            <div class="forma">
                                <div class="flexSection">
                                    <div>
                                        <b><?php echo $dataForma['nom_diplome']; ?></b> à <span class="txtPurple"><?php echo $dataForma['etablissement']; ?></span>
                                    </div>
                                    <div>
                                        <form action="" method="post">
                                            <input type="text" name="idForma" value="<?php echo $dataForma['id']; ?>" readonly style="display:none;" />
                                            <input type="submit" class="btnRemove" name="delForma" value="supprimer" />
                                        </form>
                                    </div>
                                </div>
                                <div class="dateLieu">
                                    <span class="dateExp"> <i class="icon icon-time"></i> Obtention en <?php echo $dataForma['annee_obtention']; ?></span>
                                </div>
                                <div class="description">
                                    <?php echo $dataForma['description']; ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>

                <br />

                <div class="title labelForm">Compétences</div>
                    <div class="panelFormation">
                        <?php
                            include('./function/competences.php');
                            include('./script_php/add_competence.php');
                        ?>
                        <form action="" method="post">
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
                        </form>
                    </div>
                    <br />
                    <?php
                        if (isset($_POST['deleteComp'])) {
                            $idComp = security($_POST['idComp']);
                            if ($idComp) {
                                $verifComp = $bdd->query("SELECT COUNT(*) AS countid FROM competences WHERE id='$idComp' AND competenceDe='{$dataUser['id']}'");
                                $verifCompFetch = $verifComp->fetch();
                                if ($verifCompFetch['countid'] != 0) {
                                    $req  = deleteCompId($bdd, $idComp);
                                    echo "<div class='alertSuccess'>Compétence supprimée !</div><br />";
                                } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                            } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                        }
                    ?>
                    <div class="competences">
                        <?php
                            $req_info_comp = $bdd->prepare("SELECT * FROM competences WHERE competenceDe='{$dataUser['id']}'");
                            $req_info_comp->execute();
                            while ($dataComp = $req_info_comp->fetch()) {
                                ?>
                                    <form method="post" action="">
                                        <input type="text" name="idComp" value="<?php echo $dataComp['id']; ?>" style="display:none;" />
                                        <span>
                                            <?php echo $dataComp['competence']." : ".$dataComp['level']; ?>
                                            <input type="submit" name="deleteComp" class="btnCross" value="X" />
                                        </span>
                                    </form>
                                <?php
                            }
                        ?>
                    </div>

                    <br />

                    <div class="title labelForm">Loisirs</div>
                        <div class="panelFormation">
                            <?php
                                include('./function/loisirs.php');
                                include('./script_php/loisirs.php');
                            ?>
                            <form action="" method="post">
                                <div class="inputFlex">
                                    <div class="itemFlex">
                                        <input type="text" name="loisir" class="inputText width_90" placeholder="Exemple: natation, boxe, musique" />
                                    </div>
                                    <div class="itemFlex">
                                        <input type="submit" name="submitLoisir" class="btnPurple width_90" value="Ajouter" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br />
                        <?php
                            if (isset($_POST['deleteLoisir'])) {
                                $idLoisir = security($_POST['idLoisir']);
                                if ($idLoisir) {
                                    $verifLoisir = $bdd->query("SELECT COUNT(*) AS countid FROM loisirs WHERE id='$idLoisir' AND loisirDe='{$dataUser['id']}'");
                                    $verifLoisirFetch = $verifLoisir->fetch();
                                    if ($verifLoisirFetch['countid'] != 0) {
                                        $req  = deleteLoisirId($bdd, $idLoisir);
                                        echo "<div class='alertSuccess'>Loisir supprimée !</div><br />";
                                    } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                                } else echo "<div class='alertError'>Une erreur est survenue !</div><br />";
                            }
                        ?>
                        <div class="loisirs">
                            <?php
                                $req_info_loisir = $bdd->prepare("SELECT * FROM loisirs WHERE loisirDe='{$dataUser['id']}'");
                                $req_info_loisir->execute();
                                while ($dataLoisir = $req_info_loisir->fetch()) {
                                    ?>
                                        <form method="post" action="">
                                            <input type="text" name="idLoisir" value="<?php echo $dataLoisir['id']; ?>" style="display:none;" />
                                            <span>
                                                <?php echo $dataLoisir['nomLoisir']; ?>
                                                <input type="submit" name="deleteLoisir" class="btnCross" value="X" />
                                            </span>
                                        </form>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            }
        ?>

    </div>

<?php include('footer.php'); ?>