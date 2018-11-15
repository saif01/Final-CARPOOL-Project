<?php
include('../db/config.php');

if ($_GET['car_id']) {
	
$id=$_GET['car_id'];
	$query=mysqli_query($con,"DELETE FROM `tbl_car` WHERE `car_id`='$id' ");

	
header('location:car-all.php');
}

?>