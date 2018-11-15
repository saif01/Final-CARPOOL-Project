<?php
include('../db/config.php');

if ($_GET['driver_id']) {
	
$id=$_GET['driver_id'];
	$query=mysqli_query($con,"DELETE FROM `car_driver` WHERE `driver_id`='$id' ");

	
header('location:driver-all.php');
}

?>