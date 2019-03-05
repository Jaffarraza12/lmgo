<div class="row-fluid">
<div class="span12">
<h3>SEO</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="updateSEO" method="POST" class="form-horizontal">


<?php
echo form_hidden('pageSubmit', 'true');
?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Home Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['home_title']; ?>" name="home_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['home_keywords']; ?>" name="home_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="home_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['home_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Service Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['service_title']; ?>" name="service_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['service_keywords']; ?>" name="service_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="service_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['service_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<div class="portlet box purple">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Work Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['work_title']; ?>" name="work_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['work_keywords']; ?>" name="work_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="work_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['work_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            News Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['news_title']; ?>" name="news_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['news_keywords']; ?>" name="news_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="news_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['news_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Career Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['career_title']; ?>" name="career_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['career_keywords']; ?>" name="career_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="career_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['career_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Contact Page SEO
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">


                <div class="control-group">
                    <label class="control-label">Page Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['contact_title']; ?>" name="contact_title" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter Page title for SEO" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Keywords</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $rec['data']['contact_keywords']; ?>" name="contact_keywords" placeholder="Please enter keywords" class="span6 m-wrap popovers" data-original-title="Meta Page Title" data-content="Enter SEO Keywords which should be seperated by comma" data-trigger="hover" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Page Description</label>
                    <div class="controls">
                        <textarea name="contact_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Meta Page Title" data-content="Enter Page Description for SEO" data-trigger="hover"><?php echo $rec['data']['contact_desc']; ?></textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<div class="form-actions">
    <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
</div>


</form>
<!-- END FORM-->

</div>
</div>


