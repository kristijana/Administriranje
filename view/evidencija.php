
<?php

   	 echo '<form id="myform" name="myform" method="post" action="'.$adr.'" target="_self">';
	 echo '<table style="width:800px;color:darkblue"frame="box"rules="rows"bgcolor="#dfeffc" align="center">
	       <tr><th> JMBAG</th><th> Prezime</th><th> Ime</th>
	        <th> Grupa</th><th> Izostanci</th><th> Testovi</th></tr><tr></tr>'; 	 

if (is_array($stud)){
	foreach ($stud as $post){
		echo "<tr><td> ".$post->JMBAG." </td><td> ".$post->Prezime." </td><td> ".$post->Ime."</td><td>   ".$post->Grupa."</td>
			  <td align='right'>    ".$post->Izostanci. "    <input type='checkbox' name='checkbox[]' value=".$post->br."  /></td>
			  <td align='right'>".$post->Testovi."<input type='checkbox' name='check[]' value=".$post->br."  /></td></tr>";
			  }
	} 
	echo '<tr><td></td><td></td><td></td><td bgcolor="darkblue"></td><td align ="left" bgcolor="darkblue"><input type="submit" name="submit" ></td></tr></table></form>';	
?>
