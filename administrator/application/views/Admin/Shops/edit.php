
<?php //print_r($view) ; exit();?>

<?php 

$img_main 	  =	($view['eng'][0]->img_main != "") ? base_url().'../uploads/shops/'.$view['eng'][0]->img_main  :  base_url().'assets/img/thumb-310x172.png' ;
$img_gridview = ($view['eng'][0]->img_gridview != "") ? base_url().'../uploads/shops/'.$view['eng'][0]->img_gridview  :  base_url().'assets/img/thumb-218x131.png' ;
$img_listview = ($view['eng'][0]->img_listview != "") ? base_url().'../uploads/shops/'.$view['eng'][0]->img_listview  :  base_url().'assets/img/thumb-146x200.png' ;
$img_homeicon = ($view['eng'][0]->img_homeicon != "") ? base_url().'../uploads/shops/'.$view['eng'][0]->img_homeicon  :  base_url().'assets/img/thumb-92x122.png' ;


?>


<div class="row-fluid">
    <div class="span12">
        <h3>EDIT Shop</h3>

        <!-- BEGIN FORM-->
        <form action="EditShop" method="POST" class="form-horizontal" enctype="multipart/form-data">

           <?php echo form_hidden('sid', $recId);?>
<?php $this->load->view("Admin/common/breadcrumb.php"); ?>

<div class="tabbable tabbable-custom">
 	 <?php $this->load->view("Admin/common/language_bar.php"); ?>
    <div class="tab-content">
    	
    
    
        <?php
        foreach($Languages as $row)
        {
        $langId = $row->id;
        $langCode = $row->code;

        echo form_hidden('sd_id_' . $langCode, $view[$langCode][0]->sdid);

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
                        <input type="text" value="<?php echo $view[$langCode][0]->title; ?>" name="title_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                        <span class="help-inline">Some hint here</span>
                    </div>
                    
                       
                </div>
             
            
                    
               
                <div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <textarea name="address_<?php echo $langCode; ?>"class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Description" data-content="Please enter description for Page" data-trigger="hover" ><?php echo $view[$langCode][0]->address; ?></textarea>
                    </div>
        		</div>
              

                <div class="control-group">
                    <label class="control-label">Short Description</label>
                    <div class="controls">
                        <textarea name="short_desc_<?php echo $langCode; ?>"class="span6 m-wrap popovers" rows="3" style="height:170px;" data-original-title="Description" data-content="Please enter description for Page" data-trigger="hover" ><?php echo html_entity_decode($view[$langCode][0]->short_desc); ?></textarea>
                    </div>
                </div>
                

                <div class="row-fluid">

                    <div class="control-group">
                        <label class="control-label">Details</label>
                        <div class="controls">
                            <textarea  id="ckeditor"  class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="6"><?php echo html_entity_decode($view[$langCode][0]->long_desc); ?></textarea>
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
      
      	<?php 
			
			
		 ?>
         <div class="tab-content">
         <?php //echo '<pre>'.print_r($categoryarranged[1]).'</pre>'; exit();?> 
       		 <?php  $j=1; foreach($categories as  $val) : ?>
         		<div class="tab-pane <?php echo ($j==1) ? 'active' : '';  ?>" id="tab_<?php echo $j;?>"> 
                	   <ul class="categorylist">
                    <?php foreach($categoryarranged[$val['catid']]  as  $key => $row): ?>
                     <li><input <?php if(in_array($key,$shopcategories)) {  echo 'checked="checked"'; } ?>    type="checkbox" name="category[]" value="<?php echo  $key ?>" /> <span><?php echo  $row?></span></li>
                   
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

       			<div class="control-group">
                    <label class="control-label">Contact</label>
                    <div class="controls">
                      <input type="text" value="<?php echo $view['eng'][0]->contact; ?>" name="contact" placeholder="Please enter contact" class="m-wrap span6 popovers" data-original-title="contact" data-content="Please enter contact" data-trigger="hover"  />
                    </div>
                </div>
                
                <div class="control-group">
                   <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="<?php echo $view['eng'][0]->email; ?>" name="email" placeholder="Please enter email" class="m-wrap span6 popovers" data-original-title="Email" data-content="Please enter email" data-trigger="hover"  />
                    </div>
                </div>
                
                <div class="control-group" >
                    <div class="control-group" >
                    <label class="control-label">Store Location</label>
                    <div class="controls">
                	    <input type="text" value="<?php echo $view[$langCode][0]->landmark ?>" name="landmark" placeholder="Please enter landmark" class="m-wrap span6 popovers" data-original-title="Landmark" data-content="Please enter landmark" data-trigger="hover"  />
                     </div>
                </div>
                    

                <div class="control-group">
                    <label class="control-label">Website</label>
                    <div class="controls">
                      <input type="text" value="<?php echo $view['eng'][0]->website; ?>" name="website" placeholder="Please enter website" class="m-wrap span6 popovers" data-original-title="website" data-content="Please enter website" data-trigger="hover"  />
                    </div>
                </div>
                
                
                   <div class="control-group">
                    <label class="control-label">Fax</label>
                    <div class="controls">
                      <input type="text" value="<?php echo $view['eng'][0]->fax; ?>" name="fax" placeholder="Please enter fax" class="m-wrap span6 popovers" data-original-title="Fax" data-content="Please enter fax" data-trigger="hover"  />
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Attributes</label>
                    <div class="controls">
                      <textarea  name="attributes" placeholder="Please enter attributes" class="m-wrap span6 popovers" data-original-title="attributes" data-content="Please enter attributes should be separated by comma " data-trigger="hover" ><?php echo $view['eng'][0]->atributes; ?></textarea>
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
                
                <input name="strech" class="strech" type="hidden" value="" />

                <div id="divSmallImage">
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


                    <input name="urll" class="url" type="hidden" value="<?php echo base_url()?>" />
                     <div class="boder">
                
              
                          <a id="imgThumb1"><img id="Thumb1" src="<?php echo $img_main?>" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text">    <input name="imgThumb1" type="hidden" value="<?php echo $view['eng'][0]->img_main; ?>"  />
                            <div class="loading" id="Thumbloading1" > </div> 
         <button data-original-title="Main Logo (Should be 310x172)" data-placement="top" class="btn tooltips">310x172</button> </div> 
                
                
                	
                </div>
                
                
                <div class="boder">
                            <a id="imgThumb2"><img id="Thumb2" src="<?php echo $img_listview?>" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb2" type="hidden" value="<?php echo $view['eng'][0]->img_listview; ?>"   />
                            <div class="loading" id="Thumbloading2" > </div> 
         <button data-original-title="List View Image (Should be 146x200)" data-placement="top" class="btn tooltips">146x200</button> </div> 
                
                
                
                </div>  
                    
                  <div class="boder">
                      <a id="imgThumb3"><img id="Thumb3" src="<?php echo $img_gridview?>" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb3" type="hidden" value="<?php echo $view['eng'][0]->img_gridview; ?>"  />
                            <div class="loading" id="Thumbloading3" > </div> 
         <button data-original-title="Grid View Image (Should be 218x131)" data-placement="top" class="btn tooltips">218x131</button> </div> 
                
                  
                        
                
                </div>  
                
                <div class="boder">
                		  <a id="imgThumb4"><img id="Thumb4" src="<?php echo $img_homeicon?>" style="border:none;" width="auto" height="auto" alt="img upload" /></a>
                            <div class="thumb-text"><input name="imgThumb4" type="hidden"  value="<?php echo $view['eng'][0]->img_homeicon; ?>"  />
                            <div class="loading" id="Thumbloading4" > </div> 
         <button data-original-title="Home Display (Should be 92x122)" data-placement="top" class="btn tooltips">92x122</button> </div> 
                
                
                
                
                </div>      
              




                </div>




            </div>



        </div>
    </div>


    <div class="portlet box purple">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Additional Images <span style="font-size:10px;">(You can upload unlimited Images .These Images will appear on shop detail page.)</span>
            </div>
        </div>
        <div class="portlet-body"   style="min-height:350px;">



            <div class="fluid-row">
                <a id="additionalimage" class="btn blue" >Add Image</a>  <div class="loading" id="additionalloading" > </div>

                <div id="divSmallImage" class="addimages">

					 <?php foreach($additionalimages as $val) { ?>
                
                      
                     <span class="pic"><img width="200" height="100" alt="" src="<?php echo base_url() ?>../uploads/shops/<?php echo $val->image?>"><input type="hidden" value="<?php echo $val->image?>" name="addimages[]"><input type="hidden" value="<?php echo $val->image_large?>" name="addlargeimages[]"><div class="delworkimg" style="bottom: -30px;">Delete</div> </span>
                     
                       
              		 <?php } ?>  
                


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
