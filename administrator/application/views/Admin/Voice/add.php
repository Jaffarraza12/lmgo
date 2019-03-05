<div class="row-fluid">
    <div class="span12">
        <h3>ADD Voice</h3>

        <!-- BEGIN FORM-->
        <form action="AddVoice" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="tabbable tabbable-custom">
                <div class="tab-content">
                <div clas="portlet box">
                    <div class="portlet ">
                        <div class="portlet-body">
                            <div class="control-group <?php echo ($error['title']) ? 'error' : '' ?>">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title"  value="<?php echo $title ?>" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                    <span class="help-inline">Title of the Video</span>
                                    <?php if($error['title']) {
                                        echo '<span class="alert alert-danger">'.$error['title'].'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="control-group <?php echo ($error['audio']) ? 'error' : '' ?>">

                                <label class="control-label">Audio</label>
                                <div class="controls">

                                    <input type="file" name="audio" class="span6 m-wrap popovers" data-original-title="Voice" data-content="Select Audio Format in mp3" data-trigger="hover" />
                                    <span class="help-inline">Upload Audio MP3 format</span>
                                    <?php if($error['audio']) {
                                        echo '<span class="alert alert-danger">'.$error['audio'].'</span>';
                                     } ?>

                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="img" class="span6 m-wrap popovers" data-original-title="Voice" data-content="Select Audio Format in mp3" data-trigger="hover" />
                                    <span class="help-inline">Upload Image format</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Author</label>
                                <div class="controls">
                                    <input type="text" name="author" value="<?php echo $author ?>" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                    <span class="help-inline">Audio Author</span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
                                <a href="<?php echo base_url()."index.php/Voice" ?>" class="btn">Cancel</a>
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
