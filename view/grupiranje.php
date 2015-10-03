

<fieldset>

<label>Grupiraj tablicu po: </label>	
 <select id="chngroup">
<option value="Prezime">Prezime</option>';
<option value="Grupa">Grupa</option>';
<option value="Izostanci">Izostanci</option>';
<option value="Pravo">Potpis</option>';
<option value="clear">Clear</option> 
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
					jQuery("#<?php echo $prikaz['grid_id']  ?>").jqGrid('groupingGroupBy',vl); 
			} 
		});
	</script>

<form style=float:right; id ="myform1" action="<?php echo $adress;?>"  method="post" target="_self" >
<?php if ($tab == 'ispit'){ 
 echo '</br><label>Max broj izostanaka koji omogućuju potpis:</label>
<select name="izostanci" id="iz">';
 $i= 0; while($i <= 15) {
   echo '<option value="'.$i.'">'.$i.'</option>';
   $i++;}
	echo'</select>';	
} 
 if ($tab == 'grupe') echo '  <input type="checkbox" name="brisi"> odaberite ukoliko <b>NE</b> želite sačuvati bodove za slijedeći rok<br>';
?>
 <input  type="submit" name="subm" value="Submit">
 </form>	
	</fieldset>