<div class="row-fluid">
    <div class="span12">
        <h3>EDIT NEWS</h3>

        <!-- BEGIN FORM-->
        <form action="EditNews" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/edit_content.php"); ?>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
