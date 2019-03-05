<div class="row-fluid">
    <div class="span12">
        <h3>Add Category</h3>

        <!-- BEGIN FORM-->
        <form action="AddCategories" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
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

    <input type="hidden" value="<?php echo base_url(); ?>index.php/Categories/getCategories" class="url" />

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           General Option
        </div>
    </div>
    <div class="portlet-body">

       			 <div class="control-group required" data-type="String">
                    <label class="control-label">Title<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="" name="name" placeholder="Please enter category name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter category" data-trigger="hover"  />
                    </div>
                </div>
                

                
                                
                <div class="control-group required"  data-type="Int">
                    <label class="control-label">Industry<span class="required">*</span></label>
                     <select style="margin-left:20px;"  value="" name="pid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select status" data-trigger="hover" onchange="Myjava.getCagtegories(this.value);" >
                     <?php $i=0;
                      echo  '<option value="0" >Parent</option> ';
                             foreach($categories as $val):
							echo  '<option value="'.$val['category_id'].'" >'.$val['name'].'</option> ';
					 	 		
						 	$i ++;
						  endforeach;?>
                     </select>
                    
                    <div class="controls">
                      
                    </div>
                </div>
                
                
                <div class="control-group required"  data-type="Int" style="display: none">
                    <label class="control-label">Specialisation<span class="required">*</span></label>
                     <select id="parentid" style="margin-left:20px;"  value="" name="parentid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" 
                     data-content="Please select status" data-trigger="hover">
                    <?php echo $subcategories; ?>
                  
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
