<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['SadminName'])==0)
  { 
header('location:../admin/login');
}
else{ 
include('../db/config.php');

if (isset($_POST['submit'])) {

$admin_name=$_POST['admin_name'];
$admin_pass=$_POST['admin_pass'];
$admin_contract=$_POST['admin_contract'];
$admin_officeId=$_POST['admin_officeId'];
$super_admin=$_POST['super_admin'];

//$compfile=$_FILES["compfile"]["name"]; 
$admin_img=$_FILES["admin_img"]["name"];

$admin_status = 1;

move_uploaded_file($_FILES["admin_img"]["tmp_name"],"../admin/p_img/adminimg/".$_FILES["admin_img"]["name"]);


$query=mysqli_query($con,"INSERT INTO `admin`(`admin_name`, `admin_password`, `admin_img`, `admin_phone`, `admin_officeID`, `admin_status`, `super_admin`) VALUES ('$admin_name','$admin_pass','$admin_img','$admin_contract','$admin_officeId','$admin_status','$super_admin')");


?>
    <script>
        alert('Update successfull.  !');
        window.open('admin-all.php', '_self'); //for locating other page.
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
                    url: "check_availabe_admin.php",
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
                        <div class="row">

 <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Admin Registration</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                            <label class="col-sm-3 col-form-label">Admin Name Or ID </label>
                                                        <div class="col-sm-9">

                                             <input type="text" name="admin_name" id="check_value" onBlur="userAvailability()" class="form-control" placeholder="Enter User Name" required>
                                                <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="admin_pass" class="form-control" placeholder="Default Password" value="12345">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Contract</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="admin_contract" class="form-control" placeholder="Enter Admin Phone Number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Office ID </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="admin_officeId" class="form-control" placeholder="Enter Admin Office ID" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Image</label>
                                                        <div class="col-sm-9">
                                                             <input name="admin_img" type="file" class="form-control"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Define </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="super_admin" required>

                                                                <option value="0" >Admin</option>
                                                                <option value="1">Super Admin</option>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                               

                                               
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Admin Registration</button>
                                                    <button class="btn btn-light btn-block btn-rounded ">Cancel</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
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