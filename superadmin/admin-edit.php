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



$admin_contract=$_POST['admin_contract'];
$admin_officeId=$_POST['admin_officeId'];

$admin_id=$_GET['admin_id'];

$fileName=$_FILES['admin_img']['tmp_name'];

        if ($fileName !=="") 
        {   
        	
             $admin_id=$_GET['admin_id'];
             $sql=mysqli_query($con,"SELECT `admin_img` FROM `admin` WHERE `admin_id`='$admin_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../admin/p_img/adminimg/".$row2['admin_img'];
                        unlink($file);
                    }
              
            
             $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);

                $storeFile="../admin/p_img/adminimg/".$file_name;
                $fileName=$_FILES['admin_img']['tmp_name'];
                move_uploaded_file($fileName,$storeFile);

                           

                $query2=mysqli_query($con,"UPDATE `admin` SET `admin_img`='$file_name',`admin_phone`='$admin_contract',`admin_officeID`='$admin_officeId' WHERE `admin_id`='$admin_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('admin-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
       

        } 
            else{

                
                $query=mysqli_query($con,"UPDATE `admin` SET `admin_phone`='$admin_contract',`admin_officeID`='$admin_officeId' WHERE `admin_id`='$admin_id'");

            ?>
            <script>
                alert('Update successfull.  !');
                window.open('admin-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
            }

}

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
            <!-- partial:../../partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->

                <div class="main-panel">
                    <div class="content-wrapper">


                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">User Information Update</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

<?php 
    $admin_id=$_GET['admin_id'];

$query=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$admin_id'");

$row=$query->fetch_assoc();

?>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Admin Name  </label>
                                                        <div class="col-sm-9">

                                                     <input type="text" class="form-control" placeholder="Enter Admin Name" value="<?php echo htmlentities($row['admin_name']); ?>" readonly>
                                                

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Office ID </label>
                                                        <div class="col-sm-9">
                                              <input type="text" name="admin_officeId" class="form-control" placeholder="Enter Admin Office ID" value="<?php echo htmlentities($row['admin_officeID']); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        
                                                    </div>
                                                </div>


                                           <div class="col-md-6">
                                                    <div class="form-group row">
                                                       <label class="col-sm-3 col-form-label">Admin Contarct </label>
                                                        <div class="col-sm-9">
                                        <input type="text" name="admin_contract" class="form-control" placeholder="Enter User Office ID" value="<?php echo htmlentities($row['admin_phone']); ?>" required>
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

                                                <td><img src="../admin/p_img/adminimg/<?php echo($row['admin_img']);?>" class="img-responsive" alt="Image" height="100" width="100" >   </td>

                                                <td> <img id="preview" alt="Not Selected" width="100" height="100" /> </td>

                                                <td>  <input type="file" style="float: right;" name="admin_img" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">  </td>
                                                
                                                

                                            </tbody>

                                        </table>                                               
                                                                                                                                                                                                                
                                     </div>
                                            <div class="col-md-6 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">User Info Update </button>
                                                    <button class="btn btn-light btn-block btn-rounded ">Reset</button>

                                                   <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
                                                </div>

                                </div>

                                        </form>
                                    </div>
                                </div>
                        
                                        


                                            
                                               
                        

                            <!--row end-->
                        </div>
                        <!-- content-wrapper-->
                    </div>
                    <!-- content-wrapper ends -->
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
