<div class="cat-row" style="margin-bottom: 10px">
        <!-- loop this col.. -->
        <?php
            foreach ($cat_array as $list) {
        ?>
            <a href="categories.php?id= <?php echo $list['id'];?>" class="catagori-col">
                <div class="hola">
                    <div class="cat-img camera-icon">
                        <img src="images/catagories/<?php echo $list['image'];?>" alt="not found">
                    </div>
                    <div class="cata-text">
                <?php echo $list['categories'];?>
                <i class="fas fa-arrow-alt-circle-right"></i>
            </div>
                </div>
            </a>
        <?php }?>
        <!-- end  -->
</div>