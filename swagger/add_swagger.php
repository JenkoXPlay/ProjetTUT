<?php
    session_start();
    if (!isset($_SESSION['swagger']) || $_SESSION['swagger'] != "Lexa") {
        header('Location:index.php');
    }
?>
<html>
    <head>
        <title>Swagger PHP - Maxime Lefebvre</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        
        <div class="content">

            <div class="menu">
                <a href="/swagger">Retour au Swagger</a>
            </div>

            <?php
                include('../connect.php'); // chemin relatif car utlisation du routeur
                if (isset($_POST['submit'])) {
                    $type = trim($_POST['type']);
                    $categorie = trim($_POST['categorie']);
                    $requete = htmlspecialchars(trim($_POST['requete']), ENT_QUOTES);
                    $description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES);
                    if ($requete && $description) {
                        if ($type != "Type de requête" && $categorie != "Catégorie") {
                            $req = $bdd->exec("INSERT INTO swagger VALUES ('','$type', '$categorie', '$requete', '$description')");
                            echo "<div class='success'>Requête ajoutée avec succès !</div><br /><br />";
                        } else echo "<div class='erreur'>Les champs ne sont pas corrects !</div><br /><br />";
                    } else echo "<div class='erreur'>Veuillez remplir tous les champs !</div><br /><br />";
                }
            ?>

            <form action="" method="post">
                <select name="type">
                    <option selected>Type de requête</option>
                    <option>post</option>
                    <option>get</option>
                    <option>put</option>
                    <option>delete</option>
                </select>
                <br /><br />
                <select name="categorie">
                    <option selected>Catégorie</option>
                    <option>admin</option>
                    <option>annoncesentreprises</option>
                    <option>competences</option>
                    <option>contact</option>
                    <option>entreprise</option>
                    <option>experiences</option>
                    <option>favoris</option>
                    <option>galerieEntreprises</option>
                    <option>loisirs</option>
                    <option>messagerie</option>
                    <option>reponsesannonces</option>
                    <option>users</option>
                    <option>diplomes</option>
                    <option>competencesannonce</option>
                </select>
                <br /><br />
                <input type="text" name="requete" placeholder="Requête, ex : addUser($bdd, $pseudo, $password)" />
                <br /><br />
                <textarea name="description" rows="7" placeholder="Description de la requête"></textarea>
                <br /><br />
                <input type="submit" name="submit" value="Ajouter la requête" />
            </form>

        </div>

    </body>
</html>