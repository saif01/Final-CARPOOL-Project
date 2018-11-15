<?php
include('../db/config.php');

if ($_GET['admin_id']) {
	
$id=$_GET['admin_id'];
$query=mysqli_query($con,"DELETE FROM `admin` WHERE `admin_id`='$id' ");

	
header('location:admin-all');
}

?>