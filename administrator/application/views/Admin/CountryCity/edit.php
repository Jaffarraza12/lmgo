<div class="row-fluid">
    <div class="span12">
        <h3><?php echo $pHeading?></h3>

        <!-- BEGIN FORM-->
        <form action="<?php echo $formAction?>" name="Adds" method="POST" class="form-horizontal" enctype="multipart/form-data">
		 <?php echo form_hidden("serial",$serial);?>
           <?php echo form_hidden("countryId",$countryId);?>
<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>


<!--div class="control-group">
    <label class="control-label">Full Page</label>
    <div class="controls">
        <label class="checkbox">
            <?php
            if ($view[$langCode][0]->fullPage == 0)
                echo '<input type="checkbox" name="fullPage" value="1"  />';
            else
                echo '<input type="checkbox" name="fullPage" value="1" checked="checked"  />';
            ?>
        </label>
    </div>
</div-->

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           General Option
        </div>
    </div>
    <div class="portlet-body">
       			 <div class="control-group required" data-type="String">
                    <label class="control-label">Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo  $en_title?>" name="en_title" placeholder="Please enter  name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover"  />
                    </div>
                </div>
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Arabic Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo  $ar_title?>" name="ar_title" placeholder="Enter name is arabic" class="m-wrap span6 popovers" data-original-title="Usernmae" data-content="Enter name is arabic" data-trigger="hover"  />
                    </div>
                </div>
                <?php if(intval($countryId)==0){?>
                <div class="control-group required" data-type="File" id="divSmallImage2">
                    <label class="control-label">Current Flag</label>
                    <div class="controls">
                       <?php if($flag!=''){?>
                       	<img src="<?php echo base_url(); ?>../uploads/flags/<?php echo $flag?>" width="30" />
                       <?php } ?>
                    </div>
                </div>
                <div class="control-group required" data-type="File" id="divSmallImage2">
                    <label class="control-label">Flag</label>
                    <div class="controls">
                        <input type="file" name="smallFile" class="default">
                    </div>

                </div>
				
              <?php }?>
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
