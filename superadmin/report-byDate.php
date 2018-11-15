<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['SadminName'])==0)
  { 
header('location:../admin/login');
}
else{ 

include('../db/config.php');
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



        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 500 + ',height=' + 480 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">


                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="card-title btn btn-outline btn-block ">Report Show By Date</button>

                                        <form action="" method="post">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Start Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="Date" name="start_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car</label>
                                                        <div class="col-sm-9">
                                                            <select name="car_id" class="form-control">
                              <option value="pick"> Select Car </option>
<?php
				$query2=mysqli_query($con,"SELECT `car_id`, `car_name`, `car_namePlate` FROM `tbl_car` ");
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
                                                        <label class="col-sm-3 col-form-label">End Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="Date" name="end_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">

                                                            <button type="submit" name="submit" class="btn btn-info btn-block btn-rounded">View Report</button>
                                                            <!-- <button class="btn btn-light btn-block">Cancel</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                        <div class="table-responsive ">
                                            <?php 
if(isset($_POST['submit']))
{
     $start_date= $_POST['start_date'];
     $end_date=$_POST['end_date'];
     $car_id=$_POST['car_id'];


?>


                                            <table id="example" class="table table-striped table-bordered table-responsive-md col-lg-12">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Car</th>
                                                        <th>Booking Start</th>
                                                        <th>Booking Ends</th>
                                                        <th>Location</th>
                                                        <th>User</th>
                                                        <th>Driver</th>
                                                        <th>Days</th>
                                                        <th>Cost</th>
                                                        <th>Milage</th>
                                                        <th>Rating</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
    $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id'  AND   `start_date` >= '$start_date' AND `end_date`<= '$end_date' ");
    //$query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='14' AND `start_date` >= '2018-10-01' AND `end_date`<= '2018-11-15'  ");

		while($row=mysqli_fetch_array($query))
		{

?>
                                                    <tr>

                                                        <td>
                                                            <?php echo htmlentities($row['booking_id']); ?> </td>

                                                        <td>
                                                            <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View Driver Info.">

                                                                <?php echo htmlentities($row['car_name']. '- '.$row['car_number'] ) ; ?>
                                                            </a>

                                                        </td>


                                                        <td>
                                                            <?php echo date("F j, Y, g:i a", strtotime($row['start_date'])); ?>
                                                        </td>

                                                        <td class="center">
                                                            <?php echo date("F j, Y, g:i a", strtotime($row['end_date'])); ?>
                                                        </td>


                                                        <td class="center">
                                                            <?php echo htmlentities($row['location']); ?>
                                                        </td>

                                                        <td class="center">
                                                            <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?user_id=<?php echo htmlentities($row['user_id']);?>');" title="View User Info.">

                                                                <?php echo htmlentities($row['user_name']); ?> </a>

                                                        </td>
                                                        <td class="center">
                                                            <?php
                  $driver_id=$row['driver_id'];
                  $sql=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");
                  $row2=$sql->fetch_assoc();


                  ?>
                                                                <a href="javascript:void(0);" onClick="popUpWindow('driver-profile.php?driver_id=<?php echo $driver_id;?>');" title="View Driver Info.">

                                                                    <?php echo htmlentities($row2['driver_name']); ?> </a>

                                                        </td>

                                                        <td class="center">
                                                            <?php echo htmlentities($row['day_count']); ?>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['booking_cost']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['start_mileage']. '- '.$row['end_mileage'] ) ; ?> </td>

                                                        <td class="center">
                                                            <?php echo htmlentities($row['driver_rating']); ?>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>

                                            <?php } ?>
                                        </div>
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
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>

    </body>
    </html>
    <?php } ?>