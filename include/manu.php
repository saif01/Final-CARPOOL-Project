 <style type="text/css">
     .roundSaif {
    border-radius: 10px 20px;
    border: 2px solid #ffd000;
    padding: 1px; 
    width: 50px;
         height: 50px;}

    .r_user {
    border-radius:50%;
    border: 2px solid #ffd000;
    
    width: 40px;
    height: 30px;
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


<!--
                               <li><a href="dashbord"> <img src="admin/p_img/userImg/download.png" class="r_user"/> </a>
                                    
                                </li>
-->
                              
                               
                        
                                   <li>                             
                                  <a href="#">
                                   
                                    <?php
                        include('db/config.php');            
                        $user_name=$_SESSION['username'];
                        $query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_name`='$user_name'");
                        $row2=$query2->fetch_assoc();
                         ?>
                                     
                                       <img src="admin/p_img/userImg/<?php echo($row2['user_img']);?>" class="img-responsive r_user" alt="Image" />  </a>
                                    <ul>
                                        <li><a href="user-booked-car">My Booked Car</a></li>
                                        <li><a href="user-noncommented-car">None Commented </a></li>
                                        <li><a href="user-info">My Profile</a></li>
                                        <li><a href="user-history">My Booking History</a></li>
                                        
                                         <li><a href="user-changePass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 

                                 </li>
                                 

                                  <li><a href="car-list3"> Car List </a>
                                    <ul>
                                        <li><a href="car-list3">Regular Car</a></li>
                                        <li><a href="car-list-temp">Temporary Car</a></li>
                                        
                                    </ul>
                                </li>

                                 <!-- <li><a href="about.html">About</a></li> -->
                                  <li><a href="logout">Log Out</a></li>
                               
                               
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
