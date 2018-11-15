<?php
  // Create database connection
  $con = mysqli_connect("localhost", "root", "123456", "carPull");

  // Initialize message variable
  $car_id=16;

  $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id'");
                    while($row=mysqli_fetch_array($query))
                    {
echo "<pre>";
print_r($row);

                    }


?>