<div class="row-fluid">
    <div class="span12">
        <h3>EDIT EVENT</h3>

        <!-- BEGIN FORM-->
        <form action="EditEvent" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/edit_content.php"); ?>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";

                /*var map = document.getElementById("secMap");
                map.style.display = "block";
                map.className = map.className + " map";*/
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
