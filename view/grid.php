
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
   
    <link rel="stylesheet" type="text/css" media="screen" href="../config/css/jquery-ui.custom.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="../config/css/ui.jqgrid.css"></link>	
	
	<script src="../config/js/jquery.min.js" type="text/javascript"></script>
	<script src="../config/js/grid.locale-hr.js" type="text/javascript"></script>
	<script src="../config/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../config/js/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>

<a href = "<?php echo '../model/export.php?ime='.$prikaz['naziv'].'&sql='.$prikaz['sql']; ?>"><input type=button value ="Export xls"></a>
</br></br>
	<div style="margin:0px">
	<?php 
	echo $prikaz['out'];
	?>
	</div><fieldset>
		Grupiraj po: 
	<select id="chngroup">
		<?php foreach($prikaz['cols'] as $c) { ?>
		<option value="<?php if ($c["name"] != 'Id')echo $c["name"] ?>"><?php if ($c["title"] != 'Id')echo $c["title"] ?></option>
		<?php } ?>
		<option value="clear">Ocisti</option> 
	</select>
	<script>
		jQuery("#chngroup").change(function()
		{
			var vl = jQuery(this).val(); 
			if(vl) 
			{ 
				if(vl == "clear") 
					jQuery("#<?php echo $prikaz['grid_id'] ?>").jqGrid('groupingRemove',true); 
				else 
					jQuery("#<?php echo $prikaz['grid_id'] ?>").jqGrid('groupingGroupBy',vl); 
			} 
		});
	</script>
	<form style=float:right; id ="myform1" action="<?php echo $adress;?>"  method="post" target="_self" >
<?php if ($tab == 'ispit'){ 
 echo '</br><label>Max broj izostanaka koji omogućuju potpis:</label><select name="izostanci" id="iz">';
 $i= 0; while($i <= 15) {
   echo '<option value="'.$i.'">'.$i.'</option>';
   $i++;}
	echo'</select> <input  type="submit" name="subm" value="Submit">';	
} 
 if ($tab == 'grupe') echo '<input type="checkbox" name="brisi"> odaberite ukoliko <b>NE</b> želite sačuvati bodove za slijedeći rok<br> <input  type="submit" name="subm" value="Submit">';
?>

 </form></fieldset>
</body>
</html>