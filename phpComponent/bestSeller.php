<div class="container-fluid" id="newArrRow" style="margin-bottom: 10px">
     <div class="row arri-row">
         <div class="title-container">
             <div class="title-div">
                 Featured Products
             </div>
             <div class="viewall-x">
                 <div class="k">
                     <a href="bestseller.php">view all</a>
                 </div>
                 <div class="slide-left-b slide-arrow">
                     <i class="fa fa-chevron-left" aria-hidden="true"></i>
                 </div>
                 <div class="slide-right-b slide-arrow">
                     <i class="fa fa-chevron-right" aria-hidden="true"></i>
                 </div>
             </div>
         </div>
         <div class="product-container">

             <div #swiperRef="" class="swiper newArrival box-height" id="bestSeller">
                 <div class="swiper-wrapper">

                     <!-- loop -->
                     <?php
                        $get_product=get_product($con,15,'','','','','yes');
                        foreach ($get_product as $list) {
                    ?>
                     <a href="product.php?id= <?php echo $list['id'];?>" class="swiper-slide shadow-sm new-slide">
                         <div class="product-img camera-icony">
                             <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="not found">
                         </div>
                         <div class="product-des">
                             <div class="pro-name"><?php echo $list['name'];?></div>
                            
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