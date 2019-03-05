<div class="row-fluid">
    <div class="span12">

        <div class="row-fluid">
            <div class="span6">
                <h3>CAREERS</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Add"><i class="icon-plus icon-white"></i> ADD NEW SERVICE</a>
            </div>
        </div>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($view[$langCode] as $row)
                    {
                        echo '<tr>';
                        echo '<td>' . $row->title . '</td>';
                        echo '<td>' . $row->long_desc . '</td>';
                        echo '<td>';
                        //TODO:Improve anchor.. use codeigniter code here..
                        echo '<a class="glyphicons no-js edit" href="Edit?id=' . $row->content_id . '"><i></i></a>';
                        echo '<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->cid . '</b></a>';
                        echo '</td>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <?php } ?>

        </div>

    </div>

</div>