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
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                                        <!-- <h4 class="card-title">All Car Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Car Information</button>

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Car</th>
                                                        <th>Name</th>
                                                        <th>Number</th>
                                                       <!--  <th>Type</th> -->
                                                        <th>Capacity</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
	$query=mysqli_query($con," SELECT * FROM `tbl_car`");
    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                                        <td>
                                        <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View Car Info.">
                                        <img src="p_img/carImg/<?php echo($row['car_img1']);?>" class="img-responsive" alt="Car Img" /></a>
                                                        </td>

                                                        <td class="center">

                                            <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View Car Info.">
                                                            <?php echo htmlentities($row['car_name']) ; ?> </a>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['car_namePlate']); ?>
                                                        </td>
                                                        
                                                        <td class="center">
                                                            <?php echo htmlentities($row['car_capacity']); ?>
                                                        </td>
                                                        <td>
                                                            
                                                            <?php
                                         if($row['temp_car']==1)
                                         {?>
                                            <a href="car-status-temp.php?h_car_id=<?php echo htmlentities($row['car_id']);?>" onclick="return confirm('Are you sure you want to make this ** Normal Car **?');" title="Normal"> <button class="btn btn-info">Temporary</button></a>

                                            
                                        <?php } else {?>

                                            <a href="car-status-temp.php?s_car_id=<?php echo htmlentities($row['car_id']);?>" onclick="return confirm('Are you sure you want to Make this ** Temporary Car **?');" title="Temporary"> <button class="btn btn-success">Regular</button> </a> 
                                            <?php } ?>

                                                        </td>


                                                        <td class="center">
                                                            <?php
                                         if($row['show_status']==1)
                                         {?>
                                            <a href="car-status.php?h_car_id=<?php echo htmlentities($row['car_id']);?>" onclick="return confirm('Are you sure you want to Hide this ** Car **?');" title="Hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>

                                            
                                        <?php } else {?>

                                            <a href="car-status.php?s_car_id=<?php echo htmlentities($row['car_id']);?>" onclick="return confirm('Are you sure you want to Show this ** Car **?');" title="Show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a> 
                                            <?php } ?>
                                          

                <!-- </td>
                <td class="center"> -->
                  
                  <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View"
                    >
                    <i class="mdi  mdi-yeast text-info icon-lg"></i>  
                  </a>

                  <a href="car-edit?car_id=<?php echo htmlentities($row['car_id']);?>" title="Edit"
                    >
                    <i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i>  
                  </a>

                <a href="car-delete.php?car_id=<?php echo $row['car_id']?>" onClick="return confirm('Are you sure you want to delete?')" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>
                                                                
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