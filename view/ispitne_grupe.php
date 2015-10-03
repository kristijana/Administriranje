<html>
<head>
</head>
<body>
<fieldset  color:#CC3333;background-color:#EEEEEE;">
<legend >Grupirenje za pismeni ispit____________________________________________________________Grupirenje za usmeni ispit</legend>
<form style="float:left;"id ="myform" action="<?php echo $adress ?>" method="post" target= "_self">
<table><tr><td>
 <label>Broj studenata po grupi:</label></td><td>
 <input type="text" name="bs" size="10" id="iz"></td></tr><tr><td>
  <label>Min broj bodova (kolokvij) :</label></td><td>
 <input type="text" name="bod" size="10" id="iz"></td></tr><tr><td>
 <label>Broj potrebnih dvorana:</label></td><td>
 <input type="text" name="dvor" size="10" id="iz"></td></tr><tr><td>
 <label>Trajanje ispita u min:</label></td><td>
 <input type="text" name="min" size="10" id="iz"></td></tr><tr><td>
 <label>Vrijeme pocetka ispita (npr 8:45 )</label></td><td>
 <input type="text" name="vrij" size="10" id="iz"></td></tr><tr><td>
 <input  type="submit" name="pismeni" value="Submit" ></td></tr>
 </table>
 </form>
<form style="float:right; id ="myform" action="<?php echo $adress ?>" method="post" target= "_self" >
<table><tr><td>
  <label>Broj studenata po grupi:</label></td><td>
 <input type="text" name="bs" size="10" id="iz"></td></tr><tr><td>
 <label>Min broj bodova za pristup :</label></td><td>
 <input type="text" name="bod" size="10" id="iz"></td></tr><tr><td>
 <label>Broj dvorane (jedne):</label></td><td>
 <input type="text" name="dvor" size="10" id="iz"></td></tr><tr><td>
 <label>Trajanje ispita u min:</label></td><td>
 <input type="text" name="min" size="10" id="iz"></td></tr><tr><td>
 <label>Vrijeme pocetka ispita (npr 8:45 )</label></td><td>
 <input type="text" name="vrij" size="10" id="iz"></td></tr><tr><td>
 <input  type="submit" name="usmeni" value="Submit" ></td></tr>
 </table>
 </form>	
 </fieldset>
</body>
</html>