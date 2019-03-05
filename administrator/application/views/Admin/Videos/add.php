<div class="row-fluid">
    <div class="span12">
        <h3>ADD Videos</h3>

        <!-- BEGIN FORM-->
        <form action="AddVideos" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="tabbable tabbable-custom">
                <div class="tab-content">
                <div clas="portlet box">
                    <div class="portlet ">
                        <div class="portlet-body">
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                    <span class="help-inline">Title of the Video</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Link</label>
                                <div class="controls">
                                    <input type="text" name="link" placeholder="https://www.youtube.com/watch?v=TdpBRZ0dZhw" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                    <span class="help-inline">Youtube Link like</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="status" id="status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span class="help-inline">Youtube Link like</span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
                                <a href="<?php echo base_url()."index.php/Pages/View?q=Page" ?>" class="btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
