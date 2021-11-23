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


<section>
<div class="container" id="productsContainer">
    <div class="products-container">
        <!-- loop this  -->
        <?php                          
               
               // foreach ($get_product as $list) {
               while ($list=mysqli_fetch_assoc($res)) {
           
       ?>
        <div class="product-cards">
            <a href="product.php?id= <?php echo $list['id']  ?>" class="product-box">
                <div class="pro-img-box camera-iconx">
                    <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="not found">
                    <div class="pro-rating">
                        4.5 <span class="star">*</span>
                    </div>
                </div>
                <div class="pro-des">
                    <div class="pr-name"><?php  echo $list['name'] ?></div>
                 
                    <div class="pr-price">
                        <div class="pr-selling-price">
                            Rs. <?php  echo $list['price'] ?>
                        </div>
                        <div class="pr-mrp">
                        
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
        <!-- end loop         -->
    </div>
</div>
</section>


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