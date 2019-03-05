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

            <?php if (strtolower($this->input->get('q')) != strtolower("Abstracts")) { ?>

                        <div class="control-group">
                            <label class="control-label">Short Description</label>
                            <div class="controls">
                                <textarea name="short_desc_<?php echo $langCode; ?>"class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Description" data-content="Please enter description for Page" data-trigger="hover" ></textarea>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label">Details</label>
                                <div class="controls">
                                    <textarea id="ckeditor_<?php echo $langCode; ?>" class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="16"></textarea>
                                </div>
                            </div>
                        </div>

            <?php } ?>


            <?php if (strtolower($this->input->get('q')) != strtolower("Content")) { ?>

                        <div class="control-group">
                            <div class="control-label">
                                SEO Section
                            </div>
                            <div class="controls">

                                <div class="accordion in collapse">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseAr_<?php echo $langCode; ?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-angle-left"></i>
                                                Meta Keywords and Description
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="collapseAr_<?php echo $langCode; ?>">
                                            <div class="accordion-inner">

                                                <div class="control-group">
                                                    <label class="control-label">Page Title</label>
                                                    <div class="controls">
                                                        <input type="text" maxlength="500" name="meta_title_<?php echo $langCode; ?>" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                                                        <span class="help-inline">Some hint here</span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Page Keywords</label>
                                                    <div class="controls">
                                                        <input type="text" maxlength="500" name="meta_keywords_<?php echo $langCode; ?>" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                                                        <span class="help-inline">Some hint here</span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Page Description</label>
                                                    <div class="controls">
                                                        <textarea name="meta_desc_<?php echo $langCode; ?>" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

            <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php 
        }
        ?>
    </div>
</div>




    <!--div class="control-group">
        <label class="control-label">Full Page</label>
        <div class="controls">
            <label class="checkbox">
            <input type="checkbox" name="fullPage" value="1" checked="checked" />
        </label>
    </div>
</div-->

<!--h4>Dimension for Big Image : 800 x 400</h4>
<div class="control-group" data-type="File">
    <label class="control-label">Big Image for Detail Page</label>
    <div class="controls">
        <input type="file" name="largeFile" class="default">
    </div>
</div-->

<div class="portlet box blue" id="secMap" style="display:none;">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Map
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
            <label class="control-label">Address</label>
            <div class="controls">
                <input id="txtMapAddress" type="text" name="txtMapAddress" placeholder="Please enter adress" class="span4 m-wrap popovers" data-original-title="Address" data-content="Please Enter Location Address" data-trigger="hover" />
                <input type="button" value="Get Coordinates" class="btn blue" onclick="Map.codeAddress()">
            </div>
        </div>

        <div id="map-canvas" style="height:400px;"></div>

        <input type="hidden" id="txtLatitude" name="latitude" value="0" />
        <input type="hidden" id="txtLongitude" name="longitude" value="0" />

    </div>
</div>

<div class="portlet box yellow" id="secDate" style="display:none;">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Date
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
            <label class="control-label">Date</label>
            <div class="controls">
                <input type="text" value="" name="date" size="16" class="m-wrap m-ctrl-medium date-picker">
            </div>
        </div>

    </div>
</div>
<?php if (strtolower($this->input->get('q')) != strtolower("Content")) { ?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Page URL Option
        </div>
    </div>
    <div class="portlet-body">
        <div class="control-group">
            <label class="control-label">Seo-Friendly-Url</label>
            <div class="controls">
                <input type="text" name="seo_url" placeholder="Please enter seo url without spaces" class="span6 m-wrap popovers" data-original-title="Page SEO URL" data-content="Enter Page SEO URL of this page without space" data-trigger="hover" />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>
    </div>
</div>


<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Image Option
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
        <label class="control-label">Show Image</label>
            <div class="controls">
                <input type="checkbox" name="show_image" <?php if($page_content->show_image) { echo 'checked'; } ?> />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Image</label>
            <div class="controls">
                <input type="file" id="page-image" name="image" class="span6 m-wrap popovers" data-original-title="Page Image" data-content="Choose Image for the Page" data-trigger="hover" />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>

    </div>
</div>



<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Slider Option
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
        <label class="control-label">Show Image Slider</label>
            <div class="controls">
                <input type="checkbox" name="slider" <?php if($page_content->show_slider) { echo 'checked'; } ?> />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>

    </div>
</div>

<div class="portlet box grey">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            News Option
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
        <label class="control-label">Show Recent News</label>
            <div class="controls">
                <input type="checkbox" name="recent" <?php if($page_content->show_recent_news) { echo 'checked'; } ?> />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>

    </div>
</div>

<?php if (strtolower($this->input->get('q')) == "books") { ?>

<div class="portlet box purple" id="pdf-option">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            PDF Option
        </div>
    </div>
    <div class="portlet-body">
        <div class="control-group">
            <label class="control-label">PDF</label>
            <div class="controls">
                <input type="file" id="page-pdf" name="pdf" class="span6 m-wrap popovers" data-original-title="Pick PDF" data-content="Pick PDF for the Page. Maximum size is 8MB." data-trigger="hover" />
                <span class="help-inline">Some hint here</span>
            </div>
        </div>
    </div>
</div>

<?php } ?>


<div class="portlet box purple" id="divImage">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Images Options
        </div>
    </div>
    <div class="portlet-body">


        <div class="fluid-row">

            <div class="span12" id="divSmallImage">

                <div class="control-group required" data-type="File" id="divSmallImage2">
                    <label class="control-label">Small Image</label>
                    <div class="controls">
                        <input type="file" name="smallFile" class="default">
                    </div>
                    <div class="smallText" id="lblSmallImage">Dimension : 344 x 185</div>
                </div>

            </div>

            <!--div class="span6 lastCol" id="divSliderImage">


                <div class="control-group required" data-type="File">
                    <label class="control-label">Slider Image</label>
                    <div class="controls">
                        <input type="file" name="sliderFile" class="default">
                    </div>
                    <div class="smallText">Dimension : 1920 x 530</div>
                </div>

            </div-->

            <div class="clear">&nbsp;</div>

        </div>

        <div id="divLargeImage" style="display:none;">

            <div class="control-group" data-type="File">
                <label class="control-label">Large Image</label>
                <div class="controls">
                    <input type="file" name="largeFile" class="default">
                </div>
                <div class="smallText" id="lblSmallImage">Dimension : 344 x 185</div>
            </div>

        </div>

    </div>
</div>
<?php } ?>



<div class="form-actions">
    <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
    <a href="<?php echo base_url()."index.php/Pages/View?q=Page" ?>" class="btn">Cancel</a>
</div>