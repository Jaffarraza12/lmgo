<div class="row-fluid">
    <div class="span12">
        <h3>Add</h3>

        <!-- BEGIN FORM-->
        <form action="<?php echo base_url()."index.php/BooksCategories/editcategory" ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        Content
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row-fluid">
                        <div class="control-group required">
                            <label class="control-label">Name<span class="required">*</span></label>

                            <div class="controls">
                                <input type="text" value="<?php echo $page_content->name ?>" name="name" placeholder="Please enter name" class="m-wrap span6 popovers" data-original-title="Name" data-content="Please enter name" data-trigger="hover" />
                                <span class="help-inline">Some hint here</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $page_content->id ?>">

            <div class="form-actions">
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                <a href="<?php echo base_url()."index.php/BooksCategories" ?>" class="btn">Cancel</a>
            </div>

        </form>

    </div>
</div>
