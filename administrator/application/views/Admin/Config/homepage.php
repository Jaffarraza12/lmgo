<div class="row-fluid">
<div class="span12">
<h3>SLIDERS</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="updateHomePage" method="POST" class="form-horizontal">


<?php
echo form_hidden('pageSubmit', 'true');
?>

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Service Section
            </div>
        </div>
        <div class="portlet-body">


            <div class="row-fluid">

                <div class="portlet-body">

                    <div class="row-fluid">

                        <div class="span12">


                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $rec['data']['service_heading']; ?>" name="service_heading" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Service Heading" data-content="Please enter heading for Service Area" data-trigger="hover" />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="service_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Service Description" data-content="Please enter description for service area" data-trigger="hover"><?php echo $rec['data']['service_desc']; ?></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Why Arabisk Section
            </div>
        </div>
        <div class="portlet-body">


            <div class="row-fluid">

                <div class="portlet-body">

                    <div class="row-fluid">

                        <div class="span12">


                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $rec['data']['why_heading']; ?>" name="why_heading" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Why Arabisk Heading" data-content="Please enter heading for Why Arabisk Area" data-trigger="hover" />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="why_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Why Arabisk Description" data-content="Please enter description for why arabisk area" data-trigger="hover"><?php echo $rec['data']['why_desc']; ?></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Latest Work
            </div>
        </div>
        <div class="portlet-body">


            <div class="row-fluid">

                <div class="portlet-body">

                    <div class="row-fluid">

                        <div class="span12">


                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $rec['data']['work_heading']; ?>" name="work_heading" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Latest Work Heading" data-content="Please enter heading for latest work Area" data-trigger="hover" />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="work_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Latest Work Description" data-content="Please enter description for latest work area" data-trigger="hover"><?php echo $rec['data']['work_desc']; ?></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Our Team
            </div>
        </div>
        <div class="portlet-body">


            <div class="row-fluid">

                <div class="portlet-body">

                    <div class="row-fluid">

                        <div class="span12">


                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $rec['data']['team_heading']; ?>" name="team_heading" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Team Section Heading" data-content="Please enter heading for Team Area" data-trigger="hover" />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="team_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Team Description" data-content="Please enter description for team area" data-trigger="hover"><?php echo $rec['data']['team_desc']; ?></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder"></i>
                Clients
            </div>
        </div>
        <div class="portlet-body">


            <div class="row-fluid">

                <div class="portlet-body">

                    <div class="row-fluid">

                        <div class="span12">


                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $rec['data']['client_heading']; ?>" name="client_heading" placeholder="Please enter title" class="span6 m-wrap popovers" data-original-title="Clients' Heading" data-content="Please enter heading for Cleint Area" data-trigger="hover" />
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="client_desc" class="span6 m-wrap popovers" rows="3" data-original-title="Client Description" data-content="Please enter description for client area" data-trigger="hover"><?php echo $rec['data']['client_desc']; ?></textarea>
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


