<?php $this->load->view('Admin/common/header'); ?>
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->
        <?php $this->load->view('Admin/common/sidebar'); ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
        <div class="page-content">
            <div class="container-fluid">
                <?php $this->load->view($main_content); ?>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
<?php $this->load->view('Admin/common/footer'); ?>