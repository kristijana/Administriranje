<?php
include '../model/model_prikaz.php';
class View
{
public function set ($id, $naz,$korisnik){
$prikaz = New Prikaz($id, $naz,$korisnik);
$studenti = $prikaz->display('../controller/grid_view.php')."&tablica=kolegij";
$evidencija = $prikaz->display('../controller/controller_evidencija.php');
$kolokvij = $prikaz->display('../controller/grid_view.php')."&tablica=kolokvij";
$ispit = $prikaz->display('../controller/grid_view.php')."&tablica=ispit";
$grupe = $prikaz->display('../controller/grid_view.php')."&tablica=grupe";

include '../view/kolegij.php';
}
}
$kolegij= New View();
$kolegij->set($_GET['id'],$_GET['ime'],$_GET['korisnik']);
