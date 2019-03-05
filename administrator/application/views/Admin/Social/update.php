<div class="row-fluid">
<div class="span12">
<h3>Webiste Setting</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="EditSocial" method="POST" class="form-horizontal"  enctype="multipart/form-data">


<?php
echo form_hidden('socialid', $socialid);
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
                    <label class="control-label">Social Network</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $name;?>" name="name" placeholder="Please enter website title" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Link</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $link;?>" name="link" placeholder="Please enter website title" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                  <div class="control-group required" data-type="String" style="position:relative;">
                    <label class="control-label">Logo</label>
                    <div class="controls">
                    <input  type="file" name="socialicon" placeholder="Please enter website title" class="span6 m-wrap"  />                   
                        <span class="help-inline">Some hint here</span>
                      <div style="position:absolute;right:450px;bottom:-20px;">             
                        <img src="<?php echo base_url()?>../uploads/<?php echo $icon;?>" width="auto" height="auto" /><br/>
   					<span style="padding-left:20px;">should be 110 x 110</span>
                    </div>

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


