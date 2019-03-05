<div class="row-fluid">
    <div class="span12">
        <h3>ADD NEW CAREER</h3>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>

        <!-- BEGIN FORM-->
        <form action="AddCareer" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <div class="tabbable tabbable-custom">
                <?php $this->load->view("Admin/common/language_bar.php"); ?>
                <div class="tab-content">
                    <?php
                    foreach($Languages as $row)
                    {
                        $langId = $row->id;
                        $langCode = $row->code;

                        if ($row->id==$defaultLang)
                            echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
                        else
                            echo '<div id="tab_' . $langCode . '" class="tab-pane">';
                        ?>

                        <div class="row-fluid">

                            <?php
                                //Apply validation class only on fields which are in default language.
                                if ($row->id==$defaultLang)
                                {
                                    echo '<div class="control-group required" data-type="String">';
                                    echo '<label class="control-label">Title<span class="required">*</span></label>';
                                }
                                else
                                {
                                    echo '<div class="control-group" data-type="String">';
                                    echo '<label class="control-label">Title</label>';
                                }
                            ?>

                                <div class="controls">
                                    <input name="title_<?php echo $langCode; ?>" type="text" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="long_desc_<?php echo $langCode; ?>" class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Long Description" data-content="Please enter description" data-trigger="hover" ></textarea>
                                </div>
                            </div>

                        </div>

                        <?php
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>


            <div class="form-actions">
                <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
                <button type="button" class="btn">Cancel</button>
            </div>


        </form>
        <!-- END FORM-->

    </div>
</div>
