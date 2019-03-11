<section  class="our-services wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
         itemscope="" itemtype="http://schema.org/Service"
         style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
    <div class="container">
        <div class="w3eden" >
            <?php if ($page_content->cid != 44 ) { ?>
            <div class="widget widget_main_title" >
                <h2><?php echo $page_content->title ?></h2>
            </div>
            <?php } ?>

            <?php if ($page_content->image && $page_content->show_image) {
                echo '<img src="' . base_url() . '/uploads/pages/' . $page_content->image . '" alt="' . $page_content->tag . '">';
            } ?>
            <?php if ($page_content->long_desc) {
                echo html_entity_decode( str_replace('&quot;','', $page_content->long_desc));
            } ?>

            <?php if ($page_content->pdf) { ?>
                <div id="dwn-btn-here" class="col-md-12" style="padding-bottom: 15px;">
                    <a href="<?php echo base_url() ?>uploads/pages/pdf/<?php echo $page_content->pdf ?>" target="_blank" class="btn"><i class="fas fa-external-link-alt"></i> Open</a>
                    <a href="<?php echo base_url() ?>uploads/pages/pdf/<?php echo $page_content->pdf ?>" download='href="<?php echo base_url() ?>uploads/pages/pdf/<?php echo $page_content->pdf ?>"' class="btn"><i class="fa fa-download"></i> Download</a>
                </div>
            <?php }?>

        </div>
    </div>

</section>

