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

        <div class="alert alert-info"><strong>Info!</strong> You can change position of the following items by drag n drop </div>

        <input type="hidden" value="Sort" id="sortUrl" />

        <div class="dd" id="nestable_list_1">
            <ol class="dd-list">
                <?php
                foreach ($view[$langCode] as $row)
                {
                    echo '<li class="dd-item" data-id="' . $row->content_id . '">';
                    echo '<div class="dd-handle">' . $row->title;
                    echo '<a class="glyphicons no-js circle_remove dd-nodrag li" href="javascript:void(0)" onclick="Main.deleteFromAjax(this)"><i></i><b>' . $row->cid . '</b></a>';
                    echo '<a class="glyphicons no-js edit dd-nodrag" href="Edit?id=' . $row->content_id . '"><i></i></a>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ol>
        </div>

    </div>
    <?php } ?>





</div>

</div>