<!--<section class="services">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                <div class="center">
                    <div class="circle-border zoom-in">
                        <img class="img-circle" style="width: 20%;" src="<?php echo base_url('src/home'); ?>/images/Service1.png" alt="service 1">
                    </div>
                    <p> </p>
                    <h4>Bán hàng, dịch vụ trên Mobile</h4>
                    <p>Doanh nghiệp không cần phải biết tạo ứng dụng, chúng tôi làm thay bạn.</p>
                </div>
            </div>

            <div class="span4">
                <div class="center">
                    <div class="circle-border zoom-in">
                        <img class="img-circle" style="width: 20%;" src="<?php echo base_url('src/home'); ?>/images/Service2.png" alt="service 1">
                    </div>
                    <p> </p>
                    <h4>Youtube, Google Admob, Adsense</h4>
                    <p>Không cần biết code bạn vẫn có thể có ứng dụng kiếm tiền với Google qua việc đặt quảng cáo lên ứng dụng.</p>
                </div>
            </div>

            <div class="span4">
                <div class="center">
                    <div class="circle-border zoom-in">
                        <img class="img-circle" style="width: 20%;" src="<?php echo base_url('src/home'); ?>/images/Service3.png" alt="service 1">
                    </div>
                    <p> </p>
                    <h4>Quản lý dễ dàng, thuận tiện</h4>
                    <p>Tất cả ứng dụng đều được xử lý tự động, cung cấp cho đa nền tảng phát triển hoặc nhu cầu của bạn.</p>
                </div>
            </div>

        </div>




        <hr>

        <div class="center">
            <a class="btn btn-primary btn-large" href="<?php echo site_url('dang-ky'); ?>">Đăng ký ngay</a>
        </div>


    </div>
</section>-->







<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>Dịch vụ của chúng tôi</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="<?php echo site_url();?>">Trang chủ</a> <span class="divider">/</span></li> 
                    <li class="active">Dịch vụ</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->       

<!-- Privacy-policy -->
<section id="privacy-policy" class="container">
    <?php foreach ($list_service_product as $service): ?>
        <h3><a href="<?php echo site_url('goi-dich-vu-' . create_slug($service->blog_title) . '-' . $service->id . '.html'); ?>"><?php echo $service->blog_title ?></a></h3>
        <p><?php echo $service->blog_short ?></p> 
        <p>&nbsp;</p>
    <?php endforeach; ?>


</section>