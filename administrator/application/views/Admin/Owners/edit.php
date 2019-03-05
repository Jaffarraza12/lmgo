<div class="row-fluid">
    <div class="span12">
        <h3>Edit Owner</h3>

        <!-- BEGIN FORM-->
        <form action="EditOwner" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<?php echo form_hidden('ownerid', $ownerid);?>



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
                
                
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" value="" name="password" placeholder="change password" class="m-wrap span6 popovers" data-original-title="Username" data-content="Please enter new password" data-trigger="hover"  />
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



<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
        Shop Assignment
        </div>
    </div>
    <div class="portlet-body ">
      <div class="tabbable tabbable-custom">
      
       <ul class="nav nav-tabs">
       
       <?php
	   		$i = 1; 
	   		foreach($categories as $cat) : ?>
  		    <li <?php echo ($i==1) ? 'class="active"' : '';  ?>><a href="#tab_<?php echo $i?>" data-toggle="tab"><?php echo $cat['en_title'] ?></a></li>
  		   <?php  ++$i; endforeach;?> 
	  </ul>    
      
      	<?php 
			
			
		 ?>
         <div class="tab-content">
         <?php //echo '<pre>'.print_r($categoryarranged[1]).'</pre>'; exit();?> 
       
       		 <?php  $j=1; foreach($categories as  $val) : ?>
         		<div class="tab-pane <?php echo ($j==1) ? 'active' : '';  ?>" id="tab_<?php echo $j;?>"> 
                	   <ul class="categorylist">
                    <?php foreach($shoparranged[$val['catid']]  as  $key => $row): ?>
                     <li><input  <?php if(in_array($key,$shopowners)) {  echo 'checked="checked"'; } ?>     type="checkbox" name="category[]" value="<?php echo  $key ?>" /> <span><?php echo  $row?></span></li>
                   
                    <?php  endforeach; ?>
                </ul>
                    
                </div>
                <?php ++$j; endforeach; ?>
               
                 
                
     
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
