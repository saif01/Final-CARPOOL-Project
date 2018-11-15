<?php include('../db/config.php');
require('../assets/coustom/UserInfo.php');

session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
    $adminName=$_POST['adminName'];
    $password=$_POST['password'];


$ret=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_name` = '$adminName' AND `admin_password` = '$password' ");

 $rowcount=mysqli_num_rows($ret);  

$row=mysqli_fetch_array($ret);

if($rowcount>0 )
			
			{   
	$ret= mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_name` = '$adminName' ");
    while($row=mysqli_fetch_array($ret))
                {   

                    $admin_id=$row['admin_id'];
                    $st=$row['admin_status'];
                    $st2=$row['super_admin'];

                    if ($st==1 && $st2==1) 
                    {  


                        $_SESSION['SadminName']=$_POST['adminName'];
                        $_SESSION['admin_id']=$row['admin_id'];
                        $admin_status=$row['admin_status'];
                        $ip= UserInfo::get_ip();
                        $os= UserInfo::get_os();
                        $browser= UserInfo::get_browser();
                        $device= gethostname();

                              
                                            
                        $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['adminName']."','".$_SESSION['admin_id']."','$ip','$os','$browser','$device','$admin_status')");
                                        
                         header("Location:../superadmin");
                        exit();	



				}

                if ($st==1 && $st2==0) 
                    {  


                        $_SESSION['adminName']=$_POST['adminName'];
                        $_SESSION['admin_id']=$row['admin_id'];
                        $admin_status=$row['admin_status'];
                        $ip= UserInfo::get_ip();
                        $os= UserInfo::get_os();
                        $browser= UserInfo::get_browser();
                        $device= gethostname();

                              
                                            
                        $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['adminName']."','".$_SESSION['admin_id']."','$ip','$os','$browser','$device','$admin_status')");
                                        
                         header("Location:index");
                        exit();         

                }





			elseif($st==0)
			    {
			        $_SESSION['errmsg']="Your ID Was Blocked.!!! Contract With IT Department";       
			        $_SESSION['adminName']=$_POST['adminName'];
			        $admin_status=$row['admin_status'];
			         $ip= UserInfo::get_ip();
			         $os= UserInfo::get_os();
			         $browser= UserInfo::get_browser();
			         $device= UserInfo::get_device();
			                               
			         $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['adminName']."','".$_SESSION['admin_id']."','$ip','$os','$browser','$device','$admin_status')");

			         header("location: login");
			        exit();
			       
			     }

			     else{

			     	$_SESSION['errmsg']="Username Or Password Not Match.!!!";       
			        $_SESSION['adminName']=$_POST['adminName'];
			        
			         $ip= UserInfo::get_ip();
			         $os= UserInfo::get_os();
			         $browser= UserInfo::get_browser();
			         $device= UserInfo::get_device();
			                               
			         $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`) VALUES ('".$_SESSION['adminName']."','$ip','$rowcount','$browser','$device')");

			         header("location: login");
			        exit();
			       

			     }
			}
		}

 else{

			     	$_SESSION['errmsg']="Username Or Password Not Match.!!!";       
			        $_SESSION['adminName']=$_POST['adminName'];
			        
			         $ip= UserInfo::get_ip();
			         $os= UserInfo::get_os();
			         $browser= UserInfo::get_browser();
			         $device= UserInfo::get_device();
			                               
			         $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`) VALUES ('".$_SESSION['adminName']."','$ip','$rowcount','$browser','$device')");

			         header("location: login");
			        exit();

			    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CPB.CarPool</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">


                            <form action="" method="post">
                                <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>


                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="adminName" class="form-control" placeholder="Username">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>


                            </form>
                        </div>

                        <?php include('common/footer.php') ?>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
</body>

</html>