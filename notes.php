<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <!-- Latest compiled and minified CSS -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){ 
    $('#characterLeft').text('500 characters left');
    $('#message').keydown(function () {
        var max = 500;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});


		function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#dcfac9';
    }
    else
    {
      tableRow.style.backgroundColor = 'white';
    }
  }

  function DoNav(theUrl, subject, message, date)
  {
  	window.location.href=theUrl;
  	sessionStorage.setItem('subject', subject);
  	sessionStorage.setItem('message', message);
  	sessionStorage.setItem('date', date);
  }


		</script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
		<link href="notes.css" rel="stylesheet"></link>
	</head>
	<body>
	
		<div class="container" id="leftThing">
	      	<nav class="navbar navbar-inverse navbar-fixed-top">
	            <div class="container">
	                  <a class="navbar-brand" href="index.html">DayDream</a>
	            </div>
	        </nav>
	    </div>
		
<div class="container col-md-10 col-md-offset-4">
<div class="col-md-5">
    <div class="form-area">  
        <form method="post" action="saveNote.php" role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Thought</h3>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
					<div>
						<input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="dates" required>
					</div>
                    <div>
                    	<textarea class="form-control" class="form-control" name="message" type="textarea" id="message" placeholder="Message" maxlength="500" rows="7"></textarea>
                    	<!-- <input style="height: 150px;" class="form-control" type="text" id="message" name="message" placeholder="Message">   -->
                    </div>
            
        <input type="submit" value="Save" class="btn btn-info btn-block">
        </form>
    </div>
</div>
</div>

		<div class="container col-md-12">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Previous Notes</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">

					<?php
					//session_start();
						// require_once('connection.php');

						// $query = "SELECT * FROM notes"; 
						// $result = mysql_query($query);

						// echo "<table>"; // start a table tag in the HTML

						// while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
						// echo "<tr><td>" . $row['noteSubject'] . "</td><td>" . $row['insertedDate'] . "</td></tr>";  //$row['index'] the index here is a field name
						// }

						// echo "</table>"; //Close the table in HTML

						// $result = mysql_query('SHOW TABLES',$connection) or die('cannot show tables');
						// $connection = mysql_connect('localhost','sb','qwerty123');
						// mysql_select_db('174Final',$connection);

						// $result = mysql_query('SELECT * FROM notes',$connection) or die('cannot show tables');

						// while($tableName = mysql_fetch_row($result)) {

						// 	$table = $tableName[0];
							
						// 	echo '<h3>',$table,'</h3>';
						// 	$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
						// 	if(mysql_num_rows($result2)) {
						// 		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
						// 		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
						// 		while($row2 = mysql_fetch_row($result2)) {
						// 			echo '<tr>';
						// 			foreach($row2 as $key=>$value) {
						// 				echo '<td>',$value,'</td>';
						// 			}
						// 			echo '</tr>';
						// 		}
						// 		echo '</table><br />';
						// 	}
						// }
						


						

							 # Init the MySQL Connection
						
							  if( !( $db = mysql_connect( 'localhost' , 'sb' , 'qwerty123' ) ) )
							    die( 'Failed to connect to MySQL Database Server - #'.mysql_errno().': '.mysql_error());
							  if( !mysql_select_db( '174Final' ) )
							    die( 'Connected to Server, but Failed to Connect to Database - #'.mysql_errno().': '.mysql_error());

							 # Prepare the INSERT Query
							 //  $insertTPL = 'INSERT INTO `name` VALUES( "%s" , "%s" , "%s" , "%s" )';
							 //  $insertSQL = sprintf( $insertTPL ,
							 //                 mysql_real_escape_string( $name ) ,
							 //                 mysql_real_escape_string( $add1 ) ,
							 //                 mysql_real_escape_string( $add2 ) ,
							 //                 mysql_real_escape_string( $mail ) );
							 // # Execute the INSERT Query
							 //  if( !( $insertRes = mysql_query( $insertSQL ) ) ){
							 //    echo '<p>Insert of Row into Database Failed - #'.mysql_errno().': '.mysql_error().'</p>';
							 //  }else{
							 //    echo '<p>Person\'s Information Inserted</p>'
							 //  }

							 # Prepare the SELECT Query
							
							  // require_once('connection.php');
							   $email=$_SESSION['SESS_EMAIL'];
							  //$result3 = mysql_query("SELECT * FROM account where email='$email'");
							  //$selectSQL = 'SELECT * FROM `notes` where email='$email;
							 # Execute the SELECT Query
							  if( !( $selectRes = mysql_query( "SELECT * FROM notes WHERE email='$email'" ) ) ){
							    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
							  }else{
							    ?>
							<table class="table table-striped table-bordered" border="2">
							  <thead>
							    <tr>
							      <th>Subject</th>
							      <th>Date</th>
							      <!-- <th>Address Line 2</th>
							      <th>Email Id</th> -->
							    </tr>
							  </thead>
							  <tbody>
							    <?php
							      if( mysql_num_rows( $selectRes )==0 ){
							        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
							      }else{
							        while( $row = mysql_fetch_assoc( $selectRes ) ){
							          echo "<tr onmouseover='ChangeColor(this, true);' onmouseout='ChangeColor(this, false);' onclick=\"DoNav('viewNote.php', '{$row['noteSubject']}', '{$row['note']}', '{$row['insertedDate']}');\"><td >{$row['noteSubject']}</td><td>{$row['insertedDate']}</td></tr>\n";
							        }
							      }
							    ?>
							  </tbody>
							</table>
							    <?php
							  }

							?>

						

						
						  
					
					<!-- <table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Date</th>
								<th>Notes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 4.0</td>
								
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.0</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>	
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
							</tr>
							</tbody>
						</table> -->
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>

		   
	</body>
</html>