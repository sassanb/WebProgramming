<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php
session_start();
$dbhost   = "localhost";
$dbname   = "174Final";
$dbuser   = "sb";
$dbpass   = "qwerty123";
 
// database connection
$conn = new PDO("mysql:host=localhost;dbname=174Final",$dbuser,$dbpass);
 
// new data

$email = $_SESSION['SESS_EMAIL'];
$subject = mysql_real_escape_string($_POST['subject']);
$date1 = mysql_real_escape_string($_POST['datepicker']);
$note = mysql_real_escape_string($_POST['message']);

$sql = "INSERT INTO notes (email,noteSubject,note,insertedDate) VALUES (:sas,:asas, :asafs, :asafsa)";
$q = $conn->prepare($sql);
$q->execute(array(':sas'=>$email,':asas'=>$subject,':asafs'=>$note,':asafsa'=>$date1));
session_write_close();
header("location: notes.php");

?>
</body>
</html>