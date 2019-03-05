<div class="row-fluid">
    <div class="span12">

        <div class="row-fluid">
            <div class="span6">
                <h3>Books Categories</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="add"><i class="icon-plus icon-white"></i> ADD NEW</a>
            </div>
        </div>

        <?php $this->load->view("Admin/common/status.php"); ?>

        <div class="tabbable tabbable-custom">
            <div class="tab-content">

                <input type="hidden" value="Delete" class="url" />

                <table class="table table-striped table-hover table-bordered dataTables">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($page_content as $row)
                    {
                    ?>
                        <tr>
                            <td> <?php echo $row->name ?> </td>
                            <td>
                                <a href="<?php echo base_url().'index.php/BooksCategories/edit?id='.$row->id ?>" class="btn" style="float:left;margin-right:5px;">Edit</a>
                                <form id="bc-del-form-<?php echo $row->id ?>" action="<?php echo base_url().'index.php/BooksCategories/del' ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input class="btn" onclick="delBtn(<?php echo $row->id ?>)" type="button" value="Delete" style="float:left">
                                    <input type="submit" value="submit" style="display:none">
                                </form>
                            </td>
                        <tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>