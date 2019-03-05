<div class="row-fluid">
<div class="span12">
<h3>Attributes</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Edit" method="POST" class="form-horizontal"  enctype="multipart/form-data">
<input type="hidden" value="<?php echo base_url(); ?>index.php/Categories/getCategories" class="url" />
<input type="hidden" value="<?php echo  $amid ?>"  name="amid"/>

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
                       <input type="text" value="<?php echo $amenities_info->name ?>" name="name" placeholder="Please enter Model Name" class="span6 m-wrap" />
                        
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                
                <div class="control-group required" data-type="String">
                    <label class="control-label">Name In Arabic<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo $amenities_info->arname ?>" name="arname" placeholder="Please enter Model Name" class="span6 m-wrap" />
                      
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                 <div class="control-group">
                          <label class="control-label">Status</label>
                                 <div class="controls">
                                          <select name="type" id="range" class="medium m-wrap" tabindex="1">
                                          			
                                         <option <?php echo  ($amenities_info->status == 1 ) ? 'selected="selected"' : ''; ?>  value="1">Active</option>
                                         <option <?php echo  ($amenities_info->status == 0 ) ? 'selected="selected"' : ''; ?>  value="0">Disable</option>
                                         </select>
                                </div>
                          </select>
                  </div>
                  
                  
                 
                 
                
           
        
                  

            </div>

        </div>

    </div>
</div>





<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
        Categories
        </div>
    </div>
    <div class="portlet-body ">
      <div class="tabbable tabbable-custom">
      
       <ul class="nav nav-tabs">
       
       <?php
	   		$i = 1; 
	   		foreach($categories as $cat) : ?>
  		    <li <?php echo ($i==1) ? 'class="active"' : '';  ?>><a href="#tab_<?php echo $i?>" data-toggle="tab"><?php echo $cat['name'] ?></a></li>
  		   <?php  ++$i; endforeach;?> 
	  </ul>    
      
      
         <div class="tab-content">
         <?php //echo '<pre>'.print_r($categoryarranged[1]).'</pre>'; exit();?> 
       		 <?php  $j=1; foreach($categories as  $val) : ?>
         		<div class="tab-pane <?php echo ($j==1) ? 'active' : '';  ?>" id="tab_<?php echo $j;?>"> 
                	   <ul class="categorylist">
                    <?php foreach($categoryarranged[$val['catid']]  as  $key => $row): ?>
                     <li><input <?php if(in_array($key,$amenities_categories))  echo 'checked="checked"'; ?> type="checkbox" name="category[]" value="<?php echo  $key ?>" /> <span><?php echo  $row?></span></li>
                   
                    <?php  endforeach; ?>
                </ul>
                    
                </div>
                <?php ++$j; endforeach; ?>
               
                 
                
     
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


