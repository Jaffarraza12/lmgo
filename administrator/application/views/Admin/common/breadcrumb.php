<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <?php echo anchor($breadcrumb_link1, $breadcrumb_anchor1); ?>
    </li>
    <?php
        if (strlen($breadcrumb_link2) > 2)
        {
    ?>
    <li>
        <i class="icon-angle-right"></i>
        <?php echo anchor($breadcrumb_link2, $breadcrumb_anchor2); ?>
    </li>
    <?php
        }
    ?>
</ul>