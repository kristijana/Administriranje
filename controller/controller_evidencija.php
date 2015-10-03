<?php
include_once ('../config/main.php');
include '../model/studenti.php';

class ControllerEvidencija {
	public $model;
	Public $naziv;
	Public $adresa;
	public function __construct($naz,$adresa)  
    {  
        $this->model = new Studenti();
		$this->naziv = $naz;
		$this->adresa = $adresa;
    } 
	public function invoke(){
		if(isset($_POST['checkbox'])){
			foreach($_POST['checkbox'] as $value)
			{
				$this->model->updateIzostanci($this->naziv,$value);
            }
        }
	    if(isset($_POST['check'])){
			foreach($_POST['check'] as $value)
			{
				$this->model->updateTestovi($this->naziv,$value);
            }
		}
		$stud = $this->model->GetStudenti($this->naziv);
 		$adr =$this->adresa;
		include '../view/evidencija.php';
		
	}
}
$naz= $_GET['id']."_".$_GET['ime'];
$adresa ="../controller/controller_evidencija.php?id=".$_GET['id']."&ime=". $_GET['ime'];
$evidencija= New ControllerEvidencija($naz,$adresa);
$evidencija->invoke();	
?>