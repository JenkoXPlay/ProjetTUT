<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <div class="searchbar">
            <form action="" method="post" autocomplete="off">
                <span class="loupe"><i class="icon icon-search"></i></span>
                <input type="text" name="job" class="job" placeholder="Job que vous cherchez" />
                <input type="text" name="domaine" class="domaine" placeholder="Domaine (ex : informatique)" />
                <select name="type_contrat" class="type_contrat">
                    <option value="typeContrat" selected>Type de contrat</option>
                    <option value="all">Alternance ou Stage</option>
                    <option value="alternance">Alternance</option>
                    <option value="stage">Stage</option>
                </select>
                <select name="localisation" class="localisation">
                    <option value="localisation" selected>Localisation</option>
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
        <?php
            $countAnnonce = $bdd->query("SELECT COUNT(id) AS countid FROM annoncesentreprises");
            $countAnnonceFetch = $countAnnonce->fetch();
        ?>
        <div class="titreNormal"><?php echo $countAnnonceFetch['countid']; ?> annonces sont actuellement en lignes !</div>
        <br />

        <div class="annonceList">

            <?php
                include('./script_php/security.php');
                include('./script_php/algo_recherche.php');
            ?>

        </div>

    </div>

<?php include('footer.php'); ?>