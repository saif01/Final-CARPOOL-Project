<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
    $currentDate = date( 'Y-m-d');

if(strlen($_SESSION['logIn_id'])==0)
  { 
header('location:index');
}
else{  
include('db/config.php');

 $booking_id=$_GET['booking_id'];
 $driver_id=$_GET['driver_id'];

if (isset($_POST['submit'])) {
    
 $cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];



 $query4=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage'  WHERE `booking_id` ='$booking_id' ");


//****************** Start Sweet Alert ********************///
                          ?>
                          <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Your Comment Update Successfull..!!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-notclosed-car.php";
                                  }
                                }); }, 1000);
                      </script>            
                          <?php 
//****************** End Sweet Alert ********************///
                   

}

if (isset($_POST['closeComit'])){

$cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];

$query5=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage' , `comit_st`='1'  WHERE `booking_id` ='$booking_id' ");

                    
//****************** Start Sweet Alert ********************///
                          ?>
                          <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Permanently Close This Comment!!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-notclosed-car.php";
                                  }
                                }); }, 1000);
                      </script>            
                          <?php 
//****************** End Sweet Alert ********************///


}
                    
     ?>


<?php 
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

                       <h2> 
                        <?php echo htmlentities($_SESSION['logIn_id']) ?>'s Booked car Commend Section</h2>
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
<!--Start fetch_assoc() array -->
                   <?php
                           $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `booking_id`='$booking_id' ");

                           $row=$query->fetch_assoc();

                           $start_mileage=$row['start_mileage'];
                            $end_mileage=$row['end_mileage'];
                             $booking_cost=$row['booking_cost'];
                              $driver_rating=$row['driver_rating'];




                           {                  
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
                                          

                        <div class="text-center">

                                            <ul class="car-info-list">
                                                <li>Car Number : <b><?php echo $row['car_number']; ?></b></li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li>Start Mileage :<b> <?php echo $start_mileage; ?> K.M.</b>
                                                  
                                                </li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li>End Mileage :<b><?php echo $end_mileage; ?> K.M.</b>
                                                  
                                                </li>
                                            </ul>
                                             <ul class="car-info-list">
                                                <li>Fuel Cost :<b><?php echo $booking_cost; ?> Taka</b>
                                                  
                                                </li>
                                            </ul>

                                            <ul class="car-info-list">
                                                <li>Driver Rating :<b><?php echo $driver_rating; ?></b>
                                                  
                                                </li>
                                            </ul>

                                             <button class="readmore-btn" type="button" data-toggle="modal" data-target="#exampleModal"> Update <i class="fa fa-long-arrow-right"></i></button>

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
         
<!--Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Put Comment Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="chngpwd" >
          <div class="field form-group">
            <label  class="col-form-label">Start Mileage :</label>
            <input type="number" id="target1" name="start_mileage" placeholder="Put Meter Reading" class="form-control" value="<?php echo $start_mileage; ?>">
            </div>

            <div class="field form-group">
            <label class="col-form-label">End Mileage :</label>
            <input type="number" id="target2" name="end_mileage" placeholder="Put Meter Reading" class="form-control" value="<?php echo $end_mileage; ?>">
            </div>
            
            <div class="field form-group">
            <label  class="col-form-label">Fuel Cost :</label>
            <input type="number" id="target3" name="cost" placeholder="Amount of Taka" class="form-control" value="<?php echo $booking_cost; ?>">
            </div>
            <div class="field form-group">
            <label class="col-form-label">Driver Rating :</label>
            <input type="number" id="target4" min="0" max="10" name="driver_rating" placeholder="Put marking out of 10" class="form-control" value="<?php echo $driver_rating; ?>">
            </div>

            <div class='actions'>
             <?php
             if( $start_mileage !='' && 
                 $end_mileage !='' &&
                 $booking_cost !='' &&
                 $driver_rating !='') {?>

                  <button type="submit" name="closeComit" class="btn btn-danger" onClick="return confirm('Are you sure you want to Close This???')" style="float: right;" >Close Permanently</button>
                
             <?php } 
                else{?>
            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            
             <input type="submit" id="sbtbtn" name="closeComit" class="btn btn-danger" onClick="return confirm('Are you sure you want to Close This???')" style="float: right;" value="Close Permanently" disabled="disabled" />
           <?php } ?>

            </div>
        </form>
       
      </div>
      
    </div>
  </div>
</div>
<!--End Modal -->


<?php } ?>
<!--End fetch_assoc() array -->




            
            </div>

         
        </div>
    </div>
    <!--== Car List Area End ==-->




  
 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?> 
 <!--== Footer and Common js File end ==-->





<script type="text/javascript">
  
     $(document).ready(function() {
  
$(function() {
    $('#sbtbtn').attr('disabled', 'disabled');
});
 
$('input[type=number],input[type=checkbox]').keyup(function() {
        
    if ($('#target1').val() !='' &&
    $('#target2').val() != '' &&
    $('#target3').val() != '' &&
    $('#target4').val() != '' ) 
    {
      
        $('#sbtbtn').removeAttr('disabled');
    } 
    else 
    {
        $('#sbtbtn').attr('disabled', 'disabled');
    }
});
    });
</script>




 <?php } ?>