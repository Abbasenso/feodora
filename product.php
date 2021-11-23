<?php
ob_start();
   require ('top.php');

   ?>
   <style type="text/css">

#multiple_images{
    margin-top: 10px;

}

#multiple_images img{
    width: 15%;
    margin-left: 10px;
}

</style>

   <?php

            $product_id=mysqli_real_escape_string($con,$_GET['id']);

            if ($product_id > 0) {
            
            $get_product=get_product($con,'','',$product_id);
            // prx($get_product);
         }else{

            ?>
            <script type="">
                window.location.href='index.php'
            </script>

            <?php
         }
         // multiple image
         $resMultipleImages=mysqli_query($con,"select product_image from product_images where product_id='$product_id'");
         $multipleImages=[];
         if (mysqli_num_rows($resMultipleImages)>0) {
          
         while ($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)) {
             $multipleImages[]=$rowMultipleImages['product_image'];
         }
     }

     //pr($multipleImages);
 if (isset($_POST['submit'])) {
     //prx($_POST);
   $rating=get_safe_value($con,$_POST['rating']);
   $review=get_safe_value($con,$_POST['comment']);
   date_default_timezone_set('Asia/Kolkata');
    $added_on = date( 'Y-m-d h:i:s' );
   
    mysqli_query($con,"INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES (NULL, '$product_id', '".$_SESSION['USER_ID']."', '$rating', '$review', '1', '$added_on')");

       
       header('location:product.php?id='.$product_id);
 }
      

 $product_review_res=mysqli_query($con,"select users.name as name,product_review.id as id,product_review.rating as rating,product_review.review as review,product_review.added_on as added_on from users,product_review where product_review.status=1 and product_review.user_id=users.id and product_review.product_id='$product_id'");


 
?>
        <div class="body__overlay"></div>
     
           
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
    
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active " id="img-tab-1">
                                            <img data-origin="<?php echo 'media/product/'.$get_product['0']['image'];  ?>" src="<?php echo 'media/product/'.$get_product['0']['image'];  ?>" alt="full-image">
                                        </div>

                                        <?php if(isset($multipleImages[0])){ ?>
                                        <div id="multiple_images">
                                        <?php  foreach ($multipleImages as $list) {
                                            echo "<img src='".PRODUCT_MULTIIMAGE_SITE_PATH.$list."' onclick=showMultipleImage('".PRODUCT_MULTIIMAGE_SITE_PATH.$list."')>";
                                        } 

                                         ?>
                                        
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_product['0']['name']?></h2>
                                <ul  class="pro__prize">
                                   
                                    <li><?php echo 'Rs '.$get_product['0']['price']?></li>
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <?php
                                        $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
                                        
                                        $pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
                                        
                                        $cart_show='yes';
                                        if($get_product['0']['qty']>$productSoldQtyByProductId){
                                            $stock='In Stock';          
                                        }else{
                                            $stock='Not in Stock';
                                            $cart_show='';
                                        }
                                        ?>
                                        <p><span>Availability:</span> <?php echo $stock?></p>
                                    </div>
                                    <div class="sin__desc">
                                        <?php
                                        if($cart_show!=''){
                                        ?>
                                        <p><span>Qty:</span> 
                                        <select id="qty">
                                            <?php
                                            for($i=1;$i<=$pending_qty;$i++){
                                                echo "<option>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
                                        </ul>
                                    </div>
                                    
                                      <?php  

                                           $info=$get_product['0']['info'];

                                             if ($info!='') {
                                                 echo "<p class='pro__info' style='color: red;'> $info </p>";
                                             }
                                             else{


                                             }
                                       ?>
                                   
                                    
                                    </div>
                                    
                                </div>
                                <?php
                                if($cart_show!=''){
                                ?>
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add','redir')">Add to cart</a>
                                <a class="fr__btn2" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add','yes')">Buy Now</a>
                                <?php } ?>
                               <div  style="margin-top: 10px;width: 150px;">
                                <a href="https://www.facebook.com/share.php?u=<?php  echo $meta_url ?>" target="_blank"><img src="images/icons/facebook.png" style="width:30%;"></a>
                                <a href="https://api.whatsapp.com/send?text=<?php  echo urldecode($get_product['0']['name'] )?><?php echo $meta_url ?>" target="_blank"><img src="images/icons/whatsapp.png" style="width:20%;margin-left: 5px;"></a>
                                <a href="https://www.twitter.com/share?text=<?php  echo $get_product['0']['name'] ?>&url=<?php echo $meta_url ?>" target="_blank"><img src="images/icons/image.png" style="width:20%;margin-left: 10px;"></a>

                               </div>
                                 
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        
        
          <!-- Start Product info -->



        <?php 

           $sql= mysqli_query($con,"SELECT * FROM `product_info` where product_id='$product_id' and  status=1");

           $number=mysqli_num_rows($sql);

           //echo $number;
           
             if ($number >=1 ) { 

                  

                $row=mysqli_fetch_assoc(mysqli_query($con,"SELECT MIN(id) as id from `product_info` WHERE product_id='$product_id';"));

                $id=$row['id'];
               // echo $id;
                  
                  $sql= mysqli_query($con,"SELECT * FROM `product_info` where product_id='$product_id' and  id='$id'");

                   $row=mysqli_fetch_assoc($sql);


               
               ?>
             <section class="mob_view">
   <div class="container">
      <div class="row " style="padding: 20px 10px;">
         <div class="col-md-6 detail">
            <div class="about-cont feature-row__text">
               <h2 id="backtoform" class="h3 product-single__subtitle"> <?php echo $row['heading1'] ?></h2>
               <h2><?php echo $row['heading2']  ?></h2>
               <div class="show-read-more">
                
                 
                  <p> <?php echo $row['description'] ?></p>
               </div>
            </div>
         </div>
         <div class="col-md-6 ">
            <div class="about-img">
               <img class="lazy"  style="height:400px;width: 400px;"  src="<?php  echo 'images/product_info/'.$row['image'] ?>" style="">
            </div>
         </div>
      </div>


      <?php
      $id=$id+1;

      $sql= mysqli_query($con,"SELECT * FROM `product_info` where product_id='$product_id' and  id='$id'");

      $row=mysqli_fetch_assoc($sql);



      ?>
      <hr>
       <div class="row " style="padding: 20px 10px;">

         <div class="col-md-6 ">
            <div class="about-img">
               <img class="lazy"  style="height:300px;width: 300px;"  src="<?php  echo 'images/product_info/'.$row['image'] ?>" style="">
            </div>
         </div>
         <div class="col-md-6 detail">
            <div class="about-cont feature-row__text">
               <h2 id="backtoform" class="h3 product-single__subtitle"> <?php echo $row['heading1'] ?></h2>
               <h2><?php echo $row['heading2']  ?></h2>
               <div class="show-read-more">
                
                 
                  <p> <?php echo $row['description'] ?></p>
               </div>
            </div>
         </div>
        
      </div>


      <?php
      $id=$id+1;

      $sql= mysqli_query($con,"SELECT * FROM `product_info` where product_id='$product_id' and  id='$id'");

      $row=mysqli_fetch_assoc($sql);



      ?>
      <hr>
       <div class="row " style="padding: 20px 10px;">

         
         <div class="col-md-6 detail">
            <div class="about-cont feature-row__text">
               <h2 id="backtoform" class="h3 product-single__subtitle"> <?php echo $row['heading1'] ?></h2>
               <h2><?php echo $row['heading2']  ?></h2>
               <div class="show-read-more">
                
                 
                  <p> <?php echo $row['description'] ?></p>
               </div>
            </div>
         </div>

         <div class="col-md-6 ">
            <div class="about-img">
               <img class="lazy"  style="height:300px;width: 300px;"  src="<?php  echo 'images/product_info/'.$row['image'] ?>" style="">
            </div>
         </div>
        
      </div>

        <?php
      $id=$id+1;

      $sql= mysqli_query($con,"SELECT * FROM `product_info` where product_id='$product_id' and  id='$id'");
      $number=mysqli_num_rows($sql);

      $row=mysqli_fetch_assoc($sql);

      if ($number==1) {
          // code...
      



      ?>
      <hr>
       <div class="row " style="padding: 20px 10px;">

         <div class="col-md-6 ">
            <div class="about-img">
               <img class="lazy"  style="height:300px;width: 300px;"  src="<?php  echo 'images/product_info/'.$row['image'] ?>" style="">
            </div>
         </div>
         <div class="col-md-6 detail">
            <div class="about-cont feature-row__text">
               <h2 id="backtoform" class="h3 product-single__subtitle"> <?php echo $row['heading1'] ?></h2>
               <h2><?php echo $row['heading2']  ?></h2>
               <div class="show-read-more">
                
                 
                  <p> <?php echo $row['description'] ?></p>
               </div>
            </div>
         </div>

         
        
      </div>

      <?php 

       }

       else{
          // die($row);
       }


      ?>





  

   </div>
</section>



        <?php

     
             
         

     }else{

           // echo "nothing reviewed";
         }
        ?>
  

          
   <!--   End product infos   -->
       
        
        
        
        
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                            <li role="presentation" class="description active"><a href="#review" role="tab" data-toggle="tab">Review</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <p><?php echo $get_product['0']['description'] ?></p>
                                  
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <br>
                            <div role="tabpanel" id="review" class="pro__single__content tab-pane fade in active">
                             <article class="row">
                                 <div class="col-md-12 col-sm-12">
                                     
                                     <div class="panel"><h3>Enter Your Review</h3> <br>

                                        <?php 

                                            if (isset($_SESSION['USER_LOGIN'])) {
                                                     
                                         ?>
    
                                       <div class="col-md-12">
                                        <form action="" method="post">
                                         <div class="row">
                                         <div class="col-md-12">   
                                            <select class="form-control" name="rating" required>
                                                <option value="">Select Rating</option>
                                                <option>Worst</option>
                                                <option>Bad</option>
                                                <option>Good</option>
                                                <option>Very Good</option>
                                                <option>Fantastic</option>
                                                
                                            </select>
                                            </div>
                                            </div>
                                    <br>
                                        <div class="row">
                                         <div class="col-md-12">   
                                           <textarea name="comment" class="form-control" cols="50" id="new_review" placeholder="Enter your Review" rows="5"></textarea>
                                            </div>
                                            </div>
                                      <br>
                                            <input type="Submit" name="submit" value="Save" class="btn btn-success">

                                        </form>
                                           
                                       </div>

                                     </div>
                               <?php
                           }else{
                            echo "<span style='font-size:16px;color:#c43b68;'>Please <a href='login.php'>Login </a>to submit your Review</span>";
                           }
                                 ?>
                                 </div>
                             </article>
                            </div>

                            <br>
                          <?php if (mysqli_num_rows($product_review_res) > 0) {

                            while ($row=mysqli_fetch_assoc($product_review_res)) {
                            
                         ?>
                            <article class="row">
                                <div class="cpl-md-12 clo-sm-12">
                                    <div class="panel panel-default arrow left">
                                        <div class="panel-body">
                                            <header class="text-left">
                                                
                                                <div><span class="comment-rating"><?php echo $row['rating']  ?></span>(<?php echo $row['name'] ?>)</div>
                                                <time class="comment-date">
                                                    <?php 

                                                    $added_on=strtotime($row['added_on']);
                                                    echo date('d/m/Y',$added_on);  

                                                     ?>
                                                        
                                                    </time>
                                            </header>
                                            <div class="comment-post">
                                                <p><?php  echo $row['review'] ?></p>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </article>

                            <?php
                        }
                               }else{
                            echo "<span style='font-size:16px;color:#c43b68;'>No Review is there</span>";
                           }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="recentlyViewed" class="container">
            <?php
                require "phpComponent/recentlyViewed.php";
            ?>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
       <?php
            
            require ('fotter.php');
            ob_flush();
       ?>

       <script type="text/javascript">
           
           function showMultipleImage(im){

            jQuery('#img-tab-1').html("<img src='"+im+"' data-origin='"+im+"'/>");
             jQuery('.imageZoom').imgZoom();

           }
       </script>

       <script type="text/javascript">
            jQuery('.imageZoom').imgZoom();
       </script>