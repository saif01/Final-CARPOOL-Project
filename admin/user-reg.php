<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['adminName'])==0)
  { 
header('location:login');
}
else{ 
include('../db/config.php');

if (isset($_POST['submit'])) {

$user_name=$_POST['user_name'];
$user_pass=$_POST['user_pass'];
$user_contract=$_POST['user_contract'];
$user_officeId=$_POST['user_officeId'];

//$compfile=$_FILES["compfile"]["name"]; 
$user_img=$_FILES["user_img"]["name"];

$user_status = 1;

move_uploaded_file($_FILES["user_img"]["tmp_name"],"p_img/userImg/".$_FILES["user_img"]["name"]);


$query=mysqli_query($con," INSERT INTO `user`(`user_name`, `user_pass`, `user_contract`, `user_img`, `user_officeId`, `user_status`) VALUES ('$user_name','$user_pass','$user_contract','$user_img','$user_officeId','$user_status')");


?>
    <script>
        alert('Update successfull.  !');
        window.open('user-all-info', '_self'); //for locating other page.
        //window.location.reload(); //For reload Same page
    </script>
    <?php } ?>

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

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabe_user.php",
                    data: 'check_value=' + $("#check_value").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status1").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>

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


  <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">User Registration</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">User Name/ ID  </label>
                                                        <div class="col-sm-9">
                                                            
                                                            <input type="text" id="check_value" onBlur="userAvailability()" name="user_name" class="form-control" placeholder="Enter User Name" required>
                                                <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="user_pass" class="form-control" placeholder="Default Password" value="12345">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Contract</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="user_contract" class="form-control" placeholder="Enter User Phone Number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Office ID </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="user_officeId" class="form-control" placeholder="Enter User Office ID" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">User Image </label>

                                                   
                                                           <input name="user_img" type="file" class="form-control file-upload-info" placeholder="Upload Image" required>
                                                           <p style="color:red;">Resolution 300*300 pixels</p>
                                                        </div>
                                                </div>
                                            </div> 
                                               

                                               
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">User Registration </button>
                                                    <button class="btn btn-light btn-block btn-rounded ">Cancel</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                        
                                        


                                            
                                               
                        

                            <!--row end-->
                        </div>
                        <!-- content-wrapper-->
                    </div>
                    <!-- content-wrapper ends -->
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