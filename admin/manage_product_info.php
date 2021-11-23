<?php
require('top.inc.php');
$product_id='';
$heading1='';
$heading2='';
$description='';
$image='';

$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product_info where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$product_id=$row['product_id'];
		$heading1=$row['heading1'];
		$heading2=$row['heading2'];
		$description=$row['description'];
		$image=$row['image'];
		//$order_by=$row['order_by'];
	}else{
		//header('location:product_info.php');
		
			?>
		
     <script>
    window.location.href='product_info.php';
    </script>
	<?php
		die();
	}
}

if(isset($_POST['submit'])){
	$product_id=get_safe_value($con,$_POST['product_id']);
	$heading1=get_safe_value($con,$_POST['heading1']);
	$heading2=get_safe_value($con,$_POST['heading2']);
	$description=get_safe_value($con,$_POST['description']);
	$image=get_safe_value($con,$_POST['image']);
	//$order_by=get_safe_value($con,$_POST['order_by']);

	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/gif'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/gif'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}

	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
        if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_INFO_IMAGE_SERVER_PATH.$image);

				mysqli_query($con,"update product_info set product_id='$product_id', heading1='$heading1',heading2='$heading2',description='$description',image='$image' where id='$id'");
			}
			else{
				mysqli_query($con,"update product_info set product_id='$product_id', heading1='$heading1',heading2='$heading2',description='$description' where id='$id'");
			}

			
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_INFO_IMAGE_SERVER_PATH.$image);
			
			mysqli_query($con,"insert into product_info(product_id,heading1,heading2,description,image,status) values('$product_id','$heading1','$heading2','$description','$image','1')");
		}
	//	header('location:product_info.php');
	
		?>
		
     <script>
    window.location.href='product_info.php';
    </script>
	<?php
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong></strong><small> Form product_info</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">

								<div class="form-group">
									<label for="product_info" class=" form-control-label">Product</label>
								<select name="product_id" required class="form-control">
										<option value="">Select Product</option>
										<?php
										$res=mysqli_query($con,"select * from product where status='1'");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories){
												echo "<option value=".$row['id']." selected>".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label for="product_info" class=" form-control-label">Heading-1</label>
									<input type="text" name="heading1" placeholder="Enter heading1" class="form-control" required value="<?php echo $heading1?>">
								</div>

								<div class="form-group">
									<label for="product_info" class=" form-control-label">Heading-2</label>
									<input type="text" name="heading2" placeholder="Enter heading1" class="form-control" required value="<?php echo $heading2?>">
								</div>

								<div class="form-group">
									<label for="product_info" class=" form-control-label">Description</label>
									<textarea class="form-control" rows="5" name="description" required><?php  echo $description; ?></textarea>
								</div>
							  
								

									<div class="form-group">
									<label for="product_info" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control">
									<?php

                              if ($image!='') {
                         echo "<a target='_blank' href='".PRODUCT_INFO_IMAGE_SERVER_PATH.$image."'><img width='100px' height='100px' src='".PRODUCT_INFO_IMAGE_SERVER_PATH.$image."'/></a>";
                              }
									 ?>
								</div>

							

							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>