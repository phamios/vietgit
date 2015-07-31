
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
            <!--            <li >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-plus"></i> <?php echo $this->lang->line("users_menu"); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu"> 
                                <li><a href="<?php echo site_url('admincp/user'); ?>"><i class="fa fa-child"></i> <?php echo $this->lang->line("list_users_menu"); ?></a></li> 
                                <li><a href="<?php echo site_url('admincp/updatepass'); ?>"><i class="fa fa-key"></i> <?php echo $this->lang->line("updatepass_yourself"); ?></a></li> 
                                <li><a href="<?php echo site_url('admincp/profile'); ?>"><i class="fa fa-key"></i> <?php echo $this->lang->line("profile_menu"); ?></a></li> 
                            </ul>
                        </li>-->
            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-server"></i> <?php echo $this->lang->line("content_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("news_top"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/catenews'); ?>"><i class="fa fa-columns"></i>  <?php echo $this->lang->line("category_menu"); ?></a></li>   
                            <li class="divider"></li> 
                            <li><a href="<?php echo site_url('admincp/content'); ?>"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line("post_menu"); ?></a></li> 
                            <li><a href="<?php echo site_url('admincp/blog'); ?>"><i class="fa fa-file-text-o"></i> Blog</a></li> 

                        </ul>
                    </li>  
                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("products_top"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/cateproduct'); ?>"><i class="fa fa-columns"></i> <?php echo $this->lang->line("cateproduct_menu"); ?></a></li> 
                            <li class="divider"></li> 
                            <li><a href="<?php echo site_url('admincp/product'); ?>"><i class="fa fa-th"></i> <?php echo $this->lang->line("product_menu"); ?></a></li> 
                            <li><a href="#"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line("typeproduct_menu"); ?></a></li>  
                            <li><a href="#"><i class="fa fa-tags"></i> <?php echo $this->lang->line("saleproduct_menu"); ?></a></li> 
                            <li class="divider"></li> 
                            <li class="dropdown-submenu"><a href="#"><i class="fa fa-tags"></i> <?php echo $this->lang->line("customer_top"); ?></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="<?php echo site_url('admincp/user'); ?>"><i class="fa fa-child"></i> <?php echo $this->lang->line("list_buyer_menu"); ?></a></li>  
                                    <li><a href="<?php echo site_url('admincp/user'); ?>"><i class="fa fa-users"></i> <?php echo $this->lang->line("list_partner_menu"); ?></a></li>  
                                </ul>
                            </li>
                            <li class="divider"></li> 
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-exchange"></i>   <?php echo $this->lang->line("transaction_menu"); ?> </a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="#"><i class="fa fa-list-alt"></i> <?php echo $this->lang->line("bill_list_menu"); ?></a></li>   
                                    <li><a href="#"><i class="fa fa-repeat"></i> <?php echo $this->lang->line("return_list_menu"); ?></a></li>  
                                    <li><a href="#"><i class="fa fa-download"></i> <?php echo $this->lang->line("import_list_menu"); ?></a></li>  
                                    <li><a href="#"><i class="fa fa-upload"></i> <?php echo $this->lang->line("transport_item_menu"); ?></a></li>  
                                    <li><a href="#"><i class="fa fa-deviantart"></i> <?php echo $this->lang->line("cancel_item_menu"); ?></a></li>  
                                </ul>
                            </li>
                            <li class="divider"></li> 
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart"></i> <?php echo $this->lang->line("report_menu"); ?> </a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="#"><i class="fa fa-heartbeat"></i> <?php echo $this->lang->line("static_report_menu"); ?></a></li>  
                                    <li class="divider"></li> 
                                    <li><a href="<?php echo site_url('admincp/giftcard'); ?>"><i class="fa fa-book"></i> <?php echo $this->lang->line("sale_report_menu"); ?></a></li> 
                                    <li><a href="#"><i class="fa fa-cube"></i> <?php echo $this->lang->line("product_ingroup_menu"); ?></a></li> 
                                    <li><a href="#"><i class="fa fa-suitcase"></i> <?php echo $this->lang->line("finance_report_menu"); ?></a></li> 
                                    <li><a href="#"><i class="fa fa-exclamation-triangle"></i>  <?php echo $this->lang->line("indebt_report_menu"); ?></a></li> 

                                </ul>
                            </li>
                        </ul>
                    </li>  
                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("media_top"); ?> </a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="<?php echo site_url('admincp/media'); ?>"><i class="fa fa-columns"></i> <?php echo $this->lang->line("cate_media_menu"); ?></a></li> 
                            <li class="divider"></li> 
                            <li><a href="<?php echo site_url('admincp/pictures'); ?>"><i class="fa fa-picture-o"></i> <?php echo $this->lang->line("listmedia_menu"); ?></a></li>  
                            <li><a href="<?php echo site_url('admincp/videos'); ?>"><i class="fa fa-film"></i> <?php echo $this->lang->line("video_media_menu"); ?></a></li>     
                        </ul>
                    </li>

                    <li class="dropdown-submenu"><a href="admincp/request_application" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->lang->line("request_app_menu"); ?> </a>

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
            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile"></i> <?php echo $this->lang->line("mobile_app_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">  
                    <li><a href="<?php echo site_url('request-app'); ?>"><i class="fa fa-wrench"></i> <?php echo $this->lang->line("create_mobile_app_menu"); ?></a></li>  
                    <li class="divider"></li> 
                    <li><a href="#"><i class="fa fa-list"></i> <?php echo $this->lang->line("list_mobile_app_menu"); ?></a></li> 
                    <li class="divider"></li> 
                    <li><a href="#"><i class="fa fa-cloud-upload"></i> <?php echo $this->lang->line("upload_app_mobile_to_store"); ?></a></li> 

                </ul>
            </li>

            <li >
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <?php echo $this->lang->line("config_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu"> 
                    <li><a href="<?php echo site_url('admincp/configsite'); ?>"><?php echo $this->lang->line("site_config_default"); ?></a></li>   
                    <li><a href="#"><?php echo $this->lang->line("site_config_backup"); ?></a></li>   
                    <li><a href="#"><?php echo $this->lang->line("site_config_SEO"); ?></a></li>   
                    <li><a href="#"><?php echo $this->lang->line("site_config_domain"); ?></a></li>    
                </ul>
            </li> 

            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <?php echo $this->lang->line("api_menu"); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu"> 
                    <li><a href="#"><?php echo $this->lang->line("api_json_content_menu"); ?></a></li>   
                    <li><a href="#"><?php echo $this->lang->line("api_json_product_menu"); ?></a></li>   
                    <li><a href="#"><?php echo $this->lang->line("api_json_media_menu"); ?></a></li>    
                </ul>
            </li> 
            <li><a href="<?php echo site_url('admincp/api'); ?>"><i class="fa fa-cog"></i></i>
                    Danh sách API</a>
            </li>
            <li><a href="<?php echo site_url('admincp/emailconfig'); ?>"><i class="fa fa-cog"></i></i>
                    Cấu hình Emails </a>
            </li>
            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-plus"></i> 
                    Quản lý thành viên
                    <b class="caret"></b></a>
                <ul class="dropdown-menu"> 
                    <li><a href="<?php echo site_url('admincp/user'); ?>"><i class="fa fa-child"></i> <?php echo $this->lang->line("list_users_menu"); ?></a></li> 
                    <li><a href="<?php echo site_url('admincp/updatepass'); ?>"><i class="fa fa-key"></i> <?php echo $this->lang->line("updatepass_yourself"); ?></a></li> 
                    <li><a href="<?php echo site_url('admincp/profile'); ?>"><i class="fa fa-key"></i> <?php echo $this->lang->line("profile_menu"); ?></a></li> 
                </ul>
            </li>

            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-plus"></i>
                    <?php echo $this->session->userdata('admin_name');?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">

                    <li style="margin-left: 25px;"><label class="fa">Loại member:</label>
                                <?php if ($this->session->userdata('admin_id')== 0): ?>
                                    <label class="label label-success">Admin</label>
                                <?php elseif ($this->session->userdata('admin_id') == 1): ?>
                                    <label class="label label-warning">Free member</label>
                                <?php elseif ($this->session->userdata('admin_id') == 2): ?>
                                    <label class="label label-warning">Pro member</label>
                                <?php else: ?>
                                    <label class="label label-warning">Pre member</label>
                                <?php endif; ?>
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