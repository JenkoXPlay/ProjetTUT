<?php include('header.php'); ?>
    
    <div class="banniereHome"></div>

    <div class="content">

        <?php
            include('./function/entreprise.php');
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
           
            while ($dataUser = $req_info_user->fetch()) {
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/erreur');
                } else if ($dataUser['type_compte'] == "pro") {
                    $req_info_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                    $req2 = $bdd->query("SELECT COUNT(*) AS countid FROM entreprises WHERE responsable='{$dataUser['id']}'"); //(responsable = id user)
                    $reqfetch = $req2->fetch();
                    if ($reqfetch['countid'] != 0) {
                        while ($dataEntreprise = $req_info_entreprise->fetch()) {
        ?>
                            <br />
                            <br />

                            <div class="contentEntreprise">
                                <div class="title">Information sur l'entreprise</div>
                                <hr />

                                <?php
                                    include('./script_php/security.php');
                                    include('./script_php/maj_info_entreprise.php');
                                ?>

                                <div class="textLogo">Logo</div>
                                
                                <div class="contentAvatar">
                                    <img src="/avatar/<?php echo $dataEntreprise['logo']; ?>" class="width_20" />
                                </div>
                            
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
                                    <div class="lab" for="nom">Nom de l'entreprise</div>
                                    <br />
                                    <input class="inputText width_100" name="nom" type="text" value="<?php echo $dataEntreprise['nom']; ?>"/>
                                    <br />
                                    <div class="lab" for="site">Site web</div>
                                    <br />
                                    <input class="inputText width_100" name="site" type="text" value="<?php echo $dataEntreprise['siteweb']; ?>"/>         
                                    <br />   
                                    <div class="lab" for="but">But de l'entreprise</div>
                                    <br />
                                    <input class="inputText width_100" name="but" type="text" value="<?php echo $dataEntreprise['but']; ?>"/>         
                                    <br />                               
                                    <div class="lab" for="description">Description</div>
                                    <br />
                                    <textarea name="description" class="inputTextarea width_100 noresize" rows="9"><?php echo $dataEntreprise['description']; ?></textarea>    
                                    <br />   
                                    <div class="lab" for="siren">N° SIREN</div>
                                    <br />
                                    <input class="inputText width_100" name="siren" type="text" value="<?php echo $dataEntreprise['siren']; ?>" />       
                                    <br />  
                                    <div class="lab" for="typeEntreprise">Type d'entreprise</div>
                                    <br />
                                    <input class="inputText width_100" name="typeEntreprise" type="text" value="<?php echo $dataEntreprise['typeEntreprise']; ?>" />       
                                    <br />   
                                    <div class="lab" for="description">Département</div>
                                    <br />
                                    <input class="inputText width_100" name="departement" type="text" value="<?php echo $dataEntreprise['departement']; ?>" />       
                                    <br />    
                                    <br /> 
                                    <div class="right">
                                        <input type="submit" name="submitEntreprise" class="btnPurple btnPadding" value="Mettre à jour" /> 
                                    </div>
                                </form>
                            </div>
        <?php
                        }
                    } else {
        ?>
                        <br />
                        <br />

                        <div class="contentEntreprise">
                            <div class="title">Information sur l'entreprise</div>
                            <hr />

                            <?php
                                include('./script_php/security.php');
                                include('./script_php/add_info_entreprise.php');
                            ?>

                            <div class="textLogo">Logo</div>
                            
                            <div class="contentAvatar">
                                    <img src="/avatar/avatar.jpg" class="width_20" />
                            </div>
                            
                            <form action="" method="post">
                                <div class="lab" for="nom">Nom de l'entreprise</div>
                                <br />
                                <input class="inputText width_100" name="nom" type="text" placeholder="Nom"/>
                                <br />
                                <div class="lab" for="site">Site web</div>
                                <br />
                                <input class="inputText width_100" name="site" type="text" placeholder="Ex: https://monentreprise.fr"/>         
                                <br />   
                                <div class="lab" for="but">But de l'entreprise</div>
                                <br />
                                <input class="inputText width_100" name="but" type="text" placeholder="But"/>         
                                <br />                               
                                <div class="lab" for="description">Description</div>
                                <br />
                                <textarea name="description" placeholder="Description de votre entreprise..." class="inputTextarea width_100 noresize" rows="9"></textarea>    
                                <br />   
                                <div class="lab" for="siren">N° SIREN</div>
                                <br />
                                <input class="inputText width_100" name="siren" type="text" placeholder="Ex: 123456789" />       
                                <br />  
                                <div class="lab" for="typeEntreprise">Type d'entreprise</div>
                                <br />
                                <input class="inputText width_100" name="typeEntreprise" type="text" placeholder="Ex : SSII" />       
                                <br />   
                                <div class="lab" for="description">Département</div>
                                <br />
                                <input class="inputText width_100" name="departement" type="text" placeholder="Département de l'entreprise" />       
                                <br />    
                                <br /> 
                                <div class="right">
                                    <input type="submit" name="submitEntreprise" class="btnPurple btnPadding" value="Créer votre entreprise" /> 
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }   
            }
        ?>
    </div>
<?php include('footer.php'); ?>