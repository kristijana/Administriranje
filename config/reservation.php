
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../calendar/calendar.css" rel="stylesheet" type="text/css" />

<?php
require_once('../calendar/tc_calendar.php');
?>
<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }
pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color: #FF0000; }
</style>

</head>

</html>

<script language="javascript">

	function myChanged(){
	var week = document.getElementById("date1").value ;
	page_load('week');
		div_hide('#reservation_table_div');

		$.get('config/reservation.php?week='+week, function(data)
		{
			$('#reservation_table_div').html(data);
			$('#week_number_span').html(week);
			div_fadein('#reservation_table_div');
			page_loaded('week');

			if(week != global_week_number)
			{
				$('#reservation_today_button').css('visibility', 'visible');
			}

			else
			{
				setTimeout(function() { $('#today_span').animate({ opacity: 0 }, 250, function() { $('#today_span').animate({ opacity: 1 }, 250);  }); }, 500);
			}
		});
	
	
	}

</script>

<?php

include_once('main.php');

if(check_login($conn) != true) { exit; }

if(isset($_GET['make_reservation']))
{
	$week = $_POST['week'];
	$day = mysqli_real_escape_string($conn, $_POST['day']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	echo make_reservation($week, $day, $time, $conn);
}
elseif(isset($_GET['delete_reservation']))
{
	$week = mysqli_real_escape_string($conn, $_POST['week']);
	$day = mysqli_real_escape_string($conn, $_POST['day']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	echo delete_reservation($week, $day, $time, $conn);
}
elseif(isset($_GET['read_reservation']))
{
	$week = mysqli_real_escape_string($conn, $_POST['week']);
	$day = mysqli_real_escape_string($conn, $_POST['day']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	echo read_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = mysqli_real_escape_string($conn, $_POST['week']);
	$day = mysqli_real_escape_string($conn, $_POST['day']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	echo read_reservation_details($week, $day, $time);
}
elseif(isset($_GET['week']))
{

	$week = $_GET['week'];

	echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

	$days_row = '<tr  ><td id="reservation_corner_td">Dvorana Vrijeme <br><input type="button" class="blue_button small_button" id="reservation_today_button" value="Danas"></td><th class="reservation_day_th">1</th><th class="reservation_day_th">2</th><th class="reservation_day_th">3</th><th class="reservation_day_th">4</th><th class="reservation_day_th">5</th><th class="reservation_day_th">6</th><th class="reservation_day_th" >7</th></tr>';

		echo $days_row;
	

	foreach($global_times as $time)
	{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;

		while($i < 7)
		{
			$i++;

			echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . read_reservation($week, $i, $time, $conn) . '</div></div></td>';
		}

		echo '</tr>';
	}

	echo '</table>';
}
else
{   
    echo '<div class="box_div" id="cp_div"><div class="box_top_div"><a href="#"><input type="button" class="small_button blue_button" value="'. $_SESSION['user_name'].'"></a></div>';
				  
	  $myCalendar = new tc_calendar("date1", true, false);
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y'), date('Y') + 10);
	  $myCalendar->dateAllow(date('Y-m-d'), '2020-12-31');
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setAlignment("right", "bottom");
	  $myCalendar->setOnChange("myChanged()");
	  $myCalendar->writeScript();
     ?>
	  <script language="javascript">
    var global_week_number ="<?php echo global_week_number;?>";
	</script> <?php
	echo '</div><div class="box_div" id="reservation_div"><div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Prethodni dan</a></div><div id="reservation_top_center_div">Rezervacije za datum  <span id="week_number_span">'.global_week_number.'</span></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Slijedni dan &gt;</a></div></div><div class="box_body_div"><div id="reservation_table_div"></div></div></div><div id="reservation_details_div">' ;
}
 
?>
