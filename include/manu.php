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



.notification:hover {
  background: #ffd000;
}

.notification{
 position: absolute;
  top: -5px;
  right: -10px;
  padding:3px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  margin-right: 10px;
}
 </style>

  <!--************* google material icons ****************-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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
                               
                            <li>
                                <?php

      include('db/config.php');
      date_default_timezone_set('Asia/Dhaka');// change according timezone            
      $currentdate = date( 'Y-m-d' );                
            $user_id=$_SESSION['user_id'];
            $notify=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' AND `comit_st`='' AND `boking_status`='1' AND date(`start_date`) <= date('$currentdate') ");
                  $number=mysqli_num_rows($notify);
                  ?>
                                   
                    <a href="user-notclosed-car" style="float:right;" >
                      <?php
                      if ($number>0) {?>
                        <span class="notification"><?php echo $number; ?></span>
                      <?php }?>
                      
                      <i class="material-icons" style="font-size:32px;">notifications_active</i>
                    </a>   
                                        
                                   

                            </li>

                                <li class="active"> <a href="dashbord"> Home</a>
                                    
                                </li>
                
                                   <li>                             
                                  <a href="#">
                                   
                                    <?php
                        include('db/config.php');            
                        $logIn_id=$_SESSION['logIn_id'];
                        $query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `logIn_id`='$logIn_id'");
                        $row2=$query2->fetch_assoc();
                         ?>                                     
                        <img src="admin/p_img/userImg/<?php echo($row2['user_img']);?>" class="img-responsive r_user" alt="Image" />  </a>
                                    <ul>
                                        <li><a href="user-booked-car">My Booked Car</a></li>
                                        <li><a href="user-notclosed-car">Not Closed Comment</a></li>
                                        <li><a href="user-info">My Profile</a></li>
                                        <li><a href="user-history">My Booking History</a></li>                                        
                                         <li><a href="user-changePass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 
                                 </li>                                

                                  <li><a href="#"> Car List </a>
                                    <ul>
                                        <li><a href="car-list-reg">Regular Car</a></li>
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
