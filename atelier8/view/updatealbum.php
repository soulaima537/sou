<?php

	include "../controller/albumC.php";
	include_once '../Model/album.php';

	$albumC = new AlbumC();
	$error = "";
	
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
        $albumC->modifieralbum($album1, $_GET['idAlbum']);
        header('Location:showAlbums.php');
        }
    
        else
            $error = "Missing information";
	}
?>
    <html>
        <head>
            <title>Modifier Album</title>
        </head>
        <body>
        <?php
			if (isset($_GET['idAlbum'])){
				$album1 = $albumC->recupereralbum($_GET['idAlbum']);
				
		?>
            <form method="POST" >
                <table align="center">
                <tr><td><h1>Modifier Album</h1></td></tr>
                    <tr><td><label for="idAlbum">IdAlbumm :</label></td></tr>
                    <tr><td><input type="text" name="idAlbum" id="idAlbum" value = "<?php echo $album1['idAlbum'];?>" disabled></td></tr>
                    <tr><td><label for="titre">Title : </label></td></tr>
                    <tr><td><input type="text" name="titre" id="titre" maxlength="50" value = "<?php echo $album1['titre']; ?>"></td></tr>
                    <tr><td><label for="prix">Price : </label></td></tr>
                    <tr><td><input type="number" step="0.01" name="prix" id="prix" value = "<?php echo $album1['prix']; ?>"></td></tr>
                    <tr><td><label for="image">Image : </label></td></tr>
                    <tr><td><input type="file" name="image" id="image" value = "<?php echo $album1['image']; ?>"></td></tr>
                    <tr><td><input type="submit" name="modifier"value="modifier"></td></tr>
                </table>
            </form>
            <?php
            }
            ?>
        </body>
    </html>


