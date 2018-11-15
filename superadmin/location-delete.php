<?php
include('../db/config.php');

if ($_GET['location_id']) {
	
$id=$_GET['location_id'];
	$query=mysqli_query($con,"DELETE FROM `location` WHERE `location_id`='$id' ");

	
header('location:location-add');
}

?>