<?php
class Prikaz
{


public $naziv;


public function __construct($id, $naz,$korisnik)
{
	
	$this->naziv = "?id=".$id."&ime=".$naz."&korisnik=".$korisnik;
	
}
public function display($path) 
{
	$path .= $this->naziv ;
		return $path;
}	

}

?>
