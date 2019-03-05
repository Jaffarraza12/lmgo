<div class="row-fluid">
    <div class="span12">
        <h3>EDIT NEW PAGE</h3>

        <!-- BEGIN FORM-->
        <form action="EditPage?q=<?php echo $this->input->get('q'); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/edit_content.php"); ?>

        </form>
        <!-- END FORM-->

        <script type="text/javascript">

            <?php
                if ($this->input->get('q') == "misc")
                {
            ?>
            document.getElementById("divSEO").style.display = "none";
            <?php
                }
            ?>

            document.getElementById("divImage").style.display = "none";
            document.getElementById("divSmallImage").innerHTML = "&nbsp;";
            document.getElementById("divSmallImage").className = "span1";
            document.getElementById("divSliderImage").className = "span11";
        </script>

    </div>
</div>