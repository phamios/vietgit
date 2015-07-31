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
<div class="col-md-4">
    <?php if (isset($id)): ?>
        <?php foreach ($catedetails as $values): ?> 
            <?php echo form_open_multipart('admincp/editcateapp/' . $id); ?>

            <br> 
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home"> 
                    <div class="form-group">
                        <label><?php echo $this->lang->line('catename'); ?></label>
                        <input name="catename" type="text" value="<?php echo $values->catename ?>"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Loại danh mục</label>
                        <select name="catetype" class="form-control"> 
                            <option value="1" <?php if($values->catetype == 1):?> selected="selected"  <?php endif;?> >Ứng dụng</option>
                            <option value="2" <?php if($values->catetype == 2):?> selected="selected"  <?php endif;?> >Games</option>
                        </select>
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
                <button  class="btn btn-default" name="btt_submitexit" type="submit">Quay lại</button>
            </div>

            <?php echo form_close(); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>   