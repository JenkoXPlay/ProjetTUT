<?php

    function security($data) {
        $data = trim($data);
        $data = str_replace("<", "", $data);
        $data = str_replace(">", "", $data);
        $data = str_replace("&lt;", "", $data);
        $data = str_replace("&gt;", "", $data);
        return $data;
    }

?>