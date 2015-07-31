 
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới danh mục MEDIA</h4>
                </div>
                <?php echo form_open_multipart('admincp/media'); ?> 
                <div class="modal-body">

                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input name="catename" type="text"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select name="catetype" required="required" class="form-control">
                                <option></option>
                                <option value="1">Hình ảnh</option>
                                <option value="2">Video</option>
                                <option value="3">Nội dung</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Danh mục cha ( optional )</label>
                            <select name="cateroot" id="cateroot" class="form-control">
                                <option value="0" selected="selected">------</option>
                                <?php if ($list_category <> null): ?>
                                    <?php foreach ($list_category as $cateroot): ?>
                                        <option value="<?php echo $cateroot->id ?>"><?php echo $cateroot->catename ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button   class="btn btn-primary" name="btt_submit" type="submit">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>  

</div>





<?php

function showMenuLi($menus, $id_parent = 0, $i = 0) {
//    echo ' <tr>';

    foreach ($menus as $item) {
        $class = " &nbsp;&nbsp;&nbsp;";
        if ((int) $item->cateroot == (int) $id_parent) {
            ?>
            <?php $class = $class . $class; ?>
            <tr> 
                <td>#<?php echo $item->id ?></td> 
                <td>
                    <?php echo $class ?><?php echo $item->catename ?>
                </td>
                <td>
                    <?php if ($item->catetype == 1): ?>
                        Hình ảnh
                    <?php elseif ($item->catetype == 2): ?>
                        Video
                    <?php elseif ($item->catetype == 3): ?>
                        Nội dung
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($item->active == 1): ?>
                        <label class="label label-success">Đang hoạt động</label>
                    <?php else: ?>
                        <label class="label label-warning">Đã Dừng</label> 
                    <?php endif; ?>
                </td> 

                <td>
                    <a data-toggle="modal"  class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/media/edit/' . trim($item->id)); ?>">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a data-toggle="modal" class="btn btn-xs btn-danger" role="button" href="<?php echo site_url('admincp/media/delete/' . trim($item->id)); ?>">
                        <i class="fa fa-trash-o"></i>
                    </a> 
                </td>
            </tr>

            <?php showMenuLi($menus, $item->id); ?>

            <?php
        }
    }
//    echo '</tr>';
}
?>

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên danh mục</th> 
                    <th>Loại</th> 
                    <th>User</th>
                    <th>status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php if($list_category <> null):?>
                <?php foreach ($list_category as $value): ?>
                    <tr>
                        <td>#<?php echo $value->id ?></td>
                        <td><?php echo $value->catename ?></td>
                        <td>
                            <?php if ($value->catetype == 1): ?>
                                Hình ảnh
                            <?php elseif ($value->catetype == 2): ?>
                                Video
                            <?php elseif ($item->catetype == 3): ?>
                                Nội dung
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php foreach($list_user as $user): ?>
                                    <?php if ($user->id == $value->userid): ?>
                                        <?php echo $user->uname; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </td>
                        <td><?php if ($value->active == 1): ?>
                                <label class="label label-success">Đang hoạt động</label>
                            <?php else: ?>
                                <label class="label label-warning">Đã Dừng</label> 
                            <?php endif; ?>
                        </td>
                        <td>
                            <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/media/edit/' . trim($value->id)); ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/media/delete/' . trim($value->id)); ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        </td>
                    </tr> 
                    <?php showMenuLi($list_category, $value->id); ?>
                <?php endforeach; ?>
                    <?php endif;?>
            </tbody>
        </table>
    </div> 
</div>



