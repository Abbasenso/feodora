<?php
 require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}
 $id=get_safe_value($con,$_GET['id']);

$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$id'"));
$coupon_value=$coupon_details['coupon_value'];

?>

        <div class="body__overlay"></div>
      
        <!-- End Offset Wrapper -->
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
                                  <span class="breadcrumb-item active">My Order</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                
                                               
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Image </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Quantity </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Price</span></th>
                                                 <th class="product-add-to-cart"><span class="nobr">Total Price</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                              
                                               $uid=$_SESSION['USER_ID'];
                                               $res=mysqli_query($con,"SELECT DISTINCT(order_detail.id),order_detail.*,product.name,product.image FROM order_detail,product,`order` WHERE order_detail.order_id='$id' and `order`.`user_id`='$uid' and order_detail.product_id=product.id");
                                               $total_price=0;
                                               while ($row=mysqli_fetch_assoc($res)) {
                                                $total_price=$total_price+($row['qty']*$row['price']);
                                                  
                                               
                                             ?>
                                            <tr>
                                               
                                                <td class="product-name"><a href="#"><?php echo $row['name'];  ?></a></td>
                                               
                                                 <td class="product-thumbnail"><a href="product.php?id= <?php echo $row['product_id']  ?>"><img src="<?php echo 'media/product/'.$row['image']; ?>" alt="" /></a></td>
                                                <td class="product-name"><a href="#"><?php echo $row['qty'];  ?></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['price'];  ?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['price'] * $row['qty'] ;  ?></span></td>
                                                
                                               </tr>
                                            <?php } 
                                            if($coupon_value!=''){
                                            ?>
                                            <tr>
                                                <td colspan="3">Discount</td>
                                                <td class="product-name">Coupon Value</td>
                                                <td class="product-name"><?php echo $coupon_value?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="product-name">Total Price</td>
                                                <td class="product-name">
                                                <?php 
                                                $coupon_value=0;
                                                echo $total_price-$coupon_value;
                                                ?></td>
                                                
                                            </tr>
                                           
                                        </tbody>
                                       
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

<?php

  require ('fotter.php');
?>