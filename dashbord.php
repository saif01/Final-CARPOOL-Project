<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{ 
include('db/config.php');
 ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>CPB-CarPool</title>
    <link rel="icon" type="img/png" href="img/logo.png"/>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="assets/css/plugins/vegas.min.css" rel="stylesheet">
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

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="Syful-IT">
            </div>
        </div>
    </div>



   <?php 

      include('include/social_link_top.php');
      include('include/manu.php');  ?>     

    <!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                               <a href="car-list3" > <h1>BOOK A CAR TODAY!</h1> </a>

                                 <div class="book-ur-car text-center ">


                                    <form action="search-result.php" method="POST" >

                                         <div id="manual_input_show" style="display:none;">
                                    
                                        <div >
                                            
                                    <select id="first" name="start_time" > 
                                            <option value="01:00:00"> Select Manual Start Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="12:00:00">12.00 PM (Noon)</option>
                                            <option value="13:00:00">01.00 PM </option>
                                            <option value="14:00:00">02.00 PM </option>
                                            <option value="15:00:00">03.00 PM </option>
                                            <option value="16:00:00">04.00 PM </option>
                                            <option value="17:00:00">05.00 PM </option>
                                            <option value="18:00:00">06.00 PM </option>
                                            <option value="19:00:00">07.00 PM </option>
                                            <option value="20:00:00">08.00 PM </option>
                                            <option value="21:00:00">09.00 PM </option>
                                            <option value="22:30:00">10.00 PM </option>
                                            <option value="23:00:00">11.00 PM </option>

                                            <option value="23:59:00">12.00 AM (Night) </option>
                                            <option value="01:00:00">01.00 AM </option>
                                            <option value="02:00:00">02.00 AM </option>
                                            <option value="03:00:00">03.00 AM </option>
                                            <option value="04:00:00">04.00 AM </option>
                                            <option value="05:00:00">05.00 AM </option>
                                            <option value="06:00:00">06.00 AM </option>
                                            <option value="07:00:00">07.00 AM </option>
                                            <option value="08:00:00">08.00 AM </option>
                                                                                  
                                         </select>
                                           
                                        </div>
                                        <div >
                                           
                                        <select id="second" name="return_time" > 
                                            <option value="23:59:00">Select Manual End Time</option>    
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="12:00:00">12.00 PM (Noon)</option>
                                            <option value="13:00:00">01.00 PM </option>
                                            <option value="14:00:00">02.00 PM </option>
                                            <option value="15:00:00">03.00 PM </option>
                                            <option value="16:00:00">04.00 PM </option>
                                            <option value="17:00:00">05.00 PM </option>
                                            <option value="18:00:00">06.00 PM </option>
                                            <option value="19:00:00">07.00 PM </option>
                                            <option value="20:00:00">08.00 PM </option>
                                            <option value="21:00:00">09.00 PM </option>
                                            <option value="22:30:00">10.00 PM </option>
                                            <option value="23:00:00">11.00 PM </option>

                                            <option value="23:59:00">12.00 AM (Night) </option>
                                            <option value="01:00:00">01.00 AM </option>
                                            <option value="02:00:00">02.00 AM </option>
                                            <option value="03:00:00">03.00 AM </option>
                                            <option value="04:00:00">04.00 AM </option>
                                            <option value="05:00:00">05.00 AM </option>
                                            <option value="06:00:00">06.00 AM </option>
                                            <option value="07:00:00">07.00 AM </option>
                                            <option value="08:00:00">08.00 AM </option>
                                            
                                                                                  
                                         </select>
                                           
                                        </div>
                                        
                                    </div>
                               

                                        <div class="pick-date bookinput-item">
                                            <input id="startDate2" name="startDate" placeholder="Pick Date" />
                                        </div>

                                        <div class="retern-date bookinput-item">
                                            <input id="endDate2" name="endDate" placeholder="Return Date" />
                                        </div>

                                        <div class="pick-location bookinput-item">
                                    <select name="location" class="custom-select">
                                              <option value="">Select Location</option> 
                                    
                                    <?php
                                        $query2=mysqli_query($con,"SELECT `location` FROM `location` ORDER BY `location`");

                                                while ($row2 = mysqli_fetch_array($query2))
                                                {
                                    echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
                                    }
                                    ?>
                                              
                                            </select>
                                        </div>

                                        <div class="pick-location bookinput-item">
                                    
                                              <select name="for_car" class="custom-select" id="time_show" onChange="return show();" >
                                                <option value="">Full day </option>   
                                                <option value="manual_input">Manual Input </option>
                                        </select>

                                        </div>
                                        

                                         <div class="bookcar-btn bookinput-item" >
                                            <button type="submit" name="submit" >Search Record</button>
                                        </div>





                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

   <script type="text/javascript">
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



   


  <?php include('include/footer.php'); ?>

    
<?php } ?>