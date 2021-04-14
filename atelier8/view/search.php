<?php
    include "../controller/albumC.php";

    $albumC = new AlbumC();
?>     
    <form action="" method="post">
    <tr>
            <td><label><h3>Inserer Titre : </h3></label></td>
            <td><input type="text" name="album" placeholder="Chercher Album.." ></td>
            <td><input type="submit" name="search" value="search"></td>
    </tr>
    </form>
<?php   
        if (isset($_POST['album']) && isset($_POST['search'])){
			$album = $albumC->getAlbumByTitle($_POST['album']);
           
			if ($album !== false) {
?>
    <html>
        <head>
        </head>
        <body>
        <table align="center">
			<h1 align="center">Music</h1>
			<tr>
                <td><strong><?php echo $album['titre'];?></strong></td>
                <td><img width="200PX" src="img/<?php echo $album['image'];?>"/></td>
            </tr>
            <tr>
                <td><?php echo $album['prix'];?> dt.</td>
                <td>
                    <a href="updatealbum.php?idAlbum=<?php echo $album['idAlbum'];?>">Modifier</a>
                </td>
                <td>
                    <form method="POST" action="deletealbum.php">
                    <input type="submit" name="supprimer" value="supprimer">
	                <input type="hidden" value="<?PHP echo $album['idAlbum']; ?>" name="idAlbum">
	
                    </form>
						
                </td>
            </tr>
        </table>
        </body>
    </html>
	<?php
		}
		else {
			echo " No results found!!! ";
		}
	}
	?>