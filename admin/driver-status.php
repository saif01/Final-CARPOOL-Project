<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_user_id']))
{
$id=$_GET['h_user_id'];

$que=mysqli_query($con,"UPDATE `car_driver` SET `driver_status`='0' WHERE `driver_id`='$id' ");

header('location:driver-all');
}
// For Show
if(isset($_GET['s_user_id']))
{
$id=$_GET['s_user_id'];

$que=mysqli_query($con,"UPDATE `car_driver` SET `driver_status`='1' WHERE `driver_id`='$id' ");

header('location:driver-all');
}
?>