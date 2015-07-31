<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="logo" class="pull-left" href="<?php echo site_url();?>"></a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li  <?php if ($this->router->fetch_method() == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url();?>"><?php echo $this->lang->line('menu_home');?></a></li>
                    <li <?php if ($this->router->fetch_method() == 'product'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url('goi-dich-vu');?>"><?php echo $this->lang->line('menu_services');?></a></li>
                    <li <?php if ($this->router->fetch_method() == 'aboutus'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url('gioi-thieu');?>"><?php echo $this->lang->line('menu_about');?></a></li>
                    <li <?php if ($this->router->fetch_method() == 'cost'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url('goi-gia');?>"><?php echo $this->lang->line('menu_price');?></a></li>
                    <li class="dropdown" <?php if ($this->router->fetch_method() == 'blog'): ?>class="active"<?php endif; ?>>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('menu_support');?> <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('huong-dan');?>"><?php echo $this->lang->line('menu_blog');?> </a></li>
                        </ul>
                    </li>
                    <li <?php if ($this->router->fetch_method() == 'contact'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url('lien-he');?>"><?php echo $this->lang->line('menu_contact');?></a></li>
                    <li class="login">
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>