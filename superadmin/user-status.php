<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_user_id']))
{
$id=$_GET['h_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_status`= '0' WHERE `user_id`='$id' ");

header('location:user-all-info');
}
// For Show
if(isset($_GET['s_user_id']))
{
$id=$_GET['s_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_status`= '1' WHERE `user_id`='$id' ");

header('location:user-all-info');
}
?>