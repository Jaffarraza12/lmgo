<div class="row-fluid">
    <div class="span12">

        <div class="row-fluid">
            <div class="span6">
                <h3><?php echo $this->input->get('q'); ?></h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Select"><i class="icon-plus icon-white"></i> ADD NEW</a>
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
                        <?php if ($this->input->get('q') != "Content") { ?>
                            <th>Page ID</th>
                        <?php } ?>
                        <?php if ($this->input->get('q') != "Majalat-Ajman") {
                            echo "<th>Actions</th>";
                        } ?>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($view[$langCode] as $row)
                    {
                        echo '<tr>';
                        echo '<td>' . $row->title . '</td>';
                        if ($this->input->get('q') != "Content") {
                            echo '<td>';
                            echo 'ID: ' . $row->cid;
                            // echo '<a href="' . base_url() . '../page/' . $row->cid . '">page/' . $row->cid . '</a>';
                            if (strlen($row->tag) > 0) {
                                echo ' <b>or</b> TAG: /' . $row->tag;
                            }
                            echo '</td>';
                        }
                        echo '<td>';
                        //TODO:Improve anchor.. use codeigniter code here..

                        echo '<a class="glyphicons no-js edit" href="Edit?id=' . $row->content_id . '&q=' . $this->input->get('q') . '"><i></i></a>';
                        if ($type != "misc") {
                            if ($row->tag != "home" || $row->tag != "contact" || $row->tag != "about") {

                                echo '<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->cid . '</b></a>';

                            }
                        }
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
</div>