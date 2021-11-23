<?php
require ('connection.inc.php');
require ('functions.inc.php');

unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);

header('location:index.php');

echo '<script>';
       // echo 'alert("Username or password Invalid");';
        echo 'window.location.href="index.php";';
       echo '</script>';
die();


?>