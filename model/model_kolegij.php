<?php

include 'baza.php';
class Kolegij
{

public $PID;
public $user_id;
public $naziv;


function __construct($inPID=null, $inUser_id=null, $inNaziv=null)
{
	if (!empty($inPID))
	{
		$this->PID = $inPID;
	}
	if (!empty($inUser_id))
	{
		$this->user_id = $inUser_id;
	}
	if (!empty($inNaziv))
	{
		$this->naziv = $inNaziv;
	}
   }
public  function GetKolegiji($inUser_id=null)
{
	if (!empty($inUser_id))
	{ $sql = "SELECT * FROM kolegiji WHERE user_id= " . $inUser_id . " ORDER BY PID DESC" ;
		
	}
	
	else
	{
		$sql = "SELECT * FROM kolegiji ORDER BY PID DESC";
		
	}
	$db = new Db();   
	$query = $db -> select($sql);
	if ( count($query) > 0) {
	$postArray = array();
	foreach ($query as $row)
	{
		$myKolegij = new Kolegij($row["PID"], $row['user_id'], $row['naziv']);
		array_push($postArray, $myKolegij);
	}
	return $postArray;
}}
public  function getId($inUser_id=null, $inNaziv=null)
{
	$sql = "SELECT PID FROM kolegiji WHERE user_id='$inUser_id' AND naziv='$inNaziv'";
	$db = new Db(); 
    if ($db -> select($sql) == false) return false;
	else return $db -> query($sql)->fetch_object()->PID;

}
public  function insert($inUser_id=null, $inNaziv=null)
{
	$sql = "INSERT INTO kolegiji (user_id, naziv) VALUES ('$inUser_id', '$inNaziv')"; 
	$db = new Db();   
    $db -> query($sql);
}
public  function delete ($inPID=null)
{	$db = new Db();   
    $db -> query("DELETE  FROM kolegiji WHERE PID = $inPID ");
}
}
?>