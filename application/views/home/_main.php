<?php if ($this->router->class == 'home'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('home/home/index'); ?> 
    <?php endif; ?> 
<?php if ($this->router->fetch_method() == 'list_app'): ?>
        <?php $this->load->view('home/home/list_app'); ?> 
    <?php endif; ?>
<?php if ($this->router->fetch_method() == 'pakage'): ?>
        <?php $this->load->view('home/home/pakage'); ?> 
    <?php endif; ?>
<?php if ($this->router->fetch_method() == 'contact'): ?>
        <?php $this->load->view('home/home/contact'); ?> 
    <?php endif; ?>
<?php if ($this->router->fetch_method() == 'support'): ?>
        <?php $this->load->view('home/home/support'); ?> 
    <?php endif; ?>
<?php endif; ?>
<?php if ($this->router->class == 'app'): ?> 
        <?php $this->load->view('home/app/details'); ?>  
<?php endif; ?>