<div class="row-fluid">
    <div class="span12">
        <h3>ADD MENU ITEM</h3>
        <!-- BEGIN FORM-->
        <form action="AddMenu" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="tabbable tabbable-custom">
                <?php $this->load->view("Admin/common/language_bar.php");?>
                <div class="tab-content">
                    <?php
                    foreach ($Languages as $row) {
                    $langId = $row->id;
                    $langCode = $row->code;
                    if ($row->id == $defaultLang) {
                        echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
                    } else {
                        echo '<div id="tab_' . $langCode . '" class="tab-pane">';
                    }
                    ?>
                    <div class="portlet box <?php echo $row->color; ?>">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i>
                                <?php echo $row->name; ?> Content
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row-fluid">
                                <?php
                                //Apply validation class only on fields which are in default language.
                                if ($row->id == $defaultLang) {
                                    echo '<div class="control-group required" data-type="String">';
                                    echo '<label class="control-label">Title<span class="required">*</span></label>';
                                } else {
                                    echo '<div class="control-group" data-type="String">';
                                    echo '<label class="control-label">Title</label>';
                                }
                                ?>

                                <div class="controls">
                                    <input type="text" name="title_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                                    <span class="help-inline">Some hint here</span>
                                </div>

                            </div>

                            <?php $menu_list =  $menu[$langCode]; ?>
                            <div class="control-group required" data-type="String">
                                <label class="control-label">Menu<span class="required">*</span></label>
                                <div class="controls">
                                    <select id="URLChange<?php echo $langCode; ?>" name="link_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap  span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover">
                                        <?php
                                        foreach($menu_list as $key => $val ){
                                            echo '<optgroup label="'.$key.'">';
                                            foreach($menu_list[$key] as $k => $m ){
                                                $title = ($m['title']) ? $m['title'] : $m['slag'];
                                                echo '<option value="'.$m['link'].'">'. $title.'</option>';
                                            }
                                            echo '</optgroup>';
                                            echo '<option value="custom">Custom</option>';

                                        }
                                        ?>
                                    </select>



                                </div>




                            </div>



                            <div class="control-group required custom<?php echo $langCode; ?>" data-type="String" style="display: none;">
                                <label class="control-label">CUSTOM URL<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="custom_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />

                                </div>




                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
    </div>
</div>

</div>
<div class="form-actions">
    <button type="submit" class="btn blue" ><i class="icon-ok"></i> Save</button>
    <a href="<?php echo base_url()."index.php/Pages/View?q=Page" ?>" class="btn">Cancel</a>
</div>




        </form>
        <!-- END FORM-->

    </div>
</div>
