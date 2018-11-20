<?php
include('../db/config.php');

if ($_GET['car_id']) {
	
$id=$_GET['car_id'];

// For delete file
$query2=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file1="p_img/carImg/".$row['car_img1'];
    	unlink($file1);
    	$file2="p_img/carImg/".$row['car_img2'];
    	unlink($file2);
    	$file3="p_img/carImg/".$row['car_img3'];
    	unlink($file3);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `tbl_car` WHERE `car_id`='$id' ");

	
header('location:car-all.php');
}

?>