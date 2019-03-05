<div class="row-fluid">
<div class="span12">
<h3>Model Setting</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Add" method="POST" class="form-horizontal"  enctype="multipart/form-data">
<input type="hidden" value="<?php echo base_url(); ?>index.php/Categories/getCategories" class="url" />
<input type="hidden" value="<?php echo $modelid ?>" name="modelid" class="url" />

<?php
echo form_hidden('pageSubmit', 'true');
?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           Add New Model
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">

                <div class="control-group required" data-type="String" >
                    <label class="control-label">Main Category</label>
                    <div class="controls">
                       <select style="margin-left:20px;"  value="" name="pid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Category" data-trigger="hover" onchange="Myjava.getCagtegories(this.value);" >
                     <?php $i=0; 
					 	  foreach($categories as $val):
					 			  $select = ($i == 0) ? 'selected="selected"' : '';  
							echo  '<option '.$select.'value="'.$val['catid'].'" >'.$val['name'].'</option> ';		
					 	 		
						 	$i ++;
						  endforeach;?>
                     </select>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Category<span class="required">*</span></label>
                    <div class="controls">
                       <select id="parentid" style="margin-left:20px;"  value="" name="pid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Category" data-trigger="hover" onchange="Myjava.moreCagtegories(this.value);" >
                     <?php echo $subcategories;?>
                     </select>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Sub Category<span class="required">*</span></label>
                    <div class="controls">
                       <select id="category" style="margin-left:20px;"  value="" name="category" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Category" data-trigger="hover" onchange="Myjava.ShowModelForm();" >
                   
                     </select>
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                 
                <div class="modelform" style="display:none;">
                
                     <div class="control-group required" data-type="String">
                         <label class="control-label">Name<span class="required">*</span></label>
                        <div class="controls" style="margin-left:200px;">
                               <input type="text" value="" name="name" placeholder="Please enter Model Name" class="span6 m-wrap" />
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>
                    
                    
                    
                     <div class="control-group required" data-type="String">
                         <label class="control-label">Arabic Name<span class="required">*</span></label>
                        <div class="controls" style="margin-left:200px;">
                               <input type="text" value="" name="arname" placeholder="Please enter Model Name" class="span6 m-wrap" />
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>
                
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


