<div class="row-fluid">
    <div class="span12">
        <h3>Add New Album</h3>

        <!-- BEGIN FORM-->
        <form action="AddAlbumPost" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
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
           Album
        </div>
    </div>
    <div class="portlet-body">

       			 <div class="control-group required" data-type="String">
                    <label class="control-label">English Title<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  name="eng_title" placeholder="Please enter English title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Arabic Title<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  name="ar_title" placeholder="Please enter Arabic title" class="m-wrap span6 popovers" data-original-title="Arabic Title" data-content="Please enter Arabic title" data-trigger="hover"  />
                    </div>
                </div>
                
                 <div class="control-group required" data-type="String">
                    <label class="control-label">Icon</label>
                    <div class="controls">
                      <input type="file" name="icon" id="icon"  />
                    </div>
                </div>
                
                
                 <div class="control-group required" >
                    <label class="control-label">English Description</label>
                    <div class="controls">
                     <textarea class="span6" name="eng_description" cols="40" rows="6"> </textarea>
                    </div>
                </div>

                <div class="control-group required" >
                    <label class="control-label">Arabic Description</label>
                    <div class="controls">
                        <textarea class="span6" name="arb_description" cols="40" rows="6"> </textarea>
                    </div>
                </div>
                
                
                
                
                <div class="control-group required" >
                    <label class="control-label">Album of</label>
                     <select style="margin-left:20px;"  value="" name="type" placeholder="Please select Type" class="m-wrap popovers" data-original-title="Status" 
                     data-content="Please select status" data-trigger="hover">
                     <option value="images">Images</option>
                     <option value="video">Video</option>
                     
                     </select>
                    
                    <div class="controls">
                      
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
