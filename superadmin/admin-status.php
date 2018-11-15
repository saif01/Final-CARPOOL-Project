<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_admin_id']))
{
$id=$_GET['h_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_status`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}
// For Show
if(isset($_GET['s_admin_id']))
{
$id=$_GET['s_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_status`='1' WHERE `admin_id`='$id'");

header('location:admin-all');
}
?>