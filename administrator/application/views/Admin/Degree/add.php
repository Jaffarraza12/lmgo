<div class="row-fluid">
<div class="span12">
<h3>Degree</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Add" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo base_url(); ?>index.php/Degree/Delete" class="url" />
<?php
echo form_hidden('pageSubmit', 'true');

?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           Add New Degree
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


