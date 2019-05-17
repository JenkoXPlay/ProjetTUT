<?php include('header.php'); ?>

    <div class="banniereHome"></div>

    <div class="content">

        <br /><br />

        <div class="panelContact">
            <h2>Nous contacter</h2>

            <br />

            <?php

                include('./script_php/security.php');
                include('./function/contact.php');
                include('./script_php/add_contact.php');

            ?>

            <form action="" method="post" autocomplete="off">
                <input type="text" name="nom_complet" class="inputText width_50" placeholder="Votre nom complet" />
                <br /><br />
                <input type="email" name="email" class="inputText width_50" placeholder="Email (exemple@exmple.com)" />
                <br /><br />
                <select name="sujet" class="inputSelect width_50">
                    <option selected>Sujet du message</option>
                    <?php
                        for ($i = 0; $i <= $longTabSujet; $i++) {
                            echo "<option>".$tabSujet[$i]."</option>";
                        }
                    ?>
                </select>
                <br /><br />
                <textarea name="message" class="inputTextarea noresize width_50" rows="7" placeholder="Votre message..."></textarea>
                <br /><br />
                <input type="submit" name="subContact" class="btnPurple width_35" value="Envoyer" />
            </form>
            
        </div>

    </div>

<?php include('footer.php'); ?>