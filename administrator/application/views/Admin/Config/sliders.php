<div class="row-fluid">
    <div class="span12">
        <h3>SLIDERS</h3>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
        <?php $this->load->view("Admin/common/status.php"); ?>

        <!-- BEGIN FORM-->
        <form action="updateSliders" method="POST" class="form-horizontal" enctype="multipart/form-data">
        
        <input class="url" type="hidden" value="<?php echo base_url().'index.php/Config/GetSlider'?>" />


            <?php
                echo form_hidden('pageSubmit', 'true');
            ?>

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        Home Page Sliders
                    </div>
                </div>
                <div class="portlet-body">
                
                  <div class="control-group required"  data-type="Int">
                              <label class="control-label">Category<span class="required">*</span></label>
                                    <select style="margin-left:20px;"  value="" name="pid" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select status" data-trigger="hover" onchange="Myjava.GetSlider(this.value);" >
                                             <?php $i=0; 
											   echo  '<option selected="selected" value="0" >Default</option> ';		
                                                 foreach($categories as $val):
                                                         
                                                    echo  '<option  value="'.$val['catid'].'" >'.$val['name'].'</option> ';		
                                                        
                                                    $i ++;
                                        endforeach;?>
                                   </select>
                                            
                                            <div class="controls">
                                              
                                            </div>
                    </div>


                    <div class="row-fluid digger">

                        <div class="span3">

                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 1</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="<?php echo base_url(); ?>../uploads/<?php echo $rec['data']['slider1_img']; ?>" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider1_img" class="default">
                                            <input type="hidden" name="slider1_hid" value="<?php echo $rec['data']['slider1_img']; ?>">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="<?php echo $rec['data']['slider1_text']; ?>" type="text" name="slider1_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider1_anchor']; ?>" type="text" name="slider1_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider1_url']; ?>" type="text" name="slider1_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">
                                                <?php
                                                    if ($rec['data']['slider1_state'] == 1)
                                                        echo '<input name="slider1_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                    else
                                                        echo '<input name="slider1_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                ?>
                                            </div>
                                        </div>
                                        
                                        
                                      
                                        
                               
                                        
                                        
                                        
                                        

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="span3">

                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="<?php echo base_url(); ?>../uploads/<?php echo $rec['data']['slider2_img']; ?>" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider2_img" class="default">
                                            <input type="hidden" name="slider2_hid" value="<?php echo $rec['data']['slider2_img']; ?>">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="<?php echo $rec['data']['slider2_text']; ?>" type="text" name="slider2_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider2_anchor']; ?>" type="text" name="slider2_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider2_url']; ?>" type="text" name="slider2_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">
                                                <?php
                                                if ($rec['data']['slider2_state'] == 1)
                                                    echo '<input name="slider2_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    echo '<input name="slider2_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="span3">

                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="<?php echo base_url(); ?>../uploads/<?php echo $rec['data']['slider3_img']; ?>" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider3_img" class="default">
                                            <input type="hidden" name="slider3_hid" value="<?php echo $rec['data']['slider3_img']; ?>">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="<?php echo $rec['data']['slider3_text']; ?>" type="text" name="slider3_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider3_anchor']; ?>" type="text" name="slider3_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider3_url']; ?>" type="text" name="slider3_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">
                                                <?php
                                                if ($rec['data']['slider3_state'] == 1)
                                                    echo '<input name="slider3_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    echo '<input name="slider3_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="span3">

                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 4</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="<?php echo base_url(); ?>../uploads/<?php echo $rec['data']['slider4_img']; ?>" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider4_img" class="default">
                                            <input type="hidden" name="slider4_hid" value="<?php echo $rec['data']['slider4_img']; ?>">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="<?php echo $rec['data']['slider4_text']; ?>" type="text" name="slider4_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider4_anchor']; ?>" type="text" name="slider4_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="<?php echo $rec['data']['slider1_url']; ?>" type="text" name="slider4_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">
                                                <?php
                                                if ($rec['data']['slider4_state'] == 1)
                                                    echo '<input name="slider4_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    echo '<input name="slider4_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="form-actions">
              <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
            </div>


        </form>
        <!-- END FORM-->

    </div>
</div>


