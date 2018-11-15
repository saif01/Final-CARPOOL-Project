<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['SadminName'])==0)
  { 
header('location:../admin/login');
}
else{ 

include('../db/config.php');

//car used chart Mysql
//$query2="SELECT `car_name`,`car_number`, COUNT(*) as number FROM `car_booking` GROUP BY `car_id`";


        


$sql=mysqli_query($con,"SELECT * FROM `user`");
$users=mysqli_num_rows($sql);

$sql2=mysqli_query($con,"SELECT * FROM `car_driver`");
$drivers=mysqli_num_rows($sql2);

$sql3=mysqli_query($con,"SELECT * FROM `tbl_car`");
$cars=mysqli_num_rows($sql3);

$sql4=mysqli_query($con,"SELECT * FROM `car_booking`");
$booking=mysqli_num_rows($sql4);

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
            <!-- partial:partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="report-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">Total Booking</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $booking; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="car-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-car text-warning icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">Total Cars</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $cars; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="driver-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-radioactive text-success icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">All Drivers</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $drivers; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="user-all-info">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">All Users</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $users; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Car chart</h4>
                                        <div id="Calendar_c" style="height:300px;"></div>
                                        <!-- <canvas id="Calendar_S" style="height:250px"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">User chart</h4>
                                        <div id="Calendar_u" style="height:300px;"></div>
                                        <!-- <canvas id="Calendar_u" style="height:250px"></canvas> -->
                                    </div>
                                </div>
                            </div>
                        </div>



                    

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
        // <script type="text/javascript">
        //     google.charts.load('current', {
        //         'packages': ['corechart']
        //     });
        //     google.charts.setOnLoadCallback(Calendar_S);

        //     function Calendar_S() {
        //         var data = google.visualization.arrayToDataTable([
        //             ['car_name', 'Number'],
        //             <?php  
        //                   while($row2 = mysqli_fetch_array($result2))  
        //                   {  
        //                        echo "['".$row2["car_name"].".".$row2["car_number"]."', ".$row2["number"]."],";  
        //                   }  
        //                   ?>
        //         ]);
        //         var options = {
        //             title: 'Percentage of Car Pulled',
        //             //is3D:true,  
        //             pieHole: 0.4
        //         };
        //         var chart = new google.visualization.PieChart(document.getElementById('Calendar_S'));
        //         chart.draw(data, options);
        //     }
        // </script>

        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(Calendar_u);

            function Calendar_u() {
                var data = google.visualization.arrayToDataTable([
                    ['user_name', 'Number'],
                    <?php 
                    $query3="SELECT `user_name`, COUNT(*) as number FROM `car_booking` GROUP BY `user_name`";
                    $result3 = mysqli_query($con, $query3); 

                          while($row3 = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row3["user_name"]."', ".$row3["number"]."],";  
                          }  
                          ?>
                ]);
                var options = {
                    title: 'User Booking Pai Chart',
                    is3D: true,
                    //pieHole: 0.5  
                };
                var chart = new google.visualization.PieChart(document.getElementById('Calendar_u'));
                chart.draw(data, options);
            }
        </script>




        <!-- Bar Chart Link -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Bar Chart Link -->



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
        <script src="js/dashboard.js"></script>
        <!-- End custom js for this page-->
    </body>

    </html>
    <?php } ?>