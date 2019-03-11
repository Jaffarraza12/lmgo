<!--slider area are start-->
<div class="slider-container">
    <!-- Slider Image -->
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php foreach ($slideshow as $slide) { ?>
            <img src="<?php echo base_url(); ?>/uploads/slideshow/<?php echo $slide->image ?>" data-thumb="images/toystory.jpg" alt="" />
            <?php } ?>

        </div>
    </div>
</div>
<!--slider area are end-->

