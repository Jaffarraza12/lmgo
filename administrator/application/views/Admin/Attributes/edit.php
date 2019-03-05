<div class="row-fluid">
<div class="span12">
<h3>Attributes</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Edit" method="POST" class="form-horizontal"  enctype="multipart/form-data">
<input type="hidden" value="<?php echo base_url(); ?>index.php/Categories/getCategories" class="url" />
<input type="hidden" value="<?php echo  $attributeid ?>"  name="attributeid"/>

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
                       <input type="text" value="<?php echo $attribute_info->name ?>" name="name" placeholder="Please enter Model Name" class="span6 m-wrap" />
                        
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                
                
                 <div class="control-group">
                          <label class="control-label">Posting Entry</label>
                                 <div class="controls">
                                          <select name="type" id="range" class="medium m-wrap" tabindex="1">
                                          			
                                         <option <?php echo  ($attribute_info->type == 'TEXTBOX' ) ? 'selected="selected"' : ''; ?>  value="TEXTBOX">Single</option>				 
                                           <option <?php echo  ($attribute_info->type == 'TEXTAREA' ) ? 'selected="selected"' : ''; ?>  value="TEXTAREA">Long Text</option>	
                                         <option <?php echo  ($attribute_info->type == 'SELECT' ) ? 'selected="selected"' : ''; ?>  value="SELECT">Range</option>
                                         </select>
                                </div>
                          </select>
                  </div>
                  
                  
                   <div class="control-group attoption" <?php echo  ($attribute_info->type == 'SELECT' ) ? '' : 'style="display:none;"'; ?>  >
                          <label class="control-label">Searching Creataria</label>
                                 <div class="controls">
                                        <select name="search" class="medium m-wrap" tabindex="2">
                                           
                                         <option <?php echo  ($attribute_info->search == 'CHECKBOX' ) ? 'selected="selected"' : ''; ?>  value="CHECKBOX">CHECKBOX</option>
                                         <option <?php echo  ($attribute_info->search == 'SELECT' ) ? 'selected="selected"' : ''; ?>  value="SELECT">SELECT</option>
                                           
                                        </select>
                                 </div>
                          </select>
                  </div>
                 
                
               <div class="control-group">
               
                                <label class="control-label">Primary Attribute</label>
                                <div class="controls">
                                <label class="checkbox">
                                   <input <?php echo  ($attribute_info->primary == 1 ) ? 'checked="checked"' : ''; ?>    name="primary" type="checkbox" value="1" /> 
                                </label>
                                          
                                </div>
                   </div>
        
                  

            </div>

        </div>

    </div>
</div>


<div class="portlet box purple attoption"  <?php echo  ($attribute_info->type == 'SELECT' ) ? '' : 'style="display:none;"'; ?> >
    <div class="portlet-title">
        <div class="caption">
        
            <i class="icon-reorder"></i>
            Attribute Options
        </div>
    </div>
    <div class="portlet-body DAM" >
	<a id="additionalimage" class="btn blue addoop" >Add Option</a>  <div class="loading" id="additionalloading" > </div>

      <?php foreach($attribute_option as $val) {  ?>   

        <div class="fluid-row" style="clear:both;">
        	   <div class="control-group" style="float:left;">
                                       <label class="control-label"> Name</label>
                                       <div class="controls">
                                          <input value="<?php echo $val->name ?>" name="attrname[<?php echo $val->atopid?>]" type="text" placeholder="Name" class="m-wrap small" />
                                          
                                       </div>
               </div>
               
                <div class="control-group" style="float:left;">
                                       <label class="control-label">Arabic Name</label>
                                       <div class="controls">
                                          <input value="<?php echo  $val->arname ?>" name="attrarname[]" type="text" placeholder="arname" class="m-wrap small" />
                                          
                                       </div>
               </div>
               
                 
                <div class="control-group">
                                       <label class="control-label">Value</label>
                                       <div class="controls">
                                          <input value="<?php echo  $val->value ?>" name="attrvalue[]" type="text" placeholder="value" class="m-wrap small" />
                                          
                                       </div>
               </div>
        	
         
       


        </div>
        
        
       <?php } ?> 
        
 


        

    </div>
</div>




<div class="form-actions">
    <input name="Submit" type="submit" class="btn blue"  value="Save"/>
</div>


</form>
<!-- END FORM-->

</div>
</div>


