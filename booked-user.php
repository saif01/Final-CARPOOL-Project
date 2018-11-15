<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  ?>


<?php include('include/header.php');?>
<?php include('include/manu.php');?>
<?php include('db/config.php');?>

<?php   

$user_id=$_GET['user_id'];
$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id` ='$user_id' ");
$value = $query->fetch_assoc();

?>

 <!--== About Page Content Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>About <?php echo $value['user_name']; ?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>User Profile</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-8">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content " >
                            	<ul class="package-list">
                            	<li> <h3>Name : <?php echo $value['user_name']; ?></h3> </li>
                            	<li> Contract Number : <?php echo $value['user_contract']; ?> </li>
                            	<li> User Office ID : <?php echo $value['user_officeId']; ?> </li>
                            	<li> User Status : <?php $st=$value['user_status']; 
                                    if ($st==1) {
                                        echo "Active";
                                    }else{
                                        echo "Deactive";
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
                <div class="col-lg-4">
                    <div class="about-image">
                        
                      <img src="admin/p_img/userimg/<?php echo($value['user_img']);?>" class="img-responsive" alt="Image" />
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