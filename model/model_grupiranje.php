<?php

Class IspitneGrupe
{

    public $JMBAG;
	public $Grupa;	
	public $Dvorana;
    public $Termin;

public function __construct($inJMBAG=null, $inGrupa=null, $inDvorana=null, $inTermin=null){
	if (!empty($inJMBAG))
	{
	$this->JMBAG =$inJMBAG;
	}
    if (!empty($inGrupa))
	{
	$this->Grupa =$inGrupa;	
	}
	if (!empty($inDvorana))
	{
	$this->Dvorana=$inDvorana;
	}	
	if (!empty($inTermin))
	{
	$this->Termin=$inTermin;
	}
}
public function hoursToMinutes($hours)
{
	if (strstr($hours, ':'))
	{
		# Split hours and minutes.
		$separatedData = explode(':', $hours);

		$minutesInHours    = $separatedData[0] * 60;
		$minutesInDecimals = $separatedData[1];

		$totalMinutes = $minutesInHours + $minutesInDecimals;
	}
	else
	{
		$totalMinutes = $hours * 60;
	}

	return $totalMinutes;
}

# Transform minutes like "105" into hours like "1:45".
public function minutesToHours($minutes)
{
	$hours          = floor($minutes / 60);
	$decimalMinutes = $minutes - floor($minutes/60) * 60;

	# Put it together.
	$hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
	return $hoursMinutes;
}
public function grupiranjePismeni($ispit, $naz, $gp){
	$conn= New Db();
    $poc=$this->hoursToMinutes($_POST['vrij']);

    $bod=$_POST['bod'];
    $conn->query("TRUNCATE TABLE ".$gp);
    $rs = $conn->query("SELECT * FROM ".$ispit."
    INNER JOIN ".$naz." ON ( (`".$ispit."`.JMBAG) = ( `".$naz."`.JMBAG ) ) WHERE (`Bodovi`< '$bod' and `".$ispit."`.Pravo ='Da')ORDER BY RAND()") or die ('Cannot process SQL count totals query');
         
	     if($rs->num_rows > 0) 
		 {   $num_rows = $rs->num_rows;
		  $group = ceil($num_rows/$_POST['bs']);
		  $b=0;
		     while($row = $rs->fetch_assoc()) 
			 { 
			 $j = $row['JMBAG'];
			 $ab=fmod($b,$group) + 1 ;
			 $cd = fmod($ab,$_POST['dvor'])+1; 
			 $pocet = $poc + $_POST['min'] * (ceil($ab/$_POST['dvor']) -1);
			 $kraj=$this->minutesToHours($pocet + $_POST['min']);
			 $termin=$this->minutesToHours($pocet)." - ".$kraj;
			// echo $row['JMBAG']."..grupa-".$ab."..dvorana-".$cd.".termin-".$this->minutesToHours($pocet)."---".$kraj."<br>";
		     $b=$b+1;
			 $conn->query("INSERT INTO ".$gp." (JMBAG, Grupa, Dvorana, Termin) VALUES ('$j','$ab','$cd','$termin')");

			 } 
             } $a=0; $dv=$_POST['dvor'];
			 //echo $num_rows;
			 for ($x=1; $x<=$_POST['dvor']; $x++) {
			 $group = $group - $a;
			 $a=ceil($group /$dv);
			 $ter = ceil($a * $_POST['min']/60);
			 $dv=$dv-1;
			 //'<script type="text/javascript">alert("hello!");</script>';
             //echo '<script type="text/javascript">alert("Za dvoranu '.$x.' Je potrebno rezervirati '.$ter.'  termina ");</script>';//"Za dvoranu $x Je potrebno rezervirati $ter  termina <br>";
                        }
		}
	public function grupiranjeUsmeni($ispit, $naz, $gp){
	$conn= New Db();
     $poc=$this->hoursToMinutes($_POST['vrij']);
     $bod=$_POST['bod'];
     $conn->query("TRUNCATE TABLE ".$gp);
     $rs = $conn->query("SELECT * FROM ".$ispit." INNER JOIN ".$naz." ON ( (`".$ispit."`.JMBAG) = ( `".$naz."`.JMBAG ) ) WHERE (`Bodovi`>= '$bod' and `".$ispit."`.Pravo ='Da')ORDER BY RAND()") or die ('Cannot process SQL count totals query');
         
	     if($rs->num_rows > 0) 
		 {   $num_rows = $rs->num_rows;
		  $group = ceil($num_rows/$_POST['bs']);
		  $b=0;
		     while($row = $rs->fetch_assoc()) 
			 { 
			 $j = $row['JMBAG'];
			 $ab=fmod($b,$group) + 1 ;
			 $cd =  $_POST['dvor']; 
			 $pocet =$poc + $_POST['min'] * ($ab -1);
			 $kraj=$this->minutesToHours($pocet + $_POST['min']);
			 $termin=$this->minutesToHours($pocet)." - ".$kraj;
			 //echo $row['JMBAG']."..grupa-".$ab."..dvorana-".$cd.".termin-".$this->minutesToHours($pocet)."---".$kraj."<br>";
		     $b=$b+1;
			 $conn->query("INSERT INTO ".$gp." (JMBAG, Grupa, Dvorana, Termin) VALUES ('$j','$ab','$cd','$termin')");

			 } 
	} }	
}
?>