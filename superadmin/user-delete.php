<?php
include('../db/config.php');

if ($_GET['user_id']) {
	
$id=$_GET['user_id'];


// For delete file
$query2=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../admin/p_img/userImg/".$row['user_img'];
    	unlink($file);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `user` WHERE `user_id`='$id' ");

	
header('location:user-all-info');
}

?>