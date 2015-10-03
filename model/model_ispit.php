<?php
//include 'studenti.php';
class Ispit extends Studenti
{
    public $Pravo;
	public $Bodovi;
	public $Ocjena;
	public $Datum;

    public function __construct( $inBr=null, $inJMBAG=null, $inIme=null,$inPrezime=null, $inGrupa=null, $inIzostanci=null, $inTestovi=null, $inPravo=null, $inBodovi=null, $inOcjena=null, $inDatum=null) {

        parent::__construct($inBr, $inJMBAG, $inIme,$inPrezime, $inGrupa, $inIzostanci, $inTestovi ); 
        $this->Pravo= $inPravo;
		$this->Bodovi= $inBodovi;
		$this->Ocjena =$inOcjena;
		$this->Datum = $inDatum;
	 }
	public  function GetIspit($ispit,$naz){

	$db = new Db();   
	$query = $db ->select("SELECT * FROM ".$ispit." INNER JOIN ".$naz." ON ( (`".$ispit."`.JMBAG) = ( `".$naz."`.JMBAG ) )") or die ('Cannot process SQL count totals query Error: ' . $db->error());
	$postArray = array();
	if ( count($query) > 0) {

	foreach ($query as $row){
		//echo $row['br'].','.$row["JMBAG"].','.$row['Ime'].','.$row['Prezime'].','. $row['Grupa'].','.$row['Izostanci'].','. $row['Testovi'].','.$row['Pravo'].','.$row['Bodovi'];
		$myIspit = New Ispit($row['br'], $row["JMBAG"], $row['Ime'], $row['Prezime'], $row['Grupa'], $row['Izostanci'], $row['Testovi'],$row['Pravo'],$row['Bodovi'],$row['Ocjena'],$row['Datum']);
		array_push($postArray, $myIspit);
	    }
	
	} 	return $postArray;
	}
	public  function SetPravo($ispit,$naz,$iz){

        $rs=$this->GetIspit($ispit,$naz);
		if (is_array($rs)){
			foreach ($rs as $row){ 
			if ($row->Izostanci <= $iz and $row->Ocjena < 2 ) $this->updatePravo($ispit,$row->JMBAG);
			parent::updateIzlazak($naz,$row->JMBAG);
			}
		} 
	}
	public  function updatePravo($ispit,$jmbg){

	$sql="UPDATE `".$ispit."` SET `Pravo`='Da' WHERE `JMBAG`=".$jmbg;
	$db = new Db();   
	$query = $db -> query($sql)or die ('Cannot process SQL count totals query Error: ' . $db->error());
	}
	public function brisiBodove($naz){
		parent::brisiBodovi($naz);
	}
	public function brisiIspitniRok($ispit,$gp){
	$db = new Db();	
	$db->query("TRUNCATE TABLE ".$ispit);
	$db->query("TRUNCATE TABLE ".$gp);	
	}
}
/* $isp = New Ispit();
$isp->SetPravo('186ispit','186_pp','15'); */
?>
