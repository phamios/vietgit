<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $site_title_name; ?></title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/bootstrap.css" />
        <link href="<?php echo base_url('src/home'); ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <meta name="google-site-verification" content="ACN_J-3As3c5P4g_OhtRasSQrISj6q3y8__m2MdQPB4" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/home'); ?>/css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('src/home'); ?>/images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('src/home'); ?>/images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('src/home'); ?>/images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('src/home'); ?>/images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="<?php echo base_url('src/home'); ?>/images/ico/favicon.ico">
    </head>

    <body>
        <div class="navbar">
            <?php $this->load->view('home2/widget/navbar'); ?>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <?php $this->load->view('home2/widget/slide'); ?>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <?php $this->load->view('home2/widget/service'); ?>
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <?php $this->load->view('home2/widget/listapp'); ?>
        <!-- Portfolio section end -->
        <!-- About us section start -->
        <?php $this->load->view('home2/widget/about'); ?>
        <!-- About us section end -->

        <!-- Price section start -->
        <?php $this->load->view('home2/widget/price'); ?>
        <!-- Price section end -->
        <!-- Newsletter section start -->

        <!-- Newsletter section end -->
        <!-- Contact section start -->
        <?php $this->load->view('home2/widget/contact'); ?>
        <!-- Contact section edn -->


        <?php //$this->load->view('home2/widget/login'); ?> 


        <!-- Footer section start -->
        <div class="footer">
            <p> © 2015 Kim Y Media Jsc . All Rights Reserved. </p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="<?php echo base_url('src/home'); ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url('src/home'); ?>/js/app.js"></script>



        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63616612-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TNTS8W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNTS8W');</script>
<!-- End Google Tag Manager -->


    </body>
</html>