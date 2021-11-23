<?php 
    $banner=mysqli_query($con,"SELECT * FROM `banner3` where status=1 order by order_by asc");
?>

<!--<div class="h-10"></div>-->
<div class="container-fluid mt-3 arri-row">
    <div class="row arri-row" style="padding: 0">
        <div #swiperRef="" class="swiper twoPoster">
            <div class="swiper-wrapper">
                
                <?php  
                    while($row=mysqli_fetch_assoc($banner)) {
                ?>
                <a href="#" class="swiper-slide tw-poster camera-icon">
                    <img src="<?php echo 'media/poster2/'.$row['image']  ?>" alt="not found">
                </a>
              <?php  } ?>
            </div>
        </div>
    </div>
</div>
<div class="h-10"></div>