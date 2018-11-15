<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['adminName'])==0)
  { 
header('location:login');
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
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 680 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                                        <!--  <h4 class="card-title">All Driver Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Driver Information</button>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <tr>
                                                            <th>Driver</th>                 
                                                            <th>Car</th>
                                                            <th>Phone</th>
                                                            
                                                            <th>Actions</th>
                                                            <th>Actions</th>
                                                            <th>Leave Start</th>
                                                            <th>Leave End</th>



                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
		$query=mysqli_query($con," SELECT * FROM `car_driver` ORDER BY `driver_id`");
    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                                        <td>
                                                            <a href="javascript:void(0);" onClick="popUpWindow('driver-profile.php?driver_id=<?php echo htmlentities($row['driver_id']);?>');" title="View Driver Info.">
                  <img src="p_img/driverimg/<?php echo($row['driver_img']);?>" class="img-responsive" alt="Image" height="42" width="42"/>  

<?php echo htmlentities($row['driver_name']) ; ?>


              </td> </a>

                                                            
                                                            <td>
                                                                <?php 
                $car_id = $row['car_id'];
                $query2=mysqli_query($con,"SELECT `car_name`, `car_namePlate`, `car_img1` FROM `tbl_car` WHERE `car_id` ='$car_id' ");
                $row2=$query2->fetch_assoc();   

                ?>
                    <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View Car Info.">
                 <img src="p_img/carImg/<?php echo($row2['car_img1']);?>" class="img-responsive" alt="Not Assign" height="42" width="70"/>
                <?php echo htmlentities($row2['car_name'].'--'.$row2['car_namePlate']); ?>

                  </a>

                                                            </td>
                                                            



                                                            <td>
                                                                <?php echo htmlentities($row['driver_phone']); ?>
                                                            </td>

                                                           

                                                            <td>
                                            <a href="javascript:void(0);" onClick="popUpWindow('driver-leave.php?driver_id=<?php echo htmlentities($row['driver_id']);?>');" title="Hide"> <button class="btn btn-info">Leave</button></a>  


                                                            </td>
                                                            <td>
                                                  <?php              
                                    if($row['driver_status']==1)
                                         {?>
                                    <a href="driver-status.php?h_user_id=<?php echo htmlentities($row['driver_id']);?>" onclick="return confirm('Are you sure you want to Deactive this ** Driver **?');" title="Hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>
                                            
                                        <?php } else {?>

                                            <a href="driver-status.php?s_user_id=<?php echo htmlentities($row['driver_id']);?>" onclick="return confirm('Are you sure you want to Active this ** Driver **?');" title="Show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a> 
                                            <?php } ?>
                  <a href="driver-edit?driver_id=<?php echo htmlentities($row['driver_id']);?>" title="Edit"
                    >
                    <i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i>  
                  </a>
                  
                    
                   <a href="driver-delete.php?driver_id=<?php echo $row['driver_id']?>" onClick="return confirm('Are you sure you want to delete???')" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>

                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row['leave_start']=='') {
                                                                    echo "No Data"; 
                                                                }
                                                                else{
                                                                    echo date("M j, Y", strtotime($row['leave_start'])); 
                                                                }

                                                                ?>

                                                            </td>

                                                            <td>
                                                                <?php
                                                                if ($row['leave_end']=='') {
                                                                    echo "No Data"; 
                                                                }
                                                                else{
                                                                    echo date("M j, Y", strtotime($row['leave_end'])); 
                                                                }

                                                                ?>

                                                            </td>




                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
        <script src="
https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
                    // lengthChange: false,
                    // buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
                });

                // table.buttons().container()
                //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            });
        </script>

    </body>

    </html>

    <?php } ?>