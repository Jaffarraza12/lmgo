<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Videos</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Add"><i class="icon-plus icon-white"></i> ADD NEW VIDEO</a>
            </div>
        </div>

        <?php $this->load->view("Admin/common/status.php"); ?>

        <div class="tabbable tabbable-custom">
            <div class="tab-content">

                <input type="hidden" value="Delete" class="url" />


                <div id="tab_1" class="tab-pane active">

                <table class="table table-striped table-hover table-bordered dataTables">
                    <thead>
                    <tr>
                        <th width="85%">Title</th>
                        <th width="10%">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($records as $row)
                    {
                        echo '<tr>';
                        echo '<td>' . $row->title . '</td>';
                        echo '<td>';
                        echo '<a class="glyphicons no-js edit" href="Edit?id=' . $row->id;
                        echo '"><i></i></a>';
                        echo '<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->id . '</b></a>';
                        echo '</td>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>





        </div>

    </div>

    </div>


</div>
