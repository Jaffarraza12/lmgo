<div class="row-fluid">
    <div class="span12">
        <h3>Group</h3>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
        <?php $this->load->view("Admin/common/status.php"); ?>

        <!-- BEGIN FORM-->
        <form action="Edit?id=<?php echo $group_id ?>" method="POST" class="form-horizontal"  enctype="multipart/form-data">
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
                                    <input type="text" name="group_name" value="<?php echo $group->group_name?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Industry</label>
                                <div class="controls">
                                    <select name="category_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Employer" data-trigger="hover"  >
                                        <?php foreach($categories as $category) { ?>
                                            <?php $select = ($category->category_id == $group->category_id ) ? 'selected="selected"' : '' ?>
                                            <option <?php echo $select ?>  value="<?php echo $category->category_id ?>"><?php echo $category->name		 ?></option>
                                        <?php  }  ?>
                                    </select>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description" rows="5" style="width: 600px;" ><?php echo $group->description?></textarea>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Operating Since</label>
                                <div class="controls">
                                    <select name="operating" placeholder="Please select status" class="m-wrap popovers" data-original-title="Operating " data-content="Please select operating since" data-trigger="hover"  >
                                        <?php for($i=1947;$i<=date('Y');$i++) { ?>
                                            <?php $select = ($i == $group->operating ) ? 'selected="selected"' : '' ?>
                                            <option <?php echo $select ?> value="<?php echo $i ?>"><?php echo $i ?></option>
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
                                    <input type="text" name="name" value="<?php echo $group->name?>" placeholder="Please enter title" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group" data-type="String"><label class="control-label">Email<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $group->email ?>" name="email" placeholder="Please enter email" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover">
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group" data-type="String"><label class="control-label">Phone</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $group->phone?>"    name="phone" placeholder="Please enter phone" class="m-wrap span6 popovers" data-original-title="Phone" data-content="Please enter phone" data-trigger="hover">
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Gender</label>
                                <div class="controls">
                                    <select name="gender" placeholder="Please select gender" class="m-wrap popovers" data-original-title="gender " data-content="Please select operating since" data-trigger="hover"  >
                                        <option   <?php echo  ( $group->gender == 'male' ) ? 'selected="selected"' : '' ?>
                                            value="male"><?php echo 'male' ?></option>
                                        <option <?php echo  ( $group->gender == 'female' ) ? 'selected="selected"' : '' ?> value="female"><?php echo 'female' ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group" data-type="String"><label class="control-label">Date Of Birth<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="ui_date_picker_change_year_month" value="<?php echo date('m/d/Y',$group->dob)   ?>" type="text" name="dob" placeholder="Please enter dob" class="m-wrap span6 popovers" data-original-title="Date Of Birth" data-content="Please enter dae of birth" data-trigger="hover">
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea name="address" id="address" rows="5" style="width: 600px;" ><?php echo $group->address   ?></textarea>

                                </div>
                            </div>

                            <div class="control-group required">
                                <label class="control-label">Country</label>
                                <div class="controls">
                                    <select name="nationality" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Country" data-trigger="hover" onchange="Myjava.GetCities(this.value);"  >
                                        <?php foreach($countries as $country) { ?>
                                            <?php $select = ($country->country_id == $group->nationality ) ? 'selected="selected"' : '' ?>
                                            <option <?php echo $select ?> value="<?php echo $country->country_id ?>"><?php echo $country->en_title ?></option>
                                        <?php  }  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group required">
                                <label class="control-label">State</label>
                                <div class="controls">
                                    <select name="city_id" id="city_id" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select Cities" data-trigger="hover">
                                        <option value="0">Select City</option>
                                        <?php foreach($cities as $city) { ?>
                                            <?php $select = ($city->city_id == $group->state ) ? 'selected="selected"' : '' ?>
                                            <option <?php echo $select ?> value="<?php echo $city->city_id ?>"><?php echo $city->en_title ?></option>
                                        <?php  }  ?>
                                    </select>
                                </div>
                            </div>





                        </div>

                    </div>

                </div>
            </div>




            <div class="form-actions">
                <input name="Submit" type="submit" class="btn blue" onclick="return FormValidation.validate(this)"  value="Save"/>
            </div>


        </form>
        <!-- END FORM-->

    </div>
</div>


