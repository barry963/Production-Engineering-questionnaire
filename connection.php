<?php
$mysql_hostname = "mysql.cc.puv.fi:3306";
$mysql_user = "e1100587";
$mysql_password = "vxnB9ws3N5M7";
$mysql_database = "e1100587_questionnaire";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>