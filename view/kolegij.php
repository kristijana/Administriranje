<?php include_once '../config/main.php'; $dvorane='dvorane.php?id='.$_SESSION['user_id'].'&ime='.$_GET['ime'];?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../config/css/style.css" />
<script type="text/javascript" src="../config/js/jquery.js"></script>
<script type="text/javascript" src="../config/js/main.js"></></script>

</head>
<body>

<div id="container"> 
<ul class="tabNav">
 <li class="current"><a href="#">Unos studenata</a></li>
 <li><a href="#"> Evidencija </a></li>
 <li><a href="#">Prijava kolokvija</a></li>
 <li><a href="#">Prijava ispita</a></li>
 <li><a href="#">Grupiranje</a></li>

 <form action="../." id="brisanje" target = "_top" method ="post"> 
 <input type="hidden" name="ime" value="<?php echo $_GET['ime']; ?>">
 <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
 <input type="button"  onclick="brisanje()"class="small_button red_button" value="Obriši kolegij" style="margin-left: 2cm;">
</form>
 </ul>
<div class="tabContainer">
 <div class="tab current">
 <iframe src="<?php echo $studenti; ?>"width="910" height="800" name = "studenti" scrolling="no"frameborder="0">
  <p>Your browser does not support iframes.</p>
</iframe>
 </div>
 <div class="tab">
<iframe src="<?php echo $evidencija; ?>"width="900" height="1500" frameborder="0"scrolling="no"></iframe> 
 </div>
 <div class="tab">
  <iframe src="<?php echo $kolokvij; ?>"width="910" height="800" frameborder="0"scrolling="no"></iframe>
 </div>
 <div class="tab">
  <iframe src="<?php echo $ispit; ?>"width="920" height="1000" frameborder="0"scrolling="no"></iframe>
 </div>
 <div class="tab">
  <iframe src="<?php echo $grupe; ?>"width="915" height="1700" frameborder="0"style="float:center"scrolling="no"></iframe>
 </div>

</div> </div> 

</body>
</html>
