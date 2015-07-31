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
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <!-- HEADER END-->

        <!-- LOGO HEADER END-->

        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-head-line"><?php echo $this->lang->line('site_name_login'); ?></h4> 
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo form_open_multipart('admincp/login'); ?>
<!--                        <h4> <?php echo $this->lang->line('login_with'); ?></h4>
                        <br />
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Tài khoản Facebook</a>
                        &nbsp;<?php echo $this->lang->line('or_login'); ?>&nbsp;
                        <a href="<?php echo site_url('openid'); ?>" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Tài khoản Google </a>
                        <hr />
                        <h4> <?php echo $this->lang->line('login_ayolo'); ?></h4>
                        <br />-->
                        <label><?php echo $this->lang->line('username_login'); ?> : </label>
                        <input type="text" name="email" id="email" class="form-control">
                            <label><?php echo $this->lang->line('password_login'); ?> :  </label> 
                            <input type="password" name="password" id="password"  class="form-control">
                                <hr />
                                <input type="submit" name="go" id="go" class="btn btn-info" value="<?php echo $this->lang->line('login_button'); ?>"> 
                                    <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <?php echo $this->lang->line('login_about'); ?>
                                            <br />
                                            <strong> <?php echo $this->lang->line('login_rule_alert'); ?></strong>
                                            <p></p>
                                            <?php echo $this->lang->line('login_rule'); ?>

                                        </div>
                                        <div class="alert alert-success">
                                            <strong><?php echo $this->lang->line('intro_using'); ?></strong>
                                            <p></p>
                                            <?php echo $this->lang->line('login_rule'); ?>

                                        </div>
                                    </div>

                                    </div>
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
