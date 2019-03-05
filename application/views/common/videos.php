<link href="<?php echo base_url(); ?>/assets/css/colorbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.js"></script>

<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $.noConflict();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $("#click").click(function(){
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
        });
    });
</script>
<div class="col-sm-12">
    <div class="row" id="content-boxes" style="word-wrap: break-word;min-height: 900px">
        <div class="col-md-12">

            <?php if ($page_content->show_slider) {
                $config->render(['common/slideshow']);
            } ?>

            <?php if ($page_content->image && $page_content->show_image) {
                echo '<img src="' . base_url() . '/uploads/pages/' . $page_content->image . '" alt="' . $page_content->tag . '">';
            } ?>

            <div class="col-md-12" style="padding-bottom: 15px; padding-top: 15px;">


                <?php foreach($videos as $video) {
                    $parts = parse_url($video->link);
                    parse_str($parts['query'], $query);

                    if($query['v']){
                    ?>
                <div class="col-md-4 col-xs-6 col-sm-6 tile" style="background: #fff">
                    <div class="video-container">
                        <a class='youtube' href="http://www.youtube.com/embed/<?php echo $query['v'] ?>?rel=0&amp;wmode=transparent">
                            <img src="http://i3.ytimg.com/vi/<?php echo $query['v'] ?>/maxresdefault.jpg" width="100%" height="250" />

                        </a>

                    </div>
                </div>
            <?php }
            } ?>
            </div>
            <div class="container-fluid pb-video-container">
                <div class="col-md-12 col-md-offset-1">
                    <div class="row pb-row">
                      <?php foreach($videos as $video) { ?>

                         <div class="col-md-3 pb-video">
                            <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/<?php echo $video->link ?>?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                            <label class="form-control label-warning text-center"><?php echo $video->title ?></label>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<style>
    .tile{
        direction: rtl;
        float: right;
    }
</style>

