<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <?php
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            while ($dataUser = $req_info_user->fetch()) {
        ?>

            <div class="informationProfil">
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
                <div class="subtitle labelForm">Expériences professionnelles</div>
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
                    $req_info_exp = getExpDe($bdd, $dataUser['id']);
                    while($dataExp = $req_info_exp->fetch()) {
                        ?>
                            <div class="expPro">
                                <b><?php echo $dataExp['poste']; ?></b> chez <span class="txtPurple"><?php echo $dataExp['nomEntreprise']; ?></span>
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
                <div class="subtitle labelForm">Formations</div>
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
                    $req_info_forma = getDiplomeUser($bdd, $dataUser['id']);
                    while ($dataForma = $req_info_forma->fetch()) {
                        ?>
                            <div class="forma">
                                <b><?php echo $dataForma['nom_diplome']; ?></b> à <span class="txtPurple"><?php echo $dataForma['etablissement']; ?></span>
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
            </div>

        <?php
            }
        ?>

    </div>

<?php include('footer.php'); ?>