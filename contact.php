<?php
 include ('connection.inc.php');
  require ('top.php');


  if(isset($_POST['submit'])){

    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['mobile']);
    $mobile=get_safe_value($con,$_POST['email']);
    $message=get_safe_value($con,$_POST['message']);

    $result=mysqli_query($con,"INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES (NULL, '$name', '$email', '$mobile', '$message', current_timestamp())");

    if($result){

?>
       <script>
       swal("Good job!", "Our Customer care Contact You!", "success");
      </script>
<?php
    }else{

        echo '<script>' ;
        echo 'swal("Failed!", "Something Went wrong!", "error");';
        echo' </script>';


    }
  }
?>

       
          
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/aurveda.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Contact Us</span>
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

            <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">SEND A MAIL</h2>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <form id="contact-form" action="contact.php" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" id="name" name="name" placeholder="Your Name*">
                                        <input type="email" id="email" name="email" placeholder="Mail*">
                                        <input type="text" id="mobile" name="mobile" placeholder="Mobile*">
                                    </div>
                                </div>
                              
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea id="message" name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <input type="submit" name="submit" class="fv-btn" value="SEND MESSAGE">
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>


                    </div>
                       
                </div>
              
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
    


    <?php
      require ('fotter.php');
    ?>


 


