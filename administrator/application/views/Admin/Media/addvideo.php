<div class="row-fluid">
    <div class="span12">
        <h3>Add New Album</h3>

        <!-- BEGIN FORM-->
        <form action="AddVideoPost?mediaid=<?php echo $mediaid ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>


<!--div class="control-group">
    <label class="control-label">Full Page</label>
    <div class="controls">
        <label class="checkbox">
            
        </label>
    </div>
</div-->


<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
          Add Video
        </div>
    </div>
    <div class="portlet-body">
    <?php echo form_hidden("mediaid",$mediaid) ?>

       			 <div class="control-group required" data-type="String">
                    <label class="control-label">Title<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  name="title" placeholder="Please enter English title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Link<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  name="link" placeholder="Please enter Youtube Link" class="m-wrap span6 popovers" data-original-title="Youtube Link" data-content="Please enter Youtube Link" data-trigger="hover"  />
                    </div>
                </div>
                
                
                
                

    </div>
</div>










<div class="form-actions">
    <input type="submit" name="save" class="btn blue" value="Save" onclick="FormValidation.validate(this)">
    <button type="button" class="btn">Cancel</button>
</div>


        </form>
        <!-- END FORM-->

    </div>
</div>
