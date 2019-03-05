<div class="row-fluid">
    <div class="span12">
        <h3>Add Shop</h3>

        <!-- BEGIN FORM-->
        <form action="AddShop" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
<?php $this->load->view("Admin/common/breadcrumb.php"); ?>

<div class="tabbable tabbable-custom">
 	 <?php $this->load->view("Admin/common/language_bar.php"); ?>
    <div class="tab-content">
    	
    
    
        <?php
        foreach($Languages as $row)
        {
        $langId = $row->id;
        $langCode = $row->code;

        echo form_hidden('sd_id_' . $langCode);

        if ($row->id==$defaultLang)
            echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
        else
            echo '<div id="tab_' . $langCode . '" class="tab-pane">';
        ?>

        <div class="portlet box <?php echo $row->color; ?>">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i>
                    <?php echo $row->name; ?> Content
                </div>
            </div>
            <div class="portlet-body">


                <div class="row-fluid">

                    <?php
                    //Apply validation class only on fields which are in default language.
                    if ($row->id==$defaultLang)
                    {
                        echo '<div class="control-group required" data-type="String">';
                        echo '<label class="control-label">Title<span class="required">*</span></label>';
                    }
                    else
                    {
                        echo '<div class="control-group" data-type="String">';
                        echo '<label class="control-label">Title</label>';
                    }
                    ?>

                    <div class="controls">
                        <input type="text" value="" name="title_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                        <span class="help-inline">Some hint here</span>
                    </div>
                    
                       
                </div>
                
            
                    
               
                <div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <textarea name="address_<?php echo $langCode; ?>"class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Description" data-content="Please enter description for Page" data-trigger="hover" ></textarea>
                    </div>
        		</div>
              

                <div class="control-group">
                    <label class="control-label">Short Description</label>
                    <div class="controls">
                        <textarea name="short_desc_<?php echo $langCode; ?>"class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Description" data-content="Please enter description for Page" data-trigger="hover" ></textarea>
                    </div>
                </div>
                

                <div class="row-fluid">

                    <div class="control-group">
                        <label class="control-label">Details</label>
                        <div class="controls">
                            <textarea  id="ckeditor"  class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="6"></textarea>
                        </div>
                    </div>

                </div>
                
             
                


                

                

                </div>
            </div>
        </div>
        <?php
        echo "</div>";
        }
        ?>
    </div>
</div>

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
  		    <li <?php echo ($i==1) ? 'class="active"' : '';  ?>><a href="#tab_<?php echo $i?>" data-toggle="tab"><?php echo $cat['en_title'] ?></a></li>
  		   <?php  ++$i; endforeach;?> 
	  </ul>    
      
      
         <div class="tab-content">
         <?php //echo '<pre>'.print_r($categoryarranged[1]).'</pre>'; exit();?> 
       		 <?php  $j=1; foreach($categories as  $val) : ?>
         		<div class="tab-pane <?php echo ($j==1) ? 'active' : '';  ?>" id="tab_<?php echo $j;?>"> 
                	   <ul class="categorylist">
                    <?php foreach($categoryarranged[$val['catid']]  as  $key => $row): ?>
                     <li><input type="checkbox" name="category[]" value="<?php echo  $key ?>" /> <span><?php echo  $row?></span></li>
                   
                    <?php  endforeach; ?>
                </ul>
                    
                </div>
                <?php ++$j; endforeach; ?>
               
                 
                
     
         </div>
  
      
      
      
      
      
      
      
      
      
      
      
      
      </div>
       			
                
                
                

    </div>
</div>

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           General Option
        </div>
    </div>
    <div class="portlet-body">

       			<div class="control-group required"  data-type="Select">
                    <label class="control-label">Select Owner *</label>
                    <div class="controls">
                    
                    <select  name="ownerid" placeholder="Please select owner" class="m-wrap span6 popovers" data-original-title="Owner" data-content="Please enter title" data-trigger="hover">
                   		<option value="-1">Select Owner</option>
                        <?php foreach($owners as $own){ ?>
                        <option value="<?php echo $own['ownerid'];?>" ><?php echo $own['username'];?></option>
                        	
                        
                        <?php } ?>
                        
                   
                    </select><span style="margin-left:10px;"><?php echo anchor("Owners/Add", "Add New Owner", array("target"=>"_blank")); ?></span>
                    
                     </div>
                </div>
                
                
                   <div class="control-group required">
                    <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="" name="email" placeholder="Please enter email" class="m-wrap span6 popovers" data-original-title="Email" data-content="Please enter email" data-trigger="hover"  />
                    </div>
                </div>
                
               <div class="control-group" >
                    <label class="control-label">Store Location</label>
                    <div class="controls">
                	    <input type="text" value="" name="landmark" placeholder="Please enter landmark" class="m-wrap span6 popovers" data-original-title="Landmark" data-content="Please enter landmark" data-trigger="hover"  />
                     </div>
                </div>
                
                 <div class="control-group">
                    <label class="control-label">Fax</label>
                    <div class="controls">
                      <input type="text" value="" name="fax" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Fax" data-content="Please enter title" data-trigger="hover"  />
                    </div>
                </div>
                
                
                  <div class="control-group">
                    <label class="control-label">Website</label>
                    <div class="controls">
                      <input type="text" value="" name="website" placeholder="Please enter website" class="m-wrap span6 popovers" data-original-title="website" data-content="Please enter website" data-trigger="hover"  />
                    </div>
                </div>
                
                
                  <div class="control-group">
                    <label class="control-label">Contact</label>
                    <div class="controls">
                      <input type="text" value="" name="contact" placeholder="Please enter contact" class="m-wrap span6 popovers" data-original-title="contact" data-content="Please enter contact" data-trigger="hover"  />
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Attributes</label>
                    <div class="controls">
                      <textarea  name="attributes" placeholder="Please enter attributes" class="m-wrap span6 popovers" data-original-title="attributes" data-content="Please enter attributes should be separated by comma " data-trigger="hover" ></textarea>
                    </div>
                </div>

    </div>
</div>






<div class="portlet box purple">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Images Options
        </div>
    </div>
    <div class="portlet-body" style="min-height:320px;">


        <div class="fluid-row">
         <div class="control-group">
                <label class="control-label">Uploading Options</label>
                <div class="controls">
                    <label class="radio">
                        <div class="radio" id="uniform-undefined"><span><input id="checkkBoxId"  type="radio" name="image_resize" value="reszie" class="resizer" /></span></div>
                        Upload Image with Exact Dimension
                    </label>
                    <label class="radio">
                        <div class="radio" id="uniform-undefined"><span class="checked"><input id="checkkBoxId" checked="checked" type="radio" name="image_resize" value="crop" class="resizer" /></span></div>
                        Crop Images Automatically
                    </label>
                </div>
            </div>
         <input name="strech" class="strech" type="hidden" value="" />

            <div id="divSmallImage">

              
               <input name="urll" class="url" type="hidden" value="<?php echo base_url()?>" />
                <div class="boder">
                
              
                          <a id="imgThumb1"><img id="Thumb1" src="<?php echo base_url()?>assets/img/thumb-310x172.png" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text">    <input name="imgThumb1" type="hidden"  />
                            <div class="loading" id="Thumbloading1" > </div> 
         <button data-original-title="This image will appear on the shop detail page." onclick="return false;" data-placement="top" class="btn tooltips">Main Image<br />(Dimension : 310x172)</button> </div>
                
                
                	
                </div>
                
                
                <div class="boder">
                            <a id="imgThumb2"><img id="Thumb2" src="<?php echo base_url()?>assets/img/thumb-146x200.png" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb2" type="hidden"  />
                            <div class="loading" id="Thumbloading2" > </div> 
         <button data-original-title="This image will appear in the shop grid listing." onclick="return false;" data-placement="top" class="btn tooltips">Gri1 Image<br />(Dimension : 46x200)</button> </div>
                
                
                
                </div>  
                    
                  <div class="boder">
                      <a id="imgThumb3"><img id="Thumb3" src="<?php echo base_url()?>assets/img/thumb-218x131.png" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb3" type="hidden"  />
                            <div class="loading" id="Thumbloading3" > </div> 
         <button data-original-title="This image will appear in the search results." onclick="return false;" data-placement="top" class="btn tooltips">Search Image<br />(Dimension : 218x131)</button> </div>
                
                  
                        
                
                </div>  
                
                <div class="boder">
                		  <a id="imgThumb4"><img id="Thumb4" src="<?php echo base_url()?>assets/img/thumb-92x122.png" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb4" type="hidden"  />
                            <div class="loading" id="Thumbloading4" > </div> 
         <button data-original-title="This image will appear in the top rated shops section" onclick="return false;" data-placement="top" class="btn tooltips">Top Rated Image<br />(Dimension : 92x122)</button> </div>
                
                
                
                
                </div>      
                     
                     
                       
                 
                
                   
                </div>

            


        </div>

        

    </div>
</div>


<div class="portlet box purple">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
          Additional Images<span style="font-size:10px;"> (You can upload unlimited Images .These Images will appear on shop detail page.)</span>
        </div>
    </div>
    <div class="portlet-body"   style="min-height:350px;">
    
    	


        <div class="fluid-row">
        	<a id="additionalimage" class="btn blue" >Add Image</a>  <div class="loading" id="additionalloading" > </div>

            <div id="divSmallImage" class="addimages">

             
                
                   
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

    
    