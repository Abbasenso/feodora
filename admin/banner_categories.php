<?php
require('top.inc.php');
$categories='';
$image='';

$image_required='required';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from categories_banner where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		//header('location:categories.php');
		
			?>
		
     <script>
    window.location.href='banner_c.php';
    </script>
	<?php
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories_banner where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories banner already exist";
			}
		}else{
			$msg="Categories banner already exist";
		}
	}



  	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}

 
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if ($_FILES['image']['name']!='') {
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],B_CATEGORY_IMAGE_SERVER_PATH.$image);
				mysqli_query($con,"update categories_banner set categories='$categories',image='$image' where id='$id'");
			} 
			else{
				mysqli_query($con,"update categories_banner set categories='$categories' where id='$id'");
			}
			
		}else{
			$image=rand(1111111,9999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],B_CATEGORY_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into categories_banner(categories,image,status) values('$categories','$image','1')");
		}
		//header('location:categories.php');
			?>
		
     <script>
    window.location.href='banner_c.php';
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
                        <div class="card-header"><strong>Categories Banner</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
                                    <select class="form-control" name="categories" id="categories" onchange="get_sub_cat('')" required>
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>

									<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
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