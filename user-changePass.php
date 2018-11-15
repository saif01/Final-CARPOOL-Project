<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  ?>
<?php 
include('db/config.php');

date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );

if(isset($_POST['submit']))
{

$userName=$_SESSION['username'];
$password= $_POST['password'];
$newpassword= $_POST['newpassword'];

$sql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_name`='$userName'  AND `user_pass`='$password' ");
$num=mysqli_fetch_array($sql);

//print_r($num);


if($num>0)
    {
        $con=mysqli_query($con,"UPDATE `user` SET `user_pass`='$newpassword'  WHERE `user_name`='$userName' ");
        $successmsg="Password Changed Successfully !!";
    }
else
    {
        $errormsg="Old Password not match !!";
    }

}




?>

<?php include('include/header.php');
include('include/social_link_top.php');
    include('include/manu.php');?>
    
<script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
   
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Change Your Password</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

     <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Change Password</h3>

                <?php if($successmsg)
                      {?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Well done!</b>
                                    <?php echo htmlentities($successmsg);?>
                                </div>
                                <?php }?>

                                <?php if($errormsg)
                      {?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Oh snap!</b> </b>
                                    <?php echo htmlentities($errormsg);?>
                                </div>
                                <?php }?>


                            <form action="" method="post" name="chngpwd" onSubmit="return valid();"  >
                                
                                <div class="password">
                                    <input type="Password" name="password" placeholder="Enter Current Password">
                                </div>
                                <div class="password">
                                    <input type="Password" name="newpassword" placeholder="Enter New Password">
                                </div>
                                <div class="password">
                                    <input type="password" name="confirmpassword" placeholder=" Retype New Password">
                                </div>
                                <div class="log-btn">
                                    <button type="submit" name="submit" ><i class="fa fa-check-square"></i> Change Password</button>
                                </div>
                            </form>
                        </div>
                        
                       
                       
                        <!-- <div class="login-menu">
                            <a href="about.html">About</a>
                            <span>|</span>
                            <a href="contact.html">Contact</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->
 
    




 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?>
 <!--== Footer and Common js File end ==-->

 <?php } ?>