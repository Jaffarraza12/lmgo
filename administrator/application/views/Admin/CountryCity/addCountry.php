<div class="row-fluid">
    <div class="span12">
        <h3><?php echo $pHeading?></h3>

        <!-- BEGIN FORM-->
        <form action="<?php echo $formAction?>" name="Adds" method="POST" class="form-horizontal" enctype="multipart/form-data">

          
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
                      <input type="text" value="" name="en_title" placeholder="Please enter  name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover"  />
                    </div>
                </div>
                  <div class="control-group required" data-type="String">
                    <label class="control-label">Arabic Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" value="" name="ar_title" placeholder="Enter name is arabic" class="m-wrap span6 popovers" data-original-title="Usernmae" data-content="Enter name is arabic" data-trigger="hover"  />
                    </div>
                </div>
           
 			<?php if($type==0){?>
                <div class="control-group required" data-type="File" id="divSmallImage2">
                    <label class="control-label">Flag</label>
                    <div class="controls">
                        <input type="file" name="smallFile" class="default">
                    </div>
                    <div class="smallText" id="lblSmallImage">Dimension : 344 x 185</div>
                </div>

              <?php } if($type>0){?>
                <div class="control-group required"  data-type="Int">
                    <label class="control-label">Select Country<span class="required">*</span></label>
                     <select style="margin-left:20px;"  value="" name="cid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" 
                     data-content="Please select status" data-trigger="hover">
                     <option >Select Country</option>
                     <?php foreach($countries as $val):
					 		echo  '<option value="'.$val['serial'].'" >'.$val['en_title'].'</option> ';		
					 	  endforeach;?>
                     </select>
                    <div class="controls">
                      
                    </div>
                </div>
                <script language="javascript">
					document.Adds.cid.value='<?php echo $type?>';
				</script>
               <?php }?>

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
