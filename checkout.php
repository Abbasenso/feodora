 <?php 
require('top.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

$cart_total=0;

if(isset($_POST['submit'])){
    $address=get_safe_value($con,$_POST['address']);
    $city=get_safe_value($con,$_POST['city']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($price*$qty);
        
    }
    $total_price=$cart_total;
    $payment_status='pending';
    if($payment_type=='cod'){
        $payment_status='success';
    }
    $order_status='1';
    
    //date_default_timezone_set('Asia/Kolkata');
    $added_on=date('Y-m-d h:i:s');
    
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    
    if(isset($_SESSION['COUPON_ID'])){
        $coupon_id=$_SESSION['COUPON_ID'];
        $coupon_code=$_SESSION['COUPON_CODE'];
        $coupon_value=$_SESSION['COUPON_VALUE'];
        $total_price=$total_price-$coupon_value;
        unset($_SESSION['COUPON_ID']);
        unset($_SESSION['COUPON_CODE']);
        unset($_SESSION['COUPON_VALUE']);
    }else{
        $coupon_id='';
        $coupon_code='';
        $coupon_value='';   
    }   
    
    mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");
    
    $order_id=mysqli_insert_id($con);
    
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        
        mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
    
    unset($_SESSION['cart']);
    
    if($payment_type=='payu'){
        $MERCHANT_KEY ="UYZtnb"; 
        $SALT ="CmcQ4CEHLRGS7xxbKr9B4G8F43Cfpxvc";
        $hash_string = '';
        $PAYU_BASE_URL = "https://secure.payu.in";
        //$PAYU_BASE_URL = "https://test.payu.in";
        $action = '';
        $posted = array();
        if(!empty($_POST)) {
          foreach($_POST as $key => $value) {    
            $posted[$key] = $value; 
          }
        }
        
        $userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
        
        $formError = 0;
        $posted['txnid']=$txnid;
        $posted['amount']=$total_price;
        $posted['firstname']=$userArr['name'];
        $posted['email']=$userArr['email'];
        $posted['phone']=$userArr['mobile'];
        $posted['productinfo']="productinfo";
        $posted['key']=$MERCHANT_KEY ;
        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        if(empty($posted['hash']) && sizeof($posted) > 0) {
          if(
                  empty($posted['key'])
                  || empty($posted['txnid'])
                  || empty($posted['amount'])
                  || empty($posted['firstname'])
                  || empty($posted['email'])
                  || empty($posted['phone'])
                  || empty($posted['productinfo'])
                 
          ) {
            $formError = 1;
          } else {    
            $hashVarsSeq = explode('|', $hashSequence);
            foreach($hashVarsSeq as $hash_var) {
              $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
              $hash_string .= '|';
            }
            $hash_string .= $SALT;
            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
          }
        } elseif(!empty($posted['hash'])) {
          $hash = $posted['hash'];
          $action = $PAYU_BASE_URL . '/_payment';
        }


        $formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="'.SITE_PATH.'payment_complete.php" /><input type="hidden" name="furl" value="'.SITE_PATH.'payment_fail.php"/><input type="submit" style="display:none;"/></form>';
        echo $formHtml;
        echo '<script>document.getElementById("payuForm").submit();</script>';
    }else{  

        ?>
        <script>
            window.location.href='thanku.php';
        </script>
        <?php
    }   
    
}
?>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/aurveda.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                    <?php 
                                    $accordion_class='accordion__title';
                                    if(!isset($_SESSION['USER_LOGIN'])){
                                    $accordion_class='accordion__hide';
                                    ?>
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="checkout_login.php" id="login-form" method="post" >
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                                                <span class="field_error" id="login_email_error"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                                <span class="field_error" id="login_password_error"></span>
                                                            </div>
                                                            
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                            <button type="submit" name="submit" class="fv-btn"  >Login</button>
                                                            </div>
                                                            <div class="form-output login_msg">
                                                                <p class="form-messege field_error"></p>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="checkout_login.php" method="post">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                                                                <span class="field_error" id="name_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                                                                <span class="field_error" id="email_error"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                                                <span class="field_error" id="mobile_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                                <span class="field_error" id="password_error"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                            <input type="submit" name="reg" value="Register" class="fv-btn">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                   
                                    <div class="<?php echo $accordion_class?>">
                                        Delivery Information
                                    </div>
                                    <div class="accordion__body"  id="myDIV">
                                                <form method="post">
                                                <div class="bilinfo">
                                                    
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <input type="text" name="address" placeholder="Street Address" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="single-input">
                                                                    <input type="text" name="city" placeholder="City/State" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="single-input">
                                                                    <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                            <div class="accordion__body"  id="myDIV1">
                                                <div class="paymentinfo">
                                                    <div class="single-method">
                                                        <a class="batch" role="button" disabled >Payment Method</a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Cash On Delivery <input type="radio" name="payment_type" value="COD" required/>
                                                        &nbsp;&nbsp;Online Payment <input type="radio" name="payment_type" value="payu" required/>
                                                    </div>
                                                    <div class="single-method">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" class="fv-btn"/>
                                        </form>

                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <?php
                                $cart_total=0;
                                foreach($_SESSION['cart'] as $key=>$val){
                                $productArr=get_product($con,'','',$key);
                                $pname=$productArr[0]['name'];
                                $mrp=$productArr[0]['mrp'];
                                $price=$productArr[0]['price'];
                                $image=$productArr[0]['image'];
                                $qty=$val['qty'];
                                $cart_total=$cart_total+($price*$qty);
                                ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
                                        <span class="price"><?php echo 'Rs '. $price*$qty?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="ordre-details__total" id="coupon_box">
                                <h5>Coupon Value</h5>
                                <span class="price" id="coupon_price"></span>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price" id="order_total_price"><?php echo 'Rs '. $cart_total?></span>
                            </div>
                            
                            <div class="ordre-details__total bilinfo">
                                <input type="textbox" id="coupon_str" class="coupon_style mr5"/> <input type="button" name="submit" class="fv-btn coupon_style" value="Apply Coupon" onclick="set_coupon()"/>
                                
                            </div>
                            <div id="coupon_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script>
            function myFunction() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }

                function myFunction1() {
                var x = document.getElementById("myDIV1");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }
        </script>
        <script>
            function set_coupon(){
                var coupon_str=jQuery('#coupon_str').val();
                if(coupon_str!=''){
                    jQuery('#coupon_result').html('');
                    jQuery.ajax({
                        url:'set_coupon.php',
                        type:'post',
                        data:'coupon_str='+coupon_str,
                        success:function(result){
                            var data=jQuery.parseJSON(result);
                            if(data.is_error=='yes'){
                                jQuery('#coupon_box').hide();
                                jQuery('#coupon_result').html(data.dd);
                                jQuery('#order_total_price').html(data.result);
                            }
                            if(data.is_error=='no'){
                                jQuery('#coupon_box').show();
                                jQuery('#coupon_price').html(data.dd);
                                jQuery('#order_total_price').html(data.result);
                            }
                        }
                    });
                }
            }
        </script>        -->
<?php 
if(isset($_SESSION['COUPON_ID'])){
    unset($_SESSION['COUPON_ID']);
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['COUPON_VALUE']);
}
require('fotter.php');
?>        

<script>
function user_register(){
	jQuery('.field_error').html('');
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error='';
	if(name==""){
		jQuery('#name_error').html('Please enter name');
		is_error='yes';
	}if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}if(mobile==""){
		jQuery('#mobile_error').html('Please enter mobile');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'register_submit.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
			success:function(result){
				if(result=='email_present'){
					jQuery('#email_error').html('Email id already present');
				}
				if(result=='mobile_present'){
					jQuery('#mobile_error').html('Mobile number already present');
				}
				if(result=='insert'){
					jQuery('.register_msg p').html('Thank you for registeration');
				}
			}	
		});
	}
	
}



function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#login_email").val();
	var password=jQuery("#login_password").val();
	var is_error='';
	if(email==""){
		jQuery('#login_email_error').html('Please enter email');
		is_error='yes';
	}if(password==""){
		jQuery('#login_password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'login_submit.php',
			type:'post',
			data:'email='+email+'&password='+password,
			success:function(result){
				if(result=='wrong'){
					jQuery('.login_msg p').html('Please enter valid login details');
				}
				if(result=='valid'){
					window.location.href='checkout.php';
				}
			}	
		});
	}	
}
</script>