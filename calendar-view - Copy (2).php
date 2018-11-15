<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  
include('include/config.php');
include('cal/db.php');
//$connect = new PDO('mysql:host=localhost;dbname=carPull', 'root', '123456');
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
            
        ?> <script>
            alert('You can not Book More than Saven days   !!!!');
            </script> <?php
        }

        else{

            $sql=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id` ='$car_id' AND (`start_date` BETWEEN '$start_book' AND '$end_book' OR `end_date` BETWEEN '$start_book' AND '$end_book')");

                $result=mysqli_num_rows($sql);

                if ($result > 0) 
                {
                    ?>
                        <script>
                        alert('This Car Already Booked At this Date  !!!!');
                        //window.open('car-list3.php','_self');
                        //location.reload();
                        </script>
                    <?php


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
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>



<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style type="text/css">
  
.navbar-light .navbar-brand {
    color: #ffd000 !important;
}

.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: red;
}

.navbar-light .navbar-nav .nav-link {
    color:black;
    background-color: #fff;
}

.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
    color: #ffd000 !important;
    opacity: 1;
  visibility: visible;
}

.roundSaif {
    border-radius: 10px 20px;
    border: 2px solid #73AD21;
    padding: 1px; 
    width: 50px;
    height: 50px;


</style>

<div id="app" class="container" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="dashbord" class="logo">
                            <img src="assets/img/logo.png" class="roundSaif" alt="CPB" >
                        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Features</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Pricing</a> -->
                </li>

            </ul>
            <ul class="navbar-nav" style="hover-color:black;">

                <li class="nav-item">
                     <li  class="nav-link active"><a href="dashbord">Home</a>
                   
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="car-list3">Car List 3</a>
                    
                </li>


                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="user-booked-car">My Booked Car</a>
                        <a class="dropdown-item" href="user-noncommented-car">None Commented </a>
                        <a class="dropdown-item" href="user-noncommented-car">None Commented </a>
                        <a class="dropdown-item" href="user-noncommented-car">None Commented </a>




                    </div>
                </li>


                
            </ul>
        </div>
    </nav>
</div>


<?php // include('include/manu.php'); ?>

   
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


function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "data-count.php",
data:'check_value='+$("#check_value").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
                      <h3>Car Booking Info. <span id="user-availability-status1" style="font-size:12px;"></span>
                            </h3>
              <form action="" method="POST">
                <div class="name">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Pic-Up DATE:
                                    <input type="date" id="date1"  name="start_date" placeholder="Pick Up Date" />

                                    <span class="first" "></span>

                                        </label>


                    </div>
                    <div class="col-md-6">
                                            <span id="user-availability-status1" style="font-size:12px;"></span>
                      <label>Return DATE: 
                                        <input type="date"  name="end_date" id="check_value" onBlur="userAvailability()" placeholder="Return Date" />

                                        
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
                      <label>Location: </label>
                                   <!--  <input type="text"  name="location" placeholder="location" /> -->
                                   <select name="location" required=""> 
                                    <option value="" >Select Location</option>
<?php
    $query2=mysqli_query($con,"SELECT `location` FROM `location`");

            while ($row2 = mysqli_fetch_array($query2))
            {
echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
}
?>

                                   </select>
                                        
                    </div>

              <div class="col-md-6">


                      <label>Booking Time: </label>
                                        <select name="for_car" class="" id="time_show" onChange="return show();" >
                                                <option value="">Full day </option>   
                                                <option value="manual_input">Manual Input </option>
                                        </select>
                                          

                              <div id="manual_input_show" class="name" style=" display:none; ">
                                    <div class="row">
                                        <div >
                                            <label >Start time -:
                                    <select name="start_time"> 
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
                                        <div >
                                            <label>Return Time 
                                        <select name="return_time"> 
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
Copyright &copy;<script>document.write(new Date().getFullYear()); </script> C.P.Bangladesh<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank"> </a> CPB.
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



</body>

</html>

<?php } ?>

