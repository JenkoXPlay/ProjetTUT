<?php
    function generatePwd($longueur) {
        $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $rand = 0;
        $randomPwd = "";
        if ($longueur >= 1) {
            for ($i = 0; $i < $longueur; $i++) {
                $rand = rand(0, strlen($chaine)-1);
                $randomPwd .= $chaine[$rand];
            }
            return $randomPwd;
        }
    }
?>