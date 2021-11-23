
<?php

require ('top.php');
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
if ($cat_id > 0) {
 $get_product=get_product($con,'4',$cat_id,'');
}else
{
 ?>
 <script type="text/javascript">
 window.location.href='index.php';
 </script>
  <?php
          }

$cat_id=mysqli_real_escape_string($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
    $sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}

$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
    $sort=mysqli_real_escape_string($con,$_GET['sort']);
    if($sort=="price_high"){
        $sort_order=" order by product.price desc ";
        $price_high_selected="selected";    
    }if($sort=="price_low"){
        $sort_order=" order by product.price asc ";
        $price_low_selected="selected";
    }if($sort=="new"){
        $sort_order=" order by product.id desc ";
        $new_selected="selected";
    }if($sort=="old"){
        $sort_order=" order by product.id asc ";
        $old_selected="selected";
    }

}

if($cat_id>0){
    $get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
}else{
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}  

 $sql="SELECT * FROM `categories_banner` where categories=$cat_id";

       $row=mysqli_fetch_assoc(mysqli_query($con,$sql));
       $a=$row['image'];
     ?>
       
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
     
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12    col-sm-12 ">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                     <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                        <option value="">Sort By</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to hight</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
                                        <option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                             
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">

                                   <?php  if (count($get_product) > 0) {
                                     ?>
                                   
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->

                                        <?php 
                                            // catagori product component
                                            require "phpComponent/products.php";
                                        ?>
                    

                                        <!-- End Single Product -->
                                        
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">

                                                      <?php 
                                      
                                       foreach ($get_product as $list) {
                                           ?>

 
                                                <!-- Start List Product -->
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                       <a href="product.php?id= <?php echo $list['id']  ?>"> <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product.php?id= <?php echo $list['id']  ?>"><?php  echo $list['name'] ?></a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize"><?php  echo $list['mrp'] ?></li>
                                                            <li><?php  echo $list['price'] ?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p><?php  echo $list['description'] ?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                  <?php
                                }
                            ?>
                                                <!-- End List Product -->
                                               
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- End Product View -->

                        </div>
                           <?php  }

                          else{
                            echo "data not found";
                          }

                           ?>
                    </div>
                     
                </div>
            </div>
        </section>
    
      
       
       <?php

           require ('fotter.php');
       ?>