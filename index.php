<?php include('db/config.php');
require('assets/coustom/UserInfo.php');

session_start();
error_reporting(0);


if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

$ret=mysqli_query($con,"SELECT `user_name`, `user_pass` FROM `user` WHERE `user_name`='$username' AND `user_pass` = '$password' ");
   
$num=mysqli_fetch_array($ret);
if($num>0)
{   

    $ret= mysqli_query($con,"SELECT * FROM `user` WHERE `user_name` ='$username'");
    while($row=mysqli_fetch_array($ret))
                {   

                    $user_id=$row['user_id'];
                    $st=$row['user_status'];

                    if ($st==1) 
                    {  
                        $_SESSION['user_id']=$user_id;
                        $_SESSION['username']=$_POST['username'];
                        $_SESSION['id']=$num['id'];
                        $ip= UserInfo::get_ip();
                        $os= UserInfo::get_os();
                        $browser= UserInfo::get_browser();
                        $device= gethostname();
                              
                        //$hostname=$_ENV['COMPUTERNAME'];                      
                        $status=1;

                        $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['username']."','$user_id','$ip','$os','$browser','$device','$st')");
                         
                                       
                         header("Location: dashbord");
                        exit();

                    
                        }

                        elseif ($st==0)
                    {   

                        $_SESSION['username']=$_POST['username'];
                        $_SESSION['id']=$num['id'];
                        $ip= UserInfo::get_ip();
                        $os= UserInfo::get_os();
                        $browser= UserInfo::get_browser();
                        $device= gethostname();
                              
                        //$hostname=$_ENV['COMPUTERNAME'];                      
                        $status=1;

                        $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['username']."','$user_id','$ip','$os','$browser','$device','$st')");

                        echo "<script>
                        alert('Your Account Has been blocked .Please contact Admin  !!!');
                        window.open('index','_self'); </script>";

                    }

                    }

                }
else
    {
        $_SESSION['errmsg']="Invalid username or password";       
        $_SESSION['username']=$_POST['username'];
      
         $ip= UserInfo::get_ip();
         $os= UserInfo::get_os();
         $browser= UserInfo::get_browser();
         $device= UserInfo::get_device();
         $status=0;                         
         $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['username']."','$ip','$os','$browser','$device','$st')");

         header("location:index");
        exit();
       
     }

}

?>


<?php include('include/header.php');    
 include('include/social_link_top.php');  ?>
<style type="text/css">
     .roundSaif {
   /* border-radius: 10px 20px;*/
   border-radius:30%;
    border: 2px solid #ffd000;
    padding: 1px; 
    width: 100px;
    height: 100px;
   /* margin-left: 45%;*/

    overflow: hidden;
    position: absolute;
    top: calc(100px/2);
    left: calc(50% - 50px);
}
 </style>
   
                    

 

    <!--== Slider Area Start ==-->
    <section id="slider-area">
        <!--== slide Item One ==-->
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="book-a-car">
                            <a href="index.php" >
                            <img src="assets/img/logo.png" class="roundSaif" alt="CPB" >
                        </a>
                            <form action="" method="post">
                                <!--== Pick Up Location ==-->
                               <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span> 

                                <!--== Pick Up Date ==-->

                                <div class="pick-up-date book-item">
                                    <h4>User Name:</h4>
                                    <input type="text" name="username" placeholder="--Username--" required="">

                                    <div class="return-car">
                                        <h4>Password:</h4>
                                        <input type="password" name="password" placeholder="--Password--" required="">
                                    </div>
                                </div>
                                <!--== Pick Up Location ==-->

                                

                                <div class="book-button text-center">
                                    <button type="submit"  name="submit" class="book-now-btn">LogIn</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h1>ARE YOU BOOKING A CAR TODAY ??</h1>
                                    <p>FOR COMFORTABLE CAR... <br> Please Log In First.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==--> 
               
<?php include('include/footer.php'); ?>