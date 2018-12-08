<?php
include('lineMsg.php');

if (isset($_POST['submit'])) 

{
	$Sdate="12-12-2018";
	$eDate="12-12-2018";
	$user="saif";
	$location="Dhaka";
	$msg=$_POST['msg'];

	$message=" $Sdate To $eDate, Booked By:$user, Location: $location. $msg ";
	//$message = '12-Dec-2018 To 13-Dec-2018 <br> Car Booked By Saif Car Number: DM-TA-25-558418 ';

	lineMsg($message);
			
	}


	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Group  SMS Send</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container text-center" >
		<h1>Line Group SMS Send</h1>
		
		<form method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Message</label>
		    <input type="text" name="msg" class="form-control"   placeholder="Enter Message" required>
		    <small  class="form-text text-muted">Type Message To Send</small>
		  </div>
		  
		 
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>

</body>
</html>

