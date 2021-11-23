 <div class="container-fluid" id="newArrRow">
     <div class="row arri-row" style="padding-top: 10px">
         <div class="title-container">
             <div class="title-div">
                 New Launch
             </div>
             <div class="viewall-x">
                 <div class="k">
                     <a href="newarival.php">view all</a>
                 </div>
                 <div class="slide-left slide-arrow">
                     <i class="fa fa-chevron-left" aria-hidden="true"></i>
                 </div>
                 <div class="slide-right slide-arrow">
                     <i class="fa fa-chevron-right" aria-hidden="true"></i>
                 </div>
             </div>
         </div>
         <div class="product-container">

             <div #swiperRef="" class="swiper newArrival box-height">
                 <div class="swiper-wrapper">

                     <!-- loop -->
                     <?php
                       $sql=mysqli_query($con,"SELECT * FROM `product` WHERE `new_launch`=1");
                     while($list=mysqli_fetch_assoc($sql)){
                    ?>
                     <a href="product.php?id= <?php echo $list['id'] ?>" class="swiper-slide shadow-sm new-slide">
                         <div class="product-img camera-icony">
                             <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="product images">
                         </div>
                         <div class="product-des">
                             <div class="pro-name"><?php echo $list['name'] ?></div>
                             
                             <div class="price">
                                 <div class="selling-price">
                                     Rs. <?php  echo $list['price'] ?>
                                 </div>
                                 <div class="mrp">
                                    
                                 </div>
                             </div>
                         </div>
                     </a>
                     <?php
                            }
                        ?>
                     <!-- end loop  -->
                 </div>

             </div>

         </div>
     </div>
 </div>