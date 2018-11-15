<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['adminName'])==0)
  { 
header('location:login');
}
else{ 

include('../db/config.php');

$user_id=$_GET['user_id'];


$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id' ");

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
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                position: absolute;
                top: calc(20px/2);
                left: calc(50% - 50px);
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

                                <img class="user-s" src="p_img/userImg/<?php echo($row['user_img']);?>" class="img-responsive" alt="Image" />
                                <table>

                                    <td>
                                        <h4>User Detail's: </h4>
                                    </td>



                                    <tr>
                                        <td> User Name:</td>
                                        <th> <strong><?php echo $row['user_name'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> User Contract:</td>
                                        <th> <strong><?php echo $row['user_contract'];?></strong> </th>
                                    </tr>


                                    <tr>
                                        <td> User Office ID:</td>
                                        <th> <strong><?php echo $row['user_officeId'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> User Status:</td>
                                        <th> <strong><?php $st =$row['user_status'];

          if ($st==1) {
            echo "Active";
          }
          else{
            echo "Deactive";
          }?>
            
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