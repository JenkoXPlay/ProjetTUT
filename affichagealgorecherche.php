<?php
    while ($donnees = $req->fetch()){
        echo "<div class='annonce'>";
            // echo "<div class='logo'><img src='./img/logo_black.svg' /></div>";
            echo "<div class='logo'><img src='/avatar/".$donnees['logo']."' /></div>";
            echo "<div class='sujet'>";
                echo "<span>".$donnees['nom']."</span><br />";
                echo "<a href='/annonce/".$donnees['id']."' class='titreAnnonce'>".$donnees['titre']."</a>";
                echo "<br /><br />";
                echo "<div class='info'>";
                    echo "<div>";
                        echo "<img src='./img/malette.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                        echo "<span class='txtGreen'>".$donnees['typeAnnonce']."</span>";
                    echo "</div>";
                    echo "<div>";
                        echo "<img src='./img/localisation.png' style='width: 16px; height: 16px;margin-right: 5px;' />";
                        echo "<span class='txtGreen'>".$donnees['departement']."</span>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='favoris'>";
                echo "<img src='./img/star.svg' />";
            echo "</div>";
        echo "</div>";
    } 
?>