<?php
session_start();
$con=mysqli_connect("localhost","root","","feodoran_ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','https://feodoranaturals.com/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('PRODUCT_MULTIIMAGE_SERVER_PATH',SERVER_PATH.'media/product_images/');
define('PRODUCT_MULTIIMAGE_SITE_PATH',SITE_PATH.'media/product_images/');

define('BANNER_IMAGE_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_IMAGE_SITE_PATH',SITE_PATH.'media/banner/');

define('POSTER_IMAGE_SERVER_PATH',SERVER_PATH.'media/poster/');
define('POSTER_IMAGE_SITE_PATH',SITE_PATH.'media/poster/');

define('POSTER2_IMAGE_SERVER_PATH',SERVER_PATH.'media/poster2/');
define('POSTER2_IMAGE_SITE_PATH',SITE_PATH.'media/poster2/');

define('CATEGORY_IMAGE_SERVER_PATH',SERVER_PATH.'images/catagories/');
define('CATEGORY_IMAGE_SITE_PATH',SITE_PATH.'images/catagories/');


define('B_CATEGORY_IMAGE_SERVER_PATH',SERVER_PATH.'images/banner_catagories/');
define('B_CATEGORY_IMAGE_SITE_PATH',SITE_PATH.'images/banner_catagories/');

define('PRODUCT_INFO_IMAGE_SERVER_PATH',SERVER_PATH.'images/product_info/');
define('PRODUCT_INFO_IMAGE_SITE_PATH',SITE_PATH.'images/product_info/');
?>