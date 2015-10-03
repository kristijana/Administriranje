

<html>

<head>	
</head>
<body>
<fieldset>

<legend>Odaberite XML datoteku</legend>
<form  action="<?php echo $adress;?>"  method="post" target = "_self"
 enctype="multipart/form-data" >
 <label for="file">Filename:</label>
 <input type="file" name="file" id="file"><br>
 <label>Odaberite studijsku grupu (opcionalno) </label>	
 <select id="gr" name="gr">
 <option value="sve">Sve grupe</option>';
<option value="Informatika">Informatika</option>';
<option value="Matematika i informatika">Matematika i informatika</option>';
<option value="Fizika i informatika">Fizika i informatika</option>';
<option value="Tehnika i informatika">Tehnika i informatika</option>

</select>
 <input  type="submit" name="submit" value="Submit">
 </form>	
 </fieldset>
</form>

</body>

</html>
