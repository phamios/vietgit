 
<div class="panel-heading" style="float:right;" > 
    <a href="<?php echo site_url('admincp/add_media'); ?>"   class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>
</div>

<div class="row">
    <div class="col-md-12">

        <!--  Modals-->
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="<?php echo site_url('admincp/app'); ?>" class="btn btn-primary">Đầy đủ</a>
                &nbsp;
                <a href="<?php echo site_url('admincp/app/1'); ?>" class="btn btn-primary">HÌnh ảnh</a>
                &nbsp;
                <a href="<?php echo site_url('admincp/app/2'); ?>" class="btn btn-primary">Videos</a>
                &nbsp; 
            </div> 
        </div>
        <!-- End Modals-->

    </div> 
</div>

<div class="col-md-12">
    <div class="table-responsive">
        <p></p>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>icon</th> 
                    <th width="10px;">Loại</th> 
                    <th>Danh mục</th> 
                    <th>Tên ứng dụng</th> 
                    <th>Giới thiệu</th>
                    <th>Link tải</th>
                    <th>Tình trạng</th> 
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($list_app <> null): ?>
                    <?php foreach ($list_app as $value): ?>
                        <tr>
                            <td>#<?php echo $value->id ?></td>
                            <td>
                                <img src="<?php echo $value->appicon;?>" alt="icon" width="10%"/> 
                            </td>
                            <td><?php if ($value->apptype == 1): ?>
                                    Ứng dụng 
                                <?php elseif ($value->apptype == 2): ?>
                                    Trò chơi
                                <?php else: ?>
                                    Chưa xác định
                                <?php endif; ?>
                            </td>
                            <td><?php foreach ($list_cateapps as $cate): ?>
                                    <?php if ($cate->id == $value->cateid): ?>
                                        <?php echo $cate->catename; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                               <?php echo $value->appname; ?> 

                            </td>
                            <td>
                               <?php echo $value->appdes; ?> 

                            </td>
                            <td>
                               <?php echo $value->applink; ?> 

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
                                <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/delete_app/' . trim($value->id)); ?>">
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




