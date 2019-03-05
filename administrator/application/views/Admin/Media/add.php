<div class="row-fluid">
    <div class="span12">
        <h3>MEDIA</h3>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>


        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <form action="AddMedia?mediaid=<?php echo $mediaid ?>" class="dropzone" id="my-awesome-dropzone">
                
                <?php form_hidden("mediaid",$mediaid);?>
                
                </form>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
        <input type="hidden" id="hidWidth" value="250" />
        <input type="hidden" id="hidHeight" value="166" />
        <input type="hidden" class="url" value="<?php echo base_url(); ?>" />
        <h4>Dimension : 250 x 166</h4>
        <div class="imgGal">
            <input type="hidden" id="url" value="Delete" />
            <?php
                foreach ($images as $image)
                {
                    echo '<span class="pic">';
                        echo '<a onclick="Main.deleteImgFromAjax(this,' . $image->mdid . ', null)" href="javascript:void(0)" class="glyphicons no-js circle_remove"><i></i></a>';
                        echo '<img src="' . base_url() . '../uploads/media/' . $image->image . '" width="250" height="166" style="height:185px !important;" alt="" />';
                    echo '</span>';
                }

            ?>
        </div>

    </div>
</div>
