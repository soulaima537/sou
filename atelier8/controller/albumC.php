<?php    
	include "../connection.php";
	require_once '../Model/album.php';

	class AlbumC {
		
		function ajouteralbum($album){
			$sql="INSERT INTO album ( titre , prix , image) 
			VALUES (:titre , :prix , :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'titre' => $album->gettitre(),
					'prix' => $album->getprix(),
					'image' => $album->getimage(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

        function afficheralbum(){
			
			$sql="SELECT * FROM album";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
    
        public function getAlbumByTitle($titre) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM album WHERE titre = :titre'
                );
                $query->execute([
                    'titre' => $titre
                ]);
                return $query->fetch();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

    function supprimeralbum($idAlbum){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM album WHERE idAlbum = :idAlbum'
            );
            $query->execute([
                'idAlbum' => $idAlbum
            ]);
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifieralbum($album,$idAlbum){
		$sql="UPDATE album SET  titre=:titre,prix=:prix,image=:image WHERE idAlbum=:idAlbum";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $query=$db->prepare($sql);
        $titre=$album->gettitre();
        $prix=$album->getprix();
        $image=$album->getimage();
		$datas = array( 
            ':idAlbum'=>$idAlbum,
             ':titre'=>$titre,
             ':prix'=>$prix,
             ':image'=>$image);
		$query->bindValue(':idAlbum',$idAlbum);
		$query->bindValue(':titre',$titre);
		$query->bindValue(':prix',$prix);
		$query->bindValue(':image',$image);
		
		
            $s=$query->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}

    function recupereralbum($idAlbum){
        $sql="SELECT * from album where idalbum=$idAlbum";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $album=$query->fetch();
            return $album;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function rechercherAlbum($titre) {            
        $sql = "SELECT * from album where titre=:titre"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $album->gettitre(),
            ]); 
            $result = $query->fetchAll(); 
            return $result;
        }
        catch (Exception $e) {
            $e->getMessage();
        }
    }

    
}


    
?>