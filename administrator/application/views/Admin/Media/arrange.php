<div class="row-fluid">

    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>ARRANGE WORK</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Add"><i class="icon-plus icon-white"></i> ADD NEW WORK</a>
            </div>
        </div>

        <?php $this->load->view("Admin/common/breadcrumb.php"); ?>


        <div class="alert alert-info"><strong>Info!</strong> You can change position of the following items by drag n drop </div>

        <input type="hidden" value="Sort" id="sortUrl" />


        <div class="dd" id="nestable_list_1">
            <ol class="dd-list">
                <?php
                foreach ($arrMedia as $work)
                {
                    echo '<li style="height:50px !important;" class="dd-item" data-id="' . $work->mediaid . '">';
                    echo '<div class="dd-handle" style="height:50px !important;">';
                    echo  $work->eng_title ;
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ol>
        </div>

        <div>&nbsp;</div>
        <div>&nbsp;</div>




    </div>


</div>
