<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );

if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  


 include('include/header.php');
 include('include/manu.php');
 include('db/config.php');

     ?>

    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">

                <?php
                           $query=mysqli_query($con,"SELECT * FROM `tbl_car`");
                    while($row=mysqli_fetch_array($query))
                    {     
$car_status= $row['show_status'];

if ($car_status==1) {
    
    ?>

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
                             $st2=DATE('Y-m-d');
                             $car_id=$row['car_id'];

                             $query3=mysqli_query($con,"SELECT `start_date` FROM `car_booking` WHERE `car_id` ='$car_id' AND DATE(`start_date`) = '$st2' ");
                             //$query3=mysqli_query($con,"SELECT `start_date` FROM `car_booking` WHERE `car_id` ='$car_id' AND `start_date` = '$currentTime' ");

                             //$row3=$query3->fetch_assoc();
                             $row3=mysqli_num_rows($query3);

                            if ($row3>0) {
                                //echo "Book";
                                ?> <p style="color: red;"> Book</p> <?php
                            }
                            else{
                                echo "Free";
                            }
                                 ?>   
         
                                            </div>

                                            <div class="">
                                            <table class="table ">

                                                <tr>
                                                    <th>Name :</span></th>
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
                                                <tr>
                                                    <th>
                                                    <a href="calendar-view?car_id=<?php echo htmlentities($row['car_id']);?>" class="readmore-btn">Book  <i class="fa fa-long-arrow-right"></i></a>
                                                    </th>
                                                    <td>
                                                        <a href="calendar-view2?car_id=<?php echo htmlentities($row['car_id']);?>" class="readmore-btn">Calendar <i class="fa fa-long-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                               
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
while($row2=mysqli_fetch_array($query2))
                    {
 
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

                <?php } ?>

                            </div>



                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
<?php }

else{ }

 }?>           
            
            </div>
       
        </div>
    </div>
    <!--== Car List Area End ==-->

  
 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?> 
 <!--== Footer and Common js File end ==-->

 <?php } ?>