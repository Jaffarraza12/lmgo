<div class="row-fluid">
<div class="span12">
<h3>SEO</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="UpdatePass" method="POST" class="form-horizontal">


<?php
echo form_hidden('pageSubmit', 'true');
?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            Change Password
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">

            <div class="span12">

                <div class="control-group required" data-type="String">
                    <label class="control-label">Enter Old Password</label>
                    <div class="controls">
                        <input type="password" value="" name="old_password" placeholder="Please enter old password" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group required" data-type="String">
                    <label class="control-label">Enter New Password</label>
                    <div class="controls">
                        <input type="password" value="" id="new_password" name="new_password" placeholder="Please enter new password" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

                <div class="control-group required" data-type="String">
                    <label class="control-label">Re-Enter New Password</label>
                    <div class="controls">
                        <input type="password" value="" id="new_password2" name="new_password2" placeholder="Please re-enter new password" class="span6 m-wrap" />
                        <span class="help-inline">Some hint here</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="form-actions">
    <button type="button" class="btn blue" onclick="FormValidation.changePassword(this)"><i class="icon-ok"></i> Save</button>
</div>


</form>
<!-- END FORM-->

</div>
</div>


