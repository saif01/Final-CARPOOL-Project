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
                    <div class="col-lg-8 d-none d-xl-block ">
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
                                        <li><a href="user-history">My Booking History</a></li>
                                        
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
 
    <!--== Header Area End ==-->
