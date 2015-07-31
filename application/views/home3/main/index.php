<!--Slider-->
<?php $this->load->view('home3/widget/slide'); ?>
<!--/Slider-->

<section class="main-info">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <h1>Tạo ứng dụng mobile không cần biết lập trình</h1>
                <p class="no-margin">Công việc của bạn chỉ là chọn, click, điền thông tin...</p>
            </div>
            <div class="span3">
                <a class="btn btn-success btn-large pull-right" href="<?php echo site_url('dang-ky');?>">ĐĂNG KÝ NGAY</a>
            </div>
        </div>
    </div>
</section>

<!--Services-->
<section id="services">
    <div class="container">
        <div class="center gap">
            <h3><?php echo $this->lang->line('what_we_offer'); ?></h3> 
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Hỗ trợ thiết kế website </h4>
                        <p>Nếu quý công ty chưa có website, chúng tôi sẽ hỗ trợ việc xây dựng website</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-thumbs-up-alt icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Miễn phí kênh quảng cáo</h4>
                        <p>Hệ thống Vietadmob.com tự động quảng cáo cho ứng dụng trên mọi mạng xã hội: facebook,twitter,blogspot,wordpress.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-leaf icon-medium icon-rounded"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Tự động Tạo nhiều Blogspot, Wordpress.</h4>
                        <p>Hệ thống cho phép bạn tạo một loạt blogspot, wordpress chỉ với một click chuột, và soạn dữ liệu cho bạn để SEO cho ứng dụng hiệu quả.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-shopping-cart icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Giải pháp bán hàng trên điện thoại</h4>
                        <p>Công ty bạn chưa có ứng dụng trên mobile ? chúng tôi sẽ làm thay bạn chỉ với 1 click chuột !</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Giải pháp SEO </h4>
                        <p>Hỗ trợ SEO ứng dụng lên top các chợ ứng dụng, tăng lượt người dùng, tăng lượt view, tăng khả năng gắn kết các khách hàng mới.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Thông báo</h4>
                        <p>Hệ thống ứng dụng cung cấp các notification với người dùng. Khi bạn có sản phẩm mới, ứng dụng tự động push notification lên điện thoại để khách hàng có thể biết bạn có sản phẩm mới nào.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/Services-->

<!--<section id="recent-works">-->
<!--    <div class="container">-->
<!--        <div class="center">-->
<!--            <h3>New app </h3> -->
<!--        </div>  -->
<!--        <div class="gap"></div>-->
<!--        <ul class="gallery col-4">-->
<!--            <!--Item 1-->
<!--            <li>-->
<!--                <div class="preview">-->
<!--                    <img alt=" " src="--><?php //echo base_url('src/home3/images'); ?><!--/portfolio/thumb/item1.jpg">-->
<!--                    -->
<!--                    <div class="links">-->
<!--                        <a href="#"><i class="icon-link"></i></a>                          -->
<!--                    </div>-->
<!--                </div>-->
<!--                               -->
<!--            </li>-->
<!--            <!--/Item 1-->
<!---->
<!--           -->
<!--                           -->
<!---->
<!--        </ul>-->
<!--    </div> -->
<!--</section>-->

<section id="clients" class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                    <h4 class="pull-left">Đối tác của chúng tôi</h4>
                    <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                    </div>
                </div>
                <p>Hãy nhanh chóng trở thành đối tác của chúng tôi !</p>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client1.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client2.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client3.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client4.png"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client4.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client3.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client2.png"></a></li>
                                    <li class="span3"><a href="#"><img src="<?php echo base_url('src/home3/images'); ?>/sample/clients/client1.png"></a></li>
                                </ul>
                            </div>
                        </div>

                     
                    </div>
                    <!-- /Carousel items -->

                </div>
            </div>
        </div>
    </div>
</section>