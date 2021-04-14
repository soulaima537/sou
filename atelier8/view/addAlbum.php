<?php
include '../model/album.php';
include '../controller/albumC.php';
$error = "";

$album1 = null;

$albumc = new AlbumC();

if(isset($_POST["titre"])&&
    isset($_POST["prix"])&&
    isset($_POST["image"])
    )
    {
        if(!empty($_POST["titre"])&&
            !empty($_POST["prix"])&&
            !empty($_POST["image"])
            ){
        $album1 = new album(
            $_POST["titre"],
            $_POST["prix"],
            $_POST["image"]
        );
        $albumc->ajouteralbum($album1);
        header('Location:showAlbums.php');
    }
    else{
        $error= "missing info";
    }
}
?>
 <html>   
    