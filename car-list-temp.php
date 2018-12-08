<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
// $currentTime = date( 'Y-m-d H:i:s', time () ); 

if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  
 
 include('db/config.php');
 include('include/header.php');
 include('include/social_link_top.php'); 
 include('include/manu.php');
 
     ?>
 <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Temporary Car's..</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">

                <?php
                    //$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `temp_car`='0'");
                $query=mysqli_query($con,"SELECT * FROM `tbl_car` LEFT JOIN `car_driver` ON tbl_car.car_id=car_driver.car_id WHERE tbl_car.temp_car='1' AND tbl_car.show_status='1'");
                
                    while($row=mysqli_fetch_array($query))
                    {  ?>

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <a href="car-details.php?car_id=<?php echo htmlentities($row['car_id']);?> ">  <img src="admin/p_img/carImg/<?php echo($row['car_img1']);?>" class="img-responsive" alt="Image" /></a>
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-5">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                          
                                            <div class="article-date">

                                    <?php
                             $currTime = date('Y-m-d H:i:s');
                             $car_id=$row['car_id'];

                             $query3=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND `boking_status`='1' AND '$currTime' BETWEEN `start_date` AND `end_date`");

                             //$row3=$query3->fetch_assoc();
                             $row3=mysqli_num_rows($query3);

                            if ($row3>0) {
                                //echo "Book";
                                ?> <p style="color: red;"> Booked</p> <?php
                            }
                            else{
                                echo "Free";
                            }
                                 ?>   
         
                                            </div>

                                            <div class="text-center">
                                            <table class="table ">

                                                <tr>
                                                    <th>Name :</th>
                                                    <td> <?php echo $row['car_name']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Car Number :</th>
                                                    <td><?php echo $row['car_namePlate'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Capacity :</th>
                                                    <td><?php echo $row['car_capacity'];?></td>
                                                
                                                </tr>
                                               
                                               
                                            </table>

                                             <a href="calendar-view-temp?car_id=<?php echo htmlentities($row['car_id']);?>" class="readmore-btn">Book  <i class="fa fa-long-arrow-right"></i></a>

                                            
                                        </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->
        <!--  Driver Section Start -->
                   <div class="col-lg-2">

                        <?php    

                                     $currentdate = date( 'Y-m-d' );
                                    $st= $row['driver_status'];

                                    $l_Stst=$row['leave_start'];
                                    $l_Sted=$row['leave_end'];

                                    //Start Time Subtraction and convert to days.
                                    $ts1    =   strtotime($l_Stst);
                                    $ts2    =   strtotime($l_Sted);
                                    $seconds    = abs($ts2 - $ts1); # difference will always be positive
                                    $leavedays = round($seconds/(60*60*24));

                                   

                         $driver_id=$row['driver_id'];
                         $sql4=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' AND '$currentdate' BETWEEN date(`leave_start`) AND date(`leave_end`)");

                         $rowNum=mysqli_num_rows($sql4);
                         //$rowNum=1;

                            if($rowNum >0) { ?>

                                <div class="article-thumb-s" >
                                                                      
                                    <a href="driver-details.php?driver_id=<?php echo htmlentities($row['driver_id']);?>" > <img src="admin/p_img/driverimg/<?php echo($row['driver_img']);?>" class="img-responsive mx-auto d-block"  alt="Image" /> </a>

                                
                                    <p><?php echo htmlentities($row['driver_name']) ; ?> </p> 
                                    <p style="background-color: red;  color: white; ">Leave <?php echo $leavedays ; ?> days from now </p>                                                                    
                                </div>


                         <?php } 
                          elseif ($st==0) { ?>

                                <div class="article-thumb-s"> 
                                    <a> <img src="admin/p_img/driverimg/dna/absence.jpg" class="img-responsive mx-auto d-block" alt="Image" /> </a>

                                    <p ><?php echo htmlentities($row['driver_name']) ; ?> </p> 
                                    <p style="background-color: red; color: white; "> Emergency Leave </p>       
                                </div>

                         <?php } 


                        else{ ?>

                                <div class="article-thumb-s" >
                                                                      
                                    <a href="driver-details.php?driver_id=<?php echo htmlentities($row['driver_id']);?>" > <img src="admin/p_img/driverimg/<?php echo($row['driver_img']);?>" class="img-responsive mx-auto d-block"  alt="Image" /> </a>

                                
                                    <p><?php echo htmlentities($row['driver_name']) ; ?> </p> 
                        <p><i class="fa fa-mobile"></i> <a  href="tel:+88<?php echo htmlentities($row['driver_phone']) ; ?>"> <?php echo htmlentities($row['driver_phone']) ; ?> </a> 
                                    </p>                                
                                  
                                </div>


                <?php } ?>

                            </div>
            <!--  Driver Section End -->


                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
<?php } ?>           
            
            </div>
       
        </div>
    </div>
    <!--== Car List Area End ==-->

  
 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?> 
 <!--== Footer and Common js File end ==-->

 <?php } ?>