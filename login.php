<?php
  require ('top.php');

  if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes') {
  	echo '<script>';
    echo 'window.location.href="index.php"';
  	echo '</script>';
  }
?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
           
          
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/aurveda.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login/Register</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form action="user_login.php" id="contact-form"  method="post" >
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="login_email" placeholder="Your Email*" style="width:100%" required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password" minlength="6" placeholder="Your Password*" style="width:100%" required>
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="submit" class="fv-btn"  >Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action="user_login.php"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" id="name" name="name" placeholder="Your Name*" style="width:100%" required>
										</div>

                                        <span class="field_error" id="name_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" id="email" name="email" placeholder="Your Email*" style="width:100%" required>
										</div>

                                        <span class="field_error" id="email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" id="mobile" maxlength="10"  pattern="[0-9]{10}" name="mobile" placeholder="Your Mobile*" style="width:100%" required>
										</div>
                                        <span class="field_error" id="mobile_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" id="password" name="password" minlength="6" placeholder="Your Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="password_error"></span>
									</div>
									
									<div class="contact-btn">
										<input type="submit" name="reg" value="Register" class="fv-btn">
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
      require('fotter.php')

   ?>
       