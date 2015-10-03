<?php
include_once '../config/main.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" >
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/tabs.css" />
<script type="text/javascript">

function loadit( element)
{

	var tabs=document.getElementById('tabs').getElementsByTagName("a");
	for (var i=0; i < tabs.length; i++)
	{
		if(tabs[i].href == element.href) 
			tabs[i].className="selected";
		else
			tabs[i].className="";
	}
}

</script>
</head>
<body>
<header>
<div id="content">
<div id="tabs">
<ul>
<li><a href="kreiranje.php" class="selected" target="mainFrame"  onclick="loadit(this)" >Dodaj kolegij</a></li>
<?php
include '../model/model_kolegij.php'; include '../model/model_prikaz.php';
$inc = new Kolegij();   
$kol = $inc -> GetKolegiji($_SESSION["user_id"]);
if (is_array($kol))
{
foreach ($kol as $post)
{ 		
	$prik = new Prikaz($post->PID,$post->naziv, $_SESSION["user_id"]);
	$load = $prik->display('view.php');

	echo '<li><a href="'.$load.'" target="mainFrame"  onclick="loadit(this)" >' . $post->naziv . "</a></li>";
}
} 
	?>
</ul></div></div>
</header>
</body>
</html>
