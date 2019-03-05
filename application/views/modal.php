<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>RSH Awards</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="<?php echo $page_content->meta_desc ?>" name="description" />
    <meta content="" name="author" />

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo base_url(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />

    <!-- THEME STYLES -->
    <link href="<?php echo base_url(); ?>/assets/css/layout.min.css" rel="stylesheet" type="text/css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/favicon.ico" />
    
    <style>
        #loader {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99;
        }

        #spinner-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            z-index: 1;
        }

        #spinner {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            margin: auto;
            position: absolute;
            top: calc(50% - 60px);
            left: calc(50% - 60px);
            z-index: 2;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<!-- END HEAD -->

<!-- BODY -->

<body>

    <div id="loader">
        <div id="spinner"></div>
        <div id="spinner-back"></div>
    </div>

    <!--========== PAGE LAYOUT ==========-->
    <div class="bg-color-sky-light">
        <div class="content-md container" style="padding-top:0px;">
            <div class="col-md-12" style="margin:50px 0">
                <div class="row">

                    <?php $config->render([$page])?>

                </div>
            </div>
        </div>
    </div>

    <!-- Back To Top -->
    <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

    <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.easing.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.wow.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>/assets/js/layout.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/js/components/wow.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/js/components/swiper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/js/components/masonry.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>/assets/js/components/sub-menu.js"></script>

    <script src="<?php echo base_url() ?>assets/js/components/owl.carousel.js"></script>

    <script>
    window.onload = window.onpageshow = function () {
        $('#loader').fadeOut('slow');
    };
    </script>

</body>
<!-- END BODY -->

</html>