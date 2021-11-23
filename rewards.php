<?php
  require ('top.php');


?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
           
          
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
   
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="bg__white">
            <div class="container">
                <div class="row">

                	<div class="col-md-3">
                		
                	</div>
				
                 		<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Step-1</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action=""  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" id="name" name="name" placeholder="Your Name*" style="width:100%" required>
										</div>

                                        <span class="field_error" id="name_error"></span>
									</div>
								
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" id="mobile" maxlength="10"  pattern="[0-9]{10}" name="mobile" placeholder="Your Mobile*" style="width:100%" required>
										</div>
                                        <span class="field_error" id="mobile_error"></span>
									</div>

										<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" id="email" name="email" placeholder="Your Email" style="width:100%" >
										</div>

                                        <span class="field_error" id="email_error"></span>
									</div>

									<div class="single-contact-form">
										<div class="contact-box">
											<p style="font-family:Poppins">(Only 1 more step to get your reward)</p>
											
										</div>
										
									</div>
								
									
									<div class="contact-btn">
										<input type="submit" name="submit" value="Next" class="fv-btn">
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
   

   <?php
      require('fotter.php');


      if (isset($_POST['submit'])) {

     	$name=get_safe_value($con,$_POST['name']);
        $mobile=get_safe_value($con,$_POST['mobile']);
        $email=get_safe_value($con,$_POST['email']);

         $result=mysqli_query($con,"SELECT * FROM `rewards` where mobile='$mobile'");
         $row=mysqli_num_rows($result);

    if ($row>0) {
    	echo '<script>';
        echo 'alert("This Number Already Exists");';
        echo 'window.location.href="rewards.php";';
       echo '</script>';
    	
    }

     else{
        

         $res=mysqli_query($con,"INSERT INTO `rewards` (`id`, `name`, `mobile`, `email`, `gift`, `update_at`, `status`) VALUES (NULL, '$name', '$mobile', '$email', NULL, current_timestamp(), '0')");

          // $_SESSION['username'] = $username;

	if($res){
		echo '<script>';
        //echo 'alert("Registration Successfull , please login");';
        

        echo 'window.location.href="next.php";';
        

       echo '</script>';

	}else{
		echo '<script>';
        echo 'alert("Registration failed");';
        echo 'window.location.href="reward.php";';
       echo '</script>';

	}
}

      
            }

   ?>
       