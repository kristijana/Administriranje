



	<div style="margin:10px">
     <?php echo $prik['out'] ?>
	
	Grupiraj po: 
	<select id="chngroup">
		<?php foreach($prik['cols'] as $c) { ?>
		<option value="<?php echo $c["name"] ?>"><?php echo $c["title"] ?></option>
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
					jQuery("#<?php echo $prik['grid_id'] ?>").jqGrid('groupingRemove',true); 
				else 
					jQuery("#<?php echo $prik['grid_id'] ?>").jqGrid('groupingGroupBy',vl); 
			} 
		});
	</script>
	<a href = "<?php echo '../model/export.php?ime='.$prik['naziv'].'&sql='.$prikaz['sql']; ?>"><input type=button value ="Export xls"></a>
	</div>
