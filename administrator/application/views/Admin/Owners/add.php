<div class="row-fluid">
    <div class="span12">
        <h3>Add Owner</h3>

        <!-- BEGIN FORM-->
        <form action="AddOwner" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
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
                      <input type="text" value="<?php echo $name ?>" name="name" placeholder="Please enter name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Username<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo $username?>" name="username" placeholder="Please enter username" class="m-wrap span6 popovers" data-original-title="Usernmae" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Password<span class="required">*</span></label>
                    <div class="controls">
                      <input type="password" value="" name="password" placeholder="Please enter username" class="m-wrap span6 popovers" data-original-title="Username" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                
                 <div class="control-group required" data-type="String">
                    <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo $email?>" name="email" placeholder="Please enter email" class="m-wrap span6 popovers" data-original-title="Email" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
              

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
