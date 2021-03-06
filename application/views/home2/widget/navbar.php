<div class="navbar-inner">
    <div class="container">
        <a href="#" class="brand">
            <img src="<?php echo base_url('src/home'); ?>/images/logo.png" width="120" height="40" alt="Logo" />
            <!-- This is website logo -->
        </a>



        <!-- Navigation button, visible on small resolution -->
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <i class="icon-menu"></i>
        </button>
        <!-- Main navigation -->
        <div class="nav-collapse collapse pull-right">
            <ul class="nav" id="top-navigation">
                <li class="active"><a href="#home"><?php echo $this->lang->line('menu_home'); ?></a></li>
                <li><a href="#service"><?php echo $this->lang->line('menu_services'); ?></a></li>
                <li><a href="#portfolio"><?php echo $this->lang->line('menu_app_list'); ?></a></li>
                <li><a href="#about"><?php echo $this->lang->line('menu_about'); ?></a></li>
                <li><a href="#price"><?php echo $this->lang->line('menu_price'); ?></a></li>
                <li><a href="#contact"><?php echo $this->lang->line('menu_contact'); ?></a></li>
            </ul>
            <a style="margin-top:15px;" class="btn btn-danger btn-outline btn-sm" href="<?php echo site_url('dang-ky') ?>">Đăng ký</a>
            <a style="margin-top:15px;" class="btn btn-success btn-outline btn-sm" href="<?php echo site_url('dang-nhap') ?>">Đăng nhập</a>
            <a style="margin-top:15px;" class="btn btn-default btn-outline btn-sm" href="<?php echo site_url('huong-dan')?>">BLOG</a>
        </div>
        <!-- End main navigation -->
    </div>
</div>