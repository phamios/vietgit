  
<div class="row">
    <!-- COLUMN ONE -->
    <div class="col-sm-6 col-md-12" >
        <?php if ($this->session->userdata('admin_type') == 0): ?>
            <a href="#" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-user fa-5x"></i><br/>
                Admin<br>
            </a>
        <?php endif; ?>

        <?php if ($this->session->userdata('admin_type') == 1): ?>
            <a href="#" class="btn btn-sq-lg btn-info">
                <i class="fa fa-user fa-5x"></i><br/>
                Tài khoản FREE <br> 
            </a>

        <?php endif; ?>

        <?php if ($this->session->userdata('admin_type') == 2): ?>
            <a href="#" class="btn btn-sq-lg btn-success">
                <i class="fa fa-user fa-5x"></i><br/>
                Tài khoản Pro<br>
            </a>
        <?php endif; ?>

        <?php if ($this->session->userdata('admin_type') == 3): ?>

            <a href="#" class="btn btn-sq-lg btn-success">
                <i class="fa fa-user fa-5x"></i><br/>
                Tài khoản PREMIUM<br>
            </a>
        <?php endif; ?> 
    </div>
</div> 

<div class="clear">&nbsp;</div>

<!--<div class="row">
<?php foreach ($list_app as $value): ?>
            <div class="col-sm-6 col-md-3" style="padding-bottom:10px;" >
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="<?php echo $value->appicon; ?>" />
                        <button class="btn btn-primary btn-sm" role="button">Chọn app</button>
                    </div>

                    <div class="panel-body text-center">
                        <h4 class="panel-header"><?php echo $value->appname; ?></h4>
                    </div>
                    <div class="panel-thumbnails">
                        <div class="row">
                            <div class="col-xs-3">

                            </div> 
                        </div>
                    </div>

                </div>   
            </div>
<?php endforeach; ?>  
</div>-->


    <div class="row form-group product-chooser">

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item selected">
                <img src="http://renswijnmalen.nl/bootstrap/desktop_mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Mobile and Desktop</span>
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                    <input type="radio" name="product" value="mobile_desktop" checked="checked">
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item">
                <img src="http://renswijnmalen.nl/bootstrap/desktop.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Desktop">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Desktop</span>
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                    <input type="radio" name="product" value="desktop">
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item">
                <img src="http://renswijnmalen.nl/bootstrap/mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Mobile</span>
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                    <input type="radio" name="product" value="mobile">
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div> 

 