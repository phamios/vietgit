 
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới traffic</h4>
                </div>
                <?php echo form_open_multipart('admin/traffic'); ?> 
                <div class="modal-body">

                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label>Link</label>
                            <input name="link" type="text"   class="form-control">
                        </div>
<!--                        <div class="form-group">
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
                                <?php //if ($list_category <> null): ?>
                                    <?php //foreach ($list_category as $cateroot): ?>
                                        <option value="////<?php //echo $cateroot->id ?>"><?php //echo $cateroot->catename ?></option>
                                    <?php //endforeach; ?>
                                <?php //endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php //echo $this->lang->line('cateactive'); ?></label>
                            <select name="active" id="cateactive" class="form-control">
                                <option value="0" > Unactive</option>
                                <option value="1" selected="selected">Active</option>
                            </select>
                        </div>-->

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
                    <a data-toggle="modal"  class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admin/traffic/update' . trim($item->id)); ?>">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a data-toggle="modal" class="btn btn-xs btn-danger" role="button" href="<?php echo site_url('admin/traffic/delete' . trim($item->id)); ?>">
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
                    <th>Links</th> 
                    <th>Coins</th>
                    <th>Views</th>
                    <th>User</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($list_traffic <> null): ?>
                    <?php foreach ($list_traffic as $value): ?>
                        <tr>
                            <td>#<?php echo $value->id ?></td>
                            <td><?php echo $value->link ?></td>
                            <td><?php echo $value->coins ?></td>
                            <td><?php echo $value->views?></td>                    
                            <td>
                               <?php echo  $this->session->userdata('admin_name')?>
                            </td>
                            
                            <td>
                                <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admin/traffic/update/' . trim($value->id)); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admin/traffic/delete/' . trim($value->id)); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>

                            </td>
                        </tr> 
                       
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div> 
</div>



