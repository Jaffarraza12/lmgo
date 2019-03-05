<div class="row-fluid">
<div class="span12">
<h3>Group</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="Add" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo base_url(); ?>" class="url" />
<?php
echo form_hidden('pageSubmit', 'true');

?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           Group Detail
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">

                <div class="control-group required" data-type="String"><label class="control-label"> Group Name<span class="required">*</span></label>
                    <div class="controls">
                        <input type="text" name="group_name" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                        <span class="help-inline">Some hint here</span>
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


                <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <textarea name="description" id="description" rows="5" style="width: 600px;" ></textarea>

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Operating Since</label>
                    <div class="controls">
                        <select name="operating" placeholder="Please select status" class="m-wrap popovers" data-original-title="Operating " data-content="Please select operating since" data-trigger="hover"  >
                            <?php for($i=1947;$i<=date('Y');$i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php  }  ?>
                        </select>
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Person In Charge
            </div>
        </div>
        <div class="portlet-body">

            <div class="row-fluid">

                <div class="span12">

                    <div class="control-group required" data-type="String"><label class="control-label">Group Leader<span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="name" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group" data-type="String"><label class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="email" placeholder="Please enter email" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group" data-type="String"><label class="control-label">Phone</label>
                        <div class="controls">
                            <input type="text" name="phone" placeholder="Please enter phone" class="m-wrap span6 popovers" data-original-title="Phone" data-content="Please enter phone" data-trigger="hover">
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <select name="gender" placeholder="Please select gender" class="m-wrap popovers" data-original-title="gender " data-content="Please select operating since" data-trigger="hover"  >
                                    <option value="male"><?php echo 'male' ?></option>
                                    <option value="female"><?php echo 'female' ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" data-type="String"><label class="control-label">Date Of Birth<span class="required">*</span></label>
                        <div class="controls">
                            <input id="ui_date_picker_change_year_month" type="text" name="dob" placeholder="Please enter dob" class="m-wrap span6 popovers" data-original-title="Date Of Birth" data-content="Please enter dae of birth" data-trigger="hover">
                            <span class="help-inline">Some hint here</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <textarea name="address" id="address" rows="5" style="width: 600px;" ></textarea>

                        </div>
                    </div>

                    <div class="control-group required">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <select name="nationality" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Country" data-trigger="hover" onchange="Myjava.GetCities(this.value);"  >
                                <?php foreach($countries as $country) { ?>
                                    <option value="<?php echo $country->country_id ?>"><?php echo $country->en_title ?></option>
                                <?php  }  ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group required">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <select name="city_id" id="city_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Cities" data-trigger="hover">
                                <option value="0">Select City</option>
                            </select>
                        </div>
                    </div>





                </div>

            </div>

        </div>
    </div>




<div class="form-actions">
    <input name="Submit" type="button" class="btn blue" onclick="return FormValidation.validate(this)"  value="Save"/>
</div>


</form>
<!-- END FORM-->

</div>
</div>


