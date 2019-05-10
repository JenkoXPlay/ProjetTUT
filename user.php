<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <?php
            include('./script_php/security.php');
            $idUser = $this->params['idUser'];
            $getUser = getIdUser($bdd, $idUser);
            $countUser = $bdd->query("SELECT COUNT(id) AS countid FROM users WHERE id='$idUser'");
            $countUserFetch = $countUser->fetch();
            if ($countUserFetch['countid'] != 0) {
                while ($dataUser = $getUser->fetch()){
                    if ($dataUser['id'] == $idUser) {
                        ?>

                            <div class="contentCV">

                                <div id="CVSticky" class="panel">

                                    <img src="/avatar/<?php echo $dataUser['avatar']; ?>" class="avatarUser" />
                                    <div class="titre"><?php echo $dataUser['prenom']." ".$dataUser['nom']; ?></div>
                                    <b>
                                        <?php
                                            if ($dataUser['type_compte'] == "etudiant") {
                                                echo "Étudiant dans le ".stripslashes($dataUser['departement']);
                                            } else if ($dataUser['type_compte'] == "pro") {
                                                echo "Professionnel dans le ".stripslashes($dataUser['departement']);
                                            }
                                        ?>
                                    </b>

                                    <div class="separator"></div>

                                    <span>
                                        <?php
                                            if ($dataUser['description'] != "") {
                                                echo $dataUser['description'];
                                            } else echo "Pas encore de description !";
                                        ?>
                                    </span>

                                    <br />

                                    <?php
                                        if (isset($_POST['subMsg'])) {
                                            echo "<div class='alertError'>Fonctionnalité en cours de développement...</div><br />";
                                        }
                                    ?>
                                    <form action="" method="post">
                                        <input type="submit" name="subMsg" class="btnMsg" value="Envoyer un message" />
                                    </form>

                                    <br />

                                    <div class="subtitle">Contacter <?php echo $dataUser['prenom']; ?></div>
                                    <span>
                                        <i class="icon icon-mail"></i>
                                        <span style="margin-left: 10px;"><?php echo $dataUser['email']; ?></span>
                                    </span>
                                </div>

                                <div class="panel">
                                    <span class="subtitle txtLeft">Expériences Professionnelles</span>
                                    <hr />
                                    <?php
                                        include('./function/experiences.php');
                                        $req_exp = getExpDe($bdd, $dataUser['id']);
                                        while ($dataExp = $req_exp->fetch()) {
                                            ?>
                                                <div class="cardInfo">
                                                    <b><?php echo $dataExp['poste']; ?></b> chez <span class="txtPurple"><?php echo $dataExp['nomEntreprise']; ?></span>
                                                    <div class="dateLieu">
                                                        <span class="dateExp"><i class="icon icon-time"></i> <?php echo $dataExp['date_debut']; ?> à <?php echo $dataExp['date_fin']; ?></span>
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

                                    <span class="subtitle txtLeft">Formations</span>
                                    <hr />
                                    <?php
                                        include('./function/diplomes.php');
                                        $req_dip = getDiplomeUser($bdd, $dataUser['id']);
                                        while ($dataDip = $req_dip->fetch()) {
                                            ?>
                                                <div class="cardInfo">
                                                    <b><?php echo $dataDip['nom_diplome']; ?></b> à <span class="txtPurple"><?php echo $dataDip['etablissement']; ?></span>
                                                    <div class="dateLieu">
                                                        <span class="dateExp"><i class="icon icon-time"></i> Année d'obtention : <?php echo $dataDip['annee_obtention']; ?></span>
                                                    </div>
                                                    <div class="description">
                                                        <?php echo $dataDip['description']; ?>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>

                                    <br />

                                    <span class="subtitle txtLeft">Compétences</span>
                                    <hr />

                                    <div class="contentBulle">
                                        <?php
                                            include('./function/competences.php');
                                            $req_comp = getAllCompDe($bdd, $dataUser['id']);
                                            while ($dataComp = $req_comp->fetch()) {
                                                ?>
                                                    <div class="element">
                                                        <?php echo $dataComp['competence']; ?> : <?php echo $dataComp['level']; ?>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>

                                    <br />

                                    <span class="subtitle txtLeft">Loisirs</span>
                                    <hr />

                                    <div class="contentBulle">
                                        <?php
                                            include('./function/loisirs.php');
                                            $req_loisir = getAllLoisirsDe($bdd, $dataUser['id']);
                                            while ($dataLoisir = $req_loisir->fetch()) {
                                                ?>
                                                    <div class="element">
                                                        <?php echo $dataLoisir['nomLoisir']; ?>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>

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