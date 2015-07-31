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
        <title>VIETADMOB - Đăng ký - Hệ thống cung cấp ứng dụng mobile - Kiếm tiền với Youtube, Google Admob, Adsense</title>
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
                        <h4 class="page-head-line"><?php echo $this->lang->line('site_name_register'); ?></h4>

                    </div> 
                </div>
                <div class="row">
                    <div class="container-fluid">
                        <section class="container">
                            <?php echo form_open_multipart('dang-ky'); ?> 
                            <div class="container-page">				
                                <div class="col-md-6">
                                    <h3 class="dark-grey"><?php echo $this->lang->line('Registration'); ?></h3>
                                    <?php if($error):?>
                                    <label class="label label-danger"> <?php echo $error;?></label>
                                    <?php endif;?>
                                    <div class="form-group col-lg-12">
                                        <select name="usertype" class="form-control">
                                            <option value="1">Gói miễn phí</option>
                                            <option value="2">Gói Pro</option>
                                            <option value="3">Gói Premium</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label><?php echo $this->lang->line('username_reg'); ?></label>
                                        <input type="text" name="username" class="form-control" id="" value="" required>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label><?php echo $this->lang->line('pass_reg'); ?></label>
                                        <input type="password" name="userpass" class="form-control" id="" value="" required>
                                    </div>


                                    <div class="form-group col-lg-6">
                                        <label><?php echo $this->lang->line('email_reg'); ?></label>
                                        <input type="text" name="useremail" class="form-control" id="" value="" required>
                                    </div>


                                    <div class="form-group col-lg-10">
                                        <input type="checkbox" class="checkbox" required="" /> <?php echo $this->lang->line('accept_reg'); ?>

                                        <button type="submit" name="go" class="btn btn-fresh text-uppercase"><?php echo $this->lang->line('btt_reg'); ?></button>

                                        <a class="btn btn-hot text-uppercase" href="<?php echo site_url('dang-nhap') ?>">Đăng nhập</a>
                                    </div>	
                                </div>

                                <div class="col-md-6">
                                    <h3 class="dark-grey"><?php echo $this->lang->line('termandcondition'); ?></h3>
                                    <p>
                                        Quy trình thanh toán và làm việc với VIETADMOB:<br/>
                                        <ul>
                                            <li>1. Đăng ký thành viên và chọn gói theo nhu cầu.</li>
                                            <li>2. Chuyển khoản tới chúng tôi theo hệ thống chuyển khoản của ngân hàng:</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số tài khoản: <b>0011 002 194 194</b>    </li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chủ tài khoản: <b>Phạm Xuân Sơn</b>    </li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngân hàng: <b>Vietcombank, chi nhánh Hà Nội, Ba Đình</b> </li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nội dung chuyển khoản: <b>  tên đăng nhập - Gói đăng nhập - số điện thoại </b>    </li>
                                            <li>3. Sau khi thanh toán hoàn tất, bạn có thể yêu cầu nhận file ứng dụng bất kỳ lúc nào.</li>
                                            <li>Chúng tôi hỗ trợ việc đưa ứng dụng lên Appstore,Play Store</li>

                                        </ul>
                                        <br/>
                                    </p>


                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2015  <a href="<?php echo site_url();?>" target="_blank">VIETADMOB - Kiếm tiền hay, Lại rảnh tay</a> <br/>
                        Một sản phẩm của <a href="http://kimy.vn">Kim Y Media.</a>
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
