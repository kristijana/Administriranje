<?php
include 'grid_postavke.php'; 
include 'controller_upload_file.php';
include '../model/model_kolokvij.php';
include '../model/model_ispit.php';
include '../model/model_grupiranje.php';
class View
{
public $tabl;
public $tablica;
public $adresa;
public $upload;
public $kolokvij;
public $ispit;
public $grupe;
public function __construct ($adresa)
{
	$this->tabl = $_GET['tablica']; 
	$this->tablica = New Grid();
	$this->adresa = $adresa;
	$this->upload = New Upload();
	$this->kolokvij = New Kolokvij();
	$this->ispit = New Ispit();
	$this->grupe = New IspitneGrupe();
}

	public function invoke()
	{   
		if ($this->tabl == 'kolegij')
		{   if (isset ($_POST['submit'])){
			$xml= new SimpleXMLElement($_FILES["file"]["tmp_name"], NULL, true);
			$this->upload->uplKolegij($xml,$_GET['id']."_".$_GET['ime'],$_POST['gr']);
			
		}
         	$prikaz = $this->tablica->pregledStudenti($_GET['id']."_".$_GET['ime'], $_GET['ime']);
			$adress = $this->adresa;
		    include '../view/grid.php';
		    echo '</br></br>';
		    include '../view/forma_upload.php';
		}
		else if ($this->tabl == 'kolokvij')
		{   if (isset ($_POST['submit'])){
			$xml= new SimpleXMLElement($_FILES["file"]["tmp_name"], NULL, true);
			$this->upload->upl($xml,$_GET['id']."kol");
			}   
		    if(isset($_POST['iz']) and isset($_POST['ts'])){
			$this->kolokvij->SetPravo($_GET['id']."kol",$_GET['id']."_".$_GET['ime'],$_POST['iz'],$_POST['ts'] );
			}
		    if(isset($_POST['sub'])){
			$this->kolokvij->saveBodovi($_GET['id']."kol",$_GET['id']."_".$_GET['ime'] );
			}			
         	$prikaz = $this->tablica->pregledKolokvij($_GET['id'], $_GET['ime']);
			$adress = $this->adresa;
		    include '../view/grid.php';
		    echo '</br></br>';
		    include '../view/forma_upload.php';
			include '../view/izostanci-testovi.php';
		}	
	    else if ($this->tabl == 'ispit')
		{   if (isset ($_POST['submit'])){
			$xml= new SimpleXMLElement($_FILES["file"]["tmp_name"], NULL, true);
			$this->upload->upl($xml,$_GET['id']."ispit");	
		}
		    if(isset($_POST['izostanci'])){
			$this->ispit->setPravo($_GET['id']."ispit",$_GET['id']."_".$_GET['ime'],$_POST['izostanci']);	
			}
         	$prikaz = $this->tablica->pregledIspit($_GET['id']."_".$_GET['ime'], $_GET['id']."ispit");
			$tab = $this->tabl;
			$adress = $this->adresa;
		    include '../view/grid.php';
			//include '../view/grupiranje.php';
		    include '../view/forma_upload.php';
		}
		 else if ($this->tabl == 'grupe')
		{   
		    if(isset($_POST['pismeni'])){
			$this->grupe->grupiranjePismeni($_GET['id']."ispit",$_GET['id']."_".$_GET['ime'],$_GET['id']."gp");	
			} 
			 if(isset($_POST['usmeni'])){
			$this->grupe->grupiranjeUsmeni($_GET['id']."ispit",$_GET['id']."_".$_GET['ime'],$_GET['id']."gp");	
			} 
		    if(isset($_POST['subm'])){
				if(isset($_POST['brisi'])) $this->ispit->brisiBodove($_GET['id']."_".$_GET['ime']);
			    $this->ispit->brisiIspitniRok($_GET['id']."ispit",$_GET['id']."gp");	
			}			
         	$prikaz = $this->tablica->grupiranjeIspit($_GET['id']."_".$_GET['ime'], $_GET['id']."gp");
			$prik = $this->tablica->pregledRezervacije($_GET['korisnik'],$_GET['ime']);
			$tab = $this->tabl;
			$adress = $this->adresa;
	        $korisnik = $_GET['korisnik'];
			$ime =$_GET['ime'];
			include '../view/grid.php';
			include '../view/ispitne_grupe.php'; 
			//include '../view/grupiranje.php';
			include '../view/dvorane.php';
		    
		}
	}
}
    $adr="../controller/grid_view.php?id=".$_GET['id']."&ime=".$_GET['ime']."&korisnik=".$_GET['korisnik']."&tablica=".$_GET['tablica'];
	$prikazi = New View($adr);
	$prikazi->invoke();
?>