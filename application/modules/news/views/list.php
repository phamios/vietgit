 
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="page-alert" data-delay="4000" data-toggle-id="5" 
        class="btn btn-info btn-danger" href="<?php echo site_url('admincp/addcontent'); ?>">
        <i class="fa fa-pencil"></i> Thêm mới</a>            
</div>


<?php echo form_open_multipart('admincp/content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->lang->line('search_filter'); ?>
    </div> 
    <div class="panel-body form-inline" >  </div>
    <div id="custom-search-input" style="width: 95%; margin-left: 10px; padding-bottom: 10px;">
        <div class="input-group col-md-12">
            <input type="text" name="keyword" class="search-query form-control" placeholder="<?php echo $this->lang->line('search_content_input'); ?>" />
            <span class="input-group-btn">
                <button class="btn btn-danger" type="submit" name="btt_submit_search">
                    <span class=" glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<div class="clearfix" style="clear:both; padding:10px;"></div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover"> 
                <?php if ($list_news <> null): ?>
                    <thead>
                        <tr>
                            <th>
                                <a href="#" class="label label-info" >Xóa</a>

                            </th> 
                            <th><?php echo $this->lang->line('news_cateid'); ?></th> 
                            <th><?php echo $this->lang->line('news_title'); ?></th>
                            <th><?php echo $this->lang->line('news_short'); ?></th> 
                            <th><?php echo $this->lang->line('news_user'); ?></th>
                            <th><?php echo $this->lang->line('news_active'); ?></th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_news as $value): ?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $value->id ?>" name="check_id[]"></td> 
                                <td><?php foreach ($list_catenews as $cate): ?>
                                        <?php if ($value->news_cateid == $cate->id): ?>
                                            <?php echo $cate->catenewsname; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php echo $value->news_title; ?>

                                </td>
                                <td>
                                    <?php echo $value->news_short; ?>
                                </td> 
                                <td>
                                    <?php foreach ($list_user as $user): ?>
                                        <?php if ($user->id == $value->userid): ?>
                                            <?php echo $user->uname; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?php if ($value->news_active == 1): ?>
                                        <label class="label label-success">Đang hoạt động</label>
                                    <?php else: ?>
                                        <label class="label label-warning">Đã Dừng</label>  
                                    <?php endif; ?>
                                </td> 
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('news/update/' . $value->id); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a data-toggle="modal" role="button" href="<?php echo site_url('news/delete/' . $value->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>

    </div>

</div>