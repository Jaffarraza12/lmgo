<div class="inner-header">
    <div >
        <div class="row">
            <div class="col-md-12 sec-title colored text-center">
                <h2><?php echo $album->heading ?></h2>
                <p><?php echo $album->description ?></p>
                <span class="decor"><span class="inner"></span></span>
            </div>
        </div>
    </div>
</div>

<!--Gallery div-->
<div class="gallery-section pb_70">
    <div >

    </div>

    <div class="">
        <div class="filter-list clearfix">
             <?php foreach($galleries as $gallery ) {?>
            <div class="image-box mix mix_all charity sponsorship volunteering">
                <div class="inner-box">
                    <figure class="image">
                        <a href="<?php echo base_url().'uploads/gallery/'.$gallery->image ?>" class="lightbox-image"><img src="<?php echo base_url().'uploads/gallery/'.$gallery->image ?>" alt=""></a>
                    </figure>
                    <a href="<?php echo base_url().'uploads/gallery/'.$gallery->image ?>" class="lightbox-image btn-zoom" ><span class="icon fa fa-search"></span></a>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
</div>