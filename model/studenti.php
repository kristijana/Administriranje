<?php
include 'baza.php';
class Studenti
{

public $br;
public $JMBAG;
public $Ime;
public $Prezime;
public $Grupa;
public $Izostanci;
public $Testovi;

function __construct($inBr=null, $inJMBAG=null, $inIme=null,$inPrezime=null, $inGrupa=null, $inIzostanci=null, $inTestovi=null)
{
	//mogućnost null parametriziranja, kako ne bismo morali navoditi sve parametre konstruktora..poziv sa praznim zagradama
	
		$this->br = $inBr;
	
	
		$this->JMBAG = $inJMBAG;
	
	if (!empty($inIme))
	{
		$this->Ime = $inIme;
	}
   if (!empty($inPrezime))
	{
		$this->Prezime = $inPrezime;
	}
	if (!empty($inGrupa))
	{
		$this->Grupa = $inGrupa;
	}
  //deafult value vidi kao null i ostavlja prazno, zato maknemo
		$this->Izostanci = $inIzostanci;

		$this->Testovi = $inTestovi;


}
public  function GetStudenti($naz)
{
	$sql = "SELECT * FROM ".$naz." ORDER BY Prezime " ;	
	$db = new Db();   
	$query = $db -> query($sql);
	if ( count($query) > 0) {
	$postArray = array();
	foreach ($query as $row)
	{
		$myStudenti = new Studenti($row['br'], $row["JMBAG"], $row['Ime'], $row['Prezime'], $row['Grupa'], $row['Izostanci'], $row['Testovi']);
		array_push($postArray, $myStudenti);
	}
	return $postArray;
}
}
public  function updateIzostanci($naz,$value){
	$sql="UPDATE ".$naz." SET Izostanci = Izostanci + 1 WHERE br = '" . $value . "'";
	$db = new Db();   
	$query = $db -> query($sql);
}
public  function updateTestovi($naz,$value){
	$sql="UPDATE ".$naz." SET Testovi = Testovi + 1 WHERE br = '" . $value . "'";
	$db = new Db();   
	$query = $db -> query($sql);
}
public  function updateBodovi($naz,$bodovi,$jmbg){
	$sql="UPDATE `".$naz."` SET Bodovi = Bodovi + ".$bodovi." WHERE `JMBAG`=".$jmbg;
	$db = new Db();   
	$query = $db -> query($sql)or die ('Cannot process SQL count totals query Error: ' . $db->error());
	
}
public  function updateIzlazak($naz,$jmbg){
	$sql="UPDATE `".$naz."` SET `Izlazak`= Izlazak + 1 WHERE `JMBAG`=".$jmbg;
	$db = new Db();   
	$query = $db -> query($sql)or die ('Cannot process SQL count totals query Error: ' . $db->error());	
}
public  function GetBodovi($naz)
{
	$sql ="SELECT * FROM ".$naz." WHERE Ocjena < '2' and Bodovi > '0'";
	$db = new Db();   
	$query = $db ->select($sql);
	if ( count($query) > 0) {
	$postArray = array();
	foreach ($query as $row)
	{
		$myStudenti = new Studenti($row['br'], $row["JMBAG"], $row['Ime'], $row['Prezime'], $row['Grupa'], $row['Izostanci'], $row['Testovi']);
		array_push($postArray, $myStudenti);
	}
	return $postArray;
}
}
public  function brisiBodovi($naz){
	$rs = $this->GetBodovi($naz);
		if (is_array($rs)){
			$db = new Db(); 
			foreach ($rs as $row){ 
			$db -> query("UPDATE `".$naz."` SET Bodovi = Bodovi = '0' WHERE `JMBAG`=".$row->JMBAG)or die ('Cannot process SQL count totals query Error: ' . $db->error());
			}
		}
    }		

}
/* $stud = New Studenti();
echo $stud->updateBodovi('186_pp','0177029754',99 );  */
?>