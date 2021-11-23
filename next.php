<?php
  require ('top.php');

  $max_id=mysqli_query($con,"SELECT max(id)as id FROM `rewards`");
  $row=mysqli_fetch_assoc($max_id);

  $id=$row['id'];


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
									<h2 class="title__line--6">Step-2</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action=""  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<select name="gift" class="form-control" required> 
												<option value="">Plese Select your gift..</option>
												<option>CashBack(20%)</option>
												<option>Feodora Product(upto Rs 200 )</option>
												<option>30% off for next purchase</option>

											</select>
										</div>

                                        <span class="field_error" id="name_error"></span>
									</div>
								
								

									

									<div class="single-contact-form">
										<div class="contact-box">
								
											
										</div>
										
									</div>
								
									
									<div class="contact-btn">
										<input type="submit" name="submit" value="Finished" class="fv-btn">

										
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
     	$gift=get_safe_value($con,$_POST['gift']);
       


        

         $res=mysqli_query($con,"UPDATE `rewards` SET `gift` = '$gift' WHERE `rewards`.`id` = '$id'");

	if($res){
		echo '<script>';
        //echo 'alert("Registration Successfull , please login");';
        echo 'window.location.href="rewardthanku.php";';
       echo '</script>';

	}else{
		echo '<script>';
        echo 'alert("Something Wrong");';
        echo 'window.location.href="next.php";';
       echo '</script>';

	}
      
            }

   ?>
       