<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <div class="searchbar">
            <form action="" method="post">
                <input type="text" name="job" class="job" placeholder="Job que vous cherchez" />
                <select name="domaine" class="domaine">
                    <option selected>Domaine</option>
                    <option class="option" value="medecine">Médecine</option>
                </select>
                <select name="type_contrat" class="type_contrat">
                    <option selected>Type de contrat</option>
                    <option value="all">Alternance ou Stage</option>
                    <option value="alternance">Alternance</option>
                    <option value="stage">Stage</option>
                </select>
                <select name="localisation" class="localisation">
                    <option selected>Localisation</option>
                    <?php
                        for ($i = 1; $i <= 99; $i++) {
                            ?>
                                <option class="option" <?php echo 'value="'.$i.'"'; ?>><?php echo $i; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <input type="submit" name="sendSearch" class="sendSearch" value="Rechercher" />
            </form>
        </div>

        <br />
        <div class="titreNormal">5800 emplois qui vous correspondent !</div>
        <br />

        <div class="annonceList">

            <div class="annonce">
                <div class="logo"><img src="./img/logo_black.svg" /></div>
                <div class="sujet">
                    <span>Nom de l'entreprise</span><br />
                    <span class="titreAnnonce">Titre Développeur H/F</span>
                    <br /><br />
                    <div class="info">
                        <div>
                            <img src="./img/malette.png" style="width: 16px; height: 16px;margin-right: 5px;" />
                            <span class="txtGreen">Stage</span>
                        </div>
                        <div>
                            <img src="./img/localisation.png" style="width: 16px; height: 16px;margin-right: 5px;" />
                            <span class="txtGreen">59</span>
                        </div>
                    </div>
                </div>
                <div class="favoris">
                    <img src="./img/star.svg" />
                </div>
            </div>

            <div class="annonce">
                <div class="logo"><img src="./img/logo_black.svg" /></div>
                <div class="sujet">
                    <span>Nom de l'entreprise</span><br />
                    <span class="titreAnnonce">Titre Ingénieur Réseaux H/F</span>
                    <br /><br />
                    <div class="info">
                        <div>
                            <img src="./img/malette.png" style="width: 16px; height: 16px;margin-right: 5px;" />
                            <span class="txtGreen">Alternance</span>
                        </div>
                        <div>
                            <img src="./img/localisation.png" style="width: 16px; height: 16px;margin-right: 5px;" />
                            <span class="txtGreen">62</span>
                        </div>
                    </div>
                </div>
                <div class="favoris">
                    <img src="./img/star.svg" />
                </div>
            </div>

        </div>

    </div>

<?php include('footer.php'); ?>