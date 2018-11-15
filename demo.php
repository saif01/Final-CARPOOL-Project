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


     ?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Cardoor - Car Rental HTML Template</title>

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


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

 <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> E-236/007, Chandra, Gazipur.
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <!-- <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +88 017 000 11 22
                    </div> -->
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Sat-Thu 09.00 AM - 6.00 PM
                    </div>
                    <!--== Single HeaderTop End ==-->

                    
                </div>
            </div>
        </div>
<style type="text/css">
     .roundSaif {
    border-radius: 10px 20px;
    border: 2px solid #73AD21;
    padding: 1px; 
    width: 50px;
    height: 50px;
}
 </style>
        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="dashbord" class="logo">
                            <img src="assets/img/logo.png" class="roundSaif" alt="CPB" >
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class="active"><a href="dashbord">Home</a>
                                    
                                </li>
                                <li><a href=""> Car List </a>
                                    <ul>
                                        <li><a href="car-list">Car List</a></li>
                                        <li><a href="car-list2">Car List 2</a></li>
                                        <li><a href="car-list3">Car List 3</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a href="about.html">About</a></li> -->
                                

                                 <!-- <li><a href="booking"> Booking</a></li> -->
                                 <li><a href="user-info"> <?php echo htmlentities($_SESSION['username']); ?></a>
                                    <ul>
                                        <li><a href="user-booked-car">My Booked Car</a></li>
                                        <li><a href="user-noncommented-car">None Commented </a></li>
                                        <li><a href="user-info">My Profile</a></li>
                                         <li><a href="user-changePass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 

                                 </li>
                                                               
                               
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->




<!-- Main Content Start -->

    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">

       
                





         
        </div>
    </div>
    <!--== Car List Area End ==-->
</div>
  






 <!--== Footer and Common js File start ==-->
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
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
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
 <!--== Footer and Common js File end ==-->

 <?php } ?>