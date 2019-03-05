<?php $this->load->view("Admin/common/status.php"); ?>

<div class="tabbable tabbable-custom">
    <div class="tab-content">

        <input type="hidden" value="Delete" class="url" />

        <?php

        for($i=0; $i<1; $i++)
        {
        $row = $Languages[$i];
        $langId = $row->id;
        $langCode = $row->code;

        if ($row->id==$defaultLang)
            echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
        else
            echo '<div id="tab_' . $langCode . '" class="tab-pane">';
        ?>

        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
            <tr>
                <th width="85%">Title</th>
                <th width="10%">Actions</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($view[$langCode] as $row)
            {
                echo '<tr>';
                echo '<td>' . $row->title . '</td>';
                echo '<td>';
                //TODO:Improve anchor.. use codeigniter code here..
                echo '<a class="glyphicons no-js edit" href="Edit?id=' . $row->content_id;
                echo '"><i></i></a>';
                echo '<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->cid . '</b></a>';
                echo '</td>';
                echo '<td>';

                echo '<div class="control-group">';
                    echo '<div class="text-toggle-button text-enable-disable">';
                            if ($row->status == 1)
                                echo '<input name="status" onchange="Main.updateStatus(this)" type="checkbox" class="toggle" value="' . $row->content_id . '" checked="checked" />';
                            else
                                echo '<input name="status" onchange="Main.updateStatus(this)" type="checkbox" class="toggle" value="' . $row->content_id . '" enabled="" />';
                    echo '</div>';
                echo '</div>';

                echo '</td>';
            }
            ?>
            </tbody>
        </table>

    </div>
    <?php } ?>





</div>

</div>