<?php 
    $banner=mysqli_query($con,"SELECT * FROM `banner` where status=1 order by order_by asc");
?>
<div class="container-fluid arri-row">
    <div class="row arri-row" style="padding: 0">
        <div class="swiper topBanner" id="topBanner">
            <div class="">
                <?php  
                    while($row=mysqli_fetch_assoc($banner)) {
                ?>
                <a href="#" class="swiper-slide top-poster">
                    <img src="<?php echo 'media/banner/'.$row['image']  ?>" alt="not found">
                </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!--<div class="swiper-pagination"></div>-->