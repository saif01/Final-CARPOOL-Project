<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
  { 
header('location:index');
}
else{  
 
include('db/config.php');

$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['username'];
$car_id=$_GET['car_id'];
//  All data fetch from database by ID
$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id` = $car_id ");
//store all data as an array in a variavle.
$value = $query->fetch_assoc();
// echo $aaa;
// echo "<pre>";
// print_r($value);
$car_name= $value['car_name'];
$car_nunber=$value['car_namePlate'];

$car_img=$value['car_img1'];

// echo $aaa;
// echo $user_id;
// echo $car_id;


if (isset($_POST['submit'])) {
    $start_date= $_POST['start_date'];
    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
    $end_book= $_POST['end_date'] . ' ' . $_POST['return_time'];  

    //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($start_book);
        $ts2    =   strtotime($end_book);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = round($seconds/(60*60*24));
        //$days2 = $seconds/(60*60*24);
  //Start Time Subtraction and convert to days.
        $currentTime = date( 'Y-m-d h:i:s', time () );   
      $ts3   =   strtotime($currentTime);
      $ts4    =   strtotime($start_book);
      $seconds    = abs($ts3 - $ts4); # difference will always be positive
      $afterdays = round($seconds/(60*60*24));

        // if ($days>=7) {
            
        // ?> <script>
        //     alert('You can not Book More than Saven days   !!!!');
        //     </script> <?php
        // }

         // if( $afterdays >= '30')
         //        {
         //          ?> <script>
         //    alert('You can not Book after 30 Dates from Now!!');
         //    </script> <?php
         //        }

         if ($start_book>$end_book) {
        ?> <script>
             alert('Start Time Cannot More Than End Time!!.');
            </script> <?php
      }


        elseif(date($start_date) < date('Y-m-d'))
                {
                  ?> <script>
            alert(' You can not Book Previous date !!!!');
            </script> <?php
                }

        
        else{

            $sql=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND `boking_status`='1' AND '$start_book' BETWEEN `start_date` AND `end_date` ");


                $result=mysqli_num_rows($sql);

                if ($result > 0) 
                {
                    ?>
                        <script>

                          

                        alert('This Car Already Booked At this Date  !!!!');
                        //window.open('car-list3.php','_self');
                        //location.reload();
                        </script>
                    <?php


                }

                else
                {

                   
                    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
                    $end_book= $_POST['end_date'] . ' ' . $_POST['return_time'];

                    $location=$_POST['location'];

                    $status=1;


                    $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$user_name','$car_name','$car_nunber','$car_img','$start_book','$end_book','$location','$days','$status')");

                    echo "<script>alert('Your Booking Completed successfully'),
							window.onunload = refreshParent;

							    function refreshParent() {
							        window.opener.location.reload();
							    }
							 
							window.close(); </script>";							
            
                   }

        }


 } ?>


<?php include('include/header.php');?>
<?php //include('include/manu.php');?>


<script>
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


function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "data-count.php",
data:'check_value='+$("#check_value").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}



                </script>

<div id="alertoverlay"></div>
<div id="alertbox">
  <div>
    <div id="alertboxhead"></div>
    <div id="alertboxbody"></div>
    <div id="alertboxfoot"></div>
  </div>
</div>
 <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Car Booking Entry <span id="user-availability-status1" style="font-size:12px;"></span>
                            </h3>
							<form action="" method="POST" onsubmit="return Validate(this);">
								<div class="name">
									<div class="row">
										<div class="col-md-6">
											<label>Pic-Up DATE:
											<input type="date" id="date1"  name="start_date" placeholder="Pick Up Date" required />
                                    		</label>
										</div>
										<div class="col-md-6">
                                            <span id="user-availability-status1" style="font-size:12px;"></span>
											<label>Return DATE:	
											<input type="date"  name="end_date" id="check_value" onBlur="userAvailability()" placeholder="Return Date" required />                                       
                                        	</label>                                     
										</div>
									</div>

								</div>
								<!-- <div class="username">
									<label>Location:	
                                        <input type="text"  name="location" placeholder="Where You Go" />
                                        	</label>
								</div> -->

								<div class="row">
										<div class="col-md-6">
											<label>Location: </label>
                                   <!--  <input type="text"  name="location" placeholder="location" /> -->
                                   <select name="location" required> 
                                    <option value="" >Select Location</option>
										<?php
											$query2=mysqli_query($con,"SELECT `location` FROM `location` ORDER BY `location`");

													while ($row2 = mysqli_fetch_array($query2))
													{
										echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
										}
										?>

                                   </select>
                                    		
										</div>

							<div class="col-md-6">


											<label>Booking Time: </label>
                                        <select name="for_car" class="" id="time_show" onChange="return show();" >
                                                <option value="">Full day </option>   
                                                <option value="manual_input">Manual Input </option>
                                        </select>
                                        	

                              <div id="manual_input_show" class="name" style=" display:none; ">
                                    <div class="row">
                                        <div >
                                            <label >Start time -:
                                    <select id="first" name="start_time"> 
                                    		<option value="01:00:00">Select Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            <option value="18:00:00">5.00 PM </option>
                                            <option value="18:30:00">5.30 PM </option>
                                            <option value="19:00:00">6.00 PM </option>
                                                                                  
                                         </select>
                                            </label>
                                        </div>
                                        <div >
                                            <label>Return Time 
                                        <select id="second" name="return_time"> 
                                        	<option value="23:59:00">Select Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            <option value="18:00:00">5.00 PM </option>
                                            <option value="18:30:00">5.30 PM </option>
                                            <option value="19:00:00">6.00 PM </option>
                                                                                  
                                         </select>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
							</div>
						</div>

								

								<div class="log-btn">
									
									<button type="submit"  name="submit" class="fa fa-check-square"> Book Car</button>
								</div>
							</form>
                		</div>
                		

                		
                	</div>



                </div>

                
        	</div>
        </div>
    </section>



    <!--=======================Javascript============================-->

<?php include('include/footer.php'); ?>

<!-- <script type="text/javascript">
        function Validate(objForm) {
            if(document.getElementById("first").value == document.getElementById("second").value)
            {
    alert("Can't Input Same Time !! ");
    return false;
            }
            else if(document.getElementById("first").value >= document.getElementById("second").value)
            {
    alert("Can't Put Lower Time from Start Time !! ");
    return false;
            }
            return true;
        }

</script> -->





<?php } ?>