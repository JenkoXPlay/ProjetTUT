<?php

    // Ajouter un nouveau favoris à la BDD
    function addFav($bdd, $idAnnonce, $idUser){
        $req = $bdd->prepare("INSERT INTO favoris 
                                        (id,
                                        id_annonce,
                                        id_user)
                                VALUES (?, ?, ?)");
        $req->execute([
            '',
            $idAnnonce,
            $idUser
        ]);
    }

    // suppression de tous les favoris
    function deleteAllFav($bdd) {
        $req = $bdd->prepare("DELETE FROM favoris");
        $req->execute();
    }

    // suppresion d'un fav par id
    function deleteFavId($bdd, $idFav) {
        $req = $bdd->prepare("DELETE FROM favoris WHERE id='$idFav'");
        $req->execute();
    }

    // suppression des fav d'un user
    function deleteFavByUser($bdd, $idUser) {
        $req = $bdd->prepare("DELETE FROM favoris WHERE id_user='$idUser'");
        $req->execute();
    }

    // suppression des fav d'une annonce
    function deleteFavByAnnonce($bdd, $idAnnonce) {
        $req = $bdd->prepare("DELETE FROM favoris WHERE id_annonce='$idAnnonce'");
        $req->execute();
    }

    // get all favoris
    function getAllFav($bdd) {
        $req = $bdd->prepare("SELECT * FROM favoris");
        $req->execute();
        return $req;
    }

    // get favoris par id
    function getFavById($bdd, $idFav) {
        $req = $bdd->prepare("SELECT * FROM favoris WHERE id='$idFav'");
        $req->execute();
        return $req;
    }

    // get les favoris par id user
    function getFavByUser($bdd, $idUser) {
        $req = $bdd->prepare("SELECT * FROM favoris WHERE id_user='$idUser'");
        $req->execute();
        return $req;
    }

    // get les favoris par id annonce
    function getFavByAnnonce($bdd, $idAnnonce) {
        $req = $bdd->prepare("SELECT * FROM favoris WHERE id_annonce='$idAnnonce'");
        $req->execute();
        return $req;
    }

?>