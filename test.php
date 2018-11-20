<?php 
include('db/config.php');

if (isset($_POST['submit'])) {

$query=mysqli_query($con,"SELECT * FROM `car_booking` LEFT JOIN `user` ON car_booking.user_id = user.user_id ");


$value = $query->fetch_assoc();

print_r=($value);

	
	
}







?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<input type="file" name="file">
<input type="submit" name="submit">
</body>
</html>
