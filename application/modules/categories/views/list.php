
<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới danh mục sản phẩm</h4>
                </div>
                <?php echo form_open_multipart('categories/create_new'); ?> 
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home" style="padding:20px;"> 
                        <div class="form-group">
                            <label><?php echo $this->lang->line('catename'); ?></label>
                            <input name="catename" type="text"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('cateorder'); ?></label>
                            <input name="cateorder" type="text"  value="0"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('catedisplay'); ?></label>
                            <select name="catedispay" id="catedispay" class="form-control">
                                <option value="0" selected="selected">None</option>
                                <option value="1"  >Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('cateroot'); ?></label>
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
                            <select name="cateactive" id="cateactive" class="form-control">
                                <option value="0" > Unactive</option>
                                <option value="1" selected="selected"  >Active</option>
                            </select>
                        </div>

                        <div class="btn-toolbar list-toolbar">
                        <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                            <?php echo $this->lang->line('save'); ?>
                        </button>

                        <a href="#myModal" data-toggle="modal" class="btn btn-danger">
                            <?php echo $this->lang->line('delete'); ?>
                        </a>
                    </div> 
                        
                    </div>
 
                    
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
        if ((int) $item->cateroot == (int) $id_parent) {
            ?>
            <?php $class = $class . $class; ?>
            <tr> 
                <td>#<?php echo $item->id ?></td> 
                <td>
                    <?php echo $class ?><?php echo $item->catename ?>
                </td>
                <td> <?php echo $class ?><?php echo $item->cateaorder ?></td>
                <td>
                    <?php if ($item->catedisplay == 1): ?>
                        <label class="label label-success">Hiển thị</label>
                    <?php else: ?>
                        <label class="label label-warning">Không hiển thị</label> 
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($item->cateactive == 1): ?>
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
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_category <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th><?php echo $this->lang->line('category_name'); ?></th> 
                            <th><?php echo $this->lang->line('category_order'); ?></th>
                            <th><?php echo $this->lang->line('category_display'); ?></th>
                            <th><?php echo $this->lang->line('category_active'); ?></th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_category as $value): ?>
                            <tr>
                                <td>#<?php echo $value->id ?></td>
                                <td><?php echo $value->catename ?></td> 
                                <td><?php echo $value->cateaorder;
                            ?></td>
                                <td> 
                                    <?php if ($value->catedisplay == 1): ?>
                                        <label class="label label-success">Hiển thị</label>
                                    <?php else: ?>
                                        <label class="label label-warning">Không hiển thị</label> 
                                    <?php endif; ?>
                                </td>
                                <td><?php if ($value->cateactive == 1): ?>
                                        <label class="label label-success">Đang hoạt động</label>
                                    <?php else: ?>
                                        <label class="label label-warning">Đã Dừng</label> 
                                    <?php endif; ?>
                                </td>
                                <td> 
                                    <a data-toggle="modal"  class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('categories/update/' . trim($value->id)); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-xs btn-danger" role="button" href="<?php echo site_url('categories/delete/' . $value->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a> 
                                </td>
                            </tr>
                            <?php showMenuLi($list_category, $value->id); ?>
                        <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div>