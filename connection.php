<?php
$mysql_hostname = "localhost";
$mysql_user = "sb";
$mysql_password = "qwerty123";
$mysql_database = "174Final";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>