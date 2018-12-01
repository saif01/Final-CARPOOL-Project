<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  ?>


<?php include('include/header.php');
     include('include/social_link_top.php'); 
     include('include/manu.php');
     include('db/config.php');?>

<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Car Dedails info.</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


<?php 

$car_id=$_GET['car_id'];
 $query=mysqli_query($con," SELECT * FROM `tbl_car` WHERE `car_id` = '$car_id'");

 
while($row=mysqli_fetch_array($query))
{

?>

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2> <?php echo $row['car_name']; ?> <b style="float:right;">  <?php echo $row['car_namePlate']; ?></b> </h2>
                        <div class="car-preview-crousel">

                            <div class="single-car-preview">
                                <img src="admin/p_img/carImg/<?php echo($row['car_img1']);?>"  alt="Image" />
                            </div>
                            <div class="single-car-preview">
                                <img src="admin/p_img/carImg/<?php echo($row['car_img2']);?>" c alt="Image" />
                            </div>
                            <div class="single-car-preview">
                                <img src="admin/p_img/carImg/<?php echo($row['car_img3']);?>"  alt="Image" />
                            </div>



                        </div>
                        <div class="car-details-info">
                            <h4>Additional Info</h4>
                            <p><?php echo $row['car_remarks'];?> </p>

                            

                         
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Car Update Information</h3>

                            <div class="sidebar-body">
                               <?php            
                                    $Date=$row['reg_time'];
                                     $date1 = new DateTime($Date);
                                    $sdate=$date1->format('Y.m.d'); 
                                    $sdate2=$date1->format('d - M - Y');

                              ?>
                                <p><i class="fa fa-clock-o"></i>Reg. Date : <?php echo $sdate2; ?></p>
                                <p><i class="fa fa-clock-o"></i>Last Update: <?php 
 
                                    $Date=$row['update_time'];
                                     $date1 = new DateTime($Date);
                                    $sdate=$date1->format('Y.m.d'); 
                                    $sdate2=$date1->format('d - M - Y');
                                                    if ($Date== 0) 
                                                    {
                                                        echo " No Update ";}
                                                    else { echo $sdate2; }?> </p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
<!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Car Information</h3>

                            <div class="sidebar-body">
                               
                               <table class="table table-bordered">
                                                <tr>
                                                    <th>Aircondition</th>
                                                    <td><?php $st = $row['car_aircobdition']; 
                                            if ($st==1) {
                                                echo "Yes";
                                            }else{echo "No";}

                                             ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Power Door Lock</th>
                                                    <td><?php $st = $row['car_power_doorLock']; 
                                                    if ($st==1) {
                                                        echo "Yes";
                                                    }else{echo "No";}?>
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <th>CD Player</th>
                                                    <td><?php $st = $row['car_cdPlayer']; 
                                                    if ($st==1) {
                                                        echo "Yes";
                                                    }else{echo "No";}?></td>
                                                </tr>
                                                <tr>
                                                    <th>Capacity</th>
                                                    <td><?php echo $row['car_capacity'];?></td>
                                                </tr> 
                                                
                                                
                                                <tr>
                                                    <th>Fuel</th>
                                                    <td><?php echo $row['car_type'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Doors</th>
                                                    <td><?php echo $row['car_door'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>GearBox</th>
                                                    <td><?php echo $row['car_gearbox'];?></td>
                                                </tr>
                                            </table> 
                               
                               
                               
                               
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                 
                    </div>
                </div>
                <!-- Sidebar Area End -->
                
                
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
<?php } ?>
<!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?>
 <!--== Footer and Common js File end ==-->
<?php } ?>