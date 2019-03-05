<div class="col-sm-12">
    <div class="row" id="content-boxes">

        <?php foreach ($page_content as $content) {?>

        <div class="col-md-4 content-box">
            <div class="image" style="background-image:url('<?php echo base_url() ?>/uploads/pages/<?php echo $content->image ?>');"></div>
            <div class="col-md-12">
                <div class="text">
                    <h4><?php echo $content->title ?></h4>
                    <p><?php echo $content->short_desc ?></p>
                </div>
                <a href="<?php echo base_url()."get/".$content->cid ?>" class="btn btn-primary">Read more</a>
            </div>
        </div>

        <?php } ?>

        <div class="col-sm-12" style="padding:0 10px">
            <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li>
                <?php
                    echo '<a href="'.base_url().$q.'/?p='.$i.'">'.$i.'</a>';
                ?>
                </li>

            <?php } ?>
            </ul>
        </div>

    </div>
</div>

<style>
    .btn-primary {
        background-color: #c69c6c;
        border-color: #c69c6c;
    }
    #content-boxes .col-md-4 .image {
        height: 180px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    #content-boxes .col-md-4 .text {
        padding: 10px 0 0 0;
        overflow: hidden;
        height: 134px;
        overflow: hidden;
        margin-bottom: 10px;
    }
    #content-boxes .col-md-4 .text p {
        color: #000000;
        font-size: 12px;
    }
    #content-boxes .col-md-4 .btn {
        border-radius: 60px;
    }
    .content-box {
        float: right;
        margin-bottom: 20px;
        padding: 0 10px;
    }
    .content-box div.col-md-12 {
        background-color: #FFFFFF;
        padding: 0px 15px 10px 15px;
    }
    .pagination>li>a {
        color: #c69c6c;
    }
</style>