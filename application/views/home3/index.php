<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $site_title_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('src/home3/css'); ?>/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('src/home3/css'); ?>/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url('src/home3/css'); ?>/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('src/home3/css'); ?>/main.css">
        <link rel="stylesheet" href="<?php echo base_url('src/home3/css'); ?>/sl-slide.css">

        <script src="<?php echo base_url('src/home3/js'); ?>/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url('src/home3/images'); ?>/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('src/home3/images'); ?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('src/home3/images'); ?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('src/home3/images'); ?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('src/home3/images'); ?>/ico/apple-touch-icon-57-precomposed.png">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <!--Header-->
        <?php $this->load->view('home3/widget/menu'); ?>
        <!-- /header -->

        
        <?php $this->load->view('home3/_main'); ?>


        <!--Bottom-->
        <?php $this->load->view('home3/widget/bottom'); ?>
        <!--/bottom-->

        <!--Footer-->
        <?php $this->load->view('home3/widget/footer'); ?>
        <!--/Footer-->

        <!--  Login form -->
        <div class="modal hide fade in" id="loginForm" aria-hidden="false">
            <div class="modal-header">
                <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                <h4>Đăng nhập nhanh hệ thống</h4>
            </div>
            <!--Modal Body-->
            <div class="modal-body">
                 
                    <?php echo form_open_multipart('admincp/login',array("class"=>"form-inline","id"=>"form-login")); ?>
                 
                    <input type="text" name="email" class="input-small" placeholder="Email">
                    
                    <input type="password" name="password" class="input-small" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox"> Nhớ trạng thái
                    </label>
                    <button type="submit" name="go" class="btn btn-primary">Đăng nhập</button>
                 <?php echo form_close(); ?>
                <a href="#">Bạn quên mật khẩu ?</a> hoặc <a href="<?php echo site_url('dang-ky');?>">Đăng ký</a>
            </div>
            <!--/Modal Body-->
        </div>
        <!--  /Login form -->

        <script src="<?php echo base_url('src/home3/js'); ?>/vendor/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url('src/home3/js'); ?>/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url('src/home3/js'); ?>/main.js"></script>
        <!-- Required javascript files for Slider -->
        <script src="<?php echo base_url('src/home3/js'); ?>/jquery.ba-cond.min.js"></script>
        <script src="<?php echo base_url('src/home3/js'); ?>/jquery.slitslider.js"></script>
        <!-- /Required javascript files for Slider -->

        <!-- SL Slider -->
        <script type="text/javascript">
            $(function () {
                var Page = (function () {

                    var $navArrows = $('#nav-arrows'),
                            slitslider = $('#slider').slitslider({
                        autoplay: true
                    }),
                            init = function () {
                                initEvents();
                            },
                            initEvents = function () {
                                $navArrows.children(':last').on('click', function () {
                                    slitslider.next();
                                    return false;
                                });

                                $navArrows.children(':first').on('click', function () {
                                    slitslider.previous();
                                    return false;
                                });
                            };

                    return {init: init};

                })();

                Page.init();
            });
        </script>
        <!-- /SL Slider -->
    </body>
</html>