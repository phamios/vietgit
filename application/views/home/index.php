<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="<?php echo $this->lang->line('site_description');?>" />
        <meta name="keyword" content="<?php echo $this->lang->line('site_keyword');?>" />
        <meta name="author" content="AYOLO.NET" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title><?php echo $site_title_name;?></title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="<?php echo base_url('src/home'); ?>/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="<?php echo base_url('src/home'); ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="<?php echo base_url('src/home'); ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('src/home'); ?>/assets/css/home.css" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <strong> <?php echo $this->lang->line('ayolo');?> </strong> 
                        &nbsp;&nbsp;
                        <strong>Hotline: </strong> (+84)91.62.62.170
                    </div>

                </div>
            </div>
        </header>
        <!-- HEADER END-->
        <div class="navbar navbar-inverse set-radius-zero">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                </div>


            </div>
        </div>
        <!-- LOGO HEADER END-->
        <section class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-collapse collapse ">
                            <ul id="menu-top" class="nav navbar-nav navbar-right">
                                <li><a class="menu-top-active" href="<?php echo site_url(); ?>"><?php echo $this->lang->line('menu_home');?></a></li>
                                <li><a class="menu-top-active" href="<?php echo site_url('danh-sach'); ?>"><?php echo $this->lang->line('menu_app_list');?></a></li>
                                <li><a class="menu-top-active" href="#"><?php echo $this->lang->line('menu_about');?></a></li>
                                <li><a class="menu-top-active" href="<?php echo site_url('goi-dich-vu');?>"><?php echo $this->lang->line('menu_services');?></a></li>
                                <li><a class="menu-top-active" href="<?php echo site_url('huong-dan');?>"><?php echo $this->lang->line('menu_support');?></a></li>
                                <li><a class="menu-top-active" href="#"><?php echo $this->lang->line('menu_blog');?></a></li>
                                <li><a class="menu-top-active" href="<?php echo site_url('lien-he');?>"><?php echo $this->lang->line('menu_contact');?></a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <?php $this->load->view('home/_main');?>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; 2015 <a href="<?php echo site_url();?>">Ayolo.net</a>  </p>
                        <p>Address: 63 Thai Thinh, HANOI, VIETNAM<br/>
                           Phone: (+84)916262170<br/>
                           Email: info@ayolo.net<br/>
                           Support <a target="_blank" href="hhttps://www.google.com/admob/">Google Admob</a>, Mobile Developer<br/>
                        </p>
                    </div>

                </div>
            </div>
        </footer>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="<?php echo base_url('src/home'); ?>/assets/js/jquery-1.11.1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="<?php echo base_url('src/home'); ?>/assets/js/bootstrap.js"></script>
    </body>
</html>
