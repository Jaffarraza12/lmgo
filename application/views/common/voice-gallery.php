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
        
        
        $(".sound-img").hover(function () {

           elem = $(this)
           overlay = elem.find('.sound-overlay')
           listen = overlay.find('#sound-listen')
           download = overlay.find('#sound-download')
           overlay.clearQueue()
           overlay.show()
            overlay.animate({"width":"100%"},300)
            listen.show();
            download.show();


        },function(){
            overlay.clearQueue()
            overlay.hide()
            overlay.animate({"width":"80%"},function () {

            })
            listen.hide();download.hide();



        });
    });
</script>
<div class="col-sm-12">
    <div class="row" id="content-boxes" style="word-wrap: break-word;min-height: 900px;margin-top: 20px;padding: 40px;">
        <div class="col-md-12">
            <?php foreach ($voices as $voice) { ?>
            <div class="col-md-4 col-lg-4 col-xs-12 ">
                <div class="sound-item">
                    <div class="sound-img">
                        <div class="sound-overlay" style="display: none">
                            <div id="sound-listen" class="rounded-top sound-listen sound-button-on" data-sound="/uploads/audio/<?php echo $voice->audio ?>"><i class="fa fa-play"></i> </div>
                            <div id="sound-download" class="rounded-top sound-download "><a href="<?php echo base_url().'uploads/audio/'.$voice->audio?>"><i class="fa fa-download"></i></a>  </div>
                        </div>
                        <img src="<?php echo base_url().'uploads/audio-img/'.$voice->image ?>" />
                    </div>
                </div>
                <div class="sound-meta-information">
                    <h3 style="text-align: center;margin: 20px 0px;"><?php echo $voice->title ?></h3>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var audio
        $('.sound-button-on').on('click',function(){
            voice = $(this).data('sound')
            if($(this).hasClass('playing')){
                audio.pause()
                $(this).html('<i class="fa fa-play"></i>')
                $(this).removeClass('playing')
            } else {
                audio = new Audio(voice)
                audio.play()
                $(this).html('<i class="fa fa-pause"></i>')
                $(this).addClass('playing')
            }

        });



    })
</script>

<style>
    .sound-overlay .sound-listen{
        background: #cfcfcf;
        width: 45px;
        height: 45px;
        position: absolute;
        left: 25%;
        top: 45%;
        display:none
    }
    .sound-overlay .sound-download{
        background: #cfcfcf;
        width: 45px;
        height: 45px;
        position: absolute;
        right: 25%;
        top:45%;
        display:none;
    }

    .sound-overlay .sound-listen:hover,.sound-overlay .sound-download:hover{
        transition: all 0.5s ease;
        background:#fd7e14;
        display: none;
    }

    .sound-overlay .fa {
        font-size:26px;
        text-align: center;
        margin: auto;
        display: block;
        padding: 10px;
    }
    .sound-overlay{
        background: #000;
        opacity: 0.7;
        width: 80%;
        position: absolute;
        height: 100%;
    }

    .sound-img{
        overflow: hidden;
    }

    .sound-img img{
        border: 1px solid #000;
    }
    .sound-item{
        position: relative;
        overflow: hidden;

    }
    .tile{
        direction: rtl;
        float: right;
    }
</style>

