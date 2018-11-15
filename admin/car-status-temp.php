<?php
include('../db/config.php');

/*  anable or disable code for user  */

if(isset($_GET['h_car_id']))
{
$id=$_GET['h_car_id'];

$que=mysqli_query($con,"UPDATE `tbl_car` SET `temp_car`='0' WHERE `car_id` = '$id' ");

header('location:car-all.php');
}

if(isset($_GET['s_car_id']))
{
$id=$_GET['s_car_id'];

$que=mysqli_query($con,"UPDATE `tbl_car` SET `temp_car`='1' WHERE `car_id` ='$id' ");

header('location:car-all.php');
}
?>