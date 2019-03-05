
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!------ Include the above in your HEAD tag ---------->
<style>
    #masonry {
        column-count: 2;
        column-gap: 1em;
        min-height: 600px;
        direction: rtl;
    }
    .ablum-event a{
        margin: 20px 0px;
    }

    @media(min-width: 30em) {
        #masonry {
            column-count: 3;
            column-gap: 1em;
        }
    }

    @media(min-width: 40em) {
        #masonry {
            column-count: 4;
            column-gap: 1em;
        }
    }

    @media(min-width: 60em) {
        #masonry {
            column-count: 5;
            column-gap: 1em;
        }
    }

    @media(min-width: 75em) {
        #masonry {
            column-count: 6;
            column-gap: 1em;
        }
    }

    .item {
        background-color: none;
        display: inline-block;
        margin: 0 0 1em 0;
        width: 100%;
        cursor: pointer;
    }

    .item img {
        max-width: 100%;
        height: auto;
        width: 100%;
        margin-bottom: -4px;

        /*idk why but this fix stuff*/
    }

    .item.active {
        animation-name: active-in;
        animation-duration: 0.7s;
        animation-fill-mode: forwards;
        animation-direction: alternate;
    }

    .item.active .footer{
        display: none;
    }

    .item.active:before {
        content: "+";
        transform: rotate(45deg);
        font-size: 48px;
        color: white;
        position: absolute;
        top: 20px;
        right: 20px;
        background-color:rgba(0,0,0,0.85);
        border-radius: 50%;
        width:48px;
        height:48px;
        text-align:center;
        line-height:48px;
        z-index:12;
    }

    .item.active img {
        animation-name: active-in-img;
        animation-duration: 0.7s;
        animation-fill-mode: forwards;
        animation-direction: alternate;
    }


    @keyframes active-in {
        0% {
            opacity:1;
            background-color:white;
        }

        50% {
            opacity:0;
            background-color:rgba(0,0,0,0.90);
        }

        100% {
            opacity: 1;
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:rgba(0,0,0,0.90);
        }
    }

    @keyframes active-in-img {
        0% {
            opacity:1;
            transform:translate(0%, 0%);
            top: 0;
            left: 0;
            max-width: 100%;
        }
        49% {
            opacity:0;
            transform: translate(0%, -50%);
        }
        50% {
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -100%);
        }
        100% {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            width: auto;
            max-height: 95vh;
            opacity:1;
        }
    }
</style>

    <div class="container">
        <div clas="row">
            <h2 style="text-align: center;"><?php echo $album->heading ?></h2>
            <p style="text-align: center;"><?php echo $album->description ?></p>
        </div>
        <div class="col-md-3">
            <ul>
                <?php foreach($albums as $album) {?>
                    <li><a href="<?php echo base_url().'gallery/'.$album->album_id ?>" style="font-weight: 700;font-size: 18px;"><?php echo $album->heading ?></a> </li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-9 col-xs-12 " style="min-height: 300px;">
          <?php foreach($galleries as $img) {?>
            <div class="col-md-4 col-xs-6 ablum-event">
                <a rel="example_group"  href="<?php echo base_url() ?>/uploads/gallery/<?php echo $img->image?>"">
                <img src="<?php echo base_url() ?>/uploads/gallery/<?php echo $img->image?>" alt="" style="margin:20px;" />
                </a>
            </div>
          <?php } ?>
        </div>
    </div>
<div class="clearfix"></div>
