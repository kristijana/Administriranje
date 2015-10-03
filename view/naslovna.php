<?php
include_once('../config/main.php');
if(check_login($conn) != true) { exit; }

?>

<html>
<head>
</head>
<body>
</br></br>
<div class="box_div" id="reservation_div"><div class="box_top_div">Korisnik <?php echo $_SESSION['user_name'] ." ".$_SESSION['user_id']; ?></div><div class="box_body_div">
 <iframe src="view/tab.php"width="950" height="1300"border="white" scrolling="no">
  <p>Your browser does not support iframes.</p>
</iframe>
</div>
</body>
</html>
