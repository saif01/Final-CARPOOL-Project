<?php
session_start();
 include('../db/config.php');
 $_SESSION['adminName']=="";
date_default_timezone_set('Asia/Dhaka');
$ldate=date('Y-d-m H:i:s', time());
$adminNam=$_SESSION['adminName'];

$aa=mysqli_query($con, "UPDATE `loginlog` SET `logOut`='$ldate' WHERE `user_name`='$adminNam' ORDER BY `login_id` DESC LIMIT 1");
session_unset();
?>
<script language="javascript">
document.location="login";
</script>
