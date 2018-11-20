<?php
include('../db/config.php');

if ($_GET['driver_id']) {
	
$id=$_GET['driver_id'];

// For delete file
$query2=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../admin/p_img/driverimg/".$row['driver_img'];
    	unlink($file);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `car_driver` WHERE `driver_id`='$id' ");

	
header('location:driver-all.php');
}

?>