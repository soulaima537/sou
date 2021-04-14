<?PHP
	include "../controller/albumC.php";

	$albumC = new AlbumC();

	
	if (isset($_POST["idAlbum"])){
		$albumC->supprimeralbum($_POST["idAlbum"]);
		header('Location:showAlbums.php');
	}

?>