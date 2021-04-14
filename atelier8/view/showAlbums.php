<?php
include "../controller/albumC.php";

$albumc = new AlbumC();
$listealbums=$albumc->afficherAlbum();

?>



<html>
    <head>
    </head>
<body>
<button><a href="addAlbum.html">Ajouter un Album</a></button>
<button align="left"><a href="search.php">Chercher un Album</a></button>
    <hr>
    <h1 align="center" >MUSIC</h1>

    <table align="center">
        <?php
            foreach($listealbums as $album){
        ?>
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
	
                      <!--<a href="supprimeralbum.php?idAlbum=<?php // echo $album['idAlbum'];?>">Supprimer</a>-->
                    </form>
						
                </td>
            </tr>
            <?php
            }    
            ?>
    </table>
</body>
</html>

