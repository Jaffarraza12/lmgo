<div class="row-fluid">
    <div class="span12">
        <h3>ADD Employer</h3>

        <!-- BEGIN FORM-->
        <form action="AddEmployer" method="POST" class="form-horizontal" enctype="multipart/form-data">

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>

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
                                echo '<label class="control-label">Name<span class="required">*</span></label>';
                            }
                            else
                            {
                                echo '<div class="control-group" data-type="String">';
                                echo '<label class="control-label">Name</label>';
                            }
                            ?>

                            <div class="controls">
                                <input type="text" name="name_<?php echo $langCode; ?>" placeholder="Please enter Name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter Name" data-trigger="hover"  />
                                <span class="help-inline">Some hint here</span>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Company Name</label>
                            <div class="controls">
                                <input type="text" name="account_name_<?php echo $langCode; ?>" placeholder="Please enter Company Name" class="m-wrap span6 popovers" data-original-title="Company Name" data-content="Please enter Company Name" data-trigger="hover"  />
                            </div>
                        </div>


                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea id="ckeditor_<?php echo $langCode; ?>" class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="6"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Company Profile</label>
                                <div class="controls">
                                    <textarea id="ckeditor_<?php echo $langCode; ?>" class="span12 ckeditor m-wrap" name="editor2_<?php echo $langCode; ?>" rows="6"></textarea>
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

        <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        Sign In Credentials
                    </div>
                </div>
                <div class="portlet-body">

                    <div class="control-group required" data-type="String"">
                        <label class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="email" placeholder="Please enter email address" class="span6 m-wrap popovers" data-original-title="Email address" data-content="Enter Email Addres" data-trigger="hover" />
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group required" data-type="String">
                        <label class="control-label">Password<span class="required">*</span></label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Please enter Password" class="span6 m-wrap popovers" data-original-title="Password" data-content="Enter Password" data-trigger="hover" />
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group  required" data-type="String">
                        <label class="control-label">Contact<span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="account_contact" placeholder="Please enter Contact" class="m-wrap span6 popovers" data-original-title="Contact" data-content="Please enter Company Contact" data-trigger="hover"  />
                        </div>
                    </div>



        </div>


            </div>

            <div class="portlet box grey"    >
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        Company Logo
                    </div>
                </div>
                <div class="portlet-body">

                    <div class="control-group">
                        <label class="control-label">logo</label>
                        <div class="controls">
                            <input id="logo" type="file" name="logo" placeholder="Please Upload Company Logo" class="span4 m-wrap popovers" data-original-title="Company logo" data-content="Please Upload Company logo" data-trigger="hover" />

                        </div>
                    </div>


                </div>
            </div>




        <div class="portlet box purple" id="secMap" style="display: none"   >
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



        <div class="form-actions">
            <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
            <button type="button" class="btn">Cancel</button>
        </div>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";

                document.getElementById("divImage").style.display = "none";
                document.getElementById("divSmallImage2").className = "control-group";

                /*var map = document.getElementById("secMap");
                map.style.display = "block";
                map.className = map.className + " map";*/
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
