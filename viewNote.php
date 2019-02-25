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
		<link rel="stylesheet" href="viewNote.css">
		<script src="viewNote.js"></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
	<script type="text/javascript">
	$(document).ready(function(){
			function replace(){
			$( "#subject" ).replaceWith( "<h1 id='subject' class='heading'>" + sessionStorage.getItem('subject') + "</h1>" );
			$( "#message" ).replaceWith( "<p class='quote-text' id='message'>" + sessionStorage.getItem('message') + "  </p>" );
		}
		replace();
	});

	function deleteNote(){
		window.location="deleteNote.php?sub="+sessionStorage.getItem('subject');
	}
	</script>
	
	</head>
	
	
	<body>
		<?php
		  session_start();
		  require_once('connection.php');
		  $email=$_SESSION['SESS_EMAIL'];
		  $result3 = mysql_query("SELECT * FROM account where email='$email'");
		  while($row3 = mysql_fetch_array($result3))
		  { 
		  $fname=$row3[0];
		  $lname=$row3[1];
		 
		  }
		  ?>
		<div class="container" id="leftThing">
	      	<nav class="navbar navbar-inverse navbar-fixed-top">
	            <div class="container">
	                  <a class="navbar-brand" href="index.html">DayDream</a>
	            </div>
	        </nav>
	    </div>

	    <div class="container">
	    	<h1 id="subject" class="heading">
	    		<!-- subject line filled in by php -->
	    		Note Subject
	    	</h1>

	    	<p class="text" > 
      </p>
	    </div>	

			<div class="container col-md-10 col-md-offset-1">
    <blockquote class="quote-box">
      <p class="quotation-mark">
        “
      </p>

      <p id="message" class="quote-text"> 
      </p>
      
      <div class="blog-post-actions">
        <p class="blog-post-bottom pull-left">
          - <?php echo $fname . " " . $lname ?>
        </p>
        <p class="blog-post-bottom pull-right">
          <span class="badge quote-badge">896</span>  ❤
        </p>
      </div>
    </blockquote>
</div>

	    <head>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
        <div class="btn-group" role="group" aria-label="Default button group">
            
            <button type="button" class="btn btn-sm"><i class="fa fa-minus-square fa-5x" ></i></button>
            <button type="button" class="btn btn-sm"><i class="fa fa-pencil fa-5x" ></i></button>
        </div>
    </div>
    <br />
    
</div>

	    




	</body>
</html>