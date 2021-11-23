<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value,coupon_code from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
$coupon_code=$coupon_details['coupon_code'];


 /*if (isset($_POST['submit'])) {
     $status=get_safe_value($con,$_POST['update_order_status']);

     mysqli_query($con,"UPDATE `order` SET `order_status` = '$status' WHERE `order`.`id` = '$order_id' ");
 }*/


 if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	
	$update_sql='';
	if($update_order_status==3){
		$length=$_POST['length'];
		$breadth=$_POST['breadth'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];
		
		$update_sql=",length='$length',breadth='$breadth',height='$height',weight='$weight' ";
		
	}
	
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' $update_sql where id='$order_id'");
	}
	
	if($update_order_status==3){
		$token=validShipRocketToken($con);
		placeShipRocketOrder($con,$token,$order_id);
	}
	
	if($update_order_status==4){
		$ship_order=mysqli_fetch_assoc(mysqli_query($con,"select ship_order_id from `order` where id='$order_id'"));
		if($ship_order['ship_order_id']>0){
			$token=validShipRocketToken($con);
			cancelShipRocketOrder($token,$ship_order['ship_order_id']);
		}
	}
	
}




?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order_master </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
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
                                              
                                               
                                               $res=mysqli_query($con,"SELECT DISTINCT(order_detail.id),order_detail.*,product.name,product.image FROM order_detail,product WHERE order_detail.order_id='$order_id'  and order_detail.product_id=product.id");
                                               $total_price=0;
                                               while ($row=mysqli_fetch_assoc($res)) {
                                                //$address=$row['address'];
                                                // $address=$row['address'];
                                                 // $address=$row['address'];
                                                $total_price=$total_price+($row['qty']*$row['price']);
                                                  
                                               
                                             ?>
                                            <tr>
                                               
                                                <td class="product-name"><a href="#"><?php echo $row['name'];  ?></a></td>
                                               
                                                 <td class="product-thumbnail"><img src="<?php echo '../media/product/'.$row['image']; ?>" alt="" /></a></td>
                                                <td class="product-name"><a href="#"><?php echo $row['qty'];  ?></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['price'];  ?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['price'] * $row['qty'] ;  ?></span></td>
                                                
                                          </tr>
                                    <?php } 
                                    if($coupon_value!=''){
                                    ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-name">Coupon Value</td>
                                        <td class="product-name">
                                        <?php 
                                        echo $coupon_value."($coupon_code)";
                                        ?></td>
                                         <?php } ?>
                                    </tr>
                                    
                                    <tr>

                                        <?php  

                                         if($coupon_value==''){
                                            $coupon_value=0;
                                         }else{
                                            $coupon_value=$coupon_value;
                                         }
                                          
                                        ?>
                                        <td colspan="3"></td>
                                        <td class="product-name">Total Price</td>
                                        <td class="product-name"><?php 
                                                echo $total_price-$coupon_value;
                                                ?></td>

                                            
                                    </tr>
                                          
                                        </tbody>
                                       
					  </table>
					  
                      <div id="address__details">

					   	<strong> &ensp;Address</strong>
                        <br>

                        <?php 
                          
                          $result=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `order` where id='$order_id'"));

                          echo '&ensp;'. $result['address'].','. $result['city'].','. $result['pincode'];
                           
                         ?>
                          
                         <br><br>
					   	   <strong>&ensp;Order Status ::</strong>

                           <?php 
                           $order_status=mysqli_fetch_assoc(mysqli_query($con,"SELECT `order_status`.name as order_status FROM order_status ,`order` WHERE `order`.`id`='$order_id' and `order`.`order_status`=order_status.id"));
                             
                           echo '&ensp;'.$order_status['order_status'];

                            ?>

                          
                               
                           
					   </div>

                        <form method="post" action="">
                                    <div class="col-lg-3">
                                    <select class="form-control" name="update_order_status" id="update_order_status" required onchange="select_status()">
                                        <option value="">Select Status For Update</option>
                                        <?php
                                          $staus=mysqli_query($con,"SELECT * FROM `order_status`");

                                          while ($row=mysqli_fetch_array($staus)) {
                                             ?>
                                              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                             <?php
                                          }
                                        ?>                                        
                                    </select>
                                    </div>

                                    <div id="shipped_box" style="display:none">
										<table>
											<tr>
												<td><input type="text" class="form-control" name="length" placeholder="length"/></td>
												<td><input type="text" class="form-control" name="breadth" placeholder="Breadth"/></td>
												<td><input type="text" class="form-control" name="height" placeholder="height"/></td>
												<td><input type="text" class="form-control" name="weight" placeholder="weight"/></td>
											</tr>
										</table>
									</div>
                                    <br>
                                    <div class="col-lg-3">
                                        <input type="submit" name="submit" class="btn btn-info" value="Update">
                                    </div>
                                </form>
                                <br>

				   </div>


				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>

<script>
function select_status(){
	var update_order_status=jQuery('#update_order_status').val();
	if(update_order_status==3){
		jQuery('#shipped_box').show();
	}
}
</script>
<?php
require('footer.inc.php');
?>

