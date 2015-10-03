<html>
<head></head>
<body>
<fieldset>

<legend>Odaberite maksimalni broj izostanaka i minimalni broj rijeseneh testova za pristup kolokviju</legend>
<form id ="myform" action="<?php echo $adress;?>"  method="post" target="_self" >
<label>Min broj testova:</label>	
 <select name="ts" id="ts">
<?php $i= 0; while($i <= 15) {
   echo '<option value="'.$i.'">'.$i.'</option>';
   $i++;}?>
</select>
 </br><label>Max broj izostanaka:</label>
<select name="iz" id="iz">
<?php $i= 0; while($i <= 15) {
   echo '<option value="'.$i.'">'.$i.'</option>';
   $i++;}?>
	</select>	
 <input  type="submit" name="subm" value="Submit">
 </form>	
	</fieldset>
	<fieldset style="float:right;">
<legend>Pohrana bodova i čišćenje tablice</legend>
<form id ="myform" action="<?php echo $adress;?>"  method="post" >
<input  type="submit" name="sub" value="Isprazni tablicu" style="background-color:#CC3333;
font-size:25pt;color:white;">
 </form>	
 </fieldset>
</body>
</html>