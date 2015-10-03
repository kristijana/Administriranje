<?php
//include_once '../model/baza.php'; onda moramo postavit once i na ostale modele jer ovaj prvi pozivamo..il' zamijenit redoslijed include

 class Upload
{  
public $db;
public function __construct(){
	$this->db=new Db();
}
public function uplKolegij($xml,$naz,$g){
foreach ($xml as $row) {
 
$w1 = $row->column[1];  
$w2 = $row->column[2];   
$w3 = $row->column[3];
if ($g =='sve')  
$w4 = $row->column[4];  
else $w4 = $g;
 
$sql="INSERT INTO ".$naz." (JMBAG, Ime, Prezime, Grupa)
VALUES
('$w1','$w2','$w3','$w4')";
$this->db->query($sql);

} }
public function upl($xml,$naz){
foreach ($xml as $row) {
$w1 = $row->column[1];  
$sql="INSERT INTO ".$naz." (JMBAG) VALUES ('$w1')";
$this->db->query($sql);

/*  if (!$db->query($sql))
   {
   die('Error: ' . $this->db->error());
} */}}

}

 ?>
