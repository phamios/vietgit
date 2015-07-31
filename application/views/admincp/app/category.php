 
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới danh mục</h4>
                </div>
                <?php echo form_open_multipart('admincp/cateapp'); ?> 
                <div class="modal-body"> 
                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input name="catename" type="text"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Loại danh mục</label>
                            <select name="catetype" class="form-control">
                                <option value="0" selected="selected">Lựa chọn loại</option>
                                <option value="1">Ứng dụng</option>
                                <option value="2">Games</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('cateactive'); ?></label>
                            <select name="active" id="cateactive" class="form-control">
                                <option value="0" > Unactive</option>
                                <option value="1" selected="selected">Active</option>
                            </select>
                        </div>

                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button   class="btn btn-primary" name="btt_submit_insert" type="submit">Lưu</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-md-12">

        <!--  Modals-->
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="<?php echo site_url('admincp/cateapp'); ?>" class="btn btn-primary">Đầy đủ</a>
                &nbsp;
                <a href="<?php echo site_url('admincp/cateapp/app'); ?>" class="btn btn-primary">Ứng dụng</a>
                &nbsp;
                <a href="<?php echo site_url('admincp/cateapp/game'); ?>" class="btn btn-primary">Games</a>
                &nbsp; 
                <p></p>
                <?php echo form_open_multipart('admincp/cateapp'); ?>
                <input type="text" name="keyword" class="search-query" placeholder=" <?php echo $this->lang->line('search_content_input'); ?>" />
                <button class="btn btn-danger" type="submit" name="btt_submit_search">
                    <span class=" glyphicon glyphicon-search"></span>
                </button>
                <?php echo form_close(); ?>

            </div> 
        </div>
        <!-- End Modals-->

    </div> 
</div>

<div class="col-md-8">
    <div class="table-responsive">
        <p></p>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên danh mục</th> 
                    <th>Thể loại</th> 
                    <th>Tình trạng</th> 
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($list_cateapps <> null): ?>
                    <?php foreach ($list_cateapps as $value): ?>
                        <tr>
                            <td>#<?php echo $value->id ?></td>
                            <td><?php echo $value->catename ?></td>
                            <td>
                                <?php if ($value->catetype == 1): ?>
                                    Ứng dụng 
                                <?php elseif ($value->catetype == 2): ?>
                                    Trò chơi
                                <?php else: ?>
                                    Chưa xác định
                                <?php endif; ?>

                            </td>
                            <td><?php if ($value->active == 1): ?>
                                    <label class="label label-success">Đang hoạt động</label>
                                <?php else: ?>
                                    <label class="label label-warning">Đã Dừng</label> 
                                <?php endif; ?>
                            </td>
                            <td>
                                <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/editcateapp/' . trim($value->id)); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/delete_cateapp/' . trim($value->id)); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>

                            </td>
                        </tr> 

                    <?php endforeach; ?>
                <?php else: ?>
                    Chưa có dữ liệu
                <?php endif; ?>
            </tbody>
        </table>
    </div> 
</div>




