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

$car_aircondition=$_POST['car_aircondition'];
$car_power_doorLock=$_POST['car_power_doorLock'];
$car_cd_player=$_POST['car_cd_player'];

$remarks=$_POST['remarks'];

 
// $imgA=$_FILES["imgA"]["name"];
// $imgB=$_FILES["imgB"]["name"];
// $imgC=$_FILES["imgC"]["name"];

// move_uploaded_file($_FILES["imgA"]["tmp_name"],"../admin/p_img/carImg/".$_FILES["imgA"]["name"]);
// move_uploaded_file($_FILES["imgB"]["tmp_name"],"../admin/p_img/carImg/".$_FILES["imgB"]["name"]);
// move_uploaded_file($_FILES["imgC"]["tmp_name"],"../admin/p_img/carImg/".$_FILES["imgC"]["name"]);

$fileName1=$_FILES['imgA']['tmp_name'];
$fileName2=$_FILES['imgB']['tmp_name'];
$fileName3=$_FILES['imgC']['tmp_name'];

        if ($fileName1 !=="" && $fileName2 !=="" && $fileName3 !=="") 
        {
             $car_id=$_GET['car_id'];
             $sql=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../admin/p_img/carImg/".$row2['car_img1'];
                        unlink($file);
                        $file="../admin/p_img/carImg/".$row2['car_img2'];
                        unlink($file);
                        $file="../admin/p_img/carImg/".$row2['car_img3'];
                        unlink($file);
                    }
              


                $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgA']['name']);
                $storeFile1="../admin/p_img/carImg/".$file_name1;
                $fileName1=$_FILES['imgA']['tmp_name'];
                move_uploaded_file($fileName1,$storeFile1);

                $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgB']['name']);
                $storeFile2="../admin/p_img/carImg/".$file_name2;
                $fileName2=$_FILES['imgB']['tmp_name'];
                move_uploaded_file($fileName2,$storeFile2);

                $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgC']['name']);
                $storeFile3="../admin/p_img/carImg/".$file_name3;
                $fileName3=$_FILES['imgC']['tmp_name'];
                move_uploaded_file($fileName3,$storeFile3);

                           

                $query2=mysqli_query($con,"UPDATE `tbl_car` SET `car_name`='$car_name',`car_namePlate`='$car_namePlate',`car_type`='$car_type',`car_capacity`='$car_capacity',`car_img1`='$file_name1',`car_img2`='$file_name2',`car_img3`='$file_name3',`car_door`='$car_door',`car_gearbox`='$car_gearbox',`car_gps`='$car_gps',`car_aircobdition`='$car_aircondition',`car_power_doorLock`='$car_power_doorLock',`car_cdPlayer`='$car_cd_player',`car_remarks`='$remarks' WHERE `car_id`='$car_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('car-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName1 !=="") 
            {
             $car_id=$_GET['car_id'];
             $sql=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../admin/p_img/carImg/".$row2['car_img1'];
                        unlink($file);
                    }
              
            
             $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgA']['name']);

                $storeFile1="../admin/p_img/carImg/".$file_name1;
                $fileName1=$_FILES['imgA']['tmp_name'];
                move_uploaded_file($fileName1,$storeFile1);

                           

                $query2=mysqli_query($con,"UPDATE `tbl_car` SET `car_name`='$car_name',`car_namePlate`='$car_namePlate',`car_type`='$car_type',`car_capacity`='$car_capacity',`car_img1`='$file_name1',`car_door`='$car_door',`car_gearbox`='$car_gearbox',`car_gps`='$car_gps',`car_aircobdition`='$car_aircondition',`car_power_doorLock`='$car_power_doorLock',`car_cdPlayer`='$car_cd_player',`car_remarks`='$remarks' WHERE `car_id`='$car_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('car-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName2 !=="") 
             {
             $car_id=$_GET['car_id'];
             $sql=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../admin/p_img/carImg/".$row2['car_img2'];
                        unlink($file);
                    }
              
            
              $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgB']['name']);
                $storeFile2="../admin/p_img/carImg/".$file_name2;
                $fileName2=$_FILES['imgB']['tmp_name'];
                move_uploaded_file($fileName2,$storeFile2);

                           

                $query2=mysqli_query($con,"UPDATE `tbl_car` SET `car_name`='$car_name',`car_namePlate`='$car_namePlate',`car_type`='$car_type',`car_capacity`='$car_capacity',`car_img2`='$file_name2',`car_door`='$car_door',`car_gearbox`='$car_gearbox',`car_gps`='$car_gps',`car_aircobdition`='$car_aircondition',`car_power_doorLock`='$car_power_doorLock',`car_cdPlayer`='$car_cd_player',`car_remarks`='$remarks' WHERE `car_id`='$car_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('car-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName3 !=="") 
            {
             $car_id=$_GET['car_id'];
             $sql=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../admin/p_img/carImg/".$row2['car_img3'];
                        unlink($file);
                    }
              
            
             $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgC']['name']);
                $storeFile3="../admin/p_img/carImg/".$file_name3;
                $fileName3=$_FILES['imgC']['tmp_name'];
                move_uploaded_file($fileName3,$storeFile3);
                           

                $query2=mysqli_query($con,"UPDATE `tbl_car` SET `car_name`='$car_name',`car_namePlate`='$car_namePlate',`car_type`='$car_type',`car_capacity`='$car_capacity',`car_img3`='$file_name3',`car_door`='$car_door',`car_gearbox`='$car_gearbox',`car_gps`='$car_gps',`car_aircobdition`='$car_aircondition',`car_power_doorLock`='$car_power_doorLock',`car_cdPlayer`='$car_cd_player',`car_remarks`='$remarks' WHERE `car_id`='$car_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('car-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

            else{
                $car_id=$_GET['car_id'];

                $query=mysqli_query($con,"UPDATE `tbl_car` SET `car_name`='$car_name',`car_namePlate`='$car_namePlate',`car_type`='$car_type',`car_capacity`='$car_capacity',`car_door`='$car_door',`car_gearbox`='$car_gearbox',`car_gps`='$car_gps',`car_aircobdition`='$car_aircondition',`car_power_doorLock`='$car_power_doorLock',`car_cdPlayer`='$car_cd_player',`car_remarks`='$remarks' WHERE `car_id`='$car_id'");

            ?>
            <script>
                alert( 'Update successfull.  !');
                window.open('car-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
            }


}?>


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
                        <div class="row">

                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Car Edit Form</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">
                                            <?php 
                                            $car_id=$_GET['car_id'];

$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id' ");

$row=$query->fetch_assoc();
 //print_r($row);

                                            ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Car Name </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" name="car_name" class="form-control" value="<?php echo htmlentities($row['car_name']); ?>" id="typeahead" data-provide="typeahead" data-items="4" data-source='["BMW","Toyota","Suzuki","Mitsubishi","Nissan","Toyota Allion","Toyota Probox","Toyota Noah","Toyota Axio","Toyota Belta","Honda Airwave","Toyota Corolla","Toyota HiAce"]'>
                                                            <p style="color: green;" class="help-block">Start typing to activate auto complete!</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="car_namePlate" class="form-control" value="<?php echo htmlentities($row['car_namePlate']); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Type</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_type" >
                    <option value="<?php echo htmlentities($row['car_type']); ?>"> <?php echo htmlentities($row['car_type']); ?></option>
                  <option value="CNG">CNG</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  
                  </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Capacity</label>
                                                        <div class="col-sm-9">
                                                            <input type="Number" name="car_capacity" class="form-control" value="<?php echo htmlentities($row['car_capacity']); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car GearBox</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_gearbox">
                              <option value="<?php echo htmlentities($row['car_gearbox']); ?>"> <?php echo htmlentities($row['car_gearbox']); ?></option>
                              <option value="Automatic">Automatic</option>
                              <option value="Manual">Manual</option>
                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Door</label>
                                                        <div class="col-sm-9">

                                                            <input type="Number" name="car_door" class="form-control" value="<?php echo htmlentities($row['car_door']); ?>" />

                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <p class="card-description">
                                                Radio Input
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Aircondition</label>
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
                                                        <label class="col-sm-3 col-form-label">Power Door Lock</label>
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
                                                        <label class="col-sm-3 col-form-label">CD Player</label>
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
                                                        <label class="col-sm-3 col-form-label">Car GPS</label>
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

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Car Remarks</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" name="remarks" class="form-control form-control-lg"> <?php echo htmlentities($row['car_remarks']); ?></textarea>
                                                            
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
                                                            <input name="imgA" type="file" class="form-control" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Second Image :</label>
                                                        <div class="col-sm-9">
                                                            <input name="imgB" type="file" class="form-control" onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0])" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Third Image :</label>

                                                        <div class="col-sm-9">
                                                            <input name="imgC" type="file" class="form-control" onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0])"/>
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="row">

                                                <div class="col-md-4">
                                                    <div class="col-md-10">
                                                        <div class="row">        
                                                    <h4 style="margin-left: 17%;">Old </h4>
                                                    <h4  style="margin-left: 38%;">New </h4>
                                                        </div>
                                                    <img src="../admin/p_img/carImg/<?php echo htmlentities($row['car_img1']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
                                                   <img id="preview1" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
                                                   
                                                    </div>
                                                   
                                                  
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="col-md-10">
                                                        <div class="row">        
                                                    <h4 style="margin-left: 17%;">Old </h4>
                                                    <h4  style="margin-left: 38%;">New </h4>
                                                        </div>
                                                    <img src="../admin/p_img/carImg/<?php echo htmlentities($row['car_img2']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
                                                    <img id="preview2" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
                                                   
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="col-md-10">
                                                        <div class="row">        
                                                    <h4 style="margin-left: 17%;">Old </h4>
                                                    <h4  style="margin-left: 38%;">New </h4>
                                                        </div>
                                                    <img src="../admin/p_img/carImg/<?php echo htmlentities($row['car_img3']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
                                                    <img id="preview3" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
                                                   
                                                    </div>
                                                </div>

                                            </div>

                                           

                                           


                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Car Info Update</button>
                                                    <button class="btn btn-light btn-block btn-rounded">Reset</button>
                                                    <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
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