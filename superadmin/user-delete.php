<?php
include('../db/config.php');

if ($_GET['user_id']) {
	
$id=$_GET['user_id'];
	$query=mysqli_query($con,"DELETE FROM `user` WHERE `user_id`='$id' ");

	
header('location:user-all-info');
}

?>