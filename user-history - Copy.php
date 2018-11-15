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

include('db/config.php');

$user_id= $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search And Pagination</title>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap_s.css"> -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<!-- <link rel="stylesheet" type="text/css" href="css/datatable_s.css"> -->

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>CPBCarPull</title>
    <link rel="icon" type="img/png" href="img/logo.png"/>

    <!--=== Bootstrap CSS ===-->
   <!--  <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
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




</head>
<body>

<?php include('include/manu.php'); ?>



<div class="container">

    

    <h1 style="text-align: center; text-transform: capitalize;"><?php echo htmlentities($_SESSION['username']); ?>'s Booking History</h1>


<table id="example" class="table table-striped table-bordered" style="width:100%">
       

              <thead>
                <tr>
                   <th>Car</th>                  
                  <th>Booking Starts</th>
                  <th>Booking Ends</th>
                  <th>Location</th>
                  <th>Days</th>
                  <th>Cost</th>
                  <th>Milage</th>
                  <th>Driver</th>
                  
                  
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' ORDER BY`booking_id` DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
  <tr>

                

                <td class="center" ><?php echo htmlentities($row['car_name']. '- '.$row['car_number'] ) ; ?></td>
                

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['start_date'])); ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['end_date'])); ?></td>


                <td class="center"><?php echo htmlentities($row['location']); ?></td>
                <td class="center"><?php echo htmlentities($row['day_count']); ?></td>
                <td class="center"><?php echo htmlentities($row['booking_cost']); ?></td>
                <td> <?php echo htmlentities($row['start_mileage']. '- '.$row['end_mileage'] ) ; ?>  </td>


                <td class="center">
                  <?php
                  $driver_id=$row['driver_id'];
                  $sql=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");
                  $row2=$sql->fetch_assoc();
  

                 echo htmlentities($row2['driver_name']); ?> 

                </td>






              </tr>

        <?php } ?>  
              
              </tbody>
        
    </table>

 
</div>








<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- <script type="text/javascript" src="js/library_s.js"></script> -->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="js/datatable_s.js"></script> -->

 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
 
 <!-- <script type="text/javascript" src="js/bootstrap_s.js"></script> -->

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>





 <!--== Footer Area Start ==-->
    <section id="footer-area">
       

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear()); </script> C.P.Bangladesh <i class="fa fa-heart-o" aria-hidden="true"></i> Powered by <a href="#" target="_blank"> </a> CPB-IT.
</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

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