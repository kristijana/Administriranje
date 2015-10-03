<?php
include 'studenti.php';
class Kolokvij extends Studenti
{
    public $Pravo;
	public $Bodovi;

    public function __construct( $inBr=null, $inJMBAG=null, $inIme=null,$inPrezime=null, $inGrupa=null, $inIzostanci=null, $inTestovi=null, $inPravo=null, $inBodovi=null) {

        parent::__construct($inBr, $inJMBAG, $inIme,$inPrezime, $inGrupa, $inIzostanci, $inTestovi ); 
        $this->Pravo= $inPravo;
		$this->Bodovi= $inBodovi;
	 }
	 
	public  function SetPravo($kolk,$naz,$iz,$ts){

        $rs=$this->GetKolokvij($kolk,$naz);
		if (is_array($rs)){
			foreach ($rs as $row){ 

			if ($row->Izostanci < $iz and $row->Testovi >= $ts ) $this->updatePravo($kolk,$row->JMBAG);
			}
		} 
	}
    public  function updatePravo($kolk,$jmbg){

	$sql="UPDATE `".$kolk."` SET `Pravo`='Da' WHERE `JMBAG`=".$jmbg;
	$db = new Db();   
	$query = $db -> query($sql)or die ('Cannot process SQL count totals query Error: ' . $db->error());
	}
	public  function GetKolokvij($kolk,$naz){

	$db = new Db();   
	$query = $db ->select("SELECT * FROM ".$kolk." INNER JOIN ".$naz." ON ( (`".$kolk."`.JMBAG) = ( `".$naz."`.JMBAG ) )") or die ('Cannot process SQL count totals query Error: ' . $db->error());
	$postArray = array();
	if ( count($query) > 0) {

	foreach ($query as $row){
		//echo $row['br'].','.$row["JMBAG"].','.$row['Ime'].','.$row['Prezime'].','. $row['Grupa'].','.$row['Izostanci'].','. $row['Testovi'].','.$row['Pravo'].','.$row['Bodovi'];
		$myKolokvij = New Kolokvij($row['br'], $row["JMBAG"], $row['Ime'], $row['Prezime'], $row['Grupa'], $row['Izostanci'], $row['Testovi'],$row['Pravo'],$row['Bodovi']);
		array_push($postArray, $myKolokvij);
	    }
	
	}
	return $postArray;
	}
    public function saveBodovi($kolk,$naz){
		    $db=New Db();
	        $rs=$db ->select("SELECT * FROM ".$kolk);
		    if (is_array($rs)){ 
			foreach ($rs as $row){ 

			if ($row['Bodovi'] > 0 ){
			parent::updateBodovi($naz,$row['Bodovi'],$row['JMBAG']);	
			}
			}
		}
		
		$db->query("TRUNCATE TABLE ".$kolk);
	}
}
 // $kol = New Kolokvij();
//$kol->SetPravo('186kol','186_pp','15','0');
//$kol->saveBodovi('186kol','186_pp'); 
//$kol->setPotpis('186ispit','186_pp','15');
 
?>