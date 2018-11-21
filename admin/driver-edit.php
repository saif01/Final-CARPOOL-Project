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

$driver_id=$_GET['driver_id'];
$fileName=$_FILES['driver_img']['tmp_name'];

        if ($fileName !=="") 
        {
             $user_id=$_GET['user_id'];
             $sql=mysqli_query($con,"SELECT `driver_img` FROM `car_driver` WHERE `driver_id`='$driver_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="p_img/driverimg/".$row2['driver_img'];
                        unlink($file);
                    }
              
            
            $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['driver_img']['name']);
                $storeFile="p_img/driverimg/".$file_name;
                $fileName=$_FILES['driver_img']['tmp_name'];

                move_uploaded_file($fileName,$storeFile);

                           
                $query2=mysqli_query($con,"UPDATE `car_driver` SET `driver_name`='$driver_name',`driver_phone`='$driver_phone', `driver_img`='$file_name',`driver_license`='$driver_license',`driver_nid`='$driver_nid',`driver_status`='$driver_st' WHERE `driver_id` ='$driver_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('driver-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
       

        } 
            else{

                
               $query=mysqli_query($con,"UPDATE `car_driver` SET `driver_name`='$driver_name',`driver_phone`='$driver_phone',`driver_license`='$driver_license',`driver_nid`='$driver_nid',`driver_status`='$driver_st' WHERE `driver_id` ='$driver_id'");

            ?>
            <script>
                alert('Update successfull.  !');
                window.open('driver-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
            }

 

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
                                        <button class="card-title btn btn-outline btn-block ">Driver Update Form</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

<?php 
                                            $driver_id=$_GET['driver_id'];

$query=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");

$row=$query->fetch_assoc();

?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Driver Name </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" id="check_value" onBlur="userAvailability()" name="driver_name" class="form-control" value="<?php echo htmlentities($row['driver_name']); ?>" required>

                                                            <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver License</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_license" class="form-control" placeholder="Enter Driver License" value="<?php echo htmlentities($row['driver_license']); ?>" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver Contract</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_phone" class="form-control" placeholder="Enter Driver Phone Number" value="<?php echo htmlentities($row['driver_phone']); ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver NID</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_nid" class="form-control" placeholder="Enter Driver NID" value="<?php echo htmlentities($row['driver_nid']); ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                     <div class="col-md-6 ">
                                        <table class="table">
                                            <thead>

                                                <tr>
                                                    <th >Old Img </th>
                                                      <th >New Img </th>
                                                      <th >Select Img </th>
                                                
                                                </tr>
                                                
                                            </thead>
                                            
                                            <tbody>

                                                <td><img src="p_img/driverimg/<?php echo($row['driver_img']);?>" class="img-responsive" alt="Image" height="100" width="100" >   </td>

                                                <td> <img id="preview" alt="Not Selected" width="100" height="100" /> </td>

                                                <td>  <input type="file" style="float: right;" name="driver_img" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">  </td>
                                                
                                                

                                            </tbody>

                                        </table>                                               
                                                                                                                                                                                                                
                                     </div>
                                            <div class="col-md-6 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Driver Info Update </button>
                                                    <button class="btn btn-light btn-block btn-rounded ">Reset</button>

                                                   <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
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