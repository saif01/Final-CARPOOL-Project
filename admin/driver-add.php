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

$driver_name=$_POST['driver_name'];
$for_car=$_POST['for_car'];
$driver_phone=$_POST['driver_phone'];
$driver_nid=$_POST['driver_nid'];

$driver_license=$_POST['driver_license'];

$driver_st=1;


//$compfile=$_FILES["compfile"]["name"]; 
$driver_img=$_FILES["driver_img"]["name"];


move_uploaded_file($_FILES["driver_img"]["tmp_name"],"p_img/driverimg/".$_FILES["driver_img"]["name"]);

 $query=mysqli_query($con,"INSERT INTO `car_driver`(`car_id`, `driver_name`, `driver_phone`, `driver_img`, `driver_license`, `driver_nid`, `driver_status`) VALUES ('$for_car','$driver_name','$driver_phone','$driver_img','$driver_license','$driver_nid','$driver_st')");


?>
    <script>
        alert('Update successfull.  !');
        window.open('driver-all', '_self');
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
                    url: "check_availability.php",
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
                                        <button class="card-title btn btn-outline btn-block ">Driver Add Form</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Driver Name </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" id="check_value" onBlur="userAvailability()" name="driver_name" class="form-control" required>

                                                            <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">For Car</label>
                                                        <div class="col-sm-9">
                                                            <select name="for_car" class="form-control" required>
  <option value="">Select Car For Driver </option>
<?php
  $query2=mysqli_query($con,"SELECT tbl_car.car_id,tbl_car.car_name,tbl_car.car_namePlate  FROM tbl_car LEFT JOIN car_driver ON ( tbl_car.car_id = car_driver.car_id) WHERE car_driver.car_id IS NULL");

      while ($row2 = mysqli_fetch_array($query2))
      {
echo "<option value='". $row2['car_id'] ."'>" .$row2['car_name'] ." -- ". $row2['car_namePlate']. "</option>" ;
}
?>

</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver Contract</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_phone" class="form-control" placeholder="Enter Driver Phone Number" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver NID</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_nid" class="form-control" placeholder="Enter Driver NID" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver License</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_license" class="form-control" placeholder="Enter Driver License" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver Image</label>
                                                        <div class="col-sm-9">

                                                            <input name="driver_img" type="file" class="form-control" required />
                                                            <p style="color:red;">Resolution 300*300 pixels</p>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Driver Registration</button>
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