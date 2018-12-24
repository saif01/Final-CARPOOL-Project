<?php
session_start();
 include('db/config.php');
 $_SESSION['logIn_id']=="";
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
$user_id=$_SESSION['user_id'];

mysqli_query($con, "UPDATE `loginlog` SET `logOut`='$currentTime' WHERE `user_id`= '$user_id' ORDER BY `login_id` DESC LIMIT 1");
session_unset();
?>
<script language="javascript">
document.location="index";
</script>
