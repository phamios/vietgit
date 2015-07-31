<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">
                        Miễn phí</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>0 đ/tháng</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Quản lý nội dung ứng dụng</li> 
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Hỗ trợ 24/7 </li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> &nbsp;</li> 
                    <li class="list-group-item"><i class="icon-ok text-success"></i> &nbsp;</li> 
                    <li class="list-group-item"><i class="icon-ok text-success"></i> &nbsp;</li> 
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-default" href="#free_plan" data-toggle="modal" >Mua gói này</a>
                </div>
                <!-- ----------------------------FREEEEEEE------------------------------- -->
                <div class="modal fade" id="free_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-success">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1>Đăng ký gói miễn phí</h1>
                            </div>
                            <?php echo form_open_multipart('dang-ky/mienphi'); ?> 
                            <div class="modal-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Email" name="user_email" class="form-control">
                                        </div>
                                    </div>
                                </fieldset> 
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Tên đăng nhập</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_name" placeholder="Tên đăng nhập" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_pass" placeholder="Mật khẩu" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" class="btn btn-danger  pull-left" name="btt_register"  >Thực hiện</button>
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">Sliver</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>100.000 đ/tháng</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Quản lý nội dung ứng dụng</li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Tăng share <img src="http://png-1.findicons.com/files/icons/2573/new_social_media_icons_set/32/google_plus.png" alt="google+"/> <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-32.png" alt="twitter" /></li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Yêu cầu ứng dụng Android <i class="fa fa-android fa-2x"></i></li> 
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Hỗ trợ 24/7 </li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> &nbsp;</li> 
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-primary"  href="#sliver_plan" data-toggle="modal">Mua gói này</a>
                </div>
                <div class="modal fade" id="sliver_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1>Đăng ký gói Sliver</h1>
                            </div>
                            <?php echo form_open_multipart('dang-ky/sliver'); ?> 
                            <div class="modal-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Email" name="user_email" class="form-control">
                                        </div>
                                    </div>
                                </fieldset> 
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Tên đăng nhập</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_name" placeholder="Tên đăng nhập" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_pass" placeholder="Mật khẩu" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" class="btn btn-danger  pull-left" name="btt_register"  >Thực hiện</button>
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center" style="font-weight: bold; color:red;">
                        Gold </h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>1.000.000 đ/tháng</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Quản lý nội dung ứng dụng</li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Tăng Share, Rate, Review</li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Tăng share <img src="http://png-1.findicons.com/files/icons/2573/new_social_media_icons_set/32/google_plus.png" alt="google+"/> <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-32.png" alt="twitter" /></li>
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Yêu cầu ứng dụng Android <i class="fa fa-android fa-2x"></i></li> 
                    <li class="list-group-item"><i class="icon-ok text-success"></i> Hỗ trợ 24/7 </li>
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-default" href="#gold_plan" data-toggle="modal"> Mua gói này</a>
                </div>
                <div class="modal fade" id="gold_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1>Đăng ký gói Gold</h1>
                            </div>
                            <?php echo form_open_multipart('dang-ky/gold'); ?> 
                            <div class="modal-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Email" name="user_email" class="form-control">
                                        </div>
                                    </div>
                                </fieldset> 
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Tên đăng nhập</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_name" placeholder="Tên đăng nhập" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                                 <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="textinput">Mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user_pass" placeholder="Mật khẩu" class="form-control">
                                        </div>
                                    </div>
                                 </fieldset>
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" class="btn btn-danger  pull-left" name="btt_register"  >Thực hiện</button>
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div> 
    </div>
</div>
