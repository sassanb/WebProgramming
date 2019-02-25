
<?php
if($_GET['sub']){
	$dbhost = 'localhost';
	$dbuser = 'sb';
	$dbpass = 'qwerty123';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	$sql = "DELETE FROM notes WHERE noteSubject='".$sub."'";
	mysql_close($conn);
}
	?>