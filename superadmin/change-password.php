<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['SadminName'])==0)
  { 
header('location:../admin/login');
}
else{ 
include('../db/config.php');

if(isset($_POST['submit']))
{

$SadminName=$_SESSION['SadminName'];
$password= $_POST['password'];
$newpassword= $_POST['newpassword'];


$sql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_name`='$SadminName' AND `admin_password`='$password'");
$num=mysqli_num_rows($sql);

//print_r($num);


if($num>0)
    {
        $con=mysqli_query($con,"UPDATE `admin` SET `admin_password` = '$newpassword'  WHERE  `admin_name`='$SadminName'");

        //$smsg="Password Changed Successfully !!";

        ?>
    <script>
        alert('Password Change successfull...!');
        window.open('index', '_self');
    </script>
    <?php } 

else
    {
        $errormsg="Old Password not match !!";
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
            <!-- partial:../../partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->

                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">

                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <button class="card-title btn btn-outline btn-block ">Change Registration</button>
                                        <!-- <h4 class="card-title text-center btn-rounded" style="background-color: red">  </h4> -->




                                        <form class="forms-sample" action="" method="post" name="chngpwd" onSubmit="return valid();">

                                            <?php if($smsg)
                      {?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <b>Well done!</b>
                                                <?php echo $smsg ;?>
                                            </div>
                                            <?php }?>

                                            <?php if($errormsg)
                      {?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <b>Oh snap!</b>
                                                <?php echo $errormsg;?>
                                            </div>
                                            <?php }?>


                                            <div class="form-group">
                                                <label>Current Password </label>
                                                <input type="Password" name="password" class="form-control" placeholder="Enter Current Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">New Password</label>
                                                <input type="Password" name="newpassword" class="form-control" placeholder="Enter New Password">
                                            </div>
                                            <div class="form-group">
                                                <label>User Contract</label>
                                                <input type="password" name="confirmpassword" class="form-control" placeholder=" Retype New Password" required>
                                            </div>



                                            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Hit To Change Password</button>
                                            <button class="btn btn-light btn-block btn-rounded">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--row end-->
                        </div>
                        <!-- content-wrapper-->
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <?php include('common/footer.php') ?>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>


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



        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

    </html>

    <?php } ?>