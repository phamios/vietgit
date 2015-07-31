
<div class="navbar-collapse collapse ">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('admincp'); ?>"><i class="fa fa-tachometer"></i>
                    <?php echo $this->lang->line("dashboard"); ?></a>
            </li> 
            
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-server"></i> <?php echo $this->lang->line("content_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("news_top"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/catenews'); ?>"><i class="fa fa-columns"></i>  <?php echo $this->lang->line("category_menu"); ?></a></li>   
                            <li class="divider"></li> 
                            <li><a href="<?php echo site_url('admincp/content'); ?>"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line("post_menu"); ?></a></li> 
                        </ul>
                    </li> 

                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("media_top"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/media'); ?>"><i class="fa fa-columns"></i> <?php echo $this->lang->line("cate_media_menu"); ?></a></li> 
                            <li class="divider"></li> 
<!--                            <li><a href="<?php echo site_url('admincp/pictures'); ?>"><i class="fa fa-picture-o"></i> <?php echo $this->lang->line("listmedia_menu"); ?></a></li>  -->
                            <li><a href="<?php echo site_url('admincp/videos'); ?>"><i class="fa fa-film"></i> <?php echo $this->lang->line("video_media_menu"); ?></a></li>     
                        </ul>
                    </li> 

                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("mobile_sub_menu"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/cateapp'); ?>"><i class="fa fa-columns"></i> <?php echo $this->lang->line("cate_mobile_sub_menu"); ?></a></li> 
                            <li class="divider"></li> 
                            <li><a href="<?php echo site_url('admincp/app'); ?>"><i class="fa fa-picture-o"></i> <?php echo $this->lang->line("list_mobile_submenu"); ?></a></li>     
                        </ul>
                    </li> 
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-server"></i>Traffics<b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('admin/traffic'); ?>"> Danh sách traffic </a></li>

                </ul>
            </li>
            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile"></i> <?php echo $this->lang->line("mobile_app_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">  
                    <li><a href="<?php echo site_url('request-app'); ?>"><i class="fa fa-bullseye"></i> Yêu cầu ứng dụng</a></li>  
                    <li class="divider"></li> 
<!--                    <li><a href="#"><i class="fa fa-wrench"></i> <?php echo $this->lang->line("create_mobile_app_menu"); ?></a></li>  
                    <li class="divider"></li> 
                    <li><a href="#"><i class="fa fa-list"></i> <?php echo $this->lang->line("list_mobile_app_menu"); ?></a></li> 
                    <li class="divider"></li> 
                    <li><a href="#"><i class="fa fa-cloud-upload"></i> <?php echo $this->lang->line("upload_app_mobile_to_store"); ?></a></li> -->

                </ul>
            </li>




            <li><a href="<?php echo site_url('admincp/api'); ?>"><i class="fa fa-cog"></i></i>
                    Danh sách API</a>
            </li>

            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-plus"></i>
                    <?php foreach ($this->user_model->list_all() as $user): ?>
                        <?php if ($user->id == $this->session->userdata('admin_id')): ?>
                            <?php echo $user->uname; ?>
                        <?php endif; ?>
                    <?php endforeach; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">

                    <li style="margin-left: 25px;"><label class="fa">Loại member:</label>
                        <?php foreach ($list_user as $user): ?>
                            <?php if ($user->id == $this->session->userdata('admin_id')): ?>
                                <?php if ($user->utype == 0): ?>
                                    <label class="label label-success">Admin</label>
                                <?php elseif ($user->utype == 1): ?>
                                    <label class="label label-warning">Free member</label>
                                <?php elseif ($user->utype == 2): ?>
                                    <label class="label label-warning">Pro member</label>
                                <?php else: ?>
                                    <label class="label label-warning">Pre member</label>
                                <?php endif; ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </li>
                    <li><a href="<?php echo site_url('admincp/updatepass'); ?>"><i class="fa ffa-key"></i> <?php echo $this->lang->line("updatepass_yourself"); ?></a></li>
                    <!--                    <li><a href="<?php echo site_url('admincp/profile'); ?>"><i class="fa fa-key"></i> <?php echo $this->lang->line("profile_menu"); ?></a></li> -->
                </ul>
            </li>


            <li ><a href="<?php echo site_url('admincp/logout'); ?>"><i class="fa fa-sign-out"></i>
                    <?php echo $this->lang->line("exit_menu"); ?></a>
            </li> 



        </ul>
        <!--        <div class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>-->

    </div><!-- /.navbar-collapse -->
</div>