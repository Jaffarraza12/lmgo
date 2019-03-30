
<div class="banner">
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($slideshow as $slide) { ?>
        <div class="item">   <img src="<?php echo base_url(); ?>/uploads/slideshow/<?php echo $slide->image ?>" data-thumb="images/toystory.jpg" alt="" />

            <div class="banner-text">
                <div class="container">
                    <div class="text-holder">
                        <h2 class="title main_heading"> <a style="color: #fff;font-size: 1.0em;"  <?php if ($slide->link) { echo 'href="'. $slide->link.'"'; } ?> class="slider-btn"><?php echo $slide->text ?></a></h2>
                        <div class="btn-holder" style="display:none;"><a href="#" class="slider-btn">Find out more</a></div>
                    </div>
                </div>
            </div>

        </div>
        <?php } ?>



    </div>
</div>
<!--slider area are end-->

