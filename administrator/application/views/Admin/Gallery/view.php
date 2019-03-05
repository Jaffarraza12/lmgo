<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Gallery Images</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <form id="u-image-form" action="<?php echo base_url() ?>index.php/Gallery/Add" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="album_id" value="<?php echo $album_id ?>">
                    <input type="file" id="btn-new-img-hidden" name="uimage" accept="image/*" style="display:none">
                    <button id="btn-new-img" type="button" class="btn blue icn-only"><i class="icon-plus icon-white"></i> ADD</button>
                </form>
            </div>
        </div>
        <?php $this->load->view("Admin/common/status.php"); ?>
        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
        <div class="tabbable tabbable-custom">
            <div class="tab-content">
                <?php
                    for($i=0; $i<1; $i++)
                    {
                    $row = $Languages[$i];
                    $langId = $row->id;
                    $langCode = $row->code;

                    if ($row->id==$defaultLang)
                        echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
                    else
                        echo '<div id="tab_' . $langCode . '" class="tab-pane">';
                ?>
                <div class="span12">
                    <?php foreach ($page_content as $index => $content) { ?>
                    <div class="img-box">
                        <div class="img-box-image" style="background:url(<?php echo base_url(); ?>../uploads/gallery/<?php echo $content->image ?>)"></div>
                        <!-- <hr> -->
                        <div class="img-box-text">
                            <h4>Image <?php echo $index+1 ?></h4>
                        </div>
                        <div class="img-box-btn">
                            <form action="<?php echo base_url() ?>index.php/Gallery/Replace" method="post" class="span6" id="r-<?php echo $content->id ?>-form" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="<?php echo $content->id ?>">
                                <input type="hidden" name="album_id" value="<?php echo $album_id ?>">
                                <input type="file" id="btn-rep-<?php echo $content->id ?>-hidden" name="uimage" accept="image/*" style="display:none">
                                <button onclick="selectImg(<?php echo $content->id ?>)" type="button" class="btn btn-block">Change</button>
                            </form>
                            <form action="<?php echo base_url() ?>index.php/Gallery/Delete" method="post" class="span6">
                                <input type="hidden" name="uid" value="<?php echo $content->id ?>">
                                <button id="btn-del-img" type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <style>
            div.img-box {
                width: 30%;
                float: left;
                margin-right: 20px;
            }
            div.img-box div.img-box-image {
                height: 200px;
                background-repeat: no-repeat;
                background-size: cover !important;
            }
            div.img-box div.img-box-text {
                padding: 10px !important;
            }
        </style>
    </div>
</div>