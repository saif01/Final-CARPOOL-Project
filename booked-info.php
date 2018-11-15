<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  ?>


<?php include('include/header.php');?>
<?php include('include/manu.php');?>
<?php include('db/config.php');?>

<?php   
//$car_id='16';
$car_id=$_GET['car_id'];
$query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' ");
$value = $query->fetch_assoc();


?>

 <!--== About Page Content Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Booked Info. : <?php print_r($value['car_name']) ; ?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>This is Car Booked Information.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>



            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-8">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content " >

<?php 
$query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' ORDER BY `booking_id` DESC LIMIT 7  ");
                    while($row=mysqli_fetch_array($query))
                    {
$startDate=$row['start_date'];
$endDate=$row['end_date'];

 $date1 = new DateTime($startDate);
   $date2 = new DateTime($endDate);

$sdate=$date1->format('Y.m.d'); 
$edate=$date2->format('Y.m.d');

$sdate2=$date1->format('d.M.Y');
$edate2=$date2->format('d.M.Y');


 //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($startDate);
        $ts2    =   strtotime($endDate);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = $seconds/60/60/24;
  //Start Time Subtraction and convert to days.



?>
                            	<ul class="package-list">
                            	<li> Booking :------  <?php echo $sdate2 ; ?> --- To ---  <?php echo $edate2 ;?> Booked By <a href="booked-user.php?user_id=<?php echo htmlentities($row['user_id']);?>"> <?php echo htmlentities($row['user_name']); ?></a>  Days:
                                    <button><?php echo $days; ?> </button>
                                 </li>
                            
                                </ul>

<?php } ?> 

                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->
        
                <!-- About Video Start -->
                <div class="col-lg-4">
                    <div class="about-image">
                        
                      <img src="admin/p_img/carImg/<?php print_r($value['car_img']) ?>" class="img-responsive" alt="Image" />
                    </div>
                </div>
                <!-- About Video End -->
            </div>

 
           <!-- About Fretutes Start -->
            <div class="about-feature-area">
                <div class="row">
                    <!-- Single Fretutes Start -->
                    <div class="col-lg-12">
                        <div class="about-feature-item active">
                            <i class="fa fa-car"></i>
                            
                        </div>
                    </div>
                    <!-- Single Fretutes End -->

                </div>
            </div>
            <!-- About Fretutes End -->
        </div>
    </section>
    <!--== About Page Content End ==-->



<?php include('include/footer.php');
// session ending bracket
 } ?>