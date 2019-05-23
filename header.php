<?php include('connect.php'); ?>
<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header('Location:/login');
    }
?>

<html>
    <head>
        <title>Alt'itude - Trouvez un emploi à votre hauteur !</title>
        <meta charset="utf-8" />
        <link rel="icon" href="/img/favicon.svg" />
        <link rel="stylesheet" href="/css/spectre-exp.min.css" />
        <link rel="stylesheet" href="/css/spectre-icons.min.css" />
        <link rel="stylesheet" href="/css/spectre.min.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/css/global.css" />
        <script src="/js/jquery.min.js"></script>
    </head>
    <body>

        <?php
            include('./function/user.php');

            $info = getMailUser($bdd, $_SESSION['email']);
            while($data = $info->fetch()) {
                ?>
                    <div class="header">
                        <div class="logo">
                            <a href="/home"><img src="/img/logo_black.svg" /></a>
                        </div>

                        <div class="menuGeneral">
                            <a href="/home" class="<?php if ($_SERVER['REQUEST_URI'] == "/home") { echo "menuActive"; } ?>">Annonces</a>
                            <a href="">Suggestions</a>
                            <?php
                                if ($data['type_compte'] == "pro") {
                                    ?>
                                        <a href="/gestionannonce">Mes Annonces</a>
                                    <?php
                                } else if ($data['type_compte'] == "etudiant") {
                                    ?>
                                        <a href="/candidatures" class="<?php if ($_SERVER['REQUEST_URI'] == "/candidatures") { echo "menuActive"; } ?>">Candidature(s)</a>
                                    <?php
                                }
                            ?>
                        </div>


                        <div class="menu_user">
                            <span><?php echo $data['prenom']." ".$data['nom']; ?></span>
                            <img class="avatarUser" src="/avatar/<?php echo $data['avatar']; ?>" />
                            <i id="userOpen" class="icon icon-menu"></i>
                            <i id="userClose" class="icon icon-menu displayNone"></i>
                        </div>
                    </div>

                    <div class="boxProfile">
                        <div class="arrowProfile"></div>
                        <div class="contentProfile">
                            <a href="/editprofile">Éditer mon profil</a>
                            <?php
                                if ($data['type_compte'] == "pro") {
                                    ?>
                                        <a href="/editentreprise">Éditer mon entreprise</a>
                                        <a href="/editannonce">Créer une annonce</a>
                                    <?php
                                }
                            ?>
                            <a href="/logout">Déconnexion</a>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function (){
                            $('body').click(function (event) {
                                if (event.target.id == 'userOpen') {
                                    $(".boxProfile").show();
                                    $("#userOpen").hide();
                                    $("#userClose").show();
                                } else {
                                    $(".boxProfile").hide();
                                    $("#userOpen").show();
                                    $("#userClose").hide();
                                }
                            });
                        });
                    </script>

                <?php
            }
        ?>