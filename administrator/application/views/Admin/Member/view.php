<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Member</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Member/Add"><i class="icon-plus icon-white"></i> ADD NEW Member</a>
            </div>
        </div>

        <?php $this->load->view("Admin/common/status.php"); ?>

        <div class="tabbable tabbable-custom">
            <div class="tab-content">

                <input type="hidden" value="Member/Delete" class="url"   />


                <div id="tab_1" class="tab-pane active">

                <table class="table table-striped table-hover table-bordered dataTables">
                    <thead>
                    <tr>
                        <th width="30%">Name</th>
                        <th width="20%">Program</th>
                        <th width="15%">Card Number</th>
                        <th width="15%">Month /Year</th>
                        <th width="20%">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($page_content as $row)
                    {
                        echo '<tr>';
                        echo '<td>' . $row->name . '</td>';
                        echo '<td>' . $row->program . '</td>';
                        echo '<td>' . $row->card_number . '</td>';
                        echo '<td>' . $row->month .' '.$row->year . '</td>';
                        echo '<td>';
                        echo '<a class="glyphicons no-js edit" href="Member/Edit?id=' . $row->id;
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
