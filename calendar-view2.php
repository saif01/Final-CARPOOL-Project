<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  
include('db/calDB.php');

$car_id= $_GET['car_id'];

$username= $_SESSION['username'];
$user_id= $_SESSION['user_id'];


// Car info fetch data from database by Car id......... 

$query2="SELECT  `car_name`, `car_namePlate`, `car_img1` FROM `tbl_car` WHERE `car_id` = '$car_id' ";

$statement2 = $connect->prepare($query2);

$statement2->execute();

$result2 = $statement2->fetchAll();



foreach($result2 as $row2)

$car_name = $row2['car_name'];
$car_number=$row2['car_namePlate'];
$car_img=$row2['car_img1'];


// For Load data for show on calender.......................
$data = array();

//SELECT * FROM `car_booking` LEFT JOIN `user` ON car_booking.user_id = user.user_id WHERE car_booking.car_id='14' AND car_booking.boking_status='1'

$query = "SELECT * FROM `car_booking` LEFT JOIN `user` ON car_booking.user_id = user.user_id WHERE car_booking.car_id='$car_id' AND car_booking.boking_status='1' ORDER BY `booking_id` ";

//$query = "SELECT * FROM car_booking ORDER BY booking_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{

// $userId=$row["user_id"];
// $sqll=mysqli_query($con,"SELECT `user_department` FROM `user` WHERE `user_id`='$userId'");
// $row3=$query->fetch_assoc();


 $data[] = array(
  'id'   => $row["booking_id"],
  //'title'   => $row["car_name"].' Car Number--'. $row["car_number"] ,
  'title' => $row["location"].'--'. $row["user_name"].'--'. $row["user_department"],
  'start'   => $row["start_date"],
  'end'   => $row["end_date"],
  
  
 );
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

    <title>CPBCarPool</title>
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


<!-- For Calendar Load Links -->
<link href='admin/cal/fullcalendar.min.css' rel='stylesheet' />
<link href='admin/cal/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='admin/cal/lib/moment.min.js'></script>
<script src='admin/cal/lib/jquery.min.js'></script>
<script src='admin/cal/fullcalendar.min.js'></script>
<script src='admin/cal/locale-all.js'></script>




<?php  
include('include/social_link_top.php');
include('include/manu.php'); ?>
<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2> Large Calendar View Of Car Booking</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
  

 <body>
  <br />
  <h3 align="center">
   <img src="">
    <a href="javascript:void(0);" onClick="popUpWindow('booking-popup.php?car_id=<?php echo$car_id;?>');" title="View Driver Info.">

      Calendar View Of <b> <?php echo $row["car_name"]; ?></b> Car Number <b> <?php echo $row["car_number"]; ?></b> <button class="btn btn-outline-danger" >Booking Now</button> </a></h3>
  <br />
            <div class="container">

             <div id="calendar"></div>

            </div>


<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      //defaultDate: '<?php echo $currentTime; ?>',
      //navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      //editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?php echo json_encode($data); ?>


        
    });

    
  });

</script>


 

<script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 450 + ',height=' + 500 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
            }
        </script>


<!--== Footer Area Start ==-->
    <section id="footer-area">
       

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear()); </script> C.P.Bangladesh CarPool <i class="fa fa-heart-o" aria-hidden="true"></i> Powered by <a href="#" target="_blank"> </a> CPB-IT.
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
</body>

</html>

<?php } ?>

