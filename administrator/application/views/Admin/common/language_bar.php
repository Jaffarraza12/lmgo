<ul class="nav nav-tabs">
    <?php
    foreach($Languages as $row) {
        if ($row->id==$defaultLang)
            echo '<li class="active">';
        else
            echo '<li>';
        echo '<a data-toggle="tab" href="#tab_' . $row->code . '">' . $row->name . '</a></li>';
    }
    ?>

</ul>