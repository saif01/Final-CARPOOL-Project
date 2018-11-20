<?php
include('../db/config.php');

if ($_GET['admin_id']) {
	
$id=$_GET['admin_id'];


// For delete file
$query2=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../admin/p_img/adminimg/".$row['user_img'];
    	unlink($file);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `admin` WHERE `admin_id`='$id' ");

	
header('location:admin-all');
}

?>


