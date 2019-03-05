<div class="row-fluid">
    <div class="span12">
        <h3>ADD NEWS</h3>

        <!-- BEGIN FORM-->
        <form action="AddNews" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/add_content"); ?>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
