<div class="row-fluid">
<div class="span12">
<h3>Webiste Setting</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Updatesetting" method="POST" class="form-horizontal"  enctype="multipart/form-data">


<?php
echo form_hidden('pageSubmit', 'true');
?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           General Settings
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">

                <div class="control-group required" data-type="String">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $setting_title ?>" name="title" placeholder="Please enter website title" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group required" data-type="String">
                    <label class="control-label">Meta Keyword</label>
                    <div class="controls">
 						<textarea style="width:593px;" name="meta_keyword" id="meta_keyword" placeholder="Meta title" rows="6"  ><?php echo $setting_meta_keyword ?></textarea>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                  <div class="control-group required" data-type="String">
                    <label class="control-label">Meta Description</label>
                    <div class="controls">
 						<textarea style="width:593px;" name="meta_desc" id="meta_desc" placeholder="Meta Description" rows="6"  ><?php echo $setting_meta_description ?></textarea>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Address</label>
                    <div class="controls">
 						<textarea  style="width:593px;" name="address" id="address" placeholder="Address" rows="6"  ><?php echo $setting_address ?></textarea>
                        <span class="help-inline">Some hint here</span>
                    </div>
                     
              </div>
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Phone Number</label>
                    <div class="controls">
 						  <input type="text" value="<?php echo $setting_phone ?>" name="phone" placeholder="Please enter website title" class="span6 m-wrap" />
                   
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                 <div class="control-group required" data-type="String" style="position:relative;">
                    <label class="control-label">Logo</label>
                    <div class="controls">
                    <input  type="file" name="sidelogo" placeholder="Please enter website title" class="span6 m-wrap"  />                   
                        <span class="help-inline">Some hint here</span>
                      <div style="position:absolute;right:350px;bottom:-20px;">             
                        <img src="<?php echo base_url()?>../uploads/<?php echo $setting_logo;?>" width="auto" height="auto" /><br/>
   					<span style="padding-left:20px;">should be 228 x 78</span>
                    </div>

                    </div>
                </div>
                
				
				
				<div class="control-group required" data-type="String">
                    <label class="control-label">Email</label>
                    <div class="controls">
 						  <input type="text" value="<?php echo $setting_email ?>" name="email" placeholder="Please enter email address" class="span6 m-wrap" />
                   
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
				
				<div class="control-group required" data-type="String">
                    <label class="control-label">YouTube Link</label>
                    <div class="controls">
 						  <input type="text" value="<?php echo $setting_link ?>" name="link" placeholder="Please enter YouTube Link" class="span6 m-wrap" />
						  <span class="help-inline">Some hint here</span>
                    </div>
                </div>
				
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Website</label>
                    <div class="controls">
 						  <input type="text" value="<?php echo $setting_website ?>" name="website" placeholder="Please enter email address" class="span6 m-wrap" />
                   
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                
              

            </div>

        </div>

    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn blue" ><i class="icon-ok"></i> Save</button>
</div>


</form>
<!-- END FORM-->

</div>
</div>


