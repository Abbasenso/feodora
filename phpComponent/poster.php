<?php 
    $banner=mysqli_query($con,"SELECT * FROM `banner2` where status=1 order by order_by asc");
?>


<div class="container-fluid arri-row">
    <div class="row arri-row pd-0 " style="padding: 10px 0">
        <div #swiperRef="" class="swiper threePoster">
            <div class="swiper-wrapper">

            <?php  
                    while($row=mysqli_fetch_assoc($banner)) {
                ?>
                <a href="33.com" class="swiper-slide t-poster">
                    <img src="<?php echo 'media/poster/'.$row['image']  ?>" alt="banner not found">
                </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>