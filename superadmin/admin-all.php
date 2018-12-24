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
        <link rel="icon" type="img/png" href="img/logo.png" />
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
                                        <!-- <h4 class="card-title">All User Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Admin Information</button>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                                <thead>
                                                    <tr>

                                                        <th>Img</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Office ID</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
		$query=mysqli_query($con,"SELECT * FROM `admin` ORDER BY `admin_id` DESC");
    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                                        <td> <img src="../admin/p_img/adminimg/<?php echo($row['admin_img']);?>" class="img-responsive" alt="Image" height="42" width="42" /> </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['admin_name']) ; ?>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['admin_phone']); ?>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['admin_officeID']); ?>
                                                        </td>

                                                        <td class="center">
                                                            <?php
                                         if($row['super_admin']==1)
                                         {?>
                                     <a href="admin-super?h_admin_id=<?php echo htmlentities($row['admin_id']);?>" onclick="return confirm('Are you sure you want to make **Normal Admin **?');" title="Normal Admin"><button class="btn btn-info" >Super Admin</button></a>
                                            
                                        <?php } else {?>

                                            <a href="admin-super?s_admin_id=<?php echo htmlentities($row['admin_id']);?>" onclick="return confirm('Are you sure you want to Active this ** Super Admin **?');" title="Super Admin"><button class="btn btn-success" >Normal Admin</button></a>
                                            <?php } ?>
                                          

                </td>
                <td class="center">

                    <?php
                                         if($row['admin_status']==1)
                                         {?>
                                     <a href="admin-status.php?h_admin_id=<?php echo htmlentities($row['admin_id']);?>" id="hide" title="Hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>
                                            
                                        <?php } else {?>

                                            <a href="admin-status.php?s_admin_id=<?php echo htmlentities($row['admin_id']);?>" id="show" title="Show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a>
                                            <?php } ?>

                <a href="admin-edit?admin_id=<?php echo htmlentities($row['admin_id']);?>" title="Edit"
                    >
                    <i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i>  
                  </a>



                     <a href="admin-delete.php?admin_id=<?php echo $row['admin_id']?>" id="delete" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>
                                                                
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
        

        <!--********* Data Table js Link *********-->
        <!-- <script type="text/javascript" src="assets/dataTable/libry.js"></script> -->
        <script type="text/javascript" src="../assets/dataTable/tbl.js"></script>
        <script type="text/javascript" src="../assets/dataTable/boots.js"></script>
         
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>


 <!-- Sweet Alert CDN Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js'"></script>
<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#hide", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Block This Admin?",
                  text: "If Block !!, Admin Can't Login !",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#show", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to UnBlock This Admin?",
                  text: "If UnBlock !!, Admin Can Login !",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->


    </body>

    </html>

    <?php } ?>