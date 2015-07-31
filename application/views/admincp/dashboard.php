<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title><?php echo $this->lang->line('site_name'); ?></title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="<?php echo base_url('src/admin'); ?>/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="<?php echo base_url('src/admin'); ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="<?php echo base_url('src/admin'); ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('src/admin'); ?>/assets/css/menu.css" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $(".dropdown").hover(
                        function () {
                            $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                            $(this).toggleClass('open');
                            $('b', this).toggleClass("caret caret-up");
                        },
                        function () {
                            $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                            $(this).toggleClass('open');
                            $('b', this).toggleClass("caret caret-up");
                        });
            });



        </script>


    </head>
    <body>
        <?php $this->load->view('admincp/widget/header'); ?>
        <!-- HEADER END-->

        <!-- LOGO HEADER END-->
        <section class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->userdata('admin_type') == 0): ?>
                            <?php $this->load->view('admincp/widget/menu'); ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('admin_type') == 1): ?>
                            <?php $this->load->view('admincp/widget/menu_1'); ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('admin_type') == 2): ?>
                            <?php $this->load->view('admincp/widget/menu_2'); ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('admin_type') == 3): ?>
                            <?php $this->load->view('admincp/widget/menu_3'); ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('admin_type') == 9): ?>
                            <?php $this->load->view('admincp/widget/menu_9'); ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container"> 
                <?php $this->load->view('admincp/_main'); ?>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2015  <a href="<?php echo site_url();?>" target="_blank">VIETADMOB - Kiếm tiền hay, Lại rảnh tay</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="<?php echo base_url('src/admin'); ?>/assets/js/jquery-1.11.1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="<?php echo base_url('src/admin'); ?>/assets/js/bootstrap.js"></script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-51554009-49', 'auto');
            ga('send', 'pageview');

        </script>




    </body>
</html>
