<?php
require "top.php";

$get_product=get_product($con,4,'','');
?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
         <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
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
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        <div class="slider__container slider--one h-65">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 h-65">
                    <a href="#">
                        <img class="cov-img"  src="images/banner/banner4.webp" alt="not found">
                    </a>
                    <!-- <img src="images/banner/banner2.jpg" alt="not found" style="width: 100%; height: 100%;"> -->
                </div>
                <!-- End Single Slide -->
                <div class="single__slide animation__style01 h-65">
                    <img class="cov-img"  src="images/banner/banner5.jpg" alt="not found">
                </div>
                <div class="single__slide animation__style01 h-65">
                    <img src="images/banner/banner6.jpg" alt="not found" class="cov-img">
                </div>
            </div>
        </div>
        <!-- Start Slider Area -->

        <!-- catagori area  -->
        
        <div class="cat-row">
        <!-- loop this col.. -->
        <?php
            foreach ($cat_array as $list) {
        ?>
            <a href="categories.php?id= <?php echo $list['id'];?>" class="catagori-col">
                <div class="hola">
                    <div class="cat-img">
                        <img src="images/catagories/<?php echo $list['catagori_img'];?>" alt="not found">
                    </div>
                    <div class="cata-text"><?php echo $list['categories'];?></div>
                </div>
            </a>
        <?php }?>

        <!-- dump  -->
        <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
         <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
         <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
         <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
         <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
        <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
         <a href="#" class="catagori-col">
            <div class="hola">
                <div class="cat-img">
                    <img src="" alt="not found">
                </div>
                <div class="cata-text">hala madrid</div>
            </div>
        </a>
        
        <!-- end dump  -->
        <!-- end  -->
       </div>
        <!-- end catagori area  -->

        <!-- product area  -->
        <!-- new arrival  -->
        <div class="container-fluid">
            <div class="row arri-row">
                <div class="title-container">
                    <div class="title-div">
                        New Arrivals
                    </div>
                    <div class="viewall">
                        <div class="k">
                            <a href="12.com">view all</a>
                        </div>
                        <div class="slide-left slide-arrow">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="slide-right slide-arrow">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="product-container">

                <div #swiperRef="" class="swiper-container newArrival">
                    <div class="swiper-wrapper">

                    <!-- loop -->
                    <?php
                        foreach ($get_product as $list) {
                    ?>
                        <a href="product.php?id= <?php echo $list['id'];?>" class="swiper-slide shadow">
                            <div class="product-img">
                                <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="not found">
                            </div>
                            <div class="product-des">
                                <div class="pro-name"><?php echo $list['name'];?></div>
                                <div class="short-des">Lorem ipsum dolor sit amet consectetur hala madrid</div>
                                <div class="price">
                                    <div class="selling-price">
                                        <?php  echo $list['price'] ?>
                                    </div>
                                    <div class="mrp">
                                        <?php  echo  $list['mrp'] ?>
                                        <div class="bar-cut"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            }
                        ?> 
                        <!-- end loop  -->
                        <!-- dummy -->
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <!-- end dummy -->
                    </div>
                    
                </div>
                    
                
                    
                </div>
            </div>
        </div>
        <!-- end new arrival  -->
        <!-- end product area  -->

        <!-- poster area  -->
        <!-- 3/3 poster  -->
                    <!-- 3/3 poster banner -->
    <div class="container-fluid mt-3">
        <div class="row arri-row">
            <div #swiperRef="" class="swiper-container threePoster">
                <div class="swiper-wrapper">
                    <a href="33.com" class="swiper-slide t-poster">
                        <img src="images/poster/poster3.jpg" alt="not found">
                    </a>                
                    <a href="#" class="swiper-slide t-poster">
                        <img src="images/poster/poster2.webp" alt="not found">
                    </a>
                    <a href="#" class="swiper-slide t-poster">
                        <img src="images/poster/poster1.jpeg" alt="not found">
                    </a>
                </div>            
            </div>
        </div>
    </div>
    <!-- end 3/3 poster banner  -->
     <!-- product container  -->
     <div class="container-fluid" style="margin-top: -40px;">
            <div class="row arri-row">
                <div class="title-container">
                    <div class="title-div">
                        Best seller
                    </div>
                    <div class="viewall">
                        <div class="k">
                            <a href="12.com">view all</a>
                        </div>
                        <div class="slide-left-1 slide-arrow">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="slide-right-1 slide-arrow">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="product-container">

                <div #swiperRef="" class="swiper-container bestSeller">
                    <div class="swiper-wrapper">

                    <!-- loop -->
                    <?php
                        foreach ($get_product as $list) {
                    ?>
                        <a href="product.php?id= <?php echo $list['id'];?>" class="swiper-slide shadow">
                            <div class="product-img">
                                <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="not found">
                            </div>
                            <div class="product-des">
                                <div class="pro-name"><?php echo $list['name'];?></div>
                                <div class="short-des">Lorem ipsum dolor sit amet consectetur hala madrid</div>
                                <div class="price">
                                    <div class="selling-price">
                                        <?php  echo $list['price'] ?>
                                    </div>
                                    <div class="mrp">
                                        <?php  echo  $list['mrp'] ?>
                                        <div class="bar-cut"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            }
                        ?> 
                        <!-- end loop  -->
                        <!-- dummy -->
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide shadow">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <!-- end dummy -->
                    </div>
                    
                </div>
                    
                
                    
                </div>
            </div>
        </div>
        <!-- end new arrival  -->
        <!-- end poster area  -->


        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>


                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">

                            <?php 
                                       
                                       foreach ($get_product as $list) {
                                           ?>


                                       
                            
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id= <?php echo $list['id']  ?>">
                                            <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="product images">
                                        </a>
                                    </div>

                                    
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id= <?php echo $list['id']  ?>"><?php  echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php  echo  $list['mrp'] ?></li>
                                            <li><?php  echo $list['price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>
                    
                          <!-- End Single Category -->
                       
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                      
                         <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">

                            <?php 
                              $get_product=get_product($con,4,'','','','','yes');
                                       
                                       foreach ($get_product as $list) {
                                           ?>


                                       
                            
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id= <?php echo $list['id']  ?>">
                                            <img src="<?php echo 'media/product/'.$list['image']  ?>" alt="product images">
                                        </a>
                                    </div>

                                    
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id= <?php echo $list['id']  ?>"><?php  echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php  echo  $list['mrp'] ?></li>
                                            <li><?php  echo $list['price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>
                    
                          <!-- End Single Category -->
                       
                        </div>
                    </div>
                </div>
                       
                       
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->


       <?php
require "fotter.php";
?>
