<div class="col-sm-12">
    <div class="row" id="content-boxes" style="word-wrap: break-word;">
        <div class="col-md-12">
            <div class="col-md-12" style="padding-bottom: 15px; padding-top: 15px;">


                <?php if (strtolower($type) == "news" || strtolower($type) == "activities" || strtolower($type) == "books" || strtolower($type) == "page") { ?>

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
    </div>
</div>
