<?php
include 'model/model_kolegij.php'; include 'model/tablice.php';
class ControllerKreiranje
{
    public static function kreiranje($naz,$id)
	{
		$kolegij = new Kolegij();
		if($kolegij->getId($id, $naz) !=false) echo '<script type="text/javascript"> alert("Vec ste kreirali kolegij takvog naziva") </script>' ;
		else
		{
			$kolegij->insert ($id, $naz);
            $i= $kolegij->getId($id, $naz);
	        $table = New Tablice($naz, $i);	
            $table->kreiraj();
		}
	}

	public static function brisanje($naz,$id)
	{
		$kolegij = new Kolegij();
        $kolegij->delete($id);
	    $table = New Tablice($naz, $id);
		$table->brisi();
	}

}

?>