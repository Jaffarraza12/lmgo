<?php if ($page_content->show_recent_news) { ?>

<div class="col-md-12">
    <div class="row">
        <div class="owl-carousel">

            <?php foreach ($recent_news as $content) { ?>

            <div class="col-md-12">
                <div class="image" style="background-image:url('<?php echo base_url() ?>/uploads/pages/<?php echo $content->image ?>');"></div>

                <div class="col-md-12 rn-body">
                    <div class="text">
                        <h4><?php echo $content->title ?></h4>
                        <p><?php echo $content->short_desc ?></p>
                    </div>
                    <a href="<?php echo base_url() ?>/get/<?php echo $content->cid ?>" class="btn btn-primary">Read more</a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.css">

<style>
    .btn-primary {
        background-color: #c69c6c;
        border-color: #c69c6c;
    }
    .owl-carousel .col-md-12 .image {
        height: 180px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .owl-carousel .rn-body {
        background-color: #FFFFFF;
        padding-bottom: 10px;
    }
    .owl-carousel .col-md-12 .text {
        padding: 10px;
        height: 150px;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .owl-carousel .col-md-12 h4 {
        overflow: hidden;
    }
    .owl-carousel .col-md-12 p {
        overflow: hidden;
    }
    .owl-carousel .col-md-12 .text p {
        color: #000000;
        font-size: 12px;
    }
    .owl-carousel .col-md-12 .btn {
        border-radius: 60px;
    }
</style>

<?php } ?>