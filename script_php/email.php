<?php

    /**
     * @param string $destinataire Personne recevant l'email
     * @param string $titre Titre de l'email
     * @param string $msgTxt Message au format txt
     * @param string $msgHTML Message au format HTML
    **/

    function sendMail($destinataire, $titre, $msgHTML) {
        // info altitude - mail qui envoie ce mail + reply
        $noreply = "contact@altitude.maximelefebvre.fr";
        $nameFrom = "Alt'itude";

        $mail = $destinataire; // Déclaration de l'adresse de destination.

        // On filtre les serveurs qui rencontrent des bogues.
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }

        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = $msgTxt;
        $message_html = $msgHTML;
        //==========
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Définition du sujet.
        $sujet = $titre;
        //=========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"".$nameFrom."\"<".$noreply.">".$passage_ligne;
        $header.= "Reply-to: \"".$nameFrom."\" <".$noreply.">".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        if (mail($mail,$sujet,$message,$header)) {
            return true;
        } else {
            return false;
        }

    }

?>