<?php
error_reporting(0);
ini_set('display_errors', 0);


require ('connection.inc.php');
require ('functions.inc.php');
require ('add_to_cart.php');
$cat_res=mysqli_query($con,"SELECT * FROM `categories` where status=1");

$cat_array=array();
while ($row=mysqli_fetch_assoc($cat_res)) {
    $cat_array[]=$row;
    
   }

$obj = new add_to_cart();
$totalProduct=$obj->totalProduct();

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/', $script_name);
$mypage=$script_name_arr[count($script_name_arr)-1]; 
//echo $mypage;


  $meta_desc="Feodora Naturals";
  $meta_title="Feodora Naturals";
  $meta_keyword="Feodora Naturals";
  $meta_url=SITE_PATH;
  $meta_image="";
if ($mypage=='product.php') {
    $product_id=get_safe_value($con,$_GET['id']);
    $product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
//prx($product_meta);
    $meta_desc=$product_meta['meta_desc'];
    $meta_title=$product_meta['meta_title'];
    $meta_keyword=$product_meta['meta_keyword'];
    $meta_url=SITE_PATH."product.php?id=".$product_id;
    $meta_image=PRODUCT_IMAGE_SITE_PATH.$product_meta['image'];
    //echo $meta_title;
    //echo $meta_keyword;
    //echo $meta_desc;

}


?>


<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title ?></title>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="meta_keyword" content="<?php echo $meta_keyword; ?>" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Google Analytics -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7VJ5GR');</script>
<!-- End Google Tag Manager -->

<!-- Google Analytics Ends -->


<!-- share link -->
    <meta property="og:title" content="<?php echo $meta_title ?>" >
    <meta property="og:image" content="<?php echo $meta_image ?>" >
    <meta property="og:url" content="<?php echo $meta_url ?>" >
    <meta property="og:site" content="<?php echo SITE_PATH ?>" >
    
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="user/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="user/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="user/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="user/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="user/css/custom.css">
     <link rel="stylesheet" href="customcss.css">
      <link rel="stylesheet" href="css/com.css">
  <script defer src="https://kit.fontawesome.com/83ce503d6d.js" crossorigin="anonymous"></script>
       <!-- Link Swiper's CSS -->
       <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="video.css">
         <link rel="stylesheet" href="style2.css">
          <link rel="stylesheet" href="style3.css">
         <link rel="stylesheet" href="style4.css">



    <!-- Modernizr JS -->
    <script src="user/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>(function(w, d) { w.CollectId = "614db153e3ebf6511abdc5cf"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>

<body>
    <!-- Google analytics -->
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7VJ5GR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Ends here -->
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    
    
    <section class="promo cWCdaD" style="background:#000000;">
    <div class="container header2">
         <div class="row">
            <div class="col-lg-12 col-xl-12 text-center top_head">
                <div id="textslide" class="carousel slide pointer-event" data-ride="carousel">
                    <div class="">
                        <div class="" style="margin-top: 6px;">
                            <a style="animation: none;padding: inherit;color: #fff;font-family: sans-serif;font-size: 14px;margin-top: 25px;">Free Shipping Above <span style="font-family: sans-serif;">₹499</span> All Over India | COD Available || 20% offer for the first time user from website use this coupon code (BUYFIRST)</a> 
                        </div>
                        
                         
                       
                    </div>
                </div>       
            </div>
         </div>
    </div>
</section>
    

   <header class="header container-fluid">
        <a href="https://feodoranaturals.com/" class="logo">
            <img src="images/logo/logo.png" alt="logo not found">
        </a>
        <div class="catagorie-box">
        <?php
            foreach ($cat_array as $list) {
        ?>
            <li class="drop">
            <a href="categories.php?id= <?php echo $list['id'] ?>"><?php echo $list['categories']  ?></a>
            </li>
            <ul class="dropdown">
                
            </ul>
            
        <?php }?>
        </div>
        <div class="s-p-cart-box">
            <form action="search.php" method="GET">
                <div class="search-box">
                    <button type="submit" name="searchItem" class="search-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <input type="text" name="str" placeholder="search..">
                </div>
            </form>
            <div class="space"></div>
            <div class="profile" title="click to see profile information ">
                <div class="profile-box" id="profileBox">
                    <i class="far fa-user"></i>
                    Profile
                </div>
                <div class="profile-items" id="proItem">
                <?php 
                    if(isset($_SESSION['USER_LOGIN'])){
                ?>
                    <div class="order-box">
                        <div class="drop-li">
                            Hi, <span><?php echo $_SESSION['USER_NAME'] ?></span> 
                        </div>
                        <a href="my_order.php"><div class="drop-li"> <i class="fab fa-first-order-alt"></i>My Order</div></a>
                        <a href="profile.php"><div class="drop-li"><i class="far fa-user"></i>My Profile</div></a>
                        <div class="divider-x"></div>
                        <a href="contact.php"><div class="drop-li"><i class="fas fa-envelope"></i>Contact</div></a>
                        <a href="logout.php"><div class="drop-li"> <i class="fas fa-sign-out-alt"></i>Log Out</div></a>
                    </div>
                <?php } else{ ?>
                
                    <div class="welcome-box">
                        <div class="welcome">Welcome</div>
                        <div class="access">To access account and manage orders</div>
                        <a href="login.php">login / signup</a>
                    </div>
                    <div class="order-box">
                        <div class="divider-x"></div>
                        <a href="contact.php"><div class="drop-li"><i class="fas fa-envelope"></i>Contact Us</div></a>
                    </div>
                <?php } ?>
                    
                </div>
            </div>
            <div class="profile">
                <a href="cart.php" class="profile-box" id="profileBox">
                    <div class="cart">
                        <div class="cart-item-count"><?php echo $totalProduct ?></div>
                        <div class="ic"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>  
                    </div>
                    <div class="cart-name">cart</div>
                </a>
            </div>
        </div>
    </header>

