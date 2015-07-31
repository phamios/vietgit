<?php if ($this->router->class == 'home'): ?>
    <?php if ($this->router->method = 'index'): ?>
        <?php $this->load->view('home4/home/index'); ?>
    <?php endif; ?>
<?php endif; ?>
<?php if ($this->router->class == 'mainproduct'): ?>
    <?php if ($this->router->fetch_method() == 'app_video'): ?>
        <?php $this->load->view('home4/product/appvideo'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'appvideo_beautiful'): ?>
        <?php $this->load->view('home4/product/appvideo_beautiful'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'appvideo_backend'): ?>
        <?php $this->load->view('home4/product/appvideo_backend'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'appvideo_content'): ?>
        <?php $this->load->view('home4/product/appvideo_content'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'appvideo_users'): ?>
        <?php $this->load->view('home4/product/appvideo'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'app_content'): ?>
        <?php $this->load->view('home4/product/appcontent'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'app_walpaper'): ?>
        <?php $this->load->view('home4/product/appwallpaper'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'app_business'): ?>
        <?php $this->load->view('home4/product/appbusiness'); ?>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->router->class == 'about'): ?>
    <?php if ($this->router->fetch_method() == 'gioithieu'): ?>
        <?php $this->load->view('home4/about/gioithieu'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'huongdan'): ?>
        <?php $this->load->view('home4/about/huongdan'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'chinhsach'): ?>
        <?php $this->load->view('home4/about/chinhsach'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'banggia'): ?>
        <?php $this->load->view('home4/about/banggia'); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($this->router->class == 'topmenu'): ?>
    <?php if ($this->router->fetch_method() == 'reseller'): ?>
        <?php $this->load->view('home4/top_nav/reseller'); ?>
    <?php endif; ?>
    <?php if ($this->router->fetch_method() == 'price_list'): ?>
        <?php $this->load->view('home4/top_nav/price_list'); ?>
    <?php endif; ?>
<?php endif; ?>
