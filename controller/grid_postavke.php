<?php

include_once("../config/grid/config.php");
 class Grid
{  
public function pregledStudenti($naz ,$ime){
$col = array();
$col["title"] = "JMBAG"; 
$col["name"] = "JMBAG"; 
$col["width"] = "90";
$col["editable"] = true; 
$col["fixed"] = true;
$cols[] = $col;		
$col = array();
$col["title"] = "Prezime";
$col["name"] = "Prezime";
$col["width"] = "100";
$col["fixed"] = true;
$col["editable"] = true; 
$col["align"] = "center"; 
$col["search"] = true; 

$cols[] = $col;

$col = array();
$col["title"] = "Ime";
$col["name"] = "Ime";
$col["width"] = "100";
$col["fixed"] = true;
$col["editable"] = true; 
$col["align"] = "center"; 
$col["search"] = true; 
$cols[] = $col;
$col = array();
$col["title"] = "Studijska grupa"; 
$col["name"] = "Grupa"; 
$col["width"] = "150";
$col["fixed"] = true;
$col["editable"] = true; 
$cols[] = $col;
$col = array();
$col["title"] = "Izostanci"; 
$col["name"] = "Izostanci";
 $col["editable"] = true; 
$col["width"] = "60";
$col["fixed"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Testovi"; 
$col["name"] = "Testovi"; 
$col["width"] = "50";
$col["editable"] = true; 
$col["fixed"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Bodovi"; 
$col["name"] = "Bodovi"; 
$col["width"] = "50";
$col["fixed"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Izlazak"; 
$col["name"] = "Izlazak"; 
$col["width"] = "50";
$col["fixed"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Ocjena"; 
$col["name"] = "Ocjena"; 
$col["width"] = "50";
$col["fixed"] = true;
$cols[] = $col;
$g = new jqgrid();
$grid["caption"] = "Studenti-".$ime;
$grid["multiselect"] = true;
$grid["rowNum"] = 15;

$sql = "Select * from $naz";
$g->set_options($grid);

$g->table = $naz;
$g->set_columns($cols);
$grid_id = "list1";
$out = $g->render($grid_id );
return array('out' => $out,'grid_id' => $grid_id, 'sql' => $sql ,'naziv' => "Kolegij_".$ime, 'cols' => $cols);
}
public function pregledKolokvij($id ,$ime){
	$naz= $id."_".$ime;
    $kolk=$id."kol";
$col = array();
$col["title"] = "Id"; 
$col["name"] = "br"; 
$col["width"] = "30";
$col["fixed"] = true;
# $col["hidden"] = true; // hide column by default
$cols[] = $col;
$col = array();
$col["title"] = "JMBAG"; 
$col["name"] = "JMBAG"; 
$col["width"] = "90";
$col["editable"] = true; 
$col["fixed"] = true;
$cols[] = $col;		
$col = array();
$col["title"] = "Prezime";
$col["name"] = "Prezime";
$col["width"] = "100";
$col["fixed"] = true;

$col["align"] = "center"; 
$col["search"] = true; 

$cols[] = $col;

$col = array();
$col["title"] = "Ime";
$col["name"] = "Ime";
$col["width"] = "100";
$col["fixed"] = true;
$col["align"] = "center"; 
$col["search"] = true; 
$cols[] = $col;
$col = array();
$col["title"] = "Studijska grupa"; 
$col["name"] = "Grupa"; 
$col["width"] = "150";
$col["fixed"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Izostanci"; 
$col["name"] = "Izostanci"; 
$col["width"] = "70";
$col["fixed"] = true;
$col["align"] = "center"; 
$cols[] = $col;
$col = array();
$col["title"] = "Testovi"; 
$col["name"] = "Testovi"; 
$col["width"] = "70";
$col["fixed"] = true;
$col["align"] = "center"; 
$cols[] = $col;
$col = array();
$col["title"] = "Pravo"; 
$col["name"] = "Pravo"; 
$col["width"] = "50";
$col["fixed"] = true;
$col["editable"] = true; 
$col["summaryType"] = "count";
$col["edittype"] = "checkbox";
$col["editoptions"] = array("value"=>"Da:Ne");
$cols[] = $col;
$col = array();
$col["title"] = "Bodovi"; 
$col["name"] = "Bodovi"; 
$col["width"] = "70";
$col["fixed"] = true;
$col["editable"] = true; 
$col["align"] = "center"; 
$cols[] = $col;

$g = new jqgrid();
$grid["caption"] = "Kolokvij ".$ime;
$grid["multiselect"] = true;
$grid["sortname"] = 'Pravo';
$grid["cellEdit"] = true;
$g->set_options($grid);
$g->select_command = "SELECT * FROM (SELECT  ".$kolk.".br,".$kolk.".JMBAG, Pravo ,Ime,Prezime,Grupa,Izostanci,Testovi, ".$kolk.".Bodovi
FROM ".$kolk."
INNER JOIN ".$naz." ON ".$kolk.".JMBAG = ".$naz.".JMBAG) o";
$g->table = $kolk;
$g->set_columns($cols);
$grid_id = "list2";
$out = $g->render($grid_id );
$sql="SELECT * FROM ".$kolk." INNER JOIN ".$naz." ON ".$kolk.".JMBAG = ".$naz.".JMBAG";
return array('out' => $out,'grid_id' => $grid_id, 'sql' => $sql ,'naziv' => "Kolokvij_".$ime, 'cols' => $cols);
}
public function pregledIspit($naz,$ispit){
	$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "br"; 
$col["width"] = "30";
# $col["hidden"] = true; // hide column by default
$cols[] = $col;
$col = array();
$col["title"] = "JMBAG"; // caption of column
$col["name"] = "JMBAG"; 
$col["width"] = "90";
$col["editable"] = true;
# $col["hidden"] = true; // hide column by default
$cols[] = $col;		

$col = array();
$col["title"] = "Prezime";
$col["name"] = "Prezime";
$col["width"] = "100";
$col["search"] = true; // this column is not searchable

# $col["formatter"] = "image"; // format as image -- if data is image url e.g. http://<domain>/test.jpg
# $col["formatoptions"] = array("width"=>'20',"height"=>'30'); // image width / height etc
$cols[] = $col;

$col = array();
$col["title"] = "Ime";
$col["name"] = "Ime";
$col["width"] = "100";
 // this column is not editable
$col["align"] = "center"; // this column is not editable
$col["search"] = true; // this column is not searchable
$cols[] = $col;

$col = array();
$col["title"] = "Grupa";
$col["name"] = "Grupa";
$col["width"] = "150"; // not specifying width will expand to fill space
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable

#$col["edittype"] = "textarea"; // render as textarea on edit
#$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes
$cols[] = $col;

$col = array();
$col["title"] = "Izostanci";
$col["name"] = "Izostanci"; 
$col["width"] = "70";
$cols[] = $col;	

$col = array();
$col["title"] = "Potpis";
// fieldname is not with tablealias in sql, so we used plain fieldname
$col["name"] = "Pravo"; 
$col["width"] = "70";
$col["editable"] = true; // this column is editable
$col["summaryType"] = "count";
$col["edittype"] = "checkbox";
$col["editoptions"] = array("value"=>"Da:Ne");
$cols[] = $col;
		
		
$col = array();
$col["title"] = "Bodovi";
$col["name"] = "Bodovi";
$col["width"] = "70";

$cols[] = $col;
$col = array();

$col = array();
$col["title"] = "Ocjena";
$col["name"] = "Ocjena";
 
$col["width"] = "70";
$cols[] = $col;	
$col = array();
$col["title"] = "O";
$col["hidden"] = true;
$cols[] = $col;	
$g = new jqgrid();
//$grid["width"] = "800";
$grid["height"] = "700";
// $grid["url"] = ""; // your paramterized URL -- defaults to REQUEST_URI
$grid["rowNum"] = 30; // by default 20
$grid["sortname"] = 'Grupa'; // by default sort grid by this field
$grid["sortorder"] = "asc"; // ASC or DESC
$grid["caption"] = $naz."-ispit"; // caption of grid
//$grid["autowidth"] = true;
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["grouping"] = true; // 
$grid["groupingView"] = array();
$grid["groupingView"]["groupField"] = array("Pravo"); // specify column name to group listing
$grid["groupingView"]["groupColumnShow"] = array(true); // either show grouped column in list or not (default: true)
//$grid["groupingView"]["groupText"] = array("<b>{0} - {1} Item(s)</b>"); // {0} is grouped value, {1} is count in group
$grid["groupingView"]["groupOrder"] = array("asc"); // show group in asc or desc order
$grid["groupingView"]["groupDataSorted"] = array(true); // show sorted data within group
$grid["groupingView"]["groupSummary"] = array(true); // work with summaryType, summaryTpl, see column: $col["name"] = "total";
$grid["groupingView"]["groupCollapse"] = false; // Turn true to show group collapse (default: false) 
$grid["groupingView"]["showSummaryOnHide"] = true; // show summary row even if group collapsed (hide) 

// export XLS file
// export to excel parameters
//$grid["export"] = array("format"=>"xlsx", "filename"=>"my-file", "sheetname"=>"test");

// RTL support
// $grid["direction"] = "rtl";

$grid["cellEdit"] = true; // inline cell editing, like spreadsheet

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM (SELECT  ".$ispit.".br,".$ispit.".JMBAG, Pravo ,Ime,Prezime,Grupa,Izostanci,Bodovi, Ocjena
FROM ".$ispit."
INNER JOIN ".$naz." ON ".$ispit.".JMBAG = ".$naz.".JMBAG) o";

// this db table will be used for add,edit,delete
$g->table = $ispit ;
$sql= "SELECT * FROM ".$ispit." INNER JOIN ".$naz." ON ".$ispit.".JMBAG = ".$naz.".JMBAG ORDER BY ".$ispit.".Pravo ";
// pass the cooked columns to grid
$g->set_columns($cols);

$grid_id = "list3";
// generate grid output, with unique grid name as 'list1'
$out = $g->render($grid_id);
return array('out' => $out,'grid_id' => $grid_id, 'sql' => $sql ,'naziv' => "Ispit_".$naz, 'cols' => $cols);
	
}
public function grupiranjeIspit($naz,$gp){
	$col = array();
$col["title"] = "Id"; 
$col["name"] = "br"; 
$col["width"] = "10";
$col["hidden"] = true; 
$cols[] = $col;
$col = array();
$col["title"] = "JMBAG"; 
$col["name"] = "JMBAG"; 
$col["width"] = "15";

$cols[] = $col;		

$col = array();
$col["title"] = "Prezime";
$col["name"] = "Prezime";
$col["width"] = "20";

$col["align"] = "center"; // this column is not editable
$col["search"] = false; 
$cols[] = $col;

$col = array();
$col["title"] = "Ime";
$col["name"] = "Ime";
$col["width"] = "20";

$col["align"] = "center"; // this column is not editable
$col["search"] = false; // this column is not searchable
$cols[] = $col;

$col = array();
$col["title"] = "Grupa";
$col["name"] = "Grupa";
$col["width"] = "10"; // not specifying width will expand to fill space
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = false;
$cols[] = $col;

$col = array();
$col["title"] = "Dvorana";
$col["name"] = "Dvorana"; 
$col["width"] = "10";
$cols[] = $col;	

$col = array();
$col["title"] = "Termin";
$col["name"] = "Termin"; 
$col["width"] = "15";
$cols[] = $col;	
		
$col = array();
$col["title"] = "Bodovi";
$col["name"] = "Bodovi";
$col["width"] = "10";
$col["editable"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Izlazak";
$col["name"] = "Izlazak";
$col["width"] = "10";
$col["editable"] = true;
$cols[] = $col;
$col = array();
$col["title"] = "Ocjena";
$col["name"] = "Ocjena";
$col["width"] = "10";
$col["editable"] = true;
$cols[] = $col;
$g = new jqgrid();
$col = array();
$col["title"] = "Datum"; 
$col["name"] = "Datum"; 
$col["width"] = "20";
$col["editable"] = true; 
$col["summaryType"] = "count";
$col["edittype"] = "checkbox";
$col["editoptions"] = array("value"=>date('Y-m-d').":0000-00-00");
$cols[] = $col;
// $grid["url"] = ""; // your paramterized URL -- defaults to REQUEST_URI
$grid["rowNum"] = 20; // by default 20
$grid["sortname"] = 'Grupa'; // by default sort grid by this field
$grid["sortorder"] = "asc"; // ASC or DESC
$grid["caption"] = $_GET['ime']."-grupe-ispit"; // caption of grid
//$grid["autowidth"] = true; // expand grid to screen width

$grid["height"] = "600";
$grid["multiselect"] = true; // allow you to multi-select through checkboxes

$grid["grouping"] = true; // 
$grid["groupingView"] = array();
$grid["groupingView"]["groupField"] = array("Bodovi"); // specify column name to group listing
$grid["groupingView"]["groupColumnShow"] = array(true); // either show grouped column in list or not (default: true)
//$grid["groupingView"]["groupText"] = array("<b>{0} - {1} Item(s)</b>"); // {0} is grouped value, {1} is count in group
$grid["groupingView"]["groupOrder"] = array("asc"); // show group in asc or desc order
$grid["groupingView"]["groupDataSorted"] = array(true); // show sorted data within group
$grid["groupingView"]["groupSummary"] = array(true); // work with summaryType, summaryTpl, see column: $col["name"] = "total";
$grid["groupingView"]["groupCollapse"] = false; // Turn true to show group collapse (default: false) 
$grid["groupingView"]["showSummaryOnHide"] = true; // show summary row even if group collapsed (hide) 

// export XLS file
// export to excel parameters
$grid["export"] = array("format"=>"xlsx", "filename"=>"my-file", "sheetname"=>"test");

// RTL support
// $grid["direction"] = "rtl";

$grid["cellEdit"] = true; // inline cell editing, like spreadsheet

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$sql= "SELECT * FROM ".$gp." INNER JOIN ".$naz." ON ".$gp.".JMBAG = ".$naz.".JMBAG ORDER BY ".$gp.".Grupa ";
$g->select_command = "SELECT * FROM (SELECT  ".$naz.".br,".$gp.".JMBAG, Ime,Prezime,".$gp.".Grupa, Dvorana, Termin,".$naz.".Bodovi,Izlazak,Ocjena, Datum
FROM ".$gp."
INNER JOIN ".$naz." ON ".$gp.".JMBAG = ".$naz.".JMBAG) o";

// this db table will be used for add,edit,delete
$g->table = $naz ;

// pass the cooked columns to grid
$g->set_columns($cols);

$grid_id = "list4";
// generate grid output, with unique grid name as 'list1'
$out = $g->render($grid_id);
return array('out' => $out,'grid_id' => $grid_id, 'sql' => $sql ,'naziv' => "Ispitne-grupe", 'cols' => $cols);
}
public function pregledRezervacije($id ,$ime){
	$col = array();
$col["title"] = "Datum"; 
$col["name"] = "reservation_week"; 
$col["width"] = "20";
$cols[] = $col;

$col = array();
$col["title"] = "Dvorana"; 
$col["name"] = "reservation_day"; 
$col["width"] = "10";
$cols[] = $col;	

$col = array();
$col["title"] = "Termin"; 
$col["name"] = "reservation_time"; 
$col["width"] = "20";
$cols[] = $col;	

$col = array();
$col["title"] = "Poveznica"; 
$col["name"] = "event_name"; 
$col["width"] = "20";
$col["editable"] = true; 
$col["summaryType"] = "count";
$col["edittype"] = "checkbox";
$col["editoptions"] = array("value"=>$ime.": ");
$cols[] = $col;

$g = new jqgrid();
// $grid["url"] = ""; // your paramterized URL -- defaults to REQUEST_URI
$grid["rowNum"] = 20; // by default 20
$grid["sortname"] = 'reservation_day'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Vase rezervacije dvorana; Poveznice za kolegij -".$ime;
//$grid["autowidth"] = true; // expand grid to screen width
$grid["width"] = "850";
$grid["height"] = "550";
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["hiddengrid"] = true;
$grid["grouping"] = true; // 
$grid["groupingView"] = array();
$grid["groupingView"]["groupField"] = array("reservation_week"); // specify column name to group listing
$grid["groupingView"]["groupColumnShow"] = array(true); // either show grouped column in list or not (default: true)
//$grid["groupingView"]["groupText"] = array("<b>{0} - {1} Item(s)</b>"); // {0} is grouped value, {1} is count in group
$grid["groupingView"]["groupOrder"] = array("asc"); // show group in asc or desc order
$grid["groupingView"]["groupDataSorted"] = array(true); // show sorted data within group
$grid["groupingView"]["groupSummary"] = array(true); // work with summaryType, summaryTpl, see column: $col["name"] = "total";
$grid["groupingView"]["groupCollapse"] = false; // Turn true to show group collapse (default: false) 
$grid["groupingView"]["showSummaryOnHide"] = true; // show summary row even if group collapsed (hide) 

// export XLS file
// export to excel parameters
$grid["export"] = array("format"=>"xlsx", "filename"=>"my-file", "sheetname"=>"test");

// RTL support
// $grid["direction"] = "rtl";

$grid["cellEdit"] = true; // inline cell editing, like spreadsheet
$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);


// set database table for CRUD operations
$g->table = 'phpmyreservation_reservations';
$g->set_columns($cols);
// subqueries are also supported now (v1.2)
$g->select_command = "select * from (SELECT `reservation_week` , `reservation_day` , `reservation_time` , `event_name` 
FROM `phpmyreservation_reservations` 
WHERE `reservation_user_id`=".$id.") as o";
$grid_id = 	"dvorane1";
// render grid
$out = $g->render($grid_id );
$sql="SELECT `reservation_week` , `reservation_day` , `reservation_time` , `event_name`  FROM `phpmyreservation_reservations` WHERE `reservation_user_id`=".$id;
return array('out' => $out,'grid_id' => $grid_id, 'sql' => $sql ,'naziv' => $grid["caption"], 'cols' => $cols);
}
}

?>