<?php include('header.php'); ?>
    
    <div class="banniereHome"></div>

    <div class="content">

        <?php
             include('./function/entreprise.php');
            $req_info_user = getMailUser($bdd, $_SESSION['email']);
            while ($dataUser = $req_info_user->fetch()) {
                if ($dataUser['type_compte'] == "etudiant") {
                    header('Location:/');
                }
                else if($dataUser['type_compte'] == "pro"){
                $req_info_entreprise = getEntrepriseResponsable($bdd,$dataUser['id']);
                while($dataEntreprise = $req_info_entreprise->fetch()){

        ?>
                    <br/>
                    <br/>
                    <div class="contentEntreprise">
                        <div class="title">Information sur l'entreprise</div>
                        <hr />

                        <div class="textLogo">Logo</div>
                        
                        <div class="contentAvatar">
                                <img src="./avatar/<?php echo $dataUser['avatar']; ?>" class="width_20" />
                        </div>
                        <?php
                            include('./script_php/security.php');
                            include('./script_php/maj_info_entreprise.php');
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
                            <div class="lab" for="nom">Nom de l'entreprise</div>
                            <br/>
                            <input class="inputText width_100" name="nom" type="text" value="<?php echo $dataEntreprise['nom']; ?>"/>
                            <br/>
                            <div class="lab" for="site">Site web</div>
                            <br/>
                            <input class="inputText width_100" name="site" type="text" value="<?php echo $dataEntreprise['siteweb']; ?>"/>         
                            <br/>   
                            <div class="lab" for="but">But de l'entreprise</div>
                            <br/>
                            <input class="inputText width_100" name="but" type="text" value="<?php echo $dataEntreprise['but']; ?>"/>         
                            <br/>                               
                            <div class="lab" for="description">Description</div>
                            <br/>
                            <textarea name="description" class="inputTextarea width_100 noresize" rows="9"><?php echo $dataEntreprise['description']; ?></textarea>    
                            <br/>   
                            <div class="lab" for="siren">N° SIREN</div>
                            <br/>
                            <input class="inputText width_100" name="siren" type="text" value="<?php echo $dataEntreprise['siren']; ?>" />       
                            <br/>  
                            <div class="lab" for="typeEntreprise">Type d'entreprise</div>
                            <br/>
                            <input class="inputText width_100" name="typeEntreprise" type="text" value="<?php echo $dataEntreprise['typeEntreprise']; ?>" />       
                            <br/>   
                            <div class="lab" for="description">Département</div>
                            <br/>
                            <input class="inputText width_100" name="departement" type="text" value="<?php echo $dataEntreprise['departement']; ?>" />       
                            <br/>    
                            <br/> 
                            <div class="right">
                                <input type="submit" name="submitEntreprise" class="btnPurple btpadding" value="Mettre à jour" /> 
                            </div>
                        </form>
                    </div>
        <?php
                }
            }   
            }
        ?>
    </div>