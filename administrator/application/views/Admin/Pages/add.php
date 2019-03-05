<div class="row-fluid">
    <div class="span12">
        <h3>ADD NEW</h3>

        <style>
            div.page-image img{
                width:30%;
            }
        </style>

        <!-- BEGIN FORM-->
        <form action="AddPage?q=<?php echo $this->input->get('q'); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/breadcrumb.php"); ?>

            <?php $this->load->view("Admin/common/add_content"); ?>

        </form>
        <!-- END FORM-->

        <script type="text/javascript">
            document.getElementById("divImage").style.display = "none";
            document.getElementById("divSmallImage").innerHTML = "&nbsp;";
            document.getElementById("divSmallImage").className = "span1";
            document.getElementById("divSliderImage").className = "span11";
        </script>

    </div>
</div>
