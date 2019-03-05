<div class="row-fluid">
    <div class="span12">
        <h3>ADD EVENT</h3>

        <!-- BEGIN FORM-->
        <form action="AddEvent" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <?php $this->load->view("Admin/common/add_content"); ?>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";

                document.getElementById("divImage").style.display = "none";
                document.getElementById("divSmallImage2").className = "control-group";

                /*var map = document.getElementById("secMap");
                map.style.display = "block";
                map.className = map.className + " map";*/
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
