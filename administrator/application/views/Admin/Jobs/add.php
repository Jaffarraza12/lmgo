<div class="row-fluid">
    <div class="span12">
        <h3>ADD JOB</h3>

        <!-- BEGIN FORM-->
        <form action="AddJob" method="POST" class="form-horizontal" enctype="multipart/form-data">

           <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
           <input name="url" class="url" type="hidden" value="<?php echo base_url() ?>" />

<div class="tabbable tabbable-custom">
    <?php $this->load->view("Admin/common/language_bar.php"); ?>
    <div class="tab-content">
    <?php  
	foreach($Languages as $row)
        {
        $langId = $row->id;
        $langCode = $row->code;
		    if ($row->id==$defaultLang)
            echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
        else
            echo '<div id="tab_' . $langCode . '" class="tab-pane">';
    
		
		?>
       
       
        <div class="portlet box <?php echo $row->color; ?>">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i>
                    <?php echo $row->name .' Job'; ?> 
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
                        <input type="text" name="title_<?php echo $langCode; ?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Title" data-content="Please enter title" data-trigger="hover"  />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Job Type</label>
                    <div class="controls">
                           <select name="job_type_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Job Type" data-trigger="hover"  >
                           <?php foreach($jobtypes as $jobtype) { ?>
                           		<option value="<?php echo $jobtype->job_type_id ?>"><?php echo $jobtype->name ?></option>
                            <?php  }  ?>
                           </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Categories</label>
                    <div class="controls">
                           <select name="category_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                           <?php foreach($categories as $category) { ?>
                           		<option value="<?php echo $category->category_id ?>"><?php echo $category->name		 ?></option>
                            <?php  }  ?>
                           </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Employer</label>
                    <div class="controls">
                           <select name="employer_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                           <?php foreach($employers as $employer) { ?>
                           		<option value="<?php echo $employer->employer_id ?>"><?php echo $employer->account_name		 ?></option>
                            <?php  }  ?>
                           </select>
                    </div>
                </div>
                
                 <div class="control-group required">
                    <label class="control-label">Country</label>
                    <div class="controls">
                           <select name="country_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Country" data-trigger="hover" onchange="Myjava.GetCities(this.value);"  >
                           <?php foreach($countries as $country) { ?>
                           		<option value="<?php echo $country->country_id ?>"><?php echo $country->en_title ?></option>
                            <?php  }  ?>
                           </select>
                    </div>
                </div>
                
                <div class="control-group required">
                    <label class="control-label">State	</label>
                    <div class="controls">
                           <select name="city_id" id="city_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Cities" data-trigger="hover">
                                <option value="0">Select City</option>
                           </select>
                    </div>
                </div>






                <div class="row-fluid">

                    <div class="control-group">
                        <label class="control-label">Details</label>
                        <div class="controls">
                            <textarea id="ckeditor_<?php echo $langCode; ?>" class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="6"></textarea>
                        </div>
                    </div>

                </div>


                

            </div>
   
  </div>
 
    </div>
</div>
<?php }?>
</div>

 
<!--div class="control-group">
    <label class="control-label">Full Page</label>
    <div class="controls">
        <label class="checkbox">
            <input type="checkbox" name="fullPage" value="1" checked="checked" />
        </label>
    </div>
</div-->

<!--h4>Dimension for Big Image : 800 x 400</h4>
<div class="control-group" data-type="File">
    <label class="control-label">Big Image for Detail Page</label>
    <div class="controls">
        <input type="file" name="largeFile" class="default">
    </div>
</div-->

<div class="portlet box blue map" id="secMap" >
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Map
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
            <label class="control-label">Address</label>
            <div class="controls">
                <input id="txtMapAddress" type="text" name="txtMapAddress" placeholder="Please enter adress" class="span4 m-wrap popovers" data-original-title="Address" data-content="Please Enter Location Address" data-trigger="hover" />
                <input type="button" value="Get Coordinates" class="btn blue" onclick="Map.codeAddress()">
            </div>
        </div>

        <div id="map-canvas" style="height:400px;"></div>

        <input type="hidden" id="txtLatitude" name="latitude" value="0" />
        <input type="hidden" id="txtLongitude" name="longitude" value="0" />

    </div>
</div>

<div class="portlet box green" id="secDate"  style="display:none" >
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Date
        </div>
    </div>
    <div class="portlet-body">

        <div class="control-group">
            <label class="control-label">Date</label>
            <div class="controls">
                <input type="text" value="" name="date" size="16" class="m-wrap m-ctrl-medium date-picker">
            </div>
        </div>
      	

    </div>
</div>

<div class="portlet box yellow" id="secDate" >
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Attributes
        </div>
    </div>
    <div class="portlet-body">

        <?php foreach($attributes as $attribute) { ?>
        <div class="control-group">
            <label class="control-label"><?php echo $attribute->name ?></label>
            <?php if($attribute->type == 'TEXTBOX') { ?>
                <div class="controls">
                    <input type="text" value="" name="attribute[<?php echo $attribute->attribute_id ?>]" size="16" class="m-wrap m-ctrl-medium">
                </div>
            <?php } else if($attribute->type == 'SELECT') { ?>
                <div class="controls">
                        <select name="attribute[<?php echo $attribute->attribute_id ?>]" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select attribute Option" data-trigger="hover">
            			<?php foreach($attribute_option[$attribute->attribute_id] as $option) {?>
                        		<option value="<?php echo $option['attribute_option_id'] ?>"><?php echo $option['name']?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
        </div>
      	<?php } ?> 

    </div>
</div>






<div class="form-actions">
    <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
    <button type="button" class="btn">Cancel</button>
</div>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";

                var map = document.getElementById("secMap");
                map.style.display = "block";
                map.className = map.className + " map";
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
