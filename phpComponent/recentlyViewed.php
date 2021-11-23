<?php
        //unset($_COOKIE['recently_viewed']);
        if (isset($_COOKIE['recently_viewed'])) {
            $arrRecentView=unserialize($_COOKIE['recently_viewed']);
            $countRecentView=count($arrRecentView);
            $countStartRecentView=$countRecentView-10 ;
            //pr($arrRecentView);
            if ($countRecentView > 10) {
                $arrRecentView=array_slice($arrRecentView, $countStartRecentView,10);
            }
            $recentViewId=implode(",", $arrRecentView);
            $res=mysqli_query($con,"select * from product where id in ($recentViewId)");
            // code...
        //pr($_COOKIE['recently_viewed']);

        ?>

<div class="container-fluid" id="newArrRow">
     <div class="row arri-row">
         <div class="title-container">
             <div class="title-div">
                 recently Viewed
             </div>
             <div class="viewall-x">
                 <div class="k">
                     <a href="rview.php">view all</a>
                 </div>
                 <div class="slide-left-r slide-arrow">
                     <i class="fa fa-chevron-left" aria-hidden="true"></i>
                 </div>
                 <div class="slide-right-r slide-arrow">
                     <i class="fa fa-chevron-right" aria-hidden="true"></i>
                 </div>
             </div>
         </div>
         <div class="product-container">

             <div #swiperRef="" class="swiper recentlyViewed box-height">
                 <div class="swiper-wrapper">

                     <!-- loop -->
                     <?php
                        // foreach ($get_product as $list) {
                        while ($list=mysqli_fetch_assoc($res)) {
                    ?>
                     <a href="product.php?id= <?php echo $list['id'];?>" class="swiper-slide shadow-sm new-slide">
                         <div class="product-img camera-icony">
                             <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="not found">
                         </div>
                         <div class="product-des">
                             <div class="pro-name"><?php echo $list['name'];?></div>
                             <!-- <div class="short-des">Lorem ipsum dolor sit amet consectetur hala </div>s -->
                             <div class="price">
                                 <div class="selling-price">
                                     Rs.  <?php  echo $list['price'] ?>
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
 <div class="h-10"></div>
 <?php
        $arrRec=unserialize($_COOKIE['recently_viewed']);
        if (($key=array_search($product_id, $arrRec))!==false) {
            unset($arrRec[$key]);
        }
        $arrRec[]=$product_id;
         setcookie('recently_viewed',serialize($arrRec),time()+60*60*24*365);
               }
               else{

                 $arrRec[]=$product_id;
           setcookie('recently_viewed',serialize($arrRec),time()+60*60*24*365);

               }
               
        ?>