<div class="row-fluid">
    <div class="span12">
        <h3>ADD APPLICANT</h3>

        <!-- BEGIN FORM-->
        <form action="AddUser" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input name="url" class="url" type="hidden" value="<?php echo base_url() ?>" />


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
                                echo '<label class="control-label">Applicant Name<span class="required">*</span></label>';
                            }
                            else
                            {
                                echo '<div class="control-group" data-type="String">';
                                echo '<label class="control-label">Applicant Name</label>';
                            }
                            ?>

                            <div class="controls">
                                <input type="text" name="name_<?php echo $langCode; ?>" placeholder="Please enter Name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter Name" data-trigger="hover"  />
                                <span class="help-inline">Some hint here</span>
                            </div>
                        </div>



                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="last_<?php echo $langCode; ?>" placeholder="Please enter Last Name" class="m-wrap span6 popovers" data-original-title="Company Name" data-content="Please enter Company Name" data-trigger="hover"  />
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group" data-type="String">
                                <label class="control-label">Email<span class="required">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="email_<?php echo $langCode; ?>" placeholder="Please enter Email" class="m-wrap span6 popovers" data-original-title="Company Name" data-content="Please enter Company Name" data-trigger="hover"  />
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Date Of Birth</label>
                                <div class="controls">
                                    <input type="text" name="dob_<?php echo $langCode; ?>" placeholder="Please enter Date Of Birth" class="m-wrap span6 popovers" data-original-title="Company Name" data-content="Please enter Company Name" data-trigger="hover"  />
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group" data-type="String">
                                <label class="control-label">Mobile<span class="required">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="cell_<?php echo $langCode; ?>" placeholder="Please enter Mobile no" class="m-wrap span6 popovers" data-original-title="Company Name" data-content="Please enter Company Name" data-trigger="hover"  />
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea id="address_<?php echo $langCode; ?>" class="span12 ckeditor m-wrap" name="editor_<?php echo $langCode; ?>" rows="6"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group" data-type="String">
                                <label class="control-label">Current Status<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="current_status" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                        <option value="unemployed">Un Employed</option>
                                        <option value="employed">Employed</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">

                            <div class="control-group">
                                <label class="control-label">Employer Status</label>
                                <div class="controls">
                                    <select name="employer_status" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                        <option value="Fresh">Fresh</option>
                                        <option value="Junior Level">Junior Level</option>
                                        <option value="Senior Level">Senior Level</option>
                                        <option value="Management Level">Management Level</option>
                                        <option value="CEO Level">CEO Level</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label">Notice Period</label>
                                <div class="controls">
                                    <select name="notice_period" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                        <option value="Immediately">Immediately</option>
                                        <option value="1 Week Notice">1 Week Notice</option>
                                        <option value="2 Week Notice">2 Week Notice</option>
                                        <option value="1 Month">1 Month</option>
                                        <option value="2 Months">2 Months</option>
                                        <option value="6 Months">6 Months</option>
                                    </select>
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

        <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        Applicant More Detail
                    </div>
                </div>
                <div class="portlet-body">


                    <div class="control-group required" data-type="String"">
                    <label class="control-label">Current Job Type</label>
                    <div class="controls">
                        <select name=job_type" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                            <option value="0">none</option>
                            <?php foreach($jobtypes as $jobtype) : ?>
                            <option value="<?php echo $jobtype->job_type_id ?>"><?php echo $jobtype->name ?></option>
                          <?php endforeach; ?>
                        </select>

                    </div>
                </div>

                <div class="control-group required" data-type="String">
                        <label class="control-label">Sutiable  Job Type</label>
                        <div class="controls">
                            <select name=target_job_type" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                <?php foreach($jobtypes as $jobtype) : ?>
                                    <option value="<?php echo $jobtype->job_type_id ?>"><?php echo $jobtype->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>

                <div class="control-group required" data-type="String">
                    <label class="control-label">Country<span class="required">*</span></label>
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

                <div class="control-group">
                        <label class="control-label">Industry</label>
                        <div class="controls">
                            <select name="category_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                <?php foreach($categories as $category) { ?>
                                    <option value="<?php echo $category->category_id ?>"><?php echo $category->name		 ?></option>
                                <?php  }  ?>
                            </select>
                        </div>
                </div>


             </div>
        </div>

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i>
                    Applicant Education
                </div>
            </div>
            <div class="portlet-body">


                <div class="control-group">
                    <label class="control-label">Starting date</label>
                    <div class="controls">
                        <input type="text" value="" name="date_from" size="16" class="m-wrap m-ctrl-medium date-picker">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Completing  date</label>
                    <div class="controls">
                        <input type="text" value="" name="date_to" size="16" class="m-wrap m-ctrl-medium date-picker">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Still</label>
                    <div class="controls">
                        <input type="checkbox" value="" name="still" size="16" >
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Degree</label>
                    <div class="controls">
                        <select name="degree_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                            <?php foreach($degrees as $degree) { ?>
                                <option value="<?php echo $degree->degree_id ?>"><?php echo $degree->name		 ?></option>
                            <?php  }  ?>
                        </select>
                    </div>
                </div>


        </div>
    </div>




        <div class="form-actions">
            <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
            <button type="button" class="btn">Cancel</button>
        </div>

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
