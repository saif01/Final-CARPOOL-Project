<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
    $currentDate = date( 'Y-m-d');

if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  


 include('include/header.php');
 include('include/manu.php');
 include('db/config.php');

 $booking_id=$_GET['booking_id'];
 $driver_id=$_GET['driver_id'];

if (isset($_POST['submit'])) {
	
 $cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];



 $query4=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage'  WHERE `booking_id` ='$booking_id' ");

					?>
                    <script>
                        alert('Update Successfull..!!');
                        //location.reload();
                        window.open('user-noncommented-car.php','_self');
                        //window.location.reload(history.back());
                        </script>
                    <?php 

}

					
     ?>


    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">

            	<?php
                           $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `booking_id`='$booking_id' ");

                           $row=$query->fetch_assoc();

                  
    ?>

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <a href="car-details.php?car_id=<?php echo htmlentities($row['car_id']);?> ">  <img src="admin/p_img/carImg/<?php echo($row['car_img']);?>" class="img-responsive" alt="Image" /></a>
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-5">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                           <!--  <div class="car_model">
                                               <h3><a href="#"> Car Name </a>
                                                <span class="model-s">Model: <b>2013</b></span></h3>  
                                            </div> -->
                                            
                                          

                        

                                            <div class="">
                                            <table class="table ">

                                                <tr>
                                                    <th>Name & Number :</span></th>
                                                    <td> <?php echo $row['car_name']; ?> -- <b><?php echo $row['car_number']; ?></b></td>
                                                </tr>
                                                
                                                <form method="post" action="" >

                                                <tr>
                                                    <th>Fuel Cost :</th>
                                                    <td><input type="Number" name="cost" placeholder="Amount of Taka" value="<?php echo htmlentities($row['booking_cost']); ?>" required="">  </td>
                                                </tr>
                                                <tr>
                                                    <th>Driver Rating :</th>
                                                    <td>
                                                    <input type="Number"  min="0" max="10" name="driver_rating" placeholder="Put marking out of 10" value="<?php echo htmlentities($row['driver_rating']); ?>" required="">

                                                     </td>
                                                
                                                </tr>
                                                <tr>
                                                    <th>Start Mileage :</th>
                                                    <td><input type="Number" name="start_mileage" placeholder="Put Meter Reading" value="<?php echo htmlentities($row['start_mileage']); ?>" >  </td>
                                                </tr>

                                                <tr>
                                                    <th>End Mileage :</th>
                                                    <td><input type="Number" name="end_mileage" placeholder="Put Meter Reading" value="<?php echo htmlentities($row['end_mileage']); ?>" >  </td>
                                                </tr>



                                                <tr>
                                                	<th>
                                                	
                                                	
                                                    <button class="readmore-btn" name="submit" type="Submit"> Update <i class="fa fa-long-arrow-right"></i></button>

                                                    </th>
                                                </tr>
                                               </form>
                                            </table>
                                        </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->

                    <div class="col-lg-2">

                    	<?php    
$car_id=$row['car_id'];     
 $query2=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `car_id`='$car_id' LIMIT 1  ");
$row2 = $query2->fetch_assoc();


 
                                    $st= $row2['driver_status'];

                                    if ($st==0) { ?>

                                <div class="article-thumb-s"> 
                                    <a> <img src="admin/p_img/driverimg/dna/absence.jpg" class="img-responsive" alt="Image" /> </a>

                                    <p ><?php echo htmlentities($row2['driver_name']) ; ?> </p> 
                                    <p style="background-color: red;"> Driver Absence </p>                                                                     
                                </div>

                         <?php } 
                        else{ ?>

                                <div class="article-thumb-s">
                                                                      
                                    <a href="driver-details.php?driver_id=<?php echo htmlentities($row2['driver_id']);?>" > <img src="admin/p_img/driverimg/<?php echo($row2['driver_img']);?>" class="img-responsive" alt="Image" /> </a>

                                   
                                    <p><?php echo htmlentities($row2['driver_name']) ; ?> </p> 
                                    <p><i class="fa fa-mobile"></i> <?php echo htmlentities($row2['driver_phone']) ; ?> </p>                                   
                                  
                                </div>

                         <?php } ?>

                

                            </div>



                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
         
            
            </div>

         
        </div>
    </div>
    <!--== Car List Area End ==-->

  
 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?> 
 <!--== Footer and Common js File end ==-->

 <?php } ?>