<?php
class album
{
    private  $idAlbum ;
    private  $titre ;
    private  $prix ;
    private  $image ;

    public function __construct(string $titre,string $prix,string $image)
    {
        $this->titre=$titre;
        $this->prix=$prix;
        $this->image=$image;
    }
    function getidAlbum(){
		return $this->idAlbum;
	}
	function gettitre(){
		return $this->titre;
	}
	function getprix(){
		return $this->prix;
	}
	function getimage(){
		return $this->image;
	}

	function settitre($titre){
		$this->titre=$titre;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setimage($image){
		$this->image=$image;
	}
	
}
?>