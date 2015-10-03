<?php include_once('config/main.php'); include_once('controller/kreiranje.php');?>

<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8">

<noscript><meta http-equiv="refresh" content="0; url=error.php?error_code=2"></noscript>

<script src="config/js/jquery.js" type="text/javascript"></script>

<script src="config/js/jquery-cookies.js" type="text/javascript"></script>
<script src="config/js/jquery-base64.js" type="text/javascript"></script>

<?php include('config/js/header-js.php'); ?>
<script src="config/js/main.js" type="text/javascript"></script>

<link href="config/css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="config/img/favicon.ico">

<title><?php echo global_title . ' - ' . global_organization; ?></title>

</head>

<body>



<div id="notification_div"><div id="notification_inner_div"><div id="notification_inner_cell_div"></div></div></div>

<div id="header_div"><?php include('config/header.php'); ?></div>

<!-- <h1><?php echo global_title; ?></h1>
<h2><?php echo global_organization; ?></h2> -->
<?php

if(filter_has_var(INPUT_POST, "naziv") and filter_has_var(INPUT_POST, "kreiraj") and($_POST["naziv"] !=''))
{

$inc = new ControllerKreiranje();   
$kol = $inc -> kreiranje($_POST["naziv"],$_SESSION["user_id"]);
}
if(filter_has_var(INPUT_POST, "ime") and filter_has_var(INPUT_POST, "id") and($_POST["id"] !='')){
$brisi = new ControllerKreiranje(); 
$kol = $brisi -> brisanje($_POST["ime"],$_POST["id"]);
}	
?>
<div id="content_div"></div>

<div id="preload_div">
<img src="config/img/loading.gif" alt="Loading">
</div>

</body>

</html>
