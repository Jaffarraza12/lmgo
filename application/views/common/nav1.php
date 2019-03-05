<nav class="navbar" role="navigation">
    <div style="padding:0 2%;border-bottom:thin solid rgba(198, 156, 108, 0.5)">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="menu-container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="toggle-icon"></span>
            </button>

            <!-- Logo -->
            <div class="navbar-logo pull-right">
                <a class="navbar-logo-wrap" href="<?php echo base_url(); ?>">
                    <img class="navbar-logo-img" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Acidus Logo">
                </a>
            </div>
            <!-- End Logo -->

            <!-- Logo -->
            <div class="navbar-logo pull-left">
                <a class="navbar-logo-wrap" href="<?php echo base_url(); ?>">
                    <img class="navbar-logo-img" src="<?php echo base_url(); ?>/assets/img/logo-left.jpg" alt="Acidus Logo">
                </a>
            </div>
            <!-- End Logo -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse nav-collapse">
            <div class="menu-container">
                <ul class="navbar-nav navbar-nav-right mobile-only">

                  <li class="nav-item">
                        <a class="nav-item-child" href="<?php echo base_url(); ?>">
                            الرئيسية
                        </a>
                  </li>

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/editorialboard?lang=".$lang; ?>">
                        أسرة التحرير
                    </a>
                </li>
                <!-- End Home -->

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/introductionobjects?lang=".$lang; ?>">
                        المقدمة والأهداف
                    </a>
                </li>
                <!-- End About -->

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/publishingrules?lang=".$lang; ?>">
                        قواعد النشر
                    </a>
                </li>
                <!-- End Home -->

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/abstracts?lang=".$lang; ?>">
                        الأعداد الصادرة
                    </a>
                </li>
                <!-- End About -->

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php $this->load->helper('url'); echo base_url().'clanguage?lang='.$lang.'&url='.base_url().uri_string(); ?>">
                        ENGLISH
                    </a>
                </li>
                <!-- End About -->

                </ul>
            </div>
        </div>

        <!-- End Navbar Collapse -->
    </div>
    <div class="nav-bar container desktop-only">
        <div class="col-xs-12">

            <ul class="navbar-nav full-width">

                <li class="nav-item pull-right">
                    <a class="nav-item-child" href="<?php echo base_url(); ?>">
                        الرئيسية
                    </a>
                </li>

                <!-- Home -->
                <li class="nav-item pull-right">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/editorialboard?lang=".$lang; ?>" style="padding-right:0px;">
                        أسرة التحرير
                    </a>
                </li>
                <!-- End Home -->

                <!-- About -->
                <li class="nav-item pull-right">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/introductionobjects?lang=".$lang; ?>">
                        المقدمة والأهداف
                    </a>
                </li>
                <!-- End About -->

                <!-- Home -->
                <li class="nav-item pull-right">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/publishingrules?lang=".$lang; ?>">
                        قواعد النشر
                    </a>
                </li>
                <!-- End Home -->

                <!-- About -->
                <li class="nav-item pull-right">
                    <a class="nav-item-child" href="<?php echo base_url()."majalatajman/abstracts?lang=".$lang; ?>">
                        الأعداد الصادرة
                    </a>
                </li>
                <!-- End About -->

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-item-child" href="<?php $this->load->helper('url'); echo base_url().'clanguage?lang='.$lang.'&url='.base_url().uri_string(); ?>" style="padding-left:0px;">
                        ENGLISH
                    </a>
                </li>
                <!-- End About -->

            </ul>

        </div>
    </div>
</nav>