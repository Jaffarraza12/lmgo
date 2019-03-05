<div class="row-fluid">
    <div class="span12">

        <div class="row-fluid">
            <div class="span6">
                <h3>CONTACT QUERIES</h3>
            </div>
        </div>


        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
        <?php $this->load->view("Admin/common/status.php"); ?>

        <div class="tabbable tabbable-custom">
        <div class="tab-content">

                <input type="hidden" value="Delete" class="url" />

                <div id="tab123" class="tab-pane active">


                <table class="table table-hover table-bordered">
                    <thead class="inbox">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($view as $row)
                        {
                            echo '<tr class="' . $row->status . '">';
                            echo '<td>' . $row->name . '</td>';
                            echo '<td>' . $row->email . '</td>';
                            echo '<td>' . $row->telephone . '</td>';
                            echo '<td>';
                        ?>

                        <a href="javascript:void(0)" onclick="Dialogue.openMsg('test', 'msg', this)">Open</a>
                        <div class="msg" style="display:none;">
                            <?php echo $row->message; ?>
                        </div>
                        <input type="hidden" value="<?php echo $row->id; ?>" class="hidId" />

                        <?php
                            echo '</td>';
                            echo '<td>' . date('d M Y', $row->sts) . '</td>';
                        ?>

                        <?php
                            echo '</td>';
                            echo '<td><a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->id . '</b></a>';
                            echo '<a class="icon-envelope-alt" href="javascript:void(0)" onclick="Dialogue.unread(' . $row->id .', this)"><i></i></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>


    </div>
</div>