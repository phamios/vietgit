
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($list_app as $app): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" >
                        <h4 class="text-center"><span class="label label-info"><?php echo $app->appname; ?></span></h4>
                        <a href="<?php echo site_url('app/' . create_slug($app->appname) . '-' . $app->id . '.html'); ?>"><img src="<?php echo $app->appicon; ?>" width="300px" class="img-responsive" alt="<?php echo $app->appname; ?>"/></a>
                        <div class="caption">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <h3><a href="<?php echo site_url('app/' . create_slug($app->appname) . '-' . $app->id . '.html'); ?>"><?php echo $app->appname; ?></a></h3>
                                </div>
                                <div class="col-md-6 col-xs-6 price">
                                    <h3>
                                        <label>+<?php echo $app->appreview; ?> </label> &nbsp;&nbsp;&nbsp;<i class="fa fa-download"></i></h3>
                                </div>
                            </div>
                            <p><?php echo word_limiter($app->appdes, 6); ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo $app->applink; ?>" class="btn btn-primary btn-product"><span class="fa fa-download"></span> Download </a> 
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('app/' . create_slug($app->appname) . '-' . $app->id . '.html'); ?>" class="btn btn-success btn-product"><span class="fa fa-info-circle"></span> Details </a></div>
                            </div>

                            <p> </p>
                        </div>
                    </div>
                </div> 
            <?php endforeach; ?>
        </div>  
    </div>
</div>
<!--

                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="dashboard-div-wrapper bk-clr-one">
                            <a href="<?php echo site_url('app/' . create_slug($app->appname) . '-' . $app->id . '.html'); ?>">
                                <img class="img-responsive" src="<?php echo $app->appicon; ?>" />
                            </a>
                            <div class="progress progress-striped active">  
                            </div>
                            <h5><?php echo $app->appname; ?></h5>
                            <br/>
                            <a href="<?php echo $app->applink; ?>" class="btn btn-success btn-xs">DOWNLOAD</a>
                        </div>
                    </div> 
                </div>

-->