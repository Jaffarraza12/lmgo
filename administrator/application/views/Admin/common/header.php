<?php ob_start();
    $logged_in = $this->session->userdata('logged_in');
    if ($logged_in == "true")
        ; // do nothing
    else
        redirect("");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/element.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet"  type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/glyphicons/css/glyphicons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/glyphicons_halflings/css/halflings.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/dialog.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
    
    <!-- END GLOBAL MANDATORY STYLES -->
    <?php
        if (isset($header_js))
        {
            foreach ($header_js as $item)
                echo '<script src="' . $item . '" type="text/javascript"></script>';
        }
    ?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
    <div class="container-fluid">
    <!-- BEGIN LOGO -->
    <a class="brand" style="width:220px;">
        Appertunity
    </a>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <img src="assets/img/menu-toggler.png" alt="" />
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->
    <!--li class="dropdown" id="header_notification_bar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-warning-sign"></i>
            <span class="badge">6</span>
        </a>
        <ul class="dropdown-menu extended notification">
            <li>
                <p>You have 14 new notifications</p>
            </li>
            <li>
                <a href="#">
                    <span class="label label-success"><i class="icon-plus"></i></span>
                    New user registered.
                    <span class="time">Just now</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-important"><i class="icon-bolt"></i></span>
                    Server #12 overloaded.
                    <span class="time">15 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-warning"><i class="icon-bell"></i></span>
                    Server #2 not respoding.
                    <span class="time">22 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                    Application error.
                    <span class="time">40 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-important"><i class="icon-bolt"></i></span>
                    Database overloaded 68%.
                    <span class="time">2 hrs</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-important"><i class="icon-bolt"></i></span>
                    2 user IP blocked.
                    <span class="time">5 hrs</span>
                </a>
            </li>
            <li class="external">
                <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
            </li>
        </ul>
    </li>
    <!-- END NOTIFICATION DROPDOWN -->
    <!-- BEGIN INBOX DROPDOWN -->
    <!--li class="dropdown" id="header_inbox_bar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-envelope-alt"></i>
            <span class="badge">5</span>
        </a>
        <ul class="dropdown-menu extended inbox">
            <li>
                <p>You have 12 new messages</p>
            </li>
            <li>
                <a href="inbox.html?a=view">
                    <span class="photo"><img src="./assets/img/avatar2.jpg" alt="" /></span>
                            <span class="subject">
                            <span class="from">Lisa Wong</span>
                            <span class="time">Just Now</span>
                            </span>
                            <span class="message">
                            Vivamus sed auctor nibh congue nibh. auctor nibh
                            auctor nibh...
                            </span>
                </a>
            </li>
            <li>
                <a href="inbox.html?a=view">
                    <span class="photo"><img src="./assets/img/avatar3.jpg" alt="" /></span>
                            <span class="subject">
                            <span class="from">Richard Doe</span>
                            <span class="time">16 mins</span>
                            </span>
                            <span class="message">
                            Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                            auctor nibh...
                            </span>
                </a>
            </li>
            <li>
                <a href="inbox.html?a=view">
                    <span class="photo"><img src="./assets/img/avatar1.jpg" alt="" /></span>
                            <span class="subject">
                            <span class="from">Bob Nilson</span>
                            <span class="time">2 hrs</span>
                            </span>
                            <span class="message">
                            Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                            auctor nibh...
                            </span>
                </a>
            </li>
            <li class="external">
                <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
            </li>
        </ul>
    </li>
    <!-- END INBOX DROPDOWN -->
    <!-- BEGIN TODO DROPDOWN -->
    <!--li class="dropdown" id="header_task_bar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-tasks"></i>
            <span class="badge">5</span>
        </a>
        <ul class="dropdown-menu extended tasks">
            <li>
                <p>You have 12 pending tasks</p>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">New release v1.2</span>
                            <span class="percent">30%</span>
                            </span>
                            <span class="progress progress-success ">
                            <span style="width: 30%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">Application deployment</span>
                            <span class="percent">65%</span>
                            </span>
                            <span class="progress progress-danger progress-striped active">
                            <span style="width: 65%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">Mobile app release</span>
                            <span class="percent">98%</span>
                            </span>
                            <span class="progress progress-success">
                            <span style="width: 98%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">Database migration</span>
                            <span class="percent">10%</span>
                            </span>
                            <span class="progress progress-warning progress-striped">
                            <span style="width: 10%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">Web server upgrade</span>
                            <span class="percent">58%</span>
                            </span>
                            <span class="progress progress-info">
                            <span style="width: 58%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                            <span class="desc">Mobile development</span>
                            <span class="percent">85%</span>
                            </span>
                            <span class="progress progress-success">
                            <span style="width: 85%;" class="bar"></span>
                            </span>
                </a>
            </li>
            <li class="external">
                <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
            </li>
        </ul>
    </li>
    <!-- END TODO DROPDOWN -->
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img alt="" src="<?php echo base_url(); ?>assets/img/avatar1_small.jpg" />
            <span class="username">&nbsp;</span>
            <i class="icon-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'index.php/Dashboard/View' ?>"><i class="icon-user"></i> Dashboard</a></li>
            <li><a href="#"><i class="icon-calendar"></i> My Calendar</a></li>
            <li><a href="#"><i class="icon-envelope"></i> My Inbox(3)</a></li>
            <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
            <li class="divider"></li>
            <li>
                <?php
                    echo anchor("Admin/Logout", '<i class="icon-key"></i> Log Out');
                ?>
            </li>
        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->
    </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->