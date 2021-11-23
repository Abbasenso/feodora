<section>
<div class="container" id="productsContainer">
    <div class="products-container">
        <!-- loop this  -->
        <?php                          
            foreach ($get_product as $list) {
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