
<?php

require ('top.php');
//$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_product($con,100,'','');


   
     ?>
       
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
                                  <span class="breadcrumb-item active">Recently Viewed</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12    col-sm-12 ">
                        <div class="htc__product__rightidebar">
                           
                            <!-- Start Product View -->
                            <div class="row">

                                  
                                   
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->

                                        <?php 
                                            // catagori product component
                                            require "phpComponent/rview.php";
                                        ?>
                    

                                        <!-- End Single Product -->
                                        
                                    </div>
                                  

                            </div>
                            <!-- End Product View -->

                        </div>
                          
                    </div>
                     
                </div>
            </div>
        </section>
        
       <?php

           require ('fotter.php');
       ?>