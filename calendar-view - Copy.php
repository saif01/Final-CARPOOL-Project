<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  
 include('db/config.php');
include('db/calDB.php');
$connect = new PDO('mysql:host=localhost;dbname=carpull', 'root', '123456');
$car_id= $_GET['car_id'];

$username= $_SESSION['username'];
$user_id= $_SESSION['user_id'];


//start For Load data for show on calender.......................
$data = array();

$query = "SELECT * FROM `car_booking` WHERE `car_id` = '$car_id' ORDER BY `booking_id` ";

//$query = "SELECT * FROM car_booking ORDER BY booking_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["booking_id"],
  //'title'   => $row["car_name"].' Car Number--'. $row["car_number"] ,
  'title' => $row["location"].'-'.$row["user_name"],
  'start'   => $row["start_date"],
  'end'   => $row["end_date"],
  
 );
}

 //end For Load data for show on calender.......................


//  All data fetch from database by ID
$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id` = $car_id ");
//store all data as an array in a variavle.
$value = $query->fetch_assoc();

$car_name= $value['car_name'];
$car_nunber=$value['car_namePlate'];
$car_img=$value['car_img1'];


if (isset($_POST['submit'])) {

    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
    $end_book= $_POST['end_date'] . ' ' . $_POST['return_time'];  

    //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($start_book);
        $ts2    =   strtotime($end_book);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = round($seconds/(60*60*24));
        //$days2 = $seconds/(60*60*24);
  //Start Time Subtraction and convert to days.

        if ($days>=7) {
            
       $_SESSION['error']="7";
        }

        else{

            $sql=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id` ='$car_id' AND (`start_date` BETWEEN '$start_book' AND '$end_book' OR `end_date` BETWEEN '$start_book' AND '$end_book')");

                $result=mysqli_num_rows($sql);

                if ($result > 0) 
                {
                    
                    $_SESSION['error']="booked";
                   
                }

                else
                {

                   
                    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
                    $end_book= $_POST['end_date'] . ' ' . $_POST['return_time'];

                    $location=$_POST['location'];

                    $status=1;


                    $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$username','$car_name','$car_nunber','$car_img','$start_book','$end_book','$location','$days','$status')");

                    
                    ?>
                    <script>
                        alert('Update successfull..  !');
                        window.open('car-list3.php','_self');
                        </script>
                    <?php 

                     $_SESSION['error']="";
                }

        }

 }


  ?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>CPBCarPull</title>
    <link rel="icon" type="img/png" href="img/logo.png"/>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>

<?php  include('include/manu.php'); ?>
  
<script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    //events: 'cal/load.php',
    events: <?php echo json_encode($data); ?>,
    //selectable:true,
    selectHelper:true,


   });
  });
   
  </script>

<script>
                    function show() {
                        var selectBox = document.getElementById('time_show');
                        var userInput = selectBox.options[selectBox.selectedIndex].value;
                        if (userInput == 'manual_input') 
                        {
                          document.getElementById('manual_input_show').style.display = 'block';
                            
                        }  
                        else {
                            document.getElementById('manual_input_show').style.display = 'none';
                        }

                        return false;

                    }



                </script>

    <!--== Header Area End ==-->
  </head>
  <body>

 

<section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                  <div class="login-page-content">
            <div class="login-form">
                      <h3>Car Booking Info.</h3> 


<?php if ($_SESSION['error']=="") {
  echo htmlentities($_SESSION['error']="");

}if($_SESSION['error']=="booked"){?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Sorry!</strong> This Car Booked By Another User!!!.
</div>
<?php
echo htmlentities($_SESSION['error']="");
 }if($_SESSION['error']=="7"){ ?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Sorry!</strong> You can not Book more than Saven days !!.
</div>
<?php 
echo htmlentities($_SESSION['error']="");
 } ?>
              <form action="" method="POST">

                <div class="name">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Pic-Up DATE:
                                    <input type="date" id="date1"  name="start_date" placeholder="Pick Up Date" required />

                                    <span class="first" "></span>

                                        </label>


                    </div>
                    <div class="col-md-6">
                                            <span id="user-availability-status1" style="font-size:12px;"></span>
                      <label>Return DATE: 
                                        <input type="date"  name="end_date" id="check_value" onBlur="userAvailability()" placeholder="Return Date" required />

                                        
                                          </label>

                                            
                    </div>
                  </div>

                </div>
                <!-- <div class="username">
                  <label>Location:  
                                        <input type="text"  name="location" placeholder="Where You Go" />
                                          </label>
                </div> -->

                <div class="row">
                    <div class="col-md-6">
                       <div class="pickup-location book-item">
                      <label>Location: </label>
                                   <!--  <input type="text"  name="location" placeholder="location" /> -->
                                   <select name="location" class="custom-select" required>
                                   <option value="">Select Location</option> 
                                    
<?php
    $query2=mysqli_query($con,"SELECT `location` FROM `location`");

            while ($row2 = mysqli_fetch_array($query2))
            {
echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
}
?>

                                   </select>
                              </div>          
                    </div>

              <div class="col-md-6">
                <div class="pickup-location book-item">

                      <label>Booking Time: </label>
                                        <select name="for_car" class="custom-select" id="time_show" onChange="return show();" >
                                                <option value="">Full day </option>   
                                                <option value="manual_input">Manual Input </option>
                                        </select>
                                          
                                      </div>
                            </div>  
                            
                            <div class="col-lg-12">        
                              <div id="manual_input_show" class="pickup-location book-item " style=" display:none; ">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label >Start time :
                                    <select name="start_time" class="custom-select" > 
                                        <option value="01:00:00">Select Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            <option value="18:00:00">5.00 PM </option>
                                            <option value="18:30:00">5.30 PM </option>
                                            <option value="19:00:00">6.00 PM </option>
                                                                                  
                                         </select>
                                            </label>
                                        </div>

                                        <div  class="col-md-6">
                                            <label>Return Time :
                                        <select name="return_time" class="custom-select"> 
                                          <option value="23:59:00">Select Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            <option value="18:00:00">5.00 PM </option>
                                            <option value="18:30:00">5.30 PM </option>
                                            <option value="19:00:00">6.00 PM </option>
                                                                                  
                                         </select>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>

                    </div>
                  </div>

                

                <div class="log-btn">
                  
                  <button type="submit"  name="submit" class="fa fa-check-square"> Book Car</button>
                </div>
              </form>
                    </div>
 
            
 


                </div>
          </div>


<div class="col-lg-7 col-md-8 m-auto">
                  <div class="login-page-content">
                   
                    
<div id="calendar"></div>
                    
                  </div>


                    
                </div>


</div>
</div>
</section>








<!--== Footer Area Start ==-->
    <section id="footer-area">
       

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear()); </script> C.P.Bangladesh<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank"> </a> CPB-IT.
</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="Syful-IT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->


    <!--=== Jquery Min Js ===-->
  <!--   <script src="assets/js/jquery-3.2.1.min.js"></script> -->
    <!--=== Jquery Migrate Min Js ===-->
   <!--  <script src="assets/js/jquery-migrate.min.js"></script>
 -->


<!--=== Jquery Min Js ===-->
   <!--  <script src="assets/js/jquery-3.2.1.min.js"></script> -->
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->

    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>


    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>
<!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>




</body>

</html>

<?php } ?>

