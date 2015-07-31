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
                        <li  <?php if ($this->router->fetch_method() == 'blog'): ?>class="active"<?php endif; ?>><a href="<?php echo site_url('huong-dan');?>">Tin tức chia sẻ</a></li>

                        <li class="login">
                            <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>