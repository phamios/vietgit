<?php if ($this->router->class == 'home'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('front/home'); ?>
    <?php endif; ?> 
<?php if ($this->router->fetch_method() == 'aboutus'): ?>
        <?php $this->load->view('front/intro'); ?>
    <?php endif; ?> 

<?php endif; ?>