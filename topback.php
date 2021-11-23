<?php
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


  $meta_desc="Feodora Ecommerce";
  $meta_title="Feodora Ecommerce";
  $meta_keyword="Feodora Ecommerce";
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


<!-- share link -->
    <meta property="og:title" content="<?php echo $meta_title ?>" >
    <meta property="og:image" content="<?php echo $meta_image ?>" >
    <meta property="og:url" content="<?php echo $meta_url ?>" >
    <meta property="og:site" content="<?php echo SITE_PATH ?>" >
    
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
      <link rel="stylesheet" href="css/component.css">
  <script defer src="https://kit.fontawesome.com/83ce503d6d.js" crossorigin="anonymous"></script>
       <!-- Link Swiper's CSS -->
       <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />



    <!-- Modernizr JS -->
    <script src="user/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

       

        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                    <!-- <a href="index.php"><img src="images/feodora.png" alt="logo images"></a> -->
                                   
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                      
                                           <?php
                                              foreach ($cat_array as $list) {
                                                  ?>
                                                      <li class="drop"><a href="categories.php?id= <?php echo $list['id']  ?>"><?php echo $list['categories']  ?></a>


                                                     <ul class="dropdown">
                                                        <?php
                                                        $categories_id=$list['id'] ;
                                                          $sub_cat_res=mysqli_query($con,"select * from sub_categories where categories_id='$categories_id' and status=1");
                                                          if (mysqli_num_rows($sub_cat_res) > 0) {
                                                             while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
                                                        echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>
                                                    ';
                                                              }
                                                          }
                                                        
                                                        ?>
                                                     </ul>

                                                      </li>  
                                                  <?php
                                              }
                                           ?>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>

                                             <?php
                                              foreach ($cat_array as $list) {
                                                  ?>
                                                      <li><a href="user/categoris.php?id= <?php echo $list['id']  ?>"><?php echo $list['categories']  ?></a></li>  
                                                  <?php
                                              }
                                           ?>
                                         
                                            <li><a href="user/contact.html">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="search.php"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                  <div class="header__account">
                                        <?php if(isset($_SESSION['USER_LOGIN'])){
                                            ?>
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                              </button>

                                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mr-auto">
                                                  <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Hi <?php echo $_SESSION['USER_NAME']?>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                      <a class="dropdown-item" href="my_order.php">Order</a>
                                                      <a class="dropdown-item" href="profile.php">Profile</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="logout.php">Logout</a>
                                                    </div>
                                                  </li>
                                                  
                                                </ul>
                                              </div>
                                            </nav>
                                            <?php
                                        }else{
                                            echo '<a href="login.php" class="mr15">Login/Register</a>';
                                        }
                                        ?>
                                    
                                        
                                        
                                    </div>
                                    
                                    <div class="htc__shopping__cart">
                                        <a  href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->


        <div class="body__overlay"></div>
     <div class="offset__wrapper">
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

