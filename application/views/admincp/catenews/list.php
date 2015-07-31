 
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới danh mục tin</h4>
                </div>
                <?php echo form_open_multipart('admincp/catenews'); ?> 
                <div class="modal-body">

                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label><?php echo $this->lang->line('catename'); ?></label>
                            <input name="catename" type="text"   class="form-control">
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

function showMenuLi($menus, $id_parent = 0) {
//    echo ' <tr>';

    foreach ($menus as $item) {
        $class = " &nbsp;&nbsp;&nbsp;";
        if ((int) $item->catenewsnameroot == (int) $id_parent) {
            ?>
            <?php $class = $class . $class; ?>
            <tr> 
                <td>#<?php echo $item->id ?></td> 
                <td>
                    <?php echo $class ?><?php echo $item->catenewsname ?>
                </td>
                <td>
                    <?php if ($item->active == 1): ?>
                        <label class="label label-success">Đang hoạt động</label>
                    <?php else: ?>
                        <label class="label label-warning">Đã Dừng</label> 
                    <?php endif; ?>
                </td> 

                <td>
                    <a data-toggle="modal"  class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/catenews/' . trim($item->id)); ?>">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a data-toggle="modal" class="btn btn-xs btn-danger" role="button" href="<?php echo site_url('admincp/del_catenews/' . trim($item->id)); ?>">
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

<div class="col-md-8">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên danh mục</th> 
                    <th>User</th>
                    <th>status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_catenews as $value): ?>
                    <tr>
                        <td>#<?php echo $value->id ?></td>
                        <td><?php echo $value->catenewsname ?></td>
                        <td><?php foreach ($list_user as $user): ?>
                                <?php if ($user->id == $value->userid): ?>
                                    <?php echo $user->uname; ?>
                                <?php endif; ?>
                            <?php endforeach; ?></td>
                        <td><?php if ($value->active == 1): ?>
                                <label class="label label-success">Đang hoạt động</label>
                            <?php else: ?>
                                <label class="label label-warning">Đã Dừng</label> 
                            <?php endif; ?>
                        </td>
                        <td>
                            <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/catenews/' . trim($value->id)); ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/del_catenews/' . trim($value->id)); ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        </td>
                    </tr> 
                    <?php showMenuLi($list_catenews, $value->id); ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>
<div class="col-md-4">
    <?php if (isset($id)): ?>
        <?php foreach ($catedetails as $values): ?> 
            <?php echo form_open_multipart('admincp/catenews/' . $id); ?>

            <br> 
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home"> 
                    <div class="form-group">
                        <label><?php echo $this->lang->line('catename'); ?></label>
                        <input name="catename" type="text" value="<?php echo $values->catenewsname ?>"   class="form-control">
                    </div>

                    <div class="form-group">
                        <label><?php echo $this->lang->line('cateactive'); ?></label>
                        <select name="active" id="cateactive" class="form-control">
                            <option value="0" <?php if ($values->active == 0): ?> selected="selected"<?php endif; ?> > Unactive</option>
                            <option value="1" <?php if ($values->active == 1): ?> selected="selected"<?php endif; ?>  >Active</option>
                        </select>
                    </div>

                </div> 
            </div>

            <div class="btn-toolbar list-toolbar">
                <button class="btn btn-primary" name="btt_submitedit" type="submit"><i class="fa fa-save"></i> 
                    <?php echo $this->lang->line('save'); ?>
                </button> 
            </div>

            <?php echo form_close(); ?>
        <?php endforeach; ?>
    </div>   
<?php endif; ?>


