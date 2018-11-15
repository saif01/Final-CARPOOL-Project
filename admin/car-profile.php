<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['adminName'])==0)
  { 
header('location:login');
}
else{ 

include('../db/config.php');

$car_id=$_GET['car_id'];


$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id' ");

$row=$query->fetch_assoc();

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
        <style type="text/css">
            .user-s {
                width: 300px;
                height: 120px;
                border-radius: 20%;
                overflow: hidden;
                position: absolute;
                top: calc(20px/2);
                left: calc(30% - 50px);
                margin-top: -90px;
            }
        </style>


    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">

                                <img class="user-s" src="p_img/carImg/<?php echo($row['car_img1']);?>" class="img-responsive" alt="Image" />
                                <table>

                                    <td>
                                        <h4>User Detail's: </h4>
                                    </td>


                                    <tr>
                                        <td> Car Name:</td>
                                        <th> <strong><?php echo $row['car_name'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Car Number:</td>
                                        <th> <strong><?php echo $row['car_namePlate'];?></strong> </th>
                                    </tr>


                                    <tr>
                                        <td> Car Type:</td>
                                        <th> <strong><?php echo $row['car_type'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Car Type:</td>
                                        <th> <strong><?php echo $row['car_type'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Car Capacity:</td>
                                        <th> <strong><?php echo $row['car_capacity'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Car Remarks:</td>
                                        <th>
                                            <?php echo $row['car_remarks'];?> </th>
                                    </tr>

                                    <tr>
                                        <td> User Status:</td>
                                        <th> <strong><?php $st =$row['show_status'];

          if ($st==1) {
            echo "Show";
          }
          else{
            echo "Not Show";
          }?>
            
          </strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Car GPS:</td>
                                        <th> <strong><?php $st =$row['car_gps'];

          if ($st==1) {
            echo "Yes";
          }
          else{
            echo "No";
          }?>
            
          </strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Aircondition:</td>
                                        <th> <strong><?php $st =$row['car_aircobdition'];

          if ($st==1) {
            echo "Yes";
          }
          else{
            echo "No";
          }?>
            
          </strong> </th>
                                    </tr>

                                    <tr>
                                        <td>Power Door Lock:</td>
                                        <th> <strong><?php $st =$row['car_power_doorLock'];

          if ($st==1) {
            echo "Yes";
          }
          else{
            echo "No";
          }?>
            
          </strong> </th>
                                    </tr>

                                    <tr>
                                        <td>CD Player:</td>
                                        <th> <strong><?php $st =$row['car_cdPlayer'];

          if ($st==1) {
            echo "Yes";
          }
          else{
            echo "No";
          }?>
            
          </strong> </th>
                                    </tr>

                                    <tr>
                                        <td>Registration:</td>
                                        <th> <strong><?php echo date("F j, Y, g:i a", strtotime($row['reg_time'])); ?>
            
          </strong> </th>
                                    </tr>


                                </table>



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

    <?php } ?>