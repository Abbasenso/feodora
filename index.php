<?php
require "top.php";

$get_product=get_product($con,10,'','');
            //top banner
            require "phpComponent/topBanner.php";

            require "phpComponent/icon.php";

            //catagori nav
            require "phpComponent/catagoriRow.php";

           
            // best seller component 
            require "phpComponent/bestSeller.php";

            
            //video poster
             require "phpComponent/videoposter.php";

            //new arrival component
            require "phpComponent/newarrival.php";

            //3/3 poster
          //  require "phpComponent/poster.php";

           
            
            //2/2 poster
            //require "phpComponent/twoPoster.php";
            
            // Recently Viewed component
            require "phpComponent/feedback.php";
             require "phpComponent/popup.php";

        ?>
</div>  

<?php
    require "fotter.php";
?>


