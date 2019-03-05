<div class="row-fluid">
<div class="span12">
<h3>Attributes</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Add" method="POST" class="form-horizontal"  enctype="multipart/form-data">
<input type="hidden" value="<?php echo base_url(); ?>index.php/Categories/getCategories" class="url" />

<?php
echo form_hidden('pageSubmit', 'true');

?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           Add New Attributes
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">

                
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Attribute Name<span class="required">*</span></label>
                    <div class="controls">
                       <input type="text" value="" name="name" placeholder="Please enter Model Name" class="span6 m-wrap" />
                        
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                
                
                 <div class="control-group">
                          <label class="control-label">Posting Entry</label>
                                 <div class="controls">
                                          <select name="type" id="range" class="medium m-wrap" tabindex="1">
                                                 <option value="TEXTBOX">Single</option>
                                                 <option value="TEXTAREA">Long Text</option>
                                                 <option value="SELECT">Range</option>
                                         </select>
                                </div>
                          </select>
                  </div>
                  
                  
                   <div class="control-group attoption" style="display:none;">
                          <label class="control-label">Searching Creataria</label>
                                 <div class="controls">
                                        <select name="search" class="medium m-wrap" tabindex="2">
                                             <option value="CHECKBOX">CHECKBOX</option>
                                             <option value="SELECT">SELECT</option>
                                        </select>
                                 </div>
                          </select>
                  </div>
                 
                
               <div class="control-group">
               
                                <label class="control-label">Primary Attribute</label>
                                <div class="controls">
                                          <label class="checkbox">
                                          <input name="primary" type="checkbox" value="1" /> 
                                          </label>
                                          
                                </div>
                   </div>
        
                  

            </div>

        </div>

    </div>
</div>


<div class="portlet box purple attoption" style="display:none;">
    <div class="portlet-title">
        <div class="caption">
        
            <i class="icon-reorder"></i>
            Attribute Options
        </div>
    </div>
    <div class="portlet-body DAM" >
	<a id="additionalimage" class="btn blue addoop" >Add Option</a>  <div class="loading" id="additionalloading" > </div>

         

        <div class="fluid-row" style="clear:both;">
        	   <div class="control-group" style="float:left;">
                                       <label class="control-label"> Name</label>
                                       <div class="controls">
                                          <input name="attrname[]" type="text" placeholder="Name" class="m-wrap small" />
                                          
                                       </div>
               </div>
               
                
               
                 
                <div class="control-group">
                                       <label class="control-label">Value</label>
                                       <div class="controls">
                                          <input name="attrvalue[]" type="text" placeholder="value" class="m-wrap small" />
                                          
                                       </div>
               </div>
        	
         
       


        </div>
        
 


        

    </div>
</div>




<div class="form-actions">
    <input name="Submit" type="submit" class="btn blue"  value="Save"/>
</div>


</form>
<!-- END FORM-->

</div>
</div>


