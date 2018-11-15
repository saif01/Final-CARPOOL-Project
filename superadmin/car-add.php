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

$car_name=$_POST['car_name'];
$car_namePlate=$_POST['car_namePlate'];
$car_type=$_POST['car_type'];
$car_capacity=$_POST['car_capacity'];
$car_gearbox=$_POST['car_gearbox'];
$car_door=$_POST['car_door'];
$car_gps=$_POST['car_gps'];
$temp_car=$_POST['temp_car'];

$car_aircondition=$_POST['car_aircondition'];
$car_power_doorLock=$_POST['car_power_doorLock'];
$car_cd_player=$_POST['car_cd_player'];

$remarks=$_POST['remarks'];
//$compfile=$_FILES["compfile"]["name"]; 
$imgA=$_FILES["imgA"]["name"];
$imgB=$_FILES["imgB"]["name"];
$imgC=$_FILES["imgC"]["name"];

move_uploaded_file($_FILES["imgA"]["tmp_name"],"p_img/carImg/".$_FILES["imgA"]["name"]);
move_uploaded_file($_FILES["imgB"]["tmp_name"],"p_img/carImg/".$_FILES["imgB"]["name"]);
move_uploaded_file($_FILES["imgC"]["tmp_name"],"p_img/carImg/".$_FILES["imgC"]["name"]);


$query=mysqli_query($con,"INSERT INTO `tbl_car`(`car_name`, `car_namePlate`, `temp_car`, `car_type`, `car_capacity`, `car_img1`, `car_img2`, `car_img3`, `car_door`, `car_gearbox`, `car_gps`, `car_aircobdition`, `car_power_doorLock`, `car_cdPlayer`, `car_remarks`) VALUES ('$car_name','$car_namePlate','$temp_car','$car_type','$car_capacity','$imgA','$imgB','$imgC','$car_door','$car_gearbox','$car_gps','$car_aircondition','$car_power_doorLock','$car_cd_player','$remarks')");


?>
    <script>
        alert('Update successfull.  !');
        window.open('car-all.php', '_self');
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
                    url: "check_car_number.php",
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
                                        <button class="card-title btn btn-outline btn-block ">Car Add Form .....</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Car Name :</label>
                                                        <div class="col-sm-9">

                                                            <input type="text" name="car_name" class="form-control" id="typeahead" data-provide="typeahead" data-items="4" data-source='["BMW","Toyota","Suzuki","Mitsubishi","Nissan","Toyota Allion","Toyota Probox","Toyota Noah","Toyota Axio","Toyota Belta","Honda Airwave","Toyota Corolla","Toyota HiAce"]' required>
                                                            <p style="color: green;" class="help-block">Start typing to activate auto complete!</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Number :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="car_namePlate" class="form-control" id="check_value" onBlur="userAvailability()" required />

                                                            <span id="user-availability-status1" style="font-size:12px;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Type :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_type" required>
                    <option value=""> Select Value</option>
                  <option value="CNG">CNG</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="CNG/Petrol">Both</option>
                  </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Capacity :</label>
                                                        <div class="col-sm-9">
                                                            <input type="Number" name="car_capacity" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car GearBox :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_gearbox" required>
                              <option value=""> Select Value</option>
                              <option value="Automatic">Automatic</option>
                              <option value="Manual">Manual</option>
                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Door :</label>
                                                        <div class="col-sm-9">

                                                            <input type="Number" name="car_door" class="form-control" required />

                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <p class="card-description">
                                                Radio Input .....
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Aircondition :</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_aircondition" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_aircondition" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Power Door Lock :</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_power_doorLock" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_power_doorLock" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">CD Player :</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_cd_player" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_cd_player" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car GPS :</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_gps" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_gps" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="card-description">
                                                Car Image
                                            </p>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">First Image :</label>
                                                        <div class="col-sm-9">
                                                            <input name="imgA" type="file" class="form-control" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Second Image :</label>
                                                        <div class="col-sm-9">
                                                            <input name="imgB" type="file" class="form-control" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Third Image :</label>

                                                        <div class="col-sm-9">
                                                            <input name="imgC" type="file" class="form-control" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                           <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Status :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="temp_car" required>
                              <option value=""> Select Value</option>
                              <option value="0">Normal Car</option>
                              <option value="1">Temporary Car</option>
                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Remarks :</label>
                                                        <div class="col-sm-9">

                                                            <input type="text" name="remarks" class="form-control" />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Car Registration</button>
                                                    <button class="btn btn-light btn-block btn-rounded">Cancel</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
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