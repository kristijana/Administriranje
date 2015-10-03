<?php

class Tablice
{
	private $grupe;
	private $ispit;
	private $kolokvij;
	private $studenti;
	
	public function __construct ($naz, $id)
	{
		$this->grupe = $id."gp";
		$this->ispit = $id."ispit";
		$this->kolokvij = $id."kol";
		$this->studenti = $id."_".$naz;
	}
	public function kreiraj()
	{ 
	    $db = new Db();
		$sql ="CREATE TABLE IF NOT EXISTS `".$this->studenti."` (`br` int(10) NOT NULL AUTO_INCREMENT,
              `JMBAG` varchar(255) NOT NULL,`Ime` varchar(255) NOT NULL,`Prezime` varchar(255) NOT NULL,
              `Grupa` varchar(255) NOT NULL,`Izostanci` int(10) unsigned NOT NULL DEFAULT '0',
              `Testovi` int(10) unsigned NOT NULL DEFAULT '0',`Bodovi` int(10) NOT NULL DEFAULT '0',
	          `Izlazak` int(10) NOT NULL DEFAULT '0',`Ocjena` int(10) NOT NULL ,
	          `Datum` date NOT NULL ,  PRIMARY KEY (`br`), UNIQUE KEY (`JMBAG`))";
        if(!$result = $db->query($sql)) die('There was an error running the query [' . $db->error . ']');


        $sql ="CREATE TABLE IF NOT EXISTS `".$this->kolokvij."` (`br` int(10) NOT NULL AUTO_INCREMENT,
              `JMBAG` varchar(255) NOT NULL,`Bodovi` int(10) unsigned NOT NULL DEFAULT '0',
              `Pravo` char(2)  DEFAULT 'Ne', PRIMARY KEY (`br`), UNIQUE KEY (`JMBAG`))";
        if(!$result = $db->query($sql)) die('There was an error running the query [' . $db->error . ']');

        $sql ="CREATE TABLE IF NOT EXISTS `".$this->ispit."` (`br` int(10) NOT NULL AUTO_INCREMENT,
              `JMBAG` varchar(255) NOT NULL,`Pravo` char(2)  DEFAULT 'Ne',   PRIMARY KEY (`br`), UNIQUE KEY (`JMBAG`))";
        if(!$result = $db->query($sql)) die('There was an error running the query [' . $db->error . ']');

        $sql ="CREATE TABLE IF NOT EXISTS `".$this->grupe."` (`br` int(10) NOT NULL AUTO_INCREMENT,
              `JMBAG` varchar(255) NOT NULL,`Grupa` int(10)  NOT NULL, `Dvorana` int(10)  NOT NULL,
			  `Termin` varchar(20)  NOT NULL, PRIMARY KEY (`br`), UNIQUE KEY (`JMBAG`))";
	    if(!$result = $db->query($sql)) die('There was an error running the query [' . $db->error . ']');
	}
	public  function brisi()
	{
		$db = new Db();
		$sql= "DROP TABLE IF EXISTS ".$this->studenti;
        $db->query($sql);
		$sql= "DROP TABLE IF EXISTS ".$this->kolokvij;
		$db->query($sql);
		$sql ="DROP TABLE IF EXISTS ".$this->ispit;
        $db->query($sql); 
		$sql = "DROP TABLE IF EXISTS ".$this->grupe;
		$db->query($sql); 
    }
}