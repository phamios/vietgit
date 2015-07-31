<?php foreach ($details_app as $app): ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard-div-wrapper bk-clr-one" style="text-align: center;">
                <a href="<?php echo site_url('app/' . create_slug($app->appname) . '-' . $app->id . '.html'); ?>">
                    <img class="img-responsive" src="<?php echo $app->appicon; ?>" alt="<?php echo $app->appname;?>"/>
                </a>
                <div class="progress progress-striped active">  
                </div>
                <h5><?php echo $app->appname; ?></h5>
                <br/>
                <a href="<?php echo $app->applink; ?>" class="btn btn-success btn-xs">DOWNLOAD</a>
                <br/><br/>
                <div class="Compose-Message">
                    <div class="panel panel-success">
                        <div class="panel-heading"> <?php echo $app->appdes; ?> </div> 
                    </div>
                </div>
                <a href="<?php echo $app->applink; ?>" class="btn btn-success btn-xs">DOWNLOAD</a>
            </div>
            <div class="dashboard-div-wrapper bk-clr-one" style="text-align: center;">
                Relate App
            </div>
        </div> 
    </div>
<?php endforeach; ?>