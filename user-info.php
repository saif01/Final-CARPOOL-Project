<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['logIn_id'])==0)
  { 
header('location:index');
}
else{  

$user_name= $_SESSION['logIn_id'];
$user_id= $_SESSION['user_id'];

 include('include/header.php');
 include('include/social_link_top.php');
 include('include/manu.php');
 include('db/config.php');
 
$driver_id=$_GET['driver_id'];
$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id' ");
$value = $query->fetch_assoc();


?>
<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2> 
                        <?php echo htmlentities($_SESSION['logIn_id']) ?>'s Profile Info.</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
 <!--== About Page Content Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                
            </div>

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-8 col-md-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content " >
                            	<ul class="package-list">
                            	<li> <h3>ID : <?php echo $user_name; ?></h3> </li>
                                <li> Full Name : <?php echo $value['user_name']; ?> </li>
                                <li> Department : <?php echo $value['user_department']; ?> </li>
                            	<li> Contract Number : <?php echo $value['user_contract']; ?> </li>
                            	<li> Office ID : <?php echo $value['user_officeId']; ?> </li>
                            	<li> Status : <?php 
                                $st= $value['user_status']; 
                                if ($st==1) {
                                    echo 'Active';
                                }
                                else{

                                    echo 'Deactive';
                                }

                                ?> </li>
                            	<li> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-4 col-md-12">
                    <div class="about-image text-center">
                        
                      <img src="admin/p_img/userImg/<?php echo($value['user_img']);?>" class="img-responsive img-thumbnail rounded" alt="Image" />
                    </div>
                </div>
                <!-- About Video End -->
            </div>

            <!-- About Fretutes Start -->
            <div class="about-feature-area">
                <div class="row">
                    <!-- Single Fretutes Start -->
                    <div class="col-lg-12">
                        <div class="about-feature-item active">
                            <i class="fa fa-car"></i>
                            
                        </div>
                    </div>
                    <!-- Single Fretutes End -->

                </div>
            </div>
            <!-- About Fretutes End -->
        </div>
    </section>
    <!--== About Page Content End ==-->



<?php include('include/footer.php');
// session ending bracket
 } ?>