<?php include('../connect.php'); ?>
<html>
    <head>
        <title>Swagger - Maxime Lefebvre</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        
        <div class="content">

            <div class="menu">
                <a href="add_swagger.php">Ajouter une fonction</a>
                <?php
                    session_start();
                    if (!isset($_SESSION['swagger'])) {
                        if (isset($_POST['submit'])) {
                            if ($_POST['login'] == "Lexa") {
                                $_SESSION['swagger'] = "Lexa";
                            }
                        }
                        ?>
                            <form method="post" action="">
                                <input type="text" name="login" placeholder="Login" />
                                <input type="submit" name="submit" value="Créer la session" />
                            </form>
                        <?php
                    }
                ?>
            </div>

            <div class="categorie">
                <div class="titreCat">Users</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='users'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />
            
            <div class="categorie">
                <div class="titreCat">Admin</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='admin'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">AnnoncesEntreprises</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='annoncesentreprises'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Compétences</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='competences'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Entreprises</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='entreprise'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Expériences</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='experiences'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Galerie Entreprises</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='galerieEntreprises'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Loisirs</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='loisirs'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Messagerie</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='messagerie'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Réponses Annonces</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='reponsesannonces'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>
            
                <br /><br />

            <div class="categorie">
                <div class="titreCat">Diplomes</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='diplomes'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

                <br /><br />

            <div class="categorie">
                <div class="titreCat">Compétences Annonce</div>
                <div class="sousContent">
                    <?php
                        $req = $bdd->query("SELECT * FROM swagger WHERE categorie='competencesannonce'");
                        while ($data = $req->fetch()) {
                            ?>
                                <?php if ($data['type'] == "post") { ?><span class="spanPost">POST</span><?php } ?>
                                <?php if ($data['type'] == "get") { ?><span class="spanGet">GET</span><?php } ?>
                                <?php if ($data['type'] == "put") { ?><span class="spanPut">PUT</span><?php } ?>
                                <?php if ($data['type'] == "delete") { ?><span class="spanDelete">DELETE</span><?php } ?>

                                <span class="requete"><?php echo $data['requete']; ?></span>
                                <br /><br />
                                <div class="about">
                                    <b>Description :</b><br />
                                    <?php echo nl2br($data['description']); ?>
                                </div>

                                <br />
                                <hr />
                                <br />
                            <?php
                        }
                    ?>
                </div>
            </div>

        </div>

    </body>
</html>