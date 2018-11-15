<?php 
include('db/config.php');
$booking_id= $_GET['booking_id'];

$query=mysqli_query($con,"UPDATE `car_booking` SET `boking_status`= '0' WHERE `booking_id`='$booking_id' ");


// header("location:user-booked-car");
// //header("Location: dashbord");
//  exit();
?>
<script>
    alert('Your Booking canceled successfully..!!');
    window.open('user-booked-car','_self');
    </script>
