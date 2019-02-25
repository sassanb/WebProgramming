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
?>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
  echo '<ul style="padding:0; color:red;">';
  foreach($_SESSION['ERRMSG_ARR'] as $msg) {
    echo '<li>',$msg,'</li>'; 
  }
  echo '</ul>';
  unset($_SESSION['ERRMSG_ARR']);
}

$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost   = "localhost";
$dbname   = "account";
$dbuser   = "sb";
$dbpass   = "qwerty123";
 
// database connection
$conn = new PDO("mysql:host=localhost;dbname=174Final",$dbuser,$dbpass);
 
// new data
 
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
 
if($fname == '') {
  $errmsg_arr[] = 'You must enter your First Name';
  $errflag = true;
}
if($lname == '') {
  $errmsg_arr[] = 'You must enter your Last Name';
  $errflag = true;
}
if($email == '') {
  $errmsg_arr[] = 'You must enter your email';
  $errflag = true;
}
if($password == '') {
  $errmsg_arr[] = 'You must enter your password';
  $errflag = true;
}
if($errflag) {
  $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
  session_write_close();
  header("location: signup.html");
  exit();
}
// query
$sql = "INSERT INTO account (firstName,lastName,email, password) VALUES (:sas,:asas,:asafs, :asafsa)";
$q = $conn->prepare($sql);
$q->execute(array(':sas'=>$fname,':asas'=>$lname,':asafs'=>$email,':asafsa'=>$password));
header("location: login.html");

  // $Email = filter_input(INPUT_POST, "email");
  // $Password = filter_input(INPUT_POST, "password");
  // $FirstName = filter_input(INPUT_POST, "first_name");
  // $LastName = filter_input(INPUT_POST, "last_name");

  //     try {
  //               // Connect to the database.
  //               $con = new PDO("mysql:host=localhost;dbname=174Final","sb", "qwerty123");
  //               $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //       $data = [ 'firstName'=>$FirstName,
  //         'lastName'=>$LastName,'email'=>$Email, 'password'=>$Password];           
        
  //       $delimiter = "";

  //   $fields = '(';
  //   $values = 'VALUES (';
  //   foreach($data as $col=>$value) {
  //     $fields .= $delimiter . '`'.$col . '` ';
  //     $values .= $delimiter . '? ';

  //     $delimiter = ', '; 
  //   }
  //   $fields .= ') ';
  //   $values .= ') ';

  //   $sql = 'INSERT INTO account' . $fields . $values;
  //   if ($stmt = $con->prepare($sql)) {

  //     try {
  //       $i = 1;  // echo "\n".$sql."\n";
  //       foreach($data as $col => &$value) {
  //         $stmt->bindParam($i, $value);
  //         $i++;
  //       }

  //       $stmt->execute();
        
  //     } catch (Exception $e) {
  //       $this->err = $e->getMessage();
  //       return false;
  //     }
      

  //     header("Location: login.html");
  //     $link = "login.html";
  //     print " <body>
            
  //         </body>";
  //   } else {
  //     return false;
  //   }         
  //     }
      
  //           catch(PDOException $ex) {
  //               echo 'ERROR: '.$ex->getMessage();
  //           }
?>
</body>
</html>