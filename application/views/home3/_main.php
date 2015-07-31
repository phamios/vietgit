<?php if ($this->router->class == 'home'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('home3/main/index'); ?>
    <?php endif; ?>  
    <?php if ($this->router->fetch_method() == 'product'): ?>
        <?php $this->load->view('home3/sanpham/index'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'details_services'): ?>
        <?php $this->load->view('home3/sanpham/details'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'aboutus'): ?>
        <?php $this->load->view('home3/about/index'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'cost'): ?>
        <?php $this->load->view('home3/cost/index'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'blog'): ?>
        <?php $this->load->view('home3/blog/index'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'details_blog'): ?>
        <?php $this->load->view('home3/blog/details'); ?>
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'contact'): ?>
        <?php $this->load->view('home3/contact/index'); ?>
    <?php endif; ?>  
<?php endif; ?>