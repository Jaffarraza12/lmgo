<div class="row-fluid">
<div class="span12">
<h3>Testomonials</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Add" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo base_url(); ?>index.php/Testomonial/Delete" class="url" />
<?php
echo form_hidden('pageSubmit', 'true');

?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           Add New Testomonial
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">




                <div class="control-group required" data-type="String"><label class="control-label">Name<span class="required">*</span></label>
                    <div class="controls">
                        <input type="text" name="name" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Message</label>
                    <div class="controls">
                        <textarea id="message" class="span12  m-wrap" name="message" rows="3"></textarea>
                    </div>
                </div>


                <div class="control-group" ><label class="control-label">Picture</label>
                    <div class="controls">
                        <input type="file" name="pic" id="pic"  placeholder="Upload Picture" ?>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group" >
                    <label class="control-label">Visibility </label>
                        <div class="controls">
                            <select name="status" id="status" placeholder="Please enter status" class="m-wrap span6 popovers" data-original-title="Status" data-content="Please enter status" data-trigger="hover">
                                <option value="1">Visible</option>
                                <option value="0"> Not Visible</option>

                            </select>
                        </div>

                </div>





            </div>

        </div>

    </div>
</div>





<div class="form-actions">
    <input name="Submit" type="button" class="btn blue" onclick="return FormValidation.validate(this)"  value="Save"/>
</div>


</form>
<!-- END FORM-->

</div>
</div>


