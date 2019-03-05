<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>RSH Awards</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo base_url(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/slider/css/glide.core.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/slider/css/glide.theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="<?php echo base_url(); ?>/assets/css/colorbox.css" rel="stylesheet">

    <!-- THEME STYLES -->
    <?php if ($lang == 1) { ?>
    <link href="<?php echo base_url(); ?>/assets/css/layout.1.min.css" rel="stylesheet" type="text/css" />
    <?php } else { ?>
    <link href="<?php echo base_url(); ?>/assets/css/layout.2.min.css" rel="stylesheet" type="text/css" />
    <?php } ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/favicon.ico" />
    <style>
        .fas {
            float:right;
            margin-left: 10px;

        }

        .number_1{
         background: #262626;
         text-align: center;
         display: table;
         color: #fff;
         float: left;
         font-size: 24px;
         padding: 5px 10px;
         margin: auto 5px;
        }
        }

    </style>

</head>
<!-- END HEAD -->

<!-- BODY -->

<body>

    <!--========== HEADER ==========-->
    <header class="header">
        <!-- Navbar -->
        <?php if ($type != "reporting" && $type != "abstracts") {
            $config->render(['common/nav']);
        } else {
            if ($lang == 1) {
                $config->render(['common/nav1']);
            } else {
                $config->render(['common/nav2']);
            }
        } ?>
        <!-- Navbar -->
    </header>
    <!--========== END HEADER ==========-->