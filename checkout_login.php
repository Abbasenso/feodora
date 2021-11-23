<?php
require ('connection.inc.php');
require('functions.inc.php');


if (isset($_POST['submit'])) {
	$email=get_safe_value($con,$_POST['login_email']);
	$password=get_safe_value($con,$_POST['login_password']);


	$res=mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' and `password`='$password'");
	$check_user=mysqli_num_rows($res);

	if ($check_user > 0) {
		$row=mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_NAME']=$row['name'];
       
       echo '<script>';
       //echo 'alert("login sucessfull");';
        echo 'window.location.href="checkout.php";';
       echo '</script>';
	}

	else{

		 echo '<script>';
        echo 'alert("Username or password Invalid");';
        echo 'window.location.href="checkout.php";';
       echo '</script>';
	}


}


if (isset($_POST['reg'])) {
	$name=get_safe_value($con,$_POST['name']);
	$email=get_safe_value($con,$_POST['email']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$password=get_safe_value($con,$_POST['password']);
	date_default_timezone_set('Asia/Kolkata');
    $added_on = date( 'd-m-Y h:i:s A', time () );

    $result=mysqli_query($con,"SELECT * FROM `users` where email='$email'");
    $row=mysqli_num_rows($result);

    if ($row>0) {
    	echo '<script>';
        echo 'alert("This Email Already Exists");';
        echo 'window.location.href="login.php";';
       echo '</script>';
    	
    }
    else{

	$res=mysqli_query($con,"INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES (NULL, '$name', '$password', '$email', '$mobile', '$added_on')");

	if($res){
		echo '<script>';
        echo 'alert("Registration Successfull , please login");';
        echo 'window.location.href="checkout.php";';
       echo '</script>';

	}else{
		echo '<script>';
        echo 'alert("Registration failed");';
        echo 'window.location.href="checkout.php";';
       echo '</script>';

	}
 }
}





?>