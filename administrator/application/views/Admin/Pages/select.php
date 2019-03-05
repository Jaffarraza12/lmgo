<div class="row-fluid">
    <div class="span12">
        <h3>ADD NEW</h3>

        <!-- BEGIN FORM-->
        <form action="Add" method="GET" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/breadcrumb.php"); ?>

            <div class="tabbable tabbable-custom">

                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-reorder"></i>
                            Type
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="control-group">
                            <label class="control-label">Select Type</label>
                            <div class="controls">
                                <label class="radio line">
                                    <div class="radio" id="uniform-undefined">
                                        <span>
                                            <input type="radio" value="Page" name="q" style="opacity: 0;" checked>
                                        </span>
                                    </div>
                                    Page
                                </label>
                                <label class="radio line">
                                    <div class="radio" id="uniform-undefined">
                                        <span class="checked">
                                            <input type="radio" value="News" name="q" style="opacity: 0;">
                                        </span>
                                    </div>
                                    News
                                </label>
                                <label class="radio line">
                                    <div class="radio" id="uniform-undefined">
                                        <span>
                                            <input type="radio" value="Content" name="q" style="opacity: 0;">
                                        </span>
                                    </div>
                                    Content
                                </label>


                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                                <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Create</button>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

        </form>
        <!-- END FORM-->

    </div>
</div>
