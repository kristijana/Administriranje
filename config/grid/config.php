<?php

include '../config/config.php';
// PHP Grid database connection settings
define("PHPGRID_DBTYPE","Mysqli"); // or mysqli
define("PHPGRID_DBHOST",global_mysql_server);
define("PHPGRID_DBUSER",global_mysql_user);
define("PHPGRID_DBPASS",global_mysql_password);
define("PHPGRID_DBNAME",global_mysql_database);


$base_path = strstr(realpath("."),"demos",true)."lib/";
include($base_path."inc/jqgrid_dist.php");
$g = new jqgrid($db_conf);
mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysql_select_db(PHPGRID_DBNAME);

// include and create object

