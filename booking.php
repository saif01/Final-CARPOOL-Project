<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  ?>


<?php include('include/header.php');?>
    <?php include('include/manu.php');?>
    <?php include('db/config.php');?>
<style type="text/css">
   
</style>

    

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                           <?php

$start_date=$_POST['start_ate'];
$end_date=$_POST['end_date'];

    $query=mysqli_query($con,"SELECT `car_id` FROM `car_booking` WHERE `start_date` !='2018-10-06' AND `end_date` !='2018-10-10'");
                    while($row2=mysqli_fetch_array($query))
                    {
                    	
                    	


$ids = implode(",",$row2);
$sql = mysqli_query($con,"SELECT * FROM `tbl_car` WHERE id IN ($ids)");
$row=mysqli_fetch_array($sql);
// echo "<pre>";
// print_r ($row);

                       ?>

                            <!-- Single Car Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb">

                                        <img src="admin/p_img/carImg/<?php echo($row['car_img1']);?>" class="img-responsive" alt="Image" />
                                        <!-- <img src="img/driver1.jpg" /> -->

                        
                    

                                    </div>


                                    <div class="car-list-info without-bar">
                                        <h2><a href="#"><?php echo $row['car_name'];  ?></a></h2>
                                        <!-- <h5>39$ Rent /per a day</h5> -->
                                        <p><?php echo $row['car_remarks'];  ?></p>
                                        
                                        <ul class="car-info-list">
                                            <li><?php $st = $row['car_aircobdition']; 
                                            if ($st==1) {
                                                echo "Aircondition";
                                            }else{echo "No";}

                                             ?></li>
                                            <li><?php echo $row['car_type'];  ?> Type</li>
                                            <li><?php $st = $row['car_power_doorLock']; 
                                            if ($st==1) {
                                                echo "Power Door Lock";
                                            }else{echo "No";}

                                             ?></li>
                                        </ul>
                                        
                                        <a href="car-booking.php?car_id=<?php echo htmlentities($row['car_id']);?>"><button type="button" class="book-now-btn"><i class="icon-zoom-in"></i> Book Car</button></a>
<?php    
$car_id=$row['car_id'];     
 $query2=mysqli_query($con,"SELECT `driver_id` FROM `car_driver` WHERE `car_id`=$car_id ");
while($row2=mysqli_fetch_array($query2))
                    {
 ?>

                                        <a href="driver-details.php?driver_id=<?php echo htmlentities($row2['driver_id']);?>"><button type="button" class="book-now-btn" style="margin-left: 40.5%"><i class="icon-zoom-in"></i> Driver</button></a>

                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Car End -->
<?php }?>
                            

                          
                            
                        </div>
                    </div>

                  
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?>
 <!--== Footer and Common js File end ==-->

 <?php } ?>