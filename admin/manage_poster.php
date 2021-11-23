<?php
require('top.inc.php');
$heading1='';
$btn_link='';
$image='';
$order_by='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from banner2 where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$heading1=$row['heading1'];
		$btn_link=$row['btn_link'];
		$image=$row['image'];
		$order_by=$row['order_by'];
	}else{
		//header('location:banner.php');
		
			?>
		
     <script>
    window.location.href='poster.php';
    </script>
	<?php
		die();
	}
}

if(isset($_POST['submit'])){
	$heading1=get_safe_value($con,$_POST['heading1']);
	$btn_link=get_safe_value($con,$_POST['btn_link']);
	$image=get_safe_value($con,$_POST['image']);
	$order_by=get_safe_value($con,$_POST['order_by']);

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
        if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],POSTER_IMAGE_SERVER_PATH.$image);

				mysqli_query($con,"update banner2 set heading1='$heading1',btn_link='$btn_link',image='$image',order_by='$order_by' where id='$id'");
			}
			else{
				mysqli_query($con,"update banner2 set heading1='$heading1',btn_link='$btn_link',order_by='$order_by' where id='$id'");
			}

			
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],POSTER_IMAGE_SERVER_PATH.$image);
			
			mysqli_query($con,"insert into banner2(heading1,btn_link,image,status,order_by) values('$heading1','$btn_link','$image','1','$order_by')");
		}
	//	header('location:banner.php');
	
		?>
		
     <script>
    window.location.href='poster.php';
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
                        <div class="card-header"><strong></strong><small> Form Poster</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">

								<div class="form-group">
									<label for="banner" class=" form-control-label">Heading-1</label>
									<input type="text" name="heading1" placeholder="Enter heading1" class="form-control" required value="<?php echo $heading1?>">
								</div>
							  
								<div class="form-group">
									<label for="banner" class=" form-control-label">Image_Link</label>
									<input type="text" name="btn_link" placeholder="Enter Image_Link" class="form-control" required value="<?php echo $btn_link?>">
									
								</div>

									<div class="form-group">
									<label for="banner" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control">
									<?php

                              if ($image!='') {
                              	echo "<a target='_blank' href='".POSTER_IMAGE_SITE_PATH.$image."'><img width='100px' height='100px' src='".POSTER_IMAGE_SITE_PATH.$image."'/></a>";
                              }
									 ?>
								</div>

								<div class="form-group">
									<label for="banner" class=" form-control-label">Order_By</label>
									<input type="text" name="order_by" placeholder="Enter order wise banner" class="form-control" required value="<?php echo $order_by?>">
									
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